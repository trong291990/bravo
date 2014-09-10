<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateTravelingReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('reservations',function($t){
                 $t->date('travel_date')->nullable()->after('customer_phone');
            });
            Schema::table('reservations',function($t){
                 $t->integer('traveling')->nullable()->after('travel_date');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('reservations',function($t){
                 $t->dropColumn('travel_date');
             });
             Schema::table('reservations',function($t){
                 $t->dropColumn('traveling');
             });
	}

}
