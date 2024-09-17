<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('feed');
});

Route::get('/feed', function () {
    return Inertia::render('welcome', ["page" => 1]);
})->name('feed');


Route::get('/login', function () {
    return 1;
})->name('view.login');
