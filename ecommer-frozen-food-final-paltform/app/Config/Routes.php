
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
$routes->get('/cart/add/(:any)', 'CartController::add/$1');
$routes->get('/cart/delete/(:any)', 'CartController::delete/$1');

$routes->get('/product/(:any)', 'ProductController::show/$1');
$routes->get('/product/(:any)', 'ProductController::show/$1');

$routes->get('/profile', 'AuthController::profile');
$routes->post('/profile/update', 'AuthController::updateProfile');

$routes->get('/Orders', 'Pages::index2');

$routes->post('/cart/update', 'CartController::update');

$routes->get('/Orders', 'Pages::index2');
$routes->get('/Checkout_Page', 'Pages::index2');

$routes->get('/Cart_Page', 'Pages::index2');
$routes->get('/Orders', 'Pages::index2');
