<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Advertisement\AdvertisementController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::group(['auth:sanctum', 'verified'], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/userUpdate', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin', [UserController::class, 'display'])->name('user.display');
    Route::get('/annonces', [AdvertisementController::class, 'index'])->name('advertisements.index');
    Route::get('/post', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/makePost', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/annonce/{id}', [AdvertisementController::class, 'show'])->name('advertisements.show');
    Route::get('/deactivate/{id}', [AdvertisementController::class, 'deactivate'])->name('advertisements.deactivate');
    Route::post('/deactivate/{id}', [AdvertisementController::class, 'deactivate'])->name('advertisements.deactivate');
    Route::get('/activate/{id}', [AdvertisementController::class, 'activate'])->name('advertisements.activate');
    Route::post('/activate/{id}', [AdvertisementController::class, 'activate'])->name('advertisements.activate');
    Route::delete('/annonce/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
    // Route::get('/dashboard', function(){
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
});
