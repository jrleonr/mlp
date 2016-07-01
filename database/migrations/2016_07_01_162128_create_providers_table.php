<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->string('provider_id')->unique();
            $table->string('sport');
            $table->string('format');
            $table->string('venue');
            $table->string('pitch')->nullabe();
            $table->datetime('start');
            $table->datetime('end');
            $table->string('availability');
            $table->decimal('price');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
