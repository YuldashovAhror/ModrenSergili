<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'photo'
    ];

    public function img()
    {
        return $this->morphOne(Img::class, 'imgable');
    }

    public function wordTitle()
    {
        return $this->morphOne(Word::class, 'wordable')->where('const', 'title');
    }

    public function wordItem()
    {
        return $this->morphMany(Word::class, 'wordable')->where('const', 'item')->orderBy('id');
    }

//    public function delete()
//    {
//        $this->img()->delete();
//        $this->wordTitle()->delete();
//        $this->wordItem()->delete();
//    }
}
