<?php

/**
 * Component: cards/roadmap_card.php
 * Roadmap feature card
 * 
 * Data contract:
 * $title: string - Feature title
 * $description: string - Feature description
 * $status: string - Status ('Completed', 'In Progress', 'Backlog', 'Planned')
 * $priority: string - Priority level ('high', 'medium', 'low')
 * $index: int - Feature index for data attribute
 */

$title = $title ?? 'Feature Title';
$description = $description ?? 'Feature description';
$status = $status ?? 'Backlog';
$priority = $priority ?? 'medium';
$index = $index ?? 0;

// Calculate progress based on status
$progress = 0;
switch ($status) {
    case 'Completed':
        $progress = 100;
        break;
    case 'In Progress':
        $progress = 60;
        break;
    default: // Backlog
        $progress = 0;
}

$statusClass = strtolower(str_replace(' ', '-', $status));
?>

<article class="feature-card <?= esc($statusClass) ?> priority-<?= esc($priority) ?>"
    data-feature-index="<?= esc($index) ?>"
    data-status="<?= esc($status) ?>">
    <div class="feature-header">
        <h3 class="feature-title"><?= esc($title) ?></h3>
        <span class="feature-status status-<?= esc($statusClass) ?>">
            <?= esc($status) ?>
        </span>
    </div>
    <p class="feature-description"><?= esc($description) ?></p>
    <div class="feature-progress">
        <div class="progress-bar">
            <div class="progress-fill" style="width: <?= $progress ?>%"></div>
        </div>
        <span class="progress-text"><?= $progress ?>%</span>
    </div>
</article>

<style>
    .feature-card {
        background-color: #1a1a1a;
        border-radius: 16px;
        padding: 30px;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background-color: #ff4057;
        transition: background-color 0.3s ease;
    }

    .feature-card.in-progress::before {
        background-color: #ff4057;
    }

    .feature-card.backlog::before {
        background-color: #ff4057;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        border-color: #ff4057;
        box-shadow: 0 15px 40px rgba(255, 64, 87, 0.2);
    }

    .feature-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .feature-title {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        color: #ffffff;
        letter-spacing: 1px;
        flex: 1;
        min-width: 200px;
    }

    .feature-status {
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex-shrink: 0;
    }

    .status-completed {
        background-color: rgba(255, 64, 87, 0.2);
        color: #ff4057;
        border: 1px solid #ff4057;
    }

    .status-in-progress {
        background-color: rgba(76, 175, 80, 0.2);
        color: #4CAF50;
        border: 1px solid #4CAF50;
    }

    .status-backlog {
        background-color: rgba(102, 102, 102, 0.2);
        color: #999999;
        border: 1px solid #666666;
    }

    .feature-description {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 24px;
    }

    .feature-progress {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .progress-bar {
        flex: 1;
        height: 8px;
        background-color: #333333;
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #ff4057, #ff6b7a);
        border-radius: 4px;
        transition: width 1s ease-in-out;
    }

    .progress-text {
        font-size: 14px;
        font-weight: 600;
        color: #ff4057;
        min-width: 40px;
    }

    /* Responsive */
    @media (min-width: 768px) {
        .feature-header {
            flex-wrap: nowrap;
            align-items: center;
        }

        .feature-title {
            min-width: auto;
        }

        .feature-card {
            padding: 40px;
        }
    }
</style>