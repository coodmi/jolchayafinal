<section id="project-pricing" class="project-pricing">
    <h2 class="section-title" id="projectPricingTitle">প্রকল্পের মূল্য তালিকা</h2>
    <p class="section-subtitle" id="projectPricingSubtitle">আপনার বাজেট অনুযায়ী নির্বাচন করুন</p>
    <style>
        /* Carousel styles scoped to #project-pricing */
        #project-pricing{padding: 6rem 5%; background: #f8fafc;}
        #project-pricing .carousel{position:relative; max-width:1400px; margin:0 auto; overflow:visible}
        #project-pricing .viewport{overflow:hidden}
        #project-pricing .track{display:flex; gap:12px; scroll-behavior:smooth;}
        #project-pricing .viewport{cursor:grab}
        #project-pricing .viewport.dragging{cursor:grabbing}
        /* Show 4 on desktop, 3 on large laptop, 2 on tablet, 1 on mobile */
        #project-pricing .track > .slide{min-width:calc(25% - 9px)}
        @media (max-width: 1280px){ #project-pricing .track > .slide{min-width:calc(33.333% - 8px)} }
        @media (max-width: 1024px){ #project-pricing .track > .slide{min-width:calc(50% - 6px)} }
        @media (max-width: 640px){ #project-pricing .track > .slide{min-width:100%} }

        /* Card refinement */
        #project-pricing .pricing-card{padding:1.25rem; border-radius:14px; box-shadow:0 8px 22px rgba(0,0,0,.08); transition:transform .25s ease, box-shadow .25s ease; text-align:left; display:flex; flex-direction:column; height:100%; min-height:390px; margin:24px 0 6px; padding-top:40px; padding-bottom:40px; background: white;}
        #project-pricing .pricing-card:hover{transform:translateY(-6px); box-shadow:0 14px 34px rgba(0,0,0,.12)}
        #project-pricing .pricing-card h3{font-size:1.1rem; margin-top:6px; margin-bottom:.75rem; color: #0a4d2e; font-weight: 600;}
        #project-pricing .pricing-card .price{font-size:1.6rem; margin-bottom:.5rem; color: #0a4d2e; font-weight: 700;}
        #project-pricing .pricing-card .price-details{font-size:.9rem; margin-bottom:1rem; color: #64748b;}
        /* Slight indent for first three lines */
        #project-pricing .pricing-card h3,
        #project-pricing .pricing-card .price,
        #project-pricing .pricing-card .price-details{ padding-left:30px }
        #project-pricing .pricing-card .price-list{margin-top:6px; margin-bottom:1rem; flex-grow:1; padding-left:30px; list-style: none;}
        #project-pricing .pricing-card .price-list li{font-size:.92rem; padding:.55rem 0; color: #475569; position: relative; padding-left: 24px;}
        #project-pricing .pricing-card .price-list li:before{content: '✓'; position: absolute; left: 0; color: #0a4d2e; font-weight: bold;}
        #project-pricing .pricing-card .btn{padding:.7rem 1.25rem; border-radius:10px; font-size:.95rem; margin-top:auto; align-self:flex-start; margin-bottom:30px; margin-left:30px; background: #0a4d2e; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block;}
        #project-pricing .pricing-card .btn:hover{background: #083d24;}

        /* Featured card */
        #project-pricing .pricing-card.featured{background: linear-gradient(135deg, #0a4d2e 0%, #0d6b3f 100%); color: white; transform: scale(1.05);}
        #project-pricing .pricing-card.featured h3,
        #project-pricing .pricing-card.featured .price,
        #project-pricing .pricing-card.featured .price-details,
        #project-pricing .pricing-card.featured .price-list li{color: white;}
        #project-pricing .pricing-card.featured .price-list li:before{color: #ffd700;}
        #project-pricing .pricing-card.featured .btn{background: #ffd700; color: #0a4d2e;}
        #project-pricing .pricing-card.featured .btn:hover{background: #ffed4e;}

        /* Responsive min-heights */
        @media (max-width: 1024px){ #project-pricing .pricing-card{ min-height:360px } }
        @media (max-width: 768px){ #project-pricing .pricing-card{ min-height:350px; padding:1.5rem 1.25rem } }
        @media (max-width: 640px){ #project-pricing .pricing-card{ min-height:340px; padding:1.25rem 1rem } }
        @media (max-width: 480px){ #project-pricing .pricing-card{ min-height:320px; padding:1.25rem 0.875rem; margin:20px 0 4px } }
        
        /* Enhanced responsive typography */
        @media (max-width: 768px){
            #project-pricing .pricing-card h3{ font-size:1.05rem; margin-top:4px }
            #project-pricing .pricing-card .price{ font-size:1.5rem }
            #project-pricing .pricing-card .price-list li{ font-size:0.88rem; padding:0.5rem 0 }
        }
        @media (max-width: 480px){
            #project-pricing .pricing-card h3{ font-size:1rem; padding-left:20px }
            #project-pricing .pricing-card .price{ font-size:1.4rem; padding-left:20px }
            #project-pricing .pricing-card .price-details{ font-size:0.85rem; padding-left:20px }
            #project-pricing .pricing-card .price-list{ padding-left:20px }
            #project-pricing .pricing-card .price-list li{ font-size:0.85rem }
            #project-pricing .pricing-card .btn{ margin-left:20px; padding:0.65rem 1.1rem; font-size:0.9rem }
        }

        /* Left align price and the text below (including list) */
        #project-pricing .pricing-card .price,
        #project-pricing .pricing-card .price-details,
        #project-pricing .pricing-card .price-list{ text-align:left }

        /* Controls & dots */
        #project-pricing .ctrl{position:absolute; top:50%; transform:translateY(-50%); background:rgba(0,0,0,.45); color:#fff; border:none; width:36px; height:36px; border-radius:999px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:2}
        #project-pricing .ctrl.prev{left:-10px}
        #project-pricing .ctrl.next{right:-10px}
        @media (max-width: 1024px){ #project-pricing .ctrl.prev{left:-8px} #project-pricing .ctrl.next{right:-8px} }
        @media (max-width: 640px){ #project-pricing .ctrl.prev{left:6px} #project-pricing .ctrl.next{right:6px} }
        #project-pricing .dots{display:flex; justify-content:center; gap:6px; margin-top:12px}
        #project-pricing .dot{width:7px; height:7px; border-radius:999px; background:#cbd5e1; cursor:pointer; transition:background-color .2s ease, transform .2s ease}
        #project-pricing .dot.active{background:#0a4d2e; transform:scale(1.1)}
        
        #project-pricing .section-title{font-size: 2.25rem; font-weight: 700; text-align: center; color: #0d3d29; margin-bottom: 0.5rem;}
        #project-pricing .section-subtitle{text-align: center; color: #64748b; max-width: 800px; margin: 0 auto 2rem;}
    </style>
    <div class="carousel" id="projectPricingCarousel">
        <button class="ctrl prev" id="projectPricePrev">‹</button>
        <div class="viewport">
            <div class="track" id="projectPricingTrack">
                <!-- Pricing plans will be loaded dynamically from database -->
            </div>
        </div>
        <button class="ctrl next" id="projectPriceNext">›</button>
        <div class="dots" id="projectPriceDots"></div>
    </div>
    <script>
        (function(){
            const track = document.getElementById('projectPricingTrack');
            const viewport = document.querySelector('#projectPricingCarousel .viewport');
            const prev = document.getElementById('projectPricePrev');
            const next = document.getElementById('projectPriceNext');
            const dotsWrap = document.getElementById('projectPriceDots');
            
            let idx = 0, timer, slides = [];

            async function loadProjectPricingData() {
                try {
                    // Load settings
                    const settingsResponse = await fetch('/api/pricing-settings');
                    if (settingsResponse.ok) {
                        const settings = await settingsResponse.json();
                        if (settings?.section_title) {
                            document.getElementById('projectPricingTitle').textContent = settings.section_title || 'প্রকল্পের মূল্য তালিকা';
                        }
                        if (settings?.section_subtitle) {
                            document.getElementById('projectPricingSubtitle').textContent = settings.section_subtitle || 'আপনার বাজেট অনুযায়ী নির্বাচন করুন';
                        }
                    }

                    // Load pricing plans
                    const plansResponse = await fetch('/api/pricing-plans');
                    const plans = await plansResponse.json();
                    
                    if (!track) return;
                    track.innerHTML = '';
                    
                    if (!plans || plans.length === 0) {
                        track.innerHTML = '<div class="slide"><div class="pricing-card"><p style="text-align:center; padding:2rem;">কোন প্রাইসিং প্ল্যান পাওয়া যায়নি</p></div></div>';
                        return;
                    }

                    plans.forEach((plan, index) => {
                        if (!plan.is_active) return;
                        
                        const slide = document.createElement('div');
                        slide.className = 'slide';
                        slide.dataset.priceIndex = index;
                        
                        const features = Array.isArray(plan.features) ? plan.features : [];
                        const featuresHtml = features.map(f => `<li>${f}</li>`).join('');
                        
                        const priceFormatted = plan.price ? plan.price.toLocaleString('bn-BD') + ' টাকা' : '';
                        const ctaText = plan.cta_text || 'বুকিং করুন';
                        const ctaLink = plan.cta_link || '#contact';
                        const isExternal = ctaLink.startsWith('http://') || ctaLink.startsWith('https://');
                        const ctaTarget = isExternal ? 'target="_blank" rel="noopener noreferrer"' : '';
                        
                        slide.innerHTML = `
                            <div class="pricing-card ${plan.is_popular ? 'featured' : ''}">
                                <h3 class="price-title">${plan.title || ''}</h3>
                                <div class="price">${priceFormatted}</div>
                                <div class="price-details">${plan.plot_size || ''}</div>
                                <ul class="price-list">${featuresHtml}</ul>
                                <a href="${ctaLink}" ${ctaTarget} class="btn">${ctaText}</a>
                            </div>
                        `;
                        
                        track.appendChild(slide);
                    });

                    slides = Array.from(track.querySelectorAll('.slide'));
                    update();
                    restart();
                } catch (error) {
                    console.error('Error loading project pricing data:', error);
                    if (track) {
                        track.innerHTML = '<div class="slide"><div class="pricing-card"><p style="text-align:center; padding:2rem; color: #ef4444;">ডেটা লোড করতে ব্যর্থ হয়েছে</p></div></div>';
                    }
                }
            }

            function update() {
                if (!slides.length) return;
                
                const slideW = slides[0]?.offsetWidth || 0;
                const gap = 12;
                const move = -(idx * (slideW + gap));
                track.style.transform = `translateX(${move}px)`;
                
                dotsWrap.innerHTML = '';
                const perView = getPerView();
                const totalDots = Math.ceil(slides.length / perView);
                
                for (let i = 0; i < totalDots; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'dot';
                    if (i === Math.floor(idx / perView)) dot.classList.add('active');
                    dot.addEventListener('click', () => {
                        idx = i * perView;
                        update();
                        restart();
                    });
                    dotsWrap.appendChild(dot);
                }
            }

            function getPerView() {
                const w = window.innerWidth;
                if (w <= 640) return 1;
                if (w <= 1024) return 2;
                if (w <= 1280) return 3;
                return 4;
            }

            function restart() {
                clearInterval(timer);
                timer = setInterval(() => {
                    const perView = getPerView();
                    idx = (idx + perView) % slides.length;
                    update();
                }, 5000);
            }

            if (prev) {
                prev.addEventListener('click', () => {
                    const perView = getPerView();
                    idx = Math.max(0, idx - perView);
                    update();
                    restart();
                });
            }

            if (next) {
                next.addEventListener('click', () => {
                    const perView = getPerView();
                    idx = Math.min(slides.length - perView, idx + perView);
                    update();
                    restart();
                });
            }

            window.addEventListener('resize', () => update());
            
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

            // Initial load
            loadProjectPricingData();
        })();
    </script>
</section>
