<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AditDescriptionColumnToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `keyword` `meta_description` VARCHAR(255)  NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE `tours` CHANGE COLUMN `meta_description` `keyword` VARCHAR(255)  NULL");
	}

}
