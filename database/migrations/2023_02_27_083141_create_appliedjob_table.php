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
        Schema::create('appliedjob', function (Blueprint $table) {
            $table->id();
            $table->string('Fname');
            $table->string('Lname');
            $table->date('birth');
            $table->string('sex');
            $table->integer('phone_number');
            $table->integer('mobile_number');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->text('postal_code');
            $table->text('cv');
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
        Schema::dropIfExists('appliedjob');
    }
};
