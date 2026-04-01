<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of hero sliders
     */
    public function index()
    {
        $sliders = HeroSlider::ordered()->get();
        return response()->json($sliders);
    }

    /**
     * Store a newly created slider
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'primary_button_text' => 'nullable|string|max:100',
            'primary_button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/hero'), $imageName);
            $data['image_url'] = '/images/hero/' . $imageName;
        }

        $slider = HeroSlider::create($data);

        // Clear cache to reflect changes immediately
        cache()->forget('landing_v3');

        return response()->json([
            'message' => 'Slider created successfully',
            'slider' => $slider->fresh() // Return fresh model data
        ], 201);
    }

    /**
     * Update the specified slider
     */
    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'primary_button_text' => 'nullable|string|max:100',
            'primary_button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image_url && file_exists(public_path($slider->image_url))) {
                unlink(public_path($slider->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/hero'), $imageName);
            $data['image_url'] = '/images/hero/' . $imageName;
        }

        $slider->update($data);
        
        // Refresh the model to get updated attributes
        $slider->refresh();

        // Clear cache to reflect changes immediately
        cache()->forget('landing_v3');

        return response()->json([
            'message' => 'Slider updated successfully',
            'slider' => $slider->fresh() // Return fresh model data
        ]);
    }

    /**
     * Remove the specified slider
     */
    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        // Delete image if exists
        if ($slider->image_url && file_exists(public_path($slider->image_url))) {
            unlink(public_path($slider->image_url));
        }

        $slider->delete();

        // Clear cache to reflect changes immediately
        cache()->forget('landing_v3');

        return response()->json([
            'message' => 'Slider deleted successfully'
        ]);
    }

    /**
     * Get active sliders for frontend
     */
    public function getActive()
    {
        $sliders = HeroSlider::active()->ordered()->get();
        return response()->json($sliders);
    }
}
