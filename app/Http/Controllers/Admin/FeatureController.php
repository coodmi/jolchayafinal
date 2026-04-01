<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FeatureSetting;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return response()->json($features);
    }

    public function getSettings()
    {
        $settings = FeatureSetting::first();
        return response()->json($settings);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $feature = Feature::create($data);
        return response()->json(['success' => true, 'data' => $feature]);
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $feature->update($data);
        return response()->json(['success' => true, 'data' => $feature]);
    }

    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return response()->json(['success' => true]);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'section_title' => 'nullable|string|max:255',
            'section_subtitle' => 'nullable|string',
        ]);

        $settings = FeatureSetting::firstOrCreate([]);
        $settings->update($data);
        
        return response()->json(['success' => true, 'data' => $settings]);
    }
}
