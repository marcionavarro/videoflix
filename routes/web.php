<?php

use App\Http\Livewire\Content\Create;
use App\Http\Livewire\Content\Edit;
use App\Http\Livewire\Content\Index;
use App\Http\Livewire\Content\Video\CreateVideo;
use App\Http\Livewire\Content\Video\EditVideo;
use App\Http\Livewire\Content\Video\ListVideo;
use App\Http\Livewire\Content\VideoCreate;
use App\Http\Livewire\Notification;
use App\Http\Livewire\Player;
use App\Models\User;
use App\Notifications\VideoProcessedNotification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get(
    '/',
    function () {
        \App\Jobs\Test\TestJob::dispatch();
        \App\Jobs\Test\PushJob::dispatch()->onQueue('deploy');
        \App\Jobs\Test\DeployJob::dispatch()->onQueue('deploy');

        return view('welcome');
    }
);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth'])->name('dashboard');

Route::get('notifications', Notification::class)->middleware('auth')->name('notifications');

Route::middleware(['auth'])->prefix('/content')->name('content.')->group(
    function () {
        Route::get('/', Index::class)->name('index'); // content.index
        Route::get('/create', Create::class)->name('create');
        Route::get('/{content}', Edit::class)->name('edit');
        Route::get('/{content}/videos/create', CreateVideo::class)->name('video.create');
        Route::get('/{content}/videos/list', ListVideo::class)->name('video.list');
        Route::get('/{content}/videos/edit/{video}', EditVideo::class)->name('video.edit');
    }
);

Route::get('/watch/{video:code}', Player::class)->middleware('auth')->name('video.player');

Route::get(
    'resources/{code}/{video}',
    function ($code, $video = null) {
        $video = $code . '/' . $video;
        return Storage::disk('videos_processed')
            ->response(
                $video,
                null,
                [
                    'Content-Type' => 'application/x-mpegURL',
                    'isHls' => true
                ]
            );
    }
)->middleware('auth');

require __DIR__ . '/auth.php';

Route::get(
    '/notification',
    function () {
        $user = User::first();
//    $user->notify(new VideoProcessedNotification());
//    dd($user->unReadNotifications->first()->markAsRead());
        dd($user->unReadNotifications()->where('id', '4021a22f-babd-45fe-ab70-d9818d774e04')->first());
    }
);
