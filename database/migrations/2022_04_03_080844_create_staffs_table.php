<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Employee_ID')->unique();
            $table->string('Employee_name');
            $table->bigInteger('Mobile_No')->unique();
            $table->string('Gender');
            $table->string('Email_id');
            $table->string('Address');
            $table->text('profileImage');
            $table->string('emp_role');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
