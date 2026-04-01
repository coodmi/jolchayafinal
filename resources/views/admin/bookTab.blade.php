<div id="book" class="tab-content">
    <div class="table-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h2 style="margin: 0; font-size: 1.75rem; color: #1e293b;">বুক ম্যানেজমেন্ট</h2>
                <p style="color: #64748b; margin: 0.5rem 0 0 0; font-size: 0.95rem;">ওয়েবসাইট থেকে জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</p>
            </div>
            <div style="display: flex; gap: 0.75rem; align-items: center;">
                <button id="refreshBookBtn" class="btn btn-secondary" onclick="refreshBookData()" title="রিফ্রেশ করুন">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.5rem;">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    রিফ্রেশ
                </button>
                <button id="exportBookBtn" class="btn btn-primary" onclick="exportBookData()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.5rem;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    এক্সপোর্ট করুন
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 1.5rem; border-radius: 0.75rem; color: white;">
                <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">মোট বুকিং</div>
                <div style="font-size: 2rem; font-weight: 700;" id="totalBookCount">0</div>
            </div>
            <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 1.5rem; border-radius: 0.75rem; color: white;">
                <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">নতুন রিকোয়েস্ট</div>
                <div style="font-size: 2rem; font-weight: 700;" id="pendingBookCount">0</div>
            </div>
            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); padding: 1.5rem; border-radius: 0.75rem; color: white;">
                <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">যোগাযোগ করা হয়েছে</div>
                <div style="font-size: 2rem; font-weight: 700;" id="contactedBookCount">0</div>
            </div>
            <div style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); padding: 1.5rem; border-radius: 0.75rem; color: white;">
                <div style="font-size: 0.875rem; opacity: 0.9; margin-bottom: 0.5rem;">সম্পন্ন</div>
                <div style="font-size: 2rem; font-weight: 700;" id="completedBookCount">0</div>
            </div>
        </div>

        <!-- Filter Section -->
        <div style="background: #f8fafc; padding: 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #475569; margin-bottom: 0.5rem;">খুঁজুন</label>
                    <input type="text" id="searchBookInput" placeholder="নাম, ফোন, বা ইমেইল..." 
                        style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; font-size: 0.875rem;"
                        oninput="filterBookData()">
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #475569; margin-bottom: 0.5rem;">স্ট্যাটাস</label>
                    <select id="filterBookStatus" onchange="filterBookData()" 
                        style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; font-size: 0.875rem;">
                        <option value="">সকল স্ট্যাটাস</option>
                        <option value="pending">পেন্ডিং</option>
                        <option value="contacted">যোগাযোগ করা হয়েছে</option>
                        <option value="completed">সম্পন্ন</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #475569; margin-bottom: 0.5rem;">সময়কাল</label>
                    <select id="filterBookDate" onchange="filterBookData()" 
                        style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; font-size: 0.875rem;">
                        <option value="">সকল সময়</option>
                        <option value="today">আজকের</option>
                        <option value="week">এই সপ্তাহ</option>
                        <option value="month">এই মাস</option>
                        <option value="year">এই বছর</option>
                    </select>
                </div>
                <div style="display: flex; align-items: flex-end;">
                    <button onclick="clearBookFilters()" class="btn btn-secondary" style="width: 100%;">
                        ফিল্টার রিসেট করুন
                    </button>
                </div>
            </div>
        </div>

        <!-- Bulk Actions -->
        <div id="bulkActionsBar" style="display: none; background: #eff6ff; border: 1px solid #bfdbfe; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span style="font-weight: 600; color: #1e40af;">
                    <span id="selectedBookCount">0</span> টি নির্বাচিত
                </span>
                <button onclick="deselectAllBooks()" class="btn btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                    বাতিল করুন
                </button>
            </div>
            <div style="display: flex; gap: 0.75rem;">
                <button onclick="bulkUpdateBookStatus('contacted')" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                    যোগাযোগ করা হয়েছে
                </button>
                <button onclick="bulkUpdateBookStatus('completed')" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem; background: #10b981;">
                    সম্পন্ন
                </button>
                <button onclick="bulkDeleteBooks()" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                    মুছে ফেলুন
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 0.75rem;">
            <table class="book-table" id="bookDataTable">
                <thead>
                    <tr>
                        <th style="width: 50px;">
                            <input type="checkbox" id="selectAllBooks" onchange="toggleSelectAllBooks()" 
                                style="width: 18px; height: 18px; cursor: pointer;">
                        </th>
                        <th style="width: 60px;">#</th>
                        <th>নাম</th>
                        <th>ফোন নম্বর</th>
                        <th>ইমেইল</th>
                        <th>প্লট সাইজ</th>
                        <th>বার্তা</th>
                        <th>স্ট্যাটাস</th>
                        <th>জমার তারিখ</th>
                        <th style="width: 140px;">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody id="bookTableBody">
                    <tr>
                        <td colspan="10" style="text-align: center; padding: 3rem; color: #94a3b8;">
                            <div class="loading-spinner" style="margin: 0 auto 1rem;"></div>
                            <p>ডেটা লোড হচ্ছে...</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div id="bookPagination" style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">
            <div style="color: #64748b; font-size: 0.875rem;">
                প্রদর্শন <span id="showingBookStart">0</span>-<span id="showingBookEnd">0</span> / <span id="totalBookEntries">0</span> টি
            </div>
            <div id="bookPaginationButtons" style="display: flex; gap: 0.5rem;">
                <!-- Pagination buttons will be inserted here -->
            </div>
        </div>
    </div>
</div>

<!-- View Details Modal -->
<div id="viewBookModal" class="book-modal" style="display: none;">
    <div class="book-modal-overlay" onclick="closeViewBookModal()"></div>
    <div class="book-modal-content" style="max-width: 600px;">
        <div class="book-modal-header">
            <h3 style="margin: 0; font-size: 1.25rem;">বুকিং বিস্তারিত তথ্য</h3>
            <button class="book-close-btn" onclick="closeViewBookModal()">&times;</button>
        </div>
        <div class="book-modal-body" id="viewBookModalBody">
            <!-- Details will be inserted here -->
        </div>
        <div class="book-modal-footer">
            <button class="btn btn-secondary" onclick="closeViewBookModal()">বন্ধ করুন</button>
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div id="updateBookStatusModal" class="book-modal" style="display: none;">
    <div class="book-modal-overlay" onclick="closeUpdateBookStatusModal()"></div>
    <div class="book-modal-content" style="max-width: 500px;">
        <div class="book-modal-header">
            <h3 style="margin: 0; font-size: 1.25rem;">স্ট্যাটাস আপডেট করুন</h3>
            <button class="book-close-btn" onclick="closeUpdateBookStatusModal()">&times;</button>
        </div>
        <div class="book-modal-body">
            <div class="form-group">
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">নতুন স্ট্যাটাস নির্বাচন করুন</label>
                <select id="newBookStatus" class="form-control" style="width: 100%; padding: 0.625rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.5rem;">
                    <option value="pending">পেন্ডিং</option>
                    <option value="contacted">যোগাযোগ করা হয়েছে</option>
                    <option value="completed">সম্পন্ন</option>
                </select>
            </div>
        </div>
        <div class="book-modal-footer">
            <button class="btn btn-secondary" onclick="closeUpdateBookStatusModal()">বাতিল</button>
            <button class="btn btn-primary" onclick="confirmUpdateBookStatus()">আপডেট করুন</button>
        </div>
    </div>
</div>

<style>
    .book-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .book-table th {
        background: #f8fafc;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #475569;
        font-size: 0.875rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .book-table td {
        padding: 1rem;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.875rem;
        color: #334155;
    }

    .book-table tbody tr {
        transition: background 0.2s;
    }

    .book-table tbody tr:hover {
        background: #f8fafc;
    }

    .book-table tbody tr.unread {
        background: #eff6ff;
    }

    .book-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.375rem 0.875rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: capitalize;
    }

    .book-status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .book-status-contacted {
        background: #dbeafe;
        color: #1e40af;
    }

    .book-status-completed {
        background: #d1fae5;
        color: #065f46;
    }

    .book-action-btn {
        padding: 0.375rem 0.625rem;
        border: none;
        background: white;
        cursor: pointer;
        color: #64748b;
        font-size: 1.125rem;
        border-radius: 0.375rem;
        transition: all 0.2s;
        border: 1px solid #e2e8f0;
    }

    .book-action-btn:hover {
        background: #f1f5f9;
        color: #1e293b;
        transform: translateY(-1px);
    }

    .book-modal {
        position: fixed;
        inset: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .book-modal-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
    }

    .book-modal-content {
        position: relative;
        background: white;
        border-radius: 1rem;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .book-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .book-modal-body {
        padding: 1.5rem;
    }

    .book-modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        padding: 1.5rem;
        border-top: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    .book-close-btn {
        background: none;
        border: none;
        font-size: 1.75rem;
        cursor: pointer;
        color: #94a3b8;
        line-height: 1;
        padding: 0;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.375rem;
        transition: all 0.2s;
    }

    .book-close-btn:hover {
        background: #f1f5f9;
        color: #475569;
    }

    .loading-spinner {
        border: 3px solid #f1f5f9;
        border-top: 3px solid #3b82f6;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .book-pagination-btn {
        padding: 0.5rem 0.875rem;
        border: 1px solid #e2e8f0;
        background: white;
        border-radius: 0.375rem;
        cursor: pointer;
        font-size: 0.875rem;
        transition: all 0.2s;
        color: #475569;
        font-weight: 500;
    }

    .book-pagination-btn:hover:not(:disabled) {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .book-pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .book-pagination-btn.active {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }
</style>

<script>
    // Global variables for Book page
    let allBookData = [];
    let filteredBookData = [];
    let selectedBookIds = new Set();
    let currentBookId = null;
    let currentBookPage = 1;
    let bookItemsPerPage = 10;

    // Load book data from API
    async function loadBookData() {
        try {
            const response = await fetch('/api/bookings');
            if (!response.ok) throw new Error('Failed to fetch');
            
            allBookData = await response.json();
            filteredBookData = [...allBookData];
            
            updateBookStats();
            renderBookTable();
        } catch (error) {
            console.error('Error loading book data:', error);
            document.getElementById('bookTableBody').innerHTML = `
                <tr>
                    <td colspan="10" style="text-align: center; padding: 3rem; color: #ef4444;">
                        <p style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">ডেটা লোড করতে ব্যর্থ</p>
                        <p style="color: #94a3b8;">পেজ রিফ্রেশ করে আবার চেষ্টা করুন</p>
                    </td>
                </tr>
            `;
        }
    }

    // Update statistics
    function updateBookStats() {
        const total = allBookData.length;
        const pending = allBookData.filter(b => b.status === 'pending').length;
        const contacted = allBookData.filter(b => b.status === 'contacted').length;
        const completed = allBookData.filter(b => b.status === 'completed').length;

        document.getElementById('totalBookCount').textContent = total;
        document.getElementById('pendingBookCount').textContent = pending;
        document.getElementById('contactedBookCount').textContent = contacted;
        document.getElementById('completedBookCount').textContent = completed;
    }

    // Render book table
    function renderBookTable() {
        const tbody = document.getElementById('bookTableBody');
        const startIndex = (currentBookPage - 1) * bookItemsPerPage;
        const endIndex = startIndex + bookItemsPerPage;
        const pageData = filteredBookData.slice(startIndex, endIndex);

        if (pageData.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="10" style="text-align: center; padding: 3rem; color: #94a3b8;">
                        <p style="font-size: 1.125rem;">কোন বুকিং পাওয়া যায়নি</p>
                    </td>
                </tr>
            `;
            updateBookPagination();
            return;
        }

        tbody.innerHTML = pageData.map((book, index) => `
            <tr class="${!book.is_read ? 'unread' : ''}">
                <td>
                    <input type="checkbox" class="book-checkbox" 
                        data-id="${book.id}" 
                        ${selectedBookIds.has(book.id) ? 'checked' : ''}
                        onchange="toggleBookSelection(${book.id})"
                        style="width: 18px; height: 18px; cursor: pointer;">
                </td>
                <td style="font-weight: 600; color: #64748b;">${startIndex + index + 1}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <strong>${escapeBookHtml(book.name)}</strong>
                        ${!book.is_read ? '<span style="color: #3b82f6; font-size: 0.5rem;">●</span>' : ''}
                    </div>
                </td>
                <td>
                    <a href="tel:${book.phone}" style="color: #3b82f6; text-decoration: none;">
                        ${escapeBookHtml(book.phone)}
                    </a>
                </td>
                <td>
                    <a href="mailto:${book.email}" style="color: #3b82f6; text-decoration: none;">
                        ${escapeBookHtml(book.email)}
                    </a>
                </td>
                <td>${book.plot_size ? escapeBookHtml(book.plot_size) : '<span style="color: #94a3b8;">-</span>'}</td>
                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                    ${book.message ? escapeBookHtml(book.message) : '<span style="color: #94a3b8;">-</span>'}
                </td>
                <td>
                    <span class="book-status-badge book-status-${book.status}">
                        ${getBookStatusText(book.status)}
                    </span>
                </td>
                <td style="color: #64748b;">${formatBookDate(book.created_at)}</td>
                <td>
                    <div style="display: flex; gap: 0.375rem;">
                        <button class="book-action-btn" onclick="viewBookDetails(${book.id})" title="বিস্তারিত দেখুন">👁️</button>
                        <button class="book-action-btn" onclick="openUpdateBookStatusModal(${book.id})" title="স্ট্যাটাস পরিবর্তন">✏️</button>
                        <button class="book-action-btn" onclick="deleteBook(${book.id})" title="মুছে ফেলুন">🗑️</button>
                    </div>
                </td>
            </tr>
        `).join('');

        updateBookPagination();
    }

    // Filter book data
    function filterBookData() {
        const searchTerm = document.getElementById('searchBookInput').value.toLowerCase();
        const statusFilter = document.getElementById('filterBookStatus').value;
        const dateFilter = document.getElementById('filterBookDate').value;

        filteredBookData = allBookData.filter(book => {
            const matchesSearch = !searchTerm || 
                book.name.toLowerCase().includes(searchTerm) ||
                book.phone.toLowerCase().includes(searchTerm) ||
                book.email.toLowerCase().includes(searchTerm);

            const matchesStatus = !statusFilter || book.status === statusFilter;

            let matchesDate = true;
            if (dateFilter) {
                const bookDate = new Date(book.created_at);
                const now = new Date();
                
                if (dateFilter === 'today') {
                    matchesDate = bookDate.toDateString() === now.toDateString();
                } else if (dateFilter === 'week') {
                    const weekAgo = new Date(now.getTime() - 7 * 24 * 60 * 60 * 1000);
                    matchesDate = bookDate >= weekAgo;
                } else if (dateFilter === 'month') {
                    matchesDate = bookDate.getMonth() === now.getMonth() && bookDate.getFullYear() === now.getFullYear();
                } else if (dateFilter === 'year') {
                    matchesDate = bookDate.getFullYear() === now.getFullYear();
                }
            }

            return matchesSearch && matchesStatus && matchesDate;
        });

        currentBookPage = 1;
        renderBookTable();
    }

    // Clear filters
    function clearBookFilters() {
        document.getElementById('searchBookInput').value = '';
        document.getElementById('filterBookStatus').value = '';
        document.getElementById('filterBookDate').value = '';
        filterBookData();
    }

    // Toggle select all
    function toggleSelectAllBooks() {
        const selectAll = document.getElementById('selectAllBooks').checked;
        const checkboxes = document.querySelectorAll('.book-checkbox');
        
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAll;
            const id = parseInt(checkbox.dataset.id);
            if (selectAll) {
                selectedBookIds.add(id);
            } else {
                selectedBookIds.delete(id);
            }
        });

        updateBulkActionsBar();
    }

    // Toggle individual selection
    function toggleBookSelection(id) {
        if (selectedBookIds.has(id)) {
            selectedBookIds.delete(id);
        } else {
            selectedBookIds.add(id);
        }
        updateBulkActionsBar();
    }

    // Update bulk actions bar
    function updateBulkActionsBar() {
        const bar = document.getElementById('bulkActionsBar');
        const count = document.getElementById('selectedBookCount');
        
        if (selectedBookIds.size > 0) {
            bar.style.display = 'flex';
            count.textContent = selectedBookIds.size;
        } else {
            bar.style.display = 'none';
        }

        const checkboxes = document.querySelectorAll('.book-checkbox');
        const selectAll = document.getElementById('selectAllBooks');
        selectAll.checked = checkboxes.length > 0 && selectedBookIds.size === checkboxes.length;
    }

    // Deselect all
    function deselectAllBooks() {
        selectedBookIds.clear();
        document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('selectAllBooks').checked = false;
        updateBulkActionsBar();
    }

    // View book details
    async function viewBookDetails(id) {
        const book = allBookData.find(b => b.id === id);
        if (!book) return;

        // Mark as read
        if (!book.is_read) {
            await markBookAsRead(id);
        }

        const modal = document.getElementById('viewBookModal');
        const body = document.getElementById('viewBookModalBody');

        body.innerHTML = `
            <div style="display: grid; gap: 1.25rem;">
                <div>
                    <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">নাম</label>
                    <p style="margin: 0; font-size: 1.125rem; font-weight: 600;">${escapeBookHtml(book.name)}</p>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">ফোন নম্বর</label>
                        <p style="margin: 0;"><a href="tel:${book.phone}" style="color: #3b82f6; text-decoration: none;">${escapeBookHtml(book.phone)}</a></p>
                    </div>
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">ইমেইল</label>
                        <p style="margin: 0;"><a href="mailto:${book.email}" style="color: #3b82f6; text-decoration: none;">${escapeBookHtml(book.email)}</a></p>
                    </div>
                </div>
                <div>
                    <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">প্লট সাইজ</label>
                    <p style="margin: 0;">${book.plot_size ? escapeBookHtml(book.plot_size) : '-'}</p>
                </div>
                <div>
                    <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">বার্তা</label>
                    <p style="margin: 0; white-space: pre-wrap; background: #f8fafc; padding: 1rem; border-radius: 0.5rem; border: 1px solid #e2e8f0;">${book.message ? escapeBookHtml(book.message) : '-'}</p>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">স্ট্যাটাস</label>
                        <span class="book-status-badge book-status-${book.status}">${getBookStatusText(book.status)}</span>
                    </div>
                    <div>
                        <label style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.375rem;">জমার তারিখ</label>
                        <p style="margin: 0;">${formatBookDate(book.created_at)}</p>
                    </div>
                </div>
            </div>
        `;

        modal.style.display = 'flex';
    }

    function closeViewBookModal() {
        document.getElementById('viewBookModal').style.display = 'none';
    }

    // Open update status modal
    function openUpdateBookStatusModal(id) {
        currentBookId = id;
        const book = allBookData.find(b => b.id === id);
        if (!book) return;

        document.getElementById('newBookStatus').value = book.status;
        document.getElementById('updateBookStatusModal').style.display = 'flex';
    }

    function closeUpdateBookStatusModal() {
        document.getElementById('updateBookStatusModal').style.display = 'none';
        currentBookId = null;
    }

    // Confirm status update
    async function confirmUpdateBookStatus() {
        if (!currentBookId) return;

        const newStatus = document.getElementById('newBookStatus').value;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            const response = await fetch(`/admin/bookings/${currentBookId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            });

            const result = await response.json();

            if (result.success) {
                const book = allBookData.find(b => b.id === currentBookId);
                if (book) {
                    book.status = newStatus;
                    book.is_read = true;
                }
                
                updateBookStats();
                renderBookTable();
                closeUpdateBookStatusModal();
                showBookNotification('স্ট্যাটাস সফলভাবে আপডেট হয়েছে', 'success');
            } else {
                throw new Error(result.message || 'Update failed');
            }
        } catch (error) {
            console.error('Error updating status:', error);
            showBookNotification('স্ট্যাটাস আপডেট করতে ব্যর্থ হয়েছে', 'error');
        }
    }

    // Mark as read
    async function markBookAsRead(id) {
        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            const book = allBookData.find(b => b.id === id);
            
            await fetch(`/admin/bookings/${id}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: book.status })
            });

            book.is_read = true;
        } catch (error) {
            console.error('Error marking as read:', error);
        }
    }

    // Delete single book
    async function deleteBook(id) {
        const confirmed = await showBookConfirm('আপনি কি এই বুকিং মুছে ফেলতে চান?', 'বুকিং মুছুন');
        if (!confirmed) return;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            const response = await fetch(`/admin/bookings/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success) {
                allBookData = allBookData.filter(b => b.id !== id);
                filterBookData();
                updateBookStats();
                showBookNotification('বুকিং সফলভাবে মুছে ফেলা হয়েছে', 'success');
            } else {
                throw new Error(result.message || 'Delete failed');
            }
        } catch (error) {
            console.error('Error deleting book:', error);
            showBookNotification('বুকিং মুছতে ব্যর্থ হয়েছে', 'error');
        }
    }

    // Bulk update status
    async function bulkUpdateBookStatus(status) {
        if (selectedBookIds.size === 0) return;

        const statusText = getBookStatusText(status);
        const confirmed = await showBookConfirm(`${selectedBookIds.size} টি বুকিং এর স্ট্যাটাস "${statusText}" এ পরিবর্তন করবেন?`, 'স্ট্যাটাস আপডেট');
        if (!confirmed) return;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            for (const id of selectedBookIds) {
                await fetch(`/admin/bookings/${id}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ status: status })
                });

                const book = allBookData.find(b => b.id === id);
                if (book) {
                    book.status = status;
                    book.is_read = true;
                }
            }

            deselectAllBooks();
            updateBookStats();
            renderBookTable();
            showBookNotification('স্ট্যাটাস সফলভাবে আপডেট হয়েছে', 'success');
        } catch (error) {
            console.error('Error bulk updating:', error);
            showBookNotification('স্ট্যাটাস আপডেট করতে ব্যর্থ হয়েছে', 'error');
        }
    }

    // Bulk delete
    async function bulkDeleteBooks() {
        if (selectedBookIds.size === 0) return;
        
        const confirmed = await showBookConfirm(`আপনি কি ${selectedBookIds.size} টি বুকিং মুছে ফেলতে চান?`, 'একাধিক মুছুন');
        if (!confirmed) return;

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
            
            const response = await fetch('/admin/bookings/bulk-delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: Array.from(selectedBookIds) })
            });

            const result = await response.json();

            if (result.success) {
                allBookData = allBookData.filter(b => !selectedBookIds.has(b.id));
                selectedBookIds.clear();
                filterBookData();
                updateBookStats();
                updateBulkActionsBar();
                showBookNotification(result.message, 'success');
            } else {
                throw new Error(result.message || 'Bulk delete failed');
            }
        } catch (error) {
            console.error('Error bulk deleting:', error);
            showBookNotification('বুকিং মুছতে ব্যর্থ হয়েছে', 'error');
        }
    }

    // Export data
    function exportBookData() {
        window.location.href = '/admin/bookings/export';
        showBookNotification('ফাইল ডাউনলোড শুরু হচ্ছে...', 'success');
    }

    // Refresh data
    async function refreshBookData() {
        const btn = document.getElementById('refreshBookBtn');
        btn.disabled = true;
        btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.5rem; animation: spin 1s linear infinite;"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>রিফ্রেশ হচ্ছে...';
        
        await loadBookData();
        
        btn.disabled = false;
        btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 0.5rem;"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>রিফ্রেশ';
        showBookNotification('ডেটা রিফ্রেশ করা হয়েছে', 'success');
    }

    // Pagination
    function updateBookPagination() {
        const totalPages = Math.ceil(filteredBookData.length / bookItemsPerPage);
        const startIndex = (currentBookPage - 1) * bookItemsPerPage;
        const endIndex = Math.min(startIndex + bookItemsPerPage, filteredBookData.length);

        document.getElementById('showingBookStart').textContent = filteredBookData.length > 0 ? startIndex + 1 : 0;
        document.getElementById('showingBookEnd').textContent = endIndex;
        document.getElementById('totalBookEntries').textContent = filteredBookData.length;

        const container = document.getElementById('bookPaginationButtons');

        if (totalPages <= 1) {
            container.innerHTML = '';
            return;
        }

        let html = `
            <button class="book-pagination-btn" onclick="changeBookPage(${currentBookPage - 1})" ${currentBookPage === 1 ? 'disabled' : ''}>
                পূর্ববর্তী
            </button>
        `;

        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentBookPage - 1 && i <= currentBookPage + 1)) {
                html += `
                    <button class="book-pagination-btn ${i === currentBookPage ? 'active' : ''}" 
                        onclick="changeBookPage(${i})">
                        ${i}
                    </button>
                `;
            } else if (i === currentBookPage - 2 || i === currentBookPage + 2) {
                html += `<span style="padding: 0.5rem; color: #94a3b8;">...</span>`;
            }
        }

        html += `
            <button class="book-pagination-btn" onclick="changeBookPage(${currentBookPage + 1})" ${currentBookPage === totalPages ? 'disabled' : ''}>
                পরবর্তী
            </button>
        `;

        container.innerHTML = html;
    }

    function changeBookPage(page) {
        const totalPages = Math.ceil(filteredBookData.length / bookItemsPerPage);
        if (page < 1 || page > totalPages) return;
        
        currentBookPage = page;
        renderBookTable();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Helper functions
    function getBookStatusText(status) {
        const statusMap = {
            'pending': 'পেন্ডিং',
            'contacted': 'যোগাযোগ করা হয়েছে',
            'completed': 'সম্পন্ন'
        };
        return statusMap[status] || status;
    }

    function formatBookDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffMs = now - date;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMs / 3600000);
        const diffDays = Math.floor(diffMs / 86400000);

        if (diffMins < 1) return 'এখনই';
        if (diffMins < 60) return `${diffMins} মিনিট আগে`;
        if (diffHours < 24) return `${diffHours} ঘন্টা আগে`;
        if (diffDays < 7) return `${diffDays} দিন আগে`;

        return date.toLocaleDateString('bn-BD', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    function escapeBookHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function showBookNotification(message, type = 'success') {
        showBookAlert(message, type);
    }

    // Initialize when tab is shown
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('book')?.classList.contains('active')) {
            loadBookData();
        }

        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.target.id === 'book' && mutation.target.classList.contains('active')) {
                    loadBookData();
                }
            });
        });

        const bookTab = document.getElementById('book');
        if (bookTab) {
            observer.observe(bookTab, { attributes: true, attributeFilter: ['class'] });
        }
    });

    // Auto-refresh every 60 seconds
    setInterval(() => {
        if (document.getElementById('book')?.classList.contains('active')) {
            const oldLength = allBookData.length;
            loadBookData().then(() => {
                if (allBookData.length > oldLength) {
                    showBookNotification('নতুন বুকিং এসেছে!', 'success');
                }
            });
        }
    }, 60000);
</script>
<!-- Professional Confirmation Modal -->
<div id="bookConfirmModal" class="book-confirm-modal">
    <div class="book-confirm-modal-content">
        <div class="book-confirm-modal-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h3 id="bookConfirmModalTitle">নিশ্চিত করুন</h3>
        <p id="bookConfirmModalMessage">আপনি কি নিশ্চিত?</p>
        <div class="book-confirm-modal-actions">
            <button class="book-confirm-btn book-confirm-btn-cancel" id="bookConfirmModalCancel">বাতিল করুন</button>
            <button class="book-confirm-btn book-confirm-btn-confirm" id="bookConfirmModalConfirm">হ্যাঁ, নিশ্চিত</button>
        </div>
    </div>
</div>

<!-- Professional Alert Modal -->
<div id="bookAlertModal" class="book-alert-modal">
    <div class="book-alert-modal-content">
        <div class="book-alert-modal-icon" id="bookAlertModalIcon">
            <svg class="book-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="book-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="book-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <svg class="book-errormark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="book-errormark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="book-errormark__cross" fill="none" d="M16 16 36 36 M36 16 16 36"/>
            </svg>
        </div>
        <h3 id="bookAlertModalTitle"></h3>
        <p id="bookAlertModalMessage"></p>
        <button class="book-alert-modal-btn" id="bookAlertModalBtn">ঠিক আছে</button>
    </div>
</div>

<style>
    /* Professional Confirmation Modal Styles */
    .book-confirm-modal, .book-alert-modal {
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

    .book-confirm-modal.active, .book-alert-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .book-confirm-modal-content, .book-alert-modal-content {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        text-align: center;
        max-width: 420px;
        width: 90%;
        animation: slideUp 0.4s ease;
    }

    .book-confirm-modal-icon {
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

    .book-confirm-modal-icon svg {
        width: 40px;
        height: 40px;
    }

    #bookConfirmModalTitle, #bookAlertModalTitle {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: #1f2937;
    }

    #bookConfirmModalMessage, #bookAlertModalMessage {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .book-confirm-modal-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .book-confirm-btn {
        padding: 0.75rem 1.75rem;
        font-size: 1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .book-confirm-btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .book-confirm-btn-cancel:hover {
        background: #e5e7eb;
    }

    .book-confirm-btn-confirm {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }

    .book-confirm-btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.5);
    }

    /* Alert Modal Styles */
    .book-alert-modal-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
    }

    .book-alert-modal-icon svg {
        width: 100%;
        height: 100%;
    }

    .book-checkmark, .book-errormark {
        display: none;
    }

    .book-alert-modal-content.success .book-checkmark {
        display: block;
    }

    .book-alert-modal-content.error .book-errormark {
        display: block;
    }

    .book-checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #10b981;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .book-checkmark__check {
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke: #10b981;
        stroke-width: 3;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.4s forwards;
    }

    .book-errormark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke: #dc2626;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .book-errormark__cross {
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

    .book-alert-modal-btn {
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

    .book-alert-modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
    }

    .book-alert-modal-content.error .book-alert-modal-btn {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
    }
</style>

<script>
    // Professional Modal Functions
    function showBookConfirm(message, title = 'নিশ্চিত করুন') {
        return new Promise((resolve) => {
            const modal = document.getElementById('bookConfirmModal');
            const titleEl = document.getElementById('bookConfirmModalTitle');
            const messageEl = document.getElementById('bookConfirmModalMessage');
            const confirmBtn = document.getElementById('bookConfirmModalConfirm');
            const cancelBtn = document.getElementById('bookConfirmModalCancel');
            
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

    function showBookAlert(message, type = 'success', title = '') {
        const modal = document.getElementById('bookAlertModal');
        const content = modal.querySelector('.book-alert-modal-content');
        const titleEl = document.getElementById('bookAlertModalTitle');
        const messageEl = document.getElementById('bookAlertModalMessage');
        const btn = document.getElementById('bookAlertModalBtn');
        
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
</script>