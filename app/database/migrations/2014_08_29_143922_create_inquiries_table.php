<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration {

	public function up() {
        Schema::create('inquiries', function(Blueprint $t){
        	$t->increments('id');
        	// Contact info
        	$t->string('first_name',255);
        	$t->string('last_name',255)->nullable();
        	$t->string('email', 255);
        	$t->string('phone_number', 255);
        	$t->string('best_time_call', 255)->nullable();
        	// Trip details
        	$t->integer('number_of_participants');
        	$t->string('estimate_budget');
        	$t->date('departure_date');
        	$t->string('departure_city',255);
        	$t->string('destinations',255);
        	$t->integer('length_of_trip');
        	// Class of service
        	$t->string('cruise_line')->nullable();	
        	$t->boolean('keep_update')->default(true);
        	$t->string('preferred_consultant')->nullable();	
        	$t->string('find_us_from')->nullable();	
        	$t->text('additional_comment')->nullable();
        	$t->boolean('is_resolved')->default(false);
            $t->timestamps();
        });	
	}

	public function down() {
		Schema::drop('inquiries');
	}
}
