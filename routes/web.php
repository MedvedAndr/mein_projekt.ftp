<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Main;

Route::controller(Main::class)->group(function() {
    Route::get('/', 'index')->name('index');
});
