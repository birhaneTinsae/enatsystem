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

/**
 * Branch maintenance related URLs.
 */
Route::get('branch/{id}/employees','Branch\BranchController@employees');
Route::resource('branch', 'Branch\BranchController');
/**
 * Human resource management related URLs.
 */

Route::get('hr/acting','HRM\HumanResourceController@acting');
Route::get('hr/users','HRM\HumanResourceController@users');
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
Route::post('/sms-password-notification/send','Notification\SMSPasswordNotificationController@send');
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
Route::get('additional-cost/{id}','FAM\AdditionalCostController@index');
Route::get('impairment/{id}','FAM\ImpairmentController@index');

});
/**
 * Please add new application URLs below.
 */