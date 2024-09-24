<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceSubMenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UdsnRegController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EstimateController;
use App\Http\Controllers\Admin\EstimateApprovelController;
use App\Http\Controllers\ManageGSTController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [ManageGSTController::class, 'index'])->name('gst.page');
Route::get('/gst/manage/{type}', [ManageGSTController::class, 'manage'])->name('gst.page.manage');
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('post-login', [LoginController::class, 'userLogin'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

	// AdminHomeController
	Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');

	// UserController
	Route::get('user', [UserController::class, 'index'])->name('admin.index');
	Route::post('/user/store', [UserController::class, 'store'])->name('admin.store');
	Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
	Route::put('/user/update/{id}', [UserController::class, 'update'])->name('admin.update');
	Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('admin.delete');

	// EstimateController
	Route::get('estimate', [EstimateController::class, 'index'])->name('admin.estimate');
	Route::get('estimate/create', [EstimateController::class, 'create'])->name('admin.estimate.create');
	Route::post('estimate/get-estimate-content', [EstimateController::class, 'getEstimateContent'])->name('admin.estimate.get.estimate.content');
	Route::post('estimate/store', [EstimateController::class, 'store'])->name('admin.estimate.store');
	Route::get('/estimate/edit/{id}', [EstimateController::class, 'edit'])->name('admin.estimate.edit');
	Route::get('/estimate/show/{id}', [EstimateController::class, 'show'])->name('admin.estimate.show');
	Route::put('/estimate/update/{id}', [EstimateController::class, 'update'])->name('admin.estimate.update');
	Route::delete('/estimate/delete/{id}', [EstimateController::class, 'delete'])->name('admin.estimate.delete');
	Route::get('/estimate/print/{id}/{type}', [EstimateController::class, 'generatePDF'])->name('admin.estimate.print');

	// EstimateApprovelController
	Route::get('approval/estimate', [EstimateApprovelController::class, 'index'])->name('admin.estimate.approval');
	Route::get('approval/estimate/show/{id}', [EstimateApprovelController::class, 'show'])->name('admin.approval.estimate.show');
	Route::get('approval/estimate/approve/{id}', [EstimateApprovelController::class, 'approve'])->name('admin.approval.estimate.approve');

	// ClientController
	Route::get('client', [ClientController::class, 'index'])->name('admin.client');
	Route::post('/client/store', [ClientController::class, 'store'])->name('admin.client.store');
	Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('admin.client.edit');
	Route::put('/client/update/{id}', [ClientController::class, 'update'])->name('admin.client.update');
	Route::delete('/client/delete/{id}', [ClientController::class, 'delete'])->name('admin.client.delete');

	// ServiceController
	Route::get('service', [ServiceController::class, 'index'])->name('admin.service');
	Route::post('/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
	Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
	Route::put('/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
	Route::delete('/service/delete/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');

	// ServiceSubMenuController
	Route::get('service/sub-menu/{id}', [ServiceSubMenuController::class, 'index'])->name('admin.service.sub.menu');
	Route::post('/service/sub-menu/store', [ServiceSubMenuController::class, 'store'])->name('admin.service.sub.menu.store');
	Route::get('/service/sub-menu/edit/{id}', [ServiceSubMenuController::class, 'edit'])->name('admin.service.sub.menu.edit');
	Route::put('/service/sub-menu/update/{id}', [ServiceSubMenuController::class, 'update'])->name('admin.service.sub.menu.update');
	Route::delete('/service/sub-menu/delete/{id}', [ServiceSubMenuController::class, 'delete'])->name('admin.service.sub.menu.delete');

	// CategoryController
	Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
	Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
	Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
	Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
	Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

	// UdsnRegController
	Route::get('udsn-reg', [UdsnRegController::class, 'index'])->name('admin.udsn.reg');
	Route::post('/udsn-reg/store', [UdsnRegController::class, 'store'])->name('admin.udsn.store');
	Route::get('/udsn-reg/edit/{id}', [UdsnRegController::class, 'edit'])->name('admin.udsn.edit');
	Route::put('/udsn-reg/update/{id}', [UdsnRegController::class, 'update'])->name('admin.udsn.update');
	Route::delete('/udsn-reg/delete/{id}', [UdsnRegController::class, 'delete'])->name('admin.udsn.delete');

});
