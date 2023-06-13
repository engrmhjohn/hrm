<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceSetting;
use Illuminate\Http\Request;
use App\Models\Employee;

class AttendanceController extends Controller
{
    public function attendanceSetting()
    {
        return view('admin.attendance_setting.show', [
            'employees' => Employee::all()
        ]);
    }
    public function saveAttendanceSetting(Request $request)
    {
        $attendance_setting = new AttendanceSetting();
        $attendance_setting->employee_id = $request->employee_id;
        $attendance_setting->date = $request->date;
        $attendance_setting->in_time = $request->in_time;

        if ($request->in_time <= '08:30') {
            $attendance_setting->in_time_status = 'On Time';
        } else {
            $attendance_setting->in_time_status = 'Late';
        }
        $attendance_setting->out_time = $request->out_time;

        if ($request->out_time >= '17:30') {
            $attendance_setting->out_time_status = 'On Time';
        } else {
            $attendance_setting->out_time_status = 'Early';
        }

        $inTime = strtotime($request->in_time);
        $outTime = strtotime($request->out_time);
        $workingHours = ($outTime - $inTime) / 3600;
        $attendance_setting->working_hours = $workingHours;

        $attendance_setting->save();
        return redirect(route('admin.manage.attendance.setting'))->with('message', 'Successfully Added!');
    }
    public function manageAttendanceSetting()
    {
        return view('admin.attendance_setting.index', [
            'attendance_settings' => AttendanceSetting::all()
        ]);
    }

    public function editAttendanceSetting($id)
    {
        $attendance_setting = AttendanceSetting::find($id);

        return view('admin.attendance_setting.edit', [
            'employees' => Employee::all(),
            'attendance_setting' => $attendance_setting
        ]);
    }

    public function updateAttendanceSetting(Request $request)
    {
        $attendance_setting               = AttendanceSetting::find($request->attendance_setting_id);
        $attendance_setting->employee_id = $request->employee_id;
        $attendance_setting->date = $request->date;
        $attendance_setting->in_time = $request->in_time;

        if ($request->in_time <= '08:30') {
            $attendance_setting->in_time_status = 'On Time';
        } else {
            $attendance_setting->in_time_status = 'Late';
        }
        $attendance_setting->out_time = $request->out_time;

        if ($request->out_time >= '17:30') {
            $attendance_setting->out_time_status = 'On Time';
        } else {
            $attendance_setting->out_time_status = 'Early';
        }

        $inTime = strtotime($request->in_time);
        $outTime = strtotime($request->out_time);
        $workingHours = ($outTime - $inTime) / 3600;
        $attendance_setting->working_hours = $workingHours;

        $attendance_setting->save();
        return redirect(route('admin.manage.attendance.setting'))->with('message', 'Successfully Updated!');
    }

    public function deleteAttendanceSetting(Request $request)
    {
        $attendance_setting = AttendanceSetting::find($request->attendance_setting_id);
        $attendance_setting->delete();

        return redirect(route('admin.manage.attendance.setting'))->with('message', 'Successfully Deleted!');
    }
}
