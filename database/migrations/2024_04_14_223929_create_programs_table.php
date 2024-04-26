<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('programId');
            // $table->foreignId('from')->references('cityId')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('to')->references('cityId')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('from' , 50);
            $table->string('to' , 50);
            $table->foreignId('companyId')->references('companyId')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->date('start');
            $table->date('end');
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
        Schema::dropIfExists('programs');
    }
}
