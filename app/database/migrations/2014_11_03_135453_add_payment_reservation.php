<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentReservation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('reservations',function (Blueprint $t){
                $t->boolean('include_payment')->after('message')->default(0);
                $t->float('pricing')->after('include_payment')->nullable();
                $t->float('fee')->after('pricing')->nullable();
                $t->text('fee_description')->after('fee')->nullable();
                $t->string('payment_method')->after('fee_description')->nullable();
                $t->text('payment_detail')->after('payment_method')->nullable();
                $t->datetime('payment_date')->after('payment_detail')->nullable();
                $t->string('payment_status')->after('payment_date')->nullable();
                $t->string('payment_token')->after('payment_status')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
