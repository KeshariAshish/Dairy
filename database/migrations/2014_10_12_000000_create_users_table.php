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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('home_number');
            $table->string('address');
            $table->string('locality');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('location');
            $table->boolean('is_active')->default(0);
            $table->integer('phone')->unique();
            $table->integer('phone_verified_at')->nullable(); 
            $table->string('created_by');
            $table->boolean('is_admin')->default(0);        
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