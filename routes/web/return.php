<?php
/*====================Ajax part start==============*/
Route::group(['middleware' => 'auth'], function () {
	Route::get("distributor/{distributor_id}/shops/{from_shop_id}", array(
		'uses' => 'AjaxController@getDistributorShops',
		'as' => 'ajax.getDistributorShops',
	));
});
/*====================Ajax part end==============*/

/*====================Permission part start==============*/
Route::group(['middleware' => ['auth', 'auth.access']], function () {
	
});
/*====================Permission part end==============*/

?>