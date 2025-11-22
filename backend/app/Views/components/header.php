<?php

/**
 * components/header.php
 * Navigation header for BeatSync
 */

$session = session(); // ✅ Use CodeIgniter's session service

$nav = [
    ['label' => 'Home', 'href' => '/'],
    ['label' => 'Events', 'href' => '/'],
    ['label' => 'Tickets', 'href' => '/tickets']
];

// Dynamic authentication links
$isLoggedIn = !empty($session->get('user'));
$authLinks = $isLoggedIn
    ? ['label' => 'Logout', 'href' => 'logout']
    : ['label' => 'Login', 'href' => 'login'];
?>

<header class="header">
    <!-- Head Section -->
    <?= view('components/head') ?>

    <div class="header-logo">
        <div class="logo-square">
            <span class="logo-icon">♥</span>
        </div>
        <span class="logo-text">BEATSYNC</span>
    </div>

    <nav class="nav-menu" role="navigation">
        <?php foreach ($nav as $item): ?>
            <a href="<?= esc($item['href']) ?>"
                class="nav-item"
                role="menuitem">
                <?= esc($item['label']) ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="header-actions">
        <a href="<?= esc($authLinks['href']) ?>" class="login-link">
            <?= esc($authLinks['label']) ?>
        </a>

        <?php if (!$isLoggedIn): ?>
            <?= view('components/buttons/button_primary', ['label' => 'Sign Up', 'href' => 'signup']) ?>
        <?php endif; ?>
    </div>

    <button class="hamburger" aria-label="Menu" onclick="toggleMobileMenu()">☰</button>
</header>

<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        padding: 20px 20px;
        position: relative;
        z-index: 100;
        margin: 0 auto;
    }

    .header-logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo-square {
        width: 40px;
        height: 40px;
        background-color: #ff4057;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.3);
    }

    .logo-icon {
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
    }

    .logo-text {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 1px;
    }

    .nav-menu {
        display: none;
        gap: 30px;
        justify-content: flex-start;
        align-items: center;
        margin-left: 40px;
        flex: 1;
    }

    .nav-item {
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
        position: relative;
        padding-bottom: 4px;
    }

    .nav-item:hover {
        color: #ff4057;
    }

    .nav-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #ff4057;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .nav-item:hover::after {
        transform: scaleX(1);
    }

    .header-actions {
        display: none;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .hamburger {
        display: block;
        background: none;
        color: #ffffff;
        font-size: 24px;
        padding: 8px;
        border: none;
        cursor: pointer;
    }

    .login-link {
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .login-link:hover {
        color: #ff4057;
    }

    .header-actions .btn-primary {
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        background-color: #ff4057;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        min-width: auto;
        display: inline-block;
    }

    .header-actions .btn-primary:hover {
        background-color: #e63946;
        box-shadow: 0 4px 12px rgba(255, 64, 87, 0.4);
    }

    /* Mobile Menu */
    .nav-menu.mobile-menu-open {
        display: flex !important;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.95);
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        z-index: 9999;
        gap: 40px;
        margin-left: 0;
    }

    .nav-menu.mobile-menu-open .nav-item {
        font-size: 24px;
    }

    /* Responsive */
    @media (min-width: 768px) {
        .header {
            padding: 24px 40px;
        }

        .hamburger {
            display: none;
        }

        .nav-menu {
            display: flex;
        }

        .header-actions {
            display: flex;
        }
    }

    @media (min-width: 1024px) {
        .header {
            padding: 30px 60px;
        }

        .nav-menu {
            margin-left: 60px;
        }
    }
</style>

<script>
    function toggleMobileMenu() {
        const menu = document.querySelector('.nav-menu');
        menu.classList.toggle('mobile-menu-open');
    }
</script>