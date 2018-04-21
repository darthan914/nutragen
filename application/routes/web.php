<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\PageController@home')->name('index');
Route::get('/home', 'Frontend\PageController@home')->name('frontend.home');
Route::get('/about', 'Frontend\PageController@about')->name('frontend.about');
Route::get('/product', 'Frontend\PageController@product')->name('frontend.product');
Route::get('/distribution', 'Frontend\PageController@distribution')->name('frontend.distribution');
Route::get('/service', 'Frontend\PageController@service')->name('frontend.service');
Route::get('/news', 'Frontend\PageController@news')->name('frontend.news');
Route::get('/news/{slug}', 'Frontend\PageController@inNews')->name('frontend.in-news');
Route::get('/contact', 'Frontend\PageController@contact')->name('frontend.contact');
Route::post('/contact/send', 'Frontend\PageController@send')->name('frontend.contact.send');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Backend\AuthController@showLogin')->name('backend');
	Route::get('/login', 'Backend\AuthController@showLogin')->name('backend.showLogin');
	Route::post('/login', 'Backend\AuthController@login')->name('backend.login');
	Route::get('/logout', 'Backend\AuthController@logout')->name('backend.logout');
	Route::get('/register', 'Backend\AuthController@formRegister')->name('backend.register');
	Route::post('/register', 'Backend\AuthController@register')->name('backend.register.save');

	Route::get('/home', 'Backend\DashboardController@index')->name('backend.home');
	Route::get('/home/index', 'Backend\DashboardController@index')->name('backend.home.index');

	// Admin User
	Route::get('/user', 'Backend\UserController@index')->name('backend.user')->middleware('can:list-user');
	Route::get('/user/index', 'Backend\UserController@index')->name('backend.user.index')->middleware('can:list-user');
	Route::post('/user/datatables', 'Backend\UserController@datatables')->name('backend.user.datatables')->middleware('can:list-user');

	Route::get('/user/create', 'Backend\UserController@create')->name('backend.user.create')->middleware('can:create-user');
	Route::post('/user/store', 'Backend\UserController@store')->name('backend.user.store')->middleware('can:create-user');
	Route::get('/user/{id}/edit', 'Backend\UserController@edit')->name('backend.user.edit')->middleware('can:edit-user');
	Route::post('/user/{id}/update', 'Backend\UserController@update')->name('backend.user.update')->middleware('can:edit-user');
	Route::get('/user/{id}/access', 'Backend\UserController@access')->name('backend.user.access')->middleware('can:access-user');
	Route::post('/user/{id}/accessUpdate', 'Backend\UserController@accessUpdate')->name('backend.user.accessUpdate')->middleware('can:access-user');
	Route::post('/user/delete', 'Backend\UserController@delete')->name('backend.user.delete')->middleware('can:delete-user');
	Route::post('/user/action', 'Backend\UserController@action')->name('backend.user.action');
	Route::post('/user/active', 'Backend\UserController@active')->name('backend.user.active')->middleware('can:active-user');
	Route::post('/user/impersonate', 'Backend\UserController@impersonate')->name('backend.user.impersonate')->middleware('can:impersonate-user');
	Route::get('/user/leave', 'Backend\UserController@leave')->name('backend.user.leave');

	// Admin Role
	Route::get('/role', 'Backend\RoleController@index')->name('backend.role')->middleware('can:list-role');
	Route::get('/role/index', 'Backend\RoleController@index')->name('backend.role.index')->middleware('can:list-role');
	Route::post('/role/datatables', 'Backend\RoleController@datatables')->name('backend.role.datatables')->middleware('can:list-role');

	Route::get('/role/create', 'Backend\RoleController@create')->name('backend.role.create')->middleware('can:create-role');
	Route::post('/role/store', 'Backend\RoleController@store')->name('backend.role.store')->middleware('can:create-role');
	Route::get('/role/{id}/edit', 'Backend\RoleController@edit')->name('backend.role.edit')->middleware('can:edit-role');
	Route::post('/role/{id}/update', 'Backend\RoleController@update')->name('backend.role.update')->middleware('can:edit-role');
	Route::post('/role/delete', 'Backend\RoleController@delete')->name('backend.role.delete')->middleware('can:delete-role');
	Route::post('/role/action', 'Backend\RoleController@action')->name('backend.role.action');
	Route::post('/role/active', 'Backend\RoleController@active')->name('backend.role.active')->middleware('can:active-role');

	// Config
	Route::get('/config', 'Backend\ConfigController@index')->name('backend.config')->middleware('can:config');
	Route::post('/config/update', 'Backend\ConfigController@update')->name('backend.config.update')->middleware('can:config');

	// Admin Inbox
	Route::get('/inbox', 'Backend\InboxController@index')->name('backend.inbox')->middleware('can:list-inbox');
	Route::get('/inbox/index', 'Backend\InboxController@index')->name('backend.inbox.index')->middleware('can:list-inbox');
	Route::post('/inbox/datatables', 'Backend\InboxController@datatables')->name('backend.inbox.datatables')->middleware('can:list-inbox');

	Route::get('/inbox/{id}/view', 'Backend\InboxController@view')->name('backend.inbox.view')->middleware('can:view-inbox');

	Route::post('/inbox/delete', 'Backend\InboxController@delete')->name('backend.inbox.delete')->middleware('can:delete-inbox');
	Route::post('/inbox/read', 'Backend\InboxController@read')->name('backend.inbox.read')->middleware('can:read-inbox');
	Route::post('/inbox/action', 'Backend\InboxController@action')->name('backend.inbox.action');

	// Admin News
	Route::get('/news', 'Backend\NewsController@index')->name('backend.news')->middleware('can:list-news');
	Route::get('/news/index', 'Backend\NewsController@index')->name('backend.news.index')->middleware('can:list-news');
	Route::post('/news/datatables', 'Backend\NewsController@datatables')->name('backend.news.datatables')->middleware('can:list-news');

	Route::get('/news/create', 'Backend\NewsController@create')->name('backend.news.create')->middleware('can:create-news');
	Route::post('/news/store', 'Backend\NewsController@store')->name('backend.news.store')->middleware('can:create-news');
	Route::get('/news/{id}/edit', 'Backend\NewsController@edit')->name('backend.news.edit')->middleware('can:edit-news');
	Route::post('/news/{id}/update', 'Backend\NewsController@update')->name('backend.news.update')->middleware('can:edit-news');
	Route::post('/news/delete', 'Backend\NewsController@delete')->name('backend.news.delete')->middleware('can:delete-news');
	Route::post('/news/action', 'Backend\NewsController@action')->name('backend.news.action');
	Route::post('/news/publish', 'Backend\NewsController@publish')->name('backend.news.publish')->middleware('can:publish-news');

	// Admin Partner
	Route::get('/partner', 'Backend\PartnerController@index')->name('backend.partner')->middleware('can:list-partner');
	Route::get('/partner/index', 'Backend\PartnerController@index')->name('backend.partner.index')->middleware('can:list-partner');
	Route::post('/partner/datatables', 'Backend\PartnerController@datatables')->name('backend.partner.datatables')->middleware('can:list-partner');

	Route::get('/partner/create', 'Backend\PartnerController@create')->name('backend.partner.create')->middleware('can:create-partner');
	Route::post('/partner/store', 'Backend\PartnerController@store')->name('backend.partner.store')->middleware('can:create-partner');
	Route::get('/partner/{id}/edit', 'Backend\PartnerController@edit')->name('backend.partner.edit')->middleware('can:edit-partner');
	Route::post('/partner/{id}/update', 'Backend\PartnerController@update')->name('backend.partner.update')->middleware('can:edit-partner');
	Route::post('/partner/delete', 'Backend\PartnerController@delete')->name('backend.partner.delete')->middleware('can:delete-partner');
	Route::post('/partner/action', 'Backend\PartnerController@action')->name('backend.partner.action');
	Route::post('/partner/publish', 'Backend\PartnerController@publish')->name('backend.partner.publish')->middleware('can:publish-partner');

	// Admin Distribution
	Route::get('/distribution', 'Backend\DistributionController@index')->name('backend.distribution')->middleware('can:list-distribution');
	Route::get('/distribution/index', 'Backend\DistributionController@index')->name('backend.distribution.index')->middleware('can:list-distribution');
	Route::post('/distribution/datatables', 'Backend\DistributionController@datatables')->name('backend.distribution.datatables')->middleware('can:list-distribution');

	Route::get('/distribution/create', 'Backend\DistributionController@create')->name('backend.distribution.create')->middleware('can:create-distribution');
	Route::post('/distribution/store', 'Backend\DistributionController@store')->name('backend.distribution.store')->middleware('can:create-distribution');
	Route::get('/distribution/{id}/edit', 'Backend\DistributionController@edit')->name('backend.distribution.edit')->middleware('can:edit-distribution');
	Route::post('/distribution/{id}/update', 'Backend\DistributionController@update')->name('backend.distribution.update')->middleware('can:edit-distribution');
	Route::post('/distribution/delete', 'Backend\DistributionController@delete')->name('backend.distribution.delete')->middleware('can:delete-distribution');
	Route::post('/distribution/action', 'Backend\DistributionController@action')->name('backend.distribution.action');
	Route::post('/distribution/publish', 'Backend\DistributionController@publish')->name('backend.distribution.publish')->middleware('can:publish-distribution');

	// Admin License
	Route::get('/license', 'Backend\LicenseController@index')->name('backend.license')->middleware('can:list-license');
	Route::get('/license/index', 'Backend\LicenseController@index')->name('backend.license.index')->middleware('can:list-license');
	Route::post('/license/datatables', 'Backend\LicenseController@datatables')->name('backend.license.datatables')->middleware('can:list-license');

	Route::get('/license/create', 'Backend\LicenseController@create')->name('backend.license.create')->middleware('can:create-license');
	Route::post('/license/store', 'Backend\LicenseController@store')->name('backend.license.store')->middleware('can:create-license');
	Route::get('/license/{id}/edit', 'Backend\LicenseController@edit')->name('backend.license.edit')->middleware('can:edit-license');
	Route::post('/license/{id}/update', 'Backend\LicenseController@update')->name('backend.license.update')->middleware('can:edit-license');
	Route::post('/license/delete', 'Backend\LicenseController@delete')->name('backend.license.delete')->middleware('can:delete-license');
	Route::post('/license/action', 'Backend\LicenseController@action')->name('backend.license.action');
	Route::post('/license/publish', 'Backend\LicenseController@publish')->name('backend.license.publish')->middleware('can:publish-license');


	// Admin Product
	Route::get('/product', 'Backend\ProductController@index')->name('backend.product')->middleware('can:list-product');
	Route::get('/product/index', 'Backend\ProductController@index')->name('backend.product.index')->middleware('can:list-product');
	Route::post('/product/datatables', 'Backend\ProductController@datatables')->name('backend.product.datatables')->middleware('can:list-product');

	Route::get('/product/create', 'Backend\ProductController@create')->name('backend.product.create')->middleware('can:create-product');
	Route::post('/product/store', 'Backend\ProductController@store')->name('backend.product.store')->middleware('can:create-product');
	Route::get('/product/{id}/edit', 'Backend\ProductController@edit')->name('backend.product.edit')->middleware('can:edit-product');
	Route::post('/product/{id}/update', 'Backend\ProductController@update')->name('backend.product.update')->middleware('can:edit-product');
	Route::post('/product/delete', 'Backend\ProductController@delete')->name('backend.product.delete')->middleware('can:delete-product');
	Route::post('/product/action', 'Backend\ProductController@action')->name('backend.product.action');
	Route::post('/product/publish', 'Backend\ProductController@publish')->name('backend.product.publish')->middleware('can:publish-product');
});

