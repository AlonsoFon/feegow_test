<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScheduleController;

Route::controller(ScheduleController::class)->group(function () {

	Route::get('/', 'schedule')->name("schedule");
	
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
