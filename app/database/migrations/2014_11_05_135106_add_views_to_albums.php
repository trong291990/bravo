<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddViewsToAlbums extends Migration {

    public function up() {
        Schema::table('albums', function(Blueprint $t) {
                    $t->integer('views')->default(0);
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
