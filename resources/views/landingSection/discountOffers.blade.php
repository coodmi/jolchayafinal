@php
    $offerSection = $projectSections['discount_offers'] ?? null;
    $title = $offerSection->title ?? '';
    $subtitle = $offerSection->subtitle ?? '';
    $is_active = $offerSection->is_active ?? true;
@endphp

@if($is_active && isset($discountOffers) && count($discountOffers) > 0)
    <style>
        :root {
            --bg-dark: #082116; /* Near black dark green */
            --accent-green: #10b981; /* Emeral green for highlights */
            --glass-bg: rgba(13, 61, 41, 0.7); /* Deep green glass */
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-muted: #94a3b8;
        }

        .discount-wrapper {
            background: radial-gradient(circle at top, #0d3d29 0%, #082116 100%);
            padding: clamp(60px, 10vw, 100px) 0;
            position: relative;
            overflow: hidden;
            color: #f8fafc;
        }

        /* Ambient Ornaments */
        .ambient-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }

        .glow-1 { top: -10%; left: -10%; }
        .glow-2 { bottom: -10%; right: -10%; }

        .discount-container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .discount-header {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 50px auto;
        }

        .discount-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
            line-height: 1.1;
            letter-spacing: -0.03em;
            background: linear-gradient(to bottom, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .discount-subtitle {
            font-size: clamp(0.95rem, 1.5vw, 1.15rem);
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* CTA bar like the image */
        .promo-cta-bar {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            padding: 6px 8px 6px 20px;
            border-radius: 100px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            box-shadow: 0 0 30px rgba(16, 185, 129, 0.15);
        }

        .promo-cta-bar input {
            background: transparent;
            border: none;
            color: white;
            font-size: 1rem;
            outline: none;
            width: 220px;
        }

        .promo-cta-btn {
            background: #ffffff;
            color: #020617;
            padding: 10px 24px;
            border-radius: 100px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .promo-cta-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-auto-rows: minmax(150px, auto);
            gap: 16px;
        }

        .bento-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .bento-card:hover {
            background: rgba(13, 61, 41, 0.85);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        }

        /* Bento Span Logic exactly like image */
        .bento-card:nth-child(1) { grid-column: span 4; grid-row: span 3; }
        .bento-card:nth-child(2) { grid-column: span 4; grid-row: span 1; }
        .bento-card:nth-child(3) { grid-column: span 4; grid-row: span 3; }
        .bento-card:nth-child(4) { grid-column: span 4; grid-row: span 2; }

        .card-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: var(--accent-green);
            border-radius: 100px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 24px;
            backdrop-filter: blur(4px);
            position: relative;
            z-index: 2;
        }

        .card-title {
            font-size: clamp(1.2rem, 2.5vw, 1.8rem);
            font-weight: 800;
            margin-bottom: 12px;
            line-height: 1.2;
            color: #ffffff;
            position: relative;
            z-index: 2;
        }

        .card-desc {
            font-size: 1.1rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
            max-width: 80%; /* Keep text from hitting the image too much */
        }

        /* Percentage indicator like image */
        .card-metric {
            font-size: 3.5rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -2px;
            margin-bottom: 8px;
            position: relative;
            z-index: 2;
        }

        .card-image-wrap {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 70%;
            height: 45%;
            opacity: 0.4;
            transition: all 0.5s ease;
            z-index: 1;
            /* Mask to prevent intersection with text */
            -webkit-mask-image: linear-gradient(to top left, black 40%, transparent 90%);
            mask-image: linear-gradient(to top left, black 40%, transparent 90%);
        }

        .bento-card:hover .card-image-wrap {
            opacity: 0.7;
            transform: scale(1.1) rotate(-5deg);
        }

        .card-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: bottom right;
        }

        /* Decorative Grid Pattern */
        .card-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.3;
            z-index: 0;
        }

        /* Modal Styles */
        .offer-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(2, 6, 23, 0.8);
            backdrop-filter: blur(12px);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .offer-modal {
            background: #082116;
            border: 1px solid var(--glass-border);
            border-radius: 32px;
            max-width: 500px;
            width: 100%;
            padding: 48px;
            text-align: center;
            position: relative;
        }

        .offer-modal h3 {
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .offer-modal p {
            color: var(--text-muted);
            margin-bottom: 32px;
            line-height: 1.6;
            font-size: 1.1rem;
        }

        .modal-btn {
            padding: 16px 32px;
            border-radius: 100px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 1rem;
        }

        .btn-confirm { background: #ffffff; color: #020617; }
        .btn-confirm:hover { transform: scale(1.05); }
        .btn-cancel { background: transparent; color: #94a3b8; border: 1px solid rgba(148, 163, 184, 0.2); }

        @media (max-width: 1024px) {
            .bento-grid { grid-template-columns: repeat(2, 1fr); }
            .bento-card { grid-column: span 1 !important; grid-row: span 1 !important; }
        }

        @media (max-width: 768px) {
            .bento-grid { grid-template-columns: 1fr; }
            .promo-cta-bar { display: none; }
        }
    </style>

    <section id="offers" class="discount-wrapper">
        <div class="ambient-glow glow-1"></div>
        <div class="ambient-glow glow-2"></div>

        <div class="discount-container">
            <div class="discount-header">
                <h2 class="discount-title">{{ $title }}</h2>
                <p class="discount-subtitle">{{ $subtitle }}</p>
            </div>

            <div class="bento-grid">
                @foreach($discountOffers->take(4) as $index => $offer)
                    <div class="bento-card"
                        onclick="openOfferModal('{{ addslashes($offer->title) }}', '{{ $offer->link ?? '#contact' }}')">
                        <div class="card-pattern"></div>
                        
                        <div style="position: relative; z-index: 2;">
                            @if($offer->badge)
                                <span class="card-badge">{{ $offer->badge }}</span>
                            @endif

                            @if($offer->metric)
                                <div class="card-metric">{{ $offer->metric }}</div>
                            @endif

                            <h3 class="card-title">{{ $offer->title }}</h3>
                            <p class="card-desc">{{ $offer->description }}</p>

                            <div style="color: var(--accent-green); font-weight: 700; display: flex; align-items: center; gap: 8px;">
                                অফারটি গ্রহণ করুন <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>

                        @if($offer->image_url)
                            <div class="card-image-wrap">
                                <img src="{{ $offer->image_url }}" alt="{{ $offer->title }}">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Professional Modal -->
    <div class="offer-modal-overlay" id="offerModalOverlay">
        <div class="offer-modal">
            <div style="width: 80px; height: 80px; background: rgba(16, 185, 129, 0.1); color: var(--accent-green); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 28px; font-size: 32px;">
                <i class="fas fa-magic"></i>
            </div>
            <h3 id="modalTitle">অফারটি নিশ্চিত করুন</h3>
            <p id="modalDesc">আপনি কি এই বিশেষ অফারটি সম্পর্কে আরও বিস্তারিত জানতে চান? আমাদের প্রতিনিধি আপনার সাথে শীঘ্রই যোগাযোগ করবেন।</p>
            <div style="display: flex; gap: 16px; justify-content: center;">
                <button class="modal-btn btn-cancel" onclick="closeOfferModal()">ফিরে যান</button>
                <a href="#contact" id="modalConfirmLink" class="modal-btn btn-confirm" onclick="closeOfferModal()">হ্যাঁ, আমি আগ্রহী</a>
            </div>
        </div>
    </div>

    <script>
        function openOfferModal(title, link) {
            document.getElementById('modalTitle').textContent = title;
            let finalLink = link;
            if (finalLink.startsWith('#') && window.location.pathname !== '/') {
                finalLink = '/' + finalLink;
            }
            document.getElementById('modalConfirmLink').href = finalLink;
            document.getElementById('offerModalOverlay').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeOfferModal() {
            document.getElementById('offerModalOverlay').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        document.getElementById('offerModalOverlay').addEventListener('click', function (e) {
            if (e.target === this) closeOfferModal();
        });
    </script>
@endif