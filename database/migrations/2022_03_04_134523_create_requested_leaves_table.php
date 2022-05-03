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
        Schema::create('requested_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('leave_id');
            $table->string('leave_from');
            $table->string('leave_to');
            $table->integer('number_of_day');
            $table->longText('leave_reason');
            $table->integer('status')->default(1); //default 1 pending mode
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
        Schema::dropIfExists('requested_leaves');
    }
};
