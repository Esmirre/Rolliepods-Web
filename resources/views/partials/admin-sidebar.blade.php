<aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('admin.posts') }}" class="admin-nav-item {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">Manage Posts</a>
    <a href="{{ route('admin.inquiries') }}" class="admin-nav-item {{ request()->routeIs('admin.inquiries*') ? 'active' : '' }}">Inquiries</a>
    <a href="{{ route('admin.settings') }}" class="admin-nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">Settings</a>
    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="admin-nav-item">Log Out</button></form>
</aside>
