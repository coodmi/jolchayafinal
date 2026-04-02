<div id="site-settings" class="tab-content" style="padding-left:0;">
    <div class="stats-grid" style="grid-template-columns:1fr;">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>সাইট সেটিংস</h3>
                    <div class="subtitle">সাইটের নাম, টাইটেল, ফেভিকন, লোগো এবং পপআপ ম্যানেজ করুন</div>
                </div>
                <div class="stat-icon green"><i class="fas fa-cog"></i></div>
            </div>
        </div>
    </div>

    <input type="hidden" id="csrfSiteSettings" value="{{ csrf_token() }}">

    <!-- Site Name & Title -->
    <div id="site-settings-general" style="margin-top:1rem;">
        <div class="table-card">
            <h2>সাইট পরিচিতি</h2>
            <p style="color:#6b7280; margin-bottom:20px;">সাইটের নাম ও টাইটেল পরিবর্তন করুন</p>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">সাইটের নাম</label>
                    <input type="text" id="siteNameInput" class="search-input" placeholder="যেমন: জলছায়া">
                    <small style="color:#6b7280; font-size:12px; display:block; margin-top:4px;">ব্রাউজার ট্যাব ও মেটা ট্যাগে ব্যবহৃত হবে</small>
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">সাইট টাইটেল</label>
                    <input type="text" id="siteTitleInput" class="search-input" placeholder="যেমন: জলছায়া - ইকো রিসোর্ট">
                    <small style="color:#6b7280; font-size:12px; display:block; margin-top:4px;">পেজ টাইটেলে দেখাবে</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Favicon -->
    <div id="site-settings-favicon" style="margin-top:1rem;">
        <div class="table-card">
            <h2>ফেভিকন (Favicon)</h2>
            <p style="color:#6b7280; margin-bottom:20px;">PNG, ICO, SVG সমর্থিত। সর্বোচ্চ 2MB। প্রস্তাবিত: 32×32px</p>
            <input type="file" id="faviconInput" accept="image/png,image/x-icon,image/svg+xml,image/jpeg,image/webp" class="search-input" style="cursor:pointer; margin-bottom:12px;">
            <div id="faviconPreview" style="display:none; align-items:center; gap:10px; margin-top:8px;">
                <img id="faviconPreviewImg" src="" alt="Favicon" style="width:48px; height:48px; object-fit:contain; border:1px solid #e5e7eb; border-radius:8px; padding:4px; background:#fff;">
                <span style="font-size:13px; color:#6b7280;">বর্তমান ফেভিকন</span>
            </div>
        </div>
    </div>

    <!-- Dashboard Logo -->
    <div id="site-settings-logo" style="margin-top:1rem;">
        <div class="table-card">
            <h2>ড্যাশবোর্ড লোগো</h2>
            <p style="color:#6b7280; margin-bottom:20px;">PNG, SVG, JPG সমর্থিত। সর্বোচ্চ 5MB। প্রস্তাবিত: 200×60px</p>
            <input type="file" id="dashboardLogoInput" accept="image/png,image/jpeg,image/svg+xml,image/webp" class="search-input" style="cursor:pointer; margin-bottom:12px;">
            <div id="dashboardLogoPreview" style="display:none; margin-top:8px;">
                <p style="font-size:13px; color:#374151; margin-bottom:8px; font-weight:600;">বর্তমান লোগো:</p>
                <div style="background:#0d3d29; padding:12px 18px; border-radius:10px; display:inline-block;">
                    <img id="dashboardLogoPreviewImg" src="" alt="Logo" style="max-height:50px; max-width:200px; object-fit:contain; display:block;">
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Settings -->
    <div id="site-settings-popup" style="margin-top:1rem;">
        <div class="table-card">
            <h2>ওয়েলকাম পপআপ</h2>
            <p style="color:#6b7280; margin-bottom:20px;">হোম পেজে ভিজিটর আসলে একটি পপআপ দেখাবে</p>

            <div style="margin-bottom:16px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" id="popupEnabledInput" style="width:18px;height:18px;cursor:pointer;">
                    <span style="font-weight:600; color:#374151; font-size:14px;">পপআপ সক্রিয় করুন (হোম পেজে দেখাবে)</span>
                </label>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">শিরোনাম</label>
                    <input type="text" id="popupTitleInput" class="search-input" placeholder="যেমন: ঈদ মোবারক">
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">সাব-টাইটেল</label>
                    <input type="text" id="popupSubtitleInput" class="search-input" placeholder="যেমন: আমাদের বিশেষ অফার দেখুন">
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">বাটন টেক্সট</label>
                    <input type="text" id="popupBtnTextInput" class="search-input" placeholder="যেমন: এখনই যোগাযোগ করুন">
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">বাটন লিংক</label>
                    <input type="text" id="popupBtnLinkInput" class="search-input" placeholder="#contact বা https://...">
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">নোট (ছোট টেক্সট)</label>
                    <input type="text" id="popupNoteInput" class="search-input" placeholder="যেমন: আজই সুযোগ নিন">
                </div>
                <div>
                    <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">ব্যাকগ্রাউন্ড রঙ</label>
                    <div style="display:flex;gap:8px;align-items:center;">
                        <input type="color" id="popupBgColorInput" value="#0d3d29" style="width:48px;height:40px;border:1px solid #d1d5db;border-radius:8px;cursor:pointer;padding:2px;">
                        <input type="text" id="popupBgColorText" class="search-input" value="#0d3d29" placeholder="#0d3d29" style="flex:1;" oninput="document.getElementById('popupBgColorInput').value=this.value">
                    </div>
                </div>
            </div>

            <div>
                <label style="display:block; margin-bottom:6px; font-size:14px; font-weight:600; color:#374151;">পপআপ ইমেজ আপলোড করুন</label>
                <small style="display:block; color:#6b7280; font-size:12px; margin-bottom:8px;">PNG/JPG/WEBP | সর্বোচ্চ ৫MB | প্রস্তাবিত: ৪০০×৫০০px</small>
                <input type="file" id="popupImageInput" accept="image/*" class="search-input" style="cursor:pointer;">
                <div id="popupImagePreview" style="display:none; margin-top:10px;">
                    <img id="popupImagePreviewImg" src="" style="max-height:150px; border-radius:10px; border:2px solid #e5e7eb;">
                </div>
            </div>
        </div>
    </div>

    <!-- Save -->
    <div style="margin-top:1rem; padding-bottom:2rem;">
        <div class="table-card">
            <div style="display:flex; align-items:center; gap:16px;">
                <button id="saveSiteSettingsBtn" onclick="saveSiteSettings()" style="background:#0d3d29; color:#fff; border:none; padding:12px 32px; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer;">
                    <i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন
                </button>
                <span id="siteSettingsStatus" style="font-size:14px; display:none; font-weight:600;"></span>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var csrf = document.getElementById('csrfSiteSettings')?.value || (document.querySelector('meta[name="csrf-token"]') || {}).content || '';

    function loadSiteSettings() {
        fetch('/admin/site-settings', { cache: 'no-store' })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if (data.site_name)  document.getElementById('siteNameInput').value  = data.site_name;
                if (data.site_title) document.getElementById('siteTitleInput').value = data.site_title;
                if (data.favicon_url) {
                    document.getElementById('faviconPreviewImg').src = data.favicon_url;
                    document.getElementById('faviconPreview').style.display = 'flex';
                }
                if (data.dashboard_logo_url) {
                    document.getElementById('dashboardLogoPreviewImg').src = data.dashboard_logo_url;
                    document.getElementById('dashboardLogoPreview').style.display = 'block';
                }
                document.getElementById('popupEnabledInput').checked = !!data.popup_enabled;
                if (data.popup_title)    document.getElementById('popupTitleInput').value    = data.popup_title;
                if (data.popup_subtitle) document.getElementById('popupSubtitleInput').value = data.popup_subtitle;
                if (data.popup_btn_text) document.getElementById('popupBtnTextInput').value  = data.popup_btn_text;
                if (data.popup_btn_link) document.getElementById('popupBtnLinkInput').value  = data.popup_btn_link;
                if (data.popup_note)     document.getElementById('popupNoteInput').value     = data.popup_note;
                if (data.popup_bg_color) {
                    document.getElementById('popupBgColorInput').value = data.popup_bg_color;
                    document.getElementById('popupBgColorText').value  = data.popup_bg_color;
                }
                if (data.popup_image) {
                    document.getElementById('popupImagePreviewImg').src = data.popup_image;
                    document.getElementById('popupImagePreview').style.display = 'block';
                }
            }).catch(function(e){ console.error(e); });
    }

    document.getElementById('faviconInput').addEventListener('change', function () {
        if (!this.files[0]) return;
        document.getElementById('faviconPreviewImg').src = URL.createObjectURL(this.files[0]);
        document.getElementById('faviconPreview').style.display = 'flex';
    });
    document.getElementById('dashboardLogoInput').addEventListener('change', function () {
        if (!this.files[0]) return;
        document.getElementById('dashboardLogoPreviewImg').src = URL.createObjectURL(this.files[0]);
        document.getElementById('dashboardLogoPreview').style.display = 'block';
    });
    document.getElementById('popupImageInput').addEventListener('change', function () {
        if (!this.files[0]) return;
        document.getElementById('popupImagePreviewImg').src = URL.createObjectURL(this.files[0]);
        document.getElementById('popupImagePreview').style.display = 'block';
    });
    document.getElementById('popupBgColorInput').addEventListener('input', function () {
        document.getElementById('popupBgColorText').value = this.value;
    });

    window.saveSiteSettings = function () {
        var btn = document.getElementById('saveSiteSettingsBtn');
        var status = document.getElementById('siteSettingsStatus');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right:8px;"></i> সংরক্ষণ হচ্ছে...';

        var fd = new FormData();
        fd.append('site_name',      document.getElementById('siteNameInput').value.trim());
        fd.append('site_title',     document.getElementById('siteTitleInput').value.trim());
        fd.append('popup_enabled',  document.getElementById('popupEnabledInput').checked ? '1' : '0');
        fd.append('popup_title',    document.getElementById('popupTitleInput').value.trim());
        fd.append('popup_subtitle', document.getElementById('popupSubtitleInput').value.trim());
        fd.append('popup_btn_text', document.getElementById('popupBtnTextInput').value.trim());
        fd.append('popup_btn_link', document.getElementById('popupBtnLinkInput').value.trim());
        fd.append('popup_note',     document.getElementById('popupNoteInput').value.trim());
        fd.append('popup_bg_color', document.getElementById('popupBgColorText').value.trim() || '#0d3d29');
        var f = document.getElementById('faviconInput').files[0];       if (f) fd.append('favicon', f);
        var l = document.getElementById('dashboardLogoInput').files[0]; if (l) fd.append('dashboard_logo', l);
        var p = document.getElementById('popupImageInput').files[0];    if (p) fd.append('popup_image', p);

        fetch('/admin/site-settings', { method:'POST', headers:{'X-CSRF-TOKEN': csrf}, body: fd })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if (data.success) {
                    if (window.showSuccess) window.showSuccess('সাইট সেটিংস সংরক্ষিত হয়েছে');
                    if (data.data?.dashboard_logo_url) {
                        var sl = document.getElementById('adminSidebarLogo');
                        if (sl) sl.src = data.data.dashboard_logo_url;
                    }
                } else {
                    if (window.showError) window.showError('সংরক্ষণ ব্যর্থ হয়েছে');
                }
            }).catch(function(){
                if (window.showError) window.showError('সার্ভার সমস্যা');
            }).finally(function(){
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন';
            });
    };

    // Lazy load when tab becomes active
    if (window.registerTabLoader) {
        registerTabLoader('site-settings', loadSiteSettings);
    } else {
        document.addEventListener('DOMContentLoaded', function () {
            var tab = document.getElementById('site-settings');
            if (!tab) return;
            var obs = new MutationObserver(function () {
                if (tab.classList.contains('active') && !tab.dataset.loaded) {
                    tab.dataset.loaded = '1';
                    loadSiteSettings();
                }
            });
            obs.observe(tab, { attributes: true, attributeFilter: ['class'] });
        });
    }
})();
</script>
