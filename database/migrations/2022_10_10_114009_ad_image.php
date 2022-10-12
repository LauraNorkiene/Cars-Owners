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
        Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->string('name')->nullable()->default(null);
        $table->unsignedBigInteger('car_id')->nullable()->default(null);

        $table->foreign('car_id')->references('id')->on('cars');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
