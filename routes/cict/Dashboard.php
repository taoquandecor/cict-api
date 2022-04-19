<?php
use Illuminate\Support\Facades\Route;
Route::middleware(['verify.admin'])->prefix('api')->group(function () {
    Route::get('dashboard', 'DashboardController@Index');
});
