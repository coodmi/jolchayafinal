@php
    $faqSection = $projectSections['faq'] ?? null;
    $title = $faqSection->title ?? '';
    $subtitle = $faqSection->subtitle ?? '';
    $is_active = $faqSection->is_active ?? true;

    if ($is_active) {
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get();
    }
@endphp

@if($is_active && count($faqs) > 0)
<section id="faq-section" style="padding: 100px 0; background: #f1f5f9;">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">

        <div class="section-header" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); font-weight: 800; color: #0a3622; margin-bottom: 20px;">
                {{ $title }}
            </h2>
            @if($subtitle)
                <p style="font-size: 17px; color: #64748b; max-width: 600px; margin: 0 auto;">{{ $subtitle }}</p>
            @endif
            <div style="width: 60px; height: 4px; background: #198754; margin: 24px auto 0; border-radius: 2px;"></div>
        </div>

        {{-- First 4 always visible --}}
        <div class="faq-accordion">
            @foreach($faqs->take(4) as $index => $faq)
                <div class="faq-item {{ $index === 0 ? 'active' : '' }}"
                    style="margin-bottom: 16px; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                    <div class="faq-question"
                        style="padding: 20px 24px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; transition: all 0.3s ease;">
                        <span style="font-size: 18px; font-weight: 600; color: #1e293b; padding-right: 20px;">{{ $faq->question }}</span>
                        <i class="fas fa-plus" style="font-size: 14px; color: #64748b; transition: transform 0.3s ease;"></i>
                    </div>
                    <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease;">
                        <div style="padding: 0 24px 24px; font-size: 16px; color: #475569; line-height: 1.7; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($faqs) > 4)
        {{-- Extra FAQs in animated wrapper --}}
        <div id="faqExtra" style="overflow: hidden; max-height: 0; transition: max-height 0.7s cubic-bezier(0.4, 0, 0.2, 1); opacity: 0; transition: max-height 0.7s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.5s ease;">
            <div class="faq-accordion" style="padding-top: 0;">
                @foreach($faqs->skip(4) as $index => $faq)
                    <div class="faq-item"
                        style="margin-bottom: 16px; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
                        <div class="faq-question"
                            style="padding: 20px 24px; cursor: pointer; display: flex; align-items: center; justify-content: space-between; transition: all 0.3s ease;">
                            <span style="font-size: 18px; font-weight: 600; color: #1e293b; padding-right: 20px;">{{ $faq->question }}</span>
                            <i class="fas fa-plus" style="font-size: 14px; color: #64748b; transition: transform 0.3s ease;"></i>
                        </div>
                        <div class="faq-answer" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease;">
                            <div style="padding: 0 24px 24px; font-size: 16px; color: #475569; line-height: 1.7; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div style="text-align: center; margin-top: 32px;">
            <button id="faqToggleBtn" onclick="toggleFaqExtra()"
                style="padding: 12px 36px; background: #198754; color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s, transform 0.2s;">
                আরও দেখুন ↓
            </button>
        </div>
        @endif

    </div>

    <style>
        .faq-item.active {
            box-shadow: 0 10px 15px -3px rgba(10, 54, 34, 0.1) !important;
            border: 1px solid rgba(25, 135, 84, 0.2);
        }
        .faq-item.active .faq-question { background: #f8fafc; }
        .faq-item.active .faq-question span { color: #198754 !important; }
        #faqToggleBtn:hover { background: #146c43 !important; transform: translateY(-1px); }
    </style>

    <script>
        // Accordion toggle
        document.querySelectorAll('#faq-section .faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const isActive = item.classList.contains('active');

                document.querySelectorAll('#faq-section .faq-item').forEach(i => {
                    i.classList.remove('active');
                    i.querySelector('.faq-answer').style.maxHeight = '0';
                    i.querySelector('i').className = 'fas fa-plus';
                });

                if (!isActive) {
                    item.classList.add('active');
                    item.querySelector('.faq-answer').style.maxHeight = '1000px';
                    item.querySelector('i').className = 'fas fa-minus';
                }
            });
        });

        // Open first item
        document.addEventListener('DOMContentLoaded', () => {
            const first = document.querySelector('#faq-section .faq-item.active');
            if (first) {
                first.querySelector('.faq-answer').style.maxHeight = '1000px';
                first.querySelector('i').className = 'fas fa-minus';
            }
        });

        // See more / see less
        function toggleFaqExtra() {
            const extra = document.getElementById('faqExtra');
            const btn = document.getElementById('faqToggleBtn');
            const isOpen = extra.style.maxHeight !== '0px' && extra.style.maxHeight !== '';

            if (isOpen) {
                // Fade out + collapse
                extra.style.opacity = '0';
                extra.style.maxHeight = extra.scrollHeight + 'px';
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        extra.style.maxHeight = '0px';
                    });
                });

                btn.textContent = 'আরও দেখুন ↓';

                // After collapse, scroll smoothly back to the FAQ section top
                extra.addEventListener('transitionend', function onEnd(e) {
                    if (e.propertyName !== 'max-height') return;
                    extra.removeEventListener('transitionend', onEnd);
                    document.getElementById('faq-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            } else {
                // Expand + fade in
                extra.style.maxHeight = extra.scrollHeight + 'px';
                extra.style.opacity = '1';
                btn.textContent = 'কম দেখুন ↑';
            }
        }
    </script>
</section>
@endif
