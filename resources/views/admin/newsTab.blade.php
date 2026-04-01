<div id="news" class="tab-content">
    <div class="stats-grid">
        <div class="stat-card full-width">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>নিউজ ম্যানেজমেন্ট</h3>
                    <div class="subtitle">নিউজ এবং ব্লগ কন্টেন্ট ম্যানেজ করুন</div>
                </div>
                <div class="stat-icon yellow"><i class="fas fa-newspaper"></i></div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <h2>নিউজ/ব্লগ ম্যানেজমেন্ট</h2>
        <p style="color:#6b7280; margin-top:-6px;">হোম পেজ এবং নিউজ পেজের কন্টেন্ট ম্যানেজ করুন।</p>

        <!-- Section Settings -->
        <div style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
            <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন শিরোনাম ও সাবটাইটেল</h3>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                    <input type="text" id="newsSectionTitle" placeholder="সর্বশেষ সংবাদ" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                </div>
                <div>
                    <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল (Subtitle)</label>
                    <input type="text" id="newsSectionSubtitle" placeholder="আমাদের প্রকল্পের সর্বশেষ খবরাখবর..." style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                </div>
            </div>
            <button type="button" id="saveNewsSettingsBtn" class="btn btn-primary" style="margin-top:16px;">সেটিংস সেভ করুন</button>
        </div>

        <div id="newsList" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:20px; margin-bottom: 30px;">
        </div>

        <div style="padding:24px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
            <h3 id="newsFormTitle" style="margin:0 0 16px 0; font-size:18px; font-weight:700;">নতুন নিউজ যোগ করুন</h3>
            <form id="newsForm" enctype="multipart/form-data">
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                    <div class="form-group">
                        <label>নিউজের শিরোনাম (Title) *</label>
                        <input type="text" id="newsTitle" placeholder="যেমন: নতুন প্রকল্পের শুভ উদ্বোধন" required style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div class="form-group">
                        <label>ক্যাটাগরি (Category - যেমন: Media Center, Tech)</label>
                        <input type="text" id="newsCategory" placeholder="যেমন: Media Center" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>বিস্তারিত বিবরণ (Content/Description)</label>
                        <textarea id="newsContent" rows="5" placeholder="নিউজের বিস্তারিত বিবরণ লিখুন..." style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>প্রকাশের তারিখ (Published At)</label>
                        <input type="date" id="newsPublishedAt" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div class="form-group">
                        <label>ক্রম (Order)</label>
                        <input type="number" id="newsOrder" value="0" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div class="form-group">
                        <label>ছবি</label>
                        <input type="file" id="newsImage" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                        <div id="newsImgPrevWrap" style="margin-top:10px; display:none;">
                            <img id="newsImgPreview" style="max-width:100px; border-radius:8px; border:1px solid #ddd;">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex; align-items: center; gap: 20px;">
                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="checkbox" id="newsIsActive" checked style="width:18px; height:18px;"> সক্রিয়
                        </label>
                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="checkbox" id="newsIsFeatured" style="width:18px; height:18px;"> ফিচারড নিউজ
                        </label>
                    </div>
                </div>
                <div style="display:flex; gap:12px; margin-top:20px;">
                    <button type="button" id="submitNewsBtn" class="btn btn-primary" style="padding:12px 24px;">নিউজটি সেভ করুন</button>
                    <button type="button" id="resetNewsBtn" class="btn btn-secondary" style="padding:12px 24px;">রিসেট</button>
                </div>
            </form>
        </div>

        <script>
            (function () {
                let news = [];
                let editingNewsId = null;

                // Load Section Info
                async function loadSectionSettings() {
                    const res = await fetch('/api/project-sections?section_key=news_section');
                    if (res.ok) {
                        const data = await res.json();
                        if (data) {
                            document.getElementById('newsSectionTitle').value = data.title || '';
                            document.getElementById('newsSectionSubtitle').value = data.subtitle || '';
                        }
                    }
                }

                document.getElementById('saveNewsSettingsBtn').addEventListener('click', async () => {
                    const btn = document.getElementById('saveNewsSettingsBtn');
                    btn.disabled = true;
                    const fd = new FormData();
                    fd.append('section_key', 'news_section');
                    fd.append('title', document.getElementById('newsSectionTitle').value);
                    fd.append('subtitle', document.getElementById('newsSectionSubtitle').value);
                    fd.append('is_active', '1');

                    const res = await fetch('/admin/project-sections', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                        body: fd
                    });
                    if (res.ok) showNotification('সেকশন সেটিংস সংরক্ষিত হয়েছে!', 'success');
                    btn.disabled = false;
                });

                async function loadNews() {
                    const res = await fetch('/admin/news');
                    if (res.ok) {
                        news = await res.json();
                        renderNews();
                    }
                }

                function renderNews() {
                    const wrap = document.getElementById('newsList');
                    if (news.length === 0) {
                        wrap.innerHTML = '<p style="grid-column: 1/-1; text-align:center; padding: 40px; color: #94a3b8; border: 1px solid #e5e7eb; border-radius: 12px;">কোনো নিউজ নেই।</p>';
                        return;
                    }
                    wrap.innerHTML = news.map(n => `
                        <div class="card" style="padding:16px; position:relative; display:flex; gap:12px; align-items:flex-start; background: #fff; border: 1px solid #e5e7eb; border-radius: 16px;">
                            ${n.image_url ? `<img src="${n.image_url}" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">` : '<div style="width:80px; height:80px; background:#f1f5f9; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:24px;">📰</div>'}
                            <div style="flex:1;">
                                <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                                    <h4 style="margin:0; font-size:16px;">${n.title}</h4>
                                    <div style="display:flex; flex-direction:column; align-items:flex-end; gap:4px;">
                                        <span style="font-size:10px; background:#f1f5f9; padding:2px 8px; border-radius:50px;">Order: ${n.order}</span>
                                        ${n.is_featured ? '<span style="font-size:10px; background:#fef3c7; color:#92400e; padding:2px 8px; border-radius:50px;">Featured</span>' : ''}
                                    </div>
                                </div>
                                <p style="margin:4px 0; font-size:12px; color:#64748b; font-weight:500;">${n.category || 'ক্যাটাগরি নেই'}</p>
                                <p style="margin:4px 0; font-size:13px; color:#94a3b8; line-height:1.4; display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">${n.content || ''}</p>
                                <div style="display:flex; gap:8px; margin-top:10px;">
                                    <button onclick="editNews(${n.id})" class="btn btn-sm btn-primary">Edit</button>
                                    <button onclick="deleteNews(${n.id})" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }

                document.getElementById('newsImage').addEventListener('change', e => {
                    const file = e.target.files[0];
                    if (file) {
                        const url = URL.createObjectURL(file);
                        document.getElementById('newsImgPreview').src = url;
                        document.getElementById('newsImgPrevWrap').style.display = 'block';
                    }
                });

                document.getElementById('submitNewsBtn').addEventListener('click', async () => {
                    const btn = document.getElementById('submitNewsBtn');
                    btn.disabled = true;

                    const fd = new FormData();
                    fd.append('title', document.getElementById('newsTitle').value);
                    fd.append('category', document.getElementById('newsCategory').value);
                    fd.append('content', document.getElementById('newsContent').value);
                    fd.append('published_at', document.getElementById('newsPublishedAt').value);
                    fd.append('order', document.getElementById('newsOrder').value);
                    fd.append('is_active', document.getElementById('newsIsActive').checked ? '1' : '0');
                    fd.append('is_featured', document.getElementById('newsIsFeatured').checked ? '1' : '0');

                    const file = document.getElementById('newsImage').files[0];
                    if (file) fd.append('image', file);

                    const url = editingNewsId ? `/admin/news/${editingNewsId}` : '/admin/news';
                    if (editingNewsId) fd.append('_method', 'PUT');

                    try {
                        const res = await fetch(url, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                            body: fd
                        });
                        if (res.ok) {
                            showNotification(editingNewsId ? 'নিউজ আপডেট হয়েছে!' : 'নিউজ যোগ করা হয়েছে!', 'success');
                            resetNewsForm();
                            loadNews();
                        }
                    } catch (e) { console.error(e); }
                    btn.disabled = false;
                });

                window.editNews = (id) => {
                    const n = news.find(x => x.id === id);
                    if (!n) return;
                    editingNewsId = id;
                    document.getElementById('newsFormTitle').textContent = 'নিউজ আপডেট করুন';
                    document.getElementById('newsTitle').value = n.title;
                    document.getElementById('newsCategory').value = n.category || '';
                    document.getElementById('newsContent').value = n.content || '';
                    document.getElementById('newsPublishedAt').value = n.published_at ? n.published_at.split('T')[0] : '';
                    document.getElementById('newsOrder').value = n.order;
                    document.getElementById('newsIsActive').checked = !!n.is_active;
                    document.getElementById('newsIsFeatured').checked = !!n.is_featured;
                    if (n.image_url) {
                        document.getElementById('newsImgPreview').src = n.image_url;
                        document.getElementById('newsImgPrevWrap').style.display = 'block';
                    }
                    document.getElementById('submitNewsBtn').textContent = 'আপডেট করুন';
                    document.getElementById('newsForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                };

                window.deleteNews = async (id) => {
                    const confirmed = await showNewsConfirm('আপনি কি নিশ্চিত এই নিউজটি মুছে ফেলতে চান?', 'নিউজ মুছুন');
                    if (!confirmed) return;
                    const res = await fetch(`/admin/news/${id}`, {
                        method: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                    });
                    if (res.ok) {
                        showNotification('নিউজ মুছে ফেলা হয়েছে', 'success');
                        loadNews();
                    } else {
                        showNewsAlert('নিউজ মুছতে সমস্যা হয়েছে', 'error');
                    }
                };

                function resetNewsForm() {
                    editingNewsId = null;
                    document.getElementById('newsForm').reset();
                    document.getElementById('newsFormTitle').textContent = 'নতুন নিউজ যোগ করুন';
                    document.getElementById('submitNewsBtn').textContent = 'নিউজটি সেভ করুন';
                    document.getElementById('newsImgPrevWrap').style.display = 'none';
                }

                document.getElementById('resetNewsBtn').addEventListener('click', resetNewsForm);
                loadSectionSettings();
                loadNews();
            })();
        </script>
    </div>
</div>
<!-- Professional Confirmation Modal -->
<div id="newsConfirmModal" class="news-confirm-modal">
    <div class="news-confirm-modal-content">
        <div class="news-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="newsConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="newsConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="news-confirm-modal-actions">
            <button class="news-confirm-btn news-confirm-btn-cancel" id="newsConfirmModalCancel">বাতিল করুন</button>
            <button class="news-confirm-btn news-confirm-btn-confirm" id="newsConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
        </div>
    </div>
</div>

<!-- Professional Alert Modal -->
<div id="newsAlertModal" class="news-alert-modal">
    <div class="news-alert-modal-content">
        <div class="news-alert-modal-icon" id="newsAlertModalIcon">
            <svg class="news-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="news-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="news-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <svg class="news-errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="news-errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="news-errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
            </svg>
        </div>
        <h3 id="newsAlertModalTitle"></h3>
        <p id="newsAlertModalMessage"></p>
        <button class="news-alert-modal-btn" id="newsAlertModalBtn">ঠিক আছে</button>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .news-confirm-modal, .news-alert-modal {
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

    .news-confirm-modal.active, .news-alert-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .news-confirm-modal-content, .news-alert-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .news-confirm-modal-icon {
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

    .news-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #newsConfirmModalTitle, #newsAlertModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #newsConfirmModalMessage, #newsAlertModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .news-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .news-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .news-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .news-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .news-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .news-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    }

    /* Alert Modal Styles */
    .news-alert-modal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .news-alert-modal-icon svg {
        width: 100%;
        height: 100%;
    }

    .news-checkmark, .news-errormark {
        display: none;
    }

    .news-alert-modal-content.success .news-checkmark {
        display: block;
    }

    .news-alert-modal-content.error .news-errormark {
        display: block;
    }

    .news-checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #10b981;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .news-checkmark__check {
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: #10b981;
        stroke-width: 3;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
    }

    .news-errormark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #dc2626;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .news-errormark__cross {
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

    .news-alert-modal-btn {
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

    .news-alert-modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
    }

    .news-alert-modal-content.error .news-alert-modal-btn {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }
</style>

<script>
    // Professional Modal Functions
    function showNewsConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('newsConfirmModal');
            const titleEl = document.getElementById('newsConfirmModalTitle');
            const messageEl = document.getElementById('newsConfirmModalMessage');
            const confirmBtn = document.getElementById('newsConfirmModalConfirm');
            const cancelBtn = document.getElementById('newsConfirmModalCancel');
            
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

    function showNewsAlert(message, type = 'success', title = '') {
        const modal = document.getElementById('newsAlertModal');
        const content = modal.querySelector('.news-alert-modal-content');
        const titleEl = document.getElementById('newsAlertModalTitle');
        const messageEl = document.getElementById('newsAlertModalMessage');
        const btn = document.getElementById('newsAlertModalBtn');
        
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
</script>