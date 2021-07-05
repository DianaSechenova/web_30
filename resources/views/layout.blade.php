<!DOCTYPE html>
<html lang="ru">

<head>
@include('preloader')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">
<style>
    .glow-button {
        text-decoration: none;
        display: inline-block;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 0 40px 40px #6f42c1 inset, 0 0 0 0 #6f42c1;
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
        letter-spacing: 2px;
        color: white;
        transition: .15s ease-in-out;
    }
    .glow-button:hover {
        box-shadow: 0 0 10px 0 #6f42c1 inset, 0 0 10px 4px #6f42c1;
        color: #6f42c1;
    }
</style>
</head>

<body>

<!-- Navigation -->
<nav style="background-color: #6f42c1" class="navbar navbar-expand-lg navbar-dark  fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">Web_30 BLOG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Домой
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('cart')}}"><img src="/icon/cart2.png"></a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_panel_get')}}">Администрирование</a>
                    </li>
                    @endif
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

@yield('side_bar')

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer style="background-color: #6f42c1" class="py-5 ">
    <div class="container">
        <p class="m-0 text-center text-white">Подпишись на нашу рассылку</p>

        <div class="m-0 text-center text-white">
            <form method="post" action="{{route('subscription')}}">
                @csrf
                <input type="email" name="mail">
                <input type="submit" value="Подписаться">
            </form>
        </div>
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
