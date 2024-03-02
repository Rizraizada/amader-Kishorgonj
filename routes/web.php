<?php

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

Route::get('/', 'HomeController@index');

Route::get('/doctor', 'DoctorController@index');
Route::get('/doctor/registration', 'DoctorController@registrationForm');
Route::post('/doctor/registration', 'DoctorController@registrationFormSubmit');
Route::get('/doctor/details/{id}', 'DoctorController@details');

Route::get('/barbar', 'BarbarController@index');
Route::get('/barbar/registration', 'BarbarController@registrationForm');
Route::post('/barbar/registration', 'BarbarController@registrationFormSubmit');
Route::get('/barbar/details/{id}', 'BarbarController@details');

Route::get('/beautician', 'BeauticianController@index');
Route::get('/beautician/registration', 'BeauticianController@registrationForm');
Route::post('/beautician/registration', 'BeauticianController@registrationFormSubmit');
Route::get('/beautician/details/{id}', 'BeauticianController@details');

Route::get('/lawyer', 'LawyerController@index');
Route::get('/lawyer/registration', 'LawyerController@registrationForm');
Route::post('/lawyer/registration', 'LawyerController@registrationFormSubmit');
Route::get('/lawyer/details/{id}', 'LawyerController@details');

Route::get('/electrician', 'ElectricianController@index');
Route::get('/electrician/registration', 'ElectricianController@registrationForm');
Route::post('/electrician/registration', 'ElectricianController@registrationFormSubmit');
Route::get('/electrician/details/{id}', 'ElectricianController@details');

Route::get('/rent_car', 'RentCarController@index');
Route::get('/rent_car/registration', 'RentCarController@registrationForm');
Route::post('/rent_car/registration', 'RentCarController@registrationFormSubmit');
Route::get('/rent_car/details/{id}', 'RentCarController@details');

Route::get('/districts/{id}', 'HomeController@district');
Route::get('/thanas/{id}', 'HomeController@thana');
Route::get('/unions/{id}', 'HomeController@union');

Route::get('/contact-us', 'HomeController@contactUs');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/command', 'HomeController@command');

Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
    Route::get('/login', 'UserLoginController@login')->name('userLogin');
    Route::post('/login', 'UserLoginController@postLogin')->name('userPostLogin');
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/logout', 'UserLoginController@logout')->name('userLogout');
            Route::get('dashboard', 'UserController@index')->name('userDashboard');
        });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', 'AdminLoginController@login')->name('adminLogin');
    Route::post('/login', 'AdminLoginController@postLogin')->name('adminPostLogin');



    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/logout', 'AdminLoginController@logout')->name('adminLogout');

        Route::get('/services', 'ServiceController@index')->name('adminDashboard');
        Route::get('/services/{name}', 'ServiceController@index')->name('adminServiceList');
        Route::get('/services/view/{name}/{id}', 'ServiceController@view')->name('adminServiceView');

        Route::get('/admin/service/search', 'ServiceController@search')->name('adminServiceSearch');


        Route::get('/services/edit/{name}/{id}', 'ServiceController@edit')->name('adminServiceEdit');
        Route::put('/services/edit/{name}/{id}', 'ServiceController@update')->name('adminServiceUpdate');
        Route::get('/services/delete/{name}/{id}', 'ServiceController@delete')->name('adminServiceDelete');

    });
});

