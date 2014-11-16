<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('bookings', function(Blueprint $table) {
                $table->increments('id');
                $table->string('tour_name');
                $table->datetime('travel_date');
                $table->tinyInteger('room_type');
                $table->string('main_contact');
                $table->string('email');
                $table->string('contact_number');
                $table->string('arrival_date')->nullable();
                $table->string('airline_flight_no')->nullable();
                $table->string('arrival_time')->nullable();
                $table->string('departure_date')->nullable();
                $table->string('departure_flight_no')->nullable();
                $table->string('departure_time')->nullable();
                $table->text('passenger')->nullable();
                $table->string('addition_comment')->nullable();
                $table->boolean('contribute')->nullable();
                $table->float('total');
                $table->float('deposit');
                $table->tinyInteger('status')->default(0);
                $table->timestamps();
            });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('bookings');
	}

}
