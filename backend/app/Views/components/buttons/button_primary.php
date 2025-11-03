<?php

/**
 * Primary button component
 * 
 * Data contract:
 * $label: string - Button text
 * $href: string - Link URL
 * $disable: boolean - Whether button is disabled
 */
?>
<?php if ($disable ?? false): ?>
    <a href="<?= esc($href ?? '#') ?>" class="btn-primary btn-disabled">
        <?= esc($label ?? 'Action') ?>
    </a>
<?php else: ?>
    <a href="<?= esc($href ?? '#') ?>" class="btn-primary">
        <?= esc($label ?? 'Buy Tickets') ?>
    </a>
<?php endif; ?>

<style>
    .btn-primary {
        font-size: 18px;
        font-weight: 700;
        color: #ffffff;
        background-color: #ff4057;
        padding: 16px 32px;
        border-radius: 8px;
        text-decoration: none;
        text-align: center;
        min-width: 140px;
        display: inline-block;
    }

    .btn-primary.btn-disabled {
        background-color: #666666;
        border-color: #666666;
        color: #999999;
        cursor: not-allowed;
        opacity: 0.5;
    }

    .btn-primary.btn-disabled:hover {
        transform: none;
        background-color: #666666;
        color: #999999;
    }
</style>