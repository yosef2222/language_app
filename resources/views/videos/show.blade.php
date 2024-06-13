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
            id="widget{{ $video->id }}"
            data-gtm-yt-inspected-6="true">
    </iframe>
    <a href="{{ route('videos.index') }}">Back to List</a>
@endsection
