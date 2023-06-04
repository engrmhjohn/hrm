<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function adminProfile(){
        return view('backend.admin_info.admin_profile');
    }
    public function adminForm(){
        return view('backend.admin_info.form');
    }
}
