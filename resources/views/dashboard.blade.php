<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <iframe class="ds-youtube-player" frameborder="0" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" title="Let’s try these tiny coconuts! - Superbeginner Spanish" width="640" height="360" src="https://www.youtube.com/embed/hr2__GoU0B4?autoplay=1&amp;playsinline=1&amp;end=283&amp;rel=0&amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.dreamingspanish.com&amp;widgetid=3" id="widget4" data-gtm-yt-inspected-6="true"></iframe>
        </div>
    </div>
</x-app-layout>