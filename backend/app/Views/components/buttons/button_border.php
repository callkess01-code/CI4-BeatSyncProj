<?php

/**
 * Border button component (with arrow icon option)
 * 
 * Data contract:
 * $label: string - Button text
 * $href: string - Link URL
 * $disable: boolean - Whether button is disabled (not clickable)
 * $icon: boolean - Whether to show arrow icon (default: false)
 */

$showIcon = $icon ?? false;
?>

<?php if ($disable ?? false): ?>
    <!-- Disabled State (NOT clickable) -->
    <span class="btn-border btn-disabled-border">
        <?= esc($label ?? 'Action') ?>
        <?php if ($showIcon): ?>
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        <?php endif; ?>
    </span>
<?php else: ?>
    <!-- Active State (clickable) -->
    <a href="<?= esc($href ?? '#') ?>" class="btn-border">
        <?= esc($label ?? 'Learn More') ?>
        <?php if ($showIcon): ?>
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        <?php endif; ?>
    </a>
<?php endif; ?>

<style>
    .btn-border {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ffffff;
        background: transparent;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        border: 2px solid #ff4057;
        border-radius: 8px;
        padding: 12px 28px;
        transition: all 0.3s ease;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .btn-border:hover {
        background: #ff4057;
        border-color: #ff4057;
        gap: 12px;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 64, 87, 0.3);
    }

    .btn-border svg {
        transition: transform 0.3s ease;
    }

    .btn-border:hover svg {
        transform: translateX(4px);
    }

    /* Disabled State */
    .btn-disabled-border {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #666666;
        background: transparent;
        font-size: 14px;
        font-weight: 700;
        border: 2px solid #333333;
        border-radius: 8px;
        padding: 12px 28px;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: not-allowed;
        opacity: 0.5;
    }
</style>