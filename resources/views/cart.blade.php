@extends('layout')

@section('title') Shopping Cart @endsection

@section('content')

<div class="container">
    <h1 class="mt-5">
        <i class="material-icons">Carrinho</i>
        Produtos no meu carrinho
    </h1>
    <hr class="mt-4">

    @if (!$cartProducts->isEmpty())
        <div class="mt-4 d-flex justify-content-end">
            <form action="{{ route('carts.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center">
                    <i class="material-icons me-2">excluir</i>
                    LIMPAR MEU CARRINHO
                </button>
            </form>
        </div>