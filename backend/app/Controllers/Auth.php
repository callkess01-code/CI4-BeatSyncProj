<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    // ============================================
    // SHOW LOGIN PAGE (GET REQUEST)
    // ============================================

    /**
     * Display the login form
     * This is called when user visits /login
     */
    public function showLogin()
    {
        $session = session();

        // ✅ FIXED: Check if already logged in and redirect based on user type
        if ($session->has('user')) {
            $userType = $session->get('user')['type'] ?? 'client';

            if ($userType === 'admin') {
                return redirect()->to('/admin/dashboard');
            }

            // Default redirect for clients
            return redirect()->to('/');
        }

        // Get any error messages or old input from previous attempt
        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];
        $success = $session->getFlashdata('success') ?? null;

        // Show the login view with data
        return view('auth/login', [
            'errors' => $errors,
            'old' => $old,
            'success' => $success
        ]);
    }

    // ============================================
    // LOGIN FUNCTION (POST REQUEST)
    // ============================================

    /**
     * Process login form submission
     * This is called when user submits the login form
     */
    public function login()
    {
        // Get request service to access POST data
        $request = service('request');

        // Start a Session
        $session = session();

        // ========================================
        // Create Validation Rules
        // ========================================

        $validation = \Config\Services::validation();
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');

        // ========================================
        // Transfer post data to variable
        // ========================================

        $post = $request->getPost();

        // ========================================
        // Validate data
        // ========================================

        if (!$validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Extract Email value to email variable
        // ========================================

        $email = $request->getPost('email');

        // ========================================
        // Using model we will call the database and query
        // ========================================

        $userModel = new \App\Models\UsersModel();
        $user = $userModel->where('email', $email)->first();

        // ========================================
        // Check if user exists
        // ========================================

        if (!$user) {
            $session->setFlashdata('errors', ['email' => 'No account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Converting to useable array
        // ========================================

        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        // ========================================
        // Verify password
        // ========================================

        if (!password_verify($request->getPost('password'), $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // ========================================
        // ✅ FIXED: Check account status
        // ========================================

        $accountStatus = $userArr['account_status'] ?? 'inactive';
        if ($accountStatus !== 'active') {
            $statusMessages = [
                'inactive' => 'Your account is inactive. Please contact support.',
                'suspended' => 'Your account has been suspended. Please contact support.',
                'pending' => 'Your account is pending verification.'
            ];

            $session->setFlashdata('errors', [
                'account' => $statusMessages[$accountStatus] ?? 'Account access denied'
            ]);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // ========================================
        // ✅ FIXED: Create session with proper display name
        // ========================================

        $firstName = $userArr['first_name'] ?? '';
        $middleName = $userArr['middle_name'] ?? '';
        $lastName = $userArr['last_name'] ?? '';

        // Build display name properly
        $displayName = trim($firstName . ' ' . $lastName);

        $session->set('user', [
            'id' => $userArr['id'] ?? null,
            'email' => $userArr['email'] ?? null,
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'type' => $userArr['user_type'] ?? 'client',
            'display_name' => $displayName,
        ]);

        // ========================================
        // ✅ FIXED: Conditional redirect based on user type
        // ========================================

        $type = strtolower($userArr['user_type'] ?? 'client');

        // Log for debugging
        log_message('debug', 'User logged in - Type: ' . $type . ', Email: ' . $email);

        if ($type === 'admin') {
            log_message('debug', 'Redirecting to admin dashboard');
            return redirect()->to('/admin/dashboard');
        }

        if ($type === 'client') {
            log_message('debug', 'Redirecting to homepage');
            return redirect()->to('/');
        }

        // Default fallback
        log_message('debug', 'Redirecting to default homepage');
        return redirect()->to('/');
    }

    // ============================================
    // LOGOUT FUNCTION (GET/POST REQUEST)
    // ============================================

    /**
     * Logout user and destroy session
     */
    public function logout()
    {
        $session = session();

        // Log the logout
        if ($session->has('user')) {
            $user = $session->get('user');
            log_message('debug', 'User logging out: ' . ($user['email'] ?? 'unknown'));
        }

        // Destroy from session
        $session->destroy();

        // Remove session cookie
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 3600,
            $params['path'] ?? '/',
            $params['domain'] ?? '',
            isset($_SERVER['HTTPS']),
            true
        );

        // Redirect to homepage
        return redirect()->to('/');
    }

    // ============================================
    // SHOW SIGNUP PAGE (GET REQUEST)
    // ============================================

    /**
     * Display the signup form
     */
    public function showSignup()
    {
        $session = session();

        // If already logged in, redirect
        if ($session->has('user')) {
            $userType = $session->get('user')['type'] ?? 'client';

            if ($userType === 'admin') {
                return redirect()->to('/admin/dashboard');
            }

            return redirect()->to('/');
        }

        // Get any error messages or old input
        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];

        return view('auth/signup', [
            'errors' => $errors,
            'old' => $old
        ]);
    }

    // ============================================
    // SIGNUP FUNCTION (POST REQUEST)
    // ============================================

    /**
     * Process signup form submission
     */
    public function signup()
    {
        // Extract Data from frontend
        $request = service('request');

        // Create Session
        $session = session();

        // ========================================
        // Create Rules
        // ========================================

        $validation = \Config\Services::validation();

        $validation->setRule('first_name', 'First name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('middle_name', 'Middle name', 'permit_empty|max_length[100]');
        $validation->setRule('last_name', 'Last name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $validation->setRule('password', 'Password', 'required|min_length[6]');
        $validation->setRule('password_confirm', 'Password Confirmation', 'required|matches[password]');

        $post = $request->getPost();

        // Error Catchers
        if (!$validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Check if email already exists (double-check)
        // ========================================

        $userModel = new \App\Models\UsersModel();

        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'This email is already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Prepare data for insertion
        // ========================================

        $data = [
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'] ?? null,
            'last_name' => $post['last_name'],
            'email' => $post['email'],
            'password_hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            'user_type' => 'client', // Default user type
            'account_status' => 'active',
            'email_verified' => 0,
        ];

        // ========================================
        // Insert into database
        // ========================================

        $inserted = $userModel->insert($data);

        // ========================================
        // Handle success/failure
        // ========================================

        if ($inserted === false) {
            log_message('error', 'User registration failed: ' . json_encode($userModel->errors()));
            $session->setFlashdata('errors', ['general' => 'Could not create account. Please try again.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Success! Log and redirect
        log_message('debug', 'New user registered: ' . $post['email']);
        $session->setFlashdata('success', 'Account created successfully! Please login.');
        return redirect()->to('/login');
    }
}
