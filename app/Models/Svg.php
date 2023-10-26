<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Svg extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'coordinates',
        'viewBox'
    ];

    public function building()
    {
        return $this->hasOne(Building::class, 'svg_id');
    }
}
