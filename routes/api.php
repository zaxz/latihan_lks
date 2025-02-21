<?php

use App\Http\Controllers\Api\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('v1', PublicController::class);