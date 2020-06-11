<?php


Route::group(['namespace' => 'Auth\Admin'], function() {
	Route::get('login', 'LoginController@showLoginForm')->name('admin.form');
	Route::post('login', 'LoginController@login')->name('admin.login');
	Route::post('logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(
	[
		'namespace' => 'Admins', 
		'middleware'=> 'auth:admin'
	], function() {
		Route::get('home', 'HomeController@index')->name('admin.home');
		Route::get('providers','ProviderController@index')->name('admin.providers');
		Route::get('consumers','ConsumerController@index')->name('admin.consumers');
		Route::get('requested-services','RequestedServiceController@index')->name('admin.requested-services');
	}
);