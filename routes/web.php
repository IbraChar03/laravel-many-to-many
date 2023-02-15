<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/products', [MainController::class, "products"])->name("products");
Route::get('/productPage', [MainController::class, "createPage"])->name("productCreatePage");
Route::post('/product/create', [MainController::class, "createProduct"])->name("product.create");
Route::get('/product/delete/{product}', [MainController::class, "delProduct"])->name("product.delete");
Route::get('/product/edit/{product}', [MainController::class, "editPage"])->name("productEditPage");