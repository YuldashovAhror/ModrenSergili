<?php

namespace App\Services;

use App\Models\Advantage;
use function Termwind\paragraph;

class AdvantageService extends BaseService
{

    private $model = 'App\Models\Advantage';

    public function store($request)
    {

       $advantage = Advantage::create([
          'project_id' => $request->project_id,
          'title' => $request->title_ru,
       ]);

       if($request->hasFile('photo'))
       {
           $this->photoSave($request->file('photo'), 'img/advantage_img', $this->model, $advantage->id, 'photo');
       }

        $this->saveWord($request->only('title_ru', 'title_uz', 'title_en'), $this->model, $advantage->id, 'title');

        $this->saveItem($request->only(['item_ru', 'item_uz', 'item_en']), $advantage->id);


        return back();
    }

    public function update($request, $id)
    {
        $advantage = Advantage::with(['img', 'wordTitle', 'wordItem'])->find($id);

        $advantage->update([
            'title' => $request->title_ru,
        ]);

        if($request->hasFile('photo'))
        {
            $this->photoUpdate($request->file('photo'), 'img/advantage_img', $advantage->img->id);
        }

        $advantage->wordTitle->update([
            'key' => $request->title_ru,
            'word_ru' => $request->title_ru,
            'word_uz' => $request->title_uz,
            'word_en' => $request->title_en,
        ]);
        $advantage->save();

        $advantage->wordItem()->delete();

        $this->saveItem($request->only(['item_ru', 'item_uz', 'item_en']), $id);

        return back();
    }

    public function destroy($id)
    {
        $advantage = Advantage::with(['img','wordTitle', 'wordItem'])->find($id);

        $this->photoDelete($advantage->img->id);

        $advantage->img()->delete();
        $advantage->wordTitle()->delete();
        $advantage->wordItem()->delete();

        $advantage->delete();

        return back();
    }

    private function saveItem($request, $advantage_id)
    {
        for($i=0; $i<count($request['item_ru']); $i++)
        {
            $arr = [
                'item_ru' => $request['item_ru'][$i],
                'item_uz' => $request['item_uz'][$i],
                'item_en' => $request['item_en'][$i],
            ];
            $this->saveWord($arr, $this->model, $advantage_id, 'item');
        }
    }
}