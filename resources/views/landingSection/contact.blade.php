   <!-- Professional Alert Modal -->
    <div id="professionalAlertModal" class="professional-modal">
        <div class="professional-modal-content">
            <div class="professional-modal-icon" id="professionalModalIcon">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                <svg class="errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
                </svg>
            </div>
            <h3 id="professionalModalTitle"></h3>
            <p id="professionalModalSubtitle" style="font-size:0.95rem; color:#198754; font-weight:600; margin-bottom:0.5rem; display:none;"></p>
            <p id="professionalModalMessage"></p>
            <button class="professional-modal-btn" id="professionalModalBtn">ঠিক আছে</button>
        </div>
    </div>

    <style>
        .professional-modal {
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

        .professional-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .professional-modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 400px;
            width: 90%;
            animation: slideUp 0.4s ease;
            position: relative;
        }

        .professional-modal-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
        }

        .professional-modal-icon svg {
            width: 100%;
            height: 100%;
        }

        .checkmark, .errormark {
            display: none;
        }

        .professional-modal-content.success .checkmark {
            display: block;
        }

        .professional-modal-content.error .errormark {
            display: block;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke: #4CAF50;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark__check {
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke: #4CAF50;
            stroke-width: 3;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
        }

        .errormark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke: #f44336;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .errormark__cross {
            stroke-dasharray: 54;
            stroke-dashoffset: 54;
            stroke: #f44336;
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

        #professionalModalTitle {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
        }

        #professionalModalMessage {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .professional-modal-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.875rem 2.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .professional-modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .professional-modal-btn:active {
            transform: translateY(0);
        }

        .professional-modal-content.success .professional-modal-btn {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
        }

        .professional-modal-content.error .professional-modal-btn {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.4);
        }
    </style>

    <section id="contact" class="contact">
        <h2 class="section-title" id="contactTitle"></h2>
        <p class="section-subtitle" id="contactSubtitle"></p>
        <div  class="contact-content">
            <div class="contact-info" style="background: #f8f9fa; padding: 2rem; border-radius: 10px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 2rem;">
                <div class="contact-item" style="background: none; box-shadow: none;">
                    <div class="contact-icon" id="contactPhoneIcon">📞</div>
                    <div class="contact-details">
                        <h3 id="contactPhoneLabel"></h3>
                        <p id="contactPhoneNumbers"></p>
                    </div>
                </div>
                <div class="contact-item" style="background: none; box-shadow: none;">
                    <div class="contact-icon" id="contactEmailIcon">✉️</div>
                    <div class="contact-details">
                        <h3 id="contactEmailLabel"></h3>
                        <p id="contactEmailAddress"></p>
                    </div>
                </div>
                <div class="contact-item" style="background: none; box-shadow: none;">
                    <div class="contact-icon" id="contactWebIcon">🌐</div>
                    <div class="contact-details">
                        <h3 id="contactWebLabel"></h3>
                        <p id="contactWebAddress"></p>
                    </div>
                </div>
                <div class="contact-item" style="background: none; box-shadow: none;">
                    <div class="contact-icon" id="contactAddressIcon">📍</div>
                    <div class="contact-details">
                        <h3 id="contactAddressLabel"></h3>
                        <p id="contactAddressText"></p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <span id="booking" style="display:block; visibility:hidden; height:0; position:absolute;"></span>
                <h3 style="margin-bottom: 2rem;" id="contactFormTitle"></h3>
                <form id="dynamicContactForm">
                    <div id="dynamicFormFields"></div>
                    <button type="submit" class="btn btn-primary" id="contactSubmitBtn">পাঠান</button>
                </form>
            </div>
        </div>
        <script>
            // Professional Modal Function
            function showProfessionalAlert(message, type = 'success', title = '') {
                const modal = document.getElementById('professionalAlertModal');
                const content = modal.querySelector('.professional-modal-content');
                const titleEl = document.getElementById('professionalModalTitle');
                const subtitleEl = document.getElementById('professionalModalSubtitle');
                const messageEl = document.getElementById('professionalModalMessage');
                const btn = document.getElementById('professionalModalBtn');
                
                if (!title) {
                    title = type === 'success' ? 'সফল!' : 'দুঃখিত!';
                }
                
                content.classList.remove('success', 'error');
                content.classList.add(type);
                
                titleEl.textContent = title;
                messageEl.textContent = message;

                // Show a friendly subtitle for success
                if (type === 'success') {
                    subtitleEl.textContent = 'আপনার বার্তা আমরা পেয়েছি ✓';
                    subtitleEl.style.display = 'block';
                } else {
                    subtitleEl.style.display = 'none';
                }
                
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

            (function(){
                const els = {
                    title: document.getElementById('contactTitle'),
                    subtitle: document.getElementById('contactSubtitle'),
                    phoneIcon: document.getElementById('contactPhoneIcon'),
                    phoneLabel: document.getElementById('contactPhoneLabel'),
                    phoneNumbers: document.getElementById('contactPhoneNumbers'),
                    emailIcon: document.getElementById('contactEmailIcon'),
                    emailLabel: document.getElementById('contactEmailLabel'),
                    emailAddress: document.getElementById('contactEmailAddress'),
                    webIcon: document.getElementById('contactWebIcon'),
                    webLabel: document.getElementById('contactWebLabel'),
                    webAddress: document.getElementById('contactWebAddress'),
                    addressIcon: document.getElementById('contactAddressIcon'),
                    addressLabel: document.getElementById('contactAddressLabel'),
                    addressText: document.getElementById('contactAddressText'),
                    formTitle: document.getElementById('contactFormTitle')
                };
                async function loadContactSettings(){
                    try {
                        const response = await fetch('/api/contact-settings');
                        const s = await response.json();
                        
                    if (els.title && s.title) els.title.textContent = s.title;
                    if (els.subtitle && s.subtitle) els.subtitle.textContent = s.subtitle;
                        if (els.phoneIcon && s.phone_icon) els.phoneIcon.textContent = s.phone_icon;
                        if (els.phoneLabel && s.phone_label) els.phoneLabel.textContent = s.phone_label;
                        if (els.phoneNumbers && s.phone_numbers) els.phoneNumbers.innerHTML = s.phone_numbers;
                        if (els.emailIcon && s.email_icon) els.emailIcon.textContent = s.email_icon;
                        if (els.emailLabel && s.email_label) els.emailLabel.textContent = s.email_label;
                        if (els.emailAddress && s.email_address) els.emailAddress.innerHTML = s.email_address;
                        if (els.webIcon && s.web_icon) els.webIcon.textContent = s.web_icon;
                        if (els.webLabel && s.web_label) els.webLabel.textContent = s.web_label;
                        if (els.webAddress && s.web_address) els.webAddress.textContent = s.web_address;
                        if (els.addressIcon && s.address_icon) els.addressIcon.textContent = s.address_icon;
                        if (els.addressLabel && s.address_label) els.addressLabel.textContent = s.address_label;
                        if (els.addressText && s.address_text) els.addressText.innerHTML = s.address_text;
                        if (els.formTitle && s.form_title) els.formTitle.textContent = s.form_title;
                        // Apply dynamic colors
                        const contactForm = document.querySelector('.contact-form');
                        if (contactForm && s.form_bg_color) contactForm.style.background = s.form_bg_color;
                        const submitBtn = document.getElementById('contactSubmitBtn');
                        if (submitBtn) {
                            if (s.btn_color) submitBtn.style.background = s.btn_color;
                            if (s.btn_text_color) submitBtn.style.color = s.btn_text_color;
                        }
                    } catch (error) {
                        console.error('Error loading contact settings:', error);
                        // Keep default values if API fails
                    }
                }
                
                // Load on page load
                loadContactSettings();
            })();

            // Dynamic Form Fields
            (function(){
                const fieldsContainer = document.getElementById('dynamicFormFields');
                const submitBtn = document.getElementById('contactSubmitBtn');
                let formFields = [];

                async function loadFormFields() {
                    try {
                        const response = await fetch('/api/contact-form-fields');
                        formFields = await response.json();
                        renderFormFields();
                    } catch (error) {
                        console.error('Error loading form fields:', error);
                        // Fallback to default fields
                        renderDefaultFields();
                    }
                }

                function renderFormFields() {
                    if (!fieldsContainer) return;
                    fieldsContainer.innerHTML = '';

                    if (formFields.length === 0) {
                        renderDefaultFields();
                        return;
                    }

                    formFields.forEach((field, index) => {
                        const formGroup = document.createElement('div');
                        formGroup.className = 'form-group';

                        const label = document.createElement('label');
                        label.textContent = field.label;
                        formGroup.appendChild(label);

                        const isFirstField = index === 0;
                        const isLastField = index === formFields.length - 1;
                        
                        let input;
                        // First field is always normal input, last field is always textarea
                        if (isLastField || (field.type === 'textarea' && !isFirstField)) {
                            input = document.createElement('textarea');
                            // Last field gets extra height
                            if (isLastField) {
                                input.style.minHeight = '120px';
                                input.style.height = '120px';
                            }
                        } else {
                            input = document.createElement('input');
                            input.type = isFirstField ? 'text' : field.type;
                        }
                        
                        input.placeholder = field.placeholder || '';
                        if (field.required) {
                            input.required = true;
                        }
                        
                        formGroup.appendChild(input);
                        fieldsContainer.appendChild(formGroup);
                    });
                }

                function renderDefaultFields() {
                    fieldsContainer.innerHTML = `
                        <div class="form-group">
                            <label>নাম</label>
                            <input type="text" placeholder="আপনার নাম লিখুন" required>
                        </div>
                        <div class="form-group">
                            <label>ফোন নম্বর</label>
                            <input type="tel" placeholder="আপনার ফোন নম্বর" required>
                        </div>
                        <div class="form-group">
                            <label>ইমেইল</label>
                            <input type="email" placeholder="আপনার ইমেইল ঠিকানা" required>
                        </div>
                        <div class="form-group">
                            <label>আপনি কতটি শেয়ার কিনতে চাচ্ছেন</label>
                            <input type="text" placeholder="৩/২/৫/৮/১০">
                        </div>
                        <div class="form-group">
                            <label>বার্তা</label>
                            <textarea placeholder="আপনার প্রশ্ন বা মন্তব্য"></textarea>
                        </div>
                    `;
                }

                function loadSubmitButtonText() {
                    fetch('/admin/contact-form-button', { cache: 'no-store' })
                        .then(r => r.json())
                        .then(s => { if (submitBtn && s.buttonText) submitBtn.textContent = s.buttonText; })
                        .catch(() => {});
                }

                // Watch for changes from admin (storage event from other tabs)
                window.addEventListener('storage', (e) => {
                    if (e.key === 'refreshContactForm') {
                        loadFormFields();
                        loadSubmitButtonText();
                    }
                });

                loadFormFields();
                loadSubmitButtonText();

                // Handle form submission
                const form = document.getElementById('dynamicContactForm');
                if (form) {
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        
                        const submitBtn = document.getElementById('contactSubmitBtn');
                        const originalText = submitBtn.textContent;
                        
                        // Collect form data
                        const formData = {};
                        const inputs = form.querySelectorAll('input, textarea, select');
                        
                        inputs.forEach(input => {
                            const label = input.previousElementSibling?.textContent || '';
                            
                            // Map to expected field names
                            if (label.includes('নাম') || label.toLowerCase().includes('name')) {
                                formData.name = input.value;
                            } else if (label.includes('ফোন') || label.toLowerCase().includes('phone')) {
                                formData.phone = input.value;
                            } else if (label.includes('ইমেইল') || label.toLowerCase().includes('email')) {
                                formData.email = input.value;
                            } else if (label.includes('প্লট') || label.toLowerCase().includes('plot')) {
                                formData.plot_size = input.value;
                            } else if (label.includes('বার্তা') || label.toLowerCase().includes('message')) {
                                formData.message = input.value;
                            }
                        });

                        // Validate
                        if (!formData.name || !formData.phone || !formData.email) {
                            showProfessionalAlert('অনুগ্রহ করে সকল প্রয়োজনীয় তথ্য পূরণ করুন', 'error', 'তথ্য অসম্পূর্ণ');
                            return;
                        }

                        // Show loading
                        submitBtn.textContent = 'পাঠানো হচ্ছে...';
                        submitBtn.disabled = true;

                        try {
                            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
                            
                            if (!csrfToken) {
                                throw new Error('CSRF token not found');
                            }
                            
                            const response = await fetch('/api/bookings', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify(formData)
                            });

                            if (!response.ok) {
                                const errorData = await response.json().catch(() => ({ message: 'Server error' }));
                                throw new Error(errorData.message || (errorData.errors ? JSON.stringify(errorData.errors) : 'Submission failed'));
                            }

                            const result = await response.json();

                            if (result.success) {
                                showProfessionalAlert(
                                    'আপনার বার্তা সফলভাবে পাঠানো হয়েছে। আমাদের টিম শীঘ্রই আপনার সাথে যোগাযোগ করবে।',
                                    'success',
                                    '🎉 ধন্যবাদ!'
                                );
                                form.reset();
                            } else {
                                throw new Error(result.message || 'Submission failed');
                            }
                        } catch (error) {
                            console.error('Error submitting booking:', error);
                            const errorMessage = error.message || 'বুকিং জমা দিতে ব্যর্থ হয়েছে';
                            showProfessionalAlert(errorMessage + '। অনুগ্রহ করে আবার চেষ্টা করুন।', 'error', 'ত্রুটি!');
                        } finally {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        }
                    });
                }
            })();
        </script>
    </section>