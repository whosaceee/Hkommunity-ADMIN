<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKommunity - Admin Dashboard</title>
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
            <a class="admin-nav-item active" href="dashboard.php" title="Dashboard">
                <i class="fas fa-house"></i><span class="admin-nav-text">Dashboard</span>
            </a>
            <a class="admin-nav-item" href="user.php" title="user">
                <i class="fas fa-user-plus"></i><span class="admin-nav-text">Users</span>
            </a>
            <a class="admin-nav-item" href="activities.php" title="activities">
                <i class="fas fa-check"></i><span class="admin-nav-text">Account Activity</span>
            </a>
            <a class="admin-nav-item" href="academicterm.php" title="Academic Terms">
                <i class="fas fa-calendar-days"></i><span class="admin-nav-text">Academic Terms</span>
            </a>
            <a class="admin-nav-item" href="registration.php" title="Registration">
                <i class="fas fa-user-plus"></i><span class="admin-nav-text">Registration</span>
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
                <h1>Dashboard</h1>
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
            <div class="admin-welcome">
                <h2>Good day, Admin!</h2>
                <p>Here's an overview of HKommunity accounts and system access.</p>
            </div>

            <div class="admin-stats">
                <div class="admin-stat-card stat-green">
                    <div class="admin-stat-num">0</div>
                    <div class="admin-stat-label">Coordinator Accounts</div>
                    <div class="admin-stat-sub">0 active</div>
                    <a href="user.php" class="admin-stat-btn">View details <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="admin-stat-card stat-blue">
                    <div class="admin-stat-num">0</div>
                    <div class="admin-stat-label">Registered Scholars</div>
                    <div class="admin-stat-sub">Scholars with HKommunity accounts</div>
                    <a href="user.php" class="admin-stat-btn">View details <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="admin-stat-card stat-yellow">
                    <div class="admin-stat-num">0</div>
                    <div class="admin-stat-label">Not Registered Scholars</div>
                    <div class="admin-stat-sub">Official scholars without accounts</div>
                    <a href="user.php" class="admin-stat-btn">View details <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="admin-stat-card stat-purple">
                    <div class="admin-stat-num">0</div>
                    <div class="admin-stat-label">Active Accounts</div>
                    <div class="admin-stat-sub">Currently allowed to access</div>
                    <a href="user.php" class="admin-stat-btn">View details <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="admin-lower">
                <div class="admin-panel">
                    <h2>Account Overview</h2>
                    <p class="admin-panel-sub">Manage HKommunity user accounts and monitor registration status.</p>

                    <div class="admin-overview-row">
                        <div class="admin-overview-info">
                            <b>Coordinator Accounts</b>
                            <small>3 total accounts</small>
                        </div>
                        <div class="admin-overview-figures">
                            <div><span class="figure-green">0</span><small>Active</small></div>
                            <div><span class="figure-red">0</span><small>Inactive</small></div>
                        </div>
                        <a href="user.php" class="admin-overview-btn">Manage accounts <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div class="admin-overview-row">
                        <div class="admin-overview-info">
                            <b>Scholar Accounts</b>
                            <small>Official scholars and registration status.</small>
                        </div>
                        <div class="admin-overview-figures">
                            <div><span class="figure-green">0</span><small>Registered</small></div>
                            <div><span class="figure-yellow">0</span><small>Not registered</small></div>
                        </div>
                        <a href="user.php" class="admin-overview-btn">View scholar accounts <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="admin-panel">
                    <div class="admin-panel-head">
                        <h2>Recent Account Activity</h2>
                        <a href="activities.php" class="admin-view-all">View all <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <p class="admin-panel-sub">Latest system activities and account updates.</p>

                    <ul class="admin-activity-list">
                        <li>
                            <div>
                                <b>Login</b>
                                <small>Coordinator</small>
                            </div>
                            <span class="admin-activity-time">8:42 AM</span>
                        </li>
                        <li>
                            <div>
                                <b>Account Registered</b>
                                <small>Scholar</small>
                            </div>
                            <span class="admin-activity-time">8:15 AM</span>
                        </li>
                        <li>
                            <div>
                                <b>Academic Term Updated</b>
                                <small>Admin</small>
                            </div>
                            <span class="admin-activity-time">3:30 PM</span>
                        </li>
                        <li>
                            <div>
                                <b>Password Changed</b>
                                <small>Coordinator</small>
                            </div>
                            <span class="admin-activity-time">11:06 AM</span>
                        </li>
                        <li class="dot-red">
                            <div>
                                <b>Account Deactivated</b>
                                <small>Coordinator</small>
                            </div>
                            <span class="admin-activity-time">9:20 AM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
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
<script src="JavaScript/dashboard.js"></script>


</body>
</html>