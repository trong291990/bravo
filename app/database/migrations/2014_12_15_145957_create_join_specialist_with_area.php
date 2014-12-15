<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinSpecialistWithArea extends Migration {

    public function up() {
        Schema::create('specialists_areas', function(Blueprint $t) {
            $t->integer('specialist_id');
            $t->integer('area_id');
            $t->unique(['specialist_id', 'area_id']);
        });
    }

    public function down() {
        Schema::drop('specialists_areas');
    }

}
