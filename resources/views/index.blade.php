@extends('layout')

@section('title', 'HOME')

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if(\Illuminate\Support\Facades\Session::has('flash'))
            <br>
            <h2><mark>{{\Illuminate\Support\Facades\Session::get('flash')}}</mark></h2>
            <br>
        @endif
        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        @foreach($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{mb_substr($post->body, 0, 200)}} ...</p>
                <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Читать далее &rarr;</a>
                <a href="{{route('add_to_cart', $post->id)}}"  class="btn btn-light">Добавить</a>
            </div>
{{--            --}}
            <div class="card-footer text-muted">
                Опубликовано {{date('d F Y в G:i',strtotime($post->created_at))}}<div style="float: right">Автор
                <a href="{{route('post_by_author', $post->author->key)}}"> {{$post->author->name}}</a></div>
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
            @if($posts->currentPage() != 1)
            <li class="page-item"><a class="page-link" href="?page=1">Начало</a></li>
                <li class="page-item"><a class="page-link" href="{{$posts->previousPageUrl()}}">&larr; </a></li>
                @endif
            @if($posts->count() > 1)
                @for($count = 1; $count <= $posts->lastPage(); $count++)
                    @if($count > $posts->currentPage()-3 and $count < $posts->currentPage()+3)
                        <li class="page-item @if($count==$posts->currentPage()) active @endif">
                            <a class="page-link" href="?page={{$count}}">{{$count}}</a>
                        </li>
                        @endif
                    @endfor
                        @endif

                @if($posts->currentPage() != $posts->lastPage())
                    <li class="page-item"><a class="page-link" href="{{$posts->nextPageUrl()}}">&rarr; </a></li>
                    <li class="page-item"><a class="page-link" href="?page={{$posts->lastPage()}}">Конец</a></li>
                @endif
        </ul>
    </div>


@endsection

@section('side_bar')
    @include('sidebar')
@endsection
