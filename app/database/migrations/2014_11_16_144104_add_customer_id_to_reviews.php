<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerIdToReviews extends Migration {

    public function up() {
        Schema::table('reviews', function(Blueprint $t) {
            $t->integer('customer_id');
        });
    }

    public function down() {
    }

}
