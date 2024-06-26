<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Main Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl font-bold mb-4">Watched Time</h1>
                    <div class="text-6xl font-extrabold">{{ $hours }} hours {{ $minutes }} minutes</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
