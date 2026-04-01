<div id="about" class="tab-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>আমাদের সম্পর্কে</h3>
                    <div class="subtitle">এই ট্যাবে হিরো সেকশন, ইতিহাস, মিশন, ভিশন, প্রতিষ্ঠাতা, চেয়ারম্যান ইত্যাদি ম্যানেজ করুন
                    </div>
                </div>
                <div class="stat-icon green"><i class="fas fa-info-circle"></i></div>
            </div>
        </div>
    </div>

    <input type="hidden" id="csrfTokenAbout" value="{{ csrf_token() }}">

    <style>
        .about-form-group {
            margin-bottom: 16px;
        }
        .about-form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }
        .about-form-group input[type="text"],
        .about-form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .about-form-group input[type="text"]:focus,
        .about-form-group textarea:focus {
            outline: none;
            border-color: #0d3d29;
        }
        .about-form-group textarea {
            min-height: 100px;
            resize: vertical;
            font-family: inherit;
        }
        .about-save-btn {
            background: #0d3d29;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(13, 61, 41, 0.2);
        }
        .about-save-btn:hover {
            background: #0d6639;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 61, 41, 0.3);
        }
        .about-status {
            margin-top: 12px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
        }
        .about-status.success {
            background: #d1fae5;
            color: #065f46;
        }
        .about-status.error {
            background: #fee2e2;
            color: #991b1b;
        }
        .image-preview-container {
            margin-top: 12px;
            text-align: center;
        }
        .image-preview-container img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    </style>

    <!-- Hero Section -->
    <div id="about-hero" style="margin-top:1rem;">
        <div class="table-card">
            <h2>হিরো সেকশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">About পেজের হিরো সেকশনের কন্টেন্ট ম্যানেজ করুন</p>

            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="hero-title" placeholder="যেমন: আমাদের সম্পর্কে" />
            </div>
            <div class="about-form-group">
                <label>সাব-টাইটেল ১</label>
                <textarea id="hero-subtitle" placeholder="প্রথম উক্তি"></textarea>
            </div>
            <div class="about-form-group">
                <label>সাব-টাইটেল ২</label>
                <textarea id="hero-subtitle2" placeholder="দ্বিতীয় উক্তি"></textarea>
            </div>
            <div class="about-form-group">
                <label>ব্যানার ইমেজ</label>
                <input type="file" id="hero-image" accept="image/*" class="search-input" onchange="previewHeroImage(this)" />
                <small style="color:#6b7280; display:block; margin-top:4px;">PNG/JPG/WEBP সমর্থিত। সর্বোচ্চ 5MB</small>
                <div id="hero-image-preview" class="image-preview-container" style="display:none; margin-top:12px;">
                    <img id="hero-image-preview-img" src="" alt="Preview" style="max-width:100%; max-height:200px; border-radius:8px; border:2px solid #e5e7eb;" />
                </div>
            </div>

            <button class="about-save-btn" onclick="saveAboutSection('hero')">সংরক্ষণ করুন</button>
            <div id="hero-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- History Section -->
    <div id="about-history" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের ইতিহাস</h2>
            <p style="color:#6b7280; margin-bottom:20px;">ইতিহাস সেকশনের কন্টেন্ট ম্যানেজ করুন</p>

            <div class="about-form-group">
                <label>প্রথম প্যারাগ্রাফ</label>
                <textarea id="history-content" placeholder="আমাদের সংস্থা ২০০৫ সালে শুরু হয়েছিল..."></textarea>
            </div>
            <div class="about-form-group">
                <label>দ্বিতীয় প্যারাগ্রাফ</label>
                <textarea id="history-content2" placeholder="সময়ের সঙ্গে সঙ্গে আমরা নতুন নতুন উদ্যোগ নিয়েছি..."></textarea>
            </div>

            <button class="about-save-btn" onclick="saveAboutSection('history')">সংরক্ষণ করুন</button>
            <div id="history-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Mission Section -->
    <div id="about-mission" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের মিশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">মিশন সেকশনের কন্টেন্ট ম্যানেজ করুন</p>

            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="mission-title" placeholder="আমাদের মিশন" />
            </div>
            <div class="about-form-group">
                <label>বিবরণ</label>
                <textarea id="mission-content" placeholder="আমাদের মিশন হলো..."></textarea>
            </div>
            <div class="about-form-group">
                <label>ছবি আপলোড করুন</label>
                <input type="file" id="mission-image" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;" onchange="previewAboutImage('mission')" />
                <div id="mission-image-preview" class="image-preview-container"></div>
            </div>

            <button class="about-save-btn" onclick="saveAboutSection('mission')">সংরক্ষণ করুন</button>
            <div id="mission-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Vision Section -->
    <div id="about-vision" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের ভিশন</h2>
            <p style="color:#6b7280; margin-bottom:20px;">ভিশন সেকশনের কন্টেন্ট ম্যানেজ করুন</p>

            <div class="about-form-group">
                <label>শিরোনাম</label>
                <input type="text" id="vision-title" placeholder="আমাদের ভিশন" />
            </div>
            <div class="about-form-group">
                <label>বিবরণ</label>
                <textarea id="vision-content" placeholder="আমাদের ভিশন হলো..."></textarea>
            </div>

            <button class="about-save-btn" onclick="saveAboutSection('vision')">সংরক্ষণ করুন</button>
            <div id="vision-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Board Members Section - Dynamic -->
    <div id="about-board-members" style="margin-top:1rem;">
        <div class="table-card">
            <h2>বোর্ড মেম্বার</h2>
            <p style="color:#6b7280; margin-bottom:20px;">বোর্ড মেম্বারদের তথ্য ম্যানেজ করুন - একাধিক সদস্য যোগ করতে পারেন</p>

            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="board-section-title" placeholder="যেমন: বোর্ড মেম্বার" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveBoardTitle()" style="background:#0d3d29; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="board-title-status" class="about-status" style="display:none;"></div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">বোর্ড মেম্বার তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক বোর্ড মেম্বার যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('founder')" style="background:#0d3d29;">+ নতুন বোর্ড মেম্বার যোগ করুন</button>
            </div>
            <div id="founder-members-list"></div>
        </div>
    </div>

    <!-- Other Members Section - Dynamic -->
    <div id="about-other" style="margin-top:1rem;">
        <div class="table-card">
            <h2>অন্যান্য সদস্য</h2>
            <p style="color:#6b7280; margin-bottom:20px;">অন্যান্য সদস্যদের তথ্য ম্যানেজ করুন - একাধিক সদস্য যোগ করতে পারেন</p>

            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="other-section-title" placeholder="যেমন: অন্যান্য সদস্য" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveOtherTitle()" style="background:#0d3d29; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="other-title-status" class="about-status" style="display:none;"></div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">অন্যান্য সদস্য তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক সদস্য যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('other')" style="background:#0d3d29;">+ নতুন সদস্য যোগ করুন</button>
            </div>
            <div id="other-members-list"></div>
        </div>
    </div>

    <!-- Chairman Message Box Section -->
    <div id="about-chairman-message" style="margin-top:1rem;">
        <div class="table-card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div>
                    <h2>আমাদের চেয়ারম্যান (Message Box)</h2>
                    <p style="color:#6b7280; margin:4px 0 0 0;">চেয়ারম্যানের প্রমিনেন্ট বার্তা বক্সের কন্টেন্ট ম্যানেজ করুন</p>
                </div>
                <button class="about-save-btn" onclick="deleteChairmanMessage()" id="delete-chairman-message-btn" style="background:#dc2626; display:none;">
                    🗑️ মুছুন
                </button>
            </div>

            <div class="about-form-group">
                <label>নাম <span style="color:#dc2626;">*</span></label>
                <input type="text" id="chairman-message-name" placeholder="যেমন: ইঞ্জিনিয়ার কামাল হোসেন" />
            </div>
            <div class="about-form-group">
                <label>পদবি <span style="color:#dc2626;">*</span></label>
                <input type="text" id="chairman-message-position" placeholder="যেমন: ব্যবস্থাপনা পরিচালক" />
            </div>
            <div class="about-form-group">
                <label>বার্তা/বিবরণ <span style="color:#dc2626;">*</span> <span style="color:#6b7280; font-weight:normal; font-size:13px;">(সর্বোচ্চ ১০০ শব্দ)</span></label>
                <textarea id="chairman-message-content" placeholder="আমরা প্রতিটি প্রকল্পে সর্বোচ্চ মান নিশ্চিত করি এবং গ্রাহকদের সন্তুষ্টিকে সর্বোচ্চ অগ্রাধিকার দিই..." style="min-height: 150px;" oninput="countChairmanMessageWords()" maxlength="1000"></textarea>
                <div id="chairman-message-word-count" style="margin-top:8px; font-size:13px; color:#6b7280;">
                    <span id="chairman-word-count-number">0</span> / 100 শব্দ
                </div>
            </div>
            <div class="about-form-group">
                <label>ছবি আপলোড করুন</label>
                <div id="chairman-message-current-image" style="display:none; margin-bottom:10px; padding:12px; background:#f0fdf4; border:2px solid #86efac; border-radius:8px;">
                    <small style="color:#166534; font-weight:600; display:block; margin-bottom:8px;">✓ বর্তমান ইমেজ</small>
                    <img id="chairman-message-image-preview" src="" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                </div>
                <input type="file" id="chairman-message-image" accept="image/*" style="width:100%; padding:8px; border:1px solid #d1d5db; border-radius:8px;" onchange="previewChairmanMessageImage()" />
                <small style="display:block; margin-top:5px; color:#6b7280; font-size:13px;">
                    📸 সর্বোচ্চ ফাইল সাইজ: 5MB (JPEG, PNG, JPG, GIF, WEBP)
                </small>
                <div id="chairman-message-new-image-preview" class="image-preview-container"></div>
            </div>

            <div style="display:flex; gap:10px; margin-top:20px;">
                <button class="about-save-btn" onclick="saveChairmanMessage()">
                    💾 সংরক্ষণ করুন
                </button>
                <button class="about-save-btn" onclick="clearChairmanMessageForm()" style="background:#6b7280;">
                    🔄 ফর্ম পরিষ্কার করুন
                </button>
            </div>
            <div id="chairman-message-status" class="about-status" style="display:none;"></div>
        </div>
    </div>

    <!-- Chairman Section - Dynamic -->
    <div id="about-chairman" style="margin-top:1rem;">
        <div class="table-card">
            <h2>আমাদের চেয়ারম্যান</h2>
            <p style="color:#6b7280; margin-bottom:20px;">চেয়ারম্যানের তথ্য ম্যানেজ করুন - একাধিক চেয়ারম্যান যোগ করতে পারেন</p>

            <!-- Custom Title Field -->
            <div class="about-form-group">
                <label>সেকশন শিরোনাম</label>
                <input type="text" id="chairman-section-title" placeholder="যেমন: আমাদের চেয়ারম্যান" />
                <p style="color:#6b7280; font-size:12px; margin-top:4px;">এই শিরোনামটি ফ্রন্টএন্ডে প্রদর্শিত হবে</p>
            </div>
            <button class="about-save-btn" onclick="saveChairmanTitle()" style="background:#0d3d29; margin-bottom:20px;">শিরোনাম সংরক্ষণ করুন</button>
            <div id="chairman-title-status" class="about-status" style="display:none;"></div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:30px; margin-bottom:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <div>
                    <h3 style="margin:0; font-size:18px;">চেয়ারম্যান তালিকা</h3>
                    <p style="color:#6b7280; margin:4px 0 0 0; font-size:14px;">একাধিক চেয়ারম্যান যোগ করতে পারেন</p>
                </div>
                <button class="about-save-btn" onclick="addTeamMember('chairman')" style="background:#0d3d29;">+ নতুন চেয়ারম্যান যোগ করুন</button>
            </div>
            <div id="chairman-members-list"></div>
        </div>
    </div>

    <script>
        (function(){
            const csrfToken = document.getElementById('csrfTokenAbout').value;

            // Load all sections on page load
            async function loadAllSections() {
                const sections = ['hero', 'history', 'mission', 'vision', 'chairman'];

                for (const section of sections) {
                    try {
                        const response = await fetch(`/api/about-sections?section_key=${section}&_t=${Date.now()}`, {
                            cache: 'no-store',
                            headers: {
                                'Cache-Control': 'no-cache',
                                'Pragma': 'no-cache'
                            }
                        });
                        if (response.ok) {
                            const data = await response.json();
                            if (data) {
                                populateSection(section, data);
                            }
                        }
                    } catch (error) {
                        console.error(`Error loading ${section}:`, error);
                    }
                }

                // Load founder and chairman section titles
                await loadSectionTitles();
                
                // Load chairman message
                await loadChairmanMessage();
            }

            // Load section titles for board, chairman, and other
            async function loadSectionTitles() {
                try {
                    // Load board title
                    const boardResponse = await fetch('/api/about-sections?section_key=board_title&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (boardResponse.ok) {
                        const boardData = await boardResponse.json();
                        if (boardData && boardData.title) {
                            const boardTitleInput = document.getElementById('board-section-title');
                            if (boardTitleInput) {
                                boardTitleInput.value = boardData.title;
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error loading board title:', error);
                }

                try {
                    // Load chairman title
                    const chairmanResponse = await fetch('/api/about-sections?section_key=chairman_title&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (chairmanResponse.ok) {
                        const chairmanData = await chairmanResponse.json();
                        if (chairmanData && chairmanData.title) {
                            document.getElementById('chairman-section-title').value = chairmanData.title;
                        }
                    }
                } catch (error) {
                    console.error('Error loading chairman title:', error);
                }

                try {
                    // Load other title
                    const otherResponse = await fetch('/api/about-sections?section_key=other_title&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (otherResponse.ok) {
                        const otherData = await otherResponse.json();
                        if (otherData && otherData.title) {
                            const otherTitleInput = document.getElementById('other-section-title');
                            if (otherTitleInput) {
                                otherTitleInput.value = otherData.title;
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error loading other title:', error);
                }
            }

            function populateSection(section, data) {
                // Populate form fields based on section
                if (section === 'hero') {
                    if (data.title) document.getElementById('hero-title').value = data.title;
                    if (data.subtitle) document.getElementById('hero-subtitle').value = data.subtitle;
                    if (data.content) document.getElementById('hero-subtitle2').value = data.content;
                    if (data.image_url || data.image_path) {
                        const imageUrl = data.image_path || data.image_url;
                        const preview = document.getElementById('hero-image-preview');
                        const previewImg = document.getElementById('hero-image-preview-img');
                        if (preview && previewImg) {
                            previewImg.src = imageUrl;
                            preview.style.display = 'block';
                        }
                    }
                } else if (section === 'history') {
                    if (data.content) document.getElementById('history-content').value = data.content;
                    if (data.content_2) document.getElementById('history-content2').value = data.content_2;
                } else if (section === 'mission') {
                    if (data.title) document.getElementById('mission-title').value = data.title;
                    if (data.content) document.getElementById('mission-content').value = data.content;
                    if (data.image_url || data.image_path) {
                        const imageUrl = data.image_path || data.image_url;
                        showImagePreview('mission', imageUrl);
                    }
                } else if (section === 'vision') {
                    if (data.title) document.getElementById('vision-title').value = data.title;
                    if (data.content) document.getElementById('vision-content').value = data.content;
                } else if (section === 'chairman') {
                    if (data.name) document.getElementById('chairman-name').value = data.name;
                    if (data.position) document.getElementById('chairman-position').value = data.position;
                    if (data.content) document.getElementById('chairman-content').value = data.content;
                    if (data.content_2) document.getElementById('chairman-content2').value = data.content_2;
                    if (data.content_3) document.getElementById('chairman-content3').value = data.content_3;
                    if (data.image_url) showImagePreview('chairman', data.image_url);
                }
            }

            function showImagePreview(section, imageUrl) {
                const previewDiv = document.getElementById(`${section}-image-preview`);
                if (previewDiv) {
                    previewDiv.innerHTML = `<img src="${imageUrl}" alt="Preview" />`;
                }
            }

            window.previewAboutImage = function(section) {
                const input = document.getElementById(`${section}-image`);
                const previewDiv = document.getElementById(`${section}-image-preview`);

                if (input.files && input.files[0]) {
                    const file = input.files[0];

                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showError('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                        input.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
                    };
                    reader.readAsDataURL(file);
                }
            };

            // Count words in chairman message
            window.countChairmanMessageWords = function() {
                const contentInput = document.getElementById('chairman-message-content');
                const wordCountEl = document.getElementById('chairman-word-count-number');
                const wordCountContainer = document.getElementById('chairman-message-word-count');
                
                if (!contentInput || !wordCountEl) return;
                
                const text = contentInput.value.trim();
                // Count words - split by whitespace and filter empty strings
                const words = text.split(/\s+/).filter(word => word.length > 0);
                const wordCount = words.length;
                
                wordCountEl.textContent = wordCount;
                
                // Change color based on word count
                if (wordCount > 100) {
                    wordCountContainer.style.color = '#dc2626';
                    wordCountContainer.style.fontWeight = '600';
                    wordCountContainer.innerHTML = `<span id="chairman-word-count-number">${wordCount}</span> / 100 শব্দ <span style="color:#dc2626;">(সীমা অতিক্রম করেছে!)</span>`;
                } else if (wordCount > 90) {
                    wordCountContainer.style.color = '#f59e0b';
                    wordCountContainer.style.fontWeight = '500';
                    wordCountContainer.innerHTML = `<span id="chairman-word-count-number">${wordCount}</span> / 100 শব্দ <span style="color:#f59e0b;">(প্রায় সীমায় পৌঁছেছে)</span>`;
                } else {
                    wordCountContainer.style.color = '#6b7280';
                    wordCountContainer.style.fontWeight = '400';
                    wordCountContainer.innerHTML = `<span id="chairman-word-count-number">${wordCount}</span> / 100 শব্দ`;
                }
                
                // Prevent typing beyond 100 words
                if (wordCount >= 100) {
                    // Get cursor position
                    const cursorPos = contentInput.selectionStart;
                    const currentText = contentInput.value;
                    
                    // If user is trying to add more, truncate to last 100 words
                    if (words.length > 100) {
                        const truncatedWords = words.slice(0, 100);
                        contentInput.value = truncatedWords.join(' ');
                        // Restore cursor position if possible
                        setTimeout(() => {
                            contentInput.setSelectionRange(Math.min(cursorPos, contentInput.value.length), Math.min(cursorPos, contentInput.value.length));
                        }, 0);
                        countChairmanMessageWords(); // Recalculate
                    }
                }
            };

            // Preview chairman message image
            window.previewChairmanMessageImage = function() {
                const input = document.getElementById('chairman-message-image');
                const newPreviewDiv = document.getElementById('chairman-message-new-image-preview');

                if (input.files && input.files[0]) {
                    const file = input.files[0];

                    if (file.size > 5 * 1024 * 1024) {
                        showError('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                        input.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        newPreviewDiv.innerHTML = `<div style="margin-top:10px;"><small style="color:#166534; font-weight:600;">নতুন ইমেজ প্রিভিউ:</small><br><img src="${e.target.result}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px; margin-top:8px;" /></div>`;
                    };
                    reader.readAsDataURL(file);
                }
            };

            // Load chairman message
            async function loadChairmanMessage() {
                try {
                    const response = await fetch('/api/about-sections?section_key=chairman_message&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (response.ok) {
                        const data = await response.json();
                        if (data) {
                            if (data.name) document.getElementById('chairman-message-name').value = data.name;
                            if (data.position) document.getElementById('chairman-message-position').value = data.position;
                            if (data.content) {
                                document.getElementById('chairman-message-content').value = data.content;
                                // Update word count after loading
                                    countChairmanMessageWords();
                                }
                            if (data.image_url) {
                                const currentImageDiv = document.getElementById('chairman-message-current-image');
                                const previewImg = document.getElementById('chairman-message-image-preview');
                                currentImageDiv.style.display = 'block';
                                previewImg.src = data.image_url.startsWith('http') ? data.image_url : (data.image_url.startsWith('/') ? data.image_url : '/' + data.image_url);
                            }
                            // Show delete button if data exists
                            const deleteBtn = document.getElementById('delete-chairman-message-btn');
                            if (deleteBtn) deleteBtn.style.display = 'inline-block';
                        }
                    }
                } catch (error) {
                    console.error('Error loading chairman message:', error);
                }
            }

            // Save chairman message
            window.saveChairmanMessage = async function() {
                const statusEl = document.getElementById('chairman-message-status');
                const nameInput = document.getElementById('chairman-message-name');
                const positionInput = document.getElementById('chairman-message-position');
                const contentInput = document.getElementById('chairman-message-content');
                const imageInput = document.getElementById('chairman-message-image');

                if (!nameInput.value.trim() || !positionInput.value.trim() || !contentInput.value.trim()) {
                    showError('নাম, পদবি এবং বার্তা প্রয়োজন');
                    return;
                }

                // Validate word count (max 100 words)
                const contentText = contentInput.value.trim();
                const words = contentText.split(/\s+/).filter(word => word.length > 0);
                const wordCount = words.length;

                if (wordCount > 100) {
                    showError(`বার্তা সর্বোচ্চ ১০০ শব্দ হতে হবে। বর্তমানে ${wordCount} শব্দ আছে।`);
                    return;
                }

                statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                statusEl.className = 'about-status';
                statusEl.style.display = 'inline-block';

                const formData = new FormData();
                formData.append('section_key', 'chairman_message');
                formData.append('name', nameInput.value.trim());
                formData.append('position', positionInput.value.trim());
                formData.append('content', contentInput.value.trim());
                
                if (imageInput.files && imageInput.files[0]) {
                    formData.append('image', imageInput.files[0]);
                }

                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        showSuccess('সফলভাবে সংরক্ষণ করা হয়েছে', 'চেয়ারম্যানের বার্তা');
                        statusEl.style.display = 'none';
                        
                        // Reload to show current image
                        await loadChairmanMessage();
                        
                        // Clear new image preview
                        document.getElementById('chairman-message-new-image-preview').innerHTML = '';
                        imageInput.value = '';
                        
                        // Trigger refresh on frontend
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                            window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                        } catch(e) {}
                        
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving chairman message:', error);
                    showError('সংরক্ষণ করতে ব্যর্থ হয়েছে');
                    statusEl.style.display = 'none';
                }
            };

            // Delete chairman message
            window.deleteChairmanMessage = async function() {
                const confirmed = await showAboutConfirm('আপনি কি নিশ্চিত যে আপনি চেয়ারম্যানের বার্তা মুছে ফেলতে চান?', 'চেয়ারম্যানের বার্তা মুছুন');
                if (!confirmed) {
                    return;
                }

                try {
                    const response = await fetch('/api/about-sections?section_key=chairman_message&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (response.ok) {
                        const data = await response.json();
                        if (data && data.id) {
                            const deleteResponse = await fetch(`/admin/about-sections/${data.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });

                            const result = await deleteResponse.json();

                            if (result.success) {
                                clearChairmanMessageForm();
                                showSuccess('সফলভাবে মুছে ফেলা হয়েছে', 'চেয়ারম্যানের বার্তা');
                                
                                // Hide delete button
                                document.getElementById('delete-chairman-message-btn').style.display = 'none';
                                
                                // Trigger refresh on frontend
                                try {
                                    localStorage.setItem('refreshAboutPage', Date.now().toString());
                                    window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                                } catch(e) {}
                                
                            } else {
                                throw new Error(result.message || 'Delete failed');
                            }
                        }
                    }
                } catch (error) {
                    console.error('Error deleting chairman message:', error);
                    showError('মুছে ফেলা ব্যর্থ হয়েছে');
                }
            };

            // Clear chairman message form
            window.clearChairmanMessageForm = function() {
                document.getElementById('chairman-message-name').value = '';
                document.getElementById('chairman-message-position').value = '';
                document.getElementById('chairman-message-content').value = '';
                document.getElementById('chairman-message-image').value = '';
                document.getElementById('chairman-message-current-image').style.display = 'none';
                document.getElementById('chairman-message-new-image-preview').innerHTML = '';
                document.getElementById('chairman-message-status').style.display = 'none';
            };


            window.saveBoardTitle = async function() {
                const titleInput = document.getElementById('board-section-title');

                if (!titleInput.value.trim()) {
                    showError('শিরোনাম প্রয়োজন');
                    return;
                }

                const formData = new FormData();
                formData.append('section_key', 'board_title');
                formData.append('title', titleInput.value.trim());

                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        body: formData
                    });
                    const result = await response.json();
                    if (result.success) {
                        showSuccess('শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে', 'বোর্ড শিরোনাম');
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                            window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                        } catch(e) {}
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving board title:', error);
                    showError('সংরক্ষণ করতে ব্যর্থ হয়েছে');
                }
            };

            window.saveOtherTitle = async function() {
                const titleInput = document.getElementById('other-section-title');

                if (!titleInput.value.trim()) {
                    showError('শিরোনাম প্রয়োজন');
                    return;
                }

                const formData = new FormData();
                formData.append('section_key', 'other_title');
                formData.append('title', titleInput.value.trim());

                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        body: formData
                    });
                    const result = await response.json();
                    if (result.success) {
                        showSuccess('শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে', 'অন্যান্য শিরোনাম');
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving other title:', error);
                    showError('সংরক্ষণ করতে ব্যর্থ হয়েছে');
                }
            };

            // Save chairman section title
            window.saveChairmanTitle = async function() {
                const titleInput = document.getElementById('chairman-section-title');

                if (!titleInput.value.trim()) {
                    showError('শিরোনাম প্রয়োজন');
                    return;
                }

                const formData = new FormData();
                formData.append('section_key', 'chairman_title');
                formData.append('title', titleInput.value.trim());

                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        showSuccess('শিরোনাম সফলভাবে সংরক্ষণ করা হয়েছে', 'চেয়ারম্যান শিরোনাম');
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                        } catch(e) {}
                    } else {
                        throw new Error(result.message || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving chairman title:', error);
                    showError('সংরক্ষণ করতে ব্যর্থ হয়েছে');
                }
            };

            window.saveAboutSection = async function(section) {
                const statusEl = document.getElementById(`${section}-status`);

                // Collect data based on section
                const formData = new FormData();
                formData.append('section_key', section);

                // Helper: validate image file size (max 5MB)
                function checkImageSize(fileInputId) {
                    const file = document.getElementById(fileInputId)?.files[0];
                    if (file) {
                        const maxBytes = 5 * 1024 * 1024; // 5MB
                        if (file.size > maxBytes) {
                            const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                            showError(`ছবির আকার ${sizeMB}MB। সর্বোচ্চ ৫MB অনুমোদিত। ছোট ছবি বেছে নিন।`, 'ছবি বড় হয়ে গেছে');
                            return null;
                        }
                        return file;
                    }
                    return undefined;
                }

                if (section === 'hero') {
                    formData.append('title', document.getElementById('hero-title').value);
                    formData.append('subtitle', document.getElementById('hero-subtitle').value);
                    formData.append('content', document.getElementById('hero-subtitle2').value);
                    const imageFile = checkImageSize('hero-image');
                    if (imageFile === null) return; // blocked — too large
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'history') {
                    formData.append('content', document.getElementById('history-content').value);
                    formData.append('content_2', document.getElementById('history-content2').value);
                } else if (section === 'mission') {
                    formData.append('title', document.getElementById('mission-title').value);
                    formData.append('content', document.getElementById('mission-content').value);
                    const imageFile = checkImageSize('mission-image');
                    if (imageFile === null) return;
                    if (imageFile) formData.append('image', imageFile);
                } else if (section === 'vision') {
                    formData.append('title', document.getElementById('vision-title').value);
                    formData.append('content', document.getElementById('vision-content').value);
                } else if (section === 'chairman') {
                    formData.append('name', document.getElementById('chairman-name').value);
                    formData.append('position', document.getElementById('chairman-position').value);
                    formData.append('content', document.getElementById('chairman-content').value);
                    formData.append('content_2', document.getElementById('chairman-content2').value);
                    formData.append('content_3', document.getElementById('chairman-content3').value);
                    const imageFile = document.getElementById('chairman-image').files[0];
                    if (imageFile) formData.append('image', imageFile);
                }

                // Show loading status
                if (statusEl) {
                    statusEl.textContent = 'সংরক্ষণ করা হচ্ছে...';
                    statusEl.className = 'about-status';
                    statusEl.style.display = 'inline-block';
                    statusEl.style.background = '#f3f4f6';
                    statusEl.style.color = '#666';
                }

                try {
                    const response = await fetch('/admin/about-sections', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        if (statusEl) statusEl.style.display = 'none';
                        showSuccess('সফলভাবে সংরক্ষিত হয়েছে');
                        try {
                            localStorage.setItem('refreshAboutPage', Date.now().toString());
                            window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                        } catch(e) {}
                    } else {
                        // Extract validation errors if present
                        let errMsg = result.message || 'সংরক্ষণ ব্যর্থ হয়েছে';
                        if (result.errors) {
                            errMsg = Object.values(result.errors).flat().join(' | ');
                        }
                        showError(errMsg);
                    }
                } catch (error) {
                    console.error('Error saving:', error);
                    showError('সংরক্ষণ ব্যর্থ হয়েছে: ' + (error.message || 'অজানা ত্রুটি'));
                }
            };

            // Preview hero image
            window.previewHeroImage = function(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('hero-image-preview');
                        const previewImg = document.getElementById('hero-image-preview-img');
                        if (preview && previewImg) {
                            previewImg.src = e.target.result;
                            preview.style.display = 'block';
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            };

            // Load sections on page load
            loadAllSections();

            // Load once on page load only — never auto-reload to preserve user edits
            if (window.registerTabLoader) {
                registerTabLoader('about', loadAllSections);
            } else { loadAllSections(); }

            // ========== Team Members (Chairman/Other) Dynamic Management ==========
            let teamMembers = {
                founder: [],
                chairman: [],
                other: []
            };

            // Load team members (admin sees all, including inactive)
            async function loadTeamMembers() {
                try {
                    const founderResponse = await fetch('/api/team-members?type=founder&admin=1&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (founderResponse.ok) {
                        teamMembers.founder = await founderResponse.json();
                        renderTeamMembers('founder');
                    }
                } catch (error) {
                    console.error('Error loading board members:', error);
                }

                try {
                    const chairmanResponse = await fetch('/api/team-members?type=chairman&admin=1&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (chairmanResponse.ok) {
                        teamMembers.chairman = await chairmanResponse.json();
                        renderTeamMembers('chairman');
                    }
                } catch (error) {
                    console.error('Error loading chairmen:', error);
                }

                try {
                    const otherResponse = await fetch('/api/team-members?type=other&admin=1&_t=' + Date.now(), {
                        cache: 'no-store',
                        headers: {
                            'Cache-Control': 'no-cache',
                            'Pragma': 'no-cache'
                        }
                    });
                    if (otherResponse.ok) {
                        teamMembers.other = await otherResponse.json();
                        renderTeamMembers('other');
                    }
                } catch (error) {
                    console.error('Error loading other members:', error);
                }
            }

            // Render team members
            function renderTeamMembers(type) {
                const container = document.getElementById(`${type}-members-list`);
                if (!container) return;

                container.innerHTML = '';

                if (teamMembers[type].length === 0) {
                    const typeLabels = {
                        'founder': 'বোর্ড মেম্বার',
                        'chairman': 'চেয়ারম্যান',
                        'other': 'অন্যান্য সদস্য'
                    };
                    container.innerHTML = '<p style="color:#9ca3af; text-align:center; padding:40px;">কোনো ' + (typeLabels[type] || 'সদস্য') + ' নেই। নতুন যোগ করুন।</p>';
                    return;
                }

                teamMembers[type].forEach((member, index) => {
                    const card = createTeamMemberCard(member, type, index);
                    container.appendChild(card);
                });
            }

            // Create team member card
            function createTeamMemberCard(member, type, index) {
                const card = document.createElement('div');
                card.className = 'table-card';
                card.style.marginTop = index > 0 ? '1rem' : '0';
                card.setAttribute('data-member-id', member.id || '');

                const typeLabels = {
                    'founder': 'বোর্ড মেম্বার',
                    'chairman': 'চেয়ারম্যান',
                    'other': 'অন্যান্য সদস্য'
                };
                const typeLabel = typeLabels[type] || 'সদস্য';

                // Simplified form for 'other' type (only name, designation, image)
                if (type === 'other') {
                    card.innerHTML = `
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                            <h3 style="margin:0;">${typeLabel} #${index + 1}</h3>
                            <div style="display:flex; gap:10px;">
                                <button class="about-save-btn" onclick="toggleEditMode(this, '${type}', ${member.id || 'null'})" style="background:#3b82f6;">
                                    ✏️ সম্পাদনা করুন
                                </button>
                            ${member.id ? `<button class="about-save-btn" onclick="deleteTeamMember(${member.id}, '${type}')" style="background:#dc2626;">🗑️ মুছুন</button>` : ''}
                            </div>
                        </div>

                        <!-- View Mode -->
                        <div class="member-view-mode" style="display:${member.id ? 'block' : 'none'}; padding:16px; background:#f9fafb; border-radius:8px; margin-bottom:12px;">
                            <p style="margin:8px 0;"><strong>নাম:</strong> ${member.name || 'N/A'}</p>
                            <p style="margin:8px 0;"><strong>পদবি:</strong> ${member.position || 'N/A'}</p>
                            <p style="margin:8px 0;"><strong>ক্রম:</strong> ${member.order || 0}</p>
                            <p style="margin:8px 0;"><strong>স্ট্যাটাস:</strong> ${member.is_active !== false ? '<span style="color:#10b981;">সক্রিয়</span>' : '<span style="color:#ef4444;">নিষ্ক্রিয়</span>'}</p>
                            ${member.image_url ? `
                                <div style="margin-top:12px;">
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                        </div>

                        <!-- Edit Mode -->
                        <div class="member-form-container" style="display:${member.id ? 'none' : 'block'};">
                        <div class="about-form-group">
                            <label>নাম</label>
                            <input type="text" class="team-member-name" value="${member.name || ''}" placeholder="যেমন: মোহাম্মদ রহিম" />
                        </div>
                        <div class="about-form-group">
                            <label>পদবি</label>
                            <input type="text" class="team-member-position" value="${member.position || ''}" placeholder="সিনিয়র ম্যানেজার" />
                        </div>
                        <div class="about-form-group">
                            <label>ক্রম (Order)</label>
                            <input type="number" class="team-member-order" value="${member.order || 0}" placeholder="0" />
                        </div>
                        <div class="about-form-group" style="display:flex; align-items:center; gap:10px;">
                            <input type="checkbox" class="team-member-is-active" id="teamMemberIsActive-${member.id || 'new'}-${type}" ${member.is_active !== false ? 'checked' : ''} style="width:auto; margin:0;" />
                            <label for="teamMemberIsActive-${member.id || 'new'}-${type}" style="margin:0; font-size:14px; font-weight:500;">সক্রিয়</label>
                        </div>
                        <div class="about-form-group">
                            <label>ছবি আপলোড করুন</label>
                            ${member.image_url ? `
                                <div style="margin-bottom:10px; padding:12px; background:#f0fdf4; border:2px solid #86efac; border-radius:8px;">
                                    <small style="color:#166534; font-weight:600; display:block; margin-bottom:8px;">✓ বর্তমান ইমেজ</small>
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                            <input type="file" class="team-member-image" accept="image/*" onchange="previewTeamMemberImage(this)" />
                            <small style="display:block; margin-top:5px; color:#6b7280; font-size:13px;">
                                <i class="fas fa-camera"></i> ${member.image_url ? 'নতুন ইমেজ আপলোড করুন (ঐচ্ছিক)' : 'সর্বোচ্চ ফাইল সাইজ: 5MB'}
                            </small>
                            <div class="team-member-image-preview-container"></div>
                        </div>

                        <div style="display:flex; gap:10px; margin-top:16px;">
                        <button class="about-save-btn" onclick="saveTeamMember(this, '${type}')">
                            ${member.id ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন'}
                        </button>
                            ${member.id ? `<button class="about-save-btn" onclick="toggleEditMode(this, '${type}', ${member.id})" style="background:#6b7280;">❌ বাতিল করুন</button>` : ''}
                        </div>
                        </div>
                    `;
                } else {
                    // Full form for 'founder' and 'chairman' types
                    card.innerHTML = `
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                            <h3 style="margin:0;">${typeLabel} #${index + 1}</h3>
                            <div style="display:flex; gap:10px;">
                            ${member.id ? `<button class="about-save-btn" onclick="toggleEditMode(this, '${type}', ${member.id})" style="background:#3b82f6;">
                                    ✏️ সম্পাদনা করুন
                                </button>` : ''}
                            ${member.id ? `<button class="about-save-btn" onclick="deleteTeamMember(${member.id}, '${type}')" style="background:#dc2626;">🗑️ মুছুন</button>` : ''}
                            </div>
                        </div>

                        <!-- View Mode (only for existing members) -->
                        <div class="member-view-mode" style="display:${member.id ? 'block' : 'none'}; padding:16px; background:#f9fafb; border-radius:8px; margin-bottom:12px;">
                            <p style="margin:8px 0;"><strong>নাম:</strong> ${member.name || 'N/A'}</p>
                            <p style="margin:8px 0;"><strong>পদবি:</strong> ${member.position || 'N/A'}</p>
                            <p style="margin:8px 0;"><strong>বিবরণ:</strong> ${member.content || 'N/A'}</p>
                            <p style="margin:8px 0;"><strong>ক্রম:</strong> ${member.order || 0}</p>
                            <p style="margin:8px 0;"><strong>স্ট্যাটাস:</strong> ${member.is_active !== false ? '<span style="color:#10b981;">সক্রিয়</span>' : '<span style="color:#ef4444;">নিষ্ক্রিয়</span>'}</p>
                            ${member.image_url ? `
                                <div style="margin-top:12px;">
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                        </div>

                        <!-- Edit/Add Form -->
                        <div class="member-form-container" style="display:${member.id ? 'none' : 'block'};">
                        <div class="about-form-group">
                            <label>নাম</label>
                            <input type="text" class="team-member-name" value="${member.name || ''}" placeholder="যেমন: মারুফ সাত্তার আলী" />
                        </div>
                        <div class="about-form-group">
                            <label>পদবি</label>
                            <input type="text" class="team-member-position" value="${member.position || ''}" placeholder="চেয়ারম্যান, জলছায়া" />
                        </div>
                        <div class="about-form-group">
                            <label>বিবরণ</label>
                            <textarea class="team-member-content" placeholder="জনাব মারুফ সাত্তার আলী একজন উদ্ভাবক...">${member.content || ''}</textarea>
                        </div>
                        <div class="about-form-group">
                            <label>ক্রম (Order)</label>
                            <input type="number" class="team-member-order" value="${member.order || 0}" placeholder="0" />
                        </div>
                        <div class="about-form-group" style="display:flex; align-items:center; gap:10px;">
                            <input type="checkbox" class="team-member-is-active" id="teamMemberIsActive-${member.id || 'new'}-${type}" ${member.is_active !== false ? 'checked' : ''} style="width:auto; margin:0;" />
                            <label for="teamMemberIsActive-${member.id || 'new'}-${type}" style="margin:0; font-size:14px; font-weight:500;">সক্রিয়</label>
                        </div>
                        <div class="about-form-group">
                            <label>ছবি আপলোড করুন</label>
                            ${member.image_url ? `
                                <div style="margin-bottom:10px; padding:12px; background:#f0fdf4; border:2px solid #86efac; border-radius:8px;">
                                    <small style="color:#166534; font-weight:600; display:block; margin-bottom:8px;">✓ বর্তমান ইমেজ</small>
                                    <img src="${member.image_url}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px;" onerror="this.style.display='none';" />
                                </div>
                            ` : ''}
                            <input type="file" class="team-member-image" accept="image/*" onchange="previewTeamMemberImage(this)" />
                            <small style="display:block; margin-top:5px; color:#6b7280; font-size:13px;">
                                📸 ${member.image_url ? 'নতুন ইমেজ আপলোড করুন (ঐচ্ছিক)' : 'সর্বোচ্চ ফাইল সাইজ: 5MB'}
                            </small>
                            <div class="team-member-image-preview"></div>
                        </div>

                        <div style="display:flex; gap:10px; margin-top:16px;">
                        <button class="about-save-btn" onclick="saveTeamMember(this, '${type}')">
                            ${member.id ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন'}
                        </button>
                        ${member.id ? `<button class="about-save-btn" onclick="toggleEditMode(this, '${type}', ${member.id})" style="background:#6b7280;">❌ বাতিল করুন</button>` : ''}
                        </div>
                        </div>
                    `;
                }

                return card;
            }

            // Toggle edit mode for team member card
            window.toggleEditMode = function(button, type, memberId) {
                const card = button.closest('.table-card');
                if (!card) return;

                const formContainer = card.querySelector('.member-form-container');
                const viewMode = card.querySelector('.member-view-mode');
                
                if (formContainer) {
                    const isEditMode = formContainer.style.display !== 'none';
                    
                    if (isEditMode) {
                        // Switch to view mode - hide form, show view
                        formContainer.style.display = 'none';
                        if (viewMode) viewMode.style.display = 'block';
                        button.textContent = '✏️ সম্পাদনা করুন';
                        button.style.background = '#3b82f6';
                    } else {
                        // Switch to edit mode - show form, hide view
                        formContainer.style.display = 'block';
                        if (viewMode) viewMode.style.display = 'none';
                        button.textContent = '👁️ দেখুন';
                        button.style.background = '#6b7280';
                    }
                }
            };

            // Add new team member
            window.addTeamMember = function(type) {
                const newMember = {
                    type: type,
                    name: '',
                    position: '',
                    content: '',
                    order: teamMembers[type].length
                };
                teamMembers[type].push(newMember);
                renderTeamMembers(type);
            };

            // Preview team member image
            window.previewTeamMemberImage = function(input) {
                const card = input.closest('.table-card');
                // Try both preview container classes (for 'other' and other types)
                let previewContainer = card.querySelector('.team-member-image-preview') || 
                                      card.querySelector('.team-member-image-preview-container');

                if (!previewContainer) {
                    console.error('Preview container not found');
                    return;
                }

                if (input.files && input.files[0]) {
                    const file = input.files[0];

                    if (file.size > 5 * 1024 * 1024) {
                        showError('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                        input.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = `<img src="${e.target.result}" style="width:100%; max-height:200px; object-fit:cover; border-radius:8px; margin-top:10px;" />`;
                    };
                    reader.readAsDataURL(file);
                }
            };

            // Save team member
            window.saveTeamMember = async function(button, type) {
                const card = button.closest('.table-card');
                if (!card) {
                    showError('কার্ড খুঁজে পাওয়া যায়নি');
                    return;
                }
                
                const memberId = card.getAttribute('data-member-id');
                const nameInput = card.querySelector('.team-member-name');
                const positionInput = card.querySelector('.team-member-position');

                // Validate required fields
                if (!nameInput || !nameInput.value.trim()) {
                    showError('নাম প্রয়োজন');
                    return;
                }

                const formData = new FormData();
                formData.append('type', type);
                formData.append('name', nameInput.value.trim());
                formData.append('position', positionInput ? positionInput.value.trim() : '');
                
                // Add order and is_active
                const orderInput = card.querySelector('.team-member-order');
                if (orderInput) {
                    formData.append('order', orderInput.value || '0');
                } else {
                    formData.append('order', '0');
                }
                
                const isActiveInput = card.querySelector('.team-member-is-active');
                if (isActiveInput) {
                    formData.append('is_active', isActiveInput.checked ? '1' : '0');
                } else {
                    formData.append('is_active', '1');
                }

                // Only add content field for chairman type (single paragraph)
                if (type !== 'other') {
                    const contentInput = card.querySelector('.team-member-content');
                    formData.append('content', contentInput ? (contentInput.value || '') : '');
                    formData.append('content_2', ''); // Clear second paragraph
                    formData.append('content_3', ''); // Clear third paragraph
                } else {
                    // For 'other' type, explicitly set content fields to empty
                    formData.append('content', '');
                    formData.append('content_2', '');
                    formData.append('content_3', '');
                }

                const imageInput = card.querySelector('.team-member-image');
                if (imageInput && imageInput.files && imageInput.files[0]) {
                    formData.append('image', imageInput.files[0]);
                }

                button.disabled = true;
                button.textContent = 'সংরক্ষণ করা হচ্ছে...';

                try {
                    const url = memberId ? `/admin/team-members/${memberId}` : '/admin/team-members';
                    
                    // For PUT requests, add _method parameter (Laravel method spoofing)
                    if (memberId) {
                        formData.append('_method', 'PUT');
                    }

                    const response = await fetch(url, {
                        method: 'POST', // Always use POST, Laravel will handle PUT via _method
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    // Check if response is ok
                    if (!response.ok) {
                        let errorMessage = 'Network error';
                        try {
                            const errorData = await response.json();
                            if (errorData.errors) {
                                // Handle validation errors
                                const errorMessages = Object.values(errorData.errors).flat().join(', ');
                                errorMessage = errorMessages;
                            } else if (errorData.message) {
                                errorMessage = errorData.message;
                            }
                        } catch (e) {
                            errorMessage = `HTTP ${response.status}: ${response.statusText}`;
                        }
                        throw new Error(errorMessage);
                    }

                    const result = await response.json();

                    if (result.success) {
                        button.textContent = '✓ সংরক্ষিত হয়েছে';
                        button.style.background = '#10b981';
                        
                        // Show success notification
                        if (typeof showSuccess === 'function') {
                            showSuccess(memberId ? 'সদস্য সফলভাবে আপডেট করা হয়েছে।' : 'নতুন সদস্য সফলভাবে যোগ করা হয়েছে।');
                        }
                        
                        // Reload team members to refresh the list
                        await loadTeamMembers();
                        
                        // Switch back to view mode if editing existing member
                        if (memberId) {
                            const editButton = card.querySelector('button[onclick*="toggleEditMode"]');
                            if (editButton) {
                                toggleEditMode(editButton, type, memberId);
                            }
                        }
                        
                        setTimeout(() => {
                            button.textContent = memberId ? '💾 আপডেট করুন' : '💾 সংরক্ষণ করুন';
                            button.style.background = '#0d3d29';
                            button.disabled = false;
                        }, 2000);
                        
                        // Trigger frontend refresh
                        try {
                        localStorage.setItem('refreshAboutPage', Date.now().toString());
                        window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                        } catch(e) {}
                    } else {
                        throw new Error(result.message || JSON.stringify(result.errors) || 'Save failed');
                    }
                } catch (error) {
                    console.error('Error saving team member:', error);
                    const errorMsg = error.message || 'Unknown error';
                    button.textContent = '✗ ব্যর্থ হয়েছে';
                    button.style.background = '#dc2626';
                    button.disabled = false;
                    
                    // Show error alert with details
                    showError('সংরক্ষণ ব্যর্থ হয়েছে: ' + errorMsg);
                }
            };

            // Delete team member
            window.deleteTeamMember = async function(id, type) {
                const typeLabels = {
                    'founder': 'বোর্ড মেম্বার',
                    'chairman': 'চেয়ারম্যান',
                    'other': 'অন্যান্য সদস্য'
                };
                const confirmed = await showAboutConfirm('আপনি কি নিশ্চিত যে আপনি এই ' + (typeLabels[type] || 'সদস্য') + ' মুছে ফেলতে চান?', 'সদস্য মুছুন');
                if (!confirmed) {
                    return;
                }

                try {
                    const response = await fetch(`/admin/team-members/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    const result = await response.json();

                    if (result.success) {
                        loadTeamMembers();
                        // Trigger frontend refresh
                        localStorage.setItem('refreshAboutPage', Date.now().toString());
                        window.dispatchEvent(new CustomEvent('aboutPageUpdated'));
                    } else {
                        throw new Error(result.message || 'Delete failed');
                    }
                } catch (error) {
                    console.error('Error deleting team member:', error);
                    showError('মুছে ফেলা ব্যর্থ হয়েছে');
                }
            };

            // Load team members on page load
            loadTeamMembers();
        })();

        // Custom Confirmation Modal Function
        function showAboutConfirm(message, title = 'নিশ্চিত করুন') {
            return new Promise((resolve) => {
                const modal = document.getElementById('aboutConfirmModal');
                const titleEl = document.getElementById('aboutConfirmModalTitle');
                const messageEl = document.getElementById('aboutConfirmModalMessage');
                const confirmBtn = document.getElementById('aboutConfirmModalConfirm');
                const cancelBtn = document.getElementById('aboutConfirmModalCancel');
                
                titleEl.textContent = title;
                messageEl.textContent = message;
                modal.classList.add('active');
                
                const handleConfirm = () => {
                    modal.classList.remove('active');
                    confirmBtn.removeEventListener('click', handleConfirm);
                    cancelBtn.removeEventListener('click', handleCancel);
                    modal.removeEventListener('click', handleBackdrop);
                    resolve(true);
                };
                
                const handleCancel = () => {
                    modal.classList.remove('active');
                    confirmBtn.removeEventListener('click', handleConfirm);
                    cancelBtn.removeEventListener('click', handleCancel);
                    modal.removeEventListener('click', handleBackdrop);
                    resolve(false);
                };
                
                const handleBackdrop = (e) => {
                    if (e.target === modal) {
                        handleCancel();
                    }
                };
                
                confirmBtn.addEventListener('click', handleConfirm);
                cancelBtn.addEventListener('click', handleCancel);
                modal.addEventListener('click', handleBackdrop);
            });
        }
    </script>

    <!-- Professional Confirmation Modal -->
    <div id="aboutConfirmModal" class="about-confirm-modal">
        <div class="about-confirm-modal-content">
            <div class="about-confirm-modal-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
            </div>
            <h3 id="aboutConfirmModalTitle">নিশ্চিত করুন</h3>
            <p id="aboutConfirmModalMessage">আপনি কি নিশ্চিত?</p>
            <div class="about-confirm-modal-actions">
                <button class="about-confirm-btn about-confirm-btn-cancel" id="aboutConfirmModalCancel">বাতিল করুন</button>
                <button class="about-confirm-btn about-confirm-btn-confirm" id="aboutConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
            </div>
        </div>
    </div>

    <style>
        /* Professional Confirmation Modal Styles */
        .about-confirm-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .about-confirm-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-confirm-modal-content {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 420px;
            width: 90%;
            animation: slideUp 0.4s ease;
        }

        .about-confirm-modal-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem;
            background: #fee2e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc2626;
        }

        .about-confirm-modal-icon svg {
            width: 40px;
            height: 40px;
        }

        #aboutConfirmModalTitle {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #1f2937;
        }

        #aboutConfirmModalMessage {
            font-size: 1rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .about-confirm-modal-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
        }

        .about-confirm-btn {
            padding: 0.75rem 1.75rem;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .about-confirm-btn-cancel {
            background: #f3f4f6;
            color: #374151;
        }

        .about-confirm-btn-cancel:hover {
            background: #e5e7eb;
        }

        .about-confirm-btn-confirm {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
        }

        .about-confirm-btn-confirm:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</div>
