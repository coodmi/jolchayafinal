<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('order')->orderByDesc('published_at')->get();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
            'is_featured' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
            $data['image_url'] = '/images/news/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }
        if (isset($data['is_featured'])) {
            $data['is_featured'] = filter_var($data['is_featured'], FILTER_VALIDATE_BOOLEAN);
        }

        $news = News::create($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $news]);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
            'is_featured' => 'nullable',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($news->image_url && File::exists(public_path($news->image_url))) {
                File::delete(public_path($news->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
            $data['image_url'] = '/images/news/' . $imageName;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = filter_var($data['is_active'], FILTER_VALIDATE_BOOLEAN);
        }
        if (isset($data['is_featured'])) {
            $data['is_featured'] = filter_var($data['is_featured'], FILTER_VALIDATE_BOOLEAN);
        }

        $news->update($data);
        cache()->forget('landing_v3');
        return response()->json(['success' => true, 'data' => $news]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image_url && File::exists(public_path($news->image_url))) {
            File::delete(public_path($news->image_url));
        }

        $news->delete();
        cache()->forget('landing_v3');
        return response()->json(['success' => true]);
    }
}
