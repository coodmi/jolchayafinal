<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class OurProjectController extends Controller
{
    /**
     * Get all projects
     */
    public function index()
    {
        $projects = OurProject::where('is_active', true)
            ->orderByDesc('created_at')
            ->get()
            ->unique('id')
            ->values()
            ->map(function ($project) {
                if ($project->image_path) {
                    // Check if path starts with http (external URL) or / (absolute path)
                    if (strpos($project->image_path, 'http') === 0 || strpos($project->image_path, '/') === 0) {
                        $project->image_url = $project->image_path;
                    } else {
                        // Use relative path for local storage
                        $project->image_url = '/storage/' . ltrim($project->image_path, '/');
                    }
                }
                return $project;
            });

        return response()->json($projects);
    }

    /**
     * Store a new project
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['title', 'description', 'cta_text', 'cta_link', 'order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('projects', 'public');
                $data['image_path'] = $path;
            } catch (\Exception $e) {
                \Log::error('Image upload failed', ['error' => $e->getMessage()]);
                return response()->json(['success' => false, 'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()], 500);
            }
        }

        // Handle multiple images
        $extraImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                try {
                    $extraImages[] = $img->store('projects', 'public');
                } catch (\Exception $e) {}
            }
        }
        if (!empty($extraImages)) {
            $data['images'] = $extraImages;
        }

        try {
            $project = OurProject::create($data);
            $project->refresh();
            
            // Clear cache
            cache()->forget('landing_v3');
            cache()->forget('projects_page_v1');

            return response()->json([
                'success' => true,
                'message' => 'প্রজেক্ট সফলভাবে যুক্ত হয়েছে',
                'data' => [
                    'id' => $project->id,
                    'title' => $project->title ?? '',
                    'description' => $project->description ?? '',
                    'image_url' => $project->image_url ?? null,
                    'image_path' => $project->image_path ?? null,
                    'images' => $project->images ?? [],
                    'cta_text' => $project->cta_text ?? 'বিস্তারিত জানুন',
                    'cta_link' => $project->cta_link ?? '#contact',
                    'order' => $project->order ?? 0,
                    'is_active' => $project->is_active ?? true,
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Project creation failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'প্রজেক্ট তৈরি ব্যর্থ: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a project
     */
    public function update(Request $request, $id)
    {
        $project = OurProject::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['title', 'description', 'cta_text', 'cta_link', 'order']);

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                // Delete old image
                if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
                    Storage::disk('public')->delete($project->image_path);
                }
                $data['image_path'] = $request->file('image')->store('projects', 'public');
            } catch (\Exception $e) {
                \Log::error('Image update failed', ['error' => $e->getMessage()]);
                return response()->json(['success' => false, 'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()], 500);
            }
        }

        // Handle multiple images
        if ($request->hasFile('images')) {
            $extraImages = $project->images ?? [];
            foreach ($request->file('images') as $img) {
                try {
                    $extraImages[] = $img->store('projects', 'public');
                } catch (\Exception $e) {}
            }
            $data['images'] = $extraImages;
        }

        try {
            $project->update($data);
            $project->refresh();
            
            // Clear cache
            cache()->forget('landing_v3');
            cache()->forget('projects_page_v1');

            return response()->json([
                'success' => true,
                'message' => 'প্রজেক্ট সফলভাবে আপডেট হয়েছে',
                'data' => [
                    'id' => $project->id,
                    'title' => $project->title ?? '',
                    'description' => $project->description ?? '',
                    'image_url' => $project->image_url ?? null,
                    'image_path' => $project->image_path ?? null,
                    'images' => $project->images ?? [],
                    'cta_text' => $project->cta_text ?? 'বিস্তারিত জানুন',
                    'cta_link' => $project->cta_link ?? '#contact',
                    'order' => $project->order ?? 0,
                    'is_active' => $project->is_active ?? true,
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Project update failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'প্রজেক্ট আপডেট ব্যর্থ: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove a single extra image from a project
     */
    public function removeImage(Request $request, $id)
    {
        $project = OurProject::findOrFail($id);
        $imgPath = $request->input('image_path');
        $images = $project->images ?? [];
        $images = array_values(array_filter($images, fn($p) => $p !== $imgPath));
        $project->update(['images' => $images]);
        try {
            if (Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
        } catch (\Exception $e) {}
        return response()->json(['success' => true]);
    }

    /**
     * Delete a project
     */
    public function destroy($id)
    {
        try {
            $project = OurProject::findOrFail($id);

            // Delete image file if exists
            if ($project->image_path) {
                try {
                    // Try using Storage facade first
                    if (Storage::disk('public')->exists($project->image_path)) {
                        Storage::disk('public')->delete($project->image_path);
                    }
                } catch (\Exception $e) {
                    // Fallback: try direct file deletion
                    try {
                        $imagePath = storage_path('app/public/' . $project->image_path);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    } catch (\Exception $e2) {
                        \Log::warning('Could not delete project image: ' . $e2->getMessage());
                    }
                }
            }

            $project->delete();
            
            // Clear cache
            cache()->forget('landing_v3');
            cache()->forget('projects_page_v1');

            return response()->json([
                'success' => true,
                'message' => 'প্রজেক্ট সফলভাবে মুছে ফেলা হয়েছে'
            ]);
        } catch (\Exception $e) {
            \Log::error('Project deletion failed', ['error' => $e->getMessage(), 'project_id' => $id]);
            return response()->json([
                'success' => false,
                'message' => 'প্রজেক্ট মুছে ফেলা ব্যর্থ: ' . $e->getMessage()
            ], 500);
        }
    }
}
