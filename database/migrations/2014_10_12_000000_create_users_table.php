<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('firstName',25);
            $table->string('lastName',25);
            $table->enum('gendor',['ذكر','انثى']);
            $table->string('phoneNumber',20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('personalId')->max(11);
            $table->date('birthDay');
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
        Schema::dropIfExists('users');
    }
}
