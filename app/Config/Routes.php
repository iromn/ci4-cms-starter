<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('blog', 'Home::blog');
$routes->get('blog/preview/(:num)', 'Home::preview/$1');
$routes->get('blog/(:any)', 'Home::blogDetail/$1');

// Auth Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // User Management
    $routes->get('users', 'Admin\Users::index');
    $routes->get('users/create', 'Admin\Users::create');
    $routes->post('users/store', 'Admin\Users::store');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\Users::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\Users::delete/$1');
    // Blog Management
    $routes->get('blogs', 'Admin\Blogs::index');
    $routes->get('blogs/create', 'Admin\Blogs::create');
    $routes->post('blogs/store', 'Admin\Blogs::store');
    $routes->get('blogs/edit/(:num)', 'Admin\Blogs::edit/$1');
    $routes->post('blogs/update/(:num)', 'Admin\Blogs::update/$1');
    $routes->get('blogs/delete/(:num)', 'Admin\Blogs::delete/$1');
    $routes->post('upload/image', 'Admin\Upload::uploadImage');
});
