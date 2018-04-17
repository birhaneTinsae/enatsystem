<?php
use App\User;
use App\Notifications\Actingemployees;
use Carbon\Carbon ;
use App\Group;
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
Route::resource('user','UserMaintainance');
Route::get('hr/users','HRM\HumanResourceController@users');
Route::resource('hr', 'HRM\HumanResourceController');
Route::get('hr/detail/{id}','HRM\HumanResourceController@detail');
Route::resource('actingemployee', 'HRM\ActingEmployeeController');
Route::get('searchactingemployee','HRM\ActingEmployeeController@search');
Route::get('actingemployee','HRM\ActingEmployeeController@index');
Route::get('acting/employees','HRM\ActingEmployeeController@employees');
Route::get('acting/email','HRM\ActingEmployeeController@email');


Route::resource('transferpromotion','HRM\TransferpromotionController');
Route::get('transfer','HRM\TransferpromotionController@index');
Route::get('searchtransferpromotion','HRM\TransferpromotionController@search');

/**
 * Transfer Promotion related URLs.
 */
Route::resource('transferpromotionrequest','HRM\TransferpromotionrequestController');
Route::get('request','HRM\TransferpromotionrequestController@index');
Route::get('searchtransferpromotionrequest','HRM\TransferpromotionrequestController@search');

Route::get('hr/users','HRM\HumanResourceController@users');
Route::resource('hr', 'HRM\HumanResourceController')->middleware('can:view-hr');
Route::resource('leave', 'HRM\LeaveManagmentController')->middleware('can:view-hr');
Route::get('searchemployee','HRM\HumanResourceController@search');

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
Route::post('additional-cost','FAM\AdditionalCostController@store');
Route::get('impairment/{id}','FAM\ImpairmentController@create');
Route::post('impairment','FAM\ImpairmentController@store');

Route::resource('transfers','FAM\TransferController');
Route::get('transfer/{id}','FAM\TransferController@create');
Route::resource('dispose','FAM\DisposalController');
Route::get('searchdisposedassets','FAM\DisposalController@search');
Route::get('disposal/{id}','FAM\DisposalController@create');

});
/**
 * Please add new application URLs below.
 */