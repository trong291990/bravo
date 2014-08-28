<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	public function up() {
        Schema::create('reviews', function(Blueprint $t){
        	$t->increments('id');
        	$t->string('first_name',255);
        	$t->string('last_name',255)->nullable();
        	$t->string('email', 255);
        	$t->date('departure_date')->nullable();
        	$t->string('destination',255)->nullable();
        	$t->text('content');
        	$t->float('score')->default(0);
                $t->boolean('is_approved')->default(false);
                $t->timestamps();
        });		
	}


	public function down(){
		Schema::drop('reviews');
	}

}
