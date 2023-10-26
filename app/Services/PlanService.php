<?php

namespace App\Services;

use App\Models\Plan;
use App\Services\RoomService;
use Illuminate\Support\Facades\DB;

class PlanService extends BaseService
{
    private $model = 'App\Models\Plan';
    private $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function store($request)
    {
        try{
            DB::beginTransaction();
            $plan = Plan::create([
                'building_id' => $request->building_id,
                'type' => $request->type,
                'number_of_rooms' => $request->number_of_rooms,
                'name' => $request->name_ru,
                'price_from' => $request->price_from,
                'area' => $request->total_area,
                'rooms' => $request->rooms
            ]);

//       Word create
            $this->saveWord($request->only(['name_ru', 'name_uz', 'name_en']), $this->model, $plan->id, 'name');

//        Photo create
            $this->photoSave($request->file('photo_plan'), 'img/plan_img', $this->model, $plan->id, 'plan');
            $this->photoSave($request->file('photo_3d'), 'img/plan_3d', $this->model, $plan->id, '3d');

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception;
        }

    }

    public function update($request, $id)
    {

        $plan = Plan::with(['imgMain', 'img3d', 'wordName'])->find($id);

        try{
            DB::beginTransaction();
            $plan->update([
                'name' => $request->name_ru,
                'number_of_rooms' => $request->number_of_rooms ?? null,
                'price_from' => $request->price_from,
                'area' => $request->total_area,
                'rooms' => $request->rooms
            ]);

            if ($request->hasfile('photo_plan')){
                $this->photoUpdate($request->file('photo_plan'), 'img/plan_img', $plan->imgMain->id);
            }

            if ($request->hasfile('photo_3d')){
                $this->photoUpdate($request->file('photo_3d'), 'img/plan_3d', $plan->img3d->id);
            }

            $plan->wordName->update([
                'key' => $request->name_ru,
                'word_ru' => $request->name_ru,
                'word_uz' => $request->name_uz,
                'word_en' => $request->name_en,
            ]);
            $plan->save();

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception;
        }
    }

    public function destroy($id)
    {
        $plan = Plan::with(['imgMain', 'img3d', 'wordName', 'rooms'])->find($id);

        $this->photoDelete($plan->imgMain->id);
        $this->photoDelete($plan->img3d->id);

        $this->imgMain()->delete();
        $this->img3d()->delete();
        $plan->wordName()->delete();
        $plan->rooms()->delete();

        $plan->delete();

        return back();
    }
}
