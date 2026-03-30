<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Services Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #3b82f6;
            --bg-body: #f1f5f9;
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

        .menu-label { padding: 0 24px; font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: 1px; margin-bottom: 10px; margin-top: 20px; }
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

        .user-card { margin: 15px; padding: 12px; background: #f8fafc; border-radius: 15px; display: flex; align-items: center; gap: 10px; }
        .user-card .avatar { width: 35px; height: 35px; border-radius: 50%; background: #fdba74; }
        .user-card b { font-size: 12px; display: block; }
        .user-card small { font-size: 10px; color: var(--text-muted); }

        /* MAIN */
        .main { flex: 1; padding: 20px 40px; }

        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .search-container { position: relative; width: 400px; }
        .search-container i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-container input { width: 100%; padding: 10px 15px 10px 45px; border-radius: 25px; border: 1px solid var(--border); background: #f8fafc; outline: none; }

        .header-title { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .header-title h1 { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header-title p { color: var(--text-muted); font-size: 14px; }
        .btn-add { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 20px; font-weight: 600; font-size: 13px; cursor: pointer; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3); }

        .tabs { border-bottom: 1px solid var(--border); margin-bottom: 25px; display: flex; gap: 30px; }
        .tab { padding-bottom: 10px; font-size: 14px; color: var(--text-muted); cursor: pointer; position: relative; }
        .tab.active { color: var(--primary-blue); font-weight: 600; }
        .tab.active::after { content: ''; position: absolute; bottom: -1px; left: 0; width: 100%; height: 2px; background: var(--primary-blue); }

        /* TABLE */
        .table-container { background: #fff; border-radius: 20px; border: 1px solid var(--border); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 20px; font-size: 11px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--border); }
        td { padding: 20px; font-size: 14px; border-bottom: 1px solid #f8fafc; }
        
        .svc-detail { display: flex; align-items: center; gap: 15px; }
        .svc-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
        .svc-detail b { display: block; font-size: 14px; }
        .svc-detail small { color: var(--text-muted); font-size: 12px; }

        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; gap: 5px; }
        .status-active { background: #f0fdf4; color: #22c55e; }
        .status-inactive { background: #f1f5f9; color: #64748b; }
        .dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        .btn-edit { color: var(--primary-blue); font-weight: 600; text-decoration: none; font-size: 13px; }
        .pagination-simple { padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: var(--text-muted); }

        /* INFO CARDS */
        .info-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px; }
        .info-card { padding: 25px; border-radius: 20px; border: 1px solid var(--border); }
        .info-card.blue { background: #eff6ff; border-color: #dbeafe; }
        .info-card.green { background: #f0fdf4; border-color: #dcfce7; }
        .info-card.gray { background: #f8fafc; }
        
        .info-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; font-weight: 700; font-size: 14px; }
        .info-card p { font-size: 12px; color: var(--text-muted); line-height: 1.6; }
        .info-card b { color: var(--text-main); }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo">
            <i class="fa-solid fa-shirt"></i>
            <h2>LaundrySwift</h2>
        </div>
        <ul class="menu">
            <li><i class="fa-solid fa-table-columns"></i> Dashboard</li>
            <li class="active"><i class="fa-solid fa-wand-sparkles"></i> Services</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li><i class="fa-solid fa-users"></i> Customers</li>
            <li><i class="fa-solid fa-chart-simple"></i> Reports</li>
        </ul>
        <div class="menu-label">SETTINGS</div>
        <ul class="menu">
            <li><i class="fa-solid fa-gear"></i> General Settings</li>
        </ul>
        <div class="user-card">
            <div class="avatar"></div>
            <div>
                <b>Alex Rivera</b>
                <small>Manager</small>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="top-nav">
            <div class="search-container">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search services...">
            </div>
            <div style="display: flex; gap: 20px; color: #64748b;">
                <i class="fa-regular fa-bell"></i>
                <i class="fa-regular fa-circle-question"></i>
            </div>
        </div>

        <div class="header-title">
            <div>
                <h1>Services Management</h1>
                <p>Configure your laundry offerings, pricing, and operational times.</p>
            </div>
            <button class="btn-add"><i class="fa fa-plus"></i> Add Service</button>
        </div>

        <div class="tabs">
            <div class="tab active">All Services</div>
            <div class="tab">Active</div>
            <div class="tab">Archived</div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 40%;">Service Details</th>
                        <th>Price per kg</th>
                        <th>Turnaround</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="svc-detail">
                                <div class="svc-icon" style="background: #eff6ff; color: #3b82f6;"><i class="fa-solid fa-soap"></i></div>
                                <div><b>Wash Only</b><small>Standard machine wash</small></div>
                            </div>
                        </td>
                        <td><b>$2.50</b></td>
                        <td>24 Hours</td>
                        <td><span class="status-badge status-active"><div class="dot"></div> Active</span></td>
                        <td><a href="#" class="btn-edit">Edit</a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="svc-detail">
                                <div class="svc-icon" style="background: #f5f3ff; color: #8b5cf6;"><i class="fa-solid fa-shirt"></i></div>
                                <div><b>Wash & Iron</b><small>Premium care with steam iron</small></div>
                            </div>
                        </td>
                        <td><b>$4.00</b></td>
                        <td>48 Hours</td>
                        <td><span class="status-badge status-active"><div class="dot"></div> Active</span></td>
                        <td><a href="#" class="btn-edit">Edit</a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="svc-detail">
                                <div class="svc-icon" style="background: #fff7ed; color: #f97316;"><i class="fa-solid fa-bolt"></i></div>
                                <div><b>Express Wash</b><small>Priority processing</small></div>
                            </div>
                        </td>
                        <td><b>$5.50</b></td>
                        <td>6 Hours</td>
                        <td><span class="status-badge status-active"><div class="dot"></div> Active</span></td>
                        <td><a href="#" class="btn-edit">Edit</a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="svc-detail">
                                <div class="svc-icon" style="background: #f1f5f9; color: #64748b;"><i class="fa-solid fa-wind"></i></div>
                                <div><b>Dry Clean</b><small>Specialized chemical cleaning</small></div>
                            </div>
                        </td>
                        <td><b>$8.00</b></td>
                        <td>72 Hours</td>
                        <td><span class="status-badge status-inactive"><div class="dot"></div> Inactive</span></td>
                        <td><a href="#" class="btn-edit">Edit</a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="svc-detail">
                                <div class="svc-icon" style="background: #ecfeff; color: #0891b2;"><i class="fa-solid fa-house"></i></div>
                                <div><b>Household Items</b><small>Curtains, rugs, and linens</small></div>
                            </div>
                        </td>
                        <td><b>$6.50</b></td>
                        <td>4-5 Days</td>
                        <td><span class="status-badge status-active"><div class="dot"></div> Active</span></td>
                        <td><a href="#" class="btn-edit">Edit</a></td>
                    </tr>
                </tbody>
            </table>
            <div class="pagination-simple">
                <span>Showing 5 services</span>
                <div style="display: flex; gap: 10px;">
                    <i class="fa fa-chevron-left" style="cursor:pointer"></i>
                    <i class="fa fa-chevron-right" style="cursor:pointer"></i>
                </div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-card blue">
                <div class="info-card-header"><i class="fa-solid fa-chart-line"></i> Pricing Strategy</div>
                <p>Most popular service this week is <b>Express Wash</b>. Consider seasonal discounts.</p>
            </div>
            <div class="info-card green">
                <div class="info-card-header"><i class="fa-solid fa-stopwatch"></i> SLA Performance</div>
                <p>Average turnaround time is currently <b>22 hours</b>, beating your 24h target.</p>
            </div>
            <div class="info-card gray">
                <div class="info-card-header"><i class="fa-regular fa-lightbulb"></i> Admin Tip</div>
                <p>Inactive services don't appear in the customer-facing mobile app.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>