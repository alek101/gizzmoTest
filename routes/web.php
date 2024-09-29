<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimeTestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prime-test', [PrimeTestController::class, 'index']);

