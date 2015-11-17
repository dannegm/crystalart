<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
App
/**/

// Home
Route::get('/', array('as' => 'app.index', 'uses' => 'AppController@index'));

/*
Public
/**/
Route::get('home', array('as' => 'page.home', 'uses' => 'IndexController@index'));
Route::get('schedule', array('as' => 'page.schedule', 'uses' => 'IndexController@schedule'));
Route::get('showrooms', array('as' => 'page.showrooms', 'uses' => 'IndexController@showrooms'));
Route::get('page/{uid}', array('as' => 'page.page', 'uses' => 'IndexController@page'));

// Errors
Route::get('soon', array('as' => 'app.soon', 'uses' => 'AppController@soon'));
Route::get('maintenance', array('as' => 'app.maintenance', 'uses' => 'AppController@maintenance'));
Route::get('404', array('as' => 'app.e404', 'uses' => 'AppController@e404'));
Route::get('500', array('as' => 'app.e500', 'uses' => 'AppController@e500'));

// Email
Route::post('app/email/contact', array('as' => 'app.email.contact', 'uses' => 'EmailController@contact'));

// Appanel
Route::get('appanel', array('as' => 'appanel', 'uses'=>'AppController@checklogin'));
Route::post('appanel/dologin', 'AppController@login');
Route::group(array('before' => 'auth', 'prefix' => 'appanel'), function() {
	// App
	Route::get('logout', array('as' => 'logout', 'uses' => 'AppController@logout'));
	Route::get('index', array('as' => 'index', 'uses' => 'AppController@home'));

	// Settings
	Route::get('settings', array('as' => 'appanel.settings.index', 'uses' => 'SettingsController@index'));
	Route::post('settings/page/title', array('as' => 'appanel.settings.page.title', 'uses' => 'SettingsController@putPageTitle'));
	Route::post('settings/page/status', array('as' => 'appanel.settings.page.status', 'uses' => 'SettingsController@putPageStatus'));
	Route::post('settings/social/data', array('as' => 'appanel.settings.social.data', 'uses' => 'SettingsController@putSocialData'));
	Route::post('settings/contact/data', array('as' => 'appanel.settings.contact.data', 'uses' => 'SettingsController@putContactData'));
	Route::post('settings/third/data', array('as' => 'appanel.settings.third.data', 'uses' => 'SettingsController@putThirdData'));
	Route::post('settings/pages/content', array('as' => 'appanel.settings.pages.content', 'uses' => 'SettingsController@putPagesContent'));

	// Users
	Route::get('user', array('as' => 'appanel.user.index', 'uses' => 'UserController@index'));
	Route::get('user/create', array('as' => 'appanel.user.create', 'uses' => 'UserController@create'));
	Route::post('user/store', array('as' => 'appanel.user.store', 'uses' => 'UserController@store'));
	Route::get('user/{id}/edit', array('as' => 'appanel.user.edit', 'uses' => 'UserController@edit'));
	Route::put('user/{id}/update', array('as' => 'appanel.user.update', 'uses' => 'UserController@update'));
	Route::get('user/{id}/destroy', array('as' => 'appanel.user.destroy', 'uses' => 'UserController@destroy'));

	// Pages
	Route::get('pages', array('as' => 'appanel.pages.index', 'uses' => 'PageController@index'));
	Route::get('pages/create', array('as' => 'appanel.pages.create', 'uses' => 'PageController@create'));
	Route::post('pages/store', array('as' => 'appanel.pages.store', 'uses' => 'PageController@store'));
	Route::get('pages/{id}/preview', array('as' => 'appanel.pages.preview', 'uses' => 'PageController@preview'));
	Route::get('pages/{id}/edit', array('as' => 'appanel.pages.edit', 'uses' => 'PageController@edit'));
	Route::put('pages/{id}/update', array('as' => 'appanel.pages.update', 'uses' => 'PageController@update'));
	Route::get('pages/{id}/destroy', array('as' => 'appanel.pages.destroy', 'uses' => 'PageController@destroy'));

	// Notes
	Route::get('notes', array('as' => 'appanel.notes.index', 'uses' => 'NoteController@index'));
	Route::get('notes/create', array('as' => 'appanel.notes.create', 'uses' => 'NoteController@create'));
	Route::post('notes/store', array('as' => 'appanel.notes.store', 'uses' => 'NoteController@store'));
	Route::get('notes/{id}/view', array('as' => 'appanel.notes.view', 'uses' => 'NoteController@view'));
	Route::get('notes/{id}/edit', array('as' => 'appanel.notes.edit', 'uses' => 'NoteController@edit'));
	Route::put('notes/{id}/update', array('as' => 'appanel.notes.update', 'uses' => 'NoteController@update'));
	Route::get('notes/{id}/destroy', array('as' => 'appanel.notes.destroy', 'uses' => 'NoteController@destroy'));
	Route::get('notes/{id}/mark', array('as' => 'appanel.notes.mark', 'uses' => 'NoteController@mark'));
	Route::get('notes/{id}/umark', array('as' => 'appanel.notes.umark', 'uses' => 'NoteController@umark'));

	// Schedules
	Route::get('schedules', array('as' => 'appanel.schedules.index', 'uses' => 'ScheduleController@index'));
	Route::get('schedules/create', array('as' => 'appanel.schedules.create', 'uses' => 'ScheduleController@create'));
	Route::post('schedules/store', array('as' => 'appanel.schedules.store', 'uses' => 'ScheduleController@store'));
	Route::get('schedules/{id}/view', array('as' => 'appanel.schedules.view', 'uses' => 'ScheduleController@view'));
	Route::get('schedules/{id}/edit', array('as' => 'appanel.schedules.edit', 'uses' => 'ScheduleController@edit'));
	Route::put('schedules/{id}/update', array('as' => 'appanel.schedules.update', 'uses' => 'ScheduleController@update'));
	Route::get('schedules/{id}/destroy', array('as' => 'appanel.schedules.destroy', 'uses' => 'ScheduleController@destroy'));

	// Showrooms
	Route::get('showrooms', array('as' => 'appanel.showrooms.index', 'uses' => 'ShowroomController@index'));
	Route::get('showrooms/create', array('as' => 'appanel.showrooms.create', 'uses' => 'ShowroomController@create'));
	Route::post('showrooms/store', array('as' => 'appanel.showrooms.store', 'uses' => 'ShowroomController@store'));
	Route::get('showrooms/{id}/view', array('as' => 'appanel.showrooms.view', 'uses' => 'ShowroomController@view'));
	Route::get('showrooms/{id}/edit', array('as' => 'appanel.showrooms.edit', 'uses' => 'ShowroomController@edit'));
	Route::put('showrooms/{id}/update', array('as' => 'appanel.showrooms.update', 'uses' => 'ShowroomController@update'));
	Route::get('showrooms/{id}/destroy', array('as' => 'appanel.showrooms.destroy', 'uses' => 'ShowroomController@destroy'));

	// Fragments
	Route::get('fragments', array('as' => 'appanel.fragments.index', 'uses' => 'FragmentController@index'));
	Route::get('fragments/create', array('as' => 'appanel.fragments.create', 'uses' => 'FragmentController@create'));
	Route::post('fragments/store', array('as' => 'appanel.fragments.store', 'uses' => 'FragmentController@store'));
	Route::get('fragments/{id}/edit', array('as' => 'appanel.fragments.edit', 'uses' => 'FragmentController@edit'));
	Route::put('fragments/{id}/update', array('as' => 'appanel.fragments.update', 'uses' => 'FragmentController@update'));
	Route::get('fragments/{id}/destroy', array('as' => 'appanel.fragments.destroy', 'uses' => 'FragmentController@destroy'));

	// Advertise
	Route::get('advertises', array('as' => 'appanel.advertises.index', 'uses' => 'AdvertiseController@index'));
	Route::get('advertises/create', array('as' => 'appanel.advertises.create', 'uses' => 'AdvertiseController@create'));
	Route::post('advertises/store', array('as' => 'appanel.advertises.store', 'uses' => 'AdvertiseController@store'));
	Route::get('advertises/{id}/view', array('as' => 'appanel.advertises.view', 'uses' => 'AdvertiseController@view'));
	Route::get('advertises/{id}/edit', array('as' => 'appanel.advertises.edit', 'uses' => 'AdvertiseController@edit'));
	Route::put('advertises/{id}/update', array('as' => 'appanel.advertises.update', 'uses' => 'AdvertiseController@update'));
	Route::get('advertises/{id}/destroy', array('as' => 'appanel.advertises.destroy', 'uses' => 'AdvertiseController@destroy'));

	// Categories
	Route::get('categories', array('as' => 'appanel.categories.index', 'uses' => 'CategoryController@index'));
	Route::post('categories/store', array('as' => 'appanel.categories.store', 'uses' => 'CategoryController@store'));
	Route::post('categories/update', array('as' => 'appanel.categories.update', 'uses' => 'CategoryController@update'));
	Route::post('categories/delete', array('as' => 'appanel.categories.destroy', 'uses' => 'CategoryController@destroy'));

	// Pictures
	Route::get('pictures/', array('as' => 'appanel.picture.index', 'uses'=>'ImageController@index'));
	Route::get('pictures/uid/{uid}', array('as' => 'appanel.picture.uid', 'uses'=>'ImageController@uid'));
	Route::get('pictures/{group}.json', array('uses'=>'ImageController@list_json'));
	Route::post('picture/upload', array('as' => 'appanel.picture.upload', 'uses'=>'ImageController@upload'));
	Route::post('pictures/delete/', array('as' => 'appanel.picture.destroy', 'uses'=>'ImageController@destroy'));
});

/*
App::error(function (Exception $exception) {
    return Redirect::to(route('app.e404'));
});
/**/

