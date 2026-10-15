@extends('layouts.app')

@section('title', 'Manage Posts - Rolliepods Admin')

@section('content')
<div class="page-dark-bg">
    <div class="container admin-layout">
        
        <div class="admin-top-title">
            <span class="sub-welcome">Admin Dashboard</span>
            <h1 class="main-admin-heading">Manage Posts</h1>
        </div>

        <div class="admin-main-grid">
            
            <!-- Sidebar Navigation -->
            <div class="admin-sidebar-orange">
                <a href="{{ route('dashboard') }}" class="admin-nav-item">Dashboard</a>
                <a href="{{ route('admin.posts') }}" class="admin-nav-item active">Manage Posts</a>
                <a href="{{ route('admin.inquiries') }}" class="admin-nav-item">Inquiries</a>
                <a href="{{ route('admin.settings') }}" class="admin-nav-item">Settings</a>
            </div>

            <!-- Main Content Area -->
            <div class="admin-content-card">

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <!-- Post Creation Form -->
                <div class="form-section">
                    <h3 class="section-title" id="form-heading">Create New Announcement</h3>
                    
                    <form id="post-form" action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="post-title" required class="admin-input" placeholder="e.g., Scheduled Maintenance">
                        </div>

                        <div class="form-group">
                            <label>Content / Details</label>
                            <textarea name="content" id="post-content" rows="4" required class="admin-input" placeholder="Write full announcement content here..."></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Card Theme Color</label>
                                <select name="card_color" id="post-color" class="admin-input">
                                    <option value="orange">Orange Border</option>
                                    <option value="blue">Blue Border</option>
                                    <option value="green">Green Border</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Image (Optional)</label>
                                <input type="file" name="image" class="admin-input">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-save" id="submit-btn">Publish Post</button>
                            <button type="button" class="btn-cancel" id="cancel-edit-btn" style="display:none;" onclick="resetForm()">Cancel Edit</button>
                        </div>
                    </form>
                </div>

                <hr class="admin-divider">

                <!-- Existing Announcements List -->
                <h3 class="section-title">Published Announcements ({{ $posts->total() }})</h3>

                <div class="posts-list">
                    @forelse($posts as $post)
                        <div class="post-item-card border-{{ $post->card_color }}">
                            <div class="post-item-header">
                                <div>
                                    <h4 class="post-item-title">{{ $post->title }}</h4>
                                    <span class="post-item-date">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="post-actions">
                                    <button class="btn-edit" onclick="editPost({{ json_encode($post) }})">Edit</button>
                                    
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <p class="post-item-preview">{{ Str::limit($post->content, 120) }}</p>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-thumbnail">
                            @endif
                        </div>
                    @empty
                        <p style="text-align:center; color:#0b2575; font-family:'Quicksand';">No announcements posted yet.</p>
                    @endforelse

                    <div style="margin-top: 20px;">
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
function editPost(post) {
    document.getElementById('form-heading').innerText = 'Edit Announcement';
    document.getElementById('submit-btn').innerText = 'Update Post';
    document.getElementById('cancel-edit-btn').style.display = 'inline-block';
    
    const form = document.getElementById('post-form');
    form.action = '/admin/posts/' + post.id;
    document.getElementById('form-method').value = 'PUT';
    
    document.getElementById('post-title').value = post.title;
    document.getElementById('post-content').value = post.content;
    document.getElementById('post-color').value = post.card_color;
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function resetForm() {
    document.getElementById('form-heading').innerText = 'Create New Announcement';
    document.getElementById('submit-btn').innerText = 'Publish Post';
    document.getElementById('cancel-edit-btn').style.display = 'none';
    
    const form = document.getElementById('post-form');
    form.action = "{{ route('admin.posts.store') }}";
    document.getElementById('form-method').value = 'POST';
    form.reset();
}
</script>

<style>
.page-dark-bg { background-color: #0b2575; padding: 40px 0 60px; min-height: 85vh; }
.admin-top-title { text-align: right; margin-bottom: 30px; }
.sub-welcome { font-family: 'Quicksand', sans-serif; color: #ffffff; font-size: 1.2rem; display: block; }
.main-admin-heading { font-family: 'Fredoka', sans-serif; font-size: 3.5rem; color: #8cc63f; margin: 0; }
.admin-main-grid { display: grid; grid-template-columns: 240px 1fr; gap: 30px; align-items: start; }
.admin-sidebar-orange { background-color: #f15a24; border-radius: 30px; padding: 25px 15px; display: flex; flex-direction: column; gap: 15px; }
.admin-nav-item { display: block; text-align: center; background-color: transparent; color: #ffffff; font-family: 'Fredoka', sans-serif; font-size: 1.1rem; padding: 12px 15px; border-radius: 20px; text-decoration: none; font-weight: 700; }
.admin-nav-item.active { background-color: #faf2e6; color: #0b2575; }
.admin-content-card { background-color: #faf2e6; border-radius: 30px; padding: 35px; }
.alert-success { background-color: #8cc63f; color: #0b2575; font-family: 'Fredoka', sans-serif; font-weight: 700; padding: 12px 20px; border-radius: 15px; margin-bottom: 20px; }

.section-title { font-family: 'Fredoka', sans-serif; color: #0b2575; font-size: 1.6rem; margin-bottom: 20px; }
.form-group { margin-bottom: 15px; }
.form-group label { display: block; font-family: 'Fredoka', sans-serif; color: #0b2575; margin-bottom: 5px; }
.admin-input { width: 100%; border: 2px solid #0b2575; background: #ffffff; border-radius: 15px; padding: 10px 15px; font-family: 'Quicksand', sans-serif; box-sizing: border-box; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
.form-actions { display: flex; gap: 10px; margin-top: 15px; }
.btn-save { background-color: #f15a24; color: #ffffff; border: none; padding: 10px 25px; border-radius: 20px; font-family: 'Fredoka', sans-serif; font-weight: 700; cursor: pointer; }
.btn-cancel { background-color: #64748b; color: #ffffff; border: none; padding: 10px 20px; border-radius: 20px; font-family: 'Fredoka', sans-serif; font-weight: 700; cursor: pointer; }

.admin-divider { border: none; border-top: 2px solid #0b2575; margin: 30px 0; opacity: 0.2; }
.posts-list { display: flex; flex-direction: column; gap: 15px; }
.post-item-card { background-color: #ffffff; border-radius: 18px; padding: 20px; border-left: 8px solid #0b2575; }
.border-orange { border-left-color: #f15a24; }
.border-blue { border-left-color: #0b2575; }
.border-green { border-left-color: #8cc63f; }
.post-item-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px; }
.post-item-title { font-family: 'Fredoka', sans-serif; font-size: 1.4rem; color: #0b2575; margin: 0; }
.post-item-date { font-family: 'Quicksand', sans-serif; font-size: 0.85rem; color: #64748b; font-weight: 700; }
.post-item-preview { font-family: 'Quicksand', sans-serif; color: #334155; font-size: 0.95rem; line-height: 1.4; margin-bottom: 10px; }
.post-thumbnail { height: 70px; width: auto; border-radius: 10px; object-fit: cover; }
.btn-edit { background-color: #8cc63f; color: #0b2575; border: none; padding: 6px 16px; border-radius: 12px; font-family: 'Fredoka', sans-serif; font-weight: 700; cursor: pointer; }
.btn-delete { background-color: #e11d48; color: #ffffff; border: none; padding: 6px 16px; border-radius: 12px; font-family: 'Fredoka', sans-serif; font-weight: 700; cursor: pointer; }
</style>
@endsection
