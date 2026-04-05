<section id="home" class="hero">
    <style>
        /* Full-bleed hero slider - FORCE FULL WIDTH */
        html {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%
        }

        body {
            overflow-x: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw !important;
            max-width: 100vw !important;
            position: relative !important
        }

        body #home.hero {
            min-height: 92vh !important;
            height: 92vh !important;
            margin: 0 !important;
            padding: 0 !important;
            max-width: none !important;
            width: 100vw !important;
            position: relative !important;
            background: transparent !important;
            display: block !important;
            align-items: unset !important;
            justify-content: unset !important;
            left: 0 !important;
            transform: none !important;
            overflow: hidden !important
        }

        #home {
            position: relative !important;
            padding: 0 !important;
            margin: 0 auto 0 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            left: 0 !important;
            right: 0 !important;
            box-sizing: border-box !important;
            transform: none !important;
            min-height: 92vh !important;
            height: 92vh !important;
            overflow: hidden !important;
            float: none !important;
            clear: both !important
        }

        /* Break out of ANY container - ULTRA AGGRESSIVE */
        #home:before,
        #home:after {
            content: "";
            display: table;
            clear: both
        }

        section#home.hero {
            width: 100vw !important;
            max-width: 100vw !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow: hidden !important;
            position: relative !important;
            min-height: 92vh !important;
            height: 92vh !important
        }

        #home .slider-wrap {
            position: absolute !important;
            width: 100vw !important;
            height: 92vh;
            min-height: 360px;
            max-height: none;
            overflow: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
            left: 0 !important;
            right: 0 !important;
            top: 0 !important;
            max-width: 100vw !important
        }

        #home .slides {
            position: absolute !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background: #0b3a28;
            top: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            max-width: 100% !important
        }

        #home .slides img {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            opacity: 0;
            transition: opacity .3s ease;
            left: 0 !important;
            right: 0 !important;
            margin: 0 !important
        }

        #home .slides img.active {
            opacity: 1
        }

        /* Video slide */
        #home .slides .slide-video {
            position: absolute !important;
            inset: 0 !important;
            width: 100% !important;
            height: 100% !important;
            opacity: 0;
            transition: opacity .3s ease;
            pointer-events: none;
        }
        #home .slides .slide-video.active {
            opacity: 1;
        }
        #home .slides .slide-video iframe,
        #home .slides .slide-video video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: none;
        }

        /* Professional Overlay with Full Width Breakout */
        #home .overlay {
            position: absolute !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            height: 100% !important;
            top: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: clamp(20px, 4vw, 40px);
            z-index: 2;
            box-sizing: border-box;
            margin: 0 !important;
            max-width: 100% !important
        }

        #home .overlay::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(13, 61, 41, .45) 0%, rgba(0, 0, 0, .3) 100%);
            z-index: 0
        }

        #home .overlay::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, .15) 100%);
            z-index: 0
        }

        #home .overlay-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: #fff;
            max-width: min(1200px, 90vw);
            width: 100%;
            padding: clamp(16px, 3vw, 32px);
            margin: 0 auto;
            backdrop-filter: blur(2px);
            border-radius: 16px
        }

        /* Professional Typography - Fluid & Responsive */
        body #home .overlay-content h1 {
            font-size: clamp(20px, 3.5vw, 44px) !important;
            line-height: 1.15 !important;
            font-weight: 800 !important;
            margin: 0 0 clamp(8px, 1.5vw, 16px) !important;
            letter-spacing: -0.02em !important;
            text-shadow: 0 4px 12px rgba(0, 0, 0, .5), 0 2px 4px rgba(0, 0, 0, .3);
            animation: fadeInUp 0.35s ease-out forwards;
            animation-delay: 0s;
            opacity: 0
        }

        body #home .overlay-content h2 {
            font-size: clamp(13px, 1.8vw, 22px) !important;
            line-height: 1.3 !important;
            font-weight: 700 !important;
            margin: 0 0 clamp(10px, 1.8vw, 18px) !important;
            letter-spacing: -0.01em !important;
            white-space: nowrap !important;
            text-shadow: 0 3px 10px rgba(0, 0, 0, .4), 0 1px 3px rgba(0, 0, 0, .3);
            animation: fadeInUp 0.35s ease-out forwards;
            animation-delay: 0.05s;
            opacity: 0
        }

        body #home .overlay-content .hero-subtitle {
            opacity: 0;
            margin-bottom: clamp(18px, 2.7vw, 28px) !important;
            font-size: clamp(14px, 2.2vw, 18px) !important;
            line-height: 1.5 !important;
            text-shadow: 0 2px 8px rgba(0, 0, 0, .4);
            font-weight: 500;
            animation: fadeInUp 0.35s ease-out forwards;
            animation-delay: 0.1s
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* Professional CTA Buttons */
        body #home .overlay-content .cta-buttons {
            display: flex;
            gap: clamp(12px, 2vw, 20px);
            justify-content: center;
            flex-wrap: wrap;
            align-items: center;
            animation: fadeInUp 0.35s ease-out forwards;
            animation-delay: 0.15s;
            opacity: 0
        }

        body #home .overlay-content .btn {
            padding: clamp(9px, 1.3vw, 13px) clamp(18px, 2.7vw, 28px) !important;
            border-radius: 9999px !important;
            font-weight: 700 !important;
            letter-spacing: .3px !important;
            font-size: clamp(13px, 1.6vw, 16px) !important;
            min-height: clamp(40px, 5.5vw, 48px) !important;
            transition: all .3s cubic-bezier(.4, 0, .2, 1);
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap
        }

        #home .overlay-content .btn-primary {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, .18);
            box-shadow: 0 10px 24px rgba(34, 197, 94, .32)
        }

        #home .overlay-content .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(34, 197, 94, .4);
            filter: saturate(1.05)
        }

        #home .overlay-content .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 6px 16px rgba(34, 197, 94, .3)
        }

        #home .overlay-content .btn-primary:focus {
            outline: 2px solid rgba(34, 197, 0, .85);
            outline-offset: 2px
        }

        /* Yellow, modern, smooth button for Contact */
        #home .overlay-content .btn-secondary {
            background: linear-gradient(135deg, #ffd700, #ffea7a);
            color: #0f172a;
            border: 1px solid rgba(255, 255, 255, .18);
            box-shadow: 0 10px 24px rgba(255, 215, 0, .32)
        }

        #home .overlay-content .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(255, 215, 0, .4);
            filter: saturate(1.05)
        }

        #home .overlay-content .btn-secondary:active {
            transform: translateY(0);
            box-shadow: 0 6px 16px rgba(255, 215, 0, .3)
        }

        #home .overlay-content .btn-secondary:focus {
            outline: 2px solid rgba(255, 215, 0, .8);
            outline-offset: 2px
        }

        #home .slider-controls {
            position: absolute !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            height: 100% !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            pointer-events: none;
            z-index: 6;
            margin: 0 !important;
            top: 0 !important;
            max-width: 100% !important
        }

        #home .slider-btn {
            pointer-events: auto;
            background: rgba(0, 0, 0, .45);
            color: #fff;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 7;
        }

        #home .slider-btn:hover {
            background: rgba(0, 0, 0, .65);
            transform: scale(1.1)
        }

        #home .slider-dots {
            position: absolute;
            bottom: 14px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 8px;
            z-index: 2
        }

        #home .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .5);
            cursor: pointer
        }

        #home .slider-dot.active {
            background: #ffd700
        }

        /* Green Wave Shape at Bottom */
        #home::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            width: 100%;
            height: 120px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0 C150,100 350,0 600,50 C850,100 1050,0 1200,50 L1200,120 L0,120 Z" fill="%23ffffff"/></svg>') no-repeat center bottom;
            background-size: 100% 100%;
            z-index: 4;
            pointer-events: none
        }







        /* Tablet and small desktop responsive */
        @media (max-width: 1024px) {
            #home .slider-controls {
                padding: 0 16px
            }

            #home .slider-btn {
                width: 38px;
                height: 38px;
                font-size: 18px
            }
        }

        /* Large Desktop */
        @media (min-width: 1440px) {
            #home .overlay {
                padding: 48px
            }

            #home .overlay-content {
                max-width: 1400px;
                padding: 40px
            }
        }

        /* Tablet responsive */
        @media (max-width: 768px) {
            body #home.hero,
            #home,
            section#home.hero {
                min-height: 70vh !important;
                height: 70vh !important;
            }

            body #home .slider-wrap {
                height: 100%;
            }

            #home .overlay {
                align-items: center;
                justify-content: center;
                padding: clamp(16px, 3vw, 28px);
                padding-top: 80px;
            }

            #home .overlay-content {
                padding: clamp(12px, 2.5vw, 24px);
                border-radius: 12px
            }

            body #home .overlay-content h1 {
                text-shadow: 0 3px 10px rgba(0, 0, 0, .6)
            }

            body #home .overlay-content h2 {
                text-shadow: 0 2px 8px rgba(0, 0, 0, .5)
            }

            body #home .overlay-content .cta-buttons {
                gap: clamp(10px, 2vw, 14px);
                row-gap: clamp(10px, 2vw, 14px);
                flex-direction: row
            }

            body #home .overlay-content .btn {
                width: auto;
                max-width: none;
                min-width: clamp(120px, 30vw, 160px)
            }

            #home .slider-controls {
                padding: 0 12px
            }

            #home .slider-btn {
                width: 34px;
                height: 34px;
                font-size: 16px;
                background: rgba(0, 0, 0, .6)
            }

            #home .slider-dots {
                bottom: 12px;
                gap: 6px
            }

            #home .slider-dot {
                width: 8px;
                height: 8px
            }

            #home::after {
                height: 80px
            }




        }

        /* Mobile landscape and small tablets */
        @media (max-width: 640px) {
            body #home.hero,
            #home,
            section#home.hero {
                min-height: 72vh !important;
                height: 72vh !important;
            }

            #home .overlay {
                padding-top: 70px;
            }

            #home .slider-controls {
                padding: 0 8px
            }

            #home .slider-btn {
                width: 32px;
                height: 32px;
                font-size: 14px
            }

            #home .slider-dots {
                bottom: 10px;
                gap: 5px
            }

            #home .slider-dot {
                width: 7px;
                height: 7px
            }
        }

        /* Mobile portrait */
        @media (max-width: 480px) {
            body #home.hero,
            #home,
            section#home.hero {
                min-height: 75vh !important;
                height: 75vh !important;
            }

            body #home .slider-wrap {
                height: 100%;
                min-height: 450px
            }

            #home .overlay {
                align-items: center;
                justify-content: center;
                padding: 16px 12px;
                padding-top: 100px;
            }

            #home .overlay-content {
                padding: 16px 12px;
                max-width: 95vw;
                border-radius: 10px
            }

            body #home .overlay-content h1 {
                font-size: clamp(18px, 5vw, 28px) !important;
                line-height: 1.2 !important;
                margin-bottom: 10px !important;
                text-shadow: 0 3px 10px rgba(0, 0, 0, .8)
            }

            body #home .overlay-content h2 {
                font-size: clamp(12px, 3.5vw, 17px) !important;
                line-height: 1.3 !important;
                margin-bottom: 12px !important;
                white-space: normal !important;
                text-shadow: 0 2px 8px rgba(0, 0, 0, .7)
            }

            body #home .overlay-content .hero-subtitle {
                font-size: clamp(15px, 4vw, 17px) !important;
                margin-bottom: 20px !important;
                line-height: 1.5 !important
            }

            body #home .overlay-content .cta-buttons {
                gap: 10px;
                flex-direction: column;
                width: 100%;
                max-width: 280px;
                margin: 0 auto
            }

            body #home .overlay-content .btn {
                width: 100% !important;
                padding: 12px 20px !important;
                min-height: 46px !important;
                font-size: 15px !important;
                max-width: 100%
            }

            /* Smaller slider controls on mobile */
            #home .slider-controls {
                padding: 0 6px
            }

            #home .slider-btn {
                width: 28px;
                height: 28px;
                font-size: 12px;
                background: rgba(0, 0, 0, .7)
            }

            #home .slider-dots {
                bottom: 8px;
                gap: 4px
            }

            #home .slider-dot {
                width: 6px;
                height: 6px
            }

            #home::after {
                height: 60px
            }




        }

        /* Extra small mobile */
        @media (max-width: 375px) {
            body #home.hero,
            #home,
            section#home.hero {
                min-height: 80vh !important;
                height: 80vh !important;
            }

            #home .overlay {
                padding-top: 120px;
            }

            #home .slider-controls {
                padding: 0 4px
            }

            #home .slider-btn {
                width: 26px;
                height: 26px;
                font-size: 11px
            }
        }

        /* Mobile landscape mode - focus on text */
        @media (max-width: 896px) and (orientation: landscape) {
            body #home.hero,
            #home,
            section#home.hero {
                min-height: 100vh !important;
                height: 100vh !important;
            }

            #home .overlay {
                padding: 20px 12px;
                align-items: center;
            }

            #home .overlay-content {
                padding: 12px;
            }

            body #home .overlay-content h1 {
                font-size: clamp(24px, 5vw, 32px) !important;
                margin-bottom: 10px !important;
            }

            body #home .overlay-content h2 {
                font-size: clamp(18px, 4vw, 24px) !important;
                margin-bottom: 12px !important;
            }

            body #home .overlay-content .hero-subtitle {
                font-size: clamp(14px, 3vw, 16px) !important;
                margin-bottom: 16px !important;
            }

        }

        @media (prefers-reduced-motion: reduce) {
            #home .slides img {
                transition: none
            }

            body #home .overlay-content .btn {
                transition: none
            }

            body #home .overlay-content h1,
            body #home .overlay-content h2,
            body #home .overlay-content .hero-subtitle,
            body #home .overlay-content .cta-buttons {
                animation: none !important;
                opacity: 1 !important
            }
        }
    </style>

    <div class="slider-wrap">
        <div class="slides" id="homeSlides">
            @foreach($heroSliders ?? [] as $i => $slider)
            @if(!empty($slider->video_url))
            <div class="slide-video {{ $i === 0 ? 'active' : '' }}" id="homeSlide{{ $i+1 }}" data-video="{{ $slider->video_url }}">
                @php
                    $videoUrl = $slider->video_url;
                    $embedUrl = '';
                    if (str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be')) {
                        preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $m);
                        $vid = $m[1] ?? '';
                        $embedUrl = "https://www.youtube.com/embed/{$vid}?autoplay=1&mute=1&loop=1&playlist={$vid}&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1";
                    } elseif (str_contains($videoUrl, 'vimeo.com')) {
                        preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $m);
                        $vid = $m[1] ?? '';
                        $embedUrl = "https://player.vimeo.com/video/{$vid}?autoplay=1&muted=1&loop=1&background=1";
                    }
                @endphp
                @if($embedUrl)
                <iframe src="{{ $embedUrl }}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                @else
                <video src="{{ $videoUrl }}" autoplay muted loop playsinline></video>
                @endif
            </div>
            @else
            <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="{{ $i === 0 ? 'active' : '' }}" id="homeSlide{{ $i+1 }}" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
            @endif
            @endforeach
        </div>
        <div class="overlay">
            <div class="overlay-content" id="heroContent">
                @php $firstSlider = ($heroSliders ?? collect())->first(); @endphp
                <h1 id="heroTitle">{{ $firstSlider->title ?? '' }}</h1>
                <h2 id="heroSubtitle">{{ $firstSlider->subtitle ?? '' }}</h2>
                @if(!empty($headerSettings->hero_tagline))
                <p class="hero-subtitle" style="font-size: clamp(13px, 2vw, 17px); color: rgba(255,255,255,0.92); font-weight: 400; margin: 0.5rem 0 1rem; text-shadow: 1px 1px 4px rgba(0,0,0,0.5); line-height: 1.6;">{{ $headerSettings->hero_tagline }}</p>
                @endif
                <div class="cta-buttons" id="heroButtons">
                    <a id="heroBtnPrimary" href="{{ $firstSlider->primary_button_link ?? '/registration' }}" class="btn btn-primary">{{ $firstSlider->primary_button_text ?? '' }}</a>
                    <a id="heroBtnSecondary" href="{{ $firstSlider->secondary_button_link ?? '#contact' }}" class="btn btn-secondary">{{ $firstSlider->secondary_button_text ?? '' }}</a>
                </div>

            </div>
        </div>

        <div class="slider-controls">
            <button class="slider-btn" id="homePrev" aria-label="Previous">❮</button>
            <button class="slider-btn" id="homeNext" aria-label="Next">❯</button>
        </div>
        <div class="slider-dots" id="homeDots"></div>
    </div>

    <script>
        (function () {
            let idx = 0, timer = null;
            let slides = [];
            const dotsWrap = document.getElementById('homeDots');
            const prev = document.getElementById('homePrev');
            const next = document.getElementById('homeNext');

            function setActive(i) {
                if (!slides.length) return;
                idx = (i + slides.length) % slides.length;
                slides.forEach((el, k) => el.classList.toggle('active', k === idx));
                Array.from(dotsWrap.children).forEach((d, k) => d.classList.toggle('active', k === idx));
            }

            function go(n) {
                setActive(idx + n);
            }

            function restart() {
                clearInterval(timer);
                timer = setInterval(() => go(1), 7000);
            }

            function buildDots() {
                dotsWrap.innerHTML = '';
                slides.forEach((_, i) => {
                    const d = document.createElement('div');
                    d.className = 'slider-dot' + (i === 0 ? ' active' : '');
                    d.addEventListener('click', () => { setActive(i); restart(); });
                    dotsWrap.appendChild(d);
                });
            }

            function initSlider() {
                slides = Array.from(document.querySelectorAll('#homeSlides img, #homeSlides .slide-video'));
                if (!slides.length) return;
                idx = 0;
                buildDots();
                setActive(0);
                restart();
            }

            // Bind prev/next ONCE only
            prev && prev.addEventListener('click', () => { go(-1); restart(); });
            next && next.addEventListener('click', () => { go(1); restart(); });

            // Init on load
            initSlider();

            // Reload slider images from DB when admin updates
            async function refreshSliderImages() {
                try {
                    const res = await fetch('/api/hero-sliders', { cache: 'no-store' });
                    if (!res.ok) return;
                    const sliders = await res.json();
                    if (!sliders || !sliders.length) return;
                    const container = document.getElementById('homeSlides');
                    if (!container) return;
                    sliders.forEach((slider, i) => {
                        let img = document.getElementById('homeSlide' + (i + 1));
                        if (!img) {
                            img = document.createElement('img');
                            img.id = 'homeSlide' + (i + 1);
                            img.loading = 'lazy';
                            container.appendChild(img);
                        }
                        if (slider.image_url) {
                            img.src = slider.image_url;
                            img.alt = slider.title || '';
                        }
                    });
                    // Rebuild dots only, don't re-bind buttons
                    slides = Array.from(document.querySelectorAll('#homeSlides img'));
                    buildDots();
                    setActive(0);
                    restart();
                } catch (e) { /* silent */ }
            }

            window.addEventListener('heroSliderUpdated', refreshSliderImages);
            window.addEventListener('storage', function(e) {
                if (e.key === 'refreshHeroSlider') refreshSliderImages();
            });
        })();
    </script>
</section>
