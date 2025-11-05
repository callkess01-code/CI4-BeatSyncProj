<!doctype html>
<html lang="en">
<?= view('components/head', ['title' => 'Admin Dashboard']) ?>

<body class="main-container">

    <main class="admin-wrapper">
        <div class="admin-container">

            <!-- ✅ SIDEBAR NOW DIRECTLY INCLUDED -->
            <aside class="admin-aside">
                <h3 class="admin-aside-title">Admin Menu</h3>
                <ul class="admin-menu">
                    <li><a href="/admin" class="active">Dashboard</a></li>
                    <li><a href="/admin/services">Services</a></li>
                    <li><a href="/admin/accounts">Accounts</a></li>
                    <li><a href="/admin/requests">Requests</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </aside>
            <!-- ✅ END SIDEBAR -->

            <section class="admin-content">
                <h2 class="page-title">Admin Dashboard</h2>

                <div class="admin-cards">

                    <!-- ✅ CARD STAT INCLUDED DIRECTLY -->
                    <div class="card-stat">
                        <h4>Total Inquiries</h4>
                        <p class="value">0</p>
                    </div>

                    <div class="card-stat">
                        <h4>Total Services</h4>
                        <p class="value">0</p>
                    </div>

                    <div class="card-stat">
                        <h4>Upcoming / Scheduled</h4>
                        <p class="value">0</p>
                    </div>
                    <!-- ✅ END CARDS -->

                </div>

                <div class="admin-grid-2 mt-6">
                    <div class="admin-box">
                        <h3>Services Management</h3>
                        <p class="desc">Edit existing or add new funeral services.</p>
                        <a href="/admin/services" class="admin-btn">Manage Services</a>
                    </div>

                    <div class="admin-box">
                        <h3>Recent Notes</h3>
                        <p class="desc">No recent activity yet.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?= view('components/footer') ?>

    <style>
        .admin-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .admin-container {
            display: flex;
            gap: 30px;
        }

        /* ✅ SIDEBAR STYLE */
        .admin-aside {
            background-color: #111;
            border-radius: 10px;
            width: 250px;
            padding: 20px;
            height: fit-content;
        }

        .admin-aside-title {
            color: #ff4057;
            font-family: 'Bebas Neue';
            font-size: 22px;
            margin-bottom: 10px;
        }

        .admin-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-menu li {
            margin: 10px 0;
        }

        .admin-menu a {
            color: #fff;
            opacity: 0.8;
            text-decoration: none;
            font-size: 15px;
            transition: .2s;
        }

        .admin-menu a:hover,
        .admin-menu a.active {
            color: #ff4057;
            opacity: 1;
        }

        /* ✅ CARD STAT STYLE */
        .admin-content {
            flex: 1;
            color: #fff;
        }

        .page-title {
            font-size: 28px;
            font-family: 'Bebas Neue';
            margin-bottom: 20px;
            color: #ff4057;
        }

        .admin-cards {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        .card-stat {
            background: #111;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card-stat h4 {
            color: #ff4057;
            font-family: 'Bebas Neue';
            font-size: 20px;
        }

        .card-stat .value {
            font-size: 30px;
            font-weight: bold;
            margin-top: 10px;
            color: #fff;
        }

        /* GENERAL BOXES */
        .admin-box {
            background-color: #111;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .admin-box h3 {
            font-family: 'Bebas Neue';
            color: #ff4057;
        }

        .desc {
            margin: 10px 0 20px;
            font-size: 14px;
            opacity: 0.8;
        }

        .admin-btn {
            background: #ff4057;
            color: #fff;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            transition: .2s;
            font-size: 14px;
        }

        .admin-btn:hover {
            background: #e63946;
            transform: scale(1.04);
        }

        .admin-grid-2 {
            margin-top: 20px;
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    </style>

</body>

</html>