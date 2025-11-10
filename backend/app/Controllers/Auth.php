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

        // If already logged in, redirect to appropriate page
        if ($session->has('user')) {
            return redirect()->to('/admin/dashboard');
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

        // Here i created rules for email and password
        $validation = \Config\Services::validation();

        // Variable comes from the html the id from the input
        // Format: variable, human readable name, rules seperated by |
        // So this following rule means variable email is Email which means it should not be null and has valid email format
        $validation->setRule('email', 'Email', 'required|valid_email');

        // The following rule means variable password, named Password and it should not be null
        $validation->setRule('password', 'Password', 'required');

        // Other Rules you can use:
        // min_length[6]
        // max_length[100]
        // permit_empty
        // matches[password_confirm]

        // ========================================
        // Transfer post data to variable
        // ========================================

        $post = $request->getPost();

        // ========================================
        // If validation of data email and password are not valid 
        // then trigger to return the input in variable to input element in html 
        // and set validation error message
        // ========================================

        if (! $validation->run($post)) {
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
        // Condition that there should be return value 
        // which means user is registered
        // ========================================

        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Converting to useable array
        // ========================================

        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        // ========================================
        // Condition to check using hash the password
        // ========================================

        if (! password_verify($request->getPost('password'), $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Create a session making sure the user is logged in
        // ========================================

        $session->set('user', [
            'id' => $userArr['id'] ?? null,
            'email' => $userArr['email'] ?? null,
            'first_name' => $userArr['first_name'] ?? null,
            'last_name' => $userArr['last_name'] ?? null,
            'type' => $userArr['user_type'] ?? 'client',
            'display_name' => trim(($userArr['first_name'][0] ?? '') . ' ' . ($userArr['middle_name'][0] ?? '') . ' ' . ($userArr['last_name'] ?? '')),
        ]);

        // ========================================
        // Conditional return depends of the type of user
        // ========================================

        $type = strtolower($userArr['user_type'] ?? 'client');

        if ($type === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        if ($type === 'client') {
            return redirect()->to('/');
        }

        // Default fallback
        return redirect()->to('/');
    }

    // ============================================
    // LOGOUT FUNCTION (POST REQUEST)
    // ============================================

    /**
     * Logout user and destroy session
     */
    public function logout()
    {
        // Destroy from session
        session()->destroy();

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
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required|min_length[6]');
        $validation->setRule('password_confirm', 'Password Confirmation', 'required|matches[password]');

        $post = $request->getPost();

        // Error Catchers, Conditions that if not followed will return error messages
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ========================================
        // If all is good now we create and use the data structure coming from model
        // ========================================

        $userModel = new \App\Models\UsersModel();

        // Check if email already exists
        if ($userModel->where('email', $post['email'])->first()) {
            $session->setFlashdata('errors', ['email' => 'This email is already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // ========================================
        // Now prepare your data. below is an example.
        // This should be based on data from database table
        // Make sure that required datas are specified while some should be expecting null so have catcher for it
        // ========================================

        $data = [
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'] ?? null, // This is the sample for nullable data
            'last_name' => $post['last_name'],
            'email' => $post['email'],
            'password_hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            'user_type' => 'client',
            'account_status' => 'active',
            'email_verified' => 0,
        ];

        // ========================================
        // Now insert in the database
        // ========================================

        $inserted = $userModel->insert($data);

        // ========================================
        // Redirect if success or not
        // ========================================

        if ($inserted === false) {
            $session->setFlashdata('errors', ['general' => 'Could not create account. Please try again.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Success! Redirect to login with success message
        $session->setFlashdata('success', 'Account created successfully! Please login.');
        return redirect()->to('/login');
    }
}
