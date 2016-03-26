<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorCompanyCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_company_commissions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contractor_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->float('commission_1');
            $table->float('commission_2');
            $table->float('commission_3');

            $table->security();

            //applying foreign keys
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractor_company_commissions');
    }
}
