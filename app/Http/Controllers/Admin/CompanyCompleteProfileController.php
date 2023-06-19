<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class CompanyCompleteProfileController extends Controller
{
    public function companyProfile(){
        return view('admin.company_profile.profile');
    }

    public function editCompanyProfile($id){
        $profile = Admin::find($id);
        return view('admin.company_profile.edit',[
            'profile' => $profile
        ]);
    }

    public function updateCompanyProfile(Request $request){
        $profile = Admin::find($request->admin_id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->save();
        return redirect(route('admin.profile'))->with('message','Successfully Updated!');
    }
}
