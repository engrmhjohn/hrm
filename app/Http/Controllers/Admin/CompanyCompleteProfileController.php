<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Helper\image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $profile->designation = $request->designation;
        if ($request->file('admin_image')) {
            if ($profile->image) {
                Storage::delete($profile->admin_image);
            }
            $profile->admin_image = image_upload($request->admin_image);
        }
        $profile->company_name = $request->company_name;
        $profile->company_phone = $request->company_phone;
        $profile->company_address = $request->company_address;
        $profile->company_type = $request->company_type;
        $profile->company_employee = $request->company_employee;
        if ($request->file('logo')) {
            if ($profile->logo) {
                Storage::delete($profile->logo);
            }
            $profile->logo = image_upload($request->logo);
        }
        $profile->save();
        return redirect(route('admin.profile'))->with('message','Successfully Updated!');
    }
}
