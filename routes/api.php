<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;



Route::get('general', [MainController::class, 'general']);
Route::get('home', [MainController::class, 'home']);
Route::get('services', [MainController::class, 'services']);
Route::get('team', [MainController::class, 'team']);
Route::get('about-us', [MainController::class, 'about']);
Route::get('careers', [MainController::class, 'careers']);
Route::post('contact-us', [MainController::class, 'storeContactRequests']);
Route::post('job-apply', [MainController::class, 'applyToJob']);