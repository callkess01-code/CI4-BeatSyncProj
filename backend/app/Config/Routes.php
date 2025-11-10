<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/dashboard', 'Users::dashboard');
$routes->get('/services', 'Users::services');
$routes->get('/accounts', 'Users::accounts');
$routes->get('/request', 'Users::request');


// Auth
$routes->get('/login', 'Auth::showLogin');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/signup', 'Auth::showSignup');
$routes->post('/signup', 'Auth::signup');
