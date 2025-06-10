
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

<<<<<<< HEAD
$routes->get('/LandingPage', 'ProductController::showAll');
=======
$routes->get('/LandingPage', 'Pages::index');
>>>>>>> ffe1a7014ec73d15e3ffdbaf0d75f8092c5c428c
