<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\Plan;
use App\Models\Project;
use App\Services\BuildingService;
use Illuminate\Http\Request;

class BuildingController extends BaseController
{
    private $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
        $this->middleware('auth');
    }

    public function plans($id)
    {
        $building_id = $id;
        $rooms = ['1' => '1 комнатная', '2' => '2 комнатная', '3' => '3 комнатная', '4' => '4 комнатная', '5' => '5 комнатная'];
        $plans = collect(Plan::with(['imgMain', 'img3d'])->where('building_id', $id)->get());
        return view('dashboard.plan.index', compact('rooms','plans', 'building_id'));
    }

    public function show($id)
    {
        if(Building::where('svg_id', $id)->first())
        {
            return $this->edit($id);
        }else{
            return $this->create();
        }
    }

    public function create()
    {
        return view('dashboard.building.create');
    }

    public function store(Request $request)
    {
        $this->buildingService->store($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->buildingService->update($request, $id);
        return back();
    }

    public function edit($id)
    {
        $building = Building::with('wordName')->where('svg_id', $id)->first();
        return view('dashboard.building.edit', compact('building'));
    }
}
