
const termsTableBody = document.getElementById("termsTableBody");
const activeTermCountBadge = document.getElementById("activeTermCountBadge");

/* ---------- Render a row's Status cell + Action cell from its data-status ---------- */

function refreshTermRow(row) {
    const isActive = row.dataset.status === "active";

    const statusCell = row.querySelector("td:nth-child(3)");
    statusCell.innerHTML = isActive
        ? '<span class="admin-status-pill active">Active</span>'
        : '<span class="admin-status-pill inactive">&bull; Inactive</span>';

    const actionsWrap = row.querySelector(".admin-row-actions");
    actionsWrap.innerHTML =
        '<button class="admin-btn-outline" type="button" data-action="edit">Edit</button>' +
        (isActive
            ? '<span class="admin-plain-note">Current term</span>'
            : '<button class="admin-btn-outline" type="button" data-action="set-active">Set active</button>');
}

function refreshActiveCountBadge() {
    const count = termsTableBody.querySelectorAll('tr[data-status="active"]').length;
    activeTermCountBadge.textContent = count === 1 ? "One active term" : count + " active terms";
}

/* ---------- Add Academic Term ---------- */

const addTermYear = document.getElementById("addTermYear");
const addTermSemester = document.getElementById("addTermSemester");

const addTerm = setupAdminModal("addTermModal", {
    openBtnIds: ["openAddTermModal"],
    closeBtnIds: ["addTermClose", "addTermCancelBtn"],
    onOpen: function () {
        addTermYear.value = "";
        addTermSemester.value = "1st Semester";
    },
});

const addTermSaveBtn = document.getElementById("addTermSaveBtn");
if (addTermSaveBtn) {
    addTermSaveBtn.addEventListener("click", function () {
        const year = addTermYear.value.trim();
        if (!year) {
            alert("Please enter an academic year.");
            return;
        }

        const row = document.createElement("tr");
        row.dataset.year = year;
        row.dataset.semester = addTermSemester.value;
        row.dataset.status = "inactive";
        row.dataset.created = todayFormatted();

        row.innerHTML =
            "<td>" + year + "</td>" +
            "<td>" + addTermSemester.value + "</td>" +
            '<td></td>' +
            "<td>" + row.dataset.created + "</td>" +
            '<td><div class="admin-row-actions"></div></td>';

        termsTableBody.appendChild(row);
        refreshTermRow(row);
        refreshActiveCountBadge();

        if (addTerm) addTerm.close();
        showAdminNotice("Academic term added", year + " (" + addTermSemester.value + ") was added as an inactive term.");
    });
}

/* ---------- Edit / Set active (delegated) ---------- */

let activeTermRow = null;

const editTermYear = document.getElementById("editTermYear");
const editTermSemester = document.getElementById("editTermSemester");

const editTerm = setupAdminModal("editTermModal", {
    closeBtnIds: ["editTermClose", "editTermCancelBtn"],
});

termsTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest("button[data-action]");
    if (!btn) return;

    const row = btn.closest("tr");
    const action = btn.dataset.action;

    if (action === "edit") {
        activeTermRow = row;
        editTermYear.value = row.dataset.year;
        editTermSemester.value = row.dataset.semester;
        if (editTerm) editTerm.open();
    }

    if (action === "set-active") {
        if (!confirm("Set " + row.dataset.year + " (" + row.dataset.semester + ") as the active term? This will deactivate the current term.")) {
            return;
        }

        termsTableBody.querySelectorAll("tr").forEach(function (r) {
            r.dataset.status = r === row ? "active" : "inactive";
            refreshTermRow(r);
        });
        refreshActiveCountBadge();

        showAdminNotice("Active term updated", row.dataset.year + " (" + row.dataset.semester + ") is now the active term.");
    }
});

const editTermSaveBtn = document.getElementById("editTermSaveBtn");
if (editTermSaveBtn) {
    editTermSaveBtn.addEventListener("click", function () {
        if (!activeTermRow) return;

        const year = editTermYear.value.trim();
        if (!year) {
            alert("Please enter an academic year.");
            return;
        }

        activeTermRow.dataset.year = year;
        activeTermRow.dataset.semester = editTermSemester.value;

        const cells = activeTermRow.querySelectorAll("td");
        cells[0].textContent = year;
        cells[1].textContent = editTermSemester.value;

        if (editTerm) editTerm.close();
        showAdminNotice("Changes saved", "The academic term was updated.");
    });
}