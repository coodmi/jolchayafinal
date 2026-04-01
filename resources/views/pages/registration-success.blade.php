@extends('layouts')

@section('content')
<style>
    .success-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #f0fdf4 100%);
        padding: 100px 1rem 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .success-card {
        max-width: 600px;
        width: 100%;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        text-align: center;
    }

    .success-header {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        padding: 3rem 2rem;
        color: #fff;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .success-icon svg {
        width: 40px;
        height: 40px;
    }

    .success-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0 0 0.5rem;
    }

    .success-header p {
        font-size: 1rem;
        opacity: 0.9;
        margin: 0;
    }

    .success-body {
        padding: 2rem;
    }

    .app-number {
        background: #f0fdf4;
        border: 2px dashed #10b981;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 2rem;
    }

    .app-number-label {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }

    .app-number-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #059669;
        letter-spacing: 2px;
    }

    .info-list {
        text-align: left;
        margin-bottom: 2rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        color: #6b7280;
        font-size: 0.9rem;
    }

    .info-value {
        font-weight: 600;
        color: #1f2937;
    }

    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .success-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    @media (min-width: 480px) {
        .success-actions {
            flex-direction: row;
            justify-content: center;
        }
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.875rem 1.5rem;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #fff;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.4);
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #e5e7eb;
    }

    .btn svg {
        width: 18px;
        height: 18px;
    }

    .note {
        margin-top: 2rem;
        padding: 1rem;
        background: #fef3c7;
        border-radius: 8px;
        font-size: 0.85rem;
        color: #92400e;
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="success-header">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <h1>আবেদন সফলভাবে জমা হয়েছে!</h1>
            <p>Application Submitted Successfully</p>
        </div>

        <div class="success-body">
            <div class="app-number">
                <div class="app-number-label">আবেদন নম্বর / Application Number</div>
                <div class="app-number-value">{{ $registration->application_number }}</div>
            </div>

            <div class="info-list">
                <div class="info-item">
                    <span class="info-label">আবেদনকারীর নাম</span>
                    <span class="info-value">{{ $registration->applicant_name }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">মোবাইল নম্বর</span>
                    <span class="info-value">{{ $registration->mobile }}</span>
                </div>
                @if($registration->project_name)
                <div class="info-item">
                    <span class="info-label">প্রকল্পের নাম</span>
                    <span class="info-value">{{ $registration->project_name }}</span>
                </div>
                @endif
                <div class="info-item">
                    <span class="info-label">আবেদনের তারিখ</span>
                    <span class="info-value">{{ $registration->created_at->format('d M Y, h:i A') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">স্ট্যাটাস</span>
                    <span class="info-value">
                        <span class="status-badge status-pending">{{ $registration->status_bengali }}</span>
                    </span>
                </div>
            </div>

            <div class="success-actions">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    হোম পেজে যান
                </a>
                <a href="{{ route('registration.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    নতুন আবেদন
                </a>
            </div>

            <div class="note">
                <strong>বিঃদ্রঃ</strong> আপনার আবেদন নম্বরটি সংরক্ষণ করুন। এটি দিয়ে আপনি পরবর্তীতে আবেদনের অবস্থা জানতে পারবেন।
            </div>
        </div>
    </div>
</div>
@endsection
