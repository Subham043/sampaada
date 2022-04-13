<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceSubCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index', 'as' => 'home.index'])->name('home');
Route::get('/category/{service_sub_category_id}', [HomeController::class, 'category', 'as' => 'home.category'])->name('category');
Route::get('/service-request/{id}', [HomeController::class, 'service', 'as' => 'home.service'])->name('product');
Route::get('/payment/{id}', [ServiceRequestController::class, 'payment', 'as' => 'home.payment'])->name('payment');
Route::post('/payment-ajax/{id}', [ServiceRequestController::class, 'payment_ajax', 'as' => 'home.payment_ajax'])->name('payment_ajax');
Route::post('/service-request', [ServiceRequestController::class, 'store_ajax', 'as' => 'home.service.store_ajax'])->name('product_store_ajax');
Route::post('/enquiry/create', [EnquiryController::class, 'create', 'as' => 'enquiry.create'])->name('enquiry_create');
Route::get('/404', [HomeController::class, 'pageNotFound', 'as' => 'home.pageNotFound'])->name('page_not_found');


Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index', 'as' => 'admin.login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate', 'as' => 'admin.login'])->name('login');
});

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index', 'as' => 'admin.dasboard'])->name('dashboard');
    Route::get('/user/change-password', [DashboardController::class, 'change_password', 'as' => 'admin.change_password'])->name('user_change_password');
    Route::post('/user/change-password', [DashboardController::class, 'update_password', 'as' => 'admin.change_password'])->name('user_update_password');
    Route::get('/testimonial/create', [TestimonialController::class, 'create', 'as' => 'admin.testimonial.create'])->name('testimonial_create');
    Route::post('/testimonial/create', [TestimonialController::class, 'store', 'as' => 'admin.testimonial.store'])->name('testimonial_create');
    Route::get('/testimonial/view', [TestimonialController::class, 'view', 'as' => 'admin.testimonial.create'])->name('testimonial_view');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit', 'as' => 'admin.testimonial.edit'])->name('testimonial_edit');
    Route::post('/testimonial/edit/{id}', [TestimonialController::class, 'update', 'as' => 'admin.testimonial.update'])->name('testimonial_edit');
    Route::get('/testimonial/delete/{id}', [TestimonialController::class, 'delete', 'as' => 'admin.testimonial.delete'])->name('testimonial_delete');
    Route::get('/enquiry', [EnquiryController::class, 'view', 'as' => 'admin.enquiry.view'])->name('enquiry_view');
    Route::get('/enquiry/view/{id}', [EnquiryController::class, 'view_id', 'as' => 'admin.enquiry.view_id'])->name('enquiry_view_id');
    Route::get('/enquiry/edit/{id}', [EnquiryController::class, 'edit', 'as' => 'admin.enquiry.edit'])->name('enquiry_edit');
    Route::post('/enquiry/edit/{id}', [EnquiryController::class, 'update', 'as' => 'admin.enquiry.update'])->name('enquiry_edit');
    Route::get('/enquiry/delete/{id}', [EnquiryController::class, 'delete', 'as' => 'admin.enquiry.delete'])->name('enquiry_delete');
    Route::get('/service-category/create', [ServiceCategoryController::class, 'create', 'as' => 'admin.service_category.create'])->name('service_category_create');
    Route::post('/service-category/create', [ServiceCategoryController::class, 'store', 'as' => 'admin.service_category.store'])->name('service_category_create');
    Route::get('/service-category/view', [ServiceCategoryController::class, 'view', 'as' => 'admin.service_category.create'])->name('service_category_view');
    Route::get('/service-category/edit/{id}', [ServiceCategoryController::class, 'edit', 'as' => 'admin.service_category.edit'])->name('service_category_edit');
    Route::post('/service-category/edit/{id}', [ServiceCategoryController::class, 'update', 'as' => 'admin.service_category.update'])->name('service_category_edit');
    Route::get('/service-category/delete/{id}', [ServiceCategoryController::class, 'delete', 'as' => 'admin.service_category.delete'])->name('service_category_delete');
    Route::get('/service-sub-category/create', [ServiceSubCategoryController::class, 'create', 'as' => 'admin.service_sub_category.create'])->name('service_sub_category_create');
    Route::post('/service-sub-category/create', [ServiceSubCategoryController::class, 'store', 'as' => 'admin.service_sub_category.store'])->name('service_sub_category_create');
    Route::get('/service-sub-category/view', [ServiceSubCategoryController::class, 'view', 'as' => 'admin.service_sub_category.create'])->name('service_sub_category_view');
    Route::get('/service-sub-category/ajax-view/{service_category_id}', [ServiceSubCategoryController::class, 'ajax_view', 'as' => 'admin.service_sub_category.ajax_view'])->name('service_sub_category_ajax_view');
    Route::get('/service-sub-category/edit/{id}', [ServiceSubCategoryController::class, 'edit', 'as' => 'admin.service_sub_category.edit'])->name('service_sub_category_edit');
    Route::post('/service-sub-category/edit/{id}', [ServiceSubCategoryController::class, 'update', 'as' => 'admin.service_sub_category.update'])->name('service_sub_category_edit');
    Route::get('/service-sub-category/delete/{id}', [ServiceSubCategoryController::class, 'delete', 'as' => 'admin.service_sub_category.delete'])->name('service_sub_category_delete');
    Route::get('/service/create', [ServiceController::class, 'create', 'as' => 'admin.service.create'])->name('service_create');
    Route::post('/service/store-ajax', [ServiceController::class, 'store_ajax', 'as' => 'admin.service.store_ajax'])->name('service_store_ajax');
    Route::get('/service/view', [ServiceController::class, 'view', 'as' => 'admin.service.create'])->name('service_view');
    Route::get('/service/preview/{id}', [ServiceController::class, 'preview', 'as' => 'admin.service.preview'])->name('service_preview');
    Route::get('/service/copy/{id}', [ServiceController::class, 'copy', 'as' => 'admin.service.copy'])->name('service_copy');
    Route::post('/service/copy-ajax/{id}', [ServiceController::class, 'copy_ajax', 'as' => 'admin.service.copy_ajax'])->name('service_copy_ajax');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit', 'as' => 'admin.service.edit'])->name('service_edit');
    Route::post('/service/update-ajax/{id}', [ServiceController::class, 'update_ajax', 'as' => 'admin.service.update_ajax'])->name('service_update_ajax');
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete', 'as' => 'admin.service.delete'])->name('service_delete');
    Route::get('/service/service-document/delete/{id}', [ServiceController::class, 'delete_document', 'as' => 'admin.service.delete_document'])->name('service_delete_document');
    Route::get('/service/service-faq/delete/{id}', [ServiceController::class, 'delete_faq', 'as' => 'admin.service.delete_faq'])->name('service_delete_faq');
    Route::get('/service-request/view', [ServiceRequestController::class, 'service_request_view', 'as' => 'admin.service_request.view'])->name('service_request_view');
    Route::get('/service-request/view/{id}', [ServiceRequestController::class, 'service_request_view_id', 'as' => 'admin.service_request.view_id'])->name('service_request_view_id');
    Route::get('/logout', [DashboardController::class, 'logout', 'as' => 'admin.logout'])->name('logout');
});
