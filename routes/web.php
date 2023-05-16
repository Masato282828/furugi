<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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
Route::get('/', [ShopController::class, 'index']);
Route::get('/shops/create', [ShopController::class, 'create']);
Route::get('/shops/{shop}', [ShopController::class ,'show']);
Route::post('/shops', [ShopController::class, 'store']);