<?php

use App\Livewire\Videos\AllVideos;
use App\Livewire\Videos\JoinVideos;
use App\Livewire\Videos\TranscodeVideos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'welcome')->name('home');
Route::get('/', function () {
    return redirect()->route('videos.index');
});

Route::group(['prefix' => 'videos'], function () {
    Route::get('/', AllVideos::class)->name('videos.index');
    Route::get('/join', JoinVideos::class)->name('videos.join');
    Route::get('/transcode', TranscodeVideos::class)->name('videos.transcode');
});