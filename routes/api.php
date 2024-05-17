<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// показать все продукты
Route::get('products', [ProductController::class, 'index']);
// добавить новый продукт
Route::post('products', [ProductController::class, 'store']);
// показать один продукт
Route::get('products/{id}', [ProductController::class, 'show']);
// обновить один продукт
Route::put('products/{id}', [ProductController::class, 'update']);
// удалить один продукт
Route::delete('products/{id}', [ProductController::class, 'destroy']);

