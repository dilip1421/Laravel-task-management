@extends('layout.app')
@section('content')
    <div class="container">
        <form action="{{ route('register') }}" method="post" class="border p-3 w-50 m-auto">
            @csrf
            <h2>Registration form</h2>
            <strong>Name</strong>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @error('name')
                <p class="alert-danger">{{ $message }}</p>
            @enderror
            <strong>Email</strong>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
            @error('email')
                <p class="alert-danger">{{ $message }}</p>
            @enderror
            <strong>Password</strong>
            <input type="password" class="form-control" name="password">
            @error('password')
                <p class="alert-danger">{{ $message }}</p>
            @enderror
            <strong>Confirm Password</strong>
            <input type="text" class="form-control" name="password_confirmation">
            <button type="submit" class="btn btn-secondary mt-3">Register</button>
        </form>
    </div>
@endsection
