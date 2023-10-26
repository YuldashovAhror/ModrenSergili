<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'about',
        'location',
        'area_from',
        'area_to',
        'price_from'
    ];

    public $arr = [];
    public $words = [];

    public function svg()
    {
        return $this->hasMany(Svg::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'project_id');
    }

    public function buildings()
    {
        return $this->hasManyThrough(Building::class, Svg::class);
    }

    public function advantages()
    {
        return $this->hasMany(Advantage::class);
    }

    public function placesNearly()
    {
        return $this->hasMany(PlacesNearby::class);
    }

    public function imgMain()
    {
        return $this->morphOne(Img::class, 'imgable')->where('key', 'main');
    }

    public function imgPlan()
    {
        return $this->morphOne(Img::class, 'imgable')->where('key', 'plan');
    }

    public function imgSlider()
    {
        return $this->morphMany(Img::class, 'imgable')->where('key', 'slider');
    }

    public function wordName()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'name');
    }

    public function wordStatus()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'status');
    }

    public function wordAbout()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'about');
    }

    public function wordLocation()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'location');
    }
}
