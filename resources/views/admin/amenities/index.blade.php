@php
    use Illuminate\Support\Str;
@endphp

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background: #eef2f7;
        font-family: 'Inter', sans-serif;
    }

    .header-bar {
        padding: 30px 0;
        background: white;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 30px;
    }

    .btn-primary-custom {
        background: #2563eb;
        color: white;
        padding: 10px 20px;
        border-radius: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary-custom:hover {
        background: #1d4ed8;
        color: white;
    }

    /* New Card Design */
    .amenity-card {
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.85);
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    .amenity-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .amenity-img {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .amenity-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .amenity-card:hover img {
        transform: scale(1.1);
        filter: brightness(0.9);
    }

    .amenity-body {
        padding: 18px;
    }

    .amenity-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 6px;
    }

    .amenity-desc {
        color: #64748b;
        font-size: 0.9rem;
        height: 38px;
        overflow: hidden;
    }

    /* Buttons */
    .btn-edit-glass {
        /* background: rgba(37, 99, 235, 0.10); */
        color: #2563eb;
        /* padding: 6px 16px; */
        /* border-radius: 10px; */
        transition: 0.3s;
        font-weight: 600;
    }

    /* .btn-edit-glass:hover {
        background: #2563eb;
        color: white;
    } */

    .btn-delete-glass {
        /* background: rgba(239, 68, 68, 0.10); */
        background: none;
        color: #ef4444;
        /* padding: 6px 16px; */
        /* border-radius: 10px; */
        transition: 0.3s;
        font-weight: 600;
    }
    a{
        text-decoration: none;
    }

    /* .btn-delete-glass:hover {
        background: #ef4444;
        color: white;
    } */

    /* .empty-box {
        padding: 60px;
        text-align: center;
        border-radius: 25px;
        background: white;
        border: 2px dashed #cbd5e1;
    } */
</style>


<!-- Header -->
<header class="header-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold mb-1">প্রকল্পের হাইলাইটস</h2>
            <p class="text-muted small mb-0">আপনার প্রকল্পের বিশেষ বৈশিষ্ট্যগুলো পরিচালনা করুন</p>
        </div>
        <a href="{{ route('admin.amenities.create') }}" class="btn-primary-custom">
            <i class="fas fa-plus"></i> হাইলাইট যুক্ত করুন
        </a>
    </div>
</header>


<section class="pb-5">
    <div class="container">

        <div class="row g-4">
            @forelse($amenities as $amenity)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="amenity-card">

                        <!-- Image -->
                        <div class="amenity-img">
                            @if ($amenity->image)
                                @if (Str::startsWith($amenity->image, 'http'))
                                    <img src="{{ $amenity->image }}" alt="{{ $amenity->title }}">
                                @else
                                    <img src="{{ asset('storage/' . $amenity->image) }}" alt="{{ $amenity->title }}">
                                @endif
                            @else
                                <img src="https://placehold.co/600x400?text=No+Image" alt="No Image">
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="amenity-body">
                            <div class="amenity-title">{{ $amenity->title }}</div>
                            <div class="amenity-desc">{{ $amenity->short_description }}</div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between  mt-3">
                                <a href="{{ route('admin.amenities.edit', $amenity->id) }}" class="btn-edit-glass">
                                    <i class="fas fa-pen"></i> Edit
                                </a>

                                <form method="POST" action="{{ route('admin.amenities.destroy', $amenity->id) }}"
                                    class="amenity-delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete-glass border-0">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @empty

                <div class="col-12">
                    <div class="empty-box">
                        <i class="fas fa-layer-group fs-1 text-secondary mb-3"></i>
                        <h4 class="fw-bold text-secondary">কোন হাইলাইট পাওয়া যায়নি</h4>
                        <p class="text-muted">নিচে ক্লিক করে আপনার প্রথম হাইলাইট যুক্ত করুন</p>

                        <a href="{{ route('admin.amenities.create') }}" class="btn-primary-custom">
                            <i class="fas fa-plus"></i> হাইলাইট যুক্ত করুন
                        </a>
                    </div>
                </div>

            @endforelse
        </div>

    </div>
</section>
<!-- Professional Confirmation Modal -->
<div id="amenityConfirmModal" class="amenity-confirm-modal">
    <div class="amenity-confirm-modal-content">
        <div class="amenity-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="amenityConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="amenityConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="amenity-confirm-modal-actions">
            <button class="amenity-confirm-btn amenity-confirm-btn-cancel" id="amenityConfirmModalCancel">বাতিল করুন</button>
            <button class="amenity-confirm-btn amenity-confirm-btn-confirm" id="amenityConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
        </div>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .amenity-confirm-modal {
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

    .amenity-confirm-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .amenity-confirm-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .amenity-confirm-modal-icon {
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

    .amenity-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #amenityConfirmModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #amenityConfirmModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .amenity-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .amenity-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .amenity-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .amenity-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .amenity-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .amenity-confirm-btn-confirm:hover {
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
    function showAmenityConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('amenityConfirmModal');
            const titleEl = document.getElementById('amenityConfirmModalTitle');
            const messageEl = document.getElementById('amenityConfirmModalMessage');
            const confirmBtn = document.getElementById('amenityConfirmModalConfirm');
            const cancelBtn = document.getElementById('amenityConfirmModalCancel');
            
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

    // Attach confirm to all amenity delete forms
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.amenity-delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const confirmed = await showAmenityConfirm('আপনি কি নিশ্চিত এই হাইলাইট মুছে ফেলতে চান?', 'হাইলাইট মুছুন');
                if (confirmed) {
                    this.submit();
                }
            });
        });
    });
</script>