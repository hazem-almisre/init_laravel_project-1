<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommands', function (Blueprint $table) {
            $table->id("followId");
            $table->foreignId("userId")->references("userId")->on("users")->cascadeOnDelete();
            $table->foreignId("companyId")->references("companyId")->on("companies")->cascadeOnDelete();
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
        Schema::dropIfExists('recommands');
    }
}
