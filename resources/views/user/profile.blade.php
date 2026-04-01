@extends('layouts')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="mb-0"><i class="fas fa-user me-2"></i>আমার প্রোফাইল</h4>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center mb-4">
                                <div class="position-relative">
                                    @if(auth()->user()->photo)
                                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" 
                                             alt="Profile Photo" 
                                             class="rounded-circle" 
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 80px; height: 80px; font-size: 2rem;">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle" 
                                            data-bs-toggle="modal" data-bs-target="#uploadPhotoModal" 
                                            style="width: 30px; height: 30px; padding: 0;">
                                        <i class="fas fa-camera" style="font-size: 12px;"></i>
                                    </button>
                                </div>
                                <div class="ms-3">
                                    <h3 class="mb-0">{{ auth()->user()->name }}</h3>
                                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>ব্যক্তিগত তথ্য</h5>
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="fas fa-edit me-1"></i>সম্পাদনা
                        </button>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">নাম</label>
                            <p class="fw-bold">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">ইমেইল</label>
                            <p class="fw-bold">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">মোবাইল নম্বর</label>
                            <p class="fw-bold">{{ auth()->user()->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">সদস্য হওয়ার তারিখ</label>
                            <p class="fw-bold">{{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            <i class="fas fa-key me-2"></i>পাসওয়ার্ড পরিবর্তন করুন
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upload Photo Modal -->
<div class="modal fade" id="uploadPhotoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-camera me-2"></i>ফটো আপলোড করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('user.photo.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        @if(auth()->user()->photo)
                            <img id="photoPreview" src="{{ asset('storage/' . auth()->user()->photo) }}" 
                                 alt="Current Photo" class="rounded-circle mb-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div id="photoPreview" class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 150px; height: 150px; font-size: 4rem;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">নতুন ফটো নির্বাচন করুন</label>
                        <input type="file" class="form-control" id="photo" name="photo" 
                               accept="image/*" required onchange="previewPhoto(this)">
                        <small class="text-muted">JPG, PNG বা GIF (সর্বোচ্চ 2MB)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                    <button type="submit" class="btn btn-primary">আপলোড করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        // Check file size (2MB = 2097152 bytes)
        if (input.files[0].size > 2097152) {
            alert('ফাইলের আকার ২MB এর বেশি হতে পারবে না');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('photoPreview');
            preview.outerHTML = '<img id="photoPreview" src="' + e.target.result + '" alt="Photo Preview" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>প্রোফাইল সম্পাদনা করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">নাম</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ইমেইল</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ auth()->user()->email }}" readonly style="background-color: #e9ecef;">
                        <small class="text-muted">ইমেইল পরিবর্তন করা যাবে না</small>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">মোবাইল নম্বর</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                               value="{{ auth()->user()->phone }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                    <button type="submit" class="btn btn-primary">সংরক্ষণ করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-key me-2"></i>পাসওয়ার্ড পরিবর্তন করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('user.password.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">বর্তমান পাসওয়ার্ড</label>
                        <input type="password" class="form-control" id="current_password" 
                               name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">নতুন পাসওয়ার্ড</label>
                        <input type="password" class="form-control" id="new_password" 
                               name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">নতুন পাসওয়ার্ড নিশ্চিত করুন</label>
                        <input type="password" class="form-control" id="new_password_confirmation" 
                               name="new_password_confirmation" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                    <button type="submit" class="btn btn-primary">পরিবর্তন করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                <span id="toastMessage"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i>
                <span id="errorToastMessage"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show success toast if there's a success message
        @if(session('success'))
            const successToast = new bootstrap.Toast(document.getElementById('successToast'));
            document.getElementById('toastMessage').textContent = "{{ session('success') }}";
            successToast.show();
        @endif

        // Show error toast if there are validation errors
        @if($errors->any())
            const errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
            const errors = @json($errors->all());
            document.getElementById('errorToastMessage').innerHTML = errors.join('<br>');
            errorToast.show();
        @endif
    });
</script>
@endsection
