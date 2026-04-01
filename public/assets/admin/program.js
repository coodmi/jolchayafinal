// ==================== TOAST NOTIFICATION SYSTEM ====================
(function () {
  function ensureContainer() {
    if (document.getElementById('adminToastContainer')) return;

    const style = document.createElement('style');
    style.id = 'adminToastStyle';
    style.textContent = `
      #adminToastContainer {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 99999;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        gap: 12px;
      }
      .admin-toast {
        pointer-events: all;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 12px;
        width: 340px;
        max-width: 90vw;
        background: #ffffff;
        border-radius: 20px;
        padding: 32px 28px 24px;
        box-shadow: 0 24px 60px rgba(0,0,0,0.18), 0 4px 16px rgba(0,0,0,0.08);
        animation: toastPopIn 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards;
        position: relative;
        overflow: hidden;
      }
      .admin-toast.toast-out {
        animation: toastPopOut 0.25s ease forwards;
      }
      .admin-toast-icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 28px;
        background: #dcfce7;
        color: #16a34a;
        margin-bottom: 4px;
      }
      .admin-toast.toast-error   .admin-toast-icon { background:#fee2e2; color:#dc2626; }
      .admin-toast.toast-warning .admin-toast-icon { background:#fef3c7; color:#d97706; }
      .admin-toast.toast-info    .admin-toast-icon { background:#dbeafe; color:#2563eb; }
      .admin-toast-body { width: 100%; }
      .admin-toast-title {
        font-size: 18px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 6px;
      }
      .admin-toast-msg {
        font-size: 14px;
        color: #64748b;
        line-height: 1.6;
        word-break: break-word;
      }
      .admin-toast-close {
        position: absolute;
        top: 14px; right: 16px;
        background: #f1f5f9;
        border: none;
        cursor: pointer;
        color: #94a3b8;
        font-size: 14px;
        width: 28px; height: 28px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        transition: background 0.15s, color 0.15s;
      }
      .admin-toast-close:hover { background: #e2e8f0; color: #475569; }
      .admin-toast-progress {
        position: absolute;
        bottom: 0; left: 0;
        height: 4px;
        background: #22c55e;
        border-radius: 0 0 20px 20px;
        animation: toastProgress linear forwards;
      }
      .admin-toast.toast-error   .admin-toast-progress { background: #ef4444; }
      .admin-toast.toast-warning .admin-toast-progress { background: #f59e0b; }
      .admin-toast.toast-info    .admin-toast-progress { background: #3b82f6; }
      /* Backdrop blur overlay */
      #adminToastContainer::before {
        content: '';
        position: fixed;
        inset: 0;
        background: rgba(15,23,42,0.35);
        z-index: -1;
        animation: toastBgIn 0.3s ease forwards;
      }
      #adminToastContainer.hiding::before {
        animation: toastBgOut 0.25s ease forwards;
      }
      @keyframes toastBgIn  { from { opacity:0; } to { opacity:1; } }
      @keyframes toastBgOut { from { opacity:1; } to { opacity:0; } }
      @keyframes toastPopIn {
        from { opacity:0; transform: scale(0.8) translateY(20px); }
        to   { opacity:1; transform: scale(1)   translateY(0); }
      }
      @keyframes toastPopOut {
        from { opacity:1; transform: scale(1)   translateY(0); }
        to   { opacity:0; transform: scale(0.85) translateY(10px); }
      }
      @keyframes toastProgress {
        from { width: 100%; }
        to   { width: 0%; }
      }
    `;
    document.head.appendChild(style);
    const container = document.createElement('div');
    container.id = 'adminToastContainer';
    document.body.appendChild(container);
  }

  function showToast(type, title, message, duration) {
    ensureContainer();
    duration = duration || 4000;
    const icons = {
      success: '✓',
      error:   '✕',
      warning: '⚠',
      info:    'ℹ',
    };
    const titles = {
      success: title || 'সফল',
      error:   title || 'ত্রুটি',
      warning: title || 'সতর্কতা',
      info:    title || 'তথ্য',
    };
    const toast = document.createElement('div');
    toast.className = 'admin-toast toast-' + type;
    toast.innerHTML = `
      <div class="admin-toast-icon">${icons[type] || '✓'}</div>
      <div class="admin-toast-body">
        <div class="admin-toast-title">${titles[type]}</div>
        <div class="admin-toast-msg">${message || ''}</div>
      </div>
      <button class="admin-toast-close" aria-label="বন্ধ করুন">×</button>
      <div class="admin-toast-progress" style="animation-duration:${duration}ms;"></div>
    `;
    const container = document.getElementById('adminToastContainer');
    container.appendChild(toast);

    function dismiss() {
      toast.classList.add('toast-out');
      setTimeout(() => toast.remove(), 320);
    }
    toast.querySelector('.admin-toast-close').addEventListener('click', dismiss);
    setTimeout(dismiss, duration);
  }

  window.showSuccess = function (message, title) { showToast('success', title || 'সফল', message); };
  window.showError   = function (message, title) { showToast('error',   title || 'ত্রুটি', message); };
  window.showWarning = function (message, title) { showToast('warning', title || 'সতর্কতা', message); };
  window.showInfo    = function (message, title) { showToast('info',    title || 'তথ্য', message); };
  window.showToast   = showToast;
})();
// ==================== END TOAST SYSTEM ====================

const bookingsData = [
  {
    id: 1,
    name: "রহিম আহমেদ",
    phone: "01711111111",
    email: "rahim@example.com",
    plotSize: "২.৫ কাঠা",
    plotNumber: "A-101",
    amount: 8000000,
    paid: 3500000,
    status: "active",
    date: "2025-01-15",
  },
  {
    id: 2,
    name: "করিম হোসেন",
    phone: "01722222222",
    email: "karim@example.com",
    plotSize: "৫ কাঠা",
    plotNumber: "B-205",
    amount: 15000000,
    paid: 15000000,
    status: "completed",
    date: "2024-11-20",
  },
  {
    id: 3,
    name: "সাফিয়া বেগম",
    phone: "01833333333",
    email: "safia@example.com",
    plotSize: "৩.৭৫ কাঠা",
    plotNumber: "C-310",
    amount: 12500000,
    paid: 500000,
    status: "pending",
    date: "2025-03-01",
  },
  {
    id: 4,
    name: "জসিম উদ্দিন",
    phone: "01944444444",
    email: "jasim@example.com",
    plotSize: "২.৫ কাঠা",
    plotNumber: "A-102",
    amount: 8000000,
    paid: 8000000,
    status: "completed",
    date: "2024-12-10",
  },
  {
    id: 5,
    name: "ফরিদা আক্তার",
    phone: "01655555555",
    email: "farida@example.com",
    plotSize: "৫ কাঠা",
    plotNumber: "B-206",
    amount: 16000000,
    paid: 6000000,
    status: "active",
    date: "2025-02-28",
  },
];

const plotData = [
  { id: "A-101", size: "২.৫ কাঠা", price: 8000000, block: "A", status: "sold" },
  { id: "A-102", size: "২.৫ কাঠা", price: 8000000, block: "A", status: "sold" },
  {
    id: "A-103",
    size: "২.৫ কাঠা",
    price: 8200000,
    block: "A",
    status: "available",
  },
  { id: "B-205", size: "৫ কাঠা", price: 15000000, block: "B", status: "sold" },
  { id: "B-206", size: "৫ কাঠা", price: 16000000, block: "B", status: "sold" },
  {
    id: "B-207",
    size: "৫ কাঠা",
    price: 15500000,
    block: "B",
    status: "available",
  },
  {
    id: "C-310",
    size: "৩.৭৫ কাঠা",
    price: 12500000,
    block: "C",
    status: "reserved",
  },
  {
    id: "C-311",
    size: "৩.৭৫ কাঠা",
    price: 12800000,
    block: "C",
    status: "available",
  },
];

// Utility Functions
const formatCurrency = (amount) => {
  return `৳${(amount / 100000)
    .toFixed(2)
    .replace(/\B(?=(\d{2})+(?!\d))/g, ",")}L`;
};

const formatFullCurrency = (amount) => {
  return `৳${amount.toLocaleString("en-IN")}`;
};

const getStatusBadge = (status) => {
  let className = "";
  let text = "";
  switch (status) {
    case "active":
      className = "status-active";
      text = "সক্রিয়";
      break;
    case "pending":
      className = "status-pending";
      text = "বিচারাধীন";
      break;
    case "completed":
      className = "status-completed";
      text = "সম্পন্ন";
      break;
    case "available":
      className = "plot-status available";
      text = "উপলব্ধ";
      break;
    case "reserved":
      className = "plot-status reserved";
      text = "সংরক্ষিত";
      break;
    case "sold":
      className = "plot-status sold";
      text = "বিক্রিত";
      break;
    default:
      className = "";
      text = status;
  }
  return `<span class="status-badge ${className}">${text}</span>`;
};

// Global Variables for Charts
let salesChartInstance, revenueChartInstance, plotChartInstance;

// 1. Sidebar and Tab Management
const pageTitles = {
  overview: "ড্যাশবোর্ড ওভারভিউ",
  home: "হোম",
  about: "আমাদের সম্পর্কে",
  projects: "প্রকল্প",
  bookings: "বুকিং তথ্য",
  news: "নিউজ ম্যানেজমেন্ট",
  header: "হেডার",
  footer: "ফুটার",
  "footer-preview": "ফুটার প্রিভিউ",
  contact: "কন্ট্যাক্ট প্রিভিউ",
  plots: "প্লট তালিকা",
  customers: "গ্রাহক তালিকা",
  reports: "রিপোর্ট ও বিশ্লেষণ",
  settings: "সেটিংস",
  "site-settings": "সাইট সেটিংস",
};

function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("collapsed");
}

// Toggle Home submenu with fade/expand only (do not switch tab)
function toggleHomeMenu() {
  const submenu = document.getElementById("homeSubmenu");
  if (submenu) {
    submenu.classList.toggle("open");
    const trigger = document.querySelector('.nav-item[data-tab="home"]');
    if (trigger)
      trigger.setAttribute(
        "aria-expanded",
        submenu.classList.contains("open") ? "true" : "false"
      );
  }
}

// Toggle About submenu with fade/expand only (do not switch tab)
function toggleAboutMenu() {
  const submenu = document.getElementById("aboutSubmenu");
  if (submenu) {
    submenu.classList.toggle("open");
    const trigger = document.querySelector('.nav-item[data-tab="about"]');
    if (trigger)
      trigger.setAttribute(
        "aria-expanded",
        submenu.classList.contains("open") ? "true" : "false"
      );
  }
}

// Toggle Projects submenu with fade/expand only (do not switch tab)
function toggleProjectsMenu() {
  const submenu = document.getElementById("projectsSubmenu");
  if (submenu) {
    submenu.classList.toggle("open");
    const trigger = document.querySelector('.nav-item[data-tab="projects"]');
    if (trigger)
      trigger.setAttribute(
        "aria-expanded",
        submenu.classList.contains("open") ? "true" : "false"
      );
  }
}

// Update active submenu item
function updateActiveSubmenu(tabId, sectionId) {
  // Remove active class from all subitems
  document.querySelectorAll(".nav-subitem").forEach((item) => {
    item.classList.remove("active");
  });

  // Add active class to current subitem
  if (sectionId) {
    const activeSubitem = document.querySelector(
      `.nav-subitem[onclick*="'${sectionId}'"]`
    );
    if (activeSubitem) {
      activeSubitem.classList.add("active");
    }
  }
}

// Navigate to a tab and scroll to a section smoothly
function navigateTo(tabId, sectionId, skipAnimation = false) {
  // Check if we're on the dashboard page - if not, redirect to dashboard with tab and section
  const isDashboardPage = window.location.pathname === "/dashboard";
  if (!isDashboardPage) {
    window.location.href =
      "/dashboard?tab=" + tabId + (sectionId ? "&section=" + sectionId : "");
    return;
  }

  showTab(tabId);

  // Update active submenu item
  updateActiveSubmenu(tabId, sectionId);

  // Save current section to localStorage
  try {
    localStorage.setItem("adminActiveSection", sectionId || "");
    localStorage.setItem("adminActiveTab", tabId || "");
  } catch (e) {
    /* ignore */
  }

  // Small delay to allow DOM to update visibility
  setTimeout(() => {
    // Within the tab, show only the requested section block (hide others)
    if (sectionId) {
      const tabEl = document.getElementById(tabId);
      if (tabEl) {
        const blocks = tabEl.querySelectorAll('[id^="' + tabId + '-"]');
        blocks.forEach((sec) => {
          sec.style.display = sec.id === sectionId ? "block" : "none";
        });
      }
    }
    // If navigating to Home > Testimonials editor, broadcast a signal so the public site refreshes its carousel
    try {
      if (tabId === "home" && sectionId === "home-testimonials") {
        localStorage.setItem("refreshTestimonials", String(Date.now()));
      }
    } catch (e) {
      /* ignore */
    }
    // Special case: for Home > Hero, scroll to top of Home tab
    const target =
      tabId === "home" && sectionId === "home-hero"
        ? document.getElementById("home")
        : document.getElementById(sectionId);
    if (!target) return;
    // Prefer scrolling within content area if present
    const container = document.querySelector(".content-area");
    if (container && container.contains(target)) {
      // Compute offsetTop relative to container to align exactly at top
      let top = 0;
      let node = target;
      while (node && node !== container) {
        top += node.offsetTop;
        node = node.offsetParent;
      }
      // Use instant scroll if skipAnimation is true (e.g., on page load)
      container.scrollTo({ top, behavior: skipAnimation ? "auto" : "smooth" });
    } else {
      target.scrollIntoView({
        behavior: skipAnimation ? "auto" : "smooth",
        block: "start",
      });
    }
  }, 50);
}

function showTab(tabId) {
  // Check if we're on the dashboard page - if not, redirect to dashboard with tab
  const isDashboardPage = window.location.pathname === "/dashboard";
  if (!isDashboardPage) {
    window.location.href = "/dashboard?tab=" + tabId;
    return;
  }

  // Update active sidebar item
  document.querySelectorAll(".nav-item").forEach((item) => {
    item.classList.remove("active");
  });
  const activeItem = document.querySelector(`.nav-item[data-tab="${tabId}"]`);
  if (activeItem) activeItem.classList.add("active");

  // Hide all tab content
  document.querySelectorAll(".tab-content").forEach((content) => {
    content.classList.remove("active");
  });

  // Show current tab content
  const currentTab = document.getElementById(tabId);
  if (currentTab) {
    currentTab.classList.add("active");

    // Reset subsection visibility - show all subsections within this tab
    const subsections = currentTab.querySelectorAll('[id^="' + tabId + '-"]');
    subsections.forEach((sec) => {
      sec.style.display = "block";
    });
  }

  // Update header title
  document.getElementById("pageTitle").textContent =
    pageTitles[tabId] || "ড্যাশবোর্ড";

  // Auto-collapse submenus when switching to other tabs
  const homeSub = document.getElementById("homeSubmenu");
  const aboutSub = document.getElementById("aboutSubmenu");
  const projectsSub = document.getElementById("projectsSubmenu");
  if (homeSub && tabId !== "home") homeSub.classList.remove("open");
  if (aboutSub && tabId !== "about") aboutSub.classList.remove("open");
  if (projectsSub && tabId !== "projects") projectsSub.classList.remove("open");

  // Re-render charts/data for the visible tab
  if (tabId === "overview") {
    renderOverview();
  } else if (tabId === "plots") {
    renderPlotsGrid();
  } else if (tabId === "footer") {
    // Load footer settings when footer tab is shown
    try {
      loadFooterSettings();
    } catch (e) {
      console.error("Error loading footer settings:", e);
    }
  }

  // Save current tab to localStorage
  try {
    localStorage.setItem("adminActiveTab", tabId);
    // Clear section when switching to a tab without section navigation
    localStorage.removeItem("adminActiveSection");
  } catch (e) {
    /* ignore */
  }
}

// 2. Overview Tab Logic
function updateStats() {
  const statTotalBookings = document.getElementById("statTotalBookings");
  if (statTotalBookings) statTotalBookings.textContent = bookingsData.length;

  const statActiveBookings = document.getElementById("statActiveBookings");
  if (statActiveBookings) {
    const activeBookings = bookingsData.filter(
      (b) => b.status === "active" || b.status === "pending"
    );
    statActiveBookings.textContent = activeBookings.length;
  }

  const statTotalRevenue = document.getElementById("statTotalRevenue");
  if (statTotalRevenue) {
    const totalRevenue = bookingsData.reduce((sum, b) => sum + b.paid, 0);
    statTotalRevenue.textContent = formatCurrency(totalRevenue);
  }

  const statAvailablePlots = document.getElementById("statAvailablePlots");
  if (statAvailablePlots) {
    const availablePlots = plotData.filter((p) => p.status === "available");
    statAvailablePlots.textContent = availablePlots.length;
  }
}

function renderRecentBookings() {
  const container = document.getElementById("recentBookings");
  container.innerHTML = "";

  // Sort by date (most recent first) and take top 5
  const recent = [...bookingsData]
    .sort((a, b) => new Date(b.date) - new Date(a.date))
    .slice(0, 5);

  if (recent.length === 0) {
    container.innerHTML =
      '<p style="color: #6b7280;">কোনো সাম্প্রতিক বুকিং নেই।</p>';
    return;
  }

  recent.forEach((booking) => {
    const item = document.createElement("div");
    item.className = "recent-booking-item";
    item.innerHTML = `
                    <div class="recent-booking-info">
                        <span class="name">${booking.name}</span>
                        <span class="plot">${booking.plotNumber} (${
      booking.plotSize
    }) - ${getStatusText(booking.status)}</span>
                    </div>
                    <div class="recent-booking-amount">${formatFullCurrency(
                      booking.paid
                    )}</div>
                `;
    container.appendChild(item);
  });
}

const getStatusText = (status) => {
  switch (status) {
    case "active":
      return "সক্রিয়";
    case "pending":
      return "বিচারাধীন";
    case "completed":
      return "সম্পন্ন";
    default:
      return status;
  }
};

// Chart Rendering
function renderSalesChart() {
  const canvas = document.getElementById("salesChart");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  // Dummy data for monthly sales
  const data = {
    labels: ["জানু", "ফেব্রু", "মার্চ", "এপ্রিল", "মে", "জুন"],
    datasets: [
      {
        label: "বিক্রিত প্লট",
        data: [1, 2, 1, 3, 2, 4],
        backgroundColor: "#10b981",
        borderColor: "#059669",
        borderWidth: 1,
        borderRadius: 5,
      },
    ],
  };

  if (salesChartInstance) salesChartInstance.destroy();
  salesChartInstance = new Chart(ctx, {
    type: "bar",
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: { beginAtZero: true, ticks: { precision: 0 } },
      },
      plugins: { legend: { display: false } },
    },
  });
}

function renderRevenueChart() {
  const canvas = document.getElementById("revenueChart");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  // Dummy data for revenue trend (in Lakhs)
  const data = {
    labels: ["জানু", "ফেব্রু", "মার্চ", "এপ্রিল", "মে", "জুন"],
    datasets: [
      {
        label: "মোট আয় (Lakhs)",
        data: [35, 150, 50, 80, 60, 100],
        fill: true,
        backgroundColor: "rgba(59, 130, 246, 0.2)",
        borderColor: "#3b82f6",
        tension: 0.3,
        pointBackgroundColor: "#3b82f6",
      },
    ],
  };

  if (revenueChartInstance) revenueChartInstance.destroy();
  revenueChartInstance = new Chart(ctx, {
    type: "line",
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: { beginAtZero: true, title: { display: true, text: "আয় (Lakhs)" } },
      },
      plugins: { legend: { display: false } },
    },
  });
}

function renderPlotChart() {
  const canvas = document.getElementById("plotChart");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  // Data for plot distribution by size
  const sizeCounts = plotData.reduce((acc, plot) => {
    acc[plot.size] = (acc[plot.size] || 0) + 1;
    return acc;
  }, {});

  const data = {
    labels: Object.keys(sizeCounts),
    datasets: [
      {
        data: Object.values(sizeCounts),
        backgroundColor: ["#10b981", "#f59e0b", "#3b82f6", "#8b5cf6"],
        hoverOffset: 4,
      },
    ],
  };

  if (plotChartInstance) plotChartInstance.destroy();
  plotChartInstance = new Chart(ctx, {
    type: "doughnut",
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { position: "right" },
      },
    },
  });
}

function renderOverview() {
  updateStats();
  renderSalesChart();
  renderRevenueChart();
  renderPlotChart();
  renderRecentBookings();
}

// Header settings (navbar) form persistence
const headerDefaults = {
  brandText: "জলছায়া",
  homeLabel: "হোম",
  aboutLabel: "আমাদের সম্পর্কে",
  featuresLabel: "সুবিধা",
  pricingLabel: "মূল্য তালিকা",
  testimonialsLabel: "মন্তব্য",
  otherProjectsLabel: "প্রকল্প",
  newsLabel: "নিউজ",
  contactLabel: "যোগাযোগ",
  logoUrl: "/images/Logo/jolchaya footer.png",
  logoDataUrl: "",
  ctaText: "এখনই বুক করুন",
  ctaHref: "#contact",
};

// Holds current in-memory uploaded logo as data URL
let headerLogoDataUrl = "";
let headerLogoDbUrl = ""; // saved logo URL from database

function loadHeaderSettings() {
  const form = document.getElementById("headerSettingsForm");
  if (!form) return; // form not on page

  // Load from API
  fetch("/api/header-settings")
    .then((response) => response.json())
    .then((data) => {
      const setVal = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.value = val || "";
      };

      setVal("brandText", data.brand_text);
      setVal("homeLabel", data.home_label);
      setVal("aboutLabel", data.about_label);
      setVal("featuresLabel", data.features_label);
      setVal("pricingLabel", data.pricing_label);
      setVal("testimonialsLabel", data.testimonials_label);
      setVal("otherProjectsLabel", data.other_projects_label);
      setVal("newsLabel", data.news_label);
      setVal("contactLabel", data.contact_label);
      setVal("ctaText", data.cta_text);
      setVal("ctaHref", data.cta_href);

      headerLogoDataUrl = ""; // never pre-fill from DB data_url — only set when user picks a new file

      // Store DB logo URL for preview — prefer uploaded file path over data URL
      headerLogoDbUrl = data.logo_image_path || data.logo_full_url || "";

      // Sync sidebar logo with header logo
      const sidebarLogo = document.getElementById("adminSidebarLogo");
      if (sidebarLogo && headerLogoDbUrl) {
        sidebarLogo.src = headerLogoDbUrl;
        sidebarLogo.style.display = "block";
      }

      // Initialize small logo preview above save button
      const preview = document.getElementById("headerLogoPreview");
      const placeholder = document.getElementById("headerLogoPlaceholder");
      if (preview) {
        const logoSrc = headerLogoDbUrl;
        preview.src = logoSrc;
        preview.style.display = logoSrc ? "block" : "none";
        if (placeholder) placeholder.style.display = logoSrc ? "none" : "block";
      }

      updateHeaderPreview();
    })
    .catch((error) => {
      console.error("Error loading header settings:", error);
      // Use defaults on error
      const setVal = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.value = val || "";
      };
      setVal("brandText", headerDefaults.brandText);
      setVal("homeLabel", headerDefaults.homeLabel);
      setVal("aboutLabel", headerDefaults.aboutLabel);
      setVal("featuresLabel", headerDefaults.featuresLabel);
      setVal("pricingLabel", headerDefaults.pricingLabel);
      setVal("testimonialsLabel", headerDefaults.testimonialsLabel);
      setVal("otherProjectsLabel", headerDefaults.otherProjectsLabel);
      setVal("newsLabel", headerDefaults.newsLabel);
      setVal("contactLabel", headerDefaults.contactLabel);
      setVal("ctaText", headerDefaults.ctaText);
      setVal("ctaHref", headerDefaults.ctaHref);
    });

  // Attach file change handler once
  const fileInput = document.getElementById("headerLogoFile");
  if (fileInput && !fileInput.dataset.bound) {
    fileInput.addEventListener("change", (e) => {
      const file = e.target.files && e.target.files[0];
      if (!file) return;

      // Validate file size (max 7MB = 7168 KB) - Supports any resolution
      const maxSize = 7 * 1024 * 1024; // 7 MB in bytes
      if (file.size > maxSize) {
        if (typeof showError === "function") {
          showError(
            "ফাইলের আকার ৭ এমবি এর কম হতে হবে। বর্তমান ফাইলের আকার: " +
              (file.size / (1024 * 1024)).toFixed(2) +
              " MB"
          );
        } else {
          alert(
            "ফাইলের আকার ৭ এমবি এর কম হতে হবে। বর্তমান ফাইলের আকার: " +
              (file.size / (1024 * 1024)).toFixed(2) +
              " MB"
          );
        }
        fileInput.value = ""; // Clear the input
        return;
      }

      // Validate file type
      const allowedTypes = [
        "image/png",
        "image/jpeg",
        "image/jpg",
        "image/webp",
        "image/svg+xml",
      ];
      if (!allowedTypes.includes(file.type)) {
        if (typeof showError === "function") {
          showError(
            "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
          );
        } else {
          alert(
            "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
          );
        }
        fileInput.value = ""; // Clear the input
        return;
      }

      const reader = new FileReader();
      reader.onload = () => {
        headerLogoDataUrl = reader.result;
        // Update small preview above save button
        const preview = document.getElementById("headerLogoPreview");
        const placeholder = document.getElementById("headerLogoPlaceholder");
        if (preview) {
          preview.src = headerLogoDataUrl;
          preview.style.display = "block";
          if (placeholder) placeholder.style.display = "none";
        }
        // Update live preview bar
        updateHeaderPreview();
      };
      reader.onerror = () => {
        if (typeof showError === "function") {
          showError("ফাইল পড়তে সমস্যা হয়েছে।");
        } else {
          alert("ফাইল পড়তে সমস্যা হয়েছে।");
        }
        fileInput.value = "";
      };
      reader.readAsDataURL(file);
    });
    fileInput.dataset.bound = "true";
  }

  // Bind input listeners for live preview
  const fields = [
    "brandText",
    "homeLabel",
    "aboutLabel",
    "featuresLabel",
    "pricingLabel",
    "testimonialsLabel",
    "otherProjectsLabel",
    "newsLabel",
    "contactLabel",
    "ctaText",
    "ctaHref",
  ];
  fields.forEach((id) => {
    const el = document.getElementById(id);
    if (el && !el.dataset.bound) {
      el.addEventListener("input", updateHeaderPreview);
      el.dataset.bound = "true";
    }
  });
}

function saveHeaderSettings() {
  const form = document.getElementById("headerSettingsForm");
  if (!form) return;

  const getVal = (id) => {
    const el = document.getElementById(id);
    return el ? el.value.trim() : "";
  };

  const formData = new FormData();
  formData.append("logo_data_url", ""); // always clear stale data URL
  formData.append("brand_text", getVal("brandText"));
  formData.append("home_label", getVal("homeLabel"));
  formData.append("about_label", getVal("aboutLabel"));
  formData.append("features_label", getVal("featuresLabel"));
  formData.append("pricing_label", getVal("pricingLabel"));
  formData.append("testimonials_label", getVal("testimonialsLabel"));
  formData.append("other_projects_label", getVal("otherProjectsLabel"));
  formData.append("news_label", getVal("newsLabel"));
  formData.append("contact_label", getVal("contactLabel"));
  formData.append("cta_text", getVal("ctaText"));
  formData.append("cta_href", getVal("ctaHref"));

  // Handle file upload if exists
  const logoFile = document.getElementById("headerLogoFile");
  if (logoFile && logoFile.files && logoFile.files[0]) {
    formData.append("logo_image", logoFile.files[0]);
  }

  fetch("/admin/header-settings", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN":
        document
          .querySelector('meta[name="csrf-token"]')
          ?.getAttribute("content") || "",
    },
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showSuccess("হেডার সেটিংস সংরক্ষণ করা হয়েছে।");

        // Update DB logo URL if a new logo was saved
        if (data.data && (data.data.logo_image_path || data.data.logo_full_url)) {
          headerLogoDbUrl = data.data.logo_image_path || data.data.logo_full_url || headerLogoDbUrl;
          headerLogoDataUrl = ""; // clear base64 now that it's saved
          updateHeaderPreview();

          // Sync sidebar logo with header logo
          const sidebarLogo = document.getElementById("adminSidebarLogo");
          if (sidebarLogo && headerLogoDbUrl) {
            sidebarLogo.src = headerLogoDbUrl;
            sidebarLogo.style.display = "block";
          }
        }

        // Trigger frontend refresh by setting localStorage flag
        try {
          localStorage.setItem("refreshHeaderSettings", Date.now().toString());
          window.dispatchEvent(new CustomEvent("headerSettingsUpdated"));
        } catch (e) {
          console.warn("Could not set localStorage flag:", e);
        }
      } else {
        showError("সংরক্ষণ করতে সমস্যা হয়েছে।");
      }
    })
    .catch((error) => {
      console.error("Error saving header settings:", error);
      showError("সার্ভার সমস্যা। আবার চেষ্টা করুন।");
    });
}

function resetHeaderSettings() {
  loadHeaderSettings();
  headerLogoDataUrl = "";
  const preview = document.getElementById("headerLogoPreview");
  const placeholder = document.getElementById("headerLogoPlaceholder");
  if (preview) {
    preview.src = "";
    preview.style.display = "none";
    if (placeholder) placeholder.style.display = "block";
  }
  showSuccess("ডিফল্ট হেডার সেটিংস পুনরুদ্ধার করা হয়েছে।", "রিসেট");
}

// Live preview for Header tab
function updateHeaderPreview() {
  const getVal = (id, fallback = "") => {
    const el = document.getElementById(id);
    return el ? el.value || fallback : fallback;
  };

  const logo = document.getElementById("previewLogo");
  const fallbackIcon = document.getElementById("previewFallbackIcon");
  const logoSrc = headerLogoDataUrl || headerLogoDbUrl; // new upload takes precedence, else use saved DB logo
  if (logo && fallbackIcon) {
    if (logoSrc) {
      logo.src = logoSrc;
      logo.style.display = "inline-block";
      fallbackIcon.style.display = "none";
    } else {
      logo.src = "";
      logo.style.display = "none";
      fallbackIcon.style.display = "block";
    }
  }

  const map = [
    ["previewHome", "homeLabel"],
    ["previewAbout", "aboutLabel"],
    ["previewFeatures", "featuresLabel"],
    ["previewPricing", "pricingLabel"],
    ["previewTestimonials", "testimonialsLabel"],
    ["previewOtherProjects", "otherProjectsLabel"],
    ["previewNews", "newsLabel"],
    ["previewContact", "contactLabel"],
  ];
  map.forEach(([id, src]) => {
    const el = document.getElementById(id);
    if (el) el.textContent = getVal(src, el.textContent);
  });

  const cta = document.getElementById("previewCta");
  const ctaText = document.getElementById("previewCtaText");
  if (cta) cta.setAttribute("href", getVal("ctaHref", "#contact"));
  if (ctaText)
    ctaText.textContent = getVal("ctaText", ctaText.textContent || "");

  // Dashboard logo is independent; do not tie it to header fields.
}

// Footer settings
const footerDefaults = {
  footerTitle: "জলছায়া",
  footerDescription:
    "NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলছায়া।",
  phone1: "+880 1991 995 995",
  phone2: "+880 1991 994 994",
  email: "hello.nexup@gmail.com",
  projectAddress: "প্রকল্পের ঠিকানা",
  contactAddress: "যোগাযোগের ঠিকানা",
  qlHomeLabel: "হোম",
  qlHomeHref: "#home",
  qlFeaturesLabel: "সুবিধাসমূহ",
  qlFeaturesHref: "#features",
  qlPricingLabel: "মূল্য তালিকা",
  qlPricingHref: "#pricing",
  qlContactLabel: "যোগাযোগ",
  qlContactHref: "#contact",
  qlGalleryLabel: "গ্যালারি",
  qlGalleryHref: "#gallery",
  legalPrivacyLabel: "গোপনীয়তা নীতি",
  legalPrivacyHref: "#privacy",
  legalTermsLabel: "সেবার শর্তাবলী",
  legalTermsHref: "#terms",
  socialFacebook: "#",
  socialInstagram: "#",
  socialTwitter: "#",
  socialLinkedin: "#",
  socialYouTube: "#",
  mapUrl: "#",
  bottomText:
    " 2025 জলছায়া। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প",
  qrDataUrl: "/images/alphainno-qr-code.png",
  qrSectionTitle: "অবস্থান দেখুন",
  mapButtonText: "গুগল ম্যাপে দেখুন",
  qrShow: true,
};

// in-memory QR image data for admin preview
let footerQrDataUrl = "";

function loadFooterSettings() {
  const form = document.getElementById("footerSettingsForm");
  if (!form) {
    console.warn("Footer form not found, skipping load");
    return;
  }

  // Load from API
  fetch("/api/footer-settings")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Failed to load footer settings: " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      if (!data) {
        console.warn("No footer data received");
        return;
      }
      // Map API data to form fields
      const setVal = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.value = val;
      };

      setVal("footerTitle", data.title || "");
      setVal("footerDescription", data.description || "");
      setVal("phone1", data.phone1 || "");
      setVal("phone2", data.phone2 || "");
      setVal("email", data.email || "");
      setVal("projectAddress", data.project_address || "");
      setVal("contactAddress", data.contact_address || "");
      setVal("mapUrl", data.map_url || "");
      setVal("bottomText", data.bottom_text || "");
      setVal("qrSectionTitle", data.qr_section_title || "");
      setVal("mapButtonText", data.map_button_text || "");
      setVal("concernTitle", data.concern_title || "");
      setVal("concernUrl", data.concern_url || "");
      setVal("nexRealEstateUrl", data.nex_real_estate_url || "");

      // Download files
      const updateFileLink = (id, path) => {
        const el = document.getElementById(id);
        if (el) {
          if (path) {
            el.innerHTML = `<a href="/storage/${path}" target="_blank" style="color: #0d3d29; font-weight: 600;"><i class="fas fa-file-download"></i> বর্তমান ফাইল দেখুন</a>`;
          } else {
            el.innerHTML =
              '<span style="color: #6b7280;">কোনো ফাইল আপলোড করা নেই</span>';
          }
        }
      };
      updateFileLink("brochureLink", data.brochure_path);
      updateFileLink("masterPlanLink", data.master_plan_path);
      updateFileLink("priceListLink", data.price_list_path);

      // Quick links
      if (data.quick_links && Array.isArray(data.quick_links)) {
        const ql = data.quick_links;
        if (ql[0]) {
          setVal("qlHomeLabel", ql[0].label);
          setVal("qlHomeHref", ql[0].href);
        }
        if (ql[1]) {
          setVal("qlFeaturesLabel", ql[1].label);
          setVal("qlFeaturesHref", ql[1].href);
        }
        if (ql[2]) {
          setVal("qlPricingLabel", ql[2].label);
          setVal("qlPricingHref", ql[2].href);
        }
        if (ql[3]) {
          setVal("qlContactLabel", ql[3].label);
          setVal("qlContactHref", ql[3].href);
        }
        if (ql[4]) {
          setVal("qlGalleryLabel", ql[4].label);
          setVal("qlGalleryHref", ql[4].href);
        }
      }

      // Legal links
      if (data.legal_links && Array.isArray(data.legal_links)) {
        const ll = data.legal_links;
        if (ll[0]) {
          setVal("legalPrivacyLabel", ll[0].label);
          setVal("legalPrivacyHref", ll[0].href);
        }
        if (ll[1]) {
          setVal("legalTermsLabel", ll[1].label);
          setVal("legalTermsHref", ll[1].href);
        }
      }

      // Social links
      if (data.social_links && typeof data.social_links === "object") {
        setVal("socialFacebook", data.social_links.facebook || "");
        setVal("socialInstagram", data.social_links.instagram || "");
        setVal("socialTwitter", data.social_links.twitter || "");
        setVal("socialLinkedin", data.social_links.linkedin || "");
        setVal("socialYouTube", data.social_links.youtube || "");
      }

      // QR image
      footerQrDataUrl = data.qr_image_path
        ? "/storage/" + data.qr_image_path
        : "";
      const pvQr = document.getElementById("pvQrImg");
      const pvQrPlaceholder = document.getElementById("pvQrPlaceholder");
      if (pvQr) {
        if (footerQrDataUrl) {
          pvQr.src = footerQrDataUrl;
          pvQr.style.display = "block";
          pvQr.style.position = "relative";
          pvQr.style.zIndex = "1";
          pvQr.style.maxWidth = "148px";
          pvQr.style.maxHeight = "148px";
          pvQr.style.width = "auto";
          pvQr.style.height = "auto";
          if (pvQrPlaceholder) pvQrPlaceholder.style.display = "none";
        } else {
          pvQr.src = "";
          pvQr.style.display = "none";
          if (pvQrPlaceholder) {
            pvQrPlaceholder.style.display = "block";
            pvQrPlaceholder.style.position = "absolute";
          }
        }
      }

      // Logo image
      const logoPreview = document.getElementById("footerLogoPreview");
      const logoPreviewImg = document.getElementById("footerLogoPreviewImg");
      if (logoPreview && logoPreviewImg) {
        const logoPath = data.logo_path || "/images/Logo/ইকো রিসোর্ট.png";
        logoPreviewImg.src = logoPath;
        logoPreview.style.display = "block";
      }

      // Concern image
      const concernPreview = document.getElementById("concernLogoPreview");
      const concernPreviewImg = document.getElementById(
        "concernLogoPreviewImg"
      );
      if (concernPreview && concernPreviewImg) {
        const concernPath = data.concern_image_path
          ? "/storage/" + data.concern_image_path
          : "";
        concernPreviewImg.src = concernPath;
        concernPreview.style.display = concernPath ? "block" : "none";
      }

      // Load multiple concern logos
      if (data.concern_logos && Array.isArray(data.concern_logos)) {
        // Clear existing entries
        if (typeof concernLogos !== "undefined") {
          concernLogos = [];
        }
        const container = document.getElementById("concernLogosContainer");
        if (container) {
          container.innerHTML = "";
        }

        // Load existing logos
        if (typeof loadConcernLogos === "function") {
          loadConcernLogos(data.concern_logos);
        }
      }

      // Bind listeners for live preview
      Array.from(form.querySelectorAll("input, textarea")).forEach((el) => {
        if (!el.dataset.bound) {
          el.addEventListener("input", updateFooterPreview);
          el.dataset.bound = "true";
        }
      });

      // Update preview
      updateFooterPreview();
    })
    .catch((error) => {
      console.error("Error loading footer settings:", error);
      // Fallback to defaults
      const v = footerDefaults;
      const setVal = (id, val) => {
        const el = document.getElementById(id);
        if (el) el.value = val;
      };
      Object.keys(footerDefaults).forEach((k) => setVal(k, v[k] ?? ""));
    });

  // Bind file input listener for QR upload preview - always ensure it's bound
  const qrInput = document.getElementById("footerQrFile");
  if (qrInput) {
    // Remove data-bound attribute to allow re-binding if needed
    if (qrInput.dataset.bound) {
      delete qrInput.dataset.bound;
    }

    // Add event listener (will replace if already exists)
    qrInput.addEventListener("change", function handleQrFileChange(e) {
      const file = e.target.files && e.target.files[0];
      if (!file) {
        // If no file, check if we have existing data
        if (footerQrDataUrl) {
          const pvQrImg = document.getElementById("pvQrImg");
          const pvQrPlaceholder = document.getElementById("pvQrPlaceholder");
          if (pvQrImg && footerQrDataUrl) {
            pvQrImg.src = footerQrDataUrl;
            pvQrImg.style.display = "block";
            pvQrImg.style.position = "relative";
            pvQrImg.style.zIndex = "1";
          }
          if (pvQrPlaceholder) {
            pvQrPlaceholder.style.display = "none";
          }
        }
        return;
      }

      const pvQrImg = document.getElementById("pvQrImg");
      const pvQrPlaceholder = document.getElementById("pvQrPlaceholder");

      if (!pvQrImg || !pvQrPlaceholder) {
        console.error("Preview elements not found");
        return;
      }

      // Show image immediately with object URL
      let objectUrl = "";
      try {
        objectUrl = URL.createObjectURL(file);
        if (pvQrImg) {
          pvQrImg.src = objectUrl;
          pvQrImg.style.display = "block";
          pvQrImg.style.position = "relative";
          pvQrImg.style.zIndex = "1";
          pvQrImg.style.maxWidth = "148px";
          pvQrImg.style.maxHeight = "148px";
          pvQrImg.style.width = "auto";
          pvQrImg.style.height = "auto";
        }
        if (pvQrPlaceholder) {
          pvQrPlaceholder.style.display = "none";
        }
      } catch (err) {
        console.error("Error creating object URL:", err);
      }

      // Read file for permanent storage
      const reader = new FileReader();
      reader.onload = () => {
        footerQrDataUrl = reader.result;
        if (pvQrImg) {
          pvQrImg.src = footerQrDataUrl;
          pvQrImg.style.display = "block";
          pvQrImg.style.position = "relative";
          pvQrImg.style.zIndex = "1";
          pvQrImg.style.maxWidth = "148px";
          pvQrImg.style.maxHeight = "148px";
          pvQrImg.style.width = "auto";
          pvQrImg.style.height = "auto";
        }
        if (pvQrPlaceholder) {
          pvQrPlaceholder.style.display = "none";
        }
        // Clean up object URL
        if (objectUrl) {
          try {
            URL.revokeObjectURL(objectUrl);
          } catch (_) {}
        }
        // Also update preview function to ensure consistency
        updateFooterPreview();
      };
      reader.onerror = () => {
        console.error("Error reading file");
        if (pvQrPlaceholder) pvQrPlaceholder.style.display = "block";
        if (pvQrImg) pvQrImg.style.display = "none";
      };
      reader.readAsDataURL(file);
    });
    qrInput.dataset.bound = "true";
  }

  // Bind file input listener for Logo upload preview
  const logoInput = document.getElementById("footerLogoFile");
  if (logoInput) {
    if (logoInput.dataset.bound) {
      delete logoInput.dataset.bound;
    }

    logoInput.addEventListener("change", function handleLogoFileChange(e) {
      const file = e.target.files && e.target.files[0];
      const logoPreview = document.getElementById("footerLogoPreview");
      const logoPreviewImg = document.getElementById("footerLogoPreviewImg");

      if (!file) {
        if (logoPreview) logoPreview.style.display = "none";
        return;
      }

      // Validate file size (max 7MB = 7168 KB) - Supports any resolution
      const maxSize = 7 * 1024 * 1024; // 7 MB in bytes
      if (file.size > maxSize) {
        if (typeof showError === "function") {
          showError(
            "ফাইলের আকার ৭ এমবি এর কম হতে হবে। বর্তমান ফাইলের আকার: " +
              (file.size / (1024 * 1024)).toFixed(2) +
              " MB"
          );
        } else {
          alert(
            "ফাইলের আকার ৭ এমবি এর কম হতে হবে। বর্তমান ফাইলের আকার: " +
              (file.size / (1024 * 1024)).toFixed(2) +
              " MB"
          );
        }
        logoInput.value = ""; // Clear the input
        if (logoPreview) logoPreview.style.display = "none";
        return;
      }

      // Validate file type
      const allowedTypes = [
        "image/png",
        "image/jpeg",
        "image/jpg",
        "image/webp",
        "image/svg+xml",
      ];
      if (!allowedTypes.includes(file.type)) {
        if (typeof showError === "function") {
          showError(
            "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
          );
        } else {
          alert(
            "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
          );
        }
        logoInput.value = ""; // Clear the input
        if (logoPreview) logoPreview.style.display = "none";
        return;
      }

      if (!logoPreviewImg || !logoPreview) {
        console.error("Logo preview elements not found");
        return;
      }

      const reader = new FileReader();
      reader.onload = () => {
        logoPreviewImg.src = reader.result;
        logoPreview.style.display = "block";
      };
      reader.onerror = () => {
        console.error("Error reading logo file");
        if (typeof showError === "function") {
          showError("ফাইল পড়তে সমস্যা হয়েছে।");
        } else {
          alert("ফাইল পড়তে সমস্যা হয়েছে।");
        }
        logoPreview.style.display = "none";
        logoInput.value = "";
      };
      reader.readAsDataURL(file);
    });
    logoInput.dataset.bound = "true";
  }

  // Bind file input listener for Concern Logo upload preview
  const concernInput = document.getElementById("concernImageFile");
  if (concernInput) {
    if (concernInput.dataset.bound) {
      delete concernInput.dataset.bound;
    }

    concernInput.addEventListener(
      "change",
      function handleConcernFileChange(e) {
        const file = e.target.files && e.target.files[0];
        const concernPreview = document.getElementById("concernLogoPreview");
        const concernPreviewImg = document.getElementById(
          "concernLogoPreviewImg"
        );

        if (!file) {
          if (concernPreview) concernPreview.style.display = "none";
          return;
        }

        // Validate file size (max 5MB)
        const maxSize = 5 * 1024 * 1024;
        if (file.size > maxSize) {
          if (typeof showError === "function") {
            showError("ফাইলের আকার ৫ এমবি এর কম হতে হবে।");
          } else {
            alert("ফাইলের আকার ৫ এমবি এর কম হতে হবে।");
          }
          concernInput.value = "";
          if (concernPreview) concernPreview.style.display = "none";
          return;
        }

        // Validate file type
        const allowedTypes = [
          "image/png",
          "image/jpeg",
          "image/jpg",
          "image/webp",
          "image/svg+xml",
        ];
        if (!allowedTypes.includes(file.type)) {
          if (typeof showError === "function") {
            showError(
              "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
            );
          } else {
            alert(
              "অনুগ্রহ করে একটি ছবি ফাইল নির্বাচন করুন (PNG, JPG, WEBP, SVG)"
            );
          }
          concernInput.value = "";
          if (concernPreview) concernPreview.style.display = "none";
          return;
        }

        if (!concernPreviewImg || !concernPreview) {
          console.error("Concern preview elements not found");
          return;
        }

        const reader = new FileReader();
        reader.onload = () => {
          concernPreviewImg.src = reader.result;
          concernPreview.style.display = "block";
        };
        reader.readAsDataURL(file);
      }
    );
    concernInput.dataset.bound = "true";
  }
}

function saveFooterSettings() {
  // Continue with original save logic
  const form = document.getElementById("footerSettingsForm");
  if (!form) {
    console.error("Footer form not found");
    showError("ফর্ম খুঁজে পাওয়া যায়নি।");
    return;
  }

  // Get save button and show loading state
  const saveButton = form.querySelector(
    'button[onclick*="saveFooterSettings"]'
  );
  const originalButtonText = saveButton ? saveButton.innerHTML : "";
  if (saveButton) {
    saveButton.disabled = true;
    saveButton.innerHTML =
      '<span><i class="fas fa-spinner fa-spin"></i></span><span>সংরক্ষণ করা হচ্ছে...</span>';
  }

  const formData = new FormData();

  // Map form field IDs to API field names
  const fieldMapping = {
    footerTitle: "title",
    footerDescription: "description",
    phone1: "phone1",
    phone2: "phone2",
    email: "email",
    projectAddress: "project_address",
    contactAddress: "contact_address",
    mapUrl: "map_url",
    bottomText: "bottom_text",
    qrSectionTitle: "qr_section_title",
    mapButtonText: "map_button_text",
    concernTitle: "concern_title",
    concernUrl: "concern_url",
    nexRealEstateUrl: "nex_real_estate_url",
    qlHomeLabel: "qlHomeLabel",
    qlHomeHref: "qlHomeHref",
    qlFeaturesLabel: "qlFeaturesLabel",
    qlFeaturesHref: "qlFeaturesHref",
    qlPricingLabel: "qlPricingLabel",
    qlPricingHref: "qlPricingHref",
    qlContactLabel: "qlContactLabel",
    qlContactHref: "qlContactHref",
    qlGalleryLabel: "qlGalleryLabel",
    qlGalleryHref: "qlGalleryHref",
    legalPrivacyLabel: "legalPrivacyLabel",
    legalPrivacyHref: "legalPrivacyHref",
    legalTermsLabel: "legalTermsLabel",
    legalTermsHref: "legalTermsHref",
    socialFacebook: "socialFacebook",
    socialInstagram: "socialInstagram",
    socialTwitter: "socialTwitter",
    socialLinkedin: "socialLinkedin",
    socialYouTube: "socialYouTube",
  };

  // Add all form fields with correct names
  Object.keys(fieldMapping).forEach((formId) => {
    const el = document.getElementById(formId);
    if (el) {
      formData.append(fieldMapping[formId], el.value || "");
    }
  });

  // Add QR file if selected
  const qrFileEl = document.getElementById("footerQrFile");
  if (qrFileEl && qrFileEl.files.length > 0) {
    formData.append("qr_image", qrFileEl.files[0]);
  }

  // Add logo file if selected
  const logoFileEl = document.getElementById("footerLogoFile");
  if (logoFileEl && logoFileEl.files.length > 0) {
    formData.append("logo_image", logoFileEl.files[0]);
  }

  // Add concern image if selected
  const concernFileEl = document.getElementById("concernImageFile");
  if (concernFileEl && concernFileEl.files.length > 0) {
    formData.append("concern_image", concernFileEl.files[0]);
  }

  // Add multiple concern logos
  if (typeof concernLogos !== "undefined" && Array.isArray(concernLogos)) {
    const logosData = [];
    concernLogos.forEach((logo, index) => {
      const urlInput = document.getElementById(`logo-url-${logo.id}`);
      const fileInput = document.getElementById(`logo-file-${logo.id}`);

      const logoData = {
        url: urlInput ? urlInput.value : logo.url || "",
        image_path: logo.imagePath || "",
      };

      // If there's a new file, add it to formData
      if (fileInput && fileInput.files.length > 0) {
        formData.append(`concern_logo_${index}`, fileInput.files[0]);
        logoData.has_new_file = true;
        logoData.file_index = index;
      } else if (logo.imageData) {
        logoData.image_data = logo.imageData;
      }

      logosData.push(logoData);
    });

    // Send logos metadata as JSON string
    formData.append("concern_logos", JSON.stringify(logosData));
  }

  // Add download files
  const brochureFileEl = document.getElementById("brochureFile");
  if (brochureFileEl && brochureFileEl.files.length > 0) {
    formData.append("brochure_file", brochureFileEl.files[0]);
  }

  const masterPlanFileEl = document.getElementById("masterPlanFile");
  if (masterPlanFileEl && masterPlanFileEl.files.length > 0) {
    formData.append("master_plan_file", masterPlanFileEl.files[0]);
  }

  const priceListFileEl = document.getElementById("priceListFile");
  if (priceListFileEl && priceListFileEl.files.length > 0) {
    formData.append("price_list_file", priceListFileEl.files[0]);
  }

  // Send to backend
  let csrfToken =
    document
      .querySelector('meta[name="csrf-token"]')
      ?.getAttribute("content") || "";

  // Fallback: try to get from other possible locations
  if (!csrfToken) {
    csrfToken =
      document.querySelector('meta[name="csrf-token"]')?.content || "";
  }
  if (!csrfToken) {
    csrfToken =
      document.querySelector('[name="csrf-token"]')?.getAttribute("content") ||
      "";
  }

  if (!csrfToken) {
    if (saveButton) {
      saveButton.disabled = false;
      saveButton.innerHTML = originalButtonText;
    }
    showError("CSRF token পাওয়া যায়নি। পৃষ্ঠাটি রিফ্রেশ করুন।");
    return;
  }

  fetch("/admin/footer-settings", {
    method: "POST",
    body: formData,
    headers: {
      "X-CSRF-TOKEN": csrfToken,
      Accept: "application/json",
    },
  })
    .then(async (response) => {
      // Check if response is ok
      if (!response.ok) {
        let errorText = "";
        try {
          const errorData = await response.json();
          if (errorData.errors) {
            // Validation errors
            let errorMessage = "সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।\n\n";
            for (let field in errorData.errors) {
              errorMessage += `${field}: ${errorData.errors[field].join(
                ", "
              )}\n`;
            }
            throw new Error(errorMessage);
          } else if (errorData.message) {
            throw new Error(errorData.message);
          }
        } catch (e) {
          if (e.message) throw e;
        }

        if (response.status === 419) {
          throw new Error(
            "CSRF token মেয়াদ শেষ হয়ে গেছে। পৃষ্ঠাটি রিফ্রেশ করুন এবং আবার চেষ্টা করুন।"
          );
        }
        throw new Error("সার্ভার থেকে ত্রুটি: " + response.status);
      }

      // Parse JSON response
      try {
        return await response.json();
      } catch (e) {
        const text = await response.text();
        console.error("Failed to parse JSON response:", text);
        throw new Error(
          "সার্ভার থেকে অবৈধ প্রতিক্রিয়া: " + text.substring(0, 100)
        );
      }
    })
    .then((data) => {
      if (data && data.success) {
        showSuccess("ফুটার সেটিংস সফলভাবে সংরক্ষণ করা হয়েছে।");
        // Reload settings in admin
        if (typeof loadFooterSettings === "function") {
          loadFooterSettings();
        }
        // Update preview
        if (typeof updateFooterPreview === "function") {
          updateFooterPreview();
        }
        // Trigger live update for footer - set refresh after successful save
        try {
          localStorage.setItem("refreshFooter", Date.now().toString());
        } catch (e) {}
        // Also dispatch event for cross-tab communication
        window.dispatchEvent(new CustomEvent("footerSettingsUpdated"));
      } else {
        // Handle validation errors
        if (data && data.errors) {
          let errorMessage = "সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।\n\n";
          for (let field in data.errors) {
            errorMessage += `${field}: ${data.errors[field].join(", ")}\n`;
          }
          showError(errorMessage);
        } else {
          showError(
            data && data.message
              ? data.message
              : "সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।"
          );
        }
      }
    })
    .catch((error) => {
      console.error("Error saving footer settings:", error);
      const errorMessage =
        error.message || "সেটিংস সংরক্ষণ করতে ব্যর্থ হয়েছে।";
      showError(errorMessage);
    })
    .finally(() => {
      // Restore button state
      if (saveButton) {
        saveButton.disabled = false;
        saveButton.innerHTML = originalButtonText;
      }
    });
}

function resetFooterSettings() {
  // Clear localStorage
  localStorage.removeItem("footerSettings");
  // Reload settings from backend (which should have defaults if no record exists)
  loadFooterSettings();
  showSuccess("ডিফল্ট ফুটার সেটিংস পুনরুদ্ধার করা হয়েছে।", "রিসেট");
}

function updateFooterPreview() {
  // Default values for preview
  const defaults = {
    title: "জলছায়া",
    description:
      "NEX Real Estate এর একটি প্রকল্প। আপনার স্বপ্নের বাড়ি নির্মাণের জন্য প্রিমিয়াম লোকেশনে সবুজ পরিবেশে গড়ে উঠেছে জলছায়া।",
    phone1: "+880 1991 995 995",
    phone2: "+880 1991 994 994",
    email: "hello.nexup@gmail.com",
    projectAddress: "শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস, খুলনা, বাংলাদেশ",
    contactAddress:
      "NEX Real Estate, Century Trade Center, House-23/C, Road-17, Kamal Ataturk Ave, Banani C/A, Dhaka",
    qlHomeLabel: "হোম",
    qlHomeHref: "#home",
    qlFeaturesLabel: "সুবিধাসমূহ",
    qlFeaturesHref: "#features",
    qlPricingLabel: "মূল্য তালিকা",
    qlPricingHref: "#pricing",
    qlContactLabel: "যোগাযোগ",
    qlContactHref: "#contact",
    qlGalleryLabel: "গ্যালারি",
    qlGalleryHref: "#gallery",
    socialFacebook: "#",
    socialInstagram: "#",
    socialTwitter: "#",
    socialLinkedin: "#",
    socialYouTube: "#",
    mapUrl:
      "https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা",
    bottomText:
      "© ২০২৫ জলছায়া। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প",
    qrSectionTitle: "অবস্থান দেখুন",
    mapUrl:
      "https://maps.google.com/?q=শুভনূর+৩৮৮+বাড়ি+সিদ্ধার্থ+এস+আবাস,+খুলনা",
    bottomText:
      "© ২০২৫ জলছায়া। সর্বস্বত্ব সংরক্ষিত। | NEX Real Estate এর একটি প্রকল্প",
    qrSectionTitle: "অবস্থান দেখুন",
    mapButtonText: "গুগল ম্যাপে দেখুন",
    concernTitle: "Concern of",
  };

  const getVal = (id, fallback = "") => {
    const el = document.getElementById(id);
    return el ? el.value || fallback : fallback;
  };
  const setText = (id, val) => {
    const el = document.getElementById(id);
    if (el) el.textContent = val;
  };
  const setHref = (id, val) => {
    const el = document.getElementById(id);
    if (el) el.setAttribute("href", val);
  };

  setText("pvTitle", getVal("footerTitle", defaults.title));
  setText("pvDesc", getVal("footerDescription", defaults.description));
  setText("pvPhone1", getVal("phone1", defaults.phone1));
  setText("pvPhone2", getVal("phone2", defaults.phone2));
  setText("pvEmail", getVal("email", defaults.email));
  document.getElementById("pvProjectAddr") &&
    (document.getElementById("pvProjectAddr").textContent = getVal(
      "projectAddress",
      defaults.projectAddress
    ));
  document.getElementById("pvContactAddr") &&
    (document.getElementById("pvContactAddr").textContent = getVal(
      "contactAddress",
      defaults.contactAddress
    ));

  setText("pvQlHome", getVal("qlHomeLabel", defaults.qlHomeLabel));
  setHref("pvQlHome", getVal("qlHomeHref", defaults.qlHomeHref));
  setText("pvQlFeatures", getVal("qlFeaturesLabel", defaults.qlFeaturesLabel));
  setHref("pvQlFeatures", getVal("qlFeaturesHref", defaults.qlFeaturesHref));
  setText("pvQlPricing", getVal("qlPricingLabel", defaults.qlPricingLabel));
  setHref("pvQlPricing", getVal("qlPricingHref", defaults.qlPricingHref));
  setText("pvQlContact", getVal("qlContactLabel", defaults.qlContactLabel));
  setHref("pvQlContact", getVal("qlContactHref", defaults.qlContactHref));
  setText("pvQlGallery", getVal("qlGalleryLabel", defaults.qlGalleryLabel));
  setHref("pvQlGallery", getVal("qlGalleryHref", defaults.qlGalleryHref));

  setHref("pvFb", getVal("socialFacebook", defaults.socialFacebook));
  setHref("pvIg", getVal("socialInstagram", defaults.socialInstagram));
  setHref("pvTw", getVal("socialTwitter", defaults.socialTwitter));
  setHref("pvLn", getVal("socialLinkedin", defaults.socialLinkedin));
  setHref("pvYt", getVal("socialYouTube", defaults.socialYouTube));

  setHref("pvMap", getVal("mapUrl", defaults.mapUrl));
  setText("pvBottom", getVal("bottomText", defaults.bottomText));

  // Map/Qr section title and button text
  // Map/Qr section title and button text
  setText("pvQrTitle", getVal("qrSectionTitle", defaults.qrSectionTitle));
  setText("pvMapText", getVal("mapButtonText", defaults.mapButtonText));

  // Concern Section
  const concernSection = document.getElementById("pvConcernSection");
  const concernTitle = document.getElementById("pvConcernTitle");
  const concernImg = document.getElementById("pvConcernImg");
  const concernImgSrc = document.getElementById("concernLogoPreviewImg")?.src; // Get from uploaded preview

  if (concernSection && concernImg) {
    let imgSrcToUse = "";

    // Priority 1: Newly selected file (already set in preview img)
    const filePreviewSrc = document
      .getElementById("concernLogoPreviewImg")
      ?.getAttribute("src");
    if (filePreviewSrc && filePreviewSrc.startsWith("data:")) {
      imgSrcToUse = filePreviewSrc;
    }
    // Priority 2: Existing saved path (from hidden input or data)
    else {
      // We need to see if we have access to the original saved path.
      // In loadFooterSettings, we set the preview img src.
      // So checking the preview img src is actually the right way, but we need to validate it.
      const currentPreviewSrc = document
        .getElementById("concernLogoPreviewImg")
        ?.getAttribute("src");
      if (
        currentPreviewSrc &&
        currentPreviewSrc !== "" &&
        !currentPreviewSrc.includes("undefined") &&
        !currentPreviewSrc.includes("null")
      ) {
        imgSrcToUse = currentPreviewSrc;
      }
    }

    if (imgSrcToUse) {
      concernImg.src = imgSrcToUse;
      concernSection.style.display = "block";
      if (concernTitle)
        concernTitle.textContent = getVal(
          "concernTitle",
          defaults.concernTitle
        );
    } else {
      concernSection.style.display = "none";
    }
  }

  const pvQr = document.getElementById("pvQrImg");
  const pvQrPlaceholder = document.getElementById("pvQrPlaceholder");
  const showQr = (function () {
    const el = document.getElementById("qrShow");
    return el ? !!el.checked : true;
  })();
  if (pvQr) {
    if (footerQrDataUrl && showQr) {
      pvQr.src = footerQrDataUrl;
      pvQr.style.display = "block";
      pvQr.style.position = "relative";
      pvQr.style.zIndex = "1";
      if (pvQrPlaceholder) {
        pvQrPlaceholder.style.display = "none";
      }
    } else {
      pvQr.src = "";
      pvQr.style.display = "none";
      if (pvQrPlaceholder) {
        pvQrPlaceholder.style.display = "block";
        pvQrPlaceholder.style.position = "absolute";
      }
    }
  }
}

// ensure both header and footer load on page ready
window.addEventListener("load", () => {
  try {
    loadHeaderSettings();
  } catch (e) {}
  try {
    loadFooterSettings();
  } catch (e) {}
});

// 4. Plots Tab Logic
function renderPlotsGrid() {
  const grid = document.getElementById("plotsGrid");
  grid.innerHTML = "";

  if (plotData.length === 0) {
    grid.innerHTML =
      '<p style="color: #6b7280; grid-column: 1 / -1; text-align: center;">কোনো প্লট পাওয়া যায়নি।</p>';
    return;
  }

  plotData.forEach((plot) => {
    const card = document.createElement("div");
    card.className = `plot-card ${plot.status}`;
    card.innerHTML = `
                    <div class="plot-header">
                        <div>
                            <div class="plot-title">প্লট #${plot.id}</div>
                            <div class="plot-block">ব্লক: ${plot.block}</div>
                        </div>
                        ${getStatusBadge(plot.status)}
                    </div>
                    <div class="plot-size">সাইজ: ${plot.size}</div>
                    <div class="plot-price">${formatFullCurrency(
                      plot.price
                    )}</div>
                    <div class="plot-actions">
                        ${
                          plot.status === "available"
                            ? `<button class="btn btn-reserve" onclick="showModal('প্লট সংরক্ষিত করুন', 'আপনি কি নিশ্চিত যে আপনি প্লট ${plot.id} সংরক্ষিত করতে চান?', [{text: 'বাতিল', action: closeModal}, {text: 'সংরক্ষণ', action: () => setPlotStatus('${plot.id}', 'reserved')}])">সংরক্ষণ</button>
                             <button class="btn btn-primary" onclick="showModal('প্লট বিক্রি করুন', 'প্লট ${plot.id} বিক্রির জন্য একটি নতুন বুকিং তৈরি করুন।', [{text: 'বন্ধ', action: closeModal}])">বিক্রি</button>`
                            : plot.status === "reserved"
                            ? `<button class="btn btn-primary" onclick="showModal('বুকিং দেখুন', 'প্লট ${plot.id} সংরক্ষিত রয়েছে। বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বুকিং দেখুন</button>
                             <button class="action-btn delete" style="flex: unset;" onclick="showModal('সংরক্ষণ বাতিল', 'আপনি কি প্লট ${plot.id} এর সংরক্ষণ বাতিল করতে চান?', [{text: 'না', action: closeModal}, {text: 'হ্যাঁ, বাতিল করুন', action: () => setPlotStatus('${plot.id}', 'available'), isDanger: true}])">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                             </button>`
                            : `<button class="btn btn-success" onclick="showModal('বিক্রিত প্লট', 'প্লট ${plot.id} বিক্রি হয়ে গেছে। বুকিং বিস্তারিত দেখতে বুকিং ট্যাবে যান।', [{text: 'বন্ধ', action: closeModal}])">বিস্তারিত</button>`
                        }
                    </div>
                `;
    grid.appendChild(card);
  });
}

function addNewPlot() {
  showModal("নতুন প্লট যোগ করুন", "একটি নতুন প্লট যোগ করার ফর্ম এখানে থাকবে।", [
    { text: "বাতিল", action: closeModal },
    {
      text: "যোগ করুন",
      action: () =>
        alertUser("যোগ সফল", "নতুন প্লট যুক্ত করার প্রক্রিয়া শুরু হয়েছে।"),
    },
  ]);
}

function setPlotStatus(id, newStatus) {
  closeModal();
  const plot = plotData.find((p) => p.id === id);
  if (plot) {
    plot.status = newStatus;
    renderPlotsGrid();
    renderOverview();
    alertUser(
      "অবস্থা আপডেট",
      `প্লট ${id} এর অবস্থা ${getStatusText(newStatus)} এ আপডেট করা হয়েছে।`
    );
  }
}

// 5. Utility and Initial Load
function updateCurrentDate() {
  const dateOptions = { year: "numeric", month: "long", day: "numeric" };
  const today = new Date().toLocaleDateString("bn-BD", dateOptions);
  document.getElementById("currentDate").textContent = today;
}

function logout() {
  // In a real application, this would clear session/token and redirect to login
  alertUser("লগআউট", "আপনি সফলভাবে লগআউট করেছেন।", [
    { text: "ঠিক আছে", action: closeModal },
  ]);
}

// Custom Modal Implementation (replacing alert/confirm)
const modal = document.getElementById("customModal");
const modalTitle = document.getElementById("modalTitle");
const modalMessage = document.getElementById("modalMessage");
const modalButtons = document.getElementById("modalButtons");
const modalIcon = document.getElementById("modalIcon");

/**
 * Shows the custom modal
 * @param {string} title
 * @param {string} message
 * @param {Array<{text: string, action: function, isDanger: boolean}>} buttons
 */
function showModal(title, message, buttons = [], type = "info") {
  modalTitle.textContent = title;
  modalMessage.innerHTML = message;
  modalButtons.innerHTML = "";

  // Set icon based on type
  if (modalIcon) {
    if (type === "success") {
      modalIcon.style.background = "#d1fae5";
      modalIcon.style.color = "#065f46";
      modalIcon.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else if (type === "error") {
      modalIcon.style.background = "#fee2e2";
      modalIcon.style.color = "#b91c1c";
      modalIcon.innerHTML = '<i class="fas fa-times-circle"></i>';
    } else if (type === "warning") {
      modalIcon.style.background = "#fef3c7";
      modalIcon.style.color = "#92400e";
      modalIcon.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
    } else {
      // Default info
      modalIcon.style.background = "#dbeafe";
      modalIcon.style.color = "#1e40af";
      modalIcon.innerHTML = '<i class="fas fa-info-circle"></i>';
    }
  }

  buttons.forEach((btn) => {
    const buttonElement = document.createElement("button");
    buttonElement.textContent = btn.text;
    // Base button style matching logout modal
    buttonElement.style.padding = "10px 16px";
    buttonElement.style.border = "none";
    buttonElement.style.borderRadius = "8px";
    buttonElement.style.fontWeight = "600";
    buttonElement.style.cursor = "pointer";
    buttonElement.style.transition = "all 0.2s";

    // Style variants: cancel / danger / primary
    const isCancel =
      btn.text === "না" || btn.text === "বাতিল" || btn.text === "বন্ধ";
    if (btn.isDanger) {
      buttonElement.style.background = "#ef4444";
      buttonElement.style.color = "#ffffff";
    } else if (isCancel) {
      buttonElement.style.background = "#e5e7eb";
      buttonElement.style.color = "#111827";
    } else {
      // Primary / success
      buttonElement.style.background = "#0d3d29";
      buttonElement.style.color = "#ffffff";
    }

    // Hover effects
    buttonElement.onmouseover = () => {
      if (btn.isDanger) {
        buttonElement.style.background = "#dc2626";
      } else if (isCancel) {
        buttonElement.style.background = "#d1d5db";
      } else {
        buttonElement.style.background = "#0d6639";
      }
    };
    buttonElement.onmouseout = () => {
      if (btn.isDanger) {
        buttonElement.style.background = "#ef4444";
      } else if (isCancel) {
        buttonElement.style.background = "#e5e7eb";
      } else {
        buttonElement.style.background = "#0d3d29";
      }
    };

    buttonElement.onclick = () => {
      if (btn.action) btn.action();
      // Do not close automatically if action is delete/save, let the action handle it (like deleteBooking does)
      if (
        btn.text === "বন্ধ" ||
        btn.text === "বাতিল" ||
        btn.text === "ঠিক আছে" ||
        btn.text === "না"
      ) {
        closeModal();
      }
    };
    modalButtons.appendChild(buttonElement);
  });

  // Show as centered flex, matching overlay style
  modal.style.display = "flex";
}

function closeModal() {
  modal.style.display = "none";
}

function alertUser(title, message, type = "info") {
  // Use the modern centered toast instead of modal
  if (typeof showToast === 'function') {
    showToast(type, title, message, 3500);
  } else {
    showModal(title, message, [{ text: "ঠিক আছে", action: closeModal }], type);
  }
}

// Helper functions for success and error notifications
function showSuccess(message, title = "সফল") {
  alertUser(title, message, "success");
}

function showError(message, title = "ত্রুটি") {
  alertUser(title, message, "error");
}

function showWarning(message, title = "সতর্কতা") {
  alertUser(title, message, "warning");
}

// Global helper: perform logout redirect
window.logoutNow = function () {
  try {
    window.location = "/logout";
  } catch (e) {
    window.location.href = "/logout";
  }
};

// Profile Logo — load from header settings (same as website header logo)
function applyProfileLogo() {
  fetch('/api/header-settings', { cache: 'no-store' })
    .then(r => r.json())
    .then(data => {
      var sLogo = document.getElementById("adminSidebarLogo");
      var logoUrl = data.logo_image_path || data.logo_full_url || '';
      if (sLogo && logoUrl) {
        sLogo.src = logoUrl;
        sLogo.style.display = 'block';
      }
    })
    .catch(() => {});
}

// Initial setup on window load
window.onload = function () {
  updateCurrentDate();

  // Check if we're on the dashboard page - only restore tabs if we are
  const isDashboardPage = window.location.pathname === "/dashboard";

  // Only run tab restoration logic on dashboard page
  if (isDashboardPage) {
    // Check if tab parameter is in URL (e.g., from login redirect or registration page navigation)
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get("tab");
    const sectionParam = urlParams.get("section");

    // Restore last active tab from localStorage, or default to overview
    let savedTab = "overview";
    let savedSection = "";

    // If tab parameter exists, use it (e.g., from login redirect or registration page navigation)
    if (tabParam) {
      savedTab = tabParam;
      savedSection = sectionParam || "";
      // Clear the parameters from URL without reload
      const newUrl = window.location.pathname;
      window.history.replaceState({}, document.title, newUrl);
    } else {
      // Restore from localStorage if user was in a specific section
      try {
        const storedTab = localStorage.getItem("adminActiveTab");
        const storedSection = localStorage.getItem("adminActiveSection");

        // Restore stored tab if it exists
        if (storedTab && storedTab.trim() !== "") {
          savedTab = storedTab;
          savedSection = storedSection || "";
        } else {
          // No stored tab, default to overview
          savedTab = "overview";
          savedSection = "";
        }
      } catch (e) {
        console.error("Error loading saved tab:", e);
        // On error, default to overview
        savedTab = "overview";
        savedSection = "";
      }
    }

    // Show the saved tab/section
    // If we have a section, navigate to it; otherwise show overview
    if (savedSection && savedSection.trim() !== "") {
      navigateTo(savedTab, savedSection, true);
    } else {
      // Default to overview
      showTab("overview");
    }
  }

  // Populate header settings form if present
  loadHeaderSettings();

  // Populate footer settings form if present
  try {
    loadFooterSettings();
  } catch (e) {
    console.error("Error loading footer settings:", e);
  }

  // Apply profile logo to sidebar and avatar at startup
  applyProfileLogo();

  // Helper to choose and set profile (dashboard) logo from avatar dropdown
  window.openProfileLogoEditor = function () {
    try {
      // Close dropdown if open
      var dd = document.getElementById("userDropdown");
      var btn = document.getElementById("userMenuBtn");
      if (dd) dd.classList.remove("open");
      if (btn) btn.setAttribute("aria-expanded", "false");

      // Create a transient file input to pick an image
      var input = document.createElement("input");
      input.type = "file";
      input.accept = "image/*";
      input.style.display = "none";
      document.body.appendChild(input);
      input.addEventListener(
        "change",
        function (e) {
          var file = e.target.files && e.target.files[0];
          if (!file) {
            document.body.removeChild(input);
            return;
          }
          var reader = new FileReader();
          reader.onload = function () {
            // Compress to fit in localStorage (limit ~5MB); resize to max 256x256
            var img = new Image();
            img.onload = function () {
              try {
                var maxSide = 256;
                var w = img.width,
                  h = img.height;
                if (w > h && w > maxSide) {
                  h = Math.round(h * (maxSide / w));
                  w = maxSide;
                } else if (h > w && h > maxSide) {
                  w = Math.round(w * (maxSide / h));
                  h = maxSide;
                } else if (w > maxSide) {
                  h = Math.round(h * (maxSide / w));
                  w = maxSide;
                }
                var canvas = document.createElement("canvas");
                canvas.width = w;
                canvas.height = h;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, w, h);
                var dataUrl = canvas.toDataURL("image/png", 0.9);
                setProfileLogo(dataUrl);
                showSuccess("ড্যাশবোর্ড লোগো আপডেট হয়েছে।");
              } catch (err) {
                showError(
                  "লোগো সংরক্ষণ করা যায়নি। অনুগ্রহ করে ছোট একটি ছবি ব্যবহার করুন।"
                );
              } finally {
                document.body.removeChild(input);
              }
            };
            img.onerror = function () {
              document.body.removeChild(input);
              showError("ছবি লোড করা যায়নি। অন্য একটি ছবি চেষ্টা করুন।");
            };
            img.src = reader.result;
          };
          reader.readAsDataURL(file);
        },
        { once: true }
      );
      input.click();
    } catch (e) {}
  };

  // User menu dropdown toggle
  (function () {
    var btn = document.getElementById("userMenuBtn");
    var dd = document.getElementById("userDropdown");
    if (!btn || !dd) return;
    function closeMenu() {
      dd.classList.remove("open");
      btn.setAttribute("aria-expanded", "false");
    }
    btn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = dd.classList.toggle("open");
      btn.setAttribute("aria-expanded", open ? "true" : "false");
    });
    document.addEventListener("click", function (e) {
      if (!dd.classList.contains("open")) return;
      if (!dd.contains(e.target) && e.target !== btn) closeMenu();
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") closeMenu();
    });
  })();

  // Keyboard accessibility for sidebar items with submenus
  document.querySelectorAll('.nav-item[role="button"]').forEach((item) => {
    item.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        const tab = item.getAttribute("data-tab");
        if (tab === "home") toggleHomeMenu();
        if (tab === "about") toggleAboutMenu();
        if (tab === "projects") toggleProjectsMenu();
      } else if (e.key === "Escape") {
        const controls = item.getAttribute("aria-controls");
        const submenu = controls && document.getElementById(controls);
        if (submenu && submenu.classList.contains("open")) {
          submenu.classList.remove("open");
          item.setAttribute("aria-expanded", "false");
        }
      }
    });
  });

  // Restore active submenu on page load
  (function restoreActiveSubmenu() {
    try {
      const activeTab = localStorage.getItem("adminActiveTab");
      const activeSection = localStorage.getItem("adminActiveSection");

      if (activeTab && activeSection) {
        // Wait for DOM to be ready
        setTimeout(() => {
          updateActiveSubmenu(activeTab, activeSection);
        }, 100);
      }
    } catch (e) {
      console.error("Error restoring active submenu:", e);
    }
  })();

  // Mobile Menu Functionality — moved outside window.onload (see bottom of file)

}; // end window.onload

// ==================== MOBILE MENU (outside window.onload) ====================
(function () {
  function initMobileMenu() {
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileOverlay = document.getElementById("mobileOverlay");
    const sidebar = document.getElementById("sidebar");

    if (!mobileMenuBtn || !mobileOverlay || !sidebar) return;

    // Prevent double-binding
    if (mobileMenuBtn.dataset.bound) return;
    mobileMenuBtn.dataset.bound = "1";

    function closeSidebar() {
      sidebar.classList.remove("open");
      mobileOverlay.classList.remove("active");
      mobileMenuBtn.classList.remove("active");
    }

    mobileMenuBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      sidebar.classList.toggle("open");
      mobileOverlay.classList.toggle("active");
      mobileMenuBtn.classList.toggle("active");
    });

    mobileOverlay.addEventListener("click", closeSidebar);

    document.querySelectorAll(".nav-subitem").forEach((item) => {
      item.addEventListener("click", function () {
        if (window.innerWidth <= 1199) closeSidebar();
      });
    });

    document.querySelectorAll(".nav-item").forEach((item) => {
      item.addEventListener("click", function () {
        const hasSubmenu = item.getAttribute("onclick") && item.getAttribute("onclick").startsWith("toggle");
        if (!hasSubmenu && window.innerWidth <= 1199) closeSidebar();
      });
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && sidebar.classList.contains("open")) {
        closeSidebar();
      }
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initMobileMenu);
  } else {
    initMobileMenu();
  }
})();
