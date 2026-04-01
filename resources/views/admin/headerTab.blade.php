<div id="header" class="tab-content">
    <div class="table-card">
        <h2>হেডার</h2>
        <p style="color:#6b7280; margin-bottom:1rem;">এই ফর্ম থেকে ওয়েবসাইটের ন্যাভিগেশন (লোগো টেক্সট ও মেনু) এডিট করুন। Save করলে সেটিংস সংরক্ষিত থাকবে।</p>

        <form id="headerSettingsForm" onsubmit="return false;">
            <div class="form-grid">
                <div class="form-group">
                    <label class="subtitle" for="headerLogoFile">লোগো আপলোড</label>
                    <input id="headerLogoFile" type="file" accept="image/*" class="search-input">
                    <small style="color:#6b7280; display:block; margin-top:0.25rem;">PNG/SVG/JPG/WEBP সমর্থিত। সর্বোচ্চ 7MB। আপলোড করলে URL-এর পরিবর্তে এই ইমেজ ব্যবহৃত হবে।</small>
                </div>
                <div class="form-group">
                    <label class="subtitle">লোগো প্রিভিউ</label>
                    <div style="
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100px;
                        background: linear-gradient(135deg, #0a4d2e 0%, #0d3d29 60%, #064029 100%);
                        border-radius: 12px;
                        overflow: hidden;
                        border: 1px solid rgba(255,255,255,0.08);
                        box-shadow: 0 4px 20px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.06);
                    ">
                        <!-- subtle grid pattern overlay -->
                        <div style="position:absolute;inset:0;background-image:radial-gradient(circle, rgba(255,255,255,0.03) 1px, transparent 1px);background-size:20px 20px;pointer-events:none;"></div>
                        <img id="headerLogoPreview" alt="Logo Preview" style="
                            position: relative;
                            max-height: 64px;
                            max-width: 85%;
                            width: auto;
                            height: auto;
                            object-fit: contain;
                            display: none;
                            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.4));
                        " />
                        <span id="headerLogoPlaceholder" style="
                            position: relative;
                            color: rgba(255,255,255,0.3);
                            font-size: 0.8rem;
                            letter-spacing: 0.05em;
                        ">লোগো এখানে দেখাবে</span>
                    </div>
                    <small style="color:#6b7280; display:block; margin-top:0.4rem; font-size:0.78rem;">নেভবারে যেভাবে দেখাবে</small>
                </div>
                <div class="form-group">
                    <label class="subtitle" for="brandText">ব্র্যান্ড টেক্সট</label>
                    <input id="brandText" type="text" class="search-input" placeholder="জলছায়া">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="homeLabel">হোম লেবেল</label>
                    <input id="homeLabel" type="text" class="search-input" placeholder="হোম">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="aboutLabel">আমাদের সম্পর্কে লেবেল</label>
                    <input id="aboutLabel" type="text" class="search-input" placeholder="আমাদের সম্পর্কে">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="featuresLabel">সুবিধা লেবেল</label>
                    <input id="featuresLabel" type="text" class="search-input" placeholder="সুবিধা">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="pricingLabel">মূল্য তালিকা লেবেল</label>
                    <input id="pricingLabel" type="text" class="search-input" placeholder="মূল্য তালিকা">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="testimonialsLabel">মন্তব্য লেবেল</label>
                    <input id="testimonialsLabel" type="text" class="search-input" placeholder="মন্তব্য">
                </div>

                <div class="form-group">
                    <label class="subtitle" for="otherProjectsLabel">প্রকল্প লেবেল</label>
                    <input id="otherProjectsLabel" type="text" class="search-input" placeholder="প্রকল্প">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="newsLabel">নিউজ লেবেল</label>
                    <input id="newsLabel" type="text" class="search-input" placeholder="নিউজ">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="contactLabel">যোগাযোগ লেবেল</label>
                    <input id="contactLabel" type="text" class="search-input" placeholder="যোগাযোগ">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="ctaText">CTA বাটন টেক্সট</label>
                    <input id="ctaText" type="text" class="search-input" placeholder="এখনই বুক করুন">
                </div>
                <div class="form-group">
                    <label class="subtitle" for="ctaHref">CTA লিঙ্ক (URL বা hash)</label>
                    <input id="ctaHref" type="text" class="search-input" placeholder="#contact">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" onclick="saveHeaderSettings()">Save</button>
                <button class="btn" style="background:#6b7280; color:#fff;" onclick="resetHeaderSettings()">Reset to Default</button>
            </div>
        </form>
    </div>

    <div class="table-card" style="margin-top:1rem;">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
            <h3 style="margin:0;">লাইভ প্রিভিউ</h3>
            <span style="font-size:0.78rem; color:#6b7280; background:#f1f5f9; padding:4px 10px; border-radius:20px;">ওয়েবসাইটে যেভাবে দেখাবে</span>
        </div>
        <!-- Browser chrome mockup -->
        <div style="border-radius:12px; overflow:hidden; box-shadow:0 8px 32px rgba(0,0,0,0.18); border:1px solid #e2e8f0;">
            <!-- Browser top bar -->
            <div style="background:#f1f5f9; padding:10px 14px; display:flex; align-items:center; gap:8px; border-bottom:1px solid #e2e8f0;">
                <span style="width:12px;height:12px;border-radius:50%;background:#ef4444;display:inline-block;"></span>
                <span style="width:12px;height:12px;border-radius:50%;background:#f59e0b;display:inline-block;"></span>
                <span style="width:12px;height:12px;border-radius:50%;background:#22c55e;display:inline-block;"></span>
                <div style="flex:1; background:#fff; border-radius:20px; padding:4px 12px; font-size:0.75rem; color:#94a3b8; margin-left:8px; border:1px solid #e2e8f0;">yourwebsite.com</div>
            </div>
            <!-- Actual navbar preview -->
            <div style="background:rgba(10,77,46,0.97); padding:12px 20px; display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
                <!-- Logo area -->
                <div style="display:flex; align-items:center; gap:10px; flex-shrink:0;">
                    <img id="previewLogo" alt="Preview Logo" style="height:48px; width:auto; display:none; filter:drop-shadow(0 2px 6px rgba(0,0,0,0.3));" />
                    <div id="previewFallbackIcon" style="color:#fbbf24; font-size:1.4rem; display:none;"><i class="fas fa-home"></i></div>
                </div>
                <!-- Nav links -->
                <nav style="display:flex; gap:14px; flex:1; flex-wrap:wrap; align-items:center;">
                    <span id="previewHome" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">হোম</span>
                    <span id="previewAbout" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">আমাদের সম্পর্কে</span>
                    <span id="previewFeatures" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">সুবিধা</span>
                    <span id="previewPricing" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">মূল্য তালিকা</span>
                    <span id="previewTestimonials" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">মন্তব্য</span>
                    <span id="previewOtherProjects" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">প্রকল্প</span>
                    <span id="previewNews" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">নিউজ</span>
                    <span id="previewContact" style="color:rgba(255,255,255,0.85); font-size:13px; cursor:default; white-space:nowrap;">যোগাযোগ</span>
                </nav>
                <!-- CTA button -->
                <a id="previewCta" href="#" onclick="return false;" style="flex-shrink:0; background:#f59e0b; color:#111827; padding:8px 16px; border-radius:8px; text-decoration:none; font-weight:700; font-size:13px; display:inline-flex; align-items:center; gap:6px; white-space:nowrap; box-shadow:0 2px 8px rgba(245,158,11,0.35);">
                    <i class="fas fa-calendar-check" style="font-size:12px;"></i>
                    <span id="previewCtaText">এখনই বুক করুন</span>
                </a>
            </div>
        </div>
    </div>
</div>
