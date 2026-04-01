@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>গ্যালারি ম্যানেজমেন্ট</h2>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> নতুন গ্যালারি যোগ করুন
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @if($galleries->count() > 0)
                        <div class="row g-4">
                            @foreach($galleries as $gallery)
                            @php
                                $imagePath = filter_var($gallery->image, FILTER_VALIDATE_URL) 
                                    ? $gallery->image 
                                    : asset('storage/' . $gallery->image);
                                
                                $categoryLabels = [
                                    'exterior' => 'এক্সটেরিয়র',
                                    'interior' => 'ইন্টেরিয়র',
                                    'landscape' => 'ল্যান্ডস্কেপ',
                                    'amenities' => 'সুবিধাসমূহ'
                                ];
                            @endphp
                            
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100">
                                    <div style="position: relative; height: 200px; overflow: hidden;">
                                        <img src="{{ $imagePath }}" alt="{{ $gallery->title_bn }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        <span style="position: absolute; top: 10px; right: 10px; background: rgba(10,77,46,0.9); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                            {{ $categoryLabels[$gallery->category] ?? $gallery->category }}
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-2">{{ $gallery->title_bn }}</h6>
                                        @if($gallery->title)
                                            <p class="card-text text-muted small mb-2">{{ $gallery->title }}</p>
                                        @endif
                                        <p class="card-text text-muted small">Order: {{ $gallery->order }}</p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-primary flex-fill">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="flex-fill gallery-delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger w-100">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-images fa-3x mb-3"></i>
                            <p>কোনো গ্যালারি আইটেম নেই। নতুন যোগ করুন।</p>
                            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> নতুন গ্যালারি যোগ করুন
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

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

<script>
    // Professional Modal Functions
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

    // Attach confirm to all gallery delete forms
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.gallery-delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const confirmed = await showGalleryConfirm('আপনি কি নিশ্চিত এই গ্যালারি মুছে ফেলতে চান?', 'গ্যালারি মুছুন');
                if (confirmed) {
                    this.submit();
                }
            });
        });
    });
</script>

