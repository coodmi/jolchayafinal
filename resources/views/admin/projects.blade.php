<div id="projects" class="tab-content">
    <div class="stats-grid" style="grid-template-columns: 1fr;">
        <div class="stat-card" style="width: 100%;">
            <div class="stat-card-content" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
                <div class="stat-info" style="flex: 1;">
                    <h3>প্রকল্প</h3>
                    <div class="subtitle">হিরো সেকশন, স্লোগান, আমাদের প্রজেক্টসমূহ</div>
                </div>
                <div class="stat-icon purple" style="flex-shrink: 0; margin-left: auto; font-size: 2.5rem;"><i class="fas fa-folder"></i></div>
            </div>
        </div>
    </div>

    <input type="hidden" id="csrfTokenProjects" value="{{ csrf_token() }}">
    
    <!-- Project Confirmation Modal -->
    <div id="projectConfirmOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9998;"></div>
    <div id="projectConfirmModal" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#ffffff; width:90%; max-width:420px; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,0.25); overflow:hidden; animation: modalSlideIn 0.3s ease-out;">
            <div id="projectModalHeader" style="padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; gap:10px;">
                <div id="projectModalIcon" style="width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:18px;"></div>
                <div id="projectModalTitle" style="font-size:18px; font-weight:700; color:#0f172a;"></div>
            </div>
            <div id="projectModalBody" style="padding:18px 20px; color:#334155; font-size:15px; line-height:1.6;"></div>
            <div id="projectModalFooter" style="padding:14px 16px; display:flex; gap:10px; justify-content:flex-end; background:#f8fafc; border-top:1px solid #eef2f7;"></div>
        </div>
    </div>
    
            <style>
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .project-form-group {
            margin-bottom: 20px;
            clear: both;
            display: block !important;
        }
        .project-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 15px;
            font-weight: 600;
            color: #1f2937;
        }
        .project-form-group input[type="text"],
        .project-form-group textarea,
        .project-form-group input[type="file"] {
            display: block !important;
            width: 100% !important;
            padding: 12px 14px !important;
            border: 2px solid #d1d5db !important;
            border-radius: 8px !important;
            font-size: 15px !important;
            transition: all 0.2s;
            background: #ffffff !important;
            box-sizing: border-box !important;
            min-height: 45px !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        .project-form-group input[type="text"]:focus,
        .project-form-group textarea:focus,
        .project-form-group input[type="file"]:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }
        .project-form-group textarea {
            min-height: 120px !important;
            resize: vertical;
            font-family: inherit;
            line-height: 1.6;
            display: block !important;
        }
        .project-form-group input[type="file"] {
            padding: 10px !important;
            cursor: pointer;
            border-style: dashed !important;
            display: block !important;
        }
        .project-form-group input[type="file"]:hover {
            border-color: #7c3aed !important;
            background: #faf5ff !important;
        }
        .project-save-btn {
            background: #059669;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(5, 150, 105, 0.2);
        }
        .project-save-btn:hover {
            background: #047857;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(5, 150, 105, 0.3);
        }
        .project-preview-btn {
            background: #059669;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(5, 150, 105, 0.2);
            margin-left: 10px;
        }
        .project-preview-btn:hover {
            background: #047857;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(5, 150, 105, 0.3);
        }
        .project-status {
            margin-top: 12px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
        }
        .project-status.success {
            background: #ddd6fe;
            color: #5b21b6;
        }
        .project-status.error {
            background: #fee2e2;
            color: #991b1b;
        }
        .image-preview-container {
            margin-top: 12px;
            text-align: center;
        }
        .image-preview-container img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .dashboard-status-box {
            background: linear-gradient(135deg, #0d3d29 0%, #065f46 100%);
            color: white;
            padding: 16px;
            border-radius: 12px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(13, 61, 41, 0.3);
            position: relative;
        }
        .dashboard-status-box h4 {
            margin: 0 0 10px 0;
                    font-size: 16px;
            font-weight: 600;
        }
        .dashboard-status-box p {
            margin: 5px 0;
            font-size: 14px;
            opacity: 0.95;
        }
        .edit-content-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            display: inline-block;
        }
        .edit-content-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }
        .clear-content-btn {
            background: rgba(239, 68, 68, 0.2);
            color: white;
            border: 1px solid rgba(239, 68, 68, 0.4);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            margin-left: 10px;
            display: inline-block;
        }
        .clear-content-btn:hover {
            background: rgba(239, 68, 68, 0.4);
            border-color: rgba(239, 68, 68, 0.6);
            transform: translateY(-2px);
        }
        .content-preview {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 6px;
            margin-top: 10px;
            font-size: 13px;
            max-height: 100px;
            overflow-y: auto;
        }
        .content-preview strong {
            display: block;
            margin-bottom: 5px;
            opacity: 0.9;
        }
        .project-card {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .project-card:hover {
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.2);
            border-color: #7c3aed;
        }
        .project-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f3f4f6;
        }
        .project-card-title {
                    font-size: 16px;
            font-weight: 600;
            color: #7c3aed;
        }
        .project-card-actions {
            display: flex;
            gap: 8px;
        }
        .project-card-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .project-card-btn.delete {
            background: #fee2e2;
            color: #991b1b;
        }
        .project-card-btn.delete:hover {
            background: #fecaca;
        }
        .project-card-image-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
                }
            </style>

    <!-- Hero Section -->
    <div id="projects-hero" style="margin-top:1rem;">
        <div class="table-card">
            <h2>হিরো সেকশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">প্রকল্প পেজের হিরো সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 12px 16px; margin-bottom: 20px; border-radius: 6px;">
                <p style="margin: 0; color: #1e40af; font-size: 14px;">
                    <strong>💡 টিপস:</strong> এই সেকশনের কন্টেন্ট প্রকল্প পেজের প্রথম স্ক্রিনে দেখা যাবে। ব্যাকগ্রাউন্ড ইমেজ আপলোড করলে আরও আকর্ষণীয় দেখাবে।
                </p>
            </div>
            
            <div class="project-form-group">
                        <label>শিরোনাম</label>
                <input type="text" id="projects-hero-title" placeholder="যেমন: আমাদের প্রকল্পসমূহ" />
                    </div>
            
            <div class="project-form-group">
                <label>সাব-টাইটেল</label>
                <input type="text" id="projects-hero-subtitle" placeholder="সাব-টাইটেল" />
                    </div>
            
            <div class="project-form-group">
                        <label>বিবরণ</label>
                <textarea id="projects-hero-content" placeholder="প্রকল্প সম্পর্কে বিস্তারিত..."></textarea>
                    </div>
            
            <div class="project-form-group">
                <label>ব্যাকগ্রাউন্ড ইমেজ আপলোড করুন</label>
                <input type="file" id="projects-hero-image" accept="image/*" onchange="previewProjectImage('hero')" />
                <small style="display: block; margin-top: 5px; color: #6b7280; font-size: 13px;">
                    📎 সর্বোচ্চ ফাইল সাইজ: 5MB | সমর্থিত ফরম্যাট: JPG, PNG, WEBP
                </small>
                <div id="projects-hero-image-preview" class="image-preview-container"></div>
                        </div>
            
            <button class="project-save-btn" onclick="saveProjectSection('hero')">সংরক্ষণ করুন</button>
            <button class="project-preview-btn" onclick="previewProjectSection('hero')">প্রিভিউ দেখুন</button>
            <div id="projects-hero-status" class="project-status" style="display:none;"></div>

            <!-- Dashboard Status -->
            <div class="dashboard-status-box">
                <h4>📊 ড্যাশবোর্ড স্ট্যাটাস</h4>
                <p id="hero-dashboard-status">হিরো সেকশন: <span id="hero-status-text">কোনো ডেটা নেই</span></p>
                
                <div id="hero-content-preview" class="content-preview" style="display:none;">
                    <strong>বর্তমান কন্টেন্ট:</strong>
                    <div id="hero-preview-text"></div>
                        </div>
                
                <button class="edit-content-btn" onclick="editProjectContent('hero')" id="hero-edit-btn" style="display:none;">
                    ✏️ কন্টেন্ট এডিট করুন
                </button>
                <button class="clear-content-btn" onclick="clearProjectContent('hero')" id="hero-clear-btn" style="display:none;">
                    <i class="fas fa-trash"></i> সব মুছে ফেলুন
                </button>
                        </div>
                        </div>
                    </div>

    <!-- Slogan Section -->
    <div id="projects-slogan" style="margin-top:1rem;">
        <div class="table-card">
            <h2>স্লোগান</h2>
            <p style="color:#6b7280; margin-bottom:20px;">প্রকল্প পেজের স্লোগান সেকশনের কন্টেন্ট ম্যানেজ করুন</p>
            
            <div class="project-form-group">
                <label>স্লোগান শিরোনাম</label>
                <input type="text" id="projects-slogan-title" placeholder="যেমন: বিশ্বাসের প্রতীক NEX Real Estate" />
                </div>
            
            <div class="project-form-group">
                <label>স্লোগান টেক্সট</label>
                <textarea id="projects-slogan-content" placeholder="আমরা বাংলাদেশে প্রিমিয়াম রিয়েল এস্টেট উন্নয়নে কাজ করছি..."></textarea>
                            </div>
            
            <div class="project-form-group">
                <label>কোম্পানি লোগো আপলোড করুন</label>
                <input type="file" id="projects-slogan-logo" accept="image/*" onchange="previewProjectImage('slogan-logo')" />
                <small style="display: block; margin-top: 5px; color: #6b7280; font-size: 13px;">
                    <i class="fas fa-building"></i> সর্বোচ্চ ফাইল সাইজ: 5MB | সমর্থিত ফরম্যাট: JPG, PNG, SVG, WEBP | প্রস্তাবিত সাইজ: 180x180px
                </small>
                <div id="projects-slogan-logo-preview" class="image-preview-container"></div>
                        </div>
            
            <button style="background: #ffffff; color: #065f46; border: 2px solid #10b981;" class="project-save-btn" onclick="saveProjectSection('slogan')">সংরক্ষণ করুন</button>
            <button style="background: #08452B; color: white;" class="project-preview-btn" onclick="previewProjectSection('slogan')">প্রিভিউ দেখুন</button>
            <div id="projects-slogan-status" class="project-status" style="display:none;"></div>

            <!-- Dashboard Status -->
            <div class="dashboard-status-box">
                <h4>📊 ড্যাশবোর্ড স্ট্যাটাস</h4>
                <p id="slogan-dashboard-status">স্লোগান সেকশন: <span id="slogan-status-text">কোনো ডেটা নেই</span></p>
                
                <div id="slogan-content-preview" class="content-preview" style="display:none;">
                    <strong>বর্তমান কন্টেন্ট:</strong>
                    <div id="slogan-preview-text"></div>
                            </div>
                
                <button class="edit-content-btn" onclick="editProjectContent('slogan')" id="slogan-edit-btn" style="display:none;">
                    ✏️ কন্টেন্ট এডিট করুন
                </button>
                <button class="clear-content-btn" onclick="clearProjectContent('slogan')" id="slogan-clear-btn" style="display:none;">
                    <i class="fas fa-trash"></i> সব মুছে ফেলুন
                </button>
                        </div>
                            </div>
                        </div>

    <!-- Our Projects Section -->
    <div id="projects-our" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <div>
                    <h2 style="color: #1f2937; font-size: 1.5rem; margin-bottom: 0.5rem;">আমাদের প্রজেক্টসমূহ</h2>
                    <p style="color: #6b7280; margin: 0;">প্রজেক্ট ম্যানেজমেন্ট - ড্যাশবোর্ড থেকে প্রজেক্ট যোগ করুন এবং ম্যানেজ করুন</p>
                </div>
                <button class="project-save-btn" onclick="addNewProjectCard()" style="margin: 0;">
                    <i class="fas fa-plus"></i> নতুন প্রজেক্ট যোগ করুন
                </button>
            </div>
            
            <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 12px 16px; margin-bottom: 20px; border-radius: 6px;">
                <p style="margin: 0; color: #1e40af; font-size: 14px;">
                    <strong><i class="fas fa-chart-bar"></i> মোট প্রজেক্ট:</strong> <span id="our-projects-count">0</span> টি
                </p>
            </div>
            
            <div id="our-projects-container" style="display: flex; flex-direction: column; gap: 20px;">
                <!-- Projects will be loaded dynamically here -->
            </div>
        </div>
    </div>

            <script>
                (function(){
            const csrfToken = document.getElementById('csrfTokenProjects').value;
            
            // ==================== CUSTOM MODAL FUNCTIONS ====================
            
            window.showProjectModal = function(options) {
                // For confirm type, use the real modal
                if (options.type === 'confirm') {
                    const overlay = document.getElementById('projectConfirmOverlay');
                    const modal = document.getElementById('projectConfirmModal');
                    const icon = document.getElementById('projectModalIcon');
                    const title = document.getElementById('projectModalTitle');
                    const body = document.getElementById('projectModalBody');
                    const footer = document.getElementById('projectModalFooter');
                    icon.innerHTML = '<i class="fas fa-exclamation"></i>';
                    icon.style.background = '#fee2e2'; icon.style.color = '#b91c1c';
                    title.textContent = options.title || 'নিশ্চিত করুন';
                    body.textContent = options.message;
                    footer.innerHTML = '';
                    const cancelBtn = document.createElement('button');
                    cancelBtn.textContent = options.cancelText || 'না';
                    cancelBtn.style.cssText = 'padding:10px 16px; background:#e5e7eb; color:#111827; border:none; border-radius:8px; font-weight:600; cursor:pointer;';
                    cancelBtn.onclick = () => { closeProjectModal(); if (options.onCancel) options.onCancel(); };
                    footer.appendChild(cancelBtn);
                    const confirmBtn = document.createElement('button');
                    confirmBtn.textContent = options.confirmText || 'হ্যাঁ, মুছুন';
                    confirmBtn.style.cssText = 'padding:10px 16px; background:#ef4444; color:#fff; border:none; border-radius:8px; font-weight:600; cursor:pointer;';
                    confirmBtn.onclick = () => { closeProjectModal(); if (options.onConfirm) options.onConfirm(); };
                    footer.appendChild(confirmBtn);
                    overlay.style.display = 'block';
                    modal.style.display = 'flex';
                    return;
                }

                // For success/error/warning — use centered toast
                const typeMap = { success: 'success', error: 'error', warning: 'warning' };
                const toastType = typeMap[options.type] || 'info';
                if (window.showToast) {
                    window.showToast(toastType, options.title, options.message, 4000);
                } else if (window.showSuccess && options.type === 'success') {
                    window.showSuccess(options.message, options.title);
                } else if (window.showError && options.type === 'error') {
                    window.showError(options.message, options.title);
                }
                // Fire onConfirm immediately for non-confirm types
                if (options.onConfirm) setTimeout(options.onConfirm, 100);
            };
            
            window.closeProjectModal = function() {
                document.getElementById('projectConfirmOverlay').style.display = 'none';
                document.getElementById('projectConfirmModal').style.display = 'none';
            };
            
            // Close on overlay click
            document.getElementById('projectConfirmOverlay')?.addEventListener('click', closeProjectModal);
            
            // Close on ESC key
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeProjectModal();
            });
            
            // Load all sections on page load
            async function loadAllSections() {
                const sections = ['hero', 'slogan'];
                
                for (const section of sections) {
                    try {
                        const response = await fetch(`/api/project-sections?section_key=${section}`);
                        if (response.ok) {
                            const data = await response.json();
                            if (data) {
                                populateSection(section, data);
                                updateDashboardStatus(section, data);
                            } else {
                                updateDashboardStatus(section, null);
                            }
                        }
                    } catch (error) {
                        console.error(`Error loading ${section}:`, error);
                    }
                }
            }
            
            function populateSection(section, data) {
                if (section === 'hero') {
                    if (data.title) document.getElementById('projects-hero-title').value = data.title;
                    if (data.subtitle) document.getElementById('projects-hero-subtitle').value = data.subtitle;
                    if (data.content) document.getElementById('projects-hero-content').value = data.content;
                    if (data.image_url) showImagePreview('hero', data.image_url);
                } else if (section === 'slogan') {
                    if (data.title) document.getElementById('projects-slogan-title').value = data.title;
                    if (data.content) document.getElementById('projects-slogan-content').value = data.content;
                    if (data.logo_url) showImagePreview('slogan-logo', data.logo_url);
                }
            }

            function updateDashboardStatus(section, data) {
                const statusTextEl = document.getElementById(`${section}-status-text`);
                const previewEl = document.getElementById(`${section}-content-preview`);
                const previewTextEl = document.getElementById(`${section}-preview-text`);
                const editBtnEl = document.getElementById(`${section}-edit-btn`);
                
                if (statusTextEl) {
                    if (data && (data.title || data.content)) {
                        statusTextEl.innerHTML = '<i class="fas fa-check"></i> সংরক্ষিত';
                        statusTextEl.style.color = '#059669';
                        statusTextEl.style.fontWeight = '600';
                        
                        // Show preview
                        if (previewEl && previewTextEl) {
                            let previewHTML = '';
                            if (data.title) previewHTML += `<div><strong>শিরোনাম:</strong> ${data.title}</div>`;
                            if (data.subtitle) previewHTML += `<div><strong>সাব-টাইটেল:</strong> ${data.subtitle}</div>`;
                            if (data.content) previewHTML += `<div><strong>বিবরণ:</strong> ${data.content.substring(0, 100)}${data.content.length > 100 ? '...' : ''}</div>`;
                            
                            previewTextEl.innerHTML = previewHTML;
                            previewEl.style.display = 'block';
                        }
                        
                        // Show edit button
                        if (editBtnEl) {
                            editBtnEl.style.display = 'inline-block';
                        }
                        
                        // Show clear button
                        const clearBtnEl = document.getElementById(`${section}-clear-btn`);
                        if (clearBtnEl) {
                            clearBtnEl.style.display = 'inline-block';
                        }
                    } else {
                        statusTextEl.textContent = 'কোনো ডেটা নেই';
                        statusTextEl.style.color = '#f59e0b';
                        statusTextEl.style.fontWeight = '400';
                        
                        // Hide preview, edit button, and clear button
                        if (previewEl) previewEl.style.display = 'none';
                        if (editBtnEl) editBtnEl.style.display = 'none';
                        const clearBtnEl = document.getElementById(`${section}-clear-btn`);
                        if (clearBtnEl) clearBtnEl.style.display = 'none';
                    }
                }
            }
            
            window.clearProjectContent = async function(section) {
                // Show confirmation dialog
                const sectionName = section === 'hero' ? 'হিরো সেকশন' : 'স্লোগান সেকশন';
                
                const confirmed = await showProjectsConfirm(`আপনি কি নিশ্চিত যে আপনি ${sectionName} এর সমস্ত কন্টেন্ট মুছে ফেলতে চান?\n\nএটি স্থায়ীভাবে মুছে যাবে এবং পুনরুদ্ধার করা যাবে না।`, 'কন্টেন্ট মুছুন');
                if (!confirmed) {
                    return;
                }
                
                // Clear all form fields
                if (section === 'hero') {
                    document.getElementById('projects-hero-title').value = '';
                    document.getElementById('projects-hero-subtitle').value = '';
                    document.getElementById('projects-hero-content').value = '';
                    document.getElementById('projects-hero-image').value = '';
                    document.getElementById('projects-hero-image-preview').innerHTML = '';
                } else if (section === 'slogan') {
                    document.getElementById('projects-slogan-title').value = '';
                    document.getElementById('projects-slogan-content').value = '';
                    document.getElementById('projects-slogan-logo').value = '';
                    document.getElementById('projects-slogan-logo-preview').innerHTML = '';
                }
                
                // Update dashboard status
                updateDashboardStatus(section, null);
                
                // Show success message
                const statusEl = document.getElementById(`projects-${section}-status`);
                if (statusEl) {
                    statusEl.innerHTML = '<i class="fas fa-check"></i> সমস্ত কন্টেন্ট মুছে ফেলা হয়েছে';
                    statusEl.className = 'project-status success';
                    statusEl.style.display = 'inline-block';
                    setTimeout(() => {
                        statusEl.style.display = 'none';
                    }, 3000);
                }
                
                // Clear from localStorage
                try {
                    localStorage.removeItem(`projectsPreview_${section}`);
                    localStorage.setItem('refreshProjectsPage', Date.now().toString());
                        } catch(e) {}
            };
            
            window.editProjectContent = function(section) {
                // Scroll to the form
                const formSection = document.getElementById(`projects-${section}`);
                if (formSection) {
                    formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    
                    // Highlight the form briefly
                    formSection.style.transition = 'all 0.3s';
                    formSection.style.transform = 'scale(1.02)';
                    formSection.style.boxShadow = '0 0 20px rgba(124, 58, 237, 0.3)';
                    
                    setTimeout(() => {
                        formSection.style.transform = 'scale(1)';
                        formSection.style.boxShadow = 'none';
                    }, 500);
                    
                    // Focus on first input
                    const firstInput = formSection.querySelector('input[type="text"]');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 600);
                    }
                }
            };
            
            function showImagePreview(section, imageUrl) {
                const previewDiv = document.getElementById(`projects-${section}-image-preview`);
                if (previewDiv) {
                    previewDiv.innerHTML = `<img src="${imageUrl}" alt="Preview" />`;
                }
            }
            
            window.previewProjectImage = function(section) {
                let input, previewDiv;
                
                if (section === 'slogan-logo') {
                    input = document.getElementById('projects-slogan-logo');
                    previewDiv = document.getElementById('projects-slogan-logo-preview');
                } else {
                    input = document.getElementById(`projects-${section}-image`);
                    previewDiv = document.getElementById(`projects-${section}-image-preview`);
                }
                
                if (input && input.files && input.files[0]) {
                    const file = input.files[0];
                    
                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showProjectModal({
                            type: 'warning',
                            title: 'ফাইল সাইজ বড়',
                            message: 'ফাইলের আকার ৫ এমবি এর কম হতে হবে।',
                            confirmText: 'ঠিক আছে',
                            showCancel: false
                        });
                        input.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (previewDiv) {
                            previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
                        }
                    };
                    reader.readAsDataURL(file);
                }
            };

            window.previewProjectSection = function(section) {
                // Collect current form data
                let previewData = {};
                
                if (section === 'hero') {
                    previewData = {
                        title: document.getElementById('projects-hero-title').value,
                        subtitle: document.getElementById('projects-hero-subtitle').value,
                        content: document.getElementById('projects-hero-content').value
                    };
                    
                    // Get image preview if available
                    const imageInput = document.getElementById('projects-hero-image');
                    if (imageInput.files && imageInput.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewData.image_url = e.target.result;
                            sendPreviewData(section, previewData);
                        };
                        reader.readAsDataURL(imageInput.files[0]);
                        return;
                    } else {
                        // Check if there's an existing image
                        const existingImage = document.querySelector('#projects-hero-image-preview img');
                        if (existingImage) {
                            previewData.image_url = existingImage.src;
                        }
                    }
                } else if (section === 'slogan') {
                    previewData = {
                        title: document.getElementById('projects-slogan-title').value,
                        content: document.getElementById('projects-slogan-content').value
                    };
                    
                    // Get logo preview if available
                    const logoInput = document.getElementById('projects-slogan-logo');
                    if (logoInput.files && logoInput.files[0]) {
                            const reader = new FileReader();
                        reader.onload = function(e) {
                            previewData.logo_url = e.target.result;
                            sendPreviewData(section, previewData);
                        };
                        reader.readAsDataURL(logoInput.files[0]);
                        return;
                    } else {
                        // Check if there's an existing logo
                        const existingLogo = document.querySelector('#projects-slogan-logo-preview img');
                        if (existingLogo) {
                            previewData.logo_url = existingLogo.src;
                        }
                    }
                }
                
                sendPreviewData(section, previewData);
            };

            function sendPreviewData(section, data) {
                // Store preview data in localStorage for real-time preview
                try {
                    localStorage.setItem(`projectsPreview_${section}`, JSON.stringify(data));
                    localStorage.setItem('refreshProjectsPage', Date.now().toString());
                    
                    // Show success message
                    const statusEl = document.getElementById(`projects-${section}-status`);
                    if (statusEl) {
                        statusEl.innerHTML = '<i class="fas fa-check"></i> প্রিভিউ আপডেট হয়েছে - প্রকল্প পেজ চেক করুন';
                        statusEl.className = 'project-status success';
                        statusEl.style.display = 'inline-block';
                        setTimeout(() => {
                            statusEl.style.display = 'none';
                        }, 3000);
                    }

                    // Open projects page in new tab
                    window.open('/projects', '_blank');
                } catch(e) {
                    console.error('Preview error:', e);
                }
            }
            
            window.saveProjectSection = async function(section) {
                const statusEl = document.getElementById(`projects-${section}-status`);
                
                // Collect data based on section
                const formData = new FormData();
                formData.append('section_key', section);
                
                if (section === 'hero') {
                    formData.append('title', document.getElementById('projects-hero-title').value);
                    formData.append('subtitle', document.getElementById('projects-hero-subtitle').value);
                    formData.append('content', document.getElementById('projects-hero-content').value);
                    const imageFile = document.getElementById('projects-hero-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'slogan') {
                    formData.append('title', document.getElementById('projects-slogan-title').value);
                    formData.append('content', document.getElementById('projects-slogan-content').value);
                    const logoFile = document.getElementById('projects-slogan-logo').files[0];
                    if (logoFile) formData.append('logo', logoFile);
                }
                
                // Show loading status
                if (statusEl) {
                    statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                    statusEl.className = 'project-status';
                    statusEl.style.display = 'inline-block';
                    statusEl.style.background = '#f3f4f6';
                    statusEl.style.color = '#666';
                }
                
                try {
                    const response = await fetch('/admin/project-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        if (statusEl) {
                            statusEl.innerHTML = '<i class="fas fa-check"></i> সফলভাবে সংরক্ষিত হয়েছে';
                            statusEl.className = 'project-status success';
                            setTimeout(() => {
                                statusEl.style.display = 'none';
                            }, 3000);
                        }
                        
                        // Update dashboard status
                        updateDashboardStatus(section, result.data);
                        
                        // Trigger refresh on frontend
                        try {
                            localStorage.setItem('refreshProjectsPage', Date.now().toString());
                        } catch(e) {}

                        // Reload the section data
                        loadAllSections();
                    } else {
                        throw new Error('Save failed');
                    }
                } catch (error) {
                    console.error('Error saving:', error);
                    if (statusEl) {
                        statusEl.innerHTML = '<i class="fas fa-times"></i> সংরক্ষণ ব্যর্থ হয়েছে';
                        statusEl.className = 'project-status error';
                    }
                }
            };
            
            // Load sections — lazy load when projects tab is first opened
            if (window.registerTabLoader) {
                registerTabLoader('projects', loadAllSections);
            } else { loadAllSections(); }

            // Load once on page load only — never auto-reload to preserve user edits

            // ==================== OUR PROJECTS MANAGEMENT ====================
            
            let ourProjects = [];
            let editingProjectId = null;

            // Load all projects
            async function loadOurProjects() {
                try {
                    const response = await fetch('/api/our-projects');
                    if (response.ok) {
                        ourProjects = await response.json();
                        console.log('Loaded projects:', ourProjects);
                        renderOurProjects();
                        updateProjectCount();
                    } else {
                        console.error('Failed to load projects:', response.status);
                    }
                } catch (error) {
                    console.error('Error loading projects:', error);
                }
            }

            // Render all project cards
            function renderOurProjects() {
                const container = document.getElementById('our-projects-container');
                if (!container) return;

                container.innerHTML = '';

                ourProjects.forEach((project, index) => {
                    const card = createProjectCard(project, index);
                    container.appendChild(card);
                });
            }

            // Create a project card
            function createProjectCard(project, index) {
                const card = document.createElement('div');
                card.className = 'project-card';
                card.setAttribute('data-project-id', project.id || '');

                card.innerHTML = `
                    <div class="project-card-header">
                        <div class="project-card-title">প্রজেক্ট #${index + 1}</div>
                        <div class="project-card-actions">
                            ${project.id ? `<button class="project-card-btn delete" onclick="deleteOurProject(${project.id})" type="button" style="cursor: pointer;"><i class="fas fa-trash"></i> মুছুন</button>` : ''}
        </div>
    </div>

                    <div class="project-form-group">
                        <label>প্রজেক্টের নাম</label>
                        <input type="text" class="project-title-input" value="${project.title || ''}" placeholder="যেমন: শান্তি নিবাস" />
                </div>

                    <div class="project-form-group">
                            <label>বিবরণ</label>
                        <textarea class="project-desc-input" placeholder="প্রজেক্ট সম্পর্কে বিস্তারিত...">${project.description || ''}</textarea>
                        </div>

                    <div class="project-form-group">
                        <label>CTA বাটন টেক্সট</label>
                        <input type="text" class="project-cta-text-input" value="${project.cta_text || 'বিস্তারিত জানুন'}" placeholder="বিস্তারিত জানুন" />
                        </div>

                    <div class="project-form-group">
                        <label>CTA বাটন লিংক</label>
                        <input type="text" class="project-cta-link-input" value="${project.cta_link || ''}" placeholder="https://example.com অথবা #contact" />
                        <small style="color:#6b7280; font-size:12px;">বাহ্যিক লিংকের জন্য https:// দিয়ে শুরু করুন। পেজের সেকশনের জন্য #contact ব্যবহার করুন।</small>
                        </div>

                    <div class="project-form-group">
                        <label>প্রজেক্ট ইমেজ (মেইন) আপলোড করুন</label>
                        ${project.image_url ? `
                            <div style="margin-top: 10px; margin-bottom: 10px; padding: 12px; background: #f0fdf4; border: 2px solid #86efac; border-radius: 8px;">
                                <small style="color: #166534; font-weight: 600; display: block; margin-bottom: 8px;"><i class="fas fa-check"></i> বর্তমান ইমেজ সংরক্ষিত আছে</small>
                                <img src="${project.image_url}" class="project-card-image-preview" 
                                     style="display: block !important; width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; border: 2px solid #86efac;" 
                                     onerror="this.style.display='none';" />
                                <div style="display: none; padding: 20px; background: #fee2e2; color: #991b1b; border-radius: 6px; text-align: center;">
                                    ⚠️ ইমেজ লোড করতে ব্যর্থ - নতুন ইমেজ আপলোড করুন
                    </div>
                        </div>
                        ` : ''}
                        <input type="file" class="project-image-input" accept="image/*" onchange="previewProjectCardImage(this)" />
                        <small style="display: block; margin-top: 6px; padding: 8px 10px; background: #fffbeb; border: 1px solid #fcd34d; border-radius: 6px; color: #92400e; font-size: 12px;">
                            📐 প্রস্তাবিত রেজোলিউশন: <strong>৯০০×৪০০ পিক্সেল</strong> | সর্বোচ্চ ফাইল সাইজ: <strong>৫ MB</strong> | ফরম্যাট: JPG, PNG, WEBP
                        </small>
                        <div class="project-image-preview-container"></div>
                        </div>

                    <div class="project-form-group">
                        <label>অতিরিক্ত ইমেজ (স্লাইডার) — একাধিক নির্বাচন করুন</label>
                        ${(project.images && project.images.length > 0) ? `
                            <div style="display:flex; gap:8px; flex-wrap:wrap; margin-bottom:10px;" class="existing-extra-images">
                                ${project.images.map((img, i) => {
                                    const rawPath = img.replace(/^\/storage\//, '');
                                    const displayUrl = img.startsWith('/') ? img : '/storage/' + img;
                                    return `
                                    <div style="position:relative;" data-img-path="${rawPath}">
                                        <img src="${displayUrl}" style="width:80px; height:60px; object-fit:cover; border-radius:6px; border:2px solid #86efac;" onerror="this.style.display='none'" />
                                        <button type="button" onclick="removeExtraImage(this, '${rawPath}', ${project.id})" style="position:absolute; top:-6px; right:-6px; background:#ef4444; color:#fff; border:none; border-radius:50%; width:18px; height:18px; font-size:10px; cursor:pointer; line-height:1;">×</button>
                                    </div>`;
                                }).join('')}
                            </div>
                        ` : '<p style="color:#94a3b8; font-size:13px; margin-bottom:8px;">এখনো কোনো অতিরিক্ত ইমেজ নেই</p>'}
                        <input type="file" class="project-extra-images-input" accept="image/*" multiple onchange="previewExtraImages(this)" />
                        <small style="display: block; margin-top: 6px; padding: 8px 10px; background: #fffbeb; border: 1px solid #fcd34d; border-radius: 6px; color: #92400e; font-size: 12px;">
                            📐 প্রস্তাবিত রেজোলিউশন: <strong>৯০০×৪০০ পিক্সেল</strong> | সর্বোচ্চ ফাইল সাইজ: <strong>৫ MB প্রতিটি</strong> | নতুন ছবি যোগ হবে, পুরানো থাকবে
                        </small>
                        <div class="project-extra-images-preview" style="display:flex; gap:8px; flex-wrap:wrap; margin-top:8px;"></div>
                        </div>

                    <button class="project-save-btn" onclick="saveOurProject(this)" style="margin-top: 15px;">
                        ${project.id ? '<i class="fas fa-save"></i> আপডেট করুন' : '<i class="fas fa-save"></i> সংরক্ষণ করুন'}
                    </button>
                `;

                return card;
            }

            // Add new project card
            window.addNewProjectCard = function() {
                const newProject = {
                    title: '',
                    description: '',
                    cta_text: 'বিস্তারিত জানুন',
                    cta_link: '',
                    order: ourProjects.length
                };
                ourProjects.push(newProject);
                renderOurProjects();
            };

            // Preview project card image
            window.previewProjectCardImage = function(input) {
                const card = input.closest('.project-card');
                const previewContainer = card.querySelector('.project-image-preview-container');
                
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    
                    if (file.size > 5 * 1024 * 1024) {
                        showProjectModal({
                            type: 'warning',
                            title: 'ফাইল সাইজ বড়',
                            message: `ফাইলের আকার ${(file.size/1024/1024).toFixed(2)}MB। সর্বোচ্চ ৫MB অনুমোদিত।`,
                            confirmText: 'ঠিক আছে',
                            showCancel: false
                        });
                        input.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `<img src="${e.target.result}" class="project-card-image-preview" />`;
                    };
                    reader.readAsDataURL(file);
                }
            };

            // Preview extra images
            window.previewExtraImages = function(input) {
                const card = input.closest('.project-card');
                const previewContainer = card.querySelector('.project-extra-images-preview');
                if (!previewContainer) return;
                previewContainer.innerHTML = '';
                Array.from(input.files).forEach(file => {
                    if (file.size > 5 * 1024 * 1024) {
                        showProjectModal({ type: 'warning', title: 'ফাইল বড়', message: `${file.name}: সর্বোচ্চ ৫MB অনুমোদিত।`, confirmText: 'ঠিক আছে', showCancel: false });
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.cssText = 'width:80px;height:60px;object-fit:cover;border-radius:6px;border:2px solid #86efac;';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            };

            // Remove extra image
            window.removeExtraImage = async function(btn, imgPath, projectId) {
                if (!confirm('এই ছবিটি মুছে ফেলবেন?')) return;
                try {
                    const res = await fetch(`/admin/our-projects/${projectId}/remove-image`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
                        body: JSON.stringify({ image_path: imgPath })
                    });
                    const result = await res.json();
                    if (result.success) {
                        btn.closest('div').remove();
                        if (window.showSuccess) window.showSuccess('ছবি মুছে ফেলা হয়েছে');
                    }
                } catch(e) {}
            };

            // Save project
            window.saveOurProject = async function(button) {
                const card = button.closest('.project-card');
                const projectId = card.getAttribute('data-project-id');
                
                const formData = new FormData();
                formData.append('title', card.querySelector('.project-title-input').value);
                formData.append('description', card.querySelector('.project-desc-input').value);
                formData.append('cta_text', card.querySelector('.project-cta-text-input').value);
                formData.append('cta_link', card.querySelector('.project-cta-link-input').value);
                
                const imageInput = card.querySelector('.project-image-input');
                if (imageInput.files && imageInput.files[0]) {
                    formData.append('image', imageInput.files[0]);
                }

                // Extra images for slider
                const extraInput = card.querySelector('.project-extra-images-input');
                if (extraInput && extraInput.files && extraInput.files.length > 0) {
                    let oversized = false;
                    Array.from(extraInput.files).forEach(f => {
                        if (f.size > 5 * 1024 * 1024) {
                            oversized = true;
                            showProjectModal({ type: 'warning', title: 'ফাইল বড়', message: `"${f.name}" (${(f.size/1024/1024).toFixed(1)}MB) — সর্বোচ্চ ৫MB অনুমোদিত।`, confirmText: 'ঠিক আছে', showCancel: false });
                        } else {
                            formData.append('images[]', f);
                        }
                    });
                    if (oversized) { button.innerHTML = projectId ? '<i class="fas fa-save"></i> আপডেট করুন' : '<i class="fas fa-save"></i> সংরক্ষণ করুন'; button.disabled = false; return; }
                }

                // Validate
                if (!formData.get('title')) {
                    showProjectModal({
                        type: 'warning',
                        title: 'সতর্কতা',
                        message: 'প্রজেক্টের নাম প্রয়োজন',
                        confirmText: 'ঠিক আছে',
                        showCancel: false
                    });
                    return;
                }
                if (!formData.get('description')) {
                    showProjectModal({
                        type: 'warning',
                        title: 'সতর্কতা',
                        message: 'বিবরণ প্রয়োজন',
                        confirmText: 'ঠিক আছে',
                        showCancel: false
                    });
                    return;
                }
                // Only require image for new projects
                if (!projectId && !imageInput.files[0]) {
                    showProjectModal({
                        type: 'warning',
                        title: 'সতর্কতা',
                        message: 'নতুন প্রজেক্টের জন্য ইমেজ আপলোড করুন',
                        confirmText: 'ঠিক আছে',
                        showCancel: false
                    });
                    return;
                }

                button.textContent = 'সংরক্ষণ করা হচ্ছে...';
                button.disabled = true;

                try {
                    let url = '/admin/our-projects';
                    let method = 'POST';
                    
                    if (projectId) {
                        url = `/admin/our-projects/${projectId}`;
                        formData.append('_method', 'PUT');
                    }

                    // Log what we're sending
                    console.log('Saving project to:', url);
                    console.log('Title:', formData.get('title'));
                    console.log('Description:', formData.get('description'));
                    console.log('Image:', formData.get('image'));
                    console.log('CTA Text:', formData.get('cta_text'));
                    console.log('CTA Link:', formData.get('cta_link'));

                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });

                    console.log('Response status:', response.status);
                    console.log('Response OK:', response.ok);

                    const result = await response.json();
                    console.log('Response data:', result);

                    if (result.success) {
                        showProjectModal({
                            type: 'success',
                            title: 'সফল',
                            message: 'প্রজেক্ট সফলভাবে সংরক্ষিত হয়েছে',
                            confirmText: 'ঠিক আছে',
                            showCancel: false,
                            onConfirm: async () => {
                                // Reload projects to show updated data with image
                                await loadOurProjects();
                                
                                // Trigger frontend refresh - multiple methods for reliability
                                try {
                                    localStorage.setItem('refreshOurProjects', Date.now().toString());
                                    window.dispatchEvent(new CustomEvent('ourProjectsUpdated'));
                                    window.dispatchEvent(new StorageEvent('storage', {
                                        key: 'refreshOurProjects',
                                        newValue: Date.now().toString()
                                    }));
                                } catch(e) { 
                                    console.error('LocalStorage error:', e); 
                                }
                            }
                        });
                    } else {
                        // Show specific error
                        const errorMsg = result.message || result.error || 'Unknown error';
                        console.error('Save failed:', errorMsg, result);
                        
                        // Show validation errors if present
                        let fullErrorMsg = errorMsg;
                        if (result.errors) {
                            console.error('Validation errors:', result.errors);
                            fullErrorMsg += '\n\n';
                            for (let field in result.errors) {
                                fullErrorMsg += `${field}: ${result.errors[field].join(', ')}\n`;
                            }
                        }
                        
                        showProjectModal({
                            type: 'error',
                            title: 'ত্রুটি',
                            message: fullErrorMsg,
                            confirmText: 'ঠিক আছে',
                            showCancel: false
                        });
                    }
                } catch (error) {
                    console.error('Error saving project:', error);
                    showProjectModal({
                        type: 'error',
                        title: 'ত্রুটি',
                        message: 'সংরক্ষণ ব্যর্থ হয়েছে: ' + error.message,
                        confirmText: 'ঠিক আছে',
                        showCancel: false
                    });
                } finally {
                    button.innerHTML = projectId ? '<i class="fas fa-save"></i> আপডেট করুন' : '<i class="fas fa-save"></i> সংরক্ষণ করুন';
                    button.disabled = false;
                }
            };

            // Delete project
            window.deleteOurProject = async function(projectId) {
                if (!projectId) {
                    console.error('Project ID is missing');
                    showProjectModal({
                        type: 'error',
                        title: 'ত্রুটি',
                        message: 'প্রজেক্ট ID পাওয়া যায়নি',
                        confirmText: 'ঠিক আছে',
                        showCancel: false
                    });
                    return;
                }
                
                console.log('Delete function called with project ID:', projectId);
                
                showProjectModal({
                    type: 'confirm',
                    title: 'প্রজেক্ট মুছে ফেলা',
                    message: 'আপনি কি নিশ্চিত যে আপনি এই প্রজেক্টটি মুছে ফেলতে চান?\n\nএটি স্থায়ীভাবে মুছে যাবে এবং পুনরুদ্ধার করা যাবে না।',
                    confirmText: 'হ্যাঁ, মুছে ফেলুন',
                    cancelText: 'না',
                    onConfirm: async () => {
                        try {
                            console.log('Deleting project:', projectId);
                            
                            const response = await fetch(`/admin/our-projects/${projectId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json'
                                }
                            });

                            console.log('Delete response status:', response.status);
                            
                            if (!response.ok) {
                                const errorText = await response.text();
                                console.error('Delete failed:', errorText);
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }

                            const result = await response.json();
                            console.log('Delete result:', result);

                            if (result.success) {
                                showProjectModal({
                                    type: 'success',
                                    title: 'সফল',
                                    message: result.message || 'প্রজেক্ট সফলভাবে মুছে ফেলা হয়েছে',
                                    confirmText: 'ঠিক আছে',
                                    showCancel: false,
                                    onConfirm: async () => {
                                        // Reload projects
                                        await loadOurProjects();
                                        
                                        // Trigger frontend refresh
                                        try {
                                            localStorage.setItem('refreshOurProjects', Date.now().toString());
                                            window.dispatchEvent(new CustomEvent('ourProjectsUpdated'));
                                            window.dispatchEvent(new StorageEvent('storage', {
                                                key: 'refreshOurProjects',
                                                newValue: Date.now().toString()
                                            }));
                                        } catch(e) { 
                                            console.error('LocalStorage error:', e); 
                                        }
                                    }
                                });
                            } else {
                                throw new Error(result.message || 'Delete failed');
                            }
                        } catch (error) {
                            console.error('Error deleting project:', error);
                            showProjectModal({
                                type: 'error',
                                title: 'ত্রুটি',
                                message: 'মুছে ফেলা ব্যর্থ হয়েছে: ' + (error.message || 'Unknown error'),
                                confirmText: 'ঠিক আছে',
                                showCancel: false
                            });
                        }
                    }
                });
            };

            // Update project count
            function updateProjectCount() {
                const countEl = document.getElementById('our-projects-count');
                if (countEl) {
                    countEl.textContent = ourProjects.length;
                }
            }

            // Load projects on page load
            loadOurProjects();

                })();
            </script>
</div>
<!-- Professional Confirmation Modal -->
<div id="projectsConfirmModal" class="projects-confirm-modal">
    <div class="projects-confirm-modal-content">
        <div class="projects-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="projectsConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="projectsConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="projects-confirm-modal-actions">
            <button class="projects-confirm-btn projects-confirm-btn-cancel" id="projectsConfirmModalCancel">বাতিল করুন</button>
            <button class="projects-confirm-btn projects-confirm-btn-confirm" id="projectsConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
        </div>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .projects-confirm-modal {
        display: none;
        position: fixed;
        z-index: 99999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        backdrop-filter: blur(5px);
        animation: fadeIn 0.3s ease;
    }

    .projects-confirm-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .projects-confirm-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .projects-confirm-modal-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        background: #fee2e2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #dc2626;
    }

    .projects-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #projectsConfirmModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #projectsConfirmModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
        white-space: pre-line;
    }

    .projects-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .projects-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .projects-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .projects-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .projects-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .projects-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<script>
    // Professional Modal Functions
    function showProjectsConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('projectsConfirmModal');
            const titleEl = document.getElementById('projectsConfirmModalTitle');
            const messageEl = document.getElementById('projectsConfirmModalMessage');
            const confirmBtn = document.getElementById('projectsConfirmModalConfirm');
            const cancelBtn = document.getElementById('projectsConfirmModalCancel');
            
            titleEl.textContent = title;
            messageEl.textContent = message;
            modal.classList.add('active');
            
            const handleConfirm = () => {
                modal.classList.remove('active');
                confirmBtn.removeEventListener('click', handleConfirm);
                cancelBtn.removeEventListener('click', handleCancel);
                modal.removeEventListener('click', handleBackdrop);
                resolve(true);
            };
            
            const handleCancel = () => {
                modal.classList.remove('active');
                confirmBtn.removeEventListener('click', handleConfirm);
                cancelBtn.removeEventListener('click', handleCancel);
                modal.removeEventListener('click', handleBackdrop);
                resolve(false);
            };
            
            const handleBackdrop = (e) => {
                if (e.target === modal) {
                    handleCancel();
                }
            };
            
            confirmBtn.addEventListener('click', handleConfirm);
            cancelBtn.addEventListener('click', handleCancel);
            modal.addEventListener('click', handleBackdrop);
        });
    }
</script>