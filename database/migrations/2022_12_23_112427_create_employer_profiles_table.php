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
        Schema::create('employer_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_english');
            $table->string('company_persian');
            $table->string('company_logo');

            $table->unsignedBigInteger('province_id');
//            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->unsignedBigInteger('city_id');
//            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('address_company');
            $table->enum('Activity_company',['artistic','Business','Psychology']);
            $table->text('bio_company');
            $table->string('website_company');
            $table->string('phone_number');

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
        Schema::dropIfExists('employer_profiles');
    }
};
