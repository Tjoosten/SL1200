<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('auth/{provider}', 'Auth\SocialAuthencation@redirectToProvider')->name('auth.social');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthencation@handleProviderCallback')->name('auth.social.callback');

Route::get('/petition/new', 'Petitions@create')->name('petition.start');
Route::get('/petition/browse', 'Petitions@browse')->name('petition.browse');
Route::get('/petition/search', 'Petitions@search')->name('petition.search');
Route::get('/petition/show/{id}', 'Petitions@show')->name('petition.show');

Route::get('/account/user/{userId}', 'Account@user')->name('profile.user');
Route::get('/account', 'Account@index')->name('profile');
Route::get('/account/settings', 'Account@accountSettings')->name('profile.settings');
Route::get('/account/petitions', 'Petitions@user')->name('profile.petitions');

Route::post('/comment', 'Comments@store')->name('comment.store');
Route::get('/comment/delete/{id}/{petitionId}', 'Comments@delete')->name('comment.delete');

Route::get('/organisation/create', 'Organizations@create')->name('org.create');
Route::post('/organization/save', 'Organizations@store')->name('org.store');
