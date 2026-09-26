<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKommunity - Account Activity</title>
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
            <a class="admin-nav-item active" href="activities.php" title="Account Activity">
                <i class="fas fa-check"></i><span class="admin-nav-text">Account Activity</span>
            </a>
            <a class="admin-nav-item" href="academicterm.php" title="Academic Terms">
                <i class="fas fa-calendar-days"></i><span class="admin-nav-text">Academic Terms</span>
            </a>
            <a class="admin-nav-item" href="requirements.php" title="Requirements">
                <i class="fas fa-list-check"></i><span class="admin-nav-text">Requirements</span>
            </a>
            <a class="admin-nav-item" href="dutyrecords.php" title="Duty Records">
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
                <h1>Account Activity</h1>
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
                    <span class="admin-page-eyebrow">System History</span>
                    <p class="admin-page-sub">Review basic account activity and access changes.</p>
                </div>
            </div>

            <div class="admin-panel">
                <div class="admin-toolbar">
                    <div>
                        <h2>Account Activities</h2>
                        <p class="admin-page-sub" style="margin-top: 2px;">Recent account actions recorded by HKommunity.</p>
                    </div>

                    <div class="admin-toolbar-controls">
                        <input class="admin-search" id="activitySearch" type="text" placeholder="Search activity">

                        <div class="admin-wrapper" id="activityFilterWrapper">
                            <button class="admin-filters-btn" id="activityFilterBtn" type="button">
                                <span id="activityFilterText">All roles</span> <i class="fas fa-chevron-down"></i>
                            </button>

                            <div class="admin-dropdown" id="activityFilterMenu">
                                <button class="admin-term-option selected" type="button" data-filter="all" data-label="All roles">All roles</button>
                                <button class="admin-term-option" type="button" data-filter="coordinator" data-label="Coordinator">Coordinator</button>
                                <button class="admin-term-option" type="button" data-filter="scholar" data-label="Scholar">Scholar</button>
                                <button class="admin-term-option" type="button" data-filter="admin" data-label="Admin">Admin</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-table-scroll">
                    <table class="admin-table" id="activityTable">
                        <thead>
                            <tr>
                                <th>Date &amp; Time</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody id="activityTableBody">
                            <tr data-user="Maria Cruz" data-role="coordinator" data-activity="Login">
                                <td>Sep 18, 2026 - 8:42 AM</td>
                                <td>Maria Cruz</td>
                                <td><span class="admin-role-pill">&bull; Coordinator</span></td>
                                <td>Login</td>
                            </tr>
                            <tr data-user="2023-01428" data-role="scholar" data-activity="Account Registered">
                                <td>Sep 18, 2026 - 8:15 AM</td>
                                <td>2023-01428</td>
                                <td><span class="admin-role-pill">&bull; Scholar</span></td>
                                <td>Account Registered</td>
                            </tr>
                            <tr data-user="Admin" data-role="admin" data-activity="Academic Term Updated">
                                <td>Sep 17, 2026 - 3:30 PM</td>
                                <td>Admin</td>
                                <td><span class="admin-role-pill">&bull; Admin</span></td>
                                <td>Academic Term Updated</td>
                            </tr>
                            <tr data-user="Daniel Santos" data-role="coordinator" data-activity="Password Changed">
                                <td>Sep 16, 2026 - 11:06 AM</td>
                                <td>Daniel Santos</td>
                                <td><span class="admin-role-pill">&bull; Coordinator</span></td>
                                <td>Password Changed</td>
                            </tr>
                            <tr data-user="Leah Villanueva" data-role="coordinator" data-activity="Account Deactivated">
                                <td>Sep 15, 2026 - 9:20 AM</td>
                                <td>Leah Villanueva</td>
                                <td><span class="admin-role-pill">&bull; Coordinator</span></td>
                                <td>Account Deactivated</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<script src="JavaScript/common.js"></script>
<script src="JavaScript/adminactivity.js"></script>

</body>
</html>