<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'youtube_id' => 'required|unique:videos',
            'title' => 'required',
            'channel_id' => 'required',
            'channel_title' => 'required',
        ]);

        Video::create($request->all());

        return redirect()->route('videos.index')->with('success', 'Video created successfully.');
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'youtube_id' => 'required|unique:videos,youtube_id,' . $video->id,
            'title' => 'required',
            'channel_id' => 'required',
            'channel_title' => 'required',
        ]);

        $video->update($request->all());

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}

