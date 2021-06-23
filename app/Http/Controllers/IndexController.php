<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $posts = Post::orderBy('id', 'DESC')->paginate(8);
        return view('index', ['posts' => $posts]);
    }
}
