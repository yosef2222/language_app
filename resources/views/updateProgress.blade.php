@extends('layouts.app') {{-- Assuming you have a layout --}}

@section('content')
    <div class="container">
        <h1>Video Player</h1>
        <div>
            <video id="video-player" controls>
                <source src="{{ $videoUrl }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const videoElement = document.getElementById('video-player');

        videoElement.addEventListener('play', function() {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let videoId = '{{ $videoId }}'; // Replace with the actual video ID

            // Send a POST request when the video starts playing
            fetch(`/progress/${videoId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    duration_watched: Math.floor(videoElement.currentTime)
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Progress updated successfully', data);
                })
                .catch(error => {
                    console.error('Error updating progress:', error);
                });
        });
    </script>
@endsection
