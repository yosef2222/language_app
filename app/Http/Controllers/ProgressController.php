<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function update(Request $request, $videoId)
    {
        // Fetch the video details to get the duration
        $video = Video::findOrFail($videoId);

        // Validate that the video has a duration attribute and it's an integer
        if (!isset($video->duration) || !is_int($video->duration)) {
            return response()->json(['error' => 'Invalid video duration'], 400);
        }

        $durationWatched = $video->duration;

        // Find or create progress record for the user and video
        $progress = Progress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'video_id' => $videoId,
            ],
            [
                'duration_watched' => $durationWatched,
            ]
        );

        // Return a JSON response indicating success
        return redirect()->route('dashboard');
    }

    public function watchedTime()
    {
        $user = Auth::user();

        if ($user) {
            $totalSeconds = Progress::where('user_id', $user->id)->sum('duration_watched');
            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);

            return view('dashboard', compact('hours', 'minutes'));
        }

        return redirect()->route('login');
    }
}
