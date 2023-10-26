<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\NewPromotion;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewPromotion::orderBy('id', 'desc')->get();
        return view('front.report.data', [
            'news'=>$news
        ]);
    }

    public function show($id)
    {
        $news = NewPromotion::orderBy('id', 'desc')->get();
        $new = NewPromotion::find($id);
        return view('front.report.data-single', [
            'new'=>$new,
            'news'=>$news,
        ]);
    }
}
