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

//Frontend Route
Route::get('/', 'homeController@index')->name('index_view');
Route::get('/home', 'homeController@home')->name('home_view'); 
Route::get('/footprint', 'homeController@footprint')->name('footprint');
Route::get('/musing', 'homeController@musing')->name('musing');
Route::get('/posts/{slug}', 'homeController@posts')->name('posts');
Route::get('/related/{slug}', 'homeController@related')->name('related');
   

//Post Route
Route::get('/cpanel/home', 'PostController@home')->name('home_view');
Route::get('cpanel/posts/show', 'PostController@show')->name('create_view');
Route::post('cpanel/posts/create', 'PostController@create')->name('create_post');
Route::get('cpanel/posts/edit/{id}', 'PostController@edit')->name('post.edit');
Route::PUT('cpanel/posts/update/{id}', 'PostController@update')->name('post.update');
Route::DELETE('cpanel/posts/destroy/{id}', 'PostController@destroy')->name('post.destroy');

//Categories
Route::get('/categories/show', 'CategoryController@show')->name('categories');
Route::get('/categories/create', 'CategoryController@create')->name('categories_create');
Route::post('/categories/store', 'CategoryController@store')->name('categories_store');
Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
Route::PUT('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
Route::DELETE('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');

//Add Admins
Route::get('/cpanel/show/admin', 'AdminController@index')->name('admin.index');
Route::get('/cpanel/create/admin', 'AdminController@create')->name('admin.create');
Route::post('/cpanel/store/admin', 'AdminController@store')->name('admin.store');
Route::get('/cpanel/edit/admin/{id}', 'AdminController@edit')->name('admin.edit');
Route::PUT('/cpanel/update/admin/{id}', 'AdminController@update')->name('admin.update');
Route::DELETE('/cpanel/update/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');

//Roles 
Route::get('roles/show', 'RoleController@show')->name('role.show');
Route::get('roles/create', 'RoleController@create')->name('role.create');
Route::post('roles/store', 'RoleController@store')->name('role.store');
Route::get('roles/edit/{id}', 'RoleController@edit')->name('role.edit');
Route::PUT('roles/update/{id}', 'RoleController@update')->name('role.update');
Route::DELETE('roles/destroy/{id}', 'RoleController@destroy')->name('role.destroy');

//Permissions
Route::get('permission/show', 'PermissionController@show')->name('permission.show');
Route::get('permission/create', 'PermissionController@create')->name('permission.create');
Route::post('permission/show', 'PermissionController@store')->name('permission.store');
Route::get('permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
Route::PUT('permission/update{id}', 'PermissionController@update')->name('permission.update');
Route::DELETE('permission/destroy{id}', 'PermissionController@destroy')->name('permission.destroy');

//Errors Handle 
Route::get('404', 'ErrorController@notFound')->name('404');
Route::get('403', 'ErrorController@unauthorized')->name('403');

//Email route
Route::get('/contact', 'homeController@contact')->name('contact');
Route::post('/contact', 'homeController@mail')->name('send.mail');

//Profile Route
Route::get('/cpanel/profile/{id}', 'ProfileController@index')->name('profile.index');
Route::put('/cpanel/profile/{id}', 'ProfileController@update')->name('profile.update');

//Login and Logout
Route::get('cpanel', 'Auth\LoginController@showLoginForm')->name('login.show');
Route::post('cpanel', 'Auth\LoginController@login')->name('cpanel-login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();


