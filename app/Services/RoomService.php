<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomService
{
    public function store($request, $plan_id)
    {
        try{
            DB::beginTransaction();

            foreach ($request['name'] as $key=>$value){
                if(empty(Word::where('page', 'room')->where('key', $value)->first())){
                    $word = Word::create([
                        'key'=>$value,
                        'word_ru'=>$value,
                        'word_uz'=>$value,
                        'word_en'=>$value,
                        'page'=>'room'
                    ]);

                    Room::create([
                        'plan_id' => $plan_id,
                        'word_id' => $word->id,
                        'size' => $request['area'][$key]
                    ]);
                }else{

                    $word_id = Word::where('key', $value)->pluck('id')->first();
                    Room::create([
                        'plan_id' => $plan_id,
                        'word_id' => $word_id,
                        'area' => $request['area'][$key]
                    ]);
                }
            }

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception;
        }

    }

    public function update($request, $plan_id)
    {
        Room::where('plan_id', $plan_id)->delete();
        $this->store($request, $plan_id);
        return back();
    }
}
