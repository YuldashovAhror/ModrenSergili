<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Traits\WordTrait;
use Illuminate\Http\Request;

class CategoryVacancyController extends Controller
{
    use WordTrait;

    private $vacancyController;

    public function __construct(VacancyController $vacancyController)
    {
        $this->vacancyController = $vacancyController;
    }
    public function store(Request $request)
    {
        $category = \App\Models\CategoryVacancy::create([
            'name' => $request->name_ru
        ]);
        $this->saveWord($request->all(), 'App\Models\CategoryVacancy', $category->id, 'name');
        return back();
    }

    public function update(Request $request, $id)
    {
       $category = \App\Models\CategoryVacancy::with(['wordName'])->find($id);
       $category->update([
           'name' => $request->name_ru,
       ]);
       $category->wordName->update([
           'key' => $request->name_ru,
           'word_ru' => $request->name_ru,
           'word_uz' => $request->name_uz,
           'word_en' => $request->name_en,
       ]);
        return back();
    }

    public function destroy($id)
    {
        foreach (Vacancy::where('category_id', $id)->get() as $vacancy)
        {
            $this->vacancyController->destroy($vacancy->id);
        }
        \App\Models\CategoryVacancy::find($id)->delete();
        return back();
    }
}
