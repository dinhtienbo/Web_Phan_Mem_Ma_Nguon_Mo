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
$routes->group('/', ['filter' => 'userFilter'], function ($routes) {
	$routes->get('', 'user\HomeController::index');
	$routes->get('search', 'user\HomeController::search');

	//Login
	$routes->get('login', 'user\LoginController::login');
	$routes->get('logout', 'user\LoginController::logout');
	$routes->post('login', 'user\LoginController::checklogin');
	$routes->post('registration', 'user\LoginController::registration');

	//Cart-Checkout
	$routes->group('cart', function ($routes) {
		$routes->get('', 'user\CartController::cart');
		$routes->get('checkout', 'user\CheckoutController::checkout');
		$routes->get('add/(:num)', 'user\CartController::add/$1');
		$routes->get('remove/(:num)', 'user\CartController::remove/$1');
		$routes->post('upload', 'user\CartController::upload');
		$routes->get('minus/(:num)', 'user\CartController::minus/$1');
		$routes->post('thanhtoan', 'user\CheckoutController::thanhtoan');
	});

	//Product
	$routes->group('product', function ($routes) {
		$routes->get('', 'user\ProductController::product');
		$routes->get('category/(:any)', 'user\ProductController::listcategory/$1');
		$routes->get('product-detail/(:any)', 'user\ProductDetailController::productdetail/$1');
	});


	//Account
	$routes->group('account', function ($routes) {
		$routes->get('', 'user\AccountController::index');
		$routes->get('view/(:num)', 'user\AccountController::view/$1');
		$routes->post('edit', 'user\AccountController::edit');
		$routes->get('Confirm/(:num)', 'user\AccountController::Confirm/$1');
	});
});


//Admin
$routes->group('admin', ['filter' => 'adminFilter'], function ($routes) {
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
		$routes->post('Search', 'admin\AdminTransactionController::Search');
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
		$routes->get('Add', 'admin\AdminSlideController::Add');
		$routes->post('Create', 'admin\AdminSlideController::Create');
		$routes->get('Delete/(:num)', 'admin\AdminSlideController::Delete/$1');
	});

	//Admin transaction
	$routes->group('List-Transaction', function ($routes) {
		$routes->get('', 'admin\AdminTransactionController::index');
		$routes->get('View/(:num)', 'admin\AdminTransactionController::View/$1');
		$routes->get('Delete/(:num)', 'admin\AdminTransactionController::Delete/$1');
		$routes->get('Process1/(:num)', 'admin\AdminTransactionController::Process1/$1');
		$routes->get('Process2/(:num)', 'admin\AdminTransactionController::Process2/$1');
		$routes->post('Search', 'admin\AdminTransactionController::Search');
		
	});

	//Admin User
	$routes->group('List-User', function ($routes) {
		$routes->get('', 'admin\AdminUserController::index');
		$routes->post('Create', 'admin\AdminUserController::Create');
		$routes->get('Add', 'admin\AdminUserController::AddUser');
		$routes->get('Edit/(:num)', 'admin\AdminUserController::EditUser/$1');
		$routes->post('EditUser/(:num)', 'admin\AdminUserController::Edit/$1');
		$routes->get('Delete/(:num)', 'admin\AdminUserController::Delete/$1');
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
