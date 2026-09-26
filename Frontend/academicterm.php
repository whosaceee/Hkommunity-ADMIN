<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKommunity - Academic Terms</title>
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
            <a class="admin-nav-item active" href="academicterm.php" title="Academic Terms">
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
                <h1>Academic Terms</h1>
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
                    <span class="admin-page-eyebrow">System Settings</span>
                    <p class="admin-page-sub">Manage the academic terms used across HKommunity.</p>
                </div>

                <button class="admin-btn-primary" id="openAddTermModal" type="button">
                    <i class="fas fa-plus"></i> Add Academic Term
                </button>
            </div>

            <div class="admin-panel">
                <div class="admin-toolbar">
                    <div>
                        <h2>Academic Terms</h2>
                        <p class="admin-page-sub" style="margin-top: 2px;">Only one term can be active at a time. Previous terms remain available for historical records.</p>
                    </div>

                    <span class="admin-status-pill active" id="activeTermCountBadge">One active term</span>
                </div>

                <div class="admin-table-scroll">
                    <table class="admin-table" id="termsTable">
                        <thead>
                            <tr>
                                <th>Academic Year</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="termsTableBody">
                            <tr data-year="2026-2027" data-semester="1st Semester" data-status="active" data-created="Aug 01, 2026">
                                <td>2026-2027</td>
                                <td>1st Semester</td>
                                <td><span class="admin-status-pill active">Active</span></td>
                                <td>Aug 01, 2026</td>
                                <td>
                                    <div class="admin-row-actions">
                                        <button class="admin-btn-outline" type="button" data-action="edit">Edit</button>
                                        <span class="admin-plain-note" data-current-label>Current term</span>
                                    </div>
                                </td>
                            </tr>
                            <tr data-year="2025-2026" data-semester="2nd Semester" data-status="inactive" data-created="Jan 08, 2026">
                                <td>2025-2026</td>
                                <td>2nd Semester</td>
                                <td><span class="admin-status-pill inactive">&bull; Inactive</span></td>
                                <td>Jan 08, 2026</td>
                                <td>
                                    <div class="admin-row-actions">
                                        <button class="admin-btn-outline" type="button" data-action="edit">Edit</button>
                                        <button class="admin-btn-outline" type="button" data-action="set-active">Set active</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="admin-modal-overlay" id="addTermModal">
    <div class="admin-modal-card">
        <div class="admin-modal-head">
            <h2>Add Academic Term</h2>
            <button class="admin-modal-close" id="addTermClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <div class="admin-form-group">
                <label>Academic Year</label>
                <input type="text" id="addTermYear" placeholder="e.g., 2027-2028">
            </div>
            <div class="admin-form-group">
                <label>Semester</label>
                <select id="addTermSemester">
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="Summer">Summer</option>
                </select>
            </div>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-outline" id="addTermCancelBtn" type="button">Cancel</button>
            <button class="admin-btn-primary" id="addTermSaveBtn" type="button">Add Term</button>
        </div>
    </div>
</div>

<div class="admin-modal-overlay" id="editTermModal">
    <div class="admin-modal-card">
        <div class="admin-modal-head">
            <h2>Edit Academic Term</h2>
            <button class="admin-modal-close" id="editTermClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <div class="admin-form-group">
                <label>Academic Year</label>
                <input type="text" id="editTermYear">
            </div>
            <div class="admin-form-group">
                <label>Semester</label>
                <select id="editTermSemester">
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="Summer">Summer</option>
                </select>
            </div>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-outline" id="editTermCancelBtn" type="button">Cancel</button>
            <button class="admin-btn-primary" id="editTermSaveBtn" type="button">Save Changes</button>
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
<script src="JavaScript/academicterms.js"></script>

</body>
</html>