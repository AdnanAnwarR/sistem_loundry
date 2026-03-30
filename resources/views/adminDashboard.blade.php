<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift Admin Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary-blue: #2f6fed;
            --bg-light: #f8fafc;
            --text-dark: #334155;
            --text-muted: #94a3b8;
            --border-color: #f1f5f9;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background: var(--bg-light); color: var(--text-dark); }

        .container { display: flex; min-height: 100vh; }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #fff;
            padding: 24px;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }
        .brand { display: flex; align-items: center; gap: 10px; margin-bottom: 30px; }
        .brand i { background: var(--primary-blue); color: #fff; padding: 8px; border-radius: 8px; font-size: 20px; }
        .brand-text h2 { font-size: 18px; font-weight: 700; color: #1e293b; }
        .brand-text p { font-size: 11px; color: var(--text-muted); }

        .menu { list-style: none; flex-grow: 1; }
        .menu li {
            padding: 12px 16px;
            margin: 4px 0;
            border-radius: 12px;
            cursor: pointer;
            color: #64748b;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
        }
        .menu li i { width: 20px; }
        .menu li.active { background: #eff6ff; color: var(--primary-blue); font-weight: 600; }
        .menu li:hover:not(.active) { background: #f1f5f9; }

        .logout { color: #ef4444; padding: 12px 16px; cursor: pointer; font-size: 14px; display: flex; align-items: center; gap: 12px; border-top: 1px solid var(--border-color); padding-top: 20px; }

        /* MAIN CONTENT */
        .main { flex: 1; padding: 32px; overflow-y: auto; }
        .top-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; }
        .welcome h1 { font-size: 24px; font-weight: 700; margin-bottom: 4px; }
        .welcome p { color: var(--text-muted); font-size: 14px; }

        .header-actions { display: flex; align-items: center; gap: 20px; }
        .search-wrapper { position: relative; }
        .search-wrapper i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .search-wrapper input { padding: 10px 10px 10px 35px; border-radius: 20px; border: 1px solid #e2e8f0; width: 250px; background: #fff; outline: none; }
        
        .user-profile { display: flex; align-items: center; gap: 12px; }
        .user-info { text-align: right; }
        .user-info b { display: block; font-size: 14px; }
        .user-info small { color: var(--text-muted); font-size: 12px; }
        .avatar { width: 40px; height: 40px; background: #fcd34d; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        /* DASHBOARD CARDS */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 24px; }
        .stat-card { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid #f1f5f9; }
        .stat-header { display: flex; justify-content: space-between; margin-bottom: 15px; }
        .stat-icon { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .blue-bg { background: #eff6ff; color: #3b82f6; }
        .green-bg { background: #f0fdf4; color: #22c55e; }
        .orange-bg { background: #fff7ed; color: #f97316; }
        .stat-badge { font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 20px; height: fit-content; }
        .badge-green { background: #f0fdf4; color: #22c55e; }
        .badge-gray { background: #f1f5f9; color: #64748b; }
        .stat-card span { color: var(--text-muted); font-size: 13px; font-weight: 500; }
        .stat-card h2 { font-size: 24px; margin-top: 5px; font-weight: 700; }

        /* MIDDLE SECTION */
        .middle-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 24px; }
        .chart-container, .staff-container { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid #f1f5f9; }
        
        .section-title { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .section-title h3 { font-size: 16px; font-weight: 700; }
        .section-title select { border: none; font-size: 12px; color: var(--text-muted); cursor: pointer; outline: none; }

        .staff-list { margin-top: 15px; }
        .staff-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .staff-info { display: flex; align-items: center; gap: 12px; }
        .staff-img { width: 35px; height: 35px; border-radius: 50%; background: #e2e8f0; }
        .staff-name b { font-size: 13px; display: block; }
        .staff-name small { font-size: 11px; color: var(--text-muted); }
        .status-dot { display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--text-muted); }
        .dot { width: 8px; height: 8px; border-radius: 50%; }
        .online { background: #22c55e; }
        .away { background: #cbd5e1; }

        /* PROGRESS BAR */
        .progress-section { margin-top: 20px; border-top: 1px solid #f1f5f9; padding-top: 15px; }
        .progress-text { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px; font-weight: 600; }
        .progress-bar { height: 8px; background: #f1f5f9; border-radius: 10px; overflow: hidden; }
        .progress-fill { height: 100%; width: 80%; background: var(--primary-blue); border-radius: 10px; }

        /* TABLE SECTION */
        .table-container { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid #f1f5f9; }
        .table-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-new { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 13px; cursor: pointer; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px; color: var(--text-muted); font-size: 11px; letter-spacing: 0.5px; border-bottom: 1px solid #f8fafc; }
        td { padding: 16px 12px; font-size: 13px; border-bottom: 1px solid #f8fafc; }
        
        .customer-cell { display: flex; align-items: center; gap: 10px; }
        .initial { width: 28px; height: 28px; border-radius: 50%; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; }
        .status-pill { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .pill-processing { background: #fff7ed; color: #c2410c; }
        .pill-delivered { background: #f0fdf4; color: #15803d; }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="brand">
            <i class="fa-solid fa-shirt"></i>
            <div class="brand-text">
                <h2>LaundrySwift</h2>
                <p>Admin Portal</p>
            </div>
        </div>

        <ul class="menu">
            <li class="active"><i class="fa-solid fa-table-columns"></i> Dashboard</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-user-group"></i> Employees</li>
            <li><i class="fa-solid fa-user-shield"></i> Roles</li>
            <li><i class="fa-solid fa-users"></i> Customers</li>
            <li><i class="fa-solid fa-wand-sparkles"></i> Services</li>
            <li><i class="fa-solid fa-chart-simple"></i> Reports</li>
        </ul>

        <div class="logout">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </div>
    </div>

    <div class="main">
        <div class="top-header">
            <div class="welcome">
                <h1>Dashboard Overview</h1>
                <p>Welcome back, here's what's happening today.</p>
            </div>

            <div class="header-actions">
                <div class="search-wrapper">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search orders...">
                </div>
                <div class="notification"><i class="fa-regular fa-bell" style="font-size: 20px; color: #64748b;"></i></div>
                <div class="user-profile">
                    <div class="user-info">
                        <b>Alex Rivera</b>
                        <small>Super Admin</small>
                    </div>
                    <div class="avatar">
                        <i class="fa-solid fa-user" style="color: #fff;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue-bg"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="stat-badge badge-green">+12.5%</div>
                </div>
                <span>Total Orders</span>
                <h2>1,284</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue-bg"><i class="fa-solid fa-money-bill-wave"></i></div>
                    <div class="stat-badge badge-green">+8.2%</div>
                </div>
                <span>Total Revenue</span>
                <h2>$12,450</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon orange-bg"><i class="fa-solid fa-hourglass-half"></i></div>
                    <div class="stat-badge badge-gray">Active</div>
                </div>
                <span>Processing</span>
                <h2>45</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green-bg"><i class="fa-solid fa-circle-check"></i></div>
                    <div class="stat-badge badge-green">+15%</div>
                </div>
                <span>Delivered</span>
                <h2>1,180</h2>
            </div>
        </div>

        <div class="middle-grid">
            <div class="chart-container">
                <div class="section-title">
                    <div>
                        <h3>Revenue Analytics</h3>
                        <p style="font-size: 11px; color: #94a3b8;">Monthly earnings comparison</p>
                    </div>
                    <select>
                        <option>Last 7 Months</option>
                    </select>
                </div>
                <canvas id="revenueChart" height="150"></canvas>
            </div>

            <div class="staff-container">
                <div class="section-title">
                    <h3>Active Staff</h3>
                    <a href="#" style="font-size: 11px; text-decoration: none; color: var(--primary-blue); font-weight: 600;">View All</a>
                </div>
                <div class="staff-list">
                    <div class="staff-item">
                        <div class="staff-info">
                            <div class="staff-img" style="background:#fde68a"></div>
                            <div class="staff-name"><b>Marcus Chen</b><small>Delivery Lead</small></div>
                        </div>
                        <div class="status-dot"><div class="dot online"></div> On Duty</div>
                    </div>
                    <div class="staff-item">
                        <div class="staff-info">
                            <div class="staff-img" style="background:#ffedd5"></div>
                            <div class="staff-name"><b>Sarah Jenkins</b><small>Service Associate</small></div>
                        </div>
                        <div class="status-dot"><div class="dot online"></div> On Duty</div>
                    </div>
                    <div class="staff-item">
                        <div class="staff-info">
                            <div class="staff-img" style="background:#dcfce7"></div>
                            <div class="staff-name"><b>Robert Fox</b><small>Inventory Manager</small></div>
                        </div>
                        <div class="status-dot"><div class="dot away"></div> Away</div>
                    </div>
                </div>
                <div class="progress-section">
                    <div class="progress-text"><span>Total Staff Online</span> <span>12/15</span></div>
                    <div class="progress-bar"><div class="progress-fill"></div></div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h3>Recent Orders</h3>
                <button class="btn-new">+ New Order</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ORDER ID</th>
                        <th>CUSTOMER</th>
                        <th>SERVICE</th>
                        <th>STATUS</th>
                        <th>TOTAL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>#ORD-4921</b></td>
                        <td>
                            <div class="customer-cell">
                                <div class="initial" style="background:#e0f2fe; color:#0369a1">JD</div> John Doe
                            </div>
                        </td>
                        <td>Dry Cleaning</td>
                        <td><span class="status-pill pill-processing">Processing</span></td>
                        <td><b>$45.00</b></td>
                        <td><i class="fa fa-ellipsis-h" style="color: #cbd5e1;"></i></td>
                    </tr>
                    <tr>
                        <td><b>#ORD-4920</b></td>
                        <td>
                            <div class="customer-cell">
                                <div class="initial" style="background:#fae8ff; color:#a21caf">AS</div> Alice Smith
                            </div>
                        </td>
                        <td>Wash & Fold</td>
                        <td><span class="status-pill pill-delivered">Delivered</span></td>
                        <td><b>$22.50</b></td>
                        <td><i class="fa fa-ellipsis-h" style="color: #cbd5e1;"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL'],
            datasets: [{
                data: [30, 55, 40, 48, 25, 60, 45],
                borderColor: '#3b82f6',
                borderWidth: 3,
                tension: 0.4,
                pointRadius: 0,
                fill: true,
                backgroundColor: (context) => {
                    const gradient = context.chart.ctx.createLinearGradient(0, 0, 0, 300);
                    gradient.addColorStop(0, 'rgba(59, 130, 246, 0.1)');
                    gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');
                    return gradient;
                }
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 10, weight: 'bold' } } }
            }
        }
    });
</script>

</body>
</html>