<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WhyChooseController extends Controller
{
    public function index()
    {
        $items = WhyChoose::orderBy('order')->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/why-choose'), $imageName);
            $data['icon_url'] = '/images/why-choose/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }

        $item = WhyChoose::create($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function update(Request $request, $id)
    {
        $item = WhyChoose::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($item->icon_url && File::exists(public_path($item->icon_url))) {
                File::delete(public_path($item->icon_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/why-choose'), $imageName);
            $data['icon_url'] = '/images/why-choose/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }

        $item->update($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function destroy($id)
    {
        $item = WhyChoose::findOrFail($id);

        if ($item->icon_url && File::exists(public_path($item->icon_url))) {
            File::delete(public_path($item->icon_url));
        }

        $item->delete();
        cache()->forget('landing_v3');
        return response()->json(['success' => true]);
    }
}
