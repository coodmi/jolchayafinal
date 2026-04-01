@php
    $partnersSection = $projectSections['partners'] ?? null;
    $title = $partnersSection->title ?? '';
    $is_active = $partnersSection->is_active ?? true;

    $partners = collect();
    if ($is_active) {
        $partners = \App\Models\Partner::where('is_active', true)->orderBy('order')->get();
    }
@endphp

@if($is_active && $partners->count() > 0)
    <section class="partners-section" id="partners">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ $title }}</h2>
                <div class="section-title-underline"></div>
            </div>

            <div class="partners-wrapper">
                <div class="partners-flex">
                    @foreach($partners as $partner)
                        <div class="partner-card-wrapper">
                            @if($partner->website_url)
                                <a href="{{ $partner->website_url }}" target="_blank" class="partner-card" title="{{ $partner->name }}">
                            @else
                                <div class="partner-card">
                            @endif
                                <div class="partner-logo-container">
                                    @if($partner->logo_path)
                                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="partner-logo">
                                    @else
                                        <span class="partner-name-fallback">{{ $partner->name }}</span>
                                    @endif
                                </div>
                                <div class="partner-hover-accent"></div>
                            @if($partner->website_url)
                                </a>
                            @else
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <style>
            .partners-section {
                padding: 100px 0;
                background: radial-gradient(circle at top right, rgba(10, 54, 34, 0.03), transparent 40%),
                            radial-gradient(circle at bottom left, rgba(255, 215, 0, 0.03), transparent 40%),
                            #ffffff;
                position: relative;
                overflow: hidden;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            .section-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .section-title {
                font-size: clamp(1.8rem, 4vw, 2.5rem);
                font-weight: 700;
                color: #0a3622; /* Specific dark green */
                margin-bottom: 15px;
                display: inline-block;
                position: relative;
            }

            .section-title-underline {
                width: 100px;
                height: 4px;
                background: #0a3622;
                margin: 0 auto;
                border-radius: 2px;
            }

            .partners-flex {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 30px;
            }

            .partner-card-wrapper {
                flex: 0 1 250px;
            }

            .partner-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                border: 1px solid rgba(0, 0, 0, 0.04);
                border-radius: 20px;
                padding: 35px 25px;
                height: 100%;
                min-height: 160px;
                text-decoration: none;
                transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
                position: relative;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
                overflow: hidden;
            }

            .partner-card::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.8) 100%);
                z-index: 1;
            }

            .partner-logo-container {
                position: relative;
                z-index: 2;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.5s ease;
            }

            .partner-logo {
                max-width: 100%;
                max-height: 70px;
                object-fit: contain;
                opacity: 0.9;
                transition: all 0.4s ease;
            }

            .partner-name-fallback {
                font-size: 1.25rem;
                font-weight: 700;
                color: #334155;
                text-align: center;
            }

            .partner-hover-accent {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 4px;
                background: linear-gradient(90deg, #0a3622, #ffd700);
                transform: scaleX(0);
                transition: transform 0.4s ease;
                transform-origin: left;
                z-index: 3;
            }

            /* Hover Effects */
            .partner-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
                border-color: rgba(10, 54, 34, 0.1);
            }

            .partner-card:hover .partner-logo {
                opacity: 1;
                transform: scale(1.05);
            }

            .partner-card:hover .partner-hover-accent {
                transform: scaleX(1);
            }

            /* Responsive Adjustments */
            @media (max-width: 992px) {
                .partner-card-wrapper {
                    flex: 0 1 200px;
                }
                .partner-card {
                    padding: 25px 15px;
                    min-height: 140px;
                }
            }

            @media (max-width: 576px) {
                .partners-section {
                    padding: 60px 0;
                }
                .section-header {
                    margin-bottom: 40px;
                }
                .partner-card-wrapper {
                    flex: 0 1 calc(50% - 15px);
                }
                .partner-card {
                    padding: 20px 10px;
                    min-height: 120px;
                    border-radius: 15px;
                }
                .partner-logo {
                    max-height: 50px;
                }
            }
        </style>

    </section>
@endif

