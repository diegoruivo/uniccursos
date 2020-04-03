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


Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    /** Home Page Site */
    Route::get('/', 'WebController@home')->name('home');
    Route::get('/cursos', 'WebController@courses')->name('courses');
    Route::get('/cursos/{uri}', 'WebController@course')->name('course');
    Route::get('/page', 'WebController@sobre')->name('page');
    Route::get('/page/{uri}', 'WebController@article')->name('article');
    Route::get('/contact', 'WebController@contact')->name('contact');

});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    /** Formulário de Login*/
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function () {

        /** Painel de Controle */
        Route::get('home', 'AuthController@home')->name('home');

        /** Usuários */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        /** Cursos */
        Route::resource('courses', 'CourseController');

        /** Páginas */
        Route::post('pages/image-set-cover', 'PageController@imageSetCover')->name('pages.imageSetCover');
        Route::delete('pages/image-remove', 'PageController@imageRemove')->name('pages.imageRemove');
        Route::resource('pages', 'PageController');

        /** Configurações */
        Route::resource('settings', 'SettingController');

    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');

});