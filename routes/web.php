<?php

use Illuminate\Support\Facades\Route;
use App\Services\AIService;
use App\Http\Controllers\PermitController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/permits',[PermitController::class, 'store']);
