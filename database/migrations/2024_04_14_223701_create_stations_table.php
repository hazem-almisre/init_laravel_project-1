<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id('stationId');
            $table->string('city' , 60);
            // $table->foreignId('cityId')->references('cityId')->on('cities')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->foreignId('companyId')->references('companyId')->on('companies')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->string('name',65);
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
        Schema::dropIfExists('stations');
    }
}
