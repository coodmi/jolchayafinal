<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::ordered()->get();
        return response()->json($partners);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
                'website_url' => 'nullable|url|max:500',
                'type' => 'nullable|string|max:255',
                'is_active' => 'nullable',
                'order' => 'nullable|integer',
            ]);

            $data = [
                'name' => $validated['name'],
                'website_url' => $request->input('website_url') ?? null,
                'type' => $request->input('type') ?? null,
                'is_active' => $request->boolean('is_active'),
                'order' => $request->input('order') ?? (Partner::max('order') ?? 0) + 1,
            ];

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('partners', 'public');
                $data['logo_path'] = $path;
            }

            $partner = Partner::create($data);

            return response()->json([
                'success' => true,
                'message' => 'পার্টনার সফলভাবে যোগ করা হয়েছে',
                'partner' => $partner->fresh()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:2048',
                'website_url' => 'nullable|url|max:500',
                'type' => 'nullable|string|max:255',
                'is_active' => 'nullable',
                'order' => 'nullable|integer',
            ]);

            $data = [
                'name' => $validated['name'],
                'website_url' => $request->input('website_url') ?? null,
                'type' => $request->input('type') ?? null,
                'is_active' => $request->input('is_active') == '1' ? true : false,
                'order' => $request->input('order') ?? $partner->order,
            ];

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
                    Storage::disk('public')->delete($partner->logo_path);
                }
                $path = $request->file('logo')->store('partners', 'public');
                $data['logo_path'] = $path;
            }

            $partner->update($data);

            return response()->json([
                'success' => true,
                'message' => 'পার্টনার সফলভাবে আপডেট করা হয়েছে',
                'partner' => $partner->fresh()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Delete logo if exists
        if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
            Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();

        return response()->json([
            'success' => true,
            'message' => 'পার্টনার সফলভাবে মুছে ফেলা হয়েছে'
        ]);
    }
}
