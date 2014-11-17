<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNationalityToReviews extends Migration {

	public function up() {
    Schema::table('reviews', function(Blueprint $t){
      $t->string('nationality', 50)->nullable();
    });	
	}

	public function down() {
		//
	}

}
