<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::with(['imgMain'])->orderBy('id')->get();
        return view('dashboard.project.index', compact('projects'));
    }

    public function buildings($id)
    {
        $project = Project::with(['imgPlan', 'svg', 'wordName'])->find($id);
        return view('dashboard.building.buildings', compact('project'));
    }

    public function create()
    {
        return view('dashboard.project.create');
    }

    public function store(Request $request)
    {
        $this->projectService->store($request);
        return back();
    }

    public function edit($id)
    {
        $project = Project::with(['imgMain', 'imgPlan', 'svg', 'wordName', 'wordStatus', 'wordAbout'])->find($id);
       return view('dashboard.project.edit', compact('project'));
    }

    public function update(Request $request,$id)
    {
       $this->projectService->update($request, $id);
       return back();
    }
}
