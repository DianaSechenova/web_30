<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $posts = Post::orderBy('id', 'DESC')->limit(5)->get();
        return view('home', ['posts' => $posts]);
    }
}
