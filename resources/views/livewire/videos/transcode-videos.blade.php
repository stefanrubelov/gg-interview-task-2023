<div>
    <main class="w-full h-full mt-4">
        <div class="flex flex-col items-center justify-center w-1/3 mx-auto">
            <ul class="w-full p-4 mx-auto mt-10 space-y-2 border border-gray-300 divide-y divide-gray-300">
                @foreach ($videos as $video)
                    <li x-data="{ showVideo: false, showEdit: false }" class="w-full py-1.5 text-lg flex flex-col items-center justify-center">
                        <div class="flex flex-row items-center justify-between w-full">
                            <p @click="showVideo = !showVideo" @click.away="showVideo = false"
                                class="cursor-pointer hover:opacity-75">
                                Video name: {{ basename($video) }}
                            </p>
                            <button type="button" @click="showEdit = !showEdit" x-show="!showEdit"
                                class="px-4 py-1 bg-gray-300 border border-gray-400 rounded-lg">
                                Edit
                            </button>
                            <div class="w-full px-4 bg-gray-200" x-show="showEdit" x-cloak @video-updated.window="showEdit = false">
                                <div class="flex flex-col">
                                    <div class="flex flex-row items-center justify-end w-full space-x-2">
                                        <div>
                                            <input type="text" wire:model="name" class="rounded-md"
                                                placeholder="New name for video" />
                                        </div>
                                        <button type="button" wire:click="editVideo('{{ basename($video) }}')"
                                            class="px-2 bg-gray-300 border border-gray-400 rounded-md">
                                            Save
                                        </button>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="py-2" x-show="showVideo" x-cloak>
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
