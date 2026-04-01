@extends('layouts')

@section('content')
    <style>
    body {
        font-family: 'Noto Sans Bengali', sans-serif;
        color: #222;
        margin: 0;
        overflow-x: hidden;
    }

    /* Banner Section */
    .about-banner {
        position: relative;
        height: 60vh;
        min-height: 500px;
        background-color: #0d3d29;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 80px 20px;
        color: #fff;
    }

    .about-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(13, 61, 41, 0.9) 0%, rgba(13, 61, 41, 0.7) 100%);
        z-index: 1;
    }

    .banner-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        width: 100%;
    }

    .banner-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: #ffffff;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        margin-bottom: 30px;
        line-height: 1.2;
    }

    .banner-description {
        font-size: 1.25rem;
        line-height: 1.8;
        color: #ffffff;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 15px;
    }

    .banner-description:last-of-type {
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .about-banner {
            height: 50vh;
            min-height: 400px;
            padding: 60px 20px;
        }

        .banner-title {
            font-size: 2.5rem;
            margin-bottom: 25px;
        }

        .banner-description {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .banner-title {
            font-size: 2rem;
        }

        .banner-description {
            font-size: 1rem;
        }
    }

    /* History Section */
    .history-section {
        padding: 80px 20px;
        background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
    }

    .history-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .history-header {
            text-align: center;
        margin-bottom: 60px;
    }

    .history-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .history-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #0d3d29, #34d399);
        border-radius: 2px;
    }

    .history-content {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        margin-top: 50px;
    }

    .history-paragraph {
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
        border-left: 4px solid #0d3d29;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .history-paragraph:hover {
            transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .history-paragraph p {
        font-size: 1.1rem;
        line-height: 1.9;
        color: #374151;
            margin: 0;
        text-align: justify;
    }

    .history-icon {
        display: inline-block;
            width: 50px;
            height: 50px;
        background: linear-gradient(135deg, #0d3d29, #34d399);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    @media (min-width: 768px) {
        .history-content {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .history-section {
            padding: 60px 20px;
        }

        .history-title {
            font-size: 2.2rem;
        }

        .history-paragraph {
            padding: 30px;
        }

        .history-paragraph p {
            font-size: 1rem;
        }
    }

    /* Mission & Vision Section */
    .mission-vision-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .mission-vision-container {
        max-width: 1200px;
            margin: 0 auto;
    }

    .mission-vision-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .mission-vision-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .mission-vision-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #0d3d29, #34d399);
        border-radius: 2px;
    }

    .mission-vision-grid {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 40px;
        align-items: stretch;
        margin-top: 50px;
    }

    .mission-card,
    .vision-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 40px;
            border-radius: 16px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.05);
        border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: 400px;
        }

    .mission-card:hover,
    .vision-card:hover {
            transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(13, 61, 41, 0.15), 0 4px 8px rgba(0, 0, 0, 0.1);
        border-color: #0d3d29;
    }

    .mission-icon,
    .vision-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #0d3d29, #34d399);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        margin: 0 auto 25px;
        box-shadow: 0 4px 12px rgba(13, 61, 41, 0.3);
    }

    .mission-card h3,
    .vision-card h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 20px;
        text-align: center;
    }

    .mission-card p,
    .vision-card p {
        font-size: 1.1rem;
        line-height: 1.9;
        color: #374151;
        text-align: justify;
        margin: 0;
        flex-grow: 1;
    }

    .mission-vision-image-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        min-height: 400px;
    }

    .mission-vision-image {
        width: 350px;
        height: 400px;
        border-radius: 20px;
        object-fit: cover;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 4px solid #ffffff;
        transition: transform 0.3s ease;
    }

    .mission-vision-image:hover {
        transform: scale(1.05);
        }

        @media (max-width: 992px) {
        .mission-vision-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .mission-vision-image-container {
            min-height: 300px;
        }

        .mission-vision-image {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            order: 2;
        }

        .mission-card,
        .vision-card {
            min-height: auto;
        }

        .mission-card {
            order: 1;
        }

        .vision-card {
            order: 3;
            }
        }

        @media (max-width: 768px) {
        .mission-vision-section {
            padding: 60px 20px;
        }

        .mission-vision-title {
            font-size: 2.2rem;
        }

        .mission-card,
        .vision-card {
            padding: 30px;
        }

        .mission-card h3,
        .vision-card h3 {
            font-size: 1.5rem;
        }

        .mission-card p,
        .vision-card p {
            font-size: 1rem;
        }

        .mission-vision-image-container {
            min-height: 250px;
        }

        .mission-vision-image {
            width: 100%;
            max-width: 280px;
            height: 280px;
        }
    }

    /* Board Members Section */
    .board-members-section {
        padding: 80px 20px;
        background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%);
    }

    .board-members-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .board-members-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .board-members-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .board-members-title::after {
        content: '';
            position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #0d3d29, #34d399);
        border-radius: 2px;
    }

    .board-members-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-top: 50px;
    }

    .board-member-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
            display: flex;
            transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
    }

        .board-member-card:hover {
            transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(13, 61, 41, 0.15), 0 4px 8px rgba(0, 0, 0, 0.1);
        border-color: #0d3d29;
    }

    .board-member-image-container {
        width: 200px;
        min-width: 200px;
        background: #0d3d29;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        }
        
        .board-member-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .board-member-content {
        flex: 1;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .board-member-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 8px;
    }

    .board-member-position {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .board-member-message {
        font-size: 1rem;
        line-height: 1.7;
        color: #374151;
        text-align: justify;
        margin: 0;
    }

    .board-member-quote {
        font-size: 3rem;
        color: #d1fae5;
        line-height: 1;
        margin-bottom: 10px;
        font-family: 'Georgia', serif;
        }

        @media (max-width: 992px) {
        .board-members-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .board-members-section {
            padding: 60px 20px;
        }

        .board-members-title {
            font-size: 2.2rem;
        }

        .board-member-card {
            flex-direction: column;
        }

        .board-member-image-container {
                width: 100%;
            min-width: 100%;
            height: 250px;
        }

        .board-member-content {
            padding: 25px;
        }

        .board-member-name {
            font-size: 1.3rem;
        }
    }

    /* Chairman Section */
    .chairman-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .chairman-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .chairman-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .chairman-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .chairman-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #0d3d29, #34d399);
        border-radius: 2px;
    }

    .chairman-card {
        max-width: 900px;
        margin: 50px auto 0;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1), 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        display: flex;
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
    }

    .chairman-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(13, 61, 41, 0.2), 0 4px 12px rgba(0, 0, 0, 0.1);
        border-color: #0d3d29;
    }

    .chairman-image-container {
        width: 300px;
        min-width: 300px;
        background: #0d3d29;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .chairman-image {
                width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px;
    }

    .chairman-content {
        flex: 1;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
            position: relative;
    }

    .chairman-quote {
        font-size: 4rem;
        color: #0d3d29;
        line-height: 1;
        margin-bottom: 15px;
        font-family: 'Georgia', serif;
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .chairman-name {
        font-size: 2rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    .chairman-position {
        font-size: 1.2rem;
        color: #6b7280;
        margin-bottom: 25px;
        font-weight: 500;
    }

    .chairman-message {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #374151;
        text-align: justify;
        margin: 0;
        }

        @media (max-width: 768px) {
        .chairman-section {
            padding: 60px 20px;
        }

        .chairman-title {
            font-size: 2.2rem;
        }

        .chairman-card {
            flex-direction: column;
            max-width: 100%;
        }

        .chairman-image-container {
            width: 100%;
            min-width: 100%;
            height: 300px;
        }

        .chairman-content {
            padding: 30px;
        }

        .chairman-name {
            font-size: 1.6rem;
        }

        .chairman-position {
            font-size: 1rem;
        }

        .chairman-message {
            font-size: 1rem;
        }

        .chairman-quote {
            font-size: 3rem;
            top: 15px;
            left: 15px;
        }
    }

    /* Other Members Section */
    .other-members-section {
        padding: 80px 20px;
        background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
    }

    .other-members-container {
        max-width: 1200px;
            margin: 0 auto;
    }

    .other-members-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .other-members-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 15px;
            position: relative;
        display: inline-block;
    }

    .other-members-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #0d3d29, #34d399);
        border-radius: 2px;
    }

    .other-members-slider-wrapper {
        position: relative;
        overflow: hidden;
        padding: 20px 0;
    }

    .other-members-track {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        gap: 30px;
        }

        .other-member-card {
        min-width: 250px;
        max-width: 250px;
        background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
        }

        .other-member-card:hover {
            transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(13, 61, 41, 0.15), 0 4px 8px rgba(0, 0, 0, 0.1);
        border-color: #0d3d29;
        }

    .other-member-image-wrapper {
            width: 100%;
        height: 250px;
        overflow: hidden;
        background: #0d3d29;
        position: relative;
    }

    .other-member-image {
        width: 100%;
        height: 100%;
            object-fit: cover;
        transition: transform 0.3s ease;
    }

    .other-member-card:hover .other-member-image {
        transform: scale(1.1);
    }

    .other-member-content {
        padding: 20px;
            text-align: center;
        }

    .other-member-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0d3d29;
        margin-bottom: 8px;
    }

    .other-member-position {
        font-size: 0.95rem;
            color: #6b7280;
            margin: 0;
        font-weight: 500;
    }

    .other-members-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-top: 40px;
    }

    .other-members-nav-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        background: #ffffff;
        border: 2px solid #0d3d29;
        color: #0d3d29;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        font-size: 1.2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .other-members-nav-btn:hover:not(:disabled) {
        background: #0d3d29;
        color: #ffffff;
        transform: scale(1.1);
    }

    .other-members-nav-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .other-members-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 30px;
    }

    .other-members-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #d1d5db;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .other-members-dot.active {
        background: #0d3d29;
        width: 32px;
        border-radius: 6px;
    }

    @media (max-width: 768px) {
        .other-members-section {
            padding: 60px 20px;
        }

        .other-members-title {
            font-size: 2.2rem;
        }

            .other-member-card {
            min-width: 200px;
            max-width: 200px;
        }

        .other-member-image-wrapper {
            height: 200px;
        }

        .other-member-name {
            font-size: 1.1rem;
        }

        .other-member-position {
            font-size: 0.9rem;
        }

        .other-members-nav-btn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
</style>

<!-- About Banner Section -->
@php
    $aboutHero = $aboutSections['hero'] ?? null;
    $bannerBg = '';
    if ($aboutHero && !empty($aboutHero->image_url)) {
        $imgUrl = $aboutHero->image_url;
        if (!str_starts_with($imgUrl, 'http') && !str_starts_with($imgUrl, '/')) {
            $imgUrl = '/' . $imgUrl;
        }
        $bannerBg = "background-image: linear-gradient(to right, rgba(13,61,41,0.85), rgba(13,61,41,0.75)), url('{$imgUrl}');";
    }
@endphp
<section class="about-banner" id="aboutBannerSection" style="{{ $bannerBg }}">
    <div class="banner-content">
        <h1 class="banner-title" id="aboutBannerTitle"></h1>
        <p class="banner-description" id="aboutBannerSubtitle1"></p>
        <p class="banner-description" id="aboutBannerSubtitle2"></p>
    </div>
</section>

<!-- History Section -->
<section class="history-section" id="historySection">
    <div class="history-container">
        <div class="history-header">
            <h2 class="history-title">আমাদের ইতিহাস</h2>
        </div>
        <div class="history-content">
            <div class="history-paragraph">
                <div class="history-icon">📜</div>
                <p id="historyContent1"></p>
            </div>
            <div class="history-paragraph">
                <div class="history-icon">🚀</div>
                <p id="historyContent2"></p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision-section" id="missionVisionSection">
    <div class="mission-vision-container">
        <div class="mission-vision-header">
            <h2 class="mission-vision-title">আমাদের মিশন ও ভিশন</h2>
        </div>
        <div class="mission-vision-grid">
            <!-- Mission Card -->
            <div class="mission-card">
                <div class="mission-icon">🎯</div>
                <h3 id="missionTitle"></h3>
                <p id="missionContent"></p>
            </div>

            <!-- Center Image -->
            <div class="mission-vision-image-container">
                <img id="missionVisionImage" src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=500&q=80" alt="Mission & Vision" class="mission-vision-image" style="display: none;" />
            </div>

            <!-- Vision Card -->
            <div class="vision-card">
                <div class="vision-icon">🔮</div>
                <h3 id="visionTitle"></h3>
                <p id="visionContent"></p>
            </div>
        </div>
    </div>
</section>

<!-- Board Members Section -->
<section class="board-members-section" id="boardMembersSection">
    <div class="board-members-container">
        <div class="board-members-header">
            <h2 class="board-members-title">বোর্ড মেম্বার</h2>
        </div>
        <div class="board-members-grid" id="boardMembersGrid">
            <!-- Board members will be loaded dynamically here -->
        </div>
    </div>
</section>

<!-- Chairman Section -->
<section class="chairman-section" id="chairmanSection">
    <div class="chairman-container">
        <div class="chairman-header">
            <h2 class="chairman-title" id="chairmanSectionTitle">আমাদের চেয়ারম্যান</h2>
        </div>
        <div id="chairmanCardsContainer">
            <!-- Chairman cards will be loaded dynamically here -->
        </div>
    </div>
</section>

<!-- Other Members Section -->
<section class="other-members-section" id="otherMembersSection">
    <div class="other-members-container">
        <div class="other-members-header">
            <h2 class="other-members-title" id="otherMembersTitle">অন্যান্য সদস্য</h2>
        </div>
        <div class="other-members-slider-wrapper">
            <div class="other-members-track" id="otherMembersTrack">
                <!-- Other member cards will be loaded dynamically here -->
            </div>
        </div>
        <div class="other-members-nav">
            <button class="other-members-nav-btn" id="otherMembersPrev" aria-label="Previous">
                ‹
            </button>
            <div class="other-members-dots" id="otherMembersDots">
                <!-- Dots will be generated dynamically -->
            </div>
            <button class="other-members-nav-btn" id="otherMembersNext" aria-label="Next">
                ›
            </button>
        </div>
    </div>
</section>

<!-- Additional content sections can be added here -->

    <script>
        (function() {
        // Load banner data
        async function loadAboutBanner() {
            try {
                const response = await fetch('/api/about-sections?section_key=hero&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data) {
                        // Update title
                        const titleEl = document.getElementById('aboutBannerTitle');
                        if (titleEl && data.title) {
                            titleEl.textContent = data.title;
                        }

                        // Update subtitle 1
                        const subtitle1El = document.getElementById('aboutBannerSubtitle1');
                        if (subtitle1El && data.subtitle) {
                            subtitle1El.textContent = data.subtitle;
                        }

                        // Update subtitle 2
                        const subtitle2El = document.getElementById('aboutBannerSubtitle2');
                        if (subtitle2El && data.content) {
                            subtitle2El.textContent = data.content;
                        }

                        // Update background image
                        const bannerSection = document.getElementById('aboutBannerSection');
                        if (bannerSection && (data.image_url || data.image_path)) {
                            const imageUrl = data.image_path || data.image_url;
                            // Handle different image URL formats
                            let finalImageUrl = imageUrl;
                            if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                                finalImageUrl = '/' + imageUrl;
                            }
                            
                            bannerSection.style.backgroundImage = `linear-gradient(to right, rgba(13, 61, 41, 0.85), rgba(13, 61, 41, 0.75)), url('${finalImageUrl}')`;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading about banner:', error);
            }
        }

        // Load on page load
        loadAboutBanner();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadAboutBanner);
})();

    // Load History Section
    (function() {
        async function loadHistorySection() {
            try {
                const response = await fetch('/api/about-sections?section_key=history&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data) {
                        // Update first paragraph
                        const content1El = document.getElementById('historyContent1');
                        if (content1El) {
                            if (data.content) {
                                content1El.textContent = data.content;
                                content1El.style.display = 'block';
                } else {
                                content1El.style.display = 'none';
                            }
                        }

                        // Update second paragraph
                        const content2El = document.getElementById('historyContent2');
                        if (content2El) {
                            if (data.content_2) {
                                content2El.textContent = data.content_2;
                                content2El.style.display = 'block';
                } else {
                                content2El.style.display = 'none';
                            }
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading history section:', error);
            }
        }

        // Load on page load
        loadHistorySection();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadHistorySection);
})();

    // Load Mission & Vision Section
    (function() {
        async function loadMissionSection() {
            try {
                const response = await fetch('/api/about-sections?section_key=mission&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data) {
                        // Update mission title
                        const titleEl = document.getElementById('missionTitle');
                        if (titleEl) {
                            if (data.title) {
                                titleEl.textContent = data.title;
                                titleEl.style.display = 'block';
                            } else {
                                titleEl.style.display = 'none';
                            }
                        }

                        // Update mission content
                        const contentEl = document.getElementById('missionContent');
                        if (contentEl) {
                            if (data.content) {
                                contentEl.textContent = data.content;
                                contentEl.style.display = 'block';
                            } else {
                                contentEl.style.display = 'none';
                            }
                        }

                        // Update mission image
                        const imageEl = document.getElementById('missionVisionImage');
                        if (imageEl) {
                            if (data.image_url || data.image_path) {
                                const imageUrl = data.image_path || data.image_url;
                                let finalImageUrl = imageUrl;
                                if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                                    finalImageUrl = '/' + imageUrl;
                                }
                                imageEl.src = finalImageUrl;
                                imageEl.style.display = 'block';
                                imageEl.onerror = function() {
                                    this.style.display = 'none';
                                };
                            } else {
                                imageEl.style.display = 'none';
                            }
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading mission section:', error);
            }
        }

        async function loadVisionSection() {
            try {
                const response = await fetch('/api/about-sections?section_key=vision&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data) {
                        // Update vision title
                        const titleEl = document.getElementById('visionTitle');
                        if (titleEl) {
                            if (data.title) {
                                titleEl.textContent = data.title;
                                titleEl.style.display = 'block';
                            } else {
                                titleEl.style.display = 'none';
                            }
                        }

                        // Update vision content
                        const contentEl = document.getElementById('visionContent');
                        if (contentEl) {
                            if (data.content) {
                                contentEl.textContent = data.content;
                                contentEl.style.display = 'block';
                } else {
                                contentEl.style.display = 'none';
                            }
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading vision section:', error);
            }
        }

        async function loadMissionVision() {
            await Promise.all([loadMissionSection(), loadVisionSection()]);
        }

        // Load on page load
        loadMissionVision();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadMissionVision);
})();

    // Load Board Members Section
    (function() {
        async function loadBoardTitle() {
            try {
                const response = await fetch('/api/about-sections?section_key=board_title&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data && data.title) {
                        const titleEl = document.querySelector('.board-members-title');
                        if (titleEl) {
                            titleEl.textContent = data.title;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading board title:', error);
            }
        }

        async function loadBoardMembers() {
            try {
                const response = await fetch('/api/team-members?type=founder&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const members = await response.json();
                    const grid = document.getElementById('boardMembersGrid');
                    
                    if (!grid) return;

                    if (!members || members.length === 0) {
                        grid.innerHTML = '<p style="text-align:center; color:#9ca3af; padding:40px; grid-column:1/-1;">কোনো বোর্ড মেম্বার নেই।</p>';
                        return;
                    }

                    grid.innerHTML = members.map(member => {
                        const imageUrl = member.image_url || member.image_url_full || '';
                        let finalImageUrl = imageUrl;
                        if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                            finalImageUrl = '/' + imageUrl;
                        }
                        
                        const defaultImage = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(member.name || 'Board Member') + '&background=0d3d29&color=fff&size=200';

                        return `
                            <div class="board-member-card">
                                <div class="board-member-image-container">
                                    <img src="${finalImageUrl || defaultImage}" 
                                         alt="${member.name || 'Board Member'}" 
                                         class="board-member-image"
                                         onerror="this.src='${defaultImage}'" />
                                </div>
                                <div class="board-member-content">
                                    <div class="board-member-quote">"</div>
                                    <h3 class="board-member-name">${member.name || 'N/A'}</h3>
                                    <p class="board-member-position">${member.position || ''}</p>
                                    <p class="board-member-message">${member.content || ''}</p>
                                </div>
                            </div>
                        `;
                    }).join('');
                }
            } catch (error) {
                console.error('Error loading board members:', error);
            }
        }

        // Load on page load
        loadBoardTitle();
        loadBoardMembers();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', function() {
            loadBoardTitle();
            loadBoardMembers();
        });
})();

    // Load Chairman Section
    (function() {
        async function loadChairmanTitle() {
            try {
                const response = await fetch('/api/about-sections?section_key=chairman_title&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data && data.title) {
                        const titleEl = document.getElementById('chairmanSectionTitle');
                        if (titleEl) {
                            titleEl.textContent = data.title;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading chairman title:', error);
            }
        }

        async function loadChairmanMembers() {
            try {
                const response = await fetch('/api/team-members?type=chairman&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const members = await response.json();
                    const container = document.getElementById('chairmanCardsContainer');
                    
                    if (!container) return;

                    const section = document.getElementById('chairmanSection');
                    if (!members || members.length === 0) {
                        if (section) section.style.display = 'none';
                        return;
                    }
                    
                    if (section) section.style.display = 'block';

                    container.innerHTML = members.map(member => {
                        const imageUrl = member.image_url || member.image_url_full || '';
                        let finalImageUrl = imageUrl;
                        if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                            finalImageUrl = '/' + imageUrl;
                        }
                        
                        const defaultImage = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(member.name || 'Chairman') + '&background=0d3d29&color=fff&size=300';

                        return `
                            <div class="chairman-card">
                                <div class="chairman-image-container">
                                    <img src="${finalImageUrl || defaultImage}" 
                                         alt="${member.name || 'Chairman'}" 
                                         class="chairman-image"
                                         onerror="this.src='${defaultImage}'" />
                                </div>
                                <div class="chairman-content">
                                    <div class="chairman-quote">"</div>
                                    <h3 class="chairman-name">${member.name || 'N/A'}</h3>
                                    <p class="chairman-position">${member.position || ''}</p>
                                    <p class="chairman-message">${member.content || ''}</p>
                                </div>
                            </div>
                        `;
                    }).join('');
                }
            } catch (error) {
                console.error('Error loading chairman members:', error);
            }
        }

        async function loadChairman() {
            await Promise.all([loadChairmanTitle(), loadChairmanMembers()]);
        }

        // Load on page load
        loadChairman();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadChairman);
})();

    // Load Other Members Section
    (function() {
        let currentIndex = 0;
        let itemsPerView = 4;
        let members = [];
        const track = document.getElementById('otherMembersTrack');
        const prevBtn = document.getElementById('otherMembersPrev');
        const nextBtn = document.getElementById('otherMembersNext');
        const dotsContainer = document.getElementById('otherMembersDots');

        function updateItemsPerView() {
            if (window.innerWidth <= 768) {
                itemsPerView = 2;
            } else if (window.innerWidth <= 992) {
                itemsPerView = 3;
                } else {
                itemsPerView = 4;
            }
        }

        async function loadOtherMembersTitle() {
            try {
                const response = await fetch('/api/about-sections?section_key=other_title&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    if (data && data.title) {
                        const titleEl = document.getElementById('otherMembersTitle');
                        if (titleEl) {
                            titleEl.textContent = data.title;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading other members title:', error);
            }
        }

        async function loadOtherMembers() {
            try {
                const response = await fetch('/api/team-members?type=other&_t=' + Date.now(), {
                    cache: 'no-store',
                    headers: {
                        'Cache-Control': 'no-cache',
                        'Pragma': 'no-cache'
                    }
                });
                if (response.ok) {
                    const data = await response.json();
                    members = Array.isArray(data) ? data.filter(m => m.is_active !== false) : [];
                    
                    const section = document.getElementById('otherMembersSection');
                    if (!members || members.length === 0) {
                        if (section) section.style.display = 'none';
                        return;
                    }
                    
                    if (section) section.style.display = 'block';
                    
                    renderMembers();
                    updateCarousel();
                }
            } catch (error) {
                console.error('Error loading other members:', error);
            }
        }

        function renderMembers() {
            if (!track) return;
            
            updateItemsPerView();
            
            track.innerHTML = members.map(member => {
                const imageUrl = member.image_url || member.image_url_full || '';
                let finalImageUrl = imageUrl;
                if (imageUrl && !imageUrl.startsWith('http') && !imageUrl.startsWith('/')) {
                    finalImageUrl = '/' + imageUrl;
                }
                
                const defaultImage = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(member.name || 'Member') + '&background=0d3d29&color=fff&size=250';

                return `
                    <div class="other-member-card">
                        <div class="other-member-image-wrapper">
                            <img src="${finalImageUrl || defaultImage}" 
                                 alt="${member.name || 'Member'}" 
                                 class="other-member-image"
                                 onerror="this.src='${defaultImage}'" />
                        </div>
                        <div class="other-member-content">
                            <h4 class="other-member-name">${member.name || 'N/A'}</h4>
                            <p class="other-member-position">${member.position || ''}</p>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function updateCarousel() {
            if (!track || members.length === 0) return;
            
            updateItemsPerView();
            const maxIndex = Math.max(0, members.length - itemsPerView);
                currentIndex = Math.min(currentIndex, maxIndex);
            
            const cardWidth = track.querySelector('.other-member-card')?.offsetWidth || 280;
            const gap = 30;
            const translateX = -(currentIndex * (cardWidth + gap));
            track.style.transform = `translateX(${translateX}px)`;
            
            // Update navigation buttons
            if (prevBtn) {
                prevBtn.disabled = currentIndex === 0;
            }
            if (nextBtn) {
                nextBtn.disabled = currentIndex >= maxIndex;
            }
            
            // Update dots
            updateDots();
        }

        function updateDots() {
            const dotsContainer = document.getElementById('otherMembersDots');
            if (!dotsContainer) return;
            
            updateItemsPerView();
            const numSlides = Math.max(1, Math.ceil(members.length / itemsPerView));
            
            dotsContainer.innerHTML = '';
            for (let i = 0; i < numSlides; i++) {
                const dot = document.createElement('div');
                dot.className = 'other-members-dot' + (i === Math.floor(currentIndex / itemsPerView) ? ' active' : '');
                dot.setAttribute('data-index', i);
                dot.setAttribute('aria-label', `Slide ${i + 1}`);
                dot.addEventListener('click', () => {
                    currentIndex = i * itemsPerView;
                    updateCarousel();
                });
                dotsContainer.appendChild(dot);
            }
        }

        // Navigation handlers
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    updateItemsPerView();
                    currentIndex = Math.max(0, currentIndex - itemsPerView);
                    updateCarousel();
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                updateItemsPerView();
                const maxIndex = Math.max(0, members.length - itemsPerView);
                if (currentIndex < maxIndex) {
                    currentIndex = Math.min(maxIndex, currentIndex + itemsPerView);
                    updateCarousel();
                }
            });
        }

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                renderMembers();
                updateCarousel();
            }, 250);
        });

        // Load on page load
        async function loadOtherMembersSection() {
            await Promise.all([loadOtherMembersTitle(), loadOtherMembers()]);
        }

        loadOtherMembersSection();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadOtherMembersSection);
})();
    </script>

@endsection

