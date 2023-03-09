<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('const_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('national_code');
            $table->string('phone_number');
            $table->string('avatar');
            $table->string('university');
            $table->string('degree_education');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('const_profiles');
    }
};
