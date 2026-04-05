<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            @if(!empty($headerSettings->logo_full_url))
            <img src="{{ $headerSettings->logo_full_url }}"
                 alt="Logo" style="height:70px; width:auto; margin-right:12px;" loading="eager" decoding="async" />
            @endif
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation" id="mobileMenuToggle">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(!empty($headerSettings->home_label))<li class="nav-item"><a class="nav-link" href="/">{{ $headerSettings->home_label }}</a></li>@endif
                @if(!empty($headerSettings->about_label))<li class="nav-item"><a class="nav-link" href="/about">{{ $headerSettings->about_label }}</a></li>@endif
                @if(!empty($headerSettings->features_label))<li class="nav-item"><a class="nav-link" href="/#features">{{ $headerSettings->features_label }}</a></li>@endif
                @if(!empty($headerSettings->pricing_label))<li class="nav-item"><a class="nav-link" href="/#pricing">{{ $headerSettings->pricing_label }}</a></li>@endif
                @if(!empty($headerSettings->testimonials_label))<li class="nav-item"><a class="nav-link" href="/#testimonials">{{ $headerSettings->testimonials_label }}</a></li>@endif
                <li class="nav-item"><a class="nav-link" href="/gallery">গ্যালারি</a></li>
                @if(!empty($headerSettings->other_projects_label))<li class="nav-item"><a class="nav-link" href="/projects">{{ $headerSettings->other_projects_label }}</a></li>@endif
                <li class="nav-item"><a class="nav-link" href="/news">{{ $headerSettings->news_label ?? 'সংবাদ' }}</a></li>
                <li class="nav-item"><a class="nav-link" href="/#faq-section">প্রশ্নাবলী</a></li>
            </ul>

            <div class="nav-actions d-flex flex-column flex-lg-row align-items-center gap-2 gap-lg-3">
                @auth
                    <div class="dropdown" id="userDropdownWrapper">
                        <button class="btn btn-primary dropdown-toggle d-flex align-items-center" type="button"
                                id="userDropdown" aria-expanded="false" onclick="toggleUserDropdown(event)">
                            <i class="fas fa-user-circle me-2"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" id="userDropdownMenu">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user me-2"></i>প্রোফাইল</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.applications') }}"><i class="fas fa-file-alt me-2"></i>আবেদন সমূহ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger" style="background:none;border:none;width:100%;text-align:left;cursor:pointer;">
                                        <i class="fas fa-sign-out-alt me-2"></i>লগআউট
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
                <a href="{{ $headerSettings->cta_href ?? '#contact' }}" class="btn btn-warning btn-cta" id="navCta">
                    <i class="fas fa-calendar-check me-2"></i>
                    <span>{{ $headerSettings->cta_text ?? '' }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>
<script>
    (function () {
        // Wait for DOM to be ready
        function initMobileMenu() {
            const toggleButton = document.getElementById('mobileMenuToggle');
            const navbarCollapse = document.getElementById('navbarNav');

            if (!toggleButton || !navbarCollapse) {
                return;
            }

            // Handle toggle button click
            toggleButton.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Check current state
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                const isCurrentlyShowing = navbarCollapse.classList.contains('show');

                // Toggle the state
                if (isExpanded || isCurrentlyShowing) {
                    // Close the menu
                    this.setAttribute('aria-expanded', 'false');
                    navbarCollapse.classList.remove('show');
                    navbarCollapse.classList.remove('collapsing');
                } else {
                    // Open the menu
                    this.setAttribute('aria-expanded', 'true');
                    navbarCollapse.classList.add('show');
                }
            });

            // Close menu when clicking outside (only on mobile)
            function handleOutsideClick(event) {
                if (window.innerWidth > 991.98) return;

                const isClickInsideNav = navbarCollapse.contains(event.target);
                const isClickOnToggle = toggleButton.contains(event.target);

                if (!isClickInsideNav && !isClickOnToggle && navbarCollapse.classList.contains('show')) {
                    toggleButton.setAttribute('aria-expanded', 'false');
                    navbarCollapse.classList.remove('show');
                    navbarCollapse.classList.remove('collapsing');
                }
            }

            document.addEventListener('click', handleOutsideClick);

            // Close menu when clicking on a nav link (mobile only)
            const navLinks = navbarCollapse.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 991.98 && navbarCollapse.classList.contains('show')) {
                        toggleButton.setAttribute('aria-expanded', 'false');
                        navbarCollapse.classList.remove('show');
                        navbarCollapse.classList.remove('collapsing');
                    }
                });
            });
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initMobileMenu);
        } else {
            initMobileMenu();
        }
    })();

    // Handle CTA button click - redirect to home page contact section if on other pages
    (function () {
        function initCTAClick() {
            const ctaButton = document.getElementById('navCta');
            if (ctaButton) {
                ctaButton.addEventListener('click', function (e) {
                    // Get current page path
                    const currentPath = window.location.pathname;
                    const isHomePage = currentPath === '/' || currentPath === '/home' || currentPath === '';

                    if (isHomePage) {
                        // On home page - smooth scroll to contact section
                        const contactSection = document.getElementById('contact');
                        if (contactSection) {
                            e.preventDefault();
                            contactSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    } else {
                        // On other pages - redirect to home page with contact hash
                        e.preventDefault();
                        window.location.href = '/#contact';
                    }
                });
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCTAClick);
        } else {
            initCTAClick();
        }
    })();

    // Handle smooth scroll when landing on home page with #contact hash
    (function () {
        function scrollToContactOnLoad() {
            // Check if URL has #contact hash
            if (window.location.hash === '#contact') {
                // Wait a bit for page to load
                setTimeout(function () {
                    const contactSection = document.getElementById('contact');
                    if (contactSection) {
                        contactSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 100);
            }
        }

        // Run on page load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', scrollToContactOnLoad);
        } else {
            scrollToContactOnLoad();
        }

        // Also handle hash change (if user navigates with back/forward)
        window.addEventListener('hashchange', function () {
            if (window.location.hash === '#contact') {
                setTimeout(function () {
                    const contactSection = document.getElementById('contact');
                    if (contactSection) {
                        contactSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }, 100);
            }
        });
    })();

    // Simple user dropdown toggle function
    function toggleUserDropdown(event) {
        event.preventDefault();
        event.stopPropagation();
        
        const dropdown = document.getElementById('userDropdownMenu');
        const button = document.getElementById('userDropdown');
        
        if (dropdown && button) {
            const isShown = dropdown.classList.contains('show');
            
            if (isShown) {
                dropdown.classList.remove('show');
                button.setAttribute('aria-expanded', 'false');
            } else {
                dropdown.classList.add('show');
                button.setAttribute('aria-expanded', 'true');
            }
        }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdownMenu');
        const wrapper = document.getElementById('userDropdownWrapper');
        
        if (dropdown && wrapper && !wrapper.contains(event.target)) {
            dropdown.classList.remove('show');
            const button = document.getElementById('userDropdown');
            if (button) button.setAttribute('aria-expanded', 'false');
        }
    });

</script>

<!-- Booking Popup Modal (mobile) -->
<div id="bookingPopupOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:99999; align-items:flex-end; justify-content:center;">
    <div id="bookingPopupModal" style="background:#0d3d29; border-radius:20px 20px 0 0; width:100%; max-width:520px; max-height:90vh; overflow-y:auto; padding:24px 20px 32px; position:relative; animation:slideUpModal 0.3s ease;">
        <button id="bookingPopupClose" style="position:absolute; top:14px; right:16px; background:rgba(255,255,255,0.15); border:none; color:#fff; width:32px; height:32px; border-radius:50%; font-size:18px; cursor:pointer; display:flex; align-items:center; justify-content:center; line-height:1;">×</button>
        <h3 style="color:#ffd700; font-size:1.3rem; font-weight:700; margin:0 0 20px;">বুকিং তথ্য পাঠান</h3>
        <form id="popupBookingForm">
            <div id="popupFormFields"></div>
            <button type="submit" id="popupSubmitBtn" style="width:100%; padding:14px; background:linear-gradient(135deg,#ffd700,#ffea7a); color:#0f172a; border:none; border-radius:12px; font-size:1rem; font-weight:700; cursor:pointer; margin-top:8px;">পাঠান</button>
        </form>
    </div>
</div>

<style>
@keyframes slideUpModal {
    from { transform: translateY(100%); opacity: 0; }
    to   { transform: translateY(0);    opacity: 1; }
}
#bookingPopupOverlay { display: none; }
#bookingPopupOverlay.active { display: flex !important; }
#bookingPopupModal .popup-form-group { margin-bottom: 14px; }
#bookingPopupModal .popup-form-group label { display:block; color:rgba(255,255,255,0.85); font-size:0.88rem; margin-bottom:5px; }
#bookingPopupModal .popup-form-group input,
#bookingPopupModal .popup-form-group textarea {
    width:100%; padding:11px 14px; border-radius:8px;
    border:1px solid rgba(255,255,255,0.2); background:rgba(255,255,255,0.08);
    color:#fff; font-size:0.95rem; box-sizing:border-box;
}
#bookingPopupModal .popup-form-group input::placeholder,
#bookingPopupModal .popup-form-group textarea::placeholder { color:rgba(255,255,255,0.4); }
#bookingPopupModal .popup-form-group textarea { min-height:90px; resize:vertical; }
</style>

<script>
(function () {
    const overlay  = document.getElementById('bookingPopupOverlay');
    const closeBtn = document.getElementById('bookingPopupClose');
    const navCta   = document.getElementById('navCta');
    const fieldsWrap = document.getElementById('popupFormFields');
    const form     = document.getElementById('popupBookingForm');
    const submitBtn = document.getElementById('popupSubmitBtn');

    // Only intercept on mobile (≤768px)
    function isMobile() { return window.innerWidth <= 768; }

    function openPopup() {
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        loadPopupFields();
    }

    function closePopup() {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    navCta && navCta.addEventListener('click', function (e) {
        if (!isMobile()) return; // desktop: normal link behaviour
        e.preventDefault();
        openPopup();
    });

    closeBtn && closeBtn.addEventListener('click', closePopup);
    overlay && overlay.addEventListener('click', function (e) {
        if (e.target === overlay) closePopup();
    });

    // Load form fields from API (same as main contact form)
    async function loadPopupFields() {
        if (!fieldsWrap) return;
        if (fieldsWrap.dataset.loaded) return; // already loaded
        try {
            const res = await fetch('/api/contact-form-fields');
            const fields = await res.json();
            if (!fields || !fields.length) { renderDefaultPopupFields(); return; }
            fieldsWrap.innerHTML = '';
            fields.forEach((field, i) => {
                const g = document.createElement('div');
                g.className = 'popup-form-group';
                const lbl = document.createElement('label');
                lbl.textContent = field.label;
                g.appendChild(lbl);
                const isLast = i === fields.length - 1;
                let inp;
                if (isLast || (field.type === 'textarea' && i > 0)) {
                    inp = document.createElement('textarea');
                    if (isLast) inp.style.minHeight = '90px';
                } else {
                    inp = document.createElement('input');
                    inp.type = i === 0 ? 'text' : field.type;
                }
                inp.placeholder = field.placeholder || '';
                if (field.required) inp.required = true;
                g.appendChild(inp);
                fieldsWrap.appendChild(g);
            });
            fieldsWrap.dataset.loaded = '1';
        } catch (e) {
            renderDefaultPopupFields();
        }
    }

    function renderDefaultPopupFields() {
        fieldsWrap.innerHTML = `
            <div class="popup-form-group"><label>নাম</label><input type="text" placeholder="আপনার নাম লিখুন" required></div>
            <div class="popup-form-group"><label>ফোন নম্বর</label><input type="tel" placeholder="আপনার ফোন নম্বর" required></div>
            <div class="popup-form-group"><label>ইমেইল</label><input type="email" placeholder="আপনার ইমেইল ঠিকানা" required></div>
            <div class="popup-form-group"><label>আপনি কতটি শেয়ার কিনতে চাচ্ছেন</label><input type="text" placeholder="৩/২/৫/৮/১০"></div>
            <div class="popup-form-group"><label>বার্তা</label><textarea placeholder="আপনার প্রশ্ন বা মন্তব্য"></textarea></div>
        `;
        fieldsWrap.dataset.loaded = '1';
    }

    // Submit
    form && form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const orig = submitBtn.textContent;
        submitBtn.textContent = 'পাঠানো হচ্ছে...';
        submitBtn.disabled = true;

        const formData = {};
        form.querySelectorAll('input, textarea').forEach(inp => {
            const lbl = inp.previousElementSibling?.textContent || '';
            if (lbl.includes('নাম') || lbl.toLowerCase().includes('name'))         formData.name      = inp.value;
            else if (lbl.includes('ফোন') || lbl.toLowerCase().includes('phone'))   formData.phone     = inp.value;
            else if (lbl.includes('ইমেইল') || lbl.toLowerCase().includes('email')) formData.email     = inp.value;
            else if (lbl.includes('প্লট') || lbl.toLowerCase().includes('plot'))   formData.plot_size = inp.value;
            else if (lbl.includes('বার্তা') || lbl.toLowerCase().includes('msg'))  formData.message   = inp.value;
        });

        try {
            const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
            const res = await fetch('/api/bookings', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                body: JSON.stringify(formData)
            });
            const result = await res.json();
            if (result.success) {
                form.reset();
                delete fieldsWrap.dataset.loaded;
                closePopup();
                // Show success using the page's existing alert if available
                if (typeof showProfessionalAlert === 'function') {
                    showProfessionalAlert('আপনার বার্তা সফলভাবে পাঠানো হয়েছে। আমাদের টিম শীঘ্রই যোগাযোগ করবে।', 'success', '🎉 ধন্যবাদ!');
                } else {
                    alert('বার্তা পাঠানো হয়েছে! ধন্যবাদ।');
                }
            } else {
                throw new Error(result.message || 'ব্যর্থ হয়েছে');
            }
        } catch (err) {
            alert('ত্রুটি: ' + (err.message || 'আবার চেষ্টা করুন'));
        } finally {
            submitBtn.textContent = orig;
            submitBtn.disabled = false;
        }
    });
})();
</script>
