<header class="py-4">
    <h1 class="w-full mx-auto text-3xl font-semibold text-center">
        Groovy Gecko
    </h1>
    <div class="flex flex-row items-center justify-center mt-4 space-x-4">
        <a href="{{ route('videos.index') }}"
            class="px-4 py-1 bg-gray-300 border border-gray-400 rounded-lg cursor-pointer hover:opacity-80">
            All Videos
        </a>
        <a href="{{ route('videos.join') }}"
            class="px-4 py-1 bg-gray-300 border border-gray-400 rounded-lg cursor-pointer hover:opacity-80">
            Join Videos
        </a>
        <a href="{{ route('videos.transcode') }}" class="px-4 py-1 bg-gray-300 border border-gray-400 rounded-lg cursor-pointer hover:opacity-80">
            Transcode Videos
        </a>
    </div>
</header>
