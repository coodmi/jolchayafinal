<!-- Admin Video Upload Form -->
<section id="admin-video-upload" class="py-5">
    <div class="container">

        <h2 class="text-center mb-4">ভিডিও আপলোড করুন</h2>

        @if(session('success'))
            <div class="about-status success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card" style="margin-top:1rem;">
            <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="about-form-group">
                    <label for="title">ভিডিও শিরোনাম</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="ভিডিও শিরোনাম লিখুন" required />
                    @error('title')
                        <span class="about-status error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label for="description">বর্ণনা (ঐচ্ছিক)</label>
                    <textarea name="description" id="description" placeholder="বর্ণনা লিখুন">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="about-status error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label for="poster">ভিডিও পোস্টার</label>
                    <input type="file" name="poster" id="poster" accept="image/*" onchange="previewVideoPoster()" required />
                    <div id="poster-preview" class="image-preview-container"></div>
                    <div style="margin-top:12px; font-weight:600; color:#0d3d29;">জলজ্যোৎস্না প্রকল্প পরিচিতি</div>
                    @error('poster')
                        <span class="about-status error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="about-form-group">
                    <label for="url">ভিডিও URL (YouTube, Vimeo, বা MP4)</label>
                    <input type="url" name="url" id="url" value="{{ old('url') }}" placeholder="ভিডিও URL লিখুন" required />
                    @error('url')
                        <span class="about-status error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="about-save-btn">💾 আপলোড করুন</button>
            </form>
        </div>
    </div>
</section>

<script>
    function previewVideoPoster() {
        const input = document.getElementById('poster');
        const previewDiv = document.getElementById('poster-preview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                alert('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                input.value = '';
                previewDiv.innerHTML = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.innerHTML = `<img src="${e.target.result}" alt="Poster Preview" />`;
            };
            reader.readAsDataURL(file);
        }
    }
</script>

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
    .about-form-group textarea,
    .about-form-group input[type="url"],
    .about-form-group input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        transition: border-color 0.2s;
    }
    .about-form-group input[type="text"]:focus,
    .about-form-group textarea:focus,
    .about-form-group input[type="url"]:focus {
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
