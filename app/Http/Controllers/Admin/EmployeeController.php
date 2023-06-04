<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\PaySlip;
use App\Models\Shift;
use Illuminate\Http\Request;
use App\Helper\image;
use Illuminate\Support\Facades\File;

require_once app_path('Helper/image.php');

class EmployeeController extends Controller
{
    public function employee()
    {
        return view('admin.employee.show', [
            'departments' => Department::all(),
            'designations' => Designation::all(),
            'shifts' => Shift::all(),
            'pay_slips' => PaySlip::all(),
        ]);
    }

    public function saveEmployee(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->contact_number = $request->contact_number;
        $employee->gender = $request->gender;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;
        $employee->shift_id = $request->shift_id;
        $employee->pay_slip_id = $request->pay_slip_id;
        $employee->salary = $request->salary;
        $employee->food_allowance = $request->food_allowance;
        $employee->other = $request->other;
        $employee->image = image_upload($request->image);
        $employee->status = $request->status;
        $employee->save();
        return redirect(route('admin.manage.employee'))->with('message', 'Successfully Added!');
    }
    public function manageEmployee()
    {
        return view('admin.employee.index', [
            'employees' => Employee::all(),
        ]);
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);

        return view('admin.employee.edit', [
            'employee' => $employee,
            'departments' => Department::all(),
            'designations' => Designation::all(),
            'shifts' => Shift::all(),
            'pay_slips' => PaySlip::all(),
        ]);
    }

    public function updateEmployee(Request $request)
    {
        $employee               = Employee::find($request->employee_id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->contact_number = $request->contact_number;
        $employee->gender = $request->gender;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;
        $employee->shift_id = $request->shift_id;
        $employee->pay_slip_id = $request->pay_slip_id;
        $employee->salary = $request->salary;
        $employee->food_allowance = $request->food_allowance;
        $employee->other = $request->other;
        $employee->status = $request->status;
        if ($request->file('image')) {

            if (isset($employee->image)) {
                unlink($employee->image);
            }
            $employee->image = image_upload($request->image);
        }
        $employee->save();

        return redirect(route('admin.manage.employee'))->with('message', 'Successfully Updated!');
    }

    public function deleteEmployee(Request $request)
    {
        $employee = Employee::find($request->employee_id);

        if ($employee->image) {
            unlink($employee->image);
        }
        $employee->delete();

        return redirect(route('admin.manage.employee'))->with('message', 'Successfully Deleted!');
    }
}
