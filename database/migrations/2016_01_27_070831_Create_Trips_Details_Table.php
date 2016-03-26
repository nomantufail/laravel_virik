<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('trip_id')->unsigned();
            $table->integer('source')->unsigned();
            $table->integer('destination')->unsigned();
            $table->integer('product')->unsigned();

            $table->float('product_quantity')->default('0');

            $table->float('customer_freight_unit')->default('0');
            $table->float('company_freight_unit')->default('0');
            $table->string('stn_number');

            $table->security();

            //applying foreign keys
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('source')->references('id')->on('cities');
            $table->foreign('destination')->references('id')->on('cities');
            $table->foreign('product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trips_details');
    }
}
