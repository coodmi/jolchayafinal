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
            background-color: #fff;
        }

        .font-bengali {
            font-family: 'Hind Siliguri', sans-serif;
            color: var(--primary-green);
            letter-spacing: 0.5px;
        }


        /* --- GALLERY STYLES (New Addition) --- */
        .gallery-section {
            padding: 6rem 0;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .filter-btn {
            border: 2px solid transparent;
            background: rgba(13, 61, 41, 0.05);
            color: var(--text-light);
            padding: 10px 25px;
            border-radius: 30px;
            font-family: 'Hind Siliguri', sans-serif;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 5px 10px;
            cursor: pointer;
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary-green);
            color: white;
            box-shadow: 0 8px 20px -4px rgba(13, 61, 41, 0.3);
            transform: translateY(-2px);
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            height: 300px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            background-color: #eee; /* Loading placeholder color */
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
            background: linear-gradient(to top, rgba(13, 61, 41, 0.85), rgba(13, 61, 41, 0.1));
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 25px;
            transition: all 0.4s ease;
            transform: translateY(20px);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-icon {
            width: 45px;
            height: 45px;
            background: white;
            color: var(--primary-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            transform: scale(0);
            transition: transform 0.3s 0.1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .gallery-item:hover .gallery-icon {
            transform: scale(1);
        }

        /* .gallery-cat {
            color: var(--accent-green);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        } */

        .gallery-title {
            color: white;
            font-family: 'Hind Siliguri', sans-serif;
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }

        /* Modal Customization */
        .modal-content {
            border: none;
            border-radius: 15px;
            background-color: transparent;
            box-shadow: none;
        }
        .modal-body {
            padding: 0;
            position: relative;
        }
        .btn-close-custom {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            background: none;
            border: none;
            font-size: 2rem;
            opacity: 0.8;
            transition: opacity 0.3s;
            cursor: pointer;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }
        .btn-close-custom:hover { opacity: 1; transform: scale(1.1); }
    </style>


    <!-- SECTION 2: GALLERY (New Code) -->
    <section id="gallery" class="gallery-section">
        <div class="container position-relative z-1">

            <!-- Header -->
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h2 class="font-bengali display-5 fw-bold mb-3 mt-2" id="gallerySectionTitle">
                    প্রকল্পের এক ঝলক
                </h2>
                <p class="text-muted mb-4" id="gallerySectionSubtitle">ছবির মাধ্যমে ঘুরে দেখুন আপনার স্বপ্নের ঠিকানা</p>
            </div>

            <script>
                // Load section title and subtitle dynamically
                (async function() {
                    try {
                        const response = await fetch('/api/project-sections?section_key=gallery');
                        if (response.ok) {
                            const section = await response.json();
                            if (section) {
                                const titleEl = document.getElementById('gallerySectionTitle');
                                const subtitleEl = document.getElementById('gallerySectionSubtitle');
                                if (titleEl && section.title) {
                                    titleEl.textContent = section.title;
                                }
                                if (subtitleEl && section.subtitle) {
                                    subtitleEl.textContent = section.subtitle;
                                }
                            }
                        }
                    } catch (error) {
                        console.error('Error loading gallery section settings:', error);
                    }
                })();
            </script>

            <!-- Filter Buttons -->
            <div class="d-flex justify-content-center flex-wrap mb-5">
                <button class="filter-btn active" data-filter="all">সব ছবি</button>
                <button class="filter-btn" data-filter="exterior">এক্সটেরিয়র</button>
                <button class="filter-btn" data-filter="interior">ইন্টেরিয়র</button>
                <button class="filter-btn" data-filter="landscape">ল্যান্ডস্কেপ</button>
            </div>

            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                <!-- Gallery items will be loaded dynamically here -->
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">লোড হচ্ছে...</span>
                    </div>
                    <p class="mt-3 text-muted">গ্যালারি লোড হচ্ছে...</p>
                </div>
            </div>

            <!-- See More Button -->
            <div class="text-center mt-5 pt-3">
                <a href="{{ route('gallery') }}" class="btn btn-lg px-5 py-3" style="background: var(--primary-green); color: white; border-radius: 50px; font-family: 'Hind Siliguri', sans-serif; font-weight: 600; box-shadow: 0 10px 30px -5px rgba(13, 61, 41, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 40px -5px rgba(13, 61, 41, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px -5px rgba(13, 61, 41, 0.3)';">
                    <i class="fas fa-images me-2"></i>আরও ছবি দেখুন
                </a>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
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

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function() {
            let galleries = [];
            const galleryGrid = document.getElementById('galleryGrid');
            const filterBtns = document.querySelectorAll('.filter-btn');
            
            // Category labels
            const categoryLabels = {
                'exterior': 'এক্সটেরিয়র',
                'interior': 'ইন্টেরিয়র',
                'landscape': 'ল্যান্ডস্কেপ',
                'amenities': 'সুবিধাসমূহ'
            };

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

            // Load galleries from API
            async function loadGalleries() {
                try {
                    console.log('Loading galleries from API...');
                    const response = await fetch('/api/galleries', {
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
                    
                    galleries = await response.json();
                    console.log('Galleries loaded:', galleries);
                    
                    // Get active filter (default to 'all')
                    const activeFilter = document.querySelector('.filter-btn.active')?.getAttribute('data-filter') || 'all';
                    renderGalleries(activeFilter);
                    initFilters();
                } catch (error) {
                    console.error('Error loading galleries:', error);
                    if (galleryGrid) {
                        galleryGrid.innerHTML = `
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">গ্যালারি লোড করতে সমস্যা হয়েছে। অনুগ্রহ করে পৃষ্ঠাটি রিফ্রেশ করুন।</p>
                            </div>
                        `;
                    }
                }
            }

            // Render galleries - Limited to 6 items
            function renderGalleries(filterCategory = 'all') {
                if (!galleryGrid) return;
                
                if (!galleries || galleries.length === 0) {
                    galleryGrid.innerHTML = `
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">কোনো গ্যালারি আইটেম পাওয়া যায়নি।</p>
                        </div>
                    `;
                    return;
                }

                // Filter galleries by category
                let filteredGalleries = galleries;
                if (filterCategory !== 'all') {
                    filteredGalleries = galleries.filter(g => (g.category || 'exterior') === filterCategory);
                }

                // Limit to 6 items
                const limitedGalleries = filteredGalleries.slice(0, 6);

                galleryGrid.innerHTML = limitedGalleries.map((gallery, index) => {
                    const imageUrl = gallery.image_url || (gallery.image_path ? '/storage/' + gallery.image_path : '');
                    const escapedImageUrl = escapeAttr(imageUrl);
                    const escapedTitle = escapeHtml(gallery.title_bn || '');
                    const category = gallery.category || 'exterior';
                    
                    if (!imageUrl) return ''; // Skip if no image
                    
                    return `
                        <div class="col-md-6 col-lg-4 gallery-col" data-category="${category}">
                            <div class="gallery-item" onclick="openLightbox('${escapedImageUrl}')">
                                <img src="${escapedImageUrl}" alt="${escapedTitle}" loading="lazy" decoding="async" onerror="console.error('Image failed to load:', '${escapedImageUrl}'); this.style.display='none';">
                                <div class="gallery-overlay">
                                    <div class="gallery-icon"><i class="fas fa-expand-alt"></i></div>
                                    <h5 class="gallery-title">${escapedTitle}</h5>
                                </div>
                            </div>
                        </div>
                    `;
                }).filter(html => html).join('');
            }

            // Initialize filter functionality
            function initFilters() {
                filterBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        // Remove active class from all
                        filterBtns.forEach(b => b.classList.remove('active'));
                        // Add active to clicked
                        btn.classList.add('active');

                        const filterValue = btn.getAttribute('data-filter');
                        // Re-render galleries with filter (limited to 6 items)
                        renderGalleries(filterValue);
                    });
                });
            }

            // Lightbox Functionality
            const galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));
            const lightboxImage = document.getElementById('lightboxImage');

            window.openLightbox = function(imageSrc) {
                lightboxImage.src = imageSrc;
                galleryModal.show();
            };

            // Load galleries on page load
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(loadGalleries, 100);
                });
            } else {
                setTimeout(loadGalleries, 100);
            }
            
            // Automatic reload disabled - galleries only load on page load or manual refresh
            // setInterval(loadGalleries, 30000);
            
            // Listen for storage events to refresh galleries
            window.addEventListener('storage', function(e){
                try{
                    if (e && e.key === 'refreshGalleries') {
                        console.log('Storage event detected, refreshing galleries...');
                        loadGalleries();
                    }
                }catch(err){ 
                    console.error('Storage event error:', err);
                }
            });
            
            // Also listen for custom events
            window.addEventListener('galleriesUpdated', function() {
                console.log('Custom event detected, refreshing galleries...');
                loadGalleries();
            });
        })();
    </script>


