<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigiziController;


Route::get('/', [SigiziController::class, 'index']);