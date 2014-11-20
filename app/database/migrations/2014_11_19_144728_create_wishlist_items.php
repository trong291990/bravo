<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWishlistItems extends Migration {

	public function up() {
    Schema::create('wishlists', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('customer_id');
        $table->integer('tour_id');
        $table->unique(['customer_id', 'tour_id']);
				$table->timestamps();
    });
	}

	public function down() {
	    Schema::drop('wishlists');
	}

}
