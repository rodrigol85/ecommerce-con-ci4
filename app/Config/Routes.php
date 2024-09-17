<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */




 //ADMIN registration and login
$routes->get('be/register', 'Admins::index');
$routes->get('be', 'LoginController::login');
$routes->post('be/register', 'Admins::create');
$routes->post('auth', 'LoginController::auth');
$routes->get('activate-user/(:any)', 'Admins::activateUser/$1');

//USERS registration and login
$routes->get('register', 'UsersController::register');
$routes->post('register', 'UsersController::create');
$routes->get('activateUser/(:any)', 'UsersController::activateUser/$1');
$routes->get('login', 'LoginController::loginUser');
$routes->post('auth-user', 'LoginController::authUser');
$routes->get('password-request', 'UsersController::linkRequestForm');
$routes->post('password-email-user', 'UsersController::sendResetLinkEmail');
$routes->get('password-reset/(:any)', 'UsersController::resetFormUser/$1');
$routes->post('password/reset/user', 'UsersController::resetPassword');

$routes->get('logout-user', 'UsersController::logout');

$routes->get('be/password-request', 'Admins::linkRequestForm');
$routes->post('password-email', 'Admins::sendResetLinkEmail');
$routes->get('password-reset-admin/(:any)', 'Admins::resetForm/$1');
$routes->post('password/reset', 'Admins::resetPassword');

$routes->get('logout', 'Home::logout');
$routes->get('/', 'Home::products');
$routes->get('about', 'Home::about');
$routes->get('product_detail_no/(:num)', 'ProductController::productDetailNoLogged/$1');
$routes->get('askForLogin', 'ProductController::askForLogIn');


$routes->group('/be', ['filter' => 'auth'], function ($routes) {

    $routes->get('home', 'Home::index'); 

    //Categories
    $routes->get('categories/categories_list', 'CategoryController::index'); 
    $routes->post('categories/categories_list', 'CategoryController::create'); 
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1'); 
    $routes->put('categories/edit_category/(:num)', 'CategoryController::update/$1'); 

    //products
    $routes->get('products/products_list', 'ProductController::index'); 
    $routes->get('products/create_product', 'ProductController::insert'); 
    $routes->post('products/create_product', 'ProductController::create'); 
    $routes->put('products/edit_product/(:any)', 'ProductController::update/$1'); 
    $routes->get('products/edit/(:num)', 'ProductController::edit/$1'); 
    $routes->delete('products/(:any)', 'ProductController::delete/$1'); 

    //Users

    $routes->get('users/users_list', 'UsersController::index');
    $routes->get('users/edit/(:any)', 'UsersController::edit/$1'); 
    $routes->put('users/edit_user/(:any)', 'UsersController::update/$1');  
    $routes->delete('users/(:any)', 'UsersController::delete/$1'); 
    
    //Orders
    $routes->get('orders/all_orders', 'OrdersController::index');
    $routes->get('orders/edit/(:num)', 'OrdersController::edit/$1');
    $routes->put('orders/edit_order/(:num)', 'OrdersController::update/$1');
    $routes->get('orders/order_detail/(:num)', 'OrdersController::detail/$1');

    $routes->get('orders/pending_orders', 'OrdersController::pendingOrders');
});

$routes->group('/userLogged', ['filter' => 'authUser'], function ($routes) {

    $routes->get('profile', 'UsersController::home'); 
    $routes->get('contacts', 'UsersController::contacts'); 
    $routes->get('orders', 'UsersController::orders'); 
    $routes->get('products', 'ProductController::products'); 
    $routes->get('product_detail', 'ProductController::products'); 
    $routes->get('product_detail/(:num)', 'ProductController::productDetail/$1'); 
    $routes->get('chart', 'ChartController::index'); 
    $routes->get('chart/(:num)', 'ChartController::buy/$1'); 
    $routes->get('remove/(:num)', 'ChartController::remove/$1'); 
    $routes->get('removeChart', 'ChartController::removeChart'); 
    $routes->get('payment', 'ChartController::payment'); 


});



