
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-green: #0d3d29;
            --accent-green: #34d399;
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-bengali {
            font-family: 'Hind Siliguri', sans-serif;
            color: var(--primary-green);
            letter-spacing: 0.5px;
        }

        .amenities-section {
            background-color: #f8fafc;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }



        .amenity-card {
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            height: 100%;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            z-index: 1;
        }

        .amenity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(13, 61, 41, 0.15);
            border-color: rgba(52, 211, 153, 0.2);
        }

        .amenity-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 65%;
            overflow: hidden;
            border-radius: 24px 24px 0 0;
        }

        .amenity-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .amenity-card:hover .amenity-img-wrapper img {
            transform: scale(1.15);
        }

        .img-overlay-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.05) 0%, transparent 100%);
            z-index: 1;
        }

        .icon-badge {
            position: absolute;
            bottom: -20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            font-size: 1.2rem;
            z-index: 2;
            transition: transform 0.4s ease;
        }

        .amenity-card:hover .icon-badge {
            transform: scale(1.1) rotate(10deg);
            color: var(--accent-green);
        }

        .amenity-body {
            padding: 2rem 1.5rem 1.5rem;
            text-align: left;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .amenity-title {
            font-family: 'Hind Siliguri', sans-serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            position: relative;
            display: inline-block;
        }

        .amenity-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 40px;
            height: 3px;
            background: var(--accent-green);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .amenity-card:hover .amenity-title::after {
            width: 100%;
        }

        .amenity-desc {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-family: 'Hind Siliguri', sans-serif;
        }

        .learn-more-link {
            margin-top: auto;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary-green);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .learn-more-link i {
            transition: transform 0.3s ease;
        }

        .amenity-card:hover .learn-more-link {
            opacity: 1;
            gap: 10px;
        }

        .amenity-card:hover .learn-more-link i {
            transform: translateX(3px);
        }

        .section-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(13, 61, 41, 0.08);
            color: var(--primary-green);
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

    </style>


<section id="amenities" class="amenities-section">
    <div class="container">

        <!-- Header -->
        <div class="text-center mx-auto mb-5 pb-3" style="max-width: 700px;">
            <span class="section-badge">{{ $amenitySettings->section_badge ?? 'World Class Facilities' }}</span>
            @if($amenitySettings && $amenitySettings->section_subtitle)
                <p class="text-muted fs-5 font-bengali opacity-75">
                    {{ $amenitySettings->section_subtitle }}
                </p>
            @endif
        </div>

        <!-- Dynamic Grid -->
        <div class="row g-4">
            @foreach($amenities as $amenity)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="amenity-card">
                        <div class="amenity-img-wrapper">
                            @if(Str::startsWith($amenity->image, 'http'))
                                <img src="{{ $amenity->image }}" alt="{{ $amenity->title }}">
                            @else
                                <img src="{{ asset('storage/' . $amenity->image) }}" alt="{{ $amenity->title }}">
                            @endif
                            <div class="img-overlay-gradient"></div>
                        </div>
                        <div class="amenity-body">
                            <h5 class="amenity-title font-bengali">{{ $amenity->title }}</h5>
                            <p class="amenity-desc">{{ $amenity->short_description }}</p>
                            {{-- <a href="{{ $amenity->link ?? '#' }}" class="learn-more-link">
                                বিস্তারিত দেখুন <i class="fas fa-arrow-right"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


