 
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection 
 */
$routes->get('/', 'Pages::index');

// User Routes
$routes->get('/register', 'User::register');
$routes->post('/register/save', 'User::saveRegister');    
$routes->get('/login', 'User::login');
$routes->post('/login', 'User::processLogin');
$routes->get('/logout', 'User::logout');