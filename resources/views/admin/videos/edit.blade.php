@php
    use Illuminate\Support\Str;
@endphp

<!-- Bootstrap & FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
:root {
    --primary-color: #0d3d29;
    --primary-hover: #0d6639;
    --bg-color: #f3f4f6;
    --text-main: #1e293b;
    --text-muted: #6b7280;
    --border-color: #d1d5db;
}

body {
    background-color: var(--bg-color);
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    color: var(--text-main);
}

.form-card {
    background: white;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
    border: 1px solid rgba(0,0,0,0.05);
    overflow: hidden;
}

.form-label {
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    display: block;
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.2s;
    background-color: #f8fafc;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(10,77,46,0.1);
    background-color: white;
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
    font-family: inherit;
}

.btn-primary-custom {
    background-color: var(--primary-color);
    border: none;
    padding: 0.8rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    color: white;
    box-shadow: 0 4px 6px -1px rgba(10,77,46,0.3);
    transition: all 0.2s;
}

.btn-primary-custom:hover {
    background-color: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(10,77,46,0.4);
}

.btn-back {
    color: var(--text-muted);
    font-weight: 600;
    padding: 0.6rem 1.2rem;
    border-radius: 10px;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-back:hover {
    background-color: white;
    color: var(--text-main);
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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

/* Upload Zone */
.upload-zone {
    border: 2px dashed var(--border-color);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    background-color: #f8fafc;
    position: relative;
    min-height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.upload-zone:hover, .upload-zone.dragover {
    border-color: var(--primary-color);
    background-color: rgba(10,77,46,0.05);
}
.upload-icon {
    font-size: 2.5rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
    transition: color 0.3s;
}
.upload-zone:hover .upload-icon {
    color: var(--primary-color);
}
.preview-container {
    display: none;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    border-radius: 14px;
    overflow: hidden;
}
.preview-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.remove-image-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255,255,255,0.9);
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #ef4444;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}
.remove-image-btn:hover {
    transform: scale(1.1);
}
</style>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">ভিডিও সম্পাদনা করুন</h1>
                        <p class="text-muted mb-0 small">আপনার ভিডিও তথ্য সম্পাদনা করুন</p>
                    </div>
                    <a href="{{ route('admin.videos.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> তালিকায় ফিরে যান
                    </a>
                </div>

                <!-- Form Card -->
                <div class="form-card p-4 p-md-5">
                    @if(session('success'))
                        <div class="about-status success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label class="form-label">ভিডিও শিরোনাম <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $video->title) }}" placeholder="ভিডিও শিরোনাম লিখুন" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="form-label">বর্ণনা (ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4" placeholder="বর্ণনা লিখুন">{{ old('description', $video->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Existing Poster -->
                        <div class="mb-4">
                            <label class="form-label">বর্তমান পোস্টার</label>
                            <div>
                                @if($video->poster)
                                    <img src="{{ asset('storage/' . $video->poster) }}" alt="Current Poster" class="rounded-3 border" style="max-width: 300px;">
                                @else
                                    <p class="text-muted">কোন পোস্টার নেই</p>
                                @endif
                            </div>
                        </div>

                        <!-- Upload New Poster -->
                        <div class="mb-5">
                            <label class="form-label">নতুন পোস্টার আপলোড করুন (ঐচ্ছিক)</label>

                            <input type="file" name="poster" id="posterInput" accept="image/*" class="d-none" onchange="previewPoster(event)">

                            <div class="upload-zone" onclick="document.getElementById('posterInput').click()">
                                <div id="emptyState">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <h6 class="fw-bold mb-1">ছবি আপলোড করতে ক্লিক করুন</h6>
                                    <p class="text-muted small mb-0">PNG, JPG, GIF (সর্বোচ্চ 5MB)</p>
                                </div>
                                <div id="posterPreviewContainer" class="preview-container">
                                    <img id="posterPreview" class="preview-image" src="" alt="Preview">
                                    <button type="button" class="remove-image-btn" onclick="removePoster(event)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            @error('poster') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                        </div>

                        <!-- URL -->
                        <div class="mb-4">
                            <label class="form-label">ভিডিও URL <span class="text-danger">*</span></label>
                            <input type="url" name="url" class="form-control @error('url') is-invalid @enderror"
                                value="{{ old('url', $video->url) }}" placeholder="ভিডিও URL লিখুন" required>
                            @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 border-top pt-4">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-light px-4 rounded-3 fw-bold text-muted">বাতিল</a>
                            <button type="submit" class="btn-primary-custom">
                                <i class="fas fa-save me-2"></i> আপডেট করুন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function previewPoster(event){
    const file = event.target.files[0];
    const preview = document.getElementById('posterPreview');
    const container = document.getElementById('posterPreviewContainer');
    const empty = document.getElementById('emptyState');
    if(file){
        if(file.size > 5*1024*1024){
            alert('ফাইলের আকার ৫ এমবি এর কম হতে হবে।');
            event.target.value = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            container.style.display = 'block';
            empty.style.opacity = 0;
        }
        reader.readAsDataURL(file);
    }
}

function removePoster(event){
    event.stopPropagation();
    document.getElementById('posterInput').value = '';
    document.getElementById('posterPreviewContainer').style.display = 'none';
    document.getElementById('emptyState').style.opacity = 1;
}
</script>
