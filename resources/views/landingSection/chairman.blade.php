<style>
    .chairman-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .chairman-container-fluid {
        width: 100%;
        padding: 0 5%;
        margin: 0 auto;
    }

    .chairman-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .chairman-title {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 800;
        color: #0d3d29;
        margin-bottom: 1rem;
        line-height: 1.2;
        letter-spacing: -0.5px;
        text-align: center;
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
</style>

<section class="chairman-section" id="homeChairmanSection">
    <div class="chairman-container-fluid">
        <div class="chairman-header">
            <h2 class="chairman-title" id="homeChairmanSectionTitle">আমাদের চেয়ারম্যান</h2>
        </div>
        <div id="homeChairmanCardsContainer">
            <!-- Chairman cards will be loaded dynamically here -->
        </div>
    </div>
</section>

<script>
    // Load Chairman Section for Home Page
    (function() {
        async function loadHomeChairmanTitle() {
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
                        const titleEl = document.getElementById('homeChairmanSectionTitle');
                        if (titleEl) {
                            titleEl.textContent = data.title;
                        }
                    }
                }
            } catch (error) {
                console.error('Error loading chairman title:', error);
            }
        }

        async function loadHomeChairmanMembers() {
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
                    const container = document.getElementById('homeChairmanCardsContainer');
                    
                    if (!container) return;

                    const section = document.getElementById('homeChairmanSection');
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

        async function loadHomeChairman() {
            await Promise.all([loadHomeChairmanTitle(), loadHomeChairmanMembers()]);
        }

        // Load on page load
        loadHomeChairman();

        // Listen for updates
        window.addEventListener('aboutPageUpdated', loadHomeChairman);
    })();
</script>
