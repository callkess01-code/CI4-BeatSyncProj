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
    'footerLinkHref' => 'signup'
];

// Form Fields
$formFields = [
    [
        'id' => 'email',
        'name' => 'email',
        'type' => 'email',
        'label' => 'Email',
        'placeholder' => 'Enter your email',
        'required' => true
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
    <?= view('components/cards/card_auth', [
        'config' => $authConfig,
        'fields' => $formFields
    ]) ?>
</body>

</html>