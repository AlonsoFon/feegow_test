<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ScheduleController;

Route::controller(ScheduleController::class)->group(function () {

	Route::get('/professional/list', 'professionalList')->name("professional.list");

	Route::post('/schedule/save', 'scheduleSave')->name("schedule.save");
});
