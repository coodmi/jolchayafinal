@extends('admin.layouts')

@section('content')
<!-- Toast Notification -->
@if(session('success'))
<div id="toast" class="toast toast-success">
    <i class="fas fa-check-circle"></i>
    <span>{{ session('success') }}</span>
</div>
@endif

<div class="content-header">
    <div>
        <a href="{{ route('admin.registrations.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> ফিরে যান
        </a>
        <h1>রেজিস্ট্রেশন বিস্তারিত</h1>
        <p>{{ $registration->application_number }}</p>
    </div>
    <div class="header-actions">
        <a href="{{ route('admin.registrations.print', $registration) }}" class="btn btn-outline" target="_blank">
            <i class="fas fa-print"></i> প্রিন্ট
        </a>
        <a href="{{ route('admin.registrations.edit', $registration) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> এডিট
        </a>
    </div>
</div>

<div class="detail-grid">
    <!-- Status Card -->
    <div class="detail-card status-card">
        <div class="status-header">
            <span class="status-badge status-{{ $registration->status }}">{{ $registration->status_bengali }}</span>
            <div class="status-actions">
                <select id="statusSelect" class="status-select">
                    <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>অপেক্ষমাণ</option>
                    <option value="processing" {{ $registration->status == 'processing' ? 'selected' : '' }}>প্রক্রিয়াধীন</option>
                    <option value="approved" {{ $registration->status == 'approved' ? 'selected' : '' }}>অনুমোদিত</option>
                    <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>বাতিল</option>
                </select>
                <button class="btn btn-sm btn-primary" onclick="updateStatus()">আপডেট</button>
            </div>
        </div>
        <div class="detail-row">
            <span>আবেদনের তারিখ</span>
            <strong>{{ $registration->created_at->format('d M Y, h:i A') }}</strong>
        </div>
        <div class="detail-row">
            <span>সর্বশেষ আপডেট</span>
            <strong>{{ $registration->updated_at->format('d M Y, h:i A') }}</strong>
        </div>
    </div>

    <!-- Applicant Info -->
    <div class="detail-card">
        <div class="card-header">
            <i class="fas fa-user"></i>
            <h3>আবেদনকারীর তথ্য</h3>
        </div>
        <div class="applicant-profile">
            @if($registration->applicant_photo)
                <img src="{{ Storage::url($registration->applicant_photo) }}" alt="Photo" class="profile-photo">
            @else
                <div class="profile-avatar">{{ substr($registration->applicant_name, 0, 1) }}</div>
            @endif
            <div class="profile-info">
                <h4>{{ $registration->applicant_name }}</h4>
                <p>{{ $registration->mobile }}</p>
            </div>
        </div>
        <div class="detail-list">
            <div class="detail-row">
                <span>পিতার নাম</span>
                <strong>{{ $registration->father_name ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>মাতার নাম</span>
                <strong>{{ $registration->mother_name ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>স্বামী/স্ত্রীর নাম</span>
                <strong>{{ $registration->spouse_name ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>NID/Passport</span>
                <strong>{{ $registration->nid ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>ইমেইল</span>
                <strong>{{ $registration->email ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>জন্ম তারিখ</span>
                <strong>{{ $registration->dob ? $registration->dob->format('d M Y') : '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>জাতীয়তা</span>
                <strong>{{ $registration->nationality ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>ধর্ম</span>
                <strong>{{ $registration->religion ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>বৈবাহিক অবস্থা</span>
                <strong>{{ $registration->marital_status ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>লিঙ্গ</span>
                <strong>{{ $registration->gender ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>পেশা</span>
                <strong>{{ $registration->profession ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>প্রতিষ্ঠান</span>
                <strong>{{ $registration->organization ?? '-' }}</strong>
            </div>
        </div>
        <div class="address-section">
            <div class="address-box">
                <h5>যোগাযোগের ঠিকানা</h5>
                <p>{{ $registration->mailing_address ?? 'উল্লেখ নেই' }}</p>
            </div>
            <div class="address-box">
                <h5>স্থায়ী ঠিকানা</h5>
                <p>{{ $registration->permanent_address ?? 'উল্লেখ নেই' }}</p>
            </div>
        </div>
    </div>

    <!-- Nominee Info -->
    <div class="detail-card">
        <div class="card-header">
            <i class="fas fa-users"></i>
            <h3>নমিনির তথ্য</h3>
        </div>
        @if($registration->nominee_name)
        <div class="applicant-profile">
            @if($registration->nominee_photo)
                <img src="{{ Storage::url($registration->nominee_photo) }}" alt="Photo" class="profile-photo">
            @else
                <div class="profile-avatar">{{ substr($registration->nominee_name, 0, 1) }}</div>
            @endif
            <div class="profile-info">
                <h4>{{ $registration->nominee_name }}</h4>
                <p>{{ $registration->nominee_mobile ?? '' }}</p>
            </div>
        </div>
        <div class="detail-list">
            <div class="detail-row">
                <span>সম্পর্ক</span>
                <strong>{{ $registration->nominee_relation ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>NID/BC</span>
                <strong>{{ $registration->nominee_nid ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>ঠিকানা</span>
                <strong>{{ $registration->nominee_address ?? '-' }}</strong>
            </div>
        </div>
        @else
        <div class="empty-info">
            <i class="fas fa-user-slash"></i>
            <p>নমিনির তথ্য দেওয়া হয়নি</p>
        </div>
        @endif
    </div>

    <!-- Project & Plot Info -->
    <div class="detail-card">
        <div class="card-header">
            <i class="fas fa-map-marker-alt"></i>
            <h3>প্রকল্প ও প্লটের তথ্য</h3>
        </div>
        <div class="detail-list">
            <div class="detail-row highlight">
                <span>প্রকল্পের নাম</span>
                <strong>{{ $registration->project_name ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>প্লটের ধরন</span>
                <strong>{{ $registration->plot_type ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>প্লট নম্বর</span>
                <strong>{{ $registration->plot_no ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>রোড নম্বর</span>
                <strong>{{ $registration->road_no ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>ব্লক নম্বর</span>
                <strong>{{ $registration->block_no ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>মুখ (Facing)</span>
                <strong>{{ $registration->facing ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>আয়তন (কাঠা)</span>
                <strong>{{ $registration->area_katha ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>প্রতি কাঠা দর</span>
                <strong>{{ $registration->rate_per_katha ? '৳ ' . number_format($registration->rate_per_katha, 0) : '-' }}</strong>
            </div>
            <div class="detail-row highlight total">
                <span>মোট মূল্য</span>
                <strong>{{ $registration->total_price ? '৳ ' . number_format($registration->total_price, 0) : '-' }}</strong>
            </div>
        </div>
    </div>

    <!-- Payment Info -->
    <div class="detail-card">
        <div class="card-header">
            <i class="fas fa-credit-card"></i>
            <h3>পেমেন্টের বিবরণ</h3>
        </div>
        <div class="detail-list">
            <div class="detail-row">
                <span>পেমেন্ট মোড</span>
                <strong>{{ $registration->payment_mode ?? '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>বুকিং মানি</span>
                <strong>{{ $registration->booking_money ? '৳ ' . number_format($registration->booking_money, 0) : '-' }}</strong>
            </div>
            <div class="detail-row">
                <span>পেমেন্ট টাইপ</span>
                <strong>{{ $registration->payment_type ?? '-' }}</strong>
            </div>
            @if($registration->cheque_no)
            <div class="detail-row">
                <span>চেক/DD/PO নম্বর</span>
                <strong>{{ $registration->cheque_no }}</strong>
            </div>
            @endif
            @if($registration->bank_name)
            <div class="detail-row">
                <span>ব্যাংক</span>
                <strong>{{ $registration->bank_name }}</strong>
            </div>
            @endif
            
            @if($registration->payment_mode == 'Installment')
            <div class="installment-section">
                <h5>কিস্তির বিবরণ</h5>
                <div class="detail-row">
                    <span>ডাউন পেমেন্ট</span>
                    <strong>{{ $registration->down_payment ? '৳ ' . number_format($registration->down_payment, 0) : '-' }}</strong>
                </div>
                <div class="detail-row">
                    <span>বাকি টাকা</span>
                    <strong>{{ $registration->remaining_amount ? '৳ ' . number_format($registration->remaining_amount, 0) : '-' }}</strong>
                </div>
                <div class="detail-row">
                    <span>কিস্তির সংখ্যা</span>
                    <strong>{{ $registration->no_of_installment ?? '-' }}</strong>
                </div>
                <div class="detail-row">
                    <span>প্রতি কিস্তি</span>
                    <strong>{{ $registration->per_installment ? '৳ ' . number_format($registration->per_installment, 0) : '-' }}</strong>
                </div>
                <div class="detail-row">
                    <span>কিস্তি শুরুর তারিখ</span>
                    <strong>{{ $registration->emi_start_date ? $registration->emi_start_date->format('d M Y') : '-' }}</strong>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    text-decoration: none;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.back-link:hover { color: #059669; }

.detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

@media (max-width: 1024px) {
    .detail-grid { grid-template-columns: 1fr; }
}

.detail-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.detail-card.full-width { grid-column: 1 / -1; }

.status-card {
    background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
    border: 1px solid #d1fae5;
}

.status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.status-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.status-select {
    padding: 0.4rem 0.75rem;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.9rem;
}

.status-badge {
    display: inline-block;
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
}

.status-pending { background: #fef3c7; color: #92400e; }
.status-processing { background: #fce7f3; color: #9d174d; }
.status-approved { background: #d1fae5; color: #065f46; }
.status-rejected { background: #fee2e2; color: #991b1b; }

.card-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #e5e7eb;
}

.card-header i {
    width: 36px;
    height: 36px;
    background: #ecfdf5;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #059669;
}

.card-header h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1f2937;
}

.applicant-profile {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: #f9fafb;
    border-radius: 10px;
}

.profile-photo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 600;
}

.profile-info h4 {
    margin: 0 0 0.25rem;
    font-size: 1.1rem;
    color: #1f2937;
}

.profile-info p {
    margin: 0;
    color: #6b7280;
    font-size: 0.9rem;
}

.detail-list { margin-bottom: 1rem; }

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 0.75rem 0;
    border-bottom: 1px solid #f3f4f6;
}

.detail-row:last-child { border-bottom: none; }

.detail-row span { color: #6b7280; font-size: 0.9rem; }
.detail-row strong { color: #1f2937; }

.detail-row.highlight { background: #f0fdf4; padding: 0.75rem; border-radius: 6px; margin: 0.25rem 0; }
.detail-row.total strong { font-size: 1.1rem; color: #059669; }

.address-section {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
}

@media (max-width: 640px) {
    .address-section { grid-template-columns: 1fr; }
}

.address-box {
    background: #f9fafb;
    padding: 1rem;
    border-radius: 8px;
}

.address-box h5 {
    margin: 0 0 0.5rem;
    font-size: 0.85rem;
    color: #6b7280;
}

.address-box p {
    margin: 0;
    font-size: 0.9rem;
    color: #1f2937;
}

.empty-info {
    text-align: center;
    padding: 2rem;
    color: #9ca3af;
}

.empty-info i { font-size: 2rem; margin-bottom: 0.5rem; }

.installment-section {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 2px dashed #e5e7eb;
}

.installment-section h5 {
    margin: 0 0 1rem;
    color: #059669;
    font-size: 0.95rem;
}

.notes-section {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.notes-textarea {
    width: 100%;
    min-height: 100px;
    padding: 1rem;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 0.9rem;
    resize: vertical;
}

.notes-textarea:focus {
    outline: none;
    border-color: #10b981;
}

.btn {
    padding: 0.6rem 1.25rem;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-primary { background: #059669; color: #fff; }
.btn-primary:hover { background: #047857; }
.btn-outline { background: #fff; border: 1px solid #e5e7eb; color: #374151; }
.btn-outline:hover { border-color: #10b981; color: #059669; }
.btn-sm { padding: 0.4rem 1rem; font-size: 0.85rem; }

/* Toast Notification Styles */
.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 16px 24px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 500;
    font-size: 0.95rem;
    z-index: 9999;
    animation: slideIn 0.3s ease, fadeOut 0.3s ease 2.7s forwards;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}

.toast-success {
    background: linear-gradient(135deg, #059669, #10b981);
    color: #fff;
}

.toast-success i {
    font-size: 1.2rem;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
        visibility: hidden;
    }
}
</style>

<script>
// Auto-hide toast after 3 seconds
document.addEventListener('DOMContentLoaded', function() {
    const toast = document.getElementById('toast');
    if (toast) {
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }
});

function updateStatus() {
    const status = document.getElementById('statusSelect').value;
    
    fetch('{{ route("admin.registrations.update-status", $registration) }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const badge = document.querySelector('.status-badge');
            badge.className = `status-badge status-${data.status}`;
            badge.textContent = data.status_bengali;
            alert(data.message);
        }
    })
    .catch(err => alert('কিছু সমস্যা হয়েছে!'));
}

function saveNotes() {
    const notes = document.getElementById('adminNotes').value;
    
    fetch('{{ route("admin.registrations.update", $registration) }}', {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ admin_notes: notes })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('নোট সেভ হয়েছে!');
        }
    })
    .catch(err => alert('কিছু সমস্যা হয়েছে!'));
}
</script>
@endsection
