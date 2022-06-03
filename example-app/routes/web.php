<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::resource('posts', PostController::class);
Route::resource('categories', catController::class);
