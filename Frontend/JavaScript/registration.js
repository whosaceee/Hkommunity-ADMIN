/* ============================================================
   registration.js
   Registration page only (registration.php). Requires
   common.js loaded first (dropdowns, modal helper,
   showAdminNotice).
============================================================ */

/* ============================================================
   Scholar Registration Requests
============================================================ */

const registrationTableBody = document.getElementById("registrationTableBody");
const registrationSearch = document.getElementById("registrationSearch");
const registrationFilterMenu = document.getElementById("registrationFilterMenu");
const registrationFilterText = document.getElementById("registrationFilterText");

let activeRegistrationFilter = "all";

function applyRegistrationFilters() {
    const query = (registrationSearch.value || "").trim().toLowerCase();

    registrationTableBody.querySelectorAll("tr").forEach(function (row) {
        const haystack = [row.dataset.id, row.dataset.name].join(" ").toLowerCase();
        const matchesSearch = !query || haystack.includes(query);
        const matchesStatus = activeRegistrationFilter === "all" || row.dataset.status === activeRegistrationFilter;
        row.classList.toggle("row-hidden", !(matchesSearch && matchesStatus));
    });
}

if (registrationSearch) {
    registrationSearch.addEventListener("input", applyRegistrationFilters);
}

setupDropdown("registrationFilterBtn", "registrationFilterMenu");

if (registrationFilterMenu) {
    registrationFilterMenu.querySelectorAll(".admin-term-option").forEach(function (opt) {
        opt.addEventListener("click", function () {
            registrationFilterMenu.querySelectorAll(".admin-term-option").forEach(function (o) {
                o.classList.remove("selected");
            });
            opt.classList.add("selected");
            activeRegistrationFilter = opt.dataset.filter;
            if (registrationFilterText) registrationFilterText.textContent = opt.dataset.label;
            registrationFilterMenu.classList.remove("open");
            applyRegistrationFilters();
        });
    });
}

/* ---------- Status pill + action cell rendering ---------- */

function refreshRegistrationRow(row) {
    const statusCell = row.querySelector("td:nth-child(5)");
    const actionsWrap = row.querySelector(".admin-row-actions");

    if (row.dataset.status === "approved") {
        statusCell.innerHTML = '<span class="admin-status-pill active">Approved</span>';
        actionsWrap.innerHTML =
            '<button class="admin-btn-outline" type="button" data-action="view">View</button>' +
            '<span class="admin-plain-note">Processed</span>';
    } else if (row.dataset.status === "rejected") {
        statusCell.innerHTML = '<span class="admin-status-pill inactive">&bull; Rejected</span>';
        actionsWrap.innerHTML =
            '<button class="admin-btn-outline" type="button" data-action="view">View</button>' +
            '<span class="admin-plain-note">Processed</span>';
    } else {
        statusCell.innerHTML = '<span class="admin-status-pill inactive">&bull; Pending</span>';
        actionsWrap.innerHTML =
            '<button class="admin-btn-outline" type="button" data-action="view">View</button>' +
            '<button class="admin-btn-primary" type="button" data-action="approve" style="height: 38px; padding: 0 16px; font-size: 12px;">Approve</button>' +
            '<button class="admin-btn-danger" type="button" data-action="reject">Reject</button>';
    }
}

/* ---------- View / Approve / Reject (delegated) ---------- */

const viewRegistration = setupAdminModal("viewRegistrationModal", {
    closeBtnIds: ["viewRegistrationClose", "viewRegistrationCloseBtn"],
});

const statusLabel = { pending: "Pending", approved: "Approved", rejected: "Rejected" };

registrationTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;

    const row = btn.closest("tr");
    const action = btn.dataset.action;

    if (action === "view") {
        document.getElementById("viewRegId").textContent = row.dataset.id;
        document.getElementById("viewRegName").textContent = row.dataset.name;
        document.getElementById("viewRegEmail").textContent = row.dataset.email;
        document.getElementById("viewRegCourse").textContent = row.dataset.course;
        document.getElementById("viewRegYear").textContent = row.dataset.year;
        document.getElementById("viewRegDiscount").textContent = row.dataset.discount;
        document.getElementById("viewRegVerified").textContent =
            row.dataset.verified === "true" ? "Verified" : "Needs Review";
        document.getElementById("viewRegStatus").textContent = statusLabel[row.dataset.status];
        if (viewRegistration) viewRegistration.open();
    }

    if (action === "approve") {
        if (!confirm("Approve " + row.dataset.name + "'s registration? This creates their scholar account.")) return;
        row.dataset.status = "approved";
        refreshRegistrationRow(row);
        showAdminNotice("Registration approved", row.dataset.name + "'s scholar account has been created.");
    }

    if (action === "reject") {
        if (!confirm("Reject " + row.dataset.name + "'s registration?")) return;
        row.dataset.status = "rejected";
        refreshRegistrationRow(row);
        showAdminNotice("Registration rejected", row.dataset.name + "'s request was marked as rejected.");
    }
});

/* ============================================================
   Registration Import
============================================================ */

const importFile = document.getElementById("importFile");
const importFileName = document.getElementById("importFileName");
const importHistoryTableBody = document.getElementById("importHistoryTableBody");
const importHistoryEmptyRow = document.getElementById("importHistoryEmptyRow");

if (importFile) {
    importFile.addEventListener("change", function () {
        importFileName.textContent = importFile.files.length ? importFile.files[0].name : "No file chosen";
    });
}

function updateImportHistoryEmptyState() {
    const hasRows = importHistoryTableBody.querySelectorAll("tr:not(.admin-table-empty)").length > 0;
    importHistoryEmptyRow.style.display = hasRows ? "none" : "";
}

const importFileBtn = document.getElementById("importFileBtn");
if (importFileBtn) {
    importFileBtn.addEventListener("click", function () {
        if (!importFile.files.length) {
            alert("Please choose a CSV or XLSX file first.");
            return;
        }

        const file = importFile.files[0];
        const type = file.name.toLowerCase().endsWith(".xlsx") ? "XLSX" : "CSV";

        const row = document.createElement("tr");
        row.dataset.file = file.name;

        row.innerHTML =
            "<td>" + file.name + "</td>" +
            "<td>" + type + "</td>" +
            '<td><span class="admin-status-pill active">Processed</span></td>' +
            "<td>Admin</td>" +
            "<td>" + todayFormatted() + "</td>" +
            '<td><div class="admin-row-actions">' +
                '<button class="admin-btn-outline" type="button" data-action="view">View</button>' +
                '<button class="admin-btn-danger" type="button" data-action="delete">Delete</button>' +
            "</div></td>";

        importHistoryTableBody.appendChild(row);
        updateImportHistoryEmptyState();

        importFile.value = "";
        importFileName.textContent = "No file chosen";

        showAdminNotice("File imported", '"' + file.name + '" was added to the import history.');
    });
}

const viewImport = setupAdminModal("viewImportModal", {
    closeBtnIds: ["viewImportClose", "viewImportCloseBtn"],
});
const viewImportText = document.getElementById("viewImportText");

importHistoryTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;

    const row = btn.closest("tr");
    const action = btn.dataset.action;

    if (action === "view") {
        viewImportText.textContent =
            '"' + row.dataset.file + '" was recorded in the import history. This prototype keeps the file name only — it does not parse or store row-level scholar data.';
        if (viewImport) viewImport.open();
    }

    if (action === "delete") {
        if (confirm('Remove "' + row.dataset.file + '" from the import history?')) {
            row.remove();
            updateImportHistoryEmptyState();
        }
    }
});