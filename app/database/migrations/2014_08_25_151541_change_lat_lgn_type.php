<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLatLgnType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `places` CHANGE COLUMN `lat` `lat` VARCHAR(255)  NULL");
            DB::statement("ALTER TABLE `places` CHANGE COLUMN `lng` `lng` VARCHAR(255)  NULL");
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
