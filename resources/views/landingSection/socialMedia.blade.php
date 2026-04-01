<section id="social-media" class="social-media">
    <style>
        /* Container styling - Modern & Professional */
        #social-media { 
            padding: 80px 0 60px;
            background: #f8fafc;
            position: relative;
            overflow: hidden;
        }
        
        /* Section Title and Subtitle */
        #social-media .section-title {
            font-size: 2.4rem;
            font-weight: 800;
            text-align: center;
            color: #0f172a;
            margin-bottom: 0.75rem;
            letter-spacing: -0.03em;
        }
        
        #social-media .section-subtitle {
            font-size: 1.05rem;
            text-align: center;
            color: #64748b;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            #social-media .section-title {
                font-size: 2rem;
                margin-bottom: 0.75rem;
            }
            
            #social-media .section-subtitle {
                font-size: 1rem;
                margin-bottom: 2rem;
                padding: 0 1rem;
            }
        }
        
        @media (max-width: 480px) {
            #social-media .section-title {
                font-size: 1.75rem;
            }
            
            #social-media .section-subtitle {
                font-size: 0.95rem;
            }
        }
        
        #social-media .carousel-wrapper { 
            position: relative; 
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 0 80px; 
        }
        
        #social-media .carousel-container { 
            overflow: hidden; 
            padding: 20px 0 0 0;
            cursor: grab;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            display: flex;
            flex-direction: column;
        }
        
        #social-media .carousel-container:active {
            cursor: grabbing;
        }
        
        #social-media .carousel-container.dragging {
            cursor: grabbing;
        }
        
        #social-media .carousel-container.dragging .carousel-track {
            transition: none;
        }
        
        #social-media .carousel-track { 
            display: flex; 
            gap: 24px; 
            transition: transform 500ms cubic-bezier(0.25, 0.46, 0.45, 0.94); 
            will-change: transform; 
            padding: 10px 10px 0 10px;
            flex-shrink: 0;
        }

        #social-media .carousel-track::after,
        #social-media .carousel-track::before {
            content: '';
            flex: 0 0 24px;
        }

        /* Modern Card Styles - Professional */
        #social-media .sm-card { 
            flex: 0 0 calc(25% - 18px);
            min-width: 280px;
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e8edf2;
            display: flex;
            flex-direction: column;
            color: #1f2937;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 380px;
        }
        
        #social-media .sm-card::before {
            display: none;
        }
        
        #social-media .sm-card:hover { 
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(13, 61, 41, 0.13);
        }
        
        #social-media .sm-card a { 
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            color: inherit;
            text-decoration: none;
            padding: 0;
            position: relative;
            z-index: 1;
            user-select: none;
            -webkit-user-drag: none;
        }
        
        #social-media .sm-card {
            user-select: none;
            -webkit-user-drag: none;
        }
        
        #social-media .sm-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #e8f5e9 0%, #f0f9f4 100%);
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            border-radius: 0;
            clip-path: none !important;
            shape-outside: none !important;
        }
        
        #social-media .sm-image img,
        #social-media .sm-image video {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            border-radius: 0 !important;
            clip-path: none !important;
            shape-outside: none !important;
            -webkit-mask-image: none !important;
            mask-image: none !important;
            transition: transform 0.5s ease;
            user-select: none;
            -webkit-user-drag: none;
            pointer-events: none;
            display: block !important;
        }
        
        #social-media .sm-card:hover .sm-image img,
        #social-media .sm-card:hover .sm-image video {
            transform: scale(1.06);
        }

        /* Category badge overlay on image */
        #social-media .sm-image::after {
            content: attr(data-category);
            position: absolute;
            top: 14px;
            left: 14px;
            background: #0d3d29;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 20px;
            z-index: 2;
        }
        
        #social-media .sm-content {
            padding: 20px 22px 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
        }

        /* Date line */
        #social-media .sm-date {
            font-size: 12px;
            color: #94a3b8;
            font-weight: 500;
            letter-spacing: 0.3px;
        }
        
        #social-media .sm-title { 
            font-size: 16px;
            line-height: 1.5;
            font-weight: 700;
            color: #0f172a;
            transition: color 0.2s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        #social-media .sm-card:hover .sm-title {
            color: #0d3d29;
        }
        
        #social-media .sm-subtitle { 
            color: #64748b;
            font-size: 13px;
            line-height: 1.65;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }
        
        #social-media .sm-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #0d3d29;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            margin-top: 6px;
            padding: 0;
            background: none;
            border: none;
            cursor: pointer;
            transition: gap 0.2s ease;
        }
        
        #social-media .sm-btn::after {
            content: '→';
            font-size: 15px;
            transition: transform 0.2s ease;
        }

        #social-media .sm-btn:hover::after {
            transform: translateX(4px);
        }

        #social-media .carousel-btn { 
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #ffffff;
            color: #0d3d29;
            border: 1.5px solid #e2e8f0;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(0,0,0,0.10);
            transition: background 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
            z-index: 10;
            font-size: 18px;
            font-weight: 600;
        }
        
        #social-media .carousel-btn.prev-btn {
            left: 15px;
        }
        
        #social-media .carousel-btn.next-btn {
            right: 15px;
        }
        
        #social-media .carousel-btn:hover:not(:disabled) { 
            transform: translateY(-50%) scale(1.1);
            background: #0d3d29;
            color: #fff;
            box-shadow: 0 8px 24px rgba(13, 61, 41, 0.2);
        }
        
        #social-media .carousel-btn:active:not(:disabled) {
            transform: translateY(-50%) scale(1.05);
        }
        
        #social-media .carousel-btn:disabled {
            opacity: 0.25;
            cursor: not-allowed;
            pointer-events: none;
            background: linear-gradient(135deg, rgba(13, 61, 41, 0.3) 0%, rgba(13, 102, 57, 0.3) 100%);
        }
        
        /* Professional Dot Indicators */
        #social-media .carousel-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 1.5rem;
            padding: 0.5rem 0;
            position: relative;
            width: 100%;
        }
        
        #social-media .carousel-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(13, 61, 41, 0.25);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            border: none;
            padding: 0;
            outline: none;
        }
        
        #social-media .carousel-dot:hover {
            background: rgba(13, 61, 41, 0.4);
            transform: scale(1.2);
        }
        
        #social-media .carousel-dot.active {
            width: 32px;
            height: 10px;
            border-radius: 5px;
            background: linear-gradient(90deg, #0d3d29 0%, #0d6639 100%);
            box-shadow: 0 2px 6px rgba(13, 61, 41, 0.25);
        }
        
        @media (max-width: 768px) {
            #social-media .carousel-dots {
                margin-top: 1.25rem;
                gap: 8px;
            }
            
            #social-media .carousel-dot {
                width: 8px;
                height: 8px;
            }
            
            #social-media .carousel-dot.active {
                width: 28px;
                height: 8px;
            }
        }

        /* Responsive Breakpoints */
        @media (max-width: 1200px) {
            #social-media .sm-card { 
                flex: 0 0 calc(33.333% - 16px);
                min-width: 280px;
            }
            
            #social-media .sm-image { height: 220px; }
        }
        
        @media (max-width: 992px) {
            #social-media { padding: 50px 0; }
            
            #social-media .carousel-wrapper { padding: 0 24px; }
            
            #social-media .carousel-track {
                gap: 18px;
                padding: 10px;
            }
            
            #social-media .carousel-track::before,
            #social-media .carousel-track::after {
                flex: 0 0 18px;
            }
            
            #social-media .sm-card { 
                flex: 0 0 calc(50% - 18px);
                min-width: 260px;
                min-height: 420px;
            }
            
            #social-media .sm-image { height: 220px; }
            #social-media .sm-content { padding: 20px; gap: 10px; }
            #social-media .sm-title { font-size: 17px; }
            #social-media .sm-subtitle { font-size: 13px; }
            #social-media .sm-btn { padding: 10px 20px; font-size: 13px; }
        }
        
        @media (max-width: 768px) {
            #social-media { 
                padding: 40px 0;
                background: transparent;
            }
            
            #social-media .carousel-wrapper { 
                padding: 0 12px;
                max-width: 100%;
            }
            
            #social-media .carousel-track {
                gap: 16px;
                padding: 10px;
            }
            
            #social-media .carousel-track::before,
            #social-media .carousel-track::after {
                flex: 0 0 14px;
            }
            
            #social-media .sm-card { 
                flex: 0 0 calc(100% - 20px);
                min-width: 0;
                width: 100%;
                max-width: 380px;
                margin: 0 auto;
                border-radius: 16px;
                min-height: 460px;
            }
            
            #social-media .sm-image { 
                height: 260px;
            }
            
            #social-media .sm-content {
                padding: 24px;
                gap: 14px;
            }
            
            #social-media .sm-title { 
                font-size: 19px;
                line-height: 1.5;
            }
            
            #social-media .sm-subtitle { 
                font-size: 14px;
                line-height: 1.7;
            }
            
            #social-media .sm-btn {
                padding: 13px 24px;
                font-size: 15px;
                width: auto;
                border-radius: 12px;
                align-self: flex-start;
            }
            
            #social-media .carousel-btn {
                width: 48px;
                height: 48px;
            }
            
            #social-media .carousel-btn.prev-btn {
                left: 10px;
            }
            
            #social-media .carousel-btn.next-btn {
                right: 10px;
            }
        }
        
        @media (max-width: 480px) {
            #social-media { 
                padding: 28px 0;
                background: transparent;
            }
            
            #social-media .carousel-wrapper { 
                padding: 0 10px;
            }
            
            #social-media .carousel-track {
                gap: 12px;
                padding: 10px;
            }
            
            #social-media .carousel-track::before,
            #social-media .carousel-track::after {
                flex: 0 0 10px;
            }
            
            #social-media .sm-card { 
                flex: 0 0 calc(100% - 12px);
                min-width: 0;
                width: 100%;
                max-width: 340px;
                border-radius: 16px;
                min-height: 420px;
            }
            
            #social-media .sm-image { 
                height: 220px;
            }
            
            #social-media .sm-content {
                padding: 20px;
                gap: 12px;
            }
            
            #social-media .sm-title { 
                font-size: 17px;
                line-height: 1.45;
            }
            
            #social-media .sm-subtitle { 
                font-size: 13px;
                line-height: 1.65;
                -webkit-line-clamp: 4;
            }
            
            #social-media .sm-btn {
                padding: 12px 18px;
                font-size: 14px;
                width: auto;
                border-radius: 12px;
                align-self: flex-start;
            }
            
            #social-media .carousel-btn { 
                width: 44px;
                height: 44px;
                top: auto;
                bottom: -64px;
            }
            
            #social-media .carousel-btn.prev-btn {
                left: 50%;
                transform: translateX(-120%) translateY(-50%);
                background: linear-gradient(135deg, #0d3d29, #0d6639);
            }
            
            #social-media .carousel-btn.next-btn {
                right: 50%;
                transform: translateX(120%) translateY(-50%);
                background: linear-gradient(135deg, #0d3d29, #0d6639);
            }
            
            #social-media .carousel-btn.prev-btn:hover:not(:disabled) {
                transform: translateX(-120%) translateY(-50%) scale(1.15);
            }
            
            #social-media .carousel-btn.next-btn:hover:not(:disabled) {
                transform: translateX(120%) translateY(-50%) scale(1.15);
            }
        }
        
        @media (max-width: 360px) {
            #social-media .carousel-wrapper { 
                padding: 0 6px;
            }
            
            #social-media .carousel-track {
                gap: 10px;
                padding: 8px;
            }
            
            #social-media .carousel-track::before,
            #social-media .carousel-track::after {
                flex: 0 0 8px;
            }
            
            #social-media .sm-card { 
                border-radius: 14px;
                min-height: 400px;
            }
            
            #social-media .sm-image { 
                height: 200px;
            }
            
            #social-media .sm-content {
                padding: 18px;
                gap: 10px;
            }
            
            #social-media .sm-title {
                font-size: 16px;
            }
            
            #social-media .sm-subtitle {
                font-size: 12.5px;
                -webkit-line-clamp: 4;
            }
            
            #social-media .sm-btn {
                padding: 12px 14px;
                font-size: 13px;
                width: auto;
                border-radius: 12px;
                align-self: flex-start;
            }
            
            #social-media .carousel-btn { 
                width: 40px;
                height: 40px;
            }
        }
    </style>

    <h2 class="section-title" id="socialMediaTitle">সোশ্যাল মিডিয়া পোস্ট</h2>
    <p class="section-subtitle" id="socialMediaSubtitle">আমাদের সাম্প্রতিক আপডেট এবং খবর</p>

    <script>
        // Load section title and subtitle dynamically
        (async function() {
            try {
                const response = await fetch('/api/project-sections?section_key=social-carousel');
                if (response.ok) {
                    const section = await response.json();
                    if (section) {
                        const titleEl = document.getElementById('socialMediaTitle');
                        const subtitleEl = document.getElementById('socialMediaSubtitle');
                        if (titleEl && section.title) {
                            titleEl.textContent = section.title;
                        }
                        if (subtitleEl && section.subtitle) {
                            subtitleEl.textContent = section.subtitle;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading social media section settings:', error);
            }
        })();
    </script>

    <div class="carousel-wrapper">
        <button id="prevSocialBtn" class="carousel-btn prev-btn" aria-label="Previous">❮</button>
        <div class="carousel-container">
            <div id="socialTrack" class="carousel-track" aria-live="polite">
                <!-- Social media items will be loaded dynamically -->
            </div>
            <div class="carousel-dots" id="socialMediaDots" role="tablist" aria-label="Carousel navigation"></div>
        </div>
        <button id="nextSocialBtn" class="carousel-btn next-btn" aria-label="Next">❯</button>
    </div>

    <script>
        (function(){
            const track = document.getElementById('socialTrack') || document.querySelector('#social-media .carousel-inner');
            const prevBtn = document.getElementById('prevSocialBtn');
            const nextBtn = document.getElementById('nextSocialBtn');
            const dotsContainer = document.getElementById('socialMediaDots');
            let currentIndex = 0;
            
            // Pre-loaded data from server - NO AJAX DELAY!
            let items = @json($socialMedia ?? []);

            function loadItems() {
                // Data already loaded - just render immediately
                renderItems();
                initCarousel();
            }

            function renderItems(){
                if (!track) return;
                const usingBootstrap = track.classList.contains('carousel-inner');
                track.innerHTML = '';
                if (!items.length) {
                    track.innerHTML = '<div class="sm-card"><div class="sm-content"><p style="text-align:center; color:#666;">কোনো আইটেম নেই</p></div></div>';
                    return;
                }
                items.forEach((it, idx) => {
                    const card = document.createElement('div');
                    card.className = 'sm-card';
                    card.setAttribute('role','group');
                    card.setAttribute('aria-label', (it.title || 'আইটেম'));

                    const inner = document.createElement('div');

                    // Create media element
                    let mediaHTML = '';
                    if (it.video_url) {
                        const poster = it.image_url || (it.image_path ? `/storage/${it.image_path}` : '');
                        mediaHTML = `
                            <div class="sm-image" style="background-image:url('${poster}'); background-size:cover; background-position:center;">
                                <video style="width:100%;height:100%;object-fit:cover;opacity:0.01;" poster="${poster}" muted loop playsinline draggable="false">
                                    <source src="${it.video_url}" type="video/mp4">
                                </video>
                            </div>
                        `;
                    } else if (it.image_url) {
                        mediaHTML = `<div class="sm-image" style="background-image:url('${it.image_url}'); background-size:cover; background-position:center;"></div>`;
                    } else if (it.image_path) {
                        mediaHTML = `<div class="sm-image" style="background-image:url('${it.image_path}'); background-size:cover; background-position:center;"></div>`;
                    } else {
                        // Fallback icon only if no image
                        const icons = ['<i class="fas fa-building"></i>', '<i class="fas fa-home"></i>', '<i class="fas fa-city"></i>', '<i class="fas fa-landmark"></i>'];
                        mediaHTML = `<div class="sm-image" style="display:flex; align-items:center; justify-content:center; font-size:4rem; color: #0d3d29;">${icons[idx % icons.length]}</div>`;
                    }
                    
                    inner.innerHTML = `
                        ${mediaHTML}
                        <div class="sm-content">
                            <div class="sm-title">${(it.title || '').toString().trim()}</div>
                            ${it.content ? `<div class="sm-subtitle">${(it.content||'').toString().trim()}</div>` : ''}
                            <div class="sm-btn" data-link="${it.link || ''}" style="cursor: ${it.link ? 'pointer' : 'default'};">এখুনি দেখুন</div>
                        </div>
                    `;
                    card.appendChild(inner);
                    track.appendChild(card);
                    
                    // Add click handler to button only
                    const btn = card.querySelector('.sm-btn');
                    if (btn && it.link) {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            window.open(it.link, '_blank', 'noopener,noreferrer');
                        });
                    }
                });
            }

            function initCarousel(){
                if (!track) return;
                const usingBootstrap = track.classList.contains('carousel-inner');
                if (usingBootstrap) {
                    // Let Bootstrap's JS handle sliding if included. Hide custom arrows.
                    if (prevBtn) prevBtn.style.display = 'none';
                    if (nextBtn) nextBtn.style.display = 'none';
                    return;
                }
                
                function getVisibleCount(){
                    const w = window.innerWidth;
                    if (w <= 768) return 1;
                    if (w <= 992) return 2;
                    if (w <= 1200) return 3;
                    return 4;
                }
                
                function updateButtons(){
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, items.length - visible);
                    
                    if (items.length <= visible) {
                        // Hide buttons if all items are visible
                        if (prevBtn) prevBtn.style.display = 'none';
                        if (nextBtn) nextBtn.style.display = 'none';
                        if (dotsContainer) dotsContainer.style.display = 'none';
                    } else {
                        // Show buttons and enable/disable based on position
                        if (prevBtn) {
                            prevBtn.style.display = 'flex';
                            prevBtn.disabled = currentIndex === 0;
                        }
                        if (nextBtn) {
                            nextBtn.style.display = 'flex';
                            nextBtn.disabled = currentIndex >= maxIndex;
                        }
                        if (dotsContainer) dotsContainer.style.display = 'flex';
                    }
                }
                
                function updateDots(){
                    if (!dotsContainer || items.length === 0) return;
                    
                    const visible = getVisibleCount();
                    const totalPages = Math.ceil(items.length / visible);
                    
                    // Clear existing dots
                    dotsContainer.innerHTML = '';
                    
                    // Don't show dots if only one page
                    if (totalPages <= 1) return;
                    
                    // Create dots based on number of pages
                    for (let i = 0; i < totalPages; i++) {
                        const dot = document.createElement('button');
                        dot.className = 'carousel-dot';
                        dot.setAttribute('role', 'tab');
                        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                        dot.setAttribute('aria-selected', i === Math.floor(currentIndex / visible) ? 'true' : 'false');
                        dot.type = 'button';
                        
                        if (i === Math.floor(currentIndex / visible)) {
                            dot.classList.add('active');
                        }
                        
                        dot.addEventListener('click', () => {
                            const targetIndex = i * visible;
                            const maxIndex = Math.max(0, items.length - visible);
                            currentIndex = Math.min(targetIndex, maxIndex);
                            update();
                        });
                        
                        dotsContainer.appendChild(dot);
                    }
                }
                
                function update(){
                    if (!track || items.length === 0) return;
                    
                    const cards = track.querySelectorAll('.sm-card');
                    if (cards.length === 0) return;
                    
                    const card = cards[0];
                    const cardWidth = card.offsetWidth;
                    const computedStyles = window.getComputedStyle(track);
                    const gapValue = computedStyles.columnGap || computedStyles.gap || '24px';
                    const gap = parseFloat(gapValue);
                    
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, items.length - visible);
                    currentIndex = Math.min(Math.max(0, currentIndex), maxIndex);
                    
                    track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    track.style.transform = `translateX(${-currentIndex * (cardWidth + gap)}px)`;
                    
                    updateButtons();
                    updateDots();
                }
                
                // Previous button handler
                if (prevBtn) {
                    prevBtn.onclick = () => {
                        if (currentIndex > 0) {
                            currentIndex--;
                            update();
                        }
                    };
                }
                
                // Next button handler
                if (nextBtn) {
                    nextBtn.onclick = () => {
                        const visible = getVisibleCount();
                        const maxIndex = Math.max(0, items.length - visible);
                        if (currentIndex < maxIndex) {
                            currentIndex++;
                            update();
                        }
                    };
                }

                // Smooth drag functionality
                const container = track.closest('.carousel-container');
                let isDragging = false;
                let startX = 0;
                let startScrollLeft = 0;
                let currentTranslate = 0;
                
                function handleDragStart(e) {
                    if (!container) return;
                    isDragging = true;
                    container.classList.add('dragging');
                    startX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                    const card = track.querySelector('.sm-card');
                    const cardWidth = card ? card.offsetWidth : 0;
                    const gap = 24;
                    startScrollLeft = -currentIndex * (cardWidth + gap);
                    currentTranslate = startScrollLeft;
                }
                
                function handleDragMove(e) {
                    if (!isDragging || !container) return;
                    e.preventDefault();
                    const currentX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                    const diff = currentX - startX;
                    currentTranslate = startScrollLeft + diff;
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${currentTranslate}px)`;
                }
                
                function handleDragEnd(e) {
                    if (!isDragging || !container) return;
                    isDragging = false;
                    container.classList.remove('dragging');
                    
                    const card = track.querySelector('.sm-card');
                    const cardWidth = card ? card.offsetWidth : 0;
                    const gap = 24;
                    const endX = e.type.includes('touch') ? (e.changedTouches[0]?.clientX || startX) : e.clientX;
                    const diff = endX - startX;
                    const threshold = (cardWidth + gap) * 0.3; // 30% of card width
                    
                    if (Math.abs(diff) > threshold) {
                        if (diff > 0 && currentIndex > 0) {
                            currentIndex--;
                        } else if (diff < 0) {
                            const visible = getVisibleCount();
                            const maxIndex = Math.max(0, items.length - visible);
                            if (currentIndex < maxIndex) {
                                currentIndex++;
                            }
                        }
                    }
                    update();
                }
                
                // Mouse events
                if (container) {
                    container.addEventListener('mousedown', handleDragStart);
                    document.addEventListener('mousemove', handleDragMove);
                    document.addEventListener('mouseup', handleDragEnd);
                    container.addEventListener('mouseleave', handleDragEnd);
                    
                    // Touch events
                    container.addEventListener('touchstart', handleDragStart, { passive: false });
                    container.addEventListener('touchmove', handleDragMove, { passive: false });
                    container.addEventListener('touchend', handleDragEnd);
                }

                window.addEventListener('resize', () => {
                    // Reset to valid position on resize
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, items.length - visible);
                    currentIndex = Math.min(currentIndex, maxIndex);
                    update();
                });

                update();
            }

            // Load immediately - no waiting
            loadItems();
            
            // No auto-reload, no storage events needed
        })();
    </script>
</section>