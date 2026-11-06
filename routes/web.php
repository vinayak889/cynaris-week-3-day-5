<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Resource routes for complete CRUD operations
Route::resource('posts', PostController::class);
