<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');

            /** basic */
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('favico')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();

            /** social */
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();

            /** acesso EAD */
            $table->string('ead')->nullable();

            /** acesso EAD */
            $table->string('logoadmin')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
