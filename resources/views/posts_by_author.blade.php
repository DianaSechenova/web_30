@extends('layout')

@section('title', $author->name)

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Все посты автора
            <p style="color: dodgerblue;">{{$author->name}}</p>
        </h1>

    @foreach($author->posts as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text">{{mb_substr($post->body, 0, 200)}} ...</p>
                    <a href="{{route('single_post', $post->id)}}" class="btn btn-primary"> &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Опубликовано {{date('d-m-Y',strtotime($post->created_at))}}
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
    @endforeach
    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>
@endsection
