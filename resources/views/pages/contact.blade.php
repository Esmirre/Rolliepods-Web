@extends('layouts.app')

@section('title', 'Contact Us | Rolliepods')

@section('content')
<section class="page-dark-bg contact-page">
    <div class="container">
        <h1 class="page-title-green">Contact Us!</h1>
        <div class="contact-grid">
            <div class="contact-art"><img src="{{ asset('img/contactpage/towercpu.png') }}" alt="Tenants traveling, working and relaxing"></div>

            <form class="form-card" method="POST" action="{{ route('contact.submit') }}" novalidate>
                @csrf
                @guest
                    <p class="notice">Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">sign up</a> to send a message, so we know who to reply to.</p>
                @endguest

                <div class="form-group"><label for="name">Name</label>
                    <input class="pill-input" id="name" value="{{ auth()->user()->full_name ?? '' }}" readonly tabindex="-1"></div>
                <div class="form-group"><label for="email">Email</label>
                    <input class="pill-input" id="email" value="{{ auth()->user()->email ?? '' }}" readonly tabindex="-1"></div>
                <div class="form-group"><label for="inquiry_type" class="sr-only">Message type</label>
                    <select class="pill-input" id="inquiry_type" name="inquiry_type">
                        <option value="" disabled {{ old('inquiry_type') ? '' : 'selected' }}>Message type</option>
                        @foreach($types as $value => $label)
                            <option value="{{ $value }}" {{ old('inquiry_type') === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select></div>
                <div class="form-group"><label for="subject">Subject</label>
                    <input class="pill-input" id="subject" name="subject" value="{{ old('subject') }}" maxlength="200"></div>
                <div class="form-group"><label for="message">Details</label>
                    <textarea class="pill-input area" id="message" name="message" rows="6">{{ old('message') }}</textarea></div>

                @if($errors->any())<ul class="form-errors" role="alert">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>@endif
                @if(session('success'))<p class="alert-success" role="status">{{ session('success') }}</p>@endif

                <button type="submit" class="btn-coral" @guest disabled @endguest>Send</button>
            </form>
        </div>
    </div>
</section>
@endsection
