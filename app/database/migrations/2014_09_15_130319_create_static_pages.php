<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPages extends Migration {

    public function up() {
        Schema::create('static_pages', function(Blueprint $t) {
                    $t->increments('id');
                    $t->string('name', 69); // like slug
                    $t->string('title', 255);
                    $t->string('meta_keyword')->nullable();
                    $t->string('meta_description')->nullable();
                    $t->text('content');
                });
    }

    public function down() {
        Schema::drop('static_pages');
    }

}
