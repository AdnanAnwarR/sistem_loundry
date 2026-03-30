<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Employee Management</title>
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
        body { background-color: var(--bg-body); color: var(--text-main); }

        .container { display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: #fff;
            border-right: 1px solid var(--border);
            padding: 24px 0;
            display: flex;
            flex-direction: column;
        }
        .logo { padding: 0 24px; margin-bottom: 30px; display: flex; align-items: center; gap: 10px; }
        .logo i { color: var(--primary-blue); font-size: 24px; }
        .logo h2 { font-size: 18px; font-weight: 700; }

        .sidebar-label { padding: 0 24px; font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: 1px; margin-bottom: 15px; text-transform: uppercase; }
        .menu { list-style: none; flex: 1; }
        .menu li {
            padding: 12px 24px;
            margin: 4px 12px;
            border-radius: 12px;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .menu li.active { background: #eff6ff; color: var(--primary-blue); font-weight: 600; }
        .logout { padding: 24px; color: #ef4444; font-size: 14px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px; border-top: 1px solid var(--border); }

        /* MAIN */
        .main { flex: 1; padding: 20px 40px; }

        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .search-container { position: relative; width: 350px; }
        .search-container i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-container input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 20px; border: 1px solid var(--border); background: #f8fafc; outline: none; }
        .top-actions { display: flex; align-items: center; gap: 20px; color: #64748b; }

        .header-title { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; }
        .header-title h1 { font-size: 24px; font-weight: 700; }
        .header-title p { color: var(--text-muted); font-size: 14px; }
        .btn-add { background: var(--primary-blue); color: #fff; border: none; padding: 10px 22px; border-radius: 20px; font-weight: 600; font-size: 13px; cursor: pointer; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(59, 130, 246, 0.2); }

        /* STAT CARDS */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid var(--border); position: relative; }
        .stat-card .label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card .value { font-size: 28px; font-weight: 700; margin: 8px 0; }
        .stat-card .sub-label { font-size: 12px; color: var(--text-muted); }
        .stat-card .trend { color: #22c55e; font-weight: 600; }
        .stat-card .icon-box { position: absolute; top: 24px; right: 24px; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px; }
        .icon-blue { background: #eff6ff; color: #3b82f6; }
        .icon-green { background: #f0fdf4; color: #22c55e; }
        .icon-orange { background: #fff7ed; color: #f97316; }

        /* TEAM DIRECTORY */
        .directory-container { background: #fff; border-radius: 20px; border: 1px solid var(--border); overflow: hidden; }
        .table-header { padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); }
        .table-header h3 { font-size: 16px; font-weight: 700; }
        .btn-filter { border: 1px solid var(--border); background: #fff; padding: 6px 14px; border-radius: 8px; font-size: 12px; color: var(--text-muted); cursor: pointer; }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px 24px; font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; background: #f8fafc; }
        td { padding: 16px 24px; font-size: 13px; border-bottom: 1px solid #f8fafc; }

        .emp-info { display: flex; align-items: center; gap: 12px; }
        .emp-avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; }
        .emp-details b { display: block; font-size: 13px; }
        .emp-details span { font-size: 11px; color: var(--text-muted); }

        .role-badge { padding: 4px 12px; border-radius: 12px; background: #f1f5f9; color: #64748b; font-size: 11px; font-weight: 500; }
        .status-active { color: #22c55e; font-weight: 600; display: flex; align-items: center; gap: 6px; }
        .status-inactive { color: #94a3b8; font-weight: 500; display: flex; align-items: center; gap: 6px; }
        .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        .action-btns { display: flex; gap: 15px; color: #cbd5e1; cursor: pointer; }
        .action-btns i:hover { color: var(--primary-blue); }

        .table-footer { padding: 15px 24px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: var(--text-muted); }
        .pagination { display: flex; gap: 8px; align-items: center; }
        .page-num { width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; }
        .page-num.active { background: var(--primary-blue); color: #fff; }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-shirt"></i>
            <h2>LaundrySwift</h2>
        </div>
        <div class="sidebar-label">Admin Portal</div>
        <ul class="menu">
            <li><i class="fa-solid fa-table-columns"></i> Dashboard</li>
            <li class="active"><i class="fa-solid fa-user-group"></i> Employees</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-wand-sparkles"></i> Services</li>
            <li><i class="fa-solid fa-money-bill-transfer"></i> Financials</li>
        </ul>
        <div class="logout">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out
        </div>
    </div>

    <div class="main">
        <div class="top-nav">
            <div class="search-container">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search team...">
            </div>
            <div class="top-actions">
                <i class="fa-regular fa-bell"></i>
                <i class="fa-solid fa-gear"></i>
                <img src="https://ui-avatars.com/api/?name=Admin&background=0d9488&color=fff" style="width: 30px; border-radius: 50%;" alt="">
            </div>
        </div>

        <div class="header-title">
            <div>
                <h1>Employee Management</h1>
                <p>Overview of your team performance and roles.</p>
            </div>
            <button class="btn-add"><i class="fa-solid fa-user-plus"></i> Add New Employee</button>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="label">Total Employees</div>
                <div class="value">24</div>
                <div class="sub-label"><span class="trend">↗ 2</span> from last month</div>
                <div class="icon-box icon-blue"><i class="fa-solid fa-users"></i></div>
            </div>
            <div class="stat-card">
                <div class="label">Active Now</div>
                <div class="value">18</div>
                <div class="sub-label">Currently on shift</div>
                <div class="icon-box icon-green"><i class="fa-solid fa-circle-notch"></i></div>
            </div>
            <div class="stat-card">
                <div class="label">Pending Invites</div>
                <div class="value">3</div>
                <div class="sub-label">Awaiting response</div>
                <div class="icon-box icon-orange"><i class="fa-solid fa-envelope"></i></div>
            </div>
        </div>

        <div class="directory-container">
            <div class="table-header">
                <h3>Team Directory</h3>
                <button class="btn-filter"><i class="fa-solid fa-sliders"></i> Filter</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="emp-info">
                                <div class="emp-avatar" style="background: #e0f2fe; color: #0369a1;">AJ</div>
                                <div class="emp-details"><b>Alex Johnson</b><span>alex.j@laundryswift.com</span></div>
                            </div>
                        </td>
                        <td><span class="role-badge">Manager</span></td>
                        <td>+1 555-0101</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="action-btns"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-info">
                                <div class="emp-avatar" style="background: #dcfce7; color: #15803d;">MG</div>
                                <div class="emp-details"><b>Maria Garcia</b><span>maria.g@laundryswift.com</span></div>
                            </div>
                        </td>
                        <td><span class="role-badge">Cleaner</span></td>
                        <td>+1 555-0102</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="action-btns"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-info">
                                <div class="emp-avatar" style="background: #f5f3ff; color: #6d28d9;">JW</div>
                                <div class="emp-details"><b>James Wilson</b><span>james.w@laundryswift.com</span></div>
                            </div>
                        </td>
                        <td><span class="role-badge">Driver</span></td>
                        <td>+1 555-0103</td>
                        <td><span class="status-inactive"><div class="dot"></div> Inactive</span></td>
                        <td><div class="action-btns"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-info">
                                <div class="emp-avatar" style="background: #fef3c7; color: #b45309;">SB</div>
                                <div class="emp-details"><b>Sarah Brown</b><span>sarah.b@laundryswift.com</span></div>
                            </div>
                        </td>
                        <td><span class="role-badge">Support</span></td>
                        <td>+1 555-0104</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="action-btns"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-footer">
                <span>Showing 1-4 of 24 employees</span>
                <div class="pagination">
                    <i class="fa fa-chevron-left" style="font-size: 10px; cursor:pointer"></i>
                    <div class="page-num active">1</div>
                    <div class="page-num">2</div>
                    <div class="page-num">3</div>
                    <i class="fa fa-chevron-right" style="font-size: 10px; cursor:pointer"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>