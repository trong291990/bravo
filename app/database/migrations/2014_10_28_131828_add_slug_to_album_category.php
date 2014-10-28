<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSlugToAlbumCategory extends Migration {

    public function up() {
        Schema::table('album_categories', function(Blueprint $table) {
                    $table->string('slug', 255);
                });
    }

    public function down() {
        
    }

}
