<?php

use App\Http\Controllers\WellController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('wells.index');
});

Route::resource('wells', WellController::class);