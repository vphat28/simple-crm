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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
