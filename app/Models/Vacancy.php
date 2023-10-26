<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'responsibility',
        'requirement',
        'condition'
    ];

    public function photo()
    {
        return $this->morphOne(Img::class, 'imgable');
    }

    public function wordName()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'name');
    }

    public function wordResponsibility()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'responsibility');
    }

    public function wordRequirement()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'requirement');
    }

    public function wordCondition()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'condition');
    }
}
