<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designation(){
        return view('admin.designation.show');
    }
    public function saveDesignation(Request $request){
       $designation = new Designation();
       $designation->admin_id = $request->admin_id;
       $designation->name = $request->name;
       $designation->status = $request->status;
       $designation->save();
       return redirect(route('admin.manage.designation'))->with('message','Successfully Added!');
    }
    public function manageDesignation() {
        $userId = auth()->user()->id;
        $total_designation = Designation::where('status', '1')
        ->where('admin_id', $userId)
        ->get();
        return view('admin.designation.index', [
            'designations' => $total_designation
        ]);
    }

    public function editDesignation($id) {
        $designation = Designation::find($id);

        return view('admin.designation.edit', [
            'designation' => $designation,
        ]);
    }

    public function updateDesignation(Request $request) {
        $designation               = Designation::find($request->designation_id);
        $designation->admin_id = $request->admin_id;
        $designation->name = $request->name;
        $designation->status = $request->status;

        $designation->save();

        return redirect(route('admin.manage.designation'))->with('message','Successfully Updated!');
    }

    public function deleteDesignation(Request $request) {
        $designation = Designation::find($request->designation_id);
        $designation->delete();

        return redirect(route('admin.manage.designation'))->with('message','Successfully Deleted!');
    }
}
