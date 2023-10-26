<?php
$arr = [];
foreach (\App\Models\Word::orderBy('id')->get() as $key=>$value){
    $arr[$value->key] = $value->word_uz;
}
return $arr;
