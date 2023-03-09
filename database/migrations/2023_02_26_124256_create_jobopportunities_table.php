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
        Schema::create('jobopportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('category');
            $table->string('jobtype');
            $table->string('education');
            $table->string('exp');
            $table->text('facilities');
            $table->string('company');
            $table->string('city');
            $table->boolean('remote');
            $table->boolean('intership');
            $table->date('date');
            $table->text('salary');
            $table->text('description');
            $table->text('requirement');
            $table->text('benefits');
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
        Schema::dropIfExists('jobopportunities');
    }
};
