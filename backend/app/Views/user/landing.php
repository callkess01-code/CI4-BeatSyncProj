<!doctype html>
<html lang="en">

<?php


// Events data
$events = [
    [
        'id' => 1,
        'title' => 'Electric Night',
        'image' => 'https://images.unsplash.com/photo-1675480481794-8650d8419296?q=80&w=435&auto=format&fit=crop',
        'alt' => 'Electronic music festival with vibrant stage lighting',
        'month' => 'OCT',
        'day' => '31',
        'location' => 'BGC, Philippines'
    ],
    [
        'id' => 2,
        'title' => 'Beat Drop Experience',
        'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQ9dZ2_8mhjHiVXskeLxAwZ_eJhZOziOmiUlo_wRpKsf0vxsi_rlU82pJUM61i4l5HTWKCxXHW1YWgqsbY',
        'alt' => 'DJ performance with crowd and atmospheric lighting',
        'month' => 'NOV',
        'day' => '15',
        'location' => 'Makati, Philippines'
    ],
    [
        'id' => 3,
        'title' => 'Dark Halloween Rave',
        'image' => 'https://app.edm-addicts.com/storage/11958/503040321_685029571162999_8399625462016170612_n.jpg',
        'alt' => 'Dark Halloween music festival with special effects',
        'month' => 'OCT',
        'day' => '31',
        'location' => 'BGC, Philippines'
    ]
];

?>

<?= view('components/head') ?>

<body>
    <?= view('components/header', ['active' => 'Home']) ?>

    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="home">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <h1 class="hero-title">LIVE A LIFE THAT IS<br>ONE OF A KIND</h1>
                        <p class="hero-description">Experience the ultimate EDM journey with world-class DJs that will transform your night into pure magic.</p>
                        <div class="button-group">
                            <?= view('components/buttons/button_primary', ['label' => 'Buy Tickets', 'href' => '#tickets']) ?>
                            <?= view('components/buttons/button_secondary', ['label' => 'Highlights', 'href' => '#highlights', 'icon' => '▶']) ?>
                        </div>
                    </div>
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1549046666-7c422ab19783?q=80&w=986&auto=format&fit=crop"
                            alt="EDM concert with dramatic lighting and crowd"
                            class="hero-image" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="events-section" id="events">
            <div class="container">
                <h2 class="section-title">UPCOMING EVENTS</h2>
                <div class="events-grid">
                    <?php foreach ($events as $event): ?>
                        <?= view('components/cards/card_event', ['event' => $event]) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <?= view('components/cta', [
            'heading' => 'Download The App To Save Your Favorite Artists',
            'sub' => 'Add your favorite artists & be prepared for when the set times drop.',
            'style' => 'side'
        ]) ?>
    </main>

    <?= view('components/footer') ?>

    <style>
        /* Layout Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero-section {
            width: 100%;
            padding: 60px 0 80px;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 50px;
            align-items: center;
        }

        .hero-content {
            text-align: left;
        }

        .hero-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(40px, 8vw, 80px);
            font-weight: 400;
            line-height: 0.9;
            color: #ffffff;
            margin-bottom: 24px;
            letter-spacing: 2px;
        }

        .hero-description {
            font-size: clamp(16px, 3vw, 20px);
            font-weight: 400;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            max-width: 600px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .hero-image-wrapper {
            width: 100%;
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Events Section */
        .events-section {
            width: 100%;
            padding: 80px 0;
        }

        .section-title {
            font-family: 'Bebas Neue', Arial, sans-serif;
            font-size: clamp(36px, 8vw, 72px);
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 50px;
            text-align: left;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            perspective: 1000px;
        }

        /* Tablet */
        @media (min-width: 768px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr;
                gap: 60px;
            }

            .button-group {
                flex-direction: row;
            }

            .events-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }
        }

        /* Desktop */
        @media (min-width: 1024px) {
            .container {
                padding: 0 60px;
            }

            .hero-section {
                padding: 80px 0 100px;
            }

            .events-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Reduce 3D on mobile */
        @media (max-width: 767px) {
            .events-grid {
                perspective: none;
            }
        }
    </style>
</body>

</html>