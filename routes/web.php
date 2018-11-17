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
    return redirect('/books');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/books', 'BooksController@index')->name('books');
    Route::post('/create-request', 'BookRequestController@create');

});

Route::group(
    [
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => ['auth', 'roles'],
        'roles' => ['admin', 'librarian']
    ],
    function () {
        Route::get('/', ['uses' => 'AdminController@index']);

        Route::get('readers', 'ReaderController@index' );
        Route::get('requests', 'BookRequestController@index' );
        Route::get('done/{id}', 'BookRequestController@done' );

        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');
        Route::resource('users', 'UsersController');
        Route::resource('pages', 'PagesController');
        Route::resource('activitylogs', 'ActivityLogsController')->only([
            'index', 'show', 'destroy'
        ]);
        Route::resource('settings', 'SettingsController');
        Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
        Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

        Route::resource('category', 'CategoryController');
        Route::resource('book', 'BookController');
    });

