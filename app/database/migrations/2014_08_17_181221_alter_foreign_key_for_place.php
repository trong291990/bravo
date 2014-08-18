<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignKeyForPlace extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `places` CHANGE COLUMN `country_id` `area_id` INT NOT NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE `places` CHANGE COLUMN `area_id` `country_id` INT NOT NULL");
	}

}
