<?php

use App\Enums\API\VersionEnum;
use App\Http\Controllers\API\V1\PostController;
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
Route::group(['prefix' => VersionEnum::V1], function () {
    Route::post('/post', [PostController::class, 'create'])->name('post.create');

    Route::put('/post/{id}', [PostController::class, 'update'])
        ->name('post.update')
        ->whereNumber('id');

    Route::delete('/post/{id}', [PostController::class, 'delete'])
        ->name('post.delete')
        ->whereNumber('id');
});
