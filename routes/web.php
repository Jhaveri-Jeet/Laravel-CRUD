<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::post('/', [ProductController::class, 'insertProduct'])->name('product.insert');
Route::get('products/{id}/updatePage', [ProductController::class, 'updateProductPage']);
Route::put('products/{id}/update', [ProductController::class, 'updateProduct'])->name('product.update');
Route::get('products/{id}/delete', [ProductController::class, 'deleteProduct'])->name('product.delete');
// Route::view('/', 'index');
