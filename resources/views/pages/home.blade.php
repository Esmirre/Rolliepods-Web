@extends('layouts.app')

@section('title', 'Rolliepods - Home')

@section('content')
<div class="homepage-wrapper">
    
    <!-- Hero Section with Building Background Image -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(11, 37, 117, 0.35), rgba(11, 37, 117, 0.35)), url('{{ asset('img/homepage/buildbghm.png') }}');">
        <div class="hero-content container">
            <h1 class="hero-main-title">Rolliepods</h1>
            <span class="hero-badge">Bedspace & Condo Sharing Provider</span>
            <p class="hero-description">
                We offer shared living accommodations for individuals looking for a convenient and accessible place to stay within the area. We also aim to create a comfortable and welcoming living environment while maintaining an easygoing, reliable, and supportive atmosphere for its tenants.
            </p>
            <div class="hero-buttons">
                <a href="{{ route('about') }}" class="btn-outline">LEARN MORE</a>
                <a href="{{ route('contact') }}" class="btn-white">CONTACT US</a>
            </div>
        </div>
    </section>

    <!-- Rest of Homepage (Solid Blue Background) -->
    <div class="page-dark-bg">
        
        <!-- Bunk Beds Offer Section -->
        <section class="offer-section container">
            <div class="offer-card">
                <div class="offer-text">
                    <h2>Live comfortably.<br>Live <span class="text-orange">Rolliepods</span>.</h2>
                    <p class="offer-subtext">
                        Our bunk beds starts at <strong class="text-green">5,500 Php</strong> for upper bunk and <strong class="text-green">6,000 Php</strong> for lower bunk.
                    </p>
                </div>
                <div class="offer-images">
                    <img src="{{ asset('img/aboutpage/buildabt.png') }}" alt="Bunk Bed Setup 1" class="offer-img-top">
                    <img src="{{ asset('img/aboutpage/towerabt.png') }}" alt="Bunk Bed Setup 2" class="offer-img-bottom">
                </div>
            </div>
        </section>

        <!-- Announcements Section -->
        <section class="home-announcements container">
            <h2 class="announcements-title">Announcements</h2>

            <div class="announcements-grid">
                <!-- Card 1 (Orange Border) -->
                <div class="announcement-card border-orange">
                    <div class="card-inner">
                        <span class="card-date">DATE</span>
                        <h3 class="card-title">Title</h3>
                        <p class="card-preview">Text preview..........................................................................................</p>
                        <a href="{{ route('news') }}" class="btn-read">READ</a>
                    </div>
                </div>

                <!-- Card 2 (White / Blue Border) -->
                <div class="announcement-card border-blue">
                    <div class="card-inner">
                        <span class="card-date">DATE</span>
                        <h3 class="card-title">Title</h3>
                        <p class="card-preview">Text preview..........................................................................................</p>
                        <a href="{{ route('news') }}" class="btn-read">READ</a>
                    </div>
                </div>

                <!-- Card 3 (Green Border) -->
                <div class="announcement-card border-green">
                    <div class="card-inner">
                        <span class="card-date">DATE</span>
                        <h3 class="card-title">Title</h3>
                        <p class="card-preview">Text preview..........................................................................................</p>
                        <a href="{{ route('news') }}" class="btn-read">READ</a>
                    </div>
                </div>
            </div>

            <div class="see-more-wrap">
                <a href="{{ route('news') }}" class="btn-see-more">SEE MORE</a>
            </div>
        </section>

    </div>

</div>

<style>
/* 1. Hero Section with Background Image */
.hero-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 100px 20px 120px;
    text-align: center;
    color: #ffffff;
}

.hero-main-title {
    font-family: 'Fredoka', sans-serif;
    font-size: 4.5rem;
    color: #ffffff;
    margin-bottom: 5px;
    line-height: 1.1;
}

.hero-badge {
    display: inline-block;
    background-color: #8cc63f;
    color: #0b2575;
    font-family: 'Fredoka', sans-serif;
    font-weight: 700;
    font-size: 0.85rem;
    padding: 6px 18px;
    border-radius: 12px;
    margin-bottom: 25px;
    letter-spacing: 0.5px;
}

.hero-description {
    max-width: 680px;
    margin: 0 auto 35px;
    font-family: 'Quicksand', sans-serif;
    font-size: 0.95rem;
    line-height: 1.6;
    color: #ffffff;
    font-weight: 600;
}

.hero-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.btn-outline {
    border: 2px solid #ffffff;
    color: #ffffff;
    padding: 10px 28px;
    border-radius: 10px;
    font-family: 'Fredoka', sans-serif;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s ease;
}

.btn-outline:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: #ffffff;
}

.btn-white {
    background-color: #ffffff;
    color: #0b2575;
    padding: 10px 28px;
    border-radius: 10px;
    font-family: 'Fredoka', sans-serif;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s ease;
}

.btn-white:hover {
    background-color: #f15a24;
    color: #ffffff;
}

/* 2. Solid Navy Blue Section for Rest of Homepage */
.page-dark-bg {
    background-color: #0b2575;
    color: #ffffff;
    padding: 60px 0 80px;
}

/* Bunk Beds Offer Card */
.offer-card {
    background-color: #faf2e6;
    color: #0b2575;
    border-radius: 30px;
    padding: 40px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 80px;
    gap: 30px;
    flex-wrap: wrap;
}

.offer-text h2 {
    font-family: 'Fredoka', sans-serif;
    font-size: 2.8rem;
    line-height: 1.1;
    margin-bottom: 15px;
}

.offer-subtext {
    font-family: 'Quicksand', sans-serif;
    font-size: 1rem;
    font-weight: 600;
}

.text-orange { color: #f15a24; }
.text-green { color: #8cc63f; }

.offer-images {
    display: flex;
    gap: 15px;
}

.offer-images img {
    width: 210px;
    height: 150px;
    object-fit: cover;
    border-radius: 18px;
}

/* Announcements Section */
.announcements-title {
    font-family: 'Fredoka', sans-serif;
    font-size: 3.2rem;
    color: #8cc63f;
    text-align: center;
    margin-bottom: 40px;
}

.announcements-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 35px;
}

.announcement-card {
    border-radius: 24px;
    padding: 12px;
}

.border-orange { background-color: #f15a24; }
.border-blue { background-color: #0b2575; border: 2px solid #ffffff; }
.border-green { background-color: #8cc63f; }

.card-inner {
    background-color: #faf2e6;
    color: #0b2575;
    border-radius: 16px;
    padding: 22px;
    min-height: 230px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-date {
    font-family: 'Fredoka', sans-serif;
    font-size: 0.85rem;
    opacity: 0.7;
}

.card-title {
    font-family: 'Fredoka', sans-serif;
    font-size: 2.2rem;
    margin: 5px 0 10px;
}

.card-preview {
    font-family: 'Quicksand', sans-serif;
    font-size: 0.85rem;
    opacity: 0.8;
    word-break: break-all;
}

.btn-read {
    align-self: flex-end;
    border: 1.5px solid #0b2575;
    color: #0b2575;
    padding: 4px 22px;
    border-radius: 12px;
    font-family: 'Fredoka', sans-serif;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.9rem;
    transition: all 0.2s ease;
}

.btn-read:hover {
    background-color: #0b2575;
    color: #ffffff;
}

.see-more-wrap {
    text-align: center;
}

.btn-see-more {
    display: inline-block;
    border: 2px solid #ffffff;
    color: #ffffff;
    padding: 8px 32px;
    border-radius: 12px;
    font-family: 'Fredoka', sans-serif;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.2s ease;
}

.btn-see-more:hover {
    background-color: rgba(255, 255, 255, 0.2);
}
</style>
@endsection
