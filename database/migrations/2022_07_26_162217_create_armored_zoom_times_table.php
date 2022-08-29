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
        Schema::create('armored_zoom_times', function (Blueprint $table) {
            $table->id();
            $table->string('mentor_name');
            $table->dateTime('appointed_time');
            $table->string('student_name');
            $table->string('zoom_url');
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
        Schema::dropIfExists('armored_zoom_times');
    }
};
