<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhonePickOffTourReservation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('reservations', function(Blueprint $t) {
                $t->string('phon_number')->nullable();
                $t->text('pick_off')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('reservations', function(Blueprint $t) {
			$t->dropColumn('phon_number');
                        $t->dropColumn('pick_off');
		});
	}

}
