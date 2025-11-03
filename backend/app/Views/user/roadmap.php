<!doctype html>
<html lang="en">

<?php
// Page configuration
$pageTitle = "Road Map | BeatSync";

// Navigation items
$navigation = [
    ['href' => '#home', 'text' => 'Home'],
    ['href' => '#events', 'text' => 'Events'],
    ['href' => '#tickets', 'text' => 'Tickets']
];

// Footer links
$footerLinks = [
    'Menu' => [
        ['href' => '#home', 'text' => 'Home'],
        ['href' => '#events', 'text' => 'Events'],
        ['href' => '#tickets', 'text' => 'Tickets']
    ],
    'Company' => [
        ['href' => 'moodboard', 'text' => 'Mood Board'],
        ['href' => 'roadmap', 'text' => 'Road Map']
    ]
];

// Road map features data
$roadmapFeatures = [
    [
        'title' => 'Event Gallery (Pictures Of Events)',
        'description' => 'Upload and manage event photos to showcase festivals.',
        'status' => 'Completed',
        'priority' => 'high'
    ],
    [
        'title' => 'Ticketing & Pricing Setup',
        'description' => 'Create and update ticket packages with clear pricing options and a checkout system for easy purchases.',
        'status' => 'Backlog',
        'priority' => 'medium'
    ],
    [
        'title' => 'Email Verification',
        'description' => 'Implement secure email verification system for user accounts and ticket purchases.',
        'status' => 'In Progress',
        'priority' => 'high'
    ]
];

?>

<?= view('components/head', [
    'title' => $pageTitle
]) ?>

<body>
    <?= view('components/header') ?>

    <main class="roadmap-main">
        <header class="roadmap-page-header">
            <h1 class="roadmap-page-title">ROAD MAP</h1>
            <p class="roadmap-page-subtitle">High-level plan and status for upcoming features.</p>
        </header>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-container">
                <label class="filter-label">Filter:</label>
                <select id="statusFilter" class="filter-select">
                    <option value="all">All</option>
                    <option value="Backlog">Backlog</option>
                    <option value="Planned">Planned</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="filter-note">This is a UI-only roadmap for planning.</div>
        </div>

        <!-- Roadmap Features Section -->
        <section class="roadmap-section">
            <h2 class="section-heading">PRICING PLAN</h2>
            <div class="roadmap-features" id="roadmapList">
                <?php foreach ($roadmapFeatures as $index => $feature): ?>
                    <?= view('components/cards/card_feature', array_merge($feature, ['index' => $index])) ?>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <?= view('components/footer') ?>

    <style>
        /* Main Container */
        .roadmap-main {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        /* Page Header */
        .roadmap-page-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .roadmap-page-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(60px, 10vw, 120px);
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 4px;
            margin-bottom: 20px;
        }

        .roadmap-page-subtitle {
            font-size: clamp(16px, 3vw, 18px);
            color: rgba(255, 255, 255, 0.8);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Filter Section */
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .filter-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        .filter-select {
            background-color: #1a1a1a;
            color: #ffffff;
            border: 1px solid #333333;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:hover {
            border-color: #ff4057;
        }

        .filter-select:focus {
            outline: none;
            border-color: #ff4057;
            box-shadow: 0 0 0 3px rgba(255, 64, 87, 0.1);
        }

        .filter-note {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Roadmap Section */
        .roadmap-section {
            margin-bottom: 60px;
        }

        .section-heading {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(28px, 5vw, 40px);
            font-weight: 400;
            color: #ff4057;
            letter-spacing: 2px;
            margin-bottom: 30px;
        }

        .roadmap-features {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Coming Soon Section */
        .coming-soon-section {
            margin-top: 40px;
        }

        /* Responsive */
        @media (min-width: 768px) {
            .roadmap-main {
                padding: 80px 40px;
            }

            .filter-section {
                flex-wrap: nowrap;
            }

            .roadmap-features {
                gap: 24px;
            }
        }

        @media (min-width: 1024px) {
            .roadmap-main {
                padding: 100px 60px;
            }
        }
    </style>

</body>

</html>