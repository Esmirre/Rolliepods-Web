@extends('layouts.app')

@section('title', 'Admin Dashboard | Rolliepods')

@section('content')
<section class="page-dark-bg admin-page">
    <div class="container">
        <div class="admin-top-title">
            <span class="sub-welcome">Welcome to the</span>
            <h1 class="main-admin-heading">Admin Dashboard</h1>
        </div>

        <div class="admin-main-grid">
            @include('partials.admin-sidebar')
            <div class="admin-content-card">
                @if(session('success'))<div class="alert-success" role="status">{{ session('success') }}</div>@endif
                @yield('panel')
            </div>
        </div>
    </div>
</section>
@endsection
