<div id="visit-bookings" class="tab-content">

<style>
.vb-header { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px; }
.vb-title h3 { margin:0; font-size:1.4rem; font-weight:700; color:#111827; }
.vb-title p  { margin:4px 0 0; font-size:0.85rem; color:#6b7280; }
.vb-actions  { display:flex; gap:10px; flex-wrap:wrap; }
.vb-btn { display:inline-flex; align-items:center; gap:7px; padding:9px 18px; border:none; border-radius:8px; font-size:0.85rem; font-weight:600; cursor:pointer; transition:opacity .2s; }
.vb-btn:hover { opacity:.85; }
.vb-btn-green { background:#0d3d29; color:#fff; }
.vb-btn-gray  { background:#e5e7eb; color:#374151; }

.vb-stats { display:grid; grid-template-columns:repeat(auto-fit,minmax(130px,1fr)); gap:12px; margin-bottom:24px; }
.vb-stat  { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:16px; text-align:center; }
.vb-stat .val { font-size:1.6rem; font-weight:800; color:#111827; }
.vb-stat .lbl { font-size:0.75rem; color:#6b7280; margin-top:2px; }

.vb-search-bar { display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap; }
.vb-search-bar input { flex:1; min-width:200px; padding:9px 14px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.875rem; outline:none; }
.vb-search-bar input:focus { border-color:#0d3d29; }
.vb-filter-btns { display:flex; gap:6px; flex-wrap:wrap; }
.vb-filter { padding:8px 14px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.8rem; cursor:pointer; background:#fff; color:#374151; font-weight:500; transition:all .2s; }
.vb-filter.active, .vb-filter:hover { background:#0d3d29; color:#fff; border-color:#0d3d29; }

.vb-cards { display:flex; flex-direction:column; gap:12px; }
.vb-card  { background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:18px 20px; transition:box-shadow .2s; }
.vb-card:hover { box-shadow:0 4px 20px rgba(0,0,0,.08); }
.vb-card-top { display:flex; justify-content:space-between; align-items:flex-start; gap:12px; flex-wrap:wrap; }
.vb-card-left { display:flex; align-items:center; gap:14px; }
.vb-avatar { width:44px; height:44px; border-radius:50%; background:linear-gradient(135deg,#1e40af,#3b82f6); display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.1rem; font-weight:700; flex-shrink:0; }
.vb-name  { font-size:1rem; font-weight:700; color:#111827; margin:0 0 3px; }
.vb-meta  { font-size:0.8rem; color:#6b7280; display:flex; gap:12px; flex-wrap:wrap; }
.vb-meta a { color:#3b82f6; text-decoration:none; }
.vb-meta a:hover { text-decoration:underline; }

.vb-badge { display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; font-size:0.75rem; font-weight:600; white-space:nowrap; }
.vb-badge-pending   { background:#fef3c7; color:#92400e; }
.vb-badge-contacted { background:#dbeafe; color:#1e40af; }
.vb-badge-completed { background:#d1fae5; color:#065f46; }

.vb-card-body { margin-top:14px; display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr)); gap:10px; }
.vb-field { background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:10px 12px; }
.vb-field-label { font-size:0.7rem; font-weight:600; color:#166534; text-transform:uppercase; letter-spacing:.5px; margin-bottom:4px; }
.vb-field-value { font-size:0.875rem; color:#374151; font-weight:500; word-break:break-word; }

.vb-card-footer { margin-top:14px; display:flex; gap:10px; align-items:flex-start; flex-wrap:wrap; border-top:1px solid #f3f4f6; padding-top:14px; }
.vb-note-wrap { flex:1; min-width:200px; display:flex; gap:8px; align-items:flex-start; }
.vb-note-wrap textarea { flex:1; padding:8px 10px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.82rem; resize:vertical; min-height:56px; font-family:inherit; color:#374151; outline:none; transition:border-color .2s; }
.vb-note-wrap textarea:focus { border-color:#0d3d29; }
.vb-save-btn { padding:8px 14px; background:#0d3d29; color:#fff; border:none; border-radius:8px; cursor:pointer; font-size:0.8rem; font-weight:600; white-space:nowrap; flex-shrink:0; transition:opacity .2s; }
.vb-save-btn:hover { opacity:.85; }
.vb-status-select { padding:8px 12px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.82rem; cursor:pointer; background:#fff; color:#374151; outline:none; min-width:160px; }
.vb-status-select:focus { border-color:#0d3d29; }

.vb-empty { text-align:center; padding:4rem 2rem; color:#9ca3af; }
.vb-empty i { font-size:3rem; margin-bottom:12px; display:block; }

@media(max-width:640px){
    .vb-header { flex-direction:column; align-items:flex-start; }
    .vb-card-top { flex-direction:column; }
    .vb-card-footer { flex-direction:column; }
    .vb-status-select { width:100%; }
}
</style>

<!-- Header -->
<div class="vb-header">
    <div class="vb-title">
        <h3><i class="fas fa-calendar-check" style="color:#0d3d29;margin-right:8px;"></i>ভিজিট বুকিং</h3>
        <p>সাইট ভিজিটের জন্য জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</p>
    </div>
    <div class="vb-actions">
        <button class="vb-btn vb-btn-green" onclick="exportVisitCSV()">
            <i class="fas fa-download"></i> CSV এক্সপোর্ট
        </button>
    </div>
</div>

<!-- Stats -->
<div class="vb-stats">
    <div class="vb-stat"><div class="val" id="vbTotal">-</div><div class="lbl">মোট ভিজিট</div></div>
    <div class="vb-stat"><div class="val" style="color:#92400e;" id="vbPending">-</div><div class="lbl">পেন্ডিং</div></div>
    <div class="vb-stat"><div class="val" style="color:#1e40af;" id="vbContacted">-</div><div class="lbl">যোগাযোগ হয়েছে</div></div>
    <div class="vb-stat"><div class="val" style="color:#065f46;" id="vbCompleted">-</div><div class="lbl">সম্পন্ন</div></div>
    <div class="vb-stat"><div class="val" style="color:#7c3aed;" id="vbToday">-</div><div class="lbl">আজকের ভিজিট</div></div>
</div>

<!-- Search & Filter -->
<div class="vb-search-bar">
    <input type="text" id="vbSearch" placeholder="নাম, ফোন বা লোকেশন দিয়ে খুঁজুন..." oninput="renderVisitBookings()">
    <div class="vb-filter-btns">
        <button class="vb-filter active" onclick="setVbFilter('all',this)">সব</button>
        <button class="vb-filter" onclick="setVbFilter('pending',this)">পেন্ডিং</button>
        <button class="vb-filter" onclick="setVbFilter('contacted',this)">যোগাযোগ</button>
        <button class="vb-filter" onclick="setVbFilter('completed',this)">সম্পন্ন</button>
    </div>
</div>

<!-- Cards -->
<div class="vb-cards" id="vbCardList">
    <div class="vb-empty"><i class="fas fa-spinner fa-spin"></i>ডেটা লোড হচ্ছে...</div>
</div>

<script>
window.visitBookingsCache = [];
window.vbFilter = 'all';

function setVbFilter(f, el) {
    window.vbFilter = f;
    document.querySelectorAll('.vb-filter').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    renderVisitBookings();
}

function renderVisitBookings() {
    const q = (document.getElementById('vbSearch')?.value || '').toLowerCase();
    const f = window.vbFilter;
    const list = document.getElementById('vbCardList');
    const sm = {
        pending:   { cls:'vb-badge-pending',   text:'পেন্ডিং' },
        contacted: { cls:'vb-badge-contacted', text:'যোগাযোগ করা হয়েছে' },
        completed: { cls:'vb-badge-completed', text:'সম্পন্ন' }
    };

    let data = window.visitBookingsCache;
    if (f !== 'all') data = data.filter(b => b.status === f);
    if (q) data = data.filter(b =>
        (b.name||'').toLowerCase().includes(q) ||
        (b.phone||'').toLowerCase().includes(q) ||
        (b.location||'').toLowerCase().includes(q)
    );

    if (data.length === 0) {
        list.innerHTML = '<div class="vb-empty"><i class="fas fa-inbox"></i>কোন ভিজিট বুকিং পাওয়া যায়নি</div>';
        return;
    }

    list.innerHTML = data.map(b => {
        const s = sm[b.status] || sm.pending;
        const submittedDate = new Date(b.created_at).toLocaleDateString('bn-BD', { year:'numeric', month:'short', day:'numeric' });
        const visitDate = b.visit_date ? new Date(b.visit_date).toLocaleDateString('bn-BD', { year:'numeric', month:'long', day:'numeric' }) : null;
        const initials = (b.name||'?').charAt(0).toUpperCase();
        const note = (b.admin_note||'').replace(/</g,'&lt;').replace(/>/g,'&gt;');

        // Highlight upcoming visits
        const isUpcoming = b.visit_date && new Date(b.visit_date) >= new Date(new Date().toDateString());
        const visitDateStyle = isUpcoming ? 'color:#065f46;font-weight:700;' : 'color:#374151;';

        return `
        <div class="vb-card" style="${isUpcoming ? 'border-left:4px solid #0d3d29;' : ''}">
            <div class="vb-card-top">
                <div class="vb-card-left">
                    <div class="vb-avatar">${initials}</div>
                    <div>
                        <p class="vb-name">${b.name}</p>
                        <div class="vb-meta">
                            <a href="tel:${b.phone}"><i class="fas fa-phone" style="font-size:.7rem;"></i> ${b.phone}</a>
                            <span><i class="fas fa-clock" style="font-size:.7rem;"></i> জমা: ${submittedDate}</span>
                        </div>
                    </div>
                </div>
                <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                    ${isUpcoming ? '<span style="background:#dcfce7;color:#166534;padding:4px 10px;border-radius:999px;font-size:0.72rem;font-weight:700;"><i class="fas fa-calendar-check"></i> আসন্ন ভিজিট</span>' : ''}
                    <span class="vb-badge ${s.cls}">${s.text}</span>
                </div>
            </div>

            <div class="vb-card-body">
                ${b.location ? `<div class="vb-field"><div class="vb-field-label"><i class="fas fa-map-marker-alt"></i> লোকেশন</div><div class="vb-field-value">${b.location}</div></div>` : ''}
                ${visitDate  ? `<div class="vb-field"><div class="vb-field-label"><i class="fas fa-calendar-alt"></i> ভিজিট তারিখ</div><div class="vb-field-value" style="${visitDateStyle}">${visitDate}</div></div>` : ''}
                ${b.guests   ? `<div class="vb-field"><div class="vb-field-label"><i class="fas fa-users"></i> গেস্ট সংখ্যা</div><div class="vb-field-value">${b.guests} জন</div></div>` : ''}
                ${b.message  ? `<div class="vb-field" style="grid-column:1/-1;"><div class="vb-field-label"><i class="fas fa-comment"></i> বার্তা</div><div class="vb-field-value">${(b.message||'').replace(/</g,'&lt;').replace(/>/g,'&gt;')}</div></div>` : ''}
            </div>

            <div class="vb-card-footer">
                <div class="vb-note-wrap">
                    <textarea id="vbnote_${b.id}" placeholder="ক্লায়েন্টের সাথে কথা বলার পরে নোট লিখুন...">${note}</textarea>
                    <button class="vb-save-btn" onclick="saveVbNote(${b.id})"><i class="fas fa-save"></i> সংরক্ষণ</button>
                </div>
                <select class="vb-status-select" onchange="changeVbStatus(${b.id}, this.value)">
                    <option value="">স্ট্যাটাস পরিবর্তন করুন</option>
                    <option value="pending"   ${b.status==='pending'   ?'disabled':''}>পেন্ডিং</option>
                    <option value="contacted" ${b.status==='contacted' ?'disabled':''}>যোগাযোগ করা হয়েছে</option>
                    <option value="completed" ${b.status==='completed' ?'disabled':''}>সম্পন্ন</option>
                </select>
            </div>
        </div>`;
    }).join('');
}

function updateVbStats(data) {
    const today = new Date().toDateString();
    document.getElementById('vbTotal').textContent     = data.length;
    document.getElementById('vbPending').textContent   = data.filter(b=>b.status==='pending').length;
    document.getElementById('vbContacted').textContent = data.filter(b=>b.status==='contacted').length;
    document.getElementById('vbCompleted').textContent = data.filter(b=>b.status==='completed').length;
    document.getElementById('vbToday').textContent     = data.filter(b=>b.visit_date && new Date(b.visit_date).toDateString()===today).length;
}

(function(){
    async function loadVisitBookings() {
        try {
            const res = await fetch('/api/visit-bookings');
            if (!res.ok) throw new Error();
            const data = await res.json();
            window.visitBookingsCache = data;
            updateVbStats(data);
            renderVisitBookings();
        } catch(e) {
            document.getElementById('vbCardList').innerHTML =
                '<div class="vb-empty"><i class="fas fa-exclamation-circle" style="color:#ef4444;"></i>ডেটা লোড করতে ব্যর্থ হয়েছে</div>';
        }
    }

    const obs = new MutationObserver(function() {
        const tab = document.getElementById('visit-bookings');
        if (tab && tab.classList.contains('active')) { loadVisitBookings(); obs.disconnect(); }
    });
    obs.observe(document.body, { attributes:true, subtree:true, attributeFilter:['class'] });
    if (document.getElementById('visit-bookings')?.classList.contains('active')) loadVisitBookings();
    window.reloadVisitBookings = loadVisitBookings;
})();

async function saveVbNote(id) {
    const ta = document.getElementById('vbnote_' + id);
    if (!ta) return;
    try {
        const res = await fetch('/admin/bookings/' + id + '/note', {
            method:'PUT',
            headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')||'' },
            body: JSON.stringify({ admin_note: ta.value })
        });
        const r = await res.json();
        if (r.success) {
            if (window.showSuccess) window.showSuccess('নোট সংরক্ষিত হয়েছে');
            const item = window.visitBookingsCache.find(b => b.id === id);
            if (item) item.admin_note = ta.value;
        }
    } catch(e) { if (window.showError) window.showError('নোট সংরক্ষণ ব্যর্থ হয়েছে'); }
}

async function changeVbStatus(id, status) {
    if (!status) return;
    try {
        await fetch('/admin/bookings/' + id + '/status', {
            method:'PUT',
            headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')||'' },
            body: JSON.stringify({ status })
        });
        if (window.reloadVisitBookings) window.reloadVisitBookings();
    } catch(e) { if (window.reloadVisitBookings) window.reloadVisitBookings(); }
}

function exportVisitCSV() {
    if (!window.visitBookingsCache?.length) { if(window.showError) window.showError('কোন ডেটা নেই'); return; }
    const sm = { pending:'পেন্ডিং', contacted:'যোগাযোগ করা হয়েছে', completed:'সম্পন্ন' };
    const h = ['#','নাম','ফোন','লোকেশন','ভিজিট তারিখ','গেস্ট','স্ট্যাটাস','অ্যাডমিন নোট','জমার তারিখ'];
    const rows = window.visitBookingsCache.map((b,i) => [
        i+1, b.name, b.phone, b.location||'-', b.visit_date||'-', b.guests||'-',
        sm[b.status]||b.status,
        (b.admin_note||'-').replace(/"/g,'""'),
        new Date(b.created_at).toLocaleDateString('bn-BD',{year:'numeric',month:'short',day:'numeric'})
    ]);
    const csv = [h,...rows].map(r=>r.map(c=>'"'+c+'"').join(',')).join('\n');
    const a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob(['\uFEFF'+csv],{type:'text/csv;charset=utf-8;'}));
    a.download = 'visit_bookings_'+new Date().toISOString().split('T')[0]+'.csv';
    document.body.appendChild(a); a.click(); document.body.removeChild(a);
}
</script>
</div>
