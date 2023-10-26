<?php

namespace App\Services;

use App\Models\PlacesNearby;
use http\Env\Request;

class PlacesNearbyService extends BaseService
{
    private $model = 'App\Models\PlacesNearby';

    public function store($request)
    {
        $placeNearby = PlacesNearby::create([
            'project_id' => $request->project_id,
            'name' => $request->name_ru
        ]);

        $this->photoSave($request->file('photo'), 'img/places_nearby_img', $this->model, $placeNearby->id, 'photo');
        $this->saveWord($request->only('name_ru', 'name_uz', 'name_en'), $this->model, $placeNearby->id, 'name');

        return back();
    }

    public function update($request, $id)
    {
        $placeNearby = PlacesNearby::with(['wordName', 'photo'])->find($id);
        $placeNearby->update([
            'name' => $request->name_ru
        ]);
        $placeNearby->wordName->update([
            'key' => $request->name_ru,
            'word_ru' => $request->name_ru,
            'word_uz' => $request->name_uz,
            'word_en' => $request->name_en,
        ]);
        if ($request->hasFile('photo')){
            $this->photoUpdate($request->file('photo'), 'img/places_nearby_img', $placeNearby->photo->id);
        }
        $placeNearby->save();
        return back();
    }
    public function destroy($id)
    {
        $placeNearby = PlacesNearby::with(['wordName', 'photo'])->find($id);

        $placeNearby->wordName()->delete();
        $this->photoDelete($placeNearby->photo->id);
        $placeNearby->photo()->delete();
        $placeNearby->delete();

        return back();
    }
}
