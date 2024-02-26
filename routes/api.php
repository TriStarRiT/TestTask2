<?php

use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts', [PostApiController::class, 'index',])->name('postApi');
Route::get('/post/{post:id}', [PostApiController::class, 'show'])->name('postShow');
Route::put('/post/update/{id}', [PostApiController::class, 'update'])->name('postUpdate');
Route::post('/post/store', [PostApiController::class, 'store'])->name('postStore');
Route::get('/post/delete/{post:id}', [PostApiController::class, 'destroy'])->name('postDelete');
