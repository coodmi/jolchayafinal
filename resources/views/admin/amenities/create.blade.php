<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>নতুন হাইলাইট যুক্ত করুন</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
        }

        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            background-color: white;
        }

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
            background-color: rgba(79, 70, 229, 0.02);
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
            background: rgba(255, 255, 255, 0.9);
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

        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3);
            transition: all 0.2s;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
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
    </style>
</head>
<body>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">নতুন হাইলাইট যুক্ত করুন</h1>
                        <p class="text-muted mb-0 small">আপনার প্রকল্পের জন্য নতুন বৈশিষ্ট্য যোগ করুন</p>
                    </div>
                    <a href="{{ route('admin.amenities.index') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> তালিকায় ফিরে যান
                    </a>
                </div>

                <!-- Form Card -->
                <div class="form-card p-4 p-md-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.amenities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label class="form-label">হাইলাইটের শিরোনাম <span class="text-danger">*</span></label>
                            <input type="text" name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="উদাহরণ: ছাদ বাগান" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="form-label">সংক্ষিপ্ত বিবরণ <span class="text-danger">*</span></label>
                            <textarea name="short_description"
                                      class="form-control @error('short_description') is-invalid @enderror"
                                      rows="4"
                                      placeholder="হাইলাইটের সংক্ষিপ্ত বিবরণ লিখুন...">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-5">
                            <label class="form-label">ছবি আপলোড করুন</label>

                            <input type="file" name="image" id="fileInput" class="d-none" accept="image/*"
                                   onchange="handleFileSelect(event)">

                            <div class="upload-zone" id="dropZone" onclick="document.getElementById('fileInput').click()">

                                <div id="emptyState">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <h6 class="fw-bold mb-1">ছবি আপলোড করতে ক্লিক করুন</h6>
                                    <p class="text-muted small mb-0">SVG, PNG, JPG বা GIF (সর্বোচ্চ 2MB)</p>
                                </div>

                                <div id="previewContainer" class="preview-container">
                                    <img id="previewImage" class="preview-image" src="" alt="Preview">
                                    <button type="button" class="remove-image-btn" onclick="removeImage(event)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                                @error('image')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-end gap-3 border-top pt-4">
                            <a href="{{ route('admin.amenities.index') }}" class="btn btn-light px-4 rounded-3 fw-bold text-muted">বাতিল</a>
                            <button type="submit" class="btn btn-primary-custom text-white">
                                <i class="fas fa-save me-2"></i> হাইলাইট সংরক্ষণ করুন
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewContainer = document.getElementById('previewContainer');
                const previewImage = document.getElementById('previewImage');
                const emptyState = document.getElementById('emptyState');

                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
                emptyState.style.opacity = '0';
            }
            reader.readAsDataURL(file);
        }
    }

    function removeImage(event) {
        event.stopPropagation();
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const emptyState = document.getElementById('emptyState');

        fileInput.value = '';
        previewContainer.style.display = 'none';
        emptyState.style.opacity = '1';
    }
</script>

</body>
</html>
