<?php

use App\Http\Controllers\AccessControl\BranchController;
use App\Http\Controllers\AccessControl\BranchTypeController;
use App\Http\Controllers\AccessControl\GlobalSettingController;
use App\Http\Controllers\AccessControl\RoleController;
use App\Http\Controllers\AccessControl\ServiceNameController;
use App\Http\Controllers\AccessControl\SmsTemplateController;
use App\Http\Controllers\AccessControl\TriggerNameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoLocationController;
use App\Http\Controllers\Notifications\GeneralNotificationController;
use App\Http\Controllers\UserLogHistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

// Route::group(['middleware'=>'guest'],function(){
//     Route::get('/',[AuthController::class,'login'])->name('login');
//     Route::get('/register',[AuthController::class,'register'])->name('register');
//     Route::get('/forget-password',[AuthController::class,'forgetPassword'])->name('forget_password');
//     Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
//     Route::post('/signup',[AuthController::class,'signup'])->name('signup');
// });

// Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
// Route::get('/lang/{lang}',[ LanguageController::class,'switchLang'])->name('switch_lang');
// Route::get('/pagination-per-page/{per_page}',[ PaginationController::class,'set_pagination_per_page'])->name('pagination_per_page');

Route::get('/dark-mode-switcher', function (Request $request) {
    $request->session()->put('dark_mode', $request->dark_mode);
    return response()->json(['success' => true]);
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    // Route::get("/locations", function (Request $request) {
    //     if($request->type == "country"){
    //         return cuntriesNames();
    //     }
    //     if($request->type == "division"){
    //         return getDivision();
    //     }
    //     if($request->type =="district"){
    //         return getDistrict($request->division);
    //     }
    // })->name('locations');

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('locations', [GeoLocationController::class, 'getLocations'])->name('locations');
    Route::post('add-geo-location', [GeoLocationController::class, 'addGeoLocation'])->name('add-geo-location');

    //get-notification-count
    Route::get('get-notification-count', [GeneralNotificationController::class, 'getNotificationCount'])->name('get-notification-count');
    Route::get('get-notifications', [GeneralNotificationController::class, 'getNotifications'])->name('get-notifications');
    Route::get('notification-action/{id}', [GeneralNotificationController::class, 'notificationAction'])->name('notification.action');

    // Users
    // Route::resource('users', UserController::class);

    // access controll
    Route::group(['prefix' => 'access-control', 'as' => 'access_control.'], function () {
        /* Role */
        Route::resource('roles', RoleController::class);
        //add user to role
        Route::get('roles/{id}/add-user', [RoleController::class, 'addUserToRoleView'])->name('roles.add_user_view');
        Route::post('roles/{id}/add-user', [RoleController::class, 'addUserToRole'])->name('roles.add_user');

        Route::resource('global-settings', GlobalSettingController::class);

        Route::resource('branchs', BranchController::class);
        Route::resource('branch-types', BranchTypeController::class);

    });

    //hrm and payroll

    // notifications.general-notifications.index

    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
        Route::resource('general-notifications', GeneralNotificationController::class);
    });

    Route::group(['prefix' => 'history', 'as' => 'history.'], function () {
        Route::resource('user-log-histories', UserLogHistoryController::class);
    });

    Route::group(['prefix' => 'sms', 'as' => 'sms.'], function () {
        Route::resource('templates', SmsTemplateController::class);
        Route::get('service-name-wise-trigger-names', [SmsTemplateController::class, 'serviceNameWiseTrigerName'])->name('service-name-wise-trigger-names');
        Route::get('entity-list', [SmsTemplateController::class, 'loadEntities'])->name('entity-list');
        Route::resource('service-names', ServiceNameController::class);
        Route::resource('trigger-names', TriggerNameController::class);
    });

    Route::resource('branchs',BranchController::class);

    // file controller
    Route::post('/upload-file', [App\Http\Controllers\FileController::class, 'uploadFile'])->name('upload_file');
});

Route::get('/files/{path}', [App\Http\Controllers\FileController::class, 'getFile'])
    ->where('path', '.*')
    ->name('download_file');
