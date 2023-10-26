<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PlacesNearby;
use App\Services\PlacesNearbyService;
use Illuminate\Http\Request;

class PlacesNearbyController extends Controller
{
    private $placesNearbyService;
    public function __construct(PlacesNearbyService $placesNearbyService)
    {
        $this->placesNearbyService = $placesNearbyService;
    }

    public function crud($project_id)
    {
        $placesNearby = PlacesNearby::where('project_id', $project_id)->with(['photo', 'wordName'])->get();
        return view('dashboard.places_nearby.crud', compact('placesNearby'));
    }

    public function store(Request $request)
    {
        $this->placesNearbyService->store($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->placesNearbyService->update($request, $id);
        return back();
    }

    public function destroy($id)
    {
        $this->placesNearbyService->destroy($id);
        return back();
    }

}
