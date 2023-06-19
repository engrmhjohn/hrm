<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Department;
use App\Models\Location;
use App\Models\Designation;
use App\Models\Shift;
use App\Models\PaySlip;
use App\Models\OrderInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeLoginController extends Controller
{
    public function createWorker()
    {
        $userId = auth()->user()->id;
        $departments = Department::where('admin_id', $userId)->where('status', 1)->get();

        $userId = auth()->user()->id;
        $locations = Location::where('admin_id', $userId)->get();

        $userId = auth()->user()->id;
        $designations = Designation::where('admin_id', $userId)->where('status', 1)->get();

        $userId = auth()->user()->id;
        $shifts = Shift::where('admin_id', $userId)->get();

        $userId = auth()->user()->id;
        $pay_slips = PaySlip::where('admin_id', $userId)->where('status', 1)->get();

        return view('admin.auth.show', [
            'departments' => $departments,
            'locations' => $locations,
            'designations' => $designations,
            'shifts' => $shifts,
            'pay_slips' => $pay_slips,
        ]);
    }

    public function storeWorker(Request $request)
    {
        //Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all())->withInput();
        }

        // Get the current admin's latest order info and check the user limit
        $orderInfo = OrderInfo::where('customer_id', auth()->user()->id)
            ->orderBy('transaction_id', 'desc')
            ->first();

        $userCount = User::where('admin_id', auth()->user()->id)->count();

        if ($userCount >= $orderInfo->package->user) {
            return redirect()->route('admin.auth.workerList')->with('message', 'User limit Reached for the Current Package!!');
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');

            if ($image_file) {
                $img_gen = hexdec(uniqid());
                $image_url = 'images/admin/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());
                $image_name = $img_gen . '.' . $image_ext;
                $final_name = $image_url . $img_gen . '.' . $image_ext;
                $image_file->move($image_url, $image_name);
            }
        }

        // Create a new worker instance
        $worker = new User();
        $worker->admin_id = auth()->user()->id;
        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->password = bcrypt($request->password);
        $worker->address = $request->address;
        $worker->gender = $request->gender;
        $worker->department_id = $request->department_id;
        $worker->designation_id = $request->designation_id;
        $worker->shift_id = $request->shift_id;
        $worker->pay_slip_id = $request->pay_slip_id;
        $worker->location_id = $request->location_id;
        $worker->salary = $request->salary;
        $worker->food_allowance = $request->food_allowance;
        $worker->other = $request->other;
        $worker->image = $final_name ?? '';
        $worker->status = $request->status;
        $worker->save();

        return redirect()->route('admin.auth.workerList')->with('message', 'New Worker Registered Successfully!!');
    }







    public function workerList()
    {
        $userId = auth()->user()->id;
        $employees = User::where('status', '1')
            ->where('admin_id', $userId)
            ->get();
        return view('admin.auth.index', [
            'employees' => $employees,
        ]);
    }


    // public function login()
    // {
    //     return view('admin.auth.login');
    // }


    // public function storeLogin(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect('/admin');
    //     }

    //     return redirect()->route('admin.auth.login')->with('message', 'Invalid Credentials!!');
    // }


    public function editWorker($worker)
    {
        $employee = User::find($worker);

        $userId = auth()->user()->id;
        $departments = Department::where('admin_id', $userId)->where('status', 1)->get();

        $userId = auth()->user()->id;
        $locations = Location::where('admin_id', $userId)->get();

        $userId = auth()->user()->id;
        $designations = Designation::where('admin_id', $userId)->where('status', 1)->get();

        $userId = auth()->user()->id;
        $shifts = Shift::where('admin_id', $userId)->get();

        $userId = auth()->user()->id;
        $pay_slips = PaySlip::where('admin_id', $userId)->where('status', 1)->get();

        return view('admin.auth.edit', [
            'employee' => $employee,
            'departments' => $departments,
            'locations' => $locations,
            'designations' => $designations,
            'shifts' => $shifts,
            'pay_slips' => $pay_slips,
        ]);
    }

    public function updateWorker(Request $request)
    {
        $worker               = User::find($request->worker_id);

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($worker->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen = hexdec(uniqid());
                $image_url = 'images/admin/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $final_name = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $worker->image = $final_name;
                $worker->save();
            }
        }

        $worker->admin_id = $request->admin_id;
        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->address = $request->address;
        $worker->gender = $request->gender;
        $worker->department_id = $request->department_id;
        $worker->designation_id = $request->designation_id;
        $worker->shift_id = $request->shift_id;
        $worker->pay_slip_id = $request->pay_slip_id;
        $worker->location_id = $request->location_id;
        $worker->salary = $request->salary;
        $worker->food_allowance = $request->food_allowance;
        $worker->other = $request->other;
        $worker->status = $request->status;
        $worker->update();

        return redirect()->route('admin.auth.workerList')->with('message', 'The Worker updated successfully!!');
    }

    public function deleteWorker(Request $request, User $worker)
    {
        $image_path = public_path($worker->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $worker->delete();

        return redirect()->back()->with('message', 'The Worker deleted successfully!!');
    }
    // public function logout(Request $request)
    // {

    //     Auth::guard('admin')->logout();

    //     return redirect()
    //         ->route('admin.auth.login')
    //         ->with('message', 'Logout Successful!!');
    // }
}
