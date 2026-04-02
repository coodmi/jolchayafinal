<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return response()->json($bookings);
    }

    /**
     * Update the status of a booking.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,completed'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $validated['status'];
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'স্ট্যাটাস সফলভাবে আপডেট করা হয়েছে',
            'data' => $booking
        ]);
    }

    /**
     * Remove a booking from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'বুকিং সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Delete multiple bookings.
     */
    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:bookings,id'
        ]);

        Booking::whereIn('id', $validated['ids'])->delete();

        return response()->json([
            'success' => true,
            'message' => 'নির্বাচিত বুকিংগুলি সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Update admin note for a booking.
     */
    public function updateNote(Request $request, $id)
    {
        $validated = $request->validate([
            'admin_note' => 'nullable|string|max:2000'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->admin_note = $validated['admin_note'] ?? null;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'নোট সফলভাবে সংরক্ষিত হয়েছে'
        ]);
    }

    /**
     */
    public function export(Request $request)
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        
        $format = $request->query('format', 'csv');
        
        if ($format === 'json') {
            return response()->json($bookings);
        }
        
        // CSV export
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="bookings_' . date('Y-m-d') . '.csv"',
        ];
        
        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Headers
            fputcsv($file, ['#', 'নাম', 'ফোন নম্বর', 'ইমেইল', 'প্লট সাইজ', 'বার্তা', 'স্ট্যাটাস', 'জমার তারিখ']);
            
            // Rows
            foreach ($bookings as $index => $booking) {
                $statusMap = [
                    'pending' => 'পেন্ডিং',
                    'contacted' => 'যোগাযোগ করা হয়েছে',
                    'completed' => 'সম্পন্ন'
                ];
                
                fputcsv($file, [
                    $index + 1,
                    $booking->name,
                    $booking->phone,
                    $booking->email,
                    $booking->plot_size ?? '-',
                    $booking->message ?? '-',
                    $statusMap[$booking->status] ?? $booking->status,
                    $booking->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
