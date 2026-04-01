<div id="features" class="tab-content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">ফিচার সেকশন ম্যানেজ করুন</h5>
        </div>
        <div class="card-body">
            <!-- Feature Settings Form -->
            <form id="feature-settings-form">
                <div class="mb-3">
                    <label for="feature-section-title" class="form-label">সেকশন শিরোনাম (Title)</label>
                    <input type="text" class="form-control" id="feature-section-title" name="section_title" placeholder="আমাদের সুবিধাসমূহ" required>
                </div>
                <div class="mb-3">
                    <label for="feature-section-subtitle" class="form-label">সেকশন সাব-শিরোনাম (Subtitle)</label>
                    <input type="text" class="form-control" id="feature-section-subtitle" name="section_subtitle" placeholder="NEX Real Estate এর একটি প্রকল্প">
                </div>
                <button type="submit" class="btn btn-primary">সেটিংস সেভ করুন</button>
            </form>
        </div>
    </div>

    <!-- Features Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">সকল ফিচার</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-feature-modal">
                নতুন ফিচার যোগ করুন
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>আইকন</th>
                            <th>টাইটেল</th>
                            <th>বর্ণনা</th>
                            <th>একশন</th>
                        </tr>
                    </thead>
                    <tbody id="features-table-body">
                        <!-- Dynamic content will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Feature Modal -->
<div class="modal fade" id="add-feature-modal" tabindex="-1" aria-labelledby="addFeatureModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFeatureModalLabel">নতুন ফিচার যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-feature-form" enctype="multipart/form-data">
                    <input type="hidden" id="feature-id" name="id">
                    <div class="mb-3">
                        <label for="feature-icon" class="form-label">ফিচার আইকন</label>
                        <input type="file" class="form-control" id="feature-icon" name="icon" accept="image/*">
                        <img id="feature-icon-preview" src="" alt="Icon Preview" class="img-thumbnail mt-2" style="display:none; max-width: 100px;">
                    </div>
                    <div class="mb-3">
                        <label for="feature-modal-title" class="form-label">টাইটেল</label>
                        <input type="text" class="form-control" id="feature-modal-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="feature-description" class="form-label">বর্ণনা</label>
                        <textarea class="form-control" id="feature-description" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">সাবমিট</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const API_TOKEN = '{{ csrf_token() }}';
    const featureSettingsForm = document.getElementById('feature-settings-form');
    const featuresTableBody = document.getElementById('features-table-body');
    const addFeatureForm = document.getElementById('add-feature-form');
    const addFeatureModal = new bootstrap.Modal(document.getElementById('add-feature-modal'));
    const featureIconPreview = document.getElementById('feature-icon-preview');

    // Fetch and display feature settings
    fetch('/api/feature-settings')
        .then(response => response.json())
        .then(data => {
            if (data) {
                document.getElementById('feature-section-title').value = data.section_title || '';
                document.getElementById('feature-section-subtitle').value = data.section_subtitle || '';
            }
        })
        .catch(error => {
            console.error('Error loading feature settings:', error);
        });

    // Save feature settings
    featureSettingsForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        
        // Disable button and show loading
        submitButton.disabled = true;
        submitButton.textContent = 'সেভ হচ্ছে...';
        
        fetch('/admin/feature-settings', {
            method: 'POST',
            headers: { 
                'X-CSRF-TOKEN': API_TOKEN,
                'Accept': 'application/json'
            },
            body: new URLSearchParams(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showFeatureAlert('সেকশন শিরোনাম ও সাব-শিরোনাম সফলভাবে আপডেট হয়েছে!', 'success');
                // Optionally reload the page to see changes
                // window.location.reload();
            } else {
                showFeatureAlert('একটি ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন।', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showFeatureAlert('একটি ত্রুটি হয়েছে: ' + error.message, 'error');
        })
        .finally(() => {
            // Re-enable button
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        });
    });

    // Fetch and display all features
    function loadFeatures() {
        fetch('/api/features')
            .then(response => response.json())
            .then(data => {
                featuresTableBody.innerHTML = '';
                data.forEach(feature => {
                    const row = `
                        <tr>
                            <td><img src="${feature.icon_url}" alt="${feature.title}" width="50"></td>
                            <td>${feature.title}</td>
                            <td>${feature.description}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="editFeature(${feature.id})">এডিট</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteFeature(${feature.id})">ডিলিট</button>
                            </td>
                        </tr>
                    `;
                    featuresTableBody.insertAdjacentHTML('beforeend', row);
                });
            });
    }

    // Handle "Add/Edit" form submission
    addFeatureForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const featureId = formData.get('id');
        const url = featureId ? `/admin/features/${featureId}` : '/admin/features';
        const method = featureId ? 'PUT' : 'POST';

        // Add a shim for PUT requests
        if(method === 'PUT') {
            formData.append('_method', 'PUT');
        }

        fetch(url, {
            method: 'POST', // Using POST for multipart forms, with _method for Laravel
            headers: { 'X-CSRF-TOKEN': API_TOKEN, 'Accept': 'application/json' },
            body: formData
        })
        .then(response => {
             if (!response.ok) {
                return response.json().then(err => { throw new Error(err.message) });
             }
             return response.json();
        })
        .then(data => {
            if (data.success) {
                addFeatureModal.hide();
                loadFeatures();
                showFeatureAlert('ফিচার সফলভাবে সেভ হয়েছে!', 'success');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showFeatureAlert('একটি ত্রুটি হয়েছে: ' + error.message, 'error');
        });
    });

    // Edit a feature
    window.editFeature = function(id) {
        fetch(`/api/features?id=${id}`)
            .then(response => response.json())
            .then(feature => {
                document.getElementById('feature-id').value = feature.id;
                document.getElementById('feature-modal-title').value = feature.title;
                document.getElementById('feature-description').value = feature.description;
                
                if (feature.icon_url) {
                    featureIconPreview.src = feature.icon_url;
                    featureIconPreview.style.display = 'block';
                } else {
                    featureIconPreview.style.display = 'none';
                }

                document.getElementById('addFeatureModalLabel').textContent = 'ফিচার এডিট করুন';
                addFeatureModal.show();
            });
    };

    // Delete a feature
    window.deleteFeature = async function(id) {
        const confirmed = await showFeatureConfirm('আপনি কি এই ফিচারটি ডিলিট করতে চান?', 'ফিচার মুছুন');
        if (!confirmed) return;

        fetch(`/admin/features/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': API_TOKEN }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadFeatures();
                showFeatureAlert('ফিচার সফলভাবে ডিলিট হয়েছে!', 'success');
            } else {
                showFeatureAlert('ফিচার ডিলিট করতে সমস্যা হয়েছে', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showFeatureAlert('ফিচার ডিলিট করতে সমস্যা হয়েছে', 'error');
        });
    };

    // Reset modal on close
    document.getElementById('add-feature-modal').addEventListener('hidden.bs.modal', function () {
        addFeatureForm.reset();
        document.getElementById('feature-id').value = '';
        featureIconPreview.style.display = 'none';
        document.getElementById('addFeatureModalLabel').textContent = 'নতুন ফিচার যোগ করুন';
    });

    // Preview icon on file select
    document.getElementById('feature-icon').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                featureIconPreview.src = event.target.result;
                featureIconPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    loadFeatures();
});
</script>

<!-- Professional Confirmation Modal -->
<div id="featureConfirmModal" class="feature-confirm-modal">
    <div class="feature-confirm-modal-content">
        <div class="feature-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="featureConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="featureConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="feature-confirm-modal-actions">
            <button class="feature-confirm-btn feature-confirm-btn-cancel" id="featureConfirmModalCancel">বাতিল করুন</button>
            <button class="feature-confirm-btn feature-confirm-btn-confirm" id="featureConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
        </div>
    </div>
</div>

<!-- Professional Alert Modal -->
<div id="featureAlertModal" class="feature-alert-modal">
    <div class="feature-alert-modal-content">
        <div class="feature-alert-modal-icon" id="featureAlertModalIcon">
            <svg class="feature-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="feature-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="feature-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <svg class="feature-errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="feature-errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="feature-errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
            </svg>
        </div>
        <h3 id="featureAlertModalTitle"></h3>
        <p id="featureAlertModalMessage"></p>
        <button class="feature-alert-modal-btn" id="featureAlertModalBtn">ঠিক আছে</button>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .feature-confirm-modal, .feature-alert-modal {
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

    .feature-confirm-modal.active, .feature-alert-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-confirm-modal-content, .feature-alert-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .feature-confirm-modal-icon {
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

    .feature-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #featureConfirmModalTitle, #featureAlertModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #featureConfirmModalMessage, #featureAlertModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .feature-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .feature-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .feature-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .feature-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .feature-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .feature-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    }

    /* Alert Modal Styles */
    .feature-alert-modal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .feature-alert-modal-icon svg {
        width: 100%;
        height: 100%;
    }

    .feature-checkmark, .feature-errormark {
        display: none;
    }

    .feature-alert-modal-content.success .feature-checkmark {
        display: block;
    }

    .feature-alert-modal-content.error .feature-errormark {
        display: block;
    }

    .feature-checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #10b981;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .feature-checkmark__check {
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: #10b981;
        stroke-width: 3;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
    }

    .feature-errormark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #dc2626;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .feature-errormark__cross {
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

    .feature-alert-modal-btn {
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

    .feature-alert-modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
    }

    .feature-alert-modal-content.error .feature-alert-modal-btn {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }
</style>

<script>
    // Professional Modal Functions
    function showFeatureConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('featureConfirmModal');
            const titleEl = document.getElementById('featureConfirmModalTitle');
            const messageEl = document.getElementById('featureConfirmModalMessage');
            const confirmBtn = document.getElementById('featureConfirmModalConfirm');
            const cancelBtn = document.getElementById('featureConfirmModalCancel');
            
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

    function showFeatureAlert(message, type = 'success', title = '') {
        const modal = document.getElementById('featureAlertModal');
        const content = modal.querySelector('.feature-alert-modal-content');
        const titleEl = document.getElementById('featureAlertModalTitle');
        const messageEl = document.getElementById('featureAlertModalMessage');
        const btn = document.getElementById('featureAlertModalBtn');
        
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
