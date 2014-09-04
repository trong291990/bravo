<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterInquiries extends Migration {

	public function up() {
		 DB::update('ALTER TABLE `inquiries` MODIFY `phone_number` VARCHAR(255) NULL');
		 DB::update('ALTER TABLE `inquiries` MODIFY `estimate_budget` VARCHAR(255) NULL');
		 DB::update('ALTER TABLE `inquiries` MODIFY `destinations` VARCHAR(255) NULL');
	}


	public function down() {
		//
	}

}
