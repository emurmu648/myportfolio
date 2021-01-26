<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Services;

class ServicesController extends Controller
{
    public function addServices(){
        return view('admin.services.add-services');
    }

    public function createServices(Request $request){
        $this->validate($request,[
            'services_name' => 'required',
            'services_description' => 'required|max:2000',
            'services_image' => 'required|max:2048',
            'status' => 'required'
        ]);

        $services_img = $request->file('services_image');
        if ($services_img) {
            $img_name = uniqid().'-'.date('dmy');
            $img_ext = strtolower($services_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/services/';
            $url = $upload_path.$full_img;
            $services_img->move($upload_path,$full_img);
        }

        $services = new Services();
        $services->services_name = $request->services_name;
        $services->services_description = $request->services_description;
        $services->services_image = $url;
        $services->status = $request->status;
        $services->save();


        Toastr::success('Services info created', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->back();

    }

    public function manageServices(){
        return view('admin.services.manage-services',[
            'servicesinfo'=>Services::latest()->paginate(3)
        ]);
    }

    public function editServices($id){
        return view('admin.services.edit-services',[
            'services' => Services::find($id)
        ]);
    }

    public function updateServices(Request $request){



        $this->validate($request,[
            'services_description' => 'max:2000',
            'services_image' => 'max:2048',
        ]);

        $services = Services::find($request->id);

        $services_img = $request->file('services_image');
        if ($services_img) {
            if (file_exists($services->services_image)) {
                unlink($services->services_image);
            }


            $img_name = uniqid().'-'.date('dmy');
            $img_ext = strtolower($services_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/services/';
            $url = $upload_path.$full_img;
            $services_img->move($upload_path,$full_img);
        }

        $services->services_name = $request->services_name;
        $services->services_description = $request->services_description;
        if (isset($services_img)) {
            $services->services_image = $url;
        }
        $services->status = $request->status;
        $services->save();


        Toastr::success('Services info updated', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->route('services.manage');
    }

    public function deleteServices($id)
    {
        $services = Services::find($id);
        if (file_exists($services->services_image)){
            unlink($services->services_image);
        }

        $services->delete();
        Toastr::success('Services info deleted', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->back();
    }

}
