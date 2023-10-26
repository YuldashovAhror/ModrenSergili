<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'photo',
        'data',
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
