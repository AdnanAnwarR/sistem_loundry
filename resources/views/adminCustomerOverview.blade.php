<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Customers</title>
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
        
        .menu { list-style: none; flex: 1; }
        .menu li {
            padding: 12px 24px; margin: 2px 12px; border-radius: 10px;
            cursor: pointer; color: var(--text-muted); display: flex; align-items: center; gap: 12px;
        }
        .menu li.active { background: #eff6ff; color: var(--primary-blue); font-weight: 600; }
        
        .sidebar-footer { padding: 15px 24px; border-top: 1px solid var(--border); }
        .user-info { display: flex; align-items: center; gap: 10px; margin-top: 15px; }
        .user-info .avatar { width: 32px; height: 32px; border-radius: 50%; background: #bfdbfe; color: #1e40af; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; }

        /* MAIN CONTENT */
        .main { flex: 1; padding: 25px 40px; }

        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px; }

        /* STATS CARDS */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: #fff; padding: 20px; border-radius: 16px; border: 1px solid var(--border); }
        .stat-card span { font-size: 12px; color: var(--text-muted); font-weight: 500; }
        .stat-card h2 { font-size: 24px; margin: 8px 0; font-weight: 700; }
        .stat-trend { font-size: 11px; font-weight: 600; }
        .trend-up { color: #22c55e; }
        .trend-blue { color: #3b82f6; }

        /* FILTERS & SEARCH */
        .action-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .search-wrapper { position: relative; width: 400px; }
        .search-wrapper i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-wrapper input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 12px; border: 1px solid var(--border); background: #fff; outline: none; }
        .filter-btns { display: flex; gap: 10px; }
        .btn-outline { background: #fff; border: 1px solid var(--border); padding: 8px 16px; border-radius: 10px; font-size: 13px; color: var(--text-muted); cursor: pointer; font-weight: 500; display: flex; align-items: center; gap: 8px; }

        /* TABLE */
        .table-container { background: #fff; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 16px 20px; font-size: 12px; color: var(--text-muted); font-weight: 500; border-bottom: 1px solid var(--border); }
        td { padding: 16px 20px; font-size: 13px; border-bottom: 1px solid #f8fafc; }
        
        .customer-cell { display: flex; align-items: center; gap: 12px; }
        .cust-avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 700; }
        
        /* STATUS BADGES */
        .badge { padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .badge-active { background: #f0fdf4; color: #22c55e; }
        .badge-vip { background: #eff6ff; color: #3b82f6; }
        .badge-inactive { background: #f1f5f9; color: #94a3b8; }

        .table-footer { padding: 16px 20px; display: flex; justify-content: space-between; align-items: center; color: var(--text-muted); font-size: 12px; }
        .pagination { display: flex; gap: 6px; align-items: center; }
        .page-btn { width: 30px; height: 30px; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 1px solid transparent; }
        .page-btn.active { background: var(--primary-blue); color: #fff; }
        .page-btn:hover:not(.active) { border-color: var(--border); }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo"><i class="fa-solid fa-bolt"></i> <h2>LaundrySwift</h2></div>
        <ul class="menu">
            <li><i class="fa-solid fa-chart-pie"></i> Dashboard</li>
            <li class="active"><i class="fa-solid fa-user-group"></i> Customers</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-wand-sparkles"></i> Services</li>
            <li><i class="fa-solid fa-chart-line"></i> Reports</li>
        </ul>
        <div class="sidebar-footer">
            <div style="color: var(--text-muted); font-size: 13px; cursor: pointer;"><i class="fa-solid fa-gear"></i> Settings</div>
            <div class="user-info">
                <div class="avatar">AD</div>
                <div>
                    <b style="font-size: 12px; display: block;">Admin User</b>
                    <small style="font-size: 10px; color: var(--text-muted);">admin@laundryswift.com</small>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="top-nav">
            <h1>Customers</h1>
            <div style="display: flex; gap: 15px; align-items: center;">
                <i class="fa-regular fa-bell" style="color: var(--text-muted); font-size: 18px;"></i>
                <button class="btn-add"><i class="fa fa-plus"></i> Add Customer</button>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <span>Total Customers</span>
                <h2>1,284</h2>
                <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +12% from last month</div>
            </div>
            <div class="stat-card">
                <span>Active This Week</span>
                <h2>412</h2>
                <div class="stat-trend trend-blue"><i class="fa-solid fa-bolt"></i> 32% engagement</div>
            </div>
            <div class="stat-card">
                <span>Avg. Order Value</span>
                <h2>$38.50</h2>
                <div class="stat-trend trend-up"><i class="fa-solid fa-arrow-trend-up"></i> +5.4%</div>
            </div>
            <div class="stat-card">
                <span>New Signups</span>
                <h2>89</h2>
                <div style="font-size: 11px; color: var(--text-muted); margin-top: 5px;">Past 30 days</div>
            </div>
        </div>

        <div class="action-bar">
            <div class="search-wrapper">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search by name, email, or customer ID...">
            </div>
            <div class="filter-btns">
                <button class="btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
                <button class="btn-outline"><i class="fa-solid fa-download"></i> Export</button>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email Address</th>
                        <th>Total Orders</th>
                        <th>Total Spent</th>
                        <th>Last Order Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="customer-cell">
                                <div class="cust-avatar" style="background: #e0f2fe; color: #0369a1;">AT</div>
                                <b>Alex Thompson</b>
                            </div>
                        </td>
                        <td>alex.t@example.com</td>
                        <td>12</td>
                        <td><b>$450.00</b></td>
                        <td>2023-10-24</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><i class="fa-solid fa-ellipsis-vertical" style="color: var(--text-muted); cursor: pointer;"></i></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-cell">
                                <div class="cust-avatar" style="background: #f5f3ff; color: #6d28d9;">SJ</div>
                                <b>Sarah Jenkins</b>
                            </div>
                        </td>
                        <td>s.jenkins@provider.net</td>
                        <td>5</td>
                        <td><b>$185.50</b></td>
                        <td>2023-10-20</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><i class="fa-solid fa-ellipsis-vertical" style="color: var(--text-muted); cursor: pointer;"></i></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-cell">
                                <div class="cust-avatar" style="background: #fef3c7; color: #b45309;">MC</div>
                                <b>Michael Chen</b>
                            </div>
                        </td>
                        <td>mchen92@gmail.com</td>
                        <td>28</td>
                        <td><b>$1,240.00</b></td>
                        <td>2023-10-25</td>
                        <td><span class="badge badge-vip">VIP</span></td>
                        <td><i class="fa-solid fa-ellipsis-vertical" style="color: var(--text-muted); cursor: pointer;"></i></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-cell">
                                <div class="cust-avatar" style="background: #f1f5f9; color: #475569;">ER</div>
                                <b>Emma Rodriguez</b>
                            </div>
                        </td>
                        <td>emma.rod@outlook.com</td>
                        <td>1</td>
                        <td><b>$25.00</b></td>
                        <td>2023-09-15</td>
                        <td><span class="badge badge-inactive">Inactive</span></td>
                        <td><i class="fa-solid fa-ellipsis-vertical" style="color: var(--text-muted); cursor: pointer;"></i></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="customer-cell">
                                <div class="cust-avatar" style="background: #e0f2fe; color: #0369a1;">DW</div>
                                <b>David Wilson</b>
                            </div>
                        </td>
                        <td>dave.wilson@company.com</td>
                        <td>8</td>
                        <td><b>$310.20</b></td>
                        <td>2023-10-22</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td><i class="fa-solid fa-ellipsis-vertical" style="color: var(--text-muted); cursor: pointer;"></i></td>
                    </tr>
                </tbody>
            </table>
            <div class="table-footer">
                <span>Showing 1-5 of 1,284 customers</span>
                <div class="pagination">
                    <div class="page-btn"><i class="fa fa-chevron-left"></i></div>
                    <div class="page-btn active">1</div>
                    <div class="page-btn">2</div>
                    <div class="page-btn">3</div>
                    <span style="margin: 0 5px;">...</span>
                    <div class="page-btn">257</div>
                    <div class="page-btn"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>