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
    return redirect()->route('login');
});


Route::group(['middleware' => 'guest'], function () {


    Route::get('/signin', [
        'uses' => 'SessionController@create',
        'as' => 'login'
    ]);

    Route::post('/signin', [
        'uses' => 'SessionController@store',
        'as' => 'user.signin'
    ]);


});


Route::group(['middleware' => 'auth'], function () {


    Route::get('/logout', [
        'uses' => 'SessionController@destroy',
        'as' => 'user.logout'
    ]);

    Route::get('/admin', [
        'uses' => 'SessionController@index',
        'as' => 'user.admin'
    ]);



    Route::get('admin/users', [
        'uses' => 'UserController@index',
        'as' => 'admin.users'
    ]);

    Route::get('admin/users/{user_id}/edit', [
        'uses' => 'UserController@edit',
        'as' => 'admin.editUser'
    ]);

    Route::post('admin/users/{user_id}/edit', [
        'uses' => 'UserController@update',
        'as' => 'admin.postEditUser'
    ]);

    Route::get('admin/users/{user_id}/delete', [
        'uses' => 'UserController@destroy',
        'as' => 'admin.deleteUser'
    ]);

    Route::get('admin/users/add', [
        'uses' => 'UserController@create',
        'as' => 'admin.add_employee'
    ]);

    Route::post('admin/users/add', [
        'uses' => 'UserController@store',
        'as' => 'admin.post_add_employee'
    ]);



    Route::get('admin/locations', [
        'uses' => 'LocationController@index',
        'as' => 'admin.locations'
    ]);

    Route::get('admin/locations/{location_id}/edit', [
        'uses' => 'LocationController@edit',
        'as' => 'admin.editLocation'
    ]);

    Route::post('admin/locations/{location_id}/edit', [
        'uses' => 'LocationController@update',
        'as' => 'admin.postEditLocation'
    ]);

    Route::get('admin/locations/{location_id}/delete', [
        'uses' => 'LocationController@destroy',
        'as' => 'admin.deleteLocation'
    ]);

    Route::get('admin/locations/add', [
        'uses' => 'LocationController@create',
        'as' => 'admin.addLocation'
    ]);

    Route::post('admin/locations/add', [
        'uses' => 'LocationController@store',
        'as' => 'admin.postAddLocation'
    ]);



    Route::get('admin/permissions', [
        'uses' => 'PermissionController@index',
        'as' => 'admin.permissions'
    ]);

    Route::get('admin/permissions/{permission_id}/edit', [
        'uses' => 'PermissionController@edit',
        'as' => 'admin.editPermission'
    ]);

    Route::post('admin/permissions/{permission_id}/edit', [
        'uses' => 'PermissionController@update',
        'as' => 'admin.postEditPermission'
    ]);

    Route::get('admin/permissions/{permission_id}/delete', [
        'uses' => 'PermissionController@destroy',
        'as' => 'admin.deletePermission'
    ]);

    Route::get('admin/permissions/add', [
        'uses' => 'PermissionController@create',
        'as' => 'admin.addPermission'
    ]);

    Route::post('admin/permissions/add', [
        'uses' => 'PermissionController@store',
        'as' => 'admin.postAddPermission'
    ]);



    Route::get('admin/requests', [
        'uses' => 'RequestController@index',
        'as' => 'admin.requests'
    ]);

    Route::get('admin/requests/{id}/approval', [
        'uses' => 'RequestController@update',
        'as' => 'admin.request_approval'
    ]);

    Route::get('admin/requests/prepare', [
        'uses' => 'RequestController@prepare',
        'as' => 'admin.prepare_request'
    ]);

    Route::get('admin/requests/add', [
        'uses' => 'RequestController@create',
        'as' => 'admin.add_request'
    ]);

    Route::post('admin/requests/add', [
        'uses' => 'RequestController@store',
        'as' => 'admin.post_add_request'
    ]);

    Route::get('admin/user_requests', [
        'uses' => 'RequestController@show',
        'as' => 'admin.user_requests'
    ]);

    Route::get('admin/user_requests/{request_id}/delete', [
        'uses' => 'RequestController@destroy',
        'as' => 'admin.delete_user_request'
    ]);

    Route::get('admin/requests/search', [
        'uses' => 'RequestController@search',
        'as' => 'admin.request-search'
    ]);


});




