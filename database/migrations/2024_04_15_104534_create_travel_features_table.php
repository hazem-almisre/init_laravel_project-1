<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travelId')->references('travelId')->on('travels')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('featureId')->references('featureId')->on('features')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('travel_features');
    }
}
