@extends('layout')

@section('content')

@if (auth()->check())

    <div>
        <p>Loggin</p>
    </div>

@endif

@endsection