<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use App\Models\PricingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PricingPlanController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::orderBy('order')->get();
        return response()->json($plans);
    }

    public function getSettings()
    {
        $settings = PricingSetting::first();
        return response()->json($settings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'plot_size' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'features' => 'nullable|array',
            'is_popular' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'image1_path' => 'nullable|string|max:500',
            'image2_path' => 'nullable|string|max:500',
        ]);
        
        // Ensure is_active defaults to true for new plans
        if (!isset($data['is_active'])) {
            $data['is_active'] = true;
        }

        $plan = PricingPlan::create($data);
        return response()->json(['success' => true, 'data' => $plan]);
    }

    public function update(Request $request, $id)
    {
        $plan = PricingPlan::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'plot_size' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'features' => 'nullable|array',
            'is_popular' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'image1_path' => 'nullable|string|max:500',
            'image2_path' => 'nullable|string|max:500',
        ]);
        
        // Ensure is_active defaults to true if not set
        if (!isset($data['is_active'])) {
            $data['is_active'] = true;
        }

        $plan->update($data);
        return response()->json(['success' => true, 'data' => $plan]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'plan_id' => 'nullable|integer',
            'image_field' => 'required|in:image1,image2',
        ]);

        $path = $request->file('image')->store('pricing', 'public');
        $url = '/storage/' . $path;

        return response()->json([
            'success' => true,
            'path' => $url,
            'message' => 'Image uploaded successfully'
        ]);
    }

    public function destroy($id)
    {
        $plan = PricingPlan::findOrFail($id);
        
        // Delete associated images
        if ($plan->image1_path && str_starts_with($plan->image1_path, '/storage/')) {
            $path = str_replace('/storage/', '', $plan->image1_path);
            Storage::disk('public')->delete($path);
        }
        if ($plan->image2_path && str_starts_with($plan->image2_path, '/storage/')) {
            $path = str_replace('/storage/', '', $plan->image2_path);
            Storage::disk('public')->delete($path);
        }
        
        $plan->delete();
        return response()->json(['success' => true]);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'section_title' => 'nullable|string|max:255',
            'section_subtitle' => 'nullable|string',
            'installment_title' => 'nullable|string|max:255',
            'installment_options' => 'nullable|array',
        ]);

        $settings = PricingSetting::firstOrCreate([]);
        $settings->update($data);
        
        return response()->json(['success' => true, 'data' => $settings]);
    }
}
