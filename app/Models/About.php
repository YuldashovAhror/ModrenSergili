<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'second_photo',
        'description_uz',
        'description_ru',
        'description_en',
    ];
}
