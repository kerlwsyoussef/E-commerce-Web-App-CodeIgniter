<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();



if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';

}
/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get','post'],'register', 'Users::register');
$routes->match(['get','post'],'login', 'Users::login');
$routes->get('product/(:num)', 'Product::view/$1');
$routes->get('dashboard/(:num)', 'Dashboard::index/$1');
$routes->get('product/view/(:num)', 'Product::view/$1');
$routes->post('product/addToCart/(:num)', 'Product::addToCart/$1');
$routes->get('product/viewCart', 'Product::viewCart');
$routes->get('product/removeFromCart/(:num)', 'Product::removeFromCart/$1');
$routes->get('checkout', 'Product::checkout');
$routes->post('search/suggestions', 'Search::searchSuggestions');
$routes->get('verify-account/(:any)', 'Users::verifyAccount/$1');
$routes->get('reset-password-request', 'Users::resetPasswordRequest');  // For displaying the reset password request form
$routes->post('reset-password-request', 'Users::resetPasswordRequest');  // For handling the form submission
  // For displaying the reset password form with the token
$routes->post('update-password/(:segment)', 'Users::updatePassword/$1'); // For handling the password update
$routes->get('reset-password/(:any)', 'Users::resetPassword/$1');
$routes->get('logout', 'Users::logout');
// Define your route for register_success
$routes->get('register_success', 'Users::success');
$routes->get('reset-password-request-success', 'Users::resetPasswordRequestSuccess');
$routes->get('cart', 'CartController::viewCart');
$routes->get('cart/add/(:num)', 'CartController::addToCart/$1');
$routes->get('cart/remove/(:num)', 'CartController::removeFromCart/$1');

$routes->get('checkout', 'CheckoutController::index');
$routes->post('checkout/createSession', 'CheckoutController::createSession');
$routes->get('checkout/success', 'CheckoutController::success');
$routes->get('checkout/cancel', 'CheckoutController::cancel');




















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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
