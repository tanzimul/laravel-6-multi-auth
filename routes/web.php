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
    return view('welcome');
});

Auth::routes();
Route::get('/author', 'AuthorController@index')->name('author')->middleware('author');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin')->middleware('superadmin');
Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware(['superadmin', 'admin'])->group(function () {
//     // Route::get('/books', function () {
//     //     // Uses first & second Middleware
//     // });

//     // Route::get('user/profile', function () {
//     //     // Uses first & second Middleware
//     // });
//     Route::resource('books', 'BookController')->middleware('superadmin');
// });

Route::group(['prefix' => 'superadmin','middleware' => 'superadmin'], function () {
    Route::resource('books', 'BookController');
    Route::resource('users', 'UserController');
});
Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    Route::resource('books', 'BookController');
});

