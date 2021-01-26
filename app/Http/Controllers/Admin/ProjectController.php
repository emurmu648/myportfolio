<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Brian2694\Toastr\Facades\Toastr;

class ProjectController extends Controller
{
    public function addProject(){
        return view('admin.project.add-project');
    }

    public function createProject(Request $request){
        $this->validate($request,[
            'project_name' => 'required',
            'project_description' => 'required|max:2000',
            'project_image' => 'required|max:2048',
            'status' => 'required'
        ]);

        $project_img = $request->file('project_image');
        if ($project_img) {
            $img_name = uniqid().'-'.date('dmy');
            $img_ext = strtolower($project_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/project/';
            $url = $upload_path.$full_img;
            $project_img->move($upload_path,$full_img);
        }

        $project = new Project();
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->project_image = $url;
        $project->status = $request->status;
        $project->save();

        Toastr::success('Project info created', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->back();
    }

    public function manageProject(){
        return view('admin.project.manage-project',[
            'projects'=>Project::latest()->paginate(3)
        ]);
    }
    public function editProject($id){
        return view('admin.project.edit-project',[
            'projects'=>Project::find($id)
            ]);
    }

    public function updateProject(Request $request){
        $this->validate($request,[
            'project_description' => 'required|max:2000',
            'project_image' => 'required|max:2048',
        ]);
        $project = Project::find($request->id);

        $project_img = $request->file('project_image');
        if ($project_img) {
            if (file_exists($project->project_image)) {
                unlink($project->project_image);
            }
            $img_name = uniqid().'-'.date('dmy');
            $img_ext = strtolower($project_img->getClientOriginalExtension());
            $full_img = $img_name.'.'.$img_ext;
            $upload_path = './Image/project/';
            $url = $upload_path.$full_img;
            $project_img->move($upload_path,$full_img);
        }

        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        if (isset($project_img)) {
            $project->project_image = $url;
        }
        $project->status = $request->status;
        $project->save();

        Toastr::success('Project info updated', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->route('project.manage');
    }

    public function deleteProject($id){
        $project = Project::find($id);
            if (file_exists($project->project_image)) {
                unlink($project->project_image);
        }
        $project->delete();
        Toastr::success('Project info deleted', 'Success', ["closeButton" => true, "progressBar"=>true]);
        return redirect()->back();
    }
}
