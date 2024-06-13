@extends('layout')

@section('content')
    <h1>Add New Video</h1>
    <form action="{{ route('videos.store') }}" method="POST">
        @csrf
        <div>
            <label for="youtube_id">YouTube ID:</label>
            <input type="text" name="youtube_id" id="youtube_id" required>
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="thumbnail_url">Thumbnail URL:</label>
            <input type="text" name="thumbnail_url" id="thumbnail_url">
        </div>
        <div>
            <label for="duration">Duration (seconds):</label>
            <input type="number" name="duration" id="duration">
        </div>
        <div>
            <label for="channel_id">Channel ID:</label>
            <input type="text" name="channel_id" id="channel_id" required>
        </div>
        <div>
            <label for="channel_title">Channel Title:</label>
            <input type="text" name="channel_title" id="channel_title" required>
        </div>
        <div>
            <label for="published_at">Published At:</label>
            <input type="datetime-local" name="published_at" id="published_at">
        </div>
        <div>
            <button type="submit">Add Video</button>
        </div>
    </form>
@endsection
