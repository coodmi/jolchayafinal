<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    /**
     * Get all team members by type
     * For admin: returns all members (including inactive)
     * For frontend: returns only active members
     */
    public function index(Request $request)
    {
        $type = $request->get('type'); // 'founder', 'chairman', or 'other'
        $admin = $request->get('admin', false); // Check if admin request
        
        // Convert string '1' to boolean
        if (is_string($admin)) {
            $admin = in_array(strtolower($admin), ['1', 'true', 'on', 'yes']);
        }
        
        // For admin requests, don't use cache to ensure real-time updates
        if ($admin) {
            $query = TeamMember::query();
            if ($type) {
                $query->where('type', $type);
            }
            $members = $query->orderBy('order', 'asc')
                ->orderBy('created_at', 'asc')
                ->get()
                ->map(function($member) {
                    $member->image_url = $member->image_url_full ?? $member->image_url;
                    $member->name = $member->name ?? '';
                    $member->position = $member->position ?? '';
                    return $member;
                });
            
            return response()->json($members)
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }
        
        // Always load fresh from database
        $query = TeamMember::query()->where('is_active', true);

        if ($type) {
            $query->where('type', $type);
        }

        $members = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function($member) {
                $member->image_url = $member->image_url_full ?? $member->image_url;
                $member->name = $member->name ?? '';
                $member->position = $member->position ?? '';
                return $member;
            });
        
        return response()->json($members)
            ->header('Cache-Control', 'no-cache, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    /**
     * Store a new team member
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:founder,chairman,other',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable', // Allow string '1' or '0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['type', 'name', 'position', 'content', 'content_2', 'content_3', 'order']);
        
        // Convert is_active to boolean if it's a string
        $isActive = $request->input('is_active', true);
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), ['1', 'true', 'on', 'yes']);
        }
        $data['is_active'] = $isActive;

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('images/team');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_url'] = '/images/team/' . $imageName;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        $member = TeamMember::create($data);
        
        // Clear all related cache
        $this->clearTeamMemberCache($data['type']);
        
        $member->image_url = $member->image_url_full ?? $member->image_url;

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে যুক্ত হয়েছে',
            'data' => $member
        ]);
    }

    /**
     * Update a team member
     */
    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:founder,chairman,other',
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable', // Allow string '1' or '0'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['type', 'name', 'position', 'content', 'content_2', 'content_3', 'order']);
        
        // Convert is_active to boolean if it's a string
        if ($request->has('is_active')) {
            $isActive = $request->input('is_active');
            if (is_string($isActive)) {
                $isActive = in_array(strtolower($isActive), ['1', 'true', 'on', 'yes']);
            }
            $data['is_active'] = $isActive;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($member->image_url && file_exists(public_path($member->image_url))) {
                    unlink(public_path($member->image_url));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                $uploadPath = public_path('images/team');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                $image->move($uploadPath, $imageName);
                $data['image_url'] = '/images/team/' . $imageName;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'ইমেজ আপলোড ব্যর্থ: ' . $e->getMessage()
                ], 500);
            }
        }

        $member->update($data);
        
        // Clear all related cache
        $this->clearTeamMemberCache($member->type);
        
        $member->refresh();
        $member->image_url = $member->image_url_full ?? $member->image_url;

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে আপডেট হয়েছে',
            'data' => $member
        ]);
    }

    /**
     * Delete a team member
     */
    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);

        // Delete image if exists
        if ($member->image_url && file_exists(public_path($member->image_url))) {
            unlink(public_path($member->image_url));
        }

        $type = $member->type;
        $member->delete();
        
        // Clear all related cache
        $this->clearTeamMemberCache($type);

        return response()->json([
            'success' => true,
            'message' => 'টিম মেম্বার সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }

    /**
     * Clear all team member related cache
     */
    private function clearTeamMemberCache($type = null)
    {
        // Clear all team member caches
        $types = $type ? [$type] : ['founder', 'chairman', 'other'];
        
        foreach ($types as $t) {
            Cache::forget('team_members_' . $t . '_frontend');
            Cache::forget('team_members_' . $t . '_admin');
        }
        
        Cache::forget('team_members_all_frontend');
        Cache::forget('team_members_all_admin');
        Cache::forget('about_page_v1');
        Cache::forget('about_page_v2');
        Cache::forget('landing_v3');
        
        // Clear about sections cache for board title
        Cache::forget('about_section_board_title');
        Cache::forget('about_sections_all');
    }
}
