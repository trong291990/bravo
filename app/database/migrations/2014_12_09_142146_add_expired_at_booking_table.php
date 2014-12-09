<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpiredAtBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('bookings', function(Blueprint $t){
                $t->datetime('expired_at')->nullable();
                $t->string('payment_type')->nullable();
                $t->string('payment_token')->nullable();
                $t->datetime('payment_date')->nullable();
                $t->text('payment_detail')->nullable();
                //$t->integer('total_passenger')->nullable()->default(1);
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
