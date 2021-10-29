<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;
use App\Models\Admin;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

// Auth::routes(['verify' => true]);
// Route::get('/home', 'IndexController@index')->name('home')->middleware('verified');



Route::pattern('id', '([0-9]*)');
Route::pattern('slug', '(.*)');

// Route::get('login/{url?}', '/Auth/LoginController@showLoginForm');

// Client
Route::namespace('Client')->group(function () {
	Route::get('/', 'IndexController@index')->name('stock.index');
	Route::resource('info-user', 'UserController')->middleware('auth');
	Route::post('register-vips', 'UserController@registerVip')->name('register-vips')->middleware('auth');

	Route::get('marketdaily/{slug}-{id}.html', 'DetailPostController@marketDailyPostDetail')->name('client.marketdailyDetail');
	// Route::get('marketdaily/{id}-{slug}.html', 'DetailPostController@marketDailyPostDetail')->name('client.marketdailyDetail');
	Route::get('kien-thuc-chung/{slug}-{id}.html', 'DetailPostController@knowledgeDetail')->name('client.knowledgeDetail');
	Route::get('marketdaily/{url?}', 'MarketdailyController@index')->name('client.marketdaily.index');
	Route::get('bai-viet/{slug}-{id}.html', 'DetailPostController@detailAdvisoryInvest')->name('client.advisoryInvestDetail');
	Route::post('register-investment-consulting', 'DetailPostController@registerInvestmentConsulting')->name('client.register-investment-consulting');
	Route::post('register-investment-trust', 'DetailPostController@registerInvestmentTrust')->name('client.register-investment-trust');
	Route::post('register-open-account', 'DetailPostController@registerOpenAccount')->name('client.register-open-account');
	Route::get('kien-thuc-chung/{id?}', 'KnowledgeController@index')->name('client.knowledge.index');
	Route::get('khoa-hoc/{id?}', 'CourseController@index')->name('client.course.index');
	Route::get('usbStock', 'UsbStockController@index')->name('client.usbStock.index');
	Route::get('danh-gia', 'ReviewController@index')->name('client.review.index');
	Route::get('lien-he', 'ContactController@index')->name('client.contact.index');
	Route::post('send-contact', 'ContactController@contact')->name('client.contact.contact');
	Route::get('khoa-hoc/{slug}-{id}.html', 'DetailCourseController@courseDetail')->name('client.courseDetail');
	Route::post('registerCourse/{idCourse}', 'DetailCourseController@registerCourse')->name('client.registerCourse');

	Route::get('system', 'SystemController@index')->name('client.system.index');
	Route::get('system-search', 'SystemController@search')->name('client.system.search');
});


Auth::routes();

// Admin
Route::namespace('Admin')->group(function () {
	Route::get('admin', 'AdminController@getLogin')->name('admin.login');
	Route::post('admin', "AdminController@postLogin")->name('admin.login');

	Route::group(['prefix' => 'admin', 'middleware' => ['CheckAdmin']], function () {
		Route::get('logout', 'AdminController@logout')->name('admin.logout');
		Route::get('info-admin', 'AdminController@detail')->name('admin.profile');
		Route::get('dashboard', 'DashboardController@index');
		Route::resource('alpha-system', 'AlphaSystemController');
		Route::get('alpha-system-change-image', 'AlphaSystemController@changeImage')->name('admin.alpha-system-change-image');
		Route::get('alpha-system-delete', 'AlphaSystemController@delete')->name('admin.alpha-system-delete');
		Route::get('userManual', 'UserManualController@edit')->name('admin.user-manual.edit');
		Route::put('userManual/{id}', 'UserManualController@update')->name('admin.user-manual.update');
		Route::put('update-profile-admin/{id}', 'AdminController@updateProfileAdmin')->name('admin.updateProfileAdmin');
		Route::get('list-admin', 'AdminController@index')->name('admin.index')->middleware('CheckRole');
		Route::get('create-admin', 'AdminController@create')->name('admin.create')->middleware('CheckRole');
		Route::post('create-admin', 'AdminController@store')->name('admin.store')->middleware('CheckRole');

		Route::resource('categoryKnowledges', 'CategoryKnowledgeController');
		Route::resource('knowledges', 'KnowledgeController');
		Route::get('knowledgeActions', 'KnowledgeController@action')->name('knowledges.action');
		Route::get('knowledgeClearImage/{id}', 'KnowledgeController@clearImage')->name('knowledges.clearImage');
		Route::resource('category-daily-post', 'CategoryDailyPostController');
		Route::resource('dailyPosts', 'DailyPostController');
		Route::get('dailyPostActions', 'DailyPostController@action')->name('dailyPosts.action');
		Route::get('dailyPostClearImage/{id}', 'DailyPostController@clearImage')->name('dailyPosts.clearImage');
		Route::resource('recomments', 'RecommentController');
		Route::resource('portfolios', 'PortfoliosController');
		Route::get('userRegisterOpenAccount', 'UserController@getRegisterOpenAccount')->name('users.registerOpenAccount');
		Route::get('userRegisterOpenAccount/{id}/edit', 'UserController@editOpenAccount')->name('users.registerOpenAccount.edit');
		Route::get('userActionStatusOpenAccount', 'UserController@actionStatusOpenAccount')->name('users.actionStatusOpenAccount');

		// Check là Role Moderator thì đá ra dashboard
		Route::middleware('CheckRoleModerator')->group(function () {
			Route::get('adminActions', 'AdminController@action')->name('admin.action');
			Route::get('admin/{id}/edit', 'AdminController@edit')->name('admin.edit');
			Route::put('admin/{id}/update', 'AdminController@update')->name('admin.update');
			Route::resource('categoryCourses', 'CategoryCourseController');
			Route::resource('courses', 'CourseController');
			Route::get('courseActions', 'CourseController@action')->name('courses.action');
			Route::resource('carts', 'CartController');
			Route::get('userRegisterCourse', 'CartController@actionStatusRegisterCourse')->name('users.actionStatusRegisterCourse');
			Route::resource('banners', 'BannerController');
			Route::resource('infoStocks', 'InfoStockController');
			Route::resource('footers', 'FooterController');
			Route::resource('contacts', 'ContactController');
			Route::get('userRegisterContact', 'ContactController@actionStatusRegisterContact')->name('users.actionStatusRegisterContact');
			Route::resource('users', 'UserController');
			Route::get('userActions', 'UserController@action')->name('users.action');
			Route::get('userRegisterVip', 'UserController@getRegisterVip')->name('users.registerVip');
			Route::put('userRegisterOpenAccount/{id}/update', 'UserController@updateOpenAccount')->name('users.registerOpenAccount.update');
			Route::get('userRegisterConsulting', 'UserController@getRegisterConsulting')->name('users.registerConsulting');
			Route::get('userRegisterTrust', 'UserController@getRegisterTrust')->name('users.registerTrust');
			Route::get('userActionStatus', 'UserController@actionStatus')->name('users.actionStatus');
			Route::get('userActionStatusConsulting', 'UserController@actionStatusConsulting')->name('users.actionStatusConsulting');
			Route::get('userActionStatusTrust', 'UserController@actionStatusTrust')->name('users.actionStatusTrust');
			Route::resource('banner-ads', 'BannerAdsController');
			Route::resource('banner-knowledges', 'BannerKnowledgeController');
			Route::resource('banner-courses', 'BannerCourseController');
			Route::resource('banner-market-dailies', 'BannerMarketDailyController');
			// Route::resource('investment-tools', 'InvestmentToolController');
			Route::resource('post-advisory-invests', 'PostAdvisoryInvestsController');
		});
	});
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['CheckAdmin']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});
