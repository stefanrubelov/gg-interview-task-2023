<?php

namespace App\Livewire\Videos;

use PDO;
use FFMpeg\FFMpeg;
use Livewire\Component;
use App\Services\VideoService;
use Illuminate\Support\Facades\Storage;

class JoinVideos extends Component
{
    public $selectedVideos = [];

    public function render(VideoService $videoService)
    {
        $videos = $videoService->getAllVideos();

        return view('livewire.videos.join-videos', [
            'videos' => $videos
        ])->layout('layouts.videos-layout');
    }

    public function handleJoin()
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($this->selectedVideos[0]);
        array_shift($this->selectedVideos);

        $video
            ->concat($this->selectedVideos)
            ->saveFromSameCodecs('storage/videos/video_' . time() . '.mp4', true);
    }
}
