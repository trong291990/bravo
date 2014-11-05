<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAreaToAlbums extends Migration {

    public function up() {
        DB::table('albums')->truncate();
        DB::table('album_photos')->truncate();
        Schema::table('albums', function(Blueprint $t) {
                    $t->integer('area_id');
                    $t->removeColumn('category_id');
                });
    }

    public function down() {
        //
    }

}
