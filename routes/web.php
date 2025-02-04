<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvurnavController;
use App\Http\Controllers\AvurnavExportController;


Route::get('/', function () {
    return view('welcome');
});





Route::get('/avurnav/create', [AvurnavController::class, 'create']);
Route::post('/avurnav/store', [AvurnavController::class, 'store']);

Route::post('/avurnav/export/{id}', [AvurnavExportController::class, 'exportPdf'])->name('avurnav.export');



Route::get('/avurnav/index', [AvurnavController::class, 'index']);
