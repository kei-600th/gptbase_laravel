<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/responses', [App\Http\Controllers\ResponseController::class, 'index'])->name('responses');
Route::post('/response', [App\Http\Controllers\ResponseController::class, 'store'])->name('response');
Route::delete('/response/{response}', [App\Http\Controllers\ResponseController::class, 'destroy'])->name('/response/{response}');
Route::get('response/{id}', [App\Http\Controllers\ResponseController::class, 'show'])->name('responses');