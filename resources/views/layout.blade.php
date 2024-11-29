<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title') simple-ecommerce-laravel @endsection
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active fs-5" aria-current="page" href="{{ route('home') }}">E-COMMERCE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" aria-current="page"
                            href="{{ route('products.getAll') }}">produtos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            categorias
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item fs-5"
                                        href="{{ route('products.byCategoryId', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>


                </ul>
            </div>

            <ul class="navbar-nav ms-auto">
                @guest

                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{ route('login.index') }}">login</a>
                    </li>

                @endguest

                @auth
                    @if (Auth::user()->user_type === 'customer')

                        <li class="nav-item">
                            <a class="nav-link fs-5" href="{{ route('carts.showCart') }}">carrinho</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                minha conta
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fs-5" href="">meus pedidos</a></li>
                                <li><a class="dropdown-item fs-5" href="">meu endereço</a></li>
                                <li>
                                    <a class="dropdown-item fs-5" href=""
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('login.destroy') }}" method="GET"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>

                    @elseif (Auth::user()->user_type === 'admin')

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                opções de administrador
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fs-5" href="">dashboard</a></li>
                                <li><a class="dropdown-item fs-5" href="{{ route('products.index') }}">produtos</a></li>
                                <li><a class="dropdown-item fs-5" href="">usuarios</a></li>
                                <li>
                                    <a class="dropdown-item fs-5" href=""
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('login.destroy') }}" method="GET"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>

                    @endif
                @endauth
            </ul>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>