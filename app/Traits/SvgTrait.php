<?php

namespace App\Traits;

use App\Models\Svg;
use Illuminate\Support\Str;

trait SvgTrait
{
    private function svgUpload($svg, $directory)
    {
        $svg_name = Str::random(10);
        $svg->move(public_path() . '/'. $directory .'/', $svg_name .  '.' . $svg->getClientOriginalExtension());
        $svg = $directory . '/' . $svg_name .  '.' . $svg->getClientOriginalExtension();
        return $svg;
    }
    private function svgDelete($id)
    {
        Svg::where('project_id', $id)->delete();
        return back();
    }

    protected function svgSave($svg, $directory, $id, $status = null)
    {
        if($status){
            $this->svgDelete($id);
        }

        $svg = $this->svgUpload($svg, $directory);

        $file = simplexml_load_file($svg);
        $viewBox = $file->attributes()->viewBox;
        foreach ($file as $item => $i) {
            Svg::create([
                'project_id' => $id,
                'coordinates' => $i['d'],
                'viewBox' => $viewBox
            ]);
        }
        unlink(public_path() . '/' . $svg);
        return back();
    }


}