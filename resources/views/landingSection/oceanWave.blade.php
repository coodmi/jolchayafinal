<div class="ocean-wave-section">
    <div class="ocean-body">
        <svg class="wave wave1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path d="M0,40 C180,80 360,0 540,40 C720,80 900,0 1080,40 C1260,80 1380,20 1440,40 L1440,80 L0,80 Z"/>
        </svg>
        <svg class="wave wave2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path d="M0,40 C180,80 360,0 540,40 C720,80 900,0 1080,40 C1260,80 1380,20 1440,40 L1440,80 L0,80 Z"/>
        </svg>
        <svg class="wave wave3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path d="M0,40 C180,80 360,0 540,40 C720,80 900,0 1080,40 C1260,80 1380,20 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>
</div>

<style>
.ocean-wave-section {
    position: relative;
    width: 100%;
    height: 120px;
    background: #ffffff;
    overflow: hidden;
    margin-top: -2px;
}

.ocean-body {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, #0077b6 0%, #0096c7 40%, #48cae4 100%);
}

.wave {
    position: absolute;
    width: 200%;
    height: 100%;
    top: 0;
    left: 0;
}

.wave path {
    fill: #ffffff;
}

.wave1 {
    animation: waveMove 6s linear infinite;
    opacity: 1;
}

.wave2 {
    animation: waveMove 9s linear infinite reverse;
    opacity: 0.5;
    top: 10px;
}

.wave3 {
    animation: waveMove 12s linear infinite;
    opacity: 0.3;
    top: 20px;
}

@keyframes waveMove {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@media (max-width: 768px) {
    .ocean-wave-section { height: 80px; }
}
</style>
