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
$routes->get('/logout', 'AuthController::logout');
$routes->get('/', 'AuthController::index');
$routes->addRedirect('login', '/');
$routes->get('register', 'AuthController::register');
// Admin
$routes->group('admin', function($routes)
{
    // GET
    // Create user
    $routes->get('/', 'AdminController::index');
    $routes->get('create_user', 'AdminController::create_user');
    $routes->get('create_user/customer', 'AdminController::create_user_customer');
    $routes->get('create_user/seller', 'AdminController::create_user_seller');
    $routes->post('create_user/seller/process', 'AdminController::create_seller_process');
    // List User
    $routes->get('list_user', 'AdminController::list_user');
    $routes->get('list_user/customer', 'AdminController::list_user_customer');
    $routes->get('list_user/seller', 'AdminController::list_user_seller');
    // Update USer
    $routes->get('update/customer/(:num)', 'AdminController::update_customer/$1');
    $routes->get('update/seller/(:num)', 'AdminController::update_seller/$1');
    $routes->post('update/seller/process','AdminController::update_seller_process');
    // Delete User
    $routes->get('delete/seller/(:num)', 'AdminController::delete_seller/$1');
    // Withdraw
    $routes->get('withdraw', 'AdminController::withdraw');
    $routes->get('withdraw/customer', 'AdminController::withdraw_customer');
    $routes->get('withdraw/seller', 'AdminController::withdraw_seller');
    // Other
    $routes->get('transaction', 'AdminController::transaction');
    $routes->get('print_card', 'AdminController::print_card');
    $routes->get('add_balance', 'AdminController::add_balance');
});
// End Admin

// Seller
$routes->group('seller', function($routes)
{
    // GET
    $routes->get('/', 'SellerController::index');
    $routes->get('transaction', 'SellerController::transaction');
    $routes->get('transaction_history', 'SellerController::transaction_history');
    $routes->get('balance_history', 'SellerController::balance_history');
    $routes->get('change_profile', 'SellerController::change_profile');
    $routes->get('print_card', 'SellerController::print_card');
    // POST
});
// End Seller

// Customer
$routes->group('customer', function($routes)
{
    // GET
    $routes->get('/', 'CustomerController::index');
    $routes->get('transaction_history', 'CustomerController::transaction_history');
    $routes->get('balance_history', 'CustomerController::balance_history');
    $routes->get('change_profile', 'CustomerController::change_profile');
    $routes->get('print_card', 'CustomerController::print_card');
    // POST
});
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
