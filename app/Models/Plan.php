<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'number_of_rooms',
        'type',
        'name',
        'price_from',
        'area',
        'rooms'
    ];

    protected $casts = [
        'rooms' => 'array'
    ];

    public function imgMain()
    {
        return $this->morphOne(Img::class, 'imgable')->where('key','plan');
    }

    public function img3d()
    {
        return $this->morphOne(Img::class, 'imgable')->where('key','3d');
    }

    public function wordName()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'name');
    }

}
