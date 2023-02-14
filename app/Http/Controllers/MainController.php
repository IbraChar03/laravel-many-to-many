<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class MainController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view("home", compact("categories"));
    }
    public function products()
    {
        $products = Product::all();
        return view("products", compact("products"));
    }
    public function createPage()
    {
        $typologies = Typology::all();
        $categories = Category::all();
        return view("createProduct", compact("typologies", "categories"));
    }
}