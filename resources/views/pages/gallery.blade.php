@extends('layouts')

@section('content')

    <style>
        :root {
            --primary-green: #0d3d29;
            --accent-green: #34d399;
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .font-bengali {
            font-family: 'Hind Siliguri', sans-serif;
            color: var(--primary-green);
            letter-spacing: 0.5px;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-green) 0%, #0d3d29 100%);
            padding: 80px 0 60px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .page-header h1 {
            color: white;
            font-family: 'Hind Siliguri', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Hind Siliguri', sans-serif;
        }

        .breadcrumb-item.active {
            color: white;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
            content: "›";
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb-item a:hover {
            color: white;
        }

        /* Filter Buttons */
        .filter-btn {
            border: 2px solid transparent;
            background: white;
            color: var(--text-light);
            padding: 12px 30px;
            border-radius: 50px;
            font-family: 'Hind Siliguri', sans-serif;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 8px 15px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary-green);
            color: white;
            box-shadow: 0 8px 25px -4px rgba(13, 61, 41, 0.4);
            transform: translateY(-3px);
        }

        /* Gallery Grid */
        .gallery-section {
            padding: 0 0 80px;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            height: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            background-color: #eee;
            transition: all 0.4s ease;
        }

        .gallery-item:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13, 61, 41, 0.9), rgba(13, 61, 41, 0));
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px;
            transition: all 0.4s ease;
            transform: translateY(20px);
        }

        .gallery-item:hover img {
            transform: scale(1.15);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-icon {
            width: 50px;
            height: 50px;
            background: white;
            color: var(--primary-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            transform: scale(0);
            transition: transform 0.3s 0.1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .gallery-item:hover .gallery-icon {
            transform: scale(1);
        }

        .gallery-cat {
            color: var(--accent-green);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 8px;
        }

        .gallery-title {
            color: white;
            font-family: 'Hind Siliguri', sans-serif;
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }

        /* Modal Customization */
        .modal-content {
            border: none;
            border-radius: 20px;
            background-color: transparent;
            box-shadow: none;
        }

        .modal-body {
            padding: 0;
            position: relative;
        }

        .btn-close-custom {
            position: absolute;
            top: -50px;
            right: 0;
            color: white;
            background: rgba(0,0,0,0.5);
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 1.5rem;
            opacity: 0.9;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-close-custom:hover {
            opacity: 1;
            transform: scale(1.1);
            background: rgba(0,0,0,0.7);
        }

        /* Animation for gallery items */
        .gallery-col {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation */
        .gallery-col:nth-child(1) { animation-delay: 0.1s; }
        .gallery-col:nth-child(2) { animation-delay: 0.2s; }
        .gallery-col:nth-child(3) { animation-delay: 0.3s; }
        .gallery-col:nth-child(4) { animation-delay: 0.4s; }
        .gallery-col:nth-child(5) { animation-delay: 0.5s; }
        .gallery-col:nth-child(6) { animation-delay: 0.6s; }
        .gallery-col:nth-child(7) { animation-delay: 0.7s; }
        .gallery-col:nth-child(8) { animation-delay: 0.8s; }
        .gallery-col:nth-child(9) { animation-delay: 0.9s; }

        /* Pagination Styles */
        .pagination {
            gap: 8px;
        }

        .pagination .page-link {
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            border-radius: 50px;
            padding: 10px 18px;
            font-family: 'Hind Siliguri', sans-serif;
            font-weight: 600;
            transition: all 0.3s ease;
            min-width: 45px;
            text-align: center;
        }

        .pagination .page-link:hover {
            background: var(--primary-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 61, 41, 0.3);
        }

        .pagination .page-item.active .page-link {
            background: var(--primary-green);
            color: white;
            border-color: var(--primary-green);
            box-shadow: 0 5px 15px rgba(13, 61, 41, 0.3);
        }

        .pagination .page-item.disabled .page-link {
            border-color: #d1d5db;
            color: #9ca3af;
        }
    </style>
{{-- </head>
<body> --}}

    <!-- Page Header -->
    <div class="page-header">
        <div class="container position-relative">
            <h1 class="text-center">ফটো গ্যালারি</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/">হোম</a></li>
                    <li class="breadcrumb-item active" aria-current="page">গ্যালারি</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">

            <!-- Filter Buttons -->
            <div class="d-flex justify-content-center flex-wrap mb-5">
                <button class="filter-btn active" data-filter="all">সব ছবি</button>
                <button class="filter-btn" data-filter="exterior">এক্সটেরিয়র</button>
                <button class="filter-btn" data-filter="interior">ইন্টেরিয়র</button>
                <button class="filter-btn" data-filter="amenities">সুবিধাসমূহ</button>
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4">

                @forelse($galleries ?? [] as $gallery)
                @php
                    $imagePath = filter_var($gallery->image, FILTER_VALIDATE_URL) 
                        ? $gallery->image 
                        : asset('storage/' . $gallery->image);
                    
                    $categoryLabels = [
                        'exterior' => 'Exterior',
                        'interior' => 'Interior',
                        'amenities' => 'Amenities'
                    ];
                @endphp
                
                <!-- Item {{ $loop->iteration }} ({{ ucfirst($gallery->category) }}) -->
                <div class="col-md-6 col-lg-4 gallery-col" data-category="{{ $gallery->category }}">
                    <div class="gallery-item" onclick="openLightbox('{{ $imagePath }}')">
                        <img src="{{ $imagePath }}" alt="{{ $gallery->title_bn }}">
                        <div class="gallery-overlay">
                            <div class="gallery-icon"><i class="fas fa-expand-alt"></i></div>
                            <span class="gallery-cat">{{ $categoryLabels[$gallery->category] ?? $gallery->category }}</span>
                            <h5 class="gallery-title">{{ $gallery->title_bn }}</h5>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Default Items if no galleries -->
                <div class="col-12">
                    <p class="text-center text-muted py-5">কোনো গ্যালারি আইটেম পাওয়া যায়নি। দয়া করে পরে আবার চেষ্টা করুন।</p>
                </div>
                @endforelse

            </div>

            <!-- Pagination -->
            @if($galleries->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $galleries->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent shadow-none border-0">
                <div class="modal-body position-relative">
                    <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <img src="" id="lightboxImage" class="img-fluid rounded-4 shadow-lg w-100" alt="Gallery Preview">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter Functionality
            const filterBtns = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-col');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active to clicked
                    btn.classList.add('active');

                    const filterValue = btn.getAttribute('data-filter');

                    galleryItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                            // Reset animation
                            item.style.opacity = '0';
                            item.style.transform = 'scale(0.9)';
                            // Trigger reflow
                            void item.offsetWidth;
                            // Add animation
                            item.animate([
                                { transform: 'scale(0.9)', opacity: 0 },
                                { transform: 'scale(1)', opacity: 1 }
                            ], { duration: 400, fill: 'forwards', easing: 'ease-out' });
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Lightbox Functionality
            const galleryModalElement = document.getElementById('galleryModal');
            const lightboxImage = document.getElementById('lightboxImage');
            let galleryModal;

            if (typeof bootstrap !== 'undefined' && galleryModalElement) {
                galleryModal = new bootstrap.Modal(galleryModalElement);
            }

            // Make openLightbox available globally
            window.openLightbox = function(imageSrc) {
                if (lightboxImage) {
                    lightboxImage.src = imageSrc;
                }
                if (galleryModal) {
                    galleryModal.show();
                } else if (typeof bootstrap !== 'undefined' && galleryModalElement) {
                    galleryModal = new bootstrap.Modal(galleryModalElement);
                    galleryModal.show();
                }
            };
        });
    </script>

@endsection
