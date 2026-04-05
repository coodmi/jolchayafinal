<div id="home" class="tab-content">
    <script>
        // Use global showSuccess/showError from program.js toast system
        function showNotification(message, type = 'success') {
            if (type === 'success' && window.showSuccess) window.showSuccess(message);
            else if (window.showError) window.showError(message);
        }
    </script>

    <div class="stats-grid">
        <div class="stat-card full-width">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>হোম</h3>
                    <div class="subtitle">ড্যাশবোর্ডের হোম সেকশন</div>
                </div>
                <div class="stat-icon blue"><i class="fas fa-home"></i></div>
            </div>
        </div>
    </div>

    <div id="home-contact" style="margin-top:1rem;">
        <div class="table-card">
            <h2>যোগাযোগ সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের যোগাযোগ (Contact) সেকশনের কনটেন্ট এই ফর্ম থেকে ম্যানেজ
                করুন।</p>
            <style>
                #home-contact .grid-2 {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 12px;
                }

                #home-contact .card {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                }

                #home-contact input[type="text"],
                #home-contact input[type="url"],
                #home-contact textarea {
                    width: 100%;
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    border: 1px solid #d1d5db;
                    box-sizing: border-box;
                }

                #home-contact textarea {
                    min-height: 100px;
                    height: auto;
                    resize: vertical;
                }

                @media (max-width: 960px) {
                    #home-contact .grid-2 {
                        grid-template-columns: 1fr;
                    }
                }
            </style>
            <div class="grid-2">
                <div class="card">
                    <div class="form-group">
                        <label>সেকশন শিরোনাম</label>
                        <input type="text" id="contactTitleInput" placeholder="যোগাযোগ করুন">
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>সাব-শিরোনাম</label>
                        <input type="text" id="contactSubtitleInput" placeholder="আমরা আপনার সেবায় প্রস্তুত">
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>ফর্ম শিরোনাম</label>
                        <input type="text" id="contactFormTitleInput" placeholder="বুকিং তথ্য পাঠান">
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>ফর্ম ব্যাকগ্রাউন্ড রঙ</label>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <input type="color" id="contactFormBgColorInput" value="#0d3d29" style="width:48px;height:38px;border:1px solid #d1d5db;border-radius:8px;cursor:pointer;padding:2px;">
                            <input type="text" id="contactFormBgColorText" value="#0d3d29" placeholder="#0d3d29" style="flex:1;" oninput="document.getElementById('contactFormBgColorInput').value=this.value">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>সাবমিট বাটন রঙ</label>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <input type="color" id="contactBtnColorInput" value="#ffd700" style="width:48px;height:38px;border:1px solid #d1d5db;border-radius:8px;cursor:pointer;padding:2px;">
                            <input type="text" id="contactBtnColorText" value="#ffd700" placeholder="#ffd700" style="flex:1;" oninput="document.getElementById('contactBtnColorInput').value=this.value">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>বাটন টেক্সট রঙ</label>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <input type="color" id="contactBtnTextColorInput" value="#0d3d29" style="width:48px;height:38px;border:1px solid #d1d5db;border-radius:8px;cursor:pointer;padding:2px;">
                            <input type="text" id="contactBtnTextColorText" value="#0d3d29" placeholder="#0d3d29" style="flex:1;" oninput="document.getElementById('contactBtnTextColorInput').value=this.value">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>ফোন আইকন</label>
                            <input type="text" id="contactPhoneIconInput" placeholder="phone">
                        </div>
                        <div class="form-group">
                            <label>ফোন লেবেল</label>
                            <input type="text" id="contactPhoneLabelInput" placeholder="ফোন">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>ফোন নম্বরসমূহ (লাইন ব্রেকে আলাদা করুন বা <br> ব্যবহার করুন)</label>
                        <textarea id="contactPhoneNumbersInput"
                            placeholder="+880 1991 995 995\n+880 1991 994 994"></textarea>
                    </div>
                </div>
            </div>

            <div class="grid-2" style="margin-top:12px;">
                <div class="card">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>ইমেইল আইকন</label>
                            <input type="text" id="contactEmailIconInput" placeholder="📧">
                        </div>
                        <div class="form-group">
                            <label>ইমেইল লেবেল</label>
                            <input type="text" id="contactEmailLabelInput" placeholder="ইমেইল">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>ইমেইল ঠিকানা (লাইন ব্রেকে আলাদা করুন বা &lt;br&gt; ব্যবহার করুন)</label>
                        <textarea id="contactEmailAddressInput" placeholder="hello@example.com"></textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>ওয়েবসাইট আইকন</label>
                            <input type="text" id="contactWebIconInput" placeholder="globe">
                        </div>
                        <div class="form-group">
                            <label>ওয়েবসাইট লেবেল</label>
                            <input type="text" id="contactWebLabelInput" placeholder="ওয়েবসাইট">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:8px;">
                        <label>ওয়েবসাইট ঠিকানা</label>
                        <input type="text" id="contactWebAddressInput" placeholder="www.example.com">
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top:12px;">
                <div class="grid-2">
                    <div class="form-group">
                        <label>ঠিকানা আইকন</label>
                        <input type="text" id="contactAddressIconInput" placeholder="map-marker">
                    </div>
                    <div class="form-group">
                        <label>ঠিকানা লেবেল</label>
                        <input type="text" id="contactAddressLabelInput" placeholder="ঠিকানা">
                    </div>
                </div>
                <div class="form-group" style="margin-top:8px;">
                    <label>ঠিকানা (HTML অনুমোদিত)</label>
                    <textarea id="contactAddressTextInput" placeholder="লাইন ব্রেকের জন্য <br> ব্যবহার করুন"></textarea>
                </div>
            </div>

            <div style="margin-top:14px; display:flex; gap:10px; align-items:center;">
                <button id="saveContactBtn" class="btn btn-primary" type="button">সেভ</button>
                <button id="resetContactBtn" class="btn btn-secondary" type="button">রিসেট</button>
                <span style="color:#6b7280; font-size:14px; margin-left:8px;">
                    💡 পরিবর্তন দেখতে <a href="/" target="_blank" style="color:#059669; text-decoration:underline;">হোম
                        পেজ</a> এর যোগাযোগ সেকশন চেক করুন
                </span>
            </div>

            {{-- Live Preview --}}
            <div
                style="margin-top:1.5rem; border:1px solid #e5e7eb; border-radius:12px; padding:16px; background:#f9fafb;">
                <h3 style="margin:0 0 1rem 0; font-size:1rem; color:#374151;">লাইভ প্রিভিউ</h3>
                <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:12px;">
                    <div
                        style="border:1px solid #e5e7eb; border-radius:8px; padding:12px; background:#fff; display:flex; gap:12px; align-items:start;">
                        <div id="prevPhoneIcon" style="font-size:24px;"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4 id="prevPhoneLabel" style="margin:0 0 4px; font-size:14px; color:#059669;">Phone</h4>
                            <p id="prevPhoneNumbers" style="margin:0; font-size:13px; color:#6b7280; line-height:1.5;">
                                +880 1991 995 995</p>
                        </div>
                    </div>
                    <div
                        style="border:1px solid #e5e7eb; border-radius:8px; padding:12px; background:#fff; display:flex; gap:12px; align-items:start;">
                        <div id="prevEmailIcon" style="font-size:24px;">📧</div>
                        <div>
                            <h4 id="prevEmailLabel" style="margin:0 0 4px; font-size:14px; color:#059669;">Email</h4>
                            <p id="prevEmailAddress" style="margin:0; font-size:13px; color:#6b7280;">hello@example.com
                            </p>
                        </div>
                    </div>
                    <div
                        style="border:1px solid #e5e7eb; border-radius:8px; padding:12px; background:#fff; display:flex; gap:12px; align-items:start;">
                        <div id="prevWebIcon" style="font-size:24px;"><i class="fas fa-globe"></i></div>
                        <div>
                            <h4 id="prevWebLabel" style="margin:0 0 4px; font-size:14px; color:#059669;">Website</h4>
                            <p id="prevWebAddress" style="margin:0; font-size:13px; color:#6b7280;">www.example.com</p>
                        </div>
                    </div>
                    <div
                        style="border:1px solid #e5e7eb; border-radius:8px; padding:12px; background:#fff; display:flex; gap:12px; align-items:start;">
                        <div id="prevAddressIcon" style="font-size:24px;"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4 id="prevAddressLabel" style="margin:0 0 4px; font-size:14px; color:#059669;">Address
                            </h4>
                            <p id="prevAddressText" style="margin:0; font-size:13px; color:#6b7280; line-height:1.5;">
                                শুভনূর ৩৮৮ বাড়ি</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                (function () {
                    const qs = (id) => document.getElementById(id);
                    const els = {
                        title: qs('contactTitleInput'),
                        subtitle: qs('contactSubtitleInput'),
                        formTitle: qs('contactFormTitleInput'),
                        formBgColor: qs('contactFormBgColorInput'),
                        formBgColorText: qs('contactFormBgColorText'),
                        btnColor: qs('contactBtnColorInput'),
                        btnColorText: qs('contactBtnColorText'),
                        btnTextColor: qs('contactBtnTextColorInput'),
                        btnTextColorText: qs('contactBtnTextColorText'),
                        phoneIcon: qs('contactPhoneIconInput'),
                        phoneLabel: qs('contactPhoneLabelInput'),
                        phoneNumbers: qs('contactPhoneNumbersInput'),
                        emailIcon: qs('contactEmailIconInput'),
                        emailLabel: qs('contactEmailLabelInput'),
                        emailAddress: qs('contactEmailAddressInput'),
                        webIcon: qs('contactWebIconInput'),
                        webLabel: qs('contactWebLabelInput'),
                        webAddress: qs('contactWebAddressInput'),
                        addressIcon: qs('contactAddressIconInput'),
                        addressLabel: qs('contactAddressLabelInput'),
                        addressText: qs('contactAddressTextInput')
                    };

                    // Live preview elements
                    const prevEls = {
                        phoneIcon: qs('prevPhoneIcon'),
                        phoneLabel: qs('prevPhoneLabel'),
                        phoneNumbers: qs('prevPhoneNumbers'),
                        emailIcon: qs('prevEmailIcon'),
                        emailLabel: qs('prevEmailLabel'),
                        emailAddress: qs('prevEmailAddress'),
                        webIcon: qs('prevWebIcon'),
                        webLabel: qs('prevWebLabel'),
                        webAddress: qs('prevWebAddress'),
                        addressIcon: qs('prevAddressIcon'),
                        addressLabel: qs('prevAddressLabel'),
                        addressText: qs('prevAddressText')
                    };

                    async function load() {
                        try {
                            const response = await fetch('/admin/contact-settings');
                            const s = await response.json();

                            if (els.title) els.title.value = s.title || 'যোগাযোগ করুন';
                            if (els.subtitle) els.subtitle.value = s.subtitle || 'আমরা আপনার সেবায় প্রস্তুত';
                            if (els.formTitle) els.formTitle.value = s.form_title || 'বুকিং তথ্য পাঠান';
                            const bgColor = s.form_bg_color || '#0d3d29';
                            const btnColor = s.btn_color || '#ffd700';
                            const btnTextColor = s.btn_text_color || '#0d3d29';
                            if (els.formBgColor) els.formBgColor.value = bgColor;
                            if (els.formBgColorText) els.formBgColorText.value = bgColor;
                            if (els.btnColor) els.btnColor.value = btnColor;
                            if (els.btnColorText) els.btnColorText.value = btnColor;
                            if (els.btnTextColor) els.btnTextColor.value = btnTextColor;
                            if (els.btnTextColorText) els.btnTextColorText.value = btnTextColor;
                            if (els.phoneIcon) els.phoneIcon.value = s.phone_icon || '📞';
                            if (els.phoneLabel) els.phoneLabel.value = s.phone_label || 'ফোন';
                            if (els.phoneNumbers) els.phoneNumbers.value = (s.phone_numbers || '+880 1991 995 995\n+880 1991 994 994').replace(/<br\s*\/>?/gi, '\n');
                            if (els.emailIcon) els.emailIcon.value = s.email_icon || '📧';
                            if (els.emailLabel) els.emailLabel.value = s.email_label || 'ইমেইল';
                            if (els.emailAddress) els.emailAddress.value = (s.email_address || 'hello.nexgroup@gmail.com').replace(/<br\s*\/>?/gi, '\n');
                            if (els.webIcon) els.webIcon.value = s.web_icon || '🌐';
                            if (els.webLabel) els.webLabel.value = s.web_label || 'ওয়েবসাইট';
                            if (els.webAddress) els.webAddress.value = s.web_address || 'www.jolchaya.com';
                            if (els.addressIcon) els.addressIcon.value = s.address_icon || '📍';
                            if (els.addressLabel) els.addressLabel.value = s.address_label || 'ঠিকানা';
                            if (els.addressText) els.addressText.value = (s.address_text || '').replace(/<br\s*\/>?/gi, '\n');

                            updatePreview();
                        } catch (error) {
                            console.error('Error loading contact settings:', error);
                            // Fallback to defaults
                            if (els.title) els.title.value = 'যোগাযোগ করুন';
                            if (els.subtitle) els.subtitle.value = 'আমরা আপনার সেবায় প্রস্তুত';
                            if (els.formTitle) els.formTitle.value = 'বুকিং তথ্য পাঠান';
                            if (els.phoneIcon) els.phoneIcon.value = '📞';
                            if (els.phoneLabel) els.phoneLabel.value = 'ফোন';
                            if (els.phoneNumbers) els.phoneNumbers.value = '+880 1991 995 995\n+880 1991 994 994';
                            if (els.emailIcon) els.emailIcon.value = '📧';
                            if (els.emailLabel) els.emailLabel.value = 'ইমেইল';
                            if (els.emailAddress) els.emailAddress.value = 'hello.nexgroup@gmail.com';
                            if (els.webIcon) els.webIcon.value = '🌐';
                            if (els.webLabel) els.webLabel.value = 'ওয়েবসাইট';
                            if (els.webAddress) els.webAddress.value = 'www.jolchaya.com';
                            if (els.addressIcon) els.addressIcon.value = '📍';
                            if (els.addressLabel) els.addressLabel.value = 'ঠিকানা';
                            if (els.addressText) els.addressText.value = '';
                            updatePreview();
                        }
                    }

                    function updatePreview() {
                        if (prevEls.phoneIcon) prevEls.phoneIcon.textContent = els.phoneIcon?.value || '📞';
                        if (prevEls.phoneLabel) prevEls.phoneLabel.textContent = els.phoneLabel?.value || 'Phone';
                        if (prevEls.phoneNumbers) prevEls.phoneNumbers.innerHTML = (els.phoneNumbers?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>') || '+880 1991 995 995';
                        if (prevEls.emailIcon) prevEls.emailIcon.textContent = els.emailIcon?.value || '📧';
                        if (prevEls.emailLabel) prevEls.emailLabel.textContent = els.emailLabel?.value || 'Email';
                        if (prevEls.emailAddress) prevEls.emailAddress.innerHTML = (els.emailAddress?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>') || 'hello@example.com';
                        if (prevEls.webIcon) prevEls.webIcon.textContent = els.webIcon?.value || '🌐';
                        if (prevEls.webLabel) prevEls.webLabel.textContent = els.webLabel?.value || 'Website';
                        if (prevEls.webAddress) prevEls.webAddress.textContent = els.webAddress?.value || 'www.example.com';
                        if (prevEls.addressIcon) prevEls.addressIcon.textContent = els.addressIcon?.value || '📍';
                        if (prevEls.addressLabel) prevEls.addressLabel.textContent = els.addressLabel?.value || 'Address';
                        if (prevEls.addressText) prevEls.addressText.innerHTML = (els.addressText?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>') || 'শুভনূর ৩৮৮ বাড়ি';
                    }

                    async function save() {
                        const payload = {
                            title: els.title?.value || '',
                            subtitle: els.subtitle?.value || '',
                            form_title: els.formTitle?.value || '',
                            form_bg_color: els.formBgColorText?.value || '#0d3d29',
                            btn_color: els.btnColorText?.value || '#ffd700',
                            btn_text_color: els.btnTextColorText?.value || '#0d3d29',
                            phone_icon: els.phoneIcon?.value || '',
                            phone_label: els.phoneLabel?.value || '',
                            phone_numbers: (els.phoneNumbers?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>'),
                            email_icon: els.emailIcon?.value || '',
                            email_label: els.emailLabel?.value || '',
                            email_address: (els.emailAddress?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>'),
                            web_icon: els.webIcon?.value || '',
                            web_label: els.webLabel?.value || '',
                            web_address: els.webAddress?.value || '',
                            address_icon: els.addressIcon?.value || '',
                            address_label: els.addressLabel?.value || '',
                            address_text: (els.addressText?.value || '').split(/\n+/).map(s => s.trim()).filter(Boolean).join('<br>')
                        };

                        try {
                            const response = await fetch('/admin/contact-settings', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                                },
                                body: JSON.stringify(payload)
                            });

                            const result = await response.json();

                            if (result.success) {
                                updatePreview();
                                showSaveSuccess();
                            } else {
                                alert('সংরক্ষণ করতে ব্যর্থ: ' + (result.message || 'অজানা ত্রুটি'));
                            }
                        } catch (error) {
                            console.error('Error saving contact settings:', error);
                            alert('সংরক্ষণ করতে ব্যর্থ হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।');
                        }
                    }

                    function showSaveSuccess() {
                        if (typeof showNotification === 'function') {
                            showNotification('যোগাযোগ সেকশন সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                        }
                        const btn = document.getElementById('saveContactBtn');
                        if (btn) {
                            const originalText = btn.textContent;
                            btn.textContent = '✓ সেভ হয়েছে';
                            btn.style.backgroundColor = '#10b981';
                            setTimeout(() => {
                                btn.textContent = originalText;
                                btn.style.backgroundColor = '';
                            }, 2000);
                        }
                    }

                    document.getElementById('saveContactBtn').addEventListener('click', save);
                    document.getElementById('resetContactBtn').addEventListener('click', async () => {
                        // Reset to default values
                        if (els.title) els.title.value = 'যোগাযোগ করুন';
                        if (els.subtitle) els.subtitle.value = 'আমরা আপনার সেবায় প্রস্তুত';
                        if (els.formTitle) els.formTitle.value = 'বুকিং তথ্য পাঠান';
                        if (els.formBgColor) els.formBgColor.value = '#0d3d29';
                        if (els.formBgColorText) els.formBgColorText.value = '#0d3d29';
                        if (els.btnColor) els.btnColor.value = '#ffd700';
                        if (els.btnColorText) els.btnColorText.value = '#ffd700';
                        if (els.btnTextColor) els.btnTextColor.value = '#0d3d29';
                        if (els.btnTextColorText) els.btnTextColorText.value = '#0d3d29';
                        if (els.phoneIcon) els.phoneIcon.value = '📞';
                        if (els.phoneLabel) els.phoneLabel.value = 'ফোন';
                        if (els.phoneNumbers) els.phoneNumbers.value = '+880 1991 995 995\n+880 1991 994 994\n+880 1997 995 995\n+880 1677 600 000';
                        if (els.emailIcon) els.emailIcon.value = '📧';
                        if (els.emailLabel) els.emailLabel.value = 'ইমেইল';
                        if (els.emailAddress) els.emailAddress.value = 'hello.nexgroup@gmail.com';
                        if (els.webIcon) els.webIcon.value = '🌐';
                        if (els.webLabel) els.webLabel.value = 'ওয়েবসাইট';
                        if (els.webAddress) els.webAddress.value = 'www.jolchaya.com';
                        if (els.addressIcon) els.addressIcon.value = '📍';
                        if (els.addressLabel) els.addressLabel.value = 'ঠিকানা';
                        if (els.addressText) els.addressText.value = 'শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস\nখুলনা, বাংলাদেশ';
                        updatePreview();
                    });

                    // Sync color pickers with text inputs
                    qs('contactFormBgColorInput')?.addEventListener('input', function(){ if(els.formBgColorText) els.formBgColorText.value = this.value; });
                    qs('contactBtnColorInput')?.addEventListener('input', function(){ if(els.btnColorText) els.btnColorText.value = this.value; });
                    qs('contactBtnTextColorInput')?.addEventListener('input', function(){ if(els.btnTextColorText) els.btnTextColorText.value = this.value; });

                    // Load on page load
                    load();
                })();
            </script>
        </div>

        {{-- Dynamic Form Fields Management --}}
        <div class="table-card" style="margin-top:1rem;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <div>
                    <h2 style="margin:0;">ফর্ম ফিল্ড ম্যানেজমেন্ট</h2>
                    <p style="color:#6b7280; margin:4px 0 0;">যোগাযোগ ফর্মের ফিল্ডগুলি সম্পাদনা করুন</p>
                </div>
                <button id="addFormFieldBtn" class="btn btn-primary" type="button">+ নতুন ফিল্ড যোগ করুন</button>
            </div>

            <div class="form-group" style="margin-bottom:1rem;">
                <label>সাবমিট বাটন টেক্সট</label>
                <div style="display:flex;gap:8px;align-items:center;">
                    <input type="text" id="submitButtonText" placeholder="পাঠান" style="max-width:260px;">
                    <button type="button" onclick="saveSubmitButtonText()" style="padding:8px 18px;background:#0d3d29;color:#fff;border:none;border-radius:8px;font-size:0.875rem;font-weight:600;cursor:pointer;">সেভ করুন</button>
                </div>
            </div>

            <div id="formFieldsContainer" style="display:grid; gap:12px;"></div>

            <style>
                .card-editor[draggable="true"] {
                    cursor: move;
                }

                .card-editor[draggable="true"]:hover {
                    border-color: #3b82f6 !important;
                    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
                }

                .card-editor[draggable="true"] .drag-handle:hover {
                    color: #3b82f6;
                }

                .card-editor[draggable="true"][style*="opacity: 0.5"] {
                    border-color: #93c5fd !important;
                    background: #eff6ff !important;
                }
            </style>

            <script>
                (function () {
                    let formFields = [];
                    const container = document.getElementById('formFieldsContainer');
                    const submitBtnInput = document.getElementById('submitButtonText');
                    let fieldCounter = 0;

                    async function loadFormFields() {
                        try {
                            const response = await fetch('/api/contact-form-fields');
                            formFields = await response.json();
                            renderFields();
                        } catch (error) {
                            console.error('Error loading form fields:', error);
                        }
                    }

                    function renderFields() {
                        container.innerHTML = '';
                        formFields.forEach((field, index) => {
                            const isLastField = index === formFields.length - 1;
                            container.appendChild(createFieldCard(field, index, isLastField));
                        });
                        setupDragAndDrop();
                    }

                    function setupDragAndDrop() {
                        const cards = container.querySelectorAll('.card-editor[draggable="true"]');
                        let draggedElement = null;

                        cards.forEach(card => {
                            card.addEventListener('dragstart', function (e) {
                                draggedElement = this;
                                this.style.opacity = '0.5';
                                e.dataTransfer.effectAllowed = 'move';
                                e.dataTransfer.setData('text/html', this.innerHTML);
                            });

                            card.addEventListener('dragend', function () {
                                this.style.opacity = '1';
                                draggedElement = null;
                            });

                            card.addEventListener('dragover', function (e) {
                                e.preventDefault();
                                e.dataTransfer.dropEffect = 'move';

                                if (this !== draggedElement && this.draggable) {
                                    const rect = this.getBoundingClientRect();
                                    const midpoint = rect.top + rect.height / 2;

                                    if (e.clientY < midpoint) {
                                        this.parentNode.insertBefore(draggedElement, this);
                                    } else {
                                        this.parentNode.insertBefore(draggedElement, this.nextSibling);
                                    }
                                }
                            });

                            card.addEventListener('drop', function (e) {
                                e.stopPropagation();
                                updateFieldOrder();
                            });
                        });
                    }

                    async function updateFieldOrder() {
                        const cards = container.querySelectorAll('.card-editor[draggable="true"]');
                        const updates = [];

                        cards.forEach((card, index) => {
                            const fieldId = card.dataset.fieldId;
                            const field = formFields.find(f => f.id == fieldId);
                            if (field) {
                                field.order = index;
                                updates.push({
                                    id: fieldId,
                                    order: index
                                });
                            }
                        });

                        // Save new order to backend
                        try {
                            for (const update of updates) {
                                const formData = new FormData();
                                const field = formFields.find(f => f.id == update.id);
                                formData.append('label', field.label);
                                formData.append('type', field.type);
                                formData.append('placeholder', field.placeholder || '');
                                formData.append('required', field.required ? '1' : '0');
                                formData.append('order', update.order);
                                formData.append('_method', 'PUT');

                                await fetch(`/admin/contact-form-fields/${update.id}`, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                                    }
                                });
                            }
                            console.log('Field order updated successfully');
                        } catch (error) {
                            console.error('Error updating field order:', error);
                        }
                    }

                    function createFieldCard(field = null, index = null, isLastField = false) {
                        const id = field ? field.id : 'new_' + (++fieldCounter);
                        const isNew = !field;
                        const card = document.createElement('div');
                        card.className = 'card-editor';
                        const extraPadding = isLastField ? 'padding:16px 16px 46px 16px;' : 'padding:16px;';
                        const bgColor = isLastField ? 'background:#f0f9ff;' : 'background:#fafafa;';
                        card.style.cssText = `border:1px solid #e5e7eb; border-radius:12px; ${extraPadding} ${bgColor} position:relative; transition:all 0.2s;`;
                        card.dataset.fieldId = id;
                        card.draggable = !isNew; // Only saved fields are draggable

                        const label = (field?.label || '').replace(/"/g, '&quot;');
                        const type = field?.type || 'text';
                        const placeholder = (field?.placeholder || '').replace(/"/g, '&quot;');
                        const required = field?.required || false;
                        const order = field?.order || index || 0;

                        card.innerHTML = `
                            ${!isNew ? `<div class="drag-handle" style="position:absolute; left:8px; top:50%; transform:translateY(-50%); cursor:grab; color:#9ca3af; font-size:20px;">⋮⋮</div>` : ''}
                            <div style="display:grid; grid-template-columns:2fr 1fr 1fr; gap:12px; margin-bottom:12px; padding-left:${!isNew ? '24px' : '0'};">
                                <div>
                                    <label style="font-size:13px; font-weight:500;">লেবেল</label>
                                    <input type="text" class="field-label" value="${label}" placeholder="নাম" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px; margin-top:4px;">
                                </div>
                                <div>
                                    <label style="font-size:13px; font-weight:500;">টাইপ</label>
                                    <select class="field-type" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px; margin-top:4px;">
                                        <option value="text" ${type === 'text' ? 'selected' : ''}>টেক্সট</option>
                                        <option value="email" ${type === 'email' ? 'selected' : ''}>ইমেইল</option>
                                        <option value="tel" ${type === 'tel' ? 'selected' : ''}>ফোন</option>
                                        <option value="number" ${type === 'number' ? 'selected' : ''}>সংখ্যা</option>
                                        <option value="textarea" ${type === 'textarea' ? 'selected' : ''}>টেক্সট এরিয়া</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="font-size:13px; font-weight:500;">অর্ডার</label>
                                    <input type="number" class="field-order" value="${order}" min="0" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px; margin-top:4px;">
                                </div>
                            </div>
                            <div style="margin-bottom:12px;">
                                <label style="font-size:13px; font-weight:500;">প্লেসহোল্ডার</label>
                                <input type="text" class="field-placeholder" value="${placeholder}" placeholder="আপনার নাম লিখুন" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px; margin-top:4px;">
                            </div>
                            <div style="margin-bottom:12px;">
                                <label style="display:flex; align-items:center; gap:8px; font-size:13px; cursor:pointer;">
                                    <input type="checkbox" class="field-required" ${required ? 'checked' : ''} style="cursor:pointer;">
                                    <span>এই ফিল্ডটি প্রয়োজনীয়</span>
                                </label>
                            </div>
                            <div style="display:flex; gap:8px;">
                                <button type="button" class="btn btn-primary" onclick="saveFormField('${id}')" style="padding:8px 16px; font-size:13px;">${isNew ? 'যোগ করুন' : 'আপডেট'}</button>
                                ${!isNew ? `<button type="button" class="btn" onclick="deleteFormField('${id}')" style="padding:8px 16px; font-size:13px; background:#ef4444; color:#fff;">মুছুন</button>` : ''}
                                <span class="status-${id}" style="font-size:12px; color:#666; margin-left:8px; align-self:center;"></span>
                            </div>
                        `;
                        return card;
                    }

                    window.saveFormField = async function (id) {
                        const card = document.querySelector(`[data-field-id="${id}"]`);
                        if (!card) return;

                        const label = card.querySelector('.field-label').value.trim();
                        const type = card.querySelector('.field-type').value;
                        const placeholder = card.querySelector('.field-placeholder').value.trim();
                        const required = card.querySelector('.field-required').checked;
                        const order = parseInt(card.querySelector('.field-order').value) || 0;
                        const statusEl = card.querySelector(`.status-${id}`);

                        if (!label) {
                            alert('লেবেল প্রয়োজনীয়');
                            return;
                        }

                        if (statusEl) statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';

                        try {
                            const isNew = id.toString().startsWith('new_');
                            const url = isNew ? '/admin/contact-form-fields' : `/admin/contact-form-fields/${id}`;
                            const formData = new FormData();
                            formData.append('label', label);
                            formData.append('type', type);
                            formData.append('placeholder', placeholder);
                            formData.append('required', required ? '1' : '0');
                            formData.append('order', order);
                            if (!isNew) formData.append('_method', 'PUT');

                            const response = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                                },
                                body: formData
                            });

                            const result = await response.json();
                            if (result.success) {
                                if (statusEl) {
                                    statusEl.textContent = '✓ সংরক্ষিত';
                                    statusEl.style.color = '#10b981';
                                    setTimeout(() => statusEl.textContent = '', 3000);
                                }
                                setTimeout(() => {
                                    loadFormFields();
                                    // Trigger frontend refresh
                                    try {
                                        localStorage.setItem('refreshContactForm', Date.now());
                                    } catch (e) { }
                                }, 500);
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            if (statusEl) {
                                statusEl.textContent = '✗ ত্রুটি';
                                statusEl.style.color = '#ef4444';
                            }
                        }
                    };

                    window.deleteFormField = async function (id) {
                        const confirmed = await showHomeConfirm('এই ফিল্ডটি মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;

                        try {
                            const response = await fetch(`/admin/contact-form-fields/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                                }
                            });

                            const result = await response.json();
                            if (result.success) {
                                loadFormFields();
                                try {
                                    localStorage.setItem('refreshContactForm', Date.now());
                                } catch (e) { }
                            }
                        } catch (error) {
                            console.error('Error:', error);
                        }
                    };

                    document.getElementById('addFormFieldBtn').addEventListener('click', () => {
                        container.appendChild(createFieldCard());
                    });

                    // Submit button text — load from DB, save to DB
                    function loadSubmitButtonText() {
                        fetch('/admin/contact-form-button', { cache: 'no-store' })
                            .then(r => r.json())
                            .then(d => { if (submitBtnInput && d.buttonText) submitBtnInput.value = d.buttonText; })
                            .catch(() => {});
                    }

                    function saveSubmitButtonText() {
                        const text = submitBtnInput.value.trim() || 'পাঠান';
                        const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
                        fetch('/admin/contact-form-button', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                            body: JSON.stringify({ buttonText: text })
                        }).then(r => r.json()).then(d => {
                            if (d.success && window.showSuccess) window.showSuccess('বাটন টেক্সট সংরক্ষিত হয়েছে');
                        }).catch(() => {});
                    }

                    window.saveSubmitButtonText = saveSubmitButtonText;
                    submitBtnInput.addEventListener('change', saveSubmitButtonText);

                    loadFormFields();
                    loadSubmitButtonText();
                })();
            </script>
        </div>
    </div>
    <div id="home-features" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের সুবিধা সমূহ</h2>
            <style>
                #home-features .features-form input[type="text"],
                #home-features .features-form textarea {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-features .features-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-features .card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-features .card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px
                }

                #home-features .delete-feature {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 4px 10px;
                    font-size: 12px;
                    cursor: pointer;
                }

                #home-features .delete-feature:hover {
                    background: #dc2626;
                }

                #home-features .section-header-fields {
                    background: #f9fafb;
                    padding: 16px;
                    border-radius: 10px;
                    margin-bottom: 16px;
                    border: 1px solid #e5e7eb;
                }

                #home-features .section-header-fields label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: 600;
                    font-size: 14px;
                    color: #374151;
                }

                #home-features .section-header-fields input {
                    width: 100%;
                    margin-bottom: 12px;
                }

                @media (max-width: 960px) {
                    #home-features .features-grid-editor {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="features-form">
                <!-- Section Title and Subtitle Fields -->
                <div class="section-header-fields">
                    <label for="feature-section-title">সেকশন শিরোনাম (Title)</label>
                    <input type="text" id="feature-section-title" placeholder="আমাদের সুবিধাসমূহ" />
                    <label for="feature-section-subtitle">সেকশন সাব-শিরোনাম (Subtitle)</label>
                    <input type="text" id="feature-section-subtitle" placeholder="NEX Real Estate এর একটি প্রকল্প" />
                </div>
                <div class="features-grid-editor" id="featuresGridEditor">
                    <!-- Features will be loaded here dynamically -->
                </div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="addFeatureBtn" class="btn btn-primary" type="button">নতুন সুবিধা যোগ করুন</button>
                    <button id="saveFeaturesBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetFeaturesBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    let features = [];
                    let featureSettings = { section_title: '', section_subtitle: '' };
                    const gridEditor = document.getElementById('featuresGridEditor');
                    const sectionTitleInput = document.getElementById('feature-section-title');
                    const sectionSubtitleInput = document.getElementById('feature-section-subtitle');

                    // Load feature settings from database
                    async function loadFeatureSettings() {
                        try {
                            const response = await fetch('/api/feature-settings');
                            if (!response.ok) throw new Error('Failed to load feature settings');
                            featureSettings = await response.json() || { section_title: '', section_subtitle: '' };

                            // Populate the input fields
                            if (sectionTitleInput) {
                                sectionTitleInput.value = featureSettings.section_title || '';
                            }
                            if (sectionSubtitleInput) {
                                sectionSubtitleInput.value = featureSettings.section_subtitle || '';
                            }
                        } catch (error) {
                            console.error('Error loading feature settings:', error);
                        }
                    }

                    // Load features from database
                    async function loadFeatures() {
                        try {
                            const response = await fetch('/api/features');
                            if (!response.ok) throw new Error('Failed to load features');
                            features = await response.json();
                            renderFeatures();
                        } catch (error) {
                            console.error('Error loading features:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সুবিধা লোড করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    }

                    // Render features
                    function renderFeatures() {
                        gridEditor.innerHTML = '';
                        features.forEach((feature, index) => {
                            const card = document.createElement('div');
                            card.className = 'card-editor';
                            card.innerHTML = `
                                <button class="delete-feature" data-id="${feature.id}" data-index="${index}">মুছুন</button>
                                <h4>কার্ড ${index + 1}</h4>
                                <input type="text" class="feat-icon" data-index="${index}" placeholder="আইকন (যেমন: 🏘️)" value="${feature.icon || ''}" />
                                <input type="text" class="feat-title" data-index="${index}" placeholder="শিরোনাম" style="margin-top:8px;" value="${feature.title || ''}" />
                                <textarea class="feat-desc" data-index="${index}" placeholder="বিবরণ" style="margin-top:8px; height:80px;">${feature.description || ''}</textarea>
                            `;
                            gridEditor.appendChild(card);
                        });

                        // Bind events
                        bindInputEvents();
                        bindDeleteEvents();
                    }

                    // Bind input events
                    function bindInputEvents() {
                        gridEditor.querySelectorAll('.feat-icon, .feat-title, .feat-desc').forEach(input => {
                            input.addEventListener('input', (e) => {
                                const index = parseInt(e.target.dataset.index);
                                const field = e.target.classList.contains('feat-icon') ? 'icon' :
                                    e.target.classList.contains('feat-title') ? 'title' : 'description';
                                if (features[index]) {
                                    features[index][field] = e.target.value;
                                }
                            });
                        });
                    }

                    // Bind delete events
                    function bindDeleteEvents() {
                        gridEditor.querySelectorAll('.delete-feature').forEach(btn => {
                            btn.addEventListener('click', async (e) => {
                                const id = e.target.dataset.id;
                                const index = parseInt(e.target.dataset.index);

                                const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত যে এই সুবিধাটি মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                                if (!confirmed) return;

                                try {
                                    if (id && id !== 'undefined') {
                                        const response = await fetch(`/admin/features/${id}`, {
                                            method: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                            }
                                        });

                                        if (!response.ok) throw new Error('Delete failed');
                                    }

                                    features.splice(index, 1);
                                    renderFeatures();

                                    if (typeof showNotification === 'function') {
                                        showNotification('সুবিধা মুছে ফেলা হয়েছে!', 'success');
                                    }
                                } catch (error) {
                                    console.error('Error deleting feature:', error);
                                    if (typeof showNotification === 'function') {
                                        showNotification('মুছে ফেলতে ব্যর্থ হয়েছে', 'error');
                                    }
                                }
                            });
                        });
                    }

                    // Add new feature
                    document.getElementById('addFeatureBtn').addEventListener('click', () => {
                        features.push({
                            id: undefined,
                            icon: '🏙️',
                            title: '',
                            description: '',
                            order: features.length + 1,
                            is_active: true
                        });
                        renderFeatures();
                    });

                    // Save features
                    document.getElementById('saveFeaturesBtn').addEventListener('click', async () => {
                        try {
                            // Save section title and subtitle first
                            const settingsData = {
                                section_title: sectionTitleInput ? sectionTitleInput.value : '',
                                section_subtitle: sectionSubtitleInput ? sectionSubtitleInput.value : ''
                            };

                            const settingsResponse = await fetch('/admin/feature-settings', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify(settingsData)
                            });

                            if (!settingsResponse.ok) {
                                throw new Error('Failed to save section settings');
                            }

                            // Save all features
                            for (const feature of features) {
                                const data = {
                                    title: feature.title,
                                    icon: feature.icon,
                                    description: feature.description,
                                    order: feature.order,
                                    is_active: feature.is_active !== false
                                };

                                if (feature.id) {
                                    // Update existing
                                    const response = await fetch(`/admin/features/${feature.id}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify(data)
                                    });

                                    if (!response.ok) throw new Error('Update failed');
                                } else {
                                    // Create new
                                    const response = await fetch('/admin/features', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify(data)
                                    });

                                    if (!response.ok) throw new Error('Create failed');
                                    const result = await response.json();
                                    feature.id = result.data.id;
                                }
                            }

                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম, সাব-শিরোনাম ও সুবিধা সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }

                            // Reload to get updated data
                            await loadFeatureSettings();
                            await loadFeatures();
                        } catch (error) {
                            console.error('Error saving features:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    });

                    // Reset features
                    document.getElementById('resetFeaturesBtn').addEventListener('click', async () => {
                        const confirmed = await showHomeConfirm('আপনি কি সমস্ত পরিবর্তন বাতিল করতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        await loadFeatureSettings();
                        await loadFeatures();
                    });

                    // Initialize — lazy load when home tab is first opened
                    if (window.registerTabLoader) {
                        registerTabLoader('home', loadFeatureSettings);
                        registerTabLoader('home', loadFeatures);
                    } else { loadFeatureSettings(); loadFeatures(); }
                })();
            </script>
        </div>
    </div>

    <div id="home-hero" style="margin-top:1rem;">
        <div class="table-card">
            <h2>হিরো সেকশন</h2>
            <style>
                #home-hero .table-card input[type="text"],
                #home-hero .table-card input[type="url"],
                #home-hero .table-card select { height:48px; padding:10px 12px; font-size:16px; border-radius:10px; }
                #home-hero .table-card textarea { min-height:120px; padding:12px; font-size:16px; border-radius:10px; }
                .hero-slide-card { background:#f9fafb; border:1px solid #e5e7eb; border-radius:12px; padding:16px; position:relative; }
                .hero-slide-card .remove-slide-btn { position:absolute; top:10px; right:10px; background:#ef4444; color:#fff; border:none; border-radius:6px; width:28px; height:28px; cursor:pointer; font-size:14px; display:flex; align-items:center; justify-content:center; }
                .hero-slide-card .slide-preview { border:2px dashed #cbd5e1; border-radius:10px; aspect-ratio:16/9; background:#f1f5f9; display:flex; align-items:center; justify-content:center; overflow:hidden; margin-bottom:10px; }
                .hero-slide-card .slide-preview img { width:100%; height:100%; object-fit:cover; }
                .hero-slide-card .slide-preview iframe { width:100%; height:100%; border:none; }
                .hero-slide-card .type-btn { flex:1; padding:8px; border:2px solid #e5e7eb; border-radius:8px; background:#fff; cursor:pointer; font-size:13px; font-weight:600; transition:all .2s; }
                .hero-slide-card .type-btn.active { border-color:#0d3d29; background:#0d3d29; color:#fff; }
                #heroSlidesContainer { display:grid; grid-template-columns:repeat(auto-fill, minmax(280px,1fr)); gap:16px; margin-bottom:16px; }
            </style>
            <div class="form-grid" style="display:grid; grid-template-columns:1fr; gap:16px;">
                <div class="form-group"><label>শিরোনাম</label><input type="text" id="heroTitleInput" placeholder="হিরো শিরোনাম"></div>
                <div class="form-group"><label>সাব-শিরোনাম</label><input type="text" id="heroSubtitleInput" placeholder="সাব-শিরোনাম"></div>
                <div class="form-group"><label>হিরো ট্যাগলাইন</label><textarea id="heroTaglineInput" placeholder="প্রকৃতির কোলে নির্মিত আধুনিক আবাসিক প্রকল্প।"></textarea></div>
                <div class="form-row" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div class="form-group"><label>প্রাইমারি বাটন টেক্সট</label><input type="text" id="heroPrimaryTextInput" placeholder="মূল্য দেখুন"></div>
                    <div class="form-group"><label>প্রাইমারি বাটন লিংক</label><input type="text" id="heroPrimaryLinkInput" placeholder="#pricing"></div>
                    <div class="form-group"><label>সেকেন্ডারি বাটন টেক্সট</label><input type="text" id="heroSecondaryTextInput" placeholder="যোগাযোগ করুন"></div>
                    <div class="form-group"><label>সেকেন্ডারি বাটন লিংক</label><input type="text" id="heroSecondaryLinkInput" placeholder="#contact"></div>
                </div>
                <div>
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                        <label style="font-weight:600; font-size:15px;">স্লাইডসমূহ</label>
                        <button id="addSlideBtn" type="button" style="background:#0d3d29; color:#fff; border:none; border-radius:8px; padding:8px 16px; cursor:pointer; font-size:13px; font-weight:600;"><i class="fas fa-plus"></i> নতুন স্লাইড</button>
                    </div>
                    <div id="heroSlidesContainer"></div>
                </div>
                <div><button id="saveHeroBtn" class="btn btn-primary" type="button">সেভ করুন</button></div>
            </div>
            <script>
            (function () {
                const qs = id => document.getElementById(id);
                const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
                const inputs = {
                    title: qs('heroTitleInput'), subtitle: qs('heroSubtitleInput'),
                    tagline: qs('heroTaglineInput'), pText: qs('heroPrimaryTextInput'),
                    pLink: qs('heroPrimaryLinkInput'), sText: qs('heroSecondaryTextInput'),
                    sLink: qs('heroSecondaryLinkInput')
                };
                let slides = [];

                function getEmbed(url) {
                    if (!url) return '';
                    const ym = url.match(/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
                    if (ym) return 'https://www.youtube.com/embed/' + ym[1] + '?autoplay=1&mute=1&loop=1&playlist=' + ym[1] + '&controls=0&rel=0&modestbranding=1&playsinline=1';
                    const vm = url.match(/vimeo\.com\/(\d+)/);
                    if (vm) return 'https://player.vimeo.com/video/' + vm[1] + '?autoplay=1&muted=1&loop=1&background=1';
                    return url;
                }

                function renderSlides() {
                    const container = qs('heroSlidesContainer');
                    container.innerHTML = '';
                    slides.forEach((slide, idx) => {
                        const card = document.createElement('div');
                        card.className = 'hero-slide-card';
                        let previewHtml = '<span style="color:#94a3b8;font-size:13px;">স্লাইড ' + (idx+1) + '</span>';
                        if (slide.type === 'video' && slide.videoUrl) {
                            previewHtml = '<iframe src="' + getEmbed(slide.videoUrl) + '" allowfullscreen></iframe>';
                        } else if (slide.imageUrl) {
                            previewHtml = '<img src="' + slide.imageUrl + '" alt="Slide">';
                        }
                        card.innerHTML = `
                            <button class="remove-slide-btn" data-idx="${idx}"><i class="fas fa-times"></i></button>
                            <div style="font-weight:600;font-size:13px;color:#374151;margin-bottom:8px;">স্লাইড ${idx+1}</div>
                            <div style="display:flex;gap:8px;margin-bottom:10px;">
                                <button class="type-btn ${slide.type==='image'?'active':''}" data-idx="${idx}" data-type="image">🖼 ইমেজ</button>
                                <button class="type-btn ${slide.type==='video'?'active':''}" data-idx="${idx}" data-type="video">🎬 ভিডিও</button>
                            </div>
                            <div class="slide-preview">${previewHtml}</div>
                            ${slide.type === 'image'
                                ? '<input type="file" accept="image/*" data-idx="' + idx + '" class="slide-file-input" style="width:100%;font-size:13px;">'
                                : '<input type="url" placeholder="YouTube / Vimeo URL" value="' + (slide.videoUrl||'')+'" data-idx="' + idx + '" class="slide-video-input" style="width:100%;padding:8px 10px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;margin-top:4px;">'
                            }
                        `;
                        container.appendChild(card);
                    });

                    container.querySelectorAll('.remove-slide-btn').forEach(btn => {
                        btn.addEventListener('click', function() { slides.splice(parseInt(this.dataset.idx),1); renderSlides(); });
                    });
                    container.querySelectorAll('.type-btn').forEach(btn => {
                        btn.addEventListener('click', function() { slides[parseInt(this.dataset.idx)].type = this.dataset.type; renderSlides(); });
                    });
                    container.querySelectorAll('.slide-file-input').forEach(input => {
                        input.addEventListener('change', function() {
                            const i = parseInt(this.dataset.idx), f = this.files[0];
                            if (!f) return;
                            slides[i].file = f; slides[i].imageUrl = URL.createObjectURL(f); renderSlides();
                        });
                    });
                    container.querySelectorAll('.slide-video-input').forEach(input => {
                        input.addEventListener('input', function() {
                            const i = parseInt(this.dataset.idx);
                            slides[i].videoUrl = this.value;
                            // Show YouTube thumbnail preview
                            const preview = this.closest('.hero-slide-card').querySelector('.slide-preview');
                            const url = this.value;
                            const ym = url.match(/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
                            if (ym && preview) {
                                preview.innerHTML = '<img src="https://img.youtube.com/vi/' + ym[1] + '/hqdefault.jpg" style="width:100%;height:100%;object-fit:cover;">';
                            }
                        });
                    });
                }

                qs('addSlideBtn').addEventListener('click', () => {
                    slides.push({id:null, type:'image', imageUrl:'', videoUrl:'', file:null}); renderSlides();
                });

                async function loadHeroTagline() {
                    try { const r = await fetch('/api/header-settings'); if(r.ok){const d=await r.json(); if(inputs.tagline&&d.hero_tagline) inputs.tagline.value=d.hero_tagline;} } catch(e){}
                }

                async function loadSliders() {
                    try {
                        const r = await fetch('/admin/hero-sliders');
                        if (!r.ok) return;
                        const data = await r.json();
                        const sorted = data.sort((a,b)=>(a.order||0)-(b.order||0));
                        slides = sorted.map(s => ({id:s.id, type:s.video_url?'video':'image', imageUrl:s.image_url||s.image_path||'', videoUrl:s.video_url||'', file:null}));
                        if (sorted.length > 0) {
                            inputs.title.value = sorted[0].title||'';
                            inputs.subtitle.value = sorted[0].subtitle||'';
                            inputs.pText.value = sorted[0].primary_button_text||'';
                            inputs.pLink.value = sorted[0].primary_button_link||'';
                            inputs.sText.value = sorted[0].secondary_button_text||'';
                            inputs.sLink.value = sorted[0].secondary_button_link||'';
                        }
                        renderSlides();
                    } catch(e){ console.error(e); }
                }

                async function saveSliders() {
                    const btn = qs('saveHeroBtn');
                    btn.disabled = true; btn.textContent = 'সংরক্ষণ হচ্ছে...';
                    try {
                        const tfd = new FormData();
                        tfd.append('hero_tagline', inputs.tagline.value||'');
                        await fetch('/admin/header-settings', {method:'POST', headers:{'X-CSRF-TOKEN':csrf}, body:tfd});

                        const existingR = await fetch('/admin/hero-sliders');
                        const existing = existingR.ok ? await existingR.json() : [];
                        const keepIds = slides.filter(s=>s.id).map(s=>s.id);
                        for (const ex of existing) {
                            if (!keepIds.includes(ex.id)) {
                                await fetch(`/admin/hero-sliders/${ex.id}`, {method:'DELETE', headers:{'X-CSRF-TOKEN':csrf}});
                            }
                        }

                        for (let i = 0; i < slides.length; i++) {
                            const slide = slides[i];
                            const fd = new FormData();
                            fd.append('title', inputs.title.value||'');
                            fd.append('subtitle', inputs.subtitle.value||'');
                            fd.append('primary_button_text', inputs.pText.value||'');
                            fd.append('primary_button_link', inputs.pLink.value||'');
                            fd.append('secondary_button_text', inputs.sText.value||'');
                            fd.append('secondary_button_link', inputs.sLink.value||'');
                            fd.append('order', i+1);
                            fd.append('is_active', '1');
                            fd.append('video_url', slide.type==='video' ? (slide.videoUrl||'') : '');
                            if (slide.type==='image' && slide.file) fd.append('image', slide.file);

                            let resp;
                            if (slide.id) {
                                fd.append('_method', 'PUT');
                                resp = await fetch(`/admin/hero-sliders/${slide.id}`, {method:'POST', headers:{'X-CSRF-TOKEN':csrf}, body:fd});
                            } else {
                                resp = await fetch('/admin/hero-sliders', {method:'POST', headers:{'X-CSRF-TOKEN':csrf}, body:fd});
                            }
                            if (resp && resp.ok) { const res = await resp.json(); if(res.slider) slides[i].id = res.slider.id; }
                        }

                        localStorage.setItem('refreshHeroSlider', Date.now().toString());
                        window.dispatchEvent(new CustomEvent('heroSliderUpdated'));
                        await loadSliders();
                        if (window.showSuccess) window.showSuccess('হিরো সেকশন সংরক্ষিত হয়েছে');
                    } catch(e) {
                        if (window.showError) window.showError('সংরক্ষণ ব্যর্থ: ' + e.message);
                    } finally { btn.disabled=false; btn.textContent='সেভ করুন'; }
                }

                qs('saveHeroBtn').addEventListener('click', saveSliders);
                if (window.registerTabLoader) { registerTabLoader('home', loadHeroTagline); registerTabLoader('home', loadSliders); }
                else { loadHeroTagline(); loadSliders(); }
            })();
            </script>
        </div>
    </div>

    <div id="home-pricing" style="margin-top:1rem;">
        <div class="table-card">
            <h2>মূল্য তালিকা</h2>
            <style>
                #home-pricing .pricing-form input[type="text"],
                #home-pricing .pricing-form input[type="number"] {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-pricing .pricing-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-pricing .pricing-card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-pricing .pricing-card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    font-weight: 600;
                }

                #home-pricing .delete-pricing {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 4px 10px;
                    font-size: 12px;
                    cursor: pointer;
                }

                #home-pricing .delete-pricing:hover {
                    background: #dc2626;
                }

                #home-pricing .feature-list {
                    margin-top: 8px;
                }

                #home-pricing .feature-item {
                    display: flex;
                    gap: 8px;
                    margin-top: 4px;
                }

                #home-pricing .feature-item input {
                    flex: 1;
                    height: 38px;
                    padding: 8px 12px;
                    border: 1px solid #d1d5db;
                    border-radius: 6px;
                    font-size: 14px;
                    background: #fff;
                    color: #1f2937;
                }

                #home-pricing .feature-item input:focus {
                    outline: none;
                    border-color: #0D5534;
                    box-shadow: 0 0 0 2px rgba(13, 85, 52, 0.2);
                }

                #home-pricing .feature-item button {
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 0 12px;
                    cursor: pointer;
                    font-size: 16px;
                    font-weight: bold;
                }

                #home-pricing .feature-item button:hover {
                    background: #dc2626;
                }

                #home-pricing .add-feature-btn {
                    margin-top: 8px;
                    background: #0D5534;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 8px 12px;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100%;
                }

                #home-pricing .add-feature-btn:hover {
                    background: #0f6640;
                }

                #home-pricing .popular-badge {
                    display: inline-block;
                    margin-top: 8px;
                }

                #home-pricing .section-header-fields {
                    background: #f9fafb;
                    padding: 16px;
                    border-radius: 10px;
                    margin-bottom: 16px;
                    border: 1px solid #e5e7eb;
                }

                #home-pricing .section-header-fields label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: 600;
                    font-size: 14px;
                    color: #374151;
                }

                #home-pricing .section-header-fields input {
                    width: 100%;
                    margin-bottom: 12px;
                }

                @media (max-width: 960px) {
                    #home-pricing .pricing-grid-editor {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="pricing-form">
                <!-- Section Title and Subtitle Fields -->
                <div class="section-header-fields">
                    <label for="pricing-section-title">সেকশন শিরোনাম (Title)</label>
                    <input type="text" id="pricing-section-title" placeholder="মূল্য তালিকা" />
                    <label for="pricing-section-subtitle">সেকশন সাব-শিরোনাম (Subtitle)</label>
                    <input type="text" id="pricing-section-subtitle" placeholder="আমাদের মূল্য পরিকল্পনা" />
                    <button type="button" id="savePricingSettingsBtn" class="btn btn-primary"
                        style="margin-top: 8px;">সেকশন সেটিংস সেভ করুন</button>
                </div>
                <div class="pricing-grid-editor" id="pricingGridEditor">
                    <!-- Pricing plans will be loaded here dynamically -->
                </div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="addPricingBtn" class="btn btn-primary" type="button">নতুন প্ল্যান যোগ করুন</button>
                    <button id="savePricingBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetPricingBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    let pricingPlans = [];
                    let pricingSettings = { section_title: '', section_subtitle: '' };
                    const gridEditor = document.getElementById('pricingGridEditor');
                    const sectionTitleInput = document.getElementById('pricing-section-title');
                    const sectionSubtitleInput = document.getElementById('pricing-section-subtitle');

                    // Load pricing settings from database
                    async function loadPricingSettings() {
                        try {
                            const response = await fetch('/api/pricing-settings');
                            if (!response.ok) throw new Error('Failed to load pricing settings');
                            pricingSettings = await response.json() || { section_title: '', section_subtitle: '' };

                            // Populate the input fields
                            if (sectionTitleInput) {
                                sectionTitleInput.value = pricingSettings.section_title || '';
                            }
                            if (sectionSubtitleInput) {
                                sectionSubtitleInput.value = pricingSettings.section_subtitle || '';
                            }
                        } catch (error) {
                            console.error('Error loading pricing settings:', error);
                        }
                    }

                    // Save pricing settings
                    async function savePricingSettings() {
                        try {
                            const settingsData = {
                                section_title: sectionTitleInput ? sectionTitleInput.value : '',
                                section_subtitle: sectionSubtitleInput ? sectionSubtitleInput.value : ''
                            };

                            const settingsResponse = await fetch('/admin/pricing-settings', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify(settingsData)
                            });

                            if (!settingsResponse.ok) {
                                throw new Error('Failed to save section settings');
                            }
                        } catch (error) {
                            console.error('Error saving pricing settings:', error);
                            throw error;
                        }
                    }

                    // Load pricing plans from database
                    async function loadPricingPlans() {
                        try {
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">লোড হচ্ছে...</div>';
                            const response = await fetch('/api/pricing-plans');
                            if (!response.ok) throw new Error('Failed to load pricing plans');
                            pricingPlans = await response.json();
                            console.log('Loaded pricing plans:', pricingPlans);

                            if (!Array.isArray(pricingPlans)) {
                                pricingPlans = [];
                            }

                            renderPricingPlans();
                        } catch (error) {
                            console.error('Error loading pricing plans:', error);
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে। দয়া করে পেজটি রিফ্রেশ করুন।</div>';
                            if (typeof showNotification === 'function') {
                                showNotification('মূল্য তালিকা লোড করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    }

                    // Render pricing plans
                    function renderPricingPlans() {
                        gridEditor.innerHTML = '';

                        if (pricingPlans.length === 0) {
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">কোন মূল্য পরিকল্পনা পাওয়া যায়নি। "নতুন প্ল্যান যোগ করুন" বাটনে ক্লিক করুন।</div>';
                            return;
                        }

                        pricingPlans.forEach((plan, index) => {
                            const card = document.createElement('div');
                            card.className = 'pricing-card-editor';

                            const features = Array.isArray(plan.features) ? plan.features : [];
                            
                            // Build features HTML
                            let featuresHtml = '';
                            if (features.length > 0) {
                                features.forEach((f, fIdx) => {
                                    featuresHtml += '<div class="feature-item" style="display:flex; gap:8px; margin-bottom:6px;">';
                                    featuresHtml += '<input type="text" class="plan-feature" data-plan="' + index + '" data-feature="' + fIdx + '" value="' + (f || '').replace(/"/g, '&quot;') + '" placeholder="সুবিধা ' + (fIdx + 1) + '" style="flex:1; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fff;" />';
                                    featuresHtml += '<button type="button" class="remove-feature" data-plan="' + index + '" data-feature="' + fIdx + '" style="background:#ef4444; color:#fff; border:none; padding:0 12px; border-radius:4px; cursor:pointer; font-size:18px;" title="মুছুন">×</button>';
                                    featuresHtml += '</div>';
                                });
                            }

                            card.innerHTML = 
                                '<button class="delete-pricing" data-id="' + plan.id + '" data-index="' + index + '" style="position:absolute; top:8px; right:8px; background:#ef4444; color:#fff; border:none; padding:4px 10px; border-radius:6px; cursor:pointer;">মুছুন</button>' +
                                '<h4 style="margin:0 0 10px; font-weight:600;">প্যাকেজ #' + (index + 1) + '</h4>' +
                                '<label style="font-size:12px; color:#6b7280;">শিরোনাম</label>' +
                                '<input type="text" class="plan-title" data-index="' + index + '" placeholder="শিরোনাম" value="' + (plan.title || '').replace(/"/g, '&quot;') + '" style="width:100%; padding:8px; margin-bottom:8px; border:1px solid #ccc; border-radius:4px;" />' +
                                '<label style="font-size:12px; color:#6b7280;">প্লট সাইজ</label>' +
                                '<input type="text" class="plan-plot-size" data-index="' + index + '" placeholder="প্লট সাইজ" value="' + (plan.plot_size || '').replace(/"/g, '&quot;') + '" style="width:100%; padding:8px; margin-bottom:8px; border:1px solid #ccc; border-radius:4px;" />' +
                                '<label style="font-size:12px; color:#6b7280;">মূল্য</label>' +
                                '<input type="number" class="plan-price" data-index="' + index + '" placeholder="মূল্য" value="' + (plan.price || 0) + '" style="width:100%; padding:8px; margin-bottom:8px; border:1px solid #ccc; border-radius:4px;" />' +
                                '<label style="display:block; margin:8px 0;"><input type="checkbox" class="plan-popular" data-index="' + index + '" ' + (plan.is_popular ? 'checked' : '') + ' /> জনপ্রিয়</label>' +
                                '<div class="feature-list-container" style="margin-top:12px; padding:12px; background:#f0fdf4; border-radius:8px; border:2px solid #22c55e;">' +
                                    '<label style="display:block; margin-bottom:10px; font-weight:600; color:#166534; font-size:14px;">📋 সুবিধা সমূহ:</label>' +
                                    '<div class="feature-list" data-index="' + index + '">' + featuresHtml + '</div>' +
                                    '<button type="button" class="add-feature-btn" data-index="' + index + '" style="margin-top:10px; width:100%; padding:10px; background:#22c55e; color:#fff; border:none; border-radius:6px; cursor:pointer; font-size:14px; font-weight:600;">➕ সুবিধা যোগ করুন</button>' +
                                '</div>' +
                                '<div style="margin-top:12px; padding:12px; background:#eff6ff; border-radius:8px; border:2px solid #3b82f6;">' +
                                    '<label style="display:block; margin-bottom:8px; font-weight:600; color:#1d4ed8; font-size:14px;">🔗 বাটন অপশন</label>' +
                                    '<label style="font-size:12px; color:#6b7280;">CTA বাটন টেক্সট</label>' +
                                    '<input type="text" class="plan-cta-text" data-index="' + index + '" placeholder="বুকিং করুন" value="' + (plan.cta_text || '').replace(/"/g, '&quot;') + '" style="width:100%; padding:8px; margin-bottom:8px; border:1px solid #ccc; border-radius:4px;" />' +
                                    '<label style="font-size:12px; color:#6b7280;">CTA বাটন লিংক</label>' +
                                    '<input type="text" class="plan-cta-link" data-index="' + index + '" placeholder="https://example.com অথবা #contact" value="' + (plan.cta_link || '').replace(/"/g, '&quot;') + '" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;" />' +
                                    '<p style="font-size:11px; color:#6b7280; margin-top:4px;">💡 http/https দিয়ে শুরু হলে নতুন ট্যাবে খুলবে। #anchor হলে একই পেজে স্ক্রল করবে।</p>' +
                                '</div>';
                            
                            gridEditor.appendChild(card);
                        });

                        // Bind events
                        bindInputEvents();
                        bindDeleteEvents();
                        bindFeatureEvents();
                    }
                    
                    // Bind feature events
                    function bindFeatureEvents() {
                        // Update feature
                        gridEditor.querySelectorAll('.plan-feature').forEach(input => {
                            input.addEventListener('input', (e) => {
                                const planIdx = parseInt(e.target.dataset.plan);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (pricingPlans[planIdx] && Array.isArray(pricingPlans[planIdx].features)) {
                                    pricingPlans[planIdx].features[featureIdx] = e.target.value;
                                }
                            });
                        });

                        // Remove feature
                        gridEditor.querySelectorAll('.remove-feature').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const planIdx = parseInt(e.target.dataset.plan);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (pricingPlans[planIdx] && Array.isArray(pricingPlans[planIdx].features)) {
                                    // Collect all form values before re-rendering
                                    collectPricingFormValues();
                                    pricingPlans[planIdx].features.splice(featureIdx, 1);
                                    renderPricingPlans();
                                }
                            });
                        });

                        // Add feature
                        gridEditor.querySelectorAll('.add-feature-btn').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const index = parseInt(e.target.dataset.index);
                                if (pricingPlans[index]) {
                                    // Collect all form values before re-rendering
                                    collectPricingFormValues();
                                    
                                    if (!Array.isArray(pricingPlans[index].features)) {
                                        pricingPlans[index].features = [];
                                    }
                                    pricingPlans[index].features.push('');
                                    renderPricingPlans();
                                }
                            });
                        });
                    }
                    
                    function collectPricingFormValues() {
                        pricingPlans.forEach((plan, index) => {
                            const card = gridEditor.children[index];
                            if (card) {
                                plan.title = card.querySelector('.plan-title')?.value || plan.title;
                                plan.plot_size = card.querySelector('.plan-plot-size')?.value || plan.plot_size;
                                plan.price = parseFloat(card.querySelector('.plan-price')?.value) || plan.price;
                                plan.is_popular = card.querySelector('.plan-popular')?.checked || false;
                                plan.cta_text = card.querySelector('.plan-cta-text')?.value || plan.cta_text;
                                plan.cta_link = card.querySelector('.plan-cta-link')?.value || plan.cta_link;
                                
                                // Collect features
                                const features = [];
                                card.querySelectorAll('.feature-input').forEach(inp => {
                                    features.push(inp.value);
                                });
                                if (features.length > 0) {
                                    plan.features = features;
                                }
                            }
                        });
                    }

                    // Bind input events
                    function bindInputEvents() {
                        gridEditor.querySelectorAll('.plan-title, .plan-plot-size, .plan-price, .plan-popular, .plan-cta-text, .plan-cta-link').forEach(input => {
                            input.addEventListener('input', (e) => {
                                const index = parseInt(e.target.dataset.index);
                                if (pricingPlans[index]) {
                                    if (e.target.classList.contains('plan-title')) {
                                        pricingPlans[index].title = e.target.value;
                                    } else if (e.target.classList.contains('plan-plot-size')) {
                                        pricingPlans[index].plot_size = e.target.value;
                                    } else if (e.target.classList.contains('plan-price')) {
                                        pricingPlans[index].price = parseFloat(e.target.value) || 0;
                                    } else if (e.target.classList.contains('plan-popular')) {
                                        pricingPlans[index].is_popular = e.target.checked;
                                    } else if (e.target.classList.contains('plan-cta-text')) {
                                        pricingPlans[index].cta_text = e.target.value;
                                    } else if (e.target.classList.contains('plan-cta-link')) {
                                        pricingPlans[index].cta_link = e.target.value;
                                    }
                                }
                            });
                        });
                    }

                    // Bind delete events
                    function bindDeleteEvents() {
                        gridEditor.querySelectorAll('.delete-pricing').forEach(btn => {
                            btn.addEventListener('click', async (e) => {
                                const id = e.target.dataset.id;
                                const index = parseInt(e.target.dataset.index);

                                const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত যে এই প্ল্যানটি মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                                if (!confirmed) return;

                                try {
                                    if (id && id !== 'undefined') {
                                        const response = await fetch(`/admin/pricing-plans/${id}`, {
                                            method: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                            }
                                        });

                                        if (!response.ok) throw new Error('Delete failed');
                                    }

                                    pricingPlans.splice(index, 1);
                                    renderPricingPlans();

                                    if (typeof showNotification === 'function') {
                                        showNotification('প্ল্যান মুছে ফেলা হয়েছে!', 'success');
                                    }
                                } catch (error) {
                                    console.error('Error deleting pricing plan:', error);
                                    if (typeof showNotification === 'function') {
                                        showNotification('মুছে ফেলতে ব্যর্থ হয়েছে', 'error');
                                    }
                                }
                            });
                        });
                    }

                    // Add new pricing plan
                    document.getElementById('addPricingBtn').addEventListener('click', () => {
                        pricingPlans.push({
                            id: undefined,
                            title: '',
                            plot_size: '',
                            price: 0,
                            features: [],
                            is_popular: false,
                            order: pricingPlans.length + 1,
                            is_active: true,
                            cta_text: 'বুকিং করুন',
                            cta_link: '#booking'
                        });
                        renderPricingPlans();
                    });

                    // Save pricing plans
                    document.getElementById('savePricingBtn').addEventListener('click', async () => {
                        try {
                            for (const plan of pricingPlans) {
                                const data = {
                                    title: plan.title,
                                    plot_size: plan.plot_size,
                                    price: plan.price,
                                    features: plan.features,
                                    is_popular: plan.is_popular || false,
                                    order: plan.order,
                                    is_active: plan.is_active !== false,
                                    cta_text: plan.cta_text || 'বুকিং করুন',
                                    cta_link: plan.cta_link || '#booking'
                                };

                                if (plan.id) {
                                    // Update existing
                                    const response = await fetch(`/admin/pricing-plans/${plan.id}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify(data)
                                    });

                                    if (!response.ok) throw new Error('Update failed');
                                } else {
                                    // Create new
                                    const response = await fetch('/admin/pricing-plans', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify(data)
                                    });

                                    if (!response.ok) throw new Error('Create failed');
                                    const result = await response.json();
                                    plan.id = result.data.id;
                                }
                            }

                            if (typeof showNotification === 'function') {
                                showNotification('মূল্য তালিকা সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }

                            // Reload to get updated data
                            await loadPricingPlans();
                        } catch (error) {
                            console.error('Error saving pricing plans:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    });

                    // Reset pricing plans
                    document.getElementById('resetPricingBtn').addEventListener('click', async () => {
                        const confirmed = await showHomeConfirm('আপনি কি সমস্ত পরিবর্তন বাতিল করতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        await loadPricingPlans();
                    });

                    // Save pricing section settings button
                    document.getElementById('savePricingSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('savePricingSettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await savePricingSettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Initialize — lazy load
                    if (window.registerTabLoader) {
                        registerTabLoader('home', loadPricingSettings);
                        registerTabLoader('home', loadPricingPlans);
                    } else { loadPricingSettings(); loadPricingPlans(); }
                })();
            </script>
        </div>
    </div>

    <div id="home-booking-package" style="margin-top:1rem;">
        <div class="table-card">
            <h2>বুকিং প্যাকেজ</h2>
            <p style="color:#6b7280; margin-top:-6px;">প্রকল্পের মূল্য তালিকা সেকশনের কনটেন্ট এই ফর্ম থেকে ম্যানেজ করুন।
            </p>
            <style>
                #home-booking-package .package-form input[type="text"],
                #home-booking-package .package-form input[type="number"] {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-booking-package .package-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-booking-package .package-card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-booking-package .package-card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    font-weight: 600;
                }

                #home-booking-package .delete-package {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 4px 10px;
                    font-size: 12px;
                    cursor: pointer;
                }

                #home-booking-package .delete-package:hover {
                    background: #dc2626;
                }

                #home-booking-package input[type="text"],
                #home-booking-package input[type="number"] {
                    width: 100%;
                    box-sizing: border-box;
                    margin-top: 4px;
                }

                #home-booking-package .add-feature-btn {
                    margin-top: 8px;
                    background: #0D5534;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 8px 12px;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100%;
                }

                #home-booking-package .add-feature-btn:hover {
                    background: #0f6640;
                }

                @media (max-width: 960px) {
                    #home-booking-package .package-grid-editor {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="package-form">
                <div
                    style="margin-bottom: 12px; padding: 12px; background: white; border-radius: 10px; border: 1px solid #e5e7eb;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div class="form-group">
                            <label>সেকশন শিরোনাম</label>
                            <input type="text" id="bookingPackageTitleInput" placeholder="প্রকল্পের মূল্য তালিকা">
                        </div>
                        <div class="form-group">
                            <label>সাব-শিরোনাম</label>
                            <input type="text" id="bookingPackageSubtitleInput"
                                placeholder="আপনার বাজেট অনুযায়ী নির্বাচন করুন">
                        </div>
                    </div>
                    <button id="savePackageSettingsBtn" class="btn btn-primary" style="margin-top: 12px;">সেটিংস সংরক্ষণ
                        করুন</button>
                </div>
                <div class="package-grid-editor" id="bookingPackageGridEditor"></div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="addPackageBtn" class="btn btn-primary" type="button">নতুন প্যাকেজ যোগ করুন</button>
                    <button id="savePackageBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetPackageBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    let bookingPackages = [];
                    const gridEditor = document.getElementById('bookingPackageGridEditor');
                    const titleInput = document.getElementById('bookingPackageTitleInput');
                    const subtitleInput = document.getElementById('bookingPackageSubtitleInput');

                    async function loadBookingPackages() {
                        try {
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">লোড হচ্ছে...</div>';
                            const response = await fetch('/api/pricing-plans');
                            if (!response.ok) throw new Error('Failed to load booking packages');
                            bookingPackages = await response.json().then(r => r.filter(p => p.is_active));

                            const settingsResponse = await fetch('/api/pricing-settings');
                            if (settingsResponse.ok) {
                                const settings = await settingsResponse.json();
                                if (settings) {
                                    titleInput.value = settings.section_title || '';
                                    subtitleInput.value = settings.section_subtitle || '';
                                }
                            }

                            renderPackages();
                        } catch (error) {
                            console.error('Error loading booking packages:', error);
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে</div>';
                        }
                    }

                    function renderPackages() {
                        gridEditor.innerHTML = '';
                        bookingPackages.forEach((pkg, index) => {
                            const card = document.createElement('div');
                            card.className = 'package-card-editor';
                            const features = Array.isArray(pkg.features) ? pkg.features : [];
                            const featuresHtml = features.map((f, fIdx) => `<div style="margin-top:4px;"><input type="text" value="${f}" placeholder="ফিচার"></div>`).join('');

                            card.innerHTML = `
                                <button type="button" class="delete-package" data-id="${pkg.id}">মুছুন</button>
                                <h4>প্যাকেজ #${index + 1}</h4>
                                <label>শিরোনাম</label>
                                <input type="text" value="${pkg.title}" class="package-title" data-id="${pkg.id}">
                                <label style="margin-top:8px;">প্লট সাইজ</label>
                                <input type="text" value="${pkg.plot_size}" class="package-plot-size" data-id="${pkg.id}">
                                <label style="margin-top:8px;">মূল্য</label>
                                <input type="number" value="${pkg.price}" class="package-price" data-id="${pkg.id}">
                                <label style="margin-top:8px;"><input type="checkbox" class="package-popular" data-id="${pkg.id}" ${pkg.is_popular ? 'checked' : ''}> জনপ্রিয়</label>
                                ${featuresHtml}
                                <button type="button" class="add-feature-btn" data-id="${pkg.id}" style="margin-top:8px;">+ ফিচার</button>
                            `;
                            gridEditor.appendChild(card);
                        });
                        bindEvents();
                    }

                    function bindEvents() {
                        gridEditor.querySelectorAll('.delete-package').forEach(btn => {
                            btn.addEventListener('click', async (e) => {
                                const confirmed = await showHomeConfirm('নিশ্চিত?', 'নিশ্চিত করুন');
                                if (!confirmed) return;
                                const id = e.target.dataset.id;
                                try {
                                    await fetch(`/admin/pricing-plans/${id}`, {
                                        method: 'DELETE',
                                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                                    });
                                    bookingPackages = bookingPackages.filter(p => p.id != id);
                                    renderPackages();
                                    showNotification('ডিলিট করা হয়েছে!', 'success');
                                } catch (error) {
                                    showNotification('ডিলিট ব্যর্থ', 'error');
                                }
                            });
                        });
                    }

                    document.getElementById('savePackageBtn').addEventListener('click', async () => {
                        try {
                            for (const pkg of bookingPackages) {
                                await fetch(`/admin/pricing-plans/${pkg.id}`, {
                                    method: 'PUT',
                                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                    body: JSON.stringify(pkg)
                                });
                            }
                            showNotification('সেভ করা হয়েছে!', 'success');
                        } catch (error) {
                            showNotification('সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('savePackageSettingsBtn').addEventListener('click', async () => {
                        try {
                            await fetch('/admin/pricing-settings', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_title: titleInput.value, section_subtitle: subtitleInput.value })
                            });
                            showNotification('সেটিংস সেভ করা হয়েছে!', 'success');
                        } catch (error) {
                            showNotification('সেটিংস সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('resetPackageBtn').addEventListener('click', loadBookingPackages);
                    document.getElementById('addPackageBtn').addEventListener('click', () => {
                        bookingPackages.push({ id: null, title: '', plot_size: '', price: 0, features: [], is_popular: false });
                        renderPackages();
                    });

                    loadBookingPackages();
                })();
            </script>
        </div>
    </div>

    <div id="home-testimonials" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <h2 style="margin:0;">বিনিয়োগকারী মন্তব্য</h2>
                <button id="addTestimonialBtn" class="btn btn-primary" type="button"
                    style="display:flex; align-items:center; gap:8px;">
                    <span>+</span>
                    <span>মন্তব্য যোগ করুন</span>
                </button>
            </div>
            <style>
                #home-testimonials .testimonials-form input[type="text"],
                #home-testimonials .testimonials-form textarea {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    width: 100%;
                    border: 1px solid #e5e7eb;
                    box-sizing: border-box;
                }

                #home-testimonials .testimonials-form textarea {
                    height: auto;
                    min-height: 80px;
                    resize: vertical;
                }

                #home-testimonials .testimonials-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-testimonials .card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-testimonials .card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                #home-testimonials .card-editor .delete-btn {
                    background: #ef4444;
                    color: white;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    transition: background 0.2s;
                }

                #home-testimonials .card-editor .delete-btn:hover {
                    background: #dc2626;
                }

                #home-testimonials .section-header-fields {
                    background: #f9fafb;
                    padding: 16px;
                    border-radius: 10px;
                    margin-bottom: 16px;
                    border: 1px solid #e5e7eb;
                }

                #home-testimonials .section-header-fields label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: 600;
                    font-size: 14px;
                    color: #374151;
                }

                #home-testimonials .section-header-fields input {
                    width: 100%;
                    margin-bottom: 12px;
                }

                @media (max-width: 960px) {
                    #home-testimonials .testimonials-grid-editor {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="testimonials-form">
                <!-- Section Title and Subtitle Fields -->
                <div class="section-header-fields">
                    <label for="testimonials-section-title">সেকশন শিরোনাম (Title)</label>
                    <input type="text" id="testimonials-section-title" placeholder="বিনিয়োগকারী মন্তব্য" />
                    <label for="testimonials-section-subtitle">সেকশন সাব-শিরোনাম (Subtitle)</label>
                    <input type="text" id="testimonials-section-subtitle"
                        placeholder="আমাদের গ্রাহকরা আমাদের প্রকল্প সম্পর্কে কী বলেন" />
                    <button type="button" id="saveTestimonialSettingsBtn" class="btn btn-primary"
                        style="margin-top: 8px;">সেকশন সেটিংস সেভ করুন</button>
                </div>
                <div id="testimonialsContainer" class="testimonials-grid-editor">
                    <!-- Testimonials will be loaded here dynamically -->
                </div>
            </div>
            <script>
                (function () {
                    // Define notification function FIRST so it's always available
                    window.showGreenNotification = function (title, message) {
                        try {
                            // Remove existing notification if any
                            const existing = document.getElementById('testimonial-success-notification');
                            if (existing) {
                                existing.remove();
                            }

                            // Create notification element - positioned at top center of website
                            const notification = document.createElement('div');
                            notification.id = 'testimonial-success-notification';
                            notification.style.cssText = `
                                position: fixed;
                                top: 20px;
                                left: 50%;
                                transform: translateX(-50%);
                                background: #10b981;
                                color: white;
                                padding: 16px 24px;
                                border-radius: 8px;
                                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                                z-index: 10000;
                                display: flex;
                                align-items: center;
                                gap: 12px;
                                min-width: 300px;
                                max-width: 500px;
                                text-align: center;
                            `;
                            notification.innerHTML = `
                                <div style="font-size: 24px; flex-shrink: 0;">✓</div>
                                <div style="flex: 1;">
                                    <div style="font-weight: 600; margin-bottom: 4px; font-size: 16px;">${title}</div>
                                    <div style="font-size: 14px; opacity: 0.95; line-height: 1.4;">${message}</div>
                    </div>
                            `;

                            // Add animation style if not exists
                            if (!document.getElementById('testimonial-notification-style')) {
                                const style = document.createElement('style');
                                style.id = 'testimonial-notification-style';
                                style.textContent = `
                                    @keyframes slideDown {
                                        from {
                                            transform: translateX(-50%) translateY(-100%);
                                            opacity: 0;
                                        }
                                        to {
                                            transform: translateX(-50%) translateY(0);
                                            opacity: 1;
                                        }
                                    }
                                    #testimonial-success-notification {
                                        animation: slideDown 0.3s ease;
                                    }
                                `;
                                document.head.appendChild(style);
                            }

                            document.body.appendChild(notification);

                            // Auto remove after 5 seconds
                            setTimeout(() => {
                                if (notification.parentNode) {
                                    notification.style.transition = 'transform 0.3s ease, opacity 0.3s ease';
                                    notification.style.transform = 'translateX(-50%) translateY(-100%)';
                                    notification.style.opacity = '0';
                                    setTimeout(() => {
                                        if (notification.parentNode) {
                                            notification.remove();
                                        }
                                    }, 300);
                                }
                            }, 5000);
                        } catch (error) {
                            console.error('Error showing notification:', error);
                            // Fallback to alert
                            alert(title + ': ' + message);
                        }
                    };

                    const container = document.getElementById('testimonialsContainer');
                    let testimonials = [];
                    let testimonialCounter = 0;
                    let testimonialSettings = { title: '', subtitle: '' };
                    const sectionTitleInput = document.getElementById('testimonials-section-title');
                    const sectionSubtitleInput = document.getElementById('testimonials-section-subtitle');

                    // Load testimonial section settings
                    async function loadTestimonialSettings() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=testimonials');
                            if (response.ok) {
                                const section = await response.json();
                                if (section) {
                                    testimonialSettings = { title: section.title || '', subtitle: section.subtitle || '' };
                                    if (sectionTitleInput) sectionTitleInput.value = testimonialSettings.title;
                                    if (sectionSubtitleInput) sectionSubtitleInput.value = testimonialSettings.subtitle;
                                }
                            }
                        } catch (error) {
                            console.error('Error loading testimonial settings:', error);
                        }
                    }

                    // Save testimonial section settings
                    async function saveTestimonialSettings() {
                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_key: 'testimonials',
                                    title: sectionTitleInput ? sectionTitleInput.value : '',
                                    subtitle: sectionSubtitleInput ? sectionSubtitleInput.value : '',
                                    is_active: true
                                })
                            });
                            if (!response.ok) throw new Error('Failed to save settings');
                        } catch (error) {
                            console.error('Error saving testimonial settings:', error);
                            throw error;
                        }
                    }

                    function createTestimonialCard(testimonial = null, index = null) {
                        const id = testimonial ? testimonial.id : 'new_' + (++testimonialCounter);
                        const isNew = !testimonial;
                        const displayIndex = index !== null ? index + 1 : (testimonials.length + 1);
                        const card = document.createElement('div');
                        card.className = 'card-editor';
                        card.dataset.testimonialId = id;
                        const escapedAvatar = (testimonial?.avatar || '').replace(/"/g, '&quot;');
                        const escapedName = (testimonial?.name || '').replace(/"/g, '&quot;');
                        const escapedTitle = (testimonial?.title || '').replace(/"/g, '&quot;');
                        const escapedQuote = (testimonial?.quote || '').replace(/"/g, '&quot;').replace(/\n/g, '&#10;');
                        const imageUrl = testimonial?.image_url || '';
                        const orderValue = testimonial?.order || 0;
                        const isActiveValue = testimonial?.is_active !== false;
                        card.innerHTML = `
                            <h4>
                                <span>মন্তব্য ${displayIndex}</span>
                            </h4>
                            <div style="margin-bottom:8px;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:500;">ছবি আপলোড করুন</label>
                                <input type="file" class="test-image" accept="image/*" style="width:100%; padding:6px; border:1px solid #e5e7eb; border-radius:6px;" onchange="previewTestimonialImage(this, '${id}')" />
                                <div class="image-preview-${id}" style="margin-top:8px;">
                                    ${imageUrl ? `<img src="${imageUrl}" alt="Preview" style="max-width:100%; max-height:120px; border-radius:8px; border:1px solid #e5e7eb;" />` : ''}
                    </div>
                </div>
                            <input type="text" class="test-avatar" placeholder="অবতার (যেমন: FA)" value="${escapedAvatar}" />
                            <input type="text" class="test-name" placeholder="নাম" style="margin-top:8px;" value="${escapedName}" />
                            <input type="text" class="test-title" placeholder="পদবি / অবস্থান" style="margin-top:8px;" value="${escapedTitle}" />
                            <textarea class="test-quote" placeholder="উক্তি" style="margin-top:8px;">${escapedQuote}</textarea>
                            <div style="margin-top:8px; display:flex; gap:8px; align-items:center;">
                                <label style="font-size:13px; font-weight:500; display:flex; align-items:center; gap:6px;">
                                    <input type="number" class="test-order" placeholder="ক্রম" value="${orderValue}" style="width:80px; padding:6px; border:1px solid #e5e7eb; border-radius:6px;" />
                                    <span>ক্রম</span>
                                </label>
                                <label style="font-size:13px; font-weight:500; display:flex; align-items:center; gap:6px; margin-left:auto;">
                                    <input type="checkbox" class="test-active" ${isActiveValue ? 'checked' : ''} style="width:18px; height:18px; cursor:pointer;" />
                                    <span>সক্রিয়</span>
                                </label>
                            </div>
                            <div style="margin-top:8px; display:flex; gap:8px; align-items:center;">
                                <button type="button" class="btn btn-primary" onclick="saveTestimonial('${id}')" style="padding:8px 16px; font-size:13px;">${isNew ? 'যোগ করুন' : 'আপডেট'}</button>
                                <span class="save-status-${id}" style="font-size:12px; color:#666; margin-left:8px;"></span>
                </div>
                            ${!isNew ? '<div style="margin-top:8px;"><button type="button" class="delete-btn" onclick="deleteTestimonial(\'' + id + '\')" style="width:100%;">মুছুন</button></div>' : ''}
                        `;
                        return card;
                    }

                    window.saveTestimonial = async function (id) {
                        console.log('saveTestimonial called with id:', id);
                        const card = document.querySelector(`[data-testimonial-id="${id}"]`);
                        if (!card) {
                            console.error('Card not found for id:', id);
                            return;
                        }

                        // Get the save button and prevent double-clicking
                        const saveBtn = card.querySelector('.btn.btn-primary');
                        if (saveBtn && saveBtn.disabled) {
                            console.log('Save already in progress, ignoring duplicate click');
                            return;
                        }

                        const name = card.querySelector('.test-name').value.trim();
                        const title = card.querySelector('.test-title').value.trim();
                        const quote = card.querySelector('.test-quote').value.trim();
                        const avatar = card.querySelector('.test-avatar').value.trim();
                        const order = parseInt(card.querySelector('.test-order').value) || 0;
                        const isActive = card.querySelector('.test-active').checked;
                        const imageFile = card.querySelector('.test-image').files[0];
                        const statusEl = card.querySelector(`.save-status-${id}`);

                        console.log('Form data:', { name, title, quote, avatar, hasImage: !!imageFile });

                        if (!name || !title || !quote) {
                            console.error('Validation failed - missing required fields');
                            if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'অনুগ্রহ করে সব ফিল্ড পূরণ করুন।'); }
                            if (statusEl) statusEl.textContent = '';
                            return;
                        }

                        // Disable button and show saving status
                        if (saveBtn) {
                            saveBtn.disabled = true;
                            saveBtn.style.opacity = '0.6';
                            saveBtn.style.cursor = 'not-allowed';
                        }
                        if (statusEl) {
                            statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                            statusEl.style.color = '#666';
                        }

                        try {
                            const isNew = id.toString().startsWith('new_');
                            const url = isNew ? '/admin/testimonials' : `/admin/testimonials/${id}`;
                            const method = 'POST'; // Always use POST, Laravel will handle PUT via _method

                            const formData = new FormData();
                            formData.append('name', name);
                            formData.append('title', title);
                            formData.append('quote', quote);
                            formData.append('avatar', avatar);
                            formData.append('order', order);
                            formData.append('is_active', isActive ? '1' : '0');
                            if (imageFile) {
                                formData.append('image', imageFile);
                            }

                            // For updates, add _method field for Laravel
                            if (!isNew) {
                                formData.append('_method', 'PUT');
                            }

                            console.log('Sending request to:', url, 'Method:', method);

                            const response = await fetch(url, {
                                method: method,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                                },
                                body: formData
                            });

                            console.log('Response status:', response.status, response.statusText);

                            if (!response.ok) {
                                const errorText = await response.text();
                                console.error('Server error response:', errorText);
                                throw new Error('Network response was not ok: ' + response.status);
                            }

                            const result = await response.json();
                            console.log('Save result:', result);

                            if (result.success) {
                                // ALWAYS show notification immediately - no checks, just show it
                                console.log('Save successful, showing notification...');

                                // Remove any existing notification first
                                const existing = document.getElementById('testimonial-success-notification');
                                if (existing) {
                                    existing.remove();
                                }

                                // Create and show notification directly
                                const notification = document.createElement('div');
                                notification.id = 'testimonial-success-notification';
                                notification.style.cssText = `
                                    position: fixed !important;
                                    top: 20px !important;
                                    left: 50% !important;
                                    transform: translateX(-50%) !important;
                                    background: #10b981 !important;
                                    color: white !important;
                                    padding: 16px 24px !important;
                                    border-radius: 8px !important;
                                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
                                    z-index: 99999 !important;
                                    display: flex !important;
                                    align-items: center !important;
                                    gap: 12px !important;
                                    min-width: 300px !important;
                                    max-width: 500px !important;
                                    font-family: Arial, sans-serif !important;
                                `;
                                notification.innerHTML = `
                                    <div style="font-size: 24px; flex-shrink: 0;">✓</div>
                                    <div style="flex: 1;">
                                        <div style="font-weight: 600; margin-bottom: 4px; font-size: 16px;">সফল!</div>
                                        <div style="font-size: 14px; opacity: 0.95; line-height: 1.4;">আপনার মন্তব্য সফলভাবে যোগ করা হয়েছে এবং হোম পেজে দেখানো হবে।</div>
            </div>
                                `;

                                // Add to body immediately
                                document.body.appendChild(notification);

                                // Force visibility
                                notification.style.display = 'flex';
                                notification.style.visibility = 'visible';
                                notification.style.opacity = '1';

                                // Auto remove after 5 seconds
                                setTimeout(() => {
                                    if (notification.parentNode) {
                                        notification.style.transition = 'opacity 0.3s ease';
                                        notification.style.opacity = '0';
                                        setTimeout(() => {
                                            if (notification.parentNode) {
                                                notification.remove();
                                            }
                                        }, 300);
                                    }
                                }, 5000);

                                // Update status beside button
                                if (statusEl) {
                                    statusEl.textContent = '✓ সংরক্ষিত';
                                    statusEl.style.color = '#10b981';
                                    setTimeout(() => {
                                        statusEl.textContent = '';
                                    }, 3000);
                                }

                                // Reload testimonials list in admin - this will replace the new card with saved one
                                // The saved testimonial will appear as a card with delete button at bottom
                                // Card will remain visible with all saved data
                                setTimeout(() => {
                                    loadTestimonials();
                                    // Trigger frontend refresh - multiple methods for reliability
                                    try {
                                        localStorage.setItem('refreshTestimonials', Date.now().toString());
                                        // Also dispatch custom event
                                        window.dispatchEvent(new CustomEvent('testimonialsUpdated'));
                                        // Also trigger storage event manually
                                        window.dispatchEvent(new StorageEvent('storage', {
                                            key: 'refreshTestimonials',
                                            newValue: Date.now().toString()
                                        }));
                                    } catch (e) {
                                        console.error('LocalStorage error:', e);
                                    }
                                }, 500);
                            } else {
                                console.error('Save failed:', result);
                                // Re-enable button on failure
                                if (saveBtn) {
                                    saveBtn.disabled = false;
                                    saveBtn.style.opacity = '1';
                                    saveBtn.style.cursor = 'pointer';
                                }
                                if (statusEl) {
                                    statusEl.textContent = '✗ ত্রুটি';
                                    statusEl.style.color = '#ef4444';
                                }
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'কিছু ভুল হয়েছে।'); }
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            // Re-enable button on error
                            if (saveBtn) {
                                saveBtn.disabled = false;
                                saveBtn.style.opacity = '1';
                                saveBtn.style.cursor = 'pointer';
                            }
                            if (statusEl) {
                                statusEl.textContent = '✗ ত্রুটি';
                                statusEl.style.color = '#ef4444';
                            }
                            if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'নেটওয়ার্ক ত্রুটি। অনুগ্রহ করে আবার চেষ্টা করুন।'); }
                        }
                    };

                    window.deleteTestimonial = async function (id) {
                        const confirmed = await showHomeConfirm('আপনি কি এই মন্তব্য মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;

                        try {
                            const response = await fetch(`/admin/testimonials/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                                }
                            });

                            const result = await response.json();

                            if (result.success) {
                                if (typeof alertUser === 'function') { alertUser('সফল', result.message); }
                                loadTestimonials();
                                // Trigger frontend refresh
                                try {
                                    localStorage.setItem('refreshTestimonials', Date.now().toString());
                                    window.dispatchEvent(new CustomEvent('testimonialsUpdated'));
                                } catch (e) { console.error('LocalStorage error:', e); }
                            } else {
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'কিছু ভুল হয়েছে।'); }
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'নেটওয়ার্ক ত্রুটি।'); }
                        }
                    };

                    async function loadTestimonials() {
                        try {
                            const response = await fetch('/api/testimonials');
                            if (!response.ok) {
                                throw new Error('Failed to load testimonials');
                            }
                            testimonials = await response.json();

                            // Clear container and rebuild with all testimonials from database
                            container.innerHTML = '';

                            if (testimonials.length === 0) {
                                // Show message if no testimonials
                                container.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #666;">কোন মন্তব্য নেই। "মন্তব্য যোগ করুন" বাটনে ক্লিক করে নতুন মন্তব্য যোগ করুন।</div>';
                            } else {
                                // Render all testimonials - they will appear as cards with delete buttons
                                testimonials.forEach((testimonial, index) => {
                                    const card = createTestimonialCard(testimonial, index);
                                    container.appendChild(card);
                                });
                            }
                        } catch (error) {
                            console.error('Error loading testimonials:', error);
                            if (container) {
                                container.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #ef4444;">মন্তব্য লোড করতে সমস্যা হয়েছে।</div>';
                            }
                        }
                    }

                    window.previewTestimonialImage = function (input, id) {
                        const previewDiv = document.querySelector(`.image-preview-${id}`);
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width:100%; max-height:120px; border-radius:8px; border:1px solid #e5e7eb;" />`;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    };


                    document.getElementById('addTestimonialBtn').addEventListener('click', () => {
                        const card = createTestimonialCard();
                        container.appendChild(card);
                        card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    });

                    // Save testimonial section settings
                    document.getElementById('saveTestimonialSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveTestimonialSettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await saveTestimonialSettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Initialize — lazy load
                    if (window.registerTabLoader) {
                        registerTabLoader('home', loadTestimonialSettings);
                        registerTabLoader('home', loadTestimonials);
                    } else { loadTestimonialSettings(); loadTestimonials(); }
                })();
            </script>
        </div>
    </div>

    <div id="home-social-carousel" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <h2 style="margin:0;">সোশ্যাল মিডিয়া (Carousel)</h2>
                <button id="addSocialItemBtn" class="btn btn-primary" type="button"
                    style="display:flex; align-items:center; gap:8px;">
                    <span>+</span>
                    <span>আইটেম যোগ করুন</span>
                </button>
            </div>
            <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">

            <!-- Section Title and Subtitle Fields -->
            <div class="section-header-fields"
                style="background: #f9fafb; padding: 16px; border-radius: 10px; margin-bottom: 16px; border: 1px solid #e5e7eb;">
                <label for="social-carousel-section-title"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    শিরোনাম (Title)</label>
                <input type="text" id="social-carousel-section-title" placeholder="সোশ্যাল মিডিয়া পোস্ট"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <label for="social-carousel-section-subtitle"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    সাব-শিরোনাম (Subtitle)</label>
                <input type="text" id="social-carousel-section-subtitle" placeholder="আমাদের সাম্প্রতিক আপডেট এবং খবর"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <button type="button" id="saveSocialCarouselSettingsBtn" class="btn btn-primary"
                    style="margin-top: 8px;">সেকশন সেটিংস সেভ করুন</button>
            </div>

            <style>
                @keyframes modalSlideIn {
                    from {
                        opacity: 0;
                        transform: scale(0.9) translateY(-20px);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1) translateY(0);
                    }
                }

                #home-social-carousel .social-form input[type="text"],
                #home-social-carousel .social-form input[type="url"],
                #home-social-carousel .social-form textarea {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    width: 100%;
                    border: 1px solid #e5e7eb;
                    box-sizing: border-box;
                }

                #home-social-carousel .social-form textarea {
                    height: auto;
                    min-height: 80px;
                    resize: vertical;
                }

                #home-social-carousel .social-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-social-carousel .card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-social-carousel .card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                #home-social-carousel .card-editor .delete-btn {
                    background: #ef4444;
                    color: white;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    transition: background 0.2s;
                }

                #home-social-carousel .card-editor .delete-btn:hover {
                    background: #dc2626;
                }

                @media (max-width: 960px) {
                    #home-social-carousel .social-grid-editor {
                        grid-template-columns: 1fr;
                    }
                }
            </style>

            <div class="social-form">
                <div id="socialItemsContainer" class="social-grid-editor">
                    <!-- Social media items will be loaded here dynamically -->
                </div>
            </div>
            <script>
                (function () {
                    const container = document.getElementById('socialItemsContainer');
                    const STORAGE_KEY = 'socialMediaAdminCards';
                    let items = [];
                    let newCounter = 0;
                    let socialCarouselSettings = { title: '', subtitle: '' };
                    const sectionTitleInput = document.getElementById('social-carousel-section-title');
                    const sectionSubtitleInput = document.getElementById('social-carousel-section-subtitle');

                    // Load social carousel section settings
                    async function loadSocialCarouselSettings() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=social-carousel');
                            if (response.ok) {
                                const section = await response.json();
                                if (section) {
                                    socialCarouselSettings = { title: section.title || '', subtitle: section.subtitle || '' };
                                    if (sectionTitleInput) sectionTitleInput.value = socialCarouselSettings.title;
                                    if (sectionSubtitleInput) sectionSubtitleInput.value = socialCarouselSettings.subtitle;
                                }
                            }
                        } catch (error) {
                            console.error('Error loading social carousel settings:', error);
                        }
                    }

                    // Save social carousel section settings
                    async function saveSocialCarouselSettings() {
                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_key: 'social-carousel',
                                    title: sectionTitleInput ? sectionTitleInput.value : '',
                                    subtitle: sectionSubtitleInput ? sectionSubtitleInput.value : '',
                                    is_active: true
                                })
                            });
                            if (!response.ok) throw new Error('Failed to save settings');
                        } catch (error) {
                            console.error('Error saving social carousel settings:', error);
                            throw error;
                        }
                    }

                    function saveCardsToStorage() {
                        const cards = Array.from(container.querySelectorAll('.card-editor'));
                        const cardsData = cards.map(card => {
                            const id = card.dataset.socialId;
                            const title = card.querySelector('.sm-title')?.value?.trim() || '';
                            const content = card.querySelector('.sm-subtitle')?.value?.trim() || '';
                            const link = card.querySelector('.sm-link')?.value?.trim() || '';
                            const img = card.querySelector(`[class^="image-preview-"] img`)?.getAttribute('src') || '';
                            return { id, title, content, link, image_url: img };
                        });
                        try {
                            localStorage.setItem(STORAGE_KEY, JSON.stringify(cardsData));
                        } catch (e) { console.error('Failed to save cards:', e); }
                    }

                    function loadCardsFromStorage() {
                        try {
                            const saved = localStorage.getItem(STORAGE_KEY);
                            if (saved) {
                                const cardsData = JSON.parse(saved);
                                cardsData.forEach(cardData => {
                                    const card = createCard({
                                        id: cardData.id,
                                        title: cardData.title,
                                        content: cardData.content,
                                        link: cardData.link,
                                        image_url: cardData.image_url
                                    });
                                    container.appendChild(card);
                                });
                            }
                        } catch (e) { console.error('Failed to load cards:', e); }
                    }

                    function collectPreviewItems() {
                        const cards = Array.from(container.querySelectorAll('.card-editor'));
                        const uniqueCards = new Map();

                        cards.forEach(card => {
                            const cardId = card.dataset.socialId;

                            // Get values from input fields (works in both edit and view mode)
                            const titleInput = card.querySelector('.sm-title');
                            const contentInput = card.querySelector('.sm-subtitle');
                            const linkInput = card.querySelector('.sm-link');
                            const imgElement = card.querySelector(`[class^="image-preview-"] img`);

                            const title = titleInput?.value?.trim() || '';
                            const content = contentInput?.value?.trim() || '';
                            const link = linkInput?.value?.trim() || '';
                            const image_url = imgElement?.getAttribute('src') || '';

                            // Only include items with at least title or content
                            if (title || content) {
                                // Use card ID as key to prevent duplicates
                                uniqueCards.set(cardId, { title, content, link, image_url });
                            }
                        });

                        return Array.from(uniqueCards.values());
                    }

                    function updateDashboardStatus() {
                        const dashStatusText = document.getElementById('dashStatusText');
                        const dashItemCount = document.getElementById('dashItemCount');
                        const dashStatusIndicator = document.getElementById('dashStatusIndicator');

                        // Get unique cards from DOM
                        const allCards = Array.from(container.querySelectorAll('.card-editor'));
                        const uniqueCardIds = new Set();
                        allCards.forEach(card => uniqueCardIds.add(card.dataset.socialId));
                        const cardCount = uniqueCardIds.size;

                        const validItems = collectPreviewItems();
                        const validCount = validItems.length;

                        if (dashItemCount) {
                            dashItemCount.textContent = `${cardCount} টি আইটেম`;
                            if (cardCount > 0) {
                                dashItemCount.style.background = '#d1fae5';
                                dashItemCount.style.color = '#065f46';
                            } else {
                                dashItemCount.style.background = '#fee2e2';
                                dashItemCount.style.color = '#991b1b';
                            }
                        }

                        if (dashStatusText) {
                            if (validCount > 0 && validCount !== cardCount) {
                                dashStatusText.textContent = `${validCount} টি প্রিভিউতে`;
                            } else if (cardCount > 0) {
                                dashStatusText.textContent = 'প্রিভিউতে সংযুক্ত';
                            } else {
                                dashStatusText.textContent = 'কোনো আইটেম নেই';
                            }
                        }

                        if (dashStatusIndicator) {
                            if (cardCount > 0) {
                                dashStatusIndicator.style.background = '#10b981';
                                dashStatusIndicator.style.boxShadow = '0 0 6px #10b981';
                            } else {
                                dashStatusIndicator.style.background = '#fbbf24';
                                dashStatusIndicator.style.boxShadow = '0 0 6px #fbbf24';
                            }
                        }
                    }

                    function broadcastPreview() {
                        const previewItems = collectPreviewItems();
                        const payload = {
                            ts: Date.now(),
                            items: previewItems
                        };

                        try {
                            localStorage.setItem('liveSocialMediaPreview', JSON.stringify(payload));
                        } catch (e) {
                            console.error('Failed to save preview:', e);
                        }

                        // Dispatch storage event for cross-tab communication
                        try {
                            window.dispatchEvent(new StorageEvent('storage', {
                                key: 'liveSocialMediaPreview',
                                newValue: JSON.stringify(payload),
                                url: window.location.href,
                                storageArea: localStorage
                            }));
                        } catch (_) { }

                        updateDashboardStatus();
                        saveCardsToStorage();
                    }

                    function attachLiveHandlers(scope) {
                        const root = scope || container;
                        root.querySelectorAll('.sm-title, .sm-subtitle, .sm-link').forEach(el => {
                            ['input', 'change'].forEach(ev => el.addEventListener(ev, broadcastPreview));
                        });
                    }

                    function createCard(item = null, index = null) {
                        const id = item ? item.id : 'new_' + (++newCounter);
                        const isNew = !item;
                        const displayIndex = index !== null ? index + 1 : (items.length + 1);
                        const escapedTitle = (item?.title || '').replace(/"/g, '&quot;');
                        const escapedSubtitle = (item?.content || '').replace(/"/g, '&quot;').replace(/\n/g, '&#10;');
                        const escapedLink = (item?.link || '').replace(/"/g, '&quot;');
                        const imageUrl = item?.image_url || '';
                        const card = document.createElement('div');
                        card.className = 'card card-editor';
                        card.dataset.socialId = id;
                        card.dataset.editMode = isNew ? 'true' : 'false'; // New cards start in edit mode

                        card.innerHTML = `
                            <div class="card-body text-center">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; padding-bottom:8px; border-bottom:2px solid #e5e7eb;">
                                <h4 style="margin:0; color:#0d3d29; font-weight:600;"><span>আইটেম ${displayIndex}</span></h4>
                                <div style="display:flex; gap:8px;">
                                    <button type="button" class="remove-card-btn" onclick="removeCardFromForm('${id}')" style="background:#ef4444; color:white; border:none; border-radius:6px; padding:6px 12px; font-size:12px; cursor:pointer; font-weight:500; transition: all 0.2s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">✕ সরান</button>
                                </div>
                            </div>
                            <div style="text-align:left;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:600; color:#374151;">শিরোনাম</label>
                                <input type="text" class="sm-title" placeholder="শিরোনাম লিখুন" value="${escapedTitle}" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:6px; font-size:14px; background:#fff;" />
                            </div>
                            <div style="margin-top:12px; text-align:left;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:600; color:#374151;">সাব-শিরোনাম</label>
                                <textarea class="sm-subtitle" placeholder="বিস্তারিত লিখুন" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:6px; min-height:70px; font-size:14px; resize:vertical; font-family:inherit; background:#fff;">${escapedSubtitle}</textarea>
                            </div>
                            <div style="margin-top:12px; text-align:left;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:600; color:#374151;">লিংক</label>
                                <input type="url" class="sm-link" placeholder="https://example.com" value="${escapedLink}" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:6px; font-size:14px; background:#fff;" />
                            </div>
                            <div class="image-upload-section" style="margin-top:12px; text-align:left;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:600; color:#374151;">ছবি আপলোড করুন</label>
                                <input type="file" class="sm-image" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px; font-size:13px; cursor:pointer; background:#fff;" onchange="previewSocialImage(this, '${id}')" />
                                <div class="image-preview-${id}" style="margin-top:8px; text-align:center;">
                                    ${imageUrl ? `<img src="${imageUrl}" alt="Preview" style="max-width:100%; max-height:150px; border-radius:8px; border:2px solid #e5e7eb; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" />` : ''}
                                </div>
                            </div>
                            <div class="action-buttons" style="margin-top:16px; padding-top:12px; border-top:1px solid #e5e7eb; display:flex; gap:8px; align-items:center; flex-wrap:wrap; justify-content:center;">
                                <button type="button" class="save-btn btn btn-primary" onclick="saveSocialItem('${id}')" style="padding:10px 24px; font-size:14px; font-weight:600; background:#0d3d29; border:none; border-radius:6px; color:white; cursor:pointer;">${isNew ? '✓ সংরক্ষণ' : '✓ আপডেট'}</button>
                            </div>
                            <div style="margin-top:8px; min-height:20px; text-align:center;">
                                <span class="save-status-${id}" style="font-size:13px; font-weight:500; display:inline-block; padding:4px 12px; border-radius:4px;"></span>
                            </div>
                            </div>
                        `;

                        return card;
                    }

                    async function loadItems() {
                        const dashStatusText = document.getElementById('dashStatusText');
                        const dashStatusIndicator = document.getElementById('dashStatusIndicator');

                        if (dashStatusText) dashStatusText.textContent = 'ডাটাবেস থেকে লোড হচ্ছে...';
                        if (dashStatusIndicator) {
                            dashStatusIndicator.style.background = '#3b82f6';
                            dashStatusIndicator.style.boxShadow = '0 0 6px #3b82f6';
                        }

                        try {
                            const res = await fetch('/api/social-media?_=' + Date.now(), {
                                headers: { 'Accept': 'application/json' },
                                cache: 'no-store'
                            });
                            if (!res.ok) throw new Error('Failed to load social media');
                            items = await res.json();
                            container.innerHTML = '';
                            if (items.length === 0) {
                                container.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #666;">কোনো আইটেম নেই। "আইটেম যোগ করুন" বাটনে ক্লিক করে নতুন আইটেম যোগ করুন।</div>';
                                // Broadcast empty preview
                                broadcastPreview();
                            } else {
                                // Clear container first to prevent duplicates
                                container.innerHTML = '';
                                // Remove duplicates from items array based on ID
                                const uniqueItems = [];
                                const seenIds = new Set();
                                items.forEach(it => {
                                    if (!seenIds.has(it.id)) {
                                        seenIds.add(it.id);
                                        uniqueItems.push(it);
                                    }
                                });
                                items = uniqueItems;

                                items.forEach((it, idx) => {
                                    const cardEl = createCard(it, idx);
                                    container.appendChild(cardEl);
                                });

                                // After DOM is ready, attach handlers
                                setTimeout(() => {
                                    attachLiveHandlers();
                                    broadcastPreview();
                                }, 100);
                            }

                            if (dashStatusText) dashStatusText.textContent = 'ডাটাবেস সংযুক্ত';
                            if (dashStatusIndicator) {
                                dashStatusIndicator.style.background = '#10b981';
                                dashStatusIndicator.style.boxShadow = '0 0 6px #10b981';
                            }
                        } catch (err) {
                            console.error('Error loading social items:', err);
                            container.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #ef4444;">সোশ্যাল মিডিয়া লোড করতে সমস্যা হয়েছে।</div>';

                            if (dashStatusText) dashStatusText.textContent = 'লোড ব্যর্থ';
                            if (dashStatusIndicator) {
                                dashStatusIndicator.style.background = '#ef4444';
                                dashStatusIndicator.style.boxShadow = '0 0 6px #ef4444';
                            }
                        }
                    }



                    // Create confirmation modal
                    function showConfirmModal(title, message, onConfirm) {
                        const overlay = document.createElement('div');
                        overlay.id = 'confirmOverlay';
                        overlay.style.cssText = 'display:block; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9998; backdrop-filter:blur(4px);';

                        const modal = document.createElement('div');
                        modal.id = 'confirmModal';
                        modal.style.cssText = 'display:flex; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;';

                        modal.innerHTML = `
                            <div style="background:#ffffff; width:90%; max-width:420px; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,0.25); overflow:hidden; animation:modalSlideIn 0.3s ease-out;">
                                <div style="padding:18px 20px; border-bottom:1px solid #eef2f7; display:flex; align-items:center; gap:10px;">
                                    <div style="width:36px; height:36px; border-radius:50%; background:#fef3c7; color:#d97706; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:20px;">!</div>
                                    <div style="font-size:18px; font-weight:700; color:#0f172a;">${title}</div>
                                </div>
                                <div style="padding:18px 20px; color:#334155; font-size:15px; line-height:1.6;">
                                    ${message}
                                </div>
                                <div style="padding:14px 16px; display:flex; gap:10px; justify-content:flex-end; background:#f8fafc; border-top:1px solid #eef2f7;">
                                    <button type="button" id="modalCancelBtn" style="padding:10px 20px; background:#e5e7eb; color:#111827; border:none; border-radius:8px; font-weight:600; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.background='#d1d5db'" onmouseout="this.style.background='#e5e7eb'">না</button>
                                    <button type="button" id="modalConfirmBtn" style="padding:10px 20px; background:#0d3d29; color:#fff; border:none; border-radius:8px; font-weight:600; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.background='#0d6639'" onmouseout="this.style.background='#0d3d29'">হ্যাঁ</button>
                                </div>
                            </div>
                        `;

                        document.body.appendChild(overlay);
                        document.body.appendChild(modal);

                        const closeModal = () => {
                            overlay.remove();
                            modal.remove();
                        };

                        document.getElementById('modalCancelBtn').onclick = closeModal;
                        overlay.onclick = closeModal;

                        document.getElementById('modalConfirmBtn').onclick = () => {
                            closeModal();
                            if (onConfirm) onConfirm();
                        };

                        // ESC key to close
                        const escHandler = (e) => {
                            if (e.key === 'Escape') {
                                closeModal();
                                window.removeEventListener('keydown', escHandler);
                            }
                        };
                        window.addEventListener('keydown', escHandler);
                    }

                    window.saveSocialItem = async function (id) {
                        const card = document.querySelector(`[data-social-id="${id}"]`);
                        if (!card) return;
                        const title = card.querySelector('.sm-title').value.trim();
                        const content = card.querySelector('.sm-subtitle').value.trim();
                        const link = card.querySelector('.sm-link').value.trim();
                        const imageFile = card.querySelector('.sm-image').files[0];
                        const statusEl = card.querySelector(`.save-status-${id}`);

                        if (!title) {
                            showConfirmModal('ত্রুটি', 'অনুগ্রহ করে শিরোনাম পূরণ করুন।', null);
                            return;
                        }

                        const isNew = id.toString().startsWith('new_');
                        const actionText = isNew ? 'সংরক্ষণ' : 'আপডেট';

                        showConfirmModal(
                            `${actionText} নিশ্চিতকরণ`,
                            `আপনি কি এই আইটেমটি ${actionText} করতে চান?`,
                            async () => {
                                await performSave(id, card, title, content, link, imageFile, statusEl, isNew);
                            }
                        );
                    };

                    async function performSave(id, card, title, content, link, imageFile, statusEl, isNew) {
                        if (statusEl) {
                            statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                            statusEl.style.color = '#666';
                            statusEl.style.background = '#f3f4f6';
                        }
                        try {
                            const url = isNew ? '/admin/social-media' : `/admin/social-media/${id}`;
                            const method = 'POST'; // use POST always; spoof PUT via _method to keep file uploads reliable
                            const fd = new FormData();
                            if (!isNew) fd.append('_method', 'PUT');
                            fd.append('platform', 'Other');
                            fd.append('title', title);
                            fd.append('content', content);
                            // Only send link if it's not empty
                            if (link && link.trim()) fd.append('link', link);
                            if (imageFile) fd.append('image', imageFile);
                            const token = (document.querySelector('meta[name="csrf-token"]').content || document.getElementById('csrfToken')?.value || '').toString();
                            const resp = await fetch(url, { method, headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' }, body: fd });
                            
                            // Parse response - handle both success and error responses
                            let result;
                            const responseText = await resp.text();
                            try {
                                result = JSON.parse(responseText);
                            } catch (e) {
                                console.error('Failed to parse response:', responseText);
                                throw new Error('সার্ভার থেকে অবৈধ প্রতিক্রিয়া');
                            }
                            
                            // Handle validation errors (422) or other errors
                            if (!resp.ok) {
                                console.error('Server error:', result);
                                let errorMessage = 'সংরক্ষণ ব্যর্থ হয়েছে';
                                if (result.message) {
                                    errorMessage = result.message;
                                }
                                if (result.errors) {
                                    const firstError = Object.values(result.errors)[0];
                                    if (Array.isArray(firstError) && firstError.length > 0) {
                                        errorMessage = firstError[0];
                                    }
                                }
                                if (statusEl) {
                                    statusEl.textContent = '✗ ' + errorMessage;
                                    statusEl.style.color = '#dc2626';
                                    statusEl.style.background = '#fee2e2';
                                    setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 5000);
                                }
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', errorMessage); }
                                return;
                            }
                            if (result.success) {
                                if (statusEl) {
                                    statusEl.textContent = '✓ সফলভাবে সংরক্ষিত হয়েছে';
                                    statusEl.style.color = '#059669';
                                    statusEl.style.background = '#d1fae5';
                                    setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 4000);
                                }
                                try { localStorage.setItem('refreshSocialMedia', String(Date.now())); } catch (_) { }

                                // Update image preview in card if new image was uploaded
                                if (result.data && result.data.image_url) {
                                    const previewDiv = card.querySelector(`[class*="image-preview-"]`);
                                    if (previewDiv) {
                                        previewDiv.innerHTML = `<img src="${result.data.image_url}" alt="Preview" style="max-width:100%; max-height:150px; border-radius:8px; border:2px solid #e5e7eb; box-shadow:0 2px 4px rgba(0,0,0,0.1);" />`;
                                    }
                                    // Clear file input
                                    const fileInput = card.querySelector('.sm-image');
                                    if (fileInput) fileInput.value = '';
                                }

                                // Show success message
                                if (typeof alertUser === 'function') { 
                                    alertUser('সফল', isNew ? 'নতুন আইটেম সফলভাবে যোগ করা হয়েছে।' : 'আইটেম সফলভাবে আপডেট করা হয়েছে।'); 
                                }

                                // Reload items to show updated data
                                await loadItems();

                                saveCardsToStorage();
                                // Broadcast preview immediately after successful save
                                setTimeout(broadcastPreview, 50);
                            } else {
                                if (statusEl) {
                                    statusEl.textContent = '✗ সংরক্ষণ ব্যর্থ হয়েছে';
                                    statusEl.style.color = '#dc2626';
                                    statusEl.style.background = '#fee2e2';
                                    setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 4000);
                                }
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'কিছু ভুল হয়েছে। আবার চেষ্টা করুন।'); }
                            }
                        } catch (err) {
                            console.error('Save error:', err);
                            const errorMsg = err.message || 'নেটওয়ার্ক সংযোগ ত্রুটি। আবার চেষ্টা করুন।';
                            if (statusEl) {
                                statusEl.textContent = '✗ ত্রুটি';
                                statusEl.style.color = '#dc2626';
                                statusEl.style.background = '#fee2e2';
                                setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 4000);
                            }
                            if (typeof alertUser === 'function') { alertUser('ত্রুটি', errorMsg); }
                        }
                    }

                    window.deleteSocialItem = async function (id) {
                        const card = document.querySelector(`[data-social-id="${id}"]`);
                        const statusEl = card?.querySelector(`.save-status-${id}`);

                        showConfirmModal(
                            'মুছে ফেলার নিশ্চিতকরণ',
                            'আপনি কি নিশ্চিত এই আইটেমটি মুছে ফেলতে চান? এই কাজটি পূর্বাবস্থায় ফেরানো যাবে না।',
                            async () => {
                                await performDelete(id, card, statusEl);
                            }
                        );
                    };

                    async function performDelete(id, card, statusEl) {

                        if (statusEl) {
                            statusEl.textContent = 'মুছে ফেলা হচ্ছে...';
                            statusEl.style.color = '#666';
                            statusEl.style.background = '#f3f4f6';
                        }

                        try {
                            const token = (document.querySelector('meta[name="csrf-token"]').content || document.getElementById('csrfToken')?.value || '').toString();
                            const resp = await fetch(`/admin/social-media/${id}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' } });
                            
                            // Parse response - handle both success and error responses
                            let result;
                            const responseText = await resp.text();
                            try {
                                result = JSON.parse(responseText);
                            } catch (e) {
                                console.error('Failed to parse response:', responseText);
                                throw new Error('সার্ভার থেকে অবৈধ প্রতিক্রিয়া');
                            }
                            
                            if (!resp.ok) {
                                const errorMessage = result.message || result.error || 'আইটেম মুছতে সমস্যা হয়েছে।';
                                throw new Error(errorMessage);
                            }
                            
                            if (result.success) {
                                if (typeof alertUser === 'function') { alertUser('সফল', 'আইটেমটি সফলভাবে মুছে ফেলা হয়েছে।'); }

                                // Reload items from database to ensure sync
                                await loadItems();

                                // Broadcast preview after deletion
                                broadcastPreview();

                                try { localStorage.setItem('refreshSocialMedia', String(Date.now())); } catch (_) { }
                            } else {
                                if (statusEl) {
                                    statusEl.textContent = '✗ মুছতে ব্যর্থ';
                                    statusEl.style.color = '#dc2626';
                                    statusEl.style.background = '#fee2e2';
                                    setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 3000);
                                }
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'আইটেম মুছতে সমস্যা হয়েছে।'); }
                            }
                        } catch (err) {
                            console.error('Delete error:', err);
                            const errorMsg = err.message || 'নেটওয়ার্ক সংযোগ ত্রুটি। আবার চেষ্টা করুন।';
                            if (statusEl) {
                                statusEl.textContent = '✗ ত্রুটি';
                                statusEl.style.color = '#dc2626';
                                statusEl.style.background = '#fee2e2';
                                setTimeout(() => { statusEl.textContent = ''; statusEl.style.background = 'transparent'; }, 3000);
                            }
                            if (typeof alertUser === 'function') { alertUser('ত্রুটি', errorMsg); }
                        }
                    }

                    window.previewSocialImage = function (input, id) {
                        const section = input.closest('.image-upload-section');
                        const previewDiv = section
                            ? section.querySelector('[class*="image-preview-"]')
                            : document.querySelector('.image-preview-' + id);
                        if (!previewDiv) return;
                        if (input.files && input.files[0]) {
                            const file = input.files[0];
                            if (file.size > 5 * 1024 * 1024) {
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'ফাইলের আকার ৫ এমবি এর কম হতে হবে।'); }
                                input.value = '';
                                return;
                            }
                            if (!file.type.startsWith('image/')) {
                                if (typeof alertUser === 'function') { alertUser('ত্রুটি', 'অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন।'); }
                                input.value = '';
                                return;
                            }
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewDiv.innerHTML = '<img src="' + e.target.result + '" alt="Preview" style="max-width:100%; max-height:200px; border-radius:8px; border:2px solid #0d3d29; box-shadow:0 2px 8px rgba(0,0,0,0.15);" />';
                            };
                            reader.readAsDataURL(file);
                        }
                    }

                    window.removeCardFromForm = function (id) {
                        const card = document.querySelector(`[data-social-id="${id}"]`);
                        if (!card) return;

                        showConfirmModal(
                            'সরানোর নিশ্চিতকরণ',
                            'আপনি কি এই আইটেমটি ফর্ম থেকে সরাতে চান?',
                            () => {
                                // Just remove from DOM, don't delete from database
                                card.style.transition = 'all 0.3s ease';
                                card.style.opacity = '0';
                                card.style.transform = 'scale(0.95)';
                                setTimeout(() => {
                                    card.remove();
                                    broadcastPreview();
                                    saveCardsToStorage();
                                    updateDashboardStatus();
                                }, 300);
                            }
                        );
                    }

                    document.getElementById('addSocialItemBtn').addEventListener('click', () => {
                        showConfirmModal(
                            'নতুন আইটেম যোগ করুন',
                            'আপনি কি একটি নতুন সোশ্যাল মিডিয়া আইটেম যোগ করতে চান?',
                            () => {
                                // Remove "no items" message if it exists
                                const noItemsMsg = container.querySelector('div[style*="grid-column: 1 / -1"]');
                                if (noItemsMsg && noItemsMsg.textContent.includes('কোনো আইটেম নেই')) {
                                    noItemsMsg.remove();
                                }

                                const card = createCard();
                                container.appendChild(card);
                                card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                broadcastPreview();
                                saveCardsToStorage();
                                updateDashboardStatus();
                            }
                        );
                    });

                    // Save social carousel section settings
                    document.getElementById('saveSocialCarouselSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveSocialCarouselSettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await saveSocialCarouselSettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Initialize: lazy load
                    if (window.registerTabLoader) {
                        registerTabLoader('home', loadSocialCarouselSettings);
                        registerTabLoader('home', loadItems);
                    } else { loadSocialCarouselSettings(); loadItems(); }

                })();
            </script>
        </div>
    </div>

    <div id="home-hero-slider" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;">
                <div>
                    <h2 style="margin:0 0 0.5rem 0;">হিরো স্লাইডার ম্যানেজমেন্ট</h2>
                    <div id="heroSliderStatus"
                        style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: #6b7280;">
                        <span id="heroStatusIndicator"
                            style="width: 8px; height: 8px; border-radius: 50%; background: #10b981; box-shadow: 0 0 6px #10b981;"></span>
                        <span id="heroStatusText">ডাটাবেস সংযুক্ত</span>
                        <span id="heroItemCount"
                            style="margin-left: 8px; padding: 2px 8px; background: #e0f2fe; color: #0369a1; border-radius: 12px; font-weight: 500;">0
                            টি স্লাইড</span>
                    </div>
                </div>
                <button id="addHeroSlideBtn" class="btn btn-primary" type="button"
                    style="display:flex; align-items:center; gap:8px;">
                    <span>+</span>
                    <span>স্লাইড যোগ করুন</span>
                </button>
            </div>
            <input type="hidden" id="csrfTokenHero" value="{{ csrf_token() }}">
            <style>
                #home-hero-slider .hero-slider-grid {
                    display: grid;
                    gap: 16px;
                }

                #home-hero-slider .slider-card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 16px;
                    background: #fafafa;
                    position: relative;
                }

                #home-hero-slider .slider-card-editor h4 {
                    margin: 0 0 12px;
                    font-size: 15px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    color: #0d3d29;
                    font-weight: 600;
                }

                #home-hero-slider .slider-card-editor input[type="text"],
                #home-hero-slider .slider-card-editor input[type="url"],
                #home-hero-slider .slider-card-editor input[type="number"],
                #home-hero-slider .slider-card-editor select,
                #home-hero-slider .slider-card-editor textarea {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    width: 100%;
                    box-sizing: border-box;
                    border: 1px solid #e5e7eb;
                    margin-bottom: 8px;
                }

                #home-hero-slider .slider-card-editor textarea {
                    height: auto;
                    min-height: 80px;
                    resize: vertical;
                }

                #home-hero-slider .slider-card-editor .image-preview {
                    margin: 8px 0;
                    max-width: 100%;
                    border-radius: 8px;
                    overflow: hidden;
                }

                #home-hero-slider .slider-card-editor .image-preview img {
                    width: 100%;
                    max-height: 200px;
                    object-fit: cover;
                    border-radius: 8px;
                }

                #home-hero-slider .slider-card-editor .delete-btn {
                    background: #ef4444;
                    color: #fff;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                }

                #home-hero-slider .slider-card-editor .save-btn {
                    background: #10b981;
                    color: #fff;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    margin-right: 8px;
                }

                #home-hero-slider .form-row {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 12px;
                }

                @media (max-width: 960px) {
                    #home-hero-slider .form-row {
                        grid-template-columns: 1fr
                    }
                }
            </style>

            <div class="hero-slider-form">
                <div id="heroSliderContainer" class="hero-slider-grid"></div>
            </div>
            <script>
                (function () {
                    const container = document.getElementById('heroSliderContainer');
                    const addBtn = document.getElementById('addHeroSlideBtn');
                    const statusText = document.getElementById('heroStatusText');
                    const statusIndicator = document.getElementById('heroStatusIndicator');
                    const itemCount = document.getElementById('heroItemCount');
                    const csrfToken = document.getElementById('csrfTokenHero').value;

                    let sliders = [];
                    let sliderCounter = 0;

                    function updateStatus(text, isError = false) {
                        statusText.textContent = text;
                        statusIndicator.style.background = isError ? '#ef4444' : '#10b981';
                        statusIndicator.style.boxShadow = isError ? '0 0 6px #ef4444' : '0 0 6px #10b981';
                    }

                    function updateItemCount() {
                        itemCount.textContent = `${sliders.length} টি স্লাইড`;
                    }

                    async function loadSliders() {
                        try {
                            const response = await fetch('/admin/hero-sliders');
                            if (!response.ok) throw new Error('Failed to load');
                            sliders = await response.json();
                            renderSliders();
                            updateStatus('ডাটাবেস সংযুক্ত');
                            updateItemCount();
                        } catch (error) {
                            console.error('Error loading sliders:', error);
                            updateStatus('লোড করতে ব্যর্থ', true);
                        }
                    }

                    function createSliderCard(slider = null, index = null) {
                        const id = slider ? slider.id : 'new_' + (++sliderCounter);
                        const isNew = !slider;
                        const displayIndex = index !== null ? index + 1 : (sliders.length + 1);

                        const card = document.createElement('div');
                        card.className = 'slider-card-editor';
                        card.dataset.sliderId = id;

                        const escapeHtml = (str) => (str || '').replace(/"/g, '&quot;').replace(/\n/g, '&#10;');

                        card.innerHTML = `
                            <h4>
                                <span>স্লাইড ${displayIndex}</span>
                                <div style="display:flex; gap:8px;">
                                    <label style="display:flex; align-items:center; gap:4px; font-weight:normal; font-size:13px;">
                                        <input type="checkbox" class="slider-active" ${slider?.is_active !== false ? 'checked' : ''} />
                                        <span>সক্রিয়</span>
                                    </label>
                                </div>
                            </h4>
                            
                            <div style="margin-bottom:12px;">
                                <label style="display:block; margin-bottom:4px; font-size:13px; font-weight:500;">স্লাইড ছবি</label>
                                <input type="file" class="slider-image" accept="image/*" style="width:100%; padding:6px; border:1px solid #e5e7eb; border-radius:6px;" />
                                <div class="image-preview-${id}" style="margin-top:8px;">
                                    ${slider?.image_url ? `<img src="${slider.image_url}" alt="Preview" style="max-width:100%; max-height:200px; border-radius:8px; border:1px solid #e5e7eb;" />` : ''}
                                </div>
                            </div>

                            <input type="text" class="slider-title" placeholder="শিরোনাম (যেমন: আপনার স্বপ্নের বাড়ি)" value="${escapeHtml(slider?.title)}" />
                            <input type="text" class="slider-subtitle" placeholder="সাব-টাইটেল (যেমন: জলছায়া প্রজেক্টে)" value="${escapeHtml(slider?.subtitle)}" />
                            <textarea class="slider-description" placeholder="বিবরণ">${escapeHtml(slider?.description)}</textarea>
                            
                            <div class="form-row">
                                <input type="text" class="slider-primary-btn-text" placeholder="প্রাইমারি বাটন টেক্সট" value="${escapeHtml(slider?.primary_button_text)}" />
                                <input type="text" class="slider-primary-btn-link" placeholder="প্রাইমারি বাটন লিংক" value="${escapeHtml(slider?.primary_button_link)}" />
                            </div>
                            
                            <div class="form-row">
                                <input type="text" class="slider-secondary-btn-text" placeholder="সেকেন্ডারি বাটন টেক্সট" value="${escapeHtml(slider?.secondary_button_text)}" />
                                <input type="text" class="slider-secondary-btn-link" placeholder="সেকেন্ডারি বাটন লিংক" value="${escapeHtml(slider?.secondary_button_link)}" />
                            </div>

                            <input type="number" class="slider-order" placeholder="ক্রম (Order)" value="${slider?.order || 0}" min="0" />
                            
                            <div style="margin-top:12px; display:flex; gap:8px;">
                                <button class="save-btn" onclick="saveSlider('${id}', ${isNew})">সেভ করুন</button>
                                ${!isNew ? `<button class="delete-btn" onclick="deleteSlider('${id}')">ডিলিট করুন</button>` : ''}
                            </div>
                        `;

                        return card;
                    }

                    function renderSliders() {
                        container.innerHTML = '';
                        sliders.forEach((slider, index) => {
                            container.appendChild(createSliderCard(slider, index));
                        });
                    }

                    window.saveSlider = async function (id, isNew) {
                        const card = document.querySelector(`[data-slider-id="${id}"]`);
                        if (!card) return;

                        const formData = new FormData();
                        formData.append('title', card.querySelector('.slider-title').value);
                        formData.append('subtitle', card.querySelector('.slider-subtitle').value);
                        formData.append('description', card.querySelector('.slider-description').value);
                        formData.append('primary_button_text', card.querySelector('.slider-primary-btn-text').value);
                        formData.append('primary_button_link', card.querySelector('.slider-primary-btn-link').value);
                        formData.append('secondary_button_text', card.querySelector('.slider-secondary-btn-text').value);
                        formData.append('secondary_button_link', card.querySelector('.slider-secondary-btn-link').value);
                        formData.append('order', card.querySelector('.slider-order').value);
                        formData.append('is_active', card.querySelector('.slider-active').checked ? '1' : '0');

                        const imageInput = card.querySelector('.slider-image');
                        if (imageInput.files.length > 0) {
                            formData.append('image', imageInput.files[0]);
                        }

                        try {
                            const url = isNew ? '/admin/hero-sliders' : `/admin/hero-sliders/${id}`;
                            const method = isNew ? 'POST' : 'PUT';

                            const options = {
                                method: method,
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: formData
                            };

                            // For PUT requests, we need to add _method field
                            if (!isNew) {
                                formData.append('_method', 'PUT');
                                options.method = 'POST';
                            }

                            const response = await fetch(url, options);

                            if (!response.ok) {
                                const errorData = await response.json();
                                throw new Error(errorData.message || 'Failed to save');
                            }

                            updateStatus(isNew ? 'নতুন স্লাইড যোগ হয়েছে' : 'স্লাইড আপডেট হয়েছে');
                            await loadSliders();

                            // Trigger refresh on frontend - use multiple methods
                            try {
                                const timestamp = Date.now().toString();
                                localStorage.setItem('refreshHeroSlider', timestamp);
                                // Also trigger storage event manually for same-window updates
                                window.dispatchEvent(new StorageEvent('storage', {
                                    key: 'refreshHeroSlider',
                                    newValue: timestamp,
                                    storageArea: localStorage
                                }));
                                console.log('Hero slider refresh triggered:', timestamp);
                            } catch (e) {
                                console.error('Error triggering refresh:', e);
                            }

                        } catch (error) {
                            console.error('Error saving slider:', error);
                            updateStatus('সেভ করতে ব্যর্থ', true);
                            alert('স্লাইডার সেভ করতে সমস্যা হয়েছে');
                        }
                    };

                    window.deleteSlider = async function (id) {
                        const confirmed = await showHomeConfirm('আপনি কি এই স্লাইডটি ডিলিট করতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;

                        try {
                            const response = await fetch(`/admin/hero-sliders/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Content-Type': 'application/json'
                                }
                            });

                            if (!response.ok) throw new Error('Failed to delete');

                            updateStatus('স্লাইড ডিলিট হয়েছে');
                            await loadSliders();

                            // Trigger refresh on frontend - use multiple methods
                            try {
                                const timestamp = Date.now().toString();
                                localStorage.setItem('refreshHeroSlider', timestamp);
                                // Also trigger storage event manually for same-window updates
                                window.dispatchEvent(new StorageEvent('storage', {
                                    key: 'refreshHeroSlider',
                                    newValue: timestamp,
                                    storageArea: localStorage
                                }));
                                console.log('Hero slider refresh triggered:', timestamp);
                            } catch (e) {
                                console.error('Error triggering refresh:', e);
                            }

                        } catch (error) {
                            console.error('Error deleting slider:', error);
                            updateStatus('ডিলিট করতে ব্যর্থ', true);
                            alert('স্লাইডার ডিলিট করতে সমস্যা হয়েছে');
                        }
                    };

                    addBtn.addEventListener('click', () => {
                        const newCard = createSliderCard();
                        container.insertBefore(newCard, container.firstChild);
                    });

                    // Load sliders — lazy load
                    if (window.registerTabLoader) {
                        registerTabLoader('home', loadSliders);
                    } else { loadSliders(); }

                    // Load sliders once on page load only
                })();
            </script>
        </div>
    </div>

    <div id="home-social" style="margin-top:1rem;">
        <div class="table-card">
            <h2>সোশ্যাল মিডিয়া</h2>
            <style>
                #home-social .social-form input[type="url"] {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-social .grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 12px;
                }

                @media (max-width: 960px) {
                    #home-social .grid {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="social-form">
                <div class="grid">
                    <input type="url" id="socialFacebook" placeholder="Facebook URL" />
                    <input type="url" id="socialInstagram" placeholder="Instagram URL" />
                    <input type="url" id="socialTwitter" placeholder="Twitter/X URL" />
                    <input type="url" id="socialLinkedin" placeholder="LinkedIn URL" />
                    <input type="url" id="socialYouTube" placeholder="YouTube URL" />
                </div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="saveSocialBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetSocialBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    const ids = ['Facebook', 'Instagram', 'Twitter', 'Linkedin', 'YouTube'];
                    function load() {
                        try {
                            const v = JSON.parse(localStorage.getItem('socialSettings') || '{}');
                            ids.forEach(k => { const el = document.getElementById('social' + k); if (el) el.value = v['social' + k] || ''; });
                        } catch (_) { }
                    }
                    function collect() {
                        const v = {}; ids.forEach(k => { const el = document.getElementById('social' + k); v['social' + k] = el ? el.value.trim() : ''; }); return v;
                    }
                    function save(v) { localStorage.setItem('socialSettings', JSON.stringify(v)); }
                    document.getElementById('saveSocialBtn').addEventListener('click', () => {
                        save(collect());
                        if (typeof showNotification === 'function') {
                            showNotification('সোশ্যাল লিংক সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                        } else if (typeof alertUser === 'function') {
                            alertUser('সফল', 'সোশ্যাল লিংক সংরক্ষণ করা হয়েছে।');
                        }
                    });
                    document.getElementById('resetSocialBtn').addEventListener('click', () => { localStorage.removeItem('socialSettings'); ids.forEach(k => { const el = document.getElementById('social' + k); if (el) el.value = ''; }); if (typeof alertUser === 'function') { alertUser('সফল', 'সোশ্যাল লিংক রিসেট করা হয়েছে।'); } });
                    ids.forEach(k => { const el = document.getElementById('social' + k); if (el) { ['input', 'change'].forEach(ev => el.addEventListener(ev, () => save(collect()))); } });
                    load();
                })();
            </script>
        </div>
    </div>

    <div id="home-roadmap-content" style="margin-top:1rem;">
        <div class="table-card">
            <h2>প্রকল্প রোডম্যাপ (বাম সেকশন)</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের "প্রকল্প রোডম্যাপ" সেকশনের বাম দিকের কন্টেন্ট
                (main-section) এই ফর্ম থেকে ম্যানেজ হবে।</p>
            <style>
                #home-roadmap-content .form-grid {
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 16px;
                    align-items: start;
                }

                #home-roadmap-content .card {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa
                }

                #home-roadmap-content input[type="text"],
                #home-roadmap-content input[type="url"],
                #home-roadmap-content textarea {
                    width: 100%;
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    border: 1px solid #d1d5db;
                    box-sizing: border-box;
                }

                #home-roadmap-content textarea {
                    min-height: 120px;
                    height: auto;
                    resize: vertical;
                }

                #home-roadmap-content .grid-2 {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 12px;
                }

                #home-roadmap-content .grid-4 {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-roadmap-content .plot-item {
                    border: 1px dashed #cbd5e1;
                    border-radius: 10px;
                    padding: 10px;
                    background: #fff;
                }

                #home-roadmap-content .amenity-pill {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 6px 10px;
                    background: #e2fbe8;
                    color: #065f46;
                    border-radius: 999px;
                    font-size: 13px;
                    margin: 6px 6px 0 0;
                }

                #home-roadmap-content .amenity-pill button {
                    background: transparent;
                    border: none;
                    color: #059669;
                    cursor: pointer;
                }

                #home-roadmap-content .map-prev {
                    border: 1px dashed #cbd5e1;
                    border-radius: 10px;
                    overflow: hidden;
                    aspect-ratio: 16/9;
                    background: #f8fafc;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                #home-roadmap-content .map-prev img {
                    max-width: 100%;
                    max-height: 100%;
                    display: block;
                }

                #home-roadmap-content .section-header-fields {
                    background: #f9fafb;
                    padding: 16px;
                    border-radius: 10px;
                    margin-bottom: 16px;
                    border: 1px solid #e5e7eb;
                }

                #home-roadmap-content .section-header-fields label {
                    display: block;
                    margin-bottom: 6px;
                    font-weight: 600;
                    font-size: 14px;
                    color: #374151;
                }

                #home-roadmap-content .section-header-fields input {
                    width: 100%;
                    margin-bottom: 12px;
                }

                @media (max-width: 960px) {

                    #home-roadmap-content .grid-2,
                    #home-roadmap-content .grid-4 {
                        grid-template-columns: 1fr;
                    }
                }
            </style>

            <!-- Section Title and Subtitle Fields -->
            <div class="section-header-fields">
                <label for="roadmap-section-title">সেকশন শিরোনাম (Title)</label>
                <input type="text" id="roadmap-section-title" placeholder="প্রজেক্ট রোডম্যাপ" />
                <label for="roadmap-section-subtitle">সেকশন সাব-শিরোনাম (Subtitle)</label>
                <input type="text" id="roadmap-section-subtitle" placeholder="আপনার পছন্দের প্লট বেছে নিন" />
                <button type="button" id="saveRoadmapSettingsBtn" class="btn btn-primary" style="margin-top: 8px;">সেকশন
                    সেটিংস সেভ করুন</button>
            </div>

            <div class="form-grid">
                <div class="card">
                    <div class="form-group">
                        <label>অফার শিরোনাম</label>
                        <input type="text" id="rpOfferTitle" placeholder="বেছে নিন আপনার পছন্দের প্লট">
                    </div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:6px; font-weight:600; color:#0D5534;">প্লট বক্স (৪টি) -
                        প্রতি বক্সে আকার, ক্যাটাগরি এবং CTA বাটন</label>
                    <p style="font-size:12px; color:#6b7280; margin-top:4px; margin-bottom:12px;">প্রতি বক্সে আকার
                        (যেমন: ৮ কাঠা), ক্যাটাগরি (যেমন: প্রিমিয়াম প্লট) এবং CTA বাটন টেক্সট ও লিংক যোগ করুন</p>
                    <div id="rpPlots" class="grid-4"></div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:6px;">সুবিধাসমূহ (amenities)</label>
                    <div id="rpAmenitiesWrap"></div>
                    <div class="grid-2" style="margin-top:10px;">
                        <input type="text" id="rpAmenityInput" placeholder="নতুন সুবিধা (যেমন: ক্লাব হাউজ)">
                        <button id="rpAmenityAdd" class="btn btn-primary" type="button">যোগ করুন</button>
                    </div>
                </div>

                <div class="card">
                    <div class="form-group">
                        <label>ফুটার নোট</label>
                        <textarea id="rpFooterNote" placeholder="HTML সমর্থিত"></textarea>
                    </div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:12px; font-weight:600; color:#0D5534; font-size:15px;">🔘
                        CTA বার কাস্টমাইজ করুন</label>
                    <div class="grid-2" style="gap:16px;">
                        <div class="form-group" style="margin-bottom:0;">
                            <label style="font-weight:600; color:#374151; margin-bottom:8px;">CTA বার টেক্সট *</label>
                            <input type="text" id="rpCtaBar" placeholder="📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার"
                                style="width:100%; height:46px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label style="font-weight:600; color:#374151; margin-bottom:8px;">CTA বার লিংক *</label>
                            <input type="text" id="rpCtaLink" placeholder="#contact বা https://example.com"
                                style="width:100%; height:46px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                        </div>
                    </div>
                    <div style="margin-top:8px; font-size:12px; color:#6b7280;">
                        💡 টিপস: #contact (অ্যাঙ্কর), /page (পেজ), বা https://example.com (বাহ্যিক লিংক) ব্যবহার করুন
                    </div>
                </div>

                <div class="card grid-2">
                    <div>
                        <div class="form-group">
                            <label style="opacity:0;">প্রকল্প রোডম্যাপ</label>
                        </div>
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:6px;">প্রকল্প রোডম্যাপ</label>
                        <div class="map-prev"><img id="rpMapPrev" alt="Map" src="assets/images/realstate3.PNG"></div>
                        <input type="file" id="rpMapInput" accept="image/*" style="margin-top:6px;">
                    </div>
                </div>

                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="rpSaveBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="rpResetBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>

            <script>
                (function () {
                    const qs = (id) => document.getElementById(id);
                    const els = {
                        offer: qs('rpOfferTitle'),
                        plotsWrap: qs('rpPlots'),
                        amenWrap: qs('rpAmenitiesWrap'),
                        amenInput: qs('rpAmenityInput'),
                        amenAdd: qs('rpAmenityAdd'),
                        footer: qs('rpFooterNote'),
                        cta: qs('rpCtaBar'),
                        ctaLink: qs('rpCtaLink'),
                        mapPrev: qs('rpMapPrev'),
                        mapInput: qs('rpMapInput')
                    };

                    const defaults = {
                        offerTitle: 'বেছে নিন আপনার পছন্দের প্লট',
                        plots: [
                            { size: '৮ কাঠা', cat: 'প্রিমিয়াম প্লট', cta_text: '', cta_link: '' },
                            { size: '১০ কাঠা', cat: 'ডিলাক্স প্লট', cta_text: '', cta_link: '' },
                            { size: '৩০ কাঠা', cat: 'এক্সিকিউটিভ প্লট', cta_text: '', cta_link: '' },
                            { size: '২০ কাঠা', cat: 'কর্পোরেট প্লট', cta_text: '', cta_link: '' }
                        ],
                        amenities: ['ক্লাব হাউজ', 'জিম', 'মসজিদ', 'শপিং এরিয়া'],
                        footerNote: '<p>সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা! এখানে আছে আধুনিক রাস্তাঘাট, বিদ্যুৎ, পানি, গ্যাস, ও নিরাপত্তার নিশ্চয়তা।</p><p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>',
                        ctaBar: '📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার',
                        ctaLink: '#contact',
                        mapImage: 'assets/images/realstate3.PNG'
                    };

                    let currentData = { ...defaults };
                    let roadmapSettings = { title: '', subtitle: '' };
                    const sectionTitleInput = document.getElementById('roadmap-section-title');
                    const sectionSubtitleInput = document.getElementById('roadmap-section-subtitle');

                    // Load roadmap section settings
                    async function loadRoadmapSettings() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=roadmap');
                            if (response.ok) {
                                const data = await response.json();
                                if (data) {
                                    roadmapSettings = { title: data.title || '', subtitle: data.subtitle || '' };
                                    if (sectionTitleInput) sectionTitleInput.value = roadmapSettings.title;
                                    if (sectionSubtitleInput) sectionSubtitleInput.value = roadmapSettings.subtitle;
                                }
                            }
                        } catch (error) {
                            console.error('Error loading roadmap settings:', error);
                        }
                    }

                    // Save roadmap section settings
                    async function saveRoadmapSettings() {
                        try {
                            // First get current roadmap data to preserve it
                            const currentResponse = await fetch('/api/project-sections?section_key=roadmap');
                            let extraData = {};
                            if (currentResponse.ok) {
                                const currentSectionData = await currentResponse.json();
                                if (currentSectionData && currentSectionData.extra_data) {
                                    extraData = typeof currentSectionData.extra_data === 'string'
                                        ? JSON.parse(currentSectionData.extra_data)
                                        : currentSectionData.extra_data;
                                }
                            }

                            const formData = new FormData();
                            formData.append('section_key', 'roadmap');
                            formData.append('title', sectionTitleInput ? sectionTitleInput.value : '');
                            formData.append('subtitle', sectionSubtitleInput ? sectionSubtitleInput.value : '');
                            formData.append('extra_data', JSON.stringify(extraData));
                            formData.append('is_active', '1');

                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            });
                            if (!response.ok) throw new Error('Failed to save settings');
                        } catch (error) {
                            console.error('Error saving roadmap settings:', error);
                            throw error;
                        }
                    }

                    // Load data from database
                    async function loadFromDatabase() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=roadmap');
                            if (response.ok) {
                                const data = await response.json();
                                if (data && data.extra_data) {
                                    currentData = { ...defaults, ...data.extra_data };
                                    // Ensure ctaLink is set
                                    if (!currentData.ctaLink) {
                                        currentData.ctaLink = data.extra_data.ctaLink || data.extra_data.cta_link || defaults.ctaLink;
                                    }
                                    if (data.image_url) {
                                        currentData.mapImage = data.image_url;
                                    }
                                }
                            }
                        } catch (error) {
                            console.error('Error loading roadmap data:', error);
                        }
                        renderAll();
                    }

                    function renderPlots(plots) {
                        els.plotsWrap.innerHTML = '';
                        // Ensure plots array exists and has 4 items with all required fields
                        if (!plots || !Array.isArray(plots)) plots = [];
                        const ensure = (i) => {
                            if (!plots[i]) plots[i] = {};
                            // Ensure all required fields exist
                            plots[i].size = plots[i].size || '';
                            plots[i].cat = plots[i].cat || '';
                            plots[i].cta_text = plots[i].cta_text || plots[i].ctaText || '';
                            plots[i].cta_link = plots[i].cta_link || plots[i].ctaLink || '';
                            return plots[i];
                        };
                        for (let i = 0; i < 4; i++) {
                            const p = ensure(i);
                            const html = `<div class="plot-item" style="padding:14px;">
                                <div style="margin-bottom:10px;">
                                    <label style="font-size:12px; font-weight:600; color:#0D5534; margin-bottom:4px; display:block;">প্লট ${i + 1}</label>
                                    <div class="grid-2" style="gap:8px;">
                                        <input type="text" data-idx="${i}" data-field="size" placeholder="আকার (যেমন: ৮ কাঠা)" value="${p.size || ''}">
                                        <input type="text" data-idx="${i}" data-field="cat" placeholder="ক্যাটাগরি (যেমন: প্রিমিয়াম প্লট)" value="${p.cat || ''}">
                                    </div>
                                </div>
                                <div style="padding:10px; background:#0D5534; border-radius:8px; margin-top:8px;">
                                    <label style="color:white; font-size:11px; font-weight:600; margin-bottom:6px; display:block;">🔘 CTA বাটন অপশন</label>
                                    <input type="text" data-idx="${i}" data-field="cta_text" placeholder="CTA বাটন টেক্সট" value="${p.cta_text || ''}" style="background:white; margin-bottom:6px; width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; font-size:13px; box-sizing:border-box;">
                                    <input type="text" data-idx="${i}" data-field="cta_link" placeholder="CTA বাটন লিংক (#contact বা URL)" value="${p.cta_link || ''}" style="background:white; width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; font-size:13px; box-sizing:border-box;">
                                </div>
                            </div>`;
                            const wrap = document.createElement('div');
                            wrap.innerHTML = html;
                            els.plotsWrap.appendChild(wrap.firstChild);
                        }
                        els.plotsWrap.querySelectorAll('input[data-field]').forEach(inp => {
                            ['input', 'change'].forEach(ev => inp.addEventListener(ev, () => {
                                const idx = parseInt(inp.getAttribute('data-idx'), 10) || 0;
                                const field = inp.getAttribute('data-field');
                                if (!currentData.plots[idx]) currentData.plots[idx] = {};
                                currentData.plots[idx][field] = inp.value;
                            }));
                        });
                    }

                    function renderAmenities(list) {
                        els.amenWrap.innerHTML = '';
                        (list || []).forEach((txt, i) => {
                            const pill = document.createElement('span');
                            pill.className = 'amenity-pill';
                            pill.innerHTML = `<span>${txt}</span><button type="button" data-i="${i}">✕</button>`;
                            pill.querySelector('button').addEventListener('click', () => {
                                currentData.amenities.splice(i, 1);
                                renderAmenities(currentData.amenities);
                            });
                            els.amenWrap.appendChild(pill);
                        });
                    }

                    function renderAll() {
                        // Ensure plots array is properly initialized with CTA fields
                        if (!currentData.plots || !Array.isArray(currentData.plots)) {
                            currentData.plots = [];
                        }
                        // Ensure all 4 plots exist with all required fields
                        for (let i = 0; i < 4; i++) {
                            if (!currentData.plots[i]) currentData.plots[i] = {};
                            currentData.plots[i].size = currentData.plots[i].size || '';
                            currentData.plots[i].cat = currentData.plots[i].cat || '';
                            currentData.plots[i].cta_text = currentData.plots[i].cta_text || currentData.plots[i].ctaText || '';
                            currentData.plots[i].cta_link = currentData.plots[i].cta_link || currentData.plots[i].ctaLink || '';
                        }

                        els.offer.value = currentData.offerTitle || '';
                        renderPlots(currentData.plots || defaults.plots);
                        renderAmenities(currentData.amenities || defaults.amenities);
                        els.footer.value = currentData.footerNote || '';
                        els.cta.value = currentData.ctaBar || '';
                        els.ctaLink.value = currentData.ctaLink || defaults.ctaLink || '#contact';
                        if (els.mapPrev && currentData.mapImage) els.mapPrev.src = currentData.mapImage;
                    }

                    // Wire inputs
                    els.offer.addEventListener('input', () => { currentData.offerTitle = els.offer.value; });
                    els.footer.addEventListener('input', () => { currentData.footerNote = els.footer.value; });
                    els.cta.addEventListener('input', () => { currentData.ctaBar = els.cta.value; });
                    els.ctaLink.addEventListener('input', () => { currentData.ctaLink = els.ctaLink.value; });
                    els.amenAdd.addEventListener('click', () => {
                        const val = (els.amenInput.value || '').trim();
                        if (!val) return;
                        currentData.amenities.push(val);
                        els.amenInput.value = '';
                        renderAmenities(currentData.amenities);
                    });

                    // Save button - send to database
                    document.getElementById('rpSaveBtn').addEventListener('click', async () => {
                        try {
                            // Get current title and subtitle from settings inputs
                            const sectionTitle = sectionTitleInput ? sectionTitleInput.value : '';
                            const sectionSubtitle = sectionSubtitleInput ? sectionSubtitleInput.value : '';

                            const formData = new FormData();
                            formData.append('section_key', 'roadmap');
                            formData.append('title', sectionTitle); // Use section title from input
                            formData.append('subtitle', sectionSubtitle); // Use section subtitle from input
                            formData.append('extra_data', JSON.stringify({
                                offerTitle: currentData.offerTitle,
                                plots: currentData.plots,
                                amenities: currentData.amenities,
                                footerNote: currentData.footerNote,
                                ctaBar: currentData.ctaBar,
                                ctaLink: currentData.ctaLink
                            }));
                            formData.append('is_active', '1');

                            // Handle map image upload
                            if (els.mapInput.files && els.mapInput.files[0]) {
                                formData.append('image', els.mapInput.files[0]);
                            }

                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            });

                            const result = await response.json();

                            if (result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification('রোডম্যাপ সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                                } else {
                                    alert('রোডম্যাপ সফলভাবে সংরক্ষিত হয়েছে!');
                                }
                                await loadFromDatabase();
                            } else {
                                console.error('Save failed:', result);
                                const errorMsg = result.message || 'Save failed';
                                if (result.errors) {
                                    console.error('Validation errors:', result.errors);
                                }
                                throw new Error(errorMsg);
                            }
                        } catch (error) {
                            console.error('Error saving roadmap:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে: ' + error.message, 'error');
                            } else {
                                alert('সংরক্ষণ করতে ব্যর্থ হয়েছে: ' + error.message);
                            }
                        }
                    });

                    document.getElementById('rpResetBtn').addEventListener('click', () => {
                        currentData = { ...defaults };
                        renderAll();
                    });

                    // Save roadmap section settings
                    document.getElementById('saveRoadmapSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveRoadmapSettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await saveRoadmapSettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Handle map image preview
                    els.mapInput.addEventListener('change', (e) => {
                        const f = e.target.files && e.target.files[0];
                        if (!f) return;
                        const url = URL.createObjectURL(f);
                        if (els.mapPrev) {
                            els.mapPrev.src = url;
                            currentData.mapImage = url;
                        }
                    });

                    // Initialize
                    loadRoadmapSettings();
                    loadFromDatabase();
                })();
            </script>
        </div>
    </div>

    <div id="home-info-section" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>বিস্তারিত তথ্য সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">সেকশনের কন্টেন্ট এবং ফ্লোটিং কার্ডের তথ্য ম্যানেজ করুন।</p>
            <style>
                #home-info-section .form-grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 16px;
                    align-items: start;
                }

                #home-info-section .card {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 16px;
                    background: #fafafa;
                    margin-bottom: 20px;
                }

                #home-info-section .card h3 {
                    font-size: 16px;
                    margin-bottom: 12px;
                    color: #0f172a;
                    border-bottom: 1px solid #e5e7eb;
                    padding-bottom: 8px;
                }

                #home-info-section input[type="text"],
                #home-info-section textarea {
                    width: 100%;
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    border: 1px solid #d1d5db;
                    box-sizing: border-box;
                    margin-bottom: 10px;
                }

                #home-info-section textarea {
                    min-height: 120px;
                    height: auto;
                    resize: vertical;
                }

                #home-info-section .img-prev {
                    border: 1px dashed #cbd5e1;
                    border-radius: 10px;
                    overflow: hidden;
                    aspect-ratio: 1/1;
                    background: #f8fafc;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-top: 10px;
                }

                #home-info-section .img-prev img {
                    max-width: 100%;
                    max-height: 100%;
                    display: block;
                }
            </style>

            <div class="form-grid">
                <div class="left-col">
                    <div class="card">
                        <h3>প্রধান কন্টেন্ট</h3>
                        <label>শিরোনাম (Title)</label>
                        <input type="text" id="infoTitle" placeholder="আধুনিক নাগরিক জীবনের সেরা ঠিকানা">

                        <label>বিস্তারিত বিবরণ (Content - HTML সমর্থিত)</label>
                        <textarea id="infoContent" placeholder="বিস্তারিত বিবরণ লিখুন..."></textarea>
                    </div>

                    <div class="card">
                        <h3>ছবি সেটিংস</h3>
                        <label>প্রধান ছবি (Square/Portrait Preferred)</label>
                        <input type="file" id="infoImageInput" accept="image/*">
                        <div class="img-prev"><img id="infoImagePrev" src="/assets/images/realstate3.PNG"></div>
                    </div>
                </div>

                <div class="right-col">
                    <div class="card">
                        <h3>ব্যাজ ও বাটন</h3>
                        <label>শুরুতে থাকা ছোট ব্যাজ (Trust Badge)</label>
                        <input type="text" id="infoTrustBadge" placeholder="Trusted by Industry Leaders">

                        <label>বাটন ১ টেক্সট</label>
                        <input type="text" id="infoBtn1" placeholder="আরও বিস্তারিত">

                        <label>বাটন ২ টেক্সট</label>
                        <input type="text" id="infoBtn2" placeholder="প্রকল্পসমূহ">
                    </div>

                    <div class="card">
                        <h3>ফ্লোটিং কার্ডস (Floating Cards)</h3>
                        <label>কার্ড ১ (Analytics) - টাইটেল</label>
                        <input type="text" id="infoCard1Label" placeholder="Growth Analytics">
                        <label>কার্ড ১ - মান/ভ্যালু</label>
                        <input type="text" id="infoCard1Value" placeholder="+124% leads">

                        <label>কার্ড ২ (Heart) - টেক্সট</label>
                        <input type="text" id="infoCard2Label" placeholder="Customer Choice">

                        <label>কার্ড ৩ (Bolt) - টেক্সট</label>
                        <input type="text" id="infoCard3Label" placeholder="Unlock Modern Living">
                    </div>
                </div>
            </div>

            <div style="margin-top:14px; padding: 0 16px 16px;">
                <button id="infoSaveBtn" class="btn btn-primary" type="button" style="width:100%; padding: 14px;">সব
                    পরিবর্তন সেভ করুন</button>
            </div>

            <script>
                (function () {
                    async function loadInfo() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=info_section');
                            if (response.ok) {
                                const data = await response.json();
                                if (data) {
                                    document.getElementById('infoTitle').value = data.title || '';
                                    document.getElementById('infoContent').value = data.content || '';
                                    if (data.image_url) { document.getElementById('infoImagePrev').src = data.image_url; }

                                    const extra = data.extra_data || {};
                                    document.getElementById('infoTrustBadge').value = extra.trust_badge || 'Trusted by Industry Leaders';
                                    document.getElementById('infoBtn1').value = extra.btn1_text || 'আরও বিস্তারিত';
                                    document.getElementById('infoBtn2').value = extra.btn2_text || 'প্রকল্পসমূহ';
                                    document.getElementById('infoCard1Label').value = extra.card1_label || 'Growth Analytics';
                                    document.getElementById('infoCard1Value').value = extra.card1_value || '+124% leads';
                                    document.getElementById('infoCard2Label').value = extra.card2_label || 'Customer Choice';
                                    document.getElementById('infoCard3Label').value = extra.card3_label || 'Unlock Modern Living';
                                }
                            }
                        } catch (error) {
                            console.error('Error loading info section:', error);
                        }
                    }

                    document.getElementById('infoSaveBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('infoSaveBtn');
                        btn.disabled = true;
                        btn.textContent = 'সংরক্ষণ করা হচ্ছে...';

                        const formData = new FormData();
                        formData.append('section_key', 'info_section');
                        formData.append('title', document.getElementById('infoTitle').value);
                        formData.append('content', document.getElementById('infoContent').value);
                        formData.append('is_active', '1');

                        const extraData = {
                            trust_badge: document.getElementById('infoTrustBadge').value,
                            btn1_text: document.getElementById('infoBtn1').value,
                            btn2_text: document.getElementById('infoBtn2').value,
                            card1_label: document.getElementById('infoCard1Label').value,
                            card1_value: document.getElementById('infoCard1Value').value,
                            card2_label: document.getElementById('infoCard2Label').value,
                            card3_label: document.getElementById('infoCard3Label').value,
                        };
                        formData.append('extra_data', JSON.stringify(extraData));

                        const file = document.getElementById('infoImageInput').files[0];
                        if (file) { formData.append('image', file); }

                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: formData
                            });

                            const result = await response.json();
                            if (result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification('তথ্য সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                                } else {
                                    alert('তথ্য সফলভাবে সংরক্ষিত হয়েছে!');
                                }
                                loadInfo();
                            }
                        } catch (error) {
                            console.error('Error saving info section:', error);
                        } finally {
                            btn.disabled = false;
                            btn.textContent = 'সব পরিবর্তন সেভ করুন';
                        }
                    });

                    document.getElementById('infoImageInput').addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        if (file) { document.getElementById('infoImagePrev').src = URL.createObjectURL(file); }
                    });

                    loadInfo();
                })();
            </script>
        </div>
    </div>

    <div id="home-discount-offers" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>ডিসকাউন্ট অফার সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের ডার্ক থিম অফার কার্ডগুলো ম্যানেজ করুন।</p>

            <!-- Section Header Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন শিরোনাম ও সাবটাইটেল</h3>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                        <input type="text" id="offerSectionTitle" placeholder="Exclusive Offers & Discounts"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল
                            (Subtitle)</label>
                        <input type="text" id="offerSectionSubtitle"
                            placeholder="Get the best deals on your dream property..."
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                </div>
                <button type="button" id="saveOfferSettingsBtn" class="btn btn-primary" style="margin-top:16px;">সেটিংস
                    সেভ করুন</button>
            </div>

            <div id="offersList"
                style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:20px; margin-bottom: 30px;">
            </div>

            <div style="padding:24px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 id="offerFormTitle" style="margin:0 0 16px 0; font-size:18px; font-weight:700;">নতুন অফার কার্ড
                    যোগ করুন</h3>
                <form id="offerForm" enctype="multipart/form-data">
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:16px;">
                        <div class="form-group">
                            <label>কার্ডের নাম (Title) *</label>
                            <input type="text" id="offerTitle" placeholder="যেমন: ৪% ডিসকাউন্ট" required
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <label>ব্যাজ টেক্সট (Badge - যেমন: Limited Time)</label>
                            <input type="text" id="offerBadge" placeholder="যেমন: ৪% OFF"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <label>কার্ড মেট্রিক (Metric - যেমন: 10X, 40%)</label>
                            <input type="text" id="offerMetric" placeholder="যেমন: 10X"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label>বিস্তারিত বিবরণ (Description)</label>
                            <textarea id="offerDescription" rows="3" placeholder="অফার সম্পর্কে বিস্তারিত লিখুন..."
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>লিংক (Booking Link)</label>
                            <input type="text" id="offerLink" placeholder="#contact"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <label>ক্রম (Order)</label>
                            <input type="number" id="offerOrder" value="0"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <label>ছবি/আকর্ষনীয় আইকন</label>
                            <input type="file" id="offerImage" accept="image/*"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                            <div id="offerImgPrevWrap" style="margin-top:10px; display:none;">
                                <img id="offerImgPreview"
                                    style="max-width:100px; border-radius:8px; border:1px solid #ddd;">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; gap:12px; margin-top:20px;">
                        <button type="button" id="submitOfferBtn" class="btn btn-primary"
                            style="padding:12px 24px;">কার্ডটি সেভ করুন</button>
                        <button type="button" id="resetOfferBtn" class="btn btn-secondary"
                            style="padding:12px 24px;">রিসেট</button>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let offers = [];
                    let editingOfferId = null;

                    // Load Section Info
                    async function loadSectionSettings() {
                        const res = await fetch('/api/project-sections?section_key=discount_offers');
                        if (res.ok) {
                            const data = await res.json();
                            if (data) {
                                document.getElementById('offerSectionTitle').value = data.title || '';
                                document.getElementById('offerSectionSubtitle').value = data.subtitle || '';
                            }
                        }
                    }

                    document.getElementById('saveOfferSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveOfferSettingsBtn');
                        btn.disabled = true;
                        const fd = new FormData();
                        fd.append('section_key', 'discount_offers');
                        fd.append('title', document.getElementById('offerSectionTitle').value);
                        fd.append('subtitle', document.getElementById('offerSectionSubtitle').value);
                        fd.append('is_active', '1');

                        const res = await fetch('/admin/project-sections', {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                            body: fd
                        });
                        if (res.ok) showNotification('সেকশন সেটিংস সংরক্ষিত হয়েছে!', 'success');
                        btn.disabled = false;
                    });

                    // Manage Cards
                    async function loadOffers() {
                        const res = await fetch('/admin/discount-offers');
                        if (res.ok) {
                            offers = await res.json();
                            renderOffers();
                        }
                    }

                    function renderOffers() {
                        const wrap = document.getElementById('offersList');
                        if (offers.length === 0) {
                            wrap.innerHTML = '<p style="grid-column: 1/-1; text-align:center; padding: 40px; color: #94a3b8; border: 1px solid #e5e7eb; border-radius: 12px;">কোনো ডিসকাউন্ট কার্ড নেই।</p>';
                            return;
                        }
                        wrap.innerHTML = offers.map(o => `
                            <div class="card" style="padding:16px; position:relative; display:flex; gap:12px; align-items:flex-start; background: #fff; border: 1px solid #e5e7eb; border-radius: 16px;">
                                ${o.image_url ? `<img src="${o.image_url}" style="width:60px; height:60px; object-fit:contain; border-radius:8px;">` : '<div style="width:60px; height:60px; background:#f1f5f9; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:24px;">🎁</div>'}
                                <div style="flex:1;">
                                    <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                                        <h4 style="margin:0; font-size:16px;">${o.title}</h4>
                                        <span style="font-size:11px; background:#f1f5f9; padding:2px 8px; border-radius:50px;">Order: ${o.order}</span>
                                    </div>
                                    <p style="margin:4px 0; font-size:13px; color:#64748b; line-height:1.4;">${o.description || 'বিবরণ নেই'}</p>
                                    <div style="display:flex; gap:8px; margin-top:10px;">
                                        <button onclick="editOffer(${o.id})" class="btn btn-sm btn-primary">Edit</button>
                                        <button onclick="deleteOffer(${o.id})" class="btn btn-sm btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        `).join('');
                    }

                    document.getElementById('offerImage').addEventListener('change', e => {
                        const file = e.target.files[0];
                        if (file) {
                            const url = URL.createObjectURL(file);
                            document.getElementById('offerImgPreview').src = url;
                            document.getElementById('offerImgPrevWrap').style.display = 'block';
                        }
                    });

                    document.getElementById('submitOfferBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('submitOfferBtn');
                        btn.disabled = true;

                        const fd = new FormData();
                        fd.append('title', document.getElementById('offerTitle').value);
                        fd.append('badge', document.getElementById('offerBadge').value);
                        fd.append('metric', document.getElementById('offerMetric').value);
                        fd.append('description', document.getElementById('offerDescription').value);
                        fd.append('link', document.getElementById('offerLink').value);
                        fd.append('order', document.getElementById('offerOrder').value);

                        const file = document.getElementById('offerImage').files[0];
                        if (file) fd.append('image', file);

                        const url = editingOfferId ? `/admin/discount-offers/${editingOfferId}` : '/admin/discount-offers';
                        if (editingOfferId) fd.append('_method', 'PUT');

                        try {
                            const res = await fetch(url, {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: fd
                            });
                            if (res.ok) {
                                showNotification(editingOfferId ? 'আপডেট হয়েছে!' : 'যোগ করা হয়েছে!', 'success');
                                resetOfferForm();
                                loadOffers();
                            }
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    window.editOffer = (id) => {
                        const o = offers.find(x => x.id === id);
                        if (!o) return;
                        editingOfferId = id;
                        document.getElementById('offerFormTitle').textContent = 'অফার কার্ড আপডেট করুন';
                        document.getElementById('offerTitle').value = o.title;
                        document.getElementById('offerBadge').value = o.badge || '';
                        document.getElementById('offerMetric').value = o.metric || '';
                        document.getElementById('offerDescription').value = o.description || '';
                        document.getElementById('offerLink').value = o.link || '';
                        document.getElementById('offerOrder').value = o.order;
                        if (o.image_url) {
                            document.getElementById('offerImgPreview').src = o.image_url;
                            document.getElementById('offerImgPrevWrap').style.display = 'block';
                        }
                        document.getElementById('submitOfferBtn').textContent = 'আপডেট করুন';
                        document.getElementById('offerForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    };

                    window.deleteOffer = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        const res = await fetch(`/admin/discount-offers/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                        });
                        if (res.ok) {
                            showNotification('মুছে ফেলা হয়েছে', 'success');
                            loadOffers();
                        }
                    };

                    function resetOfferForm() {
                        editingOfferId = null;
                        document.getElementById('offerForm').reset();
                        document.getElementById('offerFormTitle').textContent = 'নতুন অফার কার্ড যোগ করুন';
                        document.getElementById('offerMetric').value = '';
                        document.getElementById('submitOfferBtn').textContent = 'কার্ডটি সেভ করুন';
                        document.getElementById('offerImgPrevWrap').style.display = 'none';
                    }

                    document.getElementById('resetOfferBtn').addEventListener('click', resetOfferForm);

                    loadSectionSettings();
                    loadOffers();
                })();
            </script>
        </div>
    </div>

    <!-- Visit Booking Section (Escape to Fun) -->
    <div id="home-visit-booking" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>ভিজিট বুকিং সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">ল্যান্ডিং পেজের "ESCAPE TO REALITY" সেকশন ম্যানেজ করুন।</p>

            <div style="margin-top:20px; display:grid; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                    <input type="text" id="visitTitle" placeholder="ESCAPE TO REALITY"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                </div>
                <div>
                    <label style="display:block; margin-bottom:4px; font-weight:500;">বিস্তারিত তথ্য (Content)</label>
                    <textarea id="visitContent" rows="3" placeholder="সেকশনের বর্ণনা..."
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                </div>
                <div>
                    <label style="display:block; margin-bottom:4px; font-weight:500;">ব্যাকগ্রাউন্ড ছবি</label>
                    <input type="file" id="visitImage" accept="image/*"
                        style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                    <div id="visitImgPrevWrap" style="margin-top:10px; display:none;">
                        <img id="visitImgPreview" style="max-width:300px; border-radius:8px;">
                    </div>
                </div>

                <div style="border: 1px solid #e5e7eb; padding: 16px; border-radius: 12px; background: #fff;">
                    <h3 style="margin-top:0; font-size:16px;">ফর্ম ফিল্ড সেটিংস</h3>
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">লোকেশন লেবেল</label>
                            <input type="text" id="visitLocLabel" placeholder="Project Location"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">লোকেশন প্লেসহোল্ডার</label>
                            <input type="text" id="visitLocPlace" placeholder="Which project?"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">তারিখ লেবেল</label>
                            <input type="text" id="visitDateLabel" placeholder="Visit Date"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">গেস্ট লেবেল</label>
                            <input type="text" id="visitGuestLabel" placeholder="Guests"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">ফোন লেবেল</label>
                            <input type="text" id="visitPhoneLabel" placeholder="Phone Number"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                        <div>
                            <label style="display:block; font-size:13px; font-weight:500;">ফোন প্লেসহোল্ডার</label>
                            <input type="text" id="visitPhonePlace" placeholder="Your phone"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:6px;">
                        </div>
                    </div>
                </div>
                <div style="display:flex; gap:10px;">
                    <button type="button" id="visitSaveBtn" class="btn btn-primary">সেটিংস সেভ করুন</button>
                </div>
            </div>

            <script>
                (function () {
                    async function loadVisitSettings() {
                        const res = await fetch('/api/project-sections?section_key=visit_booking');
                        const data = await res.json();
                        const s = Array.isArray(data) ? data.find(x => x.section_key === 'visit_booking') : data;
                        if (s) {
                            document.getElementById('visitTitle').value = s.title || '';
                            document.getElementById('visitContent').value = s.content || '';
                            if (s.image_url) {
                                document.getElementById('visitImgPreview').src = s.image_url;
                                document.getElementById('visitImgPrevWrap').style.display = 'block';
                            }

                            // Load extra data
                            const extra = typeof s.extra_data === 'string' ? JSON.parse(s.extra_data) : s.extra_data;
                            if (extra) {
                                document.getElementById('visitLocLabel').value = extra.loc_label || '';
                                document.getElementById('visitLocPlace').value = extra.loc_place || '';
                                document.getElementById('visitDateLabel').value = extra.date_label || '';
                                document.getElementById('visitGuestLabel').value = extra.guest_label || '';
                                document.getElementById('visitPhoneLabel').value = extra.phone_label || '';
                                document.getElementById('visitPhonePlace').value = extra.phone_place || '';
                            }
                        }
                    }

                    document.getElementById('visitSaveBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;

                        const extraData = {
                            loc_label: document.getElementById('visitLocLabel').value,
                            loc_place: document.getElementById('visitLocPlace').value,
                            date_label: document.getElementById('visitDateLabel').value,
                            guest_label: document.getElementById('visitGuestLabel').value,
                            phone_label: document.getElementById('visitPhoneLabel').value,
                            phone_place: document.getElementById('visitPhonePlace').value,
                        };

                        const fd = new FormData();
                        fd.append('section_key', 'visit_booking');
                        fd.append('title', document.getElementById('visitTitle').value);
                        fd.append('content', document.getElementById('visitContent').value);
                        fd.append('extra_data', JSON.stringify(extraData));

                        const file = document.getElementById('visitImage').files[0];
                        if (file) fd.append('image', file);

                        try {
                            const res = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: fd
                            });
                            if (res.ok) {
                                showNotification('সেটিংস সেভ হয়েছে!', 'success');
                                loadVisitSettings();
                            }
                        } catch (e) {
                            console.error(e);
                            showNotification('সেভ করতে সমস্যা হয়েছে', 'error');
                        }
                        btn.disabled = false;
                    });

                    // Image preview
                    document.getElementById('visitImage').addEventListener('change', function () {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById('visitImgPreview').src = e.target.result;
                                document.getElementById('visitImgPrevWrap').style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    loadVisitSettings();
                })();
            </script>
        </div>
    </div>

    <!-- Partners Management Section -->
    <div id="home-partners" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>পার্টনারসমূহ ম্যানেজমেন্ট</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের পার্টনার লোগো সেকশন ম্যানেজ করুন।</p>

            <!-- Section Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন সেটিংস</h3>
                <div style="display:grid; gap:12px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                        <input type="text" id="partnerSectionTitle" placeholder="আমাদের পার্টনারসমূহ"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>

                    <div style="display:flex; gap:10px;">
                        <button type="button" id="savePartnerSettingsBtn" class="btn btn-primary">সেটিংস সেভ
                            করুন</button>
                    </div>
                </div>
            </div>

            <!-- Partners List -->
            <div id="partnersList"
                style="display:grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap:16px; margin-top:20px;">
            </div>

            <!-- Add/Edit Partner Form -->
            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 id="partnerFormTitle" style="margin:0 0 16px 0; font-size:16px;">নতুন পার্টনার যোগ করুন</h3>
                <form id="partnerForm" enctype="multipart/form-data">
                    <div style="display:grid; gap:12px;">
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">পার্টনারের নাম</label>
                                <input type="text" id="partnerName" placeholder="পার্টনারের নাম"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">টাইপ (যেমন: Technology
                                    Partner)</label>
                                <input type="text" id="partnerType" placeholder="টাইপ"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">ওয়েবসাইট লিংক
                                (URL)</label>
                            <input type="url" id="partnerUrl" placeholder="https://example.com"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">অর্ডার</label>
                                <input type="number" id="partnerOrder" value="0"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">লোগো</label>
                                <input type="file" id="partnerLogo" accept="image/*"
                                    style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                                <div id="partnerImgPrevWrap" style="margin-top:10px; display:none;">
                                    <img id="partnerImgPreview" style="max-height:60px; border-radius:4px;">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label style="display:flex; align-items:center; gap:8px; cursor:pointer; font-weight:500;">
                                <input type="checkbox" id="partnerIsActive" checked style="width:18px; height:18px; cursor:pointer;">
                                <span>সক্রিয় (Frontend-এ দেখাবে)</span>
                            </label>
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="submitPartnerBtn" class="btn btn-primary">পার্টনার সেভ
                                করুন</button>
                            <button type="button" id="resetPartnerBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let partners = [];
                    let editingPartnerId = null;

                    async function loadPartnerSettings() {
                        const res = await fetch('/api/project-sections?section_key=partners');
                        const data = await res.json();
                        const s = Array.isArray(data) ? data.find(x => x.section_key === 'partners') : data;
                        if (s) {
                            document.getElementById('partnerSectionTitle').value = s.title || '';

                        }
                    }

                    async function loadPartners() {
                        const res = await fetch('/admin/partners');
                        partners = await res.json();
                        renderPartners();
                    }

                    function renderPartners() {
                        const container = document.getElementById('partnersList');
                        container.innerHTML = partners.map(p => `
                            <div class="card-editor" style="padding:16px; border:1px solid #e5e7eb; border-radius:12px; background:#fff; position:relative;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div style="width:60px; height:60px; background:#f1f5f9; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                        ${p.logo_url ? `<img src="${p.logo_url}" style="width:100%; height:100%; object-fit:contain;">` : `<i class="fas fa-handshake" style="color:#94a3b8;"></i>`}
                                    </div>
                                    <div>
                                        <h4 style="margin:0; font-size:15px;">${p.name}</h4>
                                        <p style="margin:2px 0 0 0; font-size:12px; color:#64748b;">${p.type || 'No Type'}</p>
                                    </div>
                                </div>
                                <div style="margin-top:12px; display:flex; gap:8px;">
                                    <button onclick="editPartner(${p.id})" class="btn btn-sm btn-outline-primary" style="padding:4px 10px; font-size:12px;">এডিট</button>
                                    <button onclick="deletePartner(${p.id})" class="btn btn-sm btn-outline-danger" style="padding:4px 10px; font-size:12px;">মুছুন</button>
                                </div>
                                <div style="position:absolute; top:12px; right:12px; font-size:11px; color:#94a3b8;">#${p.order}</div>
                            </div>
                        `).join('');
                    }

                    document.getElementById('savePartnerSettingsBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        try {
                            const res = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_key: 'partners',
                                    title: document.getElementById('partnerSectionTitle').value,
                                    subtitle: '',
                                    is_active: true
                                })
                            });
                            if (res.ok) showNotification('সেটিংস সেভ হয়েছে!', 'success');
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    document.getElementById('submitPartnerBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;

                        const fd = new FormData();
                        fd.append('name', document.getElementById('partnerName').value);
                        fd.append('type', document.getElementById('partnerType').value);
                        fd.append('website_url', document.getElementById('partnerUrl').value);
                        fd.append('order', document.getElementById('partnerOrder').value);
                        fd.append('is_active', document.getElementById('partnerIsActive').checked ? '1' : '0');

                        const file = document.getElementById('partnerLogo').files[0];
                        if (file) fd.append('logo', file);

                        const url = editingPartnerId ? `/admin/partners/${editingPartnerId}` : '/admin/partners';
                        if (editingPartnerId) fd.append('_method', 'PUT');

                        try {
                            const res = await fetch(url, {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: fd
                            });
                            if (res.ok) {
                                showNotification(editingPartnerId ? 'আপডেট হয়েছে!' : 'যোগ করা হয়েছে!', 'success');
                                resetPartnerForm();
                                loadPartners();
                            } else {
                                const err = await res.json();
                                showNotification(err.message || 'সমস্যা হয়েছে', 'error');
                            }
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    window.editPartner = (id) => {
                        const p = partners.find(x => x.id === id);
                        if (!p) return;
                        editingPartnerId = id;
                        document.getElementById('partnerFormTitle').textContent = 'পার্টনার এডিট করুন';
                        document.getElementById('partnerName').value = p.name;
                        document.getElementById('partnerType').value = p.type || '';
                        document.getElementById('partnerUrl').value = p.website_url || '';
                        document.getElementById('partnerOrder').value = p.order;
                        document.getElementById('partnerIsActive').checked = p.is_active ? true : false;
                        if (p.logo_url) {
                            document.getElementById('partnerImgPreview').src = p.logo_url;
                            document.getElementById('partnerImgPrevWrap').style.display = 'block';
                        }
                        document.getElementById('submitPartnerBtn').textContent = 'আপডেট করুন';
                        document.getElementById('partnerForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    };

                    window.deletePartner = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        const res = await fetch(`/admin/partners/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                        });
                        if (res.ok) {
                            showNotification('মুছে ফেলা হয়েছে', 'success');
                            loadPartners();
                        }
                    };

                    function resetPartnerForm() {
                        editingPartnerId = null;
                        document.getElementById('partnerForm').reset();
                        document.getElementById('partnerFormTitle').textContent = 'নতুন পার্টনার যোগ করুন';
                        document.getElementById('submitPartnerBtn').textContent = 'পার্টনার সেভ করুন';
                        document.getElementById('partnerIsActive').checked = true;
                        document.getElementById('partnerImgPrevWrap').style.display = 'none';
                    }

                    document.getElementById('resetPartnerBtn').addEventListener('click', resetPartnerForm);

                    // Image preview
                    document.getElementById('partnerLogo').addEventListener('change', function () {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById('partnerImgPreview').src = e.target.result;
                                document.getElementById('partnerImgPrevWrap').style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    loadPartnerSettings();
                    loadPartners();
                })();
            </script>
        </div>
    </div>

    <!-- Why Choose Management Section -->
    <div id="home-why-choose" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>"কেন জলছায়া" ম্যানেজমেন্ট</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের "কেন জলছায়া" সেকশন ম্যানেজ করুন।</p>

            <!-- Section Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন সেটিংস</h3>
                <div style="display:grid; gap:12px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                        <input type="text" id="whySectionTitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল (Subtitle)</label>
                        <input type="text" id="whySectionSubtitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" id="saveWhySettingsBtn" class="btn btn-primary">সেটিংস সেভ করুন</button>
                    </div>
                </div>
            </div>

            <!-- Items List -->
            <div id="whyItemsList"
                style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:16px; margin-top:20px;">
            </div>

            <!-- Add/Edit Form -->
            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 id="whyFormTitle" style="margin:0 0 16px 0; font-size:16px;">নতুন আইটেম যোগ করুন</h3>
                <form id="whyForm">
                    <div style="display:grid; gap:12px;">
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">আইটেম শিরোনাম</label>
                            <input type="text" id="whyTitle" placeholder="যেমন: সেরা লোকেশন"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">বিবরণ</label>
                            <textarea id="whyDescription" rows="3"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">অর্ডার</label>
                                <input type="number" id="whyOrder" value="0"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">আইকন/ছবি
                                    (ঐচ্ছিক)</label>
                                <input type="file" id="whyIcon" accept="image/*"
                                    style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="submitWhyBtn" class="btn btn-primary">সেভ করুন</button>
                            <button type="button" id="resetWhyBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let items = [];
                    let editingId = null;

                    async function loadSettings() {
                        const res = await fetch('/api/project-sections?section_key=why_choose');
                        const data = await res.json();
                        const s = Array.isArray(data) ? data.find(x => x.section_key === 'why_choose') : data;
                        if (s) {
                            document.getElementById('whySectionTitle').value = s.title || '';
                            document.getElementById('whySectionSubtitle').value = s.subtitle || '';
                        }
                    }

                    async function loadItems() {
                        const res = await fetch('/admin/why-choose');
                        items = await res.json();
                        renderItems();
                    }

                    function renderItems() {
                        const container = document.getElementById('whyItemsList');
                        container.innerHTML = items.map(p => `
                            <div class="card-editor" style="padding:16px; border:1px solid #e5e7eb; border-radius:12px; background:#fff;">
                                <div style="display:flex; gap:12px;">
                                    <div style="width:40px; height:40px; background:#f1f5f9; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                        ${p.icon_url ? `<img src="${p.icon_url}" style="width:100%; height:100%; object-fit:contain;">` : `<i class="fas fa-check-circle" style="color:#10b981;"></i>`}
                                    </div>
                                    <div style="flex:1;">
                                        <h4 style="margin:0; font-size:15px;">${p.title}</h4>
                                        <p style="margin:4px 0 0 0; font-size:13px; color:#64748b; line-height:1.4;">${p.description || ''}</p>
                                    </div>
                                </div>
                                <div style="margin-top:12px; display:flex; gap:8px; border-top:1px solid #f1f5f9; padding-top:12px;">
                                    <button onclick="editWhyItem(${p.id})" class="btn btn-sm btn-outline-primary" style="padding:4px 10px; font-size:12px;">এডিট</button>
                                    <button onclick="deleteWhyItem(${p.id})" class="btn btn-sm btn-outline-danger" style="padding:4px 10px; font-size:12px;">মুছুন</button>
                                </div>
                            </div>
                        `).join('');
                    }

                    document.getElementById('saveWhySettingsBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        try {
                            const res = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_key: 'why_choose', title: document.getElementById('whySectionTitle').value, subtitle: document.getElementById('whySectionSubtitle').value, is_active: true })
                            });
                            if (res.ok) showNotification('সেটিংস সেভ হয়েছে!', 'success');
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    document.getElementById('submitWhyBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        const fd = new FormData();
                        fd.append('title', document.getElementById('whyTitle').value);
                        fd.append('description', document.getElementById('whyDescription').value);
                        fd.append('order', document.getElementById('whyOrder').value);
                        const file = document.getElementById('whyIcon').files[0];
                        if (file) fd.append('image', file);

                        const url = editingId ? `/admin/why-choose/${editingId}` : '/admin/why-choose';
                        if (editingId) fd.append('_method', 'PUT');

                        try {
                            const res = await fetch(url, {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: fd
                            });
                            if (res.ok) {
                                showNotification(editingId ? 'আপডেট হয়েছে!' : 'যোগ করা হয়েছে!', 'success');
                                resetWhyForm();
                                loadItems();
                            }
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    window.editWhyItem = (id) => {
                        const p = items.find(x => x.id === id);
                        if (!p) return;
                        editingId = id;
                        document.getElementById('whyFormTitle').textContent = 'আইটেম এডিট করুন';
                        document.getElementById('whyTitle').value = p.title;
                        document.getElementById('whyDescription').value = p.description || '';
                        document.getElementById('whyOrder').value = p.order;
                        document.getElementById('submitWhyBtn').textContent = 'আপডেট করুন';
                        document.getElementById('whyForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    };

                    window.deleteWhyItem = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        const res = await fetch(`/admin/why-choose/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                        });
                        if (res.ok) { showNotification('মুছে ফেলা হয়েছে', 'success'); loadItems(); }
                    };

                    function resetWhyForm() {
                        editingId = null;
                        document.getElementById('whyForm').reset();
                        document.getElementById('whyFormTitle').textContent = 'নতুন আইটেম যোগ করুন';
                        document.getElementById('submitWhyBtn').textContent = 'সেভ করুন';
                    }
                    document.getElementById('resetWhyBtn').addEventListener('click', resetWhyForm);

                    loadSettings();
                    loadItems();
                })();
            </script>
        </div>
    </div>

    <!-- FAQ Management Section -->
    <div id="home-faq" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>FAQ ম্যানেজমেন্ট</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের সাধারণ প্রশ্নাবলী ম্যানেজ করুন।</p>

            <!-- Section Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন সেটিংস</h3>
                <div style="display:grid; gap:12px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                        <input type="text" id="faqSectionTitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল (Subtitle)</label>
                        <input type="text" id="faqSectionSubtitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" id="saveFaqSettingsBtn" class="btn btn-primary">সেটিংস সেভ করুন</button>
                    </div>
                </div>
            </div>

            <!-- FAQs List -->
            <div id="faqsList" style="display:grid; gap:12px; margin-top:20px;"></div>

            <!-- Add/Edit Form -->
            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 id="faqFormTitle" style="margin:0 0 16px 0; font-size:16px;">নতুন FAQ যোগ করুন</h3>
                <form id="faqForm">
                    <div style="display:grid; gap:12px;">
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">প্রশ্ন (Question)</label>
                            <input type="text" id="faqQuestion"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">উত্তর (Answer)</label>
                            <textarea id="faqAnswer" rows="4"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">অর্ডার</label>
                            <input type="number" id="faqOrder" value="0"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="submitFaqBtn" class="btn btn-primary">FAQ সেভ করুন</button>
                            <button type="button" id="resetFaqBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let faqs = [];
                    let editingFaqId = null;

                    async function loadFaqSettings() {
                        const res = await fetch('/api/project-sections?section_key=faq');
                        const data = await res.json();
                        const s = Array.isArray(data) ? data.find(x => x.section_key === 'faq') : data;
                        if (s) {
                            document.getElementById('faqSectionTitle').value = s.title || '';
                            document.getElementById('faqSectionSubtitle').value = s.subtitle || '';
                        }
                    }

                    async function loadFaqs() {
                        const res = await fetch('/admin/faqs');
                        faqs = await res.json();
                        renderFaqs();
                    }

                    function renderFaqs() {
                        const container = document.getElementById('faqsList');
                        container.innerHTML = faqs.map(p => `
                            <div class="card-editor" style="padding:16px; border:1px solid #e5e7eb; border-radius:12px; background:#fff;">
                                <h4 style="margin:0; font-size:15px; color:#1e293b;">${p.question}</h4>
                                <div style="margin-top:8px; display:flex; gap:8px;">
                                    <button onclick="editFaq(${p.id})" class="btn btn-sm btn-outline-primary" style="padding:4px 10px; font-size:12px;">এডিট</button>
                                    <button onclick="deleteFaq(${p.id})" class="btn btn-sm btn-outline-danger" style="padding:4px 10px; font-size:12px;">মুছুন</button>
                                </div>
                            </div>
                        `).join('');
                    }

                    document.getElementById('saveFaqSettingsBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        try {
                            const res = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_key: 'faq', title: document.getElementById('faqSectionTitle').value, subtitle: document.getElementById('faqSectionSubtitle').value, is_active: true })
                            });
                            if (res.ok) showNotification('সেটিংস সেভ হয়েছে!', 'success');
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    document.getElementById('submitFaqBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        const payload = {
                            question: document.getElementById('faqQuestion').value,
                            answer: document.getElementById('faqAnswer').value,
                            order: document.getElementById('faqOrder').value,
                            is_active: true
                        };
                        const url = editingFaqId ? `/admin/faqs/${editingFaqId}` : '/admin/faqs';
                        const method = editingFaqId ? 'PUT' : 'POST';

                        try {
                            const res = await fetch(url, {
                                method: method,
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify(payload)
                            });
                            if (res.ok) {
                                showNotification(editingFaqId ? 'আপডেট হয়েছে!' : 'যোগ করা হয়েছে!', 'success');
                                resetFaqForm();
                                loadFaqs();
                            }
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    window.editFaq = (id) => {
                        const p = faqs.find(x => x.id === id);
                        if (!p) return;
                        editingFaqId = id;
                        document.getElementById('faqFormTitle').textContent = 'FAQ এডিট করুন';
                        document.getElementById('faqQuestion').value = p.question;
                        document.getElementById('faqAnswer').value = p.answer;
                        document.getElementById('faqOrder').value = p.order;
                        document.getElementById('submitFaqBtn').textContent = 'আপডেট করুন';
                        document.getElementById('faqForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    };

                    window.deleteFaq = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        const res = await fetch(`/admin/faqs/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                        });
                        if (res.ok) { showNotification('মুছে ফেলা হয়েছে', 'success'); loadFaqs(); }
                    };

                    function resetFaqForm() {
                        editingFaqId = null;
                        document.getElementById('faqForm').reset();
                        document.getElementById('faqFormTitle').textContent = 'নতুন FAQ যোগ করুন';
                        document.getElementById('submitFaqBtn').textContent = 'FAQ সেভ করুন';
                    }
                    document.getElementById('resetFaqBtn').addEventListener('click', resetFaqForm);

                    loadFaqSettings();
                    loadFaqs();
                })();
            </script>
        </div>
    </div>

    <!-- Event Management Section -->
    <div id="home-events" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>ইভেন্ট ম্যানেজমেন্ট</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের ইভেন্ট সেকশন ম্যানেজ করুন।</p>

            <!-- Section Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন সেটিংস</h3>
                <div style="display:grid; gap:12px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (Title)</label>
                        <input type="text" id="eventSectionTitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল (Subtitle)</label>
                        <input type="text" id="eventSectionSubtitle"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" id="saveEventSettingsBtn" class="btn btn-primary">সেটিংস সেভ করুন</button>
                    </div>
                </div>
            </div>

            <!-- Events List -->
            <div id="eventsList"
                style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; margin-top:20px;">
            </div>

            <!-- Add/Edit Form -->
            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 id="eventFormTitle" style="margin:0 0 16px 0; font-size:16px;">নতুন ইভেন্ট যোগ করুন</h3>
                <form id="eventForm">
                    <div style="display:grid; gap:12px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম
                                    (Title)</label>
                                <input type="text" id="eventTitle"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">তারিখ (Date)</label>
                                <input type="date" id="eventDate"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">সময় (Time)</label>
                                <input type="text" id="eventTime" placeholder="যেমন: ১০:০০ AM"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">অবস্থান
                                    (Location)</label>
                                <input type="text" id="eventLocation"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">বিবরণ
                                (Description)</label>
                            <textarea id="eventDescription" rows="3"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">অর্ডার</label>
                                <input type="number" id="eventOrder" value="0"
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">ছবি আপলোড করুন</label>
                                <input type="file" id="eventImage" accept="image/*"
                                    style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="submitEventBtn" class="btn btn-primary">ইভেন্ট সেভ করুন</button>
                            <button type="button" id="resetEventBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let events = [];
                    let editingEventId = null;

                    async function loadEventSettings() {
                        const res = await fetch('/api/project-sections?section_key=events');
                        const data = await res.json();
                        const s = Array.isArray(data) ? data.find(x => x.section_key === 'events') : data;
                        if (s) {
                            document.getElementById('eventSectionTitle').value = s.title || '';
                            document.getElementById('eventSectionSubtitle').value = s.subtitle || '';
                        }
                    }

                    async function loadEvents() {
                        const res = await fetch('/admin/events');
                        events = await res.json();
                        renderEvents();
                    }

                    function renderEvents() {
                        const container = document.getElementById('eventsList');
                        container.innerHTML = events.map(p => `
                            <div class="card-editor" style="padding:16px; border:1px solid #e5e7eb; border-radius:12px; background:#fff;">
                                 ${p.image_path ? `<img src="/storage/${p.image_path}" style="width:100%; height:120px; object-fit:cover; border-radius:8px; margin-bottom:12px;">` : `<img src="/images/Ningbo-Green-Belt-05_.jpg" style="width:100%; height:120px; object-fit:cover; border-radius:8px; margin-bottom:12px; opacity:0.5;">`}
                                <h4 style="margin:0; font-size:15px; color:#1e293b;">${p.title}</h4>
                                <div style="margin-top:6px; font-size:13px; color:#64748b;">
                                    ${p.event_date ? `<div><i class="fas fa-calendar"></i> ${p.event_date}</div>` : ''}
                                    ${p.location ? `<div><i class="fas fa-map-marker-alt"></i> ${p.location}</div>` : ''}
                                </div>
                                <div style="margin-top:12px; display:flex; gap:8px;">
                                    <button onclick="editEvent(${p.id})" class="btn btn-sm btn-outline-primary" style="padding:4px 10px; font-size:12px;">এডিট</button>
                                    <button onclick="deleteEvent(${p.id})" class="btn btn-sm btn-outline-danger" style="padding:4px 10px; font-size:12px;">মুছুন</button>
                                </div>
                            </div>
                        `).join('');
                    }

                    document.getElementById('saveEventSettingsBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;
                        try {
                            const res = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_key: 'events', title: document.getElementById('eventSectionTitle').value, subtitle: document.getElementById('eventSectionSubtitle').value, is_active: true })
                            });
                            if (res.ok) showNotification('সেটিংস সেভ হয়েছে!', 'success');
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    document.getElementById('submitEventBtn').addEventListener('click', async function () {
                        const btn = this;
                        btn.disabled = true;

                        const fd = new FormData();
                        fd.append('title', document.getElementById('eventTitle').value);
                        fd.append('description', document.getElementById('eventDescription').value);
                        fd.append('event_date', document.getElementById('eventDate').value);
                        fd.append('event_time', document.getElementById('eventTime').value);
                        fd.append('location', document.getElementById('eventLocation').value);
                        fd.append('order', document.getElementById('eventOrder').value);
                        fd.append('is_active', true);

                        const file = document.getElementById('eventImage').files[0];
                        if (file) fd.append('image', file);

                        const url = editingEventId ? `/admin/events/${editingEventId}` : '/admin/events';
                        if (editingEventId) fd.append('_method', 'PUT');

                        try {
                            const res = await fetch(url, {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: fd
                            });
                            if (res.ok) {
                                showNotification(editingEventId ? 'আপডেট হয়েছে!' : 'যোগ করা হয়েছে!', 'success');
                                resetEventForm();
                                loadEvents();
                            }
                        } catch (e) { console.error(e); }
                        btn.disabled = false;
                    });

                    window.editEvent = (id) => {
                        const p = events.find(x => x.id === id);
                        if (!p) return;
                        editingEventId = id;
                        document.getElementById('eventFormTitle').textContent = 'ইভেন্ট এডিট করুন';
                        document.getElementById('eventTitle').value = p.title;
                        document.getElementById('eventDescription').value = p.description || '';
                        document.getElementById('eventDate').value = p.event_date || '';
                        document.getElementById('eventTime').value = p.event_time || '';
                        document.getElementById('eventLocation').value = p.location || '';
                        document.getElementById('eventOrder').value = p.order;
                        document.getElementById('submitEventBtn').textContent = 'আপডেট করুন';
                        document.getElementById('eventForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    };

                    window.deleteEvent = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত?', 'নিশ্চিত করুন');
                        if (!confirmed) return;
                        const res = await fetch(`/admin/events/${id}`, {
                            method: 'DELETE',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                        });
                        if (res.ok) { showNotification('মুছে ফেলা হয়েছে', 'success'); loadEvents(); }
                    };

                    function resetEventForm() {
                        editingEventId = null;
                        document.getElementById('eventForm').reset();
                        document.getElementById('eventFormTitle').textContent = 'নতুন ইভেন্ট যোগ করুন';
                        document.getElementById('submitEventBtn').textContent = 'ইভেন্ট সেভ করুন';
                    }
                    document.getElementById('resetEventBtn').addEventListener('click', resetEventForm);

                    loadEventSettings();
                    loadEvents();
                })();
            </script>
        </div>
    </div>

    <!-- Amenities Management Section -->
    <div id="home-amenities-content" style="margin-top:1rem; display: none;">
        <div class="table-card">
            <h2>প্রকল্পের হাইলাইটস</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের "শান্তি, সৌন্দর্য ও আধুনিকতার সমন্বয়" সেকশন
                ম্যানেজ
                করুন।</p>

            <!-- Section Settings -->
            <div
                style="margin-bottom:24px; padding:20px; background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                <h3 style="margin:0 0 16px 0; font-size:16px; font-weight:600;">সেকশন সেটিংস</h3>
                <div style="display:grid; gap:12px;">
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">ব্যাজ (English)</label>
                        <input type="text" id="amenitySectionBadge" placeholder="World Class Facilities"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম (বাংলা)</label>
                        <input type="text" id="amenitySectionTitle" placeholder="শান্তি, সৌন্দর্য ও আধুনিকতার সমন্বয়"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:4px; font-weight:500;">সাবটাইটেল (অপশনাল)</label>
                        <textarea id="amenitySectionSubtitle" placeholder="বিস্তারিত বিবরণ..." rows="2"
                            style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" id="saveAmenitySettingsBtn" class="btn btn-primary">সেটিংস সেভ
                            করুন</button>
                    </div>
                </div>
            </div>

            <div class="amenities-list" id="amenitiesList" style="display:grid; gap:16px; margin-top:20px;"></div>

            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 style="margin:0 0 16px 0; font-size:16px;">নতুন হাইলাইট যোগ করুন</h3>
                <form id="amenityForm" enctype="multipart/form-data">
                    <div style="display:grid; gap:12px;">
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম</label>
                            <input type="text" id="amenityTitle" placeholder="যেমন: নিরাপত্তা ব্যবস্থা"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">বিবরণ</label>
                            <textarea id="amenityDescription" placeholder="বিস্তারিত বিবরণ লিখুন..." rows="3"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">আইকন/ছবি</label>
                            <input type="file" id="amenityImage" accept="image/*"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                            <img id="amenityImagePreview"
                                style="max-width:150px; margin-top:8px; display:none; border-radius:8px;">
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="addAmenityBtn" class="btn btn-primary">যোগ করুন</button>
                            <button type="button" id="resetAmenityBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let amenities = [];
                    let editingId = null;

                    const titleInput = document.getElementById('amenityTitle');
                    const descInput = document.getElementById('amenityDescription');
                    const imageInput = document.getElementById('amenityImage');
                    const imagePreview = document.getElementById('amenityImagePreview');
                    const addBtn = document.getElementById('addAmenityBtn');
                    const resetBtn = document.getElementById('resetAmenityBtn');
                    const listContainer = document.getElementById('amenitiesList');

                    // Section settings elements
                    const sectionBadgeInput = document.getElementById('amenitySectionBadge');
                    const sectionTitleInput = document.getElementById('amenitySectionTitle');
                    const sectionSubtitleInput = document.getElementById('amenitySectionSubtitle');
                    const saveSettingsBtn = document.getElementById('saveAmenitySettingsBtn');

                    // Load section settings
                    async function loadSettings() {
                        try {
                            const response = await fetch('/api/amenity-settings');
                            if (response.ok) {
                                const settings = await response.json();
                                if (settings) {
                                    sectionBadgeInput.value = settings.section_badge || '';
                                    sectionTitleInput.value = settings.section_title || '';
                                    sectionSubtitleInput.value = settings.section_subtitle || '';
                                }
                            }
                        } catch (error) {
                            console.error('Error loading settings:', error);
                        }
                    }

                    // Save section settings
                    saveSettingsBtn.addEventListener('click', async () => {
                        try {
                            const response = await fetch('/api/amenity-settings', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_badge: sectionBadgeInput.value,
                                    section_title: sectionTitleInput.value,
                                    section_subtitle: sectionSubtitleInput.value
                                })
                            });

                            if (response.ok) {
                                if (typeof showNotification === 'function') {
                                    showNotification('সেটিংস সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                                }
                            } else {
                                throw new Error('Save failed');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    });

                    // Load amenities from database
                    async function loadAmenities() {
                        try {
                            const response = await fetch('/admin/amenities', {
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });
                            if (response.ok) {
                                amenities = await response.json();
                                console.log('Loaded amenities:', amenities);
                                renderAmenities();
                            } else {
                                console.error('Failed to load amenities:', response.status, response.statusText);
                            }
                        } catch (error) {
                            console.error('Error loading amenities:', error);
                        }
                    }

                    // Render amenities list
                    function renderAmenities() {
                        if (!amenities || amenities.length === 0) {
                            listContainer.innerHTML = '<p style="color:#9ca3af; text-align:center; padding:40px;">কোনো হাইলাইট নেই। নতুন যোগ করুন।</p>';
                            return;
                        }

                        listContainer.innerHTML = amenities.map(amenity => `
                            <div style="display:flex; gap:16px; padding:16px; background:#fff; border:1px solid #e5e7eb; border-radius:10px; align-items:center;">
                                ${amenity.image_path ? `<img src="${amenity.image_path}" alt="${amenity.title}" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">` : '<div style="width:80px; height:80px; background:#f3f4f6; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:32px;">📌</div>'}
                                <div style="flex:1;">
                                    <h4 style="margin:0 0 6px 0; font-size:16px; font-weight:600;">${amenity.title}</h4>
                                    <p style="margin:0; color:#6b7280; font-size:14px;">${amenity.description || 'বিবরণ নেই'}</p>
                                </div>
                                <div style="display:flex; gap:8px;">
                                    <button onclick="editAmenity(${amenity.id})" class="btn btn-sm btn-primary">সম্পাদনা</button>
                                    <button onclick="deleteAmenity(${amenity.id})" class="btn btn-sm btn-danger">মুছুন</button>
                                </div>
                            </div>
                        `).join('');
                    }

                    // Image preview
                    imageInput.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                imagePreview.src = e.target.result;
                                imagePreview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    // Add/Update amenity
                    addBtn.addEventListener('click', async () => {
                        const title = titleInput.value.trim();
                        const description = descInput.value.trim();

                        if (!title) {
                            if (typeof showNotification === 'function') {
                                showNotification('শিরোনাম প্রয়োজন', 'error');
                            }
                            return;
                        }

                        const formData = new FormData();
                        formData.append('title', title);
                        formData.append('description', description);
                        if (imageInput.files[0]) {
                            formData.append('image', imageInput.files[0]);
                        }
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                        try {
                            const url = editingId ? `/admin/amenities/${editingId}` : '/admin/amenities';
                            const method = editingId ? 'PUT' : 'POST';

                            if (editingId) {
                                formData.append('_method', 'PUT');
                            }

                            const response = await fetch(url, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });

                            console.log('Add/Update response status:', response.status);

                            if (response.ok) {
                                const result = await response.json();
                                console.log('Add/Update result:', result);
                                if (typeof showNotification === 'function') {
                                    showNotification(editingId ? 'সফলভাবে আপডেট হয়েছে!' : 'নতুন হাইলাইট যোগ হয়েছে!', 'success');
                                }
                                resetForm();
                                await loadAmenities();
                            } else {
                                const errorText = await response.text();
                                console.error('Add/Update failed:', response.status, errorText);
                                throw new Error('Save failed');
                            }
                        }
                        } catch (error) {
                        console.error('Error saving amenity:', error);
                        if (typeof showNotification === 'function') {
                            showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                        }
                    }
                });

                // Reset form
                function resetForm() {
                    titleInput.value = '';
                    descInput.value = '';
                    imageInput.value = '';
                    imagePreview.style.display = 'none';
                    editingId = null;
                    addBtn.textContent = 'যোগ করুন';
                }

                resetBtn.addEventListener('click', resetForm);

                // Edit amenity
                window.editAmenity = (id) => {
                    const amenity = amenities.find(a => a.id === id);
                    if (amenity) {
                        titleInput.value = amenity.title;
                        descInput.value = amenity.description || '';
                        if (amenity.image_path) {
                            imagePreview.src = amenity.image_path;
                            imagePreview.style.display = 'block';
                        }
                        editingId = id;
                        addBtn.textContent = 'আপডেট করুন';

                        // Scroll to form
                        document.getElementById('amenityForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                };

                // Delete amenity
                window.deleteAmenity = async (id) => {
                    const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত যে এই হাইলাইট মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                    if (!confirmed) {
                        return;
                    }

                    console.log('Deleting amenity ID:', id);

                    try {
                        const response = await fetch(`/admin/amenities/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        console.log('Delete response status:', response.status);

                        if (response.ok) {
                            const result = await response.json();
                            console.log('Delete result:', result);
                            if (typeof showNotification === 'function') {
                                showNotification('হাইলাইট মুছে ফেলা হয়েছে', 'success');
                            }
                            await loadAmenities();
                        } else {
                            const errorText = await response.text();
                            console.error('Delete failed:', response.status, errorText);
                            throw new Error('Delete failed');
                        }
                    } catch (error) {
                        console.error('Error deleting amenity:', error);
                        if (typeof showNotification === 'function') {
                            showNotification('মুছতে ব্যর্থ হয়েছে', 'error');
                        }
                    }
                };

                // Initialize
                loadSettings();
                loadAmenities();
                }) ();
            </script>
        </div>
    </div>

    <!-- Video Management Section -->
    <div id="home-videos-content" style="margin-top:1rem;">
        <div class="table-card">
            <h2>ভিডিও সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের ভিডিও সেকশন ম্যানেজ করুন।</p>

            <!-- Section Title and Subtitle Fields -->
            <div class="section-header-fields"
                style="background: #f9fafb; padding: 16px; border-radius: 10px; margin-bottom: 16px; border: 1px solid #e5e7eb;">
                <label for="video-section-title"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    শিরোনাম (Title)</label>
                <input type="text" id="video-section-title" placeholder="ভিডিও গ্যালারি"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <label for="video-section-subtitle"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    সাব-শিরোনাম (Subtitle)</label>
                <input type="text" id="video-section-subtitle" placeholder="আমাদের প্রকল্পের ভিডিও"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <button type="button" id="saveVideoSettingsBtn" class="btn btn-primary" style="margin-top: 8px;">সেকশন
                    সেটিংস সেভ করুন</button>
            </div>

            <div class="videos-list" id="videosList" style="display:grid; gap:16px; margin-top:20px;"></div>

            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 style="margin:0 0 16px 0; font-size:16px;">নতুন ভিডিও যোগ করুন</h3>
                <form id="videoForm" enctype="multipart/form-data">
                    <div style="display:grid; gap:12px;">
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">শিরোনাম</label>
                            <input type="text" id="videoTitle" placeholder="ভিডিও শিরোনাম লিখুন"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">বিবরণ</label>
                            <textarea id="videoDescription" placeholder="বিস্তারিত বিবরণ লিখুন..." rows="3"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;"></textarea>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">ভিডিও URL</label>
                            <input type="url" id="videoUrl" placeholder="https://www.youtube.com/embed/..."
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">পোস্টার ছবি</label>
                            <input type="file" id="videoPoster" accept="image/*"
                                style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;">
                            <img id="videoPosterPreview"
                                style="max-width:200px; margin-top:8px; display:none; border-radius:8px;">
                        </div>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                            <div>
                                <label style="display:block; margin-bottom:4px; font-weight:500;">ক্রম</label>
                                <input type="number" id="videoOrder" placeholder="১, ২, ৩..."
                                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            </div>
                            <div>
                                <label style="display:flex; align-items:center; gap:8px; margin-top:28px;">
                                    <input type="checkbox" id="videoIsActive" checked style="width:20px; height:20px;">
                                    <span style="font-weight:500;">সক্রিয়</span>
                                </label>
                            </div>
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="addVideoBtn" class="btn btn-primary">যোগ করুন</button>
                            <button type="button" id="resetVideoBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let videos = [];
                    let editingId = null;

                    const titleInput = document.getElementById('videoTitle');
                    const descInput = document.getElementById('videoDescription');
                    const urlInput = document.getElementById('videoUrl');
                    const posterInput = document.getElementById('videoPoster');
                    const posterPreview = document.getElementById('videoPosterPreview');
                    const orderInput = document.getElementById('videoOrder');
                    const isActiveInput = document.getElementById('videoIsActive');
                    const addBtn = document.getElementById('addVideoBtn');
                    const resetBtn = document.getElementById('resetVideoBtn');
                    const listContainer = document.getElementById('videosList');

                    // Load videos from database
                    async function loadVideos() {
                        try {
                            const response = await fetch('/admin/videos', {
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });
                            if (response.ok) {
                                videos = await response.json();
                                renderVideos();
                            }
                        } catch (error) {
                            console.error('Error loading videos:', error);
                        }
                    }

                    // Render videos list
                    function renderVideos() {
                        if (!videos || videos.length === 0) {
                            listContainer.innerHTML = '<p style="color:#9ca3af; text-align:center; padding:40px;">কোনো ভিডিও নেই। নতুন যোগ করুন।</p>';
                            return;
                        }

                        listContainer.innerHTML = videos.map(video => `
                            <div style="display:flex; gap:16px; padding:16px; background:#fff; border:1px solid ${video.is_active ? '#e5e7eb' : '#fecaca'}; border-radius:10px; align-items:center; ${video.is_active ? '' : 'opacity:0.6;'}">
                                <div style="position:relative; width:160px; height:90px; flex-shrink:0; cursor:pointer;" onclick="previewVideo('${video.url}', '${video.title}')">
                                    ${video.poster_path ? `<img src="${video.poster_path}" alt="${video.title}" style="width:100%; height:100%; object-fit:cover; border-radius:8px;">` : '<div style="width:100%; height:100%; background:#f3f4f6; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:32px;">🎥</div>'}
                                    <div style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,0.3); border-radius:8px;">
                                        <div style="width:40px; height:40px; background:rgba(255,255,255,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                            <span style="color:#0d3d29; font-size:18px; margin-left:3px;">▶</span>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex:1;">
                                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;">
                                        <h4 style="margin:0; font-size:16px; font-weight:600;">${video.title}</h4>
                                        <span style="padding:2px 8px; background:${video.is_active ? '#dcfce7' : '#fee2e2'}; color:${video.is_active ? '#166534' : '#991b1b'}; border-radius:12px; font-size:11px; font-weight:600;">
                                            ${video.is_active ? 'সক্রিয়' : 'নিষ্ক্রিয়'}
                                        </span>
                                        <span style="padding:2px 8px; background:#e0e7ff; color:#3730a3; border-radius:12px; font-size:11px; font-weight:600;">
                                            ক্রম: ${video.order}
                                        </span>
                                    </div>
                                    <p style="margin:0 0 6px 0; color:#6b7280; font-size:14px;">${video.description || 'বিবরণ নেই'}</p>
                                    <a href="${video.url}" target="_blank" style="color:#3b82f6; font-size:13px; text-decoration:none;">🔗 ভিডিও দেখুন</a>
                                </div>
                                <div style="display:flex; flex-direction:column; gap:6px;">
                                    <button onclick="toggleVideoStatus(${video.id}, ${!video.is_active})" class="btn btn-sm ${video.is_active ? 'btn-warning' : 'btn-success'}" style="white-space:nowrap;">
                                        ${video.is_active ? '❌ নিষ্ক্রিয়' : '✅ সক্রিয়'}
                                    </button>
                                    <button onclick="editVideo(${video.id})" class="btn btn-sm btn-primary">সম্পাদনা</button>
                                    <button onclick="deleteVideo(${video.id})" class="btn btn-sm btn-danger">মুছুন</button>
                                </div>
                            </div>
                        `).join('');
                    }

                    // Poster preview
                    posterInput.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                posterPreview.src = e.target.result;
                                posterPreview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    // Add/Update video
                    addBtn.addEventListener('click', async () => {
                        const title = titleInput.value.trim();
                        const description = descInput.value.trim();
                        const url = urlInput.value.trim();
                        const order = orderInput.value.trim();
                        const isActive = isActiveInput.checked;

                        if (!title) {
                            if (typeof showNotification === 'function') {
                                showNotification('শিরোনাম প্রয়োজন', 'error');
                            }
                            return;
                        }

                        if (!url) {
                            if (typeof showNotification === 'function') {
                                showNotification('ভিডিও URL প্রয়োজন', 'error');
                            }
                            return;
                        }

                        if (!editingId && !posterInput.files[0]) {
                            if (typeof showNotification === 'function') {
                                showNotification('পোস্টার ছবি প্রয়োজন', 'error');
                            }
                            return;
                        }

                        const formData = new FormData();
                        formData.append('title', title);
                        formData.append('description', description);
                        formData.append('url', url);
                        if (order) {
                            formData.append('order', order);
                        }
                        formData.append('is_active', isActive ? '1' : '0');
                        if (posterInput.files[0]) {
                            formData.append('poster', posterInput.files[0]);
                        }
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                        try {
                            const apiUrl = editingId ? `/admin/videos/${editingId}` : '/admin/videos';

                            if (editingId) {
                                formData.append('_method', 'PUT');
                            }

                            const response = await fetch(apiUrl, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });

                            if (response.ok) {
                                if (typeof showNotification === 'function') {
                                    showNotification(editingId ? 'সফলভাবে আপডেট হয়েছে!' : 'নতুন ভিডিও যোগ হয়েছে!', 'success');
                                }
                                resetForm();
                                await loadVideos();
                            } else {
                                throw new Error('Save failed');
                            }
                        } catch (error) {
                            console.error('Error saving video:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    });

                    // Reset form
                    function resetForm() {
                        titleInput.value = '';
                        descInput.value = '';
                        urlInput.value = '';
                        orderInput.value = '';
                        isActiveInput.checked = true;
                        posterInput.value = '';
                        posterPreview.style.display = 'none';
                        editingId = null;
                        addBtn.textContent = 'যোগ করুন';
                    }

                    resetBtn.addEventListener('click', resetForm);

                    // Video section settings
                    let videoSettings = { title: '', subtitle: '' };
                    const videoSectionTitleInput = document.getElementById('video-section-title');
                    const videoSectionSubtitleInput = document.getElementById('video-section-subtitle');

                    // Load video section settings
                    async function loadVideoSettings() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=videos');
                            if (response.ok) {
                                const section = await response.json();
                                if (section) {
                                    videoSettings = { title: section.title || '', subtitle: section.subtitle || '' };
                                    if (videoSectionTitleInput) videoSectionTitleInput.value = videoSettings.title;
                                    if (videoSectionSubtitleInput) videoSectionSubtitleInput.value = videoSettings.subtitle;
                                }
                            }
                        } catch (error) {
                            console.error('Error loading video settings:', error);
                        }
                    }

                    // Save video section settings
                    async function saveVideoSettings() {
                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_key: 'videos',
                                    title: videoSectionTitleInput ? videoSectionTitleInput.value : '',
                                    subtitle: videoSectionSubtitleInput ? videoSectionSubtitleInput.value : '',
                                    is_active: true
                                })
                            });
                            if (!response.ok) throw new Error('Failed to save settings');
                        } catch (error) {
                            console.error('Error saving video settings:', error);
                            throw error;
                        }
                    }

                    // Save video section settings button
                    document.getElementById('saveVideoSettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveVideoSettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await saveVideoSettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Edit video
                    window.editVideo = (id) => {
                        const video = videos.find(v => v.id === id);
                        if (video) {
                            titleInput.value = video.title;
                            descInput.value = video.description || '';
                            urlInput.value = video.url;
                            orderInput.value = video.order || '';
                            isActiveInput.checked = video.is_active;
                            if (video.poster_path) {
                                posterPreview.src = video.poster_path;
                                posterPreview.style.display = 'block';
                            }
                            editingId = id;
                            addBtn.textContent = 'আপডেট করুন';

                            // Scroll to form
                            document.getElementById('videoForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    };

                    // Toggle video status
                    window.toggleVideoStatus = async (id, newStatus) => {
                        try {
                            const formData = new FormData();
                            formData.append('is_active', newStatus ? '1' : '0');
                            formData.append('_method', 'PUT');
                            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                            const video = videos.find(v => v.id === id);
                            if (video) {
                                formData.append('title', video.title);
                                formData.append('description', video.description || '');
                                formData.append('url', video.url);
                                formData.append('order', video.order || 0);
                            }

                            const response = await fetch(`/admin/videos/${id}`, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });

                            if (response.ok) {
                                if (typeof showNotification === 'function') {
                                    showNotification(newStatus ? 'ভিডিও সক্রিয় করা হয়েছে' : 'ভিডিও নিষ্ক্রিয় করা হয়েছে', 'success');
                                }
                                await loadVideos();
                            } else {
                                throw new Error('Toggle failed');
                            }
                        } catch (error) {
                            console.error('Error toggling video status:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('স্ট্যাটাস পরিবর্তন করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    };

                    // Delete video
                    window.deleteVideo = async (id) => {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত যে এই ভিডিও মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) {
                            return;
                        }

                        try {
                            const response = await fetch(`/admin/videos/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });

                            if (response.ok) {
                                if (typeof showNotification === 'function') {
                                    showNotification('ভিডিও মুছে ফেলা হয়েছে', 'success');
                                }
                                await loadVideos();
                            } else {
                                throw new Error('Delete failed');
                            }
                        } catch (error) {
                            console.error('Error deleting video:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('মুছতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    };

                    // Preview video function
                    window.previewVideo = (url, title) => {
                        const modal = document.createElement('div');
                        modal.style.cssText = 'position:fixed; inset:0; background:rgba(0,0,0,0.8); display:flex; align-items:center; justify-content:center; z-index:9999; padding:20px;';

                        const isYouTube = /(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)/i.test(url);
                        const isVimeo = /(?:vimeo\.com\/|player\.vimeo\.com\/video\/)/i.test(url);

                        let videoContent = '';

                        if (isYouTube) {
                            const extractId = (url) => {
                                try {
                                    const u = new URL(url);
                                    if (u.hostname.includes('youtu.be')) return u.pathname.slice(1);
                                    if (u.searchParams.has('v')) return u.searchParams.get('v');
                                    const parts = u.pathname.split('/');
                                    return parts.pop() || parts.pop();
                                } catch (e) {
                                    const m = url.match(/(?:v=|\/)([0-9A-Za-z_-]{11})/);
                                    return m ? m[1] : null;
                                }
                            };
                            const id = extractId(url);
                            if (id) {
                                videoContent = `<iframe src="https://www.youtube.com/embed/${id}?autoplay=1" style="width:100%; max-width:900px; height:500px; border:0; border-radius:8px;" allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
                            }
                        } else if (isVimeo) {
                            const extractId = (url) => {
                                try {
                                    const u = new URL(url);
                                    const parts = u.pathname.split('/').filter(Boolean);
                                    return parts.length ? parts.pop() : null;
                                } catch (e) {
                                    const m = url.match(/(\d+)/);
                                    return m ? m[1] : null;
                                }
                            };
                            const id = extractId(url);
                            if (id) {
                                videoContent = `<iframe src="https://player.vimeo.com/video/${id}?autoplay=1" style="width:100%; max-width:900px; height:500px; border:0; border-radius:8px;" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
                            }
                        } else {
                            videoContent = `<video controls autoplay style="width:100%; max-width:900px; max-height:500px; border-radius:8px;"><source src="${url}" type="video/mp4">Your browser does not support the video tag.</video>`;
                        }

                        modal.innerHTML = `
                            <div style="background:#fff; border-radius:12px; padding:20px; max-width:940px; width:100%;">
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                                    <h3 style="margin:0; color:#0d3d29;">${title}</h3>
                                    <button onclick="this.closest('[style*=fixed]').remove()" style="background:#ef4444; color:#fff; border:none; border-radius:6px; padding:8px 16px; cursor:pointer; font-weight:600;">✕ বন্ধ করুন</button>
                                </div>
                                <div style="background:#000; border-radius:8px; overflow:hidden;">
                                    ${videoContent}
                                </div>
                            </div>
                        `;

                        modal.onclick = (e) => {
                            if (e.target === modal) modal.remove();
                        };

                        document.body.appendChild(modal);
                    };

                    // Initialize
                    // Initialize
                    loadVideoSettings();
                    loadVideos();
                })();
            </script>
        </div>
    </div>

    <!-- Price List Management Section -->
    <div id="home-price-list" style="margin-top:1rem;">
        <div class="table-card">
            <h2>মূল্য তালিকা</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের মূল্য তালিকা সেকশন ম্যানেজ করুন।</p>
            <style>
                #home-price-list .price-form input[type="text"],
                #home-price-list .price-form input[type="number"] {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-price-list .price-grid-editor {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-price-list .price-card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-price-list .price-card-editor h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    font-weight: 600;
                }

                #home-price-list .delete-price {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 4px 10px;
                    font-size: 12px;
                    cursor: pointer;
                }

                #home-price-list .delete-price:hover {
                    background: #dc2626;
                }

                #home-price-list input[type="text"],
                #home-price-list input[type="number"] {
                    width: 100%;
                    box-sizing: border-box;
                    margin-top: 4px;
                }

                #home-price-list .add-feature-btn {
                    margin-top: 8px;
                    background: #0D5534;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 8px 12px;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100%;
                }

                #home-price-list .add-feature-btn:hover {
                    background: #0f6640;
                }

                @media (max-width: 960px) {
                    #home-price-list .price-grid-editor {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="price-form">
                <div
                    style="margin-bottom: 12px; padding: 12px; background: white; border-radius: 10px; border: 1px solid #e5e7eb;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div class="form-group">
                            <label>সেকশন শিরোনাম</label>
                            <input type="text" id="priceListTitleInput" placeholder="মূল্য তালিকা">
                        </div>
                        <div class="form-group">
                            <label>সাব-শিরোনাম</label>
                            <input type="text" id="priceListSubtitleInput"
                                placeholder="আপনার বাজেট অনুযায়ী নির্বাচন করুন">
                        </div>
                    </div>
                    <button id="savePriceListSettingsBtn" class="btn btn-primary" style="margin-top: 12px;">সেটিংস
                        সংরক্ষণ করুন</button>
                </div>
                <div class="price-grid-editor" id="priceListGridEditor"></div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="addPriceBtn" class="btn btn-primary" type="button">নতুন প্যাকেজ যোগ করুন</button>
                    <button id="savePriceBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetPriceBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    let priceItems = [];
                    const gridEditor = document.getElementById('priceListGridEditor');
                    const titleInput = document.getElementById('priceListTitleInput');
                    const subtitleInput = document.getElementById('priceListSubtitleInput');

                    async function loadPriceList() {
                        try {
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">লোড হচ্ছে...</div>';
                            const response = await fetch('/api/pricing-plans');
                            if (!response.ok) throw new Error('Failed to load price list');
                            priceItems = await response.json().then(r => r.filter(p => p.is_active));

                            const settingsResponse = await fetch('/api/pricing-settings');
                            if (settingsResponse.ok) {
                                const settings = await settingsResponse.json();
                                if (settings) {
                                    titleInput.value = settings.section_title || '';
                                    subtitleInput.value = settings.section_subtitle || '';
                                }
                            }

                            renderPriceList();
                        } catch (error) {
                            console.error('Error loading price list:', error);
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে</div>';
                        }
                    }

                    function renderPriceList() {
                        gridEditor.innerHTML = '';
                        priceItems.forEach((item, index) => {
                            const card = document.createElement('div');
                            card.className = 'price-card-editor';
                            
                            const features = Array.isArray(item.features) ? item.features : [];
                            
                            // Build features HTML
                            let featuresHtml = '';
                            if (features.length > 0) {
                                features.forEach((f, fIdx) => {
                                    featuresHtml += '<div class="feature-item" style="display:flex; gap:8px; margin-bottom:6px;">';
                                    featuresHtml += '<input type="text" class="price-feature-input" data-item="' + index + '" data-feature="' + fIdx + '" value="' + (f || '').replace(/"/g, '&quot;') + '" placeholder="সুবিধা ' + (fIdx + 1) + '" style="flex:1; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fff;" />';
                                    featuresHtml += '<button type="button" class="remove-price-feature" data-item="' + index + '" data-feature="' + fIdx + '" style="background:#ef4444; color:#fff; border:none; padding:0 12px; border-radius:4px; cursor:pointer; font-size:18px;" title="মুছুন">×</button>';
                                    featuresHtml += '</div>';
                                });
                            }
                            
                            card.innerHTML = 
                                '<button type="button" class="delete-price" data-id="' + item.id + '" data-index="' + index + '">মুছুন</button>' +
                                '<h4>প্যাকেজ #' + (index + 1) + '</h4>' +
                                '<label>শিরোনাম</label>' +
                                '<input type="text" value="' + (item.title || '').replace(/"/g, '&quot;') + '" class="price-title" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;">প্লট সাইজ</label>' +
                                '<input type="text" value="' + (item.plot_size || '').replace(/"/g, '&quot;') + '" class="price-plot-size" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;">মূল্য</label>' +
                                '<input type="number" value="' + (item.price || 0) + '" class="price-price" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;"><input type="checkbox" class="price-popular" data-id="' + item.id + '" ' + (item.is_popular ? 'checked' : '') + '> জনপ্রিয়</label>' +
                                '<div class="feature-list-container" style="margin-top:12px; padding:12px; background:#f0fdf4; border-radius:8px; border:2px solid #22c55e;">' +
                                    '<label style="display:block; margin-bottom:10px; font-weight:600; color:#166534; font-size:14px;">📋 সুবিধা সমূহ:</label>' +
                                    '<div class="feature-list" data-index="' + index + '">' + featuresHtml + '</div>' +
                                    '<button type="button" class="add-price-feature-btn" data-index="' + index + '" style="margin-top:10px; width:100%; padding:10px; background:#22c55e; color:#fff; border:none; border-radius:6px; cursor:pointer; font-size:14px; font-weight:600;">➕ সুবিধা যোগ করুন</button>' +
                                '</div>' +
                                '<div style="margin-top:12px; padding:12px; background:#0D5534; border-radius:8px;">' +
                                    '<h5 style="color:white; margin:0 0 8px; font-size:13px; font-weight:600;">বাটন অপশন</h5>' +
                                    '<label style="color:white; font-size:12px;">CTA বাটন টেক্সট</label>' +
                                    '<input type="text" value="' + (item.cta_text || 'বুকিং করুন').replace(/"/g, '&quot;') + '" class="price-cta-text" data-id="' + item.id + '" placeholder="বুকিং করুন" style="background:white; margin-top:4px; width:100%; padding:8px; box-sizing:border-box; border-radius:4px; border:1px solid #ccc;">' +
                                    '<label style="color:white; font-size:12px; margin-top:8px; display:block;">CTA বাটন লিংক</label>' +
                                    '<input type="text" value="' + (item.cta_link || '#booking').replace(/"/g, '&quot;') + '" class="price-cta-link" data-id="' + item.id + '" placeholder="#booking" style="background:white; margin-top:4px; width:100%; padding:8px; box-sizing:border-box; border-radius:4px; border:1px solid #ccc;">' +
                                '</div>';
                            gridEditor.appendChild(card);
                        });
                        bindEvents();
                        bindPriceFeatureEvents();
                    }
                    
                    function bindPriceFeatureEvents() {
                        // Update feature
                        gridEditor.querySelectorAll('.price-feature-input').forEach(input => {
                            input.addEventListener('input', (e) => {
                                const itemIdx = parseInt(e.target.dataset.item);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (priceItems[itemIdx] && Array.isArray(priceItems[itemIdx].features)) {
                                    priceItems[itemIdx].features[featureIdx] = e.target.value;
                                }
                            });
                        });

                        // Remove feature
                        gridEditor.querySelectorAll('.remove-price-feature').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const itemIdx = parseInt(e.target.dataset.item);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (priceItems[itemIdx] && Array.isArray(priceItems[itemIdx].features)) {
                                    // Collect all form values before re-rendering
                                    collectPriceFormValues();
                                    priceItems[itemIdx].features.splice(featureIdx, 1);
                                    renderPriceList();
                                }
                            });
                        });

                        // Add feature
                        gridEditor.querySelectorAll('.add-price-feature-btn').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const index = parseInt(e.target.dataset.index);
                                if (priceItems[index]) {
                                    // Collect all form values before re-rendering
                                    collectPriceFormValues();
                                    
                                    if (!Array.isArray(priceItems[index].features)) {
                                        priceItems[index].features = [];
                                    }
                                    priceItems[index].features.push('');
                                    renderPriceList();
                                }
                            });
                        });
                    }
                    
                    function collectPriceFormValues() {
                        priceItems.forEach((item, index) => {
                            const card = gridEditor.children[index];
                            if (card) {
                                item.title = card.querySelector('.price-title')?.value || item.title;
                                item.plot_size = card.querySelector('.price-plot-size')?.value || item.plot_size;
                                item.price = card.querySelector('.price-price')?.value || item.price;
                                item.is_popular = card.querySelector('.price-popular')?.checked || false;
                                item.cta_text = card.querySelector('.price-cta-text')?.value || item.cta_text;
                                item.cta_link = card.querySelector('.price-cta-link')?.value || item.cta_link;
                                
                                // Collect features
                                const features = [];
                                card.querySelectorAll('.price-feature-input').forEach(inp => {
                                    features.push(inp.value);
                                });
                                if (features.length > 0) {
                                    item.features = features;
                                }
                            }
                        });
                    }

                    function bindEvents() {
                        gridEditor.querySelectorAll('.delete-price').forEach(btn => {
                            btn.addEventListener('click', async (e) => {
                                const confirmed = await showHomeConfirm('নিশ্চিত?', 'নিশ্চিত করুন');
                                if (!confirmed) return;
                                const id = e.target.dataset.id;
                                const index = parseInt(e.target.dataset.index);
                                try {
                                    // Only call API if item has been saved (has a valid ID)
                                    if (id && id !== 'null' && id !== 'undefined') {
                                        await fetch(`/admin/pricing-plans/${id}`, {
                                            method: 'DELETE',
                                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                                        });
                                    }
                                    // Remove from array by index
                                    priceItems.splice(index, 1);
                                    renderPriceList();
                                    showNotification('ডিলিট করা হয়েছে!', 'success');
                                } catch (error) {
                                    showNotification('ডিলিট ব্যর্থ', 'error');
                                }
                            });
                        });
                    }

                    document.getElementById('savePriceBtn').addEventListener('click', async () => {
                        try {
                            // Collect current form values
                            priceItems.forEach((item, index) => {
                                const card = gridEditor.children[index];
                                if (card) {
                                    item.title = card.querySelector('.price-title').value;
                                    item.plot_size = card.querySelector('.price-plot-size').value;
                                    item.price = card.querySelector('.price-price').value;

                                    const ctaTextField = card.querySelector('.price-cta-text');
                                    const ctaLinkField = card.querySelector('.price-cta-link');

                                    item.cta_text = ctaTextField ? ctaTextField.value.trim() : 'বুকিং করুন';
                                    item.cta_link = ctaLinkField ? ctaLinkField.value.trim() : '#booking';

                                    item.is_popular = card.querySelector('.price-popular').checked;
                                    item.is_active = true;

                                    // Collect features from editable feature inputs
                                    const features = [];
                                    card.querySelectorAll('.price-feature-input').forEach(inp => {
                                        if (inp.value.trim()) {
                                            features.push(inp.value.trim());
                                        }
                                    });
                                    item.features = features;
                                }
                            });

                            for (const item of priceItems) {
                                if (item.id) {
                                    // Update existing
                                    await fetch(`/admin/pricing-plans/${item.id}`, {
                                        method: 'PUT',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                        body: JSON.stringify(item)
                                    });
                                } else {
                                    // Create new
                                    const response = await fetch('/admin/pricing-plans', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                        body: JSON.stringify(item)
                                    });
                                    const result = await response.json();
                                    item.id = result.data.id;
                                }
                            }
                            showNotification('সেভ করা হয়েছে!', 'success');
                            await loadPriceList();
                        } catch (error) {
                            showNotification('সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('savePriceListSettingsBtn').addEventListener('click', async () => {
                        try {
                            await fetch('/admin/pricing-settings', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_title: titleInput.value, section_subtitle: subtitleInput.value })
                            });
                            showNotification('সেটিংস সেভ করা হয়েছে!', 'success');
                        } catch (error) {
                            showNotification('সেটিংস সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('resetPriceBtn').addEventListener('click', loadPriceList);
                    document.getElementById('addPriceBtn').addEventListener('click', () => {
                        priceItems.push({ id: null, title: '', plot_size: '', price: 0, features: [], is_popular: false, is_active: true, cta_text: 'বুকিং করুন', cta_link: '#booking' });
                        renderPriceList();
                    });

                    loadPriceList();
                })();
            </script>
        </div>
    </div>

    <!-- Project Price Management Section -->
    <div id="home-project-price" style="margin-top:1rem;">
        <div class="table-card">
            <h2>প্রকল্পের মূল্য তালিকা</h2>
            <p style="color:#6b7280; margin-top:-6px;">প্রকল্পের মূল্য তালিকা সেকশনের কনটেন্ট এই ফর্ম থেকে ম্যানেজ
                করুন।
            </p>
            <style>
                #home-project-price .project-price-form input[type="text"],
                #home-project-price .project-price-form input[type="number"] {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                }

                #home-project-price .project-price-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }

                #home-project-price .project-price-card {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 12px;
                    background: #fafafa;
                    position: relative;
                }

                #home-project-price .project-price-card h4 {
                    margin: 0 0 8px;
                    font-size: 14px;
                    font-weight: 600;
                }

                #home-project-price .delete-project-price {
                    position: absolute;
                    top: 8px;
                    right: 8px;
                    background: #ef4444;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 4px 10px;
                    font-size: 12px;
                    cursor: pointer;
                }

                #home-project-price .delete-project-price:hover {
                    background: #dc2626;
                }

                #home-project-price input[type="text"],
                #home-project-price input[type="number"] {
                    width: 100%;
                    box-sizing: border-box;
                    margin-top: 4px;
                }

                #home-project-price .add-feature-btn {
                    margin-top: 8px;
                    background: #0D5534;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    padding: 8px 12px;
                    font-size: 13px;
                    cursor: pointer;
                    width: 100%;
                }

                #home-project-price .add-feature-btn:hover {
                    background: #0f6640;
                }

                @media (max-width: 960px) {
                    #home-project-price .project-price-grid {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div class="project-price-form">
                <div
                    style="margin-bottom: 12px; padding: 12px; background: white; border-radius: 10px; border: 1px solid #e5e7eb;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div class="form-group">
                            <label>সেকশন শিরোনাম</label>
                            <input type="text" id="projectPriceTitleInput" placeholder="প্রকল্পের মূল্য তালিকা">
                        </div>
                        <div class="form-group">
                            <label>সাব-শিরোনাম</label>
                            <input type="text" id="projectPriceSubtitleInput"
                                placeholder="আপনার বাজেট অনুযায়ী নির্বাচন করুন">
                        </div>
                    </div>
                    <button id="saveProjectPriceSettingsBtn" class="btn btn-primary" style="margin-top: 12px;">সেটিংস
                        সংরক্ষণ করুন</button>
                </div>
                <div class="project-price-grid" id="projectPriceGridEditor"></div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="addProjectPriceBtn" class="btn btn-primary" type="button">নতুন প্যাকেজ যোগ
                        করুন</button>
                    <button id="saveProjectPriceBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetProjectPriceBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function () {
                    let projectPriceItems = [];
                    const gridEditor = document.getElementById('projectPriceGridEditor');
                    const titleInput = document.getElementById('projectPriceTitleInput');
                    const subtitleInput = document.getElementById('projectPriceSubtitleInput');

                    async function loadProjectPrice() {
                        try {
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">লোড হচ্ছে...</div>';
                            const response = await fetch('/api/pricing-plans');
                            if (!response.ok) throw new Error('Failed to load project price');
                            projectPriceItems = await response.json().then(r => r.filter(p => p.is_active));

                            const settingsResponse = await fetch('/api/pricing-settings');
                            if (settingsResponse.ok) {
                                const settings = await settingsResponse.json();
                                if (settings) {
                                    titleInput.value = settings.section_title || '';
                                    subtitleInput.value = settings.section_subtitle || '';
                                }
                            }

                            renderProjectPrice();
                        } catch (error) {
                            console.error('Error loading project price:', error);
                            gridEditor.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে</div>';
                        }
                    }

                    function renderProjectPrice() {
                        gridEditor.innerHTML = '';
                        projectPriceItems.forEach((item, index) => {
                            const card = document.createElement('div');
                            card.className = 'project-price-card';
                            
                            const features = Array.isArray(item.features) ? item.features : [];
                            
                            // Build features HTML
                            let featuresHtml = '';
                            if (features.length > 0) {
                                features.forEach((f, fIdx) => {
                                    featuresHtml += '<div class="feature-item" style="display:flex; gap:8px; margin-bottom:6px;">';
                                    featuresHtml += '<input type="text" class="project-feature-input" data-item="' + index + '" data-feature="' + fIdx + '" value="' + (f || '').replace(/"/g, '&quot;') + '" placeholder="সুবিধা ' + (fIdx + 1) + '" style="flex:1; padding:8px; border:1px solid #ccc; border-radius:4px; background:#fff;" />';
                                    featuresHtml += '<button type="button" class="remove-project-feature" data-item="' + index + '" data-feature="' + fIdx + '" style="background:#ef4444; color:#fff; border:none; padding:0 12px; border-radius:4px; cursor:pointer; font-size:18px;" title="মুছুন">×</button>';
                                    featuresHtml += '</div>';
                                });
                            }
                            
                            card.innerHTML = 
                                '<button type="button" class="delete-project-price" data-id="' + item.id + '" data-index="' + index + '">মুছুন</button>' +
                                '<h4>প্যাকেজ #' + (index + 1) + '</h4>' +
                                '<label>শিরোনাম</label>' +
                                '<input type="text" value="' + (item.title || '').replace(/"/g, '&quot;') + '" class="project-price-title" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;">প্লট সাইজ</label>' +
                                '<input type="text" value="' + (item.plot_size || '').replace(/"/g, '&quot;') + '" class="project-price-plot-size" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;">মূল্য</label>' +
                                '<input type="number" value="' + (item.price || 0) + '" class="project-price-price" data-id="' + item.id + '">' +
                                '<label style="margin-top:8px;"><input type="checkbox" class="project-price-popular" data-id="' + item.id + '" ' + (item.is_popular ? 'checked' : '') + '> জনপ্রিয়</label>' +
                                '<div class="feature-list-container" style="margin-top:12px; padding:12px; background:#f0fdf4; border-radius:8px; border:2px solid #22c55e;">' +
                                    '<label style="display:block; margin-bottom:10px; font-weight:600; color:#166534; font-size:14px;">📋 সুবিধা সমূহ:</label>' +
                                    '<div class="feature-list" data-index="' + index + '">' + featuresHtml + '</div>' +
                                    '<button type="button" class="add-project-feature-btn" data-index="' + index + '" style="margin-top:10px; width:100%; padding:10px; background:#22c55e; color:#fff; border:none; border-radius:6px; cursor:pointer; font-size:14px; font-weight:600;">➕ সুবিধা যোগ করুন</button>' +
                                '</div>' +
                                '<div style="margin-top:12px; padding:12px; background:#0D5534; border-radius:8px;">' +
                                    '<h5 style="color:white; margin:0 0 8px; font-size:13px; font-weight:600;">বাটন অপশন</h5>' +
                                    '<label style="color:white; font-size:12px;">CTA বাটন টেক্সট</label>' +
                                    '<input type="text" value="' + (item.cta_text || 'বুকিং করুন').replace(/"/g, '&quot;') + '" class="project-price-cta-text" data-id="' + item.id + '" placeholder="বুকিং করুন" style="background:white; margin-top:4px; width:100%; padding:8px; box-sizing:border-box; border-radius:4px; border:1px solid #ccc;">' +
                                    '<label style="color:white; font-size:12px; margin-top:8px; display:block;">CTA বাটন লিংক</label>' +
                                    '<input type="text" value="' + (item.cta_link || '#booking').replace(/"/g, '&quot;') + '" class="project-price-cta-link" data-id="' + item.id + '" placeholder="#booking" style="background:white; margin-top:4px; width:100%; padding:8px; box-sizing:border-box; border-radius:4px; border:1px solid #ccc;">' +
                                '</div>';
                            gridEditor.appendChild(card);
                        });
                        bindProjectPriceEvents();
                        bindProjectFeatureEvents();
                    }
                    
                    function bindProjectFeatureEvents() {
                        // Update feature
                        gridEditor.querySelectorAll('.project-feature-input').forEach(input => {
                            input.addEventListener('input', (e) => {
                                const itemIdx = parseInt(e.target.dataset.item);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (projectPriceItems[itemIdx] && Array.isArray(projectPriceItems[itemIdx].features)) {
                                    projectPriceItems[itemIdx].features[featureIdx] = e.target.value;
                                }
                            });
                        });

                        // Remove feature
                        gridEditor.querySelectorAll('.remove-project-feature').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const itemIdx = parseInt(e.target.dataset.item);
                                const featureIdx = parseInt(e.target.dataset.feature);
                                if (projectPriceItems[itemIdx] && Array.isArray(projectPriceItems[itemIdx].features)) {
                                    // Collect all form values before re-rendering
                                    collectProjectPriceFormValues();
                                    projectPriceItems[itemIdx].features.splice(featureIdx, 1);
                                    renderProjectPrice();
                                }
                            });
                        });

                        // Add feature
                        gridEditor.querySelectorAll('.add-project-feature-btn').forEach(btn => {
                            btn.addEventListener('click', (e) => {
                                const index = parseInt(e.target.dataset.index);
                                if (projectPriceItems[index]) {
                                    // Collect all form values before re-rendering
                                    collectProjectPriceFormValues();
                                    
                                    if (!Array.isArray(projectPriceItems[index].features)) {
                                        projectPriceItems[index].features = [];
                                    }
                                    projectPriceItems[index].features.push('');
                                    renderProjectPrice();
                                }
                            });
                        });
                    }
                    
                    function collectProjectPriceFormValues() {
                        projectPriceItems.forEach((item, index) => {
                            const card = gridEditor.children[index];
                            if (card) {
                                item.title = card.querySelector('.project-price-title')?.value || item.title;
                                item.plot_size = card.querySelector('.project-price-plot-size')?.value || item.plot_size;
                                item.price = card.querySelector('.project-price-price')?.value || item.price;
                                item.is_popular = card.querySelector('.project-price-popular')?.checked || false;
                                item.cta_text = card.querySelector('.project-price-cta-text')?.value || item.cta_text;
                                item.cta_link = card.querySelector('.project-price-cta-link')?.value || item.cta_link;
                                
                                // Collect features
                                const features = [];
                                card.querySelectorAll('.project-feature-input').forEach(inp => {
                                    features.push(inp.value);
                                });
                                if (features.length > 0) {
                                    item.features = features;
                                }
                            }
                        });
                    }

                    function bindProjectPriceEvents() {
                        gridEditor.querySelectorAll('.delete-project-price').forEach(btn => {
                            btn.addEventListener('click', async (e) => {
                                const confirmed = await showHomeConfirm('নিশ্চিত?', 'নিশ্চিত করুন');
                                if (!confirmed) return;
                                const id = e.target.dataset.id;
                                const index = parseInt(e.target.dataset.index);
                                try {
                                    // Only call API if item has been saved (has a valid ID)
                                    if (id && id !== 'null' && id !== 'undefined') {
                                        await fetch(`/admin/pricing-plans/${id}`, {
                                            method: 'DELETE',
                                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
                                        });
                                    }
                                    // Remove from array by index
                                    projectPriceItems.splice(index, 1);
                                    renderProjectPrice();
                                    showNotification('ডিলিট করা হয়েছে!', 'success');
                                } catch (error) {
                                    showNotification('ডিলিট ব্যর্থ', 'error');
                                }
                            });
                        });
                    }

                    document.getElementById('saveProjectPriceBtn').addEventListener('click', async () => {
                        try {
                            // Collect current form values
                            projectPriceItems.forEach((item, index) => {
                                const card = gridEditor.children[index];
                                if (card) {
                                    item.title = card.querySelector('.project-price-title').value;
                                    item.plot_size = card.querySelector('.project-price-plot-size').value;
                                    item.price = card.querySelector('.project-price-price').value;

                                    const ctaTextField = card.querySelector('.project-price-cta-text');
                                    const ctaLinkField = card.querySelector('.project-price-cta-link');

                                    item.cta_text = ctaTextField ? ctaTextField.value.trim() : 'বুকিং করুন';
                                    item.cta_link = ctaLinkField ? ctaLinkField.value.trim() : '#booking';

                                    item.is_popular = card.querySelector('.project-price-popular').checked;

                                    // Collect features from editable feature inputs
                                    const features = [];
                                    card.querySelectorAll('.project-feature-input').forEach(inp => {
                                        if (inp.value.trim()) {
                                            features.push(inp.value.trim());
                                        }
                                    });
                                    item.features = features;
                                }
                            });

                            for (const item of projectPriceItems) {
                                // Add is_active for new items
                                if (!item.is_active) {
                                    item.is_active = true;
                                }
                                
                                if (item.id) {
                                    // Update existing item
                                    await fetch(`/admin/pricing-plans/${item.id}`, {
                                        method: 'PUT',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                        body: JSON.stringify(item)
                                    });
                                } else {
                                    // Create new item
                                    const response = await fetch('/admin/pricing-plans', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                        body: JSON.stringify(item)
                                    });
                                    const newItem = await response.json();
                                    item.id = newItem.id;
                                }
                            }
                            showNotification('সেভ করা হয়েছে!', 'success');
                        } catch (error) {
                            showNotification('সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('saveProjectPriceSettingsBtn').addEventListener('click', async () => {
                        try {
                            await fetch('/admin/pricing-settings', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                                body: JSON.stringify({ section_title: titleInput.value, section_subtitle: subtitleInput.value })
                            });
                            showNotification('সেটিংস সেভ করা হয়েছে!', 'success');
                        } catch (error) {
                            showNotification('সেটিংস সেভ ব্যর্থ', 'error');
                        }
                    });

                    document.getElementById('resetProjectPriceBtn').addEventListener('click', loadProjectPrice);
                    document.getElementById('addProjectPriceBtn').addEventListener('click', () => {
                        projectPriceItems.push({ id: null, title: '', plot_size: '', price: 0, features: [], is_popular: false, is_active: true, cta_text: 'বুকিং করুন', cta_link: '#booking' });
                        renderProjectPrice();
                    });

                    loadProjectPrice();
                })();
            </script>
        </div>
    </div>

    <!-- Gallery Management Section -->
    <div id="home-gallery-content" style="margin-top:1rem;">
        <div class="table-card">
            <h2>গ্যালারি সেকশন</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের গ্যালারি সেকশন ম্যানেজ করুন।</p>

            <!-- Section Title and Subtitle Fields -->
            <div class="section-header-fields"
                style="background: #f9fafb; padding: 16px; border-radius: 10px; margin-bottom: 16px; border: 1px solid #e5e7eb;">
                <label for="gallery-section-title"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    শিরোনাম (Title)</label>
                <input type="text" id="gallery-section-title" placeholder="গ্যালারি"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <label for="gallery-section-subtitle"
                    style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; color: #374151;">সেকশন
                    সাব-শিরোনাম (Subtitle)</label>
                <input type="text" id="gallery-section-subtitle" placeholder="আমাদের প্রকল্পের ছবি"
                    style="width: 100%; margin-bottom: 12px; height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db;" />
                <button type="button" id="saveGallerySettingsBtn" class="btn btn-primary" style="margin-top: 8px;">সেকশন
                    সেটিংস সেভ করুন</button>
            </div>

            <div class="galleries-list" id="galleriesList"
                style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:16px; margin-top:20px;">
            </div>

            <div
                style="margin-top:20px; padding:20px; border:2px dashed #cbd5e1; border-radius:12px; background:#f9fafb;">
                <h3 style="margin:0 0 16px 0; font-size:16px;">নতুন গ্যালারি আইটেম যোগ করুন</h3>
                <form id="galleryForm" enctype="multipart/form-data">
                    <div style="display:grid; gap:12px;">
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">বাংলা শিরোনাম
                                *</label>
                            <input type="text" id="galleryTitleBn" placeholder="বাংলায় শিরোনাম লিখুন" required
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">English Title
                                (Optional)</label>
                            <input type="text" id="galleryTitle" placeholder="Enter title in English"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">ক্যাটাগরি *</label>
                            <select id="galleryCategory" required
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                                <option value="exterior">এক্সটেরিয়র</option>
                                <option value="interior">ইন্টেরিয়র</option>
                                <option value="landscape">ল্যান্ডস্কেপ</option>
                                <option value="amenities">সুবিধাসমূহ</option>
                            </select>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">ছবি আপলোড করুন
                                *</label>
                            <input type="file" id="galleryImage" accept="image/*" required
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                            <small style="color:#6b7280;">সমর্থিত ফরম্যাট: JPG, PNG, GIF, WEBP (সর্বোচ্চ
                                5MB)</small>
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:4px; font-weight:500;">ক্রম (Order)</label>
                            <input type="number" id="galleryOrder" placeholder="0" value="0"
                                style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px;">
                        </div>
                        <div id="galleryImagePreviewContainer" style="display:none;">
                            <img id="galleryImagePreview"
                                style="max-width:100%; max-height:200px; border-radius:8px; margin-top:8px;">
                        </div>
                        <div style="display:flex; gap:10px; margin-top:8px;">
                            <button type="button" id="addGalleryBtn" class="btn btn-primary">যোগ করুন</button>
                            <button type="button" id="resetGalleryBtn" class="btn btn-secondary">রিসেট</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                (function () {
                    let galleries = [];
                    let editingId = null;

                    const titleBnInput = document.getElementById('galleryTitleBn');
                    const titleInput = document.getElementById('galleryTitle');
                    const categoryInput = document.getElementById('galleryCategory');
                    const imageInput = document.getElementById('galleryImage');
                    const orderInput = document.getElementById('galleryOrder');
                    const imagePreview = document.getElementById('galleryImagePreview');
                    const imagePreviewContainer = document.getElementById('galleryImagePreviewContainer');
                    const addBtn = document.getElementById('addGalleryBtn');
                    const resetBtn = document.getElementById('resetGalleryBtn');
                    const listContainer = document.getElementById('galleriesList');

                    // Category labels in Bengali
                    const categoryLabels = {
                        'exterior': 'এক্সটেরিয়র',
                        'interior': 'ইন্টেরিয়র',
                        'landscape': 'ল্যান্ডস্কেপ',
                        'amenities': 'সুবিধাসমূহ'
                    };

                    // Load galleries from database
                    async function loadGalleries() {
                        console.log('Loading galleries...');
                        try {
                            const response = await fetch('/admin/galleries', {
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            });
                            if (response.ok) {
                                galleries = await response.json();
                                console.log('Loaded galleries:', galleries);
                                renderGalleries();
                            }
                        } catch (error) {
                            console.error('Error loading galleries:', error);
                        }
                    }

                    // Render galleries list
                    function renderGalleries() {
                        if (!galleries || galleries.length === 0) {
                            listContainer.innerHTML = '<p style="color:#9ca3af; text-align:center; padding:40px; grid-column:1/-1;">কোনো গ্যালারি আইটেম নেই। নতুন যোগ করুন।</p>';
                            return;
                        }

                        listContainer.innerHTML = galleries.map(gallery => `
                            <div style="background:#fff; border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;">
                                <div style="position:relative; height:180px; overflow:hidden;">
                                    <img src="${gallery.image_path}" alt="${gallery.title_bn}" 
                                        style="width:100%; height:100%; object-fit:cover;">
                                    <span style="position:absolute; top:10px; right:10px; background:rgba(10,77,46,0.9); color:white; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:600;">
                                        ${categoryLabels[gallery.category] || gallery.category}
                                    </span>
                                </div>
                                <div style="padding:12px;">
                                    <h4 style="margin:0 0 4px 0; font-size:14px; font-weight:600; color:#1f2937;">${gallery.title_bn}</h4>
                                    ${gallery.title ? `<p style="margin:0 0 8px 0; color:#6b7280; font-size:12px;">${gallery.title}</p>` : ''}
                                    <p style="margin:0 0 12px 0; color:#9ca3af; font-size:11px;">Order: ${gallery.order}</p>
                                    <div style="display:flex; gap:6px;">
                                        <button onclick="editGallery(${gallery.id})" class="btn btn-sm btn-primary" style="flex:1; font-size:12px; padding:6px;">সম্পাদনা</button>
                                        <button onclick="deleteGallery(${gallery.id})" class="btn btn-sm btn-danger" style="flex:1; font-size:12px; padding:6px;">মুছুন</button>
                                    </div>
                                </div>
                            </div>
                        `).join('');
                    }

                    // Image preview on file input
                    imageInput.addEventListener('change', (e) => {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                imagePreview.src = e.target.result;
                                imagePreviewContainer.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        } else {
                            imagePreviewContainer.style.display = 'none';
                        }
                    });

                    // Add/Update gallery
                    addBtn.addEventListener('click', async () => {
                        const titleBn = titleBnInput.value.trim();
                        const title = titleInput.value.trim();
                        const category = categoryInput.value;
                        const imageFile = imageInput.files[0];
                        const order = orderInput.value || 0;

                        if (!titleBn) {
                            if (typeof showNotification === 'function') {
                                showNotification('বাংলা শিরোনাম প্রয়োজন', 'error');
                            }
                            return;
                        }

                        if (!imageFile && !editingId) {
                            if (typeof showNotification === 'function') {
                                showNotification('ছবি আপলোড করুন', 'error');
                            }
                            return;
                        }

                        console.log('Submitting gallery:', { titleBn, title, category, imageFile, order, editingId });

                        try {
                            const url = editingId
                                ? `/admin/galleries/${editingId}`
                                : '/admin/galleries';

                            const method = editingId ? 'PUT' : 'POST';

                            const formData = new FormData();
                            formData.append('title_bn', titleBn);
                            if (title) formData.append('title', title);
                            formData.append('category', category);
                            if (imageFile) formData.append('image', imageFile);
                            formData.append('order', order);
                            if (editingId) formData.append('_method', 'PUT');

                            const response = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            });

                            console.log('Response status:', response.status);
                            const result = await response.json();
                            console.log('Response result:', result);

                            if (response.ok && result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification(result.message, 'success');
                                }
                                resetForm();
                                await loadGalleries();

                                // Trigger frontend refresh - multiple methods for reliability
                                try {
                                    localStorage.setItem('refreshGalleries', Date.now().toString());
                                    window.dispatchEvent(new CustomEvent('galleriesUpdated'));
                                    window.dispatchEvent(new StorageEvent('storage', {
                                        key: 'refreshGalleries',
                                        newValue: Date.now().toString()
                                    }));
                                } catch (e) {
                                    console.error('LocalStorage error:', e);
                                }
                            } else {
                                throw new Error(result.message || 'Failed to save');
                            }
                        } catch (error) {
                            console.error('Error saving gallery:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেভ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    });

                    // Edit gallery
                    window.editGallery = function (id) {
                        const gallery = galleries.find(g => g.id === id);
                        if (!gallery) {
                            if (typeof showNotification === 'function') {
                                showNotification('গ্যালারি আইটেম খুঁজে পাওয়া যায়নি', 'error');
                            }
                            // Optionally clear form
                            editingId = null;
                            titleBnInput.value = '';
                            titleInput.value = '';
                            categoryInput.value = 'exterior';
                            imageInput.value = '';
                            orderInput.value = 0;
                            imagePreviewContainer.style.display = 'none';
                            addBtn.textContent = 'যোগ করুন';
                            addBtn.style.background = '';
                            document.getElementById('galleryForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                            document.getElementById('galleryForm').style.boxShadow = '0 0 0 3px #ef4444';
                            setTimeout(() => { document.getElementById('galleryForm').style.boxShadow = ''; }, 1500);
                            return;
                        }
                        console.log('Editing gallery:', gallery);
                        editingId = id;
                        titleBnInput.value = gallery.title_bn;
                        titleInput.value = gallery.title || '';
                        categoryInput.value = gallery.category;
                        imageInput.value = '';
                        orderInput.value = gallery.order;
                        imagePreview.src = gallery.image_path;
                        imagePreviewContainer.style.display = 'block';
                        addBtn.textContent = 'আপডেট করুন';
                        addBtn.style.background = '#f59e0b';
                        document.getElementById('galleryForm').scrollIntoView({ behavior: 'smooth', block: 'center' });
                        document.getElementById('galleryForm').style.boxShadow = '0 0 0 3px #16a34a';
                        setTimeout(() => { document.getElementById('galleryForm').style.boxShadow = ''; }, 1500);
                    };

                    // Delete gallery
                    window.deleteGallery = async function (id) {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত এই গ্যালারি আইটেম মুছতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;

                        console.log('Deleting gallery:', id);

                        try {
                            const response = await fetch(`/admin/galleries/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            });

                            console.log('Delete response status:', response.status);
                            const result = await response.json();
                            console.log('Delete result:', result);

                            if (response.ok && result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification(result.message, 'success');
                                }
                                await loadGalleries();

                                // Trigger frontend refresh
                                try {
                                    localStorage.setItem('refreshGalleries', Date.now().toString());
                                    window.dispatchEvent(new CustomEvent('galleriesUpdated'));
                                } catch (e) {
                                    console.error('LocalStorage error:', e);
                                }
                            } else {
                                throw new Error(result.message || 'Delete failed');
                            }
                        } catch (error) {
                            console.error('Error deleting gallery:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('মুছতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    };

                    // Reset form
                    function resetForm() {
                        editingId = null;
                        titleBnInput.value = '';
                        titleInput.value = '';
                        categoryInput.value = 'exterior';
                        imageInput.value = '';
                        orderInput.value = '0';
                        imagePreviewContainer.style.display = 'none';
                        addBtn.textContent = 'যোগ করুন';
                        addBtn.style.background = '';
                    }

                    resetBtn.addEventListener('click', resetForm);

                    // Gallery section settings
                    let gallerySettings = { title: '', subtitle: '' };
                    const gallerySectionTitleInput = document.getElementById('gallery-section-title');
                    const gallerySectionSubtitleInput = document.getElementById('gallery-section-subtitle');

                    // Load gallery section settings
                    async function loadGallerySettings() {
                        try {
                            const response = await fetch('/api/project-sections?section_key=gallery');
                            if (response.ok) {
                                const section = await response.json();
                                if (section) {
                                    gallerySettings = { title: section.title || '', subtitle: section.subtitle || '' };
                                    if (gallerySectionTitleInput) gallerySectionTitleInput.value = gallerySettings.title;
                                    if (gallerySectionSubtitleInput) gallerySectionSubtitleInput.value = gallerySettings.subtitle;
                                }
                            }
                        } catch (error) {
                            console.error('Error loading gallery settings:', error);
                        }
                    }

                    // Save gallery section settings
                    async function saveGallerySettings() {
                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    section_key: 'gallery',
                                    title: gallerySectionTitleInput ? gallerySectionTitleInput.value : '',
                                    subtitle: gallerySectionSubtitleInput ? gallerySectionSubtitleInput.value : '',
                                    is_active: true
                                })
                            });
                            if (!response.ok) throw new Error('Failed to save settings');
                        } catch (error) {
                            console.error('Error saving gallery settings:', error);
                            throw error;
                        }
                    }

                    // Save gallery section settings button
                    document.getElementById('saveGallerySettingsBtn').addEventListener('click', async () => {
                        const btn = document.getElementById('saveGallerySettingsBtn');
                        const originalText = btn.textContent;
                        btn.disabled = true;
                        btn.textContent = 'সেভ হচ্ছে...';

                        try {
                            await saveGallerySettings();
                            if (typeof showNotification === 'function') {
                                showNotification('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                            }
                        } catch (error) {
                            console.error('Error saving settings:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        } finally {
                            btn.disabled = false;
                            btn.textContent = originalText;
                        }
                    });

                    // Initialize
                    loadGallerySettings();
                    loadGalleries();
                })();
            </script>
        </div>
    </div>

    <div id="home-projects" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <h2 style="margin:0;">প্রকল্প</h2>
                <button id="addOurProjectBtn" class="btn btn-primary" type="button">+ নতুন প্রকল্প যোগ করুন</button>
            </div>
            <style>
                #home-projects .projects-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 16px;
                }

                #home-projects .project-card-editor {
                    border: 1px solid #e5e7eb;
                    border-radius: 12px;
                    padding: 16px;
                    background: #fafafa;
                    position: relative;
                }

                #home-projects .project-card-editor h4 {
                    margin: 0 0 12px;
                    font-size: 15px;
                    font-weight: 600;
                }

                #home-projects .project-card-editor input[type="text"],
                #home-projects .project-card-editor input[type="number"],
                #home-projects .project-card-editor textarea {
                    height: 46px;
                    padding: 10px 12px;
                    font-size: 15px;
                    border-radius: 10px;
                    width: 100%;
                    box-sizing: border-box;
                    border: 1px solid #e5e7eb;
                    margin-bottom: 8px;
                }

                #home-projects .project-card-editor textarea {
                    height: auto;
                    min-height: 80px;
                    resize: vertical;
                }

                #home-projects .project-card-editor .image-preview {
                    margin: 8px 0;
                    max-width: 100%;
                    border-radius: 8px;
                    overflow: hidden;
                }

                #home-projects .project-card-editor .image-preview img {
                    width: 100%;
                    max-height: 200px;
                    object-fit: cover;
                    border-radius: 8px;
                }

                #home-projects .project-card-editor .delete-btn {
                    background: #ef4444;
                    color: #fff;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    width: 100%;
                }

                #home-projects .project-card-editor .delete-btn:hover {
                    background: #dc2626;
                }

                #home-projects .project-card-editor .save-btn {
                    background: #10b981;
                    color: #fff;
                    border: none;
                    padding: 10px 16px;
                    border-radius: 6px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 500;
                    margin-bottom: 8px;
                }

                #home-projects .project-card-editor .save-btn:hover {
                    background: #059669;
                }

                @media (max-width: 960px) {
                    #home-projects .projects-grid {
                        grid-template-columns: 1fr
                    }
                }
            </style>
            <div id="ourProjectsContainer" class="projects-grid"></div>
            <script>
                (function () {
                    const container = document.getElementById('ourProjectsContainer');
                    let projects = [];
                    let projectCounter = 0;

                    async function loadProjects() {
                        try {
                            container.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">লোড হচ্ছে...</div>';
                            const response = await fetch('/api/our-projects');
                            if (!response.ok) throw new Error('Failed to load projects');
                            projects = await response.json();
                            console.log('Loaded projects:', projects);

                            if (!Array.isArray(projects)) {
                                projects = [];
                            }

                            renderProjects();
                        } catch (error) {
                            console.error('Error loading projects:', error);
                            container.innerHTML = '<div style="padding: 20px; text-align: center; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে। দয়া করে পেজটি রিফ্রেশ করুন।</div>';
                        }
                    }

                    function renderProjects() {
                        container.innerHTML = '';

                        if (projects.length === 0) {
                            container.innerHTML = '<div style="padding: 20px; text-align: center; color: #64748b;">কোন প্রকল্প পাওয়া যায়নি। "নতুন প্রকল্প যোগ করুন" বাটনে ক্লিক করুন।</div>';
                            return;
                        }

                        projects.forEach((project, index) => {
                            container.appendChild(createProjectCard(project, index));
                        });
                    }

                    function createProjectCard(project = null, index = null) {
                        const id = project ? project.id : 'new_' + (++projectCounter);
                        const isNew = !project;
                        const card = document.createElement('div');
                        card.className = 'project-card-editor';
                        card.setAttribute('data-id', id);

                        const imageSrc = project && project.image_url ? project.image_url : '';
                        const imagePreview = imageSrc ? `<div class="image-preview"><img src="${imageSrc}" alt="Preview"></div>` : '';

                        card.innerHTML = `
                            <h4>প্রকল্প ${isNew ? 'নতুন' : (index + 1)}</h4>
                            <input type="text" class="project-title" placeholder="শিরোনাম" value="${project?.title || ''}" />
                            <textarea class="project-description" placeholder="বিবরণ">${project?.description || ''}</textarea>
                            <input type="text" class="project-cta-text" placeholder="বাটন টেক্সট (যেমন: বিস্তারিত জানুন)" value="${project?.cta_text || ''}" />
                            <input type="text" class="project-cta-link" placeholder="বাটন লিংক (যেমন: #contact)" value="${project?.cta_link || ''}" />
                            <input type="number" class="project-order" placeholder="ক্রম" value="${project?.order || index + 1}" />
                            <div style="margin-bottom:8px;">
                                <label style="display:block; margin-bottom:4px; font-size:13px;">প্রকল্পের ছবি</label>
                                <input type="file" class="project-image" accept="image/*" onchange="previewOurProjectImage(this, '${id}')" />
                                <div class="image-preview-${id}">${imagePreview}</div>
                            </div>
                            <button class="save-btn" onclick="saveOurProject('${id}', ${isNew})">সংরক্ষণ করুন</button>
                            ${!isNew ? `<button class="delete-btn" onclick="deleteOurProject('${id}')">মুছুন</button>` : ''}
                        `;
                        return card;
                    }

                    window.previewOurProjectImage = function (input, id) {
                        const previewDiv = document.querySelector(`.image-preview-${id}`);
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                previewDiv.innerHTML = `<div class="image-preview"><img src="${e.target.result}" alt="Preview"></div>`;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    };

                    window.saveOurProject = async function (id, isNew) {
                        const card = document.querySelector(`[data-id="${id}"]`);
                        const formData = new FormData();

                        formData.append('title', card.querySelector('.project-title').value);
                        formData.append('description', card.querySelector('.project-description').value);
                        formData.append('cta_text', card.querySelector('.project-cta-text').value);
                        formData.append('cta_link', card.querySelector('.project-cta-link').value);
                        formData.append('order', card.querySelector('.project-order').value);

                        const imageInput = card.querySelector('.project-image');
                        if (imageInput.files && imageInput.files[0]) {
                            formData.append('image', imageInput.files[0]);
                        }

                        try {
                            let url = '/admin/our-projects';
                            let method = 'POST';

                            if (!isNew) {
                                url = `/admin/our-projects/${id}`;
                                method = 'PUT';

                                // For PUT with FormData, we need to append _method
                                if (imageInput.files && imageInput.files[0]) {
                                    formData.append('_method', 'PUT');
                                    method = 'POST';
                                }
                            }

                            const headers = {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            };

                            // Don't set Content-Type for FormData
                            const options = {
                                method: method,
                                headers: headers,
                                body: formData
                            };

                            // For PUT without file, use JSON
                            if (method === 'PUT' && (!imageInput.files || !imageInput.files[0])) {
                                const jsonData = {
                                    title: card.querySelector('.project-title').value,
                                    description: card.querySelector('.project-description').value,
                                    cta_text: card.querySelector('.project-cta-text').value,
                                    cta_link: card.querySelector('.project-cta-link').value,
                                    order: card.querySelector('.project-order').value
                                };
                                options.headers['Content-Type'] = 'application/json';
                                options.body = JSON.stringify(jsonData);
                            }

                            const response = await fetch(url, options);
                            const result = await response.json();

                            if (result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification('প্রকল্প সফলভাবে সংরক্ষিত হয়েছে!', 'success');
                                }
                                await loadProjects();
                            } else {
                                throw new Error(result.message || 'Save failed');
                            }
                        } catch (error) {
                            console.error('Error saving project:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('সংরক্ষণ করতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    };

                    window.deleteOurProject = async function (id) {
                        const confirmed = await showHomeConfirm('আপনি কি নিশ্চিত যে এই প্রকল্পটি মুছে ফেলতে চান?', 'নিশ্চিত করুন');
                        if (!confirmed) return;

                        try {
                            const response = await fetch(`/admin/our-projects/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            });

                            const result = await response.json();

                            if (result.success) {
                                if (typeof showNotification === 'function') {
                                    showNotification('প্রকল্প মুছে ফেলা হয়েছে!', 'success');
                                }
                                await loadProjects();
                            } else {
                                throw new Error(result.message || 'Delete failed');
                            }
                        } catch (error) {
                            console.error('Error deleting project:', error);
                            if (typeof showNotification === 'function') {
                                showNotification('মুছে ফেলতে ব্যর্থ হয়েছে', 'error');
                            }
                        }
                    };

                    document.getElementById('addOurProjectBtn').addEventListener('click', () => {
                        container.appendChild(createProjectCard());
                    });

                    loadProjects();
                })();
            </script>
        </div>
    </div>

    <!-- Custom Confirmation Modal for Home Section -->
    <div id="homeConfirmModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 10000; justify-content: center; align-items: center;">
        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2); max-width: 400px; width: 90%;">
            <h3 id="homeConfirmTitle" style="margin: 0 0 15px 0; color: #1f2937; font-size: 20px; font-weight: 600;"></h3>
            <p id="homeConfirmMessage" style="margin: 0 0 25px 0; color: #6b7280; font-size: 15px; line-height: 1.6;"></p>
            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button id="homeConfirmCancel" style="padding: 10px 24px; border: 1px solid #d1d5db; background: white; color: #6b7280; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 500; transition: all 0.2s;">
                    বাতিল
                </button>
                <button id="homeConfirmOk" style="padding: 10px 24px; border: none; background: linear-gradient(135deg, #0D5534 0%, #0f6640 100%); color: white; border-radius: 8px; cursor: pointer; font-size: 14px; font-weight: 500; transition: all 0.2s;">
                    নিশ্চিত করুন
                </button>
            </div>
        </div>
    </div>

    <script>
        // Custom confirmation modal function
        function showHomeConfirm(message, title = 'নিশ্চিত করুন') {
            return new Promise((resolve) => {
                const modal = document.getElementById('homeConfirmModal');
                const titleEl = document.getElementById('homeConfirmTitle');
                const messageEl = document.getElementById('homeConfirmMessage');
                const cancelBtn = document.getElementById('homeConfirmCancel');
                const okBtn = document.getElementById('homeConfirmOk');

                titleEl.textContent = title;
                messageEl.textContent = message;
                modal.style.display = 'flex';

                function cleanup() {
                    modal.style.display = 'none';
                    cancelBtn.removeEventListener('click', handleCancel);
                    okBtn.removeEventListener('click', handleOk);
                }

                function handleCancel() {
                    cleanup();
                    resolve(false);
                }

                function handleOk() {
                    cleanup();
                    resolve(true);
                }

                cancelBtn.addEventListener('click', handleCancel);
                okBtn.addEventListener('click', handleOk);

                // Close on outside click
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        handleCancel();
                    }
                });
            });
        }

        // Add hover effects
        document.addEventListener('DOMContentLoaded', () => {
            const cancelBtn = document.getElementById('homeConfirmCancel');
            const okBtn = document.getElementById('homeConfirmOk');

            if (cancelBtn) {
                cancelBtn.addEventListener('mouseenter', () => {
                    cancelBtn.style.background = '#f3f4f6';
                    cancelBtn.style.borderColor = '#9ca3af';
                });
                cancelBtn.addEventListener('mouseleave', () => {
                    cancelBtn.style.background = 'white';
                    cancelBtn.style.borderColor = '#d1d5db';
                });
            }

            if (okBtn) {
                okBtn.addEventListener('mouseenter', () => {
                    okBtn.style.transform = 'translateY(-1px)';
                    okBtn.style.boxShadow = '0 4px 12px rgba(13, 85, 52, 0.3)';
                });
                okBtn.addEventListener('mouseleave', () => {
                    okBtn.style.transform = 'translateY(0)';
                    okBtn.style.boxShadow = 'none';
                });
            }
        });
    </script>

</div>