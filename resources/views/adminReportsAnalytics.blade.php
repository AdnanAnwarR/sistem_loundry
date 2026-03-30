<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Full Analytics Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        
        .user-panel { padding: 15px 24px; border-top: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
        .user-panel .avatar { width: 32px; height: 32px; border-radius: 50%; background: #bae6fd; }

        /* MAIN CONTENT */
        .main { flex: 1; padding: 20px 40px; }
        
        /* HEADER & TOPNAV */
        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .search-bar { position: relative; width: 300px; }
        .search-bar i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .search-bar input { width: 100%; padding: 8px 12px 8px 35px; border-radius: 20px; border: 1px solid var(--border); background: #f1f5f9; outline: none; font-size: 12px; }

        .analytics-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .date-picker { display: flex; align-items: center; gap: 10px; background: #fff; padding: 8px 15px; border-radius: 10px; border: 1px solid var(--border); font-size: 13px; }
        .btn-export { background: var(--primary-blue); color: #fff; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; cursor: pointer; }

        /* STAT CARDS */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 25px; }
        .stat-card { background: #fff; padding: 20px; border-radius: 15px; border: 1px solid var(--border); }
        .stat-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .stat-icon { width: 35px; height: 35px; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
        .trend { font-size: 11px; font-weight: 600; padding: 4px 8px; border-radius: 20px; }
        .trend.up { background: #f0fdf4; color: #22c55e; }
        .trend.down { background: #fef2f2; color: #ef4444; }

        /* CHARTS SECTION */
        .charts-row { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 25px; }
        .card-box { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid var(--border); }
        .card-title { font-weight: 700; font-size: 15px; margin-bottom: 20px; display: flex; justify-content: space-between; }
        
        .svc-item { margin-bottom: 18px; }
        .svc-info { display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 6px; font-weight: 600; }
        .progress-bar { height: 8px; background: #f1f5f9; border-radius: 10px; overflow: hidden; display: flex; }
        .progress-fill { height: 100%; border-radius: 10px; }

        /* PERFORMANCE TABLE */
        .table-section { background: #fff; padding: 24px; border-radius: 20px; border: 1px solid var(--border); margin-bottom: 25px; }
        .perf-table { width: 100%; border-collapse: collapse; }
        .perf-table th { text-align: left; padding: 12px; font-size: 11px; color: var(--text-muted); text-transform: uppercase; border-bottom: 1px solid var(--border); }
        .perf-table td { padding: 16px 12px; border-bottom: 1px solid #f8fafc; font-size: 13px; }

        /* BOTTOM WIDGETS */
        .bottom-grid { display: grid; grid-template-columns: 320px 1fr; gap: 20px; }
        
        /* Donut Styles */
        .chart-flex { display: flex; align-items: center; justify-content: center; flex: 1; gap: 30px; }
        .donut-wrap { width: 180px; height: 180px; position: relative; }
        .legend-list { display: flex; flex-direction: column; gap: 15px; }
        .legend-row { display: flex; align-items: flex-start; gap: 10px; font-size: 12px; color: var(--text-muted); }
        .dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 4px; }
        .legend-text b { color: var(--text-main); display: block; }

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="logo"><i class="fa-solid fa-bolt"></i> <h2>LaundrySwift</h2></div>
        <ul class="menu">
            <li><i class="fa-solid fa-chart-pie"></i> Dashboard</li>
            <li><i class="fa-solid fa-basket-shopping"></i> Orders</li>
            <li class="active"><i class="fa-solid fa-chart-line"></i> Analytics</li>
            <li><i class="fa-solid fa-user-group"></i> Employees</li>
            <li><i class="fa-solid fa-users"></i> Customers</li>
            <li><i class="fa-solid fa-boxes-stacked"></i> Inventory</li>
        </ul>
        <div class="user-panel">
            <div class="avatar"></div>
            <div>
                <b style="font-size: 12px; display: block;">Alex Johnson</b>
                <small style="font-size: 10px; color: var(--text-muted);">System Admin</small>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="top-nav">
            <h4 style="font-weight: 700;">Reports & Analytics</h4>
            <div style="display: flex; gap: 20px; align-items: center;">
                <div class="search-bar"><i class="fa fa-search"></i><input type="text" placeholder="Search data..."></div>
                <i class="fa-regular fa-bell"></i>
                <i class="fa-regular fa-circle-question"></i>
            </div>
        </div>

        <div class="analytics-header">
            <div>
                <h1>Analytics Overview</h1>
                <p style="color: var(--text-muted); font-size: 13px;">Detailed performance metrics for October 2023</p>
            </div>
            <div style="display: flex; gap: 10px;">
                <div class="date-picker"><i class="fa-regular fa-calendar"></i> Oct 01, 2023 - Oct 31, 2023</div>
                <button class="btn-export"><i class="fa-solid fa-file-export"></i> Export</button>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: #f0fdf4; color: #22c55e;"><i class="fa-solid fa-money-bill-wave"></i></div>
                    <div class="trend up">↗ 12.5%</div>
                </div>
                <small style="color: var(--text-muted); font-weight: 700; font-size: 10px;">MONTHLY REVENUE</small>
                <h2 style="margin-top: 5px; font-size: 22px;">$12,450.00</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: #eff6ff; color: #3b82f6;"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="trend down">↘ 2.1%</div>
                </div>
                <small style="color: var(--text-muted); font-weight: 700; font-size: 10px;">ORDER VOLUME</small>
                <h2 style="margin-top: 5px; font-size: 22px;">842</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: #f5f3ff; color: #8b5cf6;"><i class="fa-solid fa-tags"></i></div>
                    <div class="trend up">↗ 5.3%</div>
                </div>
                <small style="color: var(--text-muted); font-weight: 700; font-size: 10px;">AVG. ORDER VALUE</small>
                <h2 style="margin-top: 5px; font-size: 22px;">$14.78</h2>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon" style="background: #fff7ed; color: #f97316;"><i class="fa-solid fa-clock"></i></div>
                    <div class="trend up">↗ 8.1%</div>
                </div>
                <small style="color: var(--text-muted); font-weight: 700; font-size: 10px;">AVG. TURNAROUND</small>
                <h2 style="margin-top: 5px; font-size: 22px;">22.4 hrs</h2>
            </div>
        </div>

        <div class="charts-row">
            <div class="card-box">
                <div class="card-title">
                    <span>Revenue & Order Volume Trend</span>
                    <div style="background: #f1f5f9; padding: 4px; border-radius: 8px; display: flex; gap: 5px;">
                        <button style="border:none; padding: 4px 10px; border-radius: 6px; font-size: 10px; background: var(--primary-blue); color: #fff;">Monthly</button>
                        <button style="border:none; padding: 4px 10px; border-radius: 6px; font-size: 10px; background: transparent;">Weekly</button>
                    </div>
                </div>
                <canvas id="mainTrendChart" height="140"></canvas>
            </div>

            <div class="card-box">
                <div class="card-title">Popular Services</div>
                <div class="svc-item">
                    <div class="svc-info"><span>Wash & Fold</span> <span>42%</span></div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 42%; background: #3b82f6;"></div></div>
                </div>
                <div class="svc-item">
                    <div class="svc-info"><span>Dry Cleaning</span> <span>28%</span></div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 28%; background: #8b5cf6;"></div></div>
                </div>
                <div class="svc-item">
                    <div class="svc-info"><span>Ironing Service</span> <span>18%</span></div>
                    <div class="progress-bar"><div class="progress-fill" style="width: 18%; background: #10b981;"></div></div>
                </div>
                <div style="background: #eff6ff; padding: 12px; border-radius: 10px; margin-top: 15px;">
                    <p style="font-size: 11px; color: #1e40af; line-height: 1.4;"><b>Insight:</b> Wash & Fold volume increased by 15% this quarter.</p>
                </div>
            </div>
        </div>

        <div class="table-section">
            <div class="card-title">Employee Performance <a href="#" style="color: var(--primary-blue); font-size: 12px; text-decoration: none; font-weight: 500;">View All</a></div>
            <table class="perf-table">
                <thead>
                    <tr><th>Employee</th><th>Orders</th><th>Efficiency</th><th>Rating</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Sarah Miller</b></td>
                        <td>184</td>
                        <td><div class="progress-bar" style="width: 80px; display: inline-flex; margin-right: 8px;"><div class="progress-fill" style="width: 94%; background: #10b981;"></div></div> 94%</td>
                        <td style="color: #f59e0b;"><i class="fa fa-star"></i> 4.9</td>
                        <td><span style="color: #10b981; font-weight: 700; font-size: 11px;">● Online Now</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bottom-grid">
            <div class="card-box">
                <div class="card-title">Customer Acquisition</div>
                <h1 style="font-size: 32px; font-weight: 700;">254</h1>
                <p style="font-size: 10px; color: var(--text-muted); font-weight: 700; margin-bottom: 12px;">NEW USERS</p>
                <div class="progress-bar" style="margin-bottom: 20px;">
                    <div style="width: 50%; background: #3b82f6;"></div>
                    <div style="width: 30%; background: #8b5cf6;"></div>
                    <div style="width: 20%; background: #10b981;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 11px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <div>Referral <b style="display: block; font-size: 13px;">128</b></div>
                    <div>Social <b style="display: block; font-size: 13px;">82</b></div>
                    <div>Direct <b style="display: block; font-size: 13px;">44</b></div>
                </div>
            </div>

            <div class="card-box">
                <div class="card-title">Pickup vs. Drop-off</div>
                <div class="chart-flex">
                    <div class="donut-wrap"><canvas id="donutPickup"></canvas></div>
                    <div class="legend-list">
                        <div class="legend-row">
                            <div class="dot" style="background: #3b82f6;"></div>
                            <div class="legend-text">Home Pickup <b>542 (76%)</b></div>
                        </div>
                        <div class="legend-row">
                            <div class="dot" style="background: #8b5cf6;"></div>
                            <div class="legend-text">In-Store Drop <b>200 (24%)</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Bar Chart
    new Chart(document.getElementById('mainTrendChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            datasets: [{
                data: [45, 65, 100, 80, 55],
                backgroundColor: (c) => c.index === 2 ? '#3b82f6' : '#bfdbfe',
                borderRadius: 6,
                barThickness: 35
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: { y: { display: false }, x: { grid: { display: false }, border: { display: false } } }
        }
    });

    // Donut Chart
    new Chart(document.getElementById('donutPickup').getContext('2d'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [76, 24],
                backgroundColor: ['#3b82f6', '#8b5cf6'],
                borderWidth: 0,
                cutout: '80%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { tooltip: { enabled: false } }
        }
    });
</script>

</body>
</html>