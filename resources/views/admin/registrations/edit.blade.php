@extends('admin.layouts')

@section('content')
<div class="content-header">
    <div>
        <a href="{{ route('admin.registrations.show', $registration) }}" class="back-link">
            <i class="fas fa-arrow-left"></i> ফিরে যান
        </a>
        <h1>রেজিস্ট্রেশন এডিট</h1>
        <p>{{ $registration->application_number }}</p>
    </div>
</div>

<form action="{{ route('admin.registrations.update', $registration) }}" method="POST" class="edit-form">
    @csrf
    @method('PUT')

    <div class="form-grid">
        <!-- Office Use Section -->
        <div class="form-card">
            <div class="card-header">
                <i class="fas fa-building"></i>
                <h3>অফিস ব্যবহার</h3>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>S.L. No.</label>
                    <input type="text" name="sl_no" value="{{ $registration->sl_no }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>File No.</label>
                    <input type="text" name="file_no" value="{{ $registration->file_no }}" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>SR Code</label>
                    <input type="text" name="sr_code" value="{{ $registration->sr_code }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>Team</label>
                    <input type="text" name="team" value="{{ $registration->team }}" class="form-input">
                </div>
            </div>
            <div class="form-group">
                <label>Rep</label>
                <input type="text" name="rep" value="{{ $registration->rep }}" class="form-input">
            </div>
        </div>

        <!-- Status -->
        <div class="form-card">
            <div class="card-header">
                <i class="fas fa-flag"></i>
                <h3>স্ট্যাটাস</h3>
            </div>
            <div class="form-group">
                <label>বর্তমান স্ট্যাটাস</label>
                <select name="status" class="form-input">
                    <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>অপেক্ষমাণ</option>
                    <option value="processing" {{ $registration->status == 'processing' ? 'selected' : '' }}>প্রক্রিয়াধীন</option>
                    <option value="approved" {{ $registration->status == 'approved' ? 'selected' : '' }}>অনুমোদিত</option>
                    <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>বাতিল</option>
                </select>
            </div>
            <div class="form-group">
                <label>অ্যাডমিন নোট</label>
                <textarea name="admin_notes" class="form-input" rows="4">{{ $registration->admin_notes }}</textarea>
            </div>
        </div>

        <!-- Plot Info -->
        <div class="form-card">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i>
                <h3>প্লটের তথ্য</h3>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>প্লট নম্বর</label>
                    <input type="text" name="plot_no" value="{{ $registration->plot_no }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>রোড নম্বর</label>
                    <input type="text" name="road_no" value="{{ $registration->road_no }}" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>ব্লক নম্বর</label>
                    <input type="text" name="block_no" value="{{ $registration->block_no }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>মুখ (Facing)</label>
                    <input type="text" name="facing" value="{{ $registration->facing }}" class="form-input">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>আয়তন (কাঠা)</label>
                    <input type="number" step="0.0001" name="area_katha" value="{{ $registration->area_katha }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>প্রতি কাঠা দর (৳)</label>
                    <input type="number" step="0.01" name="rate_per_katha" value="{{ $registration->rate_per_katha }}" class="form-input">
                </div>
            </div>
            <div class="form-group">
                <label>মোট মূল্য (৳)</label>
                <input type="number" step="0.01" name="total_price" value="{{ $registration->total_price }}" class="form-input highlight">
            </div>
        </div>

        <!-- Payment Info -->
        <div class="form-card">
            <div class="card-header">
                <i class="fas fa-credit-card"></i>
                <h3>পেমেন্টের তথ্য</h3>
            </div>
            <div class="form-group">
                <label>বুকিং মানি (৳)</label>
                <input type="number" step="0.01" name="booking_money" value="{{ $registration->booking_money }}" class="form-input">
            </div>
            <div class="form-group">
                <label>ডাউন পেমেন্ট (৳)</label>
                <input type="number" step="0.01" name="down_payment" value="{{ $registration->down_payment }}" class="form-input">
            </div>
            <div class="form-group">
                <label>বাকি টাকা (৳)</label>
                <input type="number" step="0.01" name="remaining_amount" value="{{ $registration->remaining_amount }}" class="form-input">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>কিস্তির সংখ্যা</label>
                    <input type="number" name="no_of_installment" value="{{ $registration->no_of_installment }}" class="form-input">
                </div>
                <div class="form-group">
                    <label>প্রতি কিস্তি (৳)</label>
                    <input type="number" step="0.01" name="per_installment" value="{{ $registration->per_installment }}" class="form-input">
                </div>
            </div>
            <div class="form-group">
                <label>কিস্তি শুরুর তারিখ</label>
                <input type="date" name="emi_start_date" value="{{ $registration->emi_start_date ? $registration->emi_start_date->format('Y-m-d') : '' }}" class="form-input">
            </div>
        </div>
    </div>

    <!-- Applicant Info (Read Only) -->
    <div class="form-card readonly-card">
        <div class="card-header">
            <i class="fas fa-user"></i>
            <h3>আবেদনকারীর তথ্য (শুধুমাত্র পড়ার জন্য)</h3>
        </div>
        <div class="readonly-info">
            <div class="info-item">
                <span>নাম:</span>
                <strong>{{ $registration->applicant_name }}</strong>
            </div>
            <div class="info-item">
                <span>মোবাইল:</span>
                <strong>{{ $registration->mobile }}</strong>
            </div>
            <div class="info-item">
                <span>ইমেইল:</span>
                <strong>{{ $registration->email ?? '-' }}</strong>
            </div>
            <div class="info-item">
                <span>NID:</span>
                <strong>{{ $registration->nid ?? '-' }}</strong>
            </div>
            <div class="info-item">
                <span>প্রকল্প:</span>
                <strong>{{ $registration->project_name ?? '-' }}</strong>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <a href="{{ route('admin.registrations.show', $registration) }}" class="btn btn-secondary">বাতিল</a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> সংরক্ষণ করুন
        </button>
    </div>
</form>

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

.edit-form { margin-top: 1rem; }

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

@media (max-width: 1024px) {
    .form-grid { grid-template-columns: 1fr; }
}

.form-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.readonly-card {
    background: #f9fafb;
    border: 1px dashed #d1d5db;
}

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

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

@media (max-width: 640px) {
    .form-row { grid-template-columns: 1fr; }
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.5rem;
}

.form-input {
    width: 100%;
    padding: 0.625rem 0.875rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.2s;
}

.form-input:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.form-input.highlight {
    background: #f0fdf4;
    font-weight: 600;
}

textarea.form-input {
    resize: vertical;
    min-height: 80px;
}

.readonly-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.info-item {
    display: flex;
    flex-direction: column;
}

.info-item span {
    font-size: 0.8rem;
    color: #6b7280;
}

.info-item strong {
    color: #1f2937;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.btn {
    padding: 0.75rem 1.5rem;
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
.btn-secondary { background: #f3f4f6; color: #374151; }
.btn-secondary:hover { background: #e5e7eb; }
</style>
@endsection
