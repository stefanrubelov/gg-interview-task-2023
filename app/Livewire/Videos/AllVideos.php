<?php

namespace App\Livewire\Videos;

use Livewire\Component;
use App\Services\VideoService;

class AllVideos extends Component
{
    public function render(VideoService $videoService)
    {
        $videos = $videoService->getAllVideos();

        return view('livewire.videos.all-videos', [
            'videos' => $videos
        ])->layout('layouts.videos-layout');
    }
}
