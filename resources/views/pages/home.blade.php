@extends('layouts.app')

@section('title', 'Rolliepods | Good Spaces, Good People')

@section('content')
<section class="hero-section" style="background-image: linear-gradient(rgba(16,39,127,.3), rgba(16,39,127,.3)), url('{{ asset('img/homepage/buildbghm.png') }}');">
    <div class="hero-content container">
        <h1 class="hero-main-title">Rolliepods</h1>
        <span class="hero-badge">Bedspace &amp; Condo Sharing Provider</span>
        <p class="hero-description">We offer shared living accommodations for individuals looking for a convenient and accessible place to stay within the area. We also aim to create a comfortable and welcoming living environment while maintaining an easygoing, reliable, and supportive atmosphere for its tenants.</p>
        <div class="hero-buttons">
            <a href="{{ route('about') }}" class="btn-outline-light">Learn more</a>
            <a href="{{ route('contact') }}" class="btn-white">Contact us</a>
        </div>
    </div>
</section>

<section class="page-dark-bg offer-wrap">
    <div class="container">
        <div class="offer-card">
            <div class="offer-text">
                <h2>Live<br>comfortably.<br>Live <span class="text-orange">Rolliepods.</span></h2>
                <p class="offer-subtext">Our bunk beds start at <strong class="text-green">5,500 Php</strong> for upper bunk and <strong class="text-green">6,000 Php</strong> for lower bunk.</p>
            </div>
            <div class="offer-art"><img src="{{ asset('img/homepage/bunkshm.png') }}" alt="Bunk beds with privacy curtains"></div>
        </div>
    </div>
</section>

<section class="home-announcements">
    <div class="container">
        <h2 class="announcements-title">Announcements</h2>
        <div class="announcements-grid">
            @forelse($posts as $post)
                @include('partials.announcement-card', ['post' => $post])
            @empty
                <p class="empty-note">No announcements posted yet.</p>
            @endforelse
        </div>
        <div class="see-more-wrap"><a href="{{ route('news') }}" class="btn-see-more">See more</a></div>
    </div>
</section>
@endsection
