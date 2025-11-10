<?php

/**
 * Component: card_auth.php
 * Authentication card component for login/signup
 * 
 * Required props:
 * - $config: Configuration array
 * - $fields: Form fields array
 */

// Extract configuration
$type = $config['type'] ?? 'login';
$title = $config['title'] ?? '';
$subtitle = $config['subtitle'] ?? '';
$bgText = $config['bgText'] ?? '';
$submitButtonText = $config['submitButtonText'] ?? 'Submit';
$footerText = $config['footerText'] ?? '';
$footerLinkText = $config['footerLinkText'] ?? '';
$footerLinkHref = $config['footerLinkHref'] ?? '#';

// ✅ NEW: Get form action and method
$formAction = $config['formAction'] ?? '';
$formMethod = $config['formMethod'] ?? 'post';

// ✅ NEW: Get errors and old data
$errors = $config['errors'] ?? [];
$old = $config['old'] ?? [];
$success = $config['success'] ?? null;

?>

<div class="auth-container">
    <div class="auth-card">
        <!-- Background Text -->
        <div class="auth-bg-text"><?= esc($bgText) ?></div>

        <!-- Card Content -->
        <div class="auth-content">
            <!-- Header -->
            <div class="auth-header">
                <h1 class="auth-title"><?= esc($title) ?></h1>
                <p class="auth-subtitle"><?= esc($subtitle) ?></p>
            </div>

            <?php if ($success): ?>
                <!-- ✅ Success Message -->
                <div class="alert alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <?= esc($success) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors['account']) || !empty($errors['general'])): ?>
                <!-- ✅ General Error Message -->
                <div class="alert alert-error">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <?= esc($errors['account'] ?? $errors['general']) ?>
                </div>
            <?php endif; ?>

            <!-- ✅ Form with action and method -->
            <form
                action="<?= esc($formAction) ?>"
                method="<?= esc($formMethod) ?>"
                class="auth-form"
                novalidate>
                <?= csrf_field() ?> <!-- ✅ CSRF Protection -->

                <?php foreach ($fields as $field): ?>
                    <div class="form-group">
                        <?php if ($field['type'] === 'checkbox'): ?>
                            <!-- Checkbox Field -->
                            <label class="checkbox-label">
                                <input
                                    type="checkbox"
                                    id="<?= esc($field['id']) ?>"
                                    name="<?= esc($field['name']) ?>"
                                    value="<?= esc($field['value'] ?? '1') ?>"
                                    <?= isset($field['checked']) && $field['checked'] ? 'checked' : '' ?>>
                                <span><?= esc($field['label']) ?></span>
                            </label>
                        <?php else: ?>
                            <!-- Text/Email/Password Fields -->
                            <label for="<?= esc($field['id']) ?>" class="form-label">
                                <?= esc($field['label']) ?>
                            </label>

                            <div class="input-wrapper">
                                <input
                                    type="<?= esc($field['type']) ?>"
                                    id="<?= esc($field['id']) ?>"
                                    name="<?= esc($field['name']) ?>"
                                    placeholder="<?= esc($field['placeholder'] ?? '') ?>"
                                    <?= isset($field['required']) && $field['required'] ? 'required' : '' ?>
                                    value="<?= esc($field['value'] ?? '') ?>"
                                    class="form-input <?= isset($field['error']) ? 'input-error' : '' ?>"
                                    aria-invalid="<?= isset($field['error']) ? 'true' : 'false' ?>"
                                    <?= isset($field['error']) ? 'aria-describedby="' . esc($field['id']) . '-error"' : '' ?>>

                                <?php if (isset($field['hasToggle']) && $field['hasToggle']): ?>
                                    <!-- Password Toggle -->
                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('<?= esc($field['id']) ?>')"
                                        aria-label="Toggle password visibility">
                                        <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </div>

                            <?php if (isset($field['error'])): ?>
                                <!-- ✅ Field Error Message -->
                                <p id="<?= esc($field['id']) ?>-error" class="field-error">
                                    <?= esc($field['error']) ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <!-- Submit Button -->
                <button type="submit" class="auth-submit-btn">
                    <?= esc($submitButtonText) ?>
                </button>

                <!-- Footer Links -->
                <?php if ($footerText && $footerLinkText): ?>
                    <div class="auth-footer">
                        <p>
                            <?= esc($footerText) ?>
                            <a href="<?= base_url($footerLinkHref) ?>" class="auth-link">
                                <?= esc($footerLinkText) ?>
                            </a>
                        </p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<style>
    /* ============================================
   AUTH CONTAINER
   ============================================ */
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        padding: 20px;
    }

    .auth-card {
        position: relative;
        width: 100%;
        max-width: 450px;
        background: rgba(17, 17, 17, 0.95);
        border-radius: 16px;
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
    }

    .auth-bg-text {
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 120px;
        font-weight: 900;
        color: rgba(255, 64, 87, 0.05);
        pointer-events: none;
        font-family: 'Bebas Neue', Arial, sans-serif;
    }

    .auth-content {
        position: relative;
        z-index: 1;
    }

    /* ============================================
   HEADER
   ============================================ */
    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-title {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 32px;
        color: #ff4057;
        margin-bottom: 8px;
        letter-spacing: 1px;
    }

    .auth-subtitle {
        color: #ccc;
        font-size: 14px;
    }

    /* ============================================
   ALERTS
   ============================================ */
    .alert {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert svg {
        flex-shrink: 0;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #4ade80;
    }

    .alert-error {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #f87171;
    }

    /* ============================================
   FORM
   ============================================ */
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
        color: #fff;
        font-size: 14px;
        font-weight: 500;
    }

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        font-size: 14px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-input:focus {
        border-color: #ff4057;
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 0 3px rgba(255, 64, 87, 0.1);
    }

    .form-input.input-error {
        border-color: #ef4444;
    }

    .form-input.input-error:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    /* ============================================
   PASSWORD TOGGLE
   ============================================ */
    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        padding: 4px;
        display: flex;
        align-items: center;
        transition: color 0.2s ease;
    }

    .password-toggle:hover {
        color: #ff4057;
    }

    /* ============================================
   CHECKBOX
   ============================================ */
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        color: #ccc;
        font-size: 14px;
    }

    .checkbox-label input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    /* ============================================
   FIELD ERROR
   ============================================ */
    .field-error {
        color: #f87171;
        font-size: 13px;
        margin: 0;
    }

    /* ============================================
   SUBMIT BUTTON
   ============================================ */
    .auth-submit-btn {
        width: 100%;
        padding: 14px 24px;
        background: linear-gradient(135deg, #ff4057 0%, #e63946 100%);
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .auth-submit-btn:hover {
        background: linear-gradient(135deg, #e63946 0%, #d62839 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 64, 87, 0.4);
    }

    /* ============================================
   FOOTER
   ============================================ */
    .auth-footer {
        text-align: center;
        margin-top: 20px;
        color: #999;
        font-size: 14px;
    }

    .auth-link {
        color: #ff4057;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .auth-link:hover {
        color: #ff6b7a;
        text-decoration: underline;
    }

    /* ============================================
   RESPONSIVE
   ============================================ */
    @media (max-width: 480px) {
        .auth-card {
            padding: 30px 20px;
        }

        .auth-title {
            font-size: 24px;
        }

        .auth-bg-text {
            font-size: 80px;
        }
    }
</style>

<script>
    /**
     * Toggle password visibility
     */
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        const button = input.parentElement.querySelector('.password-toggle');

        if (input.type === 'password') {
            input.type = 'text';
            button.innerHTML = `
            <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
            </svg>
        `;
        } else {
            input.type = 'password';
            button.innerHTML = `
            <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
        `;
        }
    }
</script>