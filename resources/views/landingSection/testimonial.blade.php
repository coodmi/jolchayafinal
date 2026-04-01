   <section id="testimonials" class="testimonials">
        <style>
            /* Mobile Responsive Enhancements for Testimonials */
            @media (max-width: 768px) {
                #testimonials {
                    padding: 50px 0 !important;
                }

                .testimonials-title {
                    font-size: clamp(1.5rem, 5vw, 2rem) !important;
                    margin-bottom: 0.5rem !important;
                }

                .testimonials-subtitle {
                    font-size: clamp(0.9rem, 3vw, 1rem) !important;
                    padding: 0 1rem !important;
                    margin-bottom: 2rem !important;
                }

                .carousel-wrapper {
                    padding: 0 45px !important;
                }

                .testimonial-card {
                    padding: 1.75rem !important;
                    border-radius: 16px !important;
                    gap: 1.25rem !important;
                }

                .investor-avatar,
                .investor-avatar-image {
                    width: 70px !important;
                    height: 70px !important;
                }

                .investor-name {
                    font-size: 1.1rem !important;
                }

                .investor-title {
                    font-size: 0.85rem !important;
                }

                .quote-text {
                    font-size: 0.95rem !important;
                    line-height: 1.6 !important;
                }

                .testimonial-header .investor-name {
                    font-size: 1.1rem !important;
                }

                .testimonial-header .investor-title {
                    font-size: 0.85rem !important;
                }

                .carousel-btn {
                    width: 44px !important;
                    height: 44px !important;
                    font-size: 18px !important;
                }

                .carousel-dots {
                    margin-top: 1.5rem !important;
                    gap: 8px !important;
                }

                .carousel-dot {
                    width: 8px !important;
                    height: 8px !important;
                }

                .carousel-dot.active {
                    width: 24px !important;
                    height: 8px !important;
                }
            }

            @media (max-width: 480px) {
                #testimonials {
                    padding: 40px 0 !important;
                }

                .carousel-wrapper {
                    padding: 0 40px !important;
                }

                .testimonial-card {
                    padding: 1.5rem !important;
                    border-radius: 14px !important;
                    gap: 1rem !important;
                }

                .investor-meta {
                    padding-bottom: 1rem !important;
                    gap: 0.75rem !important;
                }

                .investor-avatar,
                .investor-avatar-image {
                    width: 60px !important;
                    height: 60px !important;
                }

                .investor-name {
                    font-size: 1rem !important;
                }

                .investor-title {
                    font-size: 0.8rem !important;
                }

                .quote-text {
                    font-size: 0.9rem !important;
                    line-height: 1.6 !important;
                }

                .testimonial-header {
                    margin-bottom: 1rem !important;
                    padding-bottom: 0.875rem !important;
                }

                .testimonial-header .investor-name {
                    font-size: 1rem !important;
                }

                .testimonial-header .investor-title {
                    font-size: 0.8rem !important;
                }

                .carousel-btn {
                    width: 40px !important;
                    height: 40px !important;
                    font-size: 16px !important;
                    top: auto !important;
                    bottom: -60px !important;
                }

                .carousel-btn.prev-btn {
                    left: 50% !important;
                    transform: translateX(-120%) translateY(-50%) !important;
                }

                .carousel-btn.next-btn {
                    right: 50% !important;
                    transform: translateX(120%) translateY(-50%) !important;
                }

                .carousel-dots {
                    margin-top: 50px !important;
                    padding: 8px 0 !important;
                    gap: 6px !important;
                }
            }

            @media (max-width: 360px) {
                #testimonials {
                    padding: 35px 0 !important;
                }

                .carousel-wrapper {
                    padding: 0 35px !important;
                }

                .testimonial-card {
                    padding: 1.25rem !important;
                }

                .investor-avatar,
                .investor-avatar-image {
                    width: 55px !important;
                    height: 55px !important;
                }

                .carousel-btn {
                    width: 36px !important;
                    height: 36px !important;
                    font-size: 14px !important;
                }
            }
        </style>
        <h2 id="testimonialsTitle" class="section-title testimonials-title"></h2>
        <p id="testimonialsSubtitle" class="section-subtitle testimonials-subtitle"></p>

        <script>
            // Load section title and subtitle dynamically
            (async function() {
                try {
                    const response = await fetch('/api/project-sections?section_key=testimonials');
                    if (response.ok) {
                        const section = await response.json();
                        if (section) {
                            const titleEl = document.getElementById('testimonialsTitle');
                            const subtitleEl = document.getElementById('testimonialsSubtitle');
                            if (titleEl && section.title) {
                                titleEl.textContent = section.title;
                            }
                            if (subtitleEl && section.subtitle) {
                                subtitleEl.textContent = section.subtitle;
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error loading testimonials section settings:', error);
                }
            })();
        </script>

        <div class="carousel-wrapper">
            <button style="z-index: 10;" id="prevTestimonialBtn" class="carousel-btn prev-btn">❮</button>
            <div class="carousel-container">
                <div id="testimonialTrack" class="carousel-track">
                    <!-- Testimonials will be loaded dynamically from database -->
                </div>
            </div>
            <button id="nextTestimonialBtn" class="carousel-btn next-btn">❯</button>
        </div>
        <div id="testimonialDots" class="carousel-dots"></div>

        <script>
            (function(){
                const track = document.getElementById('testimonialTrack');
                const prevBtn = document.getElementById('prevTestimonialBtn');
                const nextBtn = document.getElementById('nextTestimonialBtn');
                const dotsContainer = document.getElementById('testimonialDots');
                const carouselWrapper = document.querySelector('.carousel-wrapper');
                
                let currentIndex = 0;
                // Dynamic testimonials loaded via API
                let testimonials = [];
                let autoSlideInterval = null;
                let isDragging = false;
                let startPos = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;

                async function loadTestimonials() {
                    try {
                        console.log('Loading testimonials from API...');
                        const response = await fetch('/api/testimonials', {
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
                        
                        const allTestimonials = await response.json();
                        console.log('Testimonials loaded:', allTestimonials);
                        
                        // Filter to show only active testimonials on frontend
                        testimonials = Array.isArray(allTestimonials) 
                            ? allTestimonials.filter(t => t && (t.is_active === true || t.is_active === 1 || t.is_active === '1'))
                            : [];
                        
                        console.log('Active testimonials:', testimonials);
                        
                        renderTestimonials();
                        
                        // Only initialize carousel if we have testimonials
                        if (testimonials.length > 0) {
                            initCarousel();
                        }
                    } catch (error) {
                        console.error('Error loading testimonials:', error);
                        if (track) {
                            track.innerHTML = '<div class="testimonial-card"><p style="text-align:center; padding:2rem; color:#ef4444;">মন্তব্য লোড করতে সমস্যা হয়েছে। অনুগ্রহ করে পৃষ্ঠাটি রিফ্রেশ করুন।</p></div>';
                        }
                    }
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

                function renderTestimonials() {
                    if (!track) {
                        console.error('Testimonial track element not found');
                        return;
                    }
                    
                    // Clear existing content
                    track.innerHTML = '';
                    
                    if (!testimonials || testimonials.length === 0) {
                        track.innerHTML = '<div class="testimonial-card"><p style="text-align:center; padding:2rem;">কোন মন্তব্য পাওয়া যায়নি</p></div>';
                        renderDots();
                        return;
                    }

                    // Filter out invalid testimonials
                    const validTestimonials = testimonials.filter(t => {
                        return t && (t.name || t.quote);
                    });

                    if (validTestimonials.length === 0) {
                        track.innerHTML = '<div class="testimonial-card"><p style="text-align:center; padding:2rem;">কোন মন্তব্য পাওয়া যায়নি</p></div>';
                        renderDots();
                        return;
                    }

                    validTestimonials.forEach((testimonial, index) => {
                        try {
                            const card = document.createElement('div');
                            card.className = 'testimonial-card';
                            card.dataset.testimonialIndex = index;
                            
                            // Safely get values with defaults
                            const name = escapeHtml(testimonial.name || '');
                            const title = escapeHtml(testimonial.title || '');
                            const quote = escapeHtml(testimonial.quote || '');
                            let imageUrl = testimonial.image_url ? String(testimonial.image_url) : '';
                            
                            // Fix image URL - remove any incorrect localhost paths
                            if (imageUrl) {
                                // Remove http://localhost/8000 or similar incorrect base URLs
                                imageUrl = imageUrl.replace(/^https?:\/\/[^\/]+/, '');
                                
                                // Ensure it starts with / if it's a relative path
                                if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                                    imageUrl = '/' + imageUrl;
                                }
                                
                                // If image_url is null/empty, try image_path as fallback
                                if (!imageUrl && testimonial.image_path) {
                                    let imgPath = String(testimonial.image_path);
                                    if (!imgPath.startsWith('http') && !imgPath.startsWith('/')) {
                                        imgPath = '/storage/' + imgPath;
                                    } else if (imgPath.startsWith('storage/')) {
                                        imgPath = '/' + imgPath;
                                    }
                                    imageUrl = imgPath;
                                }
                            } else if (testimonial.image_path) {
                                // Fallback to image_path if image_url is not set
                                let imgPath = String(testimonial.image_path);
                                if (!imgPath.startsWith('http') && !imgPath.startsWith('/')) {
                                    imgPath = '/storage/' + imgPath;
                                } else if (imgPath.startsWith('storage/')) {
                                    imgPath = '/' + imgPath;
                                }
                                imageUrl = imgPath;
                            }
                            
                            const escapedImageUrl = imageUrl ? escapeAttr(imageUrl) : '';
                            
                            // Only show avatar section if image exists
                            let investorMetaHtml = '';
                            if (escapedImageUrl) {
                                investorMetaHtml = `
                                    <div class="investor-meta">
                                        <div class="investor-image-wrapper">
                                            <img src="${escapedImageUrl}" class="investor-avatar-image" alt="${name}" onerror="console.error('Image failed to load:', '${escapedImageUrl}'); this.style.display='none';" />
                                        </div>
                                        <div class="investor-info">
                                            <div class="investor-name">${name}</div>
                                            <div class="investor-title">${title}</div>
                                        </div>
                                    </div>
                                `;
                                card.classList.add('has-avatar');
                            } else {
                                card.classList.add('no-avatar');
                            }
                            
                            // Build the card HTML safely
                            const cardHtml = `
                                ${investorMetaHtml}
                                <div class="quote-content-wrapper">
                                    <div class="quote-icon">"</div>
                                    ${!imageUrl ? `
                                        <div class="testimonial-header">
                                            <div class="investor-name">${name}</div>
                                            <div class="investor-title">${title}</div>
                                        </div>
                                    ` : ''}
                                    <p class="quote-text">${quote}</p>
                                </div>
                            `;
                            
                            card.innerHTML = cardHtml;
                            track.appendChild(card);
                        } catch (error) {
                            console.error('Error rendering testimonial:', error, testimonial);
                        }
                    });
                    
                    renderDots();
                    
                    // Reinitialize carousel after rendering
                    if (validTestimonials.length > 0) {
                        currentIndex = 0;
                        updateCarousel(false);
                    }
                }

                function renderDots() {
                    if (!dotsContainer || testimonials.length <= 1) {
                        if (dotsContainer) dotsContainer.style.display = 'none';
                        return;
                    }
                    
                    dotsContainer.style.display = 'flex';
                    dotsContainer.innerHTML = '';
                    
                    testimonials.forEach((_, index) => {
                        const dot = document.createElement('button');
                        dot.className = 'carousel-dot' + (index === currentIndex ? ' active' : '');
                        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
                        dot.onclick = () => goToSlide(index);
                        dotsContainer.appendChild(dot);
                    });
                }

                function updateDots() {
                    if (!dotsContainer) return;
                    const dots = dotsContainer.querySelectorAll('.carousel-dot');
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }

                function updateCarousel(smooth = true) {
                    if (!track) return;
                    const cardWidth = track.querySelector('.testimonial-card')?.offsetWidth || 0;
                    const offset = -currentIndex * cardWidth;
                    
                    if (smooth) {
                        track.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                    } else {
                        track.style.transition = 'none';
                    }
                    
                    track.style.transform = `translateX(${offset}px)`;
                    updateDots();
                }

                function goToSlide(index) {
                    currentIndex = index;
                    updateCarousel();
                    resetAutoSlide();
                }

                function nextSlide() {
                    currentIndex = (currentIndex + 1) % testimonials.length;
                    updateCarousel();
                }

                function prevSlide() {
                    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                    updateCarousel();
                }

                function startAutoSlide() {
                    if (testimonials.length <= 1) return;
                    stopAutoSlide();
                    autoSlideInterval = setInterval(() => {
                        nextSlide();
                    }, 5000); // Auto-slide every 5 seconds
                }

                function stopAutoSlide() {
                    if (autoSlideInterval) {
                        clearInterval(autoSlideInterval);
                        autoSlideInterval = null;
                    }
                }

                function resetAutoSlide() {
                    stopAutoSlide();
                    startAutoSlide();
                }

                // Mouse drag functionality
                function getPositionX(event) {
                    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
                }

                function dragStart(event) {
                    if (testimonials.length <= 1) return;
                    isDragging = true;
                    startPos = getPositionX(event);
                    track.style.cursor = 'grabbing';
                    stopAutoSlide();
                }

                function dragMove(event) {
                    if (!isDragging) return;
                    event.preventDefault();
                    
                    const currentPosition = getPositionX(event);
                    const diff = currentPosition - startPos;
                    const cardWidth = track.querySelector('.testimonial-card')?.offsetWidth || 0;
                    const baseTranslate = -currentIndex * cardWidth;
                    
                    track.style.transition = 'none';
                    track.style.transform = `translateX(${baseTranslate + diff}px)`;
                }

                function dragEnd(event) {
                    if (!isDragging) return;
                    isDragging = false;
                    track.style.cursor = 'grab';
                    
                    const currentPosition = getPositionX(event);
                    const diff = currentPosition - startPos;
                    const threshold = 50; // Minimum drag distance to trigger slide
                    
                    if (Math.abs(diff) > threshold) {
                        if (diff > 0) {
                            prevSlide();
                        } else {
                            nextSlide();
                        }
                    } else {
                        updateCarousel();
                    }
                    
                    startAutoSlide();
                }

                function initCarousel() {
                    if (testimonials.length <= 1) {
                        if (prevBtn) prevBtn.style.display = 'none';
                        if (nextBtn) nextBtn.style.display = 'none';
                        if (dotsContainer) dotsContainer.style.display = 'none';
                        return;
                    }

                    if (prevBtn) prevBtn.style.display = 'block';
                    if (nextBtn) nextBtn.style.display = 'block';

                    if (prevBtn) {
                        prevBtn.onclick = () => {
                            prevSlide();
                            resetAutoSlide();
                        };
                    }

                    if (nextBtn) {
                        nextBtn.onclick = () => {
                            nextSlide();
                            resetAutoSlide();
                        };
                    }

                    // Mouse/Touch drag events
                    if (track) {
                        track.style.cursor = 'grab';
                        
                        // Mouse events
                        track.addEventListener('mousedown', dragStart);
                        track.addEventListener('mousemove', dragMove);
                        track.addEventListener('mouseup', dragEnd);
                        track.addEventListener('mouseleave', dragEnd);
                        
                        // Touch events
                        track.addEventListener('touchstart', dragStart, { passive: true });
                        track.addEventListener('touchmove', dragMove, { passive: false });
                        track.addEventListener('touchend', dragEnd);
                        
                        // Prevent default drag behavior
                        track.addEventListener('dragstart', (e) => e.preventDefault());
                    }

                    // Pause auto-slide on hover
                    if (carouselWrapper) {
                        carouselWrapper.addEventListener('mouseenter', stopAutoSlide);
                        carouselWrapper.addEventListener('mouseleave', startAutoSlide);
                    }

                    updateCarousel();
                    startAutoSlide();
                }

                // Wait for DOM to be fully ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(loadTestimonials, 100);
                    });
                } else {
                    setTimeout(loadTestimonials, 100);
                }
                
                // Automatic reload disabled - testimonials only load on page load or manual refresh
                // setInterval(loadTestimonials, 30000);
                
                document.addEventListener('visibilitychange', function() {
                    if (!document.hidden) {
                        loadTestimonials();
                        resetAutoSlide();
                    } else {
                        stopAutoSlide();
                    }
                });
                
                window.addEventListener('focus', () => {
                    loadTestimonials();
                    resetAutoSlide();
                });

                window.addEventListener('blur', stopAutoSlide);
            })();
        </script>

    </section>