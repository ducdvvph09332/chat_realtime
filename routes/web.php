<?php

use App\Http\Controllers\ChatController;
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
Route::prefix('/chats')->group(function(){
   Route::get('/index', [ChatController::class, 'index'])->name('chats.index');
   Route::get('/create', [ChatController::class, 'create'])->name('chats.create'); 
   Route::post('/store', [ChatController::class, 'store'])->name('chats.store'); 
});