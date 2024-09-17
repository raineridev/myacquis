<?php

use App\Http\Controllers\Auth\Credentials;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Onboarding\RegisterController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Storage;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Post
Route::resource('post', PostController::class)->middleware('auth:sanctum');

// Onboarding
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [RegisterController::class, 'store'])->name('onboarding.register');
    Route::post('login', [LoginController::class, 'authenticate'])->name('onboarding.login');

});

    Route::prefix('auth')->group(function () {
        // Credentials
        Route::get('credentials', [Credentials::class, 'show'])->name('auth.credentials.show');
        Route::put('credentials', [Credentials::class, 'update'])->name('auth.credentials.update');
    })->middleware('auth:sanctum');

Route::prefix('image')->group(function () {
    Route::resource('upload', ImageController::class);
    Route::post('download', [ImageController::class, 'download'])->name('image.download');
    Route::post('visibility/{id}/{visibility}', [ImageController::class, 'visibility'])->name('image.visibility');
});

