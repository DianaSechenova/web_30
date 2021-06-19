<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    public function add(){
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.admin_add_post',
            [
            'authors' => $authors,
            'categories'=> $categories
            ]);
    }

    public function save( Request $request){
        if(Auth::check()){
            if($request->method() == 'POST'){
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                        'title' => 'required | string | max:100 | min:10',
                        'body' => 'required | min:50',
                        'image' => 'required | image'
                ]);
                $post = new Post();
                $post->author_id= $request->input('author_id');
                $post->title= $request->input('title');
                $post->body= $request->input('body');

                $image = $request->image;
                if($image){
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $post->image = 'http://localhost:8888/images' . $imageName;
                }
                $post->save();

                $post->category()->sync($request->input('category_id'), false);
                $post->category()->getRelated();
                $log = new Logger('new_log');
                $log->pushHandler(new StreamHandler(__DIR__ . '/../../../Logs/new_post_log.log',Logger::INFO));
                $log->info('Monolog: Пост № '. $post->id .' был добавлен пользователем ' . Auth::user()->name);

                $k_log = new \Katzgrau\KLogger\Logger(__DIR__ . '/../../../Logs');
                $k_log->info('Katzgrau: Пост № '. $post->id .' был добавлен пользователем ' . Auth::user()->name );
                return redirect()->route('single_post', $post->id);

            }
        }else{
            return redirect()->route('index');
        }
    }
    public function edit($id){
        if(Auth::check()){
            $post = Post::where('id', '=', $id)->first();
            $authors = Author::all();

            return view('admin.edit_post', [
                'post'=>$post,
                'authors'=>$authors
            ]);
        }else{
            return redirect('404');
        }
    }
    public  function  edit_save(Request $request){
        if(Auth::check()){
            if($request->method() == 'POST'){
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                    'title' => 'required | string | max:100 | min:10',
                    'body' => 'required | min:50',
                    'image' => 'required | image'
                ]);
                $post = Post::where('id', '=', $request->input('id'))->first();
                $post->author_id= $request->input('author_id');
                $post->title= $request->input('title');
                $post->body= $request->input('body');

                $image = $request->image;
                if($image){
                    $imageName = $image->getClientOriginalName();
                    $image->move('images', $imageName);
                    $post->image = 'http://localhost:8888/images' . $imageName;
                }
                $post->save();
                $log = new Logger('new_log');
                $log->pushHandler(new StreamHandler(__DIR__ . '/../../../Logs/new_post_log.log',Logger::INFO));
                $log->info('Monolog: Пост № '. $post->id .' был изменен пользователем ' . Auth::user()->name);
                $k_log = new \Katzgrau\KLogger\Logger(__DIR__ . '/../../../Logs');
                $k_log->info('Katzgrau: Пост № '. $post->id .' был изменен пользователем ' . Auth::user()->name );
                return redirect()->route('admin_panel_get');
            }
        }else{
            return redirect()->route('404');
        }
    }
    public function delete(Request $request)
    {
        if (Auth::check()) {
            if ($request->method() == 'DELETE') {
                $post = Post::find($request->input('id'));
                $post->delete();
                $log = new Logger('new_log');
                $log->pushHandler(new StreamHandler(__DIR__ . '/../../../Logs/new_post_log.log',Logger::INFO));
                $log->info('Monolog: Пост № '. $post->id .' был удален пользователем ' . Auth::user()->name);
                $k_log = new \Katzgrau\KLogger\Logger(__DIR__ . '/../../../Logs');
                $k_log->info('Katzgrau: Пост № '. $post->id .' был удален пользователем ' . Auth::user()->name );
                return back();
            } else {
                return view('admin.admin_panel', ['posts' => Post::orderBy('updated_at', 'DESC')->paginate(5)]);
            }

        }else{
            return redirect()->route('404');
        }
    }
}
