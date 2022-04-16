<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!--  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- подключение шрифтов -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- подключение css (bootstrap) -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

    <title>@yield('page-title')</title>

</head>
<body>
<div class="container mt-2 bg-light rounded border shadow1">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4">
                <a class="text-muted mr-2" href="/public">Головна</a>
                <a class="text-muted mr-2" href="/public/articles">Всі статті</a>
                <a class="text-muted mr-2" href="/public/about">Про нас</a>
                <a class="text-muted mr-2" href="#">Контакти</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#"><h2><b>Simple Numerology</b> </h2></a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">

                <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                            <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('login') }}">{{ __('Авторизація') }}</a>
                    @endif

                    @if (Route::has('register'))
                            <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('register') }}">{{ __('Реєстрація') }}</a>
                    @endif
                @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/public/home">
                                Кабінет користувача
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Вийти
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <a class="btn btn-sm btn-outline-secondary" href="/public/articles/create">Додати статтю</a>
                @endguest

            </div>
        </div>
    </header>
</div>

<div class="container">
    <div class="nav-scroller mt-2 mb-2">
        <nav class="nav d-flex justify-content-between">
            <div class="text-muted">
                <b>Статті: </b>
            <a class="p-2 text-muted" href="#">Категорія 1</a>
            <a class="p-2 text-muted" href="#">Категорія 2</a>
            </div>
            <div class="text-muted">
                <a class="p-2 text-muted" href="/public/numerology_calc">
                    <b>Нумерологічний онлайн калькулятор</b>
                </a>
            </div>
        </nav>
    </div>
    @include('blocks.message')
    @yield('content')
</div>
@yield('content2')


<footer class="footer mt-3 py-3">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<!-- Скрипт для формы от https://ckeditor.com/docs/ckeditor5/latest/builds/guides/predefined-builds/quick-start.html -->
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
