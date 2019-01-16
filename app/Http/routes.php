<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UserController');

	// For Role
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	// For Articles
	Route::get('articles',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('articles/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	Route::post('articles/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	Route::get('articles/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	Route::get('articles/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	Route::patch('articles/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	Route::delete('articles/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);



	// For category
	Route::get('categories',['as'=>'categories.index','uses'=>'CategoriesController@index','middleware' => ['role:admin']]);
	Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoriesController@create','middleware' => ['role:admin']]);
	Route::post('categories/create',['as'=>'categories.store','uses'=>'CategoriesController@store','middleware' => ['role:admin']]);
	Route::get('categories/{id}',['as'=>'categories.show','uses'=>'CategoriesController@show','middleware' => ['role:admin']]);
	Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit','middleware' => ['role:admin']]);
	Route::patch('categories/{id}',['as'=>'categories.update','uses'=>'CategoriesController@update','middleware' => ['role:admin']]);
	Route::delete('categories/{id}',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy','middleware' => ['role:admin']]);
	Route::get('category/{id}',['as'=>'category.index','uses'=>'CategoryController@index']);
	
});
