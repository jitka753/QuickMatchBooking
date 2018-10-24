<?php
use App\Http\Middleware\CheckStatus;
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

Route::get('/', 'PagesController@index');


Auth::routes();

Route::get('/prnpriview', 'ListBookingsController@prnpriview');
Route::resource('/listbookings', 'ListOfBookingsController');
//Route::get('/mybooking', 'PagesController@mybooking');
Route::resource('/events', 'EventsController');
Route::post('/mybooking/book', 'BookingsController@updateBooking')->name('updatemybooking');

Route::get('/mybooking/unbook/{booking}', 'BookingsController@cancelBooking')->name('cancelbooking');
//Route::resource('/mybooking', 'BookingsController');
//Route::get('/mybooking', 'BookingsController@getTimeSlots($id_company)');
Route::group(['middleware' => CheckStatus::class], function(
    ){
        Route::resource('/admin', 'AdminController');
        Route::resource('/addcompany', 'CompanyAdminController');
        Route::resource('/addevent', 'EventAdminController');
        Route::resource('/companyevent', 'CompanyEventController');
        Route::get('/allstudents/{id_event}', 'AllStudentsController@index');
        Route::get('/allstudents/student_bookings/{id}/{id_event}', 'StudentBookingsController@index');
        Route::resource('/allcompanies', 'AllCompaniesController');
        Route::get('/companystudent/{id_event}', 'StudentCompanyAdminController@index');
        Route::get('/show_students/{id_company}/{id_event}', 'ShowStudentsController@index');
        Route::resource('/statistics', 'StatisticsController');

    });

