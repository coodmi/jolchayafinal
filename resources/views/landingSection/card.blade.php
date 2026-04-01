<section class="carousel-section">
        <h2 class="section-title" style="text-align: center; margin: 2rem 0; color: #ffffff;">সোশ্যাল মিডিয়া</h2>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <!-- Carousel Indicators -->
            {{-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div> --}}

            <div class="carousel-inner" id="smCarouselInner"></div>

            <!-- Bootstrap Carousel Controls -->
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>

        <!-- Custom Carousel Buttons -->
        <button class="carousel-btn prev-btn" onclick="prevSlide()">❮</button>
        <button class="carousel-btn next-btn" onclick="nextSlide()">❯</button>
    </section>

    <script>
        (function(){
            const inner = document.getElementById('smCarouselInner');
            const carouselEl = document.getElementById('carouselExampleControls');
            let carouselInstance = null;
            const apiUrl = '/api/social-media';

            function chunk(array, size){
                const out=[]; for(let i=0;i<array.length;i+=size){ out.push(array.slice(i,i+size)); } return out;
            }

            function buildCard(item){
                const card = document.createElement('div');
                card.className = 'card';
                card.style.width = '16rem';
                const body = document.createElement('div');
                body.className = 'card-body text-center';
                const title = document.createElement('h5');
                title.className = 'card-title';
                title.textContent = item.title || '';
                const sub = document.createElement('p');
                sub.className = 'card-text';
                sub.textContent = item.content || '';
                const img = document.createElement('img');
                img.className = 'card-img-top';
                if (item.image_url) img.src = item.image_url;
                img.alt = item.title || 'image';

                body.appendChild(title);
                body.appendChild(sub);
                body.appendChild(img);
                card.appendChild(body);

                if (item.link) {
                    const a = document.createElement('a');
                    a.href = item.link; a.target = '_blank'; a.rel = 'noopener';
                    a.style.textDecoration = 'none'; a.style.color = 'inherit';
                    a.appendChild(card);
                    return a;
                }
                return card;
            }

            async function loadItems(){
                try{
                    let resp = await fetch(apiUrl + '?_=' + Date.now(), { headers: { 'Accept': 'application/json' } });
                    if(!resp.ok){
                        const txt = await resp.text();
                        throw new Error('HTTP '+resp.status+': '+txt);
                    }
                    const items = await resp.json();
                    render(items);
                }catch(e){
                    console.error('Social media load error:', e);
                    if(inner){ inner.innerHTML = '<div class="carousel-item active"><div class="d-flex justify-content-center" style="padding:2rem; color:#ef4444;">লোড করতে ব্যর্থ: '+ (e?.message||'') +'</div></div>'; }
                }
            }

            function render(items){
                if(!inner) return;
                inner.innerHTML = '';
                if(!items || !items.length){
                    inner.innerHTML = '<div class="carousel-item active"><div class="d-flex justify-content-center" style="padding:2rem;">কোনো আইটেম নেই</div></div>';
                    return;
                }
                const groups = chunk(items, 3);
                groups.forEach((group, idx)=>{
                    const slide = document.createElement('div');
                    slide.className = 'carousel-item' + (idx===0 ? ' active' : '');
                    const row = document.createElement('div');
                    row.className = 'd-flex justify-content-center flex-wrap gap-3';
                    group.forEach(it=> row.appendChild(buildCard(it)) );
                    slide.appendChild(row);
                    inner.appendChild(slide);
                });

                // (Re)initialize Bootstrap carousel if available
                if(window.bootstrap && bootstrap.Carousel){
                    try{
                        if(carouselInstance){ carouselInstance.dispose(); }
                        carouselInstance = new bootstrap.Carousel(carouselEl, { interval: 3000 });
                    }catch(e){ console.warn('Bootstrap carousel init failed:', e); }
                }
            }

            window.prevSlide = function(){
                if (carouselInstance && carouselInstance.prev) { carouselInstance.prev(); }
            }
            window.nextSlide = function(){
                if (carouselInstance && carouselInstance.next) { carouselInstance.next(); }
            }

            // Initial load and auto-refresh
            loadItems();
            // Automatic reload disabled - items only load on page load or manual refresh
            // setInterval(loadItems, 5000);
            document.addEventListener('visibilitychange', ()=>{ if(!document.hidden) loadItems(); });
            window.addEventListener('focus', loadItems);
            window.addEventListener('storage', function(e){ try{ if(e && e.key==='refreshSocialMedia'){ loadItems(); } }catch(_){} });
        })();
    </script>

