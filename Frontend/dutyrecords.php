<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKommunity - Duty Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="Style/Style.css">
</head>
<body>

<div class="admin-page">
    <aside class="admin-sidebar" id="adminSidebar">
        <button class="admin-logo-btn" type="button" title="HKommunity">
            <img class="admin-full-logo" src="images/dashboard-logo.jpg" alt="HKommunity">
            <img class="admin-icon-logo" src="images/logo.jpg" alt="HK">
        </button>

        <button class="admin-collapse-btn" id="adminCollapseBtn" type="button" aria-label="Expand sidebar">
            <i class="fas fa-chevron-right"></i>
        </button>

        <nav class="admin-nav">
            <a class="admin-nav-item" href="dashboard.php" title="Dashboard">
                <i class="fas fa-house"></i><span class="admin-nav-text">Dashboard</span>
            </a>
            <a class="admin-nav-item" href="registration.php" title="Registration">
                <i class="fas fa-user-plus"></i><span class="admin-nav-text">Registration</span>
            </a>
            <a class="admin-nav-item" href="user.php" title="Users">
                <i class="fas fa-users"></i><span class="admin-nav-text">Users</span>
            </a>
            <a class="admin-nav-item" href="activities.php" title="Account Activity">
                <i class="fas fa-check"></i><span class="admin-nav-text">Account Activity</span>
            </a>
            <a class="admin-nav-item" href="academicterm.php" title="Academic Terms">
                <i class="fas fa-calendar-days"></i><span class="admin-nav-text">Academic Terms</span>
            </a>
            <a class="admin-nav-item" href="requirements.php" title="Requirements">
                <i class="fas fa-list-check"></i><span class="admin-nav-text">Requirements</span>
            </a>
            <a class="admin-nav-item active" href="dutyrecords.php" title="Duty Records">
                <i class="fas fa-business-time"></i><span class="admin-nav-text">Duty Records</span>
            </a>
            <a class="admin-nav-item" href="quicklinks.php" title="Quick Links">
                <i class="fas fa-link"></i><span class="admin-nav-text">Quick Links</span>
            </a>
        </nav>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <div>
                <span class="admin-eyebrow">Admin Workspace</span>
                <h1>Duty Records</h1>
            </div>

            <div class="admin-topbar-actions">
                <div class="admin-wrapper" id="adminNotifWrapper">
                    <button class="admin-notif-btn" id="adminNotifBtn" type="button" aria-label="Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="admin-notif-badge"></span>
                    </button>

                    <div class="admin-dropdown" id="adminNotifMenu">
                        <div class="admin-dropdown-title">Notifications</div>
                        <div class="admin-dropdown-item">
                            <b>New coordinator request</b>
                            <small>Awaiting your approval</small>
                        </div>
                        <div class="admin-dropdown-item">
                            <b>6 scholars not yet registered</b>
                            <small>Reminder for this semester</small>
                        </div>
                    </div>
                </div>

                <div class="admin-wrapper" id="adminTermWrapper">
                    <button class="admin-term-btn" id="adminTermBtn" type="button">
                        <span id="adminTermText">AY 2026&ndash;2027 &middot; 1st Semester</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div class="admin-dropdown" id="adminTermMenu">
                        <button class="admin-term-option selected" type="button" data-term="AY 2026&ndash;2027 &middot; 1st Semester">AY 2026&ndash;2027 &middot; 1st Semester</button>
                        <button class="admin-term-option" type="button" data-term="AY 2025&ndash;2026 &middot; 2nd Semester">AY 2025&ndash;2026 &middot; 2nd Semester</button>
                    </div>
                </div>

                <div class="admin-wrapper" id="adminProfileWrapper">
                    <button class="admin-profile-btn" id="adminProfileBtn" type="button">
                        <span class="admin-avatar">AD</span>
                        <span class="admin-profile-name">Admin</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>

                    <div class="admin-dropdown" id="adminProfileMenu">
                        <a href="#" class="admin-dropdown-link"><i class="fas fa-user-gear"></i> Admin Settings</a>
                        <a href="login.php" class="admin-dropdown-link danger"><i class="fas fa-right-from-bracket"></i> Log out</a>
                    </div>
                </div>
            </div>
        </header>

        <section class="admin-content">
            <div class="admin-page-head">
                <div>
                    <span class="admin-page-eyebrow">Scholar Duty</span>
                    <p class="admin-page-sub">Logged duty hours submitted by scholars. Click a row to view full details.</p>
                </div>
            </div>

            <div class="admin-panel">
                <div class="admin-toolbar">
                    <div>
                        <h2>Duty Records</h2>
                        <p class="admin-page-sub" style="margin-top: 2px;">Search by Student ID Number.</p>
                    </div>

                    <div class="admin-toolbar-controls">
                        <input class="admin-search" id="dutySearch" type="text" placeholder="Student ID Number">
                        <button class="admin-btn-primary" id="dutySearchBtn" type="button">
                            <i class="fas fa-magnifying-glass"></i> Search
                        </button>
                    </div>
                </div>

                <div class="admin-table-scroll">
                    <table class="admin-table" id="dutyTable">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Date</th>
                                <th>Duty Type</th>
                                <th>Hours</th>
                                <th>Year Level</th>
                            </tr>
                        </thead>
                        <tbody id="dutyTableBody">
                            <tr class="row-clickable"
                                data-studentid="2023-01428"
                                data-name="Juvi Cerezo"
                                data-date="Sep 18, 2026"
                                data-dutytype="Library Duty"
                                data-hours="4"
                                data-yearlevel="3rd Year"
                                data-created="Sep 18, 2026 - 5:05 PM"
                                data-updated="Sep 18, 2026 - 5:05 PM">
                                <td>2023-01428</td>
                                <td>Sep 18, 2026</td>
                                <td>Library Duty</td>
                                <td>4</td>
                                <td>3rd Year</td>
                            </tr>
                            <tr class="row-clickable"
                                data-studentid="2026-01489"
                                data-name="Mark Villareal"
                                data-date="Sep 17, 2026"
                                data-dutytype="Registrar's Office Duty"
                                data-hours="3"
                                data-yearlevel="2nd Year"
                                data-created="Sep 17, 2026 - 2:40 PM"
                                data-updated="Sep 17, 2026 - 2:40 PM">
                                <td>2026-01489</td>
                                <td>Sep 17, 2026</td>
                                <td>Registrar's Office Duty</td>
                                <td>3</td>
                                <td>2nd Year</td>
                            </tr>
                            <tr class="row-clickable"
                                data-studentid="2026-01340"
                                data-name="Grace Fernandez"
                                data-date="Sep 15, 2026"
                                data-dutytype="Community Extension"
                                data-hours="5"
                                data-yearlevel="1st Year"
                                data-created="Sep 15, 2026 - 9:12 AM"
                                data-updated="Sep 16, 2026 - 8:30 AM">
                                <td>2026-01340</td>
                                <td>Sep 15, 2026</td>
                                <td>Community Extension</td>
                                <td>5</td>
                                <td>1st Year</td>
                            </tr>
                            <tr class="admin-table-empty" id="dutyEmptyRow" style="display: none;">
                                <td colspan="5">No duty records found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="admin-modal-overlay" id="viewDutyModal">
    <div class="admin-modal-card">
        <div class="admin-modal-head">
            <h2>Duty Record</h2>
            <button class="admin-modal-close" id="viewDutyClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <div class="admin-view-grid">
                <div class="admin-view-row"><span>Student ID</span><b id="viewDutyStudentId"></b></div>
                <div class="admin-view-row"><span>Name</span><b id="viewDutyName"></b></div>
                <div class="admin-view-row"><span>Date</span><b id="viewDutyDate"></b></div>
                <div class="admin-view-row"><span>Duty Type</span><b id="viewDutyType"></b></div>
                <div class="admin-view-row"><span>Hours</span><b id="viewDutyHours"></b></div>
                <div class="admin-view-row"><span>Year Level</span><b id="viewDutyYearLevel"></b></div>
                <div class="admin-view-row"><span>Created</span><b id="viewDutyCreated"></b></div>
                <div class="admin-view-row"><span>Updated</span><b id="viewDutyUpdated"></b></div>
            </div>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-outline" id="viewDutyCloseBtn" type="button">Close</button>
        </div>
    </div>
</div>

<div class="admin-modal-overlay" id="adminNoticeModal">
    <div class="admin-modal-card admin-modal-sm">
        <div class="admin-modal-head">
            <h2 id="adminNoticeTitle">Notice</h2>
            <button class="admin-modal-close" id="adminNoticeClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <p id="adminNoticeMessage"></p>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-primary" id="adminNoticeOkBtn" type="button">OK</button>
        </div>
    </div>
</div>

<script src="JavaScript/common.js"></script>
<script src="JavaScript/dutyrecords.js"></script>

</body>
</html>