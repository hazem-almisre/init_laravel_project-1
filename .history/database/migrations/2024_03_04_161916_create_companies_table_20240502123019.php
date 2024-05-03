<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('companyId');
            $table->string('name');
            $table->string('phoneNumber');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId("subscribeId")->nullable()->references("subscribeId")
            ->on("subscribes")->onDelete("cascade");
            $table->text("aboutAs")->nullable();
            $table->text("logo")->nullable();
            $table->boolean('isActive')->default(true);
            $table->integer("recommendation")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('companies');
    }
}
