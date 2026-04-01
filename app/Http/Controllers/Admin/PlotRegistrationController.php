<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlotRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlotRegistrationController extends Controller
{
    /**
     * Display a listing of registrations.
     */
    public function index(Request $request)
    {
        // Use select to only get needed columns for better performance
        $query = PlotRegistration::select([
            'id', 'applicant_name', 'mobile', 'email',
            'project_name', 'plot_no', 'block_no', 'total_price', 'status',
            'created_at', 'applicant_photo'
        ]);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('applicant_name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nid', 'like', "%{$search}%")
                    ->orWhere('project_name', 'like', "%{$search}%");
            });
        }

        $registrations = $query->orderBy('created_at', 'desc')->paginate(15);

        // Always load fresh stats from database
        $stats = [
            'total' => PlotRegistration::count(),
            'pending' => PlotRegistration::where('status', 'pending')->count(),
            'approved' => PlotRegistration::where('status', 'approved')->count(),
            'processing' => PlotRegistration::where('status', 'processing')->count(),
            'rejected' => PlotRegistration::where('status', 'rejected')->count(),
        ];

        if ($request->ajax()) {
            return response()->json([
                'registrations' => $registrations,
                'stats' => $stats
            ]);
        }

        return view('admin.registrations.index', compact('registrations', 'stats'));
    }

    /**
     * Return partial view for AJAX loading in dashboard tab.
     */
    public function partial(Request $request)
    {
        // Use select to only get needed columns for better performance
        $query = PlotRegistration::select([
            'id', 'applicant_name', 'mobile', 'email', 'application_number',
            'project_name', 'plot_no', 'block_no', 'total_price', 'status',
            'created_at', 'applicant_photo'
        ]);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('applicant_name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nid', 'like', "%{$search}%")
                    ->orWhere('project_name', 'like', "%{$search}%");
            });
        }

        $registrations = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get fresh stats for display
        $stats = [
            'total' => PlotRegistration::count(),
            'pending' => PlotRegistration::where('status', 'pending')->count(),
            'approved' => PlotRegistration::where('status', 'approved')->count(),
            'processing' => PlotRegistration::where('status', 'processing')->count(),
            'rejected' => PlotRegistration::where('status', 'rejected')->count(),
        ];

        return view('admin.registrations.partial', compact('registrations', 'stats'));
    }

    /**
     * Display the specified registration.
     */
    public function show(PlotRegistration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    /**
     * Show form for editing the specified registration.
     */
    public function edit(PlotRegistration $registration)
    {
        return view('admin.registrations.edit', compact('registration'));
    }

    /**
     * Update the specified registration.
     */
    public function update(Request $request, PlotRegistration $registration)
    {
        $validated = $request->validate([
            // Office Use
            'sl_no' => 'nullable|string|max:50',
            'file_no' => 'nullable|string|max:50',
            'sr_code' => 'nullable|string|max:50',
            'team' => 'nullable|string|max:100',
            'rep' => 'nullable|string|max:100',
            
            // Status
            'status' => 'nullable|in:pending,approved,rejected,processing',
            'admin_notes' => 'nullable|string',
            
            // Plot
            'plot_no' => 'nullable|string|max:50',
            'road_no' => 'nullable|string|max:50',
            'block_no' => 'nullable|string|max:50',
            'facing' => 'nullable|string|max:50',
            'rate_per_katha' => 'nullable|numeric|min:0',
            'area_katha' => 'nullable|numeric|min:0',
            'total_price' => 'nullable|numeric|min:0',
            
            // Payment
            'booking_money' => 'nullable|numeric|min:0',
            'down_payment' => 'nullable|numeric|min:0',
            'remaining_amount' => 'nullable|numeric|min:0',
            'no_of_installment' => 'nullable|integer|min:1',
            'per_installment' => 'nullable|numeric|min:0',
            'emi_start_date' => 'nullable|date',
        ]);

        $registration->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'রেজিস্ট্রেশন সফলভাবে আপডেট করা হয়েছে',
                'registration' => $registration->fresh()
            ]);
        }

        return redirect()->route('admin.registrations.show', $registration)
            ->with('success', 'রেজিস্ট্রেশন সফলভাবে আপডেট করা হয়েছে');
    }

    /**
     * Update registration status.
     */
    public function updateStatus(Request $request, PlotRegistration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected,processing',
            'admin_notes' => 'nullable|string',
        ]);

        $registration->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'স্ট্যাটাস সফলভাবে আপডেট করা হয়েছে',
            'status' => $registration->status,
            'status_bengali' => $registration->status_bengali,
        ]);
    }

    /**
     * Remove the specified registration.
     */
    public function destroy(PlotRegistration $registration)
    {
        // Delete associated photos
        if ($registration->applicant_photo) {
            Storage::disk('public')->delete($registration->applicant_photo);
        }
        if ($registration->nominee_photo) {
            Storage::disk('public')->delete($registration->nominee_photo);
        }

        $registration->delete();

        return response()->json([
            'success' => true,
            'message' => 'রেজিস্ট্রেশন সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Bulk delete registrations.
     */
    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:plot_registrations,id'
        ]);

        $registrations = PlotRegistration::whereIn('id', $validated['ids'])->get();

        foreach ($registrations as $registration) {
            if ($registration->applicant_photo) {
                Storage::disk('public')->delete($registration->applicant_photo);
            }
            if ($registration->nominee_photo) {
                Storage::disk('public')->delete($registration->nominee_photo);
            }
            $registration->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'নির্বাচিত রেজিস্ট্রেশনগুলি সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Export registrations data.
     */
    public function export(Request $request)
    {
        $query = PlotRegistration::query();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $registrations = $query->orderBy('created_at', 'desc')->get();

        $format = $request->query('format', 'csv');

        if ($format === 'json') {
            return response()->json($registrations);
        }

        // CSV export
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="registrations_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($registrations) {
            $file = fopen('php://output', 'w');

            // Add BOM for UTF-8
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Headers
            fputcsv($file, [
                'আবেদন নম্বর',
                'আবেদনকারীর নাম',
                'মোবাইল',
                'ইমেইল',
                'প্রকল্পের নাম',
                'প্লট নম্বর',
                'প্লট আয়তন (কাঠা)',
                'মোট মূল্য',
                'বুকিং মানি',
                'স্ট্যাটাস',
                'আবেদনের তারিখ'
            ]);

            // Rows
            foreach ($registrations as $reg) {
                fputcsv($file, [
                    $reg->application_number,
                    $reg->applicant_name,
                    $reg->mobile,
                    $reg->email ?? 'N/A',
                    $reg->project_name ?? 'N/A',
                    $reg->plot_no ?? 'N/A',
                    $reg->area_katha ?? 'N/A',
                    $reg->total_price ?? 'N/A',
                    $reg->booking_money ?? 'N/A',
                    $reg->status_bengali,
                    $reg->created_at->format('d/m/Y')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Print registration details.
     */
    public function print(PlotRegistration $registration)
    {
        return view('admin.registrations.print', compact('registration'));
    }
}
