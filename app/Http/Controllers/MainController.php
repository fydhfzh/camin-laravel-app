<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public static function index(){
        return view('main.index', [
            'products' => Product::search(request(['search', 'category']))->paginate(3)->withQueryString(),
            'categories' => Category::all()
        ]);
    }

    public static function show(Product $product){
        return view('main.show', [
            'product' => $product
        ]);
    }
}
