<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company');
            $table->string('title');
            $table->string('employmentType');
            $table->string('location');
            $table->string('from_period');
            $table->string('to_period')->nullable();
           
            $table->boolean('currentPosition')->default(0);
            $table->string('jobDescription')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
