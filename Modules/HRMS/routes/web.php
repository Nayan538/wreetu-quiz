<?php

use Illuminate\Support\Facades\Route;
use Modules\HRMS\Controllers\AttendanceController;
use Modules\HRMS\Controllers\BillsAndAllowanceController;
use Modules\HRMS\Controllers\EmployeeController;
use Modules\HRMS\Controllers\EmployeeSalaryController;
use Modules\HRMS\Controllers\LeaveApplicationController;
use Modules\HRMS\Controllers\NoticeBoardController;
use Modules\HRMS\Controllers\SalaryGenerateController;
use Modules\HRMS\Controllers\Settings\DepartmentController;
use Modules\HRMS\Controllers\Settings\DesignationController;
use Modules\HRMS\Controllers\Settings\ExpenseTypeController;
use Modules\HRMS\Controllers\Settings\HolidayController;
use Modules\HRMS\Controllers\Settings\LeaveTypeController;
use Modules\HRMS\Controllers\Settings\NoticeTypeController;
use Modules\HRMS\Controllers\Settings\SalarySetupController;
use Modules\HRMS\Controllers\Settings\ShiftController;
use Modules\HRMS\Controllers\Settings\TransportTypeController;

Route::group(['middleware'=>'auth', 'prefix' => 'hrm','as' => 'hrm.'],function () {
        /* Employee */
        Route::resource('employees', EmployeeController::class);

        Route::group(['prefix' => 'settings', 'as'=> 'settings.'], function () {
            Route::resource('departments', DepartmentController::class)->except(['show', 'edit', 'create']);
            Route::resource('designations', DesignationController::class)->except(['show', 'edit', 'create']);

        });
});