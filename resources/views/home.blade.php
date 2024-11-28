@extends('layout')

@section('title') Homepage @endsection

@section('content')

<div class="container">
    <div id="carouselExample" class="carousel slide mt-5">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/imgs/placeholder-image.jpg') }}" class="d-block w-100"
                    style="height: 400px; object-fit: cover;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/imgs/placeholder-image.jpg') }}" class="d-block w-100"
                    style="height: 400px; object-fit: cover;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/imgs/placeholder-image.jpg') }}" class="d-block w-100"
                    style="height: 400px; object-fit: cover;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>

    <h1 class="mt-5">Bem-vindo! Ao maior e-commerce do mundo.</h1>
    <p class="mt-4">Aqui, você encontra tudo o que precisa, do conforto da sua casa, com apenas alguns cliques. Com uma variedade imensa de produtos e serviços, trazemos desde eletrônicos e roupas até itens para o lar, brinquedos, livros, e muito mais! Nossa plataforma foi criada para proporcionar uma experiência de compra fácil, rápida e confiável para clientes do mundo inteiro.
    </p>

    <hr class="mt-5">

    <h3 class="mt-5">Temos mais de {{ $categories->count() }} categorias com milhares de produtos especialmente para você!
    </h3>
    <div class="mt-5">
        @foreach ($categories as $category)
            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">{{ $category->description }}</p>
                    <div class="text-end">
                        <a href="{{ route('products.byCategoryId', ['id' => $category->id]) }}"
                            class="btn btn-primary d-flex justify-content-center">
                            <i class="material-icons me-2">add</i>
                            ver mais
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection