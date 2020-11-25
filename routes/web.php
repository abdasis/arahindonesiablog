<?php

use App\Http\Controllers\LogBookController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Resep\Index;
use App\Http\Livewire\Resep\Show;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

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
Route::get('clear-cache', function () {
    $optimize = Artisan::call('optimize');
    dd($optimize);
});

Route::group(['prefix' => 'resep-makanan'], function () {
    Route::get('/', Index::class)->name('resep.index');
    Route::get('/{resep}', Show::class)->name('resep.show');
});
Route::get('/', [PostController::class, 'home'])->name('beranda');
Route::post('/posts/upload', [PostController::class, 'upload'])->name('posts.upload')->middleware('auth');
Route::resource('posts', PostController::class)->except([
    'show',
])->middleware('auth');
Route::get('logbook/{logbook}/selesai', [LogBookController::class, 'selesai'])->name('logbook.selesai')->middleware('auth');
Route::get('logbook/laporan', [LogBookController::class, 'lapor'])->name('logbook.lapor')->middleware('auth');
Route::resource('logbook', LogBookController::class)->middleware('auth');
Route::get('/{artikel}', [PostController::class, 'show'])->name('posts.show');
