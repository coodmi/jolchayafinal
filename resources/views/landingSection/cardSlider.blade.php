<section id="card-slider" class="card-slider">
    <style>
        #card-slider { padding: 40px 0; background: #050816; }
        #card-slider .slider-wrapper { position: relative; max-width: 1200px; margin: 0 auto; padding: 0 16px; }
        #card-slider .slider-container { overflow: hidden; }
        #card-slider .slider-track { display:flex; gap:16px; transition: transform 300ms ease; will-change: transform; }
        #card-slider .cs-card { flex: 0 0 calc(25% - 12px); background:#0b1021; border-radius:16px; border:2px solid rgba(56,189,248,0.35); height: 240px; display:flex; align-items:center; justify-content:center; color:#e2e8f0; text-align:center; padding:20px; box-shadow:0 10px 30px rgba(0,0,0,0.35); transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease; }
        #card-slider .cs-card:nth-child(odd){ transform: rotate(-6deg);} 
        #card-slider .cs-card:nth-child(even){ transform: rotate(6deg);} 
        #card-slider .cs-card:hover{ transform: rotate(0deg) translateY(-4px); box-shadow:0 16px 40px rgba(0,0,0,0.45); border-color: rgba(56,189,248,0.8);} 
        #card-slider .cs-title{ font-size:18px; line-height:1.4; font-weight:700; letter-spacing:.2px; }
        #card-slider .cs-sub{ margin-top:8px; color:#93c5fd; font-size:14px; }
        #card-slider .slider-btn.next { position:absolute; right:8px; top:50%; transform: translateY(-50%); background: linear-gradient(135deg,#8b5cf6,#6366f1); color:#fff; border:none; border-radius:9999px; padding:10px 14px; cursor:pointer; box-shadow:0 10px 25px rgba(99,102,241,.35);} 
        #card-slider .slider-btn.next:hover{ filter: brightness(1.05);} 
        @media (max-width:1024px){ #card-slider .cs-card{ flex-basis: calc(33.333% - 11px); height:220px; } }
        @media (max-width:768px){ #card-slider .cs-card{ flex-basis: calc(50% - 8px); height:200px; } }
        @media (max-width:480px){ #card-slider .cs-card{ flex-basis: 100%; height:190px; } #card-slider .slider-btn.next{ top:auto; bottom:-10px; right:50%; transform: translate(50%,0);} }
    </style>

    <div class="slider-wrapper">
        <div class="slider-container">
            <div id="cardSliderTrack" class="slider-track" aria-live="polite"></div>
        </div>
        <button id="cardSliderNext" class="slider-btn next" aria-label="Next">❯</button>
    </div>

    <script>
        (function(){
            const track = document.getElementById('cardSliderTrack');
            const nextBtn = document.getElementById('cardSliderNext');
            let currentIndex = 0;
            let items = [];

            function defaults(){
                return {
                    items: [
                        { title: 'Prime Location', sub: '' },
                        { title: 'Strong ROI Potential', sub: '' },
                        { title: 'Asset-Backed Security', sub: '' },
                        { title: 'Ethical Halal Guarantee', sub: '' },
                        { title: 'Exclusive Investor Perks', sub: '' }
                    ]
                };
            }

            async function loadFromAPI(){
                try {
                    const response = await fetch('/api/features');
                    if (!response.ok) throw new Error('Failed to load features');
                    const features = await response.json();
                    
                    if (features && features.length > 0) {
                        items = features.map(f => ({
                            title: f.title || '',
                            sub: f.subtitle || ''
                        }));
                    } else {
                        items = defaults().items;
                    }
                } catch (error) {
                    console.error('Error loading features:', error);
                    items = defaults().items;
                }
                render();
                init();
            }

            function render(){
                if(!track) return;
                track.innerHTML = '';
                items.forEach((it)=>{
                    const card = document.createElement('div');
                    card.className = 'cs-card';
                    card.innerHTML = `<div><div class="cs-title">${(it.title||'').toString().trim()}</div>${it.sub?`<div class="cs-sub">${it.sub}</div>`:''}</div>`;
                    track.appendChild(card);
                });
            }

            function init(){
                if (!track) return;
                if (items.length <= 4) { if (nextBtn) nextBtn.style.display = 'none'; } else { if (nextBtn) nextBtn.style.display = 'inline-flex'; }
                function update(){
                    const card = track.querySelector('.cs-card');
                    const cardWidth = card ? card.offsetWidth : 0;
                    const gap = 16;
                    track.style.transform = `translateX(${-currentIndex * (cardWidth + gap)}px)`;
                }
                nextBtn && (nextBtn.onclick = ()=>{
                    const visible = getVisibleCount();
                    const maxIndex = Math.max(0, items.length - visible);
                    currentIndex = Math.min(currentIndex + 1, maxIndex);
                    update();
                });
                function getVisibleCount(){
                    const w = window.innerWidth;
                    if (w <= 480) return 1;
                    if (w <= 768) return 2;
                    if (w <= 1024) return 3;
                    return 4;
                }
                window.addEventListener('resize', update);
                update();
            }

            // Load from API on page load
            loadFromAPI();
            
            // Automatic reload disabled - slider data only loads on page load or manual refresh
            // setInterval(loadFromAPI, 5000);
        })();
    </script>
</section>
