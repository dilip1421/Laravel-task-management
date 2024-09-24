@if (Route::has('login'))
    <nav class="m-2">
        @auth
            
            <a href="{{ url('/dashboard') }}"
                class="btn btn-primary">
                Dashboard
            </a>
            <a href="{{ url('/logout') }}"
                class="btn btn-danger float-end">
                Logout
            </a>
        @else
            <a href="{{ route('login') }}"
                class="btn btn-success">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="btn btn-secondary">
                    Register
                </a>
            @endif
        @endauth
    </nav>
@endif
