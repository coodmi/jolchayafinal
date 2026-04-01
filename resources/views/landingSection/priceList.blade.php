<section id="pricing" class="pricing">
    <h2 class="section-title" id="pricingTitle">{{ $pricingSettings->section_title ?? '' }}</h2>
    <p class="section-subtitle" id="pricingSubtitle" style="text-align:center;">{{ $pricingSettings->section_subtitle ?? '' }}</p>
    <style>
        /* Carousel styles scoped to #pricing */
        #pricing{padding: 6rem 5%}
            #pricing .carousel{position:relative; max-width:1400px; margin:0 auto; overflow:visible}
            #pricing .viewport{overflow:hidden}
            #pricing .track{display:flex; gap:12px; scroll-behavior:smooth;}
            #pricing .viewport{cursor:grab}
            #pricing .viewport.dragging{cursor:grabbing}
            /* Show 4 on desktop, 3 on large laptop, 2 on tablet, 1 on mobile */
            #pricing .track > .slide{min-width:calc(25% - 9px)}
            @media (max-width: 1280px){ #pricing .track > .slide{min-width:calc(33.333% - 8px)} }
            @media (max-width: 1024px){ #pricing .track > .slide{min-width:calc(50% - 6px)} }
            @media (max-width: 640px){ #pricing .track > .slide{min-width:100%} }

            /* Card refinement */
            #pricing .pricing-card{padding:1.25rem; border-radius:14px; background: linear-gradient(135deg, #0d3d29 0%, #1a7a4a 100%); color: white; border: 2px solid rgba(255,255,255,0.08); box-shadow:0 8px 22px rgba(0,0,0,.2); transition:transform .25s ease, box-shadow .25s ease; text-align:left; display:flex; flex-direction:column; height:100%; min-height:390px; margin:24px 0 6px; padding-top:40px; padding-bottom:40px}
            #pricing .pricing-card:hover{transform:translateY(-6px); box-shadow:0 14px 34px rgba(0,0,0,.12)}
            #pricing .pricing-card h3{font-size:1.1rem; margin-top:6px; margin-bottom:.75rem; color:#ffd700}
            #pricing .pricing-card .price{font-size:1.6rem; margin-bottom:.5rem; color:#ffd700}
            #pricing .pricing-card .price-details{font-size:.9rem; margin-bottom:1rem; color:rgba(255,255,255,0.8)}
            /* Slight indent for first three lines */
            #pricing .pricing-card h3,
            #pricing .pricing-card .price,
            #pricing .pricing-card .price-details{ padding-left:30px }
            #pricing .pricing-card .price-list{margin-top:6px; margin-bottom:1rem; flex-grow:1; padding-left:30px}
            #pricing .pricing-card .price-list li{font-size:.92rem; padding:.55rem 0}
            #pricing .pricing-card .btn{padding:.7rem 1.25rem; border-radius:10px; font-size:.95rem; margin-top:auto; align-self:flex-start; margin-bottom:30px; margin-left:30px}

            /* Responsive min-heights */
            @media (max-width: 1024px){ #pricing .pricing-card{ min-height:360px } }
            @media (max-width: 768px){ #pricing .pricing-card{ min-height:350px; padding:1.5rem 1.25rem } }
            @media (max-width: 640px){ #pricing .pricing-card{ min-height:340px; padding:1.25rem 1rem } }
            @media (max-width: 480px){ #pricing .pricing-card{ min-height:320px; padding:1.25rem 0.875rem; margin:20px 0 4px } }
            
            /* Enhanced responsive typography */
            @media (max-width: 768px){
                #pricing .pricing-card h3{ font-size:1.05rem; margin-top:4px }
                #pricing .pricing-card .price{ font-size:1.5rem }
                #pricing .pricing-card .price-list li{ font-size:0.88rem; padding:0.5rem 0 }
            }
            @media (max-width: 480px){
                #pricing .pricing-card h3{ font-size:1rem; padding-left:20px }
                #pricing .pricing-card .price{ font-size:1.4rem; padding-left:20px }
                #pricing .pricing-card .price-details{ font-size:0.85rem; padding-left:20px }
                #pricing .pricing-card .price-list{ padding-left:20px }
                #pricing .pricing-card .price-list li{ font-size:0.85rem }
                #pricing .pricing-card .btn{ margin-left:20px; padding:0.65rem 1.1rem; font-size:0.9rem }
            }

            /* Left align price and the text below (including list) */
            #pricing .pricing-card .price,
            #pricing .pricing-card .price-details,
            #pricing .pricing-card .price-list{ text-align:left }


            /* Featured adjustments remain, but compact */
            #pricing .pricing-card.featured{transform:scale(1.0)}

            /* Controls & dots */
            #pricing .ctrl{position:absolute; top:50%; transform:translateY(-50%); background:rgba(0,0,0,.45); color:#fff; border:none; width:36px; height:36px; border-radius:999px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:2}
            #pricing .ctrl.prev{left:-10px}
            #pricing .ctrl.next{right:-10px}
            @media (max-width: 1024px){ #pricing .ctrl.prev{left:-8px} #pricing .ctrl.next{right:-8px} }
            @media (max-width: 640px){ #pricing .ctrl.prev{left:6px} #pricing .ctrl.next{right:6px} }
            #pricing .dots{display:flex; justify-content:center; gap:6px; margin-top:12px}
            #pricing .dot{width:7px; height:7px; border-radius:999px; background:#cbd5e1; cursor:pointer; transition:background-color .2s ease, transform .2s ease}
            #pricing .dot.active{background:#ffd700; transform:scale(1.1)}
        </style>
        <div class="carousel" id="pricingCarousel">
            <div class="viewport">
                <div class="track" id="pricingTrack">
                    @forelse($pricingPlans ?? [] as $plan)
                    @php
                        $features = is_array($plan->features) ? $plan->features : (is_string($plan->features) ? json_decode($plan->features, true) : []);
                        $features = $features ?? [];
                        $ctaLink = $plan->cta_link ?: '#contact';
                        $isExternal = str_starts_with($ctaLink, 'http://') || str_starts_with($ctaLink, 'https://');
                    @endphp
                    <div class="slide">
                        <div class="pricing-card {{ $plan->is_popular ? 'featured' : '' }}">
                            <h3 class="price-title">{{ $plan->title }}</h3>
                            <div class="price price-amount">{{ $plan->price ? number_format($plan->price, 2) . ' টাকা' : '' }}</div>
                            <p class="price-details price-down">{{ $plan->plot_size }}</p>
                            @if(count($features) > 0)
                            <div class="suvidha-section" style="margin-top:1rem;margin-bottom:1rem;padding-left:30px;">
                                <h4 style="font-size:0.95rem;font-weight:600;color:{{ $plan->is_popular ? '#ffffff' : '#166534' }};margin-bottom:0.5rem;">📋 সুবিধা সমূহ:</h4>
                                <ul class="suvidha-list" style="list-style:none;padding:0;margin:0;">
                                    @foreach($features as $f)
                                    <li style="padding:0.4rem 0;font-size:0.9rem;color:#ffffff;display:flex;align-items:center;gap:8px;"><span style="color:#ffffff;">✓</span> {{ $f }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <a href="{{ $ctaLink }}" {{ $isExternal ? 'target="_blank" rel="noopener noreferrer"' : '' }} class="btn btn-primary price-btn">
                                {{ $plan->cta_text ?: 'বুকিং করুন' }}
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="slide"><div class="pricing-card"><p style="text-align:center;padding:2rem;">কোন প্রাইসিং প্ল্যান পাওয়া যায়নি</p></div></div>
                    @endforelse
                </div>
            </div>
            <div class="dots" id="priceDots"></div>
        </div>
        <script>
            (function(){
                const track = document.getElementById('pricingTrack');
                const viewport = document.querySelector('#pricingCarousel .viewport');
                const prev = document.getElementById('pricePrev');
                const next = document.getElementById('priceNext');
                const dotsWrap = document.getElementById('priceDots');
                
                let idx = 0, timer, slides = [];
                function initCarousel() {
                    if (!track || !viewport) return;
                    slides = Array.from(track.querySelectorAll('.slide'));
                    if (!slides.length) return;

                    idx = 0;
                    
                    function setActive(i){ 
                        idx = (i + slides.length) % slides.length; 
                        update(); 
                        activateDot(); 
                    }
                    
                    function update(){
                        const target = slides[idx];
                        if (!target) return;
                        const left = target.offsetLeft;
                        viewport.scrollTo({ left, behavior:'smooth' });
                    }
                    
                    function activateDot(){ 
                        Array.from(dotsWrap.children).forEach((d,k)=> d.classList.toggle('active', k===idx)); 
                    }
                    
                    // Create dots
                    dotsWrap.innerHTML = '';
                    slides.forEach((_, i)=>{ 
                        const d=document.createElement('div'); 
                        d.className='dot'+(i===0?' active':''); 
                        d.addEventListener('click', ()=>{ setActive(i); restart(); }); 
                        dotsWrap.appendChild(d); 
                    });
                    
                    function go(n){ setActive(idx+n); }
                    function restart(){ 
                        clearInterval(timer); 
                        timer = setInterval(()=> go(1), 4000); 
                    }
                    
                    if (prev) {
                        prev.replaceWith(prev.cloneNode(true));
                        const newPrev = document.getElementById('pricePrev');
                        newPrev.addEventListener('click', ()=>{ go(-1); restart(); });
                    }
                    if (next) {
                        next.replaceWith(next.cloneNode(true));
                        const newNext = document.getElementById('priceNext');
                        newNext.addEventListener('click', ()=>{ go(1); restart(); });
                    }
                    
                    window.addEventListener('resize', ()=> update());
                    
                    // Drag to scroll
                    let isDown = false, startX = 0, startScroll = 0;
                    function onDown(clientX){ 
                        isDown = true; 
                        viewport.classList.add('dragging'); 
                        startX = clientX; 
                        startScroll = viewport.scrollLeft; 
                        clearInterval(timer); 
                    }
                    function onMove(clientX){ 
                        if(!isDown) return; 
                        const dx = clientX - startX; 
                        viewport.scrollLeft = startScroll - dx; 
                    }
                    function onUp(){ 
                        if(!isDown) return; 
                        isDown = false; 
                        viewport.classList.remove('dragging'); 
                        restart(); 
                    }
                    
                    viewport.addEventListener('mousedown', (e)=> onDown(e.clientX));
                    window.addEventListener('mousemove', (e)=> onMove(e.clientX));
                    window.addEventListener('mouseup', onUp);
                    viewport.addEventListener('mouseleave', onUp);
                    viewport.addEventListener('touchstart', (e)=>{ const t=e.touches[0]; if(t) onDown(t.clientX); }, {passive:true});
                    viewport.addEventListener('touchmove', (e)=>{ const t=e.touches[0]; if(t) onMove(t.clientX); }, {passive:true});
                    viewport.addEventListener('touchend', onUp);
                    
                    setActive(0);
                    restart();
                }

                // Initialize carousel on DOM-rendered cards
                initCarousel();
            })();
        </script>
    </section>