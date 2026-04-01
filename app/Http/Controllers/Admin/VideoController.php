<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
      public function index()
    {
        $videos = Video::orderBy('order')->get()->map(function($video) {
            return [
                'id' => $video->id,
                'title' => $video->title,
                'description' => $video->description,
                'url' => $video->url,
                'poster_path' => $video->poster ? asset('storage/' . $video->poster) : null,
                'order' => $video->order,
                'is_active' => $video->is_active,
            ];
        });
        
        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json($videos);
        }
        
        return view('admin.videos.index', ['videos' => Video::latest()->get()]);
    }

     public function create()
    {
        return view('admin.videos.create');
    }

    // public function create()
    // {   $latestVideo = Video::latest()->first();
    //     return view('admin.videoSection',compact('latestVideo'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'nullable',
            'poster'        => 'required|image|max:5000',
            'url'           => 'required|url',
            'order'         => 'nullable|integer',
            'is_active'     => 'nullable|boolean',
        ]);

        // Upload poster
        $poster_path = $request->file('poster')->store('videos', 'public');

        // Get next order if not provided
        $order = $request->order ?? (Video::max('order') ?? 0) + 1;

        $video = Video::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'poster'        => $poster_path,
            'url'           => $request->url,
            'order'         => $order,
            'is_active'     => $request->is_active ?? true,
        ]);

        // Clear cache
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'ভিডিও সফলভাবে যোগ করা হয়েছে',
                'data' => [
                    'id' => $video->id,
                    'title' => $video->title,
                    'description' => $video->description,
                    'url' => $video->url,
                    'poster_path' => $video->poster ? asset('storage/' . $video->poster) : null,
                    'order' => $video->order,
                    'is_active' => $video->is_active,
                ]
            ]);
        }

        return redirect()->route('admin.videos.index')->with('success', 'ভিডিও সফলভাবে যোগ করা হয়েছে');
    }
     public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

        public function update(Request $request, Video $video)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'nullable',
            'poster'        => 'nullable|image|max:5000',
            'url'           => 'required|url',
            'order'         => 'nullable|integer',
            'is_active'     => 'nullable|boolean',
        ]);

        // Upload new poster if exists
        if ($request->hasFile('poster')) {

            // Delete old poster
            if ($video->poster && Storage::disk('public')->exists($video->poster)) {
                Storage::disk('public')->delete($video->poster);
            }

            $video->poster = $request->file('poster')->store('videos/posters', 'public');
        }

        $video->title = $request->title;
        $video->description = $request->description;
        $video->url   = $request->url;
        if ($request->has('order')) {
            $video->order = $request->order;
        }
        if ($request->has('is_active')) {
            $video->is_active = $request->is_active;
        }
        $video->save();

        // Clear cache
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'ভিডিও সফলভাবে আপডেট হয়েছে!',
                'data' => [
                    'id' => $video->id,
                    'title' => $video->title,
                    'description' => $video->description,
                    'url' => $video->url,
                    'poster_path' => $video->poster ? asset('storage/' . $video->poster) : null,
                    'order' => $video->order,
                    'is_active' => $video->is_active,
                ]
            ]);
        }

        return redirect()->route('admin.videos.index')
            ->with('success', 'ভিডিও সফলভাবে আপডেট হয়েছে!');
    }

       public function destroy(Video $video)
    {
        // Delete poster
        if ($video->poster && Storage::disk('public')->exists($video->poster)) {
            Storage::disk('public')->delete($video->poster);
        }

        $video->delete();

        // Clear cache
        cache()->forget('landing_v3');

        // Return JSON if requested via AJAX
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'ভিডিও সফলভাবে মুছে ফেলা হয়েছে!'
            ]);
        }

        return redirect()->route('admin.videos.index')
            ->with('success', 'ভিডিও সফলভাবে মুছে ফেলা হয়েছে!');
    }

}
