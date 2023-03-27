<?php

use App\Http\Controllers\ImageController;
use App\Http\Livewire\BeritaLiveWire;
use App\Http\Livewire\HashtagLiveWire;
use App\Http\Livewire\HomeLiveWire;
use App\Http\Livewire\IklanLiveWire;
use App\Http\Livewire\KategoriLiveWire;
use App\Http\Livewire\PengunjungLiveWire;
use App\Http\Livewire\UsersLiveWire;
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


Route::get('/kategori', KategoriLiveWire::class);
Route::get('/berita', BeritaLiveWire::class);
Route::get('/iklan', IklanLiveWire::class);
Route::get('/hashtag', HashtagLiveWire::class);
Route::get('/users', UsersLiveWire::class);
Route::get('/pengunjung', PengunjungLiveWire::class);

Route::get('/', HomeLiveWire::class);

Route::get('images/{fileName}', [ImageController::class, 'index']);
