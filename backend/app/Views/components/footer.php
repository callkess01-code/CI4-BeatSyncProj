<?php

/**
 * Component: footer.php
 * 
 * Data contract (optional):
 * $copyright: string - Copyright text
 * $footerLinks: array - Custom footer links (optional)
 * $socialLinks: array - Custom social media links (optional)
 */

// Default footer links - all point to landing page sections
$defaultFooterLinks = [
    'Menu' => [
        ['href' => '/', 'text' => 'Home'],
        ['href' => '/', 'text' => 'Events'],
        ['href' => '/tickets', 'text' => 'Tickets']
    ],
    'Company' => [
        ['href' => 'moodboard', 'text' => 'Mood Board'],
        ['href' => 'roadmap', 'text' => 'Road Map']
    ]
];

// Default social links
$defaultSocialLinks = [
    [
        'name' => 'Facebook',
        'href' => '#',
        'icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'
    ],
    [
        'name' => 'Twitter',
        'href' => '#',
        'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'
    ],
    [
        'name' => 'Instagram',
        'href' => '#',
        'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'
    ]
];

// Use custom data if provided, otherwise use defaults
$footerLinks = $footerLinks ?? $defaultFooterLinks;
$socialLinks = $socialLinks ?? $defaultSocialLinks;

$company_name = 'BeatSync';
$current_year = date('Y');
$copyright = $copyright ?? "© Copyright {$company_name}. All Rights Reserved";
?>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-main">
            <!-- Brand Section -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <div class="logo-square">
                        <span class="logo-icon">♥</span>
                    </div>
                    <span class="logo-text">BEATSYNC</span>
                </div>
                <div class="footer-tagline">The ultimate EDM experience.</div>
                <div class="footer-social">
                    <?php foreach ($socialLinks as $social): ?>
                        <a href="<?= esc($social['href']) ?>" aria-label="<?= esc($social['name']) ?>">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="<?= esc($social['icon']) ?>" />
                            </svg>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Links Section -->
            <div class="footer-links">
                <?php foreach ($footerLinks as $category => $links): ?>
                    <div class="footer-column">
                        <h3><?= esc($category) ?></h3>
                        <ul>
                            <?php foreach ($links as $link): ?>
                                <li>
                                    <a href="<?= esc($link['href']) ?>">
                                        <?= esc($link['text']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Newsletter Section -->
            <div class="newsletter-section">
                <h3 class="newsletter-title">GET OUR LATEST UPDATES</h3>
                <form class="newsletter-form" method="POST" action="">
                    <input
                        type="email"
                        name="newsletter_email"
                        class="newsletter-input"
                        placeholder="Enter your email"
                        required />
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p class="copyright"><?= esc($copyright) ?></p>
    </div>
</footer>

<style>
    .footer {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        margin-top: 80px;
        background-color: #111111;
        padding: 60px 20px 0;
    }

    .footer-content {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        max-width: 1200px;
    }

    .footer-main {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        width: 100%;
        gap: 40px;
        padding-bottom: 40px;
    }

    .footer-brand {
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo-square {
        width: 40px;
        height: 40px;
        background-color: #ff4057;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.3);
    }

    .logo-icon {
        font-size: 20px;
        color: #ffffff;
        font-weight: bold;
    }

    .logo-text {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        font-weight: 400;
        letter-spacing: 1px;
        color: #ffffff;
    }

    .footer-tagline {
        font-size: 16px;
        color: #cccccc;
        font-weight: 300;
    }

    .footer-social {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 12px;
        margin-top: 8px;
    }

    .footer-social a {
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-social a:hover {
        background-color: #ff4057;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.4);
    }

    .footer-social svg {
        width: 18px;
        height: 18px;
    }

    .footer-links {
        display: flex;
        flex-direction: row;
        gap: 60px;
        width: auto;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-column h3 {
        font-family: 'Inter', Arial, sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 0.5px;
    }

    .footer-column ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 0;
        margin: 0;
    }

    .footer-column li {
        list-style: none;
    }

    .footer-column a {
        font-size: 14px;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-column a:hover {
        color: #ff4057;
    }

    .newsletter-section {
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: flex-start;
        align-items: flex-start;
        width: 100%;
    }

    .newsletter-title {
        font-family: 'Inter', Arial, sans-serif;
        font-size: 18px;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: 0.5px;
    }

    .newsletter-form {
        display: flex;
        flex-direction: column;
        gap: 0;
        width: 100%;
    }

    .newsletter-input {
        font-size: 16px;
        font-weight: 400;
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.1);
        padding: 16px 20px;
        border-radius: 8px 8px 0 0;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        outline: none;
    }

    .newsletter-input:focus {
        border-color: #ff4057;
        box-shadow: 0 0 0 3px rgba(255, 64, 87, 0.1);
        background-color: rgba(255, 255, 255, 0.15);
    }

    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .newsletter-btn {
        font-size: 16px;
        font-weight: 700;
        color: #ff4057;
        background-color: #ffffff;
        padding: 16px 24px;
        border-radius: 0 0 8px 8px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .newsletter-btn:hover {
        background-color: #EBEBE4;
        transform: translateY(-1px);
    }

    .footer-bottom {
        width: 100%;
        background-color: #000000;
        padding: 24px 20px;
        margin-top: 40px;
        text-align: center;
    }

    .copyright {
        font-size: 14px;
        font-weight: 400;
        color: #cccccc;
    }

    .copyright strong {
        color: #ffffff;
        font-weight: 700;
    }

    @media (min-width: 768px) {
        .footer-main {
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: nowrap;
            gap: 60px;
        }

        .footer-brand {
            width: auto;
            min-width: 200px;
            flex-shrink: 0;
        }

        .footer-links {
            flex-direction: row;
            gap: 60px;
            width: auto;
            flex-shrink: 0;
        }

        .newsletter-section {
            width: 35%;
            margin-left: auto;
        }

        .newsletter-form {
            flex-direction: row;
        }

        .newsletter-input {
            flex: 1;
            border-radius: 8px 0 0 8px;
        }

        .newsletter-btn {
            border-radius: 0 8px 8px 0;
            padding: 16px 32px;
            white-space: nowrap;
        }
    }

    @media (min-width: 1024px) {
        .footer {
            padding: 80px 60px 0;
        }

        .footer-main {
            gap: 80px;
        }

        .footer-links {
            gap: 80px;
        }
    }
</style>