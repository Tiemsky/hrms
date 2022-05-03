<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('position');
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('isAdmin')->default(0);
            $table->string('password');
            $table->string('date_of_birth')->nullable();
            $table->string('join_date');
            $table->string('slug');
            $table->string('document_number')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('number_of_children')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('status')->default('active');
            $table->string('avatar')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
