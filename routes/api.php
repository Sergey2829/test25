<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('users')->group(function() {
   Route::get('/', [UserController::class, 'index']);
   Route::get('/{id}', [UserController::class, 'show']);
});

Route::prefix('albums')->group(function() {
    Route::get('/', [AlbumController::class, 'index']);
    Route::get('/{album}', [AlbumController::class, 'show']);
});
