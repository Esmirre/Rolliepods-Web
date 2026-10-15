<header class="site-header">
    <div class="header-container">
        
        <!-- Rolliepods Logo -->
        <div class="header-logo-wrap">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/rolliepods logo RGB-04.png') }}" 
                     alt="Rolliepods Logo" 
                     class="header-logo">
            </a>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
            <span class="hamburger-bar"></span>
        </button>

        <!-- Navigation Links -->
        <nav class="header-nav">
            <ul class="nav-list">
                <li>
                    <a href="{{ route('home') }}" 
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" 
                       class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        ABOUT
                    </a>
                </li>
                <li>
                    <a href="{{ route('news') }}" 
                       class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}">
                        NEWS
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" 
                       class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        CONTACT US
                    </a>
                </li>

                <!-- Auth Navigation -->
                @guest
                    <li class="auth-links">
                        <a href="{{ route('login') }}" 
                           class="auth-link {{ request()->routeIs('login') ? 'active' : '' }}">
                            LOGIN
                        </a>
                        <span class="auth-divider">|</span>
                        <a href="{{ route('register') }}" 
                           class="auth-link {{ request()->routeIs('register') ? 'active' : '' }}">
                            SIGN UP
                        </a>
                    </li>
                @endguest

            <!-- Auth Navigation -->
            @guest
                <li class="auth-links">
                    <a href="{{ route('login') }}" 
                       class="auth-link {{ request()->routeIs('login') ? 'active' : '' }}">
                        LOGIN
                    </a>
                    <span class="auth-divider">|</span>
                    <a href="{{ route('register') }}" 
                       class="auth-link {{ request()->routeIs('register') ? 'active' : '' }}">
                        SIGN UP
                    </a>
                </li>
            @endguest
            
            @auth
                <li class="auth-links">
                    {{-- Show DASHBOARD link ONLY if the user is an admin --}}
                    @if(auth()->user()->is_admin || auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" 
                           class="auth-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            DASHBOARD
                        </a>
                        <span class="auth-divider">|</span>
                    @endif
            
                    {{-- Log Out button visible to all authenticated users --}}
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="auth-link logout-btn">
                            LOG OUT
                        </button>
                    </form>
                </li>
            @endauth
            </ul>
        </nav>

    </div>
</header>
