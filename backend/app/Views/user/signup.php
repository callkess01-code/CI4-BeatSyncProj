<?php

/**
 * Page: signup.php
 * Sign up page for BeatSync
 */

// Page Configuration
$pageTitle = "Sign up for Beatsync";

// Form Configuration
$authConfig = [
    'type' => 'signup',
    'title' => 'JOIN THE BEAT!',
    'subtitle' => 'Create your account to get started',
    'bgText' => 'SIGN UP',
    'submitButtonText' => 'Sign Up',
    'footerText' => 'Already have an account?',
    'footerLinkText' => 'Login',
    'footerLinkHref' => 'login'
];

// Form Fields
$formFields = [
    [
        'id' => 'fullname',
        'name' => 'fullname',
        'type' => 'text',
        'label' => 'Full Name',
        'placeholder' => 'Enter your full name',
        'required' => true
    ],
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
        'placeholder' => 'Create a password',
        'required' => true,
        'hasToggle' => true
    ],
    [
        'id' => 'confirm_password',
        'name' => 'confirm_password',
        'type' => 'password',
        'label' => 'Confirm Password',
        'placeholder' => 'Re-enter your password',
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