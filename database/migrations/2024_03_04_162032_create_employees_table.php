<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('gendor',['انثى','ذكر']);
            // $table->string('email')->unique();
            $table->string('phoneNumber',20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birthDay')->nullable();
            $table->text('Image')->nullable();
            $table->foreignId('companyId')->references('companyId')->on('companies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}
