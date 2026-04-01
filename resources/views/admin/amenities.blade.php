 @if(session('success'))
                <div class="about-status success" style="display:inline-block; margin-top:10px;">
                    {{ session('success') }}
                </div>
 @endif

<div id="amenities" class="tab-content">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>নতুন সুবিধা যোগ করুন</h3>
                    <div class="subtitle">
                        এই ফর্ম থেকে আপনি নতুন সুবিধা যোগ করতে পারবেন
                    </div>
                </div>
                <div class="stat-icon green"><i class="fas fa-plus-circle"></i></div>
            </div>
        </div>
    </div>

    <div class="table-card" style="margin-top:1rem;">
        <form action="{{ route('admin.amenities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="about-form-group">
                <label for="title">শিরোনাম</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="যেমন: সুইমিং পুল" required />
            </div>

            <div class="about-form-group">
                <label for="short_description">সংক্ষিপ্ত বিবরণ</label>
                <textarea name="short_description" id="short_description" placeholder="সংক্ষিপ্ত বিবরণ লিখুন">{{ old('short_description') }}</textarea>
            </div>

            <div class="about-form-group">
                <label for="image">ছবি আপলোড করুন</label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewAmenityImage()" />
                <div id="image-preview" class="image-preview-container"></div>
            </div>

            <button type="submit" class="about-save-btn">💾 সংরক্ষণ করুন</button>


        </form>
    </div>
</div>

<script>
    function previewAmenityImage() {
        const input = document.getElementById('image');
        const previewDiv = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.size > 5 * 1024 * 1024) { // 5MB
                alert('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
                input.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                previewDiv.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;
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
    .about-form-group input[type="file"] {
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

