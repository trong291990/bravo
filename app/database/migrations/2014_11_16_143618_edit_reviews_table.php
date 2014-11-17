<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditReviewsTable extends Migration {

    public function up() {
      DB::table('reviews')->truncate();
      Schema::table('reviews', function(Blueprint $t) {
          $t->dropColumn('first_name');
          $t->dropColumn('last_name');
          $t->dropColumn('email');
          $t->dropColumn('nationality');
      });
    }

    public function down() {
        //
    }

}
