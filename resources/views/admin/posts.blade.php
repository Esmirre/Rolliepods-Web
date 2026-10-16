@extends('layouts.admin')

@section('title', 'Manage Posts | Rolliepods Admin')

@section('panel')
<h3 class="section-title" id="form-heading">Create New Announcement</h3>

<form id="post-form" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" data-store-url="{{ route('admin.posts.store') }}" novalidate>
    @csrf
    <input type="hidden" name="_method" id="form-method" value="POST">

    <div class="form-group"><label for="post-title">Title</label>
        <input class="admin-input" type="text" name="title" id="post-title" value="{{ old('title') }}" placeholder="e.g., Scheduled Maintenance"></div>
    <div class="form-group"><label for="post-content">Content / Details</label>
        <textarea class="admin-input" name="content" id="post-content" rows="4" placeholder="Write the full announcement here...">{{ old('content') }}</textarea></div>
    <div class="form-row">
        <div class="form-group"><label for="post-color">Card Theme Color</label>
            <select class="admin-input" name="card_color" id="post-color">
                <option value="orange">Coral</option><option value="blue">Blue</option><option value="green">Olive green</option>
            </select></div>
        <div class="form-group"><label for="post-image">Image (optional, max 2 MB)</label>
            <input class="admin-input" type="file" name="image" id="post-image" accept="image/*"></div>
    </div>

    <label class="check"><input type="checkbox" name="is_published" id="post-published" value="1" checked> Publish now (untick to save as a draft)</label>

    @if($errors->any())<ul class="form-errors" role="alert">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>@endif

    <div class="form-actions">
        <button type="submit" class="btn-save" id="submit-btn">Publish Post</button>
        <button type="button" class="btn-cancel" id="cancel-edit-btn" hidden>Cancel Edit</button>
    </div>
</form>

<hr class="admin-divider">

<h3 class="section-title">Published Announcements ({{ $posts->total() }})</h3>
<div class="posts-list">
    @forelse($posts as $post)
        <div class="post-item-card border-{{ $post->card_color }}">
            <div class="post-item-header">
                <div>
                    <h4 class="post-item-title">{{ $post->title }}@unless($post->is_published) <span class="pill pill-in_progress">Draft</span>@endunless</h4>
                    <span class="post-item-date">{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                <div class="post-actions">
                    <button type="button" class="btn-edit js-edit-post"
                            data-update-url="{{ route('admin.posts.update', $post->announcement_id) }}"
                            data-post="{{ json_encode($post->only(['title', 'content', 'card_color', 'is_published'])) }}">Edit</button>
                    <form action="{{ route('admin.posts.destroy', $post->announcement_id) }}" method="POST" class="inline-form" onsubmit="return confirm('Delete this post?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
            <p class="post-item-preview">{{ Str::limit($post->content, 120) }}</p>
            @if($post->image)<img src="{{ asset('storage/' . $post->image) }}" alt="" class="post-thumbnail">@endif
        </div>
    @empty
        <p class="empty-row">No announcements posted yet.</p>
    @endforelse
</div>
<div class="pager">{{ $posts->links() }}</div>
@endsection
