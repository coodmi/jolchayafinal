<div id="contact" class="tab-content" style="margin-top: 0 !important; padding-top: 0 !important;">
        <div class="table-card" style="margin-top: 0 !important;">
            <h2>কন্ট্যাক্ট সেকশন প্রিভিউ</h2>
            <p style="color:#6b7280; margin-bottom:1rem;">
                নিচে আপনার ওয়েবসাইটের কন্ট্যাক্ট সেকশনের লাইভ প্রিভিউ দেখতে পাবেন। এডিট করতে <strong>হোম → যোগাযোগ সেকশন</strong> এ যান।
            </p>
        </div>

        <div class="table-card" style="margin-top:1rem; background:#f9fafb; padding:16px;">
            <h3 style="margin:0 0 0.75rem 0;">লাইভ প্রিভিউ</h3>
            <div style="border:1px solid #e5e7eb; border-radius:0.75rem; overflow:hidden; background:#0b1727; color:#e5e7eb;">
                <div style="display:flex; flex-wrap:wrap; gap:24px; padding:20px;">
                    <!-- Left: contact info -->
                    <div style="flex:1 1 260px; min-width:240px; display:flex; flex-direction:column; gap:12px;">
                        <div id="ctPreviewTitle" style="font-size:1.25rem; font-weight:700; margin-bottom:4px;">যোগাযোগ করুন</div>
                        <div id="ctPreviewSubtitle" style="color:#cbd5e1; margin-bottom:12px;">আমরা আপনার সেবায় প্রস্তুত</div>

                        <div style="display:flex; gap:10px; align-items:flex-start;">
                            <div id="ctPreviewPhoneIcon" style="font-size:1.25rem;"><i class="fas fa-phone"></i></div>
                            <div>
                                <div id="ctPreviewPhoneLabel" style="font-weight:600;">ফোন</div>
                                <div id="ctPreviewPhoneNumbers">+880 1991 995 995<br>+880 1991 994 994<br>+880 1997 995 995<br>+880 1677 600 000</div>
                            </div>
                        </div>

                        <div style="display:flex; gap:10px; align-items:flex-start;">
                            <div id="ctPreviewEmailIcon" style="font-size:1.25rem;">📧</div>
                            <div>
                                <div id="ctPreviewEmailLabel" style="font-weight:600;">ইমেইল</div>
                                <div id="ctPreviewEmailAddress">hello.nexgroup@gmail.com</div>
                            </div>
                        </div>

                        <div style="display:flex; gap:10px; align-items:flex-start;">
                            <div id="ctPreviewWebIcon" style="font-size:1.25rem;"><i class="fas fa-globe"></i></div>
                            <div>
                                <div id="ctPreviewWebLabel" style="font-weight:600;">ওয়েবসাইট</div>
                                <div id="ctPreviewWebAddress">www.jolchaya.com</div>
                            </div>
                        </div>

                        <div style="display:flex; gap:10px; align-items:flex-start;">
                            <div id="ctPreviewAddressIcon" style="font-size:1.25rem;"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div id="ctPreviewAddressLabel" style="font-weight:600;">ঠিকানা</div>
                                <div id="ctPreviewAddressText">শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস<br>খুলনা, বাংলাদেশ</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: dynamic form preview -->
                    <div style="flex:1 1 260px; min-width:260px; background:#020617; border-radius:12px; padding:20px;">
                        <h4 id="ctPreviewFormTitle" style="margin:0 0 1rem 0; color:#f9fafb;">বুকিং তথ্য পাঠান</h4>
                        <div id="ctPreviewFormFields" style="display:flex; flex-direction:column; gap:10px;">
                            <!-- Dynamic form fields will be inserted here -->
                        </div>
                        <button type="button" disabled style="margin-top:14px; width:100%; padding:10px 16px; border:none; border-radius:999px; background:linear-gradient(135deg,#fbbf24,#f59e0b); color:#111827; font-weight:600; cursor:not-allowed; opacity:0.7;">
                            পাঠান (প্রিভিউ)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
        (function(){
            // Load contact settings from Home section
            async function loadContactPreview() {
                try {
                    const response = await fetch('/api/contact-settings');
                    const s = await response.json();
                    
                    // Update contact info
                    if (s.title) document.getElementById('ctPreviewTitle').textContent = s.title;
                    if (s.subtitle) document.getElementById('ctPreviewSubtitle').textContent = s.subtitle;
                    if (s.phone_icon) document.getElementById('ctPreviewPhoneIcon').textContent = s.phone_icon;
                    if (s.phone_label) document.getElementById('ctPreviewPhoneLabel').textContent = s.phone_label;
                    if (s.phone_numbers) document.getElementById('ctPreviewPhoneNumbers').innerHTML = s.phone_numbers;
                    if (s.email_icon) document.getElementById('ctPreviewEmailIcon').textContent = s.email_icon;
                    if (s.email_label) document.getElementById('ctPreviewEmailLabel').textContent = s.email_label;
                    if (s.email_address) document.getElementById('ctPreviewEmailAddress').innerHTML = s.email_address;
                    if (s.web_icon) document.getElementById('ctPreviewWebIcon').textContent = s.web_icon;
                    if (s.web_label) document.getElementById('ctPreviewWebLabel').textContent = s.web_label;
                    if (s.web_address) document.getElementById('ctPreviewWebAddress').textContent = s.web_address;
                    if (s.address_icon) document.getElementById('ctPreviewAddressIcon').textContent = s.address_icon;
                    if (s.address_label) document.getElementById('ctPreviewAddressLabel').textContent = s.address_label;
                    if (s.address_text) document.getElementById('ctPreviewAddressText').innerHTML = s.address_text;
                    if (s.form_title) document.getElementById('ctPreviewFormTitle').textContent = s.form_title;
                } catch (error) {
                    console.error('Error loading contact settings:', error);
                }
            }

            // Load form fields
            async function loadFormFieldsPreview() {
                try {
                    const response = await fetch('/api/contact-form-fields');
                    const fields = await response.json();
                    
                    const container = document.getElementById('ctPreviewFormFields');
                    if (!container) return;
                    
                    container.innerHTML = '';
                    
                    if (!fields || fields.length === 0) {
                        // Default fields
                        container.innerHTML = `
                            <div>
                                <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">নাম</label>
                                <input type="text" disabled placeholder="আপনার নাম লিখুন" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">ফোন নম্বর</label>
                                <input type="tel" disabled placeholder="আপনার ফোন নম্বর" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">ইমেইল</label>
                                <input type="email" disabled placeholder="আপনার ইমেইল ঠিকানা" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">আগ্রহের প্লট সাইজ</label>
                                <input type="text" disabled placeholder="যেমন: ৩০ কুড়া মালা" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;">
                            </div>
                            <div>
                                <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">বার্তা</label>
                                <textarea rows="3" disabled placeholder="আপনার প্রশ্ন বা মন্তব্য" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;"></textarea>
                            </div>
                        `;
                        return;
                    }
                    
                    // Render dynamic fields
                    fields.forEach((field, index) => {
                        const div = document.createElement('div');
                        const label = document.createElement('label');
                        label.textContent = field.label || '';
                        label.style.cssText = 'display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;';
                        div.appendChild(label);
                        
                        const isLastField = index === fields.length - 1;
                        let input;
                        
                        if (isLastField || field.type === 'textarea') {
                            input = document.createElement('textarea');
                            input.rows = 3;
                        } else {
                            input = document.createElement('input');
                            input.type = field.type || 'text';
                        }
                        
                        input.disabled = true;
                        input.placeholder = field.placeholder || '';
                        input.style.cssText = 'width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;';
                        
                        div.appendChild(input);
                        container.appendChild(div);
                    });
                } catch (error) {
                    console.error('Error loading form fields:', error);
                    // Show default fields on error
                    document.getElementById('ctPreviewFormFields').innerHTML = `
                        <div>
                            <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">নাম</label>
                            <input type="text" disabled placeholder="আপনার নাম লিখুন" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.875rem; margin-bottom:4px; color:#cbd5e1;">বার্তা</label>
                            <textarea rows="3" disabled placeholder="আপনার প্রশ্ন বা মন্তব্য" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #1f2937; background:#020617; color:#e5e7eb;"></textarea>
                        </div>
                    `;
                }
            }

            // Initial load
            loadContactPreview();
            loadFormFieldsPreview();

            // Listen for updates from Home contact section
            window.addEventListener('storage', (e) => {
                if (e.key === 'refreshContactForm') {
                    loadContactPreview();
                    loadFormFieldsPreview();
                }
            });

            // Polling fallback
            let lastRefresh = localStorage.getItem('refreshContactForm');
            setInterval(() => {
                const currentRefresh = localStorage.getItem('refreshContactForm');
                if (currentRefresh !== lastRefresh) {
                    lastRefresh = currentRefresh;
                    loadContactPreview();
                    loadFormFieldsPreview();
                }
            }, 1000);
        })();
    </script>
</div>


