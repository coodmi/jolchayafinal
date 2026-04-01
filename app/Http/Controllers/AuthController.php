<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Models\HeaderSetting;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Show login form for users
    public function loginForm()
    {
        // If admin is logged in, redirect to dashboard
        if (request()->session()->get('is_admin')) {
            return redirect()->route('dashboard');
        }
        
        // If user is logged in, redirect to profile
        if (Auth::check()) {
            return redirect()->route('user.profile');
        }
        
        $headerSetting = HeaderSetting::first();
        return view('auth.login', compact('headerSetting'));
    }
    
    // Show admin login form
    public function adminLoginForm()
    {
        // If admin is already logged in, redirect to dashboard
        if (request()->session()->get('is_admin')) {
            return redirect()->route('dashboard');
        }
        
        $headerSetting = HeaderSetting::first();
        return view('auth.admin-login', compact('headerSetting'));
    }

    // Show registration form
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('user.profile');
        }
        return view('auth.register');
    }

    // Handle user registration
    public function registerSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'রেজিস্ট্রেশন সফল হয়েছে!');
    }

    // Handle user login
    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Regular user login only
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success', 'স্বাগতম!');
        }

        return back()->withErrors(['email' => 'ইমেইল বা পাসওয়ার্ড সঠিক নয়'])->withInput();
    }
    
    // Handle admin login
    public function adminLoginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Admin login check
        $validEmail = 'admin@gmail.com';
        $validPassword = 'password@gmail.com';

        if ($credentials['email'] === $validEmail && $credentials['password'] === $validPassword) {
            // Clear any user session first
            Auth::logout();
            
            $request->session()->put('is_admin', true);
            $request->session()->put('admin_email', $credentials['email']);
            return redirect()->intended(route('dashboard') . '?tab=overview');
        }

        return back()->withErrors(['email' => 'অ্যাডমিন ইমেইল বা পাসওয়ার্ড সঠিক নয়'])->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {
        $isAdmin = $request->session()->get('is_admin');
        
        // Clear admin session if exists
        $request->session()->forget('is_admin');
        $request->session()->forget('admin_email');
        
        // Logout user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect based on who logged out
        if ($isAdmin) {
            return redirect()->route('admin.login')->with('success', 'অ্যাডমিন সফলভাবে লগআউট হয়েছে');
        }
        
        return redirect()->route('home')->with('success', 'সফলভাবে লগআউট হয়েছে');
    }
    
    // Show forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    
    // Handle forgot password email request
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'এই ইমেইল অ্যাড্রেসটি আমাদের সিস্টেমে নেই।',
        ]);

        // Generate token
        $token = Str::random(64);

        // Delete any existing password reset tokens for this email
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Store new password reset token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now()
        ]);

        // Send email with reset link
        try {
            Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
            
            // In development mode, also show the reset link
            if (config('app.env') === 'local' || config('mail.driver') === 'log') {
                $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);
                return back()->with('status', 'পাসওয়ার্ড রিসেট লিংক আপনার ইমেইলে পাঠানো হয়েছে!')->with('resetUrl', $resetUrl);
            }
            
            return back()->with('status', 'পাসওয়ার্ড রিসেট লিংক আপনার ইমেইলে পাঠানো হয়েছে!');
        } catch (\Exception $e) {
            // In development, show the reset URL even if email fails
            if (config('app.env') === 'local' || config('mail.driver') === 'log') {
                $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);
                \Log::error('Failed to send password reset email: ' . $e->getMessage());
                return back()->with('status', 'ডেভেলপমেন্ট মোড: নিচের লিংক ব্যবহার করুন')->with('resetUrl', $resetUrl);
            }
            return back()->withErrors(['email' => 'ইমেইল পাঠাতে সমস্যা হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।']);
        }
    }
    
    // Show reset password form
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    
    // Handle password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'email.exists' => 'এই ইমেইল অ্যাড্রেসটি আমাদের সিস্টেমে নেই।',
            'password.min' => 'পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে।',
            'password.confirmed' => 'পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মিলছে না।',
        ]);

        // Check if token exists and is valid (within 60 minutes)
        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'এই রিসেট লিংকটি বৈধ নয়।']);
        }

        // Verify token
        if (!Hash::check($request->token, $passwordReset->token)) {
            return back()->withErrors(['email' => 'এই রিসেট লিংকটি বৈধ নয়।']);
        }

        // Check if token is expired (60 minutes)
        if (Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'এই রিসেট লিংকটির মেয়াদ শেষ হয়ে গেছে। অনুগ্রহ করে নতুন রিসেট লিংক অনুরোধ করুন।']);
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete password reset token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Log the user in
        Auth::login($user);

        return redirect()->route('home')->with('success', 'আপনার পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে!');
    }
}
