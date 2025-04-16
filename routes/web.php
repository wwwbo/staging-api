<?php

use App\Http\Controllers\Web\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dashboard', StudentController::class);
