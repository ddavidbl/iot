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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->integer('suhu')->nullable()->useCurrentOnUpdate();
            $table->integer('ph')->nullable()->useCurrentOnUpdate();
            $table->integer('DO')->nullable()->useCurrentOnUpdate();
            $table->integer('ultrasonic')->nullable()->useCurrentOnUpdate();
            $table->integer('nilaiKeruh')->nullable()->useCurrentOnUpdate();
            $table->integer('TDS')->nullable()->useCurrentOnUpdate();
            $table->integer('konduktifitas')->nullable()->useCurrentOnUpdate();
            $table->integer('panjang')->nullable()->useCurrentOnUpdate();
            $table->integer('lebar')->nullable()->useCurrentOnUpdate();
            $table->integer('volume')->nullable()->useCurrentOnUpdate();
            $table->bigInteger('device_id')->nullable()->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->bigInteger('device');
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
        Schema::dropIfExists('areas');
    }
};
