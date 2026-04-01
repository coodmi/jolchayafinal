@extends('layouts')

@section('content')
<style>
    /* Registration Form Styles - Emerald Theme */
    /* Override global styles from landing_page.css */
    .reg-container,
    .reg-container * {
        color: #1e293b;
    }

    .reg-container {
        min-height: 100vh;
        background: #f0fdf4 !important;
        padding: 80px 1rem 3rem;
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    .reg-form-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        background: #ffffff !important;
        border-radius: 16px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        border-top: 5px solid #059669;
    }

    /* Header */
    .reg-header {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
        color: #fff;
        padding: 3rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .reg-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        animation: slide 30s linear infinite;
    }

    @keyframes slide {
        0% { transform: translateX(0) translateY(0); }
        100% { transform: translateX(50%) translateY(50%); }
    }

    .reg-header h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin: 0 0 0.5rem;
        letter-spacing: 2px;
        position: relative;
        z-index: 1;
    }

    .reg-header .tagline {
        color: #a7f3d0;
        font-size: 1.1rem;
        font-style: italic;
        position: relative;
        z-index: 1;
    }

    .reg-header .form-title {
        margin-top: 1.5rem;
        display: inline-block;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 0.75rem 2rem;
        border-radius: 50px;
        border: 1px solid rgba(16, 185, 129, 0.3);
        position: relative;
        z-index: 1;
    }

    .reg-header .form-title h2 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
        color: #ffffff !important;
    }

    /* Form Body */
    .reg-form-body {
        padding: 2rem;
        background: #ffffff !important;
    }

    .reg-form-body * {
        color: #1e293b;
    }

    /* Section */
    .reg-section {
        margin-bottom: 2.5rem;
    }

    .reg-section-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #059669;
    }

    .reg-section-icon {
        width: 40px;
        height: 40px;
        background: #ecfdf5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #059669;
    }

    .reg-section-icon svg {
        width: 20px;
        height: 20px;
    }

    .reg-section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b !important;
        margin: 0;
    }

    /* Office Use Section */
    .office-use-section {
        background: #f8fafc !important;
        padding: 1.5rem;
        border-radius: 12px;
        border: 1px solid #cbd5e1;
    }

    .office-use-section .form-group label,
    .office-use-section .form-label {
        color: #1e293b !important;
    }

    .office-use-section .form-group input,
    .office-use-section .form-input {
        background: #ffffff !important;
        color: #1e293b !important;
        border: 1px solid #94a3b8 !important;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.25rem;
    }

    @media (min-width: 640px) {
        .form-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (min-width: 1024px) {
        .form-grid { grid-template-columns: repeat(3, 1fr); }
    }

    .form-grid.cols-2 {
        grid-template-columns: repeat(1, 1fr);
    }

    @media (min-width: 768px) {
        .form-grid.cols-2 { grid-template-columns: repeat(2, 1fr); }
    }

    .col-span-full { grid-column: 1 / -1; }
    .col-span-2 { grid-column: span 2 / span 2; }

    @media (max-width: 639px) {
        .col-span-2 { grid-column: 1 / -1; }
    }

    /* Form Group */
    .form-group {
        display: flex;
        flex-direction: column;
    }

    .reg-form-body .form-group label,
    .reg-form-body .form-label,
    .form-group label {
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        margin-bottom: 0.5rem !important;
        display: block !important;
    }

    .form-label.required::after {
        content: ' *';
        color: #dc2626 !important;
    }

    .reg-form-body .form-group input,
    .reg-form-body .form-group select,
    .reg-form-body .form-group textarea,
    .reg-form-body .form-input,
    .reg-form-body .form-select,
    .reg-form-body .form-textarea,
    .form-input,
    .form-select,
    .form-textarea {
        width: 100% !important;
        padding: 0.625rem 0.875rem !important;
        border: 1px solid #94a3b8 !important;
        border-radius: 8px !important;
        font-size: 0.9rem !important;
        transition: all 0.2s ease !important;
        background: #ffffff !important;
        color: #1e293b !important;
    }

    .reg-form-body .form-group input[readonly],
    .form-input[readonly] {
        background-color: #f1f5f9 !important;
        color: #475569 !important;
        cursor: default !important;
    }

    .reg-form-body .form-group input::placeholder,
    .form-input::placeholder {
        color: #64748b !important;
        opacity: 1 !important;
    }

    .reg-form-body .form-group input:focus,
    .reg-form-body .form-group select:focus,
    .reg-form-body .form-group textarea:focus,
    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none !important;
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        background: #ffffff !important;
    }

    .form-input.highlight {
        background: rgba(16, 185, 129, 0.05) !important;
    }

    .form-textarea {
        resize: vertical;
        min-height: 80px;
    }

    /* Radio Group */
    .radio-group-container {
        background: #f8fafc;
        padding: 1.25rem;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
    }

    .radio-group-label {
        font-size: 0.875rem !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        margin-bottom: 0.5rem;
    }

    .radio-options {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        font-size: 0.9rem !important;
        color: #1e293b !important;
    }

    .radio-option input[type="radio"] {
        width: 18px;
        height: 18px;
        accent-color: #059669;
    }

    /* File Upload */
    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem;
        background: #fff;
        border: 2px dashed #10b981;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #059669;
    }

    .file-upload-label:hover {
        background: #ecfdf5;
        border-color: #059669;
    }

    .file-upload-label svg {
        width: 24px;
        height: 24px;
        margin-bottom: 0.5rem;
    }

    .file-upload-label span {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .file-upload-input {
        display: none;
    }

    /* Nominee Section */
    .nominee-section {
        background: #f0fdf4;
        padding: 1.5rem;
        border-radius: 12px;
        border: 1px solid #bbf7d0;
    }

    /* Payment Mode Toggle */
    .payment-mode-toggle {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    /* Installment Fields */
    .installment-fields {
        display: none;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
        margin-top: 1rem;
    }

    .installment-fields.show {
        display: block;
    }

    /* Terms Section */
    .terms-section {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 1.5rem;
    }

    .terms-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
    }

    .terms-header svg {
        width: 24px;
        height: 24px;
        color: #059669;
    }

    .terms-content {
        max-height: 250px;
        overflow-y: auto;
        background: #fff;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 1rem;
        font-size: 0.875rem;
        color: #4b5563;
        line-height: 1.7;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .terms-content ul {
        padding-left: 1.25rem;
        margin: 0;
    }

    .terms-content li {
        margin-bottom: 0.75rem;
    }

    .terms-agreement {
        margin-top: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .terms-agreement input[type="checkbox"] {
        width: 20px;
        height: 20px;
        margin-top: 0.25rem;
        accent-color: #059669;
        flex-shrink: 0;
    }

    .terms-agreement label {
        font-size: 0.875rem;
        color: #374151;
        line-height: 1.6;
    }

    /* Buttons */
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
        margin-top: 2rem;
    }

    @media (min-width: 640px) {
        .form-actions {
            flex-direction: row;
            justify-content: flex-end;
        }
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.875rem 1.75rem;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #e5e7eb;
    }

    .btn-primary {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #fff;
        box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px -5px rgba(5, 150, 105, 0.5);
    }

    .btn-primary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .btn svg {
        width: 18px;
        height: 18px;
    }

    /* Footer */
    .reg-footer {
        background: #1f2937;
        color: #9ca3af;
        padding: 1.5rem 2rem;
        text-align: center;
        font-size: 0.8rem;
    }

    .reg-footer p {
        margin: 0.25rem 0;
    }

    .reg-footer .highlight {
        color: #10b981;
    }

    /* Error Messages */
    .form-error {
        color: #dc2626;
        font-size: 0.8rem;
        margin-top: 0.25rem;
    }

    .is-invalid {
        border-color: #dc2626 !important;
    }

    /* Alert */
    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-success {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #10b981;
    }

    .alert-error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #dc2626;
    }

    /* Loading Spinner */
    .spinner {
        width: 20px;
        height: 20px;
        border: 2px solid transparent;
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Print Styles */
    @media print {
        .reg-container { padding: 0; background: #fff; }
        .form-actions { display: none; }
        .reg-form-wrapper { box-shadow: none; border: 1px solid #ccc; }
    }
</style>

<div class="reg-container">
    <div class="reg-form-wrapper">
        <!-- Header -->
        <div class="reg-header">
            <h1>NEX REAL ESTATE</h1>
            <p class="tagline">Breathes with You</p>
            <div class="form-title">
                <h2>প্রাথমিক আবেদন পত্র (Preliminary Application Form)</h2>
            </div>
        </div>

        <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data" class="reg-form-body" id="registrationForm" autocomplete="off">
            @csrf

            @if(session('error'))
                <div class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    <span>অনুগ্রহ করে ফর্মের ত্রুটিগুলো সংশোধন করুন।</span>
                </div>
            @endif

            <!-- Office Use Section -->
            <div class="reg-section">
                <div class="office-use-section">
                    <div class="reg-section-header">
                        <div class="reg-section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        </div>
                        <h3 class="reg-section-title">Office Use Only (অফিস ব্যবহারের জন্য)</h3>
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">S.L. No.</label>
                            <input type="text" name="sl_no" class="form-input" readonly placeholder="Auto-generated">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Application Date</label>
                            <input type="date" name="application_date" class="form-input" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">File No.</label>
                            <input type="text" name="file_no" class="form-input" readonly placeholder="Office use">
                        </div>
                        <div class="form-group">
                            <label class="form-label">SR Code</label>
                            <input type="text" name="sr_code" class="form-input" readonly placeholder="Office use">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Team</label>
                            <input type="text" name="team" class="form-input" readonly placeholder="Office use">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Rep</label>
                            <input type="text" name="rep" class="form-input" readonly placeholder="Office use">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Info -->
            <div class="reg-section">
                <div class="form-group">
                    <label class="form-label" style="font-weight: 700; font-size: 1rem;">Project Name / প্রকল্পের নাম</label>
                    <input type="text" name="project_name" class="form-input" style="font-size: 1.1rem; padding: 0.875rem 1rem;" placeholder="Enter Project Name" value="{{ old('project_name') }}">
                </div>
            </div>

            <!-- Applicant Information -->
            <div class="reg-section">
                <div class="reg-section-header">
                    <div class="reg-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <h3 class="reg-section-title">Applicant Information (আবেদনকারীর তথ্য)</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group col-span-full">
                        <label class="form-label required">Applicant's Full Name / আবেদনকারীর পূর্ণ নাম</label>
                        <input type="text" name="applicant_name" class="form-input highlight @error('applicant_name') is-invalid @enderror" value="{{ old('applicant_name') }}" required>
                        @error('applicant_name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Father's Name / পিতার নাম</label>
                        <input type="text" name="father_name" class="form-input" value="{{ old('father_name') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother's Name / মাতার নাম</label>
                        <input type="text" name="mother_name" class="form-input" value="{{ old('mother_name') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Spouse's Name / স্বামী/স্ত্রীর নাম</label>
                        <input type="text" name="spouse_name" class="form-input" value="{{ old('spouse_name') }}">
                    </div>

                    <div class="form-group col-span-full">
                        <div class="form-grid cols-2">
                            <div class="form-group">
                                <label class="form-label">Mailing Address / যোগাযোগের ঠিকানা</label>
                                <textarea name="mailing_address" class="form-textarea" rows="3">{{ old('mailing_address') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Permanent Address / স্থায়ী ঠিকানা</label>
                                <textarea name="permanent_address" class="form-textarea" rows="3">{{ old('permanent_address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">NID / Passport / BC No.</label>
                        <input type="text" name="nid" class="form-input" value="{{ old('nid') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Mobile / Phone No. / মোবাইল</label>
                        <input type="tel" name="mobile" class="form-input @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required>
                        @error('mobile')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">TIN</label>
                        <input type="text" name="tin" class="form-input" value="{{ old('tin') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date of Birth / জন্ম তারিখ</label>
                        <input type="date" name="dob" class="form-input" value="{{ old('dob') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nationality / জাতীয়তা</label>
                        <input type="text" name="nationality" class="form-input" value="{{ old('nationality', 'Bangladeshi') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Religion / ধর্ম</label>
                        <input type="text" name="religion" class="form-input" value="{{ old('religion') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Marital Status / বৈবাহিক অবস্থা</label>
                        <select name="marital_status" class="form-select">
                            <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single / অবিবাহিত</option>
                            <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married / বিবাহিত</option>
                            <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced / তালাকপ্রাপ্ত</option>
                            <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed / বিধবা/বিপত্নীক</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email / ইমেইল</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Profession / পেশা</label>
                        <input type="text" name="profession" class="form-input" value="{{ old('profession') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Designation / পদবী</label>
                        <input type="text" name="designation" class="form-input" value="{{ old('designation') }}">
                    </div>
                    <div class="form-group col-span-2">
                        <label class="form-label">Organization / প্রতিষ্ঠান</label>
                        <input type="text" name="organization" class="form-input" value="{{ old('organization') }}">
                    </div>

                    <div class="col-span-full">
                        <div class="radio-group-container">
                            <div class="radio-group">
                                <span class="radio-group-label">Gender / লিঙ্গ</span>
                                <div class="radio-options">
                                    <label class="radio-option">
                                        <input type="radio" name="gender" value="Male" {{ old('gender', 'Male') == 'Male' ? 'checked' : '' }}>
                                        Male / পুরুষ
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                        Female / মহিলা
                                    </label>
                                </div>
                            </div>
                            <div class="radio-group">
                                <span class="radio-group-label">Resident Status / বাসিন্দার ধরন</span>
                                <div class="radio-options">
                                    <label class="radio-option">
                                        <input type="radio" name="resident_status" value="Resident" {{ old('resident_status', 'Resident') == 'Resident' ? 'checked' : '' }}>
                                        Resident / স্থানীয়
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="resident_status" value="Non Resident" {{ old('resident_status') == 'Non Resident' ? 'checked' : '' }}>
                                        Non Resident / প্রবাসী
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Applicant Photo / আবেদনকারীর ছবি</label>
                        <div class="file-upload-wrapper">
                            <label class="file-upload-label">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                <span>Select Photo</span>
                                <input type="file" name="applicant_photo" class="file-upload-input" accept="image/*">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nominee Information -->
            <div class="reg-section">
                <div class="reg-section-header">
                    <div class="reg-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 class="reg-section-title">Nominee Information (নমিনির তথ্য)</h3>
                </div>
                <div class="nominee-section">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nominee's Name / নমিনির নাম</label>
                            <input type="text" name="nominee_name" class="form-input" value="{{ old('nominee_name') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Relation / সম্পর্ক</label>
                            <input type="text" name="nominee_relation" class="form-input" value="{{ old('nominee_relation') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nominee NID / BC</label>
                            <input type="text" name="nominee_nid" class="form-input" value="{{ old('nominee_nid') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mobile / মোবাইল</label>
                            <input type="tel" name="nominee_mobile" class="form-input" value="{{ old('nominee_mobile') }}">
                        </div>
                        <div class="form-group col-span-2">
                            <label class="form-label">Address / ঠিকানা</label>
                            <input type="text" name="nominee_address" class="form-input" value="{{ old('nominee_address') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nominee Photo / নমিনির ছবি</label>
                            <div class="file-upload-wrapper">
                                <label class="file-upload-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                    <span>Select Photo</span>
                                    <input type="file" name="nominee_photo" class="file-upload-input" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plot/Property Information -->
            <div class="reg-section">
                <div class="reg-section-header">
                    <div class="reg-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3 class="reg-section-title">Plot / Property Information (প্লট/সম্পত্তির তথ্য)</h3>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Plot Type / প্লটের ধরন</label>
                        <select name="plot_type" class="form-select">
                            <option value="Resident" {{ old('plot_type') == 'Resident' ? 'selected' : '' }}>Resident / আবাসিক</option>
                            <option value="Non Resident" {{ old('plot_type') == 'Non Resident' ? 'selected' : '' }}>Non Resident / অনাবাসিক</option>
                            <option value="Commercial" {{ old('plot_type') == 'Commercial' ? 'selected' : '' }}>Commercial / বাণিজ্যিক</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Plot No. / প্লট নম্বর</label>
                        <input type="text" name="plot_no" class="form-input" value="{{ old('plot_no') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Road No. / রোড নম্বর</label>
                        <input type="text" name="road_no" class="form-input" value="{{ old('road_no') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Block No. / ব্লক নম্বর</label>
                        <input type="text" name="block_no" class="form-input" value="{{ old('block_no') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Facing / মুখ</label>
                        <input type="text" name="facing" class="form-input" value="{{ old('facing') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Area (Katha) / আয়তন (কাঠা)</label>
                        <input type="number" step="0.0001" name="area_katha" class="form-input" value="{{ old('area_katha') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rate Per Katha (Tk) / প্রতি কাঠা দর (টাকা)</label>
                        <input type="number" step="0.01" name="rate_per_katha" class="form-input" value="{{ old('rate_per_katha') }}" id="ratePerKatha">
                    </div>
                    <div class="form-group col-span-2">
                        <label class="form-label">Total Price (Tk) / মোট মূল্য (টাকা)</label>
                        <input type="number" step="0.01" name="total_price" class="form-input highlight" style="font-weight: 700;" value="{{ old('total_price') }}" id="totalPrice">
                    </div>
                    <div class="form-group col-span-full">
                        <label class="form-label">Remarks / মন্তব্য</label>
                        <textarea name="remarks" class="form-textarea" rows="2">{{ old('remarks') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="reg-section">
                <div class="reg-section-header">
                    <div class="reg-section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    </div>
                    <h3 class="reg-section-title">Payment Details (পেমেন্টের বিবরণ)</h3>
                </div>
                <div class="form-grid">
                    <div class="col-span-full">
                        <div class="radio-group" style="margin-bottom: 1rem;">
                            <span class="radio-group-label">Mode of Payment / পেমেন্টের ধরন</span>
                            <div class="radio-options" style="margin-top: 0.5rem;">
                                <label class="radio-option">
                                    <input type="radio" name="payment_mode" value="Installment" {{ old('payment_mode', 'Installment') == 'Installment' ? 'checked' : '' }} id="paymentModeInstallment">
                                    Installment / কিস্তি
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="payment_mode" value="At-a-Time" {{ old('payment_mode') == 'At-a-Time' ? 'checked' : '' }} id="paymentModeAtATime">
                                    At-a-Time / একমুঠে
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Booking Money (Tk) / বুকিং মানি (টাকা)</label>
                        <input type="number" step="0.01" name="booking_money" class="form-input" value="{{ old('booking_money') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Payment Type / পেমেন্ট টাইপ</label>
                        <select name="payment_type" class="form-select">
                            <option value="Cash" {{ old('payment_type') == 'Cash' ? 'selected' : '' }}>Cash / নগদ</option>
                            <option value="Cheque" {{ old('payment_type') == 'Cheque' ? 'selected' : '' }}>Cheque / চেক</option>
                            <option value="Pay Order" {{ old('payment_type') == 'Pay Order' ? 'selected' : '' }}>Pay Order / পে অর্ডার</option>
                            <option value="Demand Draft" {{ old('payment_type') == 'Demand Draft' ? 'selected' : '' }}>Demand Draft / ডিমান্ড ড্রাফট</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cheque/DD/PO No.</label>
                        <input type="text" name="cheque_no" class="form-input" value="{{ old('cheque_no') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank & Branch / ব্যাংক ও শাখা</label>
                        <input type="text" name="bank_name" class="form-input" placeholder="Bank Name, Branch" value="{{ old('bank_name') }}">
                    </div>

                    <!-- Installment Fields -->
                    <div class="col-span-full installment-fields" id="installmentFields">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Down Payment Amount (Tk) / ডাউন পেমেন্ট (টাকা)</label>
                                <input type="number" step="0.01" name="down_payment" class="form-input" value="{{ old('down_payment') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Remaining Amount / বাকি টাকা</label>
                                <input type="number" step="0.01" name="remaining_amount" class="form-input" value="{{ old('remaining_amount') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">No. of Installments / কিস্তির সংখ্যা</label>
                                <input type="number" name="no_of_installment" class="form-input" value="{{ old('no_of_installment') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Per Installment (Tk) / প্রতি কিস্তি (টাকা)</label>
                                <input type="number" step="0.01" name="per_installment" class="form-input" value="{{ old('per_installment') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">EMI Start Date / কিস্তি শুরুর তারিখ</label>
                                <input type="date" name="emi_start_date" class="form-input" value="{{ old('emi_start_date') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="reg-section">
                <div class="terms-section">
                    <div class="terms-header">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        Terms & Conditions (শর্তাবলী)
                    </div>
                    <div class="terms-content">
                        <ul>
                            <li>বুকিং মানি ও ডাউন পেমেন্ট পরিশোধের পর প্রাথমিক বরাদ্দপত্র (Letter of Allotment) প্রদান করা হবে।</li>
                            <li>প্রবাসী ক্রেতারা সমপরিমাণ অর্থ বিদেশি মুদ্রায় টিটি (TT) বা ব্যাংক ড্রাফট এর মাধ্যমে পরিশোধ করতে পারবেন। টাকা রূপান্তর করা হবে ব্যাংকের অনুমোদিত বিনিময় হারে।</li>
                            <li>প্লট ক্রয়ের সময় Down Payment দেওয়ার ৩০ দিনের মধ্যে প্রথম কিস্তি দিতে হবে। বাকি কিস্তি হস্তান্তর ও রেজিস্ট্রেশনের আগে পরিশোধ করতে হবে। নির্ধারিত সময়ে কিস্তি না দিলে বকেয়া কিস্তির টাকার আনুপাতিক হারে ৩% চার্জ প্রযোজ্য হবে।</li>
                            <li>প্রকল্পে পানি, বিদ্যুৎ ও অন্যান্য মেইন লাইন সংযোগ হলে এর নির্ধারিত খরচ ক্রেতাকে বহন করতে হবে। প্লটের ভেতরে সংযোগের খরচও ক্রেতাকে বহন করতে হবে।</li>
                            <li>ক্রেতাকে প্রকল্পের অনুমোদিত নকশা অনুযায়ী বাড়ি নির্মাণ করতে হবে।</li>
                            <li>হস্তান্তরের পর এলাকায় কমিউনিটি ক্লাব/সমিতি গঠন করা হবে আবাসিক এলাকার রক্ষণাবেক্ষণের জন্য।</li>
                            <li>প্রাকৃতিক দুর্যোগ, রাজনৈতিক অস্থিরতা বা যেকোনো কারণে কাজ বিলম্ব হলে কোম্পানি দায়ী থাকবে না।</li>
                            <li>হস্তান্তরের সময় চূড়ান্ত পরিমাপে প্লটের আয়তন বেড়ে গেলে ক্রেতাকে বর্তমান বাজারদরে অতিরিক্ত টাকার পরিশোধ করতে হবে। আর আয়তন কমে গেলে, কোম্পানি আগের বুকিং রেটে সমপরিমাণ টাকা ফেরত দেবে।</li>
                            <li>বিশেষ প্রয়োজনে কোম্পানি প্লটের অবস্থান পরিবর্তন করতে পারবে।</li>
                            <li>যদি ক্রেতা এলটমেন্ট পরিবর্তন বা প্লট অন্য কারও কাছে হস্তান্তর করতে চান তবে প্রতি কাঠা ১,০০,০০০ টাকা অথবা ঐ সময়ে কোম্পানির নির্ধারিত মূল্য অনুযায়ী ট্রান্সফার ফি দিতে হবে (শুধুমাত্র নিকট আত্মীয়ের ক্ষেত্রে এ নিয়ম প্রযোজ্য নয়)।</li>
                            <li>ক্রেতা চাইলে নিজের নামে প্লটের লোন/অর্থনৈতিক পরিবর্তন করতে পারবেন।</li>
                            <li>প্লটের টাকা দেওয়ার পর ক্রেতা প্লট বাতিল করলে ৩০% সার্ভিস চার্জ কেটে বাকি টাকা বিক্রয় সাপেক্ষে ১৮০ দিনের মধ্যে ফেরত দেওয়া হবে।</li>
                            <li>কোনো চুক্তিপত্র করতে হলে মোট প্লট মূল্যের কমপক্ষে ২৫% ডাউন পেমেন্ট (বুকিং মানি সহ) জমা দিতে হবে। এর কম হলে কোনো চুক্তি কার্যকর হবে না।</li>
                        </ul>
                    </div>

                    <div class="terms-agreement">
                        <input type="checkbox" id="agreed_to_terms" name="agreed_to_terms" required {{ old('agreed_to_terms') ? 'checked' : '' }}>
                        <label for="agreed_to_terms">
                            আমি/আমরা এই মর্মে অঙ্গীকার ও ঘোষণা করছি যে, উপরে প্রদত্ত সকল তথ্য আমার/আমাদের জ্ঞান ও বিশ্বাস অনুযায়ী সম্পূর্ণ সঠিক ও সত্য। আমি/আমরা আরও অঙ্গীকার করছি যে, উল্লেখিত প্লট/জমি ক্রয়ের ক্ষেত্রে কোম্পানির বিদ্যমান ও ভবিষ্যতে প্রণীত সকল নিয়ম, নীতি ও শর্তাবলী যথাযথভাবে মেনে চলব।
                            <br><br>
                            <strong>Declaration:</strong> I/We hereby declare that all the information provided above is correct and true to the best of my/our knowledge. I/We further agree to abide by all the existing and future rules, regulations, and terms & conditions of the company regarding the purchase of the mentioned plot/land.
                        </label>
                    </div>
                    @error('agreed_to_terms')
                        <span class="form-error" style="display: block; margin-top: 0.5rem;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="resetForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                    Clear Form
                </button>
                <button type="button" class="btn btn-secondary" onclick="window.print()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    Print Form
                </button>
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <span id="submitText">Submit Application</span>
                    <div class="spinner" id="submitSpinner" style="display: none;"></div>
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="reg-footer">
            <p>Head Office: 50, Lake Circus, Level-5, Kalabagan, Dhaka - 1209</p>
            <p>Local Office: Yearpur Botgach Tola, Jirabo, Ashulia, Savar, Dhaka.</p>
            <p class="highlight" style="margin-top: 0.75rem;">www.joljochna.com | hello.nexgroup@gmail.com | +880 1991 994 994</p>
        </div>
    </div>
</div>

<script>
function resetForm() {
    const form = document.getElementById('registrationForm');
    form.reset();
    
    // Manually trigger UI updates
    const installmentFields = document.getElementById('installmentFields');
    if (installmentFields) installmentFields.classList.remove('show');
    
    const totalInput = document.getElementById('totalPrice');
    if (totalInput) totalInput.value = '';

    // Reset submit button
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');
    if (submitBtn) {
        submitBtn.disabled = false;
        if (submitText) submitText.textContent = 'Submit Application';
        if (submitSpinner) submitSpinner.style.display = 'none';
    }

    // Clear file labels
    const fileSpans = document.querySelectorAll('.file-upload-label span');
    fileSpans.forEach(span => {
        if (span.textContent.includes('Choose')) return;
        span.textContent = 'Choose Photo';
    });
}

// Clear form on back button/page show
/* 
window.addEventListener('pageshow', function(event) {
    if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
        resetForm();
    }
});
*/

document.addEventListener('DOMContentLoaded', function() {
    // Toggle installment fields
    const paymentModeRadios = document.querySelectorAll('input[name="payment_mode"]');
    const installmentFields = document.getElementById('installmentFields');

    function toggleInstallmentFields() {
        const selectedMode = document.querySelector('input[name="payment_mode"]:checked');
        if (selectedMode && selectedMode.value === 'Installment') {
            installmentFields.classList.add('show');
        } else {
            installmentFields.classList.remove('show');
        }
    }

    paymentModeRadios.forEach(radio => {
        radio.addEventListener('change', toggleInstallmentFields);
    });

    // Initial toggle
    toggleInstallmentFields();

    // Auto-calculate total price
    const areaInput = document.querySelector('input[name="area_katha"]');
    const rateInput = document.getElementById('ratePerKatha');
    const totalInput = document.getElementById('totalPrice');

    function calculateTotal() {
        const area = parseFloat(areaInput.value) || 0;
        const rate = parseFloat(rateInput.value) || 0;
        totalInput.value = (area * rate).toFixed(2);
    }

    if (areaInput && rateInput) {
        areaInput.addEventListener('input', calculateTotal);
        rateInput.addEventListener('input', calculateTotal);
    }

    // Form submission with AJAX and loading state
    const form = document.getElementById('registrationForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            console.log('Form submission started');
            
            // Reset previous errors
            document.querySelectorAll('.form-error').forEach(el => el.remove());
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            
            const formData = new FormData(this);
            
            // Debug: Log all form data
            const entries = {};
            for (let [key, value] of formData.entries()) {
                entries[key] = (value instanceof File) ? `File: ${value.name}` : value;
            }
            console.log('Form Data entries:', entries);

            if (!formData.get('applicant_name')) {
                console.error('Applicant name is missing in FormData!');
            }
            
            submitBtn.disabled = true;
            submitText.textContent = 'Submitting...';
            submitSpinner.style.display = 'inline-block';

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();
                console.log('Server response:', result);

                if (result.success) {
                    // Success! Redirect to success page
                    window.location.href = result.redirect;
                } else {
                    // Handle validation errors or custom errors
                    submitBtn.disabled = false;
                    submitText.textContent = 'Submit Application';
                    submitSpinner.style.display = 'none';

                    if (result.errors) {
                        console.log('Validation errors:', result.errors);
                        // Show validation errors under inputs
                        Object.keys(result.errors).forEach(key => {
                            const input = document.querySelector(`[name="${key}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                const error = document.createElement('span');
                                error.className = 'form-error';
                                error.textContent = result.errors[key][0];
                                
                                // For radio buttons, append to parent of container
                                if (input.type === 'radio') {
                                    const radioGroup = input.closest('.radio-options');
                                    if (radioGroup) radioGroup.parentElement.appendChild(error);
                                } else {
                                    input.parentElement.appendChild(error);
                                }
                            }
                        });
                        
                        // Scroll to first error
                        setTimeout(() => {
                            const firstError = document.querySelector('.is-invalid');
                            if (firstError) {
                                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            }
                        }, 100);
                    }

                    alert(result.message || 'Error occurred during submission.');
                }
            } catch (error) {
                console.error('Submission error:', error);
                submitBtn.disabled = false;
                submitText.textContent = 'Submit Application';
                submitSpinner.style.display = 'none';
                alert('একটি ভুল হয়েছে। অনুগ্রহ করে ইন্টারনেট সংযোগ যাচাই করুন এবং আবার চেষ্টা করুন।');
            }
        });
    }

    // File upload preview
    const fileInputs = document.querySelectorAll('.file-upload-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const label = this.previousElementSibling || this.closest('.file-upload-label');
            const span = this.parentElement.querySelector('span');
            if (this.files && this.files[0]) {
                span.textContent = this.files[0].name.substring(0, 20) + (this.files[0].name.length > 20 ? '...' : '');
            }
        });
    });
});
</script>
@endsection
