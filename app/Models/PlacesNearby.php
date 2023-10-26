<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacesNearby extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name'
    ];

    public function photo()
    {
        return $this->morphOne(Img::class, 'imgable');
    }

    public function wordName()
    {
        return $this->morphOne(Word::class, 'wordable');
    }


}
