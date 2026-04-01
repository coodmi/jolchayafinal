@extends('layouts')

@section('content')
<section style="background: #0d3d29; min-height: 100vh; padding: 80px 0 40px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Back Button -->
                <div class="mb-4">
                    <a href="{{ route('user.applications') }}" class="btn" style="background: rgba(255,255,255,0.1); color: #ffd700; border: 2px solid rgba(255,215,0,0.3); padding: 10px 25px; border-radius: 50px; text-decoration: none; display: inline-flex; align-items: center; font-weight: 600; margin-top: 20px;">
                        <i class="fas fa-arrow-left me-2"></i>আবেদন তালিকায় ফিরে যান
                    </a>
                </div>

                <!-- Main Card -->
                <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                    
                    <!-- Header -->
                    <div style="background: linear-gradient(135deg, #0d3d29 0%, #0a5f3a 100%); padding: 30px; color: white;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h2 style="margin: 0 0 5px; font-size: 1.8rem; font-weight: 700;">
                                    @if($type == 'registration')
                                        <i class="fas fa-file-contract me-2"></i>রেজিস্ট্রেশন বিস্তারিত
                                    @else
                                        <i class="fas fa-bookmark me-2"></i>বুকিং বিস্তারিত
                                    @endif
                                </h2>
                                <p style="margin: 0; color: #ffd700; font-weight: 600; font-size: 1.1rem;">
                                    @if($type == 'registration')
                                        {{ $application->application_number }}
                                    @else
                                        BK-{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}
                                    @endif
                                </p>
                            </div>
                            <div>
                                <span class="badge" style="padding: 10px 20px; border-radius: 50px; font-size: 1rem; font-weight: 700;
                                    @if(($application->status ?? 'pending') == 'pending') 
                                        background: rgba(255,193,7,0.9); color: #000;
                                    @elseif(($application->status ?? 'pending') == 'approved' || ($application->status ?? 'pending') == 'completed') 
                                        background: rgba(76,175,80,0.9); color: white;
                                    @elseif(($application->status ?? 'pending') == 'processing' || ($application->status ?? 'pending') == 'contacted') 
                                        background: rgba(33,150,243,0.9); color: white;
                                    @else 
                                        background: rgba(158,158,158,0.9); color: white;
                                    @endif">
                                    @if($type == 'registration')
                                        {{ $application->status_bengali ?? 'অপেক্ষমাণ' }}
                                    @else
                                        {{ match($application->status ?? 'pending') {
                                            'pending' => 'অপেক্ষমাণ',
                                            'contacted' => 'যোগাযোগ করা হয়েছে',
                                            'completed' => 'সম্পন্ন',
                                            default => 'অপেক্ষমাণ',
                                        } }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div style="padding: 40px 30px;">
                        @if($type == 'registration')
                            <!-- Registration Details -->
                            <div class="row g-4">
                                <!-- Applicant Info -->
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-card-header">
                                            <i class="fas fa-user"></i>
                                            <h5>আবেদনকারীর তথ্য</h5>
                                        </div>
                                        
                                        @if($application->applicant_photo)
                                        <div style="text-align: center; margin-bottom: 20px;">
                                            <img src="{{ Storage::url($application->applicant_photo) }}" alt="Photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 4px solid #0d3d29;">
                                        </div>
                                        @endif
                                        
                                        <div class="info-list">
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-id-card"></i> নাম</span>
                                                <span class="info-value">{{ $application->applicant_name }}</span>
                                            </div>
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-phone"></i> মোবাইল</span>
                                                <span class="info-value">{{ $application->mobile }}</span>
                                            </div>
                                            @if($application->email)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-envelope"></i> ইমেইল</span>
                                                <span class="info-value">{{ $application->email }}</span>
                                            </div>
                                            @endif
                                            @if($application->nid)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-id-badge"></i> NID</span>
                                                <span class="info-value">{{ $application->nid }}</span>
                                            </div>
                                            @endif
                                            @if($application->father_name)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-male"></i> পিতার নাম</span>
                                                <span class="info-value">{{ $application->father_name }}</span>
                                            </div>
                                            @endif
                                            @if($application->mother_name)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-female"></i> মাতার নাম</span>
                                                <span class="info-value">{{ $application->mother_name }}</span>
                                            </div>
                                            @endif
                                            @if($application->profession)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-briefcase"></i> পেশা</span>
                                                <span class="info-value">{{ $application->profession }}</span>
                                            </div>
                                            @endif
                                            @if($application->mailing_address)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-map-marker-alt"></i> ঠিকানা</span>
                                                <span class="info-value">{{ $application->mailing_address }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Plot Info -->
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-card-header">
                                            <i class="fas fa-map-marked-alt"></i>
                                            <h5>প্রকল্প ও প্লটের তথ্য</h5>
                                        </div>
                                        <div class="info-list">
                                            @if($application->project_name)
                                            <div class="info-row highlight">
                                                <span class="info-label"><i class="fas fa-building"></i> প্রকল্প</span>
                                                <span class="info-value" style="font-weight: 700;">{{ $application->project_name }}</span>
                                            </div>
                                            @endif
                                            @if($application->plot_no)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-hashtag"></i> প্লট নম্বর</span>
                                                <span class="info-value">{{ $application->plot_no }}</span>
                                            </div>
                                            @endif
                                            @if($application->road_no)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-road"></i> রোড নম্বর</span>
                                                <span class="info-value">{{ $application->road_no }}</span>
                                            </div>
                                            @endif
                                            @if($application->block_no)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-th-large"></i> ব্লক নম্বর</span>
                                                <span class="info-value">{{ $application->block_no }}</span>
                                            </div>
                                            @endif
                                            @if($application->area_katha)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-ruler-combined"></i> আয়তন</span>
                                                <span class="info-value">{{ $application->area_katha }} কাঠা</span>
                                            </div>
                                            @endif
                                            @if($application->total_price)
                                            <div class="info-row price">
                                                <span class="info-label"><i class="fas fa-money-bill-wave"></i> মোট মূল্য</span>
                                                <span class="info-value" style="color: #0d3d29; font-size: 1.3rem; font-weight: 700;">৳ {{ number_format($application->total_price, 0) }}</span>
                                            </div>
                                            @endif
                                            @if($application->booking_money)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-coins"></i> বুকিং মানি</span>
                                                <span class="info-value">৳ {{ number_format($application->booking_money, 0) }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    @if($application->nominee_name)
                                    <div class="info-card mt-4">
                                        <div class="info-card-header">
                                            <i class="fas fa-user-friends"></i>
                                            <h5>নমিনির তথ্য</h5>
                                        </div>
                                        <div class="info-list">
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-user"></i> নাম</span>
                                                <span class="info-value">{{ $application->nominee_name }}</span>
                                            </div>
                                            @if($application->nominee_mobile)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-phone"></i> মোবাইল</span>
                                                <span class="info-value">{{ $application->nominee_mobile }}</span>
                                            </div>
                                            @endif
                                            @if($application->nominee_relation)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-heart"></i> সম্পর্ক</span>
                                                <span class="info-value">{{ $application->nominee_relation }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                        @else
                            <!-- Booking Details -->
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-card-header">
                                            <i class="fas fa-user"></i>
                                            <h5>আবেদনকারীর তথ্য</h5>
                                        </div>
                                        <div class="info-list">
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-id-card"></i> নাম</span>
                                                <span class="info-value">{{ $application->name }}</span>
                                            </div>
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-phone"></i> মোবাইল</span>
                                                <span class="info-value">{{ $application->phone }}</span>
                                            </div>
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-envelope"></i> ইমেইল</span>
                                                <span class="info-value">{{ $application->email }}</span>
                                            </div>
                                            @if($application->address)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-map-marker-alt"></i> ঠিকানা</span>
                                                <span class="info-value">{{ $application->address }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-card-header">
                                            <i class="fas fa-clipboard-list"></i>
                                            <h5>বুকিং তথ্য</h5>
                                        </div>
                                        <div class="info-list">
                                            @if($application->plot_size)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-ruler-combined"></i> প্লটের আকার</span>
                                                <span class="info-value">{{ $application->plot_size }}</span>
                                            </div>
                                            @endif
                                            @if($application->preferred_location)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-map-pin"></i> পছন্দের স্থান</span>
                                                <span class="info-value">{{ $application->preferred_location }}</span>
                                            </div>
                                            @endif
                                            @if($application->budget)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-money-bill-wave"></i> বাজেট</span>
                                                <span class="info-value">{{ $application->budget }}</span>
                                            </div>
                                            @endif
                                            @if($application->message)
                                            <div class="info-row">
                                                <span class="info-label"><i class="fas fa-comment"></i> বার্তা</span>
                                                <span class="info-value">{{ $application->message }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Timeline -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div style="background: linear-gradient(135deg, #e3f2fd, #ffffff); border-radius: 15px; padding: 25px; border-left: 5px solid #2196f3;">
                                    <div class="d-flex align-items-center gap-4 flex-wrap">
                                        <div class="d-flex align-items-center gap-3">
                                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #2196f3, #1976d2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                            <div>
                                                <small style="color: #1976d2; font-weight: 700; display: block;">জমা দেওয়ার তারিখ</small>
                                                <strong style="color: #495057; font-size: 1.05rem;">{{ $application->created_at->format('d M Y, h:i A') }}</strong>
                                            </div>
                                        </div>
                                        @if($application->updated_at && $application->updated_at != $application->created_at)
                                        <div style="width: 2px; height: 40px; background: #2196f3;"></div>
                                        <div class="d-flex align-items-center gap-3">
                                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #2196f3, #1976d2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                                <i class="fas fa-sync-alt"></i>
                                            </div>
                                            <div>
                                                <small style="color: #1976d2; font-weight: 700; display: block;">সর্বশেষ আপডেট</small>
                                                <strong style="color: #495057; font-size: 1.05rem;">{{ $application->updated_at->format('d M Y, h:i A') }}</strong>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($type == 'registration' && $application->admin_notes)
                        <!-- Admin Notes -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div style="background: linear-gradient(135deg, #fff3cd, #ffffff); border-radius: 15px; padding: 25px; border-left: 5px solid #ffc107;">
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px; color: #ff9800;">
                                        <i class="fas fa-sticky-note" style="font-size: 1.5rem;"></i>
                                        <h6 style="margin: 0; font-weight: 700; font-size: 1.1rem; color: #f57c00;">অ্যাডমিন নোট</h6>
                                    </div>
                                    <p style="margin: 0; color: #495057; font-size: 1rem; line-height: 1.6;">{{ $application->admin_notes }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div style="background: #f8f9fa; padding: 20px 30px; border-top: 1px solid #e9ecef; text-align: center;">
                        <p style="margin: 0; color: #6c757d; font-weight: 600;">
                            <i class="fas fa-info-circle me-2"></i>আরও তথ্যের জন্য অফিসে যোগাযোগ করুন
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.info-card {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
    height: 100%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.info-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 3px solid #e9ecef;
}

.info-card-header i {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #0d3d29, #0a5f3a);
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.info-card-header h5 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
    color: #212529;
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 15px;
    background: white;
    border-radius: 10px;
    border-left: 4px solid #0d3d29;
}

.info-row.highlight {
    background: linear-gradient(135deg, #fff8e1, #ffffff);
    border-left-color: #ffd700;
}

.info-row.price {
    background: linear-gradient(135deg, #e8f5e9, #ffffff);
}

.info-label {
    font-weight: 600;
    color: #6c757d;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-label i {
    color: #0d3d29;
}

.info-value {
    color: #212529;
    font-weight: 600;
    text-align: right;
}

@media (max-width: 768px) {
    .info-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .info-value {
        text-align: left;
    }
}
</style>
@endsection
