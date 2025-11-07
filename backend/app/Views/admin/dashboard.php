<!doctype html>
<html lang="en">
<?= view('components/head', ['title' => 'Admin Dashboard - BeatSync']) ?>

<body class="main-container">

    <main class="admin-wrapper">
        <div class="admin-container">

            <!-- SIDEBAR -->
            <aside class="admin-aside">
                <h3 class="admin-aside-title">Admin Menu</h3>
                <ul class="admin-menu">
                    <li><a href="/dashboard" class="active">Dashboard</a></li>
                    <li><a href="/accounts">Accounts</a></li>
                    <li><a href="/services">Events</a></li>
                    <li><a href="/request">Bookings</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </aside>

            <!-- MAIN CONTENT -->
            <section class="admin-content">
                <h2 class="page-title">Admin Dashboard</h2>

                <!-- STATS CARDS -->
                <div class="admin-cards">
                    <div class="card-stat">
                        <h4>Total Users</h4>
                        <p class="value"><?= esc($stats['total_users'] ?? 0) ?></p>
                        <p class="subtitle"><?= esc($stats['active_users'] ?? 0) ?> active</p>
                    </div>

                    <div class="card-stat">
                        <h4>Total Events</h4>
                        <p class="value"><?= esc($stats['total_events'] ?? 0) ?></p>
                        <p class="subtitle"><?= esc($stats['upcoming_events'] ?? 0) ?> upcoming</p>
                    </div>

                    <div class="card-stat">
                        <h4>Total Bookings</h4>
                        <p class="value"><?= esc($stats['total_bookings'] ?? 0) ?></p>
                        <p class="subtitle"><?= esc($stats['pending_bookings'] ?? 0) ?> pending</p>
                    </div>

                    <div class="card-stat">
                        <h4>Revenue</h4>
                        <p class="value">₱<?= number_format($stats['total_revenue'] ?? 0, 2) ?></p>
                        <p class="subtitle">Total earnings</p>
                    </div>
                </div>

                <!-- QUICK OVERVIEW -->
                <div class="admin-grid-2 mt-6">
                    <div class="admin-box">
                        <h3>User Overview</h3>
                        <div class="stat-row">
                            <span class="stat-label">Clients:</span>
                            <span class="stat-value"><?= esc($stats['clients'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Organizers:</span>
                            <span class="stat-value"><?= esc($stats['organizers'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Pending Verification:</span>
                            <span class="stat-value warning"><?= esc($stats['pending_verifications'] ?? 0) ?></span>
                        </div>
                        <div class="mt-3">
                            <a href="/admin/accounts" class="admin-btn">Manage Accounts</a>
                        </div>
                    </div>

                    <div class="admin-box">
                        <h3>Events Overview</h3>
                        <div class="stat-row">
                            <span class="stat-label">Published:</span>
                            <span class="stat-value success"><?= esc($stats['published_events'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Pending Approval:</span>
                            <span class="stat-value warning"><?= esc($stats['pending_events'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Cancelled:</span>
                            <span class="stat-value danger"><?= esc($stats['cancelled_events'] ?? 0) ?></span>
                        </div>
                        <div class="mt-3">
                            <a href="/admin/events" class="admin-btn">Manage Events</a>
                        </div>
                    </div>

                    <div class="admin-box">
                        <h3>Booking Status</h3>
                        <div class="stat-row">
                            <span class="stat-label">Confirmed:</span>
                            <span class="stat-value success"><?= esc($stats['confirmed_bookings'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Pending Payment:</span>
                            <span class="stat-value warning"><?= esc($stats['pending_payment'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Cancelled:</span>
                            <span class="stat-value danger"><?= esc($stats['cancelled_bookings'] ?? 0) ?></span>
                        </div>
                        <div class="mt-3">
                            <a href="/admin/bookings" class="admin-btn">View Bookings</a>
                        </div>
                    </div>

                    <div class="admin-box">
                        <h3>Recent Activity</h3>
                        <div class="stat-row">
                            <span class="stat-label">New Users Today:</span>
                            <span class="stat-value"><?= esc($stats['new_users_today'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Bookings Today:</span>
                            <span class="stat-value"><?= esc($stats['bookings_today'] ?? 0) ?></span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-label">Events This Month:</span>
                            <span class="stat-value"><?= esc($stats['events_this_month'] ?? 0) ?></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?= view('components/footer') ?>

    <style>
        /* RESET & BASE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-container {
            background-color: #0a0a0a;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* ADMIN WRAPPER */
        .admin-wrapper {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .admin-container {
            display: flex;
            gap: 30px;
        }

        /* SIDEBAR STYLES */
        .admin-aside {
            background-color: #111;
            border-radius: 12px;
            width: 260px;
            padding: 24px;
            height: fit-content;
            border: 1px solid rgba(255, 255, 255, 0.08);
            flex-shrink: 0;
        }

        .admin-aside-title {
            color: #ff4057;
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: 24px;
            letter-spacing: 1px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(255, 64, 87, 0.2);
        }

        .admin-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-menu a {
            display: block;
            color: #fff;
            opacity: 0.7;
            text-decoration: none;
            font-size: 15px;
            padding: 12px 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
            margin-bottom: 4px;
        }

        .admin-menu a:hover {
            opacity: 1;
            background-color: rgba(255, 64, 87, 0.1);
            color: #ff4057;
            transform: translateX(4px);
        }

        .admin-menu a.active {
            background-color: rgba(255, 64, 87, 0.15);
            color: #ff4057;
            opacity: 1;
            font-weight: 600;
        }

        /* MAIN CONTENT */
        .admin-content {
            flex: 1;
            color: #fff;
            min-width: 0;
        }

        .page-title {
            font-size: 32px;
            font-family: 'Bebas Neue', Arial, sans-serif;
            margin-bottom: 30px;
            color: #ff4057;
            letter-spacing: 1px;
        }

        /* STATS CARDS */
        .admin-cards {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            margin-bottom: 30px;
        }

        .card-stat {
            background: linear-gradient(135deg, #1a1a1a 0%, #111 100%);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff4057, #ff6b7a);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-stat:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 64, 87, 0.3);
            box-shadow: 0 8px 24px rgba(255, 64, 87, 0.15);
        }

        .card-stat:hover::before {
            opacity: 1;
        }

        .card-stat h4 {
            color: #ff4057;
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: 18px;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .card-stat .value {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
            font-family: 'Bebas Neue', Arial, sans-serif;
            letter-spacing: 1px;
        }

        .card-stat .subtitle {
            font-size: 13px;
            color: #999;
            margin-top: 8px;
        }

        /* BOXES */
        .admin-grid-2 {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .mt-6 {
            margin-top: 30px;
        }

        .mt-3 {
            margin-top: 16px;
        }

        .admin-box {
            background: linear-gradient(135deg, #1a1a1a 0%, #111 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 24px;
            transition: all 0.3s ease;
        }

        .admin-box:hover {
            border-color: rgba(255, 64, 87, 0.2);
            transform: translateY(-2px);
        }

        .admin-box h3 {
            font-family: 'Bebas Neue', Arial, sans-serif;
            color: #ff4057;
            font-size: 22px;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }

        /* STAT ROWS */
        .stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .stat-row:last-child {
            border-bottom: none;
        }

        .stat-label {
            font-size: 14px;
            color: #ccc;
        }

        .stat-value {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            font-family: 'Bebas Neue', Arial, sans-serif;
        }

        .stat-value.success {
            color: #4ade80;
        }

        .stat-value.warning {
            color: #fbbf24;
        }

        .stat-value.danger {
            color: #ef4444;
        }

        /* BUTTONS */
        .admin-btn {
            display: inline-block;
            background: linear-gradient(135deg, #ff4057 0%, #e63946 100%);
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 600;
        }

        .admin-btn:hover {
            background: linear-gradient(135deg, #e63946 0%, #d62839 100%);
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 64, 87, 0.4);
        }

        /* RESPONSIVE */
        @media (max-width: 968px) {
            .admin-container {
                flex-direction: column;
            }

            .admin-aside {
                width: 100%;
            }

            .admin-menu {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .admin-menu li {
                flex: 1;
                min-width: 120px;
            }

            .admin-menu a {
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .admin-wrapper {
                padding: 20px 12px;
            }

            .page-title {
                font-size: 24px;
            }

            .admin-cards {
                grid-template-columns: 1fr;
            }

            .admin-grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>

</body>

</html>