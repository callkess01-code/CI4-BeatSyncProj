<?php

/**
 * Component: cards/card_auth.php
 * Layout for login and signup pages
 */

// Navigation and footer links (used globally)
$nav = [
    ['label' => 'Home', 'href' => '/'],
    ['label' => 'Events', 'href' => '/'],
    ['label' => 'Tickets', 'href' => '/tickets']
];

$config = $config ?? [];
$fields = $fields ?? [];
$type = $config['type'] ?? 'login';
$formId = $type === 'signup' ? 'signupForm' : 'loginForm';
?>

<main class="auth-container">
    <!-- Header -->
    <header class="auth-header">
        <a href="/landing" class="header-logo">
            <div class="logo-square">
                <span class="logo-icon">♥</span>
            </div>
            <span class="logo-text">BEATSYNC</span>
        </a>
        <nav class="header-nav">
            <?php foreach ($nav as $item): ?>
                <a href="<?= esc($item['href']) ?>" class="nav-link"><?= esc($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>
    </header>

    <!-- Auth Section -->
    <section class="auth-section">
        <div class="auth-content">
            <!-- Background Text -->
            <div class="section-bg-text"><?= esc($config['bgText'] ?? 'AUTH') ?></div>

            <div class="auth-form-card">
                <div class="auth-header-text">
                    <h1 class="auth-title"><?= esc($config['title'] ?? 'Welcome') ?></h1>
                    <p class="auth-subtitle"><?= esc($config['subtitle'] ?? 'Please continue') ?></p>
                </div>

                <form class="auth-form" id="<?= esc($formId) ?>" method="POST" action="">
                    <?php foreach ($fields as $field): ?>
                        <div class="form-group">
                            <label for="<?= esc($field['id']) ?>" class="form-label">
                                <?= esc($field['label']) ?>
                            </label>

                            <?php if (($field['hasToggle'] ?? false) && $field['type'] === 'password'): ?>
                                <!-- Password field with toggle -->
                                <div class="password-wrapper">
                                    <input
                                        type="password"
                                        id="<?= esc($field['id']) ?>"
                                        name="<?= esc($field['name']) ?>"
                                        class="form-input password-input"
                                        placeholder="<?= esc($field['placeholder']) ?>"
                                        <?= ($field['required'] ?? false) ? 'required' : '' ?> />
                                    <button type="button" class="password-toggle" data-toggle="<?= esc($field['id']) ?>" style="display: none;">
                                        <!-- Eye Icon SVG -->
                                        <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <!-- Eye Off Icon SVG (hidden by default) -->
                                        <svg class="eye-off-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                            <line x1="1" y1="1" x2="23" y2="23"></line>
                                        </svg>
                                    </button>
                                </div>
                            <?php else: ?>
                                <!-- Regular input field -->
                                <input
                                    type="<?= esc($field['type']) ?>"
                                    id="<?= esc($field['id']) ?>"
                                    name="<?= esc($field['name']) ?>"
                                    class="form-input"
                                    placeholder="<?= esc($field['placeholder']) ?>"
                                    <?= ($field['required'] ?? false) ? 'required' : '' ?> />
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <?= view('components/buttons/button_primary', [
                        'label' => $config['submitButtonText'] ?? 'Submit'
                    ]) ?>
                </form>

                <div class="auth-footer">
                    <p class="auth-footer-text">
                        <?= esc($config['footerText'] ?? '') ?>
                        <a href="<?= esc($config['footerLinkHref'] ?? '#') ?>" class="link-<?= esc($type === 'login' ? 'signup' : 'login') ?>">
                            <?= esc($config['footerLinkText'] ?? 'Link') ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="auth-page-footer">
        <p>Copyright © BeatSync. All Rights Reserved</p>
    </footer>
</main>

<style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Inter', Arial, sans-serif;
        background-color: #000000;
        color: #ffffff;
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* Auth Container */
    .auth-container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        width: 100%;
    }

    /* Header */
    .auth-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 40px;
        position: relative;
        z-index: 100;
    }

    .header-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
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

    .header-nav {
        display: none;
        gap: 32px;
    }

    .nav-link {
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #ff4057;
    }

    /* Auth Section */
    .auth-section {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
    }

    /* Content */
    .auth-content {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 450px;
    }

    /* Background Text */
    .section-bg-text {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: clamp(100px, 20vw, 180px);
        font-weight: 400;
        color: rgba(255, 255, 255, 0.03);
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        letter-spacing: 10px;
        white-space: nowrap;
        pointer-events: none;
        text-align: center;
    }

    /* Form Card */
    .auth-form-card {
        background-color: rgba(24, 24, 24, 0.95);
        border-radius: 20px;
        padding: 40px 35px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        z-index: 2;
    }

    .auth-header-text {
        text-align: center;
        margin-bottom: 35px;
    }

    .auth-title {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: clamp(24px, 5vw, 32px);
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 2px;
        margin-bottom: 10px;
        line-height: 1.1;
    }

    .auth-subtitle {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 400;
    }

    /* Form */
    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-label {
        font-size: 14px;
        font-weight: 500;
        color: #ffffff;
    }

    .form-input {
        width: 100%;
        padding: 16px 18px;
        background-color: rgba(0, 0, 0, 0.4);
        border: 2px solid rgba(255, 64, 87, 0.4);
        border-radius: 12px;
        color: #ffffff;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #ff4057;
        background-color: rgba(0, 0, 0, 0.6);
        box-shadow: 0 0 0 4px rgba(255, 64, 87, 0.1);
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    /* Password Wrapper */
    .password-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .password-wrapper .form-input {
        padding-right: 50px;
    }

    .password-toggle {
        position: absolute;
        right: 14px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.3s ease;
        color: rgba(255, 255, 255, 0.6);
    }

    .password-toggle:hover {
        opacity: 0.8;
        color: rgba(255, 255, 255, 0.9);
    }

    .eye-icon,
    .eye-off-icon {
        width: 20px;
        height: 20px;
    }

    /* Footer */
    .auth-footer {
        text-align: center;
        margin-top: 28px;
        padding-top: 24px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .auth-footer-text {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
    }

    .link-login,
    .link-signup {
        color: #ff4057;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .link-login:hover,
    .link-signup:hover {
        color: #ff6b7a;
        text-decoration: underline;
    }

    /* Page Footer */
    .auth-page-footer {
        padding: 24px;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.6);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .auth-page-footer p {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
    }

    /* Responsive Design */
    @media (min-width: 768px) {
        .auth-header {
            padding: 24px 60px;
        }

        .header-nav {
            display: flex;
        }

        .auth-content {
            max-width: 480px;
        }

        .auth-form-card {
            padding: 50px 45px;
        }

        .section-bg-text {
            font-size: 200px;
            top: -100px;
        }
    }

    @media (max-width: 767px) {
        .section-bg-text {
            font-size: 120px;
            top: -60px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInputs = document.querySelectorAll('.password-input');
        passwordInputs.forEach(input => {
            const wrapper = input.closest('.password-wrapper');
            const toggleBtn = wrapper.querySelector('.password-toggle');
            const eyeIcon = toggleBtn.querySelector('.eye-icon');
            const eyeOffIcon = toggleBtn.querySelector('.eye-off-icon');

            input.addEventListener('input', function() {
                toggleBtn.style.display = this.value.length > 0 ? 'flex' : 'none';
            });

            toggleBtn.addEventListener('click', function() {
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                eyeIcon.style.display = isHidden ? 'none' : 'block';
                eyeOffIcon.style.display = isHidden ? 'block' : 'none';
            });
        });
    });
</script>