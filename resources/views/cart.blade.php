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

        <div class="mt-4 row d-flex justify-content-start">
            <div class="col-md-7">
                @foreach ($cartProducts as $cartProduct)
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/imgs/placeholder-product-image.jpg') }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h4 class="card-title">{{ Str::limit($cartProduct->product->name, 60) }}</h4>
                                    <hr>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <p class="card-text fs-6">preço unitario ${{ number_format($cartProduct->price, 2) }}
                                            </p>
                                            <p class="card-text fs-6">quantidade {{ $cartProduct->quantity }}</p>
                                            <p class="card-text fs-6">subtotal ${{ number_format($cartProduct->subTotal(), 2) }}
                                            </p>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                                            <form action="{{ route('carts.addOne', ['product' => $cartProduct->product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-primary ms-2 d-flex align-items-center justify-content-center"
                                                    style="border-radius: 100px;">
                                                    <i class="material-icons">adicionar</i>
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('carts.removeOne', ['product' => $cartProduct->product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-primary ms-2 d-flex align-items-center justify-content-center"
                                                    style="border-radius: 100px;">
                                                    <i class="material-icons">remover</i>
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('carts.removeAll', ['product' => $cartProduct->product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-danger ms-2 d-flex align-items-center justify-content-center"
                                                    style="border-radius: 100px;">
                                                    <i class="material-icons">excluir</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container card col-md-5 d-flex align-items-center justify-content-center" style="height: 300px;">
                <div class="col-md-10">
                    <div class="row">
                        <h4>${{ number_format($cartTotal, 2) }}</h4>
                    </div>
                    <small class="text-body-secondary row mt-4">* Pague em até 12 vezes no cartão de crédito</small>
                    <small class="text-body-secondary row">* 10% de desconto para pagamento à vista</small>
                    <hr class="mt-4">
                    <div class="row">
                        <div class="col">
                            <div class="row mt-4">
                                <a href="" class="btn btn-success d-flex align-items-center justify-content-center">
                                    <i class="material-icons me-2">finalizar_compra_carrinho</i>
                                    FINALIZAR COMPRA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-5">
        Seu carrinho está vazio, tente adicionar algo! <a href="{{ route('products.getAll') }}">ir para produtos</a>
        </div>
    @endif
</div>

@endsection