@php
    $whySection = $projectSections['why_choose'] ?? null;
    $title = $whySection->title ?? '';
    $subtitle = $whySection->subtitle ?? 'আধুনিক নাগরিক জীবনের সব সুবিধা নিয়ে আমরা আছি আপনার পাশে।';
    $is_active = $whySection->is_active ?? true;

    if ($is_active) {
        $items = \App\Models\WhyChoose::where('is_active', true)->orderBy('order')->get();
    }
@endphp

@if($is_active && count($items) > 0)
    <style>
        #why-choose-section {
            padding: clamp(80px, 12vw, 140px) 0;
            background: #ffffff;
            position: relative;
            overflow: hidden;
            --primary-gradient: linear-gradient(135deg, #198754 0%, #0a3622 100%);
            --soft-green: rgba(25, 135, 84, 0.08);
        }

        /* Abstract Background Ornaments */
        .why-ornament {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            pointer-events: none;
            opacity: 0.5;
        }

        .why-ornament-1 {
            top: -10%;
            right: -5%;
            width: 500px;
            height: 500px;
            background: rgba(25, 135, 84, 0.12);
            animation: whyFloat 20s infinite alternate;
        }

        .why-ornament-2 {
            bottom: -15%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: rgba(10, 54, 34, 0.08);
            animation: whyFloat 25s infinite alternate-reverse;
        }

        @keyframes whyFloat {
            0% { transform: translate(0, 0) scale(1) rotate(0deg); }
            100% { transform: translate(50px, 100px) scale(1.1) rotate(15deg); }
        }

        .why-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5%;
            position: relative;
            z-index: 1;
        }

        .why-section-header {
            text-align: center;
            margin-bottom: clamp(60px, 8vw, 100px);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .why-section-header h2 {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            color: #0a3622; /* Updated to requested color */
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -0.5px;
            text-align: center;
        }

        .why-section-header p {
            font-size: clamp(0.95rem, 1.5vw, 1.2rem);
            color: #666; /* Matching project section-subtitle color */
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
            font-weight: 400;
            letter-spacing: 0.3px;
            text-align: center;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .why-card {
            position: relative;
            padding: 50px 40px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 32px;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.02);
            height: 100%;
        }

        .why-card:hover {
            transform: translateY(-15px);
            background: #ffffff;
            box-shadow: 0 40px 80px rgba(10, 54, 34, 0.08);
            border-color: rgba(25, 135, 84, 0.2);
        }

        /* Card Shine Effect */
        .why-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 32px;
            background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.1) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.8s ease;
            pointer-events: none;
        }

        .why-card:hover::after {
            transform: translateX(100%);
        }

        .why-icon-wrapper {
            width: 80px;
            height: 80px;
            margin-bottom: 32px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .why-icon-bg {
            position: absolute;
            inset: 0;
            background: var(--soft-green);
            border-radius: 22px;
            transition: all 0.5s ease;
            transform: rotate(-5deg);
        }

        .why-card:hover .why-icon-bg {
            background: var(--primary-gradient);
            transform: rotate(10deg) scale(1.1);
            border-radius: 24px;
        }

        .why-icon-wrapper i,
        .why-icon-wrapper img {
            font-size: 36px;
            color: #198754;
            position: relative;
            z-index: 2;
            transition: all 0.5s ease;
        }

        .why-card:hover .why-icon-wrapper i,
        .why-card:hover .why-icon-wrapper img {
            color: #ffffff;
            filter: brightness(0) invert(1);
            transform: scale(1.1);
        }

        .why-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #0a3622;
            margin-bottom: 20px;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .why-card:hover .why-title {
            color: #198754;
        }

        .why-description {
            font-size: 1.05rem;
            color: #64748b;
            line-height: 1.8;
            margin: 0;
        }

        /* Decorative line */
        .why-card::before {
            content: '';
            position: absolute;
            bottom: 40px;
            left: 40px;
            width: 30px;
            height: 3px;
            background: #198754;
            opacity: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: all 0.5s ease;
        }

        .why-card:hover::before {
            opacity: 1;
            transform: scaleX(1);
        }

        @media (max-width: 1024px) {
            .why-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .why-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .why-card {
                padding: 40px 30px;
            }
            #why-choose-section {
                padding: 80px 0;
            }
        }
    </style>

    <section id="why-choose-section">
        <!-- Abstract background elements -->
        <div class="why-ornament why-ornament-1"></div>
        <div class="why-ornament why-ornament-2"></div>

        <div class="why-container">
            <div class="why-section-header">
                <h2>{{ $title }}</h2>
                @if($subtitle)
                    <p>{{ $subtitle }}</p>
                @endif
            </div>

            <div class="why-grid">
                @foreach($items->take(6) as $item)
                    <div class="why-card">
                        <div class="why-icon-wrapper">
                            <div class="why-icon-bg"></div>
                            @if($item->icon_url)
                                <img src="{{ $item->icon_url }}" alt="{{ $item->title }}">
                            @else
                                <i class="fas fa-check-circle"></i>
                            @endif
                        </div>
                        <h3 class="why-title">{{ $item->title }}</h3>
                        <p class="why-description">{{ $item->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif