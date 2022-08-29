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
        Schema::create('landing_mentors', function (Blueprint $table) {
            $table->id();
            $table->string('mentor_title')->nullable();
            $table->string('mentor_desc')->nullable();
            $table->string('mentor_image')->nullable();
            $table->string('mentor_subject_image')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('landing_mentors');
    }
};
