<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KidController;
use App\Http\Controllers\KidPhotoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\KidRewardController;
use App\Models\Photo;



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
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrants', [App\Http\Controllers\KidController::class, 'index'])->name('kids');
Route::get('/entrants/register', [App\Http\Controllers\KidController::class, 'create'])->name('kids.register');
Route::post('/entrants', [App\Http\Controllers\KidController::class, 'store'])->name('kids.store');



Route::get('/entrants/{kid}', [App\Http\Controllers\KidController::class, 'show'])->name('kids.gallery');

Route::get('/entrants/{kid}/add', [App\Http\Controllers\KidPhotoController::class, 'create'])->name('kids.photo.create');
Route::post('/entrants/{kid}/photo', [App\Http\Controllers\KidPhotoController::class, 'store'])->name('kids.photo.store');


Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');

Route::post('/admin/photos/{photo}/deny', [App\Http\Controllers\AdminController::class, 'denyPhoto'])->name('admin.photos.deny');
Route::post('/admin/photos/{photo}/approve', [App\Http\Controllers\AdminController::class, 'approvePhoto'])->name('admin.photos.approve');


Route::get('/rewards', [App\Http\Controllers\RewardController::class, 'index'])->name('admin.rewards');
Route::get('/rewards/add', [App\Http\Controllers\RewardController::class, 'create'])->name('admin.rewards.create');
Route::post('/rewards', [App\Http\Controllers\RewardController::class, 'store'])->name('admin.rewards.store');
//Route::get('/entrants/{kid}', [App\Http\Controllers\KidController::class, 'show'])->name('kids.gallery');

//rewards per entrant
Route::get('/entrants/{kid}/rewards', [App\Http\Controllers\KidRewardController::class, 'index'])->name('entrant.rewards');
Route::post('/entrants/{kid}/rewards/claim/{reward}', [App\Http\Controllers\KidRewardController::class, 'claim_reward'])->name('entrant.rewards.claim');


Route::get('/gallery', function () {
    $data['photos'] = Photo::where('approved', 1)->get();
    return view('gallery.national', $data);
})->name('gallery')->middleware('auth');
