<?php

namespace App\Services;

use App\Models\Img;

class SliderService extends BaseService
{
    public function store($request)
    {
       $this->photoSave($request->file('photo'), 'img/slider_img', 'App\Models\Project', $request->project_id, 'slider');
       return back();
    }

    public function update($request, $id)
    {
        $this->photoUpdate($request->file('photo'), 'img/slider_img', $id);
        return back();
    }

    public function destroy($id)
    {
        $this->photoDelete($id);
        Img::find($id)->delete();
        return back();
    }
}