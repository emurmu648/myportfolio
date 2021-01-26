<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Brian2694\Toastr\Facades\Toastr;

class AboutController extends Controller
{
    public function addAbout()
    {
        return view('admin.about.add-about');
    }
    public function createAbout(Request $request)
    {
        $this->validate($request,[
            'about_name' => 'required',
            'about_description' => 'required|max:200',
            'about_image' => 'required|max:2048',
            'status' => 'required',

        ]);
        $about_img = $request->file('about_image');
        if($about_img){
            $img_name = uniqid().'-'.date('dmY');
            $img_ext =strtolower($about_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/about/';
            $url =$upload_path.$full_img;
            $about_img->move($upload_path,$full_img);
        }
        $about = new About();
        $about->about_name          = $request->about_name;
        $about->about_description   = $request->about_description;
        $about->about_image         = $url;
        $about->status              = $request->status;
        $about->save();


        Toastr::success('About info created', 'success',["closeButton"=>true, "progressBar"=>true]);
        return redirect()->back();

    }

    public function manageAbout (){
        return view('admin.about.manage-about',[
            'abouts' => About::latest()->paginate(4)
        ]);
    }

    public function editAbout($id){
        return view('admin.about.edit-about',[
            'about' => About::find($id)
        ]);
    }

    public function updateAbout(Request $request){


        $this->validate($request,[
            'about_description' => 'max:200',
            'about_image' => 'max:2048',

        ]);

        $about = About::find($request->id);

        $about_img = $request->file('about_image');
        if($about_img) {
            if (file_exists($about->about_image)){
                unlink($about->about_image);
            }

            $img_name = uniqid().'-'.date('dmY');
            $img_ext =strtolower($about_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/about/';
            $url =$upload_path.$full_img;
            $about_img->move($upload_path,$full_img);
        }
        $about->about_name = $request->about_name;
        $about->about_description = $request->about_description;
        if (isset($about_img)) {
            $about->about_image = $url;
        }

        $about->status = $request->status;
        $about->save();


        Toastr::success('About info updated', 'success',["closeButton"=>true, "progressBar"=>true]);
        return redirect()->route('about.manage');
    }

    public function deleteAbout($id){
        $about = About::find($id);
        if (file_exists($about->about_image)){
            unlink($about->about_image);
        }

        $about->delete();

        Toastr::success('About info deleted','success', ["closeButton"=>true,"progressBar"=>true]);
        return redirect()->back();
    }
}
