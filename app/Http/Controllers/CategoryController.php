<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function index()
    {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }
}
