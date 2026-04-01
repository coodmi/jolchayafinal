// Wait for DOM before executing to prevent blocking
(function () {
    'use strict';

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Optimized navbar background on scroll with throttling
    let ticking = false;
    let lastScrollY = 0;

    function updateNavbar() {
        const nav = document.querySelector(".custom-navbar");
        if (!nav) return;

        if (lastScrollY > 100) {
            nav.style.background = "rgba(13, 61, 41, 0.98)";
            nav.style.boxShadow = "0 5px 20px rgba(0,0,0,0.1)";
        } else {
            nav.style.background = "rgba(13, 61, 41, 0.95)";
            nav.style.boxShadow = "none";
        }
        ticking = false;
    }

    window.addEventListener("scroll", () => {
        lastScrollY = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(updateNavbar);
            ticking = true;
        }
    }, { passive: true });

    // Form submission handler removed from here as it was causing conflicts 
    // with page-specific form handlers (like the plot registration form).
    // Each page should handle its own form submission.

    function showNotification(message) {
        // Create a simple modal/notification box for feedback
        const notification = document.createElement("div");
        notification.style.position = "fixed";
        notification.style.top = "50%";
        notification.style.left = "50%";
        notification.style.transform = "translate(-50%, -50%)";
        notification.style.padding = "20px 40px";
        notification.style.backgroundColor = "#ffd700";
        notification.style.color = "#0d3d29";
        notification.style.borderRadius = "10px";
        notification.style.zIndex = "9999";
        notification.style.boxShadow = "0 5px 15px rgba(0,0,0,0.3)";
        notification.style.fontSize = "1.2rem";
        notification.style.opacity = "0";
        notification.style.transition = "opacity 0.5s ease-in-out";
        notification.textContent = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = "1";
        }, 10);

        setTimeout(() => {
            notification.style.opacity = "0";
            notification.addEventListener("transitionend", () => {
                notification.remove();
            });
        }, 3000);
    }

    // --- CAROUSEL LOGIC - Optimized ---
    // Refactored to handle multiple carousels with better performance
    function initCarousel(trackId, prevBtnId, nextBtnId) {
        const track = document.getElementById(trackId);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);

        if (!track || !prevBtn || !nextBtn) return;

        let currentIndex = 0;
        const cardCount = track.children.length;
        let autoSlideInterval;
        const isTestimonialTrack = trackId === "testimonialTrack";

        function getMoveUnit() {
            const card =
                track.querySelector(".project-card") ||
                track.querySelector(".testimonial-card");
            if (!card) return 0;
            const cardStyle = window.getComputedStyle(card);
            const width = card.offsetWidth;
            const margin = parseFloat(cardStyle.marginRight);
            return width + margin;
        }

        function updateCarousel() {
            const cardsPerView = isTestimonialTrack
                ? 1
                : window.innerWidth > 992
                    ? 3
                    : 1;

            const maxIndex = Math.max(0, cardCount - cardsPerView);

            if (currentIndex < 0) {
                currentIndex = maxIndex;
            } else if (currentIndex > maxIndex) {
                currentIndex = 0;
            }

            const moveUnit = getMoveUnit();
            // Use transform for better performance
            track.style.transform = `translate3d(-${currentIndex * moveUnit}px, 0, 0)`;

            if (maxIndex === 0) {
                prevBtn.style.opacity = "0";
                nextBtn.style.opacity = "0";
                prevBtn.style.pointerEvents = "none";
                nextBtn.style.pointerEvents = "none";
            } else {
                prevBtn.style.opacity = "1";
                nextBtn.style.opacity = "1";
                prevBtn.style.pointerEvents = "auto";
                nextBtn.style.pointerEvents = "auto";
            }
        }

        function nextSlide() {
            currentIndex++;
            updateCarousel();
        }

        function prevSlide() {
            currentIndex--;
            updateCarousel();
        }

        function startAutoSlide() {
            stopAutoSlide();
            autoSlideInterval = setInterval(nextSlide, 4000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Optimization: Use transform3d for hardware acceleration
        track.style.cssText += "transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); will-change: transform;";

        updateCarousel();

        nextBtn.onclick = nextSlide;
        prevBtn.onclick = prevSlide;

        const wrapper = track.closest(".carousel-wrapper");
        if (wrapper) {
            wrapper.addEventListener("mouseenter", stopAutoSlide);
            wrapper.addEventListener("mouseleave", startAutoSlide);
        }

        startAutoSlide();

        return {
            updateCarousel,
        };
    }

    let projectCarousel;
    let testimonialCarousel;

    function globalSetupCarousels() {
        // Initialize Other Projects Carousel
        projectCarousel = initCarousel("projectTrack", "prevBtn", "nextBtn");
        // Initialize Testimonials Carousel
        testimonialCarousel = initCarousel(
            "testimonialTrack",
            "prevTestimonialBtn",
            "nextTestimonialBtn"
        );
    }

    // INSTANT LOAD - Make sections visible without forcing reflow on every element
    function showAllSectionsImmediately() {
        const sections = document.querySelectorAll('section, .feature-card, .pricing-card, .contact-item, .project-card, .testimonial-card, .amenity-card, .video-card-item');
        sections.forEach(el => {
            el.style.opacity = '1';
            el.style.visibility = 'visible';
            el.style.transform = 'translateY(0)';
        });
    }

    showAllSectionsImmediately();

    // NO Intersection Observer - everything visible immediately

    // Setup the carousels after all resources (including styles) have loaded
    window.addEventListener("load", globalSetupCarousels);

    // Optimized resize handler with debouncing
    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            if (projectCarousel) projectCarousel.updateCarousel();
            if (testimonialCarousel) testimonialCarousel.updateCarousel();
        }, 150);
    }, { passive: true });

    // QR Code Scanner Functionality
    let html5QrcodeScanner;

    function startQRScanner() {
        const scannerContainer = document.getElementById("qr-reader");
        const resultContainer = document.getElementById("qr-reader-results");

        // Clear previous scanner
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear();
        }

        // Initialize scanner
        html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader",
            {
                fps: 10,
                qrbox: {
                    width: 150,
                    height: 150,
                },
            },
            false
        );

        html5QrcodeScanner.render(
            (decodedText, decodedResult) => {
                // Handle successful scan
                resultContainer.innerHTML = `
            <div style="background: #4CAF50; color: white; padding: 10px; border-radius: 5px; margin-top: 10px;">
                <strong>স্ক্যান সফল!</strong><br>
                ${decodedText}
            </div>
        `;

                // Stop scanner after successful scan
                html5QrcodeScanner.clear();

                // Optionally redirect or process the scanned data
                if (decodedText.startsWith("http")) {
                    setTimeout(() => {
                        window.open(decodedText, "_blank");
                    }, 2000);
                }
            },
            (errorMessage) => {
                // Handle scan error (optional)
            }
        );
    }

    // Event listener for scanner button
    const startScannerBtn = document.getElementById("startScanner");
    if (startScannerBtn) {
        startScannerBtn.addEventListener("click", function () {
            const resultContainer = document.getElementById("qr-reader-results");
            if (resultContainer) {
                resultContainer.innerHTML = ""; // Clear previous results
            }
            startQRScanner();
        });
    }

})(); // End of IIFE for better performance


