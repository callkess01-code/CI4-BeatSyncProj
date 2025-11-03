<?php

/**
 * Secondary button component (border style)
 * 
 * Data contract:
 * $label: string - Button text
 * $href: string - Link URL
 * $icon: string - Optional icon to display (default: '▶')
 */
?>
<a href="<?= esc($href ?? '#') ?>" class="btn-secondary">
    <?php if (!empty($icon)): ?>
        <span class="btn-icon"><?= esc($icon) ?></span>
    <?php else: ?>
        <span class="btn-icon">▶</span>
    <?php endif; ?>
    <?= esc($label ?? 'Learn More') ?>
</a>

<style>
    .btn-secondary {
        font-size: 18px;
        font-weight: 700;
        color: #181818;
        background-color: #ffffff;
        padding: 16px 32px;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        min-width: 140px;
    }

    .btn-icon {
        font-size: 14px;
    }
</style>