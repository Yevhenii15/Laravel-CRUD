<?php
use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;


Route::resource('cats', CatController::class);
Auth::routes();
Route::get('/', [CatController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
