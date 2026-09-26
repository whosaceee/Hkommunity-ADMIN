<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKommunity - Registration</title>
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
            <a class="admin-nav-item active" href="registration.php" title="Registration">
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
                <h1>Registration</h1>
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
                    <span class="admin-page-eyebrow">Scholar Onboarding</span>
                    <p class="admin-page-sub">Review individual registration requests, or import an official masterlist in bulk.</p>
                </div>
            </div>

            <!-- ============ Scholar Registration Requests ============ -->
            <div class="admin-panel" style="margin-bottom: 20px;">
                <div class="admin-toolbar">
                    <div>
                        <h2>Scholar Registration Requests</h2>
                        <p class="admin-page-sub" style="margin-top: 2px;">Scholars awaiting account approval this semester.</p>
                    </div>

                    <div class="admin-toolbar-controls">
                        <input class="admin-search" id="registrationSearch" type="text" placeholder="Search Student ID or name">

                        <div class="admin-wrapper" id="registrationFilterWrapper">
                            <button class="admin-filters-btn" id="registrationFilterBtn" type="button">
                                <span id="registrationFilterText">All statuses</span> <i class="fas fa-chevron-down"></i>
                            </button>

                            <div class="admin-dropdown" id="registrationFilterMenu">
                                <button class="admin-term-option selected" type="button" data-filter="all" data-label="All statuses">All statuses</button>
                                <button class="admin-term-option" type="button" data-filter="pending" data-label="Pending">Pending</button>
                                <button class="admin-term-option" type="button" data-filter="approved" data-label="Approved">Approved</button>
                                <button class="admin-term-option" type="button" data-filter="rejected" data-label="Rejected">Rejected</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-table-scroll">
                    <table class="admin-table" id="registrationTable">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Year Level</th>
                                <th>Verification</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="registrationTableBody">
                            <tr data-id="2026-01502" data-name="Ana Bautista" data-email="ana.bautista@phinmaed.com" data-course="BS Office Administration" data-year="1st Year" data-discount="Full Discount" data-verified="true" data-status="pending">
                                <td>2026-01502</td>
                                <td>Ana Bautista</td>
                                <td>1st Year</td>
                                <td><span class="admin-status-pill active">Verified</span></td>
                                <td><span class="admin-status-pill inactive">&bull; Pending</span></td>
                                <td>
                                    <div class="admin-row-actions">
                                        <button class="admin-btn-outline" type="button" data-action="view">View</button>
                                        <button class="admin-btn-primary" type="button" data-action="approve" style="height: 38px; padding: 0 16px; font-size: 12px;">Approve</button>
                                        <button class="admin-btn-danger" type="button" data-action="reject">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="2026-01489" data-name="Mark Villareal" data-email="mark.villareal@phinmaed.com" data-course="BS Criminology" data-year="2nd Year" data-discount="Partial Discount" data-verified="false" data-status="pending">
                                <td>2026-01489</td>
                                <td>Mark Villareal</td>
                                <td>2nd Year</td>
                                <td><span class="admin-status-pill inactive">&bull; Needs Review</span></td>
                                <td><span class="admin-status-pill inactive">&bull; Pending</span></td>
                                <td>
                                    <div class="admin-row-actions">
                                        <button class="admin-btn-outline" type="button" data-action="view">View</button>
                                        <button class="admin-btn-primary" type="button" data-action="approve" style="height: 38px; padding: 0 16px; font-size: 12px;">Approve</button>
                                        <button class="admin-btn-danger" type="button" data-action="reject">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="2026-01340" data-name="Grace Fernandez" data-email="grace.fernandez@phinmaed.com" data-course="BS Hospitality Management" data-year="3rd Year" data-discount="Full Discount" data-verified="true" data-status="approved">
                                <td>2026-01340</td>
                                <td>Grace Fernandez</td>
                                <td>3rd Year</td>
                                <td><span class="admin-status-pill active">Verified</span></td>
                                <td><span class="admin-status-pill active">Approved</span></td>
                                <td>
                                    <div class="admin-row-actions">
                                        <button class="admin-btn-outline" type="button" data-action="view">View</button>
                                        <span class="admin-plain-note">Processed</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ============ Registration Import ============ -->
            <div class="admin-panel">
                <h2>Registration Import</h2>
                <p class="admin-page-sub" style="margin-top: 2px; margin-bottom: 18px;">Import the official HK scholar masterlist from your Registrar's Office.</p>

                <p class="admin-code-note">
                    Required columns: <code>student_id_number</code>, <code>first_name</code>, <code>middle_name</code>,
                    <code>last_name</code>, <code>suffix</code>, <code>year_level</code>, <code>hk_discount_type</code><br>
                    Accepted formats: CSV or XLSX
                </p>

                <div class="admin-upload-row">
                    <input type="file" id="importFile" accept=".csv,.xlsx">
                    <span class="admin-page-note" style="text-align: left;" id="importFileName">No file chosen</span>
                </div>

                <button class="admin-btn-primary" id="importFileBtn" type="button">
                    <i class="fas fa-file-import"></i> Import File
                </button>

                <h2 style="margin-top: 30px;">Import History</h2>
                <p class="admin-page-sub" style="margin-top: 2px; margin-bottom: 18px;">Previous masterlist imports for this workspace.</p>

                <div class="admin-table-scroll">
                    <table class="admin-table" id="importHistoryTable">
                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Imported By</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="importHistoryTableBody">
                            <tr class="admin-table-empty" id="importHistoryEmptyRow">
                                <td colspan="6">No imports found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="admin-modal-overlay" id="viewRegistrationModal">
    <div class="admin-modal-card">
        <div class="admin-modal-head">
            <h2>Registration Request</h2>
            <button class="admin-modal-close" id="viewRegistrationClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <div class="admin-view-grid">
                <div class="admin-view-row"><span>Student ID</span><b id="viewRegId"></b></div>
                <div class="admin-view-row"><span>Full Name</span><b id="viewRegName"></b></div>
                <div class="admin-view-row"><span>Email</span><b id="viewRegEmail"></b></div>
                <div class="admin-view-row"><span>Course</span><b id="viewRegCourse"></b></div>
                <div class="admin-view-row"><span>Year Level</span><b id="viewRegYear"></b></div>
                <div class="admin-view-row"><span>HK Discount Type</span><b id="viewRegDiscount"></b></div>
                <div class="admin-view-row"><span>ID Verification</span><b id="viewRegVerified"></b></div>
                <div class="admin-view-row"><span>Status</span><b id="viewRegStatus"></b></div>
            </div>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-outline" id="viewRegistrationCloseBtn" type="button">Close</button>
        </div>
    </div>
</div>

<div class="admin-modal-overlay" id="viewImportModal">
    <div class="admin-modal-card admin-modal-sm">
        <div class="admin-modal-head">
            <h2>Import Details</h2>
            <button class="admin-modal-close" id="viewImportClose" type="button" aria-label="Close">×</button>
        </div>
        <div class="admin-modal-body">
            <p id="viewImportText"></p>
        </div>
        <div class="admin-modal-foot">
            <button class="admin-btn-outline" id="viewImportCloseBtn" type="button">Close</button>
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
<script src="JavaScript/registration.js"></script>

</body>
</html>