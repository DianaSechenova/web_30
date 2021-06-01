<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PostByCategoryController extends Controller
{
    public function __invoke($key){
        $category = Category::where('key', '=', $key)->first();

        return view('post_by_category', ['category'=>$category]);

    }
}
