<?php

/**
 * Page: login.php
 * Login page for BeatSync
 */

// ============================================
// DATA CATCHERS - Add at top
// ============================================

// Catch errors and old input from controller
$errors = $errors ?? [];
$old = $old ?? [];
$success = $success ?? null;

// ============================================
// PAGE CONFIGURATION
// ============================================

$pageTitle = "Beatsync - log in or sign up";

// ============================================
// FORM CONFIGURATION
// ============================================

$authConfig = [
    'type' => 'login',
    'title' => 'STAY TUNED FOR 2026 TICKETS!',
    'subtitle' => 'Please sign in to continue',
    'bgText' => 'LOGIN',
    'submitButtonText' => 'Login',
    'footerText' => "Don't have an account?",
    'footerLinkText' => 'Sign Up',
    'footerLinkHref' => 'signup',

    // ✅ NEW: Form action and method
    'formAction' => base_url('login'),
    'formMethod' => 'post',

    // ✅ NEW: Pass errors and old data
    'errors' => $errors,
    'old' => $old,
    'success' => $success
];

// ============================================
// FORM FIELDS
// ============================================

$formFields = [
    [
        'id' => 'email',
        'name' => 'email',
        'type' => 'email',
        'label' => 'Email',
        'placeholder' => 'Enter your email',
        'required' => true,
        'value' => $old['email'] ?? '', // ✅ Restore old value if validation failed
        'error' => $errors['email'] ?? null // ✅ Show error message
    ],
    [
        'id' => 'password',
        'name' => 'password',
        'type' => 'password',
        'label' => 'Password',
        'placeholder' => 'Enter your password',
        'required' => true,
        'hasToggle' => true,
        'error' => $errors['password'] ?? null // ✅ Show error message
    ],
    [
        'id' => 'remember',
        'name' => 'remember',
        'type' => 'checkbox',
        'label' => 'Remember me for 30 days',
        'value' => '1',
        'checked' => isset($old['remember']) && $old['remember']
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => $pageTitle]) ?>

<body>
    <?php if ($success): ?>
        <!-- Success Message -->
        <div class="alert alert-success">
            <?= esc($success) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors['account']) || !empty($errors['general'])): ?>
        <!-- General Error Message -->
        <div class="alert alert-danger">
            <?= esc($errors['account'] ?? $errors['general']) ?>
        </div>
    <?php endif; ?>

    <?= view('components/cards/card_auth', [
        'config' => $authConfig,
        'fields' => $formFields
    ]) ?>
</body>

</html>