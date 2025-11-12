<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index(): string
    {
        return view('user/landing');
    }

    public function login(): string
    {
        return view('user/login');
    }

    public function signup(): string
    {
        return view('user/signup');
    }

    public function moodboard(): string
    {
        return view('user/moodboard');
    }

    public function roadmap(): string
    {
        return view('user/roadmap');
    }

    // ============================================
    // DASHBOARD - Admin Only
    // ============================================
    public function dashboard()
    {
        $session = session();

        // Check if logged in
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user');

        // Check if admin
        if ($user['type'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied');
        }

        // Get user statistics
        $userModel = new \App\Models\UsersModel();

        $data['stats'] = [
            'total_users' => $userModel->countAll(),
            'active_users' => $userModel->where('account_status', 'active')->countAllResults(false),
            'total_events' => 5,
            'upcoming_events' => 3,
            'total_bookings' => 15,
            'pending_bookings' => 2,
            'total_revenue' => 50000,
            'clients' => $userModel->where('user_type', 'client')->countAllResults(false),
            'organizers' => $userModel->where('user_type', 'organizer')->countAllResults(false),
            'pending_verifications' => $userModel->where('email_verified', 0)->countAllResults(false),
            'published_events' => 4,
            'pending_events' => 1,
            'cancelled_events' => 0,
            'confirmed_bookings' => 10,
            'pending_payment' => 3,
            'cancelled_bookings' => 2,
            'new_users_today' => 2,
            'bookings_today' => 1,
            'events_this_month' => 3
        ];

        return view('admin/dashboard', $data);
    }

    // ============================================
    // SERVICES - Admin Only
    // ============================================
    public function services()
    {
        $session = session();

        // Check if logged in
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user');

        // Check if admin
        if ($user['type'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied');
        }

        // Mock events data
        $data['events'] = [];
        $data['stats'] = [
            'total_events' => 0,
            'published_events' => 0,
            'pending_approval' => 0
        ];

        return view('admin/services', $data);
    }

    // ============================================
    // ACCOUNTS - Admin Only
    // ============================================
    public function accounts()
    {
        $session = session();

        // Check if logged in
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user');

        // Check if admin
        if ($user['type'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied');
        }

        // Get all users
        $userModel = new \App\Models\UsersModel();
        $usersEntities = $userModel->findAll();

        // ✅ FIX: Convert entities to arrays for the view
        $usersArray = [];
        foreach ($usersEntities as $userEntity) {
            $usersArray[] = $userEntity->toArray();
        }

        $data['users'] = $usersArray;

        // Stats
        $data['stats'] = [
            'total_users' => $userModel->countAll(),
            'active_users' => $userModel->where('account_status', 'active')->countAllResults(false),
            'pending_verification' => $userModel->where('email_verified', 0)->countAllResults()
        ];

        return view('admin/accounts', $data);
    }

    // ============================================
    // REQUEST - Admin Only
    // ============================================
    public function request()
    {
        $session = session();

        // Check if logged in
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user');

        // Check if admin
        if ($user['type'] !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied');
        }

        // Mock bookings data
        $data['bookings'] = [];
        $data['stats'] = [
            'total_bookings' => 0,
            'pending_payment' => 0,
            'confirmed' => 0,
            'total_revenue' => 0
        ];

        return view('admin/request', $data);
    }

    // ============================================
    // AJAX METHODS (Placeholder)
    // ============================================
    public function createService()
    {
        return $this->response->setJSON(['success' => true, 'message' => 'Service created']);
    }

    public function updateService()
    {
        return $this->response->setJSON(['success' => true, 'message' => 'Service updated']);
    }

    public function deleteService()
    {
        return $this->response->setJSON(['success' => true, 'message' => 'Service deleted']);
    }
}
