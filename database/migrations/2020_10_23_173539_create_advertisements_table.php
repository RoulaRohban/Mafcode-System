<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('unique_id')->nullable();
            $table->enum('type',['lost','found','need']);
            $table->integer('blood_type_id');
            $table->enum('active',['yes','no'])->default('yes');
            $table->enum('status',['found','not_found'])->default('not_found');
            $table->string('title');
            $table->text('description');
            $table->integer('location_id')->nullable();;
            $table->enum('location_type', ['country', 'city', 'region'])->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
