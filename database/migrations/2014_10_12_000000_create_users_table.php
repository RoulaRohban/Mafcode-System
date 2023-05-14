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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();;
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('reset_token')->nullable();
            $table->string('activation_code')->nullable();
            $table->text('firebase_token')->nullable();
            $table->enum('reset_verified',['yes','no'])->nullable();
            $table->enum('session_expired',['yes','no'])->default('no');
            $table->enum('role',['admin','client'])->default('client');
            $table->enum('active',['yes','no'])->default('yes');
            $table->integer('blood_type_id')->nullable();
            $table->integer('location_id')->nullable();;
            $table->enum('location_type', ['country', 'city', 'region'])->nullable();
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
