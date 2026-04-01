<style>
    /* Footer Responsive Styles */
    @media (max-width: 1199px) {
        .footer-section[style*="margin-left"] {
            margin-left: 0 !important;
        }
    }

    /* Payment Methods Professional Styling */
    .payment-methods-wrapper {
        margin-top: 1rem;
    }

    .payment-methods-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        max-width: 280px;
    }

    .payment-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: rgba(255, 215, 0, 0.12);
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
        border: 1.5px solid rgba(255, 215, 0, 0.25);
        transition: all 0.3s ease;
        cursor: pointer;
        text-align: center;
    }

    .payment-btn:hover {
        background: rgba(255, 215, 0, 0.2);
        border-color: rgba(255, 215, 0, 0.5);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.25);
    }

    .payment-btn i {
        color: #ffd700;
        font-size: 0.95rem;
    }

    @media (max-width: 1199px) {
        .payment-methods-grid {
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .payment-methods-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            max-width: 100%;
        }

        .payment-btn {
            font-size: 0.75rem;
            padding: 9px 10px;
            gap: 5px;
        }

        .payment-btn i {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 480px) {
        .payment-methods-grid {
            grid-template-columns: 1fr;
        }

        .payment-btn {
            font-size: 0.85rem;
            padding: 12px;
        }
    }

    /* Footer Concern Section - Modern Professional Styles */
    .footer-concern-section {
        width: 100%;
        max-width: 1200px;
        margin: 35px auto;
        padding: 15px auto;
        display: none;
        animation: fadeInUp 0.6s ease-out;
        text-align: center;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .concern-header {
        margin-bottom: 5px;
        text-align: center;
    }

    .concern-title {
        color: #ffffff;
        font-size: 0.8rem;
        margin-bottom: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: inline-block;
        position: relative;
    }

    .concern-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #ffd700 0%, #ffed4e 100%);
        border-radius: 2px;
        margin: 0 auto 20px;
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.4);
    }

    .concern-logos-container {
        display: flex;
        flex-wrap: wrap;
        /* gap: 10px; */
        /* gap: 500px; */
        gap: 20px;
        justify-content: center;
        align-items: center;
    }

    .concern-logo-link {
        display: inline-block;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .concern-logo-link:hover {
        transform: translateY(-8px);
    }

    .concern-logo-wrapper {
        position: relative;
        padding: 0;
        background: transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: visible;
        border: none;
        box-shadow: none;
    }

    .concern-logo-link:hover .concern-logo-wrapper {
        transform: scale(1.1);
    }

    .concern-logo-image {
        max-height: 30px;
        width: auto;
        max-width: 150px;
        display: block;
        transition: all 0.4s ease;
        filter: brightness(1) drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    }

    .concern-logo-link:hover .concern-logo-image {
        filter: brightness(1.2) drop-shadow(0 8px 16px rgba(255, 215, 0, 0.4));
    }

    /* Responsive Design for Concern Section */
    @media (max-width: 1199px) {
        .footer-concern-section {
            margin-top: 30px;
            padding-top: 25px;
        }

        .concern-logos-container {
            gap: 10px;
        }

        .concern-logo-image {
            max-height: 55px;
            max-width: 140px;
        }
    }

    @media (max-width: 768px) {
        .footer-concern-section {
            margin-top: 25px;
            padding-top: 20px;
        }

        .concern-title {
            font-size: 1rem;
        }

        .concern-divider {
            width: 50px;
            height: 2.5px;
            margin-bottom: 15px;
        }

        .concern-logos-container {
            gap: 10px;
        }

        .concern-logo-image {
            max-height: 50px;
            max-width: 130px;
        }
    }

    @media (max-width: 480px) {
        .footer-concern-section {
            margin-top: 20px;
            padding-top: 18px;
        }

        .concern-title {
            font-size: 0.95rem;
        }

        .concern-divider {
            width: 45px;
        }

        .concern-logos-container {
            gap: 10px;
        }

        .concern-logo-image {
            max-height: 45px;
            max-width: 120px;
        }
    }
</style>

<footer>
    <div class="footer-container">
        <div class="footer-section footer-col-1">
            <a href="/" style="text-decoration: none; display: inline-block;">
                <div class="footer-logo" id="footerLogoContainer" style="cursor: pointer;">
                    <i class="fas fa-home" id="footerLogoIcon" style="display: none;"></i>
                    <img id="footerLogoImage" src="" alt="Logo"
                        style="max-height: 60px; width: auto; display:none;" loading="lazy" decoding="async">
                </div>
            </a>
            <p id="footerDescription"></p>

            <div class="contact-info">
                <div class="contact-item" style="background-color: #ffd700">
                    <i class="fas fa-phone-alt" style="color: #0d3d29"></i>
                    <div class="phone-no" style="color: #0d3d29">
                        <strong style="color: #0d3d29">ফোন নম্বর</strong><br>
                        <span id="footerPhone1"></span><br>
                        <span id="footerPhone2"></span>
                    </div>
                </div>
                <div class="contact-item" style="background-color: #ffd700">
                    <i class="fas fa-envelope" style="color: #0d3d29"></i>
                    <div class="email" style="color: #0d3d29">
                        <strong style="color: #0d3d29">ইমেইল</strong><br>
                        <span id="footerEmail"></span>
                    </div>
                </div>
            </div>

            <div class="social-links" id="footerSocialLinks">
                <a href="#" id="footerFacebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" id="footerInstagram"><i class="fab fa-instagram"></i></a>
                <a href="#" id="footerTwitter"><i class="fab fa-twitter"></i></a>
                <a href="#" id="footerLinkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" id="footerYoutube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section footer-col-2">
            <h3>প্রকল্পের ঠিকানা</h3>
            <p id="footerProjectAddress"></p>

            <h3>যোগাযোগের ঠিকানা</h3>
            <p id="footerContactAddress"></p>

            <h3>পেমেন্ট মাধ্যম</h3>
            <div class="payment-methods-wrapper">
                <div class="payment-methods-grid">
                    <div class="payment-btn">
                        <i class="fas fa-mobile-alt"></i>
                        <span>বিকাশ</span>
                    </div>
                    <div class="payment-btn">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>নগদ</span>
                    </div>
                    <div class="payment-btn">
                        <i class="fas fa-university"></i>
                        <span>ব্যাংক ট্রান্সফার</span>
                    </div>
                    <div class="payment-btn">
                        <i class="fas fa-credit-card"></i>
                        <span>কার্ড</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-section footer-col-3">
            <h3>দ্রুত লিংক</h3>
            <ul class="footer-links" id="footerQuickLinks">
                <li><a href="#home"><i class="fas fa-chevron-right"></i> হোম</a></li>
                <li><a href="#features"><i class="fas fa-chevron-right"></i> সুবিধাসমূহ</a></li>
                <li><a href="#pricing"><i class="fas fa-chevron-right"></i> মূল্য তালিকা</a></li>
                <li><a href="#contact"><i class="fas fa-chevron-right"></i> যোগাযোগ</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> গ্যালারি</a></li>
            </ul>

            <h3>আইনি তথ্য</h3>
            <ul class="footer-links" id="footerLegalLinks">
                <li><a href="#"><i class="fas fa-chevron-right"></i> গোপনীয়তা নীতি</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> সেবার শর্তাবলী</a></li>
            </ul>

            <div id="footerDownloadsSection" style="display: none; margin-top: 20px;">
                <h3 style="margin-bottom: 15px;">প্রকল্পের কাগজপত্র</h3>
                <ul class="footer-links">
                    <li id="liBrochure" style="display: none;"><a id="linkBrochure" href="#" target="_blank"><i
                                class="fas fa-file-pdf"></i> ব্রোশিওর ডাউনলোড</a></li>
                    <li id="liMasterPlan" style="display: none;"><a id="linkMasterPlan" href="#" target="_blank"><i
                                class="fas fa-map"></i> মাস্টার প্ল্যান</a></li>
                    <li id="liPriceList" style="display: none;"><a id="linkPriceList" href="#" target="_blank"><i
                                class="fas fa-file-invoice-dollar"></i> মূল্য তালিকা</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-section footer-col-4 qr-section">
            <h3 class="text-center" id="footerQrTitle">অবস্থান দেখুন</h3>
            <div class="qr-container">
                <img id="ftQrImg" alt="QR Code"
                    style="max-width: 200px; max-height: 200px; width: 100%; height: auto; display: none; background: #fff; padding: 8px; border-radius: 8px; margin: 0 auto 15px; cursor: pointer; transition: all 0.3s ease;" />
                <a href="https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা" target="_blank"
                    class="map-btn" id="footerMapBtn">
                    <i class="fas fa-map-marker-alt"></i> <span id="footerMapBtnText">গুগল ম্যাপে দেখুন</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Concern Of Section - Centered Full Width Design -->
    <div id="footerConcernSection" class="footer-concern-section" style="display: none;">
        <div class="concern-header">
            <h4 id="footerConcernTitle" class="concern-title"></h4>
            {{-- <div class="concern-divider"></div> --}}
        </div>
        <div id="concernLogosContainer" class="concern-logos-container">
            <!-- Dynamic logos will be inserted here -->
            <a id="footerConcernLink" href="#" target="_blank" class="concern-logo-link" style="display: none;">
                <div class="concern-logo-wrapper">
                    <img id="footerConcernImage" src="" alt="Concern Logo" class="concern-logo-image">
                </div>
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <p id="footerBottomText"></p>
        <p style="margin-top: 8px; font-size: 0.9em; opacity: 0.8;">Design & Developed by <a
                href="https://alphainno.com" target="_blank"
                style="color: #ffd700; text-decoration: none; font-weight: 600;">Alphainno</a></p>
    </div>
</footer>

<script>
    (function () {
        async function loadFooterSettings() {
            try {
                const response = await fetch('/api/footer-settings?t=' + Date.now(), {
                    cache: 'no-store'
                });
                if (!response.ok) return;
                const settings = await response.json();
                if (settings && !settings.error) {
                    applyFooterSettings(settings);
                }
            } catch (error) {
                console.error('Error loading footer settings:', error);
            }
        }

        function applyFooterSettings(settings) {
            if (!settings) return;

            console.log('Applying footer settings:', settings);

            // Logo - update if logo_path exists
            const logoIcon = document.getElementById('footerLogoIcon');
            const logoImage = document.getElementById('footerLogoImage');
            if (logoImage && logoIcon) {
                if (settings.logo_path) {
                    let logoUrl = settings.logo_path;
                    // Ensure proper path format
                    if (!logoUrl.startsWith('http') && !logoUrl.startsWith('/')) {
                        logoUrl = '/' + logoUrl;
                    }
                    logoImage.src = logoUrl;
                    logoImage.alt = settings.title || 'Logo';
                    logoImage.style.display = 'block';
                    logoIcon.style.display = 'none';
                    logoImage.onerror = function () {
                        console.error('Failed to load logo:', logoUrl);
                        logoImage.style.display = 'none';
                        logoIcon.style.display = 'block';
                    };
                }
            }

            // Description - update if value exists
            if (settings.description !== undefined && settings.description !== null) {
                const descEl = document.getElementById('footerDescription');
                if (descEl) descEl.textContent = settings.description || '';
            }

            // Contact Info - update if value exists
            if (settings.phone1 !== undefined && settings.phone1 !== null) {
                const phone1El = document.getElementById('footerPhone1');
                if (phone1El) phone1El.textContent = settings.phone1 || '';
            }
            if (settings.phone2 !== undefined && settings.phone2 !== null) {
                const phone2El = document.getElementById('footerPhone2');
                if (phone2El) phone2El.textContent = settings.phone2 || '';
            }
            if (settings.email !== undefined && settings.email !== null) {
                const emailEl = document.getElementById('footerEmail');
                if (emailEl) emailEl.textContent = settings.email || '';
            }

            // Addresses - update if value exists
            if (settings.project_address !== undefined && settings.project_address !== null) {
                const projAddrEl = document.getElementById('footerProjectAddress');
                if (projAddrEl) projAddrEl.textContent = settings.project_address || '';
            }
            if (settings.contact_address !== undefined && settings.contact_address !== null) {
                const contactAddrEl = document.getElementById('footerContactAddress');
                if (contactAddrEl) contactAddrEl.textContent = settings.contact_address || '';
            }

            // Quick Links - only update if array exists and has items
            if (settings.quick_links && Array.isArray(settings.quick_links) && settings.quick_links.length > 0) {
                const quickLinksContainer = document.getElementById('footerQuickLinks');
                if (quickLinksContainer) {
                    quickLinksContainer.innerHTML = '';
                    settings.quick_links.forEach(link => {
                        if (link && link.label) {
                            const li = document.createElement('li');
                            li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                            quickLinksContainer.appendChild(li);
                        }
                    });
                }
            }

            // Legal Links - only update if array exists and has items
            if (settings.legal_links && Array.isArray(settings.legal_links) && settings.legal_links.length > 0) {
                const legalLinksContainer = document.getElementById('footerLegalLinks');
                if (legalLinksContainer) {
                    legalLinksContainer.innerHTML = '';
                    settings.legal_links.forEach(link => {
                        if (link && link.label) {
                            const li = document.createElement('li');
                            li.innerHTML = `<a href="${link.href || '#'}"><i class="fas fa-chevron-right"></i> ${link.label}</a>`;
                            legalLinksContainer.appendChild(li);
                        }
                    });
                }
            }

            // Social Links - only update if object exists
            if (settings.social_links && typeof settings.social_links === 'object') {
                if (settings.social_links.facebook) document.getElementById('footerFacebook').href = settings.social_links.facebook;
                if (settings.social_links.instagram) document.getElementById('footerInstagram').href = settings.social_links.instagram;
                if (settings.social_links.twitter) document.getElementById('footerTwitter').href = settings.social_links.twitter;
                if (settings.social_links.linkedin) document.getElementById('footerLinkedin').href = settings.social_links.linkedin;
                if (settings.social_links.youtube) document.getElementById('footerYoutube').href = settings.social_links.youtube;
            }

            // Map and QR Section - update if value exists
            if (settings.qr_section_title !== undefined && settings.qr_section_title !== null) {
                const qrTitleEl = document.getElementById('footerQrTitle');
                if (qrTitleEl) qrTitleEl.textContent = settings.qr_section_title || '';
            }
            if (settings.map_button_text !== undefined && settings.map_button_text !== null) {
                const mapBtnTextEl = document.getElementById('footerMapBtnText');
                if (mapBtnTextEl) mapBtnTextEl.textContent = settings.map_button_text || '';
            }
            if (settings.map_url !== undefined && settings.map_url !== null) {
                const mapBtnEl = document.getElementById('footerMapBtn');
                if (mapBtnEl) mapBtnEl.href = settings.map_url || '#';
            }

            // QR Image - update if path exists
            const qrImg = document.getElementById('ftQrImg');
            if (qrImg) {
                if (settings.qr_image_path) {
                    let qrImageUrl = '';
                    // Check if it's already a full path or relative path
                    if (settings.qr_image_path.startsWith('http://') || settings.qr_image_path.startsWith('https://')) {
                        // Full URL
                        qrImageUrl = settings.qr_image_path;
                    } else if (settings.qr_image_path.startsWith('/')) {
                        // Already has leading slash
                        qrImageUrl = settings.qr_image_path;
                    } else if (settings.qr_image_path.startsWith('storage/') || settings.qr_image_path.startsWith('footer/')) {
                        // Storage path (uploaded images)
                        qrImageUrl = '/storage/' + settings.qr_image_path;
                    } else {
                        // Public images path (default images)
                        qrImageUrl = '/images/' + settings.qr_image_path;
                    }
                    qrImg.src = qrImageUrl;
                    qrImg.style.display = 'block';
                    // Make QR image clickable to open in new tab
                    qrImg.onclick = function () {
                        window.open(qrImageUrl, '_blank');
                    };
                    qrImg.onerror = function () {
                        console.error('Failed to load QR image:', qrImageUrl);
                        qrImg.style.display = 'none';
                    };
                } else {
                    qrImg.style.display = 'none';
                }
            }

            // Bottom Text - update if value exists
            if (settings.bottom_text !== undefined && settings.bottom_text !== null) {
                const bottomTextEl = document.getElementById('footerBottomText');
                if (bottomTextEl) {
                    let text = settings.bottom_text || '';
                    // Inject NEX Real Estate link if URL is provided
                    if (settings.nex_real_estate_url && text.includes('NEX Real Estate')) {
                        const link = `<a href="${settings.nex_real_estate_url}" target="_blank" style="color: #ffd700; text-decoration: none; font-weight: 600;">NEX Real Estate</a>`;
                        text = text.replace('NEX Real Estate', link);
                        bottomTextEl.innerHTML = text; // Use innerHTML to render the link
                    } else {
                        bottomTextEl.textContent = text;
                    }
                }
            }

            // Concern Of Section - update with multiple logos
            const concernSection = document.getElementById('footerConcernSection');
            const concernTitleEl = document.getElementById('footerConcernTitle');
            const concernLogosContainer = document.getElementById('concernLogosContainer');

            console.log('=== Concern Section Debug ===');
            console.log('Settings received:', settings);
            console.log('concern_logos:', settings.concern_logos);
            console.log('concern_image_path:', settings.concern_image_path);

            if (concernSection && concernLogosContainer) {
                let hasConcern = false;

                // Update title
                if (concernTitleEl && settings.concern_title) {
                    concernTitleEl.textContent = settings.concern_title;
                }

                // Handle multiple logos
                if (settings.concern_logos && Array.isArray(settings.concern_logos) && settings.concern_logos.length > 0) {
                    concernLogosContainer.innerHTML = ''; // Clear existing

                    settings.concern_logos.forEach((logo, index) => {
                        if (logo.image_path) {
                            let concernImgUrl = '';
                            
                            // Use a more robust check for path type
                            if (logo.image_path.startsWith('http://') || logo.image_path.startsWith('https://')) {
                                concernImgUrl = logo.image_path;
                            } else if (logo.image_path.startsWith('/')) {
                                concernImgUrl = logo.image_path;
                            } else if (logo.image_path.startsWith('storage/')) {
                                concernImgUrl = '/' + logo.image_path;
                            } else if (logo.image_path.startsWith('footer/')) {
                                concernImgUrl = '/storage/' + logo.image_path;
                            } else {
                                concernImgUrl = '/storage/footer/' + logo.image_path.replace(/^footer\//, '');
                            }

                            console.log('Concern Logo', index, 'URL:', concernImgUrl);

                            // Create logo element
                            const logoLink = document.createElement('a');
                            logoLink.href = logo.url || '#';
                            logoLink.target = '_blank';
                            logoLink.className = 'concern-logo-link';

                            const logoWrapper = document.createElement('div');
                            logoWrapper.className = 'concern-logo-wrapper';

                            const logoImg = document.createElement('img');
                            logoImg.src = concernImgUrl;
                            logoImg.alt = 'Concern Logo ' + (index + 1);
                            logoImg.className = 'concern-logo-image';
                            logoImg.onerror = function() {
                                console.error('Failed to load Concern Image:', concernImgUrl);
                                logoLink.style.display = 'none';
                            };

                            logoWrapper.appendChild(logoImg);
                            logoLink.appendChild(logoWrapper);
                            concernLogosContainer.appendChild(logoLink);

                            hasConcern = true;
                        }
                    });
                } else {
                    console.log('No concern_logos found in settings, checking legacy concern_image_path');
                    // Fallback: check if there's a legacy single concern image
                    if (settings.concern_image_path) {
                        let concernImgUrl = '';
                        if (settings.concern_image_path.startsWith('http://') || settings.concern_image_path.startsWith('https://')) {
                            concernImgUrl = settings.concern_image_path;
                        } else if (settings.concern_image_path.startsWith('/')) {
                            concernImgUrl = settings.concern_image_path;
                        } else if (settings.concern_image_path.startsWith('storage/')) {
                            concernImgUrl = '/' + settings.concern_image_path;
                        } else if (settings.concern_image_path.startsWith('footer/')) {
                            concernImgUrl = '/storage/' + settings.concern_image_path;
                        } else {
                            concernImgUrl = '/storage/footer/' + settings.concern_image_path.replace(/^footer\//, '');
                        }

                        console.log('Legacy Concern Image URL:', concernImgUrl);
                        
                        concernLogosContainer.innerHTML = '';
                        const logoLink = document.createElement('a');
                        logoLink.href = settings.concern_url || '#';
                        logoLink.target = '_blank';
                        logoLink.className = 'concern-logo-link';

                        const logoWrapper = document.createElement('div');
                        logoWrapper.className = 'concern-logo-wrapper';

                        const logoImg = document.createElement('img');
                        logoImg.src = concernImgUrl;
                        logoImg.alt = 'Concern Logo';
                        logoImg.className = 'concern-logo-image';
                        logoImg.onerror = function() {
                            console.error('Failed to load legacy Concern Image:', concernImgUrl);
                            logoLink.style.display = 'none';
                        };

                        logoWrapper.appendChild(logoImg);
                        logoLink.appendChild(logoWrapper);
                        concernLogosContainer.appendChild(logoLink);

                        hasConcern = true;
                    }
                }

                // Show/hide section based on content
                if (hasConcern) {
                    concernSection.style.display = 'block';
                } else {
                    console.log('No concern logos to display, hiding section');
                    concernSection.style.display = 'none';
                }
            }

            // Download Section - update
            const downloadsSection = document.getElementById('footerDownloadsSection');
            if (downloadsSection) {
                let hasAnyFile = false;

                const handleFileLink = (liId, linkId, path) => {
                    const li = document.getElementById(liId);
                    const link = document.getElementById(linkId);
                    if (li && link) {
                        if (path) {
                            link.href = '/storage/' + path;
                            li.style.display = 'block';
                            hasAnyFile = true;
                        } else {
                            li.style.display = 'none';
                        }
                    }
                };

                handleFileLink('liBrochure', 'linkBrochure', settings.brochure_path);
                handleFileLink('liMasterPlan', 'linkMasterPlan', settings.master_plan_path);
                handleFileLink('liPriceList', 'linkPriceList', settings.price_list_path);

                downloadsSection.style.display = hasAnyFile ? 'block' : 'none';
            }
        }

        // Load from database only
        loadFooterSettings();

        // Listen for updates from dashboard
        window.addEventListener('storage', function (e) {
            if (e.key === 'refreshFooter') {
                console.log('Footer refresh triggered via storage event');
                loadFooterSettings();
            }
        });

        // Listen for custom events (same-tab updates)
        window.addEventListener('footerSettingsUpdated', function () {
            loadFooterSettings();
        });
    })();
</script>