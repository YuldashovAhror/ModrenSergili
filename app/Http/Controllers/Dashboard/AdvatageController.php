<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Advatege;
use App\Services\AdvantageService;
use Illuminate\Http\Request;

class AdvatageController extends BaseController
{
    private $advantageService;

    public function __construct(AdvantageService $advantageService)
    {
        $this->advantageService = $advantageService;
    }

    public function index($project_id)
    {
        $advantages = Advantage::with(['img'])->where('project_id', $project_id)->get();
        return view('dashboard.advantage.index', compact('advantages', 'project_id'));
    }

    public function create($id)
    {
        $project_id = $id;
        return view('dashboard.advantage.create', compact('project_id'));
    }

    public function store(Request $request)
    {
        $this->advantageService->store($request);
        return $this->index($request->project_id);
    }

    public function edit($id)
    {
        $advantage = Advantage::with(['img', 'wordTitle', 'wordItem'])->find($id);
        return view('dashboard.advantage.edit', compact('advantage'));
    }

    public function update(Request $request, $id)
    {
        $this->advantageService->update($request, $id);
        return $this->index($request->project_id);
    }

    public function destroy($id)
    {
        $this->advantageService->destroy($id);
        return back();
    }


}
