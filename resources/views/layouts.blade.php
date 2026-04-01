<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon & Title from DB -->
    @php $siteSetting = \App\Models\SiteSetting::first(); @endphp
    <link rel="icon" type="image/png" href="{{ $siteSetting?->favicon_url ?? asset('images/Logo/jolchaya.png') }}">
    <link rel="apple-touch-icon" href="{{ $siteSetting?->favicon_url ?? asset('images/Logo/jolchaya.png') }}">
    
    <!-- Preload critical resources for instant display -->
    <link rel="preload" href="{{ asset('assets/css/landing_page.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/instant-load.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/js/script.js') }}" as="script">
    
    <!-- DNS Prefetch & Preconnect for faster loading -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    
    <!-- Critical CSS - Inline for instant render -->
    <style>
        body{margin:0;padding:0;font-family:system-ui,-apple-system,sans-serif}
        .custom-navbar{background:rgba(10,77,46,0.95);position:fixed;top:0;width:100%;z-index:1000}
        .hero{min-height:100vh;position:relative}
        /* Force all sections visible immediately */
        section,.feature-card,.pricing-card,.contact-item,.project-card,.testimonial-card,.amenity-card,.video-card-item{opacity:1!important;visibility:visible!important;transform:none!important}
        /* But hero slider images must keep their opacity for transitions */
        #homeSlides img{opacity:0!important}
        #homeSlides img.active{opacity:1!important}
    </style>    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing_page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/instant-load.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-home.css') }}">
    
    <!-- Defer non-critical CSS -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"></noscript>
    
    @if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <title>{{ $siteSetting?->site_title ?? $siteSetting?->site_name ?? 'জলছায়া' }}</title>
</head>

<body>

   @include('landingSection.header')


    @yield('content')


   @include('landingSection.footer')


<!-- Optimized JavaScript Loading -->
<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

<script>
  // Minimal inline script for critical functionality
  window.addEventListener('DOMContentLoaded', function() {
    const carouselEl = document.getElementById('carouselExampleControls');
    if (carouselEl && typeof bootstrap !== 'undefined') {
      const carousel = new bootstrap.Carousel(carouselEl);
      window.prevSlide = function(){ carousel.prev(); }
      window.nextSlide = function(){ carousel.next(); }
    }
  });
</script>

<script defer src="{{ asset('assets/js/script.js') }}"></script>
<script defer src="{{ asset('assets/js/translator.js') }}"></script>

<script>
// Smart anchor scroll — accounts for fixed navbar on all screen sizes
(function () {
    function getNavbarHeight() {
        const nav = document.querySelector('.custom-navbar, nav.navbar, header, #navbar');
        return nav ? nav.offsetHeight : 70;
    }

    function scrollToAnchor(hash) {
        if (!hash) return;
        const target = document.querySelector(hash);
        if (!target) return;
        const navH = getNavbarHeight();
        const extra = window.innerWidth <= 768 ? 12 : 16;
        const offset = target.getBoundingClientRect().top + window.scrollY - navH - extra;
        window.scrollTo({ top: offset, behavior: 'smooth' });
    }

    // Handle clicks on all anchor links with hash
    document.addEventListener('click', function (e) {
        const a = e.target.closest('a[href]');
        if (!a) return;
        const href = a.getAttribute('href');
        if (!href || !href.startsWith('#')) return;
        const target = document.querySelector(href);
        if (!target) return;
        e.preventDefault();
        scrollToAnchor(href);
        history.pushState(null, '', href);
    });

    // Handle page load with hash in URL
    window.addEventListener('load', function () {
        if (window.location.hash) {
            setTimeout(function () {
                scrollToAnchor(window.location.hash);
            }, 100);
        }
    });
})();
</script>

</body>

</html>
