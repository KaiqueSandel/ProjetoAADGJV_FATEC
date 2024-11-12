@extends('layout')

@section('content')

@if (auth()->check())

    <div>
        <p>Loggin</p>
        <p>Logged</p>
    </div>

@endif

@endsection