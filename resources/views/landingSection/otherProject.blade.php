 <section id="other-projects" class="other-projects">
    <style>
        /* Section base styles */
        .other-projects {
            padding: 80px 0;
            background: #f8fafb;
            position: relative;
            overflow: hidden;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #0d3d29;
            margin-bottom: 10px;
            font-family: 'Hind Siliguri', sans-serif;
        }
        
        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 50px;
            font-family: 'Hind Siliguri', sans-serif;
        }
        
        /* Modern professional card styling */
        #other-projects .carousel-wrapper { 
            position: relative; 
            max-width: 1400px; 
            margin: 0 auto; 
            padding: 0 60px; 
        }
        #other-projects .carousel-container { 
            overflow: hidden; 
            padding: 20px 0;
            user-select: none;
        }
        
        #other-projects .carousel-container.can-drag {
            cursor: grab;
        }
        
        #other-projects .carousel-container.can-drag:active {
            cursor: grabbing;
        }
        
        #other-projects .carousel-container.dragging {
            cursor: grabbing;
        }
        
        #other-projects .carousel-container.dragging .project-card {
            pointer-events: none;
        }
        
        #other-projects .carousel-container.disabled {
            cursor: default;
        }
        
        #other-projects .carousel-track { 
            display: flex; 
            gap: 24px; 
            transition: transform 500ms cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }
        
        #other-projects .carousel-track.no-transition {
            transition: none;
        }
        
        #other-projects .carousel-track.smooth-transition {
            transition: transform 600ms cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Modern card styles - Smaller size */
        #other-projects .project-card { 
            flex: 0 0 280px;
            min-width: 280px;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: 2px solid transparent;
        }
        
        #other-projects .project-card::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 16px;
            padding: 2px;
            background: linear-gradient(135deg, #0d3d29, #d4af37, #0d3d29);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        #other-projects .project-card:hover::before {
            opacity: 1;
            animation: borderRotate 3s linear infinite;
        }
        
        @keyframes borderRotate {
            0% {
                background: linear-gradient(135deg, #0d3d29, #d4af37, #0d3d29);
            }
            25% {
                background: linear-gradient(225deg, #d4af37, #0d3d29, #d4af37);
            }
            50% {
                background: linear-gradient(315deg, #0d3d29, #d4af37, #0d3d29);
            }
            75% {
                background: linear-gradient(45deg, #d4af37, #0d3d29, #d4af37);
            }
            100% {
                background: linear-gradient(135deg, #0d3d29, #d4af37, #0d3d29);
            }
        }
        
        #other-projects .project-card:hover { 
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(13, 61, 41, 0.25), 
                        0 0 40px rgba(212, 175, 55, 0.2);
        }
        
        #other-projects .project-image { 
            width: 100%; 
            height: 180px; 
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            background-size: cover; 
            background-position: center;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }
        
        #other-projects .project-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(212, 175, 55, 0.3) 50%,
                transparent 70%
            );
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
        
        #other-projects .project-card:hover .project-image::before {
            opacity: 1;
            animation: shimmer 2s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }
            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }
        
        #other-projects .project-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
            z-index: 1;
            transition: height 0.4s ease;
        }
        
        #other-projects .project-card:hover .project-image::after {
            height: 100px;
            background: linear-gradient(to top, rgba(13, 61, 41, 0.7), transparent);
        }
        
        #other-projects .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease, filter 0.4s ease;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        #other-projects .project-card:hover .project-image img {
            transform: scale(1.1) rotate(1deg);
            filter: brightness(1.1) contrast(1.05);
        }
        
        #other-projects .project-content { 
            padding: 20px;
            position: relative;
        }
        
        #other-projects .project-card:hover .project-content {
            animation: contentGlow 1.5s ease-in-out infinite;
        }
        
        @keyframes contentGlow {
            0%, 100% {
                text-shadow: 0 0 5px rgba(13, 61, 41, 0);
            }
            50% {
                text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
            }
        }
        
        #other-projects .project-content h3 { 
            font-size: 17px; 
            line-height: 1.4; 
            font-weight: 700; 
            color: #0d3d29;
            margin-bottom: 10px;
            letter-spacing: -0.2px;
            transition: all 0.3s ease;
        }
        
        #other-projects .project-card:hover .project-content h3 {
            color: #0d6639;
            transform: translateX(4px);
        }
        
        #other-projects .project-content p { 
            font-size: 13px; 
            line-height: 1.6; 
            color: #64748b;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: color 0.3s ease;
        }
        
        #other-projects .project-card:hover .project-content p {
            color: #475569;
        }
        
        /* Slider Dots */
        #other-projects .slider-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 30px;
            padding: 20px 0;
        }
        
        #other-projects .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e1;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        #other-projects .slider-dot:hover {
            background: #94a3b8;
            transform: scale(1.2);
        }
        
        #other-projects .slider-dot.active {
            background: #0d3d29;
            width: 32px;
            border-radius: 6px;
            box-shadow: 0 0 0 4px rgba(13, 61, 41, 0.15);
        }
        
        #other-projects .slider-dot.active::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 8px;
            border: 2px solid rgba(13, 61, 41, 0.3);
            animation: dotPulse 2s ease-in-out infinite;
        }
        
        @keyframes dotPulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.3);
                opacity: 0.5;
            }
        }

        /* Navigation buttons */
        #other-projects .carousel-btn { 
            position: absolute; 
            top: 50%; 
            transform: translateY(-50%); 
            background: #ffffff;
            color: #0d3d29;
            border: 2px solid #e5e7eb;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        
        #other-projects .carousel-btn:hover { 
            background: #0d3d29;
            color: #ffffff;
            border-color: #0d3d29;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 20px rgba(13, 61, 41, 0.3);
        }
        
        #other-projects .carousel-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            transform: translateY(-50%);
        }
        
        #other-projects .prev-btn { left: -25px; }
        #other-projects .next-btn { right: -25px; }

        /* Responsive */
        @media (max-width: 1024px) {
            #other-projects .carousel-wrapper { 
                padding: 0 50px;
            }
            #other-projects .project-card { 
                flex: 0 0 260px;
                min-width: 260px;
            }
            #other-projects .project-image { height: 170px; }
            #other-projects .carousel-btn { width: 45px; height: 45px; font-size: 18px; }
            #other-projects .prev-btn { left: 10px; }
            #other-projects .next-btn { right: 10px; }
        }
        
        @media (max-width: 768px) {
            .other-projects {
                padding: 50px 0 !important;
            }

            .section-title {
                font-size: clamp(1.8rem, 4vw, 2.2rem) !important;
            }

            .section-subtitle {
                font-size: clamp(1rem, 3vw, 1.1rem) !important;
                margin-bottom: 40px !important;
            }

            #other-projects .carousel-wrapper { 
                padding: 0 35px !important;
                max-width: 100% !important;
            }
            #other-projects .carousel-container {
                border-radius: 16px !important;
            }
            #other-projects .project-card { 
                flex: 0 0 calc(50% - 12px) !important;
                min-width: 0 !important;
                max-width: 350px !important;
                border-radius: 14px !important;
            }
            #other-projects .project-image { 
                height: 180px !important;
            }
            #other-projects .project-content { 
                padding: 18px !important;
            }
            #other-projects .project-content h3 { 
                font-size: 16px !important;
            }
            #other-projects .project-content p { 
                font-size: 12px !important;
                line-height: 1.5 !important;
            }
            #other-projects .project-content .btn { 
                padding: 9px 16px !important;
                font-size: 12px !important;
            }
            #other-projects .carousel-btn { 
                width: 42px !important;
                height: 42px !important;
                font-size: 18px !important;
            }
        }
        
        @media (max-width: 480px) {
            #other-projects .carousel-wrapper { 
                padding: 0 20px;
            }
            #other-projects .carousel-container {
                border-radius: 12px;
            }
            #other-projects .project-card { 
                flex: 0 0 220px;
                min-width: 220px;
                border-radius: 12px;
            }
            #other-projects .project-image { 
                height: 150px;
                font-size: 2.5rem;
            }
            #other-projects .project-content { padding: 16px; }
            #other-projects .project-content h3 { font-size: 15px; }
            #other-projects .project-content p { font-size: 11px; }
            #other-projects .project-content .btn { 
                padding: 8px 14px;
                font-size: 11px;
            }
            #other-projects .carousel-btn { width: 40px; height: 40px; font-size: 16px; }
            #other-projects .slider-dots { gap: 8px; margin-top: 20px; }
            #other-projects .slider-dot { width: 10px; height: 10px; }
            #other-projects .slider-dot.active { width: 24px; }
        }
        
        @media (max-width: 480px) {
            .other-projects {
                padding: 40px 0 !important;
            }

            .section-title {
                font-size: clamp(1.5rem, 5vw, 2rem) !important;
            }

            .section-subtitle {
                font-size: clamp(0.9rem, 3vw, 1rem) !important;
                padding: 0 1rem !important;
                margin-bottom: 35px !important;
            }

            #other-projects .carousel-wrapper { 
                padding: 0 12px !important;
            }

            #other-projects .project-card { 
                flex: 0 0 calc(100% - 24px) !important;
                min-width: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 auto;
                border-radius: 12px !important;
            }

            #other-projects .project-image { 
                height: 200px !important;
            }

            #other-projects .project-content { 
                padding: 16px !important;
            }

            #other-projects .project-content h3 { 
                font-size: 15px !important;
                margin-bottom: 8px !important;
            }

            #other-projects .project-content p { 
                font-size: 12px !important;
                line-height: 1.5 !important;
                margin-bottom: 12px !important;
            }

            #other-projects .project-content .btn { 
                padding: 9px 16px !important;
                font-size: 12px !important;
                width: 100% !important;
                text-align: center !important;
            }

            #other-projects .carousel-btn { 
                width: 40px !important;
                height: 40px !important;
                font-size: 16px !important;
                top: auto !important;
                bottom: -60px !important;
            }

            #other-projects .prev-btn { 
                left: 50% !important;
                transform: translateX(-120%) translateY(-50%) !important;
            }

            #other-projects .next-btn { 
                right: 50% !important;
                transform: translateX(120%) translateY(-50%) !important;
            }

            #other-projects .slider-dots { 
                gap: 8px !important;
                margin-top: 50px !important;
                padding: 8px 0 !important;
            }

            #other-projects .slider-dot { 
                width: 8px !important;
                height: 8px !important;
            }

            #other-projects .slider-dot.active { 
                width: 24px !important;
            }
        }

        @media (max-width: 360px) {
            #other-projects .carousel-wrapper { 
                padding: 0 10px !important;
            }
            
            #other-projects .project-card { 
                flex: 0 0 calc(100% - 20px) !important;
            }

            #other-projects .project-image { 
                height: 180px !important;
            }

            #other-projects .carousel-btn { 
                width: 36px !important;
                height: 36px !important;
                font-size: 14px !important;
            }
        }

        /* Project Details Modal Styles */
        .project-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .project-modal-overlay.active {
            display: flex;
        }

        .project-modal {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafb 100%);
            border-radius: 24px;
            max-width: 900px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 
                0 25px 80px rgba(0, 0, 0, 0.3),
                0 10px 40px rgba(13, 61, 41, 0.2);
            transform: scale(0.9) translateY(20px);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 2px solid rgba(13, 61, 41, 0.1);
        }

        .project-modal-overlay.active .project-modal {
            transform: scale(1) translateY(0);
        }

        .project-modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #0d3d29 0%, #12774c 100%);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(13, 61, 41, 0.3);
        }

        .project-modal-close:hover {
            transform: scale(1.1) rotate(90deg);
            background: linear-gradient(135deg, #d4af37 0%, #f0c850 100%);
        }

        .project-modal-close svg {
            width: 20px;
            height: 20px;
            fill: white;
        }

        .project-modal-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 24px 24px 0 0;
        }

        .project-modal-image-placeholder {
            width: 100%;
            height: 350px;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            border-radius: 24px 24px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: #0d3d29;
        }

        .project-modal-content {
            padding: 35px 40px 40px;
        }

        .project-modal-title {
            font-size: 2rem;
            font-weight: 700;
            color: #0d3d29;
            margin-bottom: 20px;
            font-family: 'Hind Siliguri', sans-serif;
            line-height: 1.3;
        }

        .project-modal-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #4a5568;
            margin-bottom: 30px;
            font-family: 'Hind Siliguri', sans-serif;
        }

        .project-modal-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .project-modal-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f1 100%);
            border-radius: 12px;
            border: 1px solid rgba(13, 61, 41, 0.1);
        }

        .project-modal-feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #0d3d29 0%, #12774c 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .project-modal-feature-text {
            font-size: 0.95rem;
            color: #2d3748;
            font-weight: 500;
        }

        .project-modal-cta {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .project-modal-btn {
            padding: 14px 35px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Hind Siliguri', sans-serif;
            cursor: pointer;
            border: none;
        }

        .project-modal-btn-primary {
            background: linear-gradient(135deg, #0d3d29 0%, #12774c 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(13, 61, 41, 0.3);
        }

        .project-modal-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 61, 41, 0.4);
            background: linear-gradient(135deg, #12774c 0%, #0d3d29 100%);
        }

        .project-modal-btn-secondary {
            background: white;
            color: #0d3d29;
            border: 2px solid #0d3d29;
        }

        .project-modal-btn-secondary:hover {
            background: #0d3d29;
            color: white;
        }

        /* Modal Responsive */
        @media (max-width: 768px) {
            .project-modal {
                max-height: 95vh;
                border-radius: 20px;
            }

            .project-modal-image,
            .project-modal-image-placeholder {
                height: 250px;
                border-radius: 20px 20px 0 0;
            }

            .project-modal-content {
                padding: 25px 25px 30px;
            }

            .project-modal-title {
                font-size: 1.5rem;
            }

            .project-modal-description {
                font-size: 1rem;
            }

            .project-modal-features {
                grid-template-columns: 1fr;
            }

            .project-modal-cta {
                flex-direction: column;
            }

            .project-modal-btn {
                width: 100%;
                justify-content: center;
            }

            .project-modal-close {
                top: 15px;
                right: 15px;
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 480px) {
            .project-modal-overlay {
                padding: 10px;
            }

            .project-modal-image,
            .project-modal-image-placeholder {
                height: 200px;
            }

            .project-modal-content {
                padding: 20px 20px 25px;
            }

            .project-modal-title {
                font-size: 1.3rem;
            }
        }
    </style>

       <h2 class="section-title" id="otherProjectsTitle">প্রকল্প</h2>
       <p class="section-subtitle" id="otherProjectsSubtitle">NEX Real Estate-এর সফল প্রকল্পগুলো দেখুন</p>

        <script>
            // Load section title and subtitle dynamically
            (async function() {
                try {
                    const response = await fetch('/api/project-sections?section_key=our_projects');
                    if (response.ok) {
                        const section = await response.json();
                        if (section) {
                            const titleEl = document.getElementById('otherProjectsTitle');
                            const subtitleEl = document.getElementById('otherProjectsSubtitle');
                            if (titleEl && section.title) {
                                titleEl.textContent = section.title;
                            }
                            if (subtitleEl && section.subtitle) {
                                subtitleEl.textContent = section.subtitle;
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error loading other projects section settings:', error);
                }
            })();
        </script>

        <div class="carousel-wrapper">
            <button id="prevBtn" class="carousel-btn prev-btn">❮</button>
            <div class="carousel-container">
               <div id="projectTrack" class="carousel-track"></div>
            </div>
            <button id="nextBtn" class="carousel-btn next-btn">❯</button>
        </div>

    <!-- Slider Dots -->
    <div id="sliderDots" class="slider-dots"></div>

    <!-- Project Details Modal -->
    <div id="projectDetailModal" class="project-modal-overlay">
        <div class="project-modal">
            <button class="project-modal-close" id="closeProjectModal">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                </svg>
            </button>
            <div id="projectModalImageContainer">
                <img src="" alt="" class="project-modal-image" id="projectModalImage">
            </div>
            <div class="project-modal-content">
                <h2 class="project-modal-title" id="projectModalTitle"></h2>
                <p class="project-modal-description" id="projectModalDescription"></p>
                <div class="project-modal-features" id="projectModalFeatures"></div>
                <div class="project-modal-cta">
                    <a href="#contact" class="project-modal-btn project-modal-btn-primary" id="projectModalContactBtn">
                        <i class="fas fa-phone-alt"></i>
                        যোগাযোগ করুন
                    </a>
                    <a href="" class="project-modal-btn project-modal-btn-secondary" id="projectModalCtaLink" style="display: none;">
                        <i class="fas fa-external-link-alt"></i>
                        <span id="projectModalCtaText">আরও জানুন</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- See More Button -->
    <div style="text-align: center; margin-top: 2rem;">
            <a href="/projects" class="btn btn-primary">আরও দেখুন</a>
        </div>
        
        <!-- Global Modal Function - MUST be before other scripts -->
        <script>
            // Global function to open project detail modal
            function openProjectDetailModal(btn) {
                console.log('openProjectDetailModal called');
                var modal = document.getElementById('projectDetailModal');
                if (!modal) {
                    console.error('Modal not found!');
                    return;
                }
                
                var title = btn.getAttribute('data-title') || 'প্রকল্পের বিবরণ';
                var description = btn.getAttribute('data-description') || '';
                var image = btn.getAttribute('data-image') || '';
                var ctaText = btn.getAttribute('data-cta-text') || '';
                var ctaLink = btn.getAttribute('data-cta-link') || '';
                
                console.log('Modal data:', { title, description, image });
                
                // Set modal content
                var modalTitle = document.getElementById('projectModalTitle');
                var modalDesc = document.getElementById('projectModalDescription');
                var modalImgContainer = document.getElementById('projectModalImageContainer');
                var modalFeatures = document.getElementById('projectModalFeatures');
                var modalCtaLinkEl = document.getElementById('projectModalCtaLink');
                var modalCtaTextEl = document.getElementById('projectModalCtaText');
                
                if (modalTitle) modalTitle.textContent = title;
                if (modalDesc) modalDesc.textContent = description;
                
                // Set image
                if (modalImgContainer) {
                    if (image && image.trim() !== '') {
                        modalImgContainer.innerHTML = '<img src="' + image + '" alt="' + title + '" class="project-modal-image">';
                    } else {
                        modalImgContainer.innerHTML = '<div class="project-modal-image-placeholder"><i class="fas fa-building" style="font-size:4rem;color:#0d3d29;"></i></div>';
                    }
                }
                
                // Set features
                if (modalFeatures) {
                    modalFeatures.innerHTML = '<div class="project-modal-feature"><div class="project-modal-feature-icon">🏠</div><span class="project-modal-feature-text">আধুনিক স্থাপত্য</span></div>' +
                        '<div class="project-modal-feature"><div class="project-modal-feature-icon">🌳</div><span class="project-modal-feature-text">পরিবেশ বান্ধব</span></div>' +
                        '<div class="project-modal-feature"><div class="project-modal-feature-icon">🔒</div><span class="project-modal-feature-text">২৪/৭ নিরাপত্তা</span></div>' +
                        '<div class="project-modal-feature"><div class="project-modal-feature-icon">🚗</div><span class="project-modal-feature-text">পার্কিং সুবিধা</span></div>';
                }
                
                // Set CTA link
                if (modalCtaLinkEl && modalCtaTextEl) {
                    if (ctaLink && ctaLink !== '#contact' && ctaLink !== '#') {
                        modalCtaLinkEl.href = ctaLink;
                        modalCtaTextEl.textContent = ctaText || 'আরও জানুন';
                        modalCtaLinkEl.style.display = 'inline-flex';
                    } else {
                        modalCtaLinkEl.style.display = 'none';
                    }
                }
                
                // Show modal
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
                console.log('Modal shown!');
            }
            
            // Global function to close modal
            function closeProjectDetailModal() {
                var modal = document.getElementById('projectDetailModal');
                if (modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
            
            // Initialize modal close handlers when DOM is ready
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('projectDetailModal');
                var closeBtn = document.getElementById('closeProjectModal');
                var contactBtn = document.getElementById('projectModalContactBtn');
                
                if (closeBtn) {
                    closeBtn.addEventListener('click', closeProjectDetailModal);
                }
                
                if (modal) {
                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) {
                            closeProjectDetailModal();
                        }
                    });
                }
                
                if (contactBtn) {
                    contactBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        closeProjectDetailModal();
                        setTimeout(function() {
                            var contact = document.getElementById('contact');
                            if (contact) contact.scrollIntoView({ behavior: 'smooth' });
                        }, 300);
                    });
                }
                
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') closeProjectDetailModal();
                });
            });
        </script>
        
        <script>
            (function(){
                const track = document.getElementById('projectTrack');
                const container = track.parentElement;
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const dotsContainer = document.getElementById('sliderDots');
                let currentIndex = 0;
                
                // Mouse drag variables
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;
                let animationID = 0;
                let currentPosition = 0;
                
                // Dynamic projects loaded via API
                let projects = [];
                
                // Load projects from API
                async function loadProjects() {
                    try {
                        console.log('Loading projects from API for home page carousel...');
                        const response = await fetch('/api/our-projects', {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            },
                            cache: 'no-cache'
                        });
                        
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        projects = await response.json();
                        console.log('Projects loaded for carousel:', projects);
                        
                        // If no projects from database, use fallback defaults
                        if (!projects || projects.length === 0) {
                            loadDefaultProjects();
                            return;
                        }
                        
                        renderProjects();
                        updateCarouselState();
                        initDragFunctionality();
                    } catch (error) {
                        console.error('Error loading projects:', error);
                        // Fallback to defaults on error
                        loadDefaultProjects();
                    }
                }
                
                // Fallback default projects
                function loadDefaultProjects() {
                    projects = [];
                    renderProjects();
                    updateCarouselState();
                }
                
                // Helper function to escape HTML
                function escapeHtml(text) {
                    if (!text) return '';
                    const div = document.createElement('div');
                    div.textContent = text;
                    return div.innerHTML;
                }

                // Helper function to escape HTML attributes
                function escapeAttr(text) {
                    if (!text) return '';
                    return String(text)
                        .replace(/&/g, '&amp;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#39;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;');
                }

                function renderProjects() {
                    if (!track) {
                        console.error('Project track element not found');
                        return;
                    }
                    
                    track.innerHTML = '';
                    
                    if (!projects || projects.length === 0) {
                        track.innerHTML = '<div class="project-card"><p style="text-align:center; padding:2rem;">কোনো প্রকল্প পাওয়া যায়নি</p></div>';
                        renderDots();
                        return;
                    }
                    
                    projects.forEach((project, index) => {
                        try {
                            const card = document.createElement('div');
                            card.className = 'project-card';
                            
                            // Safely get values
                            const title = escapeHtml(project.title || 'Untitled Project');
                            const description = escapeHtml(project.description || '');
                            const ctaText = escapeHtml(project.cta_text || 'বিস্তারিত জানুন');
                            const ctaLink = escapeAttr(project.cta_link || '#contact');
                            
                            // Get image URL - fix if needed
                            let imageUrl = project.image_url || null;
                            if (!imageUrl && project.image_path) {
                                let imgPath = String(project.image_path);
                                if (!imgPath.startsWith('http') && !imgPath.startsWith('/')) {
                                    imgPath = '/storage/' + imgPath;
                                } else if (imgPath.startsWith('storage/')) {
                                    imgPath = '/' + imgPath;
                                }
                                imageUrl = imgPath;
                            }
                            
                            // Fix image URL if it contains incorrect localhost path
                            if (imageUrl && imageUrl.includes('localhost/8000')) {
                                imageUrl = imageUrl.replace(/^https?:\/\/[^\/]+/, '');
                                if (imageUrl && !imageUrl.startsWith('/')) {
                                    imageUrl = '/' + imageUrl;
                                }
                            }
                            
                            const escapedImageUrl = imageUrl ? escapeAttr(imageUrl) : '';
                            
                            // Create image element
                            let imageContent = '';
                            if (escapedImageUrl) {
                                imageContent = `<img src="${escapedImageUrl}" alt="${title}" loading="lazy" decoding="async" onerror="console.error('Image failed to load:', '${escapedImageUrl}'); this.style.display='none';" />`;
                            } else {
                                const icons = ['<i class="fas fa-city"></i>', '<i class="fas fa-home"></i>', '<i class="fas fa-building"></i>', '<i class="fas fa-hard-hat"></i>'];
                                imageContent = `<div style="font-size: 5rem; color: #0d3d29;">${icons[index % icons.length]}</div>`;
                            }
                            
                            card.innerHTML = `
                                <div class="project-image">${imageContent}</div>
                                <div class="project-content">
                                    <h3>${title}</h3>
                                    <p>${description}</p>
                                </div>`;
                            
                            // Store data on card for modal
                            card.setAttribute('data-title', escapeAttr(project.title || 'Untitled Project'));
                            card.setAttribute('data-description', escapeAttr(project.description || ''));
                            card.setAttribute('data-image', escapedImageUrl);
                            card.setAttribute('data-cta-text', escapeAttr(project.cta_text || ''));
                            card.setAttribute('data-cta-link', ctaLink);
                            
                            // Add click handler to card
                            card.addEventListener('click', function() {
                                openProjectDetailModal(this);
                            });
                            
                            track.appendChild(card);
                        } catch (error) {
                            console.error('Error rendering project:', error, project);
                        }
                    });
                    
                    // Render dots
                    renderDots();
                }
                
                function renderDots() {
                    if (!dotsContainer) return;
                    dotsContainer.innerHTML = '';
                    
                    // Calculate number of slides (showing 4 cards at a time)
                    const numSlides = Math.max(1, projects.length - 3);
                    
                    for (let i = 0; i < numSlides; i++) {
                        const dot = document.createElement('div');
                        dot.className = 'slider-dot';
                        if (i === currentIndex) {
                            dot.classList.add('active');
                        }
                        dot.setAttribute('data-index', i);
                        dot.setAttribute('aria-label', `Slide ${i + 1}`);
                        dot.addEventListener('click', () => {
                            currentIndex = i;
                            updateCarousel();
                        });
                        dotsContainer.appendChild(dot);
                    }
                }
                
                function updateDots() {
                    if (!dotsContainer) return;
                    const dots = dotsContainer.querySelectorAll('.slider-dot');
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.add('active');
                        } else {
                            dot.classList.remove('active');
                        }
                    });
                }
                
                // Initialize drag functionality
                function initDragFunctionality() {
                    // Only enable drag if more than 4 projects
                    if (projects.length <= 4) {
                        container.classList.remove('can-drag');
                        container.classList.add('disabled');
                        return;
                    }
                    
                    container.classList.add('can-drag');
                    container.classList.remove('disabled');
                    
                    // Mouse events
                    container.addEventListener('mousedown', dragStart);
                    container.addEventListener('mousemove', drag);
                    container.addEventListener('mouseup', dragEnd);
                    container.addEventListener('mouseleave', dragEnd);
                    
                    // Touch events
                    container.addEventListener('touchstart', dragStart);
                    container.addEventListener('touchmove', drag);
                    container.addEventListener('touchend', dragEnd);
                    
                    // Prevent context menu
                    container.addEventListener('contextmenu', e => e.preventDefault());
                }
                
                function dragStart(e) {
                    if (projects.length <= 4) return; // Don't allow drag if 4 or less
                    
                    isDragging = true;
                    startPos = getPositionX(e);
                    animationID = requestAnimationFrame(animation);
                    container.classList.add('dragging');
                    track.classList.add('no-transition');
                }
                
                function drag(e) {
                    if (isDragging) {
                        const currentPosition = getPositionX(e);
                        const newTranslate = prevTranslate + currentPosition - startPos;
                        
                        // Calculate boundaries
                        const maxTranslate = 0;
                        const minTranslate = -(projects.length - 4) * (304); // 280px card + 24px gap
                        
                        // Keep within boundaries
                        currentTranslate = Math.max(Math.min(newTranslate, maxTranslate), minTranslate);
                    }
                }
                
                function dragEnd() {
                    if (!isDragging) return;
                    
                    isDragging = false;
                    cancelAnimationFrame(animationID);
                    container.classList.remove('dragging');
                    track.classList.remove('no-transition');
                    track.classList.add('smooth-transition');
                    
                    const movedBy = currentTranslate - prevTranslate;
                    
                    // Snap to nearest card (threshold: 80px)
                    if (movedBy < -80 && currentIndex < projects.length - 4) {
                        currentIndex++;
                    } else if (movedBy > 80 && currentIndex > 0) {
                        currentIndex--;
                    }
                    
                    setPositionByIndex();
                    updateCarouselButtons();
                    updateDots();
                    
                    setTimeout(() => {
                        track.classList.remove('smooth-transition');
                    }, 600);
                }
                
                function getPositionX(e) {
                    return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
                }
                
                function animation() {
                    setSliderPosition();
                    if (isDragging) requestAnimationFrame(animation);
                }
                
                function setSliderPosition() {
                    track.style.transform = `translateX(${currentTranslate}px)`;
                }
                
                function setPositionByIndex() {
                    const cardWidth = track.querySelector('.project-card')?.offsetWidth || 0;
                    const gap = 24;
                    currentTranslate = -currentIndex * (cardWidth + gap);
                    prevTranslate = currentTranslate;
                    setSliderPosition();
                }
                
                function updateCarouselState() {
                    updateCarouselButtons();
                    updateDots();
                    
                    // Hide dots if 4 or less projects
                    if (dotsContainer) {
                        dotsContainer.style.display = projects.length > 4 ? 'flex' : 'none';
                    }
                }
                
                function updateCarouselButtons() {
                    const maxIndex = Math.max(0, projects.length - 4);
                    
                    prevBtn.disabled = currentIndex === 0;
                    nextBtn.disabled = currentIndex >= maxIndex;
                    
                    // Hide buttons if 4 or less projects
                    if (projects.length <= 4) {
                        prevBtn.style.display = 'none';
                        nextBtn.style.display = 'none';
                    } else {
                        prevBtn.style.display = 'flex';
                        nextBtn.style.display = 'flex';
                    }
                }
                
                function updateCarousel() {
                    track.classList.add('smooth-transition');
                    setPositionByIndex();
                    updateCarouselButtons();
                    updateDots();
                    
                    setTimeout(() => {
                        track.classList.remove('smooth-transition');
                    }, 600);
                }
                
                // Button navigation
                prevBtn.addEventListener('click', () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateCarousel();
                    }
                });
                
                nextBtn.addEventListener('click', () => {
                    const maxIndex = Math.max(0, projects.length - 4);
                    if (currentIndex < maxIndex) {
                        currentIndex++;
                        updateCarousel();
                    }
                });
                
                // Resize handler
                window.addEventListener('resize', () => {
                    setPositionByIndex();
                });
                
                // Wait for DOM to be fully ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(loadProjects, 100);
                    });
                } else {
                    setTimeout(loadProjects, 100);
                }
                
                // Automatic reload disabled - projects only load on page load or manual refresh
                // setInterval(loadProjects, 30000);
                
                // Listen for storage events to refresh projects
                window.addEventListener('storage', function(e){
                    try{
                        if (e && e.key === 'refreshOurProjects') {
                            console.log('Storage event detected, refreshing projects carousel...');
                            loadProjects();
                        }
                    }catch(err){ 
                        console.error('Storage event error:', err);
                    }
                });
                
                // Also listen for custom events
                window.addEventListener('ourProjectsUpdated', function() {
                    loadProjects();
                });
            })();
        </script>
    </section>

<script>
(function(){
    const defaults = {
        sectionTitle: 'অন্যান্য প্রকল্প',
        sectionSubtitle: 'NEX Real Estate-এর সফল প্রকল্পগুলো দেখুন',
        projects: [
            {
                image: '<i class="fas fa-city"></i>',
                title: 'শান্তি নিবাস',
                desc: 'শহরের ঠিক মাঝে আপনার শান্তির ঠিকানা। সব আধুনিক সুবিধা নিয়ে, ঢাকায় এক নতুন, বিলাসবহুল জীবন শুরু করুন।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '<i class="fas fa-home"></i>',
                title: 'সবুজ ভিটা',
                desc: 'নদীর একদম পাশে, যেখানে আপনি পাবেন নির্মল শান্তি। প্রকৃতির কাছাকাছি একটি নির্ভেজাল ও সুন্দর জীবন।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '<i class="fas fa-building"></i>',
                title: 'প্রত্যাশা টাওয়ার',
                desc: 'খুলনার সেরা লোকেশনে আপনার ব্যবসার জন্য সেরা অফিস স্পেস। এখানে বিনিয়োগ মানেই উজ্জ্বল ভবিষ্যৎ!',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            },
            {
                image: '<i class="fas fa-hard-hat"></i>',
                title: 'নির্মাণ প্লাজা',
                desc: 'ব্যস্ত শহরের কেন্দ্রে আধুনিক এবং পরিবেশ-বান্ধব বাণিজ্যিক স্থান। ব্যবসা বাড়ানোর জন্য আদর্শ বিনিয়োগ।',
                btnText: 'বিস্তারিত জানুন',
                btnLink: '#contact'
            }
        ]
    };

    const el = {
        title: document.getElementById('otherProjectsTitle'),
        subtitle: document.getElementById('otherProjectsSubtitle'),
        cards: [
            document.getElementById('otherProjCard1'),
            document.getElementById('otherProjCard2'),
            document.getElementById('otherProjCard3'),
            document.getElementById('otherProjCard4')
        ]
    };

    function loadFromAPI(){
        // Use pre-loaded data - NO AJAX!
        const projects = @json($ourProjects ?? []);
        
        if (projects && projects.length > 0) {
            // Use first 4 projects for "Other Projects" section
            const projectsData = projects.slice(0, 4).map(p => ({
                title: p.title || '',
                desc: p.description || '',
                image: p.image_url ? `<img src="${p.image_url}" alt="${p.title}" style="width:100%; height:100%; object-fit:cover;">` : '',
                btnText: 'বিস্তারিত দেখুন',
                btnLink: p.link || '#'
                }));
                
                apply({
                    sectionTitle: 'প্রকল্প',
                    sectionSubtitle: 'আমাদের আরো প্রকল্পসমূহ দেখুন',
                    projects: projectsData
                });
                
                apply({
                    sectionTitle: 'প্রকল্প',
                    sectionSubtitle: 'আমাদের আরো প্রকল্পসমূহ দেখুন',
                    projects: projectsData
                });
            } else {
                applyDefaults();
            }
    }

    function apply(data){
        const s = { ...defaults, ...data };

        if (el.title) el.title.textContent = s.sectionTitle;
        if (el.subtitle) el.subtitle.textContent = s.sectionSubtitle;

        s.projects.forEach((p, i) => {
            if (el.cards[i]) {
                el.cards[i].innerHTML = `
                    <div class="project-image">${p.image}</div>
                    <div class="project-content">
                        <h3>${p.title}</h3>
                        <p>${p.desc}</p>
                        <a href="${p.btnLink}" class="btn btn-primary" style="padding: 0.8rem 2rem; font-size: 1rem;">${p.btnText}</a>
                    </div>
                `;
            }
        });
    }

    function applyDefaults(){
        apply(defaults);
    }

    // Load from API on page load
    loadFromAPI();
    
    // Automatic reload disabled - project data only loads on page load or manual refresh
    // setInterval(loadFromAPI, 5000);
})();
</script>

