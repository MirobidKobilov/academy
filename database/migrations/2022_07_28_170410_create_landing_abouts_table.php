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
        Schema::create('landing_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->string('about_short')->nullable();
            $table->string('about_desc')->nullable();
            $table->string('about_bg')->nullable();
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
        Schema::dropIfExists('landing_abouts');
    }
};
