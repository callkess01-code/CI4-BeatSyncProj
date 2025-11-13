<?php

/**
 * Page: login.php
 * Login page for BeatSync
 */

// Page Configuration
$pageTitle = "Beatsync - log in or sign up";

// Form Configuration
$authConfig = [
    'type' => 'login',
    'title' => 'STAY TUNED FOR 2026 TICKETS!',
    'subtitle' => 'Please sign in to continue',
    'bgText' => 'LOGIN',
    'submitButtonText' => 'Login',
    'footerText' => "Don't have an account?",
    'footerLinkText' => 'Sign Up',
    'footerLinkHref' => 'signup',      // ✅ Use base_url() instead of url_to()
    'formAction' => base_url('login')             // ✅ Use base_url() instead of url_to()
];

// Form Fields
$formFields = [
    [
        'id' => 'email',
        'name' => 'email',
        'type' => 'email',
        'label' => 'Email',
        'placeholder' => 'Enter your email',
        'required' => true,
        'value' => $old['email'] ?? ''
    ],
    [
        'id' => 'password',
        'name' => 'password',
        'type' => 'password',
        'label' => 'Password',
        'placeholder' => 'Enter your password',
        'required' => true,
        'hasToggle' => true
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => $pageTitle]) ?>

<body>
    <?= view('components/header') ?>
    <!-- Display Success Messages -->
    <?php if (!empty($success)): ?>
        <div class="alert alert-success" style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #10b981; color: white; padding: 16px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
            <?= esc($success) ?>
        </div>
    <?php endif; ?>

    <!-- Display Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger" style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #ef4444; color: white; padding: 16px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
            <ul style="margin: 0; padding-left: 20px;">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= view('components/cards/card_auth', [
        'config' => $authConfig,
        'fields' => $formFields,
        'errors' => $errors ?? [],
        'old' => $old ?? []
    ]) ?>

    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>

</html>