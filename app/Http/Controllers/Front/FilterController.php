<?php

namespace App\Http\Controllers\Front;

use App\Models\Plan;
use Illuminate\Http\Request;

class FilterController extends BaseController
{
    public function filter(Request $request)
    {
        $plans = Plan::with('imgMain', 'img3d')
            ->where('building_id', $request->get('building_id'))
            ->where('number_of_rooms', $request->get('number_of_rooms'))
            ->where('type', $request->get('type'))->get();
        if (count($plans) === 0){
            $data = [];
        }else{
            foreach ($plans as $plan){
                $data[] = [
                  'id' => $plan->id,
                  'imgMain' => $plan->imgMain->img,
                  'img3d' => $plan->img3d->img,
                  'name' => $plan->name,
                  'price_from' => $plan->price_from,
                  'area' => $plan->area,
                  'roms' => $plan->rooms
                ];
            }
        }
        return response()->json($data);

    }
}
