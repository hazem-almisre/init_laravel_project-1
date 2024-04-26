<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stationId')->references('stationId')->on('stations')->cascadeOnDelete()->cascadeOnUpdate();  
            $table->foreignId('seriesId')->references('seriesId')->on('series')->cascadeOnDelete()->cascadeOnUpdate();            
            $table->string('city' , 60);
            $table->string('name',65);
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
        Schema::dropIfExists('series_stations');
    }
}
