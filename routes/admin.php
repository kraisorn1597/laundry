<?php
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function (){
    Route::get('/home', 'AdminController@index')->name('index');
//    Route::get('/create', 'AdminController@create')->name('create');
//    Route::post('/create', 'AdminController@store');
    Route::get('/register','Admin\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Admin\RegisterController@register');
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Admin\LoginController@login');
    Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('admin-password/reset','admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
    Route::get('admin-password/reset{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::group([
        'prefix' => 'users',
        'as' => 'users.',
    ], function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/create', 'UserController@store')->name('store');
        Route::get('/edit', 'UserController@edit')->name('edit');
        Route::post('/{admin}/update', 'UserController@update')->name('update');
    });

});



Route::group([
    'prefix' => 'editor',
    'as' => 'editor'
], function (){
    Route::get('/editor', 'EditorController@index')->name('index');
});
































//Route::group([
//    'prefix' => 'admin',
//    'as' => 'admin.',
//], function (){
//    Route::grop([
//        'prefix' => 'editor',
//        'as' => 'editor.',
//    ], function (){
//        Route::get('/', 'EditorController@index');
//    });
//});

