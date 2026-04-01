@php
    $newsSection = $projectSections['news_section'] ?? null;
    $title = $newsSection->title ?? '';
    $subtitle = $newsSection->subtitle ?? '';
    
    // Group by category and get latest post for each
    $categories = $allNews->groupBy('category')->map(function($items) {
        return $items->sortByDesc('published_at')->first();
    });
@endphp

<section class="news-section" id="news">
    <style>
        .news-section {
            padding: 100px 0;
            background: #ffffff;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        .news-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .news-header h2 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #0D3D29;
            margin-bottom: 15px;
        }

        .news-header p {
            color: #64748b;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .category-slider-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .category-slider {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 0;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .category-slider::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .category-card {
            min-width: 300px;
            flex: 0 0 calc(33.333% - 20px);
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e8edf2;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            overflow: hidden;
            padding: 0;
        }

        .category-card:last-child {
            border-right: none;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(13,61,41,0.12);
        }

        .category-image-wrap {
            width: 100%;
            height: 220px;
            border-radius: 0;
            overflow: hidden;
            position: relative;
        }

        .category-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
            transition: transform 0.5s ease;
            display: block;
        }

        .category-card:hover .category-image-wrap img {
            transform: scale(1.05);
        }

        /* Category badge on image */
        .category-image-wrap::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.35) 100%);
        }

        .category-meta {
            text-align: left;
            padding: 18px 20px 20px;
        }

        .category-date {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-bottom: 8px;
            display: block;
            font-weight: 500;
        }

        .category-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.4;
            margin: 0;
            transition: color 0.3s ease;
        }

        .category-card:hover .category-title {
            color: #0d3d29;
        }

        /* Navigation Arrows */
        .nav-btn {
            position: absolute;
            top: 110px;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 20;
        }

        .nav-btn.prev { left: -22px; }
        .nav-btn.next { right: -22px; }

        .nav-btn:hover {
            background: #0d3d29;
            color: #fff;
        }

        @media (max-width: 1100px) {
            .category-card { min-width: 260px; flex: 0 0 50%; }
        }

        @media (max-width: 768px) {
            .category-card {
                min-width: 260px;
                flex: 0 0 85%;
                border-bottom: none;
            }
            .news-header h2 { font-size: 2rem; }
            .slider-nav { display: none; }
        }
    </style>

    <div class="news-container">
        <div class="news-header">
            <h2>{{ $title ?: 'সর্বশেষ সংবাদ ও আপডেট' }}</h2>
            <p>{{ $subtitle ?: 'জলছায়া প্রজেক্টের সর্বশেষ খবর, ঘোষণা এবং মিডিয়া আপডেট' }}</p>
        </div>

        @if($categories->count() > 0)
            <div class="category-slider-wrap">
                <div class="category-slider" id="categorySlider">
                    @foreach($categories as $catName => $item)
                        <a href="{{ route('news', ['category' => $catName]) }}" class="category-card">
                            <div class="category-image-wrap">
                                @if($item->image_url)
                                    <img src="{{ $item->image_url }}" alt="{{ $catName }}">
                                @else
                                    <div style="width:100%; height:100%; background:#f1f5f9; display:flex; align-items:center; justify-content:center; font-size:3rem;">{{ mb_substr($catName, 0, 1) }}</div>
                                @endif
                            </div>
                            <div class="category-meta">
                                <span class="category-date">
                                    {{ $item->published_at ? $item->published_at->format('M d, Y') : $item->created_at->format('M d, Y') }}
                                </span>
                                <h3 class="category-title">{{ $catName ?: 'অন্যান্য' }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($categories->count() > 3)
                    <button class="nav-btn prev" onclick="document.getElementById('categorySlider').scrollBy({left: -400, behavior: 'smooth'})">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="nav-btn next" onclick="document.getElementById('categorySlider').scrollBy({left: 400, behavior: 'smooth'})">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
            </div>
        @else
            <div style="text-align:center; padding: 100px; background:#f8fafc; border-radius:40px; border: 2px dashed #e2e8f0;">
                <p style="color:#64748b; font-size: 1.2rem;">দুঃখিত, বর্তমানে কোনো সংবাদ বা ক্যাটাগরি নেই।</p>
            </div>
        @endif
    </div>
</section>
