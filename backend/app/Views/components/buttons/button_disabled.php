<?php
// App Store Badge Component
// $store: string ('apple' or 'google')
// $href: string
// $disable: boolean
?>
<?php
$isApple = ($store ?? 'apple') === 'apple';
$disabled = $disable ?? false;

$badgeClass = $disabled
    ? 'store-badge store-badge-disabled'
    : 'store-badge' . ($isApple ? ' apple-badge' : ' play-badge');

$svgPath = $isApple
    ? 'M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z'
    : 'M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.198l2.807 1.626a1 1 0 0 1 0 1.73l-2.808 1.626L15.206 12l2.492-2.491zM5.864 2.658L16.802 8.99l-2.303 2.303-8.635-8.635z';

$smallText = $isApple ? 'Download on the' : 'GET IT ON';
$largeText = $isApple ? 'App Store' : 'Google Play';
?>

<style>
    .store-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 24px;
        background: rgba(255, 255, 255, 0.05);
        color: #ffffff;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.3s ease;
        min-width: 180px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .store-badge:not(.store-badge-disabled):hover {
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .store-badge-disabled {
        pointer-events: none;
        cursor: default;
    }

    .badge-icon {
        width: 28px;
        height: 28px;
    }

    .badge-text {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .badge-small {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        opacity: 0.8;
    }

    .badge-large {
        font-size: 16px;
        font-weight: 600;
    }
</style>

<a href="<?= esc($href ?? '#') ?>" class="<?= $badgeClass ?>">
    <svg class="badge-icon" fill="currentColor" viewBox="0 0 24 24">
        <path d="<?= $svgPath ?>" />
    </svg>
    <div class="badge-text">
        <div class="badge-small"><?= $smallText ?></div>
        <div class="badge-large"><?= $largeText ?></div>
    </div>
</a>