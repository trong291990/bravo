<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialistsTable extends Migration {

    public function up() {
        Schema::create('specialists', function(Blueprint $table) {
                    $table->increments('id');
                    $table->string('first_name', 255);
                    $table->string('last_name', 255);
                    $table->string('email', 255)->unique();
                    $table->string('password', 255);
                    $table->string('remember_token', 255)->nullable();
                    $table->string('nationality', 255)->nullable();
                    $table->string('avatar_url', 255)->nullable();
                    $table->text('bio')->nullable();
                    $table->string('languages', 255)->nullable();
                    $table->text('specialties')->nullable();
                    $table->timestamps();
                });
    }

    public function down() {
        Schema::drop('specialists');
    }

}
