<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\NewPromotion;
use App\Services\NewPromotionService;
use Illuminate\Http\Request;

class NewPromotionController extends Controller
{
    private $newPromotionService;

    public function __construct(NewPromotionService $newPromotionService)
    {
        $this->newPromotionService = $newPromotionService;
    }

    public function index()
    {
        $newPromotions = NewPromotion::with(['photo', 'wordTitle', 'wordDescription'])->get();
        return view('dashboard.new_promotion.index', compact('newPromotions'));
    }

    public function create()
    {
        return view('dashboard.new_promotion.create');
    }

    public function edit($id)
    {
        $newPromotion = NewPromotion::with(['photo', 'wordTitle', 'wordDescription'])->find($id);
        return view('dashboard.new_promotion.edit', compact('newPromotion'));
    }

    public function store(Request $request)
    {
        $this->newPromotionService->store($request);
        return redirect()->route('dashboard.new_promotion.index');
    }

    public function update(Request $request, $id)
    {
        $this->newPromotionService->update($request, $id);
        return $this->index();
    }

    public function destroy($id)
    {
        $this->newPromotionService->destroy($id);
        return back();
    }
}
