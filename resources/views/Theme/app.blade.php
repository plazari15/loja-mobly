<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Loja Mobly')</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('page-css')
</head>
<body>
<nav>
<div class="nav-wrapper">
    <a href="#" class="brand-logo">Loja</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        @foreach($categoriesRoot as $cat)
            <li><a href="{{ route('produtos.listagem', $cat->slug) }}">{{ $cat->name }}</a></li>
        @endforeach
    </ul>
</div>
</nav>
<div class="container">
        <div class="row">

            <div class="col s12">
                @yield('content')
            </div>
        </div>
</div>
<script src="/js/app.js"></script>
@yield('page-js')
</body>
</html>