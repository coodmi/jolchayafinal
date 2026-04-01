 <section id="features" class="features">
     <style>
         .feature-icons {
             background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
             border-radius: 10px;
             width: 80px;
             height: 80px;
             display: flex;
             align-items: center;
             justify-content: center;
             margin: 0 auto 20px;
             color: #d32f2f;
             font-size: 2rem;
             box-shadow: 0 4px 15px rgba(0,0,0,0.2);
         }
     </style>
     <h2 class="section-title">{{ $featureSettings->section_title ?? '' }}</h2>
     <p class="section-subtitle">{{ $featureSettings->section_subtitle ?? '' }}</p>
     <div class="features-grid">
         @foreach(($features ?? collect()) as $feature)
             @if($feature->is_active)
             <div class="feature-card">
                 <div class="feature-icons">{!! $feature->icon ?? '🏙️' !!}</div>
                 <h3>{{ $feature->title }}</h3>
                 <p>{{ $feature->description }}</p>
             </div>
             @endif
         @endforeach
     </div>
 </section>
