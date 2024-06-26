<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $video->title }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-6">{{ $video->title }}</h1>
        <p class="mb-4">{{ $video->description }}</p>

        <div class="mb-6">
            <iframe class="w-full"
                    frameborder="0"
                    allowfullscreen=""
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    title="{{ $video->title }}"
                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}?autoplay=0&amp;playsinline=1&amp;end={{ $video->duration }}&amp;rel=0&amp;enablejsapi=1&amp;origin={{ url('/') }}&amp;widgetid=3"
                    id="videoPlayer"
                    style="height: 480px;">
            </iframe>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 space-y-6">
            <form action="{{ route('progress.update', $video->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="duration_watched" class="block text-sm font-medium text-gray-700">Duration Watched (seconds):</label>
                    <input type="number" name="duration_watched" id="duration_watched" value="{{ $video->duration }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                    <input type="hidden" name="duration_watched" value="{{ $video->duration }}">
                </div>
                <div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Progress</button>
                </div>
            </form>

            <div class="text-center lg:text-left">
                <p class="mb-2 text-lg"><strong>Duration:</strong> {{ gmdate('H:i:s', $video->duration) }}</p>
            </div>

            <div class="text-center lg:text-left space-y-4">
                <a href="{{ route('videos.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back to List</a>

                <a href="{{ route('videos.edit', $video->id) }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit Video</a>

                <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete Video</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
