/* ============================================================
   common.js
   Shared across every admin page (sidebar, topbar dropdowns,
   term selector, modal helper). Load this before any
   page-specific admin script.
============================================================ */

/* ---------- Shared date helper ---------- */

function todayFormatted() {
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const d = new Date();
    const day = String(d.getDate()).padStart(2, "0");
    return months[d.getMonth()] + " " + day + ", " + d.getFullYear();
}

/* ---------- Sidebar expand / collapse ---------- */

const adminSidebar = document.getElementById("adminSidebar");
const adminCollapseBtn = document.getElementById("adminCollapseBtn");

if (adminSidebar && adminCollapseBtn) {
    adminCollapseBtn.addEventListener("click", function () {
        adminSidebar.classList.toggle("expanded");
    });
}

/* ---------- Active nav item (matches current page, no server logic needed) ---------- */

(function highlightActiveNavItem() {
    const currentFile = window.location.pathname.split("/").pop() || "dashboard.php";

    document.querySelectorAll(".admin-nav-item").forEach(function (link) {
        const linkFile = link.getAttribute("href").split("/").pop();
        link.classList.toggle("active", linkFile === currentFile);
    });
})();

/* ---------- Shared dropdown behavior (notif / profile / term / filters) ---------- */

const adminDropdowns = [];

function setupDropdown(btnId, menuId) {
    const btn = document.getElementById(btnId);
    const menu = document.getElementById(menuId);
    if (!btn || !menu) return null;

    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        const wasOpen = menu.classList.contains("open");
        adminDropdowns.forEach(function (d) {
            d.menu.classList.remove("open");
        });
        if (!wasOpen) menu.classList.add("open");
    });

    const entry = { btn, menu };
    adminDropdowns.push(entry);
    return entry;
}

document.addEventListener("click", function (e) {
    adminDropdowns.forEach(function (d) {
        if (!d.menu.contains(e.target) && !d.btn.contains(e.target)) {
            d.menu.classList.remove("open");
        }
    });
});

setupDropdown("adminNotifBtn", "adminNotifMenu");
setupDropdown("adminProfileBtn", "adminProfileMenu");
setupDropdown("adminTermBtn", "adminTermMenu");

/* ---------- Term selector ---------- */

const adminTermText = document.getElementById("adminTermText");
const adminTermMenu = document.getElementById("adminTermMenu");

if (adminTermMenu && adminTermText) {
    adminTermMenu.querySelectorAll(".admin-term-option").forEach(function (opt) {
        opt.addEventListener("click", function () {
            adminTermMenu.querySelectorAll(".admin-term-option").forEach(function (o) {
                o.classList.remove("selected");
            });
            opt.classList.add("selected");
            adminTermText.innerHTML = opt.dataset.term;
            adminTermMenu.classList.remove("open");
        });
    });
}

/* ---------- Modal helper (same pattern as the scholar portal) ---------- */

const adminOpenModals = [];

function setupAdminModal(id, { openBtnIds = [], closeBtnIds = [], onOpen } = {}) {
    const modal = document.getElementById(id);
    if (!modal) return null;

    const openBtns = openBtnIds.map((i) => document.getElementById(i)).filter(Boolean);
    const closeBtns = closeBtnIds.map((i) => document.getElementById(i)).filter(Boolean);

    function open() {
        if (onOpen) onOpen();
        modal.classList.add("open");
    }

    function close() {
        modal.classList.remove("open");
    }

    openBtns.forEach((btn) => btn.addEventListener("click", open));
    closeBtns.forEach((btn) => btn.addEventListener("click", close));

    modal.addEventListener("click", function (e) {
        if (e.target === modal) close();
    });

    adminOpenModals.push(modal);
    return { modal, open, close };
}

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        adminDropdowns.forEach(function (d) {
            d.menu.classList.remove("open");
        });
        adminOpenModals.forEach((modal) => modal.classList.remove("open"));
    }
});

/* ---------- Notice modal (lightweight one-button confirmation) ---------- */

const adminNoticeTitle = document.getElementById("adminNoticeTitle");
const adminNoticeMessage = document.getElementById("adminNoticeMessage");

const adminNotice = setupAdminModal("adminNoticeModal", {
    closeBtnIds: ["adminNoticeClose", "adminNoticeOkBtn"],
});

function showAdminNotice(title, message) {
    if (adminNoticeTitle) adminNoticeTitle.textContent = title;
    if (adminNoticeMessage) adminNoticeMessage.textContent = message;
    if (adminNotice) adminNotice.open();
}