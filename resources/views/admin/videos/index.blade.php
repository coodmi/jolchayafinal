 <!-- Bootstrap 5 CSS -->
@php
    use Illuminate\Support\Str;
@endphp
 <div class="container py-5">
     <!-- Header Section -->
     <div class="row mb-4 align-items-center">
         <div class="col">
             <h2 class="fw-bold text-dark mb-0">
                 <i class="fas fa-video text-brand me-2"></i> ভিডিও লিস্ট
             </h2>
             <p class="text-muted small mb-0">Manage your video content</p>
         </div>
         <div class="col-auto">
             <a href="{{ route('admin.videos.create') }}" class="btn btn-brand shadow-sm">
                 <i class="fas fa-plus me-1"></i> নতুন ভিডিও যোগ করুন
             </a>
         </div>
     </div>

     <!-- Success Message -->
     @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert"
             style="background-color: #d1fae5; color: #065f46;">
             <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
     @endif

     <!-- Video Table Card -->
     <div class="card table-card border-0 shadow-sm rounded-3 overflow-hidden">
         <div class="card-body p-0">
             <div class="table-responsive">
                 <table class="table table-hover align-middle mb-0">
                     <thead class="bg-light">
                         <tr>
                             <th class="py-3 ps-4 text-uppercase text-secondary text-xs font-weight-bolder">শিরোনাম</th>
                             <th class="py-3 text-uppercase text-secondary text-xs font-weight-bolder">পোস্টার</th>
                             <th class="py-3 text-uppercase text-secondary text-xs font-weight-bolder">ভিডিও URL</th>
                             <th class="py-3 pe-4 text-end text-uppercase text-secondary text-xs font-weight-bolder">
                                 অ্যাকশন</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse($videos as $video)
                             <tr>
                                 <td class="ps-4 fw-bold text-dark">{{ $video->title }}</td>
                                 <td>
                                     @if ($video->poster)
                                         @if (Str::startsWith($video->poster, 'http'))
                                             <img src="{{ $video->poster }}"
                                                 class="rounded border shadow-sm video-poster-thumb" alt="Poster">
                                         @else
                                         <img src="{{ asset('storage/' . $video->poster) }}"
                                             class="rounded border shadow-sm video-poster-thumb" alt="Poster">
                                         @endif
                                     @else
                                         <div
                                             class="video-poster-thumb d-flex align-items-center justify-content-center bg-light text-muted">
                                             <i class="fas fa-image"></i>
                                         </div>
                                     @endif
                                 </td>
                                 <td>
                                     <a href="{{ $video->url }}" target="_blank"
                                         class="btn btn-sm btn-light border text-success">
                                         <i class="fas fa-external-link-alt me-1"></i> ভিডিও দেখুন
                                     </a>
                                 </td>
                                 <td class="text-end pe-4">
                                     <div class="d-flex gap-2 justify-content-end">
                                         <a class="text-warning"  href="{{ route('admin.videos.edit', $video->id) }}"
                                             >
                                             <i class="fas fa-edit"></i> Edit
                                         </a>

                                         <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST"
                                             class="d-inline video-delete-form">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit"
                                                 class="text-danger border-0">
                                                 <i class="fas fa-trash-alt"></i> Delete
                                             </button>
                                         </form>
                                     </div>
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="4" class="text-center py-5 text-muted">
                                     <i class="fas fa-film fa-2x mb-2"></i><br>
                                     কোন ভিডিও পাওয়া যায়নি
                                 </td>
                             </tr>
                         @endforelse
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome for Icons -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

 <style>
     body {
         font-family: 'Inter', sans-serif;
         background-color: #f3f4f6;
     }

     a{
        text-decoration: none;
     }
     .btn-brand {
         background-color: #0d3d29;
         color: white;
         border: 1px solid #0d3d29;
         transition: all 0.3s ease;
     }

     .btn-brand:hover {
         background-color: #0d6639;
         color: white;
         transform: translateY(-2px);
         box-shadow: 0 4px 6px rgba(13, 61, 41, 0.2);
     }

     .text-brand {
         color: #0d3d29;
     }

     .table-card {
         border: none;
         border-radius: 12px;
         box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
         overflow: hidden;
     }

     .table th {
         font-size: 0.85rem;
         text-transform: uppercase;
         letter-spacing: 0.05em;
         font-weight: 600;
         color: #6b7280;
         background-color: #f9fafb;
         padding-top: 1rem;
         padding-bottom: 1rem;
     }

     .table td {
         vertical-align: middle;
         padding: 1rem;
     }

     .video-poster-thumb {
         width: 80px;
         height: 50px;
         object-fit: cover;
         border-radius: 6px;
         border: 1px solid #e5e7eb;
     }

     .action-btn-group .btn {
         margin-right: 5px;
     }

     /* Code Box Styling for the user to copy */
     .code-container {
         position: relative;
         margin-top: 50px;
         background: #1f2937;
         border-radius: 12px;
         padding: 0;
         overflow: hidden;
     }

     .code-header {
         background: #111827;
         color: #e5e7eb;
         padding: 15px 20px;
         font-weight: 600;
         display: flex;
         justify-content: space-between;
         align-items: center;
     }

     .code-area {
         width: 100%;
         height: 400px;
         background: #1f2937;
         color: #a5b4fc;
         border: none;
         padding: 20px;
         font-family: 'Courier New', Courier, monospace;
         font-size: 14px;
         resize: none;
     }

     .code-area:focus {
         outline: none;
     }

     .badge-soft-success {
         background-color: #d1fae5;
         color: #065f46;
         padding: 0.5em 0.8em;
         border-radius: 50rem;
         font-weight: 600;
         font-size: 0.85em;
     }
 </style>
 <!-- Professional Confirmation Modal -->
 <div id="videoConfirmModal" class="video-confirm-modal">
     <div class="video-confirm-modal-content">
         <div class="video-confirm-modal-icon">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                 <circle cx="12" cy="12" r="10"/>
                 <line x1="12" y1="8" x2="12" y2="12"/>
                 <line x1="12" y1="16" x2="12.01" y2="16"/>
             </svg>
         </div>
         <h3 id="videoConfirmModalTitle">নিশ্চিত করুন</h3>
         <p id="videoConfirmModalMessage">আপনি কি নিশ্চিত?</p>
         <div class="video-confirm-modal-actions">
             <button class="video-confirm-btn video-confirm-btn-cancel" id="videoConfirmModalCancel">বাতিল করুন</button>
             <button class="video-confirm-btn video-confirm-btn-confirm" id="videoConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
         </div>
     </div>
 </div>

 <style>
     /* Professional Confirmation Modal Styles */
     .video-confirm-modal {
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

     .video-confirm-modal.active {
         display: flex;
         align-items: center;
         justify-content: center;
     }

     .video-confirm-modal-content {
         background: white;
         padding: 2rem;
         border-radius: 16px;
         box-shadow: 0 20px 60px rgba(0,0,0,0.3);
         text-align: center;
         max-width: 420px;
         width: 90%;
         animation: slideUp 0.4s ease;
     }

     .video-confirm-modal-icon {
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

     .video-confirm-modal-icon svg {
         width: 40px;
         height: 40px;
     }

     #videoConfirmModalTitle {
         font-size: 1.5rem;
         font-weight: 700;
         margin-bottom: 0.75rem;
         color: #1f2937;
     }

     #videoConfirmModalMessage {
         font-size: 1rem;
         color: #6b7280;
         margin-bottom: 2rem;
         line-height: 1.6;
     }

     .video-confirm-modal-actions {
         display: flex;
         gap: 0.75rem;
         justify-content: center;
     }

     .video-confirm-btn {
         padding: 0.75rem 1.75rem;
         font-size: 1rem;
         font-weight: 600;
         border: none;
         border-radius: 8px;
         cursor: pointer;
         transition: all 0.3s ease;
     }

     .video-confirm-btn-cancel {
         background: #f3f4f6;
         color: #374151;
     }

     .video-confirm-btn-cancel:hover {
         background: #e5e7eb;
     }

     .video-confirm-btn-confirm {
         background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
         color: white;
         box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
     }

     .video-confirm-btn-confirm:hover {
         transform: translateY(-2px);
         box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
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

 <script>
     // Professional Modal Functions
     function showVideoConfirm(message, title = 'নিশ্চিত করুন') {
         return new Promise((resolve) => {
             const modal = document.getElementById('videoConfirmModal');
             const titleEl = document.getElementById('videoConfirmModalTitle');
             const messageEl = document.getElementById('videoConfirmModalMessage');
             const confirmBtn = document.getElementById('videoConfirmModalConfirm');
             const cancelBtn = document.getElementById('videoConfirmModalCancel');
             
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

     // Attach confirm to all video delete forms
     document.addEventListener('DOMContentLoaded', function() {
         const deleteForms = document.querySelectorAll('.video-delete-form');
         deleteForms.forEach(form => {
             form.addEventListener('submit', async function(e) {
                 e.preventDefault();
                 const confirmed = await showVideoConfirm('আপনি কি নিশ্চিত এই ভিডিও মুছে ফেলতে চান?', 'ভিডিও মুছুন');
                 if (confirmed) {
                     this.submit();
                 }
             });
         });
     });
 </script>