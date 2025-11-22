<?php

/**
 * Page: signup.php
 * Sign up page for BeatSync
 */

// ============================================
// DATA CATCHERS - Add at top
// ============================================

// Catch errors and old input from controller
$errors = $errors ?? [];
$old = $old ?? [];

// ============================================
// PAGE CONFIGURATION
// ============================================

$pageTitle = "Sign up for Beatsync";

// ============================================
// FORM CONFIGURATION
// ============================================

$authConfig = [
    'type' => 'signup',
    'title' => 'JOIN THE BEAT!',
    'subtitle' => 'Create your account to get started',
    'bgText' => 'SIGN UP',
    'submitButtonText' => 'Sign Up',
    'footerText' => 'Already have an account?',
    'footerLinkText' => 'Login',
    'footerLinkHref' => 'login',

    // ✅ NEW: Form action and method
    'formAction' => base_url('signup'),
    'formMethod' => 'post',

    // ✅ NEW: Pass errors and old data
    'errors' => $errors,
    'old' => $old
];

// ============================================
// FORM FIELDS
// ============================================

$formFields = [
    [
        'id' => 'first_name',
        'name' => 'first_name',
        'type' => 'text',
        'label' => 'First Name',
        'placeholder' => 'Enter your first name',
        'required' => true,
        'value' => $old['first_name'] ?? '', // ✅ Restore old value
        'error' => $errors['first_name'] ?? null // ✅ Show error
    ],
    [
        'id' => 'middle_name',
        'name' => 'middle_name',
        'type' => 'text',
        'label' => 'Middle Name (Optional)',
        'placeholder' => 'Enter your middle name',
        'required' => false,
        'value' => $old['middle_name'] ?? '',
        'error' => $errors['middle_name'] ?? null
    ],
    [
        'id' => 'last_name',
        'name' => 'last_name',
        'type' => 'text',
        'label' => 'Last Name',
        'placeholder' => 'Enter your last name',
        'required' => true,
        'value' => $old['last_name'] ?? '',
        'error' => $errors['last_name'] ?? null
    ],
    [
        'id' => 'email',
        'name' => 'email',
        'type' => 'email',
        'label' => 'Email',
        'placeholder' => 'Enter your email',
        'required' => true,
        'value' => $old['email'] ?? '',
        'error' => $errors['email'] ?? null
    ],
    [
        'id' => 'password',
        'name' => 'password',
        'type' => 'password',
        'label' => 'Password',
        'placeholder' => 'Create a password (min 6 characters)',
        'required' => true,
        'hasToggle' => true,
        'error' => $errors['password'] ?? null
    ],
    [
        'id' => 'password_confirm',
        'name' => 'password_confirm',
        'type' => 'password',
        'label' => 'Confirm Password',
        'placeholder' => 'Re-enter your password',
        'required' => true,
        'hasToggle' => true,
        'error' => $errors['password_confirm'] ?? null
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => $pageTitle]) ?>

<body>
    <?= view('components/header') ?>
    <?php if (!empty($errors['general'])): ?>
        <!-- General Error Message -->
        <div class="alert alert-error">
            <?= esc($errors['general']) ?>
        </div>
    <?php endif; ?>

    <?= view('components/cards/card_auth', [
        'config' => $authConfig,
        'fields' => $formFields
    ]) ?>
</body>

</html>