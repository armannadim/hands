<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo')->nullable();//location of the file
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('post_code');
            $table->string('city');
            $table->string('country');
            $table->string('id_type');//Type of Identity - passport, DNI, NIE, other ID etc.
            $table->string('id_number');
            $table->string('nationality');
            $table->enum('publish_name', [0,1])->default(1);//publish name as donor yes or no
            $table->enum('send_future_mail', [0,1])->default(1); //allow sending mail or other communication
            $table->enum('preferred_contact_medium', [0,1,2])->default(2); //0-mobile, 1-email, 2-both
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
