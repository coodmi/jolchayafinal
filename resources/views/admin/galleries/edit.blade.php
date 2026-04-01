@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>গ্যালারি সম্পাদনা করুন</h2>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> ফিরে যান
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title_bn" class="form-label">বাংলা শিরোনাম *</label>
                                <input type="text" class="form-control" id="title_bn" name="title_bn" value="{{ old('title_bn', $gallery->title_bn) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">English Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery->title) }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">ক্যাটাগরি *</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="exterior" {{ old('category', $gallery->category) == 'exterior' ? 'selected' : '' }}>এক্সটেরিয়র</option>
                                    <option value="interior" {{ old('category', $gallery->category) == 'interior' ? 'selected' : '' }}>ইন্টেরিয়র</option>
                                    <option value="landscape" {{ old('category', $gallery->category) == 'landscape' ? 'selected' : '' }}>ল্যান্ডস্কেপ</option>
                                    <option value="amenities" {{ old('category', $gallery->category) == 'amenities' ? 'selected' : '' }}>সুবিধাসমূহ</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">ক্রম (Order)</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $gallery->order) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">ছবি URL *</label>
                            <input type="url" class="form-control" id="image" name="image" value="{{ old('image', $gallery->image) }}" required placeholder="https://images.unsplash.com/...">
                            <small class="text-muted">Unsplash বা অন্য কোনো ছবির URL লিখুন</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">বর্তমান ছবি</label>
                            <div>
                                <img id="currentImg" src="{{ filter_var($gallery->image, FILTER_VALIDATE_URL) ? $gallery->image : asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title_bn }}" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> আপডেট করুন
                            </button>
                            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">বাতিল করুন</a>
                            <button type="button" class="btn btn-danger ms-auto" onclick="confirmDelete()">
                                <i class="fas fa-trash"></i> মুছে ফেলুন
                            </button>
                        </div>
                    </form>

                    <form id="deleteForm" action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('input', function(e) {
        const url = e.target.value.trim();
        const img = document.getElementById('currentImg');
        
        if (url && url.startsWith('http')) {
            img.src = url;
        }
    });

    async function confirmDelete() {
        const confirmed = await showGalleryConfirm('আপনি কি নিশ্চিত এই গ্যালারি আইটেম মুছতে চান?', 'গ্যালারি মুছুন');
        if (confirmed) {
            document.getElementById('deleteForm').submit();
        }
    }
    
    function showGalleryConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('galleryConfirmModal');
            const titleEl = document.getElementById('galleryConfirmModalTitle');
            const messageEl = document.getElementById('galleryConfirmModalMessage');
            const confirmBtn = document.getElementById('galleryConfirmModalConfirm');
            const cancelBtn = document.getElementById('galleryConfirmModalCancel');
            
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
</script>

<!-- Professional Confirmation Modal -->
<div id="galleryConfirmModal" class="gallery-confirm-modal">
    <div class="gallery-confirm-modal-content">
        <div class="gallery-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="galleryConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="galleryConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="gallery-confirm-modal-actions">
            <button class="gallery-confirm-btn gallery-confirm-btn-cancel" id="galleryConfirmModalCancel">বাতিল করুন</button>
            <button class="gallery-confirm-btn gallery-confirm-btn-confirm" id="galleryConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
        </div>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .gallery-confirm-modal {
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

    .gallery-confirm-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-confirm-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .gallery-confirm-modal-icon {
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

    .gallery-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #galleryConfirmModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #galleryConfirmModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .gallery-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .gallery-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .gallery-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .gallery-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .gallery-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .gallery-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
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
</style>

