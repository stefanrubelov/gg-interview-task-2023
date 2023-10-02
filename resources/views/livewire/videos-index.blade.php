<div class="w-full h-screen bg-gray-200">
    <header class="py-4">
        <h1 class="w-full mx-auto text-3xl font-semibold text-center">Groovy Gecko</h1>
    </header>
    <main class="w-full h-full">
        <ul
            class="flex flex-col items-center justify-center w-1/3 p-4 mx-auto mt-10 space-y-2 border border-gray-300 divide-y divide-gray-300">
            @foreach ($videos as $video)
                <li x-data="{ showVideo: false }" class="text-lg text-left">
                    <p @click="showVideo = !showVideo" @click.away="showVideo = false" class="cursor-pointer hover:opacity-75">
                        Video name placeholder: video
                        {{ $loop->iteration }}
                    </p>
                    <div x-show="showVideo" x-cloak>
                        <video controls>
                            <source src="{{ $video }}" type="video/mp4" />
                            Your browser does not support HTML video.
                        </video>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>
</div>
    