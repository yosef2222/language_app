<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function update(Request $request, $videoId)
    {
        $validatedData = $request->validate([
            'duration_watched' => 'required|integer|min:0', // Validate duration watched
        ]);

        // Find or create progress record for the user and video
        $progress = Progress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'video_id' => $videoId,
            ],
            [
                'duration_watched' => $validatedData['duration_watched'],
            ]
        );

        // Optionally, you can return a response or redirect back
        return response()->json(['message' => 'Progress updated successfully']);
    }

    public function watchedTime()
    {
        $user = Auth::user();

        if ($user) {
            $totalSeconds = Progress::where('user_id', $user->id)->sum('duration_watched');
            $hours = floor($totalSeconds / 3600);
            $minutes = floor(($totalSeconds % 3600) / 60);

            return view('progress.watched-time', compact('hours', 'minutes'));
        }

        return redirect()->route('login');
    }
}
