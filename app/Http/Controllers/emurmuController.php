<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Services;
use App\Project;

class emurmuController extends Controller
{
    public function index()
    {
        return view('emurmu.index',[
            'about'=>About::where('status',1)->first(),
            'services'=>Services::where('status',1)->get(),
            'projects'=>Project::where('status',1)->get()
        ]);
    }
}
