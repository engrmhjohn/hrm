<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\OrderInfo;

class PackageController extends Controller
{
    public function package(){
        return view('admin.package.show');
    }
    public function savePackage(Request $request){
       $package = new Package();
       $package->name = $request->name;
       $package->price = $request->price;
       $package->image = image_upload($request->image);
       $package->user = $request->user;
       $package->validity = $request->validity;
       $package->status = $request->status;
       $package->save();
       return redirect(route('admin.manage.package'))->with('message','Successfully Added!');
    }
    public function managePackage() {
        return view('admin.package.index', [
            'packages' => Package::all(),
        ]);
    }

    public function editPackage($id) {
        $package = Package::find($id);

        return view('admin.package.edit', [
            'package' => $package,
        ]);
    }

    public function updatePackage(Request $request) {
        $package               = Package::find($request->package_id);
        $package->name = $request->name;
        $package->price = $request->price;
        $package->user = $request->user;
        $package->validity = $request->validity;
        $package->status = $request->status;
        if ($request->file('image')) {
            if ($package->image) {
                Storage::delete($package->image);
            }
            $package->image = image_upload($request->image);
        }
        $package->save();

        return redirect(route('admin.manage.package'))->with('message','Successfully Updated!');
    }

    public function deletePackage(Request $request) {
        $package = Package::find($request->package_id);
        $package->delete();

        return redirect(route('admin.manage.package'))->with('message','Successfully Deleted!');
    }

    public function soldPackage(){
        return view('admin.package.sold_package',[
            'sold_items' => OrderInfo::all()
        ]);
    }

    public function deleteSoldPackage(Request $request) {
        $sold_item = OrderInfo::find($request->sold_item_id);
        $sold_item->delete();

        return redirect(route('admin.sold.package'))->with('message','Successfully Deleted!');
    }
}
