<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');
$routes->get('register', 'AuthController::register');
// Admin
$routes->group('admin', function($routes)
{
    // GET
    $routes->get('/', 'AdminController::index');
    $routes->get('create_user', 'AdminController::create_user');
    $routes->get('create_user/customer', 'AdminController::create_user_customer');
    $routes->get('create_user/seller', 'AdminController::create_user_seller');

    $routes->get('list_user', 'AdminController::list_user');
    $routes->get('list_user/customer', 'AdminController::list_user_customer');
    $routes->get('list_user/seller', 'AdminController::list_user_seller');

    $routes->get('transaction', 'AdminController::transaction');
    $routes->get('print_card', 'AdminController::print_card');
    $routes->get('add_balance', 'AdminController::add_balance');
    $routes->get('withdraw', 'AdminController::withdraw');
    // POST
});
// End Admin

// Seller
$routes->group('seller', function($routes)
{
    $routes->get('/', 'SellerController::index');
    $routes->get('transaction_history', 'SellerController::transaction_history');
    $routes->get('balance_history', 'SellerController::balance_history');
    $routes->get('change_profile', 'SellerController::change_profilen');
    $routes->get('print_card', 'SellerController::print_card');
});
// End Seller

// Customer
$routes->get('customer/', 'CustomerController::index');
// End Customer

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
