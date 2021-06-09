@extends('layout')

@section('title', "Добавить пост" )

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Добавить пост</h1>
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

            <form action="add_post" method="post" enctype="multipart/form-data">
                @csrf
                <p style=" font-size: 20px;">Выберите автора:</p>
                <select class="form-select" name="author_id">
                    <br>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">
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
                            <input type="checkbox"  value="{{$category->id}}" id="scales" name="category_id" >
                            <label for="scales">
                                {{$category->title}}
                            </label>
                        </div>
                    @endforeach
                </div>
                    <br>
                <div class="flex col-3">
                    <label style="padding-bottom: 18px; width: 600px;">
                        <input style="width: 600px; padding: 8px" type="text" placeholder="title" name="title">
                    </label>
                    <input style="padding-bottom: 18px;" type="file" name="image">
                    <label >
                    <code> <textarea style="padding-bottom: 18px; width: 600px; height: 300px;" class="form-control" name="body"></textarea></code>
                    </label>
                    <button type="submit" class="btn-blue btn btn-primary"> Добавить</button>
                </div>
            </form>
            <br>
        @endif
    </div>
@endsection
