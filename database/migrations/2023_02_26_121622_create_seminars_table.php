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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('guests');
            $table->text('guestsintro');
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->boolean('special');
            $table->text('ticket');
            $table->string('tags');
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
        Schema::dropIfExists('seminars');
    }
};
