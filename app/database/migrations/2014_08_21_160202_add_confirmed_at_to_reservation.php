<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmedAtToReservation extends Migration {

    public function up() {
        Schema::table('reservations', function(Blueprint $t) {
            $t->datetime('confirmed_at')->nullable();
        });
    }

    public function down() {
        Schema::table('reservations', function(Blueprint $t) {
            $t->dropColumn('confirmed_at');
        });
    }

}
