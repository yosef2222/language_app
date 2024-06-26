<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Videos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-4">Videos</h1>
        <div class="flex justify-between mb-6">
            <a href="{{ route('videos.create') }}" class="inline-block text-blue-500 hover:text-blue-700">Add New Video</a>
            <div>
                <form action="{{ route('videos.index') }}" method="GET" class="space-x-4">
                    <div class="inline-block">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
                        <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">All</option>
                            <option value="1" @if(request()->input('category') == '1') selected @endif>Category 1</option>
                            <option value="2" @if(request()->input('category') == '2') selected @endif>Category 2</option>
                            <option value="3" @if(request()->input('category') == '3') selected @endif>Category 3</option>
                        </select>
                    </div>
                    <div class="inline-block">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level:</label>
                        <select name="level" id="level" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">All</option>
                            <option value="1" @if(request()->input('level') == '1') selected @endif>Level 1</option>
                            <option value="2" @if(request()->input('level') == '2') selected @endif>Level 2</option>
                            <option value="3" @if(request()->input('level') == '3') selected @endif>Level 3</option>
                        </select>
                    </div>
                    <div class="inline-block">
                        <label for="sort_by" class="block text-sm font-medium text-gray-700">Sort by Date:</label>
                        <select name="sort_by" id="sort_by" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="desc" @if(request()->input('sort_by') == 'desc') selected @endif>Newest First</option>
                            <option value="asc" @if(request()->input('sort_by') == 'asc') selected @endif>Oldest First</option>
                        </select>
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        @if ($videos->isEmpty())
            <p>No videos available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($videos as $video)
                    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-4">
                        <a href="{{ route('videos.show', $video->id) }}">
                            <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="w-full h-auto mb-4">
                        </a>
                        <h2 class="text-xl font-semibold mb-2">{{ $video->title }}</h2>
                        <p>Category: {{ $video->category }}</p>
                        <p>Level: {{ $video->level }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
