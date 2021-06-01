<?php

namespace App\Http\Controllers;


use App\Models\Author;
use Illuminate\Http\Request;


class PostByAuthorController extends Controller
{
public function __invoke($key){
    $author = Author::where('key', '=', $key)->first();
    return view('posts_by_author',['author'=>$author]);
}
}
