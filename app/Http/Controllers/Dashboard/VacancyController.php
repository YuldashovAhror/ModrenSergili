<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CategoryVacancy;
use App\Models\Vacancy;
use App\Services\VacancyService;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private $vacancyService;

    public function __construct(VacancyService $vacancyService)
    {
        $this->vacancyService = $vacancyService;
    }

    public function index()
    {
        $categories = CategoryVacancy::with(['vacancies', 'wordName'])->orderBy('id')->get();
        return view('dashboard.vacancy.index', compact('categories'));
    }

    public function create()
    {
        $categories = CategoryVacancy::with(['wordName'])->get();
        return view('dashboard.vacancy.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->vacancyService->store($request);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $this->vacancyService->update($request, $id);
        return back();
    }

    public function edit($id)
    {
        $categories = CategoryVacancy::with('wordName')->orderBy('id')->get();
        $vacancy = Vacancy::with(['photo', 'wordName', 'wordResponsibility', 'wordRequirement', 'wordCondition'])->find($id);
        return view('dashboard.vacancy.edit', compact('categories', 'vacancy'));
    }

    public function destroy($id)
    {
        $this->vacancyService->destroy($id);
        return back();
    }
}
