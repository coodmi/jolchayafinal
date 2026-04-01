@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>নতুন গ্যালারি আইটেম যোগ করুন</h2>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> ফিরে যান
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title_bn" class="form-label">বাংলা শিরোনাম *</label>
                                <input type="text" class="form-control" id="title_bn" name="title_bn" value="{{ old('title_bn') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">English Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">ক্যাটাগরি *</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="exterior" {{ old('category') == 'exterior' ? 'selected' : '' }}>এক্সটেরিয়র</option>
                                    <option value="interior" {{ old('category') == 'interior' ? 'selected' : '' }}>ইন্টেরিয়র</option>
                                    <option value="landscape" {{ old('category') == 'landscape' ? 'selected' : '' }}>ল্যান্ডস্কেপ</option>
                                    <option value="amenities" {{ old('category') == 'amenities' ? 'selected' : '' }}>সুবিধাসমূহ</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="order" class="form-label">ক্রম (Order)</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">ছবি URL *</label>
                            <input type="url" class="form-control" id="image" name="image" value="{{ old('image') }}" required placeholder="https://images.unsplash.com/...">
                            <small class="text-muted">Unsplash বা অন্য কোনো ছবির URL লিখুন</small>
                        </div>

                        <div class="mb-3" id="imagePreview" style="display: none;">
                            <label class="form-label">ছবি প্রিভিউ</label>
                            <div>
                                <img id="previewImg" src="" alt="Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> সংরক্ষণ করুন
                            </button>
                            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">বাতিল করুন</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('input', function(e) {
        const url = e.target.value.trim();
        const preview = document.getElementById('imagePreview');
        const img = document.getElementById('previewImg');
        
        if (url && url.startsWith('http')) {
            img.src = url;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection
