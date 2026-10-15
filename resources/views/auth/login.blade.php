@extends('layouts.app')

@section('title', 'Login | Rolliepods')

@section('content')
<section class="page-dark-bg auth-page">
    <div class="container auth-grid">
        <div class="auth-art"><img src="{{ asset('img/login-signuppage/sloganlgn-snu.png') }}" alt="Live comfortably. Live Rolliepods."></div>

        <form class="auth-card" method="POST" action="{{ route('login.perform') }}" novalidate>
            @csrf
            <div class="form-group"><label for="login">Username | Email</label>
                <input class="pill-input" id="login" name="login" value="{{ old('login') }}" autocomplete="username"></div>
            <div class="form-group"><label for="password">Password</label>
                <input class="pill-input" id="password" type="password" name="password" autocomplete="current-password"></div>
            <p class="switch-text">Don't have an account? <a href="{{ route('register') }}" class="text-orange">Sign up</a></p>
            @if($errors->any())<ul class="form-errors" role="alert">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>@endif
            <hr>
            <button type="submit" class="btn-coral">Login</button>
        </form>
    </div>
</section>
@endsection
