<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('Name');
            $table->string('Address');  
            $table->bigInteger('mobileno')->unique();         
            $table->string('gender');
            $table->bigInteger('Aadharno')->unique();
            $table->text('image');
            $table->text('Aadharimg');
            $table->bigInteger('height');
            $table->bigInteger('weight');  
            $table->bigInteger('BMI');         
            $table->string('email')->unique();
            $table->date('DOB');
            $table->string('blood_group');
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
