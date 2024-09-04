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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
// $table->increments('id');
// $table->string('firdt_name');
// $table->string('last_name');
// $table->string('email')->unique(); 
// $table->string('phone')->unique()->nullable(); 
// $table->string('gender')->unique()->nullable(); 
// $table->string('image')->nullable(); 
// $table->string('role')->nullable(); 
// $table->date('bith_date)')->nullable(); 
// $table->timestamp('email_verified_at')->nullable();
// $table->timestamp('phone_verified_at')->nullable();
// $table->string('password');
// $table->string('status');
// $table->rememberToken();
// $table->timestamps();