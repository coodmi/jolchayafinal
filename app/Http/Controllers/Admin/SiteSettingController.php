<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return response()->json($settings ?? (object)[]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'site_name'       => 'nullable|string|max:255',
            'site_title'      => 'nullable|string|max:255',
            'favicon'         => 'nullable|image|mimes:png,jpg,jpeg,ico,svg,webp|max:2048',
            'dashboard_logo'  => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:5120',
        ]);

        $settings = SiteSetting::firstOrCreate([]);

        if ($request->filled('site_name'))  $settings->site_name  = $request->site_name;
        if ($request->filled('site_title')) $settings->site_title = $request->site_title;

        if ($request->hasFile('favicon')) {
            if ($settings->favicon_path) Storage::disk('public')->delete($settings->favicon_path);
            $settings->favicon_path = $request->file('favicon')->store('site', 'public');
        }

        if ($request->hasFile('dashboard_logo')) {
            if ($settings->dashboard_logo_path) Storage::disk('public')->delete($settings->dashboard_logo_path);
            $settings->dashboard_logo_path = $request->file('dashboard_logo')->store('site', 'public');
        }

        $settings->save();

        return response()->json([
            'success' => true,
            'message' => 'সাইট সেটিংস সংরক্ষিত হয়েছে',
            'data'    => [
                'site_name'           => $settings->site_name,
                'site_title'          => $settings->site_title,
                'favicon_url'         => $settings->favicon_url,
                'dashboard_logo_url'  => $settings->dashboard_logo_url,
            ],
        ]);
    }
}
