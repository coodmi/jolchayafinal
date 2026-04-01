<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PlotRegistration;

class UserController extends Controller
{
    // Show user profile
    public function profile()
    {
        return view('user.profile');
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $user = Auth::user();
        $user->update($validated);

        return back()->with('success', 'প্রোফাইল সফলভাবে আপডেট হয়েছে!');
    }

    // Update user photo
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->photo && \Storage::disk('public')->exists($user->photo)) {
            \Storage::disk('public')->delete($user->photo);
        }

        // Store new photo
        $path = $request->file('photo')->store('profile-photos', 'public');
        
        $user->update(['photo' => $path]);

        return back()->with('success', 'ফটো সফলভাবে আপলোড হয়েছে!');
    }

    // Update user password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'বর্তমান পাসওয়ার্ড সঠিক নয়']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        return back()->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তিত হয়েছে!');
    }

    // Show user applications
    public function applications()
    {
        $user = Auth::user();
        
        // Get plot registrations by email or mobile
        $plotRegistrations = PlotRegistration::where('email', $user->email)
            ->orWhere('mobile', $user->phone)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get bookings by user_id or email
        $bookings = \App\Models\Booking::where('user_id', $user->id)
            ->orWhere('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Combine both into applications array
        $applications = collect();
        
        // Add plot registrations
        foreach ($plotRegistrations as $reg) {
            $applications->push([
                'id' => $reg->id,
                'type' => 'registration',
                'application_number' => $reg->application_number,
                'project_name' => $reg->project_name ?? '-',
                'applicant_name' => $reg->applicant_name,
                'mobile' => $reg->mobile,
                'created_at' => $reg->created_at,
                'status' => $reg->status ?? 'pending',
                'status_bengali' => $reg->status_bengali ?? 'অপেক্ষমাণ',
            ]);
        }
        
        // Add bookings
        foreach ($bookings as $booking) {
            $applications->push([
                'id' => $booking->id,
                'type' => 'booking',
                'application_number' => 'BK-' . str_pad($booking->id, 6, '0', STR_PAD_LEFT),
                'project_name' => $booking->plot_size ? 'প্লট: ' . $booking->plot_size : '-',
                'applicant_name' => $booking->name,
                'mobile' => $booking->phone,
                'created_at' => $booking->created_at,
                'status' => $booking->status ?? 'pending',
                'status_bengali' => match($booking->status ?? 'pending') {
                    'pending' => 'অপেক্ষমাণ',
                    'contacted' => 'যোগাযোগ করা হয়েছে',
                    'completed' => 'সম্পন্ন',
                    default => 'অপেক্ষমাণ',
                },
            ]);
        }
        
        // Sort by created_at descending
        $applications = $applications->sortByDesc('created_at');
        
        return view('user.applications', compact('applications'));
    }

    // Show single application details
    public function showApplication($type, $id)
    {
        $user = Auth::user();
        
        if ($type === 'registration') {
            // Get plot registration
            $application = PlotRegistration::findOrFail($id);
            
            // Verify ownership
            if ($application->email !== $user->email && $application->mobile !== $user->phone) {
                abort(403, 'অননুমোদিত প্রবেশ');
            }
            
            return view('user.application-details', [
                'application' => $application,
                'type' => 'registration'
            ]);
            
        } elseif ($type === 'booking') {
            // Get booking
            $application = \App\Models\Booking::findOrFail($id);
            
            // Verify ownership
            if ($application->user_id !== $user->id && $application->email !== $user->email) {
                abort(403, 'অননুমোদিত প্রবেশ');
            }
            
            return view('user.application-details', [
                'application' => $application,
                'type' => 'booking'
            ]);
        }
        
        abort(404);
    }
}
