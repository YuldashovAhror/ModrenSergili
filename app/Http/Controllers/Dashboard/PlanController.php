<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Http\Request;

class PlanController extends BaseController
{
    private $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function store(Request $request)
    {
        $this->planService->store($request);
        return redirect()->route('dashboard.building.plans', $request->building_id);
    }

    public function create($building_id)
    {
        return view('dashboard.plan.create', compact('building_id'));
    }

    public function edit($id)
    {
        $plan = Plan::with(['imgMain', 'img3d', 'wordName'])->find($id);
        return view('dashboard.plan.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $this->planService->update($request, $id);
        return redirect()->route('dashboard.building.plans', $request->building_id);
    }

    public function destroy($id)
    {
        $this->planService->destroy($id);
        return back();
    }
}
