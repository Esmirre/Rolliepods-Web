<header class="site-header">
    <div class="header-container">
        <a href="{{ route('home') }}" class="header-logo-wrap" aria-label="Rolliepods home">
            <img src="{{ asset('img/' . rawurlencode('rolliepods logo RGB-04.png')) }}" alt="Rolliepods" class="header-logo">
        </a>

        <button class="mobile-nav-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <span class="hamburger-bar"></span><span class="hamburger-bar"></span><span class="hamburger-bar"></span>
        </button>

        <nav class="header-nav">
            <ul class="nav-list">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('news') }}" class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}">News</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact us</a></li>

                <li class="auth-links">
                    @guest
                        <a href="{{ route('login') }}" class="auth-link">Login</a>
                        <span class="auth-divider">|</span>
                        <a href="{{ route('register') }}" class="auth-link">Sign up</a>
                    @endguest

                    @auth
                        @can('access-admin')
                            <a href="{{ route('admin.dashboard') }}" class="auth-link">Dashboard</a>
                            <span class="auth-divider">|</span>
                        @endcan
                        <form method="POST" action="{{ route('logout') }}" class="logout-form">
                            @csrf
                            <button type="submit" class="auth-link">Log out</button>
                        </form>
                    @endauth
                </li>
            </ul>
        </nav>
    </div>
</header>
