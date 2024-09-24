@extends('layout.app')
@section('content')
    <div class="container">
        <form action="{{ route('login') }}" method="post" class="border p-3 w-50 m-auto">
            @csrf
            
            @if (Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-success">{{ Session::get('success') }}</p>
            @endif
            <h2>Login form</h2>

            <strong>Email</strong>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="alert-danger">{{ $message }}</p>
            @enderror
            <strong>Password</strong>
            <input type="password" class="form-control" name="password">
            @error('password')
                <p class="alert-danger">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-secondary mt-3">Login</button>
        </form>
    </div>
@endsection
