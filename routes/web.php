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

Route::get('/','BookingController@dashboard');

Route::get('/login',function(){
    return view('login.index');
});
Route::get('/logout','LoginController@logout');
Route::post('login','LoginController@login');

Route::group(['prefix' =>'laundry-type','middleware' =>'checkSession'], function () {
Route::get('/','LaundryTypeController@index');
Route::post('creates','LaundryTypeController@creates');
Route::get('list','LaundryTypeController@lists');
Route::get('edit/{id}','LaundryTypeController@edits');
Route::post('updates/{id}','LaundryTypeController@updates');
Route::get('deletes/{id}','LaundryTypeController@deletes');
Route::post('createBooking','LaundryTypeController@createBooking');
});

Route::group(['prefix' =>'dashboard','middleware' =>'checkSession'], function () {
    Route::get("/",'BookingController@dash');
    });

Route::group(['prefix' =>'booking'], function () {

Route::post('creates','BookingController@creates');
Route::get('trackorder','BookingController@trackorder');

});

Route::group(['prefix' =>'booking','middleware' =>'checkSession'], function () {
Route::get('/','BookingController@index');
Route::get('list','BookingController@lists');
Route::get('edit/{id}','BookingController@edits');
Route::post('updates/{id}','BookingController@updates');
Route::get('deletes/{id}','BookingController@deletes');
Route::get('changeStatus','BookingController@changeStatus');
Route::get('report','BookingController@report');
Route::get('report/getReport','BookingController@getreport');
});

Route::group(['prefix' =>'inventory','middleware' =>'checkSession'], function () {
Route::get('/','InventoryController@index');
Route::post('creates','InventoryController@creates');
Route::get('list','InventoryController@lists');
Route::get('edit/{id}','InventoryController@edits');
Route::post('updates/{id}','InventoryController@updates');
Route::get('deletes/{id}','InventoryController@deletes');
Route::post('createBooking','InvenoryController@createBooking');
});

Route::group(['prefix' =>'stock','middleware' =>'checkSession'], function () {
Route::get('/','StockController@index');
Route::post('creates','StockController@creates');
Route::get('list','StockController@lists');
Route::get('edit/{id}','StockController@edits');
Route::post('updates/{id}','StockController@updates');
Route::get('deletes/{id}','StockController@deletes');
Route::post('createBooking','StockController@createBooking');
});

Route::group(['prefix' =>'stock-report','middleware' =>'checkSession'], function () {
Route::get('/','ReportController@index');
Route::get('/getReport','ReportController@getReport');
});

Route::group(['prefix' =>'time_slot','middleware' =>'checkSession'], function () {
Route::get('/','TimeController@index');
Route::post('creates','TimeController@creates');
Route::get('list','TimeController@lists');
Route::get('edit/{id}','TimeController@edits');
Route::post('updates/{id}','TimeController@updates');
Route::get('deletes/{id}','TimeController@deletes');


});

Route::group(['prefix' =>'employee','middleware' =>'checkSession'], function () {
Route::get('/','EmployeeController@index');
Route::post('creates','EmployeeController@creates');
Route::get('list','EmployeeController@lists');
Route::get('edit/{id}','EmployeeController@edits');
Route::post('updates/{id}','EmployeeController@updates');
Route::get('deletes/{id}','EmployeeController@deletes');

});