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
        Schema::create('adverstings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ad_title');
            $table->enum('ad_category',['artistic','Business','Psychology']);

            $table->unsignedBigInteger('province_id');
//            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->unsignedBigInteger('city_id');
//            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->enum('Type_cooperation',['full_time','Part_time','remote']);
            $table->string('minimum_salary');
            $table->text('ad_content');
            $table->enum('Relevant_work_experience',['3year','3_6year','6+year']);

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
        Schema::dropIfExists('adverstings');
    }
};
