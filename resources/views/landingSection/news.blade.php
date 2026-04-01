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
            gap: 40px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 0;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .category-slider::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .category-card {
            min-width: 350px;
            flex: 0 0 calc(33.333% - 27px);
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            padding: 0 20px;
            border-right: 1px solid #f1f5f9;
        }

        .category-card:last-child {
            border-right: none;
        }

        .category-card:hover {
            transform: translateY(-10px);
        }

        .category-image-wrap {
            width: 280px;
            height: 380px;
            margin: 0 auto 30px;
            border-radius: 140px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .category-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .category-card:hover .category-image-wrap img {
            transform: scale(1.1);
        }

        .category-meta {
            text-align: left;
            padding-left: 35px;
        }

        .category-date {
            font-size: 0.9rem;
            color: #94a3b8;
            margin-bottom: 12px;
            display: block;
        }

        .category-title {
            font-size: 1.5rem;
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
            top: 190px; /* Center of the 380px image */
            transform: translateY(-50%);
            width: 54px;
            height: 54px;
            border-radius: 50%;
            border: 1px solid #f1f5f9;
            background: #fff;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            z-index: 20;
        }

        .nav-btn.prev {
            left: -30px;
        }

        .nav-btn.next {
            right: -30px;
        }

        .nav-btn:hover {
            background: #0d3d29;
            color: #fff;
            transform: translateY(-50%) scale(1.1);
        }

        @media (max-width: 1100px) {
            .category-card {
                min-width: 300px;
                flex: 0 0 50%;
            }
        }

        @media (max-width: 768px) {
            .category-card {
                min-width: 280px;
                flex: 0 0 100%;
                border-right: none;
                border-bottom: 1px solid #f1f5f9;
                padding-bottom: 40px;
            }
            .news-header h2 {
                font-size: 2.2rem;
            }
            .slider-nav {
                display: none;
            }
        }
    </style>

    <div class="news-container">
        <div class="news-header">
            <h2>{{ $title }}</h2>
            <p>{{ $subtitle }}</p>
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
