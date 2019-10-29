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
    return view('cuenta/login');
})->name('login');

Route::get('/sign-in', function () {
    return view('cuenta/sign-in');
})->name('signIn');



#Accaunt
Route::post('/post/log-in', 'UserController@postLogin')
->name('postLogin');

Route::post('/post/sign-in', 'UserController@postSignIn')
->name('postSignIn');

Route::get('/get/logout', 'UserController@getLogOut')->name('logout');


#Dashboard
# Get / Principal routes

Route::get('panel', 'IndexController@index')
->name('index')
->middleware('auth');

Route::group(['prefix' => 'panel',  'middleware' => ['auth']], function () {

	Route::get('get/companys', 'CompanyController@index')
	->name('companys');
	
	Route::get('get/{id}/account', 'CompanyController@getAccount')
	->name('getAccount');

	Route::get('get/bills', 'BillController@index')
	->name('bills');

	Route::get('get/currencys', 'CurrencyController@index')
	->name('currencys');
	
	Route::get('get/reports', 'ReportController@index')
	->name('reports');
	
	
	#Posts, add or edit information
	
	Route::post('post/{id}/debit', 'DebitController@postDebit')
	->name('debit');
	
	Route::post('post/{id}/credit', 'CreditController@postCredit')
	->name('credit');
	
	Route::post('post/bills/new', 'BillController@postNew')
	->name('new-bill');
	
	Route::post('post/accounts/new', 'CompanyController@postNew')
	->name('new-account');
	
	Route::post('post/currency/{id}/edit', 'CurrencyController@postEdit')
	->name('edit-currency');
});

