<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where('id', '=', $id)->first();
        return view('single_post', ['post'=>$post]);
    }
}
