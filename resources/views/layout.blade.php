<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Web_30 BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Домой
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">
                        @if(\Illuminate\Support\Facades\Auth::check()){{\Illuminate\Support\Facades\Auth::user()->name}}
                        @else Войти @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" style="padding-top: 100px;">

    <div class="row">

@yield('content')

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Категории </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('categories', "\App\Models\Category")
                                @foreach($categories->show_categories() as $category)
                                <li>
                                    <a href="{{route('post_by_category', $category->key)}}">{{$category->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
{{--authors--}}
            <div class="card my-4">
                @inject('authors', "\App\Models\Author")
                <h5 class="card-header">Лучшие авторы (из {{$authors->show_count_authors()}} )</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">

                                @foreach($authors->show_authors() as $author)
                                    <li>
                                        <a href="{{route('post_by_author', $author->key)}}">{{$author->name}}</a>

                        </li>
                        @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Мы в соцсетях</h5>
                <div class="card-body" style="display: flex; justify-content: space-around;">
                    <a href="#"><img src="/public/icon/i.png"></a>
                    <a href="#"><img src="/public/icon/f.png"></a>
                    <a href="#"><img src="/public/icon/t.png"></a>
                    <a href="#"><img src="/public/icon/g.png"></a>

                    {{--                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!--}}
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
