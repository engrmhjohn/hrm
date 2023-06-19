<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CompanyCompleteProfileController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeLoginController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\PayrollSettingController;
use App\Http\Controllers\Admin\PaySlipController;
use App\Http\Controllers\Admin\ShiftsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\HomeController;

Route::controller(PaymentController::class)->group(function () {

    // payment
    Route::get('/example1', 'exampleEasyCheckout');
    // Route::get('/example2', 'exampleHostedCheckout');

    Route::post('/pay', 'index');
    Route::post('/pay-via-ajax', 'payViaAjax');

    Route::post('/success', 'success');
    Route::post('/fail', 'fail');
    Route::post('/cancel', 'cancel');

    Route::post('/ipn', 'ipn');
    // payment


    //buy now
    Route::get('/buy-now/{id}', 'buyNow')->name('package.buy.now')->middleware('auth:admin');
});


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
});

Auth::routes();

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/admin/dashboard', function () {
//     $role = Auth::user()->role;
//     if ($role == '1') {
//         return view('backend.home.index');
//     } else {
//         $profile = Admin::find($id);
//         return view('backend.home.index',[
//             'profile' => $profile,
//         ]);
//         // return view('backend.home.index');
//     }
// })->middleware('auth:admin');

Route::get('/admin/create-user', [AdminController::class, 'user']);


//will be later do it
Route::prefix('/admin')->name('admin.auth.')->group(function () {
    // Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    // Route::post('/store-login', [AdminAuthController::class, 'storeLogin'])->name('storeLogin');
    // Route::get('/forgot-password', [AdminForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    // Route::post('/forgot-password', [AdminForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    // Route::get('/reset-password/{token}', [AdminResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    // Route::post('/reset-password', [AdminResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
    //will be later do it
});


Route::middleware('auth:admin')->name('admin.')->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(PackageController::class)->prefix('/admin')->group(function () {
        Route::get('/package', 'package')->name('package');
        Route::post('/save-package', 'savePackage')->name('save.package');
        Route::get('/manage-package', 'managePackage')->name('manage.package');
        Route::get('/edit-package/{id}', 'editPackage')->name('edit.package');
        Route::post('/update-package', 'updatePackage')->name('update.package');
        Route::post('/delete-package', 'deletePackage')->name('delete.package');
        Route::get('/sold-package', 'soldPackage')->name('sold.package');
        Route::post('/sold-delete-package', 'deleteSoldPackage')->name('delete.sold.package');
    });
    Route::controller(CompanyCompleteProfileController::class)->prefix('/admin')->group(function () {
        Route::get('/company-profile', 'companyProfile')->name('profile');
        Route::post('/complete-company-profile', 'completeForm')->name('complete_form');
        Route::get('/edit-company-profile/{id}', 'editCompanyProfile')->name('edit.profile');
        Route::post('/update-company-profile', 'updateCompanyProfile')->name('update.profile');
    });

    Route::middleware('privilege_customer')->group(function () {

        //Employee management
        Route::controller(EmployeeLoginController::class)->name('auth.')->group(function () {
            Route::get('/worker-list', 'workerList')->name('workerList');
            Route::get('/create-worker', 'createWorker')->name('createWorker');
            Route::post('/store-worker', 'storeWorker')->name('storeWorker');
            Route::get('/edit-worker/{worker}', 'editWorker')->name('editWorker');
            Route::post('/update-worker', 'updateWorker')->name('updateWorker');
            Route::delete('/delete-worker/{worker}', 'deleteWorker')->name('deleteWorker');
        });

        // Route::post('/logout', [EmployeeLoginController::class, 'logout'])->name('auth.logout');

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

        Route::controller(PayrollSettingController::class)->prefix('/admin')->group(function () {
            Route::get('/payroll-setting', 'payrollSetting')->name('payroll.setting');
            Route::post('/save-payroll-setting', 'savePayrollSetting')->name('save.payroll.setting');
            Route::get('/manage-payroll-setting', 'managePayrollSetting')->name('manage.payroll.setting');
            Route::get('/edit-payroll-setting/{id}', 'editPayrollSetting')->name('edit.payroll.setting');
            Route::post('/update-payroll-setting', 'updatePayrollSetting')->name('update.payroll.setting');
            Route::post('/delete-payroll-setting', 'deletePayrollSetting')->name('delete.payroll.setting');
        });

        Route::controller(AttendanceController::class)->prefix('/admin')->group(function () {
            Route::get('/attendance-setting', 'attendanceSetting')->name('attendance.setting');
            Route::post('/save-attendance-setting', 'saveAttendanceSetting')->name('save.attendance.setting');
            Route::get('/manage-attendance-setting', 'manageAttendanceSetting')->name('manage.attendance.setting');
            Route::get('/edit-attendance-setting/{id}', 'editAttendanceSetting')->name('edit.attendance.setting');
            Route::post('/update-attendance-setting', 'updateAttendanceSetting')->name('update.attendance.setting');
            Route::post('/delete-attendance-setting', 'deleteAttendanceSetting')->name('delete.attendance.setting');
        });
    });
});
