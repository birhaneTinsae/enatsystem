<?php
use App\User;
use App\Notifications\Actingemployees;
use Carbon\Carbon ;
use App\ActingEmployee;
use Illuminate\Support\Facades\DB;
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
 * Phone book 
 */
Route::get('phone-book','PhoneBookController@index')->name('phone-book');
Route::get('phone-book/{query}','PhoneBookController@search');

Route::middleware(['auth'])->group(function(){


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
 * Phone book 
 */
Route::get('phone-book','PhoneBookController@index')->name('phone-book');
Route::get('phone-book/{query}','PhoneBookController@search');

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

Route::resource('actingemployee', 'HRM\ActingEmployeeController');
//Route::get('hr/acting','HRM\ActingEmployeeController@acting');
Route::get('actingemployee','HRM\ActingEmployeeController@index');



Route::get('acting/employees','HRM\ActingEmployeeController@employees');
Route::get('hr/users','HRM\HumanResourceController@users');
Route::resource('hr', 'HRM\HumanResourceController')->middleware('can:view-hr');
/**
 * 
 */
Route::resource('job','HRM\JobController');
/**
 * Role maintenance related URLs.
 */
Route::resource('role', 'Role\RoleController');
Route::resource('role', 'Role\RoleController')->middleware('can:view,App\Role');

/**
 * Foreign currency request related URLs.
 */
Route::resource('fcy', 'FCY\FCYController');
Route::resource('fcy', 'FCY\FCYController')->middleware('can:view-fcy');

/**
 * Notification management related URLs.
 */
Route::post('/sms-password-notification/send','Notification\SMSPasswordNotificationController@send');
Route::get('/sms-password-notification', 'Notification\SMSPasswordNotificationController@index')->name('sms-notification');
Route::get('/sms-password-notification', 'Notification\SMSPasswordNotificationController@index')->name('sms-notification')->middleware('can:view-sms');;
/**
 * 
 */
Route::resource('msg-templete','Notification\MessageTempleteController');
/**
 * Fixed asset managment related URls.
 */
Route::get('fixed-asset', 'FAM\FixedAssetController@index')->name('fixed-asset');

Route::get('fixed-asset', 'FAM\FixedAssetController@index')->name('fixed-asset')->middleware('can:view-fam');;
});
/**
 * Please add new application URLs below.
 */