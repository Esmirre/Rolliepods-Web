@extends('layouts.admin')

@section('title', 'Inquiries | Rolliepods Admin')

@section('panel')
<div class="row-between">
    <h3 class="section-title">Inquiries</h3>
    <form method="GET">
        <select class="admin-input filter" name="status" aria-label="Filter by status" onchange="this.form.submit()">
            <option value="all">All</option>
            @foreach(\App\Models\Inquiry::STATUSES as $value => $label)
                <option value="{{ $value }}" {{ $status === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </form>
</div>

<div class="posts-list">
    @forelse($items as $q)
        <div class="post-item-card inquiry">
            <h4 class="post-item-title">{{ $q->subject }}
                <span class="pill pill-{{ $q->status }}">{{ \App\Models\Inquiry::STATUSES[$q->status] }}</span></h4>
            <span class="post-item-date">
                {{ \App\Models\Inquiry::TYPES[$q->inquiry_type] ?? $q->inquiry_type }} ·
                {{ $q->tenant->full_name ?? 'Unknown tenant' }} ({{ $q->tenant->email ?? 'n/a' }}) ·
                {{ $q->created_at->format('M d, Y') }}
            </span>
            <p class="post-item-preview">{{ $q->message }}</p>

            <form method="POST" action="{{ route('admin.inquiries.update', $q->inquiry_id) }}" class="inquiry-form">
                @csrf @method('PATCH')
                <textarea class="admin-input" name="admin_response" rows="2" placeholder="Response / notes (optional)" aria-label="Admin response">{{ $q->admin_response }}</textarea>
                <div class="form-actions">
                    <select class="admin-input filter" name="status" aria-label="Status">
                        @foreach(\App\Models\Inquiry::STATUSES as $value => $label)
                            <option value="{{ $value }}" {{ $q->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-save">Save</button>
                </div>
            </form>
        </div>
    @empty
        <p class="empty-row">No inquiries here.</p>
    @endforelse
</div>
<div class="pager">{{ $items->links('pagination::default') }}</div>
@endsection
