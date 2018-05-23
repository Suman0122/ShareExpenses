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

Route::get('/', function () {
    return view('login');
});
Route::get('/forget', function () {
   return view('forget');
});
Route::get('/logout', 'LoginController@logout');
//Route::get('/', 'LoginController@index');
Route::post('/login/verify', 'LoginController@verify');
Route::get('register', 'RegisterController@index');
Route::post('/register/adduser', 'RegisterController@adduser');
Route::get('/mainpage', 'RegisterController@mainpage');
Route::get('/addbill', function () {
   return view('addbill');
});
//Route::get('/mainpage', function () {
//   return view('mainpage');
//});
Route::get('/creategroup', function () {
   return view('creategroup');
});
Route::post('/addbill/insert', 'BillController@insert');
Route::get('viewbill', 'BillController@viewbill');
Route::get('/selectgroup', function () {
   return view('selectgroup');
});
Route::get('/finalreport', function () {
   return view('finalreport');
});
Route::get('/finalreport','GroupController@finalreport');

Route::get('/paidby', 'GroupController@paidby');

Route::get('/addpayment', 'GroupController@payment');
Route::get('selectgroup', 'GroupController@selectgroup');
Route::get('creategroup', 'GroupController@index');
Route::post('creategroup/addgroup', 'GroupController@addgroup');
Route::post('creategroup/addmember', 'GroupController@addmember');
Route::post('creategroup/updateamount/', 'GroupController@updateamount');
Route::get('/shareof', 'GroupController@shareof');
Route::post('creategroup/addpayment', 'GroupController@addpayment');



