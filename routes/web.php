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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');

    //products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index')->name('products.index');
        Route::get('/create', 'ProductController@create')->name('products.create');
        Route::post('/', 'ProductController@store');
        Route::get('/{product}/edit', 'ProductController@edit');
        Route::patch('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');

        //user
        // Route::get('/list', 'ProductController@indexuser')->name('products.index.list');
    });

    //Customers
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', 'CustomerController@index')->name('customers.index');
        Route::get('/create', 'CustomerController@create')->name('customers.create');
        Route::post('/', 'CustomerController@store');
        Route::get('/{customer}/edit', 'CustomerController@edit');
        Route::patch('/{customer}', 'CustomerController@update');
        Route::delete('/{customer}', 'CustomerController@destroy');
        Route::get('/{customer}/view', 'CustomerController@view')->name('customers.view');

        //user
        // Route::get('/list', 'CustomerController@indexlist')->name('customers.index.list');
    });

    //Invoice
    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', 'InvoiceController@index')->name('invoices.index');
        Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create');
        Route::post('/', 'InvoiceController@store')->name('invoices.store');
        Route::get('/{id}', 'InvoiceController@edit')->name('invoices.edit');
        //Route::get('/{id}', 'InvoiceController@editinv')->name('invoices.editinv');
        Route::put('/{id}', 'InvoiceController@update')->name('invoices.update');
        Route::delete('/{id}', 'InvoiceController@deleteProduct')->name('invoices.delete_product');
        Route::delete('/{id}/delete', 'InvoiceController@destroy')->name('invoices.destroy');
        Route::get('/{id}/print', 'InvoiceController@generateInvoice')->name('invoices.print');
        Route::get('/{id}/view', 'InvoiceController@viewprint')->name('invoices.view');
        Route::get('{id}/printinvoice', 'InvoiceController@printpdf')->name('invoices.printpdf');
    });
});
