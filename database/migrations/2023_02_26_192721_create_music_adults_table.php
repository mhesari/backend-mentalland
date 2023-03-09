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
        Schema::create('music_adults', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('master_name');
            $table->text('description');
            $table->text('price');
            $table->string('instrument');
            $table->string('field');
            $table->mediumInteger('sessions');
            $table->string('offline_videos');
            $table->string('online_support');
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
        Schema::dropIfExists('music_adults');
    }
};
