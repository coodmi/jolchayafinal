<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderSettingController extends Controller
{
    public function index()
    {
        // Don't use cache for real-time updates
        $settings = HeaderSetting::first();
        if (!$settings) {
            return response()->json(['error' => 'No header settings found'], 404);
        }
        return response()->json($settings)
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'logo_url' => ['nullable', 'string', 'max:2048'],
            'logo_data_url' => ['nullable', 'string'],
            'brand_text' => ['nullable', 'string', 'max:255'],
            'home_label' => ['nullable', 'string', 'max:255'],
            'about_label' => ['nullable', 'string', 'max:255'],
            'features_label' => ['nullable', 'string', 'max:255'],
            'pricing_label' => ['nullable', 'string', 'max:255'],
            'testimonials_label' => ['nullable', 'string', 'max:255'],
            'other_projects_label' => ['nullable', 'string', 'max:255'],
            'news_label' => ['nullable', 'string', 'max:255'],
            'contact_label' => ['nullable', 'string', 'max:255'],
            'cta_text' => ['nullable', 'string', 'max:255'],
            'cta_href' => ['nullable', 'string', 'max:2048'],
            'hero_tagline' => ['nullable', 'string', 'max:500'],
            'logo_image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:7168'], // 7 MB = 7168 KB - Supports any resolution
        ]);

        $headerSetting = HeaderSetting::firstOrCreate([]);
        $headerSetting->fill($data);
        // Always clear stale base64 data URL — use file path instead
        $headerSetting->logo_data_url = null;

        // Handle logo file upload
        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('header', 'public');
            // Delete old logo if exists
            if ($headerSetting->logo_image_path && Storage::disk('public')->exists($headerSetting->logo_image_path)) {
                try {
                    Storage::disk('public')->delete($headerSetting->logo_image_path);
                } catch (\Throwable $e) {
                    // Ignore errors
                }
            }
            $headerSetting->logo_image_path = $path;
            $headerSetting->logo_data_url = null; // clear stale base64
        }

        $headerSetting->save();

        // Clear all related caches
        try {
            \Cache::forget('header_settings');
            \Cache::forget('header_settings_all');
            \Cache::flush(); // Clear all cache to ensure logo updates immediately
        } catch (\Exception $e) {
            // Log but don't fail
            \Log::warning('Cache clear failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Header settings saved successfully',
            'data' => $headerSetting
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
          ->header('Pragma', 'no-cache')
          ->header('Expires', '0');
    }
}
