<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($testimonial) {
                if ($testimonial->image_path) {
                    // Check if path starts with http (external URL) or / (absolute path)
                    if (strpos($testimonial->image_path, 'http') === 0 || strpos($testimonial->image_path, '/') === 0) {
                        $testimonial->image_url = $testimonial->image_path;
                    } else {
                        // Use relative path for local storage
                        $testimonial->image_url = asset('storage/' . $testimonial->image_path);
                    }
                }
                return $testimonial;
            });
        
        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        // Convert is_active to boolean if it's a string
        $isActive = $validated['is_active'] ?? true;
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), ['1', 'true', 'on', 'yes']);
        }
        
        $testimonial = Testimonial::create([
            'avatar' => $validated['avatar'] ?? '',
            'image_path' => $imagePath,
            'name' => $validated['name'],
            'title' => $validated['title'],
            'quote' => $validated['quote'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $isActive,
        ]);

        // Clear cache after creation
        cache()->forget('landing_v3');
        cache()->forget('about_page_v1');

        // Add image URL to response using model accessor
        $testimonial->image_url = $testimonial->image_url;

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে যোগ করা হয়েছে',
            'testimonial' => $testimonial
        ]);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'avatar' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
                try {
                    Storage::disk('public')->delete($testimonial->image_path);
                } catch (\Throwable $e) {}
            }
            $imagePath = $request->file('image')->store('testimonials', 'public');
            $validated['image_path'] = $imagePath;
        }

        unset($validated['image']);
        
        // Convert is_active to boolean if it's a string
        if (isset($validated['is_active']) && is_string($validated['is_active'])) {
            $validated['is_active'] = in_array(strtolower($validated['is_active']), ['1', 'true', 'on', 'yes']);
        }
        
        $testimonial->update($validated);
        
        // Clear cache after update
        cache()->forget('landing_v3');
        cache()->forget('about_page_v1');
        $testimonial->refresh();

        // Add image URL to response using model accessor
        $testimonial->image_url = $testimonial->image_url;

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে আপডেট করা হয়েছে',
            'testimonial' => $testimonial
        ]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        // Delete image if exists
        if ($testimonial->image_path && Storage::disk('public')->exists($testimonial->image_path)) {
            try {
                Storage::disk('public')->delete($testimonial->image_path);
            } catch (\Throwable $e) {}
        }
        
        $testimonial->delete();

        // Clear cache after deletion
        cache()->forget('landing_v3');
        cache()->forget('about_page_v1');

        return response()->json([
            'success' => true,
            'message' => 'মন্তব্য সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
