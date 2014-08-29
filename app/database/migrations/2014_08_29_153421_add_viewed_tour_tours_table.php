<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewedTourToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
             Schema::table('tours',function($t){
                 $t->integer('viewed')->nullable()->default(0)->after('name');
             });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('tours',function($t){
                 $t->dropColumn('viewed');
             });
	}

}
