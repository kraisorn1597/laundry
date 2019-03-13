<?php
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function (){
    Route::get('/home', 'AdminController@index');
    Route::get('/editor', 'EditorController@index');
    Route::get('/register','Admin\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Admin\RegisterController@register');
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Admin\LoginController@login');
    Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('admin-password/reset','admin\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
    Route::get('admin-password/reset{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});