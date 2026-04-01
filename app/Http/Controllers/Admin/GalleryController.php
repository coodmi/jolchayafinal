<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->get()->map(function($gallery) {
            // Use the model's image_url accessor
            return [
                'id' => $gallery->id,
                'title' => $gallery->title ?? '',
                'title_bn' => $gallery->title_bn ?? '',
                'category' => $gallery->category ?? 'exterior',
                'image_path' => $gallery->image_url ?? null,
                'image_url' => $gallery->image_url ?? null,
                'order' => $gallery->order ?? 0,
            ];
        });
        
        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($galleries);
        }
        
        return view('admin.galleries.index', ['galleries' => Gallery::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_bn' => 'required|string|max:255',
            'category' => 'required|in:exterior,interior,landscape,amenities',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        $imagePath = $request->file('image')->store('galleries', 'public');

        $gallery = Gallery::create([
            'title' => $request->title ?? '',
            'title_bn' => $request->title_bn,
            'category' => $request->category,
            'image' => $imagePath,
            'order' => $request->order ?? 0,
        ]);

        // Clear cache
        cache()->forget('landing_v3');

        // Refresh gallery to get image_url
        $gallery->refresh();

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'গ্যালারি আইটেম সফলভাবে যোগ করা হয়েছে',
                'data' => [
                    'id' => $gallery->id,
                    'title' => $gallery->title ?? '',
                    'title_bn' => $gallery->title_bn ?? '',
                    'category' => $gallery->category ?? 'exterior',
                    'image_path' => $gallery->image_url ?? null,
                    'image_url' => $gallery->image_url ?? null,
                    'order' => $gallery->order ?? 0,
                ]
            ]);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'গ্যালারি আইটেম সফলভাবে যোগ করা হয়েছে');
    }

    public function show(Gallery $gallery)
    {
        $imagePath = filter_var($gallery->image, FILTER_VALIDATE_URL) 
            ? $gallery->image 
            : asset('storage/' . $gallery->image);

        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_bn' => 'required|string|max:255',
            'category' => 'required|in:exterior,interior,landscape,amenities',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'title_bn' => $request->title_bn,
            'category' => $request->category,
            'order' => $request->order ?? $gallery->order,
        ];

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);
        
        // Refresh gallery to get updated image_url
        $gallery->refresh();

        // Clear cache
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'গ্যালারি আইটেম সফলভাবে আপডেট করা হয়েছে',
                'data' => [
                    'id' => $gallery->id,
                    'title' => $gallery->title ?? '',
                    'title_bn' => $gallery->title_bn ?? '',
                    'category' => $gallery->category ?? 'exterior',
                    'image_path' => $gallery->image_url ?? null,
                    'image_url' => $gallery->image_url ?? null,
                    'order' => $gallery->order ?? 0,
                ]
            ]);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'গ্যালারি আইটেম সফলভাবে আপডেট করা হয়েছে');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete image file
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        // Clear cache
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'গ্যালারি আইটেম সফলভাবে মুছে ফেলা হয়েছে'
            ]);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'গ্যালারি আইটেম সফলভাবে মুছে ফেলা হয়েছে');
    }
}
