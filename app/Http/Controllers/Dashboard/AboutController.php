<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function index()
    {
        $about = About::find(1);
        return view('dashboard.about.edit', [
            'about'=>$about
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => '|image|mimes:jpeg,png,jpg,gif|max:20480',
            'second_photo' => '|image|mimes:jpeg,png,jpg,gif|max:20480',
            'description_uz' => 'nullable',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
        ]);

        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\About', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'img/about');
        }
        if (!empty($validatedData['second_photo'])) {
            $this->fileDelete('\About', $id, 'second_photo');
            $validatedData['second_photo'] = $this->photoSave($validatedData['second_photo'], 'img/about');
        }
        About::find($id)->update($validatedData);

        return redirect()->route('dashboard.about.index')->with('success', 'Data updated successfully.');
    }

}
