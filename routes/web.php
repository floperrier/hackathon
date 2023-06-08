<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $response = Http::withHeaders(['Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7'])->get('https://www.codewars.com/api/v1/users/floperrier')->throw()->json();
    // dump($response);
    if (Auth::check()) {
        return redirect(RouteServiceProvider::HOME);
    }
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
});

Route::group(['middleware' => ['role:developer']], function () {
    Route::get('/skills', fn () => view('skills'))->name('skills');
    Route::get('/leaderboard', fn () => view('leaderboard'))->name('leaderboard');
    Route::get('/rewards', fn () => view('rewards'))->name('rewards');
});
