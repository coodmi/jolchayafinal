<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all()->map(function($amenity) {
            // Check if image is external URL or storage path
            $imagePath = null;
            if ($amenity->image) {
                if (filter_var($amenity->image, FILTER_VALIDATE_URL)) {
                    // It's an external URL
                    $imagePath = $amenity->image;
                } else {
                    // It's a storage path
                    $imagePath = asset('storage/' . $amenity->image);
                }
            }
            
            return [
                'id' => $amenity->id,
                'title' => $amenity->title,
                'description' => $amenity->short_description,
                'image_path' => $imagePath,
            ];
        });
        
        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($amenities);
        }
        
        return view('admin.amenities.index', ['amenities' => Amenity::all()]);
    }

    public function create()
    {
        return view('admin.amenities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('amenities', 'public') : null;

        $amenity = Amenity::create([
            'title' => $request->title,
            'short_description' => $request->input('description') ?? $request->input('short_description'),
            'image' => $imagePath,
        ]);

        // Clear cache to show new amenity on home page
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            $imagePathForResponse = null;
            if ($amenity->image) {
                $imagePathForResponse = filter_var($amenity->image, FILTER_VALIDATE_URL) 
                    ? $amenity->image 
                    : asset('storage/' . $amenity->image);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Amenity added successfully!',
                'data' => [
                    'id' => $amenity->id,
                    'title' => $amenity->title,
                    'description' => $amenity->short_description,
                    'image_path' => $imagePathForResponse,
                ]
            ]);
        }

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity added successfully!');
    }

    public function edit(Amenity $amenity)
    {
        return view('admin.amenities.edit', compact('amenity'));
    }

    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'short_description' => $request->input('description') ?? $request->input('short_description'),
        ];

        // If a new image is uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if ($amenity->image && Storage::disk('public')->exists($amenity->image)) {
                Storage::disk('public')->delete($amenity->image);
            }

            $data['image'] = $request->file('image')->store('amenities', 'public');
        }

        $amenity->update($data);

        // Clear cache to show updated amenity on home page
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            $imagePathForResponse = null;
            if ($amenity->image) {
                $imagePathForResponse = filter_var($amenity->image, FILTER_VALIDATE_URL) 
                    ? $amenity->image 
                    : asset('storage/' . $amenity->image);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Amenity updated successfully!',
                'data' => [
                    'id' => $amenity->id,
                    'title' => $amenity->title,
                    'description' => $amenity->short_description,
                    'image_path' => $imagePathForResponse,
                ]
            ]);
        }

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity updated successfully!');
    }

    public function destroy(Amenity $amenity)
    {
        if ($amenity->image && Storage::disk('public')->exists($amenity->image)) {
            Storage::disk('public')->delete($amenity->image);
        }

        $amenity->delete();

        // Clear cache to remove deleted amenity from home page
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Amenity deleted successfully!'
            ]);
        }

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity deleted successfully!');
    }
}
