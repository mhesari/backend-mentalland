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
        Schema::create('psychologists', function (Blueprint $table) {
            $table->id();
            $table->string('Fname');
            $table->string('Lname');
            $table->string('national_code');
            $table->string('phone_number');
            $table->string('avatar');
            $table->string('university');
            $table->string('degree_education');
            $table->mediumInteger('points');
            $table->string('fields');
            $table->text('weekly_plans');
            $table->text('comments');
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
        Schema::dropIfExists('psychologists');
    }
};
