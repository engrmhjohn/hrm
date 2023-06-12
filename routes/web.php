<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\PaySlipController;
use App\Http\Controllers\Admin\ShiftsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserInfoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard', function () {
    return view('backend.home.index');
})->middleware('auth:admin');

Route::get('/admin/create-user', [AdminController::class, 'user']);

Route::middleware('auth:admin')->name('admin.')->group(function () {

    Route::controller(UserInfoController::class)->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/admin-profile', 'adminProfile')->name('admin_profile');
        Route::get('/admin-form', 'adminForm')->name('admin_form');
        Route::get('/user-profile', 'userProfile')->name('user_profile');
    });

    Route::controller(DepartmentController::class)->prefix('/admin')->group(function () {
        Route::get('/department', 'department')->name('department');
        Route::post('/save-department', 'saveDepartment')->name('save.department');
        Route::get('/manage-department', 'manageDepartment')->name('manage.department');
        Route::get('/edit-department/{id}', 'editDepartment')->name('edit.department');
        Route::post('/update-department', 'updateDepartment')->name('update.department');
        Route::post('/delete-department', 'deleteDepartment')->name('delete.department');
    });

    Route::controller(DesignationController::class)->prefix('/admin')->group(function () {
        Route::get('/designation', 'designation')->name('designation');
        Route::post('/save-designation', 'saveDesignation')->name('save.designation');
        Route::get('/manage-designation', 'manageDesignation')->name('manage.designation');
        Route::get('/edit-designation/{id}', 'editDesignation')->name('edit.designation');
        Route::post('/update-designation', 'updateDesignation')->name('update.designation');
        Route::post('/delete-designation', 'deleteDesignation')->name('delete.designation');
    });

    Route::controller(ShiftsController::class)->prefix('/admin')->group(function () {
        Route::get('/shifts', 'shift')->name('shifts');
        Route::post('/save-shifts', 'saveShift')->name('save.shifts');
        Route::get('/manage-shifts', 'manageShift')->name('manage.shifts');
        Route::get('/edit-shifts/{id}', 'editShift')->name('edit.shifts');
        Route::post('/update-shifts', 'updateShift')->name('update.shifts');
        Route::post('/delete-shifts', 'deleteShift')->name('delete.shifts');
    });

    Route::controller(PaySlipController::class)->prefix('/admin')->group(function () {
        Route::get('/pay-slip', 'paySlip')->name('pay_slip');
        Route::post('/save-pay-slip', 'savePaySlip')->name('save.pay_slip');
        Route::get('/manage-pay-slip', 'managePaySlip')->name('manage.pay_slip');
        Route::get('/edit-pay-slip/{id}', 'editPaySlip')->name('edit.pay_slip');
        Route::post('/update-pay-slip', 'updatePaySlip')->name('update.pay_slip');
        Route::post('/delete-pay-slip', 'deletePaySlip')->name('delete.pay_slip');
    });

    Route::controller(EmployeeController::class)->prefix('/admin')->group(function () {
        Route::get('/employee', 'employee')->name('employee');
        Route::post('/save-employee', 'saveEmployee')->name('save.employee');
        Route::get('/manage-employee', 'manageEmployee')->name('manage.employee');
        Route::get('/edit-employee/{id}', 'editEmployee')->name('edit.employee');
        Route::post('/update-employee', 'updateEmployee')->name('update.employee');
        Route::post('/delete-employee', 'deleteEmployee')->name('delete.employee');


        Route::get('/test', 'test')->name('test');
    });

    Route::controller(CalendarController::class)->prefix('/admin')->group(function () {
        Route::get('/calendar', 'calendar')->name('calendar');
        Route::post('/event-store', 'store')->name('event.store');
        Route::patch('/event-update/{id}', 'update')->name('event.update');
        Route::delete('/event-destroy/{id}', 'destroy')->name('event.destroy');


        //testing another tamplate
        Route::get('/temp', 'temp')->name('temp');
        Route::post('/temp-store', 'tempstore')->name('temp.store');
        Route::patch('/temp-update/{id}', 'tempupdate')->name('temp.update');
        Route::delete('/temp-destroy/{id}', 'tempdestroy')->name('temp.destroy');
    });

    Route::controller(MapController::class)->prefix('/admin')->group(function () {
        Route::get('/url', 'takeUrl')->name('url');
        Route::post('/coordinates', 'getCoordinates')->name('get_coordinates');
        Route::get('/manage-location', 'manageLocation')->name('manage.location');
        Route::get('/edit-location/{id}', 'editUrl')->name('edit.location');
        Route::post('/update-location/{id}', 'updateUrl')->name('update.location');
        Route::delete('/delete-location/{id}', 'deleteLocation')->name('delete.location');
    });


});
