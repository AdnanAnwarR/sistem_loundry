<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Roles Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #3b82f6;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-body); color: var(--text-main); font-size: 14px; }

        .container { display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 240px; background: #fff; border-right: 1px solid var(--border);
            padding: 24px 0; display: flex; flex-direction: column; position: sticky; top: 0; height: 100vh;
        }
        .logo { padding: 0 24px; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
        .logo i { background: var(--primary-blue); color: #fff; padding: 8px; border-radius: 8px; font-size: 16px; }
        
        .sidebar-label { padding: 0 24px; font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: 1px; margin-bottom: 10px; text-transform: uppercase; margin-top: 20px; }
        .menu { list-style: none; flex: 1; }
        .menu li {
            padding: 12px 24px; margin: 2px 12px; border-radius: 10px;
            cursor: pointer; color: var(--text-muted); display: flex; align-items: center; gap: 12px;
        }
        .menu li.active { background: #eff6ff; color: var(--primary-blue); font-weight: 600; }
        
        .user-panel { padding: 15px 24px; border-top: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
        .user-panel .avatar { width: 32px; height: 32px; border-radius: 50%; background: #bae6fd; }

        /* MAIN CONTENT */
        .main { flex: 1; padding: 25px 40px; }

        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .search-box { position: relative; width: 450px; }
        .search-box i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-box input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 20px; border: 1px solid var(--border); background: #f1f5f9; outline: none; }

        .header-section { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .btn-add { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px; }

        .tabs { border-bottom: 1px solid var(--border); margin-bottom: 25px; display: flex; gap: 30px; }
        .tab { padding-bottom: 10px; font-size: 14px; color: var(--text-muted); cursor: pointer; position: relative; }
        .tab.active { color: var(--primary-blue); font-weight: 600; }
        .tab.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: var(--primary-blue); }

        /* TABLE */
        .table-card { background: #fff; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 16px 20px; font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--border); }
        td { padding: 20px; font-size: 13px; border-bottom: 1px solid #f8fafc; vertical-align: top; }

        .role-name { display: flex; align-items: center; gap: 12px; font-weight: 700; color: #1e293b; }
        .role-icon { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; }
        
        .description-cell { color: var(--text-muted); line-height: 1.5; font-size: 12px; max-width: 300px; }
        
        .permission-tags { display: flex; flex-wrap: wrap; gap: 6px; max-width: 200px; }
        .p-tag { background: #f1f5f9; color: #64748b; padding: 2px 10px; border-radius: 6px; font-size: 10px; font-weight: 600; }

        .staff-count { background: #f8fafc; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 12px; }
        .actions { display: flex; gap: 15px; color: #cbd5e1; cursor: pointer; }

        .footer-nav { padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f8fafc; color: var(--text-muted); font-size: 12px; }
        .pagination { display: flex; gap: 5px; }
        .pg-btn { padding: 5px 12px; border: 1px solid var(--border); border-radius: 6px; cursor: pointer; }
        .pg-btn.active { background: var(--primary-blue); color: #fff; border-color: var(--primary-blue); }

        /* INFO CARDS */
        .info-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .info-card { background: #eff6ff; padding: 20px; border-radius: 16px; border: 1px solid #dbeafe; }
        .info-card-header { display: flex; align-items: center; gap: 10px; font-weight: 700; margin-bottom: 10px; font-size: 14px; color: #1e293b; }
        .info-card-header i { color: var(--primary-blue); }
        .info-card p { font-size: 11px; color: #64748b; line-height: 1.6; }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo"><i class="fa-solid fa-bolt"></i> <h2>LaundrySwift</h2></div>
        <div class="sidebar-label">MAIN MENU</div>
        <ul class="menu">
            <li><i class="fa-solid fa-chart-pie"></i> Dashboard</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li class="active"><i class="fa-solid fa-shield-halved"></i> Roles Management</li>
            <li><i class="fa-solid fa-user-gear"></i> Staff Management</li>
        </ul>
        <div class="sidebar-label">REPORTS</div>
        <ul class="menu">
            <li><i class="fa-solid fa-chart-line"></i> Performance</li>
            <li><i class="fa-solid fa-wallet"></i> Earnings</li>
        </ul>
        <div class="user-panel">
            <div class="avatar"></div>
            <div>
                <b style="font-size: 12px; display: block;">Alex Admin</b>
                <small style="font-size: 10px; color: var(--text-muted);">System Manager</small>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="top-bar">
            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search roles, permissions, or staff...">
            </div>
            <div style="display: flex; gap: 20px; color: #64748b; align-items: center;">
                <i class="fa-regular fa-bell"></i>
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>

        <div class="header-section">
            <div>
                <h1>Roles Management</h1>
                <p style="color: var(--text-muted); font-size: 13px;">Configure access control and operational permissions for your service staff.</p>
            </div>
            <button class="btn-add"><i class="fa fa-plus"></i> Add New Role</button>
        </div>

        <div class="tabs">
            <div class="tab active">All Roles</div>
            <div class="tab">Custom Roles</div>
            <div class="tab">System Defaults</div>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Description</th>
                        <th>Permissions</th>
                        <th>Staff Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="role-name">
                                <div class="role-icon" style="background: #eff6ff; color: #3b82f6;"><i class="fa-solid fa-droplet"></i></div>
                                Washer
                            </div>
                        </td>
                        <td class="description-cell">Responsible for washing, drying, and chemical balance checks for all fabric types.</td>
                        <td>
                            <div class="permission-tags">
                                <span class="p-tag">Washing</span> <span class="p-tag">Drying</span>
                                <span class="p-tag">Sorting</span>
                            </div>
                        </td>
                        <td><span class="staff-count">12 Staff</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="role-name">
                                <div class="role-icon" style="background: #fff7ed; color: #f97316;"><i class="fa-solid fa-shirt"></i></div>
                                Ironing Staff
                            </div>
                        </td>
                        <td class="description-cell">Specialized in pressing, steaming, and finishing delicate garments.</td>
                        <td>
                            <div class="permission-tags">
                                <span class="p-tag">Ironing</span> <span class="p-tag">Steaming</span>
                            </div>
                        </td>
                        <td><span class="staff-count">8 Staff</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="role-name">
                                <div class="role-icon" style="background: #f0fdf4; color: #22c55e;"><i class="fa-solid fa-box-archive"></i></div>
                                Packing Staff
                            </div>
                        </td>
                        <td class="description-cell">Final quality control, precision folding, and secure bagging/labeling.</td>
                        <td>
                            <div class="permission-tags">
                                <span class="p-tag">Folding</span> <span class="p-tag">Bagging</span>
                                <span class="p-tag">Tagging</span>
                            </div>
                        </td>
                        <td><span class="staff-count">5 Staff</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="role-name">
                                <div class="role-icon" style="background: #f5f3ff; color: #8b5cf6;"><i class="fa-solid fa-truck-fast"></i></div>
                                Courier
                            </div>
                        </td>
                        <td class="description-cell">Logistics handling for order pickups and home deliveries across zones.</td>
                        <td>
                            <div class="permission-tags">
                                <span class="p-tag">Pickup</span> <span class="p-tag">Delivery</span>
                                <span class="p-tag">GPS Tracking</span>
                            </div>
                        </td>
                        <td><span class="staff-count">10 Staff</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                </tbody>
            </table>
            <div class="footer-nav">
                <span>Showing 4 of 12 roles</span>
                <div class="pagination">
                    <div class="pg-btn">Previous</div>
                    <div class="pg-btn active">1</div>
                    <div class="pg-btn">2</div>
                    <div class="pg-btn">Next</div>
                </div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <div class="info-card-header"><i class="fa-solid fa-shield-check"></i> Security Tip</div>
                <p>Ensure each role has the minimum required permissions to reduce security risks. Use "System Defaults" as a starting template.</p>
            </div>
            <div class="info-card">
                <div class="info-card-header"><i class="fa-solid fa-users-gear"></i> Staff Assignment</div>
                <p>Changes to role permissions will immediately affect all staff members currently assigned to that role.</p>
            </div>
            <div class="info-card">
                <div class="info-card-header"><i class="fa-solid fa-history"></i> Activity Logs</div>
                <p>Any modifications to system roles are logged. You can view the audit trail in the Settings > Security Logs section.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>