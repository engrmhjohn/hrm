<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontEnd.home.index', [
            'packages' => Package::all()
        ]);
    }
}
