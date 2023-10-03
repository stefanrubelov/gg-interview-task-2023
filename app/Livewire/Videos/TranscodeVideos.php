<?php

namespace App\Livewire\Videos;

use FFMpeg\FFMpeg;
use Livewire\Component;
use App\Services\VideoService;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Livewire\Attributes\Rule;

class TranscodeVideos extends Component
{
    public $selectedVideos = [];

    #[Rule('required')]
    public $name;

    public function render(VideoService $videoService)
    {
        $videos = $videoService->getAllVideos();

        return view('livewire.videos.transcode-videos', [
            'videos' => $videos
        ])->layout('layouts.videos-layout');
    }

    public function editVideo($videoName)
    {
        $this->validate();

        $ffmpeg = FFMpeg::create();

        $video = $ffmpeg->open('storage/videos/' . $videoName);
        $video
            ->filters()
            ->resize(new Dimension(1024, 576));

        $format = new X264();
        $format
            ->setVideoCodec('libx264')
            ->setKiloBitrate(736)
            ->setAudioKiloBitrate(256)
            ->setAudioChannels(2);

        if ($video->save($format, 'storage/videos/' . $this->name . '.mp4')) {
            unlink('storage/videos/' . $videoName);
            $this->name = '';
            $this->dispatch('video-updated');
        } else {
            //fail handle
        }
    }
}
