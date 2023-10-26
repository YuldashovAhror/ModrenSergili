<?php

namespace App\Services;

use App\Models\Building;

class BuildingService extends BaseService
{
    protected $model = 'App\Models\Building';

    public function store($request)
    {
        $building = Building::create([
            'svg_id' => $request->svg_id,
            'name' => $request->name_ru
        ]);
        $this->saveWord($request->only('name_ru', 'name_uz', 'name_en'), $this->model,$building->id, 'name');
        return back();
    }

    public function update($request, $id)
    {
        $building = Building::with('wordName')->find($id);

           $building->update([
                'name' => $request->name_ru,
            ]);
           $building->wordName->update([
               'word_ru' => $request->name_ru,
               'word_uz' => $request->name_uz,
               'word_en' => $request->name_en
           ]);
           return back();
    }
}