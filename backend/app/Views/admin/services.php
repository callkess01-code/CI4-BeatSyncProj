<!doctype html>
<html lang="en">
<?= view('components/head', ['title' => 'Events Management - BeatSync']) ?>

<body class="main-container">

    <main class="admin-wrapper">
        <div class="admin-container">

            <!-- SIDEBAR -->
            <aside class="admin-aside">
                <h3 class="admin-aside-title">Admin Menu</h3>
                <ul class="admin-menu">
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/accounts">Accounts</a></li>
                    <li><a href="/services" class="active">Events</a></li>
                    <li><a href="/request">Bookings</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </aside>

            <!-- MAIN CONTENT -->
            <section class="admin-content">
                <h2 class="page-title">Events Management</h2>

                <!-- STATS CARDS -->
                <div class="mb-6 admin-cards">
                    <div class="card-stat">
                        <h4>Total Events</h4>
                        <p class="value"><?= esc($stats['total_events'] ?? 0) ?></p>
                    </div>

                    <div class="card-stat">
                        <h4>Published & Active</h4>
                        <p class="value"><?= esc($stats['published_events'] ?? 0) ?></p>
                    </div>

                    <div class="card-stat">
                        <h4>Pending Approval</h4>
                        <p class="value"><?= esc($stats['pending_approval'] ?? 0) ?></p>
                    </div>
                </div>

                <!-- FILTERS & ACTIONS -->
                <div class="mb-6 action-bar">
                    <div class="filter-group">
                        <select id="statusFilter" class="filter-select">
                            <option value="">All Statuses</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending Approval</option>
                            <option value="cancelled">Cancelled</option>
                        </select>

                        <select id="dateFilter" class="filter-select">
                            <option value="">All Dates</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="past">Past Events</option>
                            <option value="today">Today</option>
                            <option value="this_week">This Week</option>
                            <option value="this_month">This Month</option>
                        </select>

                        <input type="text" id="searchInput" class="search-input" placeholder="Search events...">
                    </div>

                    <a href="/admin/services/create" class="admin-btn">
                        + Create New Event
                    </a>
                </div>

                <!-- EVENTS TABLE -->
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Organizer</th>
                                <th>Date & Time</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Tickets Sold</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($events)): ?>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?= esc($event['id']) ?></td>
                                        <td>
                                            <div class="event-info">
                                                <strong><?= esc($event['name']) ?></strong>
                                                <span class="text-muted"><?= esc($event['genre'] ?? 'EDM') ?></span>
                                            </div>
                                        </td>
                                        <td><?= esc($event['organizer_name'] ?? 'N/A') ?></td>
                                        <td>
                                            <?= date('M d, Y', strtotime($event['event_date'])) ?><br>
                                            <span class="text-muted"><?= date('h:i A', strtotime($event['event_time'])) ?></span>
                                        </td>
                                        <td><?= esc($event['venue'] ?? 'TBA') ?></td>
                                        <td>
                                            <span class="event-status status-<?= esc($event['status']) ?>">
                                                <?= ucfirst(esc($event['status'])) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?= esc($event['tickets_sold'] ?? 0) ?> / <?= esc($event['capacity'] ?? 0) ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="/admin/services/view/<?= esc($event['id']) ?>" class="btn-view" title="View">👁</a>
                                                <a href="/admin/services/edit/<?= esc($event['id']) ?>" class="btn-edit" title="Edit">✏</a>
                                                <?php if ($event['status'] === 'pending'): ?>
                                                    <button onclick="approveEvent(<?= esc($event['id']) ?>)" class="btn-approve" title="Approve">✓</button>
                                                <?php endif; ?>
                                                <button onclick="deleteEvent(<?= esc($event['id']) ?>)" class="btn-delete" title="Delete">🗑</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No events found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <?php if (isset($pager)): ?>
                    <div class="pagination">
                        <?= $pager->links() ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <?= view('components/footer') ?>

    <style>
        /* BASE STYLES */
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

        /* SIDEBAR */
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

        /* CONTENT */
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
        }

        .mb-6 {
            margin-bottom: 30px;
        }

        .card-stat {
            background: linear-gradient(135deg, #1a1a1a 0%, #111 100%);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .card-stat:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 64, 87, 0.3);
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
        }

        /* ACTION BAR */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .filter-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-select,
        .search-input {
            background-color: #111;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 16px;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        .filter-select:focus,
        .search-input:focus {
            border-color: #ff4057;
            box-shadow: 0 0 0 3px rgba(255, 64, 87, 0.1);
        }

        .search-input {
            min-width: 250px;
        }

        .admin-btn {
            background: linear-gradient(135deg, #ff4057 0%, #e63946 100%);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .admin-btn:hover {
            background: linear-gradient(135deg, #e63946 0%, #d62839 100%);
            transform: scale(1.05);
        }

        /* TABLE */
        .table-container {
            background: #111;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            overflow: hidden;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background: #1a1a1a;
        }

        .data-table th {
            padding: 16px;
            text-align: left;
            font-family: 'Bebas Neue', Arial, sans-serif;
            color: #ff4057;
            font-size: 16px;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .data-table td {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #ccc;
            font-size: 14px;
        }

        .data-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .data-table tbody tr:hover {
            background-color: rgba(255, 64, 87, 0.05);
        }

        /* EVENT INFO */
        .event-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .event-info strong {
            color: #fff;
        }

        .text-muted {
            font-size: 12px;
            opacity: 0.6;
        }

        /* EVENT STATUS */
        .event-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-published {
            background: rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }

        .status-draft {
            background: rgba(148, 163, 184, 0.2);
            color: #94a3b8;
        }

        .status-pending {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        /* ACTION BUTTONS */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-view,
        .btn-edit,
        .btn-approve,
        .btn-delete {
            padding: 6px 10px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-view {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .btn-view:hover {
            background: rgba(59, 130, 246, 0.3);
        }

        .btn-edit {
            background: rgba(168, 85, 247, 0.2);
            color: #c084fc;
        }

        .btn-edit:hover {
            background: rgba(168, 85, 247, 0.3);
        }

        .btn-approve {
            background: rgba(34, 197, 94, 0.2);
            color: #4ade80;
        }

        .btn-approve:hover {
            background: rgba(34, 197, 94, 0.3);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.3);
        }

        .text-center {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        /* PAGINATION */
        .pagination {
            margin-top: 24px;
            display: flex;
            justify-content: center;
            gap: 8px;
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

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                flex-direction: column;
            }

            .search-input {
                width: 100%;
            }

            .table-container {
                overflow-x: auto;
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
        }
    </style>

    <script>
        function approveEvent(eventId) {
            if (confirm('Approve this event?')) {
                window.location.href = '/admin/services/approve/' + eventId;
            }
        }

        function deleteEvent(eventId) {
            if (confirm('Are you sure you want to delete this event?')) {
                window.location.href = '/admin/services/delete/' + eventId;
            }
        }

        // Filter functionality
        document.getElementById('statusFilter')?.addEventListener('change', filterEvents);
        document.getElementById('dateFilter')?.addEventListener('change', filterEvents);
        document.getElementById('searchInput')?.addEventListener('input', filterEvents);

        function filterEvents() {
            const status = document.getElementById('statusFilter').value;
            const date = document.getElementById('dateFilter').value;
            const search = document.getElementById('searchInput').value;

            const params = new URLSearchParams();
            if (status) params.append('status', status);
            if (date) params.append('date', date);
            if (search) params.append('search', search);

            window.location.href = '/admin/services?' + params.toString();
        }
    </script>

</body>

</html>