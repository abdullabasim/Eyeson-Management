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

//Route::get('/', function () {
//    return view('eyeson.session.print_session');
//});
Route::get('/','MainController@clientAddPage');
Route::get('/clientAdd','MainController@clientAddPage');

Route::post('/clientAdd','MainController@clientAdd');

Route::get('/clientManage','MainController@clientManage');

Route::post('/clientEdit/{id}','MainController@clientEdit');

Route::get('/clientDelete/{id}','MainController@clientDelete');

Route::get('/serviceAdd','MainController@serviceAddPage');

Route::post('/serviceAdd','MainController@serviceAdd');

Route::get('/serviceManageStep1','MainController@serviceManageStep1');

Route::get('/serviceManageStep2','MainController@serviceManageStep2');

Route::post('/serviceEdit','MainController@serviceEdit');

Route::get('/serviceDelete/{id}','MainController@serviceDelete');

Route::get('/serviceGet','MainController@serviceGet');

Route::get('/priceGet','MainController@priceGet');

Route::get('/sessionAdd','MainController@sessionAddPage');

Route::post('/sessionAdd','MainController@sessionAdd');


Route::get('/invoiceManage','MainController@invoiceManage');

Route::get('/invoiceDetails/{id}','MainController@invoiceDetails');

Route::get('/sessionEdit/{id}','MainController@sessionEditPage');

Route::post('/sessionEdit','MainController@sessionEdit');

Route::get('/invoiceDelete/{id}','MainController@sessionDelete');

Route::get('/analysis','MainController@analysis');

Route::get('/analysisSearch','MainController@analysisSearch');

Route::get('/clientGet','MainController@clientGet');


Auth::routes();



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
