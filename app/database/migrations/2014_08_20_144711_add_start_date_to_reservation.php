<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartDateToReservation extends Migration {

    public function up() {
        Schema::table('reservations', function(Blueprint $t) {
           $t->date('start_date')->nullable();
        });
    }

    public function down() {
        Schema::table('reservations', function(Blueprint $t) {
           $t->dropColumn('start_date');
        });
    }

}
