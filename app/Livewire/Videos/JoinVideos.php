<?php

namespace App\Livewire\Videos;

use PDO;
use FFMpeg\FFMpeg;
use Livewire\Component;
use FFMpeg\Format\Video\X264;
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

        $format = new X264();
        $format
            ->setVideoCodec('libx264')
            ->setKiloBitrate(736)
            ->setAudioKiloBitrate(256)
            ->setAudioChannels(2);

        $video
            ->concat($this->selectedVideos)
            ->saveFromDifferentCodecs($format, 'storage/videos/video_' . time() . '.mp4');

        $this->selectedVideos = [];
    }
}
