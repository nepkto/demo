<?php

// Web Routes for Service Provider


Route::group(['namespace' => 'Auth\ServiceProvider'], function() {
	Route::get('login', 'LoginController@showLoginForm')->name('provider.form');
	Route::post('login', 'LoginController@login')->name('provider.login');
	Route::post('logout', 'LoginController@logout')->name('provider.logout');
	Route::get('register', 'RegisterController@showRegistrationForm');
	Route::post('register', 'RegisterController@register')->name('provider.register');
});

Route::group(
	[
		'namespace' => 'ServiceProviders', 
		'middleware'=> 'auth:service_provider'
	], function() {
		Route::get('home', 'HomeController@index')->name('provider.home');

		Route::get('{id}/me', 'ShowInfo')->name('provider.info');

		Route::patch('general-info/{serviceProvider}','GeneralInfoController@update')->name('provider.general-info.update');

		Route::get('profile', 'ProfileController@index')->name('provider.profile.index');
		Route::patch('profile/{serviceProvider}','ProfileController@update')->name('provider.profile.update');

		Route::get('{serviceProvider}/experience','ExperienceController@index')->name('provider.experience.index');
		Route::patch('{serviceProvider}/experience','ExperienceController@update')->name('provider.experience.update');

		Route::get('map','MapController@index')->name('provider.map');
		Route::patch('map/{serviceProvider}','MapController@update')->name('provider.map.update');

		Route::post('mark-all-as-read','MarkRequestedServiceController@store')->name('mark-all-read');

	}
);
Route::post('proposal/{id}','ProposalController@store')->name('proposal.store')->middleware('auth:service_provider');