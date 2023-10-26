<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('front.gallery', [
            'galleries'=>$galleries,
            'projects'=>$projects,
            'active'=> 0,
        ]);
    }

    public function show($id)
    {
        $galleries = Gallery::where('project_id', $id)->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('front.gallery', [
            'galleries'=>$galleries,
            'projects'=>$projects,
            'active'=>$id,
        ]);
    }
}
