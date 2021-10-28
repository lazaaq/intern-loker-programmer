<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
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

Route::get('/', [MyController::class, 'index']);
Route::get('/post', [MyController::class, 'post']);
Route::get('/post/{post:slug}', [MyController::class, 'single_post']);
Route::get('/author', [MyController::class, 'author']);
Route::get('/author/{user}', [MyController::class, 'single_author']);


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/post', PostController::class);

});

require __DIR__.'/auth.php';
