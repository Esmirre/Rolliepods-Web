@extends('layouts.app')

@section('title', 'Rolliepods - News & Announcements')

@section('content')
<div class="page-dark-bg">
    <div class="container" style="max-width: 900px;">
        <h1 class="news-page-title">Announcements</h1>

        @forelse($posts as $post)
            <div class="news-banner banner-{{ $post->card_color }}" 
                 onclick="openAnnouncementModal('{{ e($post->title) }}', '{{ $post->created_at->format('F d, Y') }}', '{{ $post->image ? asset('storage/' . $post->image) : '' }}', '{{ e($post->content) }}')">
                <div class="banner-inner">
                    <span class="banner-date">{{ $post->created_at->format('M d, Y') }}</span>
                    <h2 class="banner-title">{{ $post->title }}</h2>
                    <p class="banner-preview">{{ Str::limit($post->content, 180) }}</p>
                    <button class="btn-read-news">READ</button>
                </div>
            </div>
        @empty
            <div style="text-align: center; color: #ffffff; font-family: 'Quicksand'; font-size: 1.2rem;">
                No announcements at this time. Check back soon!
            </div>
        @endforelse

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
.page-dark-bg { background-color: #0b2575; padding: 50px 0; min-height: 85vh; }
.news-page-title { font-family: 'Fredoka', sans-serif; font-size: 3.5rem; color: #ffffff; text-align: center; margin-bottom: 40px; }
.news-banner { border-radius: 25px; padding: 18px; margin-bottom: 30px; cursor: pointer; transition: transform 0.2s ease; }
.news-banner:hover { transform: translateY(-4px); }
.banner-orange { background-color: #f15a24; }
.banner-blue { background-color: #27408b; border: 2px solid #ffffff; }
.banner-green { background-color: #8cc63f; }
.banner-inner { background-color: #faf2e6; border-radius: 16px; padding: 30px; color: #0b2575; }
.banner-date { font-family: 'Fredoka', sans-serif; font-size: 0.9rem; font-weight: 700; opacity: 0.7; }
.banner-title { font-family: 'Fredoka', sans-serif; font-size: 2.5rem; margin: 5px 0 15px; }
.banner-preview { font-family: 'Quicksand', sans-serif; opacity: 0.85; margin-bottom: 20px; line-height: 1.5; }
.btn-read-news { float: right; border: 1.5px solid #0b2575; background: transparent; color: #0b2575; padding: 6px 24px; border-radius: 12px; font-family: 'Fredoka', sans-serif; font-weight: 700; cursor: pointer; }

/* Modal Styles */
.modal-overlay { display: none; position: fixed; inset: 0; background-color: rgba(7, 24, 79, 0.85); backdrop-filter: blur(4px); z-index: 2000; align-items: center; justify-content: center; padding: 20px; }
.modal-overlay.active { display: flex; }
.modal-card { background-color: #faf2e6; color: #0b2575; border-radius: 25px; max-width: 650px; width: 100%; padding: 40px; position: relative; max-height: 85vh; overflow-y: auto; border: 3px solid #8cc63f; }
.modal-close-btn { position: absolute; top: 15px; right: 25px; font-size: 2.5rem; font-weight: bold; cursor: pointer; color: #0b2575; }
.modal-date { font-family: 'Fredoka', sans-serif; color: #f15a24; font-weight: 700; font-size: 0.95rem; }
.modal-title { font-family: 'Fredoka', sans-serif; font-size: 2.8rem; margin: 5px 0 20px; line-height: 1.1; color: #0b2575; }
.modal-banner-img { max-width: 100%; max-height: 300px; border-radius: 16px; object-fit: cover; }
.modal-text { font-family: 'Quicksand', sans-serif; font-size: 1.05rem; line-height: 1.7; color: #1e293b; white-space: pre-line; }
</style>
@endsection
