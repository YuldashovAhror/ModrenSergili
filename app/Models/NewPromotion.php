<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description'
    ];

    public function photo()
    {
        return $this->morphOne(Img::class, 'imgable');
    }

    public function wordTitle()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'title');
    }

    public function wordDescription()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'description');
    }

}
