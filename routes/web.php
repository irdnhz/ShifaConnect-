<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('medical-logs', MedicalLogController::class);

