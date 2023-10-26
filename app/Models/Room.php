<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
      'plan_id',
      'word_id',
      'area'
    ];

    public function wordName()
    {
        return $this->belongsTo(Word::class, 'word_id');
    }
}
