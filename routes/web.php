<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingController;
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
    Route::get('/leaderboard', fn () => view('leaderboard'))->name('leaderboard');
    Route::get('/trainings', [TrainingController::class, 'index'])->name('training-list');
    Route::get('/trainings/{training}', [TrainingController::class, 'show'])->name('training-show');
});

Route::group(['middleware' => ['role:developer']], function () {
    Route::get('/skills', fn () => view('skills'))->name('skills');
    Route::get('/rewards', fn () => view('rewards'))->name('rewards');
});

Route::group(['middleware' => ['role:hr_manager']], function () {
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('userProfile');
    Route::get('/trainings/add', [TrainingController::class, 'create'])->name('training-add');
    Route::post('/trainings/add', [TrainingController::class, 'store'])->name('training-store');
});

Route::group(['middleware' => ['role:commercial']], function () {
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('userProfile');
});
