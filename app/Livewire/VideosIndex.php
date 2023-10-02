<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class VideosIndex extends Component
{
    public function render()
    {
        $videos = collect(Storage::disk('public')->files('/videos'));
        $filteredVideos = $videos->map(function ($item) {
            if (strpos($item, '.mp4') !== false) {
                return url('storage/' . $item);
            }
        })->filter();

        return view('livewire.videos-index', [
            'videos' => $filteredVideos
        ])->layout('layouts.app');
    }
}
