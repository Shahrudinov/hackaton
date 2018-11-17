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
    Route::post('/create-request', 'BookRequestController@create');

    Route::get('/books', 'BooksController@index')->name('userBooks.index');
    Route::get('/books/{book}', 'BooksController@show')->name('userBooks.show')
        ->where(['book' => '[0-9]+']);

    Route::post('/books/{book}', 'BooksController@store')
        ->name('userBooks.store')
        ->where(['id' => '[0-9]+']);

    Route::delete('/books/{book}', 'BooksController@destroy')
        ->name('userBooks.destroy')
        ->where(['id' => '[0-9]+']);

    Route::get('/author/{author}', 'AuthorController@show')
        ->name('author.show')->where(['author' => '[0-9]+']);
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

        Route::get('readers', 'ReaderController@index');
        Route::post('readers', 'ReaderController@returnBook')->name('reader.return-book');
        Route::get('readers/{id}', 'ReaderController@returnAll')->name('reader.return-all');
        Route::get('requests', 'BookRequestController@index');
        Route::get('requests-done/{id}', 'BookRequestController@done')->name('request-book.done');
        Route::get('requests-cancel/{id}', 'BookRequestController@cancel')->name('request-book.cancel');

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

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProfileController@show')->name('profile.show');
});
