@extends('layout')

@section('content')
    <h1>{{ $video->title }}</h1>
    <p>{{ $video->description }}</p>
    @if ($video->thumbnail_url)
        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" style="max-width:100%;">
    @endif
    <p>Duration: {{ gmdate('H:i:s', $video->duration) }}</p>
    <p>Channel: {{ $video->channel_title }}</p>
    <p>Published At: {{ $video->published_at }}</p>
    <iframe class="ds-youtube-player"
            frameborder="0"
            allowfullscreen=""
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            title="{{ $video->title }}"
            width="640"
            height="360"
            src="https://www.youtube.com/embed/{{ $video->youtube_id }}?autoplay=0&amp;playsinline=1&amp;end={{ $video->duration }}&amp;rel=0&amp;enablejsapi=1&amp;origin={{ url('/') }}&amp;widgetid=3"
            id="videoPlayer"
            data-gtm-yt-inspected-6="true">
    </iframe>
    <button id="addToProgress" style="margin-top: 20px;">Add to Progress</button>
    <a href="{{ route('videos.index') }}">Back to List</a>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const videoElement = document.getElementById('videoPlayer');
            const addToProgressButton = document.getElementById('addToProgress');

            addToProgressButton.addEventListener('click', function () {
                console.log('Add to Progress button clicked');
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let videoId = '{{ $video->id }}';

                fetch(`/progress/${videoId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        duration_watched: {{ $video->duration }} // Send the entire duration of the video
                    }),
                    credentials: 'same-origin'
                })
                    .then(response => {
                        if (!response.ok) {
                            console.error('Network response was not ok');
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Progress updated successfully', data);
                        alert('Progress updated successfully!');
                    })
                    .catch(error => {
                        console.error('Error updating progress:', error);
                    });
            });
        });
    </script>
@endsection
