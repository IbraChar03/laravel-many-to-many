<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/products', [MainController::class, "products"])->name("products");
Route::get('/productPage', [MainController::class, "createPage"])->name("productCreatePage");
Route::post('/product/create', [MainController::class, "createProduct"])->name("product.create");