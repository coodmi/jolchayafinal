<div id="overview" class="tab-content active">
    <style>
        #overview {
            margin-top: 20px;
        }
        
        .overview-container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px 0 0 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #0d3d29, #1a7a4a);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(13, 61, 41, 0.12), 0 4px 8px rgba(13, 61, 41, 0.08);
            border-color: #0d3d29;
        }
        
        .stat-card:hover::before {
            opacity: 1;
        }
        
        .stat-card-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }
        
        .stat-info {
            flex: 1;
        }
        
        .stat-info h3 {
            font-size: 12px;
            font-weight: 700;
            color: #6b7280;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .stat-info .value {
            font-size: 36px;
            font-weight: 800;
            color: #111827;
            margin: 0 0 6px 0;
            line-height: 1;
            background: linear-gradient(135deg, #0d3d29 0%, #1a7a4a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-info .subtitle {
            font-size: 13px;
            color: #9ca3af;
            font-weight: 500;
        }
        
        .stat-info .trend {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 700;
            margin-top: 8px;
            padding: 5px 10px;
            border-radius: 20px;
            letter-spacing: 0.3px;
        }
        
        .stat-info .trend.up {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }
        
        .stat-info .trend.down {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }
        
        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }
        
        .stat-icon.blue { 
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.4);
        }
        .stat-icon.green { 
            background: linear-gradient(135deg, #10b981 0%, #059669 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(16, 185, 129, 0.4);
        }
        .stat-icon.yellow { 
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(245, 158, 11, 0.4);
        }
        .stat-icon.purple { 
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(139, 92, 246, 0.4);
        }
        .stat-icon.red { 
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(239, 68, 68, 0.4);
        }
        .stat-icon.teal { 
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); 
            color: white;
            box-shadow: 0 4px 16px rgba(20, 184, 166, 0.4);
        }
        
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }
        
        .chart-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.03);
            border: 1px solid #f0f0f0;
            transition: all 0.3s;
        }
        
        .chart-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
            border-color: #e5e7eb;
        }
        
        .chart-card h3 {
            margin: 0 0 20px 0;
            font-size: 17px;
            font-weight: 700;
            color: #111827;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f3f4f6;
        }
        
        .chart-card h3 i {
            color: #0d3d29;
            font-size: 20px;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        .activity-feed {
            max-height: 420px;
            overflow-y: auto;
            padding-right: 4px;
        }
        
        .activity-feed::-webkit-scrollbar {
            width: 5px;
        }
        
        .activity-feed::-webkit-scrollbar-track {
            background: #f9fafb;
            border-radius: 10px;
        }
        
        .activity-feed::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #d1d5db 0%, #9ca3af 100%);
            border-radius: 10px;
        }
        
        .activity-feed::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #9ca3af 0%, #6b7280 100%);
        }
        
        .activity-item {
            padding: 16px;
            border-left: 3px solid #e5e7eb;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            border-radius: 0 10px 10px 0;
            transition: all 0.3s;
            position: relative;
        }
        
        .activity-item::before {
            content: '';
            position: absolute;
            left: -3px;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, #0d3d29 0%, #1a7a4a 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .activity-item:hover {
            background: linear-gradient(135deg, #f3f4f6 0%, #ffffff 100%);
            transform: translateX(4px);
        }
        
        .activity-item:hover::before {
            opacity: 1;
        }
        
        .activity-item .activity-title {
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
            font-size: 14px;
        }
        
        .activity-item .activity-desc {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
            line-height: 1.5;
        }
        
        .activity-item .activity-time {
            font-size: 11px;
            color: #9ca3af;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .activity-item .activity-time i {
            font-size: 10px;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }
        
        .status-badge.pending { 
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); 
            color: #92400e;
            box-shadow: 0 2px 4px rgba(245, 158, 11, 0.2);
        }
        .status-badge.active { 
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); 
            color: #1e40af;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
        }
        .status-badge.completed { 
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); 
            color: #065f46;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }
        
        @media (max-width: 1200px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            #overview {
                margin-top: 16px;
            }
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .stat-card {
                padding: 18px 20px;
            }
            .stat-card-content {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
            .stat-info .value {
                font-size: 32px;
            }
            .stat-icon {
                width: 64px;
                height: 64px;
                font-size: 26px;
                border-radius: 16px;
                flex-shrink: 0;
            }
            .chart-container {
                height: 260px;
            }
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    
    <div class="overview-container">
        <!-- Stats Grid -->
        <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>মোট বুকিং</h3>
                    <div class="value" id="statTotalBookings">0</div>
                    <div class="subtitle">সর্বমোট গ্রাহক</div>
                    <div class="trend up" id="bookingsTrend" style="display:none;">
                        <i class="fas fa-arrow-up"></i> <span id="bookingsTrendValue">0%</span>
                    </div>
                </div>
                <div class="stat-icon blue"><i class="fas fa-users"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>সক্রিয় বুকিং</h3>
                    <div class="value" id="statActiveBookings">0</div>
                    <div class="subtitle">চলমান</div>
                    <div class="trend up" id="activeTrend" style="display:none;">
                        <i class="fas fa-arrow-up"></i> <span id="activeTrendValue">0%</span>
                    </div>
                </div>
                <div class="stat-icon green"><i class="fas fa-chart-line"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>মোট প্রকল্প</h3>
                    <div class="value" id="statTotalProjects">0</div>
                    <div class="subtitle">প্রকাশিত</div>
                </div>
                <div class="stat-icon purple"><i class="fas fa-building"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>টিম সদস্য</h3>
                    <div class="value" id="statTeamMembers">0</div>
                    <div class="subtitle">সক্রিয়</div>
                </div>
                <div class="stat-icon yellow"><i class="fas fa-user-tie"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>অপেক্ষমাণ বুকিং</h3>
                    <div class="value" id="statPendingBookings">0</div>
                    <div class="subtitle">পর্যালোচনা প্রয়োজন</div>
                </div>
                <div class="stat-icon red"><i class="fas fa-clock"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>সম্পন্ন বুকিং</h3>
                    <div class="value" id="statCompletedBookings">0</div>
                    <div class="subtitle">সফল</div>
                </div>
                <div class="stat-icon teal"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>মোট রেজিস্ট্রেশন</h3>
                    <div class="value" id="statTotalRegistrations">0</div>
                    <div class="subtitle">প্লট রেজিস্ট্রেশন</div>
                </div>
                <div class="stat-icon blue"><i class="fas fa-file-contract"></i></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-info">
                    <h3>অপেক্ষমাণ রেজিস্ট্রেশন</h3>
                    <div class="value" id="statPendingRegistrations">0</div>
                    <div class="subtitle">পর্যালোচনা প্রয়োজন</div>
                </div>
                <div class="stat-icon red"><i class="fas fa-user-clock"></i></div>
            </div>
        </div>
    </div>

    <!-- Charts Grid -->
    <div class="charts-grid">
        <div class="chart-card">
            <h3><i class="fas fa-chart-bar"></i> মাসিক বুকিং প্রবণতা</h3>
            <div class="chart-container">
                <canvas id="bookingsChart"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <h3><i class="fas fa-pie-chart"></i> বুকিং স্ট্যাটাস বিতরণ</h3>
            <div class="chart-container">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Activity & Recent Bookings -->
    <div class="charts-grid">
        <div class="chart-card">
            <h3><i class="fas fa-history"></i> সাম্প্রতিক কার্যক্রম</h3>
            <div class="activity-feed" id="recentActivity">
                <div style="text-align: center; padding: 40px; color: #9ca3af;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 32px;"></i>
                    <p style="margin-top: 12px;">তথ্য লোড হচ্ছে...</p>
                </div>
            </div>
        </div>

        <div class="chart-card">
            <h3><i class="fas fa-calendar-check"></i> সাম্প্রতিক বুকিং</h3>
            <div class="activity-feed" id="recentBookings">
                <div style="text-align: center; padding: 40px; color: #9ca3af;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 32px;"></i>
                    <p style="margin-top: 12px;">তথ্য লোড হচ্ছে...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            let bookingsChart, statusChart;

            // Load Dashboard Data
            async function loadDashboardData() {
                try {
                    // Fetch bookings
                    const bookingsResponse = await fetch('/api/bookings');
                    const bookings = await bookingsResponse.json();

                    // Fetch registrations (Admin API)
                    let registrations = [];
                    let regStats = { total: 0, pending: 0 };
                    try {
                        const regResponse = await fetch('/admin/registrations', {
                            headers: { 'X-Requested-With': 'XMLHttpRequest' }
                        });
                        const regData = await regResponse.json();
                        registrations = regData.registrations.data;
                        regStats = regData.stats;
                    } catch (e) { console.error('Error fetching registrations:', e); }
                    
                    // Fetch projects
                    const projectsResponse = await fetch('/api/our-projects');
                    const projects = await projectsResponse.json();

                    // Fetch team members
                    const teamResponse = await fetch('/api/team-members');
                    const teamMembers = await teamResponse.json();

                    // Update statistics
                    updateStatistics(bookings, projects, teamMembers, regStats);
                    
                    // Update charts
                    updateCharts(bookings, registrations);
                    
                    // Update activity feeds
                    updateActivityFeeds(bookings, registrations);
                    
                } catch (error) {
                    console.error('Error loading dashboard data:', error);
                }
            }

            function updateStatistics(bookings, projects, teamMembers, regStats) {
                // Total bookings
                document.getElementById('statTotalBookings').textContent = bookings.length;

                // Active bookings (status = active or pending)
                const activeBookings = bookings.filter(b => b.status === 'active' || b.status === 'pending');
                document.getElementById('statActiveBookings').textContent = activeBookings.length;

                // Pending bookings
                const pendingBookings = bookings.filter(b => b.status === 'pending');
                document.getElementById('statPendingBookings').textContent = pendingBookings.length;

                // Completed bookings
                const completedBookings = bookings.filter(b => b.status === 'completed');
                document.getElementById('statCompletedBookings').textContent = completedBookings.length;

                // Total projects
                document.getElementById('statTotalProjects').textContent = projects.length;

                // Team members
                document.getElementById('statTeamMembers').textContent = teamMembers.length;

                // Plot Registrations
                if (regStats) {
                    document.getElementById('statTotalRegistrations').textContent = regStats.total || 0;
                    document.getElementById('statPendingRegistrations').textContent = regStats.pending || 0;
                }

                // Calculate trends (compare with previous period)
                calculateTrends(bookings);
            }

            function calculateTrends(bookings) {
                const now = new Date();
                const thisMonth = bookings.filter(b => {
                    const bookingDate = new Date(b.created_at);
                    return bookingDate.getMonth() === now.getMonth() && 
                           bookingDate.getFullYear() === now.getFullYear();
                }).length;

                const lastMonth = bookings.filter(b => {
                    const bookingDate = new Date(b.created_at);
                    const lastMonthDate = new Date(now.getFullYear(), now.getMonth() - 1);
                    return bookingDate.getMonth() === lastMonthDate.getMonth() && 
                           bookingDate.getFullYear() === lastMonthDate.getFullYear();
                }).length;

                if (lastMonth > 0) {
                    const trendPercent = Math.round(((thisMonth - lastMonth) / lastMonth) * 100);
                    const trendEl = document.getElementById('bookingsTrend');
                    const trendValueEl = document.getElementById('bookingsTrendValue');
                    
                    if (trendPercent !== 0) {
                        trendEl.style.display = 'inline-flex';
                        trendValueEl.textContent = Math.abs(trendPercent) + '%';
                        
                        if (trendPercent > 0) {
                            trendEl.className = 'trend up';
                            trendEl.innerHTML = '<i class="fas fa-arrow-up"></i> <span>' + trendPercent + '%</span>';
                        } else {
                            trendEl.className = 'trend down';
                            trendEl.innerHTML = '<i class="fas fa-arrow-down"></i> <span>' + Math.abs(trendPercent) + '%</span>';
                        }
                    }
                }
            }

            function updateCharts(bookings, registrations) {
                // Monthly bookings chart
                const monthlyData = getMonthlyData(bookings);
                createBookingsChart(monthlyData);

                // Status distribution chart
                const statusData = getStatusData(bookings, registrations);
                createStatusChart(statusData);
            }

            function getMonthlyData(bookings) {
                const months = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 
                               'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
                const currentYear = new Date().getFullYear();
                const data = new Array(12).fill(0);

                bookings.forEach(booking => {
                    const date = new Date(booking.created_at);
                    if (date.getFullYear() === currentYear) {
                        data[date.getMonth()]++;
                    }
                });

                return { labels: months, data: data };
            }

            function getStatusData(bookings) {
                const statusCount = {
                    pending: 0,
                    active: 0,
                    completed: 0
                };

                bookings.forEach(booking => {
                    if (statusCount.hasOwnProperty(booking.status)) {
                        statusCount[booking.status]++;
                    }
                });

                return {
                    labels: ['অপেক্ষমাণ', 'সক্রিয়', 'সম্পন্ন'],
                    data: [statusCount.pending, statusCount.active, statusCount.completed],
                    colors: ['#f59e0b', '#3b82f6', '#10b981']
                };
            }

            function createBookingsChart(monthlyData) {
                const ctx = document.getElementById('bookingsChart');
                if (!ctx) return;

                if (bookingsChart) {
                    bookingsChart.destroy();
                }

                bookingsChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: monthlyData.labels,
                        datasets: [{
                            label: 'বুকিং সংখ্যা',
                            data: monthlyData.data,
                            borderColor: '#0d3d29',
                            backgroundColor: 'rgba(13, 61, 41, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            pointBackgroundColor: '#0d3d29',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: { size: 14 },
                                bodyFont: { size: 13 },
                                borderColor: '#0d3d29',
                                borderWidth: 1
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    font: { size: 12 }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                ticks: {
                                    font: { size: 11 }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            function createStatusChart(statusData) {
                const ctx = document.getElementById('statusChart');
                if (!ctx) return;

                if (statusChart) {
                    statusChart.destroy();
                }

                statusChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: statusData.labels,
                        datasets: [{
                            data: statusData.data,
                            backgroundColor: statusData.colors,
                            borderWidth: 0,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    font: { size: 13 },
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: { size: 14 },
                                bodyFont: { size: 13 }
                            }
                        },
                        cutout: '70%'
                    }
                });
            }

            function updateActivityFeeds(bookings, registrations) {
                // Recent bookings
                const recentBookings = bookings.slice(0, 5);
                const bookingsHtml = recentBookings.map(booking => {
                    const date = new Date(booking.created_at);
                    const timeAgo = getTimeAgo(date);
                    const statusClass = booking.status || 'pending';
                    const statusText = {
                        pending: 'অপেক্ষমাণ',
                        active: 'সক্রিয়',
                        completed: 'সম্পন্ন'
                    }[statusClass] || 'অপেক্ষমাণ';

                    return `
                        <div class="activity-item">
                            <div class="activity-title">${booking.name || 'নাম নেই'}</div>
                            <div class="activity-desc">
                                <i class="fas fa-phone"></i> ${booking.phone || 'N/A'} | 
                                <i class="fas fa-envelope"></i> ${booking.email || 'N/A'}
                            </div>
                            <div class="activity-desc">
                                ${booking.plot_size ? '<i class="fas fa-home"></i> ' + booking.plot_size : ''}
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
                                <span class="status-badge ${statusClass}">${statusText}</span>
                                <span class="activity-time"><i class="fas fa-clock"></i> ${timeAgo}</span>
                            </div>
                        </div>
                    `;
                }).join('');

                document.getElementById('recentBookings').innerHTML = bookingsHtml || '<div style="text-align: center; padding: 40px; color: #9ca3af;">কোনো বুকিং নেই</div>';

                // Recent activity (all activities)
                const activities = [];
                
                bookings.forEach(booking => {
                    activities.push({
                        type: 'booking',
                        title: `নতুন বুকিং: ${booking.name}`,
                        desc: `${booking.plot_size || 'প্লট সাইজ উল্লেখ নেই'} - ${booking.phone}`,
                        time: new Date(booking.created_at)
                    });
                });

                if (registrations) {
                    registrations.forEach(reg => {
                        activities.push({
                            type: 'registration',
                            title: `নতুন রেজিস্ট্রেশন: ${reg.applicant_name}`,
                            desc: `${reg.project_name || 'প্রকল্প উল্লেখ নেই'} - ${reg.mobile}`,
                            time: new Date(reg.created_at)
                        });
                    });
                }

                activities.sort((a, b) => b.time - a.time);
                const recentActivities = activities.slice(0, 10);

                const activitiesHtml = recentActivities.map(activity => {
                    const timeAgo = getTimeAgo(activity.time);
                    let icon = 'fa-info-circle';
                    if (activity.type === 'booking') icon = 'fa-calendar-check';
                    if (activity.type === 'registration') icon = 'fa-file-signature';
                    
                    return `
                        <div class="activity-item">
                            <div class="activity-title"><i class="fas ${icon}"></i> ${activity.title}</div>
                            <div class="activity-desc">${activity.desc}</div>
                            <div class="activity-time"><i class="fas fa-clock"></i> ${timeAgo}</div>
                        </div>
                    `;
                }).join('');

                document.getElementById('recentActivity').innerHTML = activitiesHtml || '<div style="text-align: center; padding: 40px; color: #9ca3af;">কোনো কার্যক্রম নেই</div>';
            }

            function getTimeAgo(date) {
                const seconds = Math.floor((new Date() - date) / 1000);
                
                const intervals = {
                    'বছর': 31536000,
                    'মাস': 2592000,
                    'দিন': 86400,
                    'ঘন্টা': 3600,
                    'মিনিট': 60
                };

                for (let [name, value] of Object.entries(intervals)) {
                    const interval = Math.floor(seconds / value);
                    if (interval >= 1) {
                        return `${interval} ${name} আগে`;
                    }
                }

                return 'এখনই';
            }

            // Initial load
            loadDashboardData();

            // Refresh every 30 seconds
            setInterval(loadDashboardData, 30000);

            // Listen for updates
            window.addEventListener('storage', function(e) {
                if (e.key === 'refreshBookings' || e.key === 'refreshOurProjects') {
                    loadDashboardData();
                }
            });
        })();
    </script>
    </div>
</div>