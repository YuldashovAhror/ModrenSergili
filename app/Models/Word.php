<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'page',
        'word_ru',
        'word_uz',
        'word_en',
        'wordable_id',
        'wordable_type',
        'const'
    ];


}
