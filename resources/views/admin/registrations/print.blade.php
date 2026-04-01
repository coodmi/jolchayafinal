<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>প্লট আবেদন - {{ $registration->application_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            background: #fff;
        }

        .print-container {
            max-width: 210mm;
            margin: 0 auto;
            padding: 15mm;
        }

        /* Header */
        .header {
            text-align: center;
            border-bottom: 3px double #059669;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #059669;
            margin-bottom: 5px;
            letter-spacing: 2px;
        }

        .header .tagline {
            font-style: italic;
            color: #666;
            font-size: 11px;
        }

        .header .form-title {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
            background: #f0fdf4;
            padding: 8px 15px;
            display: inline-block;
            border-radius: 4px;
        }

        .app-number {
            text-align: right;
            margin-bottom: 15px;
        }

        .app-number span {
            background: #059669;
            color: #fff;
            padding: 5px 15px;
            border-radius: 4px;
            font-weight: bold;
        }

        /* Section */
        .section {
            margin-bottom: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .section-header {
            background: #f0fdf4;
            padding: 8px 15px;
            font-weight: bold;
            color: #059669;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .section-body {
            padding: 15px;
        }

        /* Table Layout */
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 10px;
            vertical-align: top;
        }

        .info-table .label {
            width: 35%;
            color: #666;
            font-size: 11px;
        }

        .info-table .value {
            font-weight: 500;
        }

        .info-table tr:nth-child(even) {
            background: #f9fafb;
        }

        /* Two Column Layout */
        .two-col {
            display: flex;
            gap: 20px;
        }

        .two-col > div {
            flex: 1;
        }

        /* Photo Box */
        .photo-box {
            width: 100px;
            height: 120px;
            border: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f9fafb;
            float: right;
            margin-left: 15px;
        }

        .photo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .photo-box .placeholder {
            color: #9ca3af;
            font-size: 10px;
            text-align: center;
        }

        /* Highlight Box */
        .highlight-box {
            background: #f0fdf4;
            border: 1px solid #10b981;
            padding: 10px 15px;
            border-radius: 6px;
            margin-top: 10px;
        }

        .highlight-box .amount {
            font-size: 16px;
            font-weight: bold;
            color: #059669;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: bold;
        }

        .status-pending { background: #fef3c7; color: #92400e; }
        .status-processing { background: #fce7f3; color: #9d174d; }
        .status-approved { background: #d1fae5; color: #065f46; }
        .status-rejected { background: #fee2e2; color: #991b1b; }

        /* Signature Area */
        .signature-area {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            text-align: center;
            width: 200px;
        }

        .signature-line {
            border-top: 1px solid #333;
            margin-top: 50px;
            padding-top: 5px;
            font-size: 11px;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 10px;
            color: #666;
        }

        .footer .contacts {
            color: #059669;
            margin-top: 5px;
        }

        /* Print Styles */
        @media print {
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .print-container { padding: 10mm; }
            .no-print { display: none !important; }
        }

        /* Print Button */
        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #059669;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
        }

        .print-btn:hover { background: #047857; }

        @media print {
            .print-btn { display: none; }
        }
    </style>
</head>
<body>
    <button class="print-btn no-print" onclick="window.print()">
        🖨️ প্রিন্ট করুন
    </button>

    <div class="print-container">
        <!-- Header -->
        <div class="header">
            <h1>NEX REAL ESTATE</h1>
            <p class="tagline">Breathes with You</p>
            <div class="form-title">প্রাথমিক আবেদন পত্র (Preliminary Application Form)</div>
        </div>

        <!-- Application Number -->
        <div class="app-number">
            <span>{{ $registration->application_number }}</span>
        </div>

        <!-- Office Use Section -->
        <div class="section">
            <div class="section-header">🏢 অফিস ব্যবহারের জন্য (Office Use Only)</div>
            <div class="section-body">
                <table class="info-table">
                    <tr>
                        <td class="label">S.L. No.</td>
                        <td class="value">{{ $registration->sl_no ?? '-' }}</td>
                        <td class="label">Application Date</td>
                        <td class="value">{{ $registration->application_date ? $registration->application_date->format('d/m/Y') : $registration->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label">File No.</td>
                        <td class="value">{{ $registration->file_no ?? '-' }}</td>
                        <td class="label">SR Code</td>
                        <td class="value">{{ $registration->sr_code ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Team</td>
                        <td class="value">{{ $registration->team ?? '-' }}</td>
                        <td class="label">Rep</td>
                        <td class="value">{{ $registration->rep ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status</td>
                        <td class="value" colspan="3">
                            <span class="status-badge status-{{ $registration->status }}">{{ $registration->status_bengali }}</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Project Name -->
        <div class="section">
            <div class="section-header">📋 প্রকল্পের নাম (Project Name)</div>
            <div class="section-body" style="font-size: 16px; font-weight: bold; color: #059669;">
                {{ $registration->project_name ?? 'উল্লেখ নেই' }}
            </div>
        </div>

        <!-- Applicant Information -->
        <div class="section">
            <div class="section-header">👤 আবেদনকারীর তথ্য (Applicant Information)</div>
            <div class="section-body">
                <div class="photo-box">
                    @if($registration->applicant_photo)
                        <img src="{{ Storage::url($registration->applicant_photo) }}" alt="Photo">
                    @else
                        <div class="placeholder">ছবি নেই<br>No Photo</div>
                    @endif
                </div>
                <table class="info-table">
                    <tr>
                        <td class="label">আবেদনকারীর নাম</td>
                        <td class="value" colspan="3" style="font-size: 14px; font-weight: bold;">{{ $registration->applicant_name }}</td>
                    </tr>
                    <tr>
                        <td class="label">পিতার নাম</td>
                        <td class="value">{{ $registration->father_name ?? '-' }}</td>
                        <td class="label">মাতার নাম</td>
                        <td class="value">{{ $registration->mother_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">স্বামী/স্ত্রীর নাম</td>
                        <td class="value" colspan="3">{{ $registration->spouse_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">NID/Passport/BC</td>
                        <td class="value">{{ $registration->nid ?? '-' }}</td>
                        <td class="label">TIN</td>
                        <td class="value">{{ $registration->tin ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">মোবাইল</td>
                        <td class="value">{{ $registration->mobile }}</td>
                        <td class="label">ইমেইল</td>
                        <td class="value">{{ $registration->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">জন্ম তারিখ</td>
                        <td class="value">{{ $registration->dob ? $registration->dob->format('d/m/Y') : '-' }}</td>
                        <td class="label">জাতীয়তা</td>
                        <td class="value">{{ $registration->nationality ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">ধর্ম</td>
                        <td class="value">{{ $registration->religion ?? '-' }}</td>
                        <td class="label">বৈবাহিক অবস্থা</td>
                        <td class="value">{{ $registration->marital_status ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">লিঙ্গ</td>
                        <td class="value">{{ $registration->gender ?? '-' }}</td>
                        <td class="label">বাসিন্দার ধরন</td>
                        <td class="value">{{ $registration->resident_status ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">পেশা</td>
                        <td class="value">{{ $registration->profession ?? '-' }}</td>
                        <td class="label">প্রতিষ্ঠান</td>
                        <td class="value">{{ $registration->organization ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">যোগাযোগের ঠিকানা</td>
                        <td class="value" colspan="3">{{ $registration->mailing_address ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">স্থায়ী ঠিকানা</td>
                        <td class="value" colspan="3">{{ $registration->permanent_address ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Nominee Information -->
        <div class="section">
            <div class="section-header">👥 নমিনির তথ্য (Nominee Information)</div>
            <div class="section-body">
                @if($registration->nominee_name)
                <div class="photo-box" style="width: 80px; height: 100px;">
                    @if($registration->nominee_photo)
                        <img src="{{ Storage::url($registration->nominee_photo) }}" alt="Photo">
                    @else
                        <div class="placeholder">ছবি নেই</div>
                    @endif
                </div>
                <table class="info-table">
                    <tr>
                        <td class="label">নমিনির নাম</td>
                        <td class="value">{{ $registration->nominee_name }}</td>
                        <td class="label">সম্পর্ক</td>
                        <td class="value">{{ $registration->nominee_relation ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">NID/BC</td>
                        <td class="value">{{ $registration->nominee_nid ?? '-' }}</td>
                        <td class="label">মোবাইল</td>
                        <td class="value">{{ $registration->nominee_mobile ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">ঠিকানা</td>
                        <td class="value" colspan="3">{{ $registration->nominee_address ?? '-' }}</td>
                    </tr>
                </table>
                @else
                <p style="color: #9ca3af; text-align: center;">নমিনির তথ্য দেওয়া হয়নি</p>
                @endif
            </div>
        </div>

        <!-- Plot Information -->
        <div class="section">
            <div class="section-header">📍 প্লট/সম্পত্তির তথ্য (Plot/Property Information)</div>
            <div class="section-body">
                <table class="info-table">
                    <tr>
                        <td class="label">প্লটের ধরন</td>
                        <td class="value">{{ $registration->plot_type ?? '-' }}</td>
                        <td class="label">প্লট নম্বর</td>
                        <td class="value">{{ $registration->plot_no ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">রোড নম্বর</td>
                        <td class="value">{{ $registration->road_no ?? '-' }}</td>
                        <td class="label">ব্লক নম্বর</td>
                        <td class="value">{{ $registration->block_no ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">মুখ (Facing)</td>
                        <td class="value">{{ $registration->facing ?? '-' }}</td>
                        <td class="label">আয়তন (কাঠা)</td>
                        <td class="value">{{ $registration->area_katha ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">প্রতি কাঠা দর</td>
                        <td class="value">{{ $registration->rate_per_katha ? '৳ ' . number_format($registration->rate_per_katha, 0) : '-' }}</td>
                        <td class="label">মন্তব্য</td>
                        <td class="value">{{ $registration->remarks ?? '-' }}</td>
                    </tr>
                </table>
                <div class="highlight-box">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span>মোট মূল্য (Total Price):</span>
                        <span class="amount">{{ $registration->total_price ? '৳ ' . number_format($registration->total_price, 0) : 'নির্ধারিত হয়নি' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="section">
            <div class="section-header">💳 পেমেন্টের বিবরণ (Payment Details)</div>
            <div class="section-body">
                <table class="info-table">
                    <tr>
                        <td class="label">পেমেন্ট মোড</td>
                        <td class="value">{{ $registration->payment_mode ?? '-' }}</td>
                        <td class="label">পেমেন্ট টাইপ</td>
                        <td class="value">{{ $registration->payment_type ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">বুকিং মানি</td>
                        <td class="value">{{ $registration->booking_money ? '৳ ' . number_format($registration->booking_money, 0) : '-' }}</td>
                        <td class="label">চেক/DD/PO নম্বর</td>
                        <td class="value">{{ $registration->cheque_no ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">ব্যাংক</td>
                        <td class="value" colspan="3">{{ $registration->bank_name ?? '-' }}</td>
                    </tr>
                    @if($registration->payment_mode == 'Installment')
                    <tr style="background: #f0fdf4;">
                        <td colspan="4" style="font-weight: bold; color: #059669; padding: 10px;">কিস্তির বিবরণ</td>
                    </tr>
                    <tr>
                        <td class="label">ডাউন পেমেন্ট</td>
                        <td class="value">{{ $registration->down_payment ? '৳ ' . number_format($registration->down_payment, 0) : '-' }}</td>
                        <td class="label">বাকি টাকা</td>
                        <td class="value">{{ $registration->remaining_amount ? '৳ ' . number_format($registration->remaining_amount, 0) : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">কিস্তির সংখ্যা</td>
                        <td class="value">{{ $registration->no_of_installment ?? '-' }}</td>
                        <td class="label">প্রতি কিস্তি</td>
                        <td class="value">{{ $registration->per_installment ? '৳ ' . number_format($registration->per_installment, 0) : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">কিস্তি শুরুর তারিখ</td>
                        <td class="value" colspan="3">{{ $registration->emi_start_date ? $registration->emi_start_date->format('d/m/Y') : '-' }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <!-- Signature Area -->
        <div class="signature-area">
            <div class="signature-box">
                <div class="signature-line">আবেদনকারীর স্বাক্ষর</div>
            </div>
            <div class="signature-box">
                <div class="signature-line">অফিসের স্বাক্ষর ও সীল</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Head Office: 50, Lake Circus, Level-5, Kalabagan, Dhaka - 1209</p>
            <p>Local Office: Yearpur Botgach Tola, Jirabo, Ashulia, Savar, Dhaka.</p>
            <p class="contacts">www.joljochna.com | hello.nexgroup@gmail.com | +880 1991 994 994</p>
            <p style="margin-top: 10px; font-size: 9px;">Generated on: {{ now()->format('d M Y, h:i A') }}</p>
        </div>
    </div>
</body>
</html>
