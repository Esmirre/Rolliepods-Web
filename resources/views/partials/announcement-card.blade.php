@php($variant = $variant ?? 'card')
<article class="ann ann-{{ $post->card_color }} {{ $variant === 'banner' ? 'ann-wide' : '' }} js-announcement" tabindex="0" role="button"
         aria-label="Read announcement: {{ $post->title }}"
         data-title="{{ $post->title }}"
         data-date="{{ $post->created_at->format('F d, Y') }}"
         data-image="{{ $post->image ? asset('storage/' . $post->image) : '' }}"
         data-content="{{ $post->content }}">
    <div class="ann-inner">
        <time class="ann-date">{{ $post->created_at->format('M d, Y') }}</time>
        <h3 class="ann-title">{{ $post->title }}</h3>
        <p class="ann-preview">{{ Str::limit($post->content, $variant === 'banner' ? 180 : 100) }}</p>
        <span class="btn-read">Read</span>
    </div>
</article>
