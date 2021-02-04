<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KidController;
use App\Http\Controllers\KidPhotoController;



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


//Route::get('/',[LoginController::class,'index']);
Route::get('/', [WelcomeController::class, 'index']);


Route::get('/login', [LoginController::class, 'index']);

//It's a class inside vendor, in laravel 8 it's vendor/laravel/ui/src/AuthRouteMethods.php
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrants', [App\Http\Controllers\KidController::class, 'index'])->name('kids');
Route::get('/entrants/register', [App\Http\Controllers\KidController::class, 'create'])->name('kids.register');
Route::post('/entrants', [App\Http\Controllers\KidController::class, 'store'])->name('kids.store');
Route::get('/entrants/{kid}', [App\Http\Controllers\KidController::class, 'show'])->name('kids.gallery');


Route::post('/entrants/{kid}/photo', [App\Http\Controllers\KidPhotoController::class, 'store'])->name('kids.photo.store');
