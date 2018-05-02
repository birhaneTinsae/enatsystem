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
use App\Notifications\HRNotification;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * Phone book 
 */
Route::get('phone-book','PhoneBookController@index')->name('phone-book');
Route::get('phone-book/{query}','PhoneBookController@search');

Route::middleware(['auth'])->group(function(){

    // Notification::route('mail', 'taylor@laravel.com')           
    // ->notify(new HRNotification(App\ActingEmployee::all()));

/**
 * List applications that the user has role.
 * rendered after authontication 
 */
Route::get('home', 'HomeController@index')->name('home');
/**
 * Admin area for managment purpose.
 */

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('password-reset','UserMaintainance@show_password_reset_form');
Route::put('password-reset/{id}','UserMaintainance@reset_password');
Route::resource('user','UserMaintainance');
/**
 * Branch maintenance related URLs.
 */
Route::get('branch/{id}/employees','Branch\BranchController@employees');
Route::resource('branch', 'Branch\BranchController');
/**
 * Issue loging 
 */
Route::resource('issue','IssueController');
/**
 * Human resource management related URLs.
 */

Route::get('hr/acting','HRM\HumanResourceController@acting');
Route::get('hr/employees','HRM\HumanResourceController@employees');
Route::resource('hr', 'HRM\HumanResourceController')->middleware('can:view-hr');
Route::resource('leave', 'HRM\LeaveManagmentController')->middleware('can:view-hr');

/**
 * 
 */
Route::resource('job','HRM\JobController');
/**
 * Role maintenance related URLs.
 */
Route::resource('role', 'Role\RoleController')->middleware('can:view,App\Role');

/**
 * Foreign currency request related URLs.
 */
Route::resource('fcy', 'FCY\FCYController')->middleware('can:view-fcy');

/**
 * Notification management related URLs.
 */
Route::post('/sms-password-notification/send','Notification\SMSPasswordNotificationController@send_password_reset_sms');
Route::post('/sms-password-notification/send-one-time','Notification\SMSPasswordNotificationController@send_one_time_sms');
Route::post('/sms-password-notification/filter','Notification\SMSPasswordNotificationController@filter');
Route::get('/sms-password-notification/send-one-time','Notification\SMSPasswordNotificationController@one_time_sms');
Route::get('/password-generator','Notification\SMSPasswordNotificationController@generate_password');
Route::get('/sms-password-notification', 'Notification\SMSPasswordNotificationController@index')->name('sms-notification')->middleware('can:view-sms');;
Route::get('/sms-password-notification/create', 'Notification\SMSPasswordNotificationController@create')->middleware('can:create-sms');;
/**
 * 
 */
Route::resource('msg-templete','Notification\MessageTempleteController');
/**
 * Fixed asset managment related URls.
 */
Route::resource('fixed-asset', 'FAM\PPECategoryController')->middleware('can:view-fam');
Route::resource('asset','FAM\AssetController');
Route::resource('asset-category','FAM\AssetItemController');
Route::get('additional-cost/{id}','FAM\AdditionalCostController@create');
Route::get('additional-cost/{id}/edit','FAM\AdditionalCostController@edit');
Route::put('additional-cost/{id}','FAM\AdditionalCostController@update');
Route::post('additional-cost','FAM\AdditionalCostController@store');
Route::get('impairment/{id}','FAM\ImpairmentController@create');
Route::post('impairment','FAM\ImpairmentController@store');
Route::get('impairment/{id}/edit','FAM\ImpairmentController@edit');
Route::put('impairment/{id}','FAM\ImpairmentController@update');

});
/**
 * Please add new application URLs below.
 */