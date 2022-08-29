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
        Schema::create('subject_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('subject_name');
            $table->text('code');
            $table->string('correct_answer');
            $table->string('wrong_answer1');
            $table->string('wrong_answer2');
            $table->string('wrong_answer3');
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
        Schema::dropIfExists('subject_codes');
    }
};
