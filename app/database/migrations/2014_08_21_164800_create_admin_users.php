<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsers extends Migration {

    public function up() {
        Schema::create('admin_users', function(Blueprint $t) {
                    $t->increments('id');
                    $t->string('name');
                    $t->string('email');
                    $t->string('password', 64);
                    $t->string('remember_token')->nullable();
                    $t->timestamps();
                });
    }

    public function down() {
       Schema::drop('admin_users');
    }

}
