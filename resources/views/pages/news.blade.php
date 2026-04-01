@extends('layouts')

@section('content')
    <style>
        .news-page-wrapper {
            padding: 120px 0 80px;
            background: #f8fafc;
            min-height: 100vh;
        }
        .news-layout {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 40px;
        }
        .main-news-column {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .sidebar-column {
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        .news-card-wide {
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .news-card-wide:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .news-card-wide .image-area {
            width: 300px;
            flex-shrink: 0;
            position: relative;
        }
        .news-card-wide .image-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .news-card-wide .content-area {
            padding: 30px;
            flex: 1;
        }
        .sidebar-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }
        .sidebar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f5f9;
        }
        .category-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-radius: 10px;
            color: #64748b;
            text-decoration: none;
            transition: all 0.2s;
            margin-bottom: 5px;
        }
        .category-link:hover, .category-link.active {
            background: #0d3d29;
            color: white;
        }
        .category-link .count {
            font-size: 0.8rem;
            background: #f1f5f9;
            color: #64748b;
            padding: 2px 8px;
            border-radius: 20px;
            transition: all 0.2s;
        }
        .category-link:hover .count, .category-link.active .count {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Pagination Styles */
        .pagination {
            display: flex;
            gap: 8px;
            list-style: none;
            padding: 0;
            margin: 0;
            align-items: center;
            justify-content: center;
        }
        .pagination .page-item {
            display: inline-block;
        }
        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 45px;
            height: 45px;
            padding: 0 12px;
            border-radius: 12px;
            background: white;
            color: #64748b;
            text-decoration: none;
            border: 2px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }
        .pagination .page-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(135deg, #0d3d29 0%, #0d6639 100%);
            transition: width 0.3s ease;
            z-index: 0;
        }
        .pagination .page-link span {
            position: relative;
            z-index: 1;
            transition: color 0.3s ease;
        }
        .pagination .page-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 61, 41, 0.15);
            border-color: #0d3d29;
            color: white;
        }
        .pagination .page-link:hover::before {
            width: 100%;
        }
        .pagination .page-link:hover span {
            color: white;
        }
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #0d3d29 0%, #0d6639 100%);
            color: white;
            border-color: #0d3d29;
            box-shadow: 0 4px 15px rgba(13, 61, 41, 0.2);
        }
        .pagination .page-item.disabled .page-link {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
            background: #f8fafc;
        }
        
        /* Hide default Laravel pagination text */
        .pagination-info {
            display: none;
        }

        @media (max-width: 968px) {
            .news-layout {
                grid-template-columns: 1fr;
            }
            .sidebar-column {
                order: -1;
                position: static;
            }
            .news-card-wide {
                flex-direction: column;
            }
            .news-card-wide .image-area {
                width: 100%;
                height: 200px;
            }
        }
    </style>

    <div class="news-page-wrapper">
        <div class="container-fluid" style="max-width: 1600px; margin: 0 auto; padding: 0 40px;">
            <div class="news-layout">
                <!-- Left Column -->
                <div class="main-news-column">
                    @php
                        $newsSection = $projectSections['news_section'] ?? null;
                        $defaultTitle = $newsSection->title ?? 'সকল সংবাদ';
                    @endphp
                    <h1 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 10px;">
                        {{ $selectedCategory ?: $defaultTitle }}
                    </h1>
                    
                    @if($allNews->count() > 0)
                        @foreach($allNews as $item)
                            <a href="/news/{{ $item->id }}" class="news-card-wide news-item-link" data-id="{{ $item->id }}">
                                <div class="image-area">
                                    @if($item->image_url)
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                                    @else
                                        <div style="width:100%; height:100%; background:#f1f5f9; display:flex; align-items:center; justify-content:center; font-size:3rem;">📰</div>
                                    @endif
                                </div>
                                <div class="content-area">
                                    <div style="font-size: 0.85rem; color: #94a3b8; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $item->published_at ? $item->published_at->format('d M, Y') : $item->created_at->format('d M, Y') }}
                                        <span style="color: #e2e8f0;">|</span>
                                        <span style="color: #0d3d29; font-weight: 600;">{{ $item->category ?: 'সাধারণ' }}</span>
                                    </div>
                                    <h3 style="font-size: 1.5rem; color: #0f172a; margin-bottom: 15px; font-weight: 700;">{{ $item->title }}</h3>
                                    <p style="color: #64748b; font-size: 1rem; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ Str::limit(strip_tags($item->content), 180) }}
                                    </p>
                                    <div style="margin-top: 20px; color: #0d3d29; font-weight: 700; font-size: 0.95rem; display: inline-flex; align-items: center; gap: 8px;">
                                        আরও পড়ুন <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div style="text-align: center; padding: 80px; background: white; border-radius: 24px; border: 2px dashed #f1f5f9;">
                            <p style="color: #64748b; font-size: 1.2rem;">দুঃখিত, কোনো সংবাদ পাওয়া যায়নি।</p>
                        </div>
                    @endif
                    @if($allNews->hasPages())
                        <div style="margin-top: 50px;">
                            <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                                <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                                    <div style="color: #64748b; font-size: 0.9rem; font-weight: 500;">
                                        পৃষ্ঠা {{ $allNews->currentPage() }} / {{ $allNews->lastPage() }} 
                                        <span style="margin: 0 8px;">•</span>
                                        মোট {{ $allNews->total() }} টি সংবাদ
                                    </div>
                                    {{ $allNews->links('vendor.pagination.custom') }}
                                </div>
                            </div>
                        </div>
                    @endif                </div>

                <!-- Right Column (Sidebar) -->
                <div class="sidebar-column">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">ক্যাটাগরি</h3>
                        <div class="category-list">
                            <a href="{{ route('news') }}" class="category-link {{ !$selectedCategory ? 'active' : '' }}">
                                <span>সব সংবাদ</span>
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ route('news', ['category' => $cat]) }}" class="category-link {{ $selectedCategory == $cat ? 'active' : '' }}">
                                    <span>{{ $cat }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-card" style="margin-top: 30px;">
                        <h3 class="sidebar-title">সার্চ করুন</h3>
                        <div style="position: relative;" id="searchWrapper">
                            <form action="{{ route('news') }}" method="GET">
                                <div style="position: relative;">
                                    <input type="text" name="search" id="newsSearchInput" autocomplete="off" placeholder="খুঁজুন..." style="width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 12px; font-size: 0.95rem;">
                                    <button type="submit" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: none; color: #94a3b8;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div id="searchSuggestions" style="position: absolute; top: 100%; left: 0; right: 0; background: white; border: 1px solid #e2e8f0; border-radius: 0 0 12px 12px; z-index: 100; box-shadow: 0 10px 20px rgba(0,0,0,0.1); display: none;">
                                <!-- Suggestions will appear here -->
                            </div>
                        </div>
                    </div>

                    <script>
                        const searchInput = document.getElementById('newsSearchInput');
                        const suggestionsDiv = document.getElementById('searchSuggestions');
                        let debounceTimer;

                        searchInput.addEventListener('input', function() {
                            clearTimeout(debounceTimer);
                            const query = this.value.trim();
                            
                            if (query.length < 2) {
                                suggestionsDiv.style.display = 'none';
                                return;
                            }

                            debounceTimer = setTimeout(async () => {
                                try {
                                    const res = await fetch(`/api/news/search?q=${encodeURIComponent(query)}`);
                                    const data = await res.json();
                                    
                                    if (data.length > 0) {
                                        suggestionsDiv.innerHTML = data.map(news => `
                                            <a href="/news/${news.id}" style="display: block; padding: 12px 15px; text-decoration: none; color: #0f172a; border-bottom: 1px solid #f1f5f9; font-size: 0.9rem; transition: background 0.2s;">
                                                <i class="far fa-newspaper" style="color: #94a3b8; margin-right: 8px;"></i>
                                                ${news.title}
                                            </a>
                                        `).join('');
                                        suggestionsDiv.style.display = 'block';
                                    } else {
                                        suggestionsDiv.style.display = 'none';
                                    }
                                } catch (e) {
                                    console.error('Search error:', e);
                                }
                            }, 300);
                        });

                        // Close suggestions when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!document.getElementById('searchWrapper').contains(e.target)) {
                                suggestionsDiv.style.display = 'none';
                            }
                        });

                        // Show suggestions when clicking back into the field if it has content
                        searchInput.addEventListener('focus', function() {
                            if (this.value.trim().length >= 2 && suggestionsDiv.innerHTML !== '') {
                                suggestionsDiv.style.display = 'block';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
