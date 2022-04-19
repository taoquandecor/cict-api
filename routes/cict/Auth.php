<?php
use Illuminate\Support\Facades\Route;
Route::prefix('api')->group(function () {
    Route::post('login', 'LoginController@Login');
    Route::post('forgot', 'LoginController@Forgot');
});
