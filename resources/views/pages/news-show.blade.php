@extends('layouts.app')

@section('title', $post->title . ' | Rolliepods')

@section('content')
<section class="page-dark-bg news-page">
    <div class="container news-container">
        <a href="{{ route('news') }}" class="btn-outline-light">&larr; Back to announcements</a>

        <article class="ann ann-{{ $post->card_color }} ann-wide" style="margin-top: 2rem; cursor: default;">
            <div class="ann-inner">
                <time class="ann-date">{{ $post->created_at->format('F d, Y') }}</time>
                <h1 class="ann-title">{{ $post->title }}</h1>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="modal-banner-img" style="display:block; margin:1rem 0;">
                @endif
                <p class="modal-text" style="white-space:pre-line;">{{ $post->content }}</p>
            </div>
        </article>
    </div>
</section>
@endsection
