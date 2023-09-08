<?php

use App\Http\Livewire\Content\Create;
use App\Http\Livewire\Content\Edit;
use App\Http\Livewire\Content\Index;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/content')->name('content.')->group(function(){
    Route::get('/', Index::class)->name('index'); // content.index
    Route::get('/create', Create::class)->name('create');
    
    Route::get('/{content}', Edit::class)->name('edit');
});

require __DIR__.'/auth.php';
