<?php

$type = $type ?? 'color';
$data = $data ?? [];
?>

<?php if ($type === 'color'): ?>
    <!-- Color Card -->
    <div class="color-card-wrapper">
        <div class="color-swatch-large" style="background-color: <?= esc($data['hex'] ?? '#000000') ?>"></div>
        <div class="color-details">
            <p class="color-hex"><?= esc(strtoupper($data['hex'] ?? '#000000')) ?></p>
            <p class="color-name"><?= esc($data['name'] ?? 'Color Name') ?></p>
        </div>
    </div>

<?php elseif ($type === 'typography'): ?>
    <!-- Typography Card -->
    <div class="font-demo">
        <?php if (($data['type'] ?? 'body') === 'heading'): ?>
            <h3 class="font-label font-label-bebas"><?= esc($data['label'] ?? 'Font Example') ?></h3>
            <div class="font-sample font-sample-bebas"><?= esc($data['sample'] ?? 'Sample text') ?></div>
        <?php else: ?>
            <h3 class="font-label font-label-inter"><?= esc($data['label'] ?? 'Font Example') ?></h3>
            <div class="font-sample font-sample-inter"><?= esc($data['sample'] ?? 'Sample text') ?></div>
        <?php endif; ?>
    </div>

<?php elseif ($type === 'sample'): ?>
    <!-- Sample Card -->
    <div class="sample-card <?= esc($data['type'] ?? 'default') ?>-card">
        <h3 class="card-title bebas-neue"><?= esc($data['title'] ?? 'Sample Title') ?></h3>
        <p class="card-description"><?= esc($data['description'] ?? 'Sample description text') ?></p>
        <button class="card-btn">Read More</button>
    </div>

<?php elseif ($type === 'logo'): ?>
    <!-- Logo Card -->
    <div class="logo-sample">
        <div class="logo-display">
            <div class="logo-square large <?= ($data['variant'] ?? 'square') === 'circle' ? 'circle-variant' : '' ?>">
                <span class="logo-icon">♥</span>
            </div>
            <span class="logo-text large">BEATSYNC</span>
        </div>
        <div class="logo-description"><?= esc($data['description'] ?? 'Primary logo') ?></div>
    </div>

<?php endif; ?>

<style>
    /* ===== COLOR CARD STYLES ===== */
    .color-card-wrapper {
        background: #3f4146;
        border-radius: 20px;
        padding: 20px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .color-card-wrapper:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .color-swatch-large {
        width: 100%;
        height: 120px;
        border-radius: 16px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .color-details {
        text-align: center;
    }

    .color-hex {
        font-size: 18px;
        color: #ffffff;
        font-weight: 700;
        margin-bottom: 6px;
        font-family: 'Arial', sans-serif;
        letter-spacing: 0.5px;
    }

    .color-name {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.65);
        font-weight: 400;
        margin: 0;
    }

    /* ===== TYPOGRAPHY CARD STYLES ===== */
    .font-demo {
        background-color: #35373B;
        border-radius: 16px;
        padding: 30px;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .font-demo:hover {
        transform: translateY(-2px);
        background-color: #3f4146;
    }

    .font-label {
        font-size: 14px;
        font-weight: 600;
        color: #ff4057;
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .font-label-bebas {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 16px;
        letter-spacing: 2px;
    }

    .font-label-inter {
        font-family: 'Inter', Arial, sans-serif;
        font-size: 14px;
        font-weight: 700;
        text-transform: none;
    }

    .font-sample {
        color: #ffffff;
    }

    .font-sample-bebas {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: clamp(32px, 6vw, 48px);
        letter-spacing: 2px;
        line-height: 1.1;
    }

    .font-sample-inter {
        font-family: 'Inter', Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        font-weight: 400;
    }

    /* ===== SAMPLE CARD STYLES ===== */
    .sample-card {
        background-color: #35373B;
        border-radius: 16px;
        padding: 32px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 200px;
    }

    .sample-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff4057, #ff6b7a);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }

    .sample-card:hover::before {
        transform: scaleX(1);
    }

    .sample-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255, 64, 87, 0.3);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    }

    .card-title {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        color: #ffffff;
        margin-bottom: 16px;
        letter-spacing: 1.5px;
        line-height: 1.1;
        text-transform: uppercase;
    }

    .card-description {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.6;
        margin-bottom: 24px;
        flex: 1;
    }

    .card-btn {
        font-size: 14px;
        font-weight: 600;
        color: #ff4057;
        background-color: transparent;
        border: 2px solid #ff4057;
        padding: 10px 28px;
        border-radius: 50px;
        transition: all 0.3s ease;
        cursor: pointer;
        align-self: flex-start;
        text-transform: capitalize;
    }

    .card-btn:hover {
        background-color: #ff4057;
        color: #ffffff;
        transform: translateX(4px);
    }

    /* Typography helper */
    .bebas-neue {
        font-family: 'Bebas Neue', Arial, sans-serif;
    }

    /* ===== LOGO CARD STYLES ===== */
    .logo-sample {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        width: 100%;
    }

    .logo-display {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 40px;
        background-color: #35373B;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .logo-display:hover {
        background-color: #3f4146;
        transform: scale(1.02);
    }

    .logo-square {
        width: 40px;
        height: 40px;
        background-color: #ff4057;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.3);
    }

    .logo-square.large {
        width: 80px;
        height: 80px;
        border-radius: 16px;
    }

    .logo-square.circle-variant {
        border-radius: 50%;
    }

    .logo-icon {
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
    }

    .logo-square.large .logo-icon {
        font-size: 40px;
    }

    .logo-text {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 1px;
    }

    .logo-text.large {
        font-size: 48px;
        letter-spacing: 2px;
    }

    .logo-description {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.7);
        text-align: center;
        font-weight: 500;
    }

    /* Responsive adjustments */
    @media (min-width: 768px) {
        .logo-display {
            padding: 60px;
        }
    }
</style>