<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	public function up() {
		Schema::create('customers', function(Blueprint $t) {
				$t->increments('id');
				$t->string('name', 100)->nullable();
				$t->string('email', 100)->nullable();
				$t->date('dob')->nullable();
				$t->string('nationality', 50)->nullable();
				$t->string('phone', 25)->nullable();
				$t->text('note')->nullable();
				$t->string('source');

				$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('customers');
	}

}
