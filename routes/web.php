<?php

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

Route::get('/subscribe', [\App\Http\Controllers\SubscribeController::class, 'show']);
Route::get('/subscribe/thanks', [\App\Http\Controllers\SubscribeController::class, 'thanks']);
Route::post('/subscribe', [\App\Http\Controllers\SubscribeController::class, 'submit']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/subscribers', [\App\Http\Controllers\Admin\SubscribeController::class, 'index'])
         ->name('dashboard.subscribers');

    Route::get('/dashboard/subscribers/{id}', [\App\Http\Controllers\Admin\SubscribeController::class, 'single'])
         ->name('dashboard.subscribers.single');
});

require __DIR__.'/auth.php';
