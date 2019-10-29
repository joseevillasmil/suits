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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/qr', 'UserController@getQr');

Route::get('/sign-in', function () {
    return view('sign-in');
})->name('signIn');



#Accaunt
Route::post('/post/log-in', 'UserController@postLogin')
->name('postLogin');

Route::post('/post/sign-in', 'UserController@postSignIn')
->name('postSignIn');

Route::get('/get/logout', 'UserController@getLogOut')->name('logout');


#Dashboard
# Get / Principal routes

Route::get('/', 'IndexController@index')
->name('index')
->middleware('auth');

Route::group(['prefix' => 'cron'], function () {
	Route::get('emails/check', 'CronController@sendChecks');
});

Route::group(['prefix' => 'get',  'middleware' => ['auth']], function () {
	#Employees
	Route::get('employees', 'EmployeeController@index')->name('employees');
	Route::get('employees/table', 'EmployeeController@getEmployees')->name('employees-table');
	Route::get('employee/{id}/detail', 'EmployeeController@getEmployeeDetail')->name('employee-detail');
	Route::get('employee/{id}/history', 'CheckController@getHistory')->name('history');
	#company
	
	Route::get('places', 'PlaceController@index')->name('places');
	Route::get('places/{id}/get-qr', 'PlaceController@getQr')->name('get-qr');
	Route::get('places/{id}/place', 'PlaceController@getPlace')->name('get-place');
	Route::get('places/{id}/coord', 'PlaceController@getCoord')->name('get-coord');
	
	Route::get('checks/month-graph', 'CheckController@getChecksMonthGraph')->name('get-checks-month-graph');
});

Route::group(['prefix' => 'post',  'middleware' => ['auth']], function () {
	Route::post('places/{id}/qr-renew', 'PlaceController@postQrRenew')->name('qr-renew');
	Route::post('places/{id}/edit-place', 'PlaceController@postEditPlace')->name('edit-place');
	Route::post('places/new', 'PlaceController@postNewPlace')->name('new-place');
});

