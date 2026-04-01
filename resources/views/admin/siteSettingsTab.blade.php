<div id="site-settings" class="tab-content">
    <div class="table-card">
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
            <div style="width:40px; height:40px; background:linear-gradient(135deg,#0d3d29 0%,#1a7a4a 100%); border-radius:10px; display:flex; align-items:center; justify-content:center; color:white; font-size:20px;">
                ⚙️
            </div>
            <div>
                <h2 style="margin:0; color:#111827; font-size:24px; font-weight:700;">সাইট সেটিংস</h2>
                <p style="margin:4px 0 0 0; color:#6b7280; font-size:14px;">সাইটের নাম, টাইটেল, ফেভিকন এবং ড্যাশবোর্ড লোগো পরিবর্তন করুন।</p>
            </div>
        </div>

        <!-- Site Name & Title -->
        <div style="background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:24px; border:1px solid #e5e7eb;">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #e5e7eb;">
                <span style="font-size:18px;">🌐</span>
                <h3 style="margin:0; color:#111827; font-size:18px; font-weight:600;">সাইট পরিচিতি</h3>
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">
                        <span style="font-weight:600; color:#374151;">সাইটের নাম</span>
                        <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">ব্রাউজার ট্যাব ও মেটা ট্যাগে ব্যবহৃত হবে</small>
                    </label>
                    <input type="text" id="siteNameInput" class="search-input" placeholder="যেমন: জলছায়া">
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <span style="font-weight:600; color:#374151;">সাইট টাইটেল</span>
                        <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">পেজ টাইটেলে দেখাবে</small>
                    </label>
                    <input type="text" id="siteTitleInput" class="search-input" placeholder="যেমন: জলছায়া - ইকো রিসোর্ট">
                </div>
            </div>
        </div>

        <!-- Favicon -->
        <div style="background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:24px; border:1px solid #e5e7eb;">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #e5e7eb;">
                <span style="font-size:18px;">🖼️</span>
                <h3 style="margin:0; color:#111827; font-size:18px; font-weight:600;">ফেভিকন (Favicon)</h3>
            </div>
            <div class="form-group">
                <label class="form-label">
                    <span style="font-weight:600; color:#374151;">ফেভিকন আপলোড করুন</span>
                    <small style="display:block; color:#6b7280; font-weight:400; margin-top:2px;">PNG, ICO, SVG সমর্থিত। সর্বোচ্চ 2MB। প্রস্তাবিত: 32×32px বা 64×64px</small>
                </label>
                <input type="file" id="faviconInput" accept="image/png,image/x-icon,image/svg+xml,image/jpeg,image/webp" class="search-input" style="cursor:pointer;">
                <div id="faviconPreview" style="display:none; margin-top:12px; display:flex; align-items:center; gap:10px;">
                    <img id="faviconPreviewImg" src="" alt="Favicon Preview" style="width:48px; height:48px; object-fit:contain; border:1px solid #e5e7eb; border-radius:8px; padding:4px; background:#fff;">
                    <span style="font-size:13px; color:#6b7280;">বর্তমান ফেভিকন</span>
                </div>
            </div>
        </div>

        <!-- Dashboard Logo -->
        <div style="background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:24px; border:1px solid #e5e7eb;">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #e5e7eb;">
                <span style="font-size:18px;">🏷️</span>
                <h3 style="margin:0; color:#111827; font-size:18px; font-weight:600;">ড্যাশবোর্ড লোগো</h3>
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
                        <img id="dashboardLogoPreviewImg" src="" alt="Dashboard Logo" style="max-height:50px; max-width:200px; object-fit:contain; display:block;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div style="display:flex; align-items:center; gap:16px; padding-top:8px;">
            <button class="btn btn-primary btn-save" id="saveSiteSettingsBtn" onclick="saveSiteSettings()" style="padding:12px 32px; font-size:15px; font-weight:600; border-radius:10px; background:linear-gradient(135deg,#0d3d29,#1a7a4a); border:none; color:#fff; cursor:pointer; transition:all 0.3s;">
                <i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন
            </button>
            <span id="siteSettingsStatus" style="font-size:14px; display:none; font-weight:600;"></span>
        </div>
    </div>
</div>

<script>
(function () {
    var csrf = (document.querySelector('meta[name="csrf-token"]') || {}).content || '';

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

    window.saveSiteSettings = function () {
        var btn = document.getElementById('saveSiteSettingsBtn');
        var status = document.getElementById('siteSettingsStatus');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right:8px;"></i> সংরক্ষণ হচ্ছে...';

        var formData = new FormData();
        formData.append('site_name',  document.getElementById('siteNameInput').value.trim());
        formData.append('site_title', document.getElementById('siteTitleInput').value.trim());
        var favicon = document.getElementById('faviconInput').files[0];
        if (favicon) formData.append('favicon', favicon);
        var logo = document.getElementById('dashboardLogoInput').files[0];
        if (logo) formData.append('dashboard_logo', logo);

        fetch('/admin/site-settings', { method: 'POST', headers: { 'X-CSRF-TOKEN': csrf }, body: formData })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if (data.success) {
                    status.textContent = '✓ সফলভাবে সংরক্ষিত হয়েছে';
                    status.style.color = '#059669';
                    status.style.display = 'inline';
                    if (data.data && data.data.dashboard_logo_url) {
                        var sl = document.getElementById('adminSidebarLogo');
                        if (sl) sl.src = data.data.dashboard_logo_url;
                        document.getElementById('dashboardLogoPreviewImg').src = data.data.dashboard_logo_url;
                        document.getElementById('dashboardLogoPreview').style.display = 'block';
                    }
                    if (data.data && data.data.favicon_url) {
                        var link = document.querySelector("link[rel~='icon']");
                        if (!link) { link = document.createElement('link'); link.rel = 'icon'; document.head.appendChild(link); }
                        link.href = data.data.favicon_url;
                        document.getElementById('faviconPreviewImg').src = data.data.favicon_url;
                        document.getElementById('faviconPreview').style.display = 'flex';
                    }
                    if (data.data && data.data.site_title) document.title = data.data.site_title;
                    setTimeout(function(){ status.style.display = 'none'; }, 3000);
                } else {
                    status.textContent = '✗ সংরক্ষণ ব্যর্থ হয়েছে';
                    status.style.color = '#dc2626';
                    status.style.display = 'inline';
                }
            }).catch(function(){
                status.textContent = '✗ সার্ভার সমস্যা';
                status.style.color = '#dc2626';
                status.style.display = 'inline';
            }).finally(function(){
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save" style="margin-right:8px;"></i> সংরক্ষণ করুন';
            });
    };

    document.addEventListener('DOMContentLoaded', function () {
        var tab = document.getElementById('site-settings');
        if (!tab) return;
        if (tab.classList.contains('active')) { loadSiteSettings(); return; }
        var observer = new MutationObserver(function () {
            if (tab.classList.contains('active') && !tab.dataset.loaded) {
                tab.dataset.loaded = '1';
                loadSiteSettings();
            }
        });
        observer.observe(tab, { attributes: true, attributeFilter: ['class'] });
    });
})();
</script>
