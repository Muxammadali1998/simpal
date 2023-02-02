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
        Schema::create('obyekts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city_id');
            $table->string('phone');
            $table->string('status')->default('0');
            $table->string('start')->default("8:00");
            $table->string('finish')->default("10:00");
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
        Schema::dropIfExists('obyekts');
    }
};
