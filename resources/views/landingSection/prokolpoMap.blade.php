<style>
  #prokolpoMapSection {
    background: linear-gradient(135deg, #0a2818 0%, #0d3d29 50%, #0a4d2e 100%);
    padding: 60px 0;
    margin-top: 60px;
  }

  #prokolpoMapSection .main-section {
    padding: 40px 15px;
  }

  .offer-card {
    background: linear-gradient(135deg, #0a2818 0%, #0d3d29 50%, #0a4d2e 100%);
    border: 2px solid rgba(13, 85, 52, 0.1);
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(13, 85, 52, 0.1);
    padding: 25px 20px;
    height: 100%;
  }

  .offer-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 25px;
    text-align: center;
  }

  .plot-box {
    background: linear-gradient(135deg, #0a2818 0%, #0d3d29 50%, #0a4d2e 100%);
    color: #fff;
    border: 2px solid #0D5534;
    border-radius: 12px;
    padding: 12px;
    transition: all 0.3s ease;
    cursor: default;
    position: relative;
    display: block;
  }

  .plot-box[data-cta-link] { cursor: pointer; }

  .plot-box[data-cta-link]:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 8px 20px rgba(13, 85, 52, 0.3);
    background: linear-gradient(135deg, #0f6640 0%, #12774c 100%);
    border-color: rgba(255, 215, 0, 0.5);
  }

  .plot-box:hover:not([data-cta-link]) {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 85, 52, 0.2);
  }

  .plot-size {
    font-size: 1.2rem;
    font-weight: 700;
    color: #fff;
  }

  .category-label {
    background-color: #0D5534;
    color: #ffffff;
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
    margin-top: 5px;
    margin-right: 5px;
  }

  .footer-note {
    margin-top: 20px;
    font-size: 0.95rem;
    line-height: 1.7;
    text-align: center;
    color: #fff;
    font-weight: 500;
  }

  .cta-bar {
    background: linear-gradient(135deg, #0D5534 0%, #0f6640 100%);
    color: white;
    font-weight: 700;
    padding: 16px 24px;
    margin-top: 20px;
    border-radius: 10px;
    font-size: 1rem;
    text-align: center;
    box-shadow: 0 4px 15px rgba(13, 85, 52, 0.3);
    cursor: pointer;
    display: block;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    text-decoration: none;
  }

  .cta-bar:hover {
    background: linear-gradient(135deg, #0f6640 0%, #12774c 100%);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(13, 85, 52, 0.4);
    border-color: rgba(255, 215, 0, 0.3);
    color: white;
  }

  .map-section {
    text-align: center;
    background: linear-gradient(135deg, #0a2818 0%, #0d3d29 50%, #0a4d2e 100%);
    border: 2px solid rgba(13, 85, 52, 0.1);
    border-radius: 15px;
    padding: 20px;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(13, 85, 52, 0.1);
  }

  .map-image-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    border-radius: 10px;
    border: 2px solid #0D5534;
    flex-shrink: 0;
    background: linear-gradient(135deg, #0a2818 0%, #0d3d29 50%, #0a4d2e 100%);
  }

  .map-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  @media (max-width: 992px) {
    .map-section { margin-top: 25px; }
    .map-image-wrap { aspect-ratio: 4 / 3; }
  }

  @media (max-width: 576px) {
    .map-image-wrap { aspect-ratio: 1 / 1; }
    .offer-title { font-size: 1.4rem; }
  }

  #prokolpoMapSection .section-title,
  #prokolpoMapSection .section-subtitle {
    text-align: center !important;
    width: 100%;
    display: block;
  }
</style>

<section id="prokolpoMapSection">
<div class="container">

@php
    $roadmapSection = $projectSections['roadmap'] ?? null;
    $roadmapExtra = $roadmapSection
        ? (is_string($roadmapSection->extra_data)
            ? json_decode($roadmapSection->extra_data, true)
            : (array)($roadmapSection->extra_data ?? []))
        : [];
    $plots = $roadmapExtra['plots'] ?? [
        ['size' => '১ শেয়ার',  'cat' => 'স্ট্যান্ডার্ড প্যাকেজ'],
        ['size' => '৫ শেয়ার',  'cat' => 'প্রিমিয়াম প্যাকেজ'],
        ['size' => '১০ শেয়ার', 'cat' => 'ডিলাক্স প্যাকেজ'],
        ['size' => '২০ শেয়ার', 'cat' => 'এক্সিকিউটিভ প্যাকেজ'],
    ];
    $amenities = $roadmapExtra['amenities'] ?? ['ক্লাব হাউজ', 'জিম', 'মসজিদ', 'শপিং এরিয়া'];
    $ctaLink   = $roadmapExtra['ctaLink'] ?? $roadmapExtra['cta_link'] ?? '#contact';
    $ctaText   = $roadmapExtra['ctaBar']  ?? $roadmapExtra['cta_bar']  ?? '📞 এখনই যোগাযোগ করুন — সীমিত সময়ের অফার';
    $mapImage  = $roadmapSection->image_url ?? $roadmapExtra['mapImage'] ?? '/images/Project-roadmap.png';
@endphp

<h2 class="section-title" style="text-align:center;margin:0 0 1rem 0;color:#fff;font-size:2.5rem;font-weight:700;">
    {{ $roadmapSection->title ?? 'প্রজেক্ট রোডম্যাপ' }}
</h2>
<p class="section-subtitle" style="text-align:center !important;margin:0 auto 3rem;color:#fff;font-size:1.1rem;opacity:0.9;width:100%;display:block;">
    {{ $roadmapSection->subtitle ?? 'আপনার পছন্দের শেয়ার বেছে নিন' }}
</p>

<div class="main-section py-4 mb-4">
  <div class="row align-items-stretch">

    {{-- LEFT SIDE --}}
    <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
      <div class="offer-card h-100">

        <h2 class="offer-title">
            {{ $roadmapExtra['offerTitle'] ?? $roadmapExtra['offer_title'] ?? 'বেছে নিন আপনার পছন্দের শেয়ার' }}
        </h2>

        <div class="row g-3 justify-content-center">
          @foreach($plots as $plot)
          <div class="col-6">
            <div class="plot-box"
                 @if(!empty($plot['cta_link'])) data-cta-link="{{ $plot['cta_link'] }}" @endif>
              <div class="plot-size">{{ $plot['size'] ?? '' }}</div>
              <div class="category-label">{{ $plot['cat'] ?? $plot['category'] ?? '' }}</div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-3 text-center">
          @foreach($amenities as $amenity)
            <span class="category-label">{{ $amenity }}</span>
          @endforeach
        </div>

        <a class="cta-bar mt-4" href="{{ $ctaLink }}">{{ $ctaText }}</a>

      </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="col-lg-7 col-md-12">
      <div class="map-section h-100">
        <div class="map-image-wrap">
          <img src="{{ $mapImage }}" alt="Project Map">
        </div>
        <div class="footer-note">
          @if(!empty($roadmapExtra['footerNote']))
            {!! $roadmapExtra['footerNote'] !!}
          @elseif(!empty($roadmapSection->content))
            <p>{{ $roadmapSection->content }}</p>
          @else
            <p>সবুজ প্রকৃতি, নীরব কলকল ধারা আর নির্মল আবহাওয়া — এই জায়গাটি হতে পারে আপনার স্বপ্নের ঠিকানা!</p>
            <p>মূল্য বৃদ্ধির আগে, আজই বুকিং করুন।</p>
          @endif
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</section>
