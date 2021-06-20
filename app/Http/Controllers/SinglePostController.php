<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $comments = Comment::where('post_id', '=', $id)->get();
        $post->viewing = $post->viewing + 1;
        $post->save();
        $log = new Logger('new_log');
        $log->pushHandler(new StreamHandler(__DIR__ . '/../../../Logs/single_post_log.log',Logger::INFO));
        $log->info('Пользователь с эмейлом: ' .Auth::user()->email  .' прочитал пост №  ' . $post->id);
        return view('single_post', ['post'=>$post, 'comments'=>$comments]  );
    }
}
