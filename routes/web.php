<?php
use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('cats', CatController::class);