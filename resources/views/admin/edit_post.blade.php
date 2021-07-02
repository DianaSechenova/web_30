@extends('layout')

@section('title', "Добавить пост" )

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Редактировать пост № {{$post->id}}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(\Illuminate\Support\Facades\Auth::check())

            <form action="edit_post" method="post" enctype="multipart/form-data">
                @csrf
                <p style=" font-size: 20px;">Выберите автора:</p>
                <select class="form-select" name="author_id">
                    <br>
                    @foreach($authors as $author)
                        <option @if($author->id == $post->author_id) selected @endif value="{{$author->id}}">
                            {{$author->name}}
                        </option>
                    @endforeach
                    <br>
                </select>
                <br>
                <br>
                <br>
                <br>
                <p style="font-size: 20px;">Выберите категорию:</p>
                <div style="display: flex; flex-direction: column;">
                    @foreach($categories as $category)
                        <div>
                            <input
                                type="checkbox"
                                value="{{$category->id}}"
                                id="scales"
                                name="category_id[]"
                                @if($post->category->contains($category)) checked @endif>
                            <label for="scales">
                                {{$category->title}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="flex col-3">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <label style="padding-bottom: 18px; width: 600px;">
                        <input style="width: 600px; padding: 8px" type="text" placeholder="title" name="title" value="{{$post->title}}">
                    </label>
                    <input style="padding-bottom: 18px;" type="file" name="image">
                    <label >
                        <code> <textarea style="padding-bottom: 18px; width: 600px; height: 300px;" class="form-control" name="body">{{$post->body}}</textarea></code>
                    </label>
                    <button type="submit" class="btn-blue btn btn-primary"> Обновить</button>
                </div>
            </form>
            <br>
        @endif
    </div>
@endsection
