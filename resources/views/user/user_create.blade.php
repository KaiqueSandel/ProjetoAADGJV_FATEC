@extends('layout')

@section('title') Create User @endsection

@section('content')

<div class="container">
    <h2 class="mt-5 d-flex align-items-center">
        <i class="material-icons me-2">add_circle</i>
        Create User
    </h2>
    <hr class="mt-3 mb-5">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="has-validation mb-3">
            <div class="form-floating">
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}" placeholder="">
                <label for="first_name">First Name</label>
            </div>
            @error('first_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="has-validation mb-3">
            <div class="form-floating">
                <input type="text" name="last_name" id="" class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}" placeholder="">
                <label for="last_name">Last Name</label>
            </div>
            @error('last_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

@endsection