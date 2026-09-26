/* ============================================================
   dutyrecords.js
   Duty Records page only (dutyrecords.php). Requires common.js
   loaded first (modal helper, showAdminNotice).

   Table only shows Student ID, Date, Duty Type, Hours and Year
   Level. Clicking a row opens a modal with the rest of the
   record (Name, Created, Updated).
============================================================ */

const dutyTableBody = document.getElementById("dutyTableBody");
const dutyEmptyRow = document.getElementById("dutyEmptyRow");
const dutySearch = document.getElementById("dutySearch");
const dutySearchBtn = document.getElementById("dutySearchBtn");

/* ---------- Search by Student ID ---------- */

function applyDutySearch() {
    const query = (dutySearch.value || "").trim().toLowerCase();
    let visibleCount = 0;

    dutyTableBody.querySelectorAll("tr.row-clickable").forEach(function (row) {
        const matches = !query || row.dataset.studentid.toLowerCase().includes(query);
        row.classList.toggle("row-hidden", !matches);
        if (matches) visibleCount++;
    });

    dutyEmptyRow.style.display = visibleCount === 0 ? "" : "none";
}

if (dutySearchBtn) {
    dutySearchBtn.addEventListener("click", applyDutySearch);
}
if (dutySearch) {
    dutySearch.addEventListener("input", applyDutySearch);
    dutySearch.addEventListener("keydown", function (e) {
        if (e.key === "Enter") applyDutySearch();
    });
}

/* ---------- Click a row to view full record ---------- */

const viewDuty = setupAdminModal("viewDutyModal", {
    closeBtnIds: ["viewDutyClose", "viewDutyCloseBtn"],
});

dutyTableBody.addEventListener("click", function (e) {
    const row = e.target.closest("tr.row-clickable");
    if (!row) return;

    document.getElementById("viewDutyStudentId").textContent = row.dataset.studentid;
    document.getElementById("viewDutyName").textContent = row.dataset.name;
    document.getElementById("viewDutyDate").textContent = row.dataset.date;
    document.getElementById("viewDutyType").textContent = row.dataset.dutytype;
    document.getElementById("viewDutyHours").textContent = row.dataset.hours;
    document.getElementById("viewDutyYearLevel").textContent = row.dataset.yearlevel;
    document.getElementById("viewDutyCreated").textContent = row.dataset.created;
    document.getElementById("viewDutyUpdated").textContent = row.dataset.updated;

    if (viewDuty) viewDuty.open();
});