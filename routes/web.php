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

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware('auth')->group(function () {
//     Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
//     Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');
//     Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

// });

Route::middleware('auth')
    ->group(function () {

        Route::resource('loans', 'LoansController', ['except' => 'show']);
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController',['except' => 'show']);
        Route::resource('permissions', 'PermissionsController',['only' => ['index','edit','update']]);

        Route::middleware('role:Admin')
            ->put('users/{user}/roles', 'UsersRolesController@update')
            ->name('users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', 'UsersPermissionsController@update')
            ->name('users.permissions.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/departments', 'UsersDepartmentsController@update')
            ->name('users.departments.update');

        Route::post('departments/store', 'DepartmentController@store')
            ->name('departments.store');

        Route::get('departments', 'DepartmentController@index')
            ->name('departments.index');

        Route::get('departments/create', 'DepartmentController@create')
            ->name('departments.create');

        Route::put('departments/{department}', 'DepartmentController@update')
            ->name('departments.update');

        Route::get('departments/{department}', 'DepartmentController@show')
            ->name('departments.show');

        Route::delete('departments/{department}', 'DepartmentController@destroy')
            ->name('departments.destroy');

        Route::get('departments/{department}/edit', 'DepartmentController@edit')
            ->name('departments.edit');

        Route::post('categories/store', 'CategoryController@store')
            ->name('categories.store');

        Route::get('categories', 'CategoryController@index')
            ->name('categories.index');

        Route::get('categories/create', 'CategoryController@create')
            ->name('categories.create');

        Route::put('categories/{category}', 'CategoryController@update')
            ->name('categories.update');

        Route::get('categories/{category}', 'CategoryController@show')
            ->name('categories.show');

        Route::delete('categories/{category}', 'CategoryController@destroy')
            ->name('categories.destroy');

        Route::get('categories/{category}/edit', 'CategoryController@edit')
            ->name('categories.edit');

        Route::post('posts/{post}/documents', 'DocumentsController@store')->name('posts.documents.store');
        Route::delete('documents/{document}', 'DocumentsController@destroy')->name('documents.destroy');

    });
