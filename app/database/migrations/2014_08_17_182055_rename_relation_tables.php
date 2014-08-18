<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameRelationTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE tours_places RENAME TO place_tour");
            DB::statement("ALTER TABLE tours_travel_styles RENAME TO tour_travel_style");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE place_tour RENAME TO tours_places");
            DB::statement("ALTER TABLE tour_travel_style RENAME TO tours_travel_styles");
	}

}
