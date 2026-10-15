
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

        <!-- Dynamic Announcements Section -->
        <section class="home-announcements container">
            <h2 class="announcements-title">Announcements</h2>

            <div class="announcements-grid">
                @forelse($posts as $post)
                    <div class="announcement-card border-{{ $post->card_color }}" 
                         onclick="openAnnouncementModal({{ json_encode($post->title) }}, {{ json_encode($post->created_at->format('F d, Y')) }}, {{ json_encode($post->image ? asset('storage/' . $post->image) : '') }}, {{ json_encode($post->content) }})">
                        <div class="card-inner">
                            <span class="card-date">{{ $post->created_at->format('M d, Y') }}</span>
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <p class="card-preview">{{ Str::limit($post->content, 100) }}</p>
                            <span class="btn-read">READ</span>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; font-family: 'Quicksand'; font-size: 1.1rem; color: #ffffff;">
                        No announcements posted yet.
                    </div>
                @endforelse
            </div>

            <div class="see-more-wrap">
                <a href="{{ route('news') }}" class="btn-see-more">SEE MORE</a>
            </div>
        </section>

    </div>

</div>

<!-- Announcement Details Popup Modal -->
<div id="announcementModal" class="modal-overlay" onclick="closeModalOnOverlay(event)">
    <div class="modal-card">
        <span class="modal-close-btn" onclick="closeAnnouncementModal()">&times;</span>
        <span class="modal-date" id="modalDate"></span>
        <h2 class="modal-title" id="modalTitle"></h2>
        
        <div id="modalImageContainer" style="display:none; text-align:center; margin-bottom:20px;">
            <img id="modalImage" src="" alt="Announcement Image" class="modal-banner-img">
        </div>

        <p class="modal-text" id="modalContent"></p>
    </div>
</div>

<script>
function openAnnouncementModal(title, date, imageUrl, content) {
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalDate').innerText = date;
    document.getElementById('modalContent').innerText = content;
    
    const imgContainer = document.getElementById('modalImageContainer');
    const imgElement = document.getElementById('modalImage');
    
    if (imageUrl && imageUrl.trim() !== '') {
        imgElement.src = imageUrl;
        imgContainer.style.display = 'block';
    } else {
        imgContainer.style.display = 'none';
        imgElement.src = '';
    }
    
    document.getElementById('announcementModal').classList.add('active');
}

function closeAnnouncementModal() {
    document.getElementById('announcementModal').classList.remove('active');
}

function closeModalOnOverlay(e) {
    if (e.target.id === 'announcementModal') {
        closeAnnouncementModal();
    }
}
</script>

<style>
/* 1. Hero Section with Building Background Image */
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
    cursor: pointer;
    transition: transform 0.2s ease;
}

.announcement-card:hover {
    transform: translateY(-4px);
}

.border-orange { background-color: #f15a24; }
.border-blue { background-color: #27408b; border: 2px solid #ffffff; }
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

/* Modal Styles */
.modal-overlay { 
    display: none; 
    position: fixed; 
    inset: 0; 
    background-color: rgba(7, 24, 79, 0.85); 
    backdrop-filter: blur(4px); 
    z-index: 2000; 
    align-items: center; 
    justify-content: center; 
    padding: 20px; 
}

.modal-overlay.active { 
    display: flex; 
}

.modal-card { 
    background-color: #faf2e6; 
    color: #0b2575; 
    border-radius: 25px; 
    max-width: 650px; 
    width: 100%; 
    padding: 40px; 
    position: relative; 
    max-height: 85vh; 
    overflow-y: auto; 
    border: 3px solid #8cc63f; 
}

.modal-close-btn { 
    position: absolute; 
    top: 15px; 
    right: 25px; 
    font-size: 2.5rem; 
    font-weight: bold; 
    cursor: pointer; 
    color: #0b2575; 
}

.modal-date { 
    font-family: 'Fredoka', sans-serif; 
    color: #f15a24; 
    font-weight: 700; 
    font-size: 0.95rem; 
}

.modal-title { 
    font-family: 'Fredoka', sans-serif; 
    font-size: 2.8rem; 
    margin: 5px 0 20px; 
    line-height: 1.1; 
    color: #0b2575; 
}

.modal-banner-img { 
    max-width: 100%; 
    max-height: 300px; 
    border-radius: 16px; 
    object-fit: cover; 
}

.modal-text { 
    font-family: 'Quicksand', sans-serif; 
    font-size: 1.05rem; 
    line-height: 1.7; 
    color: #1e293b; 
    white-space: pre-line; 
}
</style>
@endsection
