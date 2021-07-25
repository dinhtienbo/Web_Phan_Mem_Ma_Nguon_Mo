<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
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
$routes->get('/', 'user\HomeController::index');
//Login
$routes->get('login', 'user\LoginController::login');

//404
$routes->get('error/404', function () {
	return view('user/404');
});
//Cart-Checkout
$routes->group('cart', function ($routes) {
	$routes->get('', 'user\CartController::cart');
	$routes->get('checkout', 'user\CheckoutController::checkout');
});

//Product
$routes->group('product', function ($routes) {
	$routes->get('', 'user\ProductController::product');
	$routes->group('product-detail', function ($routes) {
		$routes->get('', 'user\ProductDetailController::productdetail');
	});
});

//Admin
$routes->group('admin', function ($routes) {
	$routes->get('', 'admin\AdminHomeController::index');

	//Admin 
	$routes->group('List-Admin', function ($routes) {
		$routes->get('', 'admin\AdminController::index');
		$routes->post('Create', 'admin\AdminController::Create');
		$routes->get('Add', 'admin\AdminController::AddAdmin');
		$routes->get('Edit/(:num)', 'admin\AdminController::EditAdmin/$1');
		$routes->post('EditAdmin/(:num)', 'admin\AdminController::Edit/$1');
		$routes->get('Delete/(:num)', 'admin\AdminController::Delete/$1');
	});

	//Admin Category
	$routes->group('List-Category', function ($routes) {
		$routes->get('', 'admin\AdminCategoryController::index');
		$routes->post('Create', 'admin\AdminCategoryController::Create');
		$routes->get('Add', 'admin\AdminCategoryController::AddCategory');
		$routes->get('Edit/(:num)', 'admin\AdminCategoryController::EditCategory/$1');
		$routes->post('EditCategory/(:num)', 'admin\AdminCategoryController::Edit/$1');
		$routes->get('Delete/(:num)', 'admin\AdminCategoryController::Delete/$1');
	});

	//Admin order
	$routes->group('List-Order', function ($routes) {
		$routes->get('', 'admin\AdminOrderController::index');
	});

	//Admin Product
	$routes->group('List-Product', function ($routes) {
		$routes->get('', 'admin\AdminProductController::index');
		$routes->post('Create', 'admin\AdminProductController::Create');
		$routes->get('Add', 'admin\AdminProductController::AddProduct');
		$routes->get('Edit/(:num)', 'admin\AdminProductController::EditProduct/$1');
		$routes->post('EditProduct/(:num)', 'admin\AdminProductController::Edit/$1');
		$routes->get('Delete/(:num)', 'admin\AdminProductController::Delete/$1');
		//Search
		$routes->post('Search', 'admin\AdminProductController::Search');
	});

	//Admin slide
	$routes->group('List-Slide', function ($routes) {
		$routes->get('', 'admin\AdminSlideController::index');
	});

	//Admin transaction
	$routes->group('List-Transaction', function ($routes) {
		$routes->get('', 'admin\AdminTransactionController::index');
	});

	//Admin User
	$routes->group('List-User', function ($routes) {
		$routes->get('', 'admin\AdminUserController::index');
		$routes->get('Add', 'admin\AdminUserController::addUser');
		$routes->post('Create', 'admin\AdminUserController::createUser');
		$routes->get('Edit/(:num)', 'admin\AdminUserController::editUser/$1');
	});
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
