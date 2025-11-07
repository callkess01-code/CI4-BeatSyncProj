<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/login', 'Users::login');
$routes->get('/signup', 'Users::signup');
$routes->get('/moodboard', 'Users::moodboard');
$routes->get('/roadmap', 'Users::roadmap');
$routes->get('/dashboard', 'Users::dashboard');
$routes->get('/services', 'Users::services');
$routes->get('/accounts', 'Users::accounts');
$routes->get('/request', 'Users::request');
