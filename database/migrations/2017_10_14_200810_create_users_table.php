<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('google_key')->nullable();
            $table->string('facebook_key')->nullable();
            $table->char('first_name', 40);
            $table->char('last_name', 40);
            $table->string('e-mail');
            $table->string('password');
            $table->string('uber_key')->nullable();
            $table->timestamps();
            $table->unique('e-mail');
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
