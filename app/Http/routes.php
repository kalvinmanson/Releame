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




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ], function()
{
    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    Route::get('/', 'BookController@index');

	//for users
    Route::resource('books', 'BookController');
    //Route::resource('reviews', 'ReviewController');
    //Route::resource('users', 'UserController');
    // for logic
    //Route::resource('comments', 'CommentController');
    //Route::resource('scores', 'ScoreController');
    //Route::resource('paymments', 'PaymentsController');
    //Route::resource('categories', 'CategoryController');
});

Route::get('photos/{filename}', function ($filename)
{
    $path = storage_path() . '/app/' . $filename;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
