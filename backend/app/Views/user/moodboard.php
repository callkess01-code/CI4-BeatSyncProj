<?php

/**
 * Page: moodboard.php
 * Visual identity samples and brand guidelines for BeatSync
 */

// Page Configuration
$pageTitle = "Mood Board | BeatSync";

// Color palette data
$colorPalette = [
    [
        'name' => 'Primary Red',
        'hex' => '#FF4057',
        'usage' => 'Main brand color, CTAs, highlights'
    ],
    [
        'name' => 'Lighter Black',
        'hex' => '#111111',
        'usage' => 'Card backgrounds, secondary elements'
    ],
    [
        'name' => 'Deep Black',
        'hex' => '#181818',
        'usage' => 'Main background, primary surface'
    ]
];

// Typography examples
$typographyExamples = [
    [
        'label' => 'HEADINGS: BEBAS NEUE',
        'sample' => 'LIVE A LIFE THAT IS ONE OF A KIND',
        'type' => 'heading'
    ],
    [
        'label' => 'Body: Inter',
        'sample' => 'Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.',
        'type' => 'body'
    ]
];

// Card samples
$cardSamples = [
    [
        'title' => 'Business Brand',
        'description' => 'The ultimate EDM experience.',
        'type' => 'brand'
    ],
    [
        'title' => 'Description',
        'description' => 'Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.',
        'type' => 'description'
    ],
    [
        'title' => 'Headline',
        'description' => 'Live a life that is one of a kind.',
        'type' => 'headline'
    ]
];

// Logo variants
$logoVariants = [
    [
        'variant' => 'square',
        'description' => 'Logo with square background'
    ],
    [
        'variant' => 'circle',
        'description' => 'Logo with circle background'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<?= view('components/head', [
    'title' => $pageTitle
]) ?>

<body>
    <?= view('components/header', ['active' => 'Mood Board']) ?>

    <main class="moodboard-main">
        <header class="moodboard-page-header">
            <h1 class="moodboard-page-title">MOOD BOARD</h1>
            <p class="moodboard-page-subtitle">Visual identity samples for BeatSync</p>
        </header>

        <!-- Color System -->
        <section class="moodboard-section">
            <h2 class="section-heading">Color Palette</h2>
            <div class="color-grid">
                <?php foreach ($colorPalette as $color): ?>
                    <?= view('components/cards/card_styles', [
                        'type' => 'color',
                        'data' => $color
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Typography -->
        <section class="moodboard-section">
            <h2 class="section-heading">Typography</h2>
            <div class="typography-grid">
                <?php foreach ($typographyExamples as $typo): ?>
                    <?= view('components/cards/card_styles', [
                        'type' => 'typography',
                        'data' => $typo
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Buttons -->
        <section class="moodboard-section">
            <h2 class="section-heading">Buttons</h2>
            <div class="button-showcase-grid">
                <div class="button-demo-item">
                    <?= view('components/buttons/button_primary', ['label' => 'Primary', 'href' => '#']) ?>
                    <span class="button-demo-label">Primary</span>
                </div>
                <div class="button-demo-item">
                    <?= view('components/buttons/button_secondary', ['label' => 'Secondary', 'href' => '#']) ?>
                    <span class="button-demo-label">Secondary</span>
                </div>
                <div class="button-demo-item">
                    <?= view('components/buttons/button_border', ['label' => 'Border', 'href' => '#']) ?>
                    <span class="button-demo-label">Border</span>
                </div>
                <div class="button-demo-item">
                    <?= view('components/buttons/button_disabled', ['label' => 'Disabled', 'href' => '#', 'disable' => true]) ?>
                    <span class="button-demo-label">Disabled</span>
                </div>
            </div>
        </section>

        <!-- Card Samples -->
        <section class="moodboard-section">
            <h2 class="section-heading">Card Samples</h2>
            <div class="cards-sample-grid">
                <?php foreach ($cardSamples as $card): ?>
                    <?= view('components/cards/card_styles', [
                        'type' => 'sample',
                        'data' => $card
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Logo -->
        <section class="moodboard-section">
            <h2 class="section-heading">Logo</h2>
            <div class="logo-showcase-grid">
                <?php foreach ($logoVariants as $logo): ?>
                    <?= view('components/cards/card_styles', [
                        'type' => 'logo',
                        'data' => $logo
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?= view('components/footer') ?>

    <style>
        /* Main Container */
        .moodboard-main {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        /* Moodboard Page Styles */
        .moodboard-page-header {
            margin-bottom: 60px;
            text-align: center;
        }

        .moodboard-page-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(60px, 10vw, 120px);
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 4px;
            margin-bottom: 16px;
        }

        .moodboard-page-subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.6);
        }

        .moodboard-section {
            margin-bottom: 80px;
            padding-bottom: 80px;
            border-bottom: 1px solid #35373B;
        }

        .moodboard-section:last-child {
            border-bottom: none;
        }

        .section-heading {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(32px, 6vw, 48px);
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 40px;
        }

        /* Grid Layouts */
        .color-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            width: 100%;
        }

        .typography-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            width: 100%;
        }

        .cards-sample-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            width: 100%;
        }

        .logo-showcase-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            width: 100%;
            justify-items: center;
        }

        /* Button Showcase */
        .button-showcase-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
            width: 100%;
        }

        .button-demo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            text-align: center;
        }

        .button-demo-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
        }

        /* Button standardization for moodboard */
        .button-showcase-grid .btn-primary,
        .button-showcase-grid .btn-secondary,
        .button-showcase-grid .btn-border {
            width: 200px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 8px;
        }

        /* Hide play icon in secondary button for moodboard */
        .button-showcase-grid .btn-secondary .btn-icon {
            display: none;
        }

        /* Responsive */
        @media (min-width: 768px) {
            .moodboard-main {
                padding: 80px 40px;
            }

            .typography-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .moodboard-main {
                padding: 100px 60px;
            }

            .color-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .cards-sample-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</body>

</html>