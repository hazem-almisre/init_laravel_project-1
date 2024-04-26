<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_stations', function (Blueprint $table) {
            $table->id('travelStationId');
            $table->foreignId('travelId')->references('travelId')->on('travels')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('stationId')->references('stationId')->on('stations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->time('ExpectedArrivalTime');
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
        Schema::dropIfExists('travel_stations');
    }
}
