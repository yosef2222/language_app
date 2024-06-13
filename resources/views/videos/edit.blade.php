@extends('layout')

@section('content')
    <h1>Edit Video</h1>
    <form action="{{ route('videos.update', $video->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="youtube_id">YouTube ID:</label>
            <input type="text" name="youtube_id" id="youtube_id" value="{{ $video->youtube_id }}" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $video->title }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $video->description }}</textarea>
        </div>
        <div>
            <label for="thumbnail_url">Thumbnail URL:</label>
            <input type="text" name="thumbnail_url" id="thumbnail_url" value="{{ $video->thumbnail_url }}">
        </div>
        <div>
            <label for="duration">Duration (seconds):</label>
            <input type="number" name="duration" id="duration" value="{{ $video->duration }}">
        </div>
        <div>
            <label for="channel_id">Channel ID:</label>
            <input type="text" name="channel_id" id="channel_id" value="{{ $video->channel_id }}" required>
        </div>
        <div>
            <label for="channel_title">Channel Title:</label>
            <input type="text" name="channel_title" id="channel_title" value="{{ $video->channel_title }}" required>
        </div>
        <div>
            <label for="published_at">Published At:</label>
            <input type="datetime-local" name="published_at" id="published_at" value="{{ $video->published_at ? $video->published_at->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div>
            <button type="submit">Update Video</button>
        </div>
    </form>
@endsection
