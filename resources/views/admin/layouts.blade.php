<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>জলছায়া - অ্যাডমিন ড্যাশবোর্ড</title>
    
    <!-- Favicon -->
    @php $siteSetting = \App\Models\SiteSetting::first(); @endphp
    <link rel="icon" type="image/png" href="{{ $siteSetting?->favicon_url ?? asset('images/Logo/jolchaya.png') }}">
    <link rel="apple-touch-icon" href="{{ $siteSetting?->favicon_url ?? asset('images/Logo/jolchaya.png') }}">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Chart.js Library for Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
    @if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
   
</head>
<body>
     <div class="dashboard">

        @include('admin.sidebar')

     <main class="main-content">

        @include('admin.header')

        @yield('content')
        
    </main>
    
    <!-- Mobile Navigation -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
    <div class="mobile-navbar">
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Open Menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </div>
    
    <div>
  


    <!-- Custom Modal/Message Box (for alerts/confirmations) -->
    <div id="customModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.45); align-items:center; justify-content:center;">
        <div style="background:#ffffff; width:90%; max-width:420px; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,0.25); overflow:hidden;">
            <!-- Header -->
            <div style="padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; gap:10px;">
                <div id="modalIcon" style="width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:20px; flex-shrink:0;">
                    <!-- Icon will be set by JavaScript -->
                </div>
                <div id="modalTitle" style="font-size:18px; font-weight:700; color:#0f172a;"></div>
            </div>
            <!-- Body -->
            <div id="modalMessage" style="padding:18px 20px; color:#334155; font-size:15px; line-height:1.6;">
            </div>
            <!-- Footer / Buttons -->
            <div id="modalButtons" style="padding:14px 16px; display:flex; gap:10px; justify-content:flex-end; background:#f8fafc; border-top:1px solid #eef2f7;">
                <!-- Buttons populated by JS -->
            </div>
        </div>
    </div>


     <script src="{{ asset('assets/admin/program.js') }}"></script>

    <script>
    // Prevent screen from dimming/sleeping on the admin dashboard
    (function() {
        let wakeLock = null;

        async function requestWakeLock() {
            if ('wakeLock' in navigator) {
                try {
                    wakeLock = await navigator.wakeLock.request('screen');
                } catch (e) {
                    // Wake Lock not granted — silently ignore
                }
            }
        }

        // Re-acquire on visibility change (tab becomes active again)
        document.addEventListener('visibilitychange', function() {
            if (document.visibilityState === 'visible') requestWakeLock();
        });

        requestWakeLock();
    })();
    </script>

</body>
</html>
