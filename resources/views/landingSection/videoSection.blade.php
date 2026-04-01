@php
    use Illuminate\Support\Str;
@endphp

<section id="video-section" class="video-section">
    <style>
        #video-section {
            padding: 60px 0;
            background: transparent;
        }

        #video-section .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            text-align: center;
            color: #0d3d29;
            margin-bottom: 0.5rem;
        }

        #video-section .section-subtitle {
            text-align: center;
            color: #64748b;
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .carousel-wrapper {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .carousel-container {
            overflow: hidden;
            padding: 10px 0 0 0;
        }

        .carousel-track {
            display: flex;
            gap: 24px;
            transition: transform 500ms cubic-bezier(.25, .46, .45, .94);
            will-change: transform;
            padding: 10px;
        }

        .carousel-track::before,
        .carousel-track::after {
            content: '';
            flex: 0 0 24px;
        }

        .video-card-item {
            flex: 0 0 calc(25% - 18px);
            min-width: 260px;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(13, 61, 41, 0.06);
        }

        @media (max-width: 1200px) {
            .video-card-item {
                flex: 0 0 calc(33.333% - 16px);
            }
        }

        @media (max-width: 900px) {
            .video-card-item {
                flex: 0 0 calc(50% - 16px);
            }
        }

        @media (max-width: 600px) {
            .video-card-item {
                flex: 0 0 calc(100% - 12px);
                max-width: 420px;
                margin: 0 auto;
            }
        }

        .video-thumb {
            position: relative;
            border-radius: 16px 16px 0 0;
            overflow: hidden;
            height: 180px;
            background: linear-gradient(135deg, #f0f9f4 0%, #e8f5e9 100%);
        }

        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .play-overlay:hover {
            transform: scale(1.05);
        }

        .play-button {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #0d3d29, #0d6639);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px rgba(13, 102, 57, 0.25);
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            border-radius: 50%;
        }

        .video-meta {
            flex: 1 1 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 16px;
            background: #fff;
        }

        .video-title {
            font-size: 18px;
            font-weight: 700;
            color: #0d3d29;
        }

        .video-desc {
            font-size: 14px;
            color: #64748b;
            line-height: 1.4;
            flex: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d3d29, #0d6639);
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #0d3d29, #0d6639);
            color: #fff;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
        }

        .carousel-btn.prev-btn {
            left: 8px;
        }

        .carousel-btn.next-btn {
            right: 8px;
        }

        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding: 12px 0;
        }

        .carousel-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(13, 61, 41, 0.2);
            border: none;
        }

        .carousel-dot.active {
            background: linear-gradient(90deg, #0d3d29, #0d6639);
            width: 28px;
            height: 10px;
            border-radius: 6px;
        }

        .video-modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            padding: 20px;
        }

        .video-modal.open {
            display: flex;
        }

        .video-modal .modal-inner {
            width: 100%;
            max-width: 1000px;
            background: #000;
            border-radius: 14px;
            overflow: hidden;
            position: relative;
        }

        .video-modal video,
        .video-modal iframe {
            width: 100%;
            height: 450px;
            display: block;
        }

        .video-modal .close-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Mobile Responsive Improvements */
        @media (max-width: 992px) {
            #video-section {
                padding: 50px 0;
            }

            #video-section .section-title {
                font-size: clamp(1.5rem, 5vw, 2rem);
            }

            #video-section .section-subtitle {
                font-size: clamp(0.9rem, 3vw, 1rem);
                padding: 0 1rem;
            }

            .carousel-wrapper {
                padding: 0 50px;
            }
        }

        @media (max-width: 768px) {
            #video-section {
                padding: 40px 0;
            }

            .carousel-wrapper {
                padding: 0 45px;
            }

            .video-card-item {
                flex: 0 0 calc(100% - 20px) !important;
                min-width: 0 !important;
                max-width: 100% !important;
                margin: 0 auto;
            }

            .video-thumb {
                height: 200px;
            }

            .play-button {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }

            .video-meta {
                padding: 16px;
            }

            .video-title {
                font-size: 16px;
            }

            .video-desc {
                font-size: 13px;
            }

            .btn-primary {
                padding: 10px 16px;
                font-size: 13px;
            }

            .carousel-btn {
                width: 44px;
                height: 44px;
                font-size: 18px;
            }

            .video-modal .modal-inner {
                max-width: 95vw;
                margin: 0 10px;
            }

            .video-modal video,
            .video-modal iframe {
                height: auto;
                min-height: 250px;
            }
        }

        @media (max-width: 480px) {
            #video-section {
                padding: 35px 0;
            }

            .carousel-wrapper {
                padding: 0 40px;
            }

            .video-card-item {
                flex: 0 0 calc(100% - 16px) !important;
                border-radius: 12px;
            }

            .video-thumb {
                height: 180px;
                border-radius: 12px 12px 0 0;
            }

            .play-button {
                width: 52px;
                height: 52px;
                font-size: 22px;
            }

            .video-meta {
                padding: 14px;
                gap: 10px;
            }

            .video-title {
                font-size: 15px;
                line-height: 1.4;
            }

            .video-desc {
                font-size: 12px;
                line-height: 1.5;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .btn-primary {
                padding: 9px 14px;
                font-size: 12px;
                width: 100%;
                text-align: center;
            }

            .carousel-btn {
                width: 40px;
                height: 40px;
                font-size: 16px;
                top: auto;
                bottom: -60px;
            }

            .carousel-btn.prev-btn {
                left: 50%;
                transform: translateX(-120%) translateY(-50%);
            }

            .carousel-btn.next-btn {
                right: 50%;
                transform: translateX(120%) translateY(-50%);
            }

            .carousel-dots {
                margin-top: 50px;
                padding: 8px 0;
                gap: 6px;
            }

            .carousel-dot {
                width: 8px;
                height: 8px;
            }

            .carousel-dot.active {
                width: 24px;
                height: 8px;
            }

            .video-modal {
                padding: 10px;
            }

            .video-modal .modal-inner {
                border-radius: 12px;
            }

            .video-modal .close-btn {
                width: 36px;
                height: 36px;
                top: 8px;
                right: 8px;
            }

            .video-modal video,
            .video-modal iframe {
                min-height: 200px;
                border-radius: 8px;
            }
        }

        @media (max-width: 360px) {
            #video-section {
                padding: 30px 0;
            }

            .carousel-wrapper {
                padding: 0 35px;
            }

            .video-card-item {
                flex: 0 0 calc(100% - 12px) !important;
            }

            .video-thumb {
                height: 160px;
            }

            .play-button {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }

            .carousel-btn {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }
        }
    </style>

    <h2 class="section-title" id="videoSectionTitle"></h2>
    <p class="section-subtitle" id="videoSectionSubtitle"></p>

    <script>
        // Load section title and subtitle dynamically
        (async function() {
            try {
                const response = await fetch('/api/project-sections?section_key=videos');
                if (response.ok) {
                    const section = await response.json();
                    if (section) {
                        const titleEl = document.getElementById('videoSectionTitle');
                        const subtitleEl = document.getElementById('videoSectionSubtitle');
                        if (titleEl && section.title) {
                            titleEl.textContent = section.title;
                        }
                        if (subtitleEl && section.subtitle) {
                            subtitleEl.textContent = section.subtitle;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading video section settings:', error);
            }
        })();
    </script>

    <div class="carousel-wrapper">
        <button id="prevVideoBtn" class="carousel-btn prev-btn" aria-label="Previous">❮</button>
        <div class="carousel-container">
            <div id="videoTrack" class="carousel-track" aria-live="polite">
                @if(isset($videoData) && count($videoData) > 0)
                    @foreach ($videoData as $idx => $v)
                        <div class="video-card-item" role="group" aria-label="{{ $v['title'] }}">
                            <div class="video-thumb" data-idx="{{ $idx }}">
                                @php
                                    $posterUrl = '';
                                    if (!empty($v['poster'])) {
                                        if (Str::startsWith($v['poster'], ['http://', 'https://'])) {
                                            $posterUrl = $v['poster'];
                                        } else {
                                            $posterUrl = asset('storage/' . $v['poster']);
                                        }
                                    } else {
                                        $posterUrl = asset('images/default-video-poster.jpg');
                                    }
                                @endphp
                                <img src="{{ $posterUrl }}" alt="{{ $v['title'] }}" class="img-zoom" loading="lazy" decoding="async" onerror="this.src='{{ asset('images/default-video-poster.jpg') }}'">
                                <div class="play-overlay">
                                    @if(!empty($v['url']))
                                        <button class="play-button" type="button" aria-label="Play {{ $v['title'] }}" data-src="{{ $v['url'] }}">▶</button>
                                    @else
                                        <span style="color:#ef4444; font-weight:600;">ভিডিও URL নেই</span>
                                    @endif
                                </div>
                            </div>
                            <div class="video-meta">
                                <div class="video-title">{{ $v['title'] }}</div>
                                <div class="video-desc">{{ $v['description'] }}</div>
                                @if(!empty($v['url']))
                                    <a href="#" class="btn-primary play-card" data-src="{{ $v['url'] }}">{{ $v['cta'] ?? 'Play Video' }}</a>
                                @else
                                    <span style="color:#ef4444; font-weight:600;">ভিডিও URL নেই</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-gray-500">কোনো ভিডিও পাওয়া যায়নি।</p>
                @endif
            </div>
            <div class="carousel-dots" id="videoDots" role="tablist" aria-label="Video carousel navigation"></div>
        </div>
        <button id="nextVideoBtn" class="carousel-btn next-btn" aria-label="Next">❯</button>
    </div>

    <div class="video-modal" id="videoModal" aria-hidden="true" role="dialog" aria-label="Video player">
        <div class="modal-inner" role="document">
            <button class="close-btn" id="closeVideoModal" aria-label="Close video">✕</button>
            <div id="modalPlayer"></div>
        </div>
    </div>

    {{-- Carousel + Modal JS --}}
    <script>
        (function() {
            const track = document.getElementById('videoTrack');
            const prevBtn = document.getElementById('prevVideoBtn');
            const nextBtn = document.getElementById('nextVideoBtn');
            const dotsContainer = document.getElementById('videoDots');
            const modal = document.getElementById('videoModal');
            const closeBtn = document.getElementById('closeVideoModal');
            const playerContainer = document.getElementById('modalPlayer');
            let currentIndex = 0;
            const items = Array.from(track.querySelectorAll('.video-card-item'));

            function getVisibleCount() {
                const w = window.innerWidth;
                return w <= 600 ? 1 : w <= 900 ? 2 : w <= 1200 ? 3 : 4;
            }

            function update() {
                const card = track.querySelector('.video-card-item');
                if (!card) return;
                const style = window.getComputedStyle(track);
                const gap = parseFloat(style.gap || style.columnGap || '24') || 24;
                const cardWidth = card.offsetWidth;
                const translate = -(currentIndex * (cardWidth + gap));
                track.style.transform = `translateX(${translate}px)`;
                updateButtons();
                updateDots();
            }

            function updateButtons() {
                const visible = getVisibleCount();
                const maxIndex = Math.max(0, items.length - visible);
                if (items.length <= visible) {
                    prevBtn && (prevBtn.style.display = 'none');
                    nextBtn && (nextBtn.style.display = 'none');
                    dotsContainer && (dotsContainer.style.display = 'none');
                } else {
                    prevBtn && (prevBtn.style.display = 'flex', prevBtn.disabled = currentIndex === 0);
                    nextBtn && (nextBtn.style.display = 'flex', nextBtn.disabled = currentIndex >= maxIndex);
                    dotsContainer && (dotsContainer.style.display = 'flex');
                }
            }

            function updateDots() {
                if (!dotsContainer) return;
                const visible = getVisibleCount();
                const totalPages = Math.ceil(items.length / visible);
                dotsContainer.innerHTML = '';
                for (let i = 0; i < totalPages; i++) {
                    const dot = document.createElement('button');
                    dot.className = 'carousel-dot';
                    dot.type = 'button';
                    if (i === Math.floor(currentIndex / visible)) dot.classList.add('active');
                    dot.addEventListener('click', () => {
                        currentIndex = Math.min(i * visible, items.length - visible);
                        update();
                    });
                    dotsContainer.appendChild(dot);
                }
            }

            prevBtn && prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    update();
                }
            });
            nextBtn && nextBtn.addEventListener('click', () => {
                const visible = getVisibleCount();
                const maxIndex = Math.max(0, items.length - visible);
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    update();
                }
            });

            // --- Dragging ---
            let isDragging = false,
                startX = 0,
                startTranslate = 0,
                currentTranslate = 0;

            function pxToIndex(px) {
                const card = track.querySelector('.video-card-item');
                if (!card) return 0;
                const style = window.getComputedStyle(track);
                const gap = parseFloat(style.gap || style.columnGap || '24') || 24;
                return Math.round((-px) / (card.offsetWidth + gap));
            }

            function handleDragStart(e) {
                if (e.target.closest('.play-button, .btn-primary')) return; // ignore clicks on buttons
                isDragging = true;
                track.classList.add('dragging');
                startX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                const matrix = new WebKitCSSMatrix(window.getComputedStyle(track).transform);
                startTranslate = matrix.m41 || 0;
            }

            function handleDragMove(e) {
                if (!isDragging) return;
                const currentX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                const diff = currentX - startX;
                currentTranslate = startTranslate + diff;
                track.style.transform = `translateX(${currentTranslate}px)`;
            }

            function handleDragEnd() {
                if (!isDragging) return;
                isDragging = false;
                track.classList.remove('dragging');
                const idx = pxToIndex(currentTranslate);
                const visible = getVisibleCount();
                const maxIndex = Math.max(0, items.length - visible);
                currentIndex = Math.min(Math.max(0, idx), maxIndex);
                update();
            }

            track.addEventListener('mousedown', handleDragStart);
            track.addEventListener('touchstart', handleDragStart, {
                passive: true
            });
            window.addEventListener('mousemove', handleDragMove);
            window.addEventListener('touchmove', handleDragMove, {
                passive: true
            });
            window.addEventListener('mouseup', handleDragEnd);
            window.addEventListener('touchend', handleDragEnd);

            // --- Video Modal ---
            function isYouTube(url) {
                return /(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)/i.test(url);
            }

            function isVimeo(url) {
                return /(?:vimeo\.com\/|player\.vimeo\.com\/video\/)/i.test(url);
            }

            function extractYouTubeId(url) {
                try {
                    const u = new URL(url);
                    if (u.hostname.includes('youtu.be')) return u.pathname.slice(1);
                    if (u.searchParams.has('v')) return u.searchParams.get('v');
                    const parts = u.pathname.split('/');
                    return parts.pop() || parts.pop();
                } catch (e) {
                    const m = url.match(/(?:v=|\/)([0-9A-Za-z_-]{11})/);
                    return m ? m[1] : null;
                }
            }

            function extractVimeoId(url) {
                try {
                    const u = new URL(url);
                    const parts = u.pathname.split('/').filter(Boolean);
                    return parts.length ? parts.pop() : null;
                } catch (e) {
                    const m = url.match(/(\d+)/);
                    return m ? m[1] : null;
                }
            }

            function openModalWithSrc(src) {
                playerContainer.innerHTML = '';
                modal.classList.add('open');
                modal.setAttribute('aria-hidden', 'false');
                if (isYouTube(src)) {
                    const id = extractYouTubeId(src);
                    if (id) {
                        const iframe = document.createElement('iframe');
                        iframe.src = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0&modestbranding=1`;
                        iframe.setAttribute('allow', 'autoplay; encrypted-media; picture-in-picture');
                        iframe.setAttribute('allowfullscreen', '');
                        iframe.style.border = '0';
                        playerContainer.appendChild(iframe);
                        return;
                    }
                }
                if (isVimeo(src)) {
                    const id = extractVimeoId(src);
                    if (id) {
                        const iframe = document.createElement('iframe');
                        iframe.src = `https://player.vimeo.com/video/${id}?autoplay=1`;
                        iframe.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture');
                        iframe.setAttribute('allowfullscreen', '');
                        iframe.style.border = '0';
                        playerContainer.appendChild(iframe);
                        return;
                    }
                }
                const videoEl = document.createElement('video');
                videoEl.controls = true;
                videoEl.playsInline = true;
                videoEl.autoplay = true;
                videoEl.preload = 'metadata';
                const srcEl = document.createElement('source');
                srcEl.src = src;
                videoEl.appendChild(srcEl);
                playerContainer.appendChild(videoEl);
                setTimeout(() => {
                    videoEl.play().catch(() => {});
                }, 50);
            }

            function closeModal() {
                modal.classList.remove('open');
                modal.setAttribute('aria-hidden', 'true');
                playerContainer.innerHTML = '';
            }

            track.querySelectorAll('.play-card, .play-button').forEach(el => el.addEventListener('click', function(e) {
                e.preventDefault();
                openModalWithSrc(this.dataset.src);
            }));
            closeBtn && closeBtn.addEventListener('click', closeModal);
            modal && modal.addEventListener('click', e => {
                if (e.target === modal) closeModal();
            });

            window.addEventListener('resize', () => {
                const visible = getVisibleCount();
                const maxIndex = Math.max(0, items.length - visible);
                currentIndex = Math.min(currentIndex, maxIndex);
                update();
            });
            setTimeout(update, 60);
        })();
    </script>

</section>
