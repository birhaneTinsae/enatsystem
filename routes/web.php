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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * List applications that the user has role.
 * rendered after authontication 
 */
Route::get('home', 'HomeController@index')->name('home');
/**
 * Admin area for managment purpose.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
/**
 * Branch maintenance related URLs.
 */
Route::get('branch/{id}/employees','Branch\BranchController@employees');
Route::resource('branch', 'Branch\BranchController');
/**
 * Human resource management related URLs.
 */
Route::get('hr/users','HRM\HumanResourceController@users');
Route::resource('hr', 'HRM\HumanResourceController');
/**
 * Role maintenance related URLs.
 */
Route::resource('role', 'Role\RoleController');

/**
 * Foreign currency request related URLs.
 */
Route::resource('fcy', 'FCY\FCYController');

/**
 * Notification management related URLs.
 */
Route::post('/sms-password-notification/send','Notification\SMSPasswordNotificationController@send');
Route::get('/sms-password-notification', 'Notification\SMSPasswordNotificationController@index')->name('sms-notification');
/**
 * 
 */
Route::resource('msg-templete','Notification\MessageTempleteController');
/**
 * Fixed asset managment related URls.
 */
Route::get('fixed-asset', 'FAM\FixedAssetController@index')->name('fixed-asset');

/**
 * Please add new application URLs below.
 */