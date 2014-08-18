<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameForeignKeyToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `country_id` `area_id` INT NOT NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `area_id` `country_id` INT NOT NULL");
	}

}
