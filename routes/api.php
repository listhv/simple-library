<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController as ApiBookController;

Route::apiResource('books', ApiBookController::class);