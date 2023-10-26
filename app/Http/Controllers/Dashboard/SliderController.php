<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends BaseController
{
    private $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
        $this->middleware('auth');
    }

    public function crud($project_id)
    {
        $project = Project::with('imgSlider')->find($project_id);
        return view('dashboard.slider.crud', ['slides' => $project->imgSlider]);
    }

    public function store(Request $request)
    {
        $this->sliderService->store($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->sliderService->update($request, $id);
        return back();
    }

    public function destroy($id)
    {
        $this->sliderService->destroy($id);
        return back();
    }
}
