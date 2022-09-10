<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('services', 'WelcomeController@services')->name('welcomeservices');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('generate-shorten-links', 'ShortLinksController@index');
Route::post('generate-shorten-link', 'ShortLinksController@store')->name('generate');

Route::get('generated-links/{shortlink}', 'ShortLinksController@show')->name('guestlink');
Route::delete('home/{shortlinks}/delete', 'ShortLinksController@destroy')->name('shortdelete');

Route::get('page/{page}', 'PageController@show')->name('pageshow');

Route::get('user/edit', 'UserController@useredit')->name('useredit');
Route::put('user/{user}', 'UserController@update')->name('userupdate');
Route::post('user/{user}/password', 'UserController@updatepass')->name('userupdatepass');

Route::middleware(['team'])->group(function () {
    Route::get('admin_panel/dashboard', 'AdminController@index')->name('admin');

    Route::get('admin_panel/pages', 'PageController@index')->name('pages');
    Route::post('admin_panel/page/add', 'PageController@store')->name('pageadd');
    Route::put('admin_panel/{page}/update', 'PageController@update')->name('pageupdate');
    Route::delete('admin_panel/{page}/delete', 'PageController@destroy')->name('pagedelete');

    Route::get('admin_panel/services', 'ServiceController@index')->name('services');
    Route::post('admin_panel/service/add', 'ServiceController@store')->name('serviceadd');
    Route::put('admin_panel/services/{service}/update', 'ServiceController@update')->name('serviceupdate');
    Route::delete('admin_panel/services/{service}/delete', 'ServiceController@destroy')->name('servicedelete');

    // Route::put('admin_panel/services/{service}/update_des', 'AdminController@serviceupdate')->name('servicedesupdate');

    Route::get('admin_panel/shorten_links', 'AdminController@shorten')->name('shorten');
    Route::delete('admin_panel/shorten_links/{shortlink}/delete', 'AdminController@shortdelete')->name('shortdeleteadmin');

    Route::get('admin_panel/users', 'AdminController@userlist')->name('users');
    // Staff list
    Route::get('admin_panel/team', 'AdminController@team')->name('team');
    Route::get('admin_panel/settings', 'AdminController@settings')->name('settings');
    Route::get('admin_panel/ad_places', 'AdminController@advertise')->name('advertise');
    Route::get('admin_panel/support', 'AdminController@support')->name('support');

    Route::put('admin_panel/settings/{admin}/update', 'AdminController@updatesettings')->name('updatesettings');
    Route::put('admin_panel/ad_places/{admin}/update', 'AdminController@updatead')->name('updatead');

    // Appointing user role
    Route::put('admin_panel/users/{user}/role', 'AdminController@assignrole')->name('assignrole');
});

// Shorten link open
Route::get('/{code}', 'ShortLinksController@shortenLink')->name('shorten.link');