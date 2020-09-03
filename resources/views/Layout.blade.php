<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">К новостям</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link navLinkHover" href="{{route('index')}}">Блог </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navLinkHover" href="{{route('about')}}">О нас</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navLinkHover" href="{{route('contacts')}}">Сервисы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navLinkHover" href="{{route('delete_news_get')}}">Панель администрирования</a>
                </li>
    @if(\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link navLinkHover" href="{{route('home')}}">{{\Auth::user()->name}}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link navLinkHover" href="{{route('home')}}">Войти</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
