<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('lupapassword', 'Login::lupaPassword');
$routes->post('lupapassword', 'Login::sendEmailLupaPassword');
$routes->get('resetpassword', 'Login::resetPassword');
$routes->post('doresetpassword', 'Login::doresetPassword');

$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'admin']);
$routes->get('/category', 'Category::index', ['filter' => 'admin']);
$routes->get('/album', 'Album::index', ['filter' => 'admin']);
$routes->get('/my-photos', 'MyPhotos::index');
$routes->get('/detailfoto/(:any)', 'DetailFoto::index/$1');
$routes->get('/add-photo', 'Home::create_photo');
$routes->post('/add-photo', 'Home::add_photo');
$routes->get('/add-album', 'Home::create_album');
$routes->post('/add-album', 'Home::add_album');
$routes->get('/logout', 'Login::logout');
