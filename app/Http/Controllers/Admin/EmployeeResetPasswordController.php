<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeResetPasswordController extends Controller
{
    public function resetPassword(Request $request) {
        return view('backend.auth.reset-password', ['request' => $request]);
    }

    public function storeForgotPassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:8', Rules\Password::defaults(),
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $password = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$password) {
            return redirect()->back()->withToastInfo('Something went wrong, Invalid token or email!!');
        }

        $admin = User::where('email', $request->email)->first();

        if ($admin && $password) {
            $admin->update(['password' => bcrypt($request->password)]);

            $password = DB::table('password_resets')->where('email', $request->email)->delete();

            return redirect()->route('admin.auth.login')->with('message','New password reset successfully!!');
        } else {
            return redirect()->back()->with('error','The email is no longer our record!!');
        }

    }
}
