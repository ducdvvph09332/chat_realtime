<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\Controller;
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
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/post', [Controller::class, 'postLogin'])->name('post-login');
Route::get('/logout', [Controller::class, 'logout'])->name('logout');

Route::prefix('/chats')->group(function () {
    Route::get('/index', [ChatController::class, 'index'])->name('chats.index');
    Route::get('/create', [ChatController::class, 'create'])->name('chats.create');
    Route::post('index/store', [ChatController::class, 'store'])->name('chats.store');
});
