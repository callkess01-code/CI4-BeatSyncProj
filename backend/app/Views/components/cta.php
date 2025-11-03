<?php

/**
 * Component: CTA (Call to Action) section - App Download (BeatSync Dark Theme)
 * 
 * Data contract:
 * $heading: string - Main heading text
 * $sub: string - Subheading/description text
 * $style: string - 'diagonal' or 'side' (default: 'diagonal')
 */

$style = $style ?? 'diagonal';
?>

<?php if ($style === 'diagonal'): ?>

<?php else: ?>
    <!-- Style 2: Side Layout with Dark Background -->
    <section class="app-cta-side">
        <div class="app-cta-container">
            <div class="app-cta-visual">
                <div class="brand-logo-animated">
                    <div class="logo-box">
                        <svg class="logo-heart" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                    <!-- Orbiting mini logos -->
                    <div class="mini-logo orbit-1">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                    <div class="mini-logo orbit-2">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                    <div class="mini-logo orbit-3">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="app-cta-info">
                <h2 class="app-cta-title"><?= esc($heading) ?></h2>
                <p class="app-cta-description"><?= esc($sub) ?></p>
                <a href="#" class="learn-more-button">
                    LEARN MORE
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <div class="app-store-buttons-side">
                <?= view('components/buttons/button_disabled', ['store' => 'apple', 'href' => '#', 'disable' => true]) ?>
                <?= view('components/buttons/button_disabled', ['store' => 'google', 'href' => '#', 'disable' => true]) ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<style>
    .app-cta-side {
        width: 100%;
        padding: 60px 20px;
        margin: 80px 0;
        background: linear-gradient(135deg, #111111 0%, #1a1a1a 100%);
        border-radius: 30px;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        overflow: hidden;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .app-cta-side::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 64, 87, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .app-cta-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .app-cta-visual {
        display: flex;
        justify-content: center;
        align-items: center;
        order: -1;
        min-height: 140px;
    }

    .brand-logo-animated {
        position: relative;
        width: 140px;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-box {
        width: 70px;
        height: 70px;
        background: linear-gradient(145deg, #ff4057, #e63946);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow:
            0 8px 24px rgba(255, 64, 87, 0.35),
            0 4px 12px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
    }

    @keyframes mainLogoPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.08);
        }
    }

    .logo-heart {
        width: 35px;
        height: 35px;
        color: #ffffff;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    .mini-logo {
        position: absolute;
        width: 28px;
        height: 28px;
        background: linear-gradient(145deg, #ff4057, #e63946);
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.4);
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    .mini-logo svg {
        width: 14px;
        height: 14px;
        color: #ffffff;
    }

    .orbit-1 {
        animation: orbit1 8s linear infinite;
    }

    .orbit-2 {
        animation: orbit2 10s linear infinite;
    }

    .orbit-3 {
        animation: orbit3 12s linear infinite;
    }

    @keyframes orbit1 {
        0% {
            transform: rotate(0deg) translateX(60px) rotate(0deg);
            opacity: 1;
        }

        50% {
            opacity: 0.6;
        }

        100% {
            transform: rotate(360deg) translateX(60px) rotate(-360deg);
            opacity: 1;
        }
    }

    @keyframes orbit2 {
        0% {
            transform: rotate(120deg) translateX(65px) rotate(-120deg);
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }

        100% {
            transform: rotate(480deg) translateX(65px) rotate(-480deg);
            opacity: 1;
        }
    }

    @keyframes orbit3 {
        0% {
            transform: rotate(240deg) translateX(55px) rotate(-240deg);
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }

        100% {
            transform: rotate(600deg) translateX(55px) rotate(-600deg);
            opacity: 1;
        }
    }

    .app-cta-info {
        text-align: center;
    }

    .app-cta-title {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: clamp(22px, 4vw, 36px);
        font-weight: 400;
        color: #ffffff;
        line-height: 1.15;
        margin-bottom: 12px;
        letter-spacing: 1.5px;
    }

    .app-cta-description {
        font-size: clamp(15px, 2vw, 18px);
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 24px;
        line-height: 1.5;
    }

    .learn-more-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ffffff;
        background: transparent;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border: 2px solid #ff4057;
        border-radius: 8px;
        padding: 10px 24px;
        transition: all 0.3s ease;
        letter-spacing: 1px;
    }

    .learn-more-button:hover {
        background: #ff4057;
        border-color: #ff4057;
        gap: 10px;
    }

    .learn-more-button svg {
        transition: transform 0.3s ease;
    }

    .learn-more-button:hover svg {
        transform: translateX(4px);
    }

    .app-store-buttons-side {
        display: flex;
        flex-direction: column;
        gap: 12px;
        justify-content: center;
        align-items: center;
    }

    @media (min-width: 768px) {
        .app-cta-container {
            grid-template-columns: 140px 1fr auto;
            gap: 50px;
        }

        .app-cta-visual {
            order: 0;
        }

        .app-cta-info {
            text-align: left;
        }

        .app-store-buttons-side {
            flex-direction: column;
            align-items: flex-end;
        }
    }

    @media (min-width: 1024px) {
        .app-cta-side {
            padding: 70px 60px;
        }

        .app-cta-container {
            grid-template-columns: 160px 1fr auto;
            gap: 60px;
        }

        .brand-logo-animated {
            width: 160px;
            height: 160px;
        }

        .logo-box {
            width: 75px;
            height: 75px;
        }

        .logo-heart {
            width: 38px;
            height: 38px;
        }

        .mini-logo {
            width: 32px;
            height: 32px;
        }

        .mini-logo svg {
            width: 16px;
            height: 16px;
        }
    }
</style>