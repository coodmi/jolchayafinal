@extends('layouts')

@section('content')
 <style>
    body {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(13, 61, 41, 0.8), rgba(13, 61, 41, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      background-size: cover;
      background-position: center;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      position: relative;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      color: #ffffff;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
      margin-bottom: 15px;
      position: relative;
      z-index: 10;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
      color: #ffffff;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
      line-height: 1.6;
      position: relative;
      z-index: 10;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0d3d29;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0d3d29;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0d3d29;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0d3d29;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0d3d29;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }
  </style>
  <!-- Hero Section -->
  <section id="projectsHeroSection" class="hero-section">
    <h1 id="projectsHeroTitle"></h1>
    <p id="projectsHeroSubtitle"></p>
    <p id="projectsHeroContent" style="font-size: 1.1rem; margin-top: 10px; max-width: 800px;"></p>
  </section>

  <!-- Intro Section (Slogan) -->
  <section class="intro-section">
    <img id="projectsSloganLogo" src="" alt="Logo" style="display:none;">
    <div class="text-content">
      <h2 id="projectsSloganTitle"></h2>
      <p id="projectsSloganContent"></p>
    </div>
  </section>

  <!-- Title -->
  <h2 class="section-title"></h2>

  <!-- Dynamic Projects Container -->
  <div id="our-projects-dynamic-container">
    @forelse($ourProjects ?? [] as $index => $project)
    @php
      $isReverse = $index % 2 === 1;
      $imageUrl = $project->image_url ?? null;
      $ctaLink = $project->cta_link ?: '/#contact';
      $isExternal = str_starts_with($ctaLink, 'http://') || str_starts_with($ctaLink, 'https://');
    @endphp
    <section class="project-section">
      @if($isReverse)
        <div class="project-content">
          <h3>{{ $project->title }}</h3>
          <p>{{ $project->description }}</p>
          <a href="{{ $ctaLink }}" class="btn" {{ $isExternal ? 'target="_blank" rel="noopener"' : '' }}>{{ $project->cta_text ?: 'বিস্তারিত জানুন' }}</a>
        </div>
        <div class="project-image" @if($imageUrl) style="background-image:url('{{ $imageUrl }}')" @endif></div>
      @else
        <div class="project-image" @if($imageUrl) style="background-image:url('{{ $imageUrl }}')" @endif></div>
        <div class="project-content">
          <h3>{{ $project->title }}</h3>
          <p>{{ $project->description }}</p>
          <a href="{{ $ctaLink }}" class="btn" {{ $isExternal ? 'target="_blank" rel="noopener"' : '' }}>{{ $project->cta_text ?: 'বিস্তারিত জানুন' }}</a>
        </div>
      @endif
    </section>
    @empty
    <p style="text-align:center; padding:3rem; color:#6b7280;">কোনো প্রকল্প পাওয়া যায়নি</p>
    @endforelse
  </div>

  <style>
    body
    {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(13, 61, 41, 0.8), rgba(13, 61, 41, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0d3d29;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0d3d29;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0d3d29;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0d3d29;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0d3d29;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }

    @media (max-width: 768px) {
      .slide {
        min-width: 250px;
        height: 160px;
      }
    }

    /* Pagination Styles */
    .pagination-btn {
      display: inline-block;
      padding: 12px 20px;
      margin: 0 5px;
      background: #ffffff;
      color: #0d3d29;
      border: 2px solid #0d3d29;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 16px;
    }

    .pagination-btn:hover:not(:disabled) {
      background: #0d3d29;
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13, 61, 41, 0.3);
    }

    .pagination-btn.active {
      background: #0d3d29;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(13, 61, 41, 0.4);
    }

    .pagination-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .pagination-info {
      display: inline-block;
      margin: 0 15px;
      color: #666;
      font-size: 15px;
      font-weight: 600;
    }
  </style>

  <script>
  (function(){
      // Function to safely update text content
      function updateText(id, text) {
          const el = document.getElementById(id);
          if (el && text) {
              el.textContent = text;
          }
      }

      // Function to safely update image src
      function updateImage(id, imageUrl) {
          const el = document.getElementById(id);
          if (el && imageUrl) {
              el.src = imageUrl;
              el.style.display = 'block';
          }
      }

      // Function to update background image
      function updateHeroBackground(imageUrl) {
          const heroSection = document.getElementById('projectsHeroSection');
          if (heroSection && imageUrl) {
              heroSection.style.backgroundImage = `linear-gradient(to right, rgba(13, 61, 41, 0.8), rgba(13, 61, 41, 0.3)), url('${imageUrl}')`;
          }
      }

      // Load all project sections from API only
      async function loadProjectContent() {
          try {
              const heroResponse = await fetch('/api/project-sections?section_key=hero', { cache: 'no-store' });
              if (heroResponse.ok) {
                  const hero = await heroResponse.json();
                  if (hero) {
                      updateText('projectsHeroTitle', hero.title);
                      updateText('projectsHeroSubtitle', hero.subtitle);
                      updateText('projectsHeroContent', hero.content);
                      if (hero.image_url) updateHeroBackground(hero.image_url);
                  }
              }

              const sloganResponse = await fetch('/api/project-sections?section_key=slogan', { cache: 'no-store' });
              if (sloganResponse.ok) {
                  const slogan = await sloganResponse.json();
                  if (slogan) {
                      updateText('projectsSloganTitle', slogan.title);
                      updateText('projectsSloganContent', slogan.content);
                      if (slogan.logo_url) updateImage('projectsSloganLogo', slogan.logo_url);
                  }
              }
          } catch (error) {
              console.error('Error loading project content:', error);
          }
      }

      // Load content on page load
      loadProjectContent();

  })();
  </script>
@endsection
