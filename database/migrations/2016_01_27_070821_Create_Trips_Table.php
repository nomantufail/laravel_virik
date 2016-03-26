<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('customer_id')->unsigned();
            $table->integer('contractor_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('tanker_id')->unsigned();

            $table->float('contractor_commission_1')->default('0');
            $table->float('contractor_commission_2')->default('0');
            $table->float('contractor_commission_3')->default('0');

            $table->float('company_commission_1')->default('0');
            $table->float('company_commission_2')->default('0');
            $table->float('company_commission_3')->default('0');

            $table->float('company_wht')->default('0');
            $table->float('other_taxes')->default('0');

            $table->date('email_date');
            $table->date('filling_date');
            $table->date('receiving_date');
            $table->date('stn_receiving_date');
            $table->date('decanding_date');
            $table->date('invoice_date');
            $table->date('entry_date');

            $table->integer('driver_id_1')->unsigned();
            $table->integer('driver_id_2')->unsigned();
            $table->integer('driver_id_3')->unsigned();

            $table->string('invoice_number');
            $table->double('start_meter');
            $table->double('end_meter');
            $table->float('fuel_consumed');

            $table->integer('trip_type')->unsigned();

            $table->security();

            //applying foreign keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->foreign('tanker_id')->references('id')->on('tankers');
            $table->foreign('driver_id_1')->references('id')->on('drivers');
            $table->foreign('driver_id_2')->references('id')->on('drivers');
            $table->foreign('driver_id_3')->references('id')->on('drivers');
            $table->foreign('trip_type')->references('id')->on('trip_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trips');
    }
}
