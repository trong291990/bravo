<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomethingToCustomers extends Migration {


	public function up() {
		Schema::table('authentications', function(Blueprint $t) {
			$t->removeColumn('avatar_url');
		});
		Schema::table('customers', function(Blueprint $t) {
			$t->string('password');
			$t->string('remember_token')->nullable();
		});
	}

	public function down() {
	}

}
