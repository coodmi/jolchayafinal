<div id="bookings" class="tab-content">
    <div class="stats-grid" style="grid-template-columns: 1fr;">
        <div class="stat-card" style="width: 100%;">
            <div class="stat-card-content" style="display: flex; justify-content: space-between; align-items: center; gap: 20px;">
                <div class="stat-info" style="flex: 1;">
                    <h3>বুকিং তথ্য</h3>
                    <div class="subtitle">ওয়েবসাইট থেকে জমা দেওয়া সকল বুকিং রিকোয়েস্ট দেখুন এবং পরিচালনা করুন</div>
                </div>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <button onclick="exportBookingsCSV()" style="display: inline-flex; align-items: center; gap: 8px; padding: 0.75rem 1.25rem; background: #08452B; color: white; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        CSV এক্সপোর্ট
                    </button>
                    <button onclick="exportBookingsJSON()" style="display: inline-flex; align-items: center; gap: 8px; padding: 0.75rem 1.25rem; background: #DEDFE1; color: black; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        JSON এক্সপোর্ট
                    </button>
                    <div class="stat-icon purple" style="flex-shrink: 0; font-size: 2.5rem;"><i class="fas fa-clipboard-list"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <style>
        #bookingsTableBody tr {
            transition: background-color 0.2s ease;
        }
        #bookingsTableBody tr:hover {
            background-color: #f8fafc !important;
        }
    </style>
    <div style="overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 0.75rem; margin-top: 1.5rem; background: white;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8fafc;">
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">#</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">নাম</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">ফোন নম্বর</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">ইমেইল</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">প্লট সাইজ</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">বার্তা</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">স্ট্যাটাস</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">জমার তারিখ</th>
                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: #475569; font-size: 0.875rem; border-bottom: 2px solid #e2e8f0;">অ্যাকশন</th>
                </tr>
            </thead>
            <tbody id="bookingsTableBody">
                <tr>
                    <td colspan="9" style="text-align: center; padding: 3rem; color: #94a3b8;">
                        ডেটা লোড হচ্ছে...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        let bookingsDataCache = [];

        (function(){
            async function loadBookings() {
                try {
                    const response = await fetch('/api/bookings');
                    if (!response.ok) throw new Error('Failed to fetch');
                    
                    const bookings = await response.json();
                    bookingsDataCache = bookings;
                    const tbody = document.getElementById('bookingsTableBody');
                    
                    if (bookings.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="9" style="text-align: center; padding: 3rem; color: #94a3b8;">
                                    কোন বুকিং পাওয়া যায়নি
                                </td>
                            </tr>
                        `;
                        return;
                    }
                    
                    tbody.innerHTML = bookings.map((booking, index) => {
                        const statusColors = {
                            'pending': { bg: '#fef3c7', color: '#92400e', text: 'পেন্ডিং' },
                            'contacted': { bg: '#dbeafe', color: '#1e40af', text: 'যোগাযোগ করা হয়েছে' },
                            'completed': { bg: '#d1fae5', color: '#065f46', text: 'সম্পন্ন' }
                        };
                        const status = statusColors[booking.status] || statusColors.pending;
                        
                        const date = new Date(booking.created_at);
                        const formattedDate = date.toLocaleDateString('bn-BD', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric'
                        });
                        
                        return `
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">${index + 1}</td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;"><strong>${booking.name}</strong></td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                    <a href="tel:${booking.phone}" style="color: #3b82f6; text-decoration: none;">${booking.phone}</a>
                                </td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                    <a href="mailto:${booking.email}" style="color: #3b82f6; text-decoration: none;">${booking.email}</a>
                                </td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">${booking.plot_size || '-'}</td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="${booking.message || ''}">${booking.message || '-'}</td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #334155;">
                                    <span style="display: inline-flex; align-items: center; padding: 0.375rem 0.875rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: ${status.bg}; color: ${status.color};">
                                        ${status.text}
                                    </span>
                                </td>
                                <td style="padding: 1rem; font-size: 0.875rem; color: #64748b;">${formattedDate}</td>
                                <td style="padding: 1rem; font-size: 0.875rem;">
                                    <select onchange="changeBookingStatus(${booking.id}, this.value)" style="padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; font-size: 0.875rem; cursor: pointer; background: white;">
                                        <option value="">পরিবর্তন করুন</option>
                                        <option value="pending" ${booking.status === 'pending' ? 'disabled' : ''}>পেন্ডিং</option>
                                        <option value="contacted" ${booking.status === 'contacted' ? 'disabled' : ''}>যোগাযোগ করা হয়েছে</option>
                                        <option value="completed" ${booking.status === 'completed' ? 'disabled' : ''}>সম্পন্ন</option>
                                    </select>
                                </td>
                            </tr>
                        `;
                    }).join('');
                } catch (error) {
                    console.error('Error loading bookings:', error);
                    document.getElementById('bookingsTableBody').innerHTML = `
                        <tr>
                            <td colspan="9" style="text-align: center; padding: 3rem; color: #ef4444;">
                                ডেটা লোড করতে ব্যর্থ হয়েছে
                            </td>
                        </tr>
                    `;
                }
            }
            
            // Load when bookings tab becomes active
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    const bookingsTab = document.getElementById('bookings');
                    if (bookingsTab && bookingsTab.classList.contains('active')) {
                        loadBookings();
                        observer.disconnect();
                    }
                });
            });
            
            observer.observe(document.body, {
                attributes: true,
                subtree: true,
                attributeFilter: ['class']
            });
            
            // Also load immediately if already active
            if (document.getElementById('bookings')?.classList.contains('active')) {
                loadBookings();
            }

            // Make loadBookings globally accessible for refresh after status change
            window.reloadBookings = loadBookings;
        })();

        async function changeBookingStatus(bookingId, newStatus) {
            if (!newStatus) return;
            
            try {
                const response = await fetch(`/admin/bookings/${bookingId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({ status: newStatus })
                });

                if (!response.ok) throw new Error('Failed to update status');

                const result = await response.json();
                
                // Show success message
                if (typeof alertUser === 'function') {
                    alertUser('সফল', 'স্ট্যাটাস সফলভাবে আপডেট করা হয়েছে');
                }
                
                // Reload the bookings table
                if (typeof window.reloadBookings === 'function') {
                    window.reloadBookings();
                }
            } catch (error) {
                console.error('Error updating status:', error);
                if (typeof alertUser === 'function') {
                    alertUser('ত্রুটি', 'স্ট্যাটাস আপডেট করতে ব্যর্থ হয়েছে');
                } else {
                    alert('স্ট্যাটাস আপডেট করতে ব্যর্থ হয়েছে');
                }
                
                // Reload to reset the dropdown
                if (typeof window.reloadBookings === 'function') {
                    window.reloadBookings();
                }
            }
        }

        function exportBookingsCSV() {
            if (bookingsDataCache.length === 0) {
                if (typeof alertUser === 'function') {
                    alertUser('সতর্কতা', 'এক্সপোর্ট করার জন্য কোন ডেটা নেই');
                }
                return;
            }

            // CSV Headers
            const headers = ['#', 'নাম', 'ফোন নম্বর', 'ইমেইল', 'প্লট সাইজ', 'বার্তা', 'স্ট্যাটাস', 'জমার তারিখ'];
            
            // CSV Rows
            const rows = bookingsDataCache.map((booking, index) => {
                const statusMap = {
                    'pending': 'পেন্ডিং',
                    'contacted': 'যোগাযোগ করা হয়েছে',
                    'completed': 'সম্পন্ন'
                };
                
                const date = new Date(booking.created_at);
                const formattedDate = date.toLocaleDateString('bn-BD', {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric'
                });

                return [
                    index + 1,
                    booking.name,
                    booking.phone,
                    booking.email,
                    booking.plot_size || '-',
                    (booking.message || '-').replace(/"/g, '""'),
                    statusMap[booking.status] || booking.status,
                    formattedDate
                ];
            });

            // Create CSV content
            const csvContent = [
                headers.join(','),
                ...rows.map(row => row.map(cell => `"${cell}"`).join(','))
            ].join('\n');

            // Add BOM for UTF-8
            const BOM = '\uFEFF';
            const blob = new Blob([BOM + csvContent], { type: 'text/csv;charset=utf-8;' });
            
            // Download file
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', `bookings_${new Date().toISOString().split('T')[0]}.csv`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function exportBookingsJSON() {
            if (bookingsDataCache.length === 0) {
                if (typeof alertUser === 'function') {
                    alertUser('সতর্কতা', 'এক্সপোর্ট করার জন্য কোন ডেটা নেই');
                }
                return;
            }

            // Create JSON content
            const jsonContent = JSON.stringify(bookingsDataCache, null, 2);
            
            // Download file
            const blob = new Blob([jsonContent], { type: 'application/json' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', `bookings_${new Date().toISOString().split('T')[0]}.json`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</div>
