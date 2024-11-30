<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');

$routes->get('/dashboard', 'Dashboard::index',['filter' => 'authGuard']);

$routes->group('/post', ['filter' => 'authGuard'], function($routes){

    $routes->get('/', 'PostController::index', ['filter' => 'authGuard']);
    $routes->get('create', 'PostController::create');
    $routes->get('edit/(:num)', 'PostController::edit/$1');
    $routes->post('store', 'PostController::store');
    $routes->post('update/(:num)', 'PostController::update/$1');
    $routes->get('delete/(:num)', 'PostController::delete/$1');
    
});

$routes->group('/siswa', ['filter' => 'authGuard'], function($routes){

$routes->get('/', 'SiswaController::index', ['filter' => 'authGuard']);
$routes->get('create', 'SiswaController::create');
$routes->get('edit/(:num)', 'SiswaController::edit/$1');
$routes->post('store', 'SiswaController::store');
$routes->post('update/(:num)', 'SiswaController::update/$1');
$routes->get('delete/(:num)', 'SiswaController::delete/$1');

});