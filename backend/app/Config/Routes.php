<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ============================================
// PUBLIC PAGES
// ============================================
$routes->get('/', 'Users::index');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/services', 'Users::services');

// ============================================
// AUTHENTICATION ROUTES
// ============================================
$routes->get('/login', 'Auth::showLogin');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/logout', 'Auth::logout');  // ✅ Support both GET and POST
$routes->get('/signup', 'Auth::showSignup');
$routes->post('/signup', 'Auth::signup');

// ============================================
// CLIENT ROUTES (Requires Login)
// ============================================
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/dashboard', 'Users::dashboard');
    $routes->get('/accounts', 'Users::accounts');
    $routes->get('/request', 'Users::request');
});

// ============================================
// ADMIN ROUTES (Requires Admin Login)
// ============================================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('services', 'Admin::services');

    // Service Management (AJAX)
    $routes->post('services/create', 'Admin::createService');
    $routes->post('services/update', 'Admin::updateService');
    $routes->post('services/delete', 'Admin::deleteService');
});
