@php
    $infoSection = $projectSections['info_section'] ?? null;
    $title = $infoSection->title ?? null;
    $content = $infoSection->content ?? null;
    $image = $infoSection->image_url ?? asset('assets/images/realstate3.PNG');
    $is_active = $infoSection->is_active ?? false;

    // Dynamic Extra Data from Dashboard
    $extra = $infoSection->extra_data ?? [];
    $trustBadge = $extra['trust_badge'] ?? 'Trusted by Industry Leaders';
    $btn1Text = $extra['btn1_text'] ?? 'আরও বিস্তারিত';
    $btn2Text = $extra['btn2_text'] ?? 'প্রকল্পসমূহ';
    $card1Label = $extra['card1_label'] ?? 'Growth Analytics';
    $card1Value = $extra['card1_value'] ?? '+124% leads';
    $card2Label = $extra['card2_label'] ?? 'Customer Choice';
    $card3Label = $extra['card3_label'] ?? 'Unlock Modern Living';
@endphp

@if($is_active && ($title || $content))
    <style>
        .info-section {
            padding: 120px 0;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .info-content {
            position: relative;
            z-index: 1;
            padding-right: 40px;
        }

        .info-trust-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: #f1f5f9;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 24px;
        }

        .info-trust-badge i {
            color: #fbbf24;
        }

        .info-title {
            font-size: clamp(1.75rem, 4vw, 3.1rem);
            font-weight: 800;
            color: #000000;
            line-height: 1.1;
            margin-bottom: 30px;
            letter-spacing: -1px;
        }

        .info-long-desc {
            font-size: clamp(0.95rem, 1.8vw, 1.15rem);
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 40px;
            max-width: 90%;
        }

        .info-btns {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-sparrow-dark {
            background: #000000;
            color: #ffffff;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-sparrow-light {
            background: #f1f5f9;
            color: #000000;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-sparrow-dark:hover {
            background: #333333;
            color: white;
            transform: translateY(-2px);
        }

        .btn-sparrow-light:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        /* Image Column Styling */
        .info-image-side {
            position: relative;
            padding: clamp(10px, 2vw, 20px);
        }

        .info-main-img-wrapper {
            position: relative;
            border-radius: clamp(20px, 4vw, 40px);
            overflow: hidden;
            aspect-ratio: 1 / 1.1;
            box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.1);
            max-height: 600px;
        }

        .info-main-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .info-main-img-wrapper:hover img {
            transform: scale(1.05);
        }

        /* Floating Elements */
        .floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: float-ui 6s ease-in-out infinite;
        }

        .card-1 {
            top: 15%;
            right: -10px;
            width: clamp(180px, 20vw, 220px);
            padding: 12px;
        }

        .card-2 {
            bottom: 20%;
            left: -20px;
            width: clamp(160px, 18vw, 200px);
        }

        .card-3 {
            bottom: 8%;
            left: 30px;
            background: none;
            box-shadow: none;
            color: white;
            backdrop-filter: none;
        }

        @keyframes float-ui {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @media (max-width: 991px) {
            .info-section {
                padding: 80px 0;
            }

            .info-title {
                font-size: clamp(1.5rem, 6vw, 2.5rem);
            }

            .info-main-img-wrapper {
                max-height: 450px;
            }

            .info-image-side {
                margin-top: 60px;
                padding: 0;
            }

            .info-content {
                padding-right: 0;
                text-align: center;
            }

            .info-long-desc {
                max-width: 100%;
                margin-inline: auto;
            }

            .info-btns {
                justify-content: center;
            }

            .card-1,
            .card-2 {
                display: none;
            }
        }
    </style>

    <section class="info-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="info-content">
                        <div class="info-trust-badge">
                            <i class="fas fa-star"></i>
                            <span>{{ $trustBadge }}</span>
                        </div>

                        @if ($title)
                            <h2 class="info-title">{{ $title }}</h2>
                        @endif

                        @if ($content)
                            <div class="info-long-desc">
                                {!! $content !!}
                            </div>
                        @endif

                        <div class="info-btns">
                            <a href="#contact" class="btn-sparrow-dark">{{ $btn1Text }}</a>
                            <a href="{{ route('projects') }}" class="btn-sparrow-light">{{ $btn2Text }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="info-image-side">
                        <div class="info-main-img-wrapper">
                            <img src="{{ $image }}" alt="{{ $title }}">
                        </div>

                        <!-- Floating Mockup Elements for Aesthetic -->
                        <div class="floating-card card-1">
                            <div
                                style="width:40px; height:40px; background:#fce7f3; border-radius:10px; display:flex; align-items:center; justify-content:center; color:#db2777;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <div style="font-size:12px; color:#94a3b8;">{{ $card1Label }}</div>
                                <div style="font-size:14px; font-weight:700; color:#0f172a;">{{ $card1Value }}</div>
                            </div>
                        </div>

                        <div class="floating-card card-2">
                            <div
                                style="width:40px; height:40px; background:#dcfce7; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#16a34a;">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div style="font-size:14px; font-weight:600; color:#0f172a;">{{ $card2Label }}</div>
                        </div>

                        <div class="card-3">
                            <div style="display:flex; align-items:center; gap:8px;">
                                <div
                                    style="width:30px; height:30px; background:white; border-radius:50%; display:flex; align-items:center; justify-content:center; color:black;">
                                    <i class="fas fa-bolt" style="font-size:12px;"></i>
                                </div>
                                <span
                                    style="font-weight:600; text-shadow: 0 2px 4px rgba(0,0,0,0.3); color: white;">{{ $card3Label }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif