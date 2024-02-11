<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponseController;
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
    return view('welcome');
});
Route::post('/messages', [MessageController::class, 'sendMessage']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');

Route::post('/messages/{id}/respond', [MessageController::class, 'respond'])->name('messages.respond');

// Routes for responses
Route::get('/responses', [ResponseController::class, 'index'])->name('responses.index');
Route::get('/responses/create', [ResponseController::class, 'create'])->name('responses.create');
Route::post('/responses', [ResponseController::class, 'store'])->name('responses.store');
Route::get('/responses/{id}', [ResponseController::class, 'show'])->name('responses.read');
Route::get('/responses/{id}/edit', [ResponseController::class, 'edit'])->name('responses.edit');
Route::put('/responses/{id}', [ResponseController::class, 'update'])->name('responses.update');
Route::delete('/responses/{id}', [ResponseController::class, 'destroy'])->name('responses.destroy');

