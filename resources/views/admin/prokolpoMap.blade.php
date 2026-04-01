@extends('admin.layouts')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form id="home-roadmap-form"
      action="/admin/project-sections"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <!-- MUST HAVE HIDDEN FIELDS -->
    <input type="hidden" name="plots" id="plots_json">
    <input type="hidden" name="amenities" id="amenities_json">

    <div id="home-roadmap-content" style="margin-top:1rem;">
        <div class="table-card">
            <h2>প্রকল্প রোডম্যাপ (বাম সেকশন)</h2>
            <p style="color:#6b7280; margin-top:-6px;">হোম পেজের "প্রকল্প রোডম্যাপ" সেকশনের বাম দিকের কন্টেন্ট (main-section) এই ফর্ম থেকে ম্যানেজ হবে।</p>

            <style>
                #home-roadmap-content .form-grid { display:grid; grid-template-columns:1fr; gap:16px; align-items:start; }
                #home-roadmap-content .card { border:1px solid #e5e7eb; border-radius:12px; padding:12px; background:#fafafa }
                #home-roadmap-content input[type="text"],
                #home-roadmap-content textarea { width:100%; height:46px; padding:10px 12px; font-size:15px; border-radius:10px; border:1px solid #d1d5db; box-sizing:border-box; }
                #home-roadmap-content textarea { min-height:120px; height:auto; resize:vertical; }
                #home-roadmap-content .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
                #home-roadmap-content .grid-4 { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; }
                #home-roadmap-content .form-group { display:flex; flex-direction:column; gap:6px; }
                #home-roadmap-content .form-group label { font-weight:500; font-size:14px; color:#374151; }
                #home-roadmap-content .form-group input[type="text"] { width:100% !important; box-sizing:border-box; }
                #home-roadmap-content .plot-item { border:1px dashed #cbd5e1; border-radius:10px; padding:10px; background:#fff; }
                #home-roadmap-content .amenity-pill { display:inline-flex; align-items:center; gap:6px; padding:6px 10px; background:#e2fbe8; color:#065f46; border-radius:999px; font-size:13px; margin:6px 6px 0 0; }
                #home-roadmap-content .amenity-pill button { background:transparent; border:none; color:#059669; cursor:pointer; }
                #home-roadmap-content .map-prev { border:1px dashed #cbd5e1; border-radius:10px; overflow:hidden; aspect-ratio:16/9; background:#f8fafc; display:flex; align-items:center; justify-content:center; }
                #home-roadmap-content .map-prev img { max-width:100%; max-height:100%; display:block; }
                @media (max-width: 960px){
                    #home-roadmap-content .grid-2, #home-roadmap-content .grid-4 { grid-template-columns:1fr; }
                }
            </style>

            <input type="hidden" name="section_key" value="{{ $roadmap->section_key ?? 'roadmap' }}">

            <div class="form-grid">
                <div class="card">
                    <div class="form-group">
                        <label>অফার শিরোনাম</label>
                        <input type="text" id="rpOfferTitle" name="offer_title" value="{{ $roadmap->offer_title ?? '' }}" placeholder="বেছে নিন আপনার পছন্দের প্লট">
                    </div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:6px; font-weight:600; color:#0D5534;">প্লট বক্স (৪টি) - প্রতি বক্সে আকার, ক্যাটাগরি এবং CTA বাটন</label>
                    <p style="font-size:12px; color:#6b7280; margin-top:4px; margin-bottom:12px;">প্রতি বক্সে আকার (যেমন: ৮ কাঠা), ক্যাটাগরি (যেমন: প্রিমিয়াম প্লট) এবং CTA বাটন টেক্সট ও লিংক যোগ করুন</p>
                    <div id="rpPlots" class="grid-4"></div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:6px;">সুবিধাসমূহ (amenities)</label>
                    <div id="rpAmenitiesWrap"></div>
                    <div class="grid-2" style="margin-top:10px;">
                        <input type="text" id="rpAmenityInput" placeholder="নতুন সুবিধা (যেমন: ক্লাব হাউজ)">
                        <button id="rpAmenityAdd" class="btn btn-primary" type="button">যোগ করুন</button>
                    </div>
                </div>

                <div class="card">
                    <div class="form-group">
                        <label>ফুটার নোট</label>
                        <textarea id="rpFooterNote" name="footer_note" placeholder="HTML সমর্থিত">{{ $roadmap->footer_note ?? '' }}</textarea>
                    </div>
                </div>

                <div class="card">
                    <label style="display:block; margin-bottom:12px; font-weight:600; color:#0D5534; font-size:15px;">🔘 CTA বাটন কাস্টমাইজ করুন</label>
                    <div class="grid-2" style="gap:16px;">
                        <div class="form-group" style="margin-bottom:0;">
                            <label style="font-weight:600; color:#374151; margin-bottom:8px;">বাটন টেক্সট *</label>
                            <input type="text" id="rpCtaBar" name="cta_bar" value="{{ $roadmap->cta_bar ?? '' }}" placeholder="📞 এখনই যোগাযোগ করুন" style="width:100%; height:46px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label style="font-weight:600; color:#374151; margin-bottom:8px;">বাটন লিংক *</label>
                            <input type="text" id="rpCtaLink" name="cta_link" value="{{ $roadmap->cta_link ?? '#contact' }}" placeholder="#contact বা https://example.com" style="width:100%; height:46px; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                        </div>
                    </div>
                    <div style="margin-top:8px; font-size:12px; color:#6b7280;">
                        💡 টিপস: #contact (অ্যাঙ্কর), /page (পেজ), বা https://example.com (বাহ্যিক লিংক) ব্যবহার করুন
                    </div>
                </div>

                <div class="card grid-2">
                    <div>
                        <div class="form-group">
                            <label style="opacity:0;">প্রকল্প রোডম্যাপ</label>
                        </div>
                    </div>
                    <div>
                        <label style="display:block; margin-bottom:6px;">প্রকল্প রোডম্যাপ</label>
                        <div class="map-prev">
                            <img id="rpMapPrev" alt="Map"
                                 src="{{ isset($roadmap->image) ? asset($roadmap->image) : asset('assets/images/realstate3.PNG') }}">
                        </div>
                        <input type="file" id="rpMapInput" name="image" accept="image/*" style="margin-top:6px;">
                    </div>
                </div>

                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="rpSaveBtn" class="btn btn-primary" type="submit">সেভ</button>
                    <button id="rpResetBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>

            <!-- ORIGINAL JS (unchanged except form submit handler) -->
            <script>
                (function(){
                    const qs = (id)=> document.getElementById(id);
                    const els = {
                        offer: qs('rpOfferTitle'),
                        plotsWrap: qs('rpPlots'),
                        amenWrap: qs('rpAmenitiesWrap'),
                        amenInput: qs('rpAmenityInput'),
                        amenAdd: qs('rpAmenityAdd'),
                        footer: qs('rpFooterNote'),
                        cta: qs('rpCtaBar'),
                        ctaLink: qs('rpCtaLink'),
                        mapPrev: qs('rpMapPrev'),
                        mapInput: qs('rpMapInput')
                    };

                    const defaults = {
                        offerTitle: '{{ $roadmap->offer_title ?? "বেছে নিন আপনার পছন্দের প্লট" }}',
                        plots: @json($roadmap->plots ?? []),
                        amenities: @json($roadmap->amenities ?? []),
                        footerNote: @json($roadmap->footer_note ?? ''),
                        ctaBar: @json($roadmap->cta_bar ?? ''),
                        ctaLink: @json($roadmap->cta_link ?? '#contact'),
                        mapImage: '{{ isset($roadmap->image) ? asset($roadmap->image) : asset("assets/images/realstate3.PNG") }}'
                    };

                    let currentData = {...defaults};

                    function renderPlots(plots){
                        els.plotsWrap.innerHTML = '';
                        // Ensure plots array exists and has 4 items with all required fields
                        if (!plots || !Array.isArray(plots)) plots = [];
                        const ensure = (i)=> {
                            if (!plots[i]) plots[i] = {};
                            // Ensure all required fields exist
                            plots[i].size = plots[i].size || '';
                            plots[i].cat = plots[i].cat || '';
                            plots[i].cta_text = plots[i].cta_text || plots[i].ctaText || '';
                            plots[i].cta_link = plots[i].cta_link || plots[i].ctaLink || '';
                            return plots[i];
                        };
                        for(let i=0;i<4;i++){
                            const p = ensure(i);
                            const html = `<div class="plot-item" style="padding:14px;">
                                <div style="margin-bottom:10px;">
                                    <label style="font-size:12px; font-weight:600; color:#0D5534; margin-bottom:4px; display:block;">প্লট ${i+1}</label>
                                    <div class="grid-2" style="gap:8px;">
                                        <input type="text" data-idx="${i}" data-field="size" placeholder="আকার (যেমন: ৮ কাঠা)" value="${p.size||''}">
                                        <input type="text" data-idx="${i}" data-field="cat" placeholder="ক্যাটাগরি (যেমন: প্রিমিয়াম প্লট)" value="${p.cat||''}">
                                    </div>
                                </div>
                                <div style="padding:10px; background:#0D5534; border-radius:8px; margin-top:8px;">
                                    <label style="color:white; font-size:11px; font-weight:600; margin-bottom:6px; display:block;">🔘 CTA বাটন অপশন</label>
                                    <input type="text" data-idx="${i}" data-field="cta_text" placeholder="CTA বাটন টেক্সট" value="${p.cta_text||''}" style="background:white; margin-bottom:6px; width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; font-size:13px;">
                                    <input type="text" data-idx="${i}" data-field="cta_link" placeholder="CTA বাটন লিংক (#contact বা URL)" value="${p.cta_link||''}" style="background:white; width:100%; padding:8px; border-radius:4px; border:1px solid #ccc; font-size:13px;">
                                </div>
                            </div>`;
                            const wrap = document.createElement('div');
                            wrap.innerHTML = html;
                            els.plotsWrap.appendChild(wrap.firstChild);
                        }
                        els.plotsWrap.querySelectorAll('input[data-field]').forEach(inp=>{
                            ['input','change'].forEach(ev=> inp.addEventListener(ev, ()=>{
                                const idx = parseInt(inp.getAttribute('data-idx'),10) || 0;
                                const field = inp.getAttribute('data-field');
                                if (!currentData.plots[idx]) currentData.plots[idx] = {};
                                currentData.plots[idx][field] = inp.value;
                            }));
                        });
                    }

                    function renderAmenities(list){
                        els.amenWrap.innerHTML = '';
                        (list||[]).forEach((txt, i)=>{
                            const pill = document.createElement('span');
                            pill.className = 'amenity-pill';
                            pill.innerHTML = `<span>${txt}</span><button type="button" data-i="${i}">✕</button>`;
                            pill.querySelector('button').addEventListener('click', ()=>{
                                currentData.amenities.splice(i,1);
                                renderAmenities(currentData.amenities);
                            });
                            els.amenWrap.appendChild(pill);
                        });
                    }

                    function renderAll(){
                        // Ensure plots array is properly initialized with CTA fields
                        if (!currentData.plots || !Array.isArray(currentData.plots)) {
                            currentData.plots = [];
                        }
                        // Ensure all 4 plots exist with all required fields
                        for(let i=0; i<4; i++) {
                            if (!currentData.plots[i]) currentData.plots[i] = {};
                            currentData.plots[i].size = currentData.plots[i].size || '';
                            currentData.plots[i].cat = currentData.plots[i].cat || '';
                            currentData.plots[i].cta_text = currentData.plots[i].cta_text || currentData.plots[i].ctaText || '';
                            currentData.plots[i].cta_link = currentData.plots[i].cta_link || currentData.plots[i].ctaLink || '';
                        }
                        
                        els.offer.value = currentData.offerTitle;
                        renderPlots(currentData.plots);
                        renderAmenities(currentData.amenities);
                        els.footer.value = currentData.footerNote;
                        els.cta.value = currentData.ctaBar;
                        els.ctaLink.value = currentData.ctaLink;
                        els.mapPrev.src = currentData.mapImage;
                    }

                    els.offer.addEventListener('input', ()=> currentData.offerTitle = els.offer.value);
                    els.footer.addEventListener('input', ()=> currentData.footerNote = els.footer.value);
                    els.cta.addEventListener('input', ()=> currentData.ctaBar = els.cta.value);
                    els.ctaLink.addEventListener('input', ()=> currentData.ctaLink = els.ctaLink.value);

                    els.amenAdd.addEventListener('click', ()=>{
                        const val = els.amenInput.value.trim();
                        if(!val) return;
                        currentData.amenities.push(val);
                        els.amenInput.value='';
                        renderAmenities(currentData.amenities);
                    });

                    document.getElementById('rpResetBtn').addEventListener('click', ()=>{
                        currentData = {...defaults};
                        renderAll();
                    });

                    els.mapInput.addEventListener('change', (e)=>{
                        const f = e.target.files && e.target.files[0];
                        if(!f) return;
                        const url = URL.createObjectURL(f);
                        els.mapPrev.src = url;
                        currentData.mapImage = url;
                    });

                    renderAll();

                    // ✔ REQUIRED FORM SUBMIT HANDLER
                    document.getElementById('home-roadmap-form').addEventListener('submit', async function (e) {
                        e.preventDefault();
                        
                        const formData = new FormData();
                        formData.append('section_key', 'roadmap');
                        formData.append('title', currentData.offerTitle);
                        formData.append('extra_data', JSON.stringify({
                            offerTitle: currentData.offerTitle,
                            plots: currentData.plots,
                            amenities: currentData.amenities,
                            footerNote: currentData.footerNote,
                            ctaBar: currentData.ctaBar,
                            ctaLink: currentData.ctaLink
                        }));
                        formData.append('is_active', '1');
                        
                        // Handle map image upload
                        if (els.mapInput.files && els.mapInput.files[0]) {
                            formData.append('image', els.mapInput.files[0]);
                        }
                        
                        try {
                            const response = await fetch('/admin/project-sections', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            });
                            
                            const result = await response.json();
                            if (result.success) {
                                alert('সফলভাবে সংরক্ষিত হয়েছে!');
                                window.location.reload();
                            } else {
                                alert('সংরক্ষণে সমস্যা হয়েছে: ' + (result.message || 'অজানা ত্রুটি'));
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            alert('সংরক্ষণে সমস্যা হয়েছে।');
                        }
                    });
                })();
            </script>

        </div>
    </div>
</form>
@endsection
