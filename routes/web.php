<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('home')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/enquiry', 'HomeController@enquiry')->name('enquiry');
    Route::get('/enquiry', 'HomeController@showall')->name('schedules.all');

    Route::get('/upload-file', 'FileUpload@createForm');
    Route::post('/upload-filez', 'FileUpload@fileUpload')->name('fileUpload');
    Route::get('/uploadfile','UploadFileController@index');
    Route::post('/uploadfile','UploadFileController@showUploadFile');
    Route::get('/booking/{booking_id}/downloadpdf', 'BookingController@downloadpdf');
    Route::get('/booking/{booking_id}/viewpdf', 'BookingController@viewpdf');

    Route::get('/booking', 'BookingController@index')->name('booking.index');
    Route::get('/booking/{schedule_id}', 'BookingController@create')->name('ticket.booking');
    Route::post('/booking/{schedule_id}', 'BookingController@store')->name('ticket.booking.submit');
    Route::get('/booking/{booking_id}/edit', 'BookingController@edit')->name('booking.edit');
    Route::post('/booking/{booking_id}/update', 'BookingController@update')->name('booking.update');
    Route::get('/booking/{booking_id}/delete', 'BookingController@destroy')->name('booking.delete');


    Route::get('booking/success/{booking_id}', 'BookingController@success')->name('success');
    Route::get('booking/failed/{booking_id}', 'BookingController@failure')->name('failure');

});

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/booking', 'AdminController@indexbus')->name('admin.indexbus');
    Route::get('/booking/{booking_id}/sendmail', 'AdminController@sendmail');
    Route::get('/pesanan', 'OrderController@index')->name('admin.pesanan');
    Route::get('/pesanan/downloadpdf', 'OrderController@downloadpdf');
    Route::post('/tanggal', 'AdminController@caritanggal');
    Route::post('/rute', 'AdminController@rute');
    Route::post('/institusi', 'AdminController@institusiperkota');
    



    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Station Route
    Route::Resource('station', 'StationController');
    Route::Resource('pesanan', 'OrderController');
    // Bus Route
    Route::Resource('bus', 'BusController');
    // Route BusSchedule
    Route::Resource('bus-schedule', 'BusScheduleController');
    // Route::get('/showRegion', ['as'=>'showRegion', 'uses'=>'BusScheduleController@showRegion']);
    // Route::get('/showOperator', ['as'=>'showOperator', 'uses'=>'BusScheduleController@showOperator']);

    // Password REset RoutEs  
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{{ token }}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});
Route::prefix('manager')->group(function(){
    Route::get('/login', 'Auth\ManagerLoginController@showLoginForm')->name('manager.login');
    Route::post('/login', 'Auth\ManagerLoginController@login')->name('manager.login.submit');
    Route::get('/', 'ManagerController@index')->name('manager.dashboard');
    Route::get('/logout', 'Auth\ManagerLoginController@logout')->name('manager.logout');
    Route::post('/tanggal', 'ManagerController@caritanggalmg');
    Route::post('/rute', 'ManagerController@rute');
    Route::post('/institusi', 'ManagerController@institusiperkota');

    Route::get('/register', 'Auth\ManagerRegisterController@showRegistrationForm')->name('manager.register');
    Route::post('/register', 'Auth\ManagerRegisterController@register')->name('manager.register.submit');

    // Station Route
    Route::Resource('stationmg', 'StationmgController');
    // Bus Route
    Route::Resource('busmg', 'BusmgController');
    // Route BusSchedule
    Route::Resource('bus-schedulemg', 'BusSchedulemgController');
    // Route::get('/showRegion', ['as'=>'showRegion', 'uses'=>'BusScheduleController@showRegion']);
    // Route::get('/showOperator', ['as'=>'showOperator', 'uses'=>'BusScheduleController@showOperator']);

    // Password REset RoutEs  
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{{ token }}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});