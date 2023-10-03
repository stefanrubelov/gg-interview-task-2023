<div class="">
    <main class="w-full h-full mt-4">
        <div class="flex flex-col items-center justify-center w-1/3 mx-auto">
            <ul
                class="w-full p-4 mx-auto mt-10 space-y-2 border border-gray-300 divide-y divide-gray-300">
                @foreach ($videos as $video)
                    <li x-data="{ showVideo: false }" class="flex items-center justify-center text-lg">
                        <p @click="showVideo = !showVideo" @click.away="showVideo = false" class="cursor-pointer hover:opacity-75">
                            Video name:  {{ basename($video) }}
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
        </div>
    </main>
</div>
    