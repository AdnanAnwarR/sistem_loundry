<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Employee Directory</title>
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

        .sidebar-label { padding: 0 24px; font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: 1px; margin-bottom: 10px; text-transform: uppercase; margin-top: 20px; }
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
        
        .user-footer { padding: 15px; background: #f8fafc; border-radius: 15px; margin: 20px; display: flex; align-items: center; gap: 10px; }
        .user-footer .avatar { width: 35px; height: 35px; border-radius: 50%; background: #475569; }
        .user-footer b { font-size: 12px; display: block; }
        .user-footer small { font-size: 10px; color: var(--text-muted); }

        /* MAIN */
        .main { flex: 1; padding: 20px 40px; }

        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .search-container { position: relative; width: 500px; }
        .search-container i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-container input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 20px; border: 1px solid var(--border); background: #f8fafc; outline: none; }

        .header-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header-title h1 { font-size: 24px; font-weight: 700; margin-bottom: 4px; }
        .header-title p { color: var(--text-muted); font-size: 13px; }
        .btn-add { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 13px; cursor: pointer; }

        /* STAT CARDS (Horizontal Layout) */
        .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 30px; }
        .stat-card { background: #fff; padding: 15px 20px; border-radius: 15px; border: 1px solid var(--border); display: flex; align-items: center; gap: 15px; }
        .stat-icon { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .stat-icon.blue { background: #eff6ff; color: #3b82f6; }
        .stat-icon.green { background: #f0fdf4; color: #22c55e; }
        .stat-icon.orange { background: #fff7ed; color: #f97316; }
        .stat-icon.purple { background: #f5f3ff; color: #8b5cf6; }
        .stat-info span { font-size: 11px; color: var(--text-muted); font-weight: 500; }
        .stat-info h2 { font-size: 20px; font-weight: 700; }

        /* STAFF LIST TABLE */
        .list-container { background: #fff; border-radius: 20px; border: 1px solid var(--border); overflow: hidden; }
        .list-header { padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); }
        .list-header h3 { font-size: 16px; font-weight: 700; }
        .header-btns { display: flex; gap: 10px; }
        .btn-outline { border: 1px solid var(--border); background: #fff; padding: 8px 15px; border-radius: 8px; font-size: 12px; color: var(--text-muted); cursor: pointer; display: flex; align-items: center; gap: 8px; }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px 24px; font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--border); }
        td { padding: 15px 24px; font-size: 13px; border-bottom: 1px solid #f8fafc; }

        .emp-profile { display: flex; align-items: center; gap: 12px; }
        .emp-img { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; background: #e2e8f0; }

        /* ROLE BADGES (Specific Colors) */
        .role-badge { padding: 4px 12px; border-radius: 15px; font-size: 11px; font-weight: 600; }
        .role-washer { background: #eff6ff; color: #3b82f6; }
        .role-ironing { background: #f5f3ff; color: #8b5cf6; }
        .role-packing { background: #fff7ed; color: #f97316; }
        .role-courier { background: #f0fdf4; color: #22c55e; }

        .status-active { color: #22c55e; font-weight: 600; display: flex; align-items: center; gap: 6px; }
        .status-inactive { color: #cbd5e1; font-weight: 500; display: flex; align-items: center; gap: 6px; }
        .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        .actions { display: flex; gap: 15px; color: #cbd5e1; cursor: pointer; }

        .table-footer { padding: 15px 24px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: var(--text-muted); }
        .pagination { display: flex; gap: 8px; align-items: center; }
        .p-btn { width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-weight: 600; }
        .p-btn.active { background: var(--primary-blue); color: #fff; }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-shirt"></i>
            <h2>LaundrySwift</h2>
        </div>
        <div class="sidebar-label">MAIN MENU</div>
        <ul class="menu">
            <li><i class="fa-solid fa-table-columns"></i> Dashboard</li>
            <li class="active"><i class="fa-solid fa-user-group"></i> Employees</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-users"></i> Customers</li>
        </ul>
        <div class="sidebar-label">SUPPORT</div>
        <ul class="menu">
            <li><i class="fa-solid fa-gear"></i> Settings</li>
        </ul>
        <div class="user-footer">
            <div class="avatar"></div>
            <div>
                <b>Alex Morgan</b>
                <small>System Admin</small>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="top-nav">
            <div class="search-container">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search employees, roles, or phone numbers...">
            </div>
            <div style="display: flex; gap: 20px; color: #64748b;">
                <i class="fa-regular fa-bell"></i>
                <i class="fa-regular fa-circle-question"></i>
                <button class="btn-add">+ Add New Employee</button>
            </div>
        </div>

        <div class="header-title">
            <div>
                <h1>Employee Directory</h1>
                <p>Manage and monitor your service staff across all departments.</p>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fa-solid fa-users-viewfinder"></i></div>
                <div class="stat-info"><span>Total Staff</span><h2>24</h2></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fa-regular fa-circle-check"></i></div>
                <div class="stat-info"><span>Active Now</span><h2>18</h2></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange"><i class="fa-solid fa-truck-fast"></i></div>
                <div class="stat-info"><span>On Delivery</span><h2>5</h2></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon purple"><i class="fa-solid fa-moon"></i></div>
                <div class="stat-info"><span>Off Duty</span><h2>6</h2></div>
            </div>
        </div>

        <div class="list-container">
            <div class="list-header">
                <h3>Staff List</h3>
                <div class="header-btns">
                    <button class="btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
                    <button class="btn-outline"><i class="fa-solid fa-download"></i> Export</button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="emp-profile">
                                <img src="https://i.pravatar.cc/150?u=1" class="emp-img" alt="">
                                <b>John Doe</b>
                            </div>
                        </td>
                        <td><span class="role-badge role-washer">Washer</span></td>
                        <td>+1 555-0101</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-profile">
                                <img src="https://i.pravatar.cc/150?u=2" class="emp-img" alt="">
                                <b>Jane Smith</b>
                            </div>
                        </td>
                        <td><span class="role-badge role-ironing">Ironing</span></td>
                        <td>+1 555-0102</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-profile">
                                <img src="https://i.pravatar.cc/150?u=3" class="emp-img" alt="">
                                <b>Mike Ross</b>
                            </div>
                        </td>
                        <td><span class="role-badge role-packing">Packing</span></td>
                        <td>+1 555-0103</td>
                        <td><span class="status-inactive"><div class="dot"></div> Inactive</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="emp-profile">
                                <img src="https://i.pravatar.cc/150?u=4" class="emp-img" alt="">
                                <b>Harvey Specter</b>
                            </div>
                        </td>
                        <td><span class="role-badge role-courier">Courier</span></td>
                        <td>+1 555-0104</td>
                        <td><span class="status-active"><div class="dot"></div> Active</span></td>
                        <td><div class="actions"><i class="fa-solid fa-pencil"></i> <i class="fa-solid fa-trash"></i></div></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-footer">
                <span>Showing 1 to 4 of 24 results</span>
                <div class="pagination">
                    <i class="fa fa-chevron-left" style="font-size: 10px; cursor:pointer"></i>
                    <div class="p-btn active">1</div>
                    <div class="p-btn">2</div>
                    <div class="p-btn">3</div>
                    <i class="fa fa-chevron-right" style="font-size: 10px; cursor:pointer"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>