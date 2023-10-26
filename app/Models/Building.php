<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'svg_id',
        'name'
    ];

    public function wordName()
    {
        return $this->morphOne(Word::class, 'wordable');
    }
}
