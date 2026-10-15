@extends('layouts.app')

@section('title', 'Rolliepods - About Us')

@section('content')
<div class="page-dark-bg">
    <div class="container section-wrap">
        
        <!-- About Us Card -->
        <div class="green-frame-card">
            <div class="inner-content-card">
                <h1 class="page-heading">About Us</h1>
                <p class="text-preview">
                  Rolliepods is a bedspace and condo-sharing provider located at ADB Ave Tower, ADB Ave, Ortigas. 
                  The area is a central business district located within the boundaries of Pasig, Mandaluyong, and Quezon City, within Metro Manila. 
                  Rolliepods started its services and advertisements around December 2025, they offer shared living accommodations for individuals looking for a convenient and accessible place to stay within the area. 
                  The provider aims to create a comfortable and welcoming living environment while maintaining an easygoing, reliable, and supportive atmosphere for its tenants.
                  
                  Rolliepods offer accommodations to individuals seeking bedspace and condo-sharing arrangements within the central business district of Pasig. 
                  Its location provides tenants with convenient access to surrounding establishments, workplaces, and other areas within Metro Manila. 
                  To promote its available accommodations and reach potential tenants, Rolliepods maintains a dedicated Facebook page where advertisements, updates, 
                  and other relevant publication materials are posted. Rolliepods continues to provide shared-living options for individuals looking for accessible 
                  accommodations in the Ortigas area through its services and online presence, it continues to provide shared-living options for individuals looking 
                  for accessible accommodations in the Ortigas area.
                </p>
            </div>
        </div>

        <!-- Images Overlay -->
        <div class="about-side-images">
            <img src="{{ asset('img/aboutpage/buildabt.png') }}" alt="About Rolliepods 1" class="about-img-top">
            <img src="{{ asset('img/aboutpage/towerabt.png') }}" alt="About Rolliepods 2" class="about-img-bottom">
        </div>

        <!-- Vision & Mission Card -->
        <div class="vision-mission-card">
            <h2 class="page-heading">Vision & Mission</h2>
            <p class="text-preview">
              Our mission is To provide comfortable and thoughtfully designed shared living
              spaces that support everyday city living through ease, respect, and community.

              We envision that we will be able to redefine modern shared living by
              creating spaces that feel more human, welcoming, and connected for the next
              generation of urban renters.
            </p>
        </div>

    </div>
</div>

<style>
.page-dark-bg { background-color: #0b2575; padding: 50px 0; min-height: 80vh; }
.section-wrap { position: relative; }
.green-frame-card { background-color: #8cc63f; border-radius: 25px; padding: 15px; margin-bottom: 40px; }
.inner-content-card { background-color: #faf2e6; border-radius: 16px; padding: 40px; min-height: 250px; }
.page-heading { font-family: 'Fredoka', sans-serif; font-size: 3rem; color: #f15a24; margin-bottom: 15px; }
.text-preview { font-family: 'Quicksand', sans-serif; color: #0b2575; word-break: break-all; opacity: 0.7; }
.vision-mission-card { background-color: #faf2e6; border-radius: 20px; padding: 40px; border-bottom: 15px solid #8cc63f; }
</style>
@endsection
