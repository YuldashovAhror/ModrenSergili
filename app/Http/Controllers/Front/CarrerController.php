<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CategoryVacancy;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class CarrerController extends Controller
{
    public function index()
    {
        $active = 0;
        $vacansies = Vacancy::orderBy('id', 'desc')->get();
        $category_vacancies = CategoryVacancy::orderBy('id', 'desc')->get();
        return view('front.career', [
            'vacansies'=>$vacansies,
            'category_vacancies'=>$category_vacancies,
            'active'=>$active,
        ]);
    }

    public function show($id)
    {
        $vacansies = Vacancy::where('category_id', $id)->get();
        $category_vacancies = CategoryVacancy::orderBy('id', 'desc')->get();
        return view('front.career', [
            'category_vacancies'=>$category_vacancies,
            'vacansies'=>$vacansies,
            'active'=>$id,
        ]);
    }
}
