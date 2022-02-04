<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Index');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Index::index', ['as' => 'index']);

$routes->get('login', 'Login::index', ['as' => 'login']);
$routes->get('login/auth', 'Login::auth', ['as' => 'auth']);





$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['as' => 'dashboard']);
    $routes->get('category', 'Category::index', ['as' => 'category']);
    $routes->get('users', 'Users::index', ['as' => 'users']);
    $routes->get('users/addUser', 'Users::save', ['as' => 'addUser']);
    $routes->get('settings', 'Settings::index', ['as' => 'settings']);
    $routes->get('user/settings', 'UserSettings::index', ['as' => 'user.settings']);
    $routes->get('dashboard/logout', 'Dashboard::logout', ['as' => 'logout']);
    $routes->get('dashboard/addService', 'Dashboard::addService', ['as' => 'addService']);
    $routes->get('category/addCategory', 'Category::addCategory', ['as' => 'addCategory']);
    $routes->get('users/edit/(:num)', 'Users::edit/$1', ['as' => 'users/edit']);
    $routes->put('users/update/', 'Users::update/', ['as' => 'users/update/']);
    $routes->put('users/settings/update/', 'UserSettings::update/', ['as' => 'users/settings/update/']);
    $routes->put('category/update/', 'Category::update/', ['as' => 'category/update/']);
    $routes->put('category/delete/', 'Category::delete/', ['as' => 'category/delete/']);
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
