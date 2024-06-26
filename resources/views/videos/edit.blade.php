<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-6">Edit Video</h1>
        <form action="{{ route('videos.update', $video->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="youtube_id" class="block text-sm font-medium text-gray-700">YouTube ID</label>
                <input type="text" name="youtube_id" id="youtube_id" value="{{ $video->youtube_id }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $video->title }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $video->description }}</textarea>
            </div>

            <div>
                <label for="thumbnail_url" class="block text-sm font-medium text-gray-700">Thumbnail URL</label>
                <input type="text" name="thumbnail_url" id="thumbnail_url" value="{{ $video->thumbnail_url }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (seconds)</label>
                <input type="number" name="duration" id="duration" value="{{ $video->duration }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" name="category" id="category" value="{{ $video->category }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <input type="text" name="level" id="level" value="{{ $video->level }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Video</button>
            </div>
        </form>
    </div>
</x-app-layout>
