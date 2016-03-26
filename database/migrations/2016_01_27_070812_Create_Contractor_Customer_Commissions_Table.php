<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorCustomerCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_customer_commissions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contractor_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->float('freight_commission');
            $table->float('commission_1');
            $table->float('commission_2');

            $table->security();

            //applying foreign keys
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractor_customer_commissions');
    }
}
