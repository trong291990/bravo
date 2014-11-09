<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthentications extends Migration {

	public function up() {
    Schema::create('authentications', function(Blueprint $t) {
      $t->increments('id');
      $t->integer('customer_id');
      $t->string('uid');
      $t->string('provider');
			$t->timestamps();
    });    
	}

	public function down() {
	 Schema::drop('authentications');
	}

}
