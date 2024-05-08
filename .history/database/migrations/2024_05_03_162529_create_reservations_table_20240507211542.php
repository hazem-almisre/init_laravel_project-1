<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id("reservationId");
            $table->foreignId("userId")->references("userId")->on("users")->cascadeOnDelete();
            $table->foreignId("travelId")->references("travelId")->on("travels")->cascadeOnDelete();
            $table->string("station");
            $table->integer("seteIndex");
            $table->string("gendor")->default(true);
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
        Schema::dropIfExists('reservations');
    }
}
