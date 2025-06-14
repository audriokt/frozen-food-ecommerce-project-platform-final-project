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
$routes->post('/product/search', 'ProductController::search');

$routes->get('/cart', 'CartController::index');
$routes->get('/cart/add/(:any)', 'CartController::add/$1');
$routes->get('/cart/delete/(:any)', 'CartController::delete/$1');

$routes->get('/product/(:any)', 'ProductController::show/$1');
$routes->get('/product/(:any)', 'ProductController::show/$1');

$routes->get('/profile', 'AuthController::profile');
$routes->post('/profile/update', 'AuthController::updateProfile');
$routes->post('/cart/update', 'CartController::update');
$routes->post('/cart/checkout', 'CartController::checkout');
$routes->post('/cart/checkout/(:any)', 'CartController::directCheckout/$1');

$routes->post('/checkout/bayar', 'PaymentController::bayar');
$routes->get('/cart/checkout', 'CartController::checkout');
$routes->post('/cart/checkout', 'PaymentController::bayar');

$routes->get('/Cart_Page', 'Pages::index2');
$routes->get('/Order', 'OrderController::index');
