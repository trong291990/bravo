<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservations extends Migration {

	public function up() {
		Schema::create('reservations', function(Blueprint $t) {
			$t->increments('id');
			$t->integer('tour_id');
			$t->string('booking_id')->unique();

			$t->string('cusomter_name');
			$t->string('cusomter_email');
			$t->string('cusomter_phone')->nullable();
			$t->text('message')->nullable();

			$t->integer('status')->default(0);
			$t->boolean('is_by_admin')->default(false);
			$t->timestamps();

			$t->index('tour_id');
		});
	}

	public function down() {
		Schema::drop('reservations');
	}

}
