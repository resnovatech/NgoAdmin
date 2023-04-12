<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SystemInformationController;
use App\Http\Controllers\Backend\Auth\LoginController;
//use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\InvoicesettingController;
use App\Http\Controllers\Admin\CreditnotesController;
use App\Http\Controllers\Admin\EstimateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RequisitionController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PbannerController;
use App\Http\Controllers\Admin\MnotificationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CimageController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CivilController;
use App\Http\Controllers\Admin\NameCangeController;
use App\Http\Controllers\Admin\RenewController;
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


Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('country', [CountryController::class, 'index'])->name('admin.country');
    Route::post('country/store', [CountryController::class, 'store'])->name('admin.country.store');
    Route::post('country/update', [CountryController::class, 'update'])->name('admin.country.update');
    Route::delete('country/delete/{id}', [CountryController::class, 'delete'])->name('admin.country.delete');


    Route::get('civil_info', [CivilController::class, 'index'])->name('admin.civil_info');
    Route::post('civil_info/store', [CivilController::class, 'store'])->name('admin.civil_info.store');
    Route::post('civil_info/update', [CivilController::class, 'update'])->name('admin.civil_info.update');
    Route::delete('civil_info/delete/{id}', [CivilController::class, 'delete'])->name('admin.civil_info.delete');


    //register_list_view

    Route::post('/update_status_reg_form', [RegisterController::class, 'update_status_reg_form'])->name('update_status_reg_form');


    Route::get('/print_certificate_view', [RegisterController::class, 'print_certificate_view'])->name('print_certificate_view');


    Route::get('/form_one_pdf/{main_id}/{id}', [RegisterController::class, 'form_one_pdf'])->name('form_one_pdf');
    Route::get('/form_eight_pdf/{main_id}', [RegisterController::class, 'form_eight_pdf'])->name('form_eight_pdf');
    Route::get('/source_of_fund/{id}', [RegisterController::class, 'source_of_fund'])->name('source_of_fund');
    Route::get('/other_pdf_view/{id}', [RegisterController::class, 'other_pdf_view'])->name('other_pdf_view');

    Route::get('/ngo_member_doc__pdf_view/{id}', [RegisterController::class, 'ngo_member_doc__pdf_view'])->name('ngo_member_doc__pdf_view');
    Route::get('/ngo_doc__pdf_view/{id}', [RegisterController::class, 'ngo_doc__pdf_view'])->name('ngo_doc__pdf_view');
    Route::get('/renew_pdf_list/{main_id}/{id}', [RegisterController::class, 'renew_pdf_list'])->name('renew_pdf_list');




    Route::get('/new_name_change_list', [NameCangeController::class, 'new_name_change_list'])->name('new_name_change_list');
    Route::get('/revision_name_change_list', [NameCangeController::class, 'revision_name_change_list'])->name('revision_name_change_list');
    Route::get('/already_name_change_list', [NameCangeController::class, 'already_name_change_list'])->name('already_name_change_list');
    Route::get('/name_change_view/{id}', [NameCangeController::class, 'name_change_view'])->name('name_change_view');
    Route::post('/update_status_name_change_form', [NameCangeController::class, 'update_status_name_change_form'])->name('update_status_name_change_form');


    Route::get('/new_renew_list', [RenewController::class, 'new_renew_list'])->name('new_renew_list');
    Route::get('/revision_renew_list', [RenewController::class, 'revision_renew_list'])->name('revision_renew_list');
    Route::get('/already_renew_list', [RenewController::class, 'already_renew_list'])->name('already_renew_list');
    Route::get('/renew_view/{id}', [RenewController::class, 'renew_view'])->name('renew_view');
    Route::post('/update_status_renew_form', [RenewController::class, 'update_status_renew_form'])->name('update_status_renew_form');




    Route::get('/new_registration_list', [RegisterController::class, 'new_registration_list'])->name('new_registration_list');
    Route::get('/revision_registration_list', [RegisterController::class, 'revision_registration_list'])->name('revision_registration_list');
    Route::get('/already_registration_list', [RegisterController::class, 'already_registration_list'])->name('already_registration_list');
    Route::get('/registration_view/{id}', [RegisterController::class, 'registration_view'])->name('registration_view');
    //end register_list_view


    Route::get('/get_search_type', [ReportController::class, 'get_search_type'])->name('get_search_type');

    Route::get('/get_search_type_sell', [ReportController::class, 'get_search_type_sell'])->name('get_search_type_sell');



    Route::get('/get_search_type_client', [ReportController::class, 'get_search_type_client'])->name('get_search_type_client');


    Route::get('/report_product_monthly', [ReportController::class, 'report_product_monthly'])->name('report_product_monthly');
    Route::get('/report_product_yearly', [ReportController::class, 'report_product_yearly'])->name('report_product_yearly');
    Route::get('/report_product_datewise', [ReportController::class, 'report_product_datewise'])->name('report_product_datewise');



    Route::get('/report_product_monthly_sell', [ReportController::class, 'report_product_monthly_sell'])->name('report_product_monthly_sell');
    Route::get('/report_product_yearly_sell', [ReportController::class, 'report_product_yearly_sell'])->name('report_product_yearly_sell');
    Route::get('/report_product_datewise_sell', [ReportController::class, 'report_product_datewise_sell'])->name('report_product_datewise_sell');


    Route::get('/report_product_monthly_client', [ReportController::class, 'report_product_monthly_client'])->name('report_product_monthly_client');
    Route::get('/report_product_yearly_client', [ReportController::class, 'report_product_yearly_client'])->name('report_product_yearly_client');
    Route::get('/report_product_datewise_client', [ReportController::class, 'report_product_datewise_client'])->name('report_product_datewise_client');

    Route::get('/report_product', [ReportController::class, 'report_product'])->name('report_product');
    Route::get('/sell_report', [ReportController::class, 'sell_report'])->name('sell_report');
    Route::get('/client_report', [ReportController::class, 'client_report'])->name('client_report');




Route::get('search_food_item', [ProductController::class, 'search_food_item'])->name('search_food_item');
Route::get('product_list_ajax', [ProductController::class, 'product_list_ajax'])->name('product_list_ajax');
Route::get('product_information_create', [ProductController::class, 'create'])->name('admin.product_information.create');
Route::get('product_information_edit/{id}', [ProductController::class, 'edit'])->name('admin.product_information.edit');
Route::get('product_information_view/{id}', [ProductController::class, 'view'])->name('admin.product_information.view');
Route::get('product_information', [ProductController::class, 'index'])->name('admin.product_information');
Route::post('product_information/store', [ProductController::class, 'store'])->name('admin.product_information.store');
Route::post('product_information/update', [ProductController::class, 'update'])->name('admin.product_information.update');
Route::post('product_information/delete/{id}', [ProductController::class, 'delete'])->name('admin.product_information.delete');
//unit




    Route::get('system_information', [SystemInformationController::class, 'index'])->name('admin.system_information');
    Route::post('system_information/store', [SystemInformationController::class, 'store'])->name('admin.system_information.store');
    Route::post('system_information/update', [SystemInformationController::class, 'update'])->name('admin.system_information.update');
    Route::post('system_information/delete/{id}', [SystemInformationController::class, 'delete'])->name('admin.system_information.delete');

    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('admin.admins.update');
    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');



    Route::get('settings',[ProfileController::class, 'setting'])->name('admin.settings');
    Route::get('view_profile',[ProfileController::class, 'profile_view'])->name('admin.profile_view');







    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    Route::get('/recovery_password',[SessionController::class,'recovery_password'])->name('admin.recovery_password');

    Route::get('/logout_session',[SessionController::class,'logout_session'])->name('admin.logout_session');
    Route::get('/lock_screen/{email}',[SessionController::class,'lock_screen'])->name('admin.lock_screen');
    Route::post('/login_from_session',[SessionController::class,'login_from_session'])->name('admin.login_from_session');
    // Forget Password Routes

    Route::get('/check_mail_from_list',[ForgetPasswordController::class,'check_mail_from_list'])->name('check_mail_from_list');
    Route::post('/send_mail_get_from_list',[ForgetPasswordController::class,'send_mail_get_from_list'])->name('send_mail_get_from_list');
    Route::get('/password_reset_page/{id}',[ForgetPasswordController::class,'password_reset_page'])->name('password_reset_page');
    Route::get('/successfully_mail_send/{id}',[ForgetPasswordController::class,'successfully_mail_send'])->name('successfully_mail_send');

    Route::post('/password_change_confirmed',[ForgetPasswordController::class,'password_change_confirmed'])->name('password_change_confirmed');

    Route::get('/password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');

});
