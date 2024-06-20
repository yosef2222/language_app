@extends('layout')

@section('content')
    <h1>Videos</h1>
    <a href="{{ route('videos.create') }}">Add New Video</a>
    @if ($videos->isEmpty())
        <p>No videos available.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>
                        <a href="{{ route('videos.show', $video->id) }}">
                            <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" style="width: 150px; height: auto;">
                        </a>
                    </td>
                    <td>{{ $video->title }}</td>
                    <td>
                        <a href="{{ route('videos.show', $video->id) }}">View</a>
                        <a href="{{ route('videos.edit', $video->id) }}">Edit</a>
                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
