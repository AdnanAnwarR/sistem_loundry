<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundrySwift - Profile Settings</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-blue: #0d6efd;
            --bg-light: #f8fafd;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', -apple-system, sans-serif;
            color: #334155;
        }

        /* Sidebar Styling */
        .sidebar { 
            width: var(--sidebar-width); 
            height: 100vh; 
            background: #fff; 
            position: fixed; 
            left: 0; 
            top: 0; 
            border-right: 1px solid #eef2f6; 
            padding: 24px; 
            z-index: 1000;
        }
        
        .nav-link { 
            color: #64748b; 
            font-weight: 500; 
            padding: 12px 16px; 
            border-radius: 10px; 
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        
        .nav-link:hover { background: #f1f5f9; color: var(--primary-blue); }
        .nav-link.active { background: #eef2ff; color: var(--primary-blue); }
        .nav-link i { margin-right: 12px; font-size: 1.1rem; }

        /* Usage Widget */
        .usage-card {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 16px;
            position: absolute;
            bottom: 24px;
            width: calc(100% - 48px);
        }

        /* Main Layout */
        .main-content { margin-left: var(--sidebar-width); padding: 40px; }
        
        .profile-container {
            max-width: 1000px;
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.02);
        }

        /* Profile Header */
        .profile-avatar-wrapper { position: relative; width: 100px; }
        .profile-avatar { width: 100px; height: 100px; border-radius: 16px; object-fit: cover; }
        .btn-edit-avatar {
            position: absolute;
            bottom: -6px;
            right: -6px;
            background: var(--primary-blue);
            color: white;
            border: 3px solid #fff;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Form Controls */
        label { font-size: 0.85rem; font-weight: 600; color: #64748b; margin-bottom: 8px; }
        .form-control, .form-select {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.95rem;
        }
        .form-control:focus { background-color: #fff; box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.05); }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            margin-bottom: 24px;
            margin-top: 40px;
        }
        .section-header i { color: var(--primary-blue); }

        .btn-save {
            background: var(--primary-blue);
            border-radius: 12px;
            padding: 12px 32px;
            font-weight: 600;
            border: none;
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="d-flex align-items-center mb-5 ps-2">
        <div class="bg-primary text-white rounded p-1 me-2 px-2"><i class="bi bi-droplet-fill"></i></div>
        <span class="fw-bold fs-5">LaundrySwift</span>
    </div>

    <nav class="nav flex-column">
        <a href="#" class="nav-link"><i class="bi bi-grid"></i> Dashboard</a>
        <a href="#" class="nav-link"><i class="bi bi-plus-circle"></i> New Order</a>
        <a href="#" class="nav-link"><i class="bi bi-clock-history"></i> Order History</a>
        <a href="#" class="nav-link active"><i class="bi bi-person"></i> My Profile</a>
        <a href="#" class="nav-link"><i class="bi bi-question-circle"></i> Support</a>
    </nav>

    <div class="usage-card">
        <div class="fw-bold text-uppercase mb-2" style="font-size: 0.65rem; letter-spacing: 0.5px;">Plan Usage</div>
        <div class="progress mb-2" style="height: 6px; background: #e2e8f0;">
            <div class="progress-bar w-75" role="progressbar"></div>
        </div>
        <div class="text-muted" style="font-size: 0.75rem;">13/20 pickups remaining</div>
    </div>
</aside>

<main class="main-content">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0">Profile Settings</h4>
        <div class="d-flex align-items-center gap-3">
            <button class="btn border-0 position-relative">
                <i class="bi bi-bell fs-5 text-muted"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </button>
            <div class="text-end d-none d-md-block">
                <div class="fw-bold small">Alex Johnson</div>
                <div class="text-muted small" style="font-size: 0.7rem;">alex.j@example.com</div>
            </div>
            <img src="https://i.pravatar.cc/100?u=alex" class="rounded-circle shadow-sm" width="40" height="40">
        </div>
    </header>

    <div class="profile-container">
        <form action="#" method="POST">
            @csrf {{-- Penting di Laravel --}}
            
            <div class="d-flex align-items-center mb-5">
                <div class="profile-avatar-wrapper me-4">
                    <img src="https://i.pravatar.cc/200?u=alex" class="profile-avatar" alt="User">
                    <button type="button" class="btn-edit-avatar"><i class="bi bi-pencil-fill fs-7" style="font-size: 0.7rem;"></i></button>
                </div>
                <div>
                    <h3 class="fw-bold mb-1">Alex Johnson</h3>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2">Business Pro Member</span>
                        <span class="text-muted small">Member since January 2023</span>
                    </div>
                </div>
            </div>

            <hr class="opacity-10 my-4">

            <div class="section-header">
                <i class="bi bi-person-badge"></i> Personal Information
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <label>Full Name</label>
                    <input type="text" class="form-control" value="Alex Johnson">
                </div>
                <div class="col-md-6">
                    <label>Email Address</label>
                    <input type="email" class="form-control" value="alex.j@example.com">
                </div>
                <div class="col-md-6">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" value="+1 (555) 123-4567">
                </div>
                <div class="col-md-6">
                    <label>Primary Address</label>
                    <input type="text" class="form-control" value="452 Oak Avenue, San Francisco, CA 94102">
                </div>
            </div>

            <div class="section-header">
                <i class="bi bi-sliders"></i> Service Preferences
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <label>Preferred Detergent</label>
                    <select class="form-select">
                        <option selected>Unscented (Sensitive Skin)</option>
                        <option>Floral</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Folding Style</label>
                    <select class="form-select">
                        <option selected>Standard Fold</option>
                        <option>Hanging</option>
                    </select>
                </div>
                <div class="col-12">
                    <label>Pickup Instructions</label>
                    <textarea class="form-control" rows="3">Please leave bags behind the side planter near the driveway. Gate code is #0452.</textarea>
                </div>
            </div>

            <div class="section-header">
                <i class="bi bi-shield-check"></i> Account & Notifications
            </div>
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <label class="d-block mb-3">Password</label>
                    <button type="button" class="btn btn-light border btn-sm px-3 py-2 rounded-3 fw-bold">
                        <i class="bi bi-key me-2"></i> Change Password
                    </button>
                </div>
                <div class="col-md-6">
                    <label class="d-block mb-2">Notification Preferences</label>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" checked id="emailSwitch">
                        <label class="form-check-label" for="emailSwitch">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked id="smsSwitch">
                        <label class="form-check-label" for="smsSwitch">SMS Alerts</label>
                    </div>
                </div>
            </div>

            <div class="text-end mt-5 pt-4 border-top">
                <button type="button" class="btn btn-link text-decoration-none text-muted fw-bold me-3">Discard Changes</button>
                <button type="submit" class="btn btn-primary btn-save shadow">Save Profile Changes</button>
            </div>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>