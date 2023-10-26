<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'key',
        'imgable_id',
        'imgable_type'
    ];

}
