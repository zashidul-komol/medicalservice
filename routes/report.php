<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Report\ServiceReportsController;

Route::group(['prefix' => 'report', 'middleware' => ['auth']], function () {

    //Service Module Start
    Route::any('prescription-history/{param?}', [ServiceReportsController::class, 'prescriptionHistory'])->name('prescriptionreports.prescriptionHistory');

});