<header class="header">
    <style>
        /* ==================== MODERN HEADER STYLES ==================== */
        .header {
            background: var(--white, #ffffff);
            padding: 1.5rem 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1020;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(13, 61, 41, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            flex-wrap: wrap;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #0d3d29 0%, #fbbf24 50%, #0d3d29 100%);
            background-size: 200% 100%;
            animation: headerShimmer 3s linear infinite;
        }

        @keyframes headerShimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .header-left {
            flex: 0 1 auto;
            min-width: 200px;
            max-width: 100%;
        }

        .header-center {
            flex: 1 1 auto;
            max-width: 600px;
            display: flex;
            justify-content: center;
        }

        .header-right {
            flex: 0 1 auto;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 0;
            justify-content: flex-end;
        }

        .header-left h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 0.25rem 0;
            background: linear-gradient(135deg, #0d3d29 0%, #0d6639 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .header-left p {
            color: #6b7280;
            font-size: 0.9375rem;
            margin: 0;
            font-weight: 500;
        }

        .user-name {
            white-space: nowrap;
            color: #374151;
            font-weight: 600;
            font-size: 0.9375rem;
        }

        .user-menu {
            position: relative;
        }

        /* ==================== SEARCH BAR STYLES ==================== */
        .header-search-wrapper {
            position: relative;
            width: 100%;
            max-width: 650px;
            display: flex;
            align-items: center;
        }

        .header-search-bar {
            width: 100%;
            padding: 1rem 5rem 1rem 4rem;
            border: 2px solid rgba(13, 61, 41, 0.15);
            border-radius: 50px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
                0 4px 12px rgba(13, 61, 41, 0.08),
                0 8px 24px rgba(14, 165, 233, 0.04),
                inset 0 1px 3px rgba(255, 255, 255, 1);
            color: #1f2937;
            font-weight: 500;
            letter-spacing: -0.01em;
            position: relative;
            text-indent: 8rem;
        }

        .header-search-bar::placeholder {
            color: #6b7280;
            font-weight: 400;
        }

        .header-search-bar:hover {
            border-color: rgba(13, 61, 41, 0.25);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
                0 6px 16px rgba(13, 61, 41, 0.1),
                0 10px 30px rgba(14, 165, 233, 0.06);
        }

        .header-search-bar:focus {
            background: #ffffff;
            border-color: #0d3d29;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1),
                0 8px 24px rgba(13, 61, 41, 0.15),
                0 12px 40px rgba(14, 165, 233, 0.08),
                0 0 0 4px rgba(13, 61, 41, 0.08);
            transform: translateY(-2px);
        }

        .header-search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            pointer-events: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            filter: drop-shadow(0 2px 4px rgba(13, 61, 41, 0.2));
        }

        .header-search-icon svg {
            width: 100%;
            height: 100%;
        }

        .header-search-icon .liquid-fill {
            fill: url(#liquidGradient);
            animation: liquidWave 3s ease-in-out infinite;
        }

        .header-search-bar:focus~.header-search-icon {
            transform: translateY(-50%) scale(1.15);
            filter: drop-shadow(0 3px 8px rgba(13, 61, 41, 0.3));
        }

        @keyframes liquidWave {

            0%,
            100% {
                d: path("M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z");
            }

            50% {
                d: path("M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z");
            }
        }

        /* Voice Button (Left Side) - Enhanced */
        .voice-btn {
            position: absolute;
            left: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            width: auto;
            height: auto;
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0;
            z-index: 10;
        }

        .voice-btn::before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 100%);
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: -1;
        }

        .voice-btn:hover::before {
            opacity: 0.15;
            transform: scale(1);
        }

        .voice-btn svg {
            width: 32px;
            height: 32px;
            position: relative;
            filter: drop-shadow(0 2px 8px rgba(14, 165, 233, 0.4));
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .voice-btn:hover svg {
            transform: scale(1.2);
            filter: drop-shadow(0 6px 16px rgba(14, 165, 233, 0.6));
        }

        .voice-btn:active svg {
            transform: scale(1.05);
        }

        .voice-btn.listening svg {
            animation: voicePulse 1.5s ease-in-out infinite;
        }

        @keyframes voicePulse {

            0%,
            100% {
                transform: scale(1);
                filter: drop-shadow(0 2px 8px rgba(14, 165, 233, 0.4));
            }

            50% {
                transform: scale(1.15);
                filter: drop-shadow(0 6px 20px rgba(139, 92, 246, 0.8));
            }
        }


        /* Send Button - Right Side */
        .send-btn {
            position: absolute;
            right: 0.8rem;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            min-width: 44px;
            min-height: 44px;
            border: none;
            background: linear-gradient(135deg, #0ea5e9 0%, #8b5cf6 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 8px rgba(14, 165, 233, 0.3);
            z-index: 10;
        }

        .send-btn:hover {
            background: linear-gradient(135deg, #3b9ce9 0%, #9d6cfa 100%);
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.4);
        }

        .send-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        .send-btn svg {
            width: 20px;
            height: 20px;
        }

        .send-btn svg path {
            stroke: white;
            fill: none;
            stroke-width: 2.5;
        }


        /* ==================== RESPONSIVE BREAKPOINTS ==================== */

        /* Large Tablets and Below */
        @media (max-width: 1200px) {
            .header {
                padding: 1.25rem 1.75rem;
                gap: 1.25rem;
            }

            .header-center {
                max-width: 500px;
            }
        }

        /* Tablets (Portrait) */
        @media (max-width: 1024px) {
            .header {
                padding: 1.25rem 1.5rem;
                gap: 1rem;
            }

            .header-left h2 {
                font-size: 1.5rem;
            }

            .header-left p {
                font-size: 0.875rem;
            }

            .header-center {
                order: 3;
                flex: 1 1 100%;
                max-width: 100%;
                margin-top: 0.75rem;
            }

            .header-search-bar {
                padding: 0.8rem 5rem 0.8rem 3rem;
                font-size: 0.875rem;
            }

            .voice-btn svg {
                width: 30px;
                height: 30px;
            }

            .send-btn svg {
                width: 22px;
                height: 22px;
            }
        }

        /* Mobile Devices (Landscape) */
        @media (max-width: 768px) {
            .header {
                padding: 1rem 1.25rem;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
                gap: 0.875rem;
            }

            .header-left {
                flex: 1 1 auto;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
                min-width: 0;
            }

            .header-left h2 {
                font-size: 1.375rem;
                margin: 0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 100%;
            }

            .header-left p {
                font-size: 0.8125rem;
                white-space: nowrap;
            }

            .header-right {
                order: 1;
                flex: 0 0 auto;
                justify-content: flex-end;
            }

            .user-name {
                font-size: 0.875rem;
            }

            .header-center {
                order: 2;
                flex: 1 1 100%;
                width: 100%;
                margin-top: 0;
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .header-search-wrapper {
                max-width: 100%;
                display: flex !important;
                visibility: visible !important;
            }

            .header-search-bar {
                padding: 0.875rem 4rem 0.875rem 3.5rem;
                font-size: 0.9375rem;
                min-height: 50px;
                text-indent: 5.5rem;
            }

            .voice-btn {
                left: 0.75rem;
            }

            .voice-btn svg {
                width: 28px;
                height: 28px;
            }

            .send-btn {
                right: 0.75rem;
                width: 40px;
                height: 40px;
            }

            .send-btn svg {
                width: 18px;
                height: 18px;
            }
        }

        /* Mobile Devices (Portrait) */
        @media (max-width: 640px) {
            .header {
                padding: 0.875rem 1rem;
                gap: 0.75rem;
            }

            .header-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }

            .header-left h2 {
                font-size: 1.25rem;
            }

            .header-left p {
                font-size: 0.75rem;
            }

            .header-right {
                display: flex !important;
                visibility: visible !important;
            }

            .header-center {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .user-name {
                font-size: 0.8125rem;
            }

            .header-search-bar {
                padding: 0.8rem 3.75rem 0.8rem 3.5rem;
                font-size: 0.9375rem;
                min-height: 48px;
                text-indent: 4.5rem;
            }

            .voice-btn {
                left: 0.625rem;
            }

            .voice-btn svg {
                width: 26px;
                height: 26px;
            }

            .send-btn {
                right: 0.625rem;
                width: 38px;
                height: 38px;
            }

            .send-btn svg {
                width: 17px;
                height: 17px;
            }
        }

        /* Small Mobile Devices */
        @media (max-width: 480px) {
            .header {
                padding: 0.75rem 0.875rem;
                gap: 0.625rem;
            }

            .header-left h2 {
                font-size: 1.125rem;
            }

            .header-left p {
                font-size: 0.6875rem;
            }

            .header-center {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .header-search-wrapper {
                display: flex !important;
                visibility: visible !important;
            }

            .user-name {
                display: none;
            }

            .header-search-bar {
                padding: 0.75rem 3.5rem 0.75rem 3rem;
                font-size: 0.875rem;
                min-height: 46px;
                text-indent: 3.5rem;
            }

            .voice-btn {
                left: 0.5rem;
            }

            .voice-btn svg {
                width: 24px;
                height: 24px;
            }

            .send-btn {
                right: 0.5rem;
                width: 36px;
                height: 36px;
            }

            .send-btn svg {
                width: 16px;
                height: 16px;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .header {
                padding: 0.625rem 0.75rem;
            }

            .header-left h2 {
                font-size: 1rem;
            }

            .header-center {
                display: flex !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            .header-search-wrapper {
                display: flex !important;
                visibility: visible !important;
            }

            .header-search-bar {
                padding: 0.625rem 3.25rem 0.625rem 2.75rem;
                font-size: 0.875rem;
                min-height: 44px;
                text-indent: 2.75rem;
            }

            .send-btn {
                right: 0.5rem;
                width: 34px;
                height: 34px;
            }

            .send-btn svg {
                width: 15px;
                height: 15px;
            }
        }
    </style>
    <div class="header-left">
        <h2 id="pageTitle">ড্যাশবোর্ড ওভারভিউ</h2>
        <p id="currentDate"></p>
    </div>
    <div class="header-center">
        <svg style="position: absolute; width: 0; height: 0;">
            <defs>
                <linearGradient id="liquidGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#0d3d29;stop-opacity:1">
                        <animate attributeName="stop-color" values="#0d3d29;#fbbf24;#0d3d29" dur="4s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#064029;stop-opacity:1">
                        <animate attributeName="stop-color" values="#064029;#f59e0b;#064029" dur="4s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <!-- AlphaInno Color Gradients (Animated) -->
                <linearGradient id="blueGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#2094F7;stop-opacity:1">
                        <animate attributeName="stop-color" values="#2094F7;#1a75c9;#2094F7" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#1565c0;stop-opacity:1">
                        <animate attributeName="stop-color" values="#1565c0;#2094F7;#1565c0" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <linearGradient id="purpleGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#8A3FFC;stop-opacity:1">
                        <animate attributeName="stop-color" values="#8A3FFC;#a855f7;#8A3FFC" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#6b2fc9;stop-opacity:1">
                        <animate attributeName="stop-color" values="#6b2fc9;#8A3FFC;#6b2fc9" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <linearGradient id="lightBlueGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#B0E0F7;stop-opacity:1">
                        <animate attributeName="stop-color" values="#B0E0F7;#7dd3fc;#B0E0F7" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#7ec8e3;stop-opacity:1">
                        <animate attributeName="stop-color" values="#7ec8e3;#B0E0F7;#7ec8e3" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <linearGradient id="grayGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#D9D9D9;stop-opacity:1">
                        <animate attributeName="stop-color" values="#D9D9D9;#e5e5e5;#D9D9D9" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#c0c0c0;stop-opacity:1">
                        <animate attributeName="stop-color" values="#c0c0c0;#D9D9D9;#c0c0c0" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <linearGradient id="sendIconGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#0ea5e9;stop-opacity:1">
                        <animate attributeName="stop-color" values="#0ea5e9;#8b5cf6;#0ea5e9" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                    <stop offset="100%" style="stop-color:#8b5cf6;stop-opacity:1">
                        <animate attributeName="stop-color" values="#8b5cf6;#0ea5e9;#8b5cf6" dur="3s"
                            repeatCount="indefinite" />
                    </stop>
                </linearGradient>
                <filter id="liquidGlow">
                    <feGaussianBlur stdDeviation="2" result="coloredBlur" />
                    <feMerge>
                        <feMergeNode in="coloredBlur" />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
            </defs>
        </svg>
    </div>
    <!-- Alpha AI Coming Soon Popup -->
    <div id="alphaAIPopup" class="alpha-ai-popup">
        <div class="alpha-ai-popup-overlay"></div>
        <div class="alpha-ai-popup-content">
            <!-- AlphaInno Logo -->
            <div class="alpha-ai-logo-display">
                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="8" cy="8" r="3.5" fill="url(#blueGradient)" filter="url(#liquidGlow)">
                        <animate attributeName="r" values="3.5;4;3.5" dur="2s" repeatCount="indefinite" />
                        <animate attributeName="opacity" values="0.8;1;0.8" dur="2s" repeatCount="indefinite" />
                    </circle>
                    <circle cx="20" cy="8" r="3.5" fill="url(#purpleGradient)" filter="url(#liquidGlow)">
                        <animate attributeName="r" values="3.5;4;3.5" dur="2.2s" begin="0.2s"
                            repeatCount="indefinite" />
                        <animate attributeName="opacity" values="0.8;1;0.8" dur="2.2s" begin="0.2s"
                            repeatCount="indefinite" />
                    </circle>
                    <circle cx="20" cy="20" r="3.5" fill="url(#lightBlueGradient)" filter="url(#liquidGlow)">
                        <animate attributeName="r" values="3.5;4;3.5" dur="2.4s" begin="0.4s"
                            repeatCount="indefinite" />
                        <animate attributeName="opacity" values="0.8;1;0.8" dur="2.4s" begin="0.4s"
                            repeatCount="indefinite" />
                    </circle>
                    <circle cx="8" cy="20" r="3.5" fill="url(#grayGradient)" filter="url(#liquidGlow)">
                        <animate attributeName="r" values="3.5;4;3.5" dur="2.6s" begin="0.6s"
                            repeatCount="indefinite" />
                        <animate attributeName="opacity" values="0.8;1;0.8" dur="2.6s" begin="0.6s"
                            repeatCount="indefinite" />
                    </circle>
                </svg>
            </div>

            <!-- Message Text -->
            <div class="alpha-ai-message">
                <h3>Hi, I'm Alpha AI</h3>
                <p>I'm Coming Soon to Assist You</p>
            </div>

            <!-- OK Button -->
            <button class="alpha-ai-ok-btn" id="alphaAIOkBtn">OK</button>
        </div>
    </div>

    <style>
        .alpha-ai-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            align-items: center;
            justify-content: center;
        }

        .alpha-ai-popup.active {
            display: flex;
        }

        .alpha-ai-popup-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .alpha-ai-popup-content {
            position: relative;
            background: white;
            border-radius: 20px;
            padding: 3rem 2.5rem 2rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            min-width: 400px;
            animation: popupSlideIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .alpha-ai-logo-display {
            margin-bottom: 2rem;
        }

        .alpha-ai-logo-display svg {
            width: 80px;
            height: 80px;
            filter: drop-shadow(0 5px 20px rgba(32, 148, 247, 0.4));
        }

        .alpha-ai-message h3 {
            font-size: 1.8rem;
            color: #1f2937;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        .alpha-ai-message p {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .alpha-ai-ok-btn {
            background: linear-gradient(135deg, #2094F7 0%, #1a75c9 100%);
            color: white;
            border: none;
            padding: 0.75rem 3rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(32, 148, 247, 0.3);
        }

        .alpha-ai-ok-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(32, 148, 247, 0.4);
        }

        .alpha-ai-ok-btn:active {
            transform: translateY(0);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes popupSlideIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes popupZoomOut {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(0.1);
                opacity: 0;
            }
        }

        .alpha-ai-popup.closing .alpha-ai-popup-content {
            animation: popupZoomOut 0.5s cubic-bezier(0.4, 0, 1, 1) forwards;
        }

        .alpha-ai-popup.closing .alpha-ai-popup-overlay {
            animation: fadeOut 0.5s ease forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .alpha-ai-popup-content {
                min-width: auto;
                width: 90%;
                padding: 2rem 1.5rem 1.5rem;
            }

            .alpha-ai-message h3 {
                font-size: 1.5rem;
            }

            .alpha-ai-message p {
                font-size: 1rem;
            }
        }
    </style>

    <script>
        // Alpha AI Simple Popup
        const voiceBtn = document.getElementById('voiceBtn');
        const sendBtn = document.getElementById('sendBtn');
        const searchInput = document.getElementById('aiSearchInput');
        const alphaAIPopup = document.getElementById('alphaAIPopup');
        const alphaAIOkBtn = document.getElementById('alphaAIOkBtn');
        const alphaAIOverlay = document.querySelector('.alpha-ai-popup-overlay');

        // Function to close popup with zoom animation
        function closeAlphaAIPopup() {
            alphaAIPopup.classList.add('closing');

            setTimeout(() => {
                alphaAIPopup.classList.remove('active');
                alphaAIPopup.classList.remove('closing');
            }, 500); // Match animation duration
        }

        // Voice button click - Show popup
        if (voiceBtn) {
            voiceBtn.addEventListener('click', function () {
                alphaAIPopup.classList.add('active');
            });
        }

        // Send button click - Show popup
        if (sendBtn) {
            sendBtn.addEventListener('click', function () {
                const query = searchInput.value.trim();
                if (query) {
                    console.log('User query:', query);
                    searchInput.value = ''; // Clear input
                }
                alphaAIPopup.classList.add('active');
            });
        }

        // Enter key to send
        if (searchInput) {
            searchInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    if (sendBtn) {
                        sendBtn.click();
                    }
                }
            });
        }

        // OK button click - Close with zoom animation
        if (alphaAIOkBtn) {
            alphaAIOkBtn.addEventListener('click', function () {
                closeAlphaAIPopup();
            });
        }

        // Click overlay to close
        if (alphaAIOverlay) {
            alphaAIOverlay.addEventListener('click', function () {
                closeAlphaAIPopup();
            });
        }

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && alphaAIPopup.classList.contains('active')) {
                closeAlphaAIPopup();
            }
        });

    </script>
    <div class="header-right">
        {{-- <span class="user-name" aria-hidden="true"></span> --}}
        <div class="user-menu">
            <button class="user-avatar" id="userMenuBtn" aria-haspopup="true" aria-expanded="false">
                অ্যাডমিন
            </button>
            <div class="user-dropdown" id="userDropdown" role="menu">
                <a href="#" role="menuitem" onclick="openProfileLogoEditor(); return false;">প্রোফাইল পরিবর্তন</a>
                <form method="POST" action="{{ route('logout') }}" id="headerLogoutForm">
                    @csrf
                    <button type="submit" role="menuitem">
                        <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>লগআউট
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // User dropdown toggle functionality
        (function() {
            const userMenuBtn = document.getElementById('userMenuBtn');
            const userDropdown = document.getElementById('userDropdown');

            if (userMenuBtn && userDropdown) {
                userMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isOpen = userDropdown.classList.contains('open');
                    
                    if (isOpen) {
                        userDropdown.classList.remove('open');
                        userMenuBtn.setAttribute('aria-expanded', 'false');
                    } else {
                        userDropdown.classList.add('open');
                        userMenuBtn.setAttribute('aria-expanded', 'true');
                    }
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                        userDropdown.classList.remove('open');
                        userMenuBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Close dropdown on Escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && userDropdown.classList.contains('open')) {
                        userDropdown.classList.remove('open');
                        userMenuBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        })();
    </script>
</header>