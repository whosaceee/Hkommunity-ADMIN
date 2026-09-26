/* ============================================================
   user.js
   Users page only (user.php). Requires common.js
   loaded first (dropdowns, modal helper, showAdminNotice).
============================================================ */

const usersTableBody = document.getElementById("usersTableBody");
const userSearch = document.getElementById("userSearch");
const userFilterMenu = document.getElementById("userFilterMenu");
const userFilterText = document.getElementById("userFilterText");

let activeRoleFilter = "all";

const roleLabel = { admin: "Admin", coordinator: "Coordinator", scholar: "Scholar" };

function nowFormatted() {
    const d = new Date();
    const pad = (n) => String(n).padStart(2, "0");
    return d.getFullYear() + "-" + pad(d.getMonth() + 1) + "-" + pad(d.getDate()) +
        " " + pad(d.getHours()) + ":" + pad(d.getMinutes()) + ":" + pad(d.getSeconds());
}

/* ---------- Search + role filter ---------- */

function applyUserFilters() {
    const query = (userSearch.value || "").trim().toLowerCase();

    usersTableBody.querySelectorAll("tr").forEach(function (row) {
        const matchesSearch = !query || row.dataset.email.toLowerCase().includes(query);
        const matchesRole = activeRoleFilter === "all" || row.dataset.role === activeRoleFilter;
        row.classList.toggle("row-hidden", !(matchesSearch && matchesRole));
    });
}

if (userSearch) {
    userSearch.addEventListener("input", applyUserFilters);
}

setupDropdown("userFilterBtn", "userFilterMenu");

if (userFilterMenu) {
    userFilterMenu.querySelectorAll(".admin-term-option").forEach(function (opt) {
        opt.addEventListener("click", function () {
            userFilterMenu.querySelectorAll(".admin-term-option").forEach(function (o) {
                o.classList.remove("selected");
            });
            opt.classList.add("selected");
            activeRoleFilter = opt.dataset.filter;
            if (userFilterText) userFilterText.textContent = opt.dataset.label;
            userFilterMenu.classList.remove("open");
            applyUserFilters();
        });
    });
}

/* ---------- Row rendering helper (used for new accounts) ---------- */

function renderUserRow(data) {
    const row = document.createElement("tr");
    row.dataset.email = data.email;
    row.dataset.role = data.role;
    row.dataset.status = "active";
    row.dataset.created = data.created;

    row.innerHTML =
        "<td>" + data.email + "</td>" +
        "<td>" + roleLabel[data.role] + "</td>" +
        '<td><span class="admin-status-pill active">Active</span></td>' +
        "<td>" + data.created + "</td>" +
        '<td><div class="admin-row-actions">' +
            (data.role === "admin"
                ? '<span class="admin-plain-note">Admin</span>'
                : '<button class="admin-btn-danger" type="button" data-action="toggle">Deactivate</button>') +
        "</div></td>";

    return row;
}

/* ---------- Deactivate / Activate (delegated; Admin rows have no button) ---------- */

usersTableBody.addEventListener("click", function (e) {
    const btn = e.target.closest('button[data-action="toggle"]');
    if (!btn) return;

    const row = btn.closest("tr");
    const isActive = row.dataset.status === "active";
    const question = isActive
        ? "Deactivate " + row.dataset.email + "? They will lose access immediately."
        : "Activate " + row.dataset.email + "?";

    if (!confirm(question)) return;

    const newStatus = isActive ? "inactive" : "active";
    row.dataset.status = newStatus;

    const pill = row.querySelector(".admin-status-pill");
    pill.classList.toggle("active", newStatus === "active");
    pill.classList.toggle("inactive", newStatus === "inactive");
    pill.innerHTML = newStatus === "active" ? "Active" : "&bull; Inactive";

    btn.textContent = newStatus === "active" ? "Deactivate" : "Activate";
    btn.classList.toggle("admin-btn-danger", newStatus === "active");
    btn.classList.toggle("admin-btn-outline", newStatus === "inactive");
});

/* ---------- Create Account ---------- */

const createUserEmail = document.getElementById("createUserEmail");
const createUserRole = document.getElementById("createUserRole");

const createUser = setupAdminModal("createUserModal", {
    openBtnIds: ["openCreateUserModal"],
    closeBtnIds: ["createUserClose", "createUserCancelBtn"],
    onOpen: function () {
        createUserEmail.value = "";
        createUserRole.value = "coordinator";
    },
});

const createUserSaveBtn = document.getElementById("createUserSaveBtn");
if (createUserSaveBtn) {
    createUserSaveBtn.addEventListener("click", function () {
        const email = createUserEmail.value.trim();

        if (!email || !email.includes("@")) {
            alert("Please enter a valid email address.");
            createUserEmail.focus();
            return;
        }

        const row = renderUserRow({
            email: email,
            role: createUserRole.value,
            created: nowFormatted(),
        });

        usersTableBody.appendChild(row);
        applyUserFilters();

        if (createUser) createUser.close();
        showAdminNotice("Account created", email + " was added as a " + roleLabel[createUserRole.value].toLowerCase() + ".");
    });
}