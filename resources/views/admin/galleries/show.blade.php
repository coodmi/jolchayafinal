@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>গ্যালারি বিস্তারিত</h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> সম্পাদনা করুন
                    </a>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> ফিরে যান
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
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

                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ $imagePath }}" alt="{{ $gallery->title_bn }}" class="img-fluid rounded" style="max-height: 500px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th style="width: 40%;">বাংলা শিরোনাম:</th>
                                    <td>{{ $gallery->title_bn }}</td>
                                </tr>
                                @if($gallery->title)
                                <tr>
                                    <th>English Title:</th>
                                    <td>{{ $gallery->title }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>ক্যাটাগরি:</th>
                                    <td>
                                        <span class="badge bg-success">{{ $categoryLabels[$gallery->category] ?? $gallery->category }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ক্রম:</th>
                                    <td>{{ $gallery->order }}</td>
                                </tr>
                                <tr>
                                    <th>তৈরি হয়েছে:</th>
                                    <td>{{ $gallery->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>আপডেট হয়েছে:</th>
                                    <td>{{ $gallery->updated_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            </table>

                            <div class="mt-3">
                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> সম্পাদনা করুন
                                </a>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                                    <i class="fas fa-trash"></i> মুছে ফেলুন
                                </button>
                            </div>

                            <form id="deleteForm" action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

