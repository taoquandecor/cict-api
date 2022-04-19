<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['verify.admin'])->prefix('admin')->group(function () {
    Route::get('histories/{ids}', 'HistoryController@Index')->name('History.Index.read');
});
