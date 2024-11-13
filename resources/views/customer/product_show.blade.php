@extends('layout')

@section('title') Product Details @endsection

@section('content')

<div class="container">
    <h1 class="mt-5">PRODUCT | {{ $product->name }}</h1>
    <hr class="mt-4">

    @if ($productAlreadyInCart)
        <div class="alert alert-warning mb-4 mt-4 fs-5">
            You already have [{{ $productAlreadyInCart }}] of this product in your shopping cart.
        </div>
    @endif

    @error('error')
        <div class="alert alert-danger mt-5">{{ $message }}</div>
    @enderror

@endsection