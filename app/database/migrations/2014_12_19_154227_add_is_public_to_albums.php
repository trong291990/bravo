<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPublicToAlbums extends Migration {

	public function up() {
		Schema::table('albums', function(Blueprint $t) {
			$t->boolean('is_published')->default(true);
		});
	}

	public function down() {
		Schema::table('albums', function(Blueprint $t) {
			$t->dropColumn('is_published');
		});
	}

}
