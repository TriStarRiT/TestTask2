<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\PostsController;
use App\Http\Resources\PostCollection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use App\Models\Post;

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
    return view('welcome');
});
Route::get('/import', ImportController::class)->name('import');
Route::get('/posts', [PostsController::class, 'index'])->name('test');

Route::get('post/create', [PostsController::class, 'create'])->name('postCreate');
Route::post('/post', [PostsController::class, 'store'])->name('postStore');
