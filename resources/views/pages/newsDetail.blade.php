@extends('layouts')

@section('content')
    <style>
        .news-detail-page {
            background: #fff;
            min-height: 100vh;
            padding-top: 80px; /* Navbar height */
        }
        .news-hero-section {
            width: 100%;
            height: 65vh;
            position: relative;
            overflow: hidden;
            background: #0f172a;
        }
        .news-hero-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }
        .news-hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            padding: 100px 0 60px;
            color: white;
        }
        .news-main-content {
            max-width: 1600px;
            margin: 0 auto;
            padding: 60px 40px;
        }
        .news-article-body {
            font-size: 1.25rem;
            line-height: 1.9;
            color: #334155;
        }
        .news-article-body p {
            margin-bottom: 1.8rem;
        }
        .news-article-body img {
            max-width: 100%;
            border-radius: 20px;
            margin: 30px 0;
        }
        .back-to-news {
            position: fixed;
            top: 100px;
            left: 20px;
            z-index: 100;
            background: white;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            color: #0d3d29;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .back-to-news:hover {
            transform: translateX(-5px);
            background: #0d3d29;
            color: white;
        }
        @media (max-width: 1300px) {
            .back-to-news {
                position: absolute;
                top: -70px;
                left: 20px;
                width: auto;
                height: auto;
                border-radius: 12px;
                padding: 12px 20px;
                font-weight: 700;
            }
            .news-main-content {
                position: relative;
            }
        }
        @media (max-width: 768px) {
            .news-hero-section {
                height: 50vh;
            }
            .news-hero-content h1 {
                font-size: 2rem !important;
            }
        }
    </style>

    <div class="news-detail-page">
        @if($news->image_url)
            <div class="news-hero-section">
                <img src="{{ $news->image_url }}" alt="{{ $news->title }}">
                <div class="news-hero-content">
                    <div class="container-fluid" style="padding: 0 60px;">
                        <div style="max-width: 1400px; margin: 0 auto;">
                            <span style="background: #ffd700; color: #0d3d29; padding: 6px 18px; border-radius: 50px; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px;">{{ $news->category ?? 'সাধারণ' }}</span>
                            <h1 style="font-size: 3.5rem; font-weight: 800; margin-top: 25px; line-height: 1.1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">{{ $news->title }}</h1>
                            <div style="margin-top: 25px; opacity: 0.9; font-size: 1.1rem; display: flex; align-items: center; gap: 15px;">
                                <span><i class="far fa-calendar-alt me-2"></i> {{ $news->published_at ? $news->published_at->format('d M, Y') : $news->created_at->format('d M, Y') }}</span>
                                <span style="opacity: 0.5;">|</span>
                                <span><i class="far fa-clock me-2"></i> ৫ মিনিট পাঠ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="news-main-content">
            <a href="{{ route('news') }}" class="back-to-news">
                <i class="fas fa-arrow-left"></i>
                <span class="d-xl-none ms-2">সকল সংবাদ</span>
            </a>

            @if(!$news->image_url)
                <div style="margin-bottom: 50px;">
                    <span style="background: #f1f5f9; color: #0d3d29; padding: 6px 18px; border-radius: 50px; font-weight: 700; font-size: 0.9rem;">{{ $news->category ?? 'সাধারণ' }}</span>
                    <h1 style="font-size: 3.5rem; font-weight: 800; color: #0f172a; margin: 25px 0; line-height: 1.1;">{{ $news->title }}</h1>
                    <div style="color: #94a3b8; font-size: 1.1rem; display: flex; align-items: center; gap: 15px;">
                        <span><i class="far fa-calendar-alt me-2"></i> {{ $news->published_at ? $news->published_at->format('d M, Y') : $news->created_at->format('d M, Y') }}</span>
                    </div>
                </div>
            @endif

            <div class="news-article-body">
                {!! $news->content !!}
            </div>

            <!-- Share Section -->
            <div style="margin-top: 60px; padding: 30px; background: #f8fafc; border-radius: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div style="font-weight: 700; color: #0f172a;">এই সংবাদটি শেয়ার করুন:</div>
                <div style="display: flex; gap: 10px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="width: 45px; height: 45px; border-radius: 50%; background: #1877f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank" style="width: 45px; height: 45px; border-radius: 50%; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;"><i class="fab fa-twitter"></i></a>
                    <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" target="_blank" style="width: 45px; height: 45px; border-radius: 50%; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s;"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Related News -->
            <div style="margin-top: 100px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                    <h3 style="font-size: 1.75rem; font-weight: 800; color: #0f172a; margin: 0;">আরও পড়ুন</h3>
                    <a href="{{ route('news') }}" style="color: #0d3d29; font-weight: 700; text-decoration: none;">সব দেখুন <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                    @foreach($recentNews as $recent)
                        <a href="{{ route('news.detail', $recent->id) }}" style="text-decoration: none; group">
                            <div style="width: 100%; height: 200px; border-radius: 20px; overflow: hidden; margin-bottom: 15px;">
                                <img src="{{ $recent->image_url ?? '/images/default-news.jpg' }}" alt="" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;" class="recent-img">
                            </div>
                            <h4 style="font-size: 1.1rem; color: #0f172a; margin-bottom: 8px; line-height: 1.4; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $recent->title }}</h4>
                            <span style="font-size: 0.9rem; color: #94a3b8;">{{ $recent->published_at ? $recent->published_at->format('d M, Y') : $recent->created_at->format('d M, Y') }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .recent-img:hover {
            transform: scale(1.1);
        }
    </style>
@endsection
