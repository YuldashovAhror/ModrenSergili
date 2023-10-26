<?php

namespace App\Services;

use App\Models\Vacancy;
use Illuminate\Support\Facades\DB;

class VacancyService extends BaseService
{
    private $model = 'App\Models\Vacancy';

    public function store($request)
    {
        try{
//        Project Create
            $vacancy = Vacancy::create([
                'category_id' => $request->category_id,
                'name' => $request->name_ru,
                'responsibility' => $request->responsibility_ru,
                'requirement' => $request->requirement_ru,
                'condition' => $request->condition_ru
            ]);

//        Add to Words
            $this->saveWord($request->only(['name_ru', 'name_uz', 'name_en']), $this->model, $vacancy->id, 'name');
            $this->saveWord($request->only(['responsibility_ru', 'responsibility_uz', 'responsibility_en']), $this->model, $vacancy->id, 'responsibility');
            $this->saveWord($request->only(['requirement_ru', 'requirement_uz', 'requirement_en']), $this->model, $vacancy->id, 'requirement');
            $this->saveWord($request->only(['condition_ru', 'condition_uz', 'condition_en']), $this->model, $vacancy->id, 'condition');

//        Photo Save
            if (!empty($request->file('photo'))) {
                $this->photoSave($request->file('photo'), 'img/vacancy_img', $this->model, $vacancy->id, 'photo');
            }


        }catch (\Exception $e) {
            return $e;

        }

        return back();
    }

    public function update($request, $id)
    {
        $vacancy = Vacancy::with(['photo', 'wordName', 'wordResponsibility', 'wordRequirement', 'wordCondition'])->find($id);

        $vacancy->update([
            'category_id' => $request->category_id,
            'name' => $request->name_ru,
            'responsibility' => $request->responsibility_ru,
            'requirement' => $request->requirement_ru,
            'condition' => $request->condition_ru,
        ]);

        $vacancy->wordName->update([
            'key' => $request->name_ru,
            'word_ru' => $request->name_ru,
            'word_uz' => $request->name_uz,
            'word_en' => $request->name_en,
        ]);

        $vacancy->wordResponsibility->update([
            'key' => $request->stat_ru,
            'word_ru' => $request->responsibility_ru,
            'word_uz' => $request->responsibility_uz,
            'word_en' => $request->responsibility_en,
        ]);

        $vacancy->wordRequirement->update([
            'key' => $request->requirement_ru,
            'word_ru' => $request->requirement_ru,
            'word_uz' => $request->requirement_uz,
            'word_en' => $request->requirement_en,
        ]);

        $vacancy->wordCondition->update([
            'key' => $request->condition_ru,
            'word_ru' => $request->condition_ru,
            'word_uz' => $request->condition_uz,
            'word_en' => $request->condition_en,
        ]);

//        Photo Update
        if (!empty($request->file('photo'))) {
            $this->photoUpdate($request->file('photo'), 'img/vacancy_img', $vacancy->photo->id);
        }

        return back();
    }

    public function destroy($id)
    {
        $plan = Vacancy::with(['photo', 'wordName', 'wordResponsibility', 'wordRequirement', 'wordCondition'])->find($id);

        $this->photoDelete($plan->photo->id);
        $this->photo()->delete();

        $plan->wordName()->delete();
        $plan->wordResponsibility()->delete();
        $plan->wordRequirement()->delete();
        $plan->wordCondition()->delete();

        $plan->delete();

        return back();
    }
}
