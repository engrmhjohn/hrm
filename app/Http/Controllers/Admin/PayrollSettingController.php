<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\PayrollSetting;
use Illuminate\Http\Request;

class PayrollSettingController extends Controller
{
    public function payrollSetting()
    {
        return view('admin.payroll_setting.show', [
            'employees' => Employee::all(),
            'departments' => Department::all(),
        ]);
    }
    public function savePayrollSetting(Request $request)
    {
        $payroll_setting = new PayrollSetting();
        $payroll_setting->payroll_type = $request->payroll_type;
        $payroll_setting->admin_id = $request->admin_id;
        $payroll_setting->employee_id = $request->employee_id;
        $payroll_setting->department_id = $request->department_id;
        $payroll_setting->late_in_cut = $request->late_in_cut;
        $payroll_setting->early_out_cut = $request->early_out_cut;
        $payroll_setting->unpaid_leave_cut = $request->unpaid_leave_cut;
        $payroll_setting->absent_cut = $request->absent_cut;
        $payroll_setting->bonus = $request->bonus;
        $payroll_setting->bonus_month = $request->bonus_month;

        $payroll_setting->save();
        return redirect(route('admin.manage.payroll.setting'))->with('message', 'Successfully Added!');
    }
    public function managePayrollSetting()
    {
        $userId = auth()->user()->id;
        $payroll_settings = PayrollSetting::where('admin_id', $userId)
        ->get();
        return view('admin.payroll_setting.index', [
            'payroll_settings' => $payroll_settings
        ]);
    }

    public function editPayrollSetting($id)
    {
        $payroll_setting = PayrollSetting::find($id);

        return view('admin.payroll_setting.edit', [
            'employees' => Employee::all(),
            'departments' => Department::all(),
            'payroll_setting' => $payroll_setting,
        ]);
    }

    public function updatePayrollSetting(Request $request)
    {
        $payroll_setting               = PayrollSetting::find($request->payroll_setting_id);
        $payroll_setting->payroll_type = $request->payroll_type;
        $payroll_setting->admin_id = $request->admin_id;
        $payroll_setting->employee_id = $request->employee_id;
        $payroll_setting->department_id = $request->department_id;
        $payroll_setting->late_in_cut = $request->late_in_cut;
        $payroll_setting->early_out_cut = $request->early_out_cut;
        $payroll_setting->unpaid_leave_cut = $request->unpaid_leave_cut;
        $payroll_setting->absent_cut = $request->absent_cut;
        $payroll_setting->bonus = $request->bonus;
        $payroll_setting->bonus_month = $request->bonus_month;

        $payroll_setting->save();
        return redirect(route('admin.manage.payroll.setting'))->with('message', 'Successfully Updated!');
    }

    public function deletePayrollSetting(Request $request)
    {
        $payroll_setting = PayrollSetting::find($request->payroll_setting_id);
        $payroll_setting->delete();

        return redirect(route('admin.manage.payroll.setting'))->with('message', 'Successfully Deleted!');
    }
}
