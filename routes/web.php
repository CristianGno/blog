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

Route::get('/', 'PageController@home')->name('pages.home');
Route::get('about', 'PageController@about')->name('pages.about');
Route::get('archive', 'PageController@archive')->name('pages.archive');
Route::get('contact', 'PageController@contact')->name('pages.contact');


Route::get('/blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('/categorias/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

//rutas de administración 
Route::group(['prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => 'auth'], 
    function(){

    Route::get('/','AdminController@index')->name('admin.dashboard');

    Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
    Route::resource('users', 'UsersController', ['as' => 'admin']);

    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
    Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');

});




// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes... 
/*
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
*/
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


