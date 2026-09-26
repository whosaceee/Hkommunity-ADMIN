/* ============================================================
   requirements.js
   Requirements page only (requirements.php). Requires
   common.js loaded first (modal helper, showAdminNotice).
============================================================ */

const requirementsTableBody = document.getElementById("requirementsTableBody");
const requirementsEmptyRow = document.getElementById("requirementsEmptyRow");

const requirementName = document.getElementById("requirementName");
const requirementDescription = document.getElementById("requirementDescription");

function updateRequirementsEmptyState() {
    const hasRows = requirementsTableBody.querySelectorAll("tr:not(.admin-table-empty)").length > 0;
    requirementsEmptyRow.style.display = hasRows ? "none" : "";
}

/* ---------- Render a requirement row's Status + Action cells from its data ---------- */

function refreshRequirementRow(row) {
    const isActive = row.dataset.status === "active";

    const statusCell = row.querySelector("td:nth-child(2)");
    statusCell.innerHTML = isActive
        ? '<span class="admin-status-pill active">Active</span>'
        : '<span class="admin-status-pill inactive">&bull; Inactive</span>';

    const actionsWrap = row.querySelector(".admin-row-actions");
    actionsWrap.innerHTML =
        '<button class="admin-btn-outline" type="button" data-action="edit">Edit</button>' +
        '<button class="admin-btn-outline" type="button" data-action="toggle">' +
            (isActive ? "Deactivate" : "Activate") +
        '</button>' +
        '<button class="admin-btn-danger" type="button" data-action="delete">Delete</button>';
}

/* ---------- Create Requirement ---------- */

const createRequirementBtn = document.getElementById("createRequirementBtn");
if (createRequirementBtn) {
    createRequirementBtn.addEventListener("click", function () {
        const name = requirementName.value.trim();
        const description = requirementDescription.value.trim();

        if (!name) {
            alert("Please enter a requirement name.");
            requirementName.focus();
            return;
        }

        const row = document.createElement("tr");
        row.dataset.name = name;
        row.dataset.description = description;
        row.dataset.status = "active";
        row.dataset.created = todayFormatted();

        row.innerHTML =
            "<td>" + name + "</td>" +
            "<td></td>" +
            "<td>" + row.dataset.created + "</td>" +
            '<td><div class="admin-row-actions"></div></td>';

        requirementsTableBody.appendChild(row);
        refreshRequirementRow(row);
        updateRequirementsEmptyState();

        requirementName.value = "";
        requirementDescription.value = "";

        showAdminNotice("Requirement created", "\u201c" + name + "\u201d was added to the renewal checklist.");
    });
}

/* ---------- Edit / Toggle / Delete (delegated) ---------- */

let activeRequirementRow = null;

const editRequirementName = document.getElementById("editRequirementName");
const editRequirementDescription = document.getElementById("editRequirementDescription");

const editRequirement = setupAdminModal("editRequirementModal", {
    closeBtnIds: ["editRequirementClose", "editRequirementCancelBtn"],
});

requirementsTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;

    const row = btn.closest("tr");
    const action = btn.dataset.action;

    if (action === "edit") {
        activeRequirementRow = row;
        editRequirementName.value = row.dataset.name;
        editRequirementDescription.value = row.dataset.description;
        if (editRequirement) editRequirement.open();
    }

    if (action === "toggle") {
        const isActive = row.dataset.status === "active";
        const question = isActive
            ? 'Deactivate "' + row.dataset.name + '"? It will no longer appear on scholars\u2019 renewal checklist.'
            : 'Activate "' + row.dataset.name + '"?';

        if (!confirm(question)) return;

        row.dataset.status = isActive ? "inactive" : "active";
        refreshRequirementRow(row);
    }

    if (action === "delete") {
        if (confirm('Delete "' + row.dataset.name + '"? This cannot be undone.')) {
            row.remove();
            updateRequirementsEmptyState();
        }
    }
});

const editRequirementSaveBtn = document.getElementById("editRequirementSaveBtn");
if (editRequirementSaveBtn) {
    editRequirementSaveBtn.addEventListener("click", function () {
        if (!activeRequirementRow) return;

        const name = editRequirementName.value.trim();
        if (!name) {
            alert("Please enter a requirement name.");
            return;
        }

        activeRequirementRow.dataset.name = name;
        activeRequirementRow.dataset.description = editRequirementDescription.value.trim();
        activeRequirementRow.querySelector("td:nth-child(1)").textContent = name;

        if (editRequirement) editRequirement.close();
        showAdminNotice("Changes saved", "The requirement was updated.");
    });
}