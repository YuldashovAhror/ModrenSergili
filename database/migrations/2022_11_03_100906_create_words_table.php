<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->text('key')->nullable();
            $table->char('page')->nullable();
            $table->text('word_ru')->nullable();
            $table->text('word_uz')->nullable();
            $table->text('word_en')->nullable();
            $table->text('wordable_id')->nullable();
            $table->text('wordable_type')->nullable();
            $table->string('const')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
};
