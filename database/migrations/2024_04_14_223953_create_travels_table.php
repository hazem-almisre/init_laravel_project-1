<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id('travelId');
            $table->unsignedBigInteger('programId')->nullable();
            $table->foreign('programId')->references('programId')->on('programs')->cascadeOnDelete()->cascadeOnUpdate();    
            $table->unsignedBigInteger('companyId');      
            $table->foreign('companyId')->references('companyId')->on('companies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('pullmanDescriptionId')->references('pullmanDescriptionId')->on('pullman_descriptions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('seriesId')->references('seriesId')->on('series')->cascadeOnDelete()->cascadeOnUpdate();            
            $table->string('from' , 50);
            $table->string('to' , 50);
            $table->date('travelDate');
            $table->time('timeToLeave');
            $table->float('price')->unsigned();
            $table->integer('numOfSeats');
            $table->integer('numOfSeatsBooking')->default(0);
            $table->boolean('available')->default(true);
            $table->text('notes')->nullable();
            $table->boolean('isVIP')->default(false);
            $table->integer('recommendation')->default(0);
            $table->enum('day',['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
            $table->integer('DailySerialNumber')->nullable();
            $table->enum('periodName',['morning', 'noon','afternoon','evening','night'])->nullable();
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
        Schema::dropIfExists('travels');
    }
}
