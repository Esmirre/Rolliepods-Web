@extends('layouts.app')

@section('title', 'About | Rolliepods')

@section('content')
<section class="page-dark-bg about-page" style="background-image: linear-gradient(rgba(16,39,127,.55), rgba(16,39,127,.55)), url('{{ asset('img/aboutpage/buildabt.png') }}');">
    <div class="container about-wrap">
        <div class="about-col">
            <div class="green-frame-card">
                <div class="inner-content-card">
                    <h1 class="page-heading">About Us</h1>
                    <p class="text-preview">Rolliepods is a bedspace and condo-sharing provider located at ADB Ave Tower, ADB Ave, Ortigas. The area is a central business district located within the boundaries of Pasig, Mandaluyong, and Quezon City, within Metro Manila. Rolliepods started its services and advertisements around December 2025, offering shared living accommodations for individuals looking for a convenient and accessible place to stay within the area. The provider aims to create a comfortable and welcoming living environment while maintaining an easygoing, reliable, and supportive atmosphere for its tenants.</p>
                    <p class="text-preview">Its location gives tenants convenient access to surrounding establishments, workplaces, and other areas within Metro Manila. To promote its available accommodations and reach potential tenants, Rolliepods maintains a dedicated Facebook page where advertisements, updates, and other relevant publication materials are posted.</p>
                </div>
            </div>

            <div class="vision-mission-card">
                <h2 class="page-heading">Vision &amp; Mission</h2>
                <h3 class="vm-label">Mission</h3>
                <p class="text-preview">To provide comfortable and thoughtfully designed shared living spaces that support everyday city living through ease, respect, and community.</p>
                <h3 class="vm-label">Vision</h3>
                <p class="text-preview">To redefine modern shared living by creating spaces that feel more human, welcoming, and connected for the next generation of urban renters.</p>
            </div>
        </div>
        <div class="about-art"><img src="{{ asset('img/aboutpage/towerabt.png') }}" alt="A traveler arriving and a tablet sketch"></div>
    </div>
</section>
@endsection
