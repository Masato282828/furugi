<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ShopController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/shops', 'store')->name('store');
    Route::get('/shops/create', 'create')->name('create');
    Route::get('/shops/{shop}', 'show')->name('show');
    Route::put('/shops/{shop}', 'update')->name('update');
    Route::delete('/shops/{shop}', 'delete')->name('delete');
    Route::get('/shops/{shop}/edit', 'edit')->name('edit');
    Route::get('/shops/like/{id}', 'ShopController@like')->name('like');
    Route::get('/shops/unlike/{id}', 'ShopController@unlike')->name('unlike');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
