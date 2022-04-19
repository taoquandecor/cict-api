<?php
use Illuminate\Support\Facades\Route;
Route::middleware(['verify.admin'])->prefix('api')->group(function () {
    Route::get('profile', 'LogonController@Profile');
    Route::put('profile/profile', 'LogonController@UpdateProfile');
    Route::put('profile/security', 'LogonController@UpdateSecurity');
    Route::put('profile/password', 'LogonController@ChangePassword');
    Route::get('refresh', 'LogonController@Refresh');
    Route::get('menu', 'LogonController@Menu');
});
