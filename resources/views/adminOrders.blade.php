<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Orders</title>
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
        .logo span { display: block; font-size: 10px; color: var(--text-muted); font-weight: 400; }

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
            transition: 0.2s;
        }
        .menu li.active { background: var(--primary-blue); color: #fff; font-weight: 500; }
        .menu li:hover:not(.active) { background: #f1f5f9; }

        .user-footer { padding: 20px; border-top: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
        .user-footer img { width: 35px; height: 35px; border-radius: 50%; background: #fed7aa; }
        .user-footer .info b { font-size: 13px; display: block; }
        .user-footer .info small { font-size: 11px; color: var(--text-muted); }

        /* MAIN CONTENT */
        .main { flex: 1; padding: 20px 40px; }

        /* TOPBAR */
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .search-box { position: relative; width: 60%; }
        .search-box i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .search-box input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 30px; border: 1px solid var(--border); background: #f1f5f9; outline: none; }
        .top-icons { display: flex; align-items: center; gap: 15px; }
        .btn-new { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 30px; font-size: 13px; font-weight: 600; cursor: pointer; }

        /* HEADER SECTION */
        .header-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 20px; }
        .header-section h1 { font-size: 28px; margin-bottom: 5px; }
        .header-section p { color: var(--text-muted); font-size: 14px; }

        .filters { display: flex; background: #fff; padding: 5px; border-radius: 30px; border: 1px solid var(--border); }
        .filters button { border: none; background: transparent; padding: 8px 18px; border-radius: 20px; font-size: 13px; color: var(--text-muted); cursor: pointer; }
        .filters button.active { background: var(--primary-blue); color: #fff; font-weight: 600; }

        /* TABLE */
        .table-card { background: #fff; border-radius: 20px; border: 1px solid var(--border); overflow: hidden; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 20px; font-size: 11px; color: var(--primary-blue); text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid var(--border); }
        td { padding: 18px 20px; font-size: 13px; border-bottom: 1px solid #f8fafc; vertical-align: middle; }
        
        .customer { display: flex; align-items: center; gap: 10px; font-weight: 500; }
        .avatar { width: 30px; height: 30px; border-radius: 50%; }
        
        /* STATUS TAGS */
        .status { padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; gap: 5px; }
        .processing { background: #fff7ed; color: #f97316; }
        .pending { background: #f1f5f9; color: #64748b; }
        .delivered { background: #f0fdf4; color: #22c55e; }

        /* SERVICE TAGS */
        .svc { padding: 4px 12px; border-radius: 15px; font-size: 10px; font-weight: 600; }
        .svc-blue { background: #eff6ff; color: #3b82f6; }
        .svc-purple { background: #f5f3ff; color: #8b5cf6; }
        .svc-cyan { background: #ecfeff; color: #0891b2; }

        /* FOOTER TABLE (Pagination) */
        .table-footer { padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; background: #fff; border-top: 1px solid var(--border); }
        .table-footer span { font-size: 12px; color: var(--text-muted); }
        .pagination { display: flex; gap: 5px; align-items: center; }
        .page-btn { width: 28px; height: 28px; border-radius: 50%; border: 1px solid var(--border); display: flex; align-items: center; justify-content: center; font-size: 12px; cursor: pointer; color: var(--text-muted); }
        .page-btn.active { background: var(--primary-blue); color: #fff; border-color: var(--primary-blue); }

        /* SUMMARY CARDS */
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .sum-card { background: #fff; padding: 25px; border-radius: 20px; border: 1px solid var(--border); display: flex; align-items: center; gap: 15px; }
        .sum-icon { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .sum-icon.blue { background: #eff6ff; color: #3b82f6; }
        .sum-icon.orange { background: #fff7ed; color: #f97316; }
        .sum-icon.green { background: #f0fdf4; color: #22c55e; }
        .sum-info span { font-size: 11px; text-transform: uppercase; color: var(--text-muted); font-weight: 600; display: block; margin-bottom: 2px; }
        .sum-info h2 { font-size: 22px; font-weight: 700; }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-shirt"></i>
            <div>
                <h2>LaundrySwift</h2>
                <span>ADMIN PORTAL</span>
            </div>
        </div>
        <ul class="menu">
            <li><i class="fa-solid fa-table-columns"></i> Dashboard</li>
            <li class="active"><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-user-group"></i> Employees</li>
            <li><i class="fa-solid fa-shield-halved"></i> Roles</li>
            <li><i class="fa-solid fa-users"></i> Customers</li>
            <li><i class="fa-solid fa-list-check"></i> Services</li>
            <li><i class="fa-solid fa-chart-simple"></i> Reports</li>
        </ul>
        <div class="user-footer">
            <img src="https://ui-avatars.com/api/?name=Alex+Morgan&background=fed7aa&color=c2410c" alt="avatar">
            <div class="info">
                <b>Alex Morgan</b>
                <small>System Admin</small>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search orders, customers, or status...">
            </div>
            <div class="top-icons">
                <i class="fa-regular fa-bell" style="color:#64748b"></i>
                <i class="fa-solid fa-gear" style="color:#64748b"></i>
                <button class="btn-new">+ New Order</button>
            </div>
        </div>

        <div class="header-section">
            <div>
                <h1>Orders</h1>
                <p>Manage and monitor all laundry service orders in real-time.</p>
            </div>
            <div class="filters">
                <button class="active">All Orders</button>
                <button>Active</button>
                <button>Pending</button>
                <button>Completed</button>
            </div>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Weight</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>#ORD-001</b></td>
                        <td>
                            <div class="customer">
                                <img class="avatar" src="https://ui-avatars.com/api/?name=John+Doe&background=334155" alt="">
                                John Doe
                            </div>
                        </td>
                        <td><span class="svc svc-blue">Wash & Fold</span></td>
                        <td>5.2 kg</td>
                        <td><b>$25.00</b></td>
                        <td><span class="status processing"><i class="fa-solid fa-rotate"></i> Processing</span></td>
                        <td><i class="fa-solid fa-file-pen" style="color:#cbd5e1"></i></td>
                    </tr>
                    <tr>
                        <td><b>#ORD-002</b></td>
                        <td>
                            <div class="customer">
                                <img class="avatar" src="https://ui-avatars.com/api/?name=Jane+Smith&background=1e293b" alt="">
                                Jane Smith
                            </div>
                        </td>
                        <td><span class="svc svc-purple">Dry Cleaning</span></td>
                        <td>1.0 kg</td>
                        <td><b>$15.50</b></td>
                        <td><span class="status pending"><i class="fa-regular fa-clock"></i> Pending</span></td>
                        <td><i class="fa-solid fa-file-pen" style="color:#cbd5e1"></i></td>
                    </tr>
                    <tr>
                        <td><b>#ORD-003</b></td>
                        <td>
                            <div class="customer">
                                <img class="avatar" src="https://ui-avatars.com/api/?name=Robert+Brown&background=475569" alt="">
                                Robert Brown
                            </div>
                        </td>
                        <td><span class="svc svc-cyan">Ironing</span></td>
                        <td>2.5 kg</td>
                        <td><b>$10.00</b></td>
                        <td><span class="status delivered"><i class="fa-regular fa-circle-check"></i> Delivered</span></td>
                        <td><i class="fa-solid fa-file-pen" style="color:#cbd5e1"></i></td>
                    </tr>
                    <tr>
                        <td><b>#ORD-004</b></td>
                        <td>
                            <div class="customer">
                                <img class="avatar" src="https://ui-avatars.com/api/?name=Emily+Davis&background=334155" alt="">
                                Emily Davis
                            </div>
                        </td>
                        <td><span class="svc svc-blue">Wash & Fold</span></td>
                        <td>8.0 kg</td>
                        <td><b>$35.00</b></td>
                        <td><span class="status processing"><i class="fa-solid fa-rotate"></i> Processing</span></td>
                        <td><i class="fa-solid fa-file-pen" style="color:#cbd5e1"></i></td>
                    </tr>
                    <tr>
                        <td><b>#ORD-005</b></td>
                        <td>
                            <div class="customer">
                                <img class="avatar" src="https://ui-avatars.com/api/?name=Michael+Wilson&background=f1f5f9" alt="">
                                Michael Wilson
                            </div>
                        </td>
                        <td><span class="svc svc-purple">Dry Cleaning</span></td>
                        <td>2.0 kg</td>
                        <td><b>$30.00</b></td>
                        <td><span class="status pending"><i class="fa-regular fa-clock"></i> Pending</span></td>
                        <td><i class="fa-solid fa-file-pen" style="color:#cbd5e1"></i></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-footer">
                <span>Showing 5 of 240 orders</span>
                <div class="pagination">
                    <div class="page-btn"><i class="fa fa-chevron-left"></i></div>
                    <div class="page-btn active">1</div>
                    <div class="page-btn">2</div>
                    <div class="page-btn">3</div>
                    <div class="page-btn"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div>
        </div>

        <div class="summary-grid">
            <div class="sum-card">
                <div class="sum-icon blue"><i class="fa-solid fa-clipboard-list"></i></div>
                <div class="sum-info">
                    <span>Total Pending</span>
                    <h2>12 Orders</h2>
                </div>
            </div>
            <div class="sum-card">
                <div class="sum-icon orange"><i class="fa-solid fa-soap"></i></div>
                <div class="sum-info">
                    <span>In Processing</span>
                    <h2>8 Orders</h2>
                </div>
            </div>
            <div class="sum-card">
                <div class="sum-icon green"><i class="fa-solid fa-money-bill-trend-up"></i></div>
                <div class="sum-info">
                    <span>Today's Revenue</span>
                    <h2>$1,420.50</h2>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>