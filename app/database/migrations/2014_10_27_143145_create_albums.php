<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlbums extends Migration {

    public function up() {
        Schema::create('album_categories', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 255);
                    $table->timestamps();
                });

        Schema::create('albums', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('category_id')->nullable();
                    $table->string('name', 255);
                    $table->string('slug', 255);
                    $table->text('description')->nullable();
                    $table->timestamps();
                });
        Schema::create('album_photos', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('album_id');
                    $table->string('title', 255)->nullable();
                    $table->boolean('is_primary')->default(false);
                    $table->string('origin_path');
                    $table->string('thumb_path');
                });
    }

    public function down() {
        Schema::drop('albums');
        Schema::drop('album_photos');
    }

}
