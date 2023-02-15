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
        $typology = Typology::find($data["typology"]);
        $product->typology()->associate($typology);
        $product->save();
        $categories = Category::find($data["categories"]);
        $product->categories()->attach($categories);
        return redirect()->route("home");

    }
    public function delProduct(Product $product)
    {
        $product->categories()->sync([]);
        $product->delete();
        return redirect()->route("home");
    }
    public function editPage(Product $product)
    {
        $categories = Category::all();
        $typologies = Typology::all();
        return view("editProduct", compact("product", "categories", "typologies"));
    }
    public function updateProduct(Request $request, Product $product)
    {

        $data = $request->validate([
            "name" => ["string", "required"],
            "price" => ["integer", "required"],
            "description" => ["string", "required"],
            "weight" => ["integer", "required"],
            "typology" => ["required"],
            "categories" => ["required", "array"],
        ]);

        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->weight = $data["weight"];
        $product->price = $data["price"];
        $typology = Typology::find($data["typology"]);
        $product->typology()->associate($typology);
        $product->save();
        $categories = Category::find($data["categories"]);
        $product->categories()->attach($categories);
        return redirect()->route("home");
    }
}