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
        Schema::create('landing_homes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_2')->nullable();

            $table->string('hero_image')->nullable();
            $table->string('hero_image_2')->nullable();

            $table->string('content')->nullable();
            $table->string('content_2')->nullable();
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
        Schema::dropIfExists('landing_homes');
    }
};
