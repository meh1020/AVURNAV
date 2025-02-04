<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvurnavController;

Route::get('/', function () {
    return view('welcome');
});





Route::get('/avurnav/create', [AvurnavController::class, 'create']);
Route::post('/avurnav/store', [AvurnavController::class, 'store']);
