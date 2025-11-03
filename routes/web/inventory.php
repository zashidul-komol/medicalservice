<?php
/*====================Ajax part start==============*/
Route::group(['middleware' => 'auth'], function () {
	Route::get('get-stocks', 'AjaxController@getStocks')->name('ajax.stocks.get');
	Route::get('get-stock-details/{param}', 'AjaxController@getStockDetails')->name('ajax.stocks.details');
	Route::get('get-allocation-details/{param}', 'AjaxController@getAllocationDetails')->name('ajax.allocation.details');
	Route::get('allocation-receive/{param}', 'AjaxController@depotStockAccept')->name('ajax.allocation.receive');
	Route::get('get-allocations', 'AjaxController@getAllocations')->name('ajax.allocation.index');
	Route::get('get-depot-allocations/{stockId?}', 'AjaxController@getDepotAllocations')->name('ajax.depotAllocation.index');
	Route::get('get-items/{param}', 'AjaxController@getItems')->name('ajax.items.index');

	Route::get("stock-transfer-show/{stock_transfer_id}", array(
		'uses' => 'AjaxController@stockTransferShow',
		'as' => 'inventories.stockTransferShow',
	));

	Route::get("stock-transfer-edit/{from_depot}/{transfer_id}", array(
		'uses' => 'AjaxController@stockTransferEdit',
		'as' => 'inventories.stockTransferEdit',
	));
	Route::get("get-df-code-lists", array(
		'uses' => 'AjaxController@dfcodeLists',
		'as' => 'ajax.inventories.dfcodeLists',
	));

	Route::get('get-items-for-prescription_history', 'AjaxController@getPrescriptionHistory')->name('ajax.items.prescriptionHistory');
});
/*====================Ajax part end==============*/

/*====================Permission part start==============*/
Route::group(['middleware' => ['auth', 'auth.access']], function () {
	
	/*============Employee start here========================*/
	
	Route::get('employee/view_employeeBaten/{param}', [
		'as' => 'employee.view_employeeBaten',
		'uses' => 'EmployeesController@viewEmployee',
	]);

	Route::get('employees/download', [
	    'as' => 'employees.download',
	    'uses' => 'EmployeesController@download',
	]);

	Route::get('employees/participantListdownload', [
	    'as' => 'employees.participantListdownload',
	    'uses' => 'EmployeesController@participantListdownload',
	]);

	Route::get('employees/childparticipantListdownload', [
	    'as' => 'employees.childparticipantListdownload',
	    'uses' => 'EmployeesController@childparticipantListdownload',
	]);

	Route::get('employees/familyDetailsdownload', [
	    'as' => 'employees.familyDetailsdownload',
	    'uses' => 'EmployeesController@familyDetailsdownload',
	]);

	Route::get('employees/TotalparticipantList', [
	    'as' => 'employees.totalparticipantlist',
	    'uses' => 'EmployeesController@totalparticipantlist',
	]);

	Route::any('employees/upload', [
	    'as' => 'employees.uploads',
	    'uses' => 'EmployeesController@uploadEmployee',
	]);
	Route::any('employee/updateEmployee/{param}', [
        'as' => 'employees.updateEmployee',
        'uses' => 'EmployeesController@updateEmployee',
    ]);
    Route::any('employee/BmParticipation/{param}', [
        'as' => 'employees.BmParticipation',
        'uses' => 'EmployeesController@BmParticipation',
    ]);

    Route::match(array('GET', 'POST'), 'update-bmparticipant-entry', [
        'as' => 'bmparticipant.updateBMparticipant',
        'uses' => 'EmployeesController@updateBMparticipant',
    ]);

    Route::get('employees/birthday', [
	    'as' => 'employees.birthday',
	    'uses' => 'EmployeesController@birthday',
	]);

	Route::get('employees/marriageday', [
	    'as' => 'employees.marriageday',
	    'uses' => 'EmployeesController@marriageday',
	]);

    Route::get('employee/view_employeeDowload/{param}', [
		'as' => 'employees.view_employeeDowload',
		'uses' => 'EmployeesController@viewEmployeeDowload',
	]);
    Route::resource('employees', 'EmployeesController',
        ['except' => ['show']]);

   
    

    /*============Employee end here========================*/


    /*============Medical Services Start here========================*/
 
    Route::resource('medical_services', 'AppointmentsController',
        ['except' => ['show']]);

    Route::get('medical_services/prescription_Dowload/{param}', [
        'as' => 'medical_services.prescriptionDownload',
        'uses' => 'AppointmentsController@prescriptionDownload',
    ]);

    Route::get('prescription_history/{param?}', [
        'as' => 'medical_services.prescription_history',
        'uses' => 'AppointmentsController@PrescriptionHistory',
    ]);

    Route::any('medical_services/prescription/upload/{param}', [
		'as' => 'medical_services.prescription_upload',
		'uses' => 'AppointmentsController@prescription_upload',
	]);

	Route::get('medical_services/{param?}', [
        'as' => 'medical_services.report_save',
        'uses' => 'AppointmentsController@report_save',
    ]);
    /*============Medical Services End here========================*/

});
/*====================Permission part end==============*/

?>