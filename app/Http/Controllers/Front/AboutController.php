<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partner;
use App\Models\Project;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        $about = About::find(1);
        return view('front.about', [
            'partners'=>$partners,
            'projects'=>$projects,
            'about'=>$about,
        ]);
    }
}
