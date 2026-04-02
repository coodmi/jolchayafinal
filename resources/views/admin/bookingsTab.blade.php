<div id="bookings" class="tab-content">

<style>
.bk-header { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px; }
.bk-title h3 { margin:0; font-size:1.4rem; font-weight:700; color:#111827; }
.bk-title p  { margin:4px 0 0; font-size:0.85rem; color:#6b7280; }
.bk-actions  { display:flex; gap:10px; flex-wrap:wrap; }
.bk-btn { display:inline-flex; align-items:center; gap:7px; padding:9px 18px; border:none; border-radius:8px; font-size:0.85rem; font-weight:600; cursor:pointer; transition:opacity .2s; }
.bk-btn:hover { opacity:.85; }
.bk-btn-green { background:#0d3d29; color:#fff; }
.bk-btn-gray  { background:#e5e7eb; color:#374151; }

/* Stats row */
.bk-stats { display:grid; grid-template-columns:repeat(auto-fit,minmax(130px,1fr)); gap:12px; margin-bottom:24px; }
.bk-stat  { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:16px; text-align:center; }
.bk-stat .val { font-size:1.6rem; font-weight:800; color:#111827; }
.bk-stat .lbl { font-size:0.75rem; color:#6b7280; margin-top:2px; }

/* Search bar */
.bk-search-bar { display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap; }
.bk-search-bar input { flex:1; min-width:200px; padding:9px 14px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.875rem; outline:none; }
.bk-search-bar input:focus { border-color:#0d3d29; }
.bk-filter-btns { display:flex; gap:6px; flex-wrap:wrap; }
.bk-filter { padding:8px 14px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.8rem; cursor:pointer; background:#fff; color:#374151; font-weight:500; transition:all .2s; }
.bk-filter.active, .bk-filter:hover { background:#0d3d29; color:#fff; border-color:#0d3d29; }

/* Cards grid */
.bk-cards { display:flex; flex-direction:column; gap:12px; }
.bk-card  { background:#fff; border:1px solid #e5e7eb; border-radius:14px; padding:18px 20px; transition:box-shadow .2s; }
.bk-card:hover { box-shadow:0 4px 20px rgba(0,0,0,.08); }

.bk-card-top { display:flex; justify-content:space-between; align-items:flex-start; gap:12px; flex-wrap:wrap; }
.bk-card-left { display:flex; align-items:center; gap:14px; }
.bk-avatar { width:44px; height:44px; border-radius:50%; background:linear-gradient(135deg,#0d3d29,#1a7a4a); display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.1rem; font-weight:700; flex-shrink:0; }
.bk-name  { font-size:1rem; font-weight:700; color:#111827; margin:0 0 3px; }
.bk-meta  { font-size:0.8rem; color:#6b7280; display:flex; gap:12px; flex-wrap:wrap; }
.bk-meta a { color:#3b82f6; text-decoration:none; }
.bk-meta a:hover { text-decoration:underline; }

.bk-badge { display:inline-flex; align-items:center; padding:4px 12px; border-radius:999px; font-size:0.75rem; font-weight:600; white-space:nowrap; }
.bk-badge-pending   { background:#fef3c7; color:#92400e; }
.bk-badge-contacted { background:#dbeafe; color:#1e40af; }
.bk-badge-completed { background:#d1fae5; color:#065f46; }

.bk-card-body { margin-top:14px; display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:10px; }
.bk-field { background:#f9fafb; border-radius:8px; padding:10px 12px; }
.bk-field-label { font-size:0.7rem; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.5px; margin-bottom:4px; }
.bk-field-value { font-size:0.85rem; color:#374151; word-break:break-word; }

.bk-card-footer { margin-top:14px; display:flex; gap:10px; align-items:flex-start; flex-wrap:wrap; border-top:1px solid #f3f4f6; padding-top:14px; }
.bk-note-wrap { flex:1; min-width:200px; display:flex; gap:8px; align-items:flex-start; }
.bk-note-wrap textarea { flex:1; padding:8px 10px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.82rem; resize:vertical; min-height:56px; font-family:inherit; color:#374151; outline:none; transition:border-color .2s; }
.bk-note-wrap textarea:focus { border-color:#0d3d29; }
.bk-save-btn { padding:8px 14px; background:#0d3d29; color:#fff; border:none; border-radius:8px; cursor:pointer; font-size:0.8rem; font-weight:600; white-space:nowrap; flex-shrink:0; transition:opacity .2s; }
.bk-save-btn:hover { opacity:.85; }
.bk-status-select { padding:8px 12px; border:1px solid #e5e7eb; border-radius:8px; font-size:0.82rem; cursor:pointer; background:#fff; color:#374151; outline:none; min-width:160px; }
.bk-status-select:focus { border-color:#0d3d29; }

.bk-empty { text-align:center; padding:4rem 2rem; color:#9ca3af; }
.bk-empty i { font-size:3rem; margin-bottom:12px; display:block; }

@media(max-width:640px){
    .bk-header { flex-direction:column; align-items:flex-start; }
    .bk-card-top { flex-direction:column; }
    .bk-card-footer { flex-direction:column; }
    .bk-status-select { width:100%; }
}
</style>

<!-- Header -->
<div class="bk-header">
    <div class="bk-title">
        <h3><i class="fas fa-clipboard-list" style="color:#0d3d29;margin-right:8px;"></i>বুকিং তথ্য</h3>
        <p>ওয়েবসাইট থেকে জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</p>
    </div>
    <div class="bk-actions">
        <button class="bk-btn bk-btn-green" onclick="exportBookingsCSV()">
            <i class="fas fa-download"></i> CSV এক্সপোর্ট
        </button>
        <button class="bk-btn bk-btn-gray" onclick="exportBookingsJSON()">
            <i class="fas fa-code"></i> JSON এক্সপোর্ট
        </button>
    </div>
</div>

<!-- Stats -->
<div class="bk-stats" id="bkStats">
    <div class="bk-stat"><div class="val" id="bkTotal">-</div><div class="lbl">মোট বুকিং</div></div>
    <div class="bk-stat"><div class="val" style="color:#92400e;" id="bkPending">-</div><div class="lbl">পেন্ডিং</div></div>
    <div class="bk-stat"><div class="val" style="color:#1e40af;" id="bkContacted">-</div><div class="lbl">যোগাযোগ হয়েছে</div></div>
    <div class="bk-stat"><div class="val" style="color:#065f46;" id="bkCompleted">-</div><div class="lbl">সম্পন্ন</div></div>
</div>

<!-- Search & Filter -->
<div class="bk-search-bar">
    <input type="text" id="bkSearch" placeholder="নাম, ফোন বা ইমেইল দিয়ে খুঁজুন..." oninput="renderBookings()">
    <div class="bk-filter-btns">
        <button class="bk-filter active" data-filter="all"    onclick="setBkFilter('all',this)">সব</button>
        <button class="bk-filter"        data-filter="pending"   onclick="setBkFilter('pending',this)">পেন্ডিং</button>
        <button class="bk-filter"        data-filter="contacted" onclick="setBkFilter('contacted',this)">যোগাযোগ</button>
        <button class="bk-filter"        data-filter="completed" onclick="setBkFilter('completed',this)">সম্পন্ন</button>
    </div>
</div>

<!-- Cards -->
<div class="bk-cards" id="bkCardList">
    <div class="bk-empty"><i class="fas fa-spinner fa-spin"></i>ডেটা লোড হচ্ছে...</div>
</div>

<script>
window.bookingsDataCache = [];
window.bkActiveFilter = 'all';

function setBkFilter(f, el) {
    window.bkActiveFilter = f;
    document.querySelectorAll('.bk-filter').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    renderBookings();
}

function renderBookings() {
    const q = (document.getElementById('bkSearch')?.value || '').toLowerCase();
    const f = window.bkActiveFilter;
    const list = document.getElementById('bkCardList');
    const statusMap = {
        pending:   { cls:'bk-badge-pending',   text:'পেন্ডিং' },
        contacted: { cls:'bk-badge-contacted', text:'যোগাযোগ করা হয়েছে' },
        completed: { cls:'bk-badge-completed', text:'সম্পন্ন' }
    };

    let data = window.bookingsDataCache;
    if (f !== 'all') data = data.filter(b => b.status === f);
    if (q) data = data.filter(b =>
        (b.name||'').toLowerCase().includes(q) ||
        (b.phone||'').toLowerCase().includes(q) ||
        (b.email||'').toLowerCase().includes(q)
    );

    if (data.length === 0) {
        list.innerHTML = '<div class="bk-empty"><i class="fas fa-inbox"></i>কোন বুকিং পাওয়া যায়নি</div>';
        return;
    }

    list.innerHTML = data.map((b, i) => {
        const s = statusMap[b.status] || statusMap.pending;
        const date = new Date(b.created_at).toLocaleDateString('bn-BD', { year:'numeric', month:'short', day:'numeric' });
        const initials = (b.name||'?').charAt(0).toUpperCase();
        const note = (b.admin_note||'').replace(/</g,'&lt;').replace(/>/g,'&gt;');
        const msg  = (b.message||'-').replace(/</g,'&lt;').replace(/>/g,'&gt;');

        return `
        <div class="bk-card">
            <div class="bk-card-top">
                <div class="bk-card-left">
                    <div class="bk-avatar">${initials}</div>
                    <div>
                        <p class="bk-name">${b.name}</p>
                        <div class="bk-meta">
                            <a href="tel:${b.phone}"><i class="fas fa-phone" style="font-size:.7rem;"></i> ${b.phone}</a>
                            ${b.email ? '<a href="mailto:'+b.email+'"><i class="fas fa-envelope" style="font-size:.7rem;"></i> '+b.email+'</a>' : ''}
                            <span><i class="fas fa-calendar-alt" style="font-size:.7rem;"></i> ${date}</span>
                        </div>
                    </div>
                </div>
                <span class="bk-badge ${s.cls}">${s.text}</span>
            </div>

            <div class="bk-card-body">
                ${b.plot_size ? '<div class="bk-field"><div class="bk-field-label">প্লট সাইজ</div><div class="bk-field-value">'+b.plot_size+'</div></div>' : ''}
                ${b.location  ? '<div class="bk-field"><div class="bk-field-label">লোকেশন</div><div class="bk-field-value">'+b.location+'</div></div>' : ''}
                ${b.visit_date? '<div class="bk-field"><div class="bk-field-label">ভিজিট তারিখ</div><div class="bk-field-value">'+b.visit_date+'</div></div>' : ''}
                ${b.guests    ? '<div class="bk-field"><div class="bk-field-label">গেস্ট</div><div class="bk-field-value">'+b.guests+'</div></div>' : ''}
                <div class="bk-field" style="grid-column:1/-1;"><div class="bk-field-label">বার্তা</div><div class="bk-field-value">${msg}</div></div>
            </div>

            <div class="bk-card-footer">
                <div class="bk-note-wrap">
                    <textarea id="note_${b.id}" placeholder="ক্লায়েন্টের সাথে কথা বলার পরে নোট লিখুন...">${note}</textarea>
                    <button class="bk-save-btn" onclick="saveBookingNote(${b.id})"><i class="fas fa-save"></i> সংরক্ষণ</button>
                </div>
                <select class="bk-status-select" onchange="changeBookingStatus(${b.id}, this.value)">
                    <option value="">স্ট্যাটাস পরিবর্তন করুন</option>
                    <option value="pending"   ${b.status==='pending'   ?'disabled':''}>পেন্ডিং</option>
                    <option value="contacted" ${b.status==='contacted' ?'disabled':''}>যোগাযোগ করা হয়েছে</option>
                    <option value="completed" ${b.status==='completed' ?'disabled':''}>সম্পন্ন</option>
                </select>
            </div>
        </div>`;
    }).join('');
}

function updateBkStats(bookings) {
    document.getElementById('bkTotal').textContent     = bookings.length;
    document.getElementById('bkPending').textContent   = bookings.filter(b=>b.status==='pending').length;
    document.getElementById('bkContacted').textContent = bookings.filter(b=>b.status==='contacted').length;
    document.getElementById('bkCompleted').textContent = bookings.filter(b=>b.status==='completed').length;
}

(function(){
    async function loadBookings() {
        try {
            const res = await fetch('/api/bookings');
            if (!res.ok) throw new Error();
            const bookings = await res.json();
            window.bookingsDataCache = bookings;
            updateBkStats(bookings);
            renderBookings();
        } catch(e) {
            document.getElementById('bkCardList').innerHTML =
                '<div class="bk-empty"><i class="fas fa-exclamation-circle" style="color:#ef4444;"></i>ডেটা লোড করতে ব্যর্থ হয়েছে</div>';
        }
    }

    const obs = new MutationObserver(function() {
        const tab = document.getElementById('bookings');
        if (tab && tab.classList.contains('active')) { loadBookings(); obs.disconnect(); }
    });
    obs.observe(document.body, { attributes:true, subtree:true, attributeFilter:['class'] });
    if (document.getElementById('bookings')?.classList.contains('active')) loadBookings();
    window.reloadBookings = loadBookings;
})();

async function saveBookingNote(id) {
    const ta = document.getElementById('note_' + id);
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
            const item = window.bookingsDataCache.find(b => b.id === id);
            if (item) item.admin_note = ta.value;
        }
    } catch(e) { if (window.showError) window.showError('নোট সংরক্ষণ ব্যর্থ হয়েছে'); }
}

async function changeBookingStatus(id, status) {
    if (!status) return;
    try {
        await fetch('/admin/bookings/' + id + '/status', {
            method:'PUT',
            headers:{ 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')||'' },
            body: JSON.stringify({ status })
        });
        if (window.reloadBookings) window.reloadBookings();
    } catch(e) { if (window.reloadBookings) window.reloadBookings(); }
}

function exportBookingsCSV() {
    if (!window.bookingsDataCache?.length) { if(window.showError) window.showError('কোন ডেটা নেই'); return; }
    const sm = { pending:'পেন্ডিং', contacted:'যোগাযোগ করা হয়েছে', completed:'সম্পন্ন' };
    const h = ['#','নাম','ফোন','ইমেইল','প্লট সাইজ','বার্তা','স্ট্যাটাস','অ্যাডমিন নোট','তারিখ'];
    const rows = window.bookingsDataCache.map((b,i) => [
        i+1, b.name, b.phone, b.email||'-', b.plot_size||'-',
        (b.message||'-').replace(/"/g,'""'), sm[b.status]||b.status,
        (b.admin_note||'-').replace(/"/g,'""'),
        new Date(b.created_at).toLocaleDateString('bn-BD',{year:'numeric',month:'short',day:'numeric'})
    ]);
    const csv = [h,...rows].map(r=>r.map(c=>'"'+c+'"').join(',')).join('\n');
    const a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob(['\uFEFF'+csv],{type:'text/csv;charset=utf-8;'}));
    a.download = 'bookings_'+new Date().toISOString().split('T')[0]+'.csv';
    document.body.appendChild(a); a.click(); document.body.removeChild(a);
}

function exportBookingsJSON() {
    if (!window.bookingsDataCache?.length) { if(window.showError) window.showError('কোন ডেটা নেই'); return; }
    const a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob([JSON.stringify(window.bookingsDataCache,null,2)],{type:'application/json'}));
    a.download = 'bookings_'+new Date().toISOString().split('T')[0]+'.json';
    document.body.appendChild(a); a.click(); document.body.removeChild(a);
}
</script>
</div>
