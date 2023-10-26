<?php

namespace App\Services;

use App\Models\NewPromotion;

class NewPromotionService extends BaseService
{
    private $model = 'App\Models\NewPromotion';

    public function store($request)
    {
        try{
            $new_promotion = NewPromotion::create([
                'type' => $request->type,
                'title' => $request->title_ru,
                'description' => $request->description_ru
            ]);

//        Add to Words
            $this->saveWord($request->only(['title_ru', 'title_uz', 'title_en']), $this->model, $new_promotion->id, 'title');
            $this->saveWord($request->only(['description_ru', 'description_uz', 'description_en']), $this->model, $new_promotion->id, 'description');

//        Photo Save
            if (!empty($request->file('photo'))) {
                $this->photoSave($request->file('photo'), 'img/new_promotion_img', $this->model, $new_promotion->id, 'photo');
            }

        }catch (\Exception $e) {
            return $e;

        }

        return back();
    }

    public function update($request, $id)
    {
        $new_promotion = NewPromotion::with(['photo', 'wordTitle', 'wordDescription'])->find($id);

        $new_promotion->update([
            'type' => $request->type,
            'title' => $request->title_ru,
            'description' => $request->description_ru
        ]);

        $new_promotion->wordTitle->update([
            'key' => $request->title_ru,
            'word_ru' => $request->title_ru,
            'word_uz' => $request->title_uz,
            'word_en' => $request->title_en,
        ]);

        $new_promotion->wordDescription->update([
            'key' => $request->description_ru,
            'word_ru' => $request->description_ru,
            'word_uz' => $request->descrtiption_uz,
            'word_en' => $request->description_en,
        ]);

//        Photo Update
        if (!empty($request->file('photo'))) {
            if(!empty( $new_promotion->photo->id)){
                $this->photoUpdate($request->file('photo'), 'img/new_promotion_img', $new_promotion->photo->id);
            }else{
                $this->photoSave($request->file('photo'), 'img/new_promotion_img', $this->model, $new_promotion->id, 'photo');
            }
            
        }

        return back();
    }

    public function destroy($id)
    {

        $new_promotion = NewPromotion::with(['photo', 'wordTitle', 'wordDescription'])->find($id);

        $this->photoDelete($new_promotion->photo->id);

        $new_promotion->photo()->delete();

        $new_promotion->wordTitle()->delete();
        $new_promotion->wordDescription()->delete();

        $new_promotion->delete();

        return back();

    }
}
