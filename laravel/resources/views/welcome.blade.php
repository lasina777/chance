<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/bootstrap.bundle.js" defer></script>
    <title>@yield('title', 'Главная страница')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('index')}}">Каталог</a>
                </li>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'Администратор')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Администратор
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.products.create')}}">Добавить продукт</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.categories.create')}}">Добавить категорию</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.categories.index')}}">Все категории</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('order.basket')}}">Корзина</a>
                    </li>
                @endauth
            </ul>
            <div class="btn-group">
                @guest
                    <a class="btn btn-success" type="submit" href="{{route('register')}}">Регистрация</a>
                    <a class="btn btn-success" type="submit" href="{{route('login')}}">Авторизация</a>
                @endguest
                @auth
                    <a class="btn btn-danger" type="submit" href="{{route('logout')}}">Выход</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
