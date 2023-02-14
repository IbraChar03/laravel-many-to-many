<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;
use Faker\Generator;
use Illuminate\Container\Container;

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
    public function createProduct(Request $request)
    {
        $faker = Container::getInstance()->make(Generator::class);
        $data = $request->validate([
            "name" => ["string", "required"],
            "price" => ["integer", "required"],
            "description" => ["string", "required"],
            "weight" => ["integer", "required"],
            "typology" => ["required"],
            "categories" => ["required", "array"],
        ]);
        $data["code"] = $faker->regexify('[A-Z0-9]{5}');
        $product = new Product();
        $product->code = $data["code"];
        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->weight = $data["weight"];
        $product->price = $data["price"];
        $product->typology()->associate($data["typology"]);
        $product->save();
        $categories = Category::find($data["categories"]);
        $product->categories()->attach($categories);
        return redirect()->route("home");

    }
}