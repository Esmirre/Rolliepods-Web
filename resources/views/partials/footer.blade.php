<footer class="site-footer">
    <div class="footer-container">
        
        <!-- Logo -->
        <div class="footer-brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/rolliepods logo RGB-04.png') }}" alt="Rolliepods Logo" class="footer-logo">
            </a>
        </div>

        <!-- Contact Information -->
        <div class="footer-contact-info">
            <div class="contact-item">
                <svg class="contact-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>ADB Ave Tower, ADB Ave, Pasig, Philippines, 1605</span>
            </div>

            <div class="contact-item">
                <svg class="contact-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <a href="mailto:rolliepods@gmail.com">rolliepods@gmail.com</a>
            </div>

            <div class="contact-item">
                <svg class="contact-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <span>09946958482</span>
            </div>
        </div>

        <!-- Social Media & Tagline -->
        <div class="footer-social-tagline">
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="https://tiktok.com" target="_blank" aria-label="TikTok">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.98-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.82.56-1.33 1.51-1.33 2.52.01 1.05.61 2.05 1.51 2.58.98.57 2.22.56 3.16-.01.81-.48 1.35-1.36 1.38-2.31.02-3.36.01-6.71.01-10.07z"/></svg>
                </a>
            </div>
            <div class="tagline">
                <span>Good<br>Spaces,<br>Good<br>People.</span>
            </div>
        </div>

    </div>
</footer>

<style>
.site-footer {
    background-color: #faf2e6;
    padding: 30px 0;
    margin-top: 50px;
    border-top: 1px solid #eae2d5;
}
.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}
.footer-logo {
    height: 60px;
    width: auto;
}
.footer-contact-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 700;
    color: #0b2575;
    font-size: 0.9rem;
}
.contact-item {
    display: flex;
    align-items: center;
    gap: 12px;
}
.contact-item a {
    color: #0b2575;
    text-decoration: none;
}
.contact-icon {
    width: 20px;
    height: 20px;
    color: #0b2575;
}
.footer-social-tagline {
    display: flex;
    align-items: center;
    gap: 30px;
}
.social-icons {
    display: flex;
    gap: 15px;
}
.social-icons a {
    color: #0b2575;
    width: 32px;
    height: 32px;
    display: block;
}
.tagline {
    font-family: 'Fredoka', sans-serif;
    color: #8cc63f;
    font-weight: 700;
    font-size: 1.1rem;
    line-height: 1.1;
}
</style>
