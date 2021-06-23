@extends('layout')

@section('title', "Пост №$post->id" )

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        @if(\Illuminate\Support\Facades\Session::has('flash'))
            <br>
            <h2><mark>{{\Illuminate\Support\Facades\Session::get('flash')}}</mark></h2>
            <br>
            @endif
        <h1 class="my-4">{{$post->title}}
        </h1>


        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{$post->body}}</p>
                </div>
                <div class="card-footer text-muted">
                    Опубликовано {{date('d F Y в G:i',strtotime($post->created_at))}} <div style="float: right">Автор
                    <a href="{{route('post_by_author', $post->author->key)}}">{{$post->author->name}}</a></div>
                </div>
                <div class="card-footer text-muted">
                    Катигории:
                    @foreach($post->category as $c)
                        <a style="padding-right: 10px;" href="{{route('post_by_category', $c->key)}}">{{$c->title}}</a>
                    @endforeach
                </div>
                <div class="card-footer text-muted">
                    Просмотры:{{$post->viewing}}
                </div>
            </div>
        @if(\Illuminate\Support\Facades\Auth::check())
            <hr>
            @if(count($comments) == 0)
            <p>Коментариев нет.</p>
            @endif
            @foreach($comments as $comment)
                <p>  Автор: <strong>{{$comment->author}} </strong>  </p>
                  <p> {{$comment->comment}}</p>
                <p>Добавлен: {{$comment->created_at}}</p>
                <hr>
            @endforeach
                <form action="save_comment" method="post">
                    @csrf
                    <label >Комментарий:</label>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="author" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                    <textarea class="form-control" name="comment"></textarea><br>
                    <button type="submit" class="btn-blue btn btn-primary"> Добавить</button>
                </form>
            <br>
        @else
        <p>Зарегестрируйтесь, и оставляйте комментарии!</p>
            @endif
    </div>
@endsection
