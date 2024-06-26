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
use App\Http\Livewire\Subscriptions\Checkout;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
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

Route::get('/subscriptions/checkout', Checkout::class)
    ->name('subscriptions.checkout')
    ->middleware('auth');

Route::middleware(['auth', 'user.active.subscription'])->prefix('my-contents')
    ->name('my-content.')->group(function () {
    Route::get('/', \App\Http\Livewire\Contents::class)->name('main');
});

Route::get('/watch/{content:slug}', Player::class)
    ->middleware('auth', 'user.active.subscription')
    ->name('video.player');


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
)->middleware('auth', 'user.active.subscription');

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

Route::get(
    '/morphs',
    function () {
        // Morphs 1 to 1
        // Find User
        //$user = User::find(1);

        // Find Content
        // $content = Content::find(10);
        // return $content->image;

        // Saving the morphOne relation
        // $content->image()->create(['image' => 'image-' . rand(1, 30000)]);

        // Searching a image morphs
        //$image = Image::find(2);

        //return $image->imageable;

        // Morphs 1 to Many
        // Find Content
//        $content = Content::find(10);
//        $content->comments()->create(['comment' => 'Testando comentário...']);

//        $video = Video::find(10);
//        $video->comments()->create(['comment' => 'Testando comentário v...']);

//        return Comment::first()->commentable;
//        return $video->comments;


        // Many To Many Morphs

        $tagsCreate = [
            ['tag' => 'acao'],
            ['tag' => 'aventura'],
            ['tag' => 'terror'],
            ['tag' => 'documentarios'],
            ['tag' => 'romance'],
            ['tag' => 'suspense'],
        ];

        // Tag::createMany($tagsCreate);

        /*$model = Video::find(10);
        $model->tags()->createMany($tagsCreate);*/

        /*$model = Content::find(10);
        $model->tags()->sync([1,2,3,4]);*/

        $model = Tag::find(1);
        // $model->videos()->sync([1,2,3,4]);

//        return $model->tags;
//        return $model->videos;
        return $model->contents;
    }
);
