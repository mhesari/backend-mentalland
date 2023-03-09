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
        Schema::create('apply_psych', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number')->unique();
            $table->integer('age');
            $table->string('sex');
            $table->integer('psychologist_id')->unique();
//            $table->foreign('psychologist_id')->references('id')->on('psychologist')->onDelete('cascade')->unique();
            $table->string('const_type');
            $table->text('time');
            $table->boolean('applied');
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
        Schema::dropIfExists('apply_psych');
    }
};
