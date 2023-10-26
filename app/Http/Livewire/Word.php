<?php

namespace App\Http\Livewire;

use App\Models\Word as ModelsWord;
use Livewire\Component;

class Word extends Component
{
    public $key, $word_ru, $word_uz, $word_en, $edit=0;
    public $key_edit, $word_edit_ru, $word_edit_uz, $word_edit_en;
    
    protected $rules = [
        'key' => 'required|unique:words,key,'
    ];
    // public $key = 'asd';
    public function render()
    {
        $words = ModelsWord::orderBy('id', 'desc')->get();
        return view('livewire.word', [
            'words'=>$words
        ]);
    }
    public function store()
    {
        $this->validate();
        
        ModelsWord::create([
            'key' => $this->key,
            'word_ru'=> $this->word_ru,
            'word_uz' => $this->word_uz,
            'word_en' => $this->word_en
        ]);
        // dd($this->key);
        $this->resetVariables();    
    }

    function resetVariables(){
        $this->key = '';
        $this->word_ru = '';
        $this->word_uz = '';
        $this->word_en = '';
    }

    public function edit($id)
    {
        $word = ModelsWord::find($id);
        $this->edit = $id;
        $this->key = $word->key;
        $this->word_edit_ru = $word->word_ru;
        $this->word_edit_uz = $word->word_uz;
        $this->word_edit_en = $word->word_en;
    }

    public function update($id)
    {
        if(ModelsWord::find($id)->key != $this->key){
            $this->validate();
        }
        ModelsWord::find($id)->update([
            'key' => $this->key,
            'word_ru' => $this->word_edit_ru,
            'word_uz' => $this->word_edit_uz,
            'word_en' => $this->word_edit_en
        ]);
        $this->edit = 0;
        $this->resetVariables();
    }

    public function destroy($id)
    {
        ModelsWord::find($id)->delete();
    }
}
