@extends('layouts.admin')

@section('panel')
<div class="stats">
    <div class="stat"><b>{{ $postCount }}</b>Posts</div>
    <div class="stat"><b>{{ $pending }}</b>Inquiries Pending</div>
    <div class="stat"><b>{{ $resolved }}</b>Inquiries Resolved</div>
</div>
<h2 class="section-title center-text">Recent Updates</h2>
<ul class="recent-list">
    @forelse($recent as $r)
        <li><span>{{ $r['label'] }}</span><time>{{ $r['at']->format('M d, Y') }}</time></li>
    @empty
        <li class="empty-row">No activity yet.</li>
    @endforelse
</ul>
@endsection
