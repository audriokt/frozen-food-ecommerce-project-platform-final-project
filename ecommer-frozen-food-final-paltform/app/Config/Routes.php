
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Pages::index');
$routes->get('/', 'AuthController::login');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::processLogin');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::saveRegister');

$routes->get('/LandingPage', 'Pages::index');
