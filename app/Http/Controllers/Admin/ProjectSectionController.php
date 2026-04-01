<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectSectionController extends Controller
{
    /**
     * Get all sections or specific section by key
     */
    public function index(Request $request)
    {
        if ($request->has('section_key')) {
            $section = ProjectSection::where('section_key', $request->section_key)->first();
            return response()->json($section);
        }

        $sections = ProjectSection::all();
        return response()->json($sections);
    }

    /**
     * Store or update a section
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_key' => 'required|string|max:50',
            'title' => 'nullable|string|max:500',
            'subtitle' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'extra_data' => 'nullable|string',
            'is_active' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->except(['image', 'logo']);

        // Convert extra_data from JSON string to array if needed
        if (isset($data['extra_data']) && is_string($data['extra_data'])) {
            $data['extra_data'] = json_decode($data['extra_data'], true);
        }

        // Convert is_active to boolean
        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/projects'), $imageName);
            $data['image_url'] = '/images/projects/' . $imageName;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/projects'), $logoName);
            $data['logo_url'] = '/images/projects/' . $logoName;
        }

        // Update or create
        $section = ProjectSection::updateOrCreate(
            ['section_key' => $request->section_key],
            $data
        );

        // Clear all related caches
        cache()->forget('landing_v3');
        cache()->forget('projects_page_v1');
        cache()->forget('news_page_v1');
        cache()->flush(); // Clear all cache to ensure update is visible

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে সংরক্ষিত হয়েছে',
            'data' => $section
        ]);
    }

    /**
     * Delete a section
     */
    public function destroy($id)
    {
        $section = ProjectSection::findOrFail($id);

        // Delete image if exists
        if ($section->image_url && file_exists(public_path($section->image_url))) {
            unlink(public_path($section->image_url));
        }

        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
