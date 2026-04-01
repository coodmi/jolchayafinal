<div id="home-partners" class="tab-content" style="display: none;">
    <div class="content-header">
        <h2 style="font-size: 1.8rem; font-weight: 700; color: #0a3622; margin-bottom: 8px;">
            <i class="fas fa-handshake" style="margin-right: 10px; color: #ffd700;"></i>পার্টনারসমূহ
        </h2>
        <p style="color: #64748b; font-size: 0.95rem;">আপনার ব্যবসার পার্টনার লোগো যোগ করুন এবং পরিচালনা করুন</p>
    </div>

    <div class="section-card" style="margin-bottom: 30px;">
        <div class="section-card-header">
            <h3 style="font-size: 1.2rem; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-plus-circle" style="color: #10b981;"></i>
                নতুন পার্টনার যোগ করুন
            </h3>
        </div>
        <div class="section-card-body">
            <form id="addPartnerForm" enctype="multipart/form-data">
                <div class="form-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label for="partnerName" class="form-label">পার্টনারের নাম <span style="color: #ef4444;">*</span></label>
                        <input type="text" id="partnerName" name="name" class="form-control" required placeholder="যেমন: Google, Microsoft">
                    </div>
                    <div class="form-group">
                        <label for="partnerWebsite" class="form-label">ওয়েবসাইট URL</label>
                        <input type="url" id="partnerWebsite" name="website_url" class="form-control" placeholder="https://example.com">
                    </div>
                    <div class="form-group">
                        <label for="partnerOrder" class="form-label">ক্রমিক নম্বর</label>
                        <input type="number" id="partnerOrder" name="order" class="form-control" placeholder="১, ২, ৩..." min="0">
                    </div>
                    <div class="form-group">
                        <label for="partnerType" class="form-label">টাইপ</label>
                        <input type="text" id="partnerType" name="type" class="form-control" placeholder="যেমন: Technology Partner, Strategic Partner">
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="partnerLogo" class="form-label">লোগো আপলোড করুন</label>
                    <div class="file-upload-wrapper">
                        <input type="file" id="partnerLogo" name="logo" accept="image/*" class="file-input">
                        <label for="partnerLogo" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 2rem; color: #3b82f6; margin-bottom: 10px;"></i>
                            <span class="file-upload-text">ছবি নির্বাচন করুন বা এখানে ড্র্যাগ করুন</span>
                            <span class="file-upload-hint">PNG, JPG, SVG, WebP (Max: 2MB)</span>
                        </label>
                        <div id="partnerLogoPreview" class="image-preview" style="display: none;">
                            <img id="partnerLogoPreviewImg" src="" alt="Preview">
                            <button type="button" class="remove-image-btn" onclick="removePartnerLogoPreview()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="checkbox-label">
                        <input type="checkbox" id="partnerIsActive" name="is_active" checked>
                        <span class="checkbox-text">সক্রিয় করুন</span>
                    </label>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> সংরক্ষণ করুন
                    </button>
                    <button type="reset" class="btn btn-secondary" onclick="resetPartnerForm()">
                        <i class="fas fa-redo"></i> রিসেট
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="section-card">
        <div class="section-card-header">
            <h3 style="font-size: 1.2rem; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-list" style="color: #3b82f6;"></i>
                সকল পার্টনার
            </h3>
            <div id="partnersCount" class="badge-count">0</div>
        </div>
        <div class="section-card-body">
            <div id="partnersListLoading" class="loading-state">
                <div class="spinner"></div>
                <p>লোড হচ্ছে...</p>
            </div>
            <div id="partnersListEmpty" class="empty-state" style="display: none;">
                <i class="fas fa-handshake" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                <h4 style="color: #64748b; margin-bottom: 10px;">কোন পার্টনার নেই</h4>
                <p style="color: #94a3b8;">উপরের ফর্ম ব্যবহার করে আপনার প্রথম পার্টনার যোগ করুন</p>
            </div>
            <div id="partnersGrid" class="partners-admin-grid"></div>
        </div>
    </div>

    <!-- Professional Confirmation Modal -->
    <div id="partnerConfirmModal" class="partner-confirm-modal">
        <div class="partner-confirm-modal-content">
            <div class="partner-confirm-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
            </div>
            <h3 id="partnerConfirmModalTitle">নিশ্চিত করুন</h3>
            <p id="partnerConfirmModalMessage">আপনি কি নিশ্চিত?</p>
            <div class="partner-confirm-modal-actions">
                <button class="partner-confirm-btn partner-confirm-btn-cancel" id="partnerConfirmModalCancel">বাতিল করুন</button>
                <button class="partner-confirm-btn partner-confirm-btn-confirm" id="partnerConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
            </div>
        </div>
    </div>

    <!-- Professional Alert Modal -->
    <div id="partnerAlertModal" class="partner-alert-modal">
        <div class="partner-alert-modal-content">
            <div class="partner-alert-modal-icon" id="partnerAlertModalIcon">
                <svg class="partner-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="partner-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="partner-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                <svg class="partner-errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="partner-errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="partner-errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
                </svg>
            </div>
            <h3 id="partnerAlertModalTitle"></h3>
            <p id="partnerAlertModalMessage"></p>
            <button class="partner-alert-modal-btn" id="partnerAlertModalBtn">ঠিক আছে</button>
        </div>
    </div>
</div>

<style>
    .partners-admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .partner-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
        position: relative;
    }

    .partner-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-color: #cbd5e1;
    }

    .partner-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .partner-logo-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80px;
        background: #f8fafc;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .partner-logo-container img {
        max-width: 100%;
        max-height: 60px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(30%);
    }

    .partner-info {
        margin-bottom: 15px;
    }

    .partner-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #0f172a;
        margin-bottom: 5px;
    }

    .partner-website {
        font-size: 0.875rem;
        color: #3b82f6;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        word-break: break-all;
    }

    .partner-website:hover {
        text-decoration: underline;
    }

    .partner-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .partner-status.active {
        background: #dcfce7;
        color: #166534;
    }

    .partner-status.inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    .partner-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
    }

    .file-upload-wrapper {
        position: relative;
    }

    .file-input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .file-upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .file-upload-label:hover {
        border-color: #3b82f6;
        background: #eff6ff;
    }

    .file-upload-text {
        color: #0f172a;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .file-upload-hint {
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .image-preview {
        margin-top: 15px;
        position: relative;
        display: inline-block;
    }

    .image-preview img {
        max-width: 200px;
        max-height: 100px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    .remove-image-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 12px;
    }

    .badge-count {
        background: #3b82f6;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* Professional Confirmation Modal Styles */
    .partner-confirm-modal, .partner-alert-modal {
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

    .partner-confirm-modal.active, .partner-alert-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .partner-confirm-modal-content, .partner-alert-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .partner-confirm-modal-icon {
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

    .partner-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #partnerConfirmModalTitle, #partnerAlertModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #partnerConfirmModalMessage, #partnerAlertModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .partner-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .partner-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .partner-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .partner-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .partner-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .partner-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    }

    /* Alert Modal Styles */
    .partner-alert-modal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .partner-alert-modal-icon svg {
        width: 100%;
        height: 100%;
    }

    .partner-checkmark, .partner-errormark {
        display: none;
    }

    .partner-alert-modal-content.success .partner-checkmark {
        display: block;
    }

    .partner-alert-modal-content.error .partner-errormark {
        display: block;
    }

    .partner-checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #10b981;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .partner-checkmark__check {
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: #10b981;
        stroke-width: 3;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
    }

    .partner-errormark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #dc2626;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .partner-errormark__cross {
        stroke-dasharray: 54;
        stroke-dashoffset: 54;
        stroke: #dc2626;
        stroke-width: 3;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
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

    .partner-alert-modal-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        padding: 0.875rem 2.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    .partner-alert-modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
    }

    .partner-alert-modal-content.error .partner-alert-modal-btn {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }
</style>

<script>
    let partnersData = [];
    let editingPartnerId = null;

    // Professional Modal Functions
    function showPartnerConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('partnerConfirmModal');
            const titleEl = document.getElementById('partnerConfirmModalTitle');
            const messageEl = document.getElementById('partnerConfirmModalMessage');
            const confirmBtn = document.getElementById('partnerConfirmModalConfirm');
            const cancelBtn = document.getElementById('partnerConfirmModalCancel');
            
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

    function showPartnerAlert(message, type = 'success', title = '') {
        const modal = document.getElementById('partnerAlertModal');
        const content = modal.querySelector('.partner-alert-modal-content');
        const titleEl = document.getElementById('partnerAlertModalTitle');
        const messageEl = document.getElementById('partnerAlertModalMessage');
        const btn = document.getElementById('partnerAlertModalBtn');
        
        if (!title) {
            title = type === 'success' ? 'সফল!' : 'দুঃখিত!';
        }
        
        content.classList.remove('success', 'error');
        content.classList.add(type);
        
        titleEl.textContent = title;
        messageEl.textContent = message;
        modal.classList.add('active');
        
        btn.onclick = function() {
            modal.classList.remove('active');
        };
        
        modal.onclick = function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        };
    }

    // Load partners on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Load immediately if the tab is visible
        const partnerTab = document.getElementById('home-partners');
        if (partnerTab && partnerTab.style.display !== 'none') {
            loadPartners();
        }
    });

    // Also load when navigating to this tab
    window.addEventListener('tabChanged', function(e) {
        if (e.detail && e.detail.tab === 'home-partners') {
            loadPartners();
        }
    });

    // Logo preview
    document.getElementById('partnerLogo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('partnerLogoPreviewImg').src = event.target.result;
                document.getElementById('partnerLogoPreview').style.display = 'block';
                document.querySelector('.file-upload-label').style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    function removePartnerLogoPreview() {
        document.getElementById('partnerLogo').value = '';
        document.getElementById('partnerLogoPreview').style.display = 'none';
        document.querySelector('.file-upload-label').style.display = 'flex';
    }

    function resetPartnerForm() {
        document.getElementById('addPartnerForm').reset();
        removePartnerLogoPreview();
        editingPartnerId = null;
        document.querySelector('#addPartnerForm button[type="submit"]').innerHTML = '<i class="fas fa-save"></i> সংরক্ষণ করুন';
    }

    // Load all partners
    function loadPartners() {
        document.getElementById('partnersListLoading').style.display = 'flex';
        document.getElementById('partnersListEmpty').style.display = 'none';
        document.getElementById('partnersGrid').style.display = 'none';

        fetch('/admin/partners')
            .then(response => response.json())
            .then(data => {
                partnersData = data;
                document.getElementById('partnersCount').textContent = data.length;
                document.getElementById('partnersListLoading').style.display = 'none';
                
                if (data.length === 0) {
                    document.getElementById('partnersListEmpty').style.display = 'flex';
                } else {
                    document.getElementById('partnersGrid').style.display = 'grid';
                    renderPartners(data);
                }
            })
            .catch(error => {
                console.error('Error loading partners:', error);
                document.getElementById('partnersListLoading').style.display = 'none';
                showNotification('পার্টনার লোড করতে সমস্যা হয়েছে', 'error');
            });
    }

    // Render partners grid
    function renderPartners(partners) {
        const grid = document.getElementById('partnersGrid');
        grid.innerHTML = partners.map(partner => `
            <div class="partner-card">
                <div class="partner-card-header">
                    <span class="partner-status ${partner.is_active ? 'active' : 'inactive'}">
                        <i class="fas fa-${partner.is_active ? 'check-circle' : 'times-circle'}"></i>
                        ${partner.is_active ? 'সক্রিয়' : 'নিষ্ক্রিয়'}
                    </span>
                    <span style="color: #94a3b8; font-size: 0.875rem;">Order: ${partner.order}</span>
                </div>
                <div class="partner-logo-container">
                    ${partner.logo_path ? 
                        `<img src="${partner.logo_url}" alt="${partner.name}">` : 
                        `<span style="color: #94a3b8; font-weight: 600;">${partner.name}</span>`
                    }
                </div>
                <div class="partner-info">
                    <div class="partner-name">${partner.name}</div>
                    ${partner.type ? 
                        `<div style="color: #6366f1; font-size: 0.875rem; font-weight: 500; margin-bottom: 5px;">
                            <i class="fas fa-tag"></i> ${partner.type}
                        </div>` : ''
                    }
                    ${partner.website_url ? 
                        `<a href="${partner.website_url}" target="_blank" class="partner-website">
                            <i class="fas fa-external-link-alt"></i>
                            ${partner.website_url}
                        </a>` : 
                        `<span style="color: #94a3b8; font-size: 0.875rem;">কোন ওয়েবসাইট নেই</span>`
                    }
                </div>
                <div class="partner-actions">
                    <button onclick="togglePartnerStatus(${partner.id}, ${partner.is_active ? 'false' : 'true'})" 
                            class="btn btn-sm ${partner.is_active ? 'btn-warning' : 'btn-success'}" 
                            title="${partner.is_active ? 'নিষ্ক্রিয় করুন' : 'সক্রিয় করুন'}">
                        <i class="fas fa-${partner.is_active ? 'toggle-on' : 'toggle-off'}"></i>
                    </button>
                    <button onclick="editPartner(${partner.id})" class="btn btn-sm btn-secondary" title="সম্পাদনা">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="deletePartner(${partner.id})" class="btn btn-sm btn-danger" title="মুছে ফেলুন">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `).join('');
    }

    // Add/Update partner form submission
    document.getElementById('addPartnerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        // Debug: Check if file is present and log all form data
        const fileInput = document.getElementById('partnerLogo');
        if (fileInput.files.length > 0) {
            console.log('Logo file selected:', fileInput.files[0].name, 'Size:', fileInput.files[0].size);
            // Make sure the file is in FormData
            formData.set('logo', fileInput.files[0]);
        } else {
            console.log('No logo file selected');
        }
        
        // Log all formData entries
        console.log('FormData contents:');
        for (let pair of formData.entries()) {
            console.log(pair[0], ':', pair[1]);
        }
        
        // Ensure is_active is sent correctly - always send either 1 or 0
        const isActiveCheckbox = document.getElementById('partnerIsActive');
        formData.set('is_active', (isActiveCheckbox && isActiveCheckbox.checked) ? '1' : '0');
        
        const url = editingPartnerId ? `/admin/partners/${editingPartnerId}` : '/admin/partners';
        const method = editingPartnerId ? 'POST' : 'POST';
        
        if (editingPartnerId) {
            formData.append('_method', 'PUT');
        }

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server response:', data);
            if (data.success) {
                showNotification(data.message, 'success');
                resetPartnerForm();
                loadPartners();
            } else {
                showNotification(data.message || 'সংরক্ষণে সমস্যা হয়েছে', 'error');
            }
        })
        .catch(error => {
            console.error('Error saving partner:', error);
            showNotification('পার্টনার সংরক্ষণে সমস্যা হয়েছে', 'error');
        });
    });

    // Edit partner
    function editPartner(id) {
        const partner = partnersData.find(p => p.id === id);
        if (!partner) return;

        editingPartnerId = id;
        document.getElementById('partnerName').value = partner.name;
        document.getElementById('partnerWebsite').value = partner.website_url || '';
        document.getElementById('partnerType').value = partner.type || '';
        document.getElementById('partnerOrder').value = partner.order;
        document.getElementById('partnerIsActive').checked = partner.is_active;
        
        if (partner.logo_path) {
            document.getElementById('partnerLogoPreviewImg').src = partner.logo_url;
            document.getElementById('partnerLogoPreview').style.display = 'block';
            document.querySelector('.file-upload-label').style.display = 'none';
        }

        document.querySelector('#addPartnerForm button[type="submit"]').innerHTML = '<i class="fas fa-save"></i> আপডেট করুন';
        document.getElementById('home-partners').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // Delete partner
    async function deletePartner(id) {
        const confirmed = await showPartnerConfirm('আপনি কি নিশ্চিত এই পার্টনারটি মুছে ফেলতে চান?', 'পার্টনার মুছুন');
        if (!confirmed) return;

        fetch(`/admin/partners/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showPartnerAlert(data.message, 'success');
                loadPartners();
            } else {
                showPartnerAlert(data.message || 'পার্টনার মুছতে সমস্যা হয়েছে', 'error');
            }
        })
        .catch(error => {
            console.error('Error deleting partner:', error);
            showPartnerAlert('পার্টনার মুছতে সমস্যা হয়েছে', 'error');
        });
    }

    // Toggle partner status
    function togglePartnerStatus(id, newStatus) {
        const formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('is_active', newStatus ? '1' : '0');
        
        const partner = partnersData.find(p => p.id === id);
        if (partner) {
            formData.append('name', partner.name);
            formData.append('order', partner.order);
            if (partner.website_url) formData.append('website_url', partner.website_url);
            if (partner.type) formData.append('type', partner.type);
        }

        fetch(`/admin/partners/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(newStatus ? 'পার্টনার সক্রিয় করা হয়েছে' : 'পার্টনার নিষ্ক্রিয় করা হয়েছে', 'success');
                loadPartners();
            }
        })
        .catch(error => {
            console.error('Error toggling partner status:', error);
            showNotification('স্ট্যাটাস পরিবর্তনে সমস্যা হয়েছে', 'error');
        });
    }
</script>
