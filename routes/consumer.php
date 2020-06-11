<?php

// Web Routes for Servicke Consumer


Route::group(['namespace' => 'Auth\ServiceConsumer'], function() {
	Route::get('login', 'LoginController@showLoginForm')->name('consumer.form');
	Route::post('login', 'LoginController@login')->name('consumer.login');
	Route::post('logout', 'LoginController@logout')->name('consumer.logout');
	Route::get('register', 'RegisterController@showRegistrationForm');
	Route::post('register', 'RegisterController@register')->name('consumer.register');
});

Route::group(
	[
		'namespace' => 'ServiceConsumers', 
		'middleware'=> 'auth:service_consumer'
	], function() {
		Route::get('home', 'HomeController@index')->name('consumer.home');

		Route::get('me/{id}', 'ShowInfo')->name('consumer.info');

		Route::patch('general-info/{serviceConsumer}','GeneralInfoController@update')->name('consumer.general-info.update');

		Route::patch('profile/{serviceConsumer}','ProfileController@update')->name('consumer.profile.update');

		Route::get('profile', 'ProfileController@index')->name('consumer.profile.index');

		Route::resource('request-services','RequestServiceController')->only('index','store');

	}
);
Route::get('proposal/{proposal}', 'ProposalController@index')->name('proposal.index')->middleware('auth:service_consumer');
Route::patch('proposal/{proposal}','ProposalController@update')->name('proposal.update')->middleware('auth:service_consumer');