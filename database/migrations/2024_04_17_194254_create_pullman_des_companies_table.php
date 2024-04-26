<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePullmanDesCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pullman_des_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companyId')->references('companyId')->on('companies')->onDelete('cascade');
            $table->foreignId('pullmanDescriptionId')->references('pullmanDescriptionId')->on('pullman_descriptions')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('pullman_des_companies');
    }
}
