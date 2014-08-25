<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrentNullableToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `thumbnail` `thumbnail` VARCHAR(255)  NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `thumbnail` `thumbnail` VARCHAR(255) NOT  NULL");
	}

}
