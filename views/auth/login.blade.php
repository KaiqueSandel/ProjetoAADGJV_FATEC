@extends('layout')

@section('content')

@if (auth()->check())

    <div>
        <p>Logged</p>
    </div>

@endif

@endsection