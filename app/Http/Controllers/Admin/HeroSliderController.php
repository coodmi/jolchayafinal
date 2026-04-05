<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroSliderController extends Controller
{
    public function index()
    {
        return response()->json(HeroSlider::ordered()->get());
    }

    private function rules(): array
    {
        return [
            'title'                => 'nullable|string|max:255',
            'subtitle'             => 'nullable|string|max:255',
            'description'          => 'nullable|string',
            'tagline'              => 'nullable|string',
            'primary_button_text'  => 'nullable|string|max:100',
            'primary_button_link'  => 'nullable|string|max:255',
            'secondary_button_text'=> 'nullable|string|max:100',
            'secondary_button_link'=> 'nullable|string|max:255',
            'image'                => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:5120',
            'video_url'            => 'nullable|string|max:500',
            'order'                => 'nullable|integer',
            'is_active'            => 'nullable|boolean',
        ];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/hero'), $imageName);
            $data['image_url'] = '/images/hero/' . $imageName;
        }

        $slider = HeroSlider::create($data);
        cache()->forget('landing_v3');
        return response()->json(['message' => 'Slider created successfully', 'slider' => $slider->fresh()], 201);
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($slider->image_url && file_exists(public_path($slider->image_url))) {
                unlink(public_path($slider->image_url));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/hero'), $imageName);
            $data['image_url'] = '/images/hero/' . $imageName;
        }

        $slider->update($data);
        cache()->forget('landing_v3');
        return response()->json(['message' => 'Slider updated successfully', 'slider' => $slider->fresh()]);
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);
        if ($slider->image_url && file_exists(public_path($slider->image_url))) {
            unlink(public_path($slider->image_url));
        }
        $slider->delete();
        cache()->forget('landing_v3');
        return response()->json(['message' => 'Slider deleted successfully']);
    }
}
