<div id="site-settings" class="tab-content">
    <div class="table-card">
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
            <div style="width:40px; height:40px; background:linear-gradient(135deg,#0d3d29 0%,#1a7a4a 100%); border-radius:10px; display:flex; align-items:center; justify-content:center; color:white; font-size:20px;">
                <i class="fas fa-cog"></i>
            </div>
            <div>
                <h2 style="margin:0; color:#111827; font-size:24px; font-weight:700;">সাইট সেটিংস</h2>
                <p style="margin:4px 0 0 0; color:#6b7280; font-size:14px;">সাইটের নাম, টাইটেল, ফেভিকন, লোগো এবং পপআপ ম্যানেজ করুন</p>
            </div>
        </div>

        <input type="hidden" id="csrfSiteSettings" value="{{ csrf_token() }}">

        <!-- Site Name & Title -->
        <div class="section-block">
            <div class="section-header">
                <span style="font-size:18px;"><i class="fas fa-globe"></i></span>
                <h3>সাইট পরিচিতি</h3>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label" for="siteNameInput">
                        <span style="font-weight:600; color:#374151;">সাইটের নাম</span>
                        <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">ব্রাউজার ট্যাব ও মেটা ট্যাগে ব্যবহৃত হবে</small>
                    </label>
                    <input type="text" id="siteNameInput" class="search-input" placeholder="যেমন: জলছায়া">
                </div>
                <div class="form-group">
                    <label class="form-label" for="siteTitleInput">
                        <span style="font-weight:600; color:#374151;">সাইট টাইটেল</span>
                        <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">পেজ টাইটেলে দেখাবে</small>
                    </label>
                    <input type="text" id="siteTitleInput" class="search-input" placeholder="যেমন: জলছায়া - ইকো রিসোর্ট">
                </div>
            </div>
        </div>

        <!-- Favicon -->
        <div class="section-block">
            <div class="section-header">
                <span style="font-size:18px;"><i class="fas fa-image"></i></span>
                <h3>ফেভিকন (Favicon)</h3>
            </div>
            <div class="form-group">
                <label class="form-label">
                    <span style="font-weight:600; color:#374151;">ফেভিকন আপলোড করুন</span>
                    <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">PNG, ICO, SVG সমর্থিত। সর্বোচ্চ 2MB। প্রস্তাবিত: 32×32px</small>
                </label>
                <input type="file" id="faviconInput" accept="image/png,image/x-icon,image/svg+xml,image/jpeg,image/webp" class="search-input" style="cursor:pointer;">
                <div id="faviconPreview" style="display:none; align-items:center; gap:10px; margin-top:12px;">
                    <img id="faviconPreviewImg" src="" alt="Favicon" style="width:48px; height:48px; object-fit:contain; border:1px solid #e5e7eb; border-radius:8px; padding:4px; background:#fff;">
                    <span style="font-size:13px; color:#6b7280;">বর্তমান ফেভিকন</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Logo -->
        <div class="section-block">
            <div class="section-header">
                <span style="font-size:18px;"><i class="fas fa-tag"></i></span>
                <h3>ড্যাশবোর্ড লোগো</h3>
            </div>
            <div class="form-group">
                <label class="form-label">
                    <span style="font-weight:600; color:#374151;">লোগো আপলোড করুন</span>
                    <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">PNG, SVG, JPG সমর্থিত। সর্বোচ্চ 5MB। প্রস্তাবিত: 200×60px</small>
                </label>
                <input type="file" id="dashboardLogoInput" accept="image/png,image/jpeg,image/svg+xml,image/webp" class="search-input" style="cursor:pointer;">
                <div id="dashboardLogoPreview" style="display:none; margin-top:12px;">
                    <p style="font-size:13px; color:#374151; margin-bottom:8px; font-weight:600;">বর্তমান লোগো:</p>
                    <div style="background:#0d3d29; padding:12px 18px; border-radius:10px; display:inline-block;">
                        <img id="dashboardLogoPreviewImg" src="" alt="Logo" style="max-height:50px; max-width:200px; object-fit:contain; display:block;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup Settings -->
        <div class="section-block">
            <div class="section-header">
                <span style="font-size:18px;"><i class="fas fa-bullhorn"></i></span>
                <h3>ওয়েলকাম পপআপ</h3>
            </div>
            <div class="form-group" style="margin-bottom:16px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer;">
                    <input type="checkbox" id="popupEnabledInput" style="width:18px;height:18px;cursor:pointer;">
                    <span style="font-weight:600; color:#374151;">পপআপ সক্রিয় করুন (হোম পেজে দেখাবে)</span>
                </label>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">শিরোনাম</span></label>
                    <input type="text" id="popupTitleInput" class="search-input" placeholder="যেমন: ঈদ মোবারক">
                </div>
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">সাব-টাইটেল</span></label>
                    <input type="text" id="popupSubtitleInput" class="search-input" placeholder="যেমন: আমাদের বিশেষ অফার দেখুন">
                </div>
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">বাটন টেক্সট</span></label>
                    <input type="text" id="popupBtnTextInput" class="search-input" placeholder="যেমন: এখনই যোগাযোগ করুন">
                </div>
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">বাটন লিংক</span></label>
                    <input type="text" id="popupBtnLinkInput" class="search-input" placeholder="#contact বা https://...">
                </div>
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">নোট (ছোট টেক্সট)</span></label>
                    <input type="text" id="popupNoteInput" class="search-input" placeholder="যেমন: আজই সুযোগ নিন">
                </div>
                <div class="form-group">
                    <label class="form-label"><span style="font-weight:600; color:#374151;">ব্যাকগ্রাউন্ড রঙ</span></label>
                    <div style="display:flex;gap:8px;align-items:center;">
                        <input type="color" id="popupBgColorInput" value="#0d3d29" style="width:48px;height:40px;border:1px solid #d1d5db;border-radius:8px;cursor:pointer;padding:2px;">
                        <input type="text" id="popupBgColorText" class="search-input" value="#0d3d29" placeholder="#0d3d29" style="flex:1;" oninput="document.getElementById('popupBgColorInput').value=this.value">
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-top:8px;">
                <label class="form-label">
                    <span style="font-weight:600; color:#374151;">পপআপ ইমেজ আপলোড করুন</span>
                    <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">PNG/JPG/WEBP | সর্বোচ্চ ৫MB | প্রস্তাবিত: ৪০০×৫০০px</small>
                </label>
                <input type="file" id="popupImageInput" accept="image/*" class="search-input" style="cursor:pointer;">
                <div id="popupImagePreview" style="display:none; margin-top:10px;">
                    <img id="popupImagePreviewImg" src="" style="max-height:150px; border-radius:10px; border:2px solid #e5e7eb;">
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div style="display:flex; align-items:center; gap:16px; padding-top:8px;">
            <button id="saveSiteSettingsBtn" onclick="saveSiteSettings()" class="btn-save" style="background:linear-gradient(135deg,#0d3d29,#1a7a4a); color:#fff; border:none; padding:12px 32px; border-radius:10px; font-size:15px; font-weight:600; cursor:pointer;">
                <i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন
            </button>
        </div>
    </div>

    <script>
    (function () {
        var csrf = document.getElementById('csrfSiteSettings')?.value || '';

        function loadSiteSettings() {
            fetch('/admin/site-settings', { cache: 'no-store' })
                .then(function(r){ return r.json(); })
                .then(function(d){
                    if (d.site_name)  document.getElementById('siteNameInput').value  = d.site_name;
                    if (d.site_title) document.getElementById('siteTitleInput').value = d.site_title;
                    if (d.favicon_url) {
                        document.getElementById('faviconPreviewImg').src = d.favicon_url;
                        document.getElementById('faviconPreview').style.display = 'flex';
                    }
                    if (d.dashboard_logo_url) {
                        document.getElementById('dashboardLogoPreviewImg').src = d.dashboard_logo_url;
                        document.getElementById('dashboardLogoPreview').style.display = 'block';
                    }
                    document.getElementById('popupEnabledInput').checked = !!d.popup_enabled;
                    if (d.popup_title)    document.getElementById('popupTitleInput').value    = d.popup_title;
                    if (d.popup_subtitle) document.getElementById('popupSubtitleInput').value = d.popup_subtitle;
                    if (d.popup_btn_text) document.getElementById('popupBtnTextInput').value  = d.popup_btn_text;
                    if (d.popup_btn_link) document.getElementById('popupBtnLinkInput').value  = d.popup_btn_link;
                    if (d.popup_note)     document.getElementById('popupNoteInput').value     = d.popup_note;
                    if (d.popup_bg_color) {
                        document.getElementById('popupBgColorInput').value = d.popup_bg_color;
                        document.getElementById('popupBgColorText').value  = d.popup_bg_color;
                    }
                    if (d.popup_image) {
                        document.getElementById('popupImagePreviewImg').src = d.popup_image;
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
                .then(function(d){
                    if (d.success) { if (window.showSuccess) window.showSuccess('সাইট সেটিংস সংরক্ষিত হয়েছে'); }
                    else { if (window.showError) window.showError('সংরক্ষণ ব্যর্থ হয়েছে'); }
                }).catch(function(){ if (window.showError) window.showError('সার্ভার সমস্যা'); })
                .finally(function(){
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন';
                });
        };

        // Load when tab becomes active
        var tab = document.getElementById('site-settings');
        if (tab) {
            var obs = new MutationObserver(function () {
                if (tab.classList.contains('active') && !tab.dataset.ssLoaded) {
                    tab.dataset.ssLoaded = '1';
                    loadSiteSettings();
                }
            });
            obs.observe(tab, { attributes: true, attributeFilter: ['class'] });
            if (tab.classList.contains('active')) loadSiteSettings();
        }
    })();
    </script>
</div>

<style>
    #site-settings .section-block { background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:24px; border:1px solid #e5e7eb; }
    #site-settings .section-block h3 { margin:0; color:#111827; font-size:18px; font-weight:600; }
    #site-settings .section-header { display:flex; align-items:center; gap:8px; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #e5e7eb; }
</style>