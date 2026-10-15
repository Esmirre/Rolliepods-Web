@extends('layouts.app')

@section('title', 'Sign Up | Rolliepods')

@section('content')
<section class="page-dark-bg auth-page">
    <div class="container auth-grid">
        <div class="auth-art"><img src="{{ asset('img/login-signuppage/sloganlgn-snu.png') }}" alt="Live comfortably. Live Rolliepods."></div>

        <form class="auth-card" method="POST" action="{{ route('register.perform') }}" novalidate>
            @csrf
            <div class="form-group"><label for="full_name">Full name</label>
                <input class="pill-input" id="full_name" name="full_name" value="{{ old('full_name') }}" autocomplete="name"></div>
            <div class="form-group"><label for="email">Email</label>
                <input class="pill-input" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email"></div>
            <div class="form-group"><label for="password">Password</label>
                <input class="pill-input" id="password" type="password" name="password" autocomplete="new-password"></div>
            <p class="switch-text">Have an account? <a href="{{ route('login') }}" class="text-green">Log in</a></p>
            @if($errors->any())<ul class="form-errors" role="alert">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>@endif
            <hr>
            <button type="submit" class="btn-coral">Sign Up</button>
        </form>
    </div>
</section>
@endsection
