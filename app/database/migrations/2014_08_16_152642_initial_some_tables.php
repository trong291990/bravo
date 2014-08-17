<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSomeTables extends Migration {

    public function up() {
        Schema::create('countries', function(Blueprint $t) {
                    $t->increments('id');
                    $t->string('name', 255);
                    $t->string('slug', 255);
                    $t->string('keyword', 255)->nullable();
                    $t->boolean('keyword_inherit')->default(true);
                    $t->string('meta_keyword', 255)->nullable();
                    $t->boolean('is_on_menu')->default(false);
                    $t->integer('menu_order')->default(1);
                });

        Schema::create('places', function(Blueprint $t) {
                    $t->increments('id');
                    $t->integer('country_id');
                    $t->string('name', 255);
                    $t->text('description')->nullable();
                    $t->string('thumbnail', 255)->nullable(); // thumbnail from primary photo
                    $t->float('lat')->nullable();
                    $t->float('lng')->nullable();
                    
                    $t->index('country_id');
                });
        Schema::create('place_photos', function(Blueprint $t) {
                    $t->increments('id');
                    $t->integer('place_id');
                    $t->string('title', 255);
                    $t->string('path', 255);
                    $t->boolean('is_primary')->default(false);
                });

        Schema::create('itineraries', function(Blueprint $t) {
                    $t->increments('id');
                    $t->string('name', 255);
                    $t->integer('tour_id');
                    $t->integer('order')->default(1);
                    $t->text('detail');
                    $t->string('hotel')->nullable();
                    $t->boolean('breakfast')->default(true);
                    $t->boolean('lunch')->default(true);
                    $t->boolean('dinner')->default(true);

                    $t->index('tour_id');
                });

        Schema::create('travel_styles', function(Blueprint $t) {
                    $t->increments('id');
                    $t->string('name', 255);
                });

        Schema::create('tours', function(Blueprint $t) {
                    $t->increments('id');
                    $t->integer('country_id');
                    $t->string('name', 255);
                    $t->string('code', 255);
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

        Schema::create('tours_places', function(Blueprint $t) {
                    $t->increments('id');
                    $t->integer('tour_id');
                    $t->integer('place_id');
                    $t->integer('order')->default(1);

                    $t->index('tour_id');
                    $t->index('place_id');
                });
        Schema::create('tours_travel_styles', function(Blueprint $t) {
                    $t->increments('id');
                    $t->integer('tour_id');
                    $t->integer('travel_style_id');

                    $t->index('tour_id');
                    $t->index('travel_style_id');
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
