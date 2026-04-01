<div id="test" class="tab-content">
    <div id="home-features" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের সুবিধা সমূহ</h2>
            <style>
                #home-features .features-form input[type="text"],
                #home-features .features-form textarea { height: 46px; padding:10px 12px; font-size:15px; border-radius:10px; }
                #home-features .features-grid-editor { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
                #home-features .card-editor { border:1px solid #e5e7eb; border-radius:12px; padding:12px; background:#fafafa }
                #home-features .card-editor h4 { margin:0 0 8px; font-size:14px }
                @media (max-width: 960px){ #home-features .features-grid-editor{ grid-template-columns:1fr } }
            </style>
            <div class="features-form">
                <div class="features-grid-editor">
                    <div class="card-editor">
                        <h4>কার্ড ১</h4>
                        <input type="text" id="featIcon1" placeholder="আইকন (যেমন: 🏘️)" />
                        <input type="text" id="featTitle1" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc1" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                    <div class="card-editor">
                        <h4>কার্ড ২</h4>
                        <input type="text" id="featIcon2" placeholder="আইকন (যেমন: 📋)" />
                        <input type="text" id="featTitle2" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc2" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                    <div class="card-editor">
                        <h4>কার্ড ৩</h4>
                        <input type="text" id="featIcon3" placeholder="আইকন (যেমন: 🎯)" />
                        <input type="text" id="featTitle3" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc3" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                    <div class="card-editor">
                        <h4>কার্ড ৪</h4>
                        <input type="text" id="featIcon4" placeholder="আইকন (যেমন: ✅)" />
                        <input type="text" id="featTitle4" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc4" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                    <div class="card-editor">
                        <h4>কার্ড ৫</h4>
                        <input type="text" id="featIcon5" placeholder="আইকন (যেমন: 🚗)" />
                        <input type="text" id="featTitle5" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc5" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                    <div class="card-editor">
                        <h4>কার্ড ৬</h4>
                        <input type="text" id="featIcon6" placeholder="আইকন (যেমন: 🌳)" />
                        <input type="text" id="featTitle6" placeholder="শিরোনাম" style="margin-top:8px;" />
                        <input type="text" id="featDesc6" placeholder="বিবরণ" style="margin-top:8px;" />
                    </div>
                </div>
                <div style="margin-top:14px; display:flex; gap:10px;">
                    <button id="saveFeaturesBtn" class="btn btn-primary" type="button">সেভ</button>
                    <button id="resetFeaturesBtn" class="btn btn-secondary" type="button">রিসেট</button>
                </div>
            </div>
            <script>
                (function(){
                    const ids = ['1','2','3','4','5','6'];
                    const getInputs = () => ids.map(i=>({
                        icon: document.getElementById('featIcon'+i),
                        title: document.getElementById('featTitle'+i),
                        desc: document.getElementById('featDesc'+i)
                    }));
                    function load(){
                        try{
                            const saved = JSON.parse(localStorage.getItem('featuresSettings')||'{}');
                            const items = Array.isArray(saved.items)? saved.items: [];
                            const inputs = getInputs();
                            inputs.forEach((g, idx)=>{
                                const it = items[idx] || {};
                                g.icon.value = it.icon || '';
                                g.title.value = it.title || '';
                                g.desc.value  = it.desc  || '';
                            });
                        }catch(e){}
                    }
                    function save(){
                        const inputs = getInputs();
                        const items = inputs.map(g=>({icon:g.icon.value, title:g.title.value, desc:g.desc.value}));
                        const payload = { items };
                        localStorage.setItem('featuresSettings', JSON.stringify(payload));
                        window.dispatchEvent(new StorageEvent('storage', {key:'featuresSettings', newValue: JSON.stringify(payload)}));
                    }
                    document.getElementById('saveFeaturesBtn').addEventListener('click', save);
                    document.getElementById('resetFeaturesBtn').addEventListener('click', ()=>{
                        localStorage.removeItem('featuresSettings');
                        getInputs().forEach(g=>{ g.icon.value=''; g.title.value=''; g.desc.value=''; });
                        window.dispatchEvent(new StorageEvent('storage', {key:'featuresSettings', newValue: null}));
                    });
                    getInputs().forEach(g=>{ ['input','change'].forEach(evt=>{
                        g.icon.addEventListener(evt, save); g.title.addEventListener(evt, save); g.desc.addEventListener(evt, save);
                    }); });
                    load();
                })();
            </script>
        </div>
    </div>
</div>
