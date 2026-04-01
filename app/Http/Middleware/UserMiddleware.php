<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if trying to access admin dashboard
        if ($request->session()->get('is_admin')) {
            return redirect()->route('dashboard')->with('info', 'অ্যাডমিন ড্যাশবোর্ডে যান');
        }
        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'লগইন প্রয়োজন');
        }
        
        return $next($request);
    }
}
