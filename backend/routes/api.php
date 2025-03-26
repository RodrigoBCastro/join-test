<?php

use App\Application\Controllers\Category\CategoryCreateAction;
use App\Application\Controllers\Category\CategoryDeleteAction;
use App\Application\Controllers\Category\CategoryGetAllAction;
use App\Application\Controllers\Category\CategoryGetByIdAction;
use App\Application\Controllers\Category\CategoryUpdateAction;
use App\Application\Controllers\Product\ProductCreateAction;
use App\Application\Controllers\Product\ProductDeleteAction;
use App\Application\Controllers\Product\ProductGetAllAction;
use App\Application\Controllers\Product\ProductGetByIdAction;
use App\Application\Controllers\Product\ProductUpdateAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function () {
    Route::get('/', CategoryGetAllAction::class);
    Route::post('/', CategoryCreateAction::class);
    Route::get('/{categories}', CategoryGetByIdAction::class);
    Route::put('/{categories}', CategoryUpdateAction::class);
    Route::delete('/{categories}', CategoryDeleteAction::class);
});

Route::prefix('products')->group(function () {
    Route::get('/', ProductGetAllAction::class);
    Route::post('/', ProductCreateAction::class);
    Route::get('/{products}', ProductGetByIdAction::class);
    Route::put('/{products}', ProductUpdateAction::class);
    Route::delete('/{products}', ProductDeleteAction::class);
});
