/* ============================================================
   quicklinks.js
   Quick Links page only (quicklinks.php). Requires common.js
   loaded first (modal helper, showAdminNotice, todayFormatted).
============================================================ */

const quicklinksTableBody = document.getElementById("quicklinksTableBody");
const quicklinksEmptyRow = document.getElementById("quicklinksEmptyRow");

const quicklinkLabel = document.getElementById("quicklinkLabel");
const quicklinkUrl = document.getElementById("quicklinkUrl");

function updateQuicklinksEmptyState() {
    const hasRows = quicklinksTableBody.querySelectorAll("tr:not(.admin-table-empty)").length > 0;
    quicklinksEmptyRow.style.display = hasRows ? "none" : "";
}

/* ---------- Render a row's Status + Action cells from its data ---------- */

function refreshQuicklinkRow(row) {
    const isActive = row.dataset.status === "active";

    const statusCell = row.querySelector("td:nth-child(3)");
    statusCell.innerHTML = isActive
        ? '<span class="admin-status-pill active">Active</span>'
        : '<span class="admin-status-pill inactive">&bull; Inactive</span>';

    const actionsWrap = row.querySelector(".admin-row-actions");
    actionsWrap.innerHTML =
        '<button class="admin-btn-outline" type="button" data-action="edit">Edit</button>' +
        '<button class="admin-btn-outline" type="button" data-action="toggle">' +
            (isActive ? "Deactivate" : "Activate") +
        "</button>" +
        '<button class="admin-btn-danger" type="button" data-action="delete">Delete</button>';
}

/* ---------- Add Quick Link ---------- */

const createQuicklinkBtn = document.getElementById("createQuicklinkBtn");
if (createQuicklinkBtn) {
    createQuicklinkBtn.addEventListener("click", function () {
        const label = quicklinkLabel.value.trim();
        const url = quicklinkUrl.value.trim();

        if (!label) {
            alert("Please enter a label.");
            quicklinkLabel.focus();
            return;
        }
        if (!url) {
            alert("Please enter a URL.");
            quicklinkUrl.focus();
            return;
        }

        const row = document.createElement("tr");
        row.dataset.label = label;
        row.dataset.url = url;
        row.dataset.status = "active";
        row.dataset.created = todayFormatted();

        row.innerHTML =
            "<td>" + label + "</td>" +
            "<td>" + url + "</td>" +
            "<td></td>" +
            "<td>" + row.dataset.created + "</td>" +
            '<td><div class="admin-row-actions"></div></td>';

        quicklinksTableBody.appendChild(row);
        refreshQuicklinkRow(row);
        updateQuicklinksEmptyState();

        quicklinkLabel.value = "";
        quicklinkUrl.value = "";

        showAdminNotice("Quick link added", "\u201c" + label + "\u201d is now visible on user dashboards.");
    });
}

/* ---------- Edit / Toggle / Delete (delegated) ---------- */

let activeQuicklinkRow = null;

const editQuicklinkLabel = document.getElementById("editQuicklinkLabel");
const editQuicklinkUrl = document.getElementById("editQuicklinkUrl");

const editQuicklink = setupAdminModal("editQuicklinkModal", {
    closeBtnIds: ["editQuicklinkClose", "editQuicklinkCancelBtn"],
});

quicklinksTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;

    const row = btn.closest("tr");
    const action = btn.dataset.action;

    if (action === "edit") {
        activeQuicklinkRow = row;
        editQuicklinkLabel.value = row.dataset.label;
        editQuicklinkUrl.value = row.dataset.url;
        if (editQuicklink) editQuicklink.open();
    }

    if (action === "toggle") {
        const isActive = row.dataset.status === "active";
        const question = isActive
            ? 'Deactivate "' + row.dataset.label + '"? It will be hidden from user dashboards.'
            : 'Activate "' + row.dataset.label + '"?';

        if (!confirm(question)) return;

        row.dataset.status = isActive ? "inactive" : "active";
        refreshQuicklinkRow(row);
    }

    if (action === "delete") {
        if (confirm('Delete "' + row.dataset.label + '"? This cannot be undone.')) {
            row.remove();
            updateQuicklinksEmptyState();
        }
    }
});

const editQuicklinkSaveBtn = document.getElementById("editQuicklinkSaveBtn");
if (editQuicklinkSaveBtn) {
    editQuicklinkSaveBtn.addEventListener("click", function () {
        if (!activeQuicklinkRow) return;

        const label = editQuicklinkLabel.value.trim();
        const url = editQuicklinkUrl.value.trim();

        if (!label) {
            alert("Please enter a label.");
            return;
        }
        if (!url) {
            alert("Please enter a URL.");
            return;
        }

        activeQuicklinkRow.dataset.label = label;
        activeQuicklinkRow.dataset.url = url;

        const cells = activeQuicklinkRow.querySelectorAll("td");
        cells[0].textContent = label;
        cells[1].textContent = url;

        if (editQuicklink) editQuicklink.close();
        showAdminNotice("Changes saved", "The quick link was updated.");
    });
}