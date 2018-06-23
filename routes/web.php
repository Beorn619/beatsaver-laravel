<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'BeatSaverController@viewNewest')->name('view.newest');

    Route::get('/login', 'BeatSaverController@viewLogin')->name('view.login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::get('/verify/{token}', 'Auth\RegisterController@verify');
    Route::get('/resend/{token}', 'Auth\RegisterController@resendVerify')->name('verify.resend');

    // Pages
    Route::get('/top-downloads', 'BeatSaverController@viewTopDownloads')->name('view.top-downloads');
    Route::get('/top-stars', 'BeatSaverController@viewTopStars')->name('view.top-stars');

    // Authenticated routes
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
});

//Route::get('/profile', 'UserController@profile')->name('profile');
//Route::get('/auth/forgotpw', 'UserController@forgotPw')->name('forgotpw.form');
//Route::post('/auth/forgotpw', 'UserController@forgotPwSubmit')->name('forgotpw.submit');

Route::get('/legal/dmca', 'LegalController@dmca')->name('legal.dmca');
Route::get('/legal/privacy', 'LegalController@privacy')->name('legal.privacy');

