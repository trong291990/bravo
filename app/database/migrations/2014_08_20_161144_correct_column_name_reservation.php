<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrectColumnNameReservation extends Migration {


	public function up() {
        Schema::table('reservations', function(Blueprint $t) {
           $t->renameColumn('cusomter_name','customer_name');
           $t->renameColumn('cusomter_email','customer_email');
           $t->renameColumn('cusomter_phone','customer_phone');
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
