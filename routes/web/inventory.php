<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\AppointmentsController;

/*====================Ajax part start==============*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('get-stocks', [AjaxController::class, 'getStocks'])->name('ajax.stocks.get');
    Route::get('get-stock-details/{param}', [AjaxController::class, 'getStockDetails'])->name('ajax.stocks.details');
    Route::get('get-allocation-details/{param}', [AjaxController::class, 'getAllocationDetails'])->name('ajax.allocation.details');
    Route::get('allocation-receive/{param}', [AjaxController::class, 'depotStockAccept'])->name('ajax.allocation.receive');
    Route::get('get-allocations', [AjaxController::class, 'getAllocations'])->name('ajax.allocation.index');
    Route::get('get-depot-allocations/{stockId?}', [AjaxController::class, 'getDepotAllocations'])->name('ajax.depotAllocation.index');
    Route::get('get-items/{param}', [AjaxController::class, 'getItems'])->name('ajax.items.index');

    Route::get("stock-transfer-show/{stock_transfer_id}", [AjaxController::class, 'stockTransferShow'])->name('inventories.stockTransferShow');

    Route::get("stock-transfer-edit/{from_depot}/{transfer_id}", [AjaxController::class, 'stockTransferEdit'])->name('inventories.stockTransferEdit');
    
    Route::get("get-df-code-lists", [AjaxController::class, 'dfcodeLists'])->name('ajax.inventories.dfcodeLists');

    Route::get('get-items-for-prescription_history', [AjaxController::class, 'getPrescriptionHistory'])->name('ajax.items.prescriptionHistory');
});
/*====================Ajax part end==============*/

/*====================Permission part start==============*/
Route::group(['middleware' => ['auth', 'auth.access']], function () {
    
    /*============Employee start here========================*/
    
    Route::get('employee/view_employeeBaten/{param}', [EmployeesController::class, 'viewEmployee'])->name('employee.view_employeeBaten');

    Route::get('employees/download', [EmployeesController::class, 'download'])->name('employees.download');

    Route::get('employees/participantListdownload', [EmployeesController::class, 'participantListdownload'])->name('employees.participantListdownload');

    Route::get('employees/childparticipantListdownload', [EmployeesController::class, 'childparticipantListdownload'])->name('employees.childparticipantListdownload');

    Route::get('employees/familyDetailsdownload', [EmployeesController::class, 'familyDetailsdownload'])->name('employees.familyDetailsdownload');

    Route::get('employees/TotalparticipantList', [EmployeesController::class, 'totalparticipantlist'])->name('employees.totalparticipantlist');

    Route::any('employees/upload', [EmployeesController::class, 'uploadEmployee'])->name('employees.uploads');
    
    Route::any('employee/updateEmployee/{param}', [EmployeesController::class, 'updateEmployee'])->name('employees.updateEmployee');
    
    Route::any('employee/BmParticipation/{param}', [EmployeesController::class, 'BmParticipation'])->name('employees.BmParticipation');

    Route::match(['GET', 'POST'], 'update-bmparticipant-entry', [EmployeesController::class, 'updateBMparticipant'])->name('bmparticipant.updateBMparticipant');

    Route::get('employees/birthday', [EmployeesController::class, 'birthday'])->name('employees.birthday');

    Route::get('employees/marriageday', [EmployeesController::class, 'marriageday'])->name('employees.marriageday');

    Route::get('employee/view_employeeDowload/{param}', [EmployeesController::class, 'viewEmployeeDowload'])->name('employees.view_employeeDowload');
    
    Route::resource('employees', EmployeesController::class)->except(['show']);

    /*============Employee end here========================*/

    /*============Medical Services Start here========================*/
 
    Route::resource('medical_services', AppointmentsController::class)->except(['show']);

    Route::get('medical_services/prescription_Dowload/{param}', [AppointmentsController::class, 'prescriptionDownload'])->name('medical_services.prescriptionDownload');

    Route::get('prescription_history/{param?}', [AppointmentsController::class, 'PrescriptionHistory'])->name('medical_services.prescription_history');

    Route::any('medical_services/prescription/upload/{param}', [AppointmentsController::class, 'prescription_upload'])->name('medical_services.prescription_upload');

    Route::get('medical_services/{param?}', [AppointmentsController::class, 'report_save'])->name('medical_services.report_save');
    /*============Medical Services End here========================*/

});
/*====================Permission part end==============*/