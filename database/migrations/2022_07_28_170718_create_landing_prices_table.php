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
        Schema::create('landing_prices', function (Blueprint $table) {
            $table->id();
            $table->string('price_title')->nullable();
            $table->string('price_desc')->nullable();
            $table->string('price_name')->nullable();
            $table->integer('price_amount')->nullable();
            $table->string('price_options')->nullable();

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
        Schema::dropIfExists('landing_prices');
    }
};
