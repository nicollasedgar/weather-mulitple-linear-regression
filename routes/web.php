<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\MethodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Dashboard"
    ]);
});

Route::get('/data', [DataController::class, 'index']);

Route::get('/method', [MethodController::class, 'index']);
