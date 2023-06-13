<?php

use App\Http\Livewire\Counter;
use App\Http\Livewire\HelloLivewire;
use App\Http\Livewire\Review;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Hello Jetstream 
    Route::get('/hello-jetstream', function () {
        return view('hello-jetstream');
    })->name('hello-jetstream');

    // Hello Livewire 
    Route::get('/hello-livewire', HelloLivewire::class)->name('hello-livewire');

    // Couter
    Route::get('/counter', Counter::class)->name('counter');

    // Couter Alpine
    Route::get('/counter-alpine', function () {
        return view('counter-alpine');
    })->name('counter-alpine');

    // Review
    Route::get('/review', Review::class)->name('review');
});
