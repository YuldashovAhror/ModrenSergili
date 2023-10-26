<?php

namespace App\Traits;

use App\Models\Word;

trait WordTrait
{
    protected function saveWord($word, $model, $id, $name)
    {
        Word::create([
            'key' => $word[$name.'_ru'],
            'word_ru' => $word[$name.'_ru'],
            'word_uz' => $word[$name.'_uz'],
            'word_en' => $word[$name.'_en'],
            'wordable_id' => $id,
            'wordable_type' => $model,
            'const' => $name
        ]);
        return back();
    }
}
