@extends('layouts.app')

@section('title', 'Announcements | Rolliepods')

@section('content')
<section class="page-dark-bg news-page">
    <div class="container news-container">
        <h1 class="news-page-title">Announcements</h1>
        @forelse($posts as $post)
            @include('partials.announcement-card', ['post' => $post, 'variant' => 'banner'])
        @empty
            <p class="empty-note">No announcements at this time. Check back soon!</p>
        @endforelse
    </div>
</section>
@endsection
