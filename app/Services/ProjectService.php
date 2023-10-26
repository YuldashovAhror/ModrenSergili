<?php

namespace App\Services;

use App\Exceptions\ProjectException;
use App\Models\Img;
use App\Models\Project;
use http\Env\Request;
use http\Env\Response;
use Illuminate\Support\Facades\DB;

class ProjectService extends BaseService
{
    protected $model = 'App\Models\Project';

    public function store($request)
    {
        try{
            DB::beginTransaction();

//        Project Create
            $project = Project::create([
                'name' => $request->name_ru,
                'status' => $request->status_ru,
                'about' => $request->about_ru,
                'location' => $request->location_ru,
                'area_from' => $request->area_from,
                'area_to' => $request->area_to,
                'price_from' => $request->price_from,
            ]);

//        Add to Words
            $this->saveWord($request->only(['name_ru', 'name_uz', 'name_en']), $this->model, $project->id, 'name');
            $this->saveWord($request->only(['about_ru', 'about_uz', 'about_en']), $this->model, $project->id, 'about');
            $this->saveWord($request->only(['status_ru', 'status_uz', 'status_en']), $this->model, $project->id, 'status');
            $this->saveWord($request->only(['location_ru', 'location_uz', 'location_en']), $this->model, $project->id, 'location');

//        Photo Save
            if (!empty($request->file('photo'))) {
                $this->photoSave($request->file('photo'), 'img/project_img', $this->model, $project->id, 'main');
            }
            if (!empty($request->file('photo_plan'))) {
                $this->photoSave($request->file('photo_plan'), 'img/plan_img', $this->model, $project->id, 'plan');
            }

//        Svg Save
            if (!empty($request->file('svg'))) {
                $this->svgSave($request->file('svg'),'svg/plan_svg', $project->id);
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        return back();
    }

    public function update($request, $id)
    {
        $project = Project::with(['imgMain', 'imgPlan', 'svg', 'wordName', 'wordStatus', 'wordAbout', 'wordLocation'])->find($id);

        $project->update([
            'name' => $request->name_ru,
            'status' => $request->status_ru,
            'about' => $request->about_ru,
            'location' => $request->location_ru,
            'area_from' => $request->area_from,
            'area_to' => $request->area_to,
            'price_from' => $request->price_from,
        ]);

        $project->wordName->update([
            'key' => $request->name_ru,
            'word_ru' => $request->name_ru,
            'word_uz' => $request->name_uz,
            'word_en' => $request->name_en,
        ]);

        $project->wordStatus->update([
            'key' => $request->status_ru,
            'word_ru' => $request->status_ru,
            'word_uz' => $request->status_uz,
            'word_en' => $request->status_en,
        ]);

        $project->wordAbout->update([
            'key' => $request->about_ru,
            'word_ru' => $request->about_ru,
            'word_uz' => $request->about_uz,
            'word_en' => $request->about_en,
        ]);

        $project->wordLocation->update([
            'key' => $request->location_ru,
            'word_ru' => $request->location_ru,
            'word_uz' => $request->location_uz,
            'word_en' => $request->location_en,
        ]);

//        Photo Update
        if (!empty($request->file('photo'))) {
            $this->photoUpdate($request->file('photo'), 'img/project_img', $project->imgMain->id);
        }
        if (!empty($request->file('photo_plan'))) {
            $this->photoUpdate($request->file('photo_plan'), 'img/plan_img', $project->imgPlan->id);
        }

//        Svg Save
        if (!empty($request->file('svg'))) {
            $this->svgSave($request->file('svg'),'svg/plan_svg', $project->id, 'update');
        }


        return back();
    }
}