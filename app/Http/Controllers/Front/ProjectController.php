<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Plan;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $plans = Plan::with('imgMain', 'img3d')
            ->where('building_id', 10)
            ->where('number_of_rooms', 3)
            ->where('type', 'residential')->get();
            return view('front.project.data', [
                'plans'=>$plans,
                'projects'=>$projects,
            ]);
    }

    public function show($id)
    {
        $project = Project::with(['svg.building', 'imgMain', 'imgPlan', 'imgSlider', 'advantages', 'placesNearly', 'buildings'])->find($id);
        $plans = Plan::where('building_id', $project->buildings->first()->id)->where('type', 'residential')->where('number_of_rooms', 1)->get();
        return view('front.project.single', compact('project', 'plans'));
    }
}
