<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('target')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('donors');

        });


        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_project_id');
            $table->foreign('parent_project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
