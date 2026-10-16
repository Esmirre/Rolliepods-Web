@extends('layouts.app')

@section('title', 'Shared Living Guidelines | Rolliepods')

@section('content')
<section class="page-dark-bg guidelines-page">
    <div class="container py-5">
        <h1 class="page-title-green text-center mb-4">Shared Living Guidelines</h1>
        <p class="text-center text-light mb-5">To ensure a safe, comfortable, and respectful environment for all Rolliepods tenants, please review our community standards below.</p>

        <div class="row g-4">
            <!-- Rule 1 -->
            <div class="col-md-6">
                <div class="card bg-dark text-light border-secondary h-100 p-4 shadow-sm">
                    <h3 class="h5 text-warning fw-bold">1. Quiet Hours & Respect</h3>
                    <p class="mb-0 text-secondary">Observe quiet hours from 10:00 PM to 6:00 AM daily. Please keep video/music audio at a low volume and use headphones when taking calls in shared areas.</p>
                </div>
            </div>

            <!-- Rule 2 -->
            <div class="col-md-6">
                <div class="card bg-dark text-light border-secondary h-100 p-4 shadow-sm">
                    <h3 class="h5 text-warning fw-bold">2. Common Area Cleanliness</h3>
                    <p class="mb-0 text-secondary">Clean up after yourself immediately when using the kitchen, dining, or bathroom facilities. Keep personal belongings inside your personal storage space.</p>
                </div>
            </div>

            <!-- Rule 3 -->
            <div class="col-md-6">
                <div class="card bg-dark text-light border-secondary h-100 p-4 shadow-sm">
                    <h3 class="h5 text-warning fw-bold">3. Guest & Visitor Policy</h3>
                    <p class="mb-0 text-secondary">For safety and privacy, visitors must be registered with management prior to arrival. Overnight guests are strictly prohibited without prior clearance.</p>
                </div>
            </div>

            <!-- Rule 4 -->
            <div class="col-md-6">
                <div class="card bg-dark text-light border-secondary h-100 p-4 shadow-sm">
                    <h3 class="h5 text-warning fw-bold">4. Maintenance Requests</h3>
                    <p class="mb-0 text-secondary">Report any broken fixtures, appliance issues, or room repairs promptly through our online Contact & Inquiry portal so staff can resolve them quickly.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
