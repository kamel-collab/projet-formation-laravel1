<?php

use App\Http\Controllers\FilmController;
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
/**
 * route proteger par authentification
 * Route::resource('films', FilmController::class)->middleware('auth');
 * Route::get('category/{slug}/films', [FilmController::class, 'index'])->name('films.category')->middleware('auth');
 */
Route::resource('films', FilmController::class);
Route::get('category/{slug}/films', [FilmController::class, 'index'])->name('films.category');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
