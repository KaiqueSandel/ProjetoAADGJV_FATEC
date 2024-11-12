@extends('layout')

@section('content')

@if (auth()->check())

    <div class="container d-flex justify-content-center align-items-center w-50" style="min-height: 100vh">
        <div class="col text-center">
            <div class="row w-100 mb-5">
                <p>
                    You're already logged in as <span class="text-uppercase">{{ auth()->user()->first_name }}</span>
                </p>
            </div>
            <div class="row w-100 justify-content-around">
                <a href="{{ route('home') }}" class="btn btn-primary w-25">Go to homepage</a>
                <a href="{{ route('login.destroy') }}" class="btn btn-danger w-25">Logout</a>
            </div>
        </div>
    </div>
@endif

@endsection