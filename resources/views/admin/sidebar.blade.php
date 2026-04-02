<aside class="sidebar" id="sidebar">
    @php $sidebarHeader = \App\Models\HeaderSetting::first(); @endphp
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; display: inline-block; cursor: pointer;"
            title="ড্যাশবোর্ডে ফিরে যান">
            <img id="adminSidebarLogo" class="sidebar-logo"
                src="{{ $sidebarHeader?->logo_full_url ?? asset('images/Logo/jolchaya footer.png') }}"
                alt="{{ $sidebarHeader?->brand_text ?? 'Logo' }}"
                style="cursor: pointer;">
        </a>
        <button class="toggle-btn" onclick="toggleSidebar()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
    </div>

    <nav class="nav-menu" role="navigation" aria-label="Admin navigation">
        <div class="nav-item" data-tab="overview" onclick="showTab('overview')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
            </svg>
            <span>ওভারভিউ</span>
        </div>
        <div class="nav-item" data-tab="home" onclick="toggleHomeMenu()" role="button" tabindex="0"
            aria-expanded="false" aria-controls="homeSubmenu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            </svg>
            <span>হোম</span>
        </div>

        <div class="nav-submenu" id="homeSubmenu">
            <div class="nav-subitem" onclick="navigateTo('home','home-hero')">হিরো সেকশন</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-features')">আমাদের সুবিধা সমূহ</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-testimonials')">বিনিয়োগকারী মন্তব্য</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-social-carousel')">সোশ্যাল মিডিয়া</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-roadmap-content')">রোডম্যাপ কন্টেন্ট</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-info-section')">বিস্তারিত তথ্য</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-discount-offers')">ডিসকাউন্ট অফার</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-visit-booking')">ভিজিট বুকিং</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-gallery-content')">গ্যালারি ম্যানেজমেন্ট</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-videos-content')">ভিডিও সেকশন</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-price-list')">মূল্য তালিকা</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-partners')">পার্টনারসমূহ</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-why-choose')">কেন জলছায়া</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-faq')">FAQ ম্যানেজমেন্ট</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-events')">ইভেন্ট ম্যানেজমেন্ট</div>
            <div class="nav-subitem" onclick="navigateTo('home','home-contact')">যোগাযোগ করুন</div>
        </div>


        <div class="nav-item" data-tab="about" onclick="toggleAboutMenu()" role="button" tabindex="0"
            aria-expanded="false" aria-controls="aboutSubmenu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="7" r="4"></circle>
                <path d="M4 21c0-4 4-7 8-7s8 3 8 7"></path>
            </svg>
            <span>আমাদের সম্পর্কে</span>
        </div>
        <div class="nav-submenu" id="aboutSubmenu" role="group" aria-label="About submenu">
            <div class="nav-subitem" onclick="navigateTo('about','about-hero')">হিরো সেকশন</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-history')">আমাদের ইতিহাস</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-mission')">আমাদের মিশন</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-vision')">আমাদের ভিশন</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-board-members')">বোর্ড মেম্বার</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-chairman')">আমাদের চেয়ারম্যান</div>
            <div class="nav-subitem" onclick="navigateTo('about','about-other')">অন্যান্য সদস্য</div>
        </div>

        <div class="nav-item" data-tab="projects" onclick="toggleProjectsMenu()" role="button" tabindex="0"
            aria-expanded="false" aria-controls="projectsSubmenu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3h18v6H3zM3 15h18v6H3z"></path>
            </svg>
            <span>প্রকল্প</span>
        </div>
        <div class="nav-submenu" id="projectsSubmenu" role="group" aria-label="Projects submenu">
            <div class="nav-subitem" onclick="navigateTo('projects','projects-hero')">হিরো সেকশন</div>
            <div class="nav-subitem" onclick="navigateTo('projects','projects-slogan')">স্লোগান</div>
            <div class="nav-subitem" onclick="navigateTo('projects','projects-our')">আমাদের প্রজেক্টসমূহ</div>
        </div>

        <div class="nav-item" data-tab="bookings" onclick="showTab('bookings')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            <span>বুকিং</span>
        </div>

        <div class="nav-item" data-tab="registrations" onclick="showTab('registrations')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <span>প্লট রেজিস্ট্রেশন</span>
        </div>

        <div class="nav-item" data-tab="news" onclick="showTab('news')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                <path d="M7 8h5M7 12h10M7 16h10"></path>
            </svg>
            <span>নিউজ ম্যানেজমেন্ট</span>
        </div>

        <div class="nav-item" data-tab="header" onclick="showTab('header')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16v4H4zM4 10h16v10H4z"></path>
            </svg>
            <span>হেডার</span>
        </div>
        <div class="nav-item" data-tab="footer" onclick="showTab('footer')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 20h16v-4H4zM4 4h16v10H4z"></path>
            </svg>
            <span>ফুটার</span>
        </div>

        <div class="nav-item" data-tab="site-settings" onclick="showTab('site-settings')">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
            <span>সাইট সেটিংস</span>
        </div>



    </nav>

    <div class="logout-section">
        <button class="logout-btn" onclick="openLogoutModal()">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            <span>লগআউট</span>

        </button>
    </div>

    <!-- Hidden logout form -->
    <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>

    <div id="logoutConfirmOverlay"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9998;"></div>
    <div id="logoutConfirmModal"
        style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">
        <div
            style="background:#ffffff; width:90%; max-width:420px; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,0.25); overflow:hidden;">
            <div
                style="padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; gap:10px;">
                <div
                    style="width:36px; height:36px; border-radius:50%; background:#fee2e2; color:#b91c1c; display:flex; align-items:center; justify-content:center; font-weight:700;">
                    <i class="fas fa-exclamation"></i>
                </div>
                <div style="font-size:18px; font-weight:700; color:#0f172a;">লগআউট নিশ্চিতকরণ</div>
            </div>
            <div style="padding:18px 20px; color:#334155; font-size:15px; line-height:1.6;">
                আপনি কি সত্যিই লগআউট করতে চান?
            </div>
            <div
                style="padding:14px 16px; display:flex; gap:10px; justify-content:flex-end; background:#f8fafc; border-top:1px solid #eef2f7;">
                <button type="button" onclick="closeLogoutModal()"
                    style="padding:10px 16px; background:#e5e7eb; color:#111827; border:none; border-radius:8px; font-weight:600; cursor:pointer;">না</button>
                <button type="button" onclick="confirmLogoutYes()"
                    style="padding:10px 16px; background:#ef4444; color:#fff; border:none; border-radius:8px; font-weight:600; cursor:pointer;">হ্যাঁ</button>
            </div>
        </div>
    </div>

    <script>
        function openLogoutModal() {
            var ov = document.getElementById('logoutConfirmOverlay');
            var md = document.getElementById('logoutConfirmModal');
            if (ov) ov.style.display = 'block';
            if (md) md.style.display = 'flex';
        }

        function closeLogoutModal() {
            var ov = document.getElementById('logoutConfirmOverlay');
            var md = document.getElementById('logoutConfirmModal');
            if (ov) ov.style.display = 'none';
            if (md) md.style.display = 'none';
        }

        function confirmLogoutYes() {
            // Close the modal first, then proceed to logout
            closeLogoutModal();
            setTimeout(function () {
                document.getElementById('logoutForm').submit();
            }, 50);
        }

        // Close when clicking on overlay
        (function () {
            var ov = document.getElementById('logoutConfirmOverlay');
            if (ov) {
                ov.addEventListener('click', closeLogoutModal);
            }
            // Close on ESC key
            window.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeLogoutModal();
                }
            });
        })();
    </script>

    <script>
        (function () {
            function cancel(e) {
                if (e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
            // Intercept clicks on active nav items so they do nothing
            document.addEventListener('click', function (e) {
                var el = e.target && e.target.closest ? e.target.closest(
                    '.nav-item.active:not([onclick^="toggle"])') : null;
                if (el) {
                    cancel(e);
                }
            }, true);
            // Prevent keyboard activation (Enter/Space) on active items
            document.addEventListener('keydown', function (e) {
                if ((e.key === 'Enter' || e.key === ' ') && e.target && e.target.closest) {
                    var el = e.target.closest('.nav-item.active:not([onclick^="toggle"])');
                    if (el) {
                        cancel(e);
                    }
                }
            }, true);
        })();
    </script>

    <script>
        function navigateTo(section, tab) {
            // hide all tab contents
            document.querySelectorAll('.tab-content').forEach(div => div.style.display = 'none');

            // show the selected tab
            const el = document.getElementById(tab);
            if (el) {
                el.style.display = 'block';
            }

            // update active classes
            document.querySelectorAll('.nav-subitem').forEach(item => item.classList.remove('active'));
            const active = document.querySelector(`[onclick="navigateTo('${section}','${tab}')"]`);
            if (active) active.classList.add('active');
        }

        // external navigation (Laravel routes)
        function goto(url) {
            window.location.href = url;
        }

    </script>

</aside>