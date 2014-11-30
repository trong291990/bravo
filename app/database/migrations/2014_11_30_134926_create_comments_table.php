<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	public function up() {
		Schema::create('comments', function(Blueprint $t) {
			$t->increments('id');
			$t->integer('customer_id')->nullable();
			$t->integer('commentable_id'); // Polymophic
			$t->string('commentable_type');
			$t->text('content');
			$t->float('score')->nullable();
			$t->timestamps();
		});
	}

	public function down() {
		Schema::drop('comments');
	}

}
