<?php

Route::group(['prefix' => 'report', 'middleware' => ['auth']], function () {

    //Service Module Start
Route::any('prescription-history/{param?}', 'Report\ServiceReportsController@prescriptionHistory')->name('prescriptionreports.prescriptionHistory');

});
