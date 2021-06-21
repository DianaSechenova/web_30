<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class APIAdminController extends Controller
{
    public function create(Request $request)
    {
        $post = new Post();
        $post->author_id = $request->post('author_id');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 201);

    }
    public function ubdate(Request $request, $id){
        $post = Post::find($id);
        $post->author_id = $request->post('author_id');
        $post->title = $request->post('title');
        $post->body = $request->post('body');
        $post->image = $request->post('image');
        $post->save();
        return response()->json($post, 200);
    }

}
