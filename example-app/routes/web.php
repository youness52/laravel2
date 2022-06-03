<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::resource('posts', PostController::class);
