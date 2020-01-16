<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('post_code');
            $table->string('city');
            $table->string('country');
            $table->string('id_type');//Type of Identity - passport, DNI, NIE, other ID etc.
            $table->string('id_number');
            $table->string('nationality');
            $table->string('id_photo_1')->nullable();//location of the file
            $table->string('id_photo_2')->nullable();//location of the file
            $table->string('photo')->nullable();//location of the file

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
        Schema::dropIfExists('beneficiaries');
    }
}
