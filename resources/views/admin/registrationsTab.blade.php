<div id="registrations" class="tab-content">
    <div class="admin-container" style="padding: 1.5rem;">
        <div class="content-header">
            <div>
                <h1>প্লট রেজিস্ট্রেশন</h1>
                <p>সকল প্লট আবেদন পরিচালনা করুন</p>
            </div>
            <div class="header-actions">
                <button class="btn btn-outline" onclick="exportRegistrations('csv')">
                    <i class="fas fa-download"></i> এক্সপোর্ট CSV
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon total"><i class="fas fa-file-alt"></i></div>
                <div class="stat-info">
                    <span class="stat-value">{{ $registrationStats['total'] ?? 0 }}</span>
                    <span class="stat-label">মোট আবেদন</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pending"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <span class="stat-value">{{ $registrationStats['pending'] ?? 0 }}</span>
                    <span class="stat-label">অপেক্ষমাণ</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon processing"><i class="fas fa-spinner"></i></div>
                <div class="stat-info">
                    <span class="stat-value">{{ $registrationStats['processing'] ?? 0 }}</span>
                    <span class="stat-label">প্রক্রিয়াধীন</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon approved"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-value">{{ $registrationStats['approved'] ?? 0 }}</span>
                    <span class="stat-label">অনুমোদিত</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon rejected"><i class="fas fa-times-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-value">{{ $registrationStats['rejected'] ?? 0 }}</span>
                    <span class="stat-label">বাতিল</span>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filter-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="regSearchInput" placeholder="নাম, মোবাইল, NID দিয়ে খুঁজুন...">
            </div>
            <div class="filter-tabs">
                <button class="reg-filter-tab active" data-status="all">সব</button>
                <button class="reg-filter-tab" data-status="pending">অপেক্ষমাণ</button>
                <button class="reg-filter-tab" data-status="processing">প্রক্রিয়াধীন</button>
                <button class="reg-filter-tab" data-status="approved">অনুমোদিত</button>
                <button class="reg-filter-tab" data-status="rejected">বাতিল</button>
            </div>
        </div>

        <!-- Table -->
        <div class="data-table-container">
            <table class="data-table" id="regTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="regSelectAll"></th>
                        <th>আবেদন নম্বর</th>
                        <th>আবেদনকারী</th>
                        <th>মোবাইল</th>
                        <th>প্রকল্প</th>
                        <th>প্লট</th>
                        <th>মোট মূল্য</th>
                        <th>স্ট্যাটাস</th>
                        <th>তারিখ</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody id="regTableBody">
                    @forelse($registrations ?? [] as $reg)
                    <tr data-id="{{ $reg->id }}" data-status="{{ $reg->status }}" data-name="{{ strtolower($reg->applicant_name) }}" data-mobile="{{ $reg->mobile }}" data-project="{{ strtolower($reg->project_name ?? '') }}">
                        <td><input type="checkbox" class="reg-row-checkbox" value="{{ $reg->id }}"></td>
                        <td><strong>{{ $reg->application_number }}</strong></td>
                        <td>
                            <div class="applicant-info">
                                @if($reg->applicant_photo)
                                    <img src="{{ Storage::url($reg->applicant_photo) }}" alt="Photo" class="applicant-photo">
                                @else
                                    <div class="applicant-avatar">{{ mb_substr($reg->applicant_name, 0, 1) }}</div>
                                @endif
                                <div>
                                    <div class="applicant-name">{{ $reg->applicant_name }}</div>
                                    @if($reg->email)
                                        <div class="applicant-email">{{ $reg->email }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $reg->mobile }}</td>
                        <td>{{ $reg->project_name ?? '-' }}</td>
                        <td>
                            @if($reg->plot_no)
                                প্লট: {{ $reg->plot_no }}
                                @if($reg->block_no) / ব্লক: {{ $reg->block_no }} @endif
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($reg->total_price)
                                <strong>৳ {{ number_format($reg->total_price, 0) }}</strong>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <span class="status-badge status-{{ $reg->status }}">{{ $reg->status_bengali }}</span>
                        </td>
                        <td>{{ $reg->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.registrations.show', $reg) }}" class="btn-icon" title="বিস্তারিত">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.registrations.edit', $reg) }}" class="btn-icon" title="এডিট">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.registrations.print', $reg) }}" class="btn-icon" target="_blank" title="প্রিন্ট">
                                    <i class="fas fa-print"></i>
                                </a>
                                <button class="btn-icon btn-danger" onclick="deleteRegistration({{ $reg->id }})" title="মুছুন">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="empty-row">
                        <td colspan="10" class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>কোনো রেজিস্ট্রেশন পাওয়া যায়নি</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(isset($registrations) && $registrations->hasPages())
        <div class="reg-pagination pagination-wrapper">
            {{ $registrations->links() }}
        </div>
        @endif

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="regBulkActions" style="display: none;">
            <span class="selected-count"><span id="regSelectedCount">0</span> টি নির্বাচিত</span>
            <button class="btn btn-danger btn-sm" onclick="bulkDeleteRegistrations()">
                <i class="fas fa-trash"></i> মুছে ফেলুন
            </button>
        </div>

        <!-- Professional Confirmation Modal -->
        <div id="regConfirmModal" class="confirm-modal">
            <div class="confirm-modal-content">
                <div class="confirm-modal-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
                <h3 id="regConfirmModalTitle">নিশ্চিত করুন</h3>
                <p id="regConfirmModalMessage">আপনি কি নিশ্চিত?</p>
                <div class="confirm-modal-actions">
                    <button class="confirm-btn confirm-btn-cancel" id="regConfirmModalCancel">বাতিল করুন</button>
                    <button class="confirm-btn confirm-btn-confirm" id="regConfirmModalConfirm">হ্যাঁ, মুছে ফেলুন</button>
                </div>
            </div>
        </div>

        <!-- Professional Alert Modal -->
        <div id="regAlertModal" class="alert-modal">
            <div class="alert-modal-content">
                <div class="alert-modal-icon">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                    <svg class="errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
                    </svg>
                </div>
                <h3 id="regAlertModalTitle"></h3>
                <p id="regAlertModalMessage"></p>
                <button class="alert-modal-btn" id="regAlertModalBtn">ঠিক আছে</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Client-side search and filter (instant, no server call)
    const searchInput = document.getElementById('regSearchInput');
    const filterTabs = document.querySelectorAll('.reg-filter-tab');
    const tableBody = document.getElementById('regTableBody');
    const rows = tableBody ? tableBody.querySelectorAll('tr:not(.empty-row)') : [];

    let currentStatus = 'all';
    let currentSearch = '';

    function filterTable() {
        let visibleCount = 0;
        rows.forEach(row => {
            const status = row.dataset.status || '';
            const name = row.dataset.name || '';
            const mobile = row.dataset.mobile || '';
            const project = row.dataset.project || '';

            const matchesStatus = currentStatus === 'all' || status === currentStatus;
            const matchesSearch = !currentSearch || 
                name.includes(currentSearch) || 
                mobile.includes(currentSearch) || 
                project.includes(currentSearch);

            if (matchesStatus && matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Show/hide empty state
        const emptyRow = tableBody.querySelector('.empty-row');
        if (emptyRow) {
            emptyRow.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    // Search input
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            currentSearch = this.value.toLowerCase();
            filterTable();
        });
    }

    // Filter tabs
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentStatus = this.dataset.status;
            filterTable();
        });
    });

    // Select all checkbox
    const selectAll = document.getElementById('regSelectAll');
    const bulkActions = document.getElementById('regBulkActions');
    const selectedCount = document.getElementById('regSelectedCount');

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.reg-row-checkbox');
            checkboxes.forEach(cb => {
                const row = cb.closest('tr');
                if (row && row.style.display !== 'none') {
                    cb.checked = this.checked;
                }
            });
            updateBulkActions();
        });
    }

    document.querySelectorAll('.reg-row-checkbox').forEach(cb => {
        cb.addEventListener('change', updateBulkActions);
    });

    function updateBulkActions() {
        const checked = document.querySelectorAll('.reg-row-checkbox:checked');
        if (selectedCount) selectedCount.textContent = checked.length;
        if (bulkActions) bulkActions.style.display = checked.length > 0 ? 'flex' : 'none';
    }
});

// Delete registration
function deleteRegistration(id) {
    showRegConfirm('আপনি কি নিশ্চিত এই রেজিস্ট্রেশন মুছে ফেলতে চান?', 'রেজিস্ট্রেশন মুছুন').then(confirmed => {
        if (!confirmed) return;
        
        fetch(`/admin/registrations/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) row.remove();
                showRegAlert(data.message || 'সফলভাবে মুছে ফেলা হয়েছে', 'success');
            } else {
                showRegAlert(data.message || 'কিছু সমস্যা হয়েছে!', 'error');
            }
        })
        .catch(err => showRegAlert('কিছু সমস্যা হয়েছে!', 'error'));
    });
}

// Bulk delete
function bulkDeleteRegistrations() {
    const ids = Array.from(document.querySelectorAll('.reg-row-checkbox:checked')).map(cb => cb.value);
    if (!ids.length) return;
    
    showRegConfirm(`আপনি কি নিশ্চিত ${ids.length} টি রেজিস্ট্রেশন মুছে ফেলতে চান?`, 'একাধিক মুছুন').then(confirmed => {
        if (!confirmed) return;
        
        fetch('{{ route("admin.registrations.bulk-delete") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ ids })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                ids.forEach(id => {
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) row.remove();
                });
                document.getElementById('regBulkActions').style.display = 'none';
                showRegAlert(data.message || 'সফলভাবে মুছে ফেলা হয়েছে', 'success');
            } else {
                showRegAlert(data.message || 'কিছু সমস্যা হয়েছে!', 'error');
            }
        })
        .catch(err => showRegAlert('কিছু সমস্যা হয়েছে!', 'error'));
    });
}

// Professional Modal Functions
function showRegConfirm(message, title = 'নিশ্চিত করুন') {
    return new Promise((resolve) => {
        const modal = document.getElementById('regConfirmModal');
        const titleEl = document.getElementById('regConfirmModalTitle');
        const messageEl = document.getElementById('regConfirmModalMessage');
        const confirmBtn = document.getElementById('regConfirmModalConfirm');
        const cancelBtn = document.getElementById('regConfirmModalCancel');
        
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

function showRegAlert(message, type = 'success', title = '') {
    const modal = document.getElementById('regAlertModal');
    const content = modal.querySelector('.alert-modal-content');
    const titleEl = document.getElementById('regAlertModalTitle');
    const messageEl = document.getElementById('regAlertModalMessage');
    const btn = document.getElementById('regAlertModalBtn');
    
    if (!title) {
        title = type === 'success' ? 'সফল!' : 'দুঃখিত!';
    }
    
    content.classList.remove('success', 'error');
    content.classList.add(type);
    
    titleEl.textContent = title;
    messageEl.textContent = message;
    modal.classList.add('active');
    
    btn.onclick = function() {
        modal.classList.remove('active');
    };
    
    modal.onclick = function(e) {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    };
}

// Export
function exportRegistrations(format) {
    window.open('{{ route("admin.registrations.export") }}?format=' + format, '_blank');
}
</script>

<style>
#registrations .admin-container {
    padding: 1.5rem;
}

#registrations .content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

#registrations .content-header h1 {
    font-size: 1.75rem;
    color: #1f2937;
    margin-bottom: 0.25rem;
}

#registrations .content-header p {
    color: #6b7280;
    font-size: 0.9rem;
}

#registrations .stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}

#registrations .stat-card {
    background: #fff;
    border-radius: 12px;
    padding: 1.25rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

#registrations .stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

#registrations .stat-icon.total { background: #dbeafe; color: #2563eb; }
#registrations .stat-icon.pending { background: #fef3c7; color: #d97706; }
#registrations .stat-icon.processing { background: #fce7f3; color: #db2777; }
#registrations .stat-icon.approved { background: #d1fae5; color: #059669; }
#registrations .stat-icon.rejected { background: #fee2e2; color: #dc2626; }

#registrations .stat-info { display: flex; flex-direction: column; }
#registrations .stat-value { font-size: 1.5rem; font-weight: 700; color: #1f2937; }
#registrations .stat-label { font-size: 0.8rem; color: #6b7280; }

#registrations .filter-bar {
    background: #fff;
    padding: 1rem 1.25rem;
    border-radius: 12px;
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

#registrations .search-box {
    display: flex;
    align-items: center;
    background: #f3f4f6;
    border-radius: 8px;
    padding: 0.5rem 1rem;
    flex: 1;
    max-width: 350px;
}

#registrations .search-box i { color: #9ca3af; margin-right: 0.5rem; }
#registrations .search-box input {
    border: none;
    background: none;
    outline: none;
    width: 100%;
    font-size: 0.9rem;
}

#registrations .filter-tabs { display: flex; gap: 0.5rem; flex-wrap: wrap; }

#registrations .reg-filter-tab {
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    background: #fff;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.2s;
}

#registrations .reg-filter-tab:hover { border-color: #10b981; color: #059669; }
#registrations .reg-filter-tab.active {
    background: #059669;
    color: #fff;
    border-color: #059669;
}

#registrations .data-table-container {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

#registrations .data-table {
    width: 100%;
    border-collapse: collapse;
}

#registrations .data-table th,
#registrations .data-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
}

#registrations .data-table th {
    background: #f9fafb;
    font-weight: 600;
    color: #374151;
    font-size: 0.85rem;
    white-space: nowrap;
}

#registrations .applicant-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

#registrations .applicant-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

#registrations .applicant-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

#registrations .applicant-name { font-weight: 500; color: #1f2937; }
#registrations .applicant-email { font-size: 0.8rem; color: #6b7280; }

#registrations .status-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    white-space: nowrap;
}

#registrations .status-pending { background: #fef3c7; color: #92400e; }
#registrations .status-processing { background: #fce7f3; color: #9d174d; }
#registrations .status-approved { background: #d1fae5; color: #065f46; }
#registrations .status-rejected { background: #fee2e2; color: #991b1b; }

#registrations .action-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
}

#registrations .btn-icon {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    border: none;
    background: #f3f4f6;
    color: #6b7280;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
}

#registrations .btn-icon:hover { background: #e5e7eb; color: #374151; }
#registrations .btn-icon.btn-danger:hover { background: #fee2e2; color: #dc2626; }

#registrations .empty-state {
    text-align: center;
    padding: 3rem !important;
    color: #9ca3af;
}

#registrations .empty-state i { font-size: 3rem; margin-bottom: 1rem; display: block; }

#registrations .pagination-wrapper {
    padding: 1rem;
    display: flex;
    justify-content: center;
}

#registrations .bulk-actions {
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    background: #1f2937;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    z-index: 100;
}

#registrations .header-actions { display: flex; gap: 0.5rem; }

#registrations .btn {
    padding: 0.6rem 1.25rem;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
}

#registrations .btn-outline {
    background: #fff;
    border: 1px solid #e5e7eb;
    color: #374151;
}

#registrations .btn-outline:hover { border-color: #10b981; color: #059669; }
#registrations .btn-danger { background: #dc2626; color: #fff; }
#registrations .btn-sm { padding: 0.4rem 1rem; font-size: 0.85rem; }

/* Professional Confirmation Modal Styles */
#registrations .confirm-modal, #registrations .alert-modal {
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

#registrations .confirm-modal.active, #registrations .alert-modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

#registrations .confirm-modal-content, #registrations .alert-modal-content {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    text-align: center;
    max-width: 420px;
    width: 90%;
    animation: slideUp 0.4s ease;
}

#registrations .confirm-modal-icon {
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

#registrations .confirm-modal-icon svg {
    width: 40px;
    height: 40px;
}

#registrations #regConfirmModalTitle, #registrations #regAlertModalTitle {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: #1f2937;
}

#registrations #regConfirmModalMessage, #registrations #regAlertModalMessage {
    font-size: 1rem;
    color: #6b7280;
    margin-bottom: 2rem;
    line-height: 1.6;
}

#registrations .confirm-modal-actions {
    display: flex;
    gap: 0.75rem;
    justify-content: center;
}

#registrations .confirm-btn {
    padding: 0.75rem 1.75rem;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

#registrations .confirm-btn-cancel {
    background: #f3f4f6;
    color: #374151;
}

#registrations .confirm-btn-cancel:hover {
    background: #e5e7eb;
}

#registrations .confirm-btn-confirm {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
}

#registrations .confirm-btn-confirm:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
}

/* Alert Modal Styles */
#registrations .alert-modal-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
}

#registrations .alert-modal-icon svg {
    width: 100%;
    height: 100%;
}

#registrations .checkmark, #registrations .errormark {
    display: none;
}

#registrations .alert-modal-content.success .checkmark {
    display: block;
}

#registrations .alert-modal-content.error .errormark {
    display: block;
}

#registrations .checkmark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke: #10b981;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

#registrations .checkmark__check {
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    stroke: #10b981;
    stroke-width: 3;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
}

#registrations .errormark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke: #dc2626;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

#registrations .errormark__cross {
    stroke-dasharray: 54;
    stroke-dashoffset: 54;
    stroke: #dc2626;
    stroke-width: 3;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0;
    }
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

#registrations .alert-modal-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    border: none;
    padding: 0.875rem 2.5rem;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
}

#registrations .alert-modal-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
}

#registrations .alert-modal-content.error .alert-modal-btn {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
}
</style>
