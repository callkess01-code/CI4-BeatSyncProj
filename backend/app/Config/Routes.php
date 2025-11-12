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

// ============================================
// AUTHENTICATION ROUTES
// ============================================
$routes->get('/login', 'Auth::showLogin');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->post('/logout', 'Auth::logout');
$routes->get('/signup', 'Auth::showSignup');
$routes->post('/signup', 'Auth::signup');

// ============================================
// CLIENT ROUTES
// ============================================
$routes->get('/dashboard', 'Users::dashboard');
$routes->get('/accounts', 'Users::accounts');
$routes->get('/request', 'Users::request');
$routes->get('/services', 'Users::services');

// ============================================
// ADMIN ROUTES
// ============================================
$routes->get('/admin/dashboard', 'Users::dashboard');
$routes->get('/admin/accounts', 'Users::accounts');
$routes->get('/admin/services', 'Users::services');
$routes->get('/admin/request', 'Users::request');

// Service Management (AJAX)
$routes->post('/admin/services/create', 'Users::createService');
$routes->post('/admin/services/update', 'Users::updateService');
$routes->post('/admin/services/delete', 'Users::deleteService');
