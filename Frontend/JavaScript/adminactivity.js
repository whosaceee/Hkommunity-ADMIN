/* ============================================================
   adminactivity.js
   Account Activity page only (activities.php). Read-only
   system log — search and role filter, no row actions.
   Requires common.js loaded first.
============================================================ */

const activityTableBody = document.getElementById("activityTableBody");
const activitySearch = document.getElementById("activitySearch");
const activityFilterMenu = document.getElementById("activityFilterMenu");
const activityFilterText = document.getElementById("activityFilterText");

let activeRoleFilter = "all";

function applyActivityFilters() {
    const query = (activitySearch.value || "").trim().toLowerCase();

    activityTableBody.querySelectorAll("tr").forEach(function (row) {
        const haystack = [row.dataset.user, row.dataset.activity]
            .join(" ")
            .toLowerCase();

        const matchesSearch = !query || haystack.includes(query);
        const matchesRole = activeRoleFilter === "all" || row.dataset.role === activeRoleFilter;

        row.classList.toggle("row-hidden", !(matchesSearch && matchesRole));
    });
}

if (activitySearch) {
    activitySearch.addEventListener("input", applyActivityFilters);
}

setupDropdown("activityFilterBtn", "activityFilterMenu");

if (activityFilterMenu) {
    activityFilterMenu.querySelectorAll(".admin-term-option").forEach(function (opt) {
        opt.addEventListener("click", function () {
            activityFilterMenu.querySelectorAll(".admin-term-option").forEach(function (o) {
                o.classList.remove("selected");
            });
            opt.classList.add("selected");
            activeRoleFilter = opt.dataset.filter;
            if (activityFilterText) activityFilterText.textContent = opt.dataset.label;
            activityFilterMenu.classList.remove("open");
            applyActivityFilters();
        });
    });
}