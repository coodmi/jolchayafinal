<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DiscountOfferController extends Controller
{
    public function index()
    {
        $offers = DiscountOffer::orderBy('order')->get();
        return response()->json($offers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'metric' => 'nullable|string|max:50',
            'badge' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/offers'), $imageName);
            $data['image_url'] = '/images/offers/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }

        $offer = DiscountOffer::create($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $offer]);
    }

    public function update(Request $request, $id)
    {
        $offer = DiscountOffer::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'metric' => 'nullable|string|max:50',
            'badge' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($offer->image_url && File::exists(public_path($offer->image_url))) {
                File::delete(public_path($offer->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/offers'), $imageName);
            $data['image_url'] = '/images/offers/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }

        $offer->update($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $offer]);
    }

    public function destroy($id)
    {
        $offer = DiscountOffer::findOrFail($id);

        // Delete image
        if ($offer->image_url && File::exists(public_path($offer->image_url))) {
            File::delete(public_path($offer->image_url));
        }

        $offer->delete();
        cache()->forget('landing_v3');
        return response()->json(['success' => true]);
    }
}
