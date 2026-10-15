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
            <div class="post-item-header">
                <div>
                    <h4 class="post-item-title">{{ \App\Models\Inquiry::TYPES[$q->type] ?? $q->type }}
                        <span class="pill pill-{{ $q->status }}">{{ \App\Models\Inquiry::STATUSES[$q->status] }}</span></h4>
                    <span class="post-item-date">{{ $q->name }} · {{ $q->email }} · {{ $q->created_at->format('M d, Y') }}</span>
                </div>
                <form method="POST" action="{{ route('admin.inquiries.update', $q) }}">
                    @csrf @method('PATCH')
                    <select class="admin-input filter" name="status" aria-label="Update status" onchange="this.form.submit()">
                        @foreach(\App\Models\Inquiry::STATUSES as $value => $label)
                            <option value="{{ $value }}" {{ $q->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <p class="post-item-preview">{{ $q->message }}</p>
        </div>
    @empty
        <p class="empty-row">No inquiries here.</p>
    @endforelse
</div>
<div class="pager">{{ $items->links('pagination::default') }}</div>
@endsection
