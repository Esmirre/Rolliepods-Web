@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <h1>Rolliepods</h1>
        <p>We offer shared living accommodations for individuals looking for a convenient and accessible place to stay within the area. 
           We also aim to create a comfortable and welcoming living environment while maintaining an easygoing, reliable, 
           and supportive atmosphere for its tenants.</p>
        <div class="hero-buttons">
            <button class="btn btn-outline">LEARN MORE</button>
            <button class="btn btn-filled">CONTACT US</button>
        </div>
    </section>

    <!-- Mid Section -->
    <section class="feature-split">
        <div class="feature-text">
            <h2>Live<br>comfortably.<br>Live <span>Rolliepods</span>.</h2>
            <p><br>Our bunk beds start at <strong>5,500 Php</strong>...</p>
        </div>
        <div class="feature-images">
          <img src="{{ asset('img/bunkshm.png') }}" alt="Images of Bedspaces">
        </div>
    </section>
@endsection
