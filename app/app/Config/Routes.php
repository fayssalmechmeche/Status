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

$routes->get('history', 'Incident::indexPublic', ['as' => 'incidentPublic']);




$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'Dash::index', ['as' => 'dash']);


    $routes->get('incident', 'Incident::index', ['as' => 'incident']);
    $routes->get('incident/addIncident', 'Incident::addIncident', ['as' => 'addIncident']);
    $routes->put('incident/update/', 'Incident::update', ['as' => 'incident/update/']);

    $routes->get('settings', 'Settings::index', ['as' => 'settings']);
    $routes->put('settings/update/', 'Settings::update', ['as' => 'settings/update/']);


    $routes->get('service', 'Service::index', ['as' => 'service']);
    $routes->get('service/logout', 'Service::logout', ['as' => 'logout']);
    $routes->get('service/addService', 'Service::addService', ['as' => 'addService']);
    $routes->put('service/update/', 'Service::update/', ['as' => 'service/update/']);
    $routes->get('service/delete/', 'Service::delete/', ['as' => 'service/delete/']);


    $routes->get('users/edit/(:num)', 'Users::edit/$1', ['as' => 'users/edit']);
    $routes->get('users', 'Users::index', ['as' => 'users']);
    $routes->get('users/addUser', 'Users::save', ['as' => 'addUser']);
    $routes->put('users/update/', 'Users::update/', ['as' => 'users/update/']);
    $routes->put('users/delete/', 'Users::delete/', ['as' => 'users/delete/']);

    $routes->get('user', 'User::index', ['as' => 'user']);
    $routes->put('user/update/', 'User::update/', ['as' => 'user/update/']);

    $routes->get('category', 'Category::index', ['as' => 'category']);
    $routes->get('category/addCategory', 'Category::addCategory', ['as' => 'addCategory']);
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
