<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends BaseController
{
    public function index($project_id)
    {
        $galleries = Gallery::where('project_id', $project_id)->orderBy('id', 'desc')->get();
        return view('dashboard.gallery.crud', [
            'galleries'=>$galleries
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'data' => 'nullable',
            'project_id' => 'nullable',
        ]);

        if (!empty($validatedData['photo'])) {
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'img/gallery');
        }
        Gallery::create($validatedData);

        return back()->with('success', 'Successfully uploaded.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'data' => 'nullable',
            'project_id' => 'nullable',
        ]);

        if (!empty($validatedData['photo'])) {
            $this->fileDelete('\Gallery', $id, 'photo');
            $validatedData['photo'] = $this->photoSave($validatedData['photo'], 'img/gallery');
        }
        Gallery::find($id)->update($validatedData);
        return back()->with('success', 'Successfully uploaded.');
    }

    public function destroy($id)
    {
        $this->fileDelete('\Gallery', $id, 'photo');
        Gallery::find($id)->delete();
        return back();
    }
}
