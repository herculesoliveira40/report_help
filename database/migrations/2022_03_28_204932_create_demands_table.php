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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();

            $table->string('title_demand');
            $table->string('description');
            $table->integer('status');
            $table->string('observation');
            $table->decimal('value')->nullable();

            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('user_creator_id')->references('id')->on('users');
            $table->foreignId('user_update_id')->references('id')->on('users');
            $table->foreignId('user_responsive')->references('id')->on('users');

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
        Schema::dropIfExists('demands');
    }
};
