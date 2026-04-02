@php
    $popup = \App\Models\SiteSetting::first();
    $popupEnabled = $popup?->popup_enabled ?? false;
    $popupTitle = $popup?->popup_title ?? '';
    $popupSubtitle = $popup?->popup_subtitle ?? '';
    $popupBtnText = $popup?->popup_btn_text ?? '';
    $popupBtnLink = $popup?->popup_btn_link ?? '#contact';
    $popupNote = $popup?->popup_note ?? '';
    $popupImage = $popup?->popup_image ?? '';
    $popupBgColor = $popup?->popup_bg_color ?? '#0d3d29';
@endphp

@if($popupEnabled && ($popupTitle || $popupImage))
<div id="welcomePopupOverlay" style="position:fixed;inset:0;background:rgba(0,0,0,0.65);z-index:99999;display:flex;align-items:center;justify-content:center;padding:16px;">

    <div id="welcomePopup" style="background:#fff;border-radius:20px;max-width:780px;width:100%;display:flex;overflow:visible;box-shadow:0 32px 80px rgba(0,0,0,0.3);position:relative;max-height:90vh;">

        <!-- Close Button — inside popup, top-right corner -->
        <button onclick="closeWelcomePopup()" style="position:absolute;top:-14px;right:-14px;background:#fff;border:2px solid #e5e7eb;border-radius:50%;width:36px;height:36px;cursor:pointer;font-size:20px;color:#374151;z-index:100001;display:flex;align-items:center;justify-content:center;line-height:1;box-shadow:0 2px 8px rgba(0,0,0,0.15);">×</button>

        <!-- Left: Image -->
        @if($popupImage)
        <div style="flex:0 0 45%;background:{{ $popupBgColor }};display:flex;align-items:center;justify-content:center;padding:30px;min-height:380px;">
            <img src="{{ $popupImage }}" alt="{{ $popupTitle }}" style="width:100%;max-height:340px;object-fit:cover;border-radius:14px;box-shadow:0 8px 24px rgba(0,0,0,0.3);" />
        </div>
        @endif

        <!-- Right: Content -->
        <div style="flex:1;padding:40px 36px;display:flex;flex-direction:column;justify-content:center;min-height:380px;">
            @if($popupTitle)
            <h2 style="font-size:1.9rem;font-weight:800;color:#0f172a;margin:0 0 12px;line-height:1.2;">{{ $popupTitle }}</h2>
            @endif
            @if($popupSubtitle)
            <p style="font-size:1rem;color:#64748b;margin:0 0 28px;line-height:1.6;">{{ $popupSubtitle }}</p>
            @endif
            @if($popupBtnText)
            <a href="{{ $popupBtnLink }}" onclick="closeWelcomePopup()" style="display:inline-block;background:{{ $popupBgColor }};color:#fff;padding:14px 32px;border-radius:10px;font-weight:700;font-size:1rem;text-decoration:none;text-align:center;margin-bottom:14px;" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">{{ $popupBtnText }}</a>
            @endif
            @if($popupNote)
            <p style="font-size:0.85rem;color:#94a3b8;margin:0;">{{ $popupNote }}</p>
            @endif
        </div>
    </div>
</div>

<style>
@media (max-width: 600px) {
    #welcomePopup { flex-direction: column !important; }
    #welcomePopup > div:first-child { min-height: 200px !important; flex: none !important; }
    #welcomePopup > div:last-child { padding: 24px 20px !important; }
}
</style>

<script>
function closeWelcomePopup() {
    var overlay = document.getElementById('welcomePopupOverlay');
    if (overlay) {
        overlay.style.opacity = '0';
        overlay.style.transition = 'opacity 0.3s ease';
        setTimeout(function(){ overlay.remove(); }, 300);
    }
}
document.getElementById('welcomePopupOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeWelcomePopup();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeWelcomePopup();
});
</script>
@endif
