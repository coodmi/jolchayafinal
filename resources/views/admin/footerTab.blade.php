<div id="footer" class="tab-content">
    <style>
        .form-label {
            display: block;
            margin-bottom: 8px;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 61, 41, 0.3);
        }

        .btn-reset:hover {
            background: #4b5563 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
        }

        .search-input:focus {
            border-color: #0d3d29;
            box-shadow: 0 0 0 3px rgba(13, 61, 41, 0.1);
        }
    </style>
    <div class="table-card">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
            <div
                style="width: 40px; height: 40px; background: linear-gradient(135deg, #0d3d29 0%, #1a7a4a 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <h2 style="margin: 0; color: #111827; font-size: 24px; font-weight: 700;">ফুটার সেটিংস</h2>
                <p style="margin: 4px 0 0 0; color: #6b7280; font-size: 14px;">ফুটারের কনটেন্ট কাস্টমাইজ করুন এবং সাইটে
                    প্রয়োগ করুন</p>
            </div>
        </div>

        <form id="footerSettingsForm" onsubmit="return false;">
            <!-- Basic Information Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-info-circle"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">মৌলিক তথ্য</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="footerLogoFile">
                            <span style="font-weight: 600; color: #374151;">ফুটার লোগো</span>
                            <small
                                style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">PNG/SVG/JPG/WEBP
                                সমর্থিত। সর্বোচ্চ 7MB (যেকোনো রেজুলেশন)</small>
                        </label>
                        <input id="footerLogoFile" type="file" class="search-input" accept="image/*">
                        <div id="footerLogoPreview" style="margin-top: 10px; display: none;">
                            <img id="footerLogoPreviewImg" src="" alt="Logo Preview"
                                style="max-height: 80px; width: auto; border: 1px solid #e5e7eb; border-radius: 8px; padding: 8px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="footerTitle">
                            <span style="font-weight: 600; color: #374151;">শিরোনাম</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">প্রকল্পের
                                নাম</small>
                        </label>
                        <input id="footerTitle" type="text" class="search-input" placeholder="জলছায়া">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="footerDescription">
                            <span style="font-weight: 600; color: #374151;">বিবরণ</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">প্রকল্পের
                                সংক্ষিপ্ত বিবরণ</small>
                        </label>
                        <textarea id="footerDescription" class="search-input" rows="3"
                            placeholder="প্রকল্পের বিবরণ"></textarea>
                    </div>
                </div>
            </div>

            <!-- Concern Of Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-building"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">Concern of Section</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="concernTitle">
                            <span style="font-weight: 600; color: #374151;">Title</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Section
                                Title (e.g., Concern of NEX Group)</small>
                        </label>
                        <input id="concernTitle" type="text" class="search-input" placeholder="Concern of NEX Group">
                    </div>
                </div>

                <!-- Multiple Logos Section -->
                <div style="margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                        <label class="form-label" style="margin: 0;">
                            <span style="font-weight: 600; color: #374151;">Concern Logos</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Add multiple company logos</small>
                        </label>
                        <button type="button" id="addConcernLogoBtn" 
                            style="padding: 8px 16px; background: #10b981; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-plus"></i> Add Logo
                        </button>
                    </div>
                    
                    <div id="concernLogosContainer" style="display: flex; flex-direction: column; gap: 12px;">
                        <!-- Dynamic logo entries will be added here -->
                    </div>
                </div>
            </div>

            <script>
                // Initialize concern logos array
                let concernLogos = [];
                let logoCounter = 0;

                // Add new logo entry
                document.getElementById('addConcernLogoBtn').addEventListener('click', function() {
                    addLogoEntry();
                });

                function addLogoEntry(url = '', imageData = null, imagePath = '') {
                    const logoId = logoCounter++;
                    const container = document.getElementById('concernLogosContainer');
                    
                    const logoEntry = document.createElement('div');
                    logoEntry.className = 'concern-logo-entry';
                    logoEntry.id = `logo-entry-${logoId}`;
                    logoEntry.style.cssText = 'background: white; border: 2px solid #e5e7eb; border-radius: 10px; padding: 16px; position: relative;';
                    
                    logoEntry.innerHTML = `
                        <button type="button" onclick="removeLogoEntry(${logoId})" 
                            style="position: absolute; top: 8px; right: 8px; background: #ef4444; color: white; border: none; border-radius: 6px; width: 28px; height: 28px; cursor: pointer; font-size: 12px; transition: all 0.3s;">
                            <i class="fas fa-times"></i>
                        </button>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                            <div>
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 6px;">Website URL</label>
                                <input type="text" id="logo-url-${logoId}" class="search-input" placeholder="https://example.com" value="${url}" 
                                    style="padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; width: 100%;">
                            </div>
                            <div>
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 6px;">Logo Image</label>
                                <input type="file" id="logo-file-${logoId}" accept="image/*" 
                                    style="padding: 6px; border: 1px solid #d1d5db; border-radius: 6px; width: 100%; font-size: 13px;"
                                    onchange="handleLogoFileChange(${logoId})">
                            </div>
                        </div>
                        
                        <div id="logo-preview-${logoId}" style="display: ${imageData || imagePath ? 'flex' : 'none'}; align-items: center; gap: 12px; padding: 12px; background: #f9fafb; border-radius: 8px; border: 1px dashed #d1d5db;">
                            <img id="logo-preview-img-${logoId}" src="${imageData || (imagePath ? '/storage/' + imagePath : '')}" alt="Logo Preview" 
                                style="max-height: 60px; max-width: 120px; width: auto; object-fit: contain;">
                            <span style="font-size: 12px; color: #6b7280;">Logo preview</span>
                        </div>
                    `;
                    
                    container.appendChild(logoEntry);
                    
                    // Store logo data
                    concernLogos.push({
                        id: logoId,
                        url: url,
                        imageData: imageData,
                        imagePath: imagePath
                    });
                }

                function removeLogoEntry(logoId) {
                    const entry = document.getElementById(`logo-entry-${logoId}`);
                    if (entry) {
                        entry.remove();
                    }
                    concernLogos = concernLogos.filter(logo => logo.id !== logoId);
                }

                function handleLogoFileChange(logoId) {
                    const fileInput = document.getElementById(`logo-file-${logoId}`);
                    const preview = document.getElementById(`logo-preview-${logoId}`);
                    const previewImg = document.getElementById(`logo-preview-img-${logoId}`);
                    
                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            preview.style.display = 'flex';
                            
                            // Update logo data
                            const logo = concernLogos.find(l => l.id === logoId);
                            if (logo) {
                                logo.imageData = e.target.result;
                            }
                        };
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                }

                // Load existing logos on page load (you'll need to call this with saved data)
                function loadConcernLogos(logos) {
                    if (logos && Array.isArray(logos)) {
                        logos.forEach(logo => {
                            addLogoEntry(logo.url || '', logo.imageData || null, logo.image_path || '');
                        });
                    }
                }

                // Initialize with at least one empty entry
                setTimeout(() => {
                    // Only add empty entry if no logos were loaded
                    if (concernLogos.length === 0) {
                        addLogoEntry();
                    }
                }, 100);
            </script>

            <!-- Contact Information Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-phone"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">যোগাযোগের তথ্য</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="phone1">
                            <span style="font-weight: 600; color: #374151;">ফোন নম্বর ১</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">প্রাথমিক
                                যোগাযোগ নম্বর</small>
                        </label>
                        <input id="phone1" type="text" class="search-input" placeholder="+880 1991 995 995">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone2">
                            <span style="font-weight: 600; color: #374151;">ফোন নম্বর ২</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">বিকল্প
                                যোগাযোগ নম্বর</small>
                        </label>
                        <input id="phone2" type="text" class="search-input" placeholder="+880 1991 994 994">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">
                            <span style="font-weight: 600; color: #374151;">ইমেইল ঠিকানা</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">ইমেইল
                                যোগাযোগের ঠিকানা</small>
                        </label>
                        <input id="email" type="email" class="search-input" placeholder="hello.nexup@gmail.com">
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-map-marker-alt"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">ঠিকানা</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="projectAddress">
                            <span style="font-weight: 600; color: #374151;">প্রকল্পের ঠিকানা</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">প্রকল্পের
                                অবস্থান</small>
                        </label>
                        <textarea id="projectAddress" class="search-input" rows="2"
                            placeholder="শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ"></textarea>
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="contactAddress">
                            <span style="font-weight: 600; color: #374151;">যোগাযোগের ঠিকানা</span>
                            <small
                                style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">অফিস/যোগাযোগের
                                ঠিকানা</small>
                        </label>
                        <textarea id="contactAddress" class="search-input" rows="2"
                            placeholder="NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka"></textarea>
                    </div>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-link"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">দ্রুত লিংক</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">হোম</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">হোমপেজ
                                লিংক</small>
                        </label>
                        <input id="qlHomeLabel" type="text" class="search-input" placeholder="হোম"
                            style="margin-bottom: 8px;">
                        <input id="qlHomeHref" type="text" class="search-input" placeholder="#home">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">সুবিধাসমূহ</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">সুবিধা
                                সেকশন লিংক</small>
                        </label>
                        <input id="qlFeaturesLabel" type="text" class="search-input" placeholder="সুবিধাসমূহ"
                            style="margin-bottom: 8px;">
                        <input id="qlFeaturesHref" type="text" class="search-input" placeholder="#features">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">মূল্য তালিকা</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">মূল্য
                                সেকশন লিংক</small>
                        </label>
                        <input id="qlPricingLabel" type="text" class="search-input" placeholder="মূল্য তালিকা"
                            style="margin-bottom: 8px;">
                        <input id="qlPricingHref" type="text" class="search-input" placeholder="#pricing">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">যোগাযোগ</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">যোগাযোগ
                                সেকশন লিংক</small>
                        </label>
                        <input id="qlContactLabel" type="text" class="search-input" placeholder="যোগাযোগ"
                            style="margin-bottom: 8px;">
                        <input id="qlContactHref" type="text" class="search-input" placeholder="#contact">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">গ্যালারি</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">গ্যালারি
                                সেকশন লিংক</small>
                        </label>
                        <input id="qlGalleryLabel" type="text" class="search-input" placeholder="গ্যালারি"
                            style="margin-bottom: 8px;">
                        <input id="qlGalleryHref" type="text" class="search-input" placeholder="#gallery">
                    </div>
                </div>
            </div>

            <!-- Legal Links Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-balance-scale"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">আইনি তথ্য</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">গোপনীয়তা নীতি</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">গোপনীয়তা
                                নীতি পেজ লিংক</small>
                        </label>
                        <input id="legalPrivacyLabel" type="text" class="search-input" placeholder="গোপনীয়তা নীতি"
                            style="margin-bottom: 8px;">
                        <input id="legalPrivacyHref" type="text" class="search-input" placeholder="#privacy">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <span style="font-weight: 600; color: #374151; font-size: 13px;">সেবার শর্তাবলী</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">সেবার
                                শর্তাবলী পেজ লিংক</small>
                        </label>
                        <input id="legalTermsLabel" type="text" class="search-input" placeholder="সেবার শর্তাবলী"
                            style="margin-bottom: 8px;">
                        <input id="legalTermsHref" type="text" class="search-input" placeholder="#terms">
                    </div>
                </div>
            </div>

            <!-- Social Media Links Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-globe"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">সোশ্যাল মিডিয়া লিংক</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="socialFacebook">
                            <span style="font-weight: 600; color: #374151;">Facebook</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Facebook
                                প্রোফাইল URL</small>
                        </label>
                        <input id="socialFacebook" type="text" class="search-input"
                            placeholder="https://facebook.com/yourpage">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="socialInstagram">
                            <span style="font-weight: 600; color: #374151;">Instagram</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Instagram
                                প্রোফাইল URL</small>
                        </label>
                        <input id="socialInstagram" type="text" class="search-input"
                            placeholder="https://instagram.com/yourpage">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="socialTwitter">
                            <span style="font-weight: 600; color: #374151;">Twitter</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Twitter
                                প্রোফাইল URL</small>
                        </label>
                        <input id="socialTwitter" type="text" class="search-input"
                            placeholder="https://twitter.com/yourpage">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="socialLinkedin">
                            <span style="font-weight: 600; color: #374151;">LinkedIn</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">LinkedIn
                                প্রোফাইল URL</small>
                        </label>
                        <input id="socialLinkedin" type="text" class="search-input"
                            placeholder="https://linkedin.com/company/yourpage">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="socialYouTube">
                            <span style="font-weight: 600; color: #374151;">YouTube</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">YouTube
                                চ্যানেল URL</small>
                        </label>
                        <input id="socialYouTube" type="text" class="search-input"
                            placeholder="https://youtube.com/@yourchannel">
                    </div>
                </div>
            </div>

            <!-- Download Files Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-download"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">ডাউনলোড ফাইলসমূহ</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" for="brochureFile">
                            <span style="font-weight: 600; color: #374151;">Project Brochure (PDF/Image)</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">প্রকল্পের
                                ব্রোশিয়ার ফাইল</small>
                        </label>
                        <input id="brochureFile" type="file" class="search-input" accept=".pdf,.doc,.docx,image/*">
                        <div id="brochureLink" style="margin-top: 8px; font-size: 13px;"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="masterPlanFile">
                            <span style="font-weight: 600; color: #374151;">Master Plan (PDF/Image)</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">মাস্টার
                                প্ল্যান ফাইল</small>
                        </label>
                        <input id="masterPlanFile" type="file" class="search-input" accept=".pdf,.doc,.docx,image/*">
                        <div id="masterPlanLink" style="margin-top: 8px; font-size: 13px;"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="priceListFile">
                            <span style="font-weight: 600; color: #374151;">Price List (PDF/Image)</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">মূল্য
                                তালিকা ফাইল</small>
                        </label>
                        <input id="priceListFile" type="file" class="search-input" accept=".pdf,.doc,.docx,image/*">
                        <div id="priceListLink" style="margin-top: 8px; font-size: 13px;"></div>
                    </div>
                </div>
            </div>

            <!-- Map & QR Section -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-map"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">ম্যাপ ও QR কোড</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="mapUrl">
                            <span style="font-weight: 600; color: #374151;">গুগল ম্যাপ লিংক</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Google
                                Maps সম্পূর্ণ URL</small>
                        </label>
                        <input id="mapUrl" type="text" class="search-input"
                            placeholder="https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mapButtonText">
                            <span style="font-weight: 600; color: #374151;">ম্যাপ বাটন টেক্সট</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">ম্যাপ
                                বাটনে প্রদর্শিত টেক্সট</small>
                        </label>
                        <input id="mapButtonText" type="text" class="search-input" placeholder="গুগল ম্যাপে দেখুন">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="qrSectionTitle">
                            <span style="font-weight: 600; color: #374151;">QR সেকশন শিরোনাম</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">QR কোড
                                সেকশনের শিরোনাম</small>
                        </label>
                        <input id="qrSectionTitle" type="text" class="search-input" placeholder="অবস্থান দেখুন">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="footerQrFile">
                            <span style="font-weight: 600; color: #374151;">QR কোড ইমেজ</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">PNG, JPG,
                                SVG (সর্বোচ্চ 5MB)</small>
                        </label>
                        <input id="footerQrFile" type="file" accept="image/*" class="search-input"
                            style="padding: 8px;">
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Text -->
            <div
                style="background: #f9fafb; border-radius: 12px; padding: 20px; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                <div
                    style="display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #e5e7eb;">
                    <span style="font-size: 18px;"><i class="fas fa-edit"></i></span>
                    <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">ফুটার বটম টেক্সট</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="bottomText">
                            <span style="font-weight: 600; color: #374151;">কপিরাইট টেক্সট</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">ফুটারের
                                নিচের অংশে প্রদর্শিত হবে</small>
                        </label>
                        <input id="bottomText" type="text" class="search-input"
                            placeholder="© ২০২৫ জলছায়া। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="nexRealEstateUrl">
                            <span style="font-weight: 600; color: #374151;">NEX Real Estate Link</span>
                            <small style="display: block; color: #6b7280; font-weight: 400; margin-top: 2px;">Link for
                                "NEX Real Estate" text in footer</small>
                        </label>
                        <input id="nexRealEstateUrl" type="text" class="search-input"
                            placeholder="https://nexrealestate.com">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div style="display: flex; gap: 12px; padding-top: 20px; border-top: 2px solid #e5e7eb; margin-top: 24px;">
                <button type="button" class="btn-save" onclick="saveFooterSettings()"
                    style="flex: 1; padding: 12px 24px; background: linear-gradient(135deg, #0d3d29 0%, #1a7a4a 100%); color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <span><i class="fas fa-save"></i></span>
                    <span>সংরক্ষণ করুন</span>
                </button>
                <button type="button" class="btn-reset" onclick="resetFooterSettings()"
                    style="padding: 12px 24px; background: #6b7280; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.3s;">
                    <i class="fas fa-undo"></i> ডিফল্টে ফিরুন
                </button>
            </div>
        </form>
    </div>

    <script>
    // Live preview input listeners only — load/save handled by program.js
    (function(){
        const g = id => document.getElementById(id);
        const previewMap = {
            phone1:'pvPhone1', phone2:'pvPhone2', email:'pvEmail',
            socialFacebook:'pvFb', socialInstagram:'pvIg', socialTwitter:'pvTw',
            socialLinkedin:'pvLn', socialYouTube:'pvYt'
        };
        Object.keys(previewMap).forEach(id => {
            g(id)?.addEventListener('input', function() {
                const el = g(previewMap[id]);
                if (!el) return;
                if (id.startsWith('social')) el.href = this.value || '#';
                else el.textContent = this.value;
            });
        });
    })();
    </script>
        <div
            style="border:1px solid #e5e7eb; border-radius:0.75rem; overflow:hidden; background:#0b1727; color:#cbd5e1;">
            <div style="display:flex; gap:32px; padding:16px;">
                <div style="flex:1; min-width:220px;">
                    <div style="display:flex; align-items:center; gap:8px; color:#fbbf24;">
                        <span><i class="fas fa-home"></i></span>
                        <h3 id="pvTitle" style="margin:0; color:#e5e7eb;">জলছায়া</h3>
                    </div>
                    <p id="pvDesc" style="margin:8px 0 12px 0; color:#cbd5e1;">NEX Real Estate এর একটি প্রকল্প। আপনার
                        স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলছায়া।</p>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <div><strong><i class="fas fa-phone"></i></strong> <span id="pvPhone1">+880 1991 995 995</span>,
                            <span id="pvPhone2">+880 1991 994 994</span>
                        </div>
                        <div><strong><i class="fas fa-envelope"></i></strong> <span
                                id="pvEmail">hello.nexup@gmail.com</span></div>
                    </div>
                    <div style="display:flex; gap:8px; margin-top:8px;">
                        <a id="pvFb" href="#" style="color:#cbd5e1;">Facebook</a>
                        <a id="pvIg" href="#" style="color:#cbd5e1;">Instagram</a>
                        <a id="pvTw" href="#" style="color:#cbd5e1;">Twitter</a>
                        <a id="pvLn" href="#" style="color:#cbd5e1;">LinkedIn</a>
                        <a id="pvYt" href="#" style="color:#cbd5e1;">YouTube</a>
                    </div>

                    <!-- Concern Preview -->
                    <div id="pvConcernSection" style="margin-top: 16px; display: none;">
                        <h4 id="pvConcernTitle"
                            style="color: #fff; font-size: 14px; margin: 0 0 8px 0; font-weight: 600;">Concern of</h4>
                        <img id="pvConcernImg" src="" alt="Concern Logo"
                            style="max-height: 50px; width: auto; background: white; padding: 5px; border-radius: 4px;">
                    </div>
                </div>
                <div style="flex:1; min-width:220px;">
                    <h4 style="margin:0 0 8px 0; color:#e5e7eb;">ঠিকানা</h4>
                    <div id="pvProjectAddr" style="margin-bottom:8px;">শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা,
                        বাংলাদেশ</div>
                    <div id="pvContactAddr">NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk
                        Ave, Banani C/A, Dhaka</div>
                </div>
                <div style="flex:1; min-width:220px;">
                    <h4 style="margin:0 0 8px 0; color:#e5e7eb;">দ্রুত লিংক</h4>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <a id="pvQlHome" href="#home" style="color:#cbd5e1;">হোম</a>
                        <a id="pvQlFeatures" href="#features" style="color:#cbd5e1;">সুবিধাসমূহ</a>
                        <a id="pvQlPricing" href="#pricing" style="color:#cbd5e1;">মূল্য তালিকা</a>
                        <a id="pvQlContact" href="#contact" style="color:#cbd5e1;">যোগাযোগ</a>
                        <a id="pvQlGallery" href="#gallery" style="color:#cbd5e1;">গ্যালারি</a>
                    </div>
                </div>
                <div style="flex:1; min-width:220px;">
                    <h4 id="pvQrTitle" style="margin:0 0 8px 0; color:#e5e7eb;">অবস্থান দেখুন</h4>
                    <div style="margin-bottom:10px;">
                        <div id="qrPreviewContainer"
                            style="width:160px; height:160px; border:2px dashed #334155; border-radius:10px; display:flex; align-items:center; justify-content:center; background:#0f172a; position:relative; overflow:hidden;">
                            <img id="pvQrImg" alt="QR Preview"
                                style="max-width:148px; max-height:148px; width:auto; height:auto; display:none; background:#fff; padding:6px; border-radius:8px; object-fit:contain;" />
                            <span id="pvQrPlaceholder"
                                style="color:#64748b; font-size:12px; text-align:center; padding:0 8px; position:absolute;">QR
                                আপলোড করলে এখানে প্রিভিউ দেখাবে</span>
                        </div>
                    </div>
                    <a id="pvMap" href="#" target="_blank"
                        style="display:inline-block; background:#f59e0b; color:#111827; padding:8px 12px; border-radius:8px; text-decoration:none; font-weight:600; margin-top:8px;"><span
                            id="pvMapText">গুগল ম্যাপে দেখুন</span></a>
                </div>
            </div>
            <div style="background:#0a1220; padding:10px 16px; color:#94a3b8; text-align:center;" id="pvBottom">© ২০২৫
                জলছায়া। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প</div>
        </div>
    </div>
</div>


</div>