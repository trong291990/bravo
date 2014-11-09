<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesCustomersContacts extends Migration {

	public function up() {
    Schema::rename('customers', 'contacts');
    Schema::create('customers', function(Blueprint $t) {
      $t->increments('id');
      $t->string('name', 255);
      $t->string('email', 255)->unique();
      $t->string('avatar_url', 255)->nullable();
      $t->string('gender', 255)->nullable();
			$t->date('dob')->nullable();
			$t->string('nationality', 50)->nullable();
			$t->string('phone', 25)->nullable();
      $t->timestamps();
    }); 
	}

	public function down() {
		//
	}

}
