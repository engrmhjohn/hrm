<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaySlip;
use Illuminate\Http\Request;

class PaySlipController extends Controller
{
    public function paySlip(){
        return view('admin.pay_slip.show');
    }
    public function savePaySlip(Request $request){
       $pay_slip = new PaySlip();
       $pay_slip->name = $request->name;
       $pay_slip->status = $request->status;

       $pay_slip->save();
       return redirect(route('admin.manage.pay_slip'))->with('message','Successfully Added!');
    }
    public function managePaySlip() {
        return view('admin.pay_slip.index', [
            'pay_slips' => PaySlip::all(),
        ]);
    }

    public function editPaySlip($id) {
        $pay_slip = PaySlip::find($id);

        return view('admin.pay_slip.edit', [
            'pay_slip' => $pay_slip,
        ]);
    }

    public function updatePaySlip(Request $request) {
        $pay_slip               = PaySlip::find($request->pay_slip_id);
        $pay_slip->name = $request->name;
        $pay_slip->status = $request->status;

        $pay_slip->save();

        return redirect(route('admin.manage.pay_slip'))->with('message','Successfully Updated!');
    }

    public function deletePaySlip(Request $request) {
        $pay_slip = PaySlip::find($request->pay_slip_id);
        $pay_slip->delete();

        return redirect(route('admin.manage.pay_slip'))->with('message','Successfully Deleted!');
    }
}
