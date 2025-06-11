
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Pages::index');
$routes->get('/', 'AuthController::login');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/LandingPage', 'ProductController::showAll');
$routes->get('/LandingPage/(:any)', 'ProductController::showCategory/$1');

$routes->get('/cart', 'CartController::index');
