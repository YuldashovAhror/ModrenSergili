<?php

namespace App\Traits;

use App\Models\Img;
use App\Models\Svg;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait PhotoTrait
{
    private function photoUpload($photo, $directory)
    {
        $height = Image::make($photo)->height();
        $width = Image::make($photo)->width();

        $photoPath = '/' . $directory . '/' . Str::random(10) . '.webp';

        if (file_exists(public_path($directory))){
            Image::make($photo)->encode('webp', 90)->resize($width, $height)->save(public_path($photoPath));
        }else{
            mkdir(public_path($directory), 0700, true);
            Image::make($photo)->encode('webp', 90)->resize($width, $height)->save(public_path($photoPath));
        }
        return $photoPath;
    }

    protected function photoSave($photo, $directory, $model, $id, $key)
    {
        $photoPath = $this->photoUpload($photo, $directory);
        Img::create([
            'img' => $photoPath,
            'key' => $key,
            'imgable_id' => $id,
            'imgable_type' => $model
        ]);
        return back();
    }

    protected function photoUpdate($photo, $directory, $id)
    {
        $this->photoDelete($id);
        $photoPath = $this->photoUpload($photo, $directory);

        Img::find($id)->update([
            'img' => $photoPath,
        ]);

        return back();
    }

    protected function photoDelete($id)
    {
        if (is_file(public_path(Img::find($id)->img))){
            unlink(public_path() . Img::find($id)->img);
        }
        return back();
    }


    protected function videoSave($video, $directory)
    {
        $videoName = Str::random(10) . '.' . $video->getClientOriginalExtension();

        $video->move(public_path() . '/' . $directory . '/', $videoName);
        return '/' . $directory . '/' . $videoName;
    }

}