<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Get all bookings
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return response()->json($bookings);
    }

    /**
     * Store a new booking (from contact form)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'plot_size' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking = Booking::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'আপনার বুকিং তথ্য সফলভাবে জমা হয়েছে। শীঘ্রই আমরা আপনার সাথে যোগাযোগ করব।',
            'data' => $booking
        ]);
    }

    /**
     * Update booking status
     */
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        $booking->update([
            'status' => $request->status,
            'is_read' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'স্ট্যাটাস আপডেট হয়েছে',
            'data' => $booking
        ]);
    }

    /**
     * Delete a booking
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'বুকিং মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Bulk delete bookings
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        
        if (!$ids || !is_array($ids)) {
            return response()->json(['error' => 'Invalid IDs'], 400);
        }

        Booking::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' টি বুকিং মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Export bookings to CSV
     */
    public function export()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        
        $filename = 'bookings_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Headers
            fputcsv($file, ['#', 'নাম', 'ফোন', 'ইমেইল', 'প্লট সাইজ', 'বার্তা', 'স্ট্যাটাস', 'তারিখ']);
            
            // Data
            foreach ($bookings as $index => $booking) {
                fputcsv($file, [
                    $index + 1,
                    $booking->name,
                    $booking->phone,
                    $booking->email,
                    $booking->plot_size ?? '-',
                    $booking->message ?? '-',
                    $booking->status,
                    $booking->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
