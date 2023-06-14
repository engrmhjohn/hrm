<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department(){
        return view('admin.department.show');
    }
    public function saveDepartment(Request $request){
       $department = new Department();
       $department->admin_id = $request->admin_id;
       $department->name = $request->name;
       $department->status = $request->status;
       $department->save();
       return redirect(route('admin.manage.department'))->with('message','Successfully Added!');
    }
    public function manageDepartment() {
        $userId = auth()->user()->id;
        $total_department = Department::where('status', '1')
        ->where('admin_id', $userId)
        ->get();
        return view('admin.department.index', [
            'total_department' => $total_department
        ]);
    }

    public function editDepartment($id) {
        $department = Department::find($id);

        return view('admin.department.edit', [
            'department' => $department,
        ]);
    }

    public function updateDepartment(Request $request) {
        $department               = Department::find($request->department_id);
        $department->admin_id = $request->admin_id;
        $department->name = $request->name;
        $department->status = $request->status;

        $department->save();

        return redirect(route('admin.manage.department'))->with('message','Successfully Updated!');
    }

    public function deleteDepartment(Request $request) {
        $department = Department::find($request->department_id);
        $department->delete();

        return redirect(route('admin.manage.department'))->with('message','Successfully Deleted!');
    }
}
