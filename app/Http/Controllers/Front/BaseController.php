<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Gallery;
use App\Models\NewPromotion;
use App\Models\Project;
use App\Traits\DestroyTrait;
use App\Traits\PhotoTrait;
use App\Traits\StoreTrait;
use App\Traits\UpdateTrait;

class BaseController extends Controller
{
    public function index()
    {
        if (session()->get('locale') == '') {
            session()->put('locale', 'ru');
            app()->setLocale('ru');
        } else {
            app()->setLocale(session()->get('locale'));
        }
        $lang = session()->get('locale');
        $gallery = Gallery::orderBy('id', 'desc')->take(5)->inRandomOrder()->get();
        $projects = Project::with(['imgMain', 'wordStatus', 'wordName', 'wordLocation'])->orderBy('id')->get();
        $news = NewPromotion::with(['photo', 'wordTitle', 'wordDescription'])->orderBy('id', 'desc')->get();
        $about = About::find(1);
        return view('front.welcome', compact('lang', 'projects', 'news', 'gallery', 'about'));
    }
}
