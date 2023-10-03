<div class="">
    <main class="w-full h-full mt-4">
        <div class="flex flex-col items-center justify-center w-1/3 mx-auto">
            @if (count($selectedVideos) > 1)
                <button wire:click="handleJoin" class="w-1/3 py-1 mx-auto bg-gray-300 border border-gray-400 rounded-lg">
                    Join selected videos
                </button>
            @endif
            <ul class="w-full p-4 mt-10 space-y-2 border border-gray-300 divide-y divide-gray-300">
                @foreach ($videos as $video)
                    <li x-data="{ showVideo: false }" class="flex flex-col items-center justify-center text-lg" wire:key="{{rand()}}">
                        <div class="flex flex-row items-center">
                            <input type="checkbox" name="" id="" wire:model.live="selectedVideos"
                                value="{{ 'storage/videos/' . basename($video) }}" class="mr-2">
                            <p @click="showVideo = !showVideo" @click.away="showVideo = false"
                                class="cursor-pointer hover:opacity-75">
                                Video name: {{ basename($video) }}
                            </p>
                        </div>
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
