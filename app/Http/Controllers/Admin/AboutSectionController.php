<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutSectionController extends Controller
{
    /**
     * Get all sections or specific section by key
     */
    public function index(Request $request)
    {
        if ($request->has('section_key')) {
            // Don't use cache for real-time updates
            $section = AboutSection::where('section_key', $request->section_key)->first();
            
            return response()->json($section)
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }
        
        // Don't use cache for real-time updates
        $sections = AboutSection::all();
        
        return response()->json($sections)
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
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
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'extra_data' => 'nullable|json',
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
            
            // Ensure directory exists
            $uploadPath = public_path('images/about');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $data['image_url'] = '/images/about/' . $imageName;
        }

        // Update or create
        $section = AboutSection::updateOrCreate(
            ['section_key' => $request->section_key],
            $data
        );

        // Clear all related cache
        cache()->forget('about_section_' . $request->section_key);
        cache()->forget('about_sections_all');
        cache()->forget('about_page_v1');
        cache()->forget('about_page_v2');
        cache()->forget('landing_v3');
        
        // Clear team member cache if board title is updated
        if ($request->section_key === 'board_title') {
            cache()->forget('team_members_founder_frontend');
            cache()->forget('team_members_founder_admin');
        }

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে সংরক্ষিত হয়েছে',
            'data' => $section
        ]);
    }

    /**
     * Update a specific section
     */
    public function update(Request $request, $id)
    {
        $section = AboutSection::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:500',
            'subtitle' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'extra_data' => 'nullable|json',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($section->image_url && file_exists(public_path($section->image_url))) {
                unlink(public_path($section->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Ensure directory exists
            $uploadPath = public_path('images/about');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $data['image_url'] = '/images/about/' . $imageName;
        }

        // Update section
        $section->update($data);

        // Clear all related cache
        cache()->forget('about_section_' . $section->section_key);
        cache()->forget('about_sections_all');
        cache()->forget('about_page_v1');
        cache()->forget('about_page_v2');
        cache()->forget('landing_v3');

        return response()->json([
            'success' => true,
            'message' => 'সেকশন সফলভাবে আপডেট হয়েছে',
            'data' => $section
        ]);
    }

    /**
     * Delete a section
     */
    public function destroy($id)
    {
        $section = AboutSection::findOrFail($id);

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
