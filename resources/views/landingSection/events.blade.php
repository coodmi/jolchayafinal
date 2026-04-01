<section id="events" class="events-section">
    <style>
        /* Section base styles - matching projects section */
        .events-section {
            padding: 80px 0;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .events-section .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #0d3d29;
            margin-bottom: 10px;
            font-family: 'Hind Siliguri', sans-serif;
        }

        .events-section .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 50px;
            font-family: 'Hind Siliguri', sans-serif;
        }

        /* Carousel styling matching projects */
        .events-section .carousel-wrapper {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 60px;
        }

        .events-section .carousel-container {
            overflow: hidden;
            padding: 20px 0;
            user-select: none;
        }

        .events-section .carousel-container.can-drag {
            cursor: grab;
        }

        .events-section .carousel-container.can-drag:active {
            cursor: grabbing;
        }

        .events-section .carousel-container.dragging {
            cursor: grabbing;
        }

        .events-section .carousel-container.dragging .event-card {
            pointer-events: none;
        }

        .events-section .carousel-track {
            display: flex;
            gap: 24px;
            transition: transform 500ms cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        .events-section .carousel-track.no-transition {
            transition: none;
        }

        .events-section .carousel-track.smooth-transition {
            transition: transform 600ms cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Modern card styles */
        .events-section .event-card {
            flex: 0 0 320px;
            min-width: 320px;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
        }

        .events-section .event-card::before {
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
            z-index: 5;
        }

        .events-section .event-card:hover::before {
            opacity: 1;
            animation: eventBorderRotate 3s linear infinite;
        }

        @keyframes eventBorderRotate {
            0% {
                background: linear-gradient(135deg, #0d3d29, #d4af37, #0d3d29);
            }

            100% {
                background: linear-gradient(135deg, #0d3d29, #d4af37, #0d3d29);
            }
        }

        .events-section .event-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(13, 61, 41, 0.15), 0 0 40px rgba(212, 175, 55, 0.1);
        }

        .events-section .event-image {
            width: 100%;
            height: 200px;
            background: #f0f4f2;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .events-section .event-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    transparent 30%,
                    rgba(212, 175, 55, 0.3) 50%,
                    transparent 70%);
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .events-section .event-card:hover .event-image::before {
            opacity: 1;
            animation: eventShimmer 2s ease-in-out infinite;
        }

        @keyframes eventShimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .events-section .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .events-section .event-card:hover .event-image img {
            transform: scale(1.1);
        }

        .events-section .event-date-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #0d3d29;
            color: #d4af37;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .events-section .event-content {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .events-section .event-card h3 {
            font-size: 18px;
            font-weight: 700;
            color: #0d3d29;
            margin-bottom: 8px;
            font-family: 'Hind Siliguri', sans-serif;
            transition: all 0.3s ease;
        }

        .events-section .event-card .event-card-subtitle {
            font-size: 14px;
            color: #64748b;
            font-family: 'Hind Siliguri', sans-serif;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }

        .events-section .event-card:hover .event-content h3 {
            animation: eventContentGlow 1.5s ease-in-out infinite;
            color: #0d6639;
            transform: translateX(4px);
        }

        @keyframes eventContentGlow {

            0%,
            100% {
                text-shadow: 0 0 5px rgba(13, 61, 41, 0);
            }

            50% {
                text-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
            }
        }

        .events-section .event-meta {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 13px;
            color: #64748b;
        }

        .events-section .meta-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .events-section .meta-item i {
            color: #d4af37;
            width: 14px;
        }

        .events-section .event-card p {
            font-size: 14px;
            line-height: 1.6;
            color: #64748b;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .events-section .event-btn {
            margin-top: auto;
            align-self: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #0d3d29 0%, #d4af37 50%, #0d3d29 100%);
            background-size: 200% 100%;
            background-position: 0% 0%;
            color: #ffffff;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(13, 61, 41, 0.2);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .events-section .event-btn:hover {
            background-position: 100% 0%;
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(13, 61, 41, 0.4), 0 0 15px rgba(212, 175, 55, 0.3);
            border-color: #d4af37;
        }

        /* Navigation elements */
        .events-section .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #ffffff;
            color: #0d3d29;
            border: 2px solid #eef2f7;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            z-index: 20;
        }

        .events-section .carousel-btn:hover {
            background: #0d3d29;
            color: #ffffff;
            border-color: #0d3d29;
            transform: translateY(-50%) scale(1.1);
        }

        .events-section .carousel-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .events-section .prev-btn {
            left: 0px;
        }

        .events-section .next-btn {
            right: 0px;
        }

        .events-section .slider-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .events-section .slider-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #cbd5e1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .events-section .slider-dot.active {
            background: #0d3d29;
            width: 25px;
            border-radius: 5px;
        }

        @media (max-width: 1024px) {
            .events-section .carousel-wrapper {
                padding: 0 50px;
            }

            .events-section .event-card {
                flex: 0 0 280px;
                min-width: 280px;
            }

            .events-section .carousel-btn {
                width: 45px;
                height: 45px;
            }
        }

        @media (max-width: 768px) {
            .events-section .carousel-wrapper {
                padding: 0 35px;
            }

            .events-section .event-card {
                flex: 0 0 calc(100% - 10px);
                min-width: 0;
            }

            .events-section .carousel-btn {
                display: none;
            }
        }

        /* Modal Styles */
        .event-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 20px;
        }

        .event-modal.active {
            display: flex;
            opacity: 1;
        }

        .event-modal-content {
            background: #ffffff;
            width: 100%;
            max-width: 900px;
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            transform: scale(0.9) translateY(30px);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            flex-direction: column;
            max-height: 90vh;
        }

        .event-modal.active .event-modal-content {
            transform: scale(1) translateY(0);
        }

        .event-modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            color: #0d3d29;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .event-modal-close:hover {
            background: #0d3d29;
            color: #ffffff;
            transform: rotate(90deg) scale(1.1);
        }

        .event-modal-body {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            height: 100%;
            overflow: hidden;
        }

        .event-modal-image {
            position: relative;
            height: 100%;
            min-height: 450px;
            background: #f0f4f2;
        }

        .event-modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .event-modal-info {
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            overflow-y: auto;
            background: #ffffff;
        }

        .event-modal-info h2 {
            font-size: 32px;
            color: #0d3d29;
            font-weight: 800;
            margin: 0;
            font-family: 'Hind Siliguri', sans-serif;
            line-height: 1.3;
        }

        .event-modal-subtitle {
            font-size: 18px;
            color: #64748b;
            font-family: 'Hind Siliguri', sans-serif;
            margin-top: -15px;
            font-weight: 500;
        }

        .event-modal-meta {
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .event-modal-meta-item {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #475569;
            font-size: 15px;
            font-weight: 500;
        }

        .event-modal-meta-item i {
            color: #d4af37;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 6px;
            font-size: 14px;
        }

        .event-modal-description {
            color: #64748b;
            line-height: 1.8;
            font-size: 16px;
            font-family: 'Hind Siliguri', sans-serif;
            white-space: pre-wrap;
        }

        .event-modal-footer {
            margin-top: auto;
            padding-top: 10px;
        }

        @media (max-width: 991px) {
            .event-modal-body {
                grid-template-columns: 1fr;
            }
            .event-modal-image {
                min-height: 300px;
                height: 300px;
            }
            .event-modal-info {
                padding: 30px;
            }
            .event-modal-content {
                max-width: 600px;
            }
        }

        @media (max-width: 576px) {
            .event-modal-info h2 {
                font-size: 24px;
            }
            .event-modal-info {
                padding: 20px;
            }
        }
    </style>

    <div class="container" style="max-width: 1400px; margin: 0 auto;">
        <h2 class="section-title" id="events-title"></h2>
        <p class="section-subtitle" id="events-subtitle"></p>

        <div class="carousel-wrapper">
            <button id="event-prevBtn" class="carousel-btn prev-btn">❮</button>
            <div id="event-carousel-container" class="carousel-container">
                <div id="event-track" class="carousel-track">
                    <!-- Events will be loaded here -->
                </div>
            </div>
            <button id="event-nextBtn" class="carousel-btn next-btn">❯</button>
        </div>

        <div id="event-slider-dots" class="slider-dots"></div>
    </div>

    <!-- Event Modal -->
    <div id="eventModal" class="event-modal">
        <div class="event-modal-content">
            <button class="event-modal-close" onclick="window.closeEventModal()">&times;</button>
            <div class="event-modal-body">
                <div class="event-modal-image" id="modalImage">
                    <!-- Image will be inserted here -->
                </div>
                <div class="event-modal-info">
                    <h2 id="modalTitle"></h2>
                    <p id="modalSubtitle" class="event-modal-subtitle"></p>
                    <div class="event-modal-meta">
                        <div class="event-modal-meta-item">
                            <i class="fas fa-calendar-day"></i>
                            <span id="modalDate"></span>
                        </div>
                        <div class="event-modal-meta-item">
                            <i class="far fa-clock"></i>
                            <span id="modalTime"></span>
                        </div>
                        <div class="event-modal-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span id="modalLocation"></span>
                        </div>
                    </div>
                    <div class="event-modal-description" id="modalDescription"></div>
                    <div class="event-modal-footer">
                        <a href="#contact" class="event-btn" onclick="window.closeEventModal()">যোগাযোগ করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Define modal functions globally first
    window.openEventModal = function (index) {
        if (typeof getEventsArray === 'function') {
            const events = getEventsArray();
            const event = events[index];
            if (!event) return;

            const modal = document.getElementById('eventModal');
            const dateObj = event.event_date ? new Date(event.event_date) : null;
            const formattedDate = dateObj ? dateObj.toLocaleDateString('bn-BD', { day: 'numeric', month: 'long', year: 'numeric' }) : 'তারিখ উল্লেখ নেই';

            document.getElementById('modalTitle').textContent = event.title || '';
            const subtitleEl = document.getElementById('modalSubtitle');
            if (event.subtitle) {
                subtitleEl.textContent = event.subtitle;
                subtitleEl.style.display = 'block';
            } else {
                subtitleEl.style.display = 'none';
            }
            
            document.getElementById('modalImage').innerHTML = event.image_path
                ? `<img src="/storage/${event.image_path}" alt="${event.title}">`
                : '<img src="/images/Ningbo-Green-Belt-05_.jpg" alt="Default Event">';

            document.getElementById('modalDate').textContent = formattedDate;
            document.getElementById('modalTime').textContent = event.event_time || 'সময় উল্লেখ নেই';
            document.getElementById('modalLocation').textContent = event.location || 'স্থান উল্লেখ নেই';
            
            const description = event.description || '';
            const descriptionEl = document.getElementById('modalDescription');
            if (description.includes('<') && description.includes('>')) {
                descriptionEl.innerHTML = description;
            } else {
                descriptionEl.textContent = description;
            }

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeEventModal = function () {
        const modal = document.getElementById('eventModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    (function () {
        let events = [];
        let currentIndex = 0;

        // Expose events to the global scope via a getter
        window.getEventsArray = () => events;

        // Drag state
        let isDragging = false;
        let startPos = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        let animationID = 0;

        const track = document.getElementById('event-track');
        const container = document.getElementById('event-carousel-container');
        const prevBtn = document.getElementById('event-prevBtn');
        const nextBtn = document.getElementById('event-nextBtn');
        const dotsContainer = document.getElementById('event-slider-dots');

        async function loadEventsData() {
            try {
                // Load Settings
                const settingsRes = await fetch('/api/project-sections?section_key=events');
                const settingsData = await settingsRes.json();
                const settings = Array.isArray(settingsData) ? settingsData.find(x => x.section_key === 'events') : settingsData;

                if (settings) {
                    if (!settings.is_active) {
                        document.getElementById('events').style.display = 'none';
                        return;
                    }
                    if (settings.title) document.getElementById('events-title').textContent = settings.title;
                    if (settings.subtitle) document.getElementById('events-subtitle').textContent = settings.subtitle;
                }

                // Load Items
                const res = await fetch('/api/events');
                const data = await res.json();
                events = Array.isArray(data) ? data : [];

                if (events.length === 0) {
                    document.getElementById('events').style.display = 'none';
                    return;
                }

                renderEventsUI();
                updateCarouselState();
                initDragFunctionality();
            } catch (error) {
                console.error('Error loading events:', error);
            }
        }

        function renderEventsUI() {
            track.innerHTML = events.map((event, index) => {
                return `
                    <div class="event-card" onclick="window.openEventModal(${index})">
                        <div class="event-image">
                            ${event.image_path ? `<img src="/storage/${event.image_path}" alt="${event.title}">` : '<img src="/images/Ningbo-Green-Belt-05_.jpg" alt="Default Event">'}
                        </div>
                        <div class="event-content">
                            <h3>${event.title}</h3>
                            <p class="event-card-subtitle">${event.subtitle || event.description || ''}</p>
                            <div class="event-btn" style="margin-top: 15px;">বিস্তারিত জানুন</div>
                        </div>
                    </div>
                `;
            }).join('');

            renderDots();
        }

        // Close on outside click
        window.addEventListener('click', (e) => {
            const modal = document.getElementById('eventModal');
            if (e.target === modal) {
                window.closeEventModal();
            }
        });

        function renderDots() {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = '';

            const visibleCount = getVisibleCount();
            const numDots = Math.max(1, events.length - (visibleCount - 1));

            if (events.length <= visibleCount) {
                dotsContainer.style.display = 'none';
                return;
            } else {
                dotsContainer.style.display = 'flex';
            }

            for (let i = 0; i < numDots; i++) {
                const dot = document.createElement('div');
                dot.className = `slider-dot ${i === currentIndex ? 'active' : ''}`;
                dot.onclick = () => {
                    currentIndex = i;
                    updateCarousel();
                };
                dotsContainer.appendChild(dot);
            }
        }

        function getVisibleCount() {
            if (window.innerWidth <= 768) return 1;
            if (window.innerWidth <= 1024) return 3;
            return 3; // Default 3 for large screens
        }

        function getCardStats() {
            const card = track.querySelector('.event-card');
            const cardWidth = card ? card.offsetWidth : 320;
            const gap = 24;
            return { cardWidth, gap };
        }

        function setSliderPosition() {
            track.style.transform = `translateX(${currentTranslate}px)`;
        }

        function setPositionByIndex() {
            const { cardWidth, gap } = getCardStats();
            currentTranslate = -currentIndex * (cardWidth + gap);
            prevTranslate = currentTranslate;
            setSliderPosition();
        }

        function updateCarouselState() {
            const visibleCount = getVisibleCount();
            const maxIndex = Math.max(0, events.length - visibleCount);

            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex >= maxIndex;

            if (events.length <= visibleCount) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'flex';
                nextBtn.style.display = 'flex';
            }

            // Update dots
            const dots = dotsContainer.querySelectorAll('.slider-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        function updateCarousel() {
            track.classList.add('smooth-transition');
            setPositionByIndex();
            updateCarouselState();

            setTimeout(() => {
                track.classList.remove('smooth-transition');
            }, 600);
        }

        // Drag Functionality
        function initDragFunctionality() {
            const visibleCount = getVisibleCount();
            if (events.length <= visibleCount) {
                container.classList.remove('can-drag');
                return;
            }

            container.classList.add('can-drag');

            container.addEventListener('mousedown', dragStart);
            container.addEventListener('mousemove', drag);
            container.addEventListener('mouseup', dragEnd);
            container.addEventListener('mouseleave', dragEnd);

            container.addEventListener('touchstart', dragStart, { passive: true });
            container.addEventListener('touchmove', drag, { passive: true });
            container.addEventListener('touchend', dragEnd);

            container.addEventListener('contextmenu', e => e.preventDefault());
        }

        function dragStart(e) {
            const visibleCount = getVisibleCount();
            if (events.length <= visibleCount) return;

            isDragging = true;
            startPos = getPositionX(e);
            animationID = requestAnimationFrame(animation);
            track.classList.add('no-transition');
        }

        function drag(e) {
            if (isDragging) {
                const currentPosition = getPositionX(e);
                const diff = Math.abs(currentPosition - startPos);
                
                // Only add dragging class if moved more than 5px to allow clicks
                if (diff > 5) {
                    container.classList.add('dragging');
                }

                const { cardWidth, gap } = getCardStats();
                const visibleCount = getVisibleCount();

                const newTranslate = prevTranslate + currentPosition - startPos;

                // Boundaries
                const maxTranslate = 0;
                const minTranslate = -(events.length - visibleCount) * (cardWidth + gap);

                currentTranslate = Math.max(Math.min(newTranslate, maxTranslate + 50), minTranslate - 50);
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
            const visibleCount = getVisibleCount();

            if (movedBy < -100 && currentIndex < events.length - visibleCount) {
                currentIndex++;
            } else if (movedBy > 100 && currentIndex > 0) {
                currentIndex--;
            }

            setPositionByIndex();
            updateCarouselState();

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

        // Button events
        prevBtn.onclick = () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        };

        nextBtn.onclick = () => {
            const visibleCount = getVisibleCount();
            if (currentIndex < events.length - visibleCount) {
                currentIndex++;
                updateCarousel();
            }
        };

        window.addEventListener('resize', () => {
            renderDots();
            setPositionByIndex();
            updateCarouselState();
        });

        // Initialize
        loadEventsData();
    })();
</script>