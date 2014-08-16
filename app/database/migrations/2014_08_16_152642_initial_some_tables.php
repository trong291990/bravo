<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSomeTables extends Migration {


	public function up() {
        Schema::create('countries', function(Blueprint $t){
            $t->increments('id');
            $t->string('name', 255);
            $t->string('slug', 255);
            $t->string('keyword', 255)->nullable();
            $t->boolean('keyword_inherit')->default(true);
            $t->string('meta_keyword', 255)->nullable();
            $t->timestamps();
        });

        Schema::create('itineraries', function(Blueprint $t){
            $t->increments('id');
            $t->string('name', 255);
            $t->integer('tour_id');
            $t->integer('order')->default(1);
            $t->text('detail');
            $t->string('hotel')->nullable();
            $t->boolean('breakfast')->default(true);
            $t->boolean('lunch')->default(true);
            $t->boolean('dinner')->default(true);

            $t->timestamps();
            $t->index('tour_id');
        });

        Schema::create('travel_styles', function(Blueprint $t) {
            $t->increments('id');
            $t->string('name', 255);
        	$t->timestamps();    
        });

        Schema::create('tours', function(Blueprint $t) {
            $t->increments('id');
            $t->integer('country_id');
            $t->string('name', 255);
            $t->string('slug', 255);
            $t->string('meta_keyword', 255)->nullable();

            $t->string('keyword', 255)->nullable();
            $t->boolean('keyword_inherit')->default(true);  
            
            $t->integer('duration');
            $t->float('price_from');

            $t->text('include')->nullable();
            $t->text('not_include')->nullable();
            $t->text('overview')->nullable();
            
        	$t->timestamps();
        	$t->index('country_id');
        });

        Schema::create('tours_travel_styles', function(Blueprint $t) {
        	$t->increments('id');
        	$t->integer('tour_id');
        	$t->integer('travel_style_id');
        	$t->index('tour_id');
        });	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}

}
