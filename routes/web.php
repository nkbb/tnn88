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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/admin', 'AdminController@index')->name('admin.home');
    Route::get('/commission', 'AdminController@Commission')->name('admin.commission');
    Route::get('commission/create/{id}', 'AdminController@createCommission')->name('admin.commission.create');
    Route::get('commission/get', 'AdminController@getDetail');
    Route::post('commission/save', 'AdminController@saveDetail');
    

    Route::get('/member', 'AdminController@showMember')->name('admin.member');
    Route::get('/member/create', 'AdminController@createMember')->name('admin.member.create');
    Route::post('/member/create', 'AdminController@saveMember')->name('admin.member.store');
    Route::get('/member/edit/{id}', 'AdminController@editMember')->name('admin.member.edit');
    Route::put('/member/edit/{id}', 'AdminController@updateMember')->name('admin.member.update');

    Route::get('/user', 'AdminController@showUser')->name('admin.user');
    Route::get('/user/create', 'AdminController@createUser')->name('admin.user.create');
    Route::post('/user/create', 'AdminController@saveUser')->name('admin.uset.store');
    Route::get('/user/edit/{id}', 'AdminController@editUser')->name('admin.user.edit');
    Route::put('/user/edit/{id}', 'AdminController@updateUser')->name('admin.user.update');

    Route::get('home/commission', 'UserController@index')->name('user.commission');
    
});