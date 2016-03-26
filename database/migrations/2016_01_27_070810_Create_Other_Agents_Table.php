<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_agents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('id_card');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('image');

            $table->security();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('other_agents');
    }
}
