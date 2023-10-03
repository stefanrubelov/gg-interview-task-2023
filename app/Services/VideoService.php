<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class VideoService
{
    public function getAllVideos()
    {
        $videos = collect(Storage::disk('public')->files('/videos'));
        $filteredVideos = $videos->map(function ($item) {
            if (strpos($item, '.mp4') !== false) {
                return Storage::disk('public')->url($item);
            }
        })->filter();
        // dd($filteredVideos);
        return $filteredVideos;
    }
}
