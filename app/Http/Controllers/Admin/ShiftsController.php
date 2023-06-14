<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function shift(){
        return view('admin.shifts.show');
    }
    public function saveShift(Request $request){
       $shift = new Shift();
       $shift->admin_id = $request->admin_id;
       $shift->name = $request->name;
       $shift->saturday_in_time = $request->saturday_in_time;
       $shift->saturday_out_time = $request->saturday_out_time;
       $shift->sunday_in_time = $request->sunday_in_time;
       $shift->sunday_out_time = $request->sunday_out_time;
       $shift->monday_in_time = $request->monday_in_time;
       $shift->monday_out_time = $request->monday_out_time;
       $shift->tuesday_in_time = $request->tuesday_in_time;
       $shift->tuesday_out_time = $request->tuesday_out_time;
       $shift->wednesday_in_time = $request->wednesday_in_time;
       $shift->wednesday_out_time = $request->wednesday_out_time;
       $shift->thursday_in_time = $request->thursday_in_time;
       $shift->thursday_out_time = $request->thursday_out_time;
       $shift->friday_in_time = $request->friday_in_time;
       $shift->friday_out_time = $request->friday_out_time;
       $shift->save();
       return redirect(route('admin.manage.shifts'))->with('message','Successfully Added!');
    }
    public function manageShift() {
        $userId = auth()->user()->id;
        $total_shift = Shift::where('admin_id', $userId)
        ->get();
        return view('admin.shifts.index', [
            'total_shift' => $total_shift
        ]);
    }

    public function editShift($id) {
        $shift = Shift::find($id);

        return view('admin.shifts.edit', [
            'shift' => $shift,
        ]);
    }

    public function updateShift(Request $request) {
        $shift               = Shift::find($request->shift_id);
        $shift->admin_id = $request->admin_id;
        $shift->name = $request->name;
        $shift->saturday_in_time = $request->saturday_in_time;
        $shift->saturday_out_time = $request->saturday_out_time;
        $shift->sunday_in_time = $request->sunday_in_time;
        $shift->sunday_out_time = $request->sunday_out_time;
        $shift->monday_in_time = $request->monday_in_time;
        $shift->monday_out_time = $request->monday_out_time;
        $shift->tuesday_in_time = $request->tuesday_in_time;
        $shift->tuesday_out_time = $request->tuesday_out_time;
        $shift->wednesday_in_time = $request->wednesday_in_time;
        $shift->wednesday_out_time = $request->wednesday_out_time;
        $shift->thursday_in_time = $request->thursday_in_time;
        $shift->thursday_out_time = $request->thursday_out_time;
        $shift->friday_in_time = $request->friday_in_time;
        $shift->friday_out_time = $request->friday_out_time;

        $shift->save();

        return redirect(route('admin.manage.shifts'))->with('message','Successfully Updated!');
    }

    public function deleteShift(Request $request) {
        $shift = Shift::find($request->shift_id);
        $shift->delete();

        return redirect(route('admin.manage.shift'))->with('message','Successfully Deleted!');
    }
}
